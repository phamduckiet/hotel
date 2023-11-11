<?php

namespace App\Http\Controllers;

use App\Enums\BookingStatus;
use App\Events\BookingWasCreatedEvent;
use App\Events\BookingWasPaidEvent;
use App\Http\Requests\CreateBookingRequest;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Services\BookingService;
use App\Http\Services\PaypalService;
use App\Models\Booking;
use App\Models\Customer;
use App\Models\RoomType;
use Carbon\Carbon;
use Exception;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    /**
     * @param BookingService $bookingService
     * @param PaypalService $paypalService
     */
    public function __construct(
        private readonly BookingService $bookingService, // service thực hiêện việc đặt phòng
        private readonly PaypalService $paypalService, // service thực hiện việc thnah toán qua Paypal
    ) {
    }

    /**
     * Display a listing of the resource. => Admin
     */
    public function index()
    {
        $this->authorize('viewAny', Booking::class);
        $bookings = Booking::latest()
            ->with(['customer'])->get(); // order by created at desc (giảm dần)

        return view('booking.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource. => Ko check quyên => customer
     * Hiện thi trang booking
     */
    public function create(CreateBookingRequest $request, RoomType $roomType)
    {
        // Kiểm tra xem còn đủ phòng trống hay không
        $checkin = Carbon::createFromFormat('d/m/Y', $request->checkin);
        $checkout = Carbon::createFromFormat('d/m/Y', $request->checkout);
        // Mang danh sach cac phòng trống
        $rooms = $this->bookingService->getRoomsAvailable($roomType->id, $checkin, $checkout);
        if ($rooms->count() < (int) $request->room_total) {
            // SỐ lượng phòng trống < ố lượng phòng cần đặt
            alert()->error('Không còn đủ phòng ' . $roomType->name . ' trong khoảng thời gian ' . $request->checkin . ' - ' . $request->checkout)
                ->showConfirmButton('OK', '#FF7B54');

            return redirect()->back();
        }

        Cart::destroy();
        Cart::add([
            'id' => $roomType->id,
            'name' => $roomType->name,
            'qty' => (int) $request->room_total,
            'price' => $roomType->price,
            'weight' => 1, // Không dùng -> cân nặng
            'options' => [
                'avatar_link' => $roomType->avatar_link,
                'checkin' => $request->checkin,
                'checkout' => $request->checkout,
                'adults' => $request->adults,
                'children' => $request->children,
                'images' => $roomType->images,
                'day_total' => $checkin->diffInDays($checkout), // Số ngày ở
                'note' => $request->note,
            ],
        ]);

        return redirect()->route('rooms.booking.view'); // Retyurn view dat phòng
    }

    public function showBookingView()
    {
        $cart = optional(Cart::content())->first();

        return view('customer.booking', compact('cart'));
    }

    /**
     * Store a newly created resource in storage. => Customer
     */
    public function store(StoreBookingRequest $request)
    {
        $dataCustomer = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone_number,
            'user_id' => optional(Auth::user())->id, // User dang login
        ];

        $customer = Customer::where([
            'email' => $request->email,
            'phone' => $request->phone_number,
        ])->first(); // lay dau tien

        if (is_null($customer)) { // Chua co customer
            $customer = Customer::create($dataCustomer);
        } else {
            $customer->update($dataCustomer);
        }

        $cart = optional(Cart::content())->first();
        $checkin = Carbon::createFromFormat('d/m/Y', $cart->options->checkin);
        $checkout = Carbon::createFromFormat('d/m/Y', $cart->options->checkout);

        $rooms = $this->bookingService->getRoomsAvailable($cart->id, $checkin, $checkout);
        if ($rooms->count() < $cart->qty) {
            alert()->error('Không còn phòng trống.')
                ->showConfirmButton('OK', '#FF7B54')->autoClose(5000);

            return redirect()->route('home');
        }

        $booking = Booking::create([
            'customer_id' => $customer->id,
            'checkin' => Carbon::createFromFormat('d/m/Y', $cart->options->checkin),
            'checkout' => Carbon::createFromFormat('d/m/Y', $cart->options->checkout),
            'room_type_id' => $cart->id,
            'room_total' => $cart->qty,
            'adults' => $cart->options->adults,
            'children' => $cart->options->children,
            'money_total' => Cart::total() * $cart->options->day_total,
            'note' => $cart->options->note,
        ]);
        // Luu rooms cho bookings
        $booking->rooms()->attach($rooms->take($cart->qty)->pluck('id')->toArray());

        BookingWasCreatedEvent::dispatch($booking); // Phát đi sự kiện là booking được tạo ra

        alert()->success(__('messages.booking_successfully'))
            ->showConfirmButton('OK')->autoClose(5000);

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        // CHi tiết booking của admin
        $booking->rating = $booking->ratings()->first(); // Đánh giá đầu tiên
        $booking->load('customer', 'rooms'); // Load ra thêm quan hệ

        return view('booking.show', compact('booking'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        try {
            DB::beginTransaction();
            $res = $booking->update([
                'status' => $request->status,
            ]);
            DB::commit();

            return $res;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        // Huủ đặt phòng: Nếu status là pending thì mới được hủy
        if ($booking->status === BookingStatus::PENDING) {
            $booking->update([
                'status' => BookingStatus::CANCELED,
            ]);
        }

        return $booking;

    }

    /**
     * Lay danh sach lich su dat phong -> Customer
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function getBookingHistory()
    {
        // Lấy ra danh sách lịch sử đặt phòng của khách
        $customer = optional(Auth::user())->customer;
        $bookings = collect(); // Mảng rỗng

        if ($customer) {
            $bookings = $customer->bookings()
                ->with('roomType')
                ->latest()->get();
        }

        return view('customer.my_booking', compact('bookings'));
    }

    /**
     * Customer
     * @param Booking $booking
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function getBookingDetail(Booking $booking)
    {
        // Chi tiết booking trang khách
        $booking->load('customer');
        $booking->rating = $booking->ratings()->first();
        $otherRoomTypes = RoomType::latest()->get();

        return view('customer.booking_detail', compact('booking', 'otherRoomTypes'));
    }

    /**
     * @param Request $request
     * @param Booking $booking
     * @return \Illuminate\Http\RedirectResponse
     * @throws Exception
     */
    public function rateBooking(Request $request, Booking $booking)
    {
        // Đánh giá đặt phòng
        try {
            DB::beginTransaction();
            $booking->rate($request->rating, $request->comment);
            $booking->roomType->rate($request->rating, $request->comment);
            DB::commit();

            return redirect()->back()->with('success', __('messages.successfully'));
        } catch (Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    /**
     * @param Booking $booking
     * @return \Illuminate\Http\RedirectResponse
     */
    public function payBooking(Booking $booking)
    {
        // Thanh toan
        // B1: Gui request dang Paypal (voi cac tham so) -> de tao mot payment -> tra ve cho minh mot duong link url
        $response = $this->paypalService->requestPayment($booking);

        if ($response && $response->isRedirect()) {
            $booking->payment_id = $response->getData()['id'];
            $booking->save();

            // Redirect den trang thanh toan cua paypal
            $response->redirect();
        }

        toast('Có lỗi xảy ra. Vui lòng thử lại', 'error');
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function paymentSuccess(Request $request)
    {
        if ($request->input('paymentId') && $request->input('PayerID')) {
            // Gui request sang paypal kèm theo PayerID và paymentID để hoàn thành viec thanh toan
            $response = $this->paypalService->completePayment($request->input('PayerID'), $request->input('paymentId'));

            if ($response) {
                $paymentId = $response->getData()['id'];
                $booking = Booking::where('payment_id', $paymentId)->first();
                $booking->update([
                    'status' => BookingStatus::PAID, // Update trang thai thanh thanh toan thanh cong
                ]);
                BookingWasPaidEvent::dispatch($booking); // Phat di su kien thanh toan gui mail
                alert()->success('Thanh toán thành công!')
                    ->showConfirmButton('OK', '#FF7B54')->autoClose(5000);

                return redirect()->route('my_bookings.show', ['booking' => $booking->id]);
            }
        }

        toast('Có lỗi xảy ra. Vui lòng thử lại', 'error');
        return redirect()->route('home');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function paymentError()
    {
        return redirect()->route('home');
    }
}

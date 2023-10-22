<?php

namespace App\Http\Controllers;

use App\Enums\BookingStatus;
use App\Events\BookingWasCreatedEvent;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Services\BookingService;
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
     */
    public function __construct(private readonly BookingService $bookingService)
    {
    }

    /**
     * Display a listing of the resource. => Admin
     */
    public function index()
    {
        $this->authorize('viewAny', Booking::class);
        $bookings = Booking::latest()
            ->with(['customer'])->get();

        return view('booking.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource. => Ko check quyên => customer
     */
    public function create(Request $request, RoomType $roomType)
    {
        // Kiểm tra xem còn đủ phòng trống hay không
        $checkin = Carbon::createFromFormat('d/m/Y', $request->checkin);
        $checkout = Carbon::createFromFormat('d/m/Y', $request->checkout);
        $rooms = $this->bookingService->getRoomsAvailable($roomType->id, $checkin, $checkout);
        if ($rooms->count() < (int) $request->room_total) {
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
            'weight' => 1,
            'options' => [
                'avatar_link' => $roomType->avatar_link,
                'checkin' => $request->checkin,
                'checkout' => $request->checkout,
                'adults' => $request->adults,
                'children' => $request->children,
                'images' => $roomType->images,
                'day_total' => $checkin->diffInDays($checkout),
            ],
        ]);

        return redirect()->route('rooms.booking.view');
    }

    /**
     * Customer
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
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
            'user_id' => optional(Auth::user())->id,
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
        if ($rooms->isEmpty()) {
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
        ]);
        $booking->rooms()->attach($rooms->first()->id);

        BookingWasCreatedEvent::dispatch($booking);

        alert()->success(__('messages.booking_successfully'))
            ->showConfirmButton('OK')->autoClose(5000);

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        // Đo trạng thái => Hủy => $booking->customer_id == $user->id
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
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
        $customer = optional(Auth::user())->customer;
        $bookings = collect();

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
        $booking->load('customer');
        $booking->rating = $booking->ratings()->first();

        return view('customer.booking_detail', compact('booking'));
    }

    /**
     * @param Request $request
     * @param Booking $booking
     * @return \Illuminate\Http\RedirectResponse
     * @throws Exception
     */
    public function rateBooking(Request $request, Booking $booking)
    {
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
}

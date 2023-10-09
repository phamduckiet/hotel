<?php

namespace App\Http\Controllers;

use App\Events\BookingWasCreatedEvent;
use App\Http\Requests\StoreBookingRequest;
use App\Models\Booking;
use App\Models\Customer;
use App\Models\RoomType;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::latest()
            ->with(['customer'])->get();

        return view('booking.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, RoomType $roomType)
    {
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
            ],
        ]);

        return redirect()->route('rooms.booking.view');
    }

    public function showBookingView()
    {
        $cart = optional(Cart::content())->first();

        return view('customer.booking', compact('cart'));
    }

    /**
     * Store a newly created resource in storage.
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
        $booking = Booking::create([
            'customer_id' => $customer->id,
            'checkin' => Carbon::createFromFormat('d/m/Y', $cart->options->checkin),
            'checkout' => Carbon::createFromFormat('d/m/Y', $cart->options->checkout),
            'room_type_id' => $cart->id,
            'room_total' => $cart->qty,
            'adults' => $cart->options->adults,
            'children' => $cart->options->children,
        ]);

        // Tim phong trong
        $roomIds = [1];
        $booking->rooms()->attach($roomIds);

        BookingWasCreatedEvent::dispatch($booking);

        alert()->success(__('messages.booking_succesfully'))
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        //
    }
}

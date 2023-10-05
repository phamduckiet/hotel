<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingRequest;
use App\Models\Booking;
use App\Models\Customer;
use App\Models\RoomType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $checkin = $request->query('checkin', null); // Lay ra query paramater
        $checkout = $request->query('checkout', null);
        $adults = $request->query('adults', null);
        $children = $request->query('children', null);
        $roomTypeId = (int) $request->query('room_type_id', null);
        $step = (int) $request->query('step', 1);

        $roomTypes = RoomType::latest()->get();

        $selectedRoom = RoomType::find($request->query('selected_room_id', null));

        // Ket qua tim kiem
        $roomResult = RoomType::latest()
        //    ->when($roomTypeId, static function($query) use ($roomTypeId) {
        //        return $query->where('id', $roomTypeId);
        //    })
            ->get();

        return view('customer.booking', [
            'checkin' => $checkin,
            'checkout' => $checkout,
            'adults' => $adults,
            'children' => $children,
            'roomTypeId' => $roomTypeId,
            'step' => $step,
            'roomTypes' => $roomTypes,
            'roomResult' => $roomResult,
            'selectedRoom' => $selectedRoom,
        ]);
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

        $booking = Booking::create([
            'customer_id' => $customer->id,
            'checkin' => Carbon::createFromFormat('d/m/Y', $request->checkin),
            'checkout' => Carbon::createFromFormat('d/m/Y', $request->checkout),
            'room_type_id' => $request->room_type_id,
            'room_total' => 1,
        ]);

        // Tim phong trong
        $roomIds = [1];
        $booking->rooms()->attach($roomIds);
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

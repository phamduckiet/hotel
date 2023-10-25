<?php

namespace App\Http\Controllers;

use App\Http\Services\BookingService;
use App\Models\Floor;
use App\Models\RoomType;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * @param BookingService $bookingService
     */
    public function __construct(private readonly BookingService $bookingService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function about(Request $request)
    {
        $users = User::isAdmin()->get();
        return view('customer.about', compact('users'));
    }
    public function index(Request $request)
    {
        if ($request->checkin && $request->checkout) { // Nếu người dùng query theo chekcin va checkout
            $roomTypes = $this->getRoomTypesByCheckinAndCheckout($request);
        } else {
            $roomTypes = RoomType::latest()
                ->with('rooms')
                ->when($request->adults, function ($query) use ($request) {
                    return $query->where('max_adults', '>=', $request->adults);
                })
                ->when($request->children, function ($query) use ($request) {
                    return $query->where('max_children', '>=', $request->children);
                })
                ->get();
        }

        $roomTypes = $roomTypes->map(function ($item) use ($request) {
            $roomTotal = $request->room_total ?? 1;
            $item->is_available = $item->rooms->count() >= $roomTotal;

            return $item;
        });

        $users = User::isAdmin()->get();

        return view('customer.home', compact('roomTypes', 'users'));
    }

    public function showRoomDetail(RoomType $roomType)
    {
        $roomType->load('rooms');

        return view('customer.room_detail', compact('roomType'));
    }

    private function getRoomTypesByCheckinAndCheckout($request) {
        // Lay ra room type + rooms + bookings co tgian checkin / checkout vi pham
        $roomTypes = RoomType::latest()
            ->with('rooms.bookings', function ($query) use ($request) {
                return $query->when($request->checkin && $request->checkout, static function($query) use ($request) {
                    return $query->whereDate('checkout', '>', $request->checkin)
                        ->whereDate('checkin', '<', $request->checkout);
                });
            })
            ->when($request->adults, function ($query) use ($request) {
                return $query->where('max_adults', '>=', $request->adults);
            })
            ->when($request->children, function ($query) use ($request) {
                return $query->where('max_children', '>=', $request->children);
            })
            ->get();

        // Lay ra  cac rooms ma co bookings = []
        foreach ($roomTypes as $item) {
            $rooms = $item->rooms->filter(function ($room) {
                return $room->bookings->count() === 0;
            });
            $item->setRelation('rooms', $rooms);
        }

        return $roomTypes;
    }
}

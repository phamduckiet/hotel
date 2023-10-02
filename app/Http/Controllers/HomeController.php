<?php

namespace App\Http\Controllers;

use App\Models\Floor;
use App\Models\RoomType;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roomTypes = RoomType::select('room_types.*')
            ->leftJoin('rooms', 'room_types.id', '=', 'rooms.type_id')
            ->groupBy('room_types.id')
            ->havingRaw('COUNT(rooms.id) > 0')
            ->get();

        return view('customer.home', compact('roomTypes'));
    }

    public function showRoomDetail(RoomType $roomType)
    {
        $roomType->load('rooms', 'rooms.images');

        return view('customer.room_detail', compact('roomType'));
    }
}

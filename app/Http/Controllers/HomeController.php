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
        $roomTypes = RoomType::latest()->withCount('rooms')->get()->where('rooms_count', '>', 0);

        return view('customer.home', compact('roomTypes'));
    }

    public function showRoomDetail(RoomType $roomType)
    {
        // $roomType->load('room_types', 'room_types.images');

        return view('customer.room_detail', compact('roomType'));
    }
}

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
        $roomTypes = RoomType::latest()->get();

        return view('customer.home', compact('roomTypes'));
    }
}

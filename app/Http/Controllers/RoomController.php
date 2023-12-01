<?php

namespace App\Http\Controllers;

use App\Enums\BookingStatus;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Models\Floor;
use App\Models\Room;
use App\Models\RoomType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny', Room::class);

        if (!$request->date) {
            $date = now()->format('Y-m-d');
            return redirect("/rooms/?date=$date");
        }

        $floors = Floor::with([
            'rooms',
            'rooms.roomType',
            'rooms.bookings' => function ($query) use ($request) {
                return $query->whereDate('checkin', '<=', $request->date)
                    ->whereDate('checkout', '>=', $request->date);
            },
        ])->get();
        $roomTypes = RoomType::latest()->get();

        $busyRoomIds = collect();
        if ($request->date) {
            $busyRoomIds = Room::query()
                ->whereHas('bookings', function ($query) use ($request) {
                    return $query->whereDate('checkin', '<=', $request->date)
                        ->whereDate('checkout', '>=', $request->date)
                        ->where('status', '<>', BookingStatus::CHECKED_OUT);
                })->pluck('id');
        }

        foreach($floors as $floor) {
            foreach ($floor->rooms as $room) {
                if ($busyRoomIds->contains($room->id)) {
                    $room->is_available = false;
                } else {
                    $room->is_available = true;
                }
            }
        }

        $date = Carbon::createFromFormat('Y-m-d', $request->date)->format('d/m/Y');

        return view('room.index', compact('floors', 'roomTypes', 'date'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Room::class);
        $roomTypes = RoomType::latest()->get();
        $floors = Floor::all();

        return view('room.create', compact('roomTypes', 'floors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoomRequest $request)
    {
        $this->authorize('create', Room::class); // phan quyen

        try {
            DB::beginTransaction();
            $filePath = optional($request->file('avatar'))->store('images', ['disk' => 'public_storage']);

            Room::create([
                'name' => $request->name,
                'avatar_url' => $filePath,
                'type_id' => $request->type_id,
                'floor_id' => $request->floor_id,
            ]);

            DB::commit();

            return redirect()->route('rooms.index')
            ->with('success', __('messages.successfully'));
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function edit(Room $room)
    {
        $this->authorize('update', $room);

        $roomTypes = RoomType::latest()->get();
        $floors = Floor::all();
        return view('room.edit', compact('room', 'roomTypes', 'floors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoomRequest $request, Room $room)
    {
        $this->authorize('update', $room);

        try {
            DB::beginTransaction();
            $filePath = $room->avatar_url;
            if ($request->file('avatar')) {
                $filePath = optional($request->file('avatar'))->store('images', ['disk' => 'public_storage']);
            }
            $room->update([
                'name' => $request->name,
                'avatar_url' => $filePath,
                'type_id' => $request->type_id,
                'floor_id' => $request->floor_id,
            ]);

            DB::commit();
            return redirect()->route('rooms.index')
            ->with('success', __('messages.successfully'));
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        $this->authorize('delete', $room);

        return $room->delete();
    }
}

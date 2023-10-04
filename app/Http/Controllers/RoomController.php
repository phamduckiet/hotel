<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Models\Floor;
use App\Models\Image;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $floors = Floor::with('rooms', 'rooms.roomType')->get();
        $roomTypes = RoomType::latest()->get();
        return view('room.index', compact('floors', 'roomTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roomTypes = RoomType::latest()->get();
        $floors = Floor::all();

        return view('room.create', compact('roomTypes', 'floors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoomRequest $request)
    {
//        $this->authorize('create', Room::class); // phan quyen

        try {
            DB::beginTransaction();
            $filePath = optional($request->file('avatar'))->store('images', ['disk' => 'public_storage']);

            $room = Room::create([
                'name' => $request->name,
                'avatar_url' => $filePath,
                'type_id' => $request->type_id,
                'floor_id' => $request->floor_id,
            ]);

            // foreach ($request->file('images', []) as $image) {
            //     $filePath = $image->store('images', ['disk' => 'public_storage']);
            //     $room->images()->create(['url' => $filePath]);
            // }

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
        $roomTypes = RoomType::latest()->get();
        $floors = Floor::all();
        return view('room.edit', compact('room', 'roomTypes', 'floors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoomRequest $request, Room $room)
    {
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
        return $room->delete();
    }

    public function showRoomImages(Room $room)
    {
        return response()->json($room->images);
    }

    public function deleteRoomImage(Room $room, $imageId)
    {
//        $this->authorize('update', $product);

        if ($imageId) {
            return $room->images()->whereId($imageId)->delete();
        }

        return null;
    }

    public function storeRoomImage(Request $request, Room $room)
    {
//        $this->authorize('update', $product);

        $filePath = optional($request->file('image'))->store('images', ['disk' => 'public_storage']);
        $room->images()->create(['url' => $filePath]);

        return response()->json('success');
    }
}

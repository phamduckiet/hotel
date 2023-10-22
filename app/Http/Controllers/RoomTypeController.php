<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoomTypeRequest;
use App\Http\Requests\UpdateRoomTypeRequest;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', RoomType::class);
        $roomTypes = RoomType::all();

        return view('room-type.index', compact('roomTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', RoomType::class);
        return view('room-type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoomTypeRequest $request)
    {
        $this->authorize('create', RoomType::class);

        try {
            DB::beginTransaction();
            $filePath = optional($request->file('avatar'))->store('images', ['disk' => 'public_storage']);

            $roomType = RoomType::create([
                'name' => $request->name,
                'avatar' => $filePath,
                'max_adults' => $request->max_adults,
                'max_children' => $request->max_children,
                'price' => $request->price,
                'description' => $request->description,
            ]);

            foreach ($request->file('images', []) as $image) {
                $filePath = $image->store('images', ['disk' => 'public_storage']);
                $roomType->images()->create(['url' => $filePath]);
            }

            DB::commit();

            return response()->json($roomType);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(RoomType $roomType)
    {
        $this->authorize('view', $roomType);

        return $roomType;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RoomType $roomType)
    {
        $this->authorize('update', $roomType);

        return view('room-type.edit', compact('roomType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoomTypeRequest $request, RoomType $roomType)
    {

        $this->authorize('update', $roomType);

        try {
            DB::beginTransaction();
            $filePath = $roomType->avatar;
            if ($request->file('avatar')) {
                $filePath = optional($request->file('avatar'))->store('images', ['disk' => 'public_storage']);
            }
            $roomType->update([
                'name' => $request->name,
                'avatar' => $filePath,
                'max_adults' => $request->max_adults,
                'max_children' => $request->max_children,
                'price' => $request->price,
                'description' => $request->description,
            ]);

            DB::commit();
            return redirect()->route('room-types.index')
            ->with('success', __('messages.successfully'));
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RoomType $roomType)
    {
        $this->authorize('delete', $roomType);

        return $roomType->delete();
    }

    public function showRoomImages(RoomType $RoomType)
    {
        return response()->json($RoomType->images);
    }

    public function deleteRoomImage(RoomType $RoomType, $imageId)
    {
        $this->authorize('update', $RoomType);

        if ($imageId) {
            return $RoomType->images()->whereId($imageId)->delete();
        }

        return null;
    }

    public function storeRoomImage(Request $request, RoomType $roomType)
    {
        $this->authorize('update', $roomType);

        $filePath = optional($request->file('image'))->store('images', ['disk' => 'public_storage']);
        $roomType->images()->create(['url' => $filePath]);

        return response()->json('success');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use willvincent\Rateable\Rating;

class RatingController extends Controller
{
    public function index()
    {
        $ratings = Rating::where('rateable_type', Booking::class)
            ->with('user', 'rateable')
            ->latest()->get();

        return view('rating.index', compact('ratings'));
    }

    /**
     * @throws Exception
     */
    public function update(Request $request, Rating $rating)
    {
        try {
            DB::beginTransaction();
            $rating->is_active = $request->status;
            $roomType = $rating->rateable->roomType;
            $roomType->ratings()->where([
                'user_id' => $rating->user_id,
                'comment' => $rating->comment,
            ])->update(['is_active' => $request->status]);
            $rating->save();
            DB::commit();

            return true;
        } catch (Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
}

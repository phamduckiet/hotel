<?php

namespace App\Http\Services;

use App\Models\Room;
use Carbon\Carbon;

class BookingService
{
    /**
     * @param int $roomTypeId
     * @param Carbon $checkin
     * @param Carbon $checkout
     * @return mixed
     */
    public function getRoomsAvailable(int $roomTypeId, Carbon $checkin, Carbon $checkout)
    {
        $invalidRoomIds = Room::where('type_id', $roomTypeId)
            ->whereHas('bookings', function ($query) use ($checkin, $checkout) {
                return $query->whereDate('checkout', '>', $checkin)
                    ->whereDate('checkin', '<', $checkout);
            })->pluck('id')->toArray();

        return Room::where('type_id', $roomTypeId)
            ->whereNotIn('id', $invalidRoomIds)->get();
    }
}

<?php

namespace App\Http\Services;

use App\Enums\BookingStatus;
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
        // Lấy danh sách các phòng còn trống
        $invalidRoomIds = Room::where('type_id', $roomTypeId)
            ->whereHas('bookings', function ($query) use ($checkin, $checkout) {
                return $query->whereDate('checkout', '>', $checkin)
                    ->whereDate('checkin', '<', $checkout)
                    ->where('status', '<>', BookingStatus::CHECKED_OUT);
            })->pluck('id')->toArray(); // Lấy ra mảng ca room_ids không hợp lệ

        return Room::where('type_id', $roomTypeId)
            ->whereNotIn('id', $invalidRoomIds)->get();
    }
}

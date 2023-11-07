<?php

namespace App\Enums;

final class BookingStatus
{
    public const PENDING = 'pending'; // Chờ xác nhaận

    public const CONFIRMED = 'confirmed'; // Đã xác nhận

    public const PAID = 'paid'; // Thanh toán thành công

    public const CANCELED = 'canceled'; // Bị huy

    public const CHECKED_IN = 'checked_in'; // Đã nhận phòng

    public const CHECKED_OUT = 'checked_out'; // Đã trả phon
}

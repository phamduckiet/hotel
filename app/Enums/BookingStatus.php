<?php

namespace App\Enums;

final class BookingStatus
{
    public const PENDING = 'pending';

    public const CONFIRMED = 'confirmed';

    public const PAID = 'paid';

    public const CANCELED = 'canceled';

    public const CHECKED_IN = 'checked_in';

    public const CHECKED_OUT = 'checked_out';
}

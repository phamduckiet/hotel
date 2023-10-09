<?php

namespace App\Listeners;

use App\Events\BookingWasCreatedEvent;
use App\Mail\BookingConfirmationEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendBookingConfirmationEmailListener implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(BookingWasCreatedEvent $event): void
    {
        $booking = $event->booking;

        Mail::to($booking->customer->email)->send(new BookingConfirmationEmail($booking));
    }
}

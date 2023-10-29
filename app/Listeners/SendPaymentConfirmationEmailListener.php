<?php

namespace App\Listeners;

use App\Events\BookingWasPaidEvent;
use App\Mail\BookingConfirmationEmail;
use App\Mail\PaymentConfirmationEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendPaymentConfirmationEmailListener implements ShouldQueue
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
    public function handle(BookingWasPaidEvent $event): void
    {
        $booking = $event->booking;

        Mail::to($booking->customer->email)->send(new PaymentConfirmationEmail($booking));
    }
}

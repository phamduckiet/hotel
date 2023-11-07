<?php

namespace App\Mail;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BookingConfirmationEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    private Booking $booking;

    /**
     * Create a new message instance. -> hàm khởi tạo
     */
    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Khách sạn K Hotel xác nhận đặt phòng thành công', // Tiêu đề mail
        );
    }

    /**
     * Get the message content definition. -> Nội dung mail
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.booking',
            with: [
                'booking' => $this->booking, // data truyền vào view
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        // Đính kèm hóa đơn...
        return [];
    }
}

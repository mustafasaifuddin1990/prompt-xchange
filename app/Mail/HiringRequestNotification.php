<?php
namespace App\Mail;

use App\Models\HireRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class HiringRequestNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $hiringRequest;

    /**
     * Create a new message instance.
     */
    public function __construct(HireRequest $hiringRequest)
    {
        $this->hiringRequest = $hiringRequest;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Hiring Request Notification',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(

            view: 'emails.hiring_request', // Ensure this is the correct path to your view
            with: [
                'creatorName' => $this->hiringRequest->contentCreator->name ?? 'None'  ,
                'generalUserName' => $this->hiringRequest->generalUser->name ?? 'None' ,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}

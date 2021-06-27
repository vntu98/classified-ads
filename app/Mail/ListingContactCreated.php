<?php

namespace App\Mail;

use App\Listing;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ListingContactCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $listing;
    public $sender;
    public $body;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Listing $listing, User $user, $message)
    {
        $this->listing = $listing;
        $this->sender = $user;
        $this->body = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.listing.contact.message')
            ->subject("{$this->sender->name} sent a message about {$this->listing->title}")
            ->from('hello@fresh.com')
            ->replyTo($this->sender->email);
    }
}

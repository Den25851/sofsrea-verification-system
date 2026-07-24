<?php

namespace App\Mail;

use App\Models\Member;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MemberRegistrationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $member;
    public $certificate;

    /**
     * Create a new message instance.
     */
    public function __construct(Member $member)
    {
        $this->member = $member;

        // Get the newest certificate for this member
        $this->certificate = $member->certificates()->latest()->first();
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Welcome to SOFSREA – Membership Confirmation')
                    ->view('emails.member-registration');
    }
}
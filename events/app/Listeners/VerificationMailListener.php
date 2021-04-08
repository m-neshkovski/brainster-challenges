<?php

namespace App\Listeners;

use App\Events\SendVerificationEmail;
use App\Mail\UserEmailVerification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class VerificationMailListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SendVerificationEmail  $event
     * @return void
     */
    public function handle(SendVerificationEmail $event)
    {
        Mail::to($event->user->email)->send(new UserEmailVerification($event->user));
    }
}

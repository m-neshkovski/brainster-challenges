<?php

namespace App\Listeners;

use App\Events\SetUserAsActive;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\User;

class ActivateUser
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
     * @param  SetUserAsActive  $event
     * @return void
     */
    public function handle(SetUserAsActive $event)
    {
        $user = User::find($event->user->id);
        $user->is_active = true;
        $user->save();
    }
}

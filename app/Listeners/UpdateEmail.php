<?php

namespace App\Listeners;

use App\Events\SendUpdateEmailEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class UpdateEmail
{
    public function handle(SendUpdateEmailEvent $event)
    {
        Mail::to($event->user->email)->send(new \App\Mail\UpdateEmail());

    }
}

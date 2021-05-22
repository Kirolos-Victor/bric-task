<?php

namespace App\Listeners;

use App\Events\SendCreateEmailEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class CreateEmail
{

    public function handle(SendCreateEmailEvent $event)
    {
        Mail::to($event->user->email)->send(new \App\Mail\CreateEmail());
    }
}

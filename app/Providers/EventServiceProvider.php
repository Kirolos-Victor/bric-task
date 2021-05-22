<?php

namespace App\Providers;

use App\Events\SendCreateEmailEvent;
use App\Events\SendUpdateEmailEvent;
use App\Listeners\CreateEmail;
use App\Listeners\UpdateEmail;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        SendCreateEmailEvent::class => [
            CreateEmail::class,
        ],
        SendUpdateEmailEvent::class => [
            UpdateEmail::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}

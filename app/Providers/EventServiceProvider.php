<?php

namespace App\Providers;

use Log;
use App\Events\Event as EventT;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\Event' => [
            'App\Listeners\EventListener',
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
        /**
        Event::listen('event.*', function ($eventName, array $data) {
            Log::debug($eventName);
        });
        Log::debug(123);
        event(new EventT([]));
        //
        **/
    }
}

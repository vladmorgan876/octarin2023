<?php

namespace App\Listeners;

use App\Events\MyEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class MyEventHendler
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

    public function handle(MyEvent $event)
    {
        Log::channel('eventlogging')->debug('клиент '.$event->username.' сделал заказ. его почта:'.$event->email,);
    }
}

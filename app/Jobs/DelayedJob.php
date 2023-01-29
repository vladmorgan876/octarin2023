<?php

namespace App\Jobs;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use  \Illuminate\Support\Facades\Mail;
class DelayedJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
     protected $order;

    public function __construct(Order $order)
    {
       $this->order=$order;
    }

    public function handle()
    {
        Log::channel('DelayedJobLogging')->debug('заказ принят',$this->order->toArray());
        mail('volodymyr.morhunov@gmail.com', 'Тема письма', 'привет мой дорогой вовочка', 'From: wowamorgan@gmail.com');

    }
}

<?php

namespace App\Http\Controllers;

use App\Jobs\DelayedJob;
use App\Listeners\MyEventHendler;
use App\Models\Order;
//use App\Providers\MyEvent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;
use App\Events;
use App\Events\MyEvent;
use App\Events\MailEvent;

class OrderController extends Controller
{
    public function MakeOrder(Request $request)
    {
        $order=new Order();
        $order->username = $request->username;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->viber = $request->viber;
        $order->telegram = $request->telegram;
        $order->whatsapp = $request->whatsapp;
        $order->textuser = $request->textuser;
        $order->productname = $request->productname;
        $order->productprice = $request->productprice;
        $order->productquantity = $request->productquantity;
        $order->category=$request->category;
        $order->status='принят';
        $order->orderdate= date('Y-m-d');
        $order->totalsum=$request->productprice*$request->productquantity;
        $order->save();
        //---------- ЛОГГИРОВАНИЕ    -----------------------------
      //  в config/logging регистрирую канал orderlogging
   // если не регистрировать канал то все записи будут отправляться в файл логгирования созданный по умолчанию ларавелем
        Log::channel('orderlogging')->debug('заказ принят',$order->toArray());

     //----------------------------------------------------------
        //--------   СОБЫТИЯ -----------
//        MyEvent::dispatch($order);//происходит событие

//        MyEvent::dispatch($order->username, $order->email);//происходит событие
//        MailEvent::dispatch($order->username, $order->email);//происходит событие

//в папке EventServiseProvider регистрирую событие и слушателя в консоли команда $php artisan event:generate
//    оздаются две папки EVENT  и LISTENERS ...из контроллера где должно произойти событие MyEvent::dispatch($order->username, $order->email)(в событие MyEvent
//    ::dispatch(отправляю что-то)) в MyEvent прописываю свойства и в конструкторе присваиваю этим свойствам то что прилетело
//    в аргументы далее это летит в слушателя(MyEventHendler)...в слушателе в аргументах прописываю 1-арг:название события и объект event
//    свойствами которого являються данные передаваемые из события MyEvent в слушателе (MyEventHendler) делаю
//    с данными что хочу
//    ВАЖНО: Не забыть EventServiseProvider подключить событие и слушателя,в слушателе(MyEventHendler) и контроллере
//        подключить событие MyEvent
        // из контроллера данные можно передавать как одним объектом
        // так и частями
        // ПРОСМОТРИ ПРИМЕР
   //-------------------------------------------------------------------
//------------------  ОЧЕРЕДИ  -------------------------------
//        Создаю новый экземпляр класса обработчика заданий DelayedJob и передаю в конструктор $order
//        вся логика в DelayedJob
       dispatch(new DelayedJob($order));
        //$this->dispatch(new DelayedJob($order));
        //----------------------------------------------------------
            return response()->json([
                "message" => "New order is created"
            ]);



    }


}

<?php

namespace App\Listeners;

use App\Events\MailEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Mail;

class MailHendler
{
    public $name;
//    public $username;
    public $email;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  MailEvent  $event
     * @return void
     */
   public function handle(MailEvent $event)
    {
//      \Illuminate\Support\Facades\Mail::send(['text'=>'mail'],['name','octarine_art'],function ($message){
//    $message->to('v.m@gmail.com','получатель')->subject('Сообщение от OCTARINE_ART');
//    $message->from('wowa@gmail.com','отправитель');
//      });

        mail('v.m@gmail.com', 'Тема письма', 'привет мой дорогой', 'From: wowa@gmail.com');

//       $this->name=$event->username;
//       $this->email=$event->email;
//       \Illuminate\Support\Facades\Mail::send('v.m@gmail.com', 'Тема письма', 'Отправка почты через локальный сервер openserver');


//        $this->name=$event->username;
//        $this->email=$event->email;
////        $data = array('name'=>$event->username);
//        $data = array('name'=>$this->name);
//        \Illuminate\Support\Facades\Mail::send(['text'=>'mail'], $data, function($message) {
//         //  $message->to('v.m@gmail.com', $this->name)->subject
//            $message->to($this->email, $this->name)->subject
//            ('Сообщение от OCTARINE_ART');
//            $message->from('wowa@gmail.com','отправитель');
//        });


       $to_name = 'vova';
       $to_email = 'v.m@gmail.com';
       $data = array('name'=>"Sam Jose", "body" => "Test mail");
       \Illuminate\Support\Facades\Mail::send('mail', $data, function($message) use ($to_name, $to_email) {
           $message->to($to_email, $to_name)->subject('Artisans Web Testing Mail');
           $message->from('FROM_EMAIL_ADDRESS','Artisans Web');
       });


    }
}

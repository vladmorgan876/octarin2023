<?php

namespace App\Http\Controllers;

use App\Models\message;
use Illuminate\Http\Request;
use \App\Models\Order;
use Illuminate\Support\Facades\Auth;


class UserCabinetController extends Controller
{

    public function index(){
                if(isset(Auth::user()->name)==true){
            $clientName=Order::where('username',Auth::user()->name)->get('username');
            if(isset($clientName[0])){
                return view('UserCabinet');
            }
            if(isset($clientName[0])==false){
                return view('unknowuser');
            }
        }
    }
    public function MyOrders(){
        $clientsOrders=Order::where('username',Auth::user()->name)->get();
            return view('UserCabinet')->with(['clientsOrders' => $clientsOrders]);
    }
    public function message()
    {
        $MessageFromUser=true;
        return view('UserCabinet')->with(['MessageFromUser' => $MessageFromUser]);
    }
    public function SendMessage(Request $request)
    {
        $message=new message();
        $message->username=Auth::user()->name;
        $message->email=Auth::user()->email;
        $message->message=$request->message;
        $message->messagedate= date('Y-m-d');
        $message->save();
        $MessageFromUser=false;
        return view('UserCabinet')->with(['MessageFromUser' => $MessageFromUser]);
    }
    public function ReadMessageFromUsers()
    {
      $AllMessages=message::all();
        return view('AllMessagesFromUsers')->with(['AllMessagesFromUsers' => $AllMessages]);
    }
    public function messagedelete($id)
    {
        message::where('id', $id)->delete();
        return redirect()->route('ReadMessageFromUsers');
    }
}

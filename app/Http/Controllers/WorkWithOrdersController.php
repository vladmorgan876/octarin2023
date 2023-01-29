<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use Illuminate\Support\Facades\Log;

class WorkWithOrdersController extends Controller
{
    public function index(){
        return view('OrderPage1');
    }
    public function showListOrders(){
        $allOrders = DB::table('orders')->get();
        return view('OrderPage1')->with(['allOrders' => $allOrders]);
    }
    public function selectOrderByDate(Request $request){
        $this->orderdate = $request->selectdate;
        $selectOrderByDate = DB::table('orders')->where('orderdate', $this->orderdate)->get();
//        var_dump(count($selectOrderByDate));
        return view('OrderPage1')->with(['selectOrderByDate' => $selectOrderByDate,'date'=>$this->orderdate]);
    }
    public function selectOrderByPeriod(Request $request){
        $this->date1=$request->selectdate1;
        $this->date2=$request->selectdate2;
        $selectOrderByPeriod = DB::table('orders')->whereBetween('orderdate',[$this->date1,$this->date2] )->get();
        return view('OrderPage1')->with(['selectOrderByPeriod' => $selectOrderByPeriod,'date1'=>$this->date1,'date2'=>$this->date2]);
    }
    public function orderdelete($id){
        $order=Order::find($id);
        Order::where('id',$id)->delete();
        Log::channel('orderlogging')->debug('заказ удален из базы данных',$order->toArray());
        return redirect()->route('ListOrders');
    }
    public function ordercompleted($id){
        $order=Order::find($id);
        $order->status='выполнен';
        $order->ordercompleted=date('Y-m-d');
        $order->save();
        Log::channel('orderlogging')->debug('статус заказа изменен на "выполнен"',$order->toArray());
        return redirect()->route('ListOrders');
    }
    public function showCompletedOrders(){
        $completedOrders = DB::table('orders')->where('status', 'выполнен')->get();
        return view('OrderPage1')->with(['completedOrders' => $completedOrders]);
    }
    public function showNotDoneOrders(){
        $noDoneOrders = DB::table('orders')->where('status', 'принят')->get();
        return view('OrderPage1')->with(['noDoneOrders' => $noDoneOrders]);
    }
    public function selectClient(Request $request){
       $client=DB::table('orders')->where('username',$request->selectclient)->get();
        return view('OrderPage1')->with(['client' => $client]);
    }
    public function selectClientByPhone(Request $request){
        $this->phone = $request->selectClientByPhone;
        $clientByPhone=DB::table('orders')->where('phone',$this->phone)->get();
        return view('OrderPage1')->with(['clientByPhone' => $clientByPhone]);
    }
}

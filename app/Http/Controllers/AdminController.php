<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function showform()
    {
        return view('admin');

    }

    public function mainPageAdmin()
    {
        return view('AdminPage');
    }

    public function loginadmin(Request $request)
    {

        $this->name= $request->name;
        $this->password =$request->password;
        $admin=Admin::where('password',$this->password)->get();
        $adminname=Admin::where('name',$this->name)->get();
        if(count($adminname)==1 && count($admin)==1){
            $cookie_name = "user";
            $cookie_value = "admin";
            setcookie($cookie_name, $cookie_value, "/");
            return view('AdminPage');
        }
        else{
            return redirect()->route('showform');
        }
    }
    public function showaction(){
        if(isset($_COOKIE['user'])){
            return view('FormControlData');
        }
        else{
            return redirect()->route('showform');
        }

    }

}

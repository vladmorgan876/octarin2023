<?php

namespace App\Http\Controllers;

use App\Models\message;
use Illuminate\Http\Request;

class CabinetController extends Controller
{
    public function index(){
        return view('cabinet');
    }
    public function getAllMessageForAboutUs(){
        $AllMessages=message::all();
         return $AllMessages;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UnknowUserController extends Controller
{
    public function index(){
        return view('unknowuser');
    }
}

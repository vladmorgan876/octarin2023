<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\Product;

class ControlDataController extends Controller
{
    public function control(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->category = $request->category;
        $product->price = $request->price;
        $product->image = $request->file('image')->store('newimage', 'public');
        $product->defaultINcart=0;
        $product->save();
        return view('FormControlData');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
class EditDeleteDataController extends Controller
{
    public function EditDataInDb(){
        $products=Product::all();
        return view('EditDataInDb')->with(['products' => $products]);
    }

    public function deletedata($id)
    {
        Product::where('id',$id)->delete();
        return redirect()->route('EditDataInDb');
    }
    public function editdata($id)
    {
        $editProduct=Product::where('id',$id)->get();
        return view('EditDataOneProduct')->with(['editProduct' => $editProduct]);
    }
    public function FindByCategory(Request $request)
    {
        $products=Product::where('category',$request->selectcategory)->get();
        return view('EditDataInDb')->with(['products' => $products]);
    }
    public function FindByPrice(Request $request)
    {
        $products=Product::where('price',$request->selectprice)->get();
        return view('EditDataInDb')->with(['products' => $products]);
    }
    public function FindByName(Request $request)
    {
        $products=Product::where('name',$request->selectname)->get();
        return view('EditDataInDb')->with(['products' => $products]);
    }
}

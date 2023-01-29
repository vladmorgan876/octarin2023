<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use Illuminate\Support\Facades\DB;
use Validator;
class ProductController extends Controller
{
    public function getAllproduct2()
    {
         return product::all();
//         для VUEX
    }


    public function index()
    {
       // return product::all();
        $product = product::paginate(8);
        return $product;

    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=Validator::make(
            $request->all(),
            [
                "name"=>["required"],
                "image"=>["required"],
                "category"=>["required"],
                "price"=>["required"],
            ]
        );
        if($validator->fails()){
            return [
                "status"=>false,
                "errors"=>$validator->messages()
            ];
        }
        $product=product::create([
            "name"=>$request->name,
            "image"=>$request->image,
            "category"=>$request->category,
            "price"=>$request->price
        ]);
        return [
            "status"=>true,
            "product"=>$product
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $product=product::find($id);
        if(!$product){
            return response()->json([
                "status"=>false,
                "message"=>"product not found"
            ])->setStatusCode(404);
        }
        return $product;
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class NewEditionProductController extends Controller
{
    public function NewEdition($id, Request $request)
    {
        $product=product::find($id);
        $product->name = $request->name;
        $product->category = $request->category;;
        $product->price = $request->price;;
        $product->image = $request->file('image')->store('newimage', 'public');
        $product->save();
        Log::channel('productlogging')->debug('продукт отредактирован ',$product->toArray());
        return redirect()->route('EditDataInDb');
    }
}

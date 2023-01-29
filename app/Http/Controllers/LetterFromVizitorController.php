<?php

namespace App\Http\Controllers;

use App\Models\Letter;
use Illuminate\Http\Request;

class LetterFromVizitorController extends Controller
{
    public function sendLetterFromVizitor(Request $request){
        $letter=new Letter();
        $letter->letterFromUser=$request->messageFrom;
        $letter->letterText=$request->newMessage;
        $letter->save();
        return response()->json([
            "message" => "All right"
        ]);
    }
    public function GetLettersFromVizitors(){
        $allMessegesFromVizitors=Letter::all();
        return view('AllMessagesFromUsers')->with(['allMessegesFromVizitors'=>$allMessegesFromVizitors]);
    }
    public function LetterFromVizitorDelete($id){
        Letter::where('id', $id)->delete();
        return redirect()->route('GetLettersFromVizitors');
    }
}

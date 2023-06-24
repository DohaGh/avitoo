<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\message;
class MessageController extends Controller
 {
    Public function __construct(){
        $this ->middleware('auth');
    }
    Public function index(){
       $messages = message::where('id_acheteur','=',auth()->user()->id)->paginate(4);
       return view('pagemessage',compact('messages'));
    }
    
    Public function create(Request $request){
        $id_vendeur = $request['id_vendeur'];
        $id_annonce = $request['id_annonce'];
         return  view('message',compact('id_vendeur','id_annonce'));
       
    }
    Public function store(Request $request){
        $message = new message();
        $message -> content = $request['content'];
        $message -> id_vendeur = $request['id_vendeur'];
        $message -> id_acheteur = $request['id_acheteur'];
        $message -> id_annonce = $request['id_annonce'];
        $message ->save();
        
        return redirect()->route('validPg')->with('réussir','Votre message a été bien envoyé');

    }
}

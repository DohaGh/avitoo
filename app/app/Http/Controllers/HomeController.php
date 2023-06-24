<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\message;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $messages=message::where('id_vendeur','=',auth()->user()->id)->get();
        return view('home',compact('messages'));
    }
}

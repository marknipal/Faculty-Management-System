<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use Illuminate\Support\Facades\DB;
use Auth;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $username = Auth::user()->name;
        // $messages = DB::table('messages')->where('recipient', $username)->value('message');
        // $messages = DB::table('messages')->where('recipient', $username)->get();
        // $messages = Message::all();
        // $messages = DB::table('messages')->select('message');
        $messages = DB::table('messages')->select('id', 'message', 'created_at')->where('recipient', '=', $username)->get();


        return view('home', compact('messages'));
    }

}

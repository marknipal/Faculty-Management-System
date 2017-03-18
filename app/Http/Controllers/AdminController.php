<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Reminder;
use App\User;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::all();
        $reminders = Reminder::all();
        $faculty = User::all();
        return view('admin', compact('messages', 'reminders', 'faculty'));
    }

    public function showUsersPage()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function sendMessage(Request $request)
    {
        $message = new Message;
        $message->message = $request->message;
        $message->recipient = $request->recipient;
        $message->save();
        return redirect()->route('admin.dashboard');
    }

    public function setReminder(Request $request)
    {
        $reminder = new Reminder;
        $reminder->reminder = $request->admin_reminder;
        $reminder->save();
        return redirect()->route('admin.dashboard');
    }
}

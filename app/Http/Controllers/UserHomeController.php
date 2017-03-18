<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Reminder;

class UserHomeController extends Controller
{
    public function userHome()
    {
        $messages = Message::all();
        $reminders = Reminder::all();
        return view('user.home', compact('messages', 'reminders'));
    }
}

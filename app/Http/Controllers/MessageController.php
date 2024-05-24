<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class MessageController extends Controller
{

    public function index()
    {
        $messages = Message::all();
        return view('messages', ['messages' => $messages]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        Message::create([
            'name' => $request->post('name'),
            'email' => $request->post('email'),
            'message' => $request->post('message'),
        ]);

        return Redirect::back();
    }
}

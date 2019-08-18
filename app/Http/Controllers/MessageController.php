<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function get(Request $request)
    {
        $messages = Message::where('chat_id', $request->chat)
            ->orderBy('created_at')
            ->get();

        return response()->json(['data' => $messages->toArray()], 200);
    }

    public function add(Request $request)
    {
        $message = new Message;
        $message->chat_id = $request->chat;
        $message->author_id = $request->author;
        $message->text = $request->text;
        $message->save();

        return response()->json($message->id, 200);
    }
}

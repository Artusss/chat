<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostAddMessageRequest;
use App\Http\Requests\PostGetMessageRequest;
use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function get(PostGetMessageRequest $request)
    {
        $messages = Message::where('chat', $request->chat)
            ->orderBy('created_at')
            ->get();

        return response()->json(['data' => $messages->toArray()], 200);
    }

    public function add(PostAddMessageRequest $request)
    {
        $message = new Message;
        $message->chat = $request->chat;
        $message->author = $request->author;
        $message->text = $request->text;
        $message->save();

        return response()->json($message->id, 200);
    }
}

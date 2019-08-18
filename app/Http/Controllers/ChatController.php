<?php

namespace App\Http\Controllers;

use App\Chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function get()
    {

    }

    public function add(Request $request)
    {
        $chat = new Chat;
        $chat->name = $request->name;
        $chat->save();
        $chat->users()->sync($request->users, []);

        return response()->json($chat->id, 200);
    }
}

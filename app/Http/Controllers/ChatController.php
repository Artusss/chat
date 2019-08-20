<?php

namespace App\Http\Controllers;

use App\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    public function get(Request $request)
    {
        $last_message_query = "(SELECT `chat_id` AS `chat`, MAX(`created_at`) as `last_message_created` FROM `messages` GROUP BY `chat`) `last_message`";
        $chats = DB::table('user_chat')->select('chat_id', 'name', 'created_at')
            ->join('chats', 'chats.id', '=', 'user_chat.chat_id')
            ->leftJoin(
                DB::raw($last_message_query), 'last_message.chat', '=', 'chats.id')
            ->where('user_id', $request->user)
            ->orderBy('last_message_created', 'desc')
            ->get();

        return response()->json(['data' => $chats->toArray()], 200);
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

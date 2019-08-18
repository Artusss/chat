<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function add(Request $request)
    {
        $user = new User;
        $user->username = $request->username;
        $user->save();
        return response()->json($user->id, 200);
    }
}

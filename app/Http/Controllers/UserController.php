<?php

namespace App\Http\Controllers;


use App\Http\Requests\PostUserRequest;
use App\User;
use Validator;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function add(PostUserRequest $request)
    {
        $user = new User;
        $user->username = $request->username;
        $user->save();
        return response()->json($user->id, 200);
    }
}

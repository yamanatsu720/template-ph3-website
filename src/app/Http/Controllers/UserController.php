<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); // データベースから全てのユーザーを取得
        // $users = []; // データベースから全てのユーザーを取得
        // return view('users.index', compact('users'));
        return view('users.index', ['users' => $users]);
    }
    
}

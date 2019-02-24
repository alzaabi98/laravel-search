<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    public function index() {

        $users = User::OrderBy('created_at', 'desc')->get();

        return view('users.index', compact('users'));
    }

    public function search( Request $request) {

        $request->validate([

            'q' => 'required'
        ]);

        dd($request->q);
    }
}

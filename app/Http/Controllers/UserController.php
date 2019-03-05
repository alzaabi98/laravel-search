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


        $q = $request->q;

        $filteredUsers = User::where('name', 'like', '%' . $q . '%')
                                ->orWhere('email', 'like', '%' . $q . '%')->get();

        if ($filteredUsers->count()) {

            return view('users.index')->with([
                'users' =>  $filteredUsers
            ]);
        } else {
            
            return redirect('/users')->with([
                'status' => 'search failed ,, please try again'
            ]);
        }
        
    }

    // axios search

    public function searchajax($q) {
        if ($q) {
            $data = User::where('name', 'like' , '%'. $q .'%')->get();

        } else {
            $data = User::all();
        }
        
        return response()->json($data);
    }
}

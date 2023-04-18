<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() {

        return view('register');
    }

    public function store(Request $request) {
        
        $data = $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8',
            'profile' => 'required'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->admin = 0;

        if($request->profile == 1) {
            $user->student = 1;
            $user->professor = 0;
        }else {
            $user->student = 0;
            $user->professor = 1;
        }

        $user->save();

        return redirect('/');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() {

        return view('auth.register');
    }

    public function store(Request $request) {
        
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'profile' => 'required'
        ]);

        $password = random_int(10000000, 99999999);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($password);
        $user->admin = 0;
        $user->new_user = 1;

        if($request->profile == 1) {
            $user->student = 1;
            $user->professor = 0;
        }else {
            $user->student = 0;
            $user->professor = 1;
        }

        $user->save();

        return view('auth.confirmation', ['password' => $password]);
    }

    public function edit($id) {
        
    }

    public function update(Request $request) {

        User::findOrFail($request->id)->update(['password' => $request->password]);
        User::findOrFail($request->id)->update(['new_user' => 0]);

        return redirect('/login');
    }
}

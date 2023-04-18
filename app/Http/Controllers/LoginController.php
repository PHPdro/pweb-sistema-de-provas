<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {

        return view('login');
    }

    public function authenticate(Request $request) {

        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            return redirect('/');
        } else {
            return back()->withErrors([
                'email' => 'Your provided credentials do not match in our records.',
            ])->onlyInput('email');
        }
    }

    public function logout() {

        Auth::logout();

        return redirect('/login');
    }
}

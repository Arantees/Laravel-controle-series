<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function store(Request $request)
    {
        $loginAuth = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!Auth::attempt($loginAuth)) {
            return redirect()->back()->withErrors(['login' => 'Invalid username or password']);
        }

        return redirect()->route('series.index');
    }

    public function destroy()
    {
        Auth::logout();

        return redirect()->route('login.index');
    }
}

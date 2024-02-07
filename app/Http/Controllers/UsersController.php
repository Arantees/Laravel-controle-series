<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;


class UsersController extends Controller
{
    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => ['required', 'confirmed', 
            Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()
                ->uncompromised()
        ],
    ]);    
       
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }
        
        $data = $request->except(['_token']);

        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);
        Auth::login($user);

        return to_route('series.index');
    }
}

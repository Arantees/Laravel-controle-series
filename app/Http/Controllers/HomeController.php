<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController
{
    public function index()
    {
        return view('home.index');
    }
}
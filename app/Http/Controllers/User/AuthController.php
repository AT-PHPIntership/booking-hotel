<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class AuthController extends Controller
{
    /**
    * Display login page for user..
    *
    * @return \Illuminate\Http\Response
    */
    public function showLoginForm()
    {
        return view('user.auth.login');
    }
    /**
    * Display register page for user..
    *
    * @return \Illuminate\Http\Response
    */
    public function showRegisterForm()
    {
        return view('user.auth.register');
    }
}

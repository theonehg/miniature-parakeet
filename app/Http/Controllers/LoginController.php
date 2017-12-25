<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect(route('dashboard'));
        }
        return view('login');
    }

    public function login(Request $request)
    {
        if ($request->filled(['username', 'password'])
            && Auth::attempt($request->only(['username', 'password']))) {

            return redirect(route('dashboard'));
        }
        return view('login', ['error' => true]);
    }

    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
        }
        return redirect(route('login'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    { // Check login no or yes
        if (!Auth::check()) {
            return view('login');
        } else {
            if (Auth::user()->position_id == 1) {
                return redirect(route('leader_after_login'));
            } elseif (Auth::user()->position_id == 2) {
                return redirect(route('sublead_after_login'));
            } elseif (Auth::user()->position_id == 3) {
                return redirect(route('member_after_login'));
            }
        }

    }

    public function login(Request $request)
    {
        //if ($request->filled(['username', 'password'])
//            && Auth::attempt($request->only(['username', 'password']))) {
//
//            return view('admin.home');
//        }
       if (Auth::attempt(['username' => $request->username, 'password' => $request->password, 'position_id' => 1])) {

            return redirect(route('leader_after_login'));

        } elseif (Auth::attempt(['username' => $request->username, 'password' => $request->password, 'position_id' => 2])) {

            return redirect(route('sublead_after_login'));

       } elseif (Auth::attempt(['username' => $request->username, 'password' => $request->password, 'position_id' => 3])) {

            return redirect(route('member_after_login'));

        } else {

            return view('login', ['error' => true]);
         }
    }

    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
        }
        return redirect(route('login'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $userName = Auth::user()->name;
    
            if ($user->usertype === 'admin') {
                //dd($user->usertype);
                return redirect()->route('admin.home');  // Admin Dashboard
            } else {
                return redirect()->route('index');  // User Dashboard
            }
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
}
    
public function logout()
{
    Auth::logout();

    session()->invalidate();
    session()->regenerateToken();

    return redirect('/');
}
}
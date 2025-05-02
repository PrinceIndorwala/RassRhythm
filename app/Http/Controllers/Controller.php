<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function showRegisterForm() {
        return view('auth.register');
    }
    use AuthorizesRequests, ValidatesRequests;


public function register(Request $request) {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6|confirmed',
        'dob' => 'required|date',
        'gender' => 'required|in:Male,Female,Other',
        'address' => 'required|string',
        'phone_no' => 'required|digits:10|unique:users',
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'dob' => $request->dob,
        'gender' => $request->gender,
        'address' => $request->address,
        'phone_no' => $request->phone_no,
    ]);

    return redirect()->route('login')->with('success', 'Registration successful!');
}

    public function showLoginForm() {
        return view('auth.login');
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/');
        }
        return back()->withErrors(['email' => 'Invalid credentials']);
    }
    public function logout() {
        Auth::logout();
        return redirect('/login');
    }
}

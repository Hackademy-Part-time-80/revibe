<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        
        if (Auth::attempt($credentials)) {
            
            $request->session()->regenerate();

            
            return redirect()->route('homepage');
        }

        
        return back()->withErrors([
            'email' => 'Le credenziali fornite non sono corrette.',
        ])->onlyInput('email');
    }
}
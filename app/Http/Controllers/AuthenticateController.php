<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Log;
class AuthenticateController extends Controller
{

        public function showLoginForm()
    {
        return view('auth.login');
    }

    public function postLogin(Request $req)
    {
        $req->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $req->email)->first();

        if ($user && Hash::check($req->password, $user->password)) {
            Auth::login($user);
            $req->session()->regenerate();
            return redirect()->intended(RouteServiceProvider::HOME);
        }

    
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Log::info('User logged out.');
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');


    }
}
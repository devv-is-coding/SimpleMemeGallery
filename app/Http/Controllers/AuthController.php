<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if (Session::has('user_id')) {
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }
    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);
        $credentials = User::where('email', $request->email)->first();

        if ($credentials && Hash::check($request->password, $credentials->password)) {
            Auth::login($credentials);
            Session::put('user_id', $credentials->id);
            Session::regenerate();
            return redirect()->route('dashboard')->with('success', 'Logged in successfully');
        }
        return back()->with('error', 'Invalid credentials');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        Session::pull('user_id');
        Session::flush();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('showLoginForm')->with('success', 'Logged out successfully');
    }
}

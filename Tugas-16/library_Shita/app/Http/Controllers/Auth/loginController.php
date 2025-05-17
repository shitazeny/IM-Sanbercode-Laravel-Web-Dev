<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class loginController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        Log::info('Attempting login with email: ' . $credentials['email']);

        if (Auth::guard('web')->attempt($credentials)) {
            $user = Auth::user();
            Log::info('Authentication successful for email: ' . $request->email);

            if ($user->role === 'user') { 
                Log::info('user has admin role, redirecting to dashboard');
                return redirect()->route('user.home');
            } elseif ($user->role === 'admin') { 
                Log::info('user has user role, redirecting to user dashboard');
                return redirect()->route('admin.home');
            } 
            else {
                Log::warning('user role is not recognized, logging out');
                Auth::logout();
                return redirect()->back()->withErrors(['error' => 'Your role is not recognized.']);
            }
        } else {
            Log::error('Authentication failed for email: ' . $request->email);
            return redirect()->back()->withErrors(['error' => 'Email or Password is incorrect']);
        }
    }

    public function destroy()
    {
        Auth::logout();

        return redirect('/');
    }

    public function logoutaksi()
    {
        Auth::logout();

        return redirect('/')->with('success', 'Logout berhasil.');
    }
}

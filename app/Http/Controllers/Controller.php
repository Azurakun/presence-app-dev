<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

abstract class Controller



{
    /**
     * Handle an incoming authentication request.
     */
    public function login(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        // Attempt to log the user in
        if (Auth::attempt($request->only('email', 'password'))) {
            // Authentication passed, get the authenticated user
            $user = Auth::user();

            // Redirect based on user role
            switch ($user->account_type) {
                case 'Admin':
                    return redirect()->route('dashboardadmin'); // Change to your admin route
                case 'Teacher':
                    return redirect()->route('teacher.dashboard'); // Change to your teacher route
                case 'Student':
                    return redirect()->route('student.dashboard'); // Change to your student route
                default:
                    return redirect()->route('home'); // Fallback route
            }
        }

        // If authentication fails, redirect back with an error
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * Log the user out.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        return redirect()->route('login'); // Change to your login route
    }
}


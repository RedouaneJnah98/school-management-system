<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function check(Request $request)
    {
        $attributes = $request->validate([
            'email' => 'required|email|exists:students',
            'password' => 'required'
        ]);

        if (Auth::guard('student')->attempt($attributes)) {
            // regenerate session ID
            $request->session()->regenerate();
            // Dispatch event after logged in
            event(new Registered(auth('student')->user()));

            return to_route('student.dashboard');
        }

        return back()->with('failed', 'Something went wrong, please enter valid credentials.');
    }

    /*
     * Logout
     */
    public function logout()
    {
        Auth::guard('student')->logout();

        return to_route('student.login');
    }
}

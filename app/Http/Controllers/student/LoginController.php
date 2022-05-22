<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function check(Request $request)
    {
        $attributes = $request->validate([
            'email' => 'required|email|exists:students',
            'password' => 'required|min:6|max:30'
        ]);

        if (Auth::guard('student')->attempt($attributes)) {
            // regenerate session ID
            $request->session()->regenerate();

            return redirect()->route('student.dashboard');
        }

        return redirect()->back()->with('failed', 'Something went wrong, please enter valid credentials.');
    }

    /*
     * Logout
     */
    public function logout()
    {
        Auth::guard('student')->logout();

        return redirect()->route('student.login');
    }
}

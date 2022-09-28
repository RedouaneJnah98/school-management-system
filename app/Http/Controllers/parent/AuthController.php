<?php

namespace App\Http\Controllers\parent;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function check(Request $request)
    {
        $attributes = $request->validate([
            'email' => 'required|email|exists:parents',
            'password' => 'required'
        ]);

        if (Auth::guard('parent')->attempt($attributes)) {
            // regenerate session ID
            $request->session()->regenerate();
            event(new Registered(\auth('parent')->user()));

            return redirect()->route('parent.dashboard');
        }

        return redirect()->back()->with('failed', 'Something went wrong, please enter valid credentials.');
    }

    public function logout(Request $request)
    {
        Auth::guard('parent')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('parent.login');
    }
}

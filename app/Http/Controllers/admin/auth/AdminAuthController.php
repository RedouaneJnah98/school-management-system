<?php

namespace App\Http\Controllers\admin\auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function check(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email|exists:admins',
            'password' => 'required'
        ]);
        
        $remember_me = $request->has('remember_me');
        // check the user's credentials if they are valid
        if (Auth::guard('admin')->attempt($credentials, $remember_me)) {
//            if ($request->user('admin')->hasVerifiedEmail()) {
//                event(new Verified($request->user('admin')));
//            }

            // regenerate session ID
            $request->session()->regenerate();
            // Dispatch the event after the admin login is successful
            event(new Registered(auth('admin')->user()));

            return to_route('admin.dashboard');
        }

        return back()->with('failed', 'Something went wrong, please enter valid credentials.');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return to_route('admin.login');
    }
}

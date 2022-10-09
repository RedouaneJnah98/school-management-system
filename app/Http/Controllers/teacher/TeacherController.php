<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function check(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email|exists:teachers',
            'password' => 'required'
        ]);

        $remember_me = $request->has('remember_me');
        // check the user's credentials if they are valid
        if (Auth::guard('teacher')->attempt($credentials, $remember_me)) {
//            if ($request->user('admin')->hasVerifiedEmail()) {
//                event(new Verified($request->user('admin')));
//            }

            // regenerate session ID
            $request->session()->regenerate();
            // Dispatch the event after the teacher login is successful
            event(new Registered(auth('teacher')->user()));

            return to_route('teacher.dashboard');
        }

        return back()->with('failed', 'Something went wrong, please enter valid credentials.');
    }
}

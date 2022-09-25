<?php

namespace App\Http\Controllers\student\auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        if ($request->user('student')->hasVerifiedEmail()) {
            return redirect()->intended(RouteServiceProvider::STUDENT_HOME);
        }

        $request->user('student')->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }
}

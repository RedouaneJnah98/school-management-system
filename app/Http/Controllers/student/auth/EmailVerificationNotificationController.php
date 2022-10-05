<?php

namespace App\Http\Controllers\student\auth;

use App\Http\Controllers\Controller;
use App\Jobs\StudentEmailVerification;
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
        StudentEmailVerification::dispatch($request->user('student'));

        return back()->with('status', 'verification-link-sent');
    }
}

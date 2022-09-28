<?php

namespace App\Http\Controllers\parent\auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        if ($request->user('parent')->hasVerifiedEmail()) {
            return redirect()->intended(RouteServiceProvider::PARENT_HOME);
        }

        $request->user('parent')->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }
}

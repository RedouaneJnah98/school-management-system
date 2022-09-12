<?php

namespace App\Http\Controllers\admin\auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated teacher's email address as verified.
     *
     * @param EmailVerificationRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function __invoke(EmailVerificationRequest $request)
    {
//        if ($request->user()->hasVerifiedEmail()) {
//            return redirect()->intended(RouteServiceProvider::ADMIN_HOME . '?verified=1');
//        }
//
//        if ($request->user()->markEmailAsVerified()) {
//            event(new Verified($request->user()));
//        }
        $request->fulfill();

        return redirect()->intended(RouteServiceProvider::ADMIN_HOME . '?verified=1');
    }
}

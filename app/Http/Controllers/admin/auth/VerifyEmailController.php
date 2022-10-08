<?php

namespace App\Http\Controllers\admin\auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated teacher's email address as verified.
     *
     * @param EmailVerificationRequest $request
     * @return RedirectResponse
     */

    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        $request->fulfill();
        event(new Verified($request->user('admin')));

        return redirect()->intended(RouteServiceProvider::ADMIN_HOME . '?verified=1');
    }
}

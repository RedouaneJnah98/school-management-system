<?php

namespace App\Http\Controllers\admin\auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     *
     * @param Request $request
     * @return Application|Factory|View|RedirectResponse
     */

    public function __invoke(Request $request)
    {
        return $request->user()->hasVerifiedEmail()
            ? redirect()->intended(RouteServiceProvider::ADMIN_HOME)
            : view('admin.auth.verify-email');
    }
}

<?php

namespace App\Http\Controllers\parent\auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class EmailVerificationPromptController extends Controller
{
    public function __invoke(Request $request)
    {
        return $request->user('parent')->hasVerifiedEmail()
            ? redirect()->intended(RouteServiceProvider::PARENT_HOME)
            : view('parent.auth.verify-email');
    }
}

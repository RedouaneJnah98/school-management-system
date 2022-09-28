<?php

namespace App\Http\Controllers\parent\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResetPasswordRequest;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Str;

class NewPasswordController extends Controller
{
    public function create(Request $request)
    {
        return view('parent.auth.reset-password', compact('request'));
    }

    public function store(ResetPasswordRequest $request)
    {
        $request->validated();

        return $this->password_status($request) === Password::PASSWORD_RESET
            ? to_route('parent.login')->with('status', __($this->password_status($request)))
            : back()->withInput($request->only('email'))
                ->withErrors(['email' => __($this->password_status($request))]);
    }

    protected function password_status($request)
    {
        return Password::broker('parent')->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request->password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );
    }
}

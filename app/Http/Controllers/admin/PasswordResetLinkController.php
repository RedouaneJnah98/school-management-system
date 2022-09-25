<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

//use Illuminate\View\View;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
//    public function create()
//    {
//        return view('admin.auth.forgot-password');
//    }

    public function store(Request $request)
    {
//        dd($request->all());
        $request->validate([
            'email' => 'required|email'
        ]);

//        if (static::$createUrlCallback) {
//            return call_user_func(static::$createUrlCallback, $notifiable, $this->token);
//        }


        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::broker('admin')->sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withInput($request->only('email'))
                ->withErrors(['email' => __($status)]);
    }

    public function send_email($notifiable)
    {
        return url(
            route('password.reset', [
                'token' => $this->token,
                'email' => $notifiable->getEmailForPasswordReset(),
            ], false)
        );
    }
}

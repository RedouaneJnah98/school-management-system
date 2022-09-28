<?php

namespace App\Models;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\URL;

class Parents extends User implements MustVerifyEmail, \Illuminate\Contracts\Auth\CanResetPassword
{
    use HasFactory, Notifiable, CanResetPassword;

    protected $guarded = [];

    protected $dates = ['last_login_date'];

    /**
     * local scope the newest Parents
     * @param Builder $query
     * @return Builder
     */
    public function scopeNewest(Builder $query): Builder
    {
        return $query->orderBy(static::CREATED_AT, 'desc');
    }

    /**
     * local scope the parents that have
     * the most children
     * @param Builder $query
     * @return Builder
     */
    public function scopeMostChildren(Builder $query): Builder
    {
        return $query->withCount('children')
            ->has('children', '>=', 3)
            ->orderBy('children_count', 'desc');
    }

    public function scopeHowManyParentsLastMonth(Builder $query): Builder
    {
        return $query->whereMonth('created_at', now()->subMonth()->month);
    }

    /**
     * Parents have many children
     * @return HasMany
     */
    public function children(): HasMany
    {
        return $this->hasMany(Student::class, 'parent_id');
    }

    /**
     * @return MorphToMany
     */
    public function messages(): MorphToMany
    {
        return $this->morphToMany(Message::class, 'messageable');
    }

    public function sendPasswordResetNotification($token)
    {
        $resetPassword = new ResetPassword($token);
        $resetPassword::createUrlUsing(function () use ($token) {
            return to_route('parent.password.reset', $token);
        });

        $resetPassword::toMailUsing(function ($notifiable) use ($token) {
            $url = config('app.url') . "/parent/reset-password/$token?email=" . $notifiable->getEmailForPasswordReset();

            return (new MailMessage)
                ->subject(Lang::get('Reset Password Notification'))
                ->line(Lang::get('You are receiving this email because we received a password reset request for your account.'))
                ->action(Lang::get('Reset Password'), $url)
                ->line(Lang::get('This password reset link will expire in :count minutes.', ['count' => config('auth.passwords.' . config('auth.defaults.passwords') . '.expire')]))
                ->line(Lang::get('If you did not request a password reset, no further action is required.'));
        });

        $this->notify($resetPassword);
    }

    public function sendEmailVerificationNotification()
    {
        $emailVerification = new VerifyEmail();
        $emailVerification::createUrlUsing(function ($notifiable) {
            return URL::temporarySignedRoute(
                'parent.verification.verify',
                Carbon::now()->addMinutes(Config::get('auth.verification.expire', 60)),
                [
                    'id' => $notifiable->getKey(),
                    'hash' => sha1($notifiable->getEmailForVerification()),
                ]
            );
        });

        $this->notify($emailVerification);
    }
}

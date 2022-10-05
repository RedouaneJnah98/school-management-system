<?php

namespace App\Models;

use App\Jobs\StudentEmailVerification;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\URL;

class Student extends Authenticatable implements MustVerifyEmail, ShouldQueue, \Illuminate\Contracts\Auth\CanResetPassword
{
    use HasFactory, SoftDeletes, Notifiable, CanResetPassword;

    protected $guarded = [];

    protected $dates = ['last_login_date'];

    /**
     * Scope a query to only include the latest students.
     * @param Builder $query
     * @return void
     */
    public function scopeNewest(Builder $query): void
    {
        $query->orderBy(static::CREATED_AT, 'desc');
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeHowManyStudentsLastMonth(Builder $query): Builder
    {
        return $query->whereMonth('created_at', now()->subMonth()->month);
    }

    /**
     * Student belongs to one parent
     * @return BelongsTo
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Parents::class, 'parent_id');
    }

    /**
     * Student belongs to many classrooms
     * @return BelongsToMany
     */
    public function classrooms(): BelongsToMany
    {
        return $this->belongsToMany(Classroom::class)->withTimestamps();
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
            return to_route('student.password.reset', $token);
        });

        $resetPassword::toMailUsing(function ($notifiable) use ($token) {
            $url = config('app.url') . "/student/reset-password/$token?email=" . $notifiable->getEmailForPasswordReset();

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
                'student.verification.verify',
                Carbon::now()->addMinutes(Config::get('auth.verification.expire', 60)),
                [
                    'id' => $notifiable->getKey(),
                    'hash' => sha1($notifiable->getEmailForVerification()),
                ]
            );
        });
        StudentEmailVerification::dispatch($this);

        $this->notify($emailVerification);
    }
}

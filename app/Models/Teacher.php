<?php

namespace App\Models;

use App\Jobs\teacherEmailVerification;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\URL;
use Laravel\Sanctum\HasApiTokens;
use Storage;

class Teacher extends User implements CanResetPassword, MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, \Illuminate\Auth\Passwords\CanResetPassword;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dates = ['last_login_date'];

    /**
     * Get the teacher's status.
     *
     * @return Attribute
     */
    public function status(): Attribute
    {
        return Attribute::make(
            get: fn($value) => ucfirst($value),
        );
    }

    public function image_url(): string
    {
        return Storage::url($this->profile_image);
    }

    /**
     * Count How many records last month
     * @param Builder $query
     * @return Builder
     */
    public function scopeHowManyTeachersLastMonth(Builder $query): Builder
    {
        return $query->whereMonth('created_at', now()->subMonth()->month);
    }

    /**
     * Teachers belong to many classrooms.
     * @return BelongsToMany
     */
    public function classrooms(): BelongsToMany
    {
        return $this->belongsToMany(Classroom::class)->withTimestamps();
    }

    public function subjects(): MorphToMany
    {
        return $this->morphToMany(Subject::class, 'subjectable');
    }

    public function schedules(): MorphToMany
    {
        return $this->morphToMany(ClassSchedule::class, 'scheduleable');
    }

    public function sendPasswordResetNotification($token)
    {
        $resetPassword = new ResetPassword($token);
        $resetPassword::createUrlUsing(function () use ($token) {
            return to_route('admin.password.reset', $token);
        });

        $resetPassword::toMailUsing(function ($notifiable) use ($token) {
            $url = config('app.url') . "/admin/reset-password/$token?email=" . $notifiable->getEmailForPasswordReset();

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
                'admin.verification.verify',
                Carbon::now()->addMinutes(Config::get('auth.verification.expire', 60)),
                [
                    'id' => $notifiable->getKey(),
                    'hash' => sha1($notifiable->getEmailForVerification()),
                ]
            );
        });
        TeacherEmailVerification::dispatch($this);

        $this->notify($emailVerification);
    }
}

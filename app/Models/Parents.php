<?php

namespace App\Models;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\URL;

class Parents extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

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

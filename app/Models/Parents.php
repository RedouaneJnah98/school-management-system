<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Parents extends Authenticatable
{
    use HasFactory;

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
        return $query->whereMonth('created_at', Carbon::now()->subMonth()->month);
    }

    /**
     * Hash password before save it in the database
     * @param $password
     * @return void
     */
    public function setPasswordAttribute($password): void
    {
        $this->attributes['password'] = bcrypt($password);
    }

    /**
     * Hash password confirmation column
     * before save it in the database
     * @param $password
     * @return void
     */
    public function setPasswordConfirmationAttribute($password): void
    {
        $this->attributes['password_confirmation'] = bcrypt($password);
    }

    /**
     * Parents have many children
     * @return HasMany
     */
    public function children(): HasMany
    {
        return $this->hasMany(Student::class, 'parent_id');
    }
}

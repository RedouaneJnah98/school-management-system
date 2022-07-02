<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Parents extends Authenticatable
{
    use HasFactory;

    protected $guarded = [];

    protected $dates = ['last_login_date'];

    public function scopeNewest(Builder $query): void
    {
        $query->orderBy(static::CREATED_AT, 'desc');
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function setPasswordConfirmationAttribute($password)
    {
        $this->attributes['password_confirmation'] = bcrypt($password);
    }

    public function childrens(): HasMany
    {
        return $this->hasMany(Student::class, 'parent_id');
    }
}

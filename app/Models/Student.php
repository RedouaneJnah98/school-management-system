<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $dates = ['last_login_date'];

    /**
     * Scope a query to only include the latest students.
     *
     * @param Builder $query
     * @return void
     */

    public function scopeLatest(Builder $query): void
    {
        $query->orderBy(static::CREATED_AT, 'desc');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Parents::class, 'parent_id')->latest();
    }

    public function classrooms(): BelongsToMany
    {
        return $this->belongsToMany(Classroom::class)->withTimestamps();
    }
}

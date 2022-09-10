<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class Student extends Authenticatable
{
    use HasFactory, SoftDeletes;

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
}

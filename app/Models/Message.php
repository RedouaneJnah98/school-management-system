<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Query\Builder;

class Message extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeLatest(Builder $query): Builder
    {
        return $query->orderBy('created_at', 'desc');
    }

    /**
     * Get all the students that are assigned to this message.
     */
    public function student_messages(): MorphToMany
    {
        return $this->morphedByMany(Student::class, 'messageable');
    }

    /**
     * Get all the parents that are assigned to this message.
     */
    public function parent_messages(): MorphToMany
    {
        return $this->morphedByMany(Parents::class, 'messageable');
    }
}

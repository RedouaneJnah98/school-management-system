<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'branch_id'];

    public function branchs(): MorphToMany
    {
        return $this->morphedByMany(Branch::class, 'subjectable');
    }

    public function teachers(): MorphToMany
    {
        return $this->morphedByMany(Teacher::class, 'subjectable');
    }

    public function classrooms(): BelongsToMany
    {
        return $this->belongsToMany(Classroom::class)->withTimestamps();
    }
}

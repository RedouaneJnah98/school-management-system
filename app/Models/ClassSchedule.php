<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class ClassSchedule extends Model
{
    use HasFactory;

    public $guarded = [];

    public function teachers(): MorphToMany
    {
        return $this->morphedByMany(Teacher::class, 'scheduleable');
    }

    public function classes(): MorphToMany
    {
        return $this->morphedByMany(Classroom::class, 'scheduleable');
    }

    public function subjects(): MorphToMany
    {
        return $this->morphedByMany(Subject::class, 'scheduleable');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    /**
     * Branch Table has many Groups
     * @return HasMany
     */
    public function groups(): HasMany
    {
        return $this->hasMany(Group::class);
    }

    /**
     * Branch Table has many subjects
     * @return MorphToMany
     */
    public function subjects(): MorphToMany
    {
        return $this->morphToMany(Subject::class, 'subjectable');
    }

    /**
     * Branch table has many classrooms
     * @return HasMany
     */
    public function classrooms(): HasMany
    {
        return $this->hasMany(Classroom::class);
    }
}

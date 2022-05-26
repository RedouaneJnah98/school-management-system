<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Relationship
    public function classrooms()
    {
        return $this->hasMany(Classroom::class);
    }
}

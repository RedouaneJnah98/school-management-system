<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get all the students that are assigned this message.
     */
    public function students()
    {
        return $this->morphedByMany(Student::class, 'messageable');
    }

    /**
     * Get all the parents that are assigned this message.
     */
    public function parents()
    {
        return $this->morphedByMany(Parents::class, 'messageable');
    }
}

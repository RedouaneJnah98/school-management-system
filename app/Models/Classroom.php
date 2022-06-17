<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Relationships
//    public function teacher()
//    {
//        return $this->belongsTo(Teacher::class);
//    }

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    /*
     * Many-to-many relationship
     */
    public function students()
    {
        return $this->belongsToMany(Student::class)->withTimestamps();
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class)->withTimestamps();
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class)->withTimestamps();
    }
}

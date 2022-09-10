<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\DB;

class Classroom extends Model
{
    use HasFactory;

    protected $guarded = [];
    private array $classroom_student = [];
    private array $classroom_teacher = [];

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    /*
     * Many-to-many relationship
     */
    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class)->withTimestamps();
    }

    public function teachers(): BelongsToMany
    {
        return $this->belongsToMany(Teacher::class)->withTimestamps();
    }


    public function scopeRetrieveClassroomStudentNotInTable(Builder $query): Builder
    {
        $classroom_teacher_table = DB::table('classroom_student')->get();

        foreach ($classroom_teacher_table as $row) {
            $this->classroom_student[] = $row->classroom_id;
        }

        return $query->whereNotIn('id', $this->classroom_student);
    }

    public function scopeRetrieveClassroomTeacherNotInTable(Builder $query): Builder
    {
        $classroom_teacher_table = DB::table('classroom_teacher')->get();

        foreach ($classroom_teacher_table as $row) {
            $this->classroom_teacher[] = $row->classroom_id;
        }

        return $query->whereNotIn('id', $this->classroom_teacher);
    }

}

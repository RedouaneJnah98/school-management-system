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
    protected array $student_arr = [];

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

//    public function setPasswordAttribute($password)
//    {
//        $this->attributes['password'] = bcrypt($password);
//    }

//    public function setPasswordConfirmationAttribute($password)
//    {
//        $this->attributes['password_confirmation'] = bcrypt($password);
//    }

    public function scopeRetrieveStudentNotInTable(Builder $query): Builder
    {
        $classroom_student_table = DB::table('classroom_student')->get();

        foreach ($classroom_student_table as $row) {
            $this->student_arr[] = $row->student_id;
        }

        return $query->whereNotIn('id', $this->student_arr);
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

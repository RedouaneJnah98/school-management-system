<?php

namespace App\Models;

use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class Teacher extends Authenticatable implements CanResetPassword
{
    use HasApiTokens, HasFactory, Notifiable, \Illuminate\Auth\Passwords\CanResetPassword;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $guarded = [];
    protected array $teacher_arr = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dates = ['last_login_date'];

    /**
     * Get the teacher's status.
     *
     * @return Attribute
     */
    public function status(): Attribute
    {
        return Attribute::make(
            get: fn($value) => ucfirst($value),
        );
    }

    /**
     * Count How many records last month
     * @param Builder $query
     * @return Builder
     */
    public function scopeHowManyTeachersLastMonth(Builder $query): Builder
    {
        return $query->whereMonth('created_at', now()->subMonth()->month);
    }

    /**
     * Teachers belong to many classrooms.
     * @return BelongsToMany
     */
    public function classrooms(): BelongsToMany
    {
        return $this->belongsToMany(Classroom::class)->withTimestamps();
    }

    public function subjects(): MorphToMany
    {
        return $this->morphToMany(Subject::class, 'subjectable');
    }

    public function scopeRetrieveTeacherNotInTable(Builder $query): Builder
    {
        $classroom_teacher_table = DB::table('classroom_teacher')->get();

        foreach ($classroom_teacher_table as $row) {
            $this->teacher_arr[] = $row->teacher_id;
        }

        return $query->whereNotIn('id', $this->teacher_arr);
    }

}

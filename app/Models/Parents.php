<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Parents extends Authenticatable
{
    use HasFactory;

    protected $guarded = [];

    protected $dates = ['last_login_date'];

    public function childrens()
    {
        return $this->hasMany(Student::class, 'parent_id');
    }
}

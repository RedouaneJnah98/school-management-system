<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $dates = ['last_login_date'];

    public function childrens()
    {
        return $this->hasMany(Student::class, 'parent_id');
    }
}

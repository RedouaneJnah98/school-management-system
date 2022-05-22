<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use HasFactory;

    protected $guarded = [];

    protected $dates = ['last_login_date'];

    public function parent()
    {
        return $this->belongsTo(Parents::class, 'parent_id');
    }

}

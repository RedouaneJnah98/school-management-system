<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Parents;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all()->count();
        $students = Student::all()->count();
        $parents = Parents::all()->count();

        return view('admin.dashboard', compact('teachers', 'students', 'parents'));
    }
}

<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Parents;
use App\Models\Student;
use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all()->count();
        $students = Student::all()->count();
        $parents = Parents::all()->count();
        $most_children = Parents::mostChildren()->take(7)->get();
        $parent_last_month = Parents::whereMonth('created_at', Carbon::now()->subMonth()->month)->get()->count();

        // calculate reports
        $current_month = $parents;
        $parent_states_result = ($current_month - $parent_last_month) / $current_month * 100;

        return view('admin.dashboard', compact('teachers', 'students', 'parents', 'most_children', 'parent_states_result'));
    }
}

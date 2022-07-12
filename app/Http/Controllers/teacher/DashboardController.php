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
        $parent_last_month = Parents::HowManyParentsLastMonth()->get()->count();
        $teachers_last_month = Teacher::HowManyTeachersLastMonth()->get()->count();
        $students_last_month = Student::HowManyStudentsLastMonth()->get()->count();

        // calculate reports for Parents
        $current_month_parents = $parents;
        $parent_states_result = ($current_month_parents - $parent_last_month) / $current_month_parents * 100;
        // calculate reports for Parents
        $current_month_teachers = $teachers;
        $teachers_states_result = ($current_month_teachers - $teachers_last_month) / $current_month_teachers * 100;
        // calculate reports for Parents
        $current_month_students = $students;
        $students_states_result = ($current_month_students - $students_last_month) / $current_month_students * 100;

        return view('admin.dashboard', compact([
            'teachers',
            'students',
            'parents',
            'most_children',
            'parent_states_result',
            'students_states_result',
            'teachers_states_result'
        ]));
    }
}

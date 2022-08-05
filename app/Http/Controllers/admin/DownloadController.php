<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Parents;
use App\Models\Student;

use App\Models\Teacher;
use Barryvdh\DomPDF\Facade\Pdf;

class DownloadController extends Controller
{
    public function download_students()
    {
        $students = Student::with('classrooms')->get()->toArray();
        // share data with students view
        view()->share('students', $students);
        $pdf = Pdf::loadView('admin.pdf.students', $students);

        return $pdf->download('Ajiale_School_Students.pdf');
    }

    public function download_parents()
    {
        $parents = Parents::all()->toArray();
        // share data with parents view
        view()->share('parents', $parents);
        $pdf = Pdf::loadView('admin.pdf.parents', $parents);

        return $pdf->download('Parents.pdf');
    }

    public function download_teachers()
    {
        $teachers = Teacher::all()->toArray();
        // share data with parents view
        view()->share('teachers', $teachers);
        $pdf = Pdf::loadView('admin.pdf.teachers', $teachers);

        return $pdf->download('Teachers.pdf');

    }
}

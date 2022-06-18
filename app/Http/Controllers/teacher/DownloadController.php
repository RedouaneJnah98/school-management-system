<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Student;

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
}

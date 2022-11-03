<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use Illuminate\Http\Request;

class StudentsListController extends Controller
{
    public function index(Request $request)
    {
        $classroom = Classroom::find($request->id);
        $output = '';

        foreach ($classroom->students as $student) {
            $output .= '<tr>';
            $output .= '<td>' . '<span class="fw-bold">' . $student->fullName . '</span>' . '</td>';
            $output .= '<td>';
            $output .= '<fieldset class="d-flex gap-3">';
            $output .= '<div class="form-check">';
            $output .= "<input class='form-check-input' type='radio' name='student_$student->id' id='present-$student->id' value='1'>";
            $output .= "<label class='form-check-label' for='present-$student->id'>Present</label>";
            $output .= '</div>';
            $output .= '<div class="form-check">';
            $output .= "<input class='form-check-input' type='radio' name='student_$student->id' id='status-$student->id' value='0'>";
            $output .= "<label class='form-check-label' for='status-$student->id'>Absent</label>";
            $output .= '</div>';
            $output .= '</fieldset>';
            $output .= '</td>';
            $output .= '<td>';
            $output .= '<select class="form-select" id="country" aria-label="Default select example">';
            $output .= '<option selected="selected">Select a reason</option>';
            $output .= '<option value="1">One</option>';
            $output .= '<option value="2">Two</option>';
            $output .= '<option value="3">Three</option>';
            $output .= '</select>';
            $output .= '</tr>';
        }


        return response()->json($output);
    }
}

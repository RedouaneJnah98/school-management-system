<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\In;
use phpDocumentor\Reflection\Types\Iterable_;
use Symfony\Component\Console\Input\Input;

class ClassroomStudentController extends Controller
{
    public function index()
    {
        $students = Student::with('classrooms')->get();
        $classrooms = Classroom::with('students')->get();

        return view('admin.classrooms.students', compact(['students', 'classrooms']));
    }

    public function all_students(Request $request)
    {
        $classrooms = Classroom::find($request->id);
        $result = '';

        if ($classrooms->students->count() > 0) {
            foreach ($classrooms->students as $student) {
                $result .= '<tr>';
                $result .= '<td>' . '<span class="fw-bold">' . $student->id . '</span>' . '</td>';
                $result .= '<td>';
                $result .= '<a href="#" class="d-flex align-items-center">';
                $result .= '<img src="/storage/avatars/default-avatar-male.jpg" class="avatar rounded-circle me-3" alt="Avatar" />';
                $result .= '<div class="d-block">';
                $result .= '<span class="fw-bold">' . $student->fullName . '</span>';
                $result .= '</div>';
                $result .= '</a>';
                $result .= '</td>';
                $result .= '<td >' . $student->email . '</td>';
                $result .= '<td>' . $student->gender . '</td>';
                $result .= '<td>' . $student->phone . '</td>';
                $result .= '</tr>';
            }
        } else {
            $result .= '<tr><td class="text-info text-center" colspan="5">Oops...there is no student in thi class.</td></tr>';
        }

        return response()->json($result);
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'classroom_id' => 'required|numeric',
            'student_id' => 'required|unique:classroom_student',
        ], [
            'student_id.unique' => 'This student had already been taken in another class.'
        ]);

        foreach ($request->get('student_id') as $value) {
            $classroom = Classroom::find($attributes['classroom_id']);
            $insert_data = $classroom->students()->syncWithoutDetaching($value);
            if (!$insert_data) {
                return back()->with('failed', 'Something went wrong, try again.');
            }
        }

        return to_route('admin.classrooms.index')->with('success', 'Success! You added a new Student to the class.');
    }
}

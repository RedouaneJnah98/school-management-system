<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Storage;

class ClassroomTeacherController extends Controller
{
    public function create()
    {
        $teachers = Teacher::doesntHave('classrooms')->get();
        $classrooms = Classroom::doesntHave('teachers')->get();

        return view('admin.classrooms.teachers', compact(['teachers', 'classrooms']));
    }

    public function store(Request $request)
    {
        $classroom = Classroom::find($request->input('classroom_id'));
        $insert_data = $classroom->teachers()->syncWithoutDetaching($request->input('teacher_id'));

        if (!$insert_data) {
            return back()->with('failed', 'Something went wrong, try again.');
        }

        return to_route('admin.classrooms.index')->with('success', 'Success! You added new teacher to the classroom');
    }

    public function all_teachers(Request $request)
    {
        $classrooms = Classroom::find($request->id);
        $result = '';

        if ($classrooms->teachers->count() > 0) {
            foreach ($classrooms->teachers as $teacher) {
                $avatar = $this->avatar($teacher);

                $result .= '<tr>';
                $result .= '<td>' . '<span class="fw-bold">' . $teacher->id . '</span>' . '</td>';
                $result .= '<td>';
                $result .= '<a href="#" class="d-flex align-items-center">';
                $result .= "<img src='$avatar' class='avatar rounded-circle me-3' alt='Avatar' style='object-fit: cover;object-position: top;'/>";
                $result .= '<div class="d-block">';
                $result .= '<span class="fw-bold">' . $teacher->fullName . '</span>';
                $result .= '</div>';
                $result .= '</a>';
                $result .= '</td>';
                $result .= '<td >' . $teacher->email . '</td>';
                if ($teacher->subjects()->count() > 0) {
                    foreach ($teacher->subjects as $subject) {
                        $result .= '<td class="text-info">' . $subject->name . '</td>';
                    }
                } else {
                    $result .= '<td class="text-danger">No subject</td>';
                }
                $result .= '<td>' . $teacher->phone . '</td>';
                $result .= '</tr>';
            }
        } else {
            $result .= '<tr><td class="text-info text-center" colspan="5">Oops...there is no data to show.</td></tr>';
        }

        return response()->json($result);
    }

    protected function avatar($teacher)
    {
        return Storage::url($teacher->profile_image);
    }
}

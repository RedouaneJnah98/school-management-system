<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class SubjectTeacherController extends Controller
{
    protected string $result = '';

    public function index()
    {
        $subjects = Subject::all();
        $teachers = Teacher::all();

        return view('admin.subjects.teacher', compact(['teachers', 'subjects']));
    }

    public function store(Request $request)
    {
        $teacher_ids = $request->input('teacher_id');
        $subject = Subject::find($request->input('subject_id'));

        foreach ($teacher_ids as $id) {
            $teacher = Teacher::find($id);
            $teacher->subjects()->save($subject);
        }
        return to_route('admin.subjects.index')->with('success', 'Success!!');
    }

    public function related_teachers(Request $request)
    {
        $subject = Subject::find($request->id);
        $this->teacher_body($subject);

        return response()->json($this->result);
    }

    public function related_branches(Request $request)
    {
        $subject = Subject::find($request->id);
        $this->branch_body($subject);

        return response()->json($this->result);
    }

    public function teacher_body($subject)
    {
        if ($subject->teachers()->count() > 0) {
            foreach ($subject->teachers as $teacher) {
                $this->result .= '<tr>';
                $this->result .= '<td>' . '<span class="fw-bold">' . $teacher->id . '</span>' . '</td>';
                $this->result .= '<td>';
                $this->result .= '<a href="#" class="d-flex align-items-center">';
                $this->result .= '<img src="/storage/avatars/default-avatar-male.jpg" class="avatar rounded-circle me-3" alt="Avatar" />';
                $this->result .= '<div class="d-block">';
                $this->result .= '<span class="fw-bold">' . $teacher->fullName . '</span>';
                $this->result .= '</div>';
                $this->result .= '</a>';
                $this->result .= '</td>';
                $this->result .= '<td >' . $teacher->email . '</td>';
                $this->result .= '<td>' . $teacher->phone . '</td>';
                $this->result .= '</tr>';
            }
        } else {
            $this->result .= $this->empty_table();
        }
    }

    public function branch_body($subject)
    {
        if ($subject->branches()->count() > 0) {
            foreach ($subject->branches as $branch) {
                $this->result .= '<tr>';
                $this->result .= '<td>' . '<span class="fw-bold">' . $branch->id . '</span>' . '</td>';
                $this->result .= '<td >' . $branch->name . '</td>';
                $this->result .= '<td>' . $branch->description . '</td>';
                $this->result .= '</tr>';
            }
        } else {
            $this->result .= $this->empty_table();
        }
    }

    public function empty_table()
    {
        return '<tr><td class="text-info text-center" colspan="5">Oops...there no data to show.</td></tr>';
    }

}

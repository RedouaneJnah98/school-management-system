<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SubjectController extends Controller
{
    public function index()
    {
//        $subjects = Subject::with('')->get();
//        $branches = Branch::with('subjects')->get();
        $subjects = Subject::all();

        return view('admin.subjects.index', compact(['subjects']));
    }

    public function create()
    {
        $branches = Branch::all();
        $teachers = Teacher::all();

        return view('admin.subjects.create', compact(['branches', 'teachers']));
    }

    public function store(Request $request)
    {
//        $attributes = $request->validate([
//            'name' => 'required',
//        ]);

//        dd($request->all());

        $attributes = $request->only('teacher_id', 'branch_id');
//        $teacher = Teacher::find($request->id);
//        dump($request->all());
//        $subject = new Subject();
//        $subject->name = $request->input('subject_name');
//        $teacher->subjects()->save($subject);

//        dump($request->input('subject_name'));

//        $teacher = Teacher::find($attributes);
//        dd($teacher);
//        $teacher = Teacher::find($request->input('teacher_id'));
//        dump($teacher);

        $subject = Subject::where('name', $request->input('subject_name'));
        dump($subject);


//        $subject = new Subject();
//        $subject->name = $request->input('subject_name');
//        $teacher->subjects()->attach($subject);
//        foreach ($attributes as $item) {

//            dump($item);
//        }
//        $insert_data = Subject::create($attributes);
//
//        if (!$insert_data) {
//            return redirect()->back()->with('failed', 'Something went wrong, try again');
//        }
//
//        return redirect()->route('admin.subjects.index')->with('success', 'Success! You added a new Subject.');
    }

    public function edit(Subject $subject)
    {
        $branches = Branch::all();

        return view('admin.subjects.edit', ['subject' => $subject, 'branches' => $branches]);
    }

    public function update(Request $request, Subject $subject)
    {
        $attributes = $request->validate([
            'name' => ['required'],
        ]);

        $update_subject = $subject->update($attributes);

        if (!$update_subject) {
            return redirect()->back()->with('failed', 'Something went wrong, try again');
        }

        return redirect()->route('admin.subjects.index')->with('success', 'Success! Subject name updated.');
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();

        return redirect()->back()->with('delete', 'Subject deleted.');
    }
}

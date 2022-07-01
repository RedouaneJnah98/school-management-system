<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\Parents;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    public function index(Student $student)
    {
        $students = $student->newest()->withTrashed()->paginate(20);

        return view('admin.students.index', compact('students'));
    }

    public function create(Parents $parent)
    {
        $parents = $parent->all();

        return view('admin.students.create', compact('parents'));
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'phone' => 'required|numeric',
            'email' => 'required|email|unique:students,email',
            'password' => 'required|confirmed|min:6|max:30',
            'password_confirmation' => 'required|min:6|max:30',
            'date_of_birth' => 'required|date',
            'date_of_join' => 'required|date',
            'profile_image' => 'required|image',
            'gender' => 'required',
            'parent_id' => 'required|numeric'
        ]);
        $attributes['date_of_join'] = $request->date('date_of_join');
        $attributes['date_of_birth'] = $request->date('date_of_birth');
        // get the original file name of the image
        $image_name = $request->file('profile_image')->getClientOriginalName();
        // store the image in the public/avatars directory
        $attributes['profile_image'] = $request->file('profile_image')->storeAs('public/avatars', $image_name);
        // Hash password
        $attributes['password'] = Hash::make($attributes['password']);
        $attributes['password_confirmation'] = Hash::make($attributes['password_confirmation']);

        $insert_data = Student::create($attributes);

        if ($insert_data) {
            return redirect()->route('admin.students.index')->with('success', 'You added a new Student.');
        } else {
            return redirect()->back()->with('failed', 'Something went wrong, try again.');
        }
    }

    public function show(Student $student)
    {
        return view('admin.students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        return view('admin.students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $attributes = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'phone' => 'required|numeric',
            'email' => ['required', 'email', Rule::unique('students', 'email')->ignore($student->id)],
            'gender' => 'required'
        ]);

        $update_data = $student->update($attributes);

        if ($update_data) {
            return redirect()->route('admin.students.index')->with('success', 'Student data updated successfully.');
        } else {
            return redirect()->back()->with('failed', 'Something went wrong, please try again.');
        }
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->back()->with('delete', 'Record moved to trash, you can restore this account.');
    }
}

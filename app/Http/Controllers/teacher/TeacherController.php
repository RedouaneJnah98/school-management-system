<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index(Teacher $teacher)
    {
        $teachers = $teacher->paginate(20);

        return view('admin.teachers.index', compact('teachers'));
    }

    public function create()
    {
        return view('admin.teachers.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'phone' => 'required|numeric',
            'email' => 'required|email|unique:teachers,email',
            'password' => 'required|confirmed|min:6|max:30',
            'password_confirmation' => 'required|min:6|max:30',
            'dob' => 'required|date',
            'profile_image' => 'required|image',
            'status' => 'required',
            'profile_bio' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'number' => 'required|numeric',
            'city' => 'required',
            'zip' => 'required|numeric'
        ]);

        $attributes['dob'] = $request->date('dob');
        // get the original file name of the image
        $image_name = $request->file('profile_image')->getClientOriginalName();
        // store the image in the public/avatars directory
        $attributes['profile_image'] = $request->file('profile_image')->storeAs('public/avatars', $image_name);

        // insert data into DB
        $insert_data = Teacher::create($attributes);

        if ($insert_data) {
            return redirect()->route('admin.teachers.index')->with('success', "You added a new Teacher.");
        } else {
            return redirect()->back()->with('error', 'Error! Something went wrong, try again.');
        }
    }

    public function show(Teacher $teacher)
    {
        return view('admin.teachers.show', compact('teacher'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        //
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
//            'image_profile' => 'file',
            'status' => 'required',
            'profile_bio' => 'required'
        ]);

        $attributes['dob'] = $request->date('dob');

        // insert data into DB
        $insert_data = Teacher::create($attributes);

        if ($insert_data) {
            return redirect()->back()->with('success', "Success! You've added a new Teacher.");
        } else {
            return redirect()->back()->with('error', 'Error! Something went wrong, try again.');
        }
    }

    public function show($id)
    {
        //
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

<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function index()
    {
        return view('student.profile');
    }

    public function update(Request $request)
    {
        $student_id = auth()->user()->id;
        $student = Student::find($student_id);

        $attributes = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'date_of_birth' => 'required|date',
            'gender' => 'required',
            'email' => ['required', 'email', Rule::unique('students', 'email')->ignore($student_id)],
            'phone' => 'required|numeric',
            'profile_image' => 'image|mimes:jpeg,jpg,png',
        ]);

        // check if image exists
        if ($request->file('profile_image')) {
            // image file original name
            $name = $request->file('profile_image')->hashName();
            // store the image name in the Database
            $attributes['profile_image'] = $name;
            $request->file('profile_image')->storeAs('public/avatars', $name);
        }
        // update profile
        $update_profile = $student->update($attributes);

        if (!$update_profile) {
            return redirect()->back()->with('failed', 'Something went wrong, try again.');
        }

        return redirect()->back()->with('success', 'Profile credentials updated successfully.');
    }
}

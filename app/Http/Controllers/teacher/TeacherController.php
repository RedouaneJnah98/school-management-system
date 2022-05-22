<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class TeacherController extends Controller
{
    public function index(Teacher $teacher)
    {
        $teachers = $teacher->paginate(15);

        return view('admin.teachers.index', compact('teachers'));
    }

    public function create()
    {
        // authorize only admin
        $this->authorize('add_teacher');

        return view('admin.teachers.create');
    }

    public function store(Request $request)
    {
        $this->authorize('add_teacher');

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
        // Hash password
        $attributes['password'] = Hash::make($attributes['password']);
        $attributes['password_confirmation'] = Hash::make($attributes['password_confirmation']);

        // insert data into DB
        $insert_data = Teacher::create($attributes);

        if ($insert_data) {
            return redirect()->route('admin.teachers.index')->with('success', "You added a new Teacher.");
        }

        return redirect()->back()->with('error', 'Error! Something went wrong, try again.');
    }

    public function show(Teacher $teacher)
    {
        return view('admin.teachers.show', compact('teacher'));
    }

    public function edit(Teacher $teacher)
    {
        $this->authorize('edit_teacher');

        return view('admin.teachers.edit', compact('teacher'));
    }

    public function update(Request $request, Teacher $teacher)
    {
        $this->authorize('edit_teacher');

        $attributes = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'phone' => 'required|numeric',
            'email' => ['required', 'email', Rule::unique('teachers', 'email')->ignore($teacher->id)],
            'status' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'number' => 'required|numeric',
            'city' => 'required',
            'zip' => 'required|numeric'
        ]);

        // update
        $update_credentials = $teacher->update($attributes);

        if ($update_credentials) {
            return redirect()->route('admin.teachers.index')->with('success', 'Credentials updated successfully');
        } else {
            return redirect()->back()->with('error', 'Error! Something went wrong, try again.');
        }
    }

    public function destroy(Teacher $teacher)
    {
        $this->authorize('delete_teacher');
        $teacher->delete();

        return redirect()->back()->with('delete', 'Record deleted.');
    }

    /*
     * Login User Requests
     */
    public function check_user(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email|exists:teachers',
            'password' => 'required|min:6|max:30'
        ]);

        $remember_me = $request->has('remember_me');

        // check the user's credentials if they are valid
        if (Auth::guard('web')->attempt($credentials, $remember_me)) {
            // regenerate session ID
            $request->session()->regenerate();

            return redirect()->route('admin.dashboard');
        }

        return redirect()->back()->with('failed', 'Something went wrong, please enter valid credentials.');
    }

    /*
     * Logout User
     */
    public function logout()
    {
        Auth::guard('web')->logout();

        return redirect()->route('admin.login');
    }
}

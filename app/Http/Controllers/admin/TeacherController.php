<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTeacherRequest;
use App\Models\Teacher;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\File;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Storage;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();

        return view('admin.teachers.index', compact('teachers'));
    }

    /**
     * @throws AuthorizationException
     */
    public function create()
    {
        // authorize only admin
        $this->authorize('create', Teacher::class);

        return view('admin.teachers.create');
    }

    /**
     * @throws AuthorizationException
     */
    public function store(StoreTeacherRequest $request)
    {
        $this->authorize('create', Teacher::class);

        $attributes = $request->validated();
        $attributes['dob'] = $request->date('dob');
        // get the original file name of the image
        $image_name = $request->file('profile_image')->getClientOriginalName();
        // store the image in the public/avatars directory
        $attributes['profile_image'] = $request->file('profile_image')->storeAs('public/avatars', $image_name);

        // insert data into DB
        $insert_data = Teacher::create($attributes);

        if ($insert_data) {
            return to_route('admin.teachers.index')->with('success', "You added a new Teacher.");
        }

        return redirect()->back()->with('error', 'Error! Something went wrong, try again.');
    }

    /**
     * @throws AuthorizationException
     */
    public function show(Teacher $teacher)
    {
        $this->authorize('show', $teacher);

        return view('admin.teachers.show', compact('teacher'));
    }

    /**
     * @throws AuthorizationException
     */
    public function edit(Teacher $teacher)
    {
        $this->authorize('update', $teacher);

        return view('admin.teachers.edit', compact('teacher'));
    }

    /**
     * @throws AuthorizationException
     */
    public function update(Request $request, Teacher $teacher)
    {
        $this->authorize('update', $teacher);

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
            return to_route('admin.teachers.index')->with('success', 'Credentials updated successfully');
        } else {
            return redirect()->back()->with('error', 'Error! Something went wrong, try again.');
        }
    }

    /**
     * Update password from settings
     * @param Request $request
     * @return RedirectResponse
     */
    public function update_password(Request $request): RedirectResponse
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);
        // Match the old password
        if (!Hash::check($request->input('old_password'), \auth()->user()->password)) {
            return back()->with('failed', "Error! Old password does not match!");
        }
        // Update the new password
        $new_password = Hash::make($request->input('new_password'));

        Teacher::whereId(\auth()->user()->id)->update([
            'password' => $new_password,
            'password_confirmation' => $new_password,
        ]);
        return back()->with('success', 'Password changed successfully!');
    }

    /**
     * @throws AuthorizationException
     */
    public function destroy(Teacher $teacher)
    {
        $this->authorize('delete', $teacher);
        $teacher->delete();

        return redirect()->back()->with('delete', 'Record deleted.');
    }

    /**
     * Handle an authentication attempt.
     * @param Request $request
     * @return RedirectResponse
     */
    public function check_user(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => 'required|email|exists:teachers',
            'password' => 'required'
        ]);

        $remember_me = $request->has('remember_me');
        // check the user's credentials if they are valid
        if (Auth::guard('admin')->attempt($credentials, $remember_me)) {
            // regenerate session ID
            $request->session()->regenerate();
            // Dispatch the event after the teacher login is successful
            event(new Registered(auth('admin')->user()));

            return to_route('admin.dashboard');
        }

        return redirect()->back()->with('failed', 'Something went wrong, please enter valid credentials.');
    }

    /*
     * Logout Admin & Teachers
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return to_route('admin.login');
    }
}

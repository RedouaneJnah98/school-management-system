<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile');
    }

    public function update(Request $request)
    {
        //user ID
        $id = auth()->user()->id;

        $attributes = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'dob' => 'required|date',
            'gender' => 'required',
            'email' => ['required', 'email', Rule::unique('teachers', 'email')->ignore($id)],
            'phone' => 'required|numeric',
            'profile_image' => 'image',
            'address' => 'required',
            'number' => 'required|numeric',
            'city' => 'required',
            'zip' => 'required|numeric'
        ]);
        // image file original name
        $name = $request->file('profile_image')->hashName();
        // store the image name in the Database
        $attributes['profile_image'] = $name;
        $request->file('profile_image')->storeAs('public/avatars', $name);

        $user = Teacher::find($id);
        $update_data = $user->update($attributes);

        if ($update_data) {
            return redirect()->route('admin.profile')->with('success', 'Profile credentials updated successfully.');
        }

        return redirect()->back()->with('failed', 'Something went wrong, try again.');
    }
}

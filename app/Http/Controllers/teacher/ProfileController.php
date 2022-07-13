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
        $user = Teacher::find($id);

        $attributes = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'dob' => 'required|date',
            'gender' => 'required',
            'email' => ['required', 'email', Rule::unique('teachers', 'email')->ignore($id)],
            'phone' => 'required|numeric',
            'profile_image' => 'image|mimes:jpg,jpeg,png|max:800',
            'address' => 'required',
            'number' => 'required|numeric',
            'city' => 'required',
            'zip' => 'required|numeric'
        ]);

        // check if image exists
        if ($request->file('profile_image')) {
            // image file original name
            $name = $request->file('profile_image')->getClientOriginalName();
            // store the image name in the Database
            $attributes['profile_image'] = $name;
            $request->file('profile_image')->storeAs('public/avatars', $name);
        }
        $update_data = $user->update($attributes);

        if ($update_data) {
            return redirect()->route('admin.profile')->with('success', 'Profile credentials updated successfully.');
        }

        return redirect()->back()->with('failed', 'Something went wrong, try again.');
    }
}

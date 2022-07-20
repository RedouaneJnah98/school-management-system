<?php

namespace App\Http\Controllers\parent;

use App\Http\Controllers\Controller;
use App\Models\Parents;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function index()
    {
        return view('parent.profile');
    }

    public function update(Request $request)
    {
        $parent_id = auth()->user()->id;
        $parent = Parents::find($parent_id);

        $attributes = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'date_of_birth' => 'required|date',
            'gender' => 'required',
            'email' => ['required', 'email', Rule::unique('parents', 'email')->ignore($parent_id)],
            'phone_number' => 'required|numeric',
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
        $update_profile = $parent->update($attributes);

        if (!$update_profile) {
            return redirect()->back()->with('failed', $this->message('failed'));
        }

        return redirect()->back()->with('success', $this->message('success'));
    }

    public function message(string $status): string
    {
        if ($status === 'failed') {
            return 'Something went wrong, try again.';
        }

        return 'Profile credentials updated successfully.';
    }
}

<?php

namespace App\Http\Controllers\parent;

use App\Http\Controllers\Controller;
use App\Models\Parents;
use App\Models\Student;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class ParentController extends Controller
{
    public function index()
    {
        $parents = Parents::with('children')->newest()->get();

        return view('admin.parents.index', compact('parents'));
    }

    /**
     * @throws AuthorizationException
     */

    public function create()
    {
        $this->authorize('create', Parents::class);

        return view('admin.parents.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:parents,email',
            'password' => [
                'required',
                'confirmed',
                Password::min(6)
                    ->mixedCase()
                    ->letters()
                    ->numbers()
                    ->symbols()
                    ->uncompromised()
            ],
            'password_confirmation' => [
                'required',
                Password::min(6)
                    ->mixedCase()
                    ->letters()
                    ->numbers()
                    ->symbols()
                    ->uncompromised()

            ],
            'phone_number' => 'required|numeric',
            'date_of_birth' => 'required|date',
            'profile_image' => 'required|image|mimes:jpeg,jpg,png',
            'gender' => 'required',
            'address' => 'required',
            'number' => 'required|numeric',
            'city' => 'required',
            'zip' => 'required|numeric'
        ]);

        $attributes['date_of_birth'] = $request->date('date_of_birth');
        $image_name = $request->file('profile_image')->getClientOriginalName();
        // store the image in the public/avatars directory
        $attributes['profile_image'] = $request->file('profile_image')->storeAs('public/avatars', $image_name);

        $insert_parent = Parents::create($attributes);

        if ($insert_parent) {
            return redirect()->route('admin.parents.index')->with('success', 'You added a new Parent.');
        } else {
            return redirect()->back()->with('failed', 'Something went wrong, try again.');
        }
    }

    public function show(Parents $parent)
    {
        return view('admin.parents.show', compact('parent'));
    }

    /**
     * @throws AuthorizationException
     */

    public function edit(Parents $parent)
    {
        $this->authorize('update', $parent);

        return view('admin.parents.edit', compact('parent'));
    }

    /**
     * @throws AuthorizationException
     */

    public function update(Request $request, Parents $parent)
    {
        $this->authorize('update', $parent);

        $attributes = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => ['required', 'email', Rule::unique('parents', 'email')->ignore($parent->id)],
            'phone_number' => 'required|numeric',
            'gender' => 'required'
        ]);

        // update information
        $update_info = $parent->update($attributes);

        if ($update_info) {
            return redirect()->route('admin.parents.index')->with('success', 'Parent updated successfully');
        }

        return redirect()->back()->with('failed', 'Something went wrong, try again.');
    }

    /**
     * @throws AuthorizationException
     */

    public function destroy(Parents $parent)
    {
        $this->authorize('delete', $parent);
        $parent->delete();

        return redirect()->back()->with('delete', 'Parent and their student accounts deleted.');
    }
}

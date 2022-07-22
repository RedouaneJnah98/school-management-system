<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Parents;
use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index_parents()
    {
        $messages = Message::with('parents')->paginate();

        return view('admin.messages.parents', compact('messages'));
    }

    public function index_students()
    {
        $messages = Message::with('students')->paginate();

        return view('admin.messages.students', compact('messages'));

    }

    public function store_student_message(Request $request): RedirectResponse
    {
        $request->validate([
            'message' => 'required',
        ]);

        $student_id = auth()->user()->id;
        $student = Student::find($student_id);
        $message = new Message;
        $message->message = $request->input('message');
        $student->messages()->save($message);

        return back()->with('success', $this->message());
    }

    public function store_parent_message(Request $request)
    {
        $request->validate([
            'message' => 'required'
        ]);

        $parent_id = auth()->user()->id;
        $parent = Parents::find($parent_id);
        $message = new Message;
        $message->message = $request->input('message');
        $parent->messages()->save($message);

        return back()->with('success', $this->message());
    }

    public function message(): string
    {
        return 'Thank you! Your message has been successfully sent.';
    }
}

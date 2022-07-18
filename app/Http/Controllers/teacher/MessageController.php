<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Student;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::with(['students', 'parents'])->get();

        return view('admin.messages', compact('messages'));
    }

    public function store_student_message(Request $request)
    {
        $request->validate([
            'message' => 'required',
        ]);

        $student_id = auth()->user()->id;
        $student = Student::find($student_id);
        $message = new Message;
        $message->message = $request->input('message');
        $student->messages()->save($message);

        return back()->with('success', 'Thank you! Your message has been successfully sent.');
    }
}

<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Parents;
use App\Models\Student;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index_parents()
    {
        $students = Message::with('student_messages')->latest()->simplePaginate(3, '*', 's_page');
        $parents = Message::with('parent_messages')->latest()->simplePaginate(3, '*', 'p_page');

        return view('admin.messages.parents', compact(['students', 'parents']));
    }

//    public function index_students()
//    {
//        $messages = Message::with('student_messages')->orderBy('created_at', 'desc')->paginate(10);
//
//        return view('admin.messages.students', compact('messages'));
//
//    }

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

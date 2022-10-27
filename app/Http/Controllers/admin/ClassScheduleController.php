<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\ClassSchedule;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class ClassScheduleController extends Controller
{
    public function index()
    {
        $classes = Classroom::where('status', '=', 'Active')->get();
        $subjects = Subject::all();
//        $schedules = ClassSchedule::all();

//        if ($request->ajax()) {
//            $this->schedules(req);
////            return view('components.schedule', compact('schedules'));
//        }

        return view(
            'admin.routines.index',
            compact([
                'classes',
                'subjects',
//                'schedules'
            ])
        );
    }

    public function schedules(Request $request)
    {
//        $schedules = ClassSchedule::all();
//
//        if ($request->ajax()) {
//            return view('components.schedule', compact('schedules'));
//        }
        $classes = Classroom::findOrFail($request->id);
//        $test = response()->js
//collect($classes->schedules);
        if ($request->ajax()) {
//            dump($classes->schedules);
            return view('components.schedule', compact('classes'));
//            foreach ($classes->schedules as $schedule) {
//                dump($schedule->subjects);
//            }
        }
//        return response()->json($classes->schedules);
//        return view('components.schedule', compact('routine'));
    }

//    public function ()
//    {
//
//    }

    public function teachers(Request $request)
    {
        $related_teachers = Subject::find($request->input('id'));

        return response()->json($related_teachers->teachers);
    }

    public function subjects(Request $request)
    {
        $class = Classroom::find($request->input('id'));
        $subjects = $class->group->branch->subjects;

        return response()->json($subjects);
    }

    public function store(Request $request)
    {
        $starting_hour = $request->input('starting_hour');
        $starting_minute = mktime(0, $request->input('starting_minute'), 0);
        $ending_hour = $request->input('ending_hour');
        $ending_minute = mktime(0, $request->input('ending_minute'), 0);
        $str_starting_hour = strtotime($starting_hour);
        $str_ending_hour = strtotime($ending_hour);

        $class = Classroom::find($request->input('class_id'));
        $subject = Subject::find($request->input('subject_id'));
        $teacher = Teacher::find($request->input('teacher_id'));

        $schedule = new ClassSchedule;
        $schedule->day = $request->input('day');
        $schedule->starting_hour = date('H', $str_starting_hour);
        $schedule->starting_minute = date('i:s', $starting_minute);
        $schedule->ending_hour = date('H', $str_ending_hour);
        $schedule->ending_minute = date('i:s', $ending_minute);

        $class->schedules()->save($schedule);
        $subject->schedules()->save($schedule);
        $teacher->schedules()->save($schedule);

        return to_route('admin.routines.index')->with('success', 'Success! You added class routine.');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}

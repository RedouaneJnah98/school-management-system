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
        $classes = Classroom::all();
        $subjects = Subject::all();

        return view(
            'admin.routines.index',
            compact([
                'classes',
                'subjects'
            ])
        );
    }

    public function teachers(Request $request)
    {
        $related_teachers = Subject::find($request->id);

        return response()->json($related_teachers->teachers);
    }

    public function store(Request $request)
    {
//        $class = Classroom::find($request->classroom_id);
//        $subject = Subject::find($request->subject_id);
//        $teacher = Teacher::find($request->teacher_id);

//        dd($request->all());
        $starting_hour = $request->starting_hour;
        $starting_minute = mktime(0, $request->starting_minute, 0);
        $ending_hour = $request->ending_hour;
        $ending_minute = mktime(0, $request->ending_minute, 0);

        $str_starting_hour = strtotime($starting_hour);
        $str_ending_hour = strtotime($ending_hour);
//        $str_starting_minute = strtotime($starting_minute);
//        $str_ending_minute = strtotime($ending_minute);
//        dd(date('H:i:s', $str_starting_minute));

//        $test1 = date('H', $str_starting_hour);
//        $test2 = date('i', $starting_minute);
//        dd(date('i:s', $starting_minute));
        $class_schedule = ClassSchedule::create([
            'classroom_id' => $request->class_id,
            'subject_id' => $request->subject_id,
            'teacher_id' => $request->teacher_id,
            'day' => $request->day,
            'starting_hour' => date('H', $str_starting_hour),
            'starting_minute' => date('i:s', $starting_minute),
            'ending_hour' => date('H', $str_ending_hour),
            'ending_minute' => date('i:s', $ending_minute)
        ]);

//        $test3 = strtotime('50');
//        $test = mktime(0, $starting_minute);
//        dd(date('i', $test));
//        dd(strtotime('25 minutes'));
//        mktime(0,257);
//        dd(date('H:i:s', $test3));

//        dd(mktime(0, 257));
//        dd($request->all());

//        $test3 = date('H', $str_starting_hour);
//        $test4 = date('H', $str_starting_hour);

//        $test = strtotime($starting_minute);

//        $test = $starting_minute . 'min';
//        dd(strtotime($test));
//        dd($str_starting_hour . ':' . $test);
//        dd(date('i', $test));
//        dd(date('H:i', $str_starting_hour . ':' . $starting_minute));
//        $start_time = $str_starting_hour . ':' . $starting_minute;

//        dd(date('H:i:s', $start_time));
//        date()
//        $class_schedule = ClassSchedule::create([
//            'classroom_id' => $request->class_id,
//            'subject_id' => $request->subject_id,
//            'teacher_id' => $request->teacher_id,
//            'starting_hour' => date('H', $str_starting_hour),
//            'ending_minute' => 'ending_hour'
//        ]);


//        dd($request->all());
//        $class_schedule = ClassSchedule::create([
//            'start_time' => $request->starting_hour,
//            'end_time' => $request->ending_hour,
//        ]);
//        $class->classroomSchedules()->syncWithPivotValues([$class_schedule->id], ['s']);

//        $class->classroomSchedules()->sync($class_schedule->id);

////        dd($request->all());
//        $classSchedule = new ClassSchedule();
//        $classSchedule->start_time = $request->starting_hour;
//        $classSchedule->end_time = $request->ending_hour;
////        $classSchedule->classScheduleable()->sync([$request->classroom_id, $request->subject_id, $request->teacher_id]);
////        dd($classSchedule);
//        $classSchedule->classScheduleable()->save([$class, $subject, $teacher]);
//
        if ($class_schedule) {
            return to_route('admin.routines.index')->with('success', 'Success!');
        }

        return back()->with('failed', 'error');
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Lesson;
class CoursesController extends Controller
{
    //
    public function show($course_name)
    {
    	//dd($course_name);
        $course = Course::where('course_name', $course_name)->with('lessons')->firstOrFail();
        //$purchased_course = \Auth::check() && $course->students()->where('user_id', \A//uth::id())->count() > 0;

        return view('course', compact('course'));
    }
}

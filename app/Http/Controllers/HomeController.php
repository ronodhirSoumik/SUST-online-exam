<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use DB;
use Auth;
use Validator;
use Hash;
use App\Teacher;
use App\User;
use App\Student;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
 //   public function __construct()
  //  {
  //      $this->middleware('auth');
   // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $courses = Course::orderBy('id', 'desc')->get();
        if(\Auth::user()->role_id == '3' )
        {
            $info = DB::table('student')->where('user_id',\Auth::id())
           ->select('name','registration_no','department','session','semester')
           ->get()
           ->first();
          // return view('index', compact('info'));
        }
        return view('index', compact('courses','info'));
    }

}

<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use DB;
class ShowResultController extends Controller
{
    public function index()
    {

    	$studinfo = DB::table('users')
            ->join('exams_results', 'users.id', '=', 'exams_results.user_id')
            ->join('student', 'users.id', '=', 'student.user_id')
            ->select('student.name', 'student.registration_no', 'exams_results.exam_result','exams_results.user_id' )
            ->orderBy('exams_results.user_id', 'desc')
            ->get();

        $examinfo = DB::table('exams')
            ->join('exams_results', 'exams.id', '=', 'exams_results.exam_id')
     		->select('exams.title')
     		->orderBy('exams_results.user_id', 'desc')
            ->get();

         return view('showResult', compact('studinfo','examinfo'));
    }
    
}
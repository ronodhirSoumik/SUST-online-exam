<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\User;
use Auth;
use DB;
use App\Student;
class ShowInformationController extends Controller
{
    public function index()
    {

        if(\Auth::user()->role_id == '2' )
        {
            $info = DB::table('teacher')->where('user_id',\Auth::id())
           ->select('name','department','designation')
           ->get()
           ->first();
           return view('home', compact('info'));
        }
        
    }
}
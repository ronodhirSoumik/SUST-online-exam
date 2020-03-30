<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use DB;
use Auth;
use Validator;
use Hash;

use App\Teacher;
use App\User;
use App\Student;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    ///////insert functions   
    function ins(Request $req)
    {
        $this->validate($req, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            
        ]);

        //attribute gula dhukao
        $Name = $req->input('name');
       // $Username = $req->input('username');
        $Email = $req->input('email');
        $pass = $req->input('password');
        $Password = Hash::make($pass);
        

        //attribute er name => variable ta dhukate chai shetar nam
        DB::table("users")->insert(["name"=>$Name,"email"=>$Email,"password"=>$Password]);
    //  DB::table('users')->insert($data);
/*     CHANGE HERE   return back();
*/        //echo "user inserted";
       return view('againStart');
    }


    //insert1 er kaj holo student dhukano
    function ins1(Request $req1)
    {
        $this->validate($req1, [
            'id1' => 'required',
            'id2' => 'required',
            'id3' => 'required',
            'id4' => 'required',
            'id5' => 'required'
             
        ]);
        $Name = $req1->input('id1');
        $Registration_no = $req1->input('id2');
        $Department = $req1->input('id3');
        $Session = $req1->input('id4');
        $Semester = $req1->input('id5');
        $user1 = DB::table('users')->orderBy('id', 'desc')->first();
        
        // var_dump($user1->id);
        $user_id = $user1->id;
        DB::table('users')->where('id', $user1->id)->update(['role_id' => 3]);
        DB::table('student')->insert(["name"=>$Name,"registration_no"=>$Registration_no,"department"=>$Department,"session"=>$Session,"semester"=>$Semester,"user_id"=>$user_id]

        );
                return view('auth.login');
       // echo "student inserted";
    }
    //insert2 er kaj hocche teacher dhukano
    function ins2(Request $req2)
    {
        $this->validate($req2, [
            'id1' => 'required',
            'id2' => 'required',
            'id3' => 'required'
        ]);

        $Name = $req2->input('id1');
        $Department = $req2->input('id2');
        $Designation = $req2->input('id3');
        $user1 = DB::table('users')->orderBy('id', 'desc')->first();
        //var_dump($user1->id);
        $user_id = $user1->id;
        DB::table('users')->where('id', $user1->id)->update(['role_id' => 2]);
        DB::table('teacher')->insert(["name"=>$Name,"department"=>$Department,"designation"=>$Designation,"user_id"=>$user_id]
        );
		return view('auth.login');
        //echo "teacher inserted";
    }
}

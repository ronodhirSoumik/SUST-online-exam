<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Auth;
use App\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
   /* protected $redirectTo = '/admin/home';*/

   protected function authenticated(Request $request)
   {
        if(Auth::user()->isAdmin())
        {
            return redirect('admin/home');
        }
         if(Auth::user()->isTeacher())
        {
            return redirect('admin/home');
        }
         if(Auth::user()->isStudent())
        {
            return redirect('dashboard');
        }


   }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    
}

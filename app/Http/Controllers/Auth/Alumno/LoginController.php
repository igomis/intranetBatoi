<?php

namespace Intranet\Http\Controllers\Auth\Alumno;

use Intranet\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Intranet\Entities\Alumno;
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
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/alumno/home';

    public function username()
    {
        return 'nia';
    }

    protected function guard()
    {
        return Auth::guard('alumno');
    }

    public function showLoginForm()
    {
        return view('/auth/alumno/login');
    }

    public function logout()
    {
        Auth::guard('alumno')->logout();
        return redirect('/login');
    }
    public function plogin(Request $request)
    {
        isset(Alumno::where('nia',$request->nia)->get()->first()->idioma)?session(['lang' => Alumno::where('nia',$request->nia)->get()->first()->idioma]):'ca';
        return $this->login($request);
    }

}

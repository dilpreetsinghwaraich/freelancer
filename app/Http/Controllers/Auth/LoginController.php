<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use DB;
use Session;
use Redirect;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function getLogin(){
        return view('auth.login');
    }

    public function getLogout(){
        Session::put([
            'login_id' => '',
            'user_type' => ''
        ]);
        return redirect('/');
    }

    public function postLogin(Request $request){
        if ($request->input('email') != '' && $request->input('password') != '') {
            $userName = $request->input('email');
            $userPass = md5($request->input('password'));
            
            $userdata = DB::table("users")
                    ->where('email', $userName)
                    ->where('password', $userPass)
                    ->get()->first();
                    
            if (sizeof($userdata) > 0) {
                Session::put([
                    'login_id' => $userdata->id,
                    'user_type' => $userdata->user_type
                ]);

                if($userdata->user_type == 'admin'){
                    return redirect('dashboard');
                }elseif($userdata->user_type == 'client'){
                    return redirect('cl/'.$userdata->id.'/dashboard');
                }elseif($userdata->user_type == 'freelancer'){
                    return redirect('profile/fl/'.$userdata->id);
                }
            } else {
                    $request->session()->flash('error_message', "&nbsp;&nbsp;Unauthorized Email ID or Password!!!");
                    return redirect('login');
                }
            
        }
    }
}

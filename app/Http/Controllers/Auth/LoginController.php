<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use DB;
use Session;
use Redirect;
use Illuminate\Support\Facades\Hash;
use App\User;
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
            'user_role' => ''
        ]);
        return redirect('/');
    }

    public function postLogin(Request $request){


        if ($request->input('email') != '' && $request->input('password') != '') {
            $userName = $request->input('email');
            $userPass = '$2y$10$sYwPSVmXDNa8hKotAlq'.md5($request->input('password'));
            
            $userdata = DB::table("users")
                    ->where('email', $userName)
                    ->where('password', $userPass)
                    ->get()->first();    
            if (sizeof($userdata) > 0) {
                if($userdata->user_status==0 || $userdata->token!='')
                {
                    return Redirect('login')->withErrors(['Look like your account is not varify, Please varify your email by click on link to login']);
                } 
                Session::put([
                    'login_id' => $userdata->user_id,
                    'user_role' => $userdata->user_role
                ]);

                if($userdata->user_role == 'admin'){
                    return redirect('dashboard');
                }elseif($userdata->user_role == 'client'){
                    return redirect('/joblist');
                }elseif($userdata->user_role == 'freelancer'){
                    return redirect('profile');
                }
            } else {
                    return Redirect('login')->withErrors(['Unauthorized Email ID or Password!!!']);
                }
            
        }else
        {
            return Redirect('login')->withErrors(['Please enter Email ID or Password!!!']);
        }
    }
    public function forget_password()
    {
        return view('auth.reset_password');
    }
    public function reset_password_forget(Request $request)
    {
        $result = user::reset_password($request->all());
        return Redirect('forget/password')->withErrors([$result]);
    }
    public function reset_password($reset_token)
    {
        if(empty($reset_token))
        {
            return Redirect('login')->withErrors(['Inavild Or expire token']);
        }
        $reset_token = $reset_token;
        return view('auth.reset_update_password',compact('reset_token'));
    }
    public function reset_update_password(Request $request, $reset_token)
    {
        $result = user::reset_update_password($request->all(),$reset_token);
        if($result=='updated')
        {
            return Redirect('login')->withErrors(['Your Password has been updated please login to continue']);
        }else
        {
            return Redirect('reset/password/'.$reset_token)->withErrors([$result]);
        }
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Session;
use DB;
class RegisterController extends Controller
{
    public function getRegisterForm(){
        return view('auth.register');
    }

    public function getFlRegisterForm(){
        return view('auth.flregister');
    }
    public  function store(Request $request) 
    {
        echo user::store($request->all());
    }
    public function activate_account($token='')
    {
        if (empty($token))
        {
            return Redirect('login')->withErrors(['Token is expired or invalid']);
        }
        $result = user::activate_account($token);
        if ($result == 'empty')
        {
            return Redirect('login')->withErrors(['Token is expired or invalid']);
        }else
        {
            return Redirect('login')->withErrors(['Your account activated successfully, Login to continue for find best job for you']);
        }
    }
    
}

<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Session;
use DB;
class User extends Authenticatable
{
    use Notifiable;

     /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public static $signupRules = array(
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        );
    public static $resetRules = array(
            'email' => 'required|string|email|max:255',
        );
    public static $resetupRules = array(
            'password' => 'required|string|min:8|confirm',
        );
    protected function store($request) 
    {
        $validation = Validator::make($request, self::$signupRules);
        if($validation->passes())
        {
            if(DB::table('users')->where('email',$request['email'])->first())
            {
                echo json_encode(['status'=>true,'message'=>'Email ID already exit','response'=>'']);
                die();
            }
            
            $random_key = sha1(mt_rand(10000,99999).time().$request['email']);
            $SaveData = DB::table('users')->insertGetId([
                'name' => $request['name'],
                'last_name' => $request['last_name'],
                'user_nicename' => $request['name'].' '.$request['last_name'],
                'user_role' => $request['user_role'],
                'email' => $request['email'],
                'password' => '$2y$10$sYwPSVmXDNa8hKotAlq'.md5($request['password']),
                'token' => $random_key,
                'user_status' => 0,
                'created_at'=>date('Y-m-d h:i:s'),
                'updated_at'=>date('Y-m-d h:i:s')
            ]);
            
            if (!$SaveData) {
               echo json_encode(['status'=>false,'message'=>'Something went wrong','response'=>'']);
               die();
            }else
            {
                self::wp_mail($request['name'],$request['email'],$random_key,'client');
                echo json_encode(['status'=>true,'message'=>'Hello '.$request['name'].', Your account created successfully, Email for confirmation has been send you','response'=>$SaveData]);
                die();
            }
        }else
        {
            echo json_encode(['status' => false, 'message' => $validation->getMessageBag()->first(),'response'=>'']);
            die();
        }
    }
    protected function activate_account($token)
    {
        if(DB::table('users')->where('token',$token)->first())
        {
            DB::table('users')->where('token',$token)->update(['user_status'=>1,'token'=>'']);
        }else
        {
            return 'empty';
        }
    }
    protected function reset_password($request)
    {
        $validation = Validator::make($request, self::$resetRules);
        if($validation->passes())
        {
            if(!DB::table('users')->where('email',$request['email'])->first())
            {
                return 'Look Like your account is exists in our system';
            }            
            $random_key = sha1(mt_rand(10000,99999).time().$request['email']);
            DB::table('users')->where('email',$request['email'])->update(['reset_token'=>$random_key]);
            self::wp_mail_reset($request['email'],$random_key);
            return 'Email has been sent you, Follow instruction to reset your password';
           
        }else
        {
            return $validation->getMessageBag()->first();
        }
    }
    protected function reset_update_password($request,$reset_token)
    {
        if(strlen($request['password'])<8)
        {
            return 'Minimum 8 character required is password';
        }
        if($request['password']!=$request['confirm'])
        {
            return 'Confirm password did not match';
        }
        if(!$user_d = DB::table('users')->where('reset_token',$reset_token)->select('name','email')->get()->first())
        {
            return 'Look Like Something went wrong, Please try after some time';
        }            
        DB::table('users')->where('reset_token',$reset_token)->update(['password'=>$request['password'],'reset_token'=>'']);
        self::wp_mail_update($user_d->name, $user_d->email);
        return 'updated';
    }
    protected function wp_mail_update($name, $email)
    {
        if($_SERVER['HTTP_HOST']=='localhost')
        {
            return;
        }
        if(empty($email))
        {
            return;
        }
        $subject = "Update Password";

        $message = "        
        <h3>Password Updated!</h3>";
        
        $message .= " <p>Your password update request accepted successfully</p>";

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        $headers .= 'From: <webmaster@example.com>' . "\r\n";
        $headers .= 'Cc: myboss@example.com' . "\r\n";

        mail($email,$subject,$message,$headers);
    }
    protected function wp_mail_reset($email, $random_key)
    {
        if($_SERVER['HTTP_HOST']=='localhost')
        {
            return;
        }
        if(empty($email))
        {
            return;
        }
        $subject = "Reset Password";

        $message = "<h3>Reset password request confirm!</h3>";
        
        $message .= " <p>Please <a href='".url('/reset/password')."/".$random_key."'>click</a> on this link to update your password</p>";

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        $headers .= 'From: <webmaster@example.com>' . "\r\n";
        $headers .= 'Cc: myboss@example.com' . "\r\n";

        mail($email,$subject,$message,$headers);
    }
    protected function wp_mail($name, $email, $random_key, $type)
    {
        if($_SERVER['HTTP_HOST']=='localhost')
        {
            return;
        }
        if(empty($email))
        {
            return;
        }
        $subject = "Welcome To Freelancer";

        $message = "<h3>Hello '.$name.', Thanks For your Registration!</h3>";
        if($type=='client')
        {
         $message .= "Your registration is for as Client";
        }else
        {
         $message .= "Your registration is for as Freelancer";
        }
        $message .= " <p>Your registration is almost completed, Please <a href='".url('/activate/account')."/".$random_key."'>click</a> this link to varify your email address</p>";

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        $headers .= 'From: <webmaster@example.com>' . "\r\n";
        $headers .= 'Cc: myboss@example.com' . "\r\n";

        mail($email,$subject,$message,$headers);
    }
}

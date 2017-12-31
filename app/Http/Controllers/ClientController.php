<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\HelperController as helper;
class ClientController extends Controller
{
    public function index(Request $request, $tab='')
    {
    	$user_id = Session::get('login_id');
    	$name = $request->input('find');
        $user_data = DB::table('users')->where('user_id', $user_id)->get()->first();
        $freelancers = DB::table('users')->where('user_role', 'freelancer')->where('user_nicename', 'LIKE', '%'.$name.'%')->get()->toArray();
        $freelancer = [];
        if(!empty($freelancers))
        {
        	foreach ($freelancers as $frelncer) {
        		$frelncer->status = DB::table('saved_freelancer')->where('user_id',$frelncer->user_id)->select('status')->get()->first();
        		$freelancer[] = $frelncer;
        	}
        }
        $saved_freelancer = DB::table('saved_freelancer')
        						->join('users','users.user_id','=','saved_freelancer.user_id')
        						->where('users.user_role', 'freelancer')
        						->where('saved_freelancer.client_id',$user_id)
        						->select('*')
        						->get()->toArray();
        						print_r($saved_freelancer);
    	return view('client.find_freelancer', compact('user_data','freelancer','saved_freelancer', 'tab'));
    }
    public function save_freelancer(Request $request)
    {

    	$client_id = Session::get('login_id');
    	$user_id = Crypt::decryptString($request->input('user_id'));
    	if(empty($saved_job = DB::table('saved_freelancer')->where('client_id',$client_id)->where('user_id',$user_id)->get()->first()))
		{
			DB::table('saved_freelancer')->insert(array('client_id'=>$client_id,'user_id'=>$user_id,'status'=>1,));
		}else
		{
			if($saved_job->status==1)
			{
				$status = 0;
			}else
			{
				$status = 1;
			}
			DB::table('saved_freelancer')->where('client_id',$client_id)->where('user_id',$user_id)->update(array('status'=>$status));
		}
		$saved_job = DB::table('saved_freelancer')->where('client_id',$client_id)->where('user_id',$user_id)->get()->first();
		return $saved_job->status;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Job as job;
use App\Proposals;
use Carbon\Carbon;
use App\Category;
use Session, DB;
use Redirect;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\HelperController as helper;
class FindworkController extends Controller
{
	public function index()
	{
		$user_id = Session::get('login_id');

		$user_data = DB::table('users')->where('user_id', $user_id)->get()->first();

        $profile_data = DB::table('user_profile')->where('user_id', $user_id)->get()->first();		
		return view('jobs.find_job', compact(['search','user_data','profile_data']));
	}
	public function get_search(Request $request)
	{
		$offset = (empty($request->get('offset'))?0:$request->get('offset'));
		$keyword = (empty($request->input('search_keyword'))?'':$request->input('search_keyword'));
		$search = job::search_job($keyword,$offset);
		if ($search && $keyword)
		{
			echo json_encode(array('html'=>self::search_html($search),'pagination'=>self::search_pagination($request)));
			die();
		}else
		{
			echo json_encode(array('html'=>'Sorry, there is no job found with your criteria','pagination'=>''));
			die();
		}		
	}
	public function search_html($searchs)
	{
		$html ='';
		foreach ($searchs as $search) {
			$pp_count = job::get_job_proposal_count($search->job_id);
			$user_cont = DB::table('user_profile')->where('user_id',$search->job_id)->select('country')->get()->first();
			$country = (($user_cont)?$user_cont->country:'');
			$job_skills = helper::maybe_unserialize($search->job_skills);
			$job_skills = (is_array($job_skills)?implode('</span><span>',$job_skills):$job_skills);
			$html .='<div class="jobpost">
              <h4><a href="'.url('/job/proposal/').'/'.Crypt::encryptString($search->job_id).'" class="readmore">'.$search->job_title.'</a></h4>
              <p class="jobdetails">Fixed-Price - Entry Level ($) - Est. Budget: $'.$search->budget.' - Posted '.self::get_duration_time($search->created_at ).' ago</p>
              <p class="projectdetails">'.str_limit($search->job_description,130).' ... <a href="'.url('/job/proposal/').'/'.Crypt::encryptString($search->job_id).'" class="readmore">more</a></p>
              <div class="projecttags"> <span>'.$job_skills.'</span> </div>
              <div class="clearfix"></div>
              <p class="proposaldetail">Proposals: '.$pp_count.' to 20  Number of freelancers needed: '.$search->fl_number.'</p>
              <p class="client-requirement"><span class="paymentverified">Client: <span class="glyphicon glyphicon-ok-circle"></span>Payment verified</span> <span class="amountspent">$600+ spent</span> <span class="clientlocation"><span class="glyphicon glyphicon-map-marker"></span>'.$country.'</span> </p>
            </div>';
		}
		return $html;
	}
	public function get_duration_time($date)
	{
		$t1 = Carbon::parse($date);
		$t2 = Carbon::parse();
		$diff = $t1->diff($t2);
		return $diff->format('%d')." days ". $diff->format('%h')." Hours ".$diff->format('%i')." Minutes";
	}
	public function search_pagination($request)
	{
		$keyword = $request->input('search_keyword');
		$offset = $request->input('offset')+1;
		$count = job::get_search_count($keyword);
		if(($count/15)<=$offset)
		{
			return;
		}
		return '<a href="'.url('/find/work').'?search_keyword='.$keyword.'&offset='.$offset.'">Load More</a>';
	}

	public function job_proposal($key='')
	{
		if(empty($key))
		{
			return redirect('/find/work');
		}
		$user_id = Session::get('login_id');
		$job_id = Crypt::decryptString($key);
		$jobs = job::get_job_proposal($job_id);
		$jobs->job_skills = helper::maybe_unserialize($jobs->job_skills);
		$saved_job = DB::table('job_saved')->where('job_id',$job_id)->where('user_id',$user_id)->select('status')->get()->first();
		$proposals = DB::table('proposals')->where('job_id',$job_id)->get()->count();
		$proposal_user = DB::table('proposals')->where('user_id',$user_id)->get()->count();
        return view("jobs.job_bidding", compact('jobs','saved_job','proposals','proposal_user'));
	}
	public function proposal($key)
	{
		if(empty($key))
		{
			return redirect('/find/work');
		}
		$job_id = Crypt::decryptString($key);
        $jobs = \DB::table('jobs')->where('job_id', $job_id)->get()->first();        
        $job_questions = helper::maybe_unserialize($jobs->job_questions);
        return view('jobs.submit_proposal', compact('jobs', 'job_questions'));
    }
    public function createproposal(Request $request){
        $data = $request->all();

        $user_id = Session::get('login_id');
        $proposal = new Proposals();

        if(!empty(DB::table('proposals')->where('user_id',$user_id)->where('job_id',$request->job_id)->get()->first()))
        {
        	return Redirect::back()->withErrors(['You are already applied for this job']);
        }
        
        $proposal->job_id = $request->job_id;
        $proposal->bid_amount = $request->bid_amount;
        $proposal->pay_amount = $request->pay_amount;
        $proposal->cover_letter = $request->cover_letter;
        $proposal->question_ans  = helper::maybe_serialize($request->question_ans);
        $proposal->duration = $request->duration;
        $proposal->user_id = $user_id;
        $proposal->attachment_file = !empty($request->attachment_file) ? $request->attachment_file : 0 ;

        $proposal->save();

        return redirect('/proposals');
    }
    public function save_job(Request $request)
    {
    	$user_id = Session::get('login_id');
    	$job_id = Crypt::decryptString($request->input('job_id'));
    	if(empty($saved_job = DB::table('job_saved')->where('job_id',$job_id)->where('user_id',$user_id)->get()->first()))
		{
			DB::table('job_saved')->insert(array('job_id'=>$job_id,'user_id'=>$user_id,'status'=>1,));
		}else
		{
			if($saved_job->status==1)
			{
				$status = 0;
			}else
			{
				$status = 1;
			}
			DB::table('job_saved')->where('job_id',$job_id)->where('user_id',$user_id)->update(array('status'=>$status));
		}
		$saved_job = DB::table('job_saved')->where('job_id',$job_id)->where('user_id',$user_id)->get()->first();
		return $saved_job->status;
    }
    
}

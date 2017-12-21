<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Job;
use App\Proposal;
use Carbon\Carbon;
use App\Category;
use Session;

class JobController extends Controller
{
    //

    public function jobpost(){

        $categories = Category::all();
        //return $categories;
        //print_r($categories);die();

    	return view('jobs.jobpost', compact('categories'));
    }

    public function createJob(Request $request){
    	$data = $request->all();

        if($request->id > 0){
            $job = Job::find($request->id);
        }else{
            $job = new Job;

            $user_id = Session::get('login_id');
            $job->user_id = $user_id;
        }
    	
    	
    	$job->job_type = $request->job_type;
        $job->job_title = $request->job_title;
        $job->category = $request->category;
    	$job->budget = $request->budget;
    	$job->job_description = $request->job_description;
    	$job->project_type = $request->project_type;
    	$job->fl_number = $request->fl_number;
    	$job->job_skills = $request->job_skills;
    	$job->experience_level = $request->experience_level;
    	$job->job_duration = $request->job_duration;
    	$job->job_time = $request->job_time;
    	$job->job_questions = serialize($request->job_questions);
        
    	$job->job_cover_letter = !empty($request->job_cover_letter) ? $request->job_cover_letter : 0;

        $job->job_boost = !empty($request->job_boost) ? $request->job_boost : 0 ;

    	$job->status = !empty($request->status) ? $request->status : 0 ;

    	$job->save();

    	return redirect('/joblist');
    }



public function createproposal(Request $request){
        $data = $request->all();

        $user_id = Session::get('login_id');
            $proposal = new Proposal;

        
        
        
        $proposal->job_id = $request->job_id;
        $proposal->bid_amount = $request->bid_amount;
        $proposal->pay_amount = $request->pay_amount;
        $proposal->cover_letter = $request->cover_letter;
        $proposal->question_ans  = serialize($request->question_ans);
        $proposal->duration = $request->duration;
        $proposal->user_id = $user_id;
        $proposal->attachment_file = !empty($request->attachment_file) ? $request->attachment_file : 0 ;

        $proposal->save();

        return redirect('/joblist');
    }


    public function editjobpost($id){
        $jobs = \DB::table('jobs')->where('id', $id)->get()->first();
        $categories = Category::all();

        $job_questions = unserialize($jobs->job_questions);

        //print_r($job_questions);die();
        
        return view('jobs.edit_job', compact('jobs', 'categories', 'job_questions'));
    }


    public function joblisting(){
        $user_id = Session::get('login_id');

        if(Session::get('user_type') == 'admin'){
            $jobs = \DB::table('jobs')->get();
        }else{
    	   $jobs = \DB::table('jobs')->where('user_id', $user_id)->get();
        }
    	

    	return view('jobs.job_listing', compact('jobs'));
    }

    public function jobbidding($id){
        $jobs = \DB::table('jobs')->where('id', $id)->get()->first();
        return view("jobs.job_bidding", compact('jobs'));
    }

    public function proposal($id){
        $jobs = \DB::table('jobs')->where('id', $id)->get()->first();

       $job_questions = unserialize($jobs->job_questions);

        return view('jobs.submit_proposal', compact('jobs', 'job_questions'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Job;
use App\Proposal;
use Carbon\Carbon;
use App\Category;
use Session, DB;
use App\Http\Controllers\HelperController as helper;
class JobController extends Controller
{
    public function jobpost_type(Request $request)
    {
        if($request->input('job_id'))
        {
            return Redirect('/jobpost/'.$request->input('job_type').'/'.$request->input('job_id'));
        }
        return Redirect('/jobpost/'.$request->input('job_type'));
    }

    public function jobpost($job_type='',$job_id=''){

        $categories = DB::table('categories')->select('category_id','name')->get()->toArray();
        $user_id = Session::get('login_id');
        $jobs = \DB::table('jobs')->select('job_id','job_title')->where('user_id', $user_id)->select('*')->get()->toArray();
        if($job_type=='new-job')
        {
            return view('jobs.jobpost_new', compact(['categories','jobs','job_type']));
        }
        elseif($job_type=='re-usejobe')
        {
            $job = \DB::table('jobs')->where('job_id', $job_id)->where('user_id', $user_id)->get()->first();
            if(empty($job))
            {
                return view('jobs.jobpost_new', compact(['categories','jobs','job_type']));
            }
            $job->job_skills = (!empty($job->job_skills)?helper::maybe_unserialize($job->job_skills):$job->job_skills);
            $job_questions = helper::maybe_unserialize($job->job_questions);
            return view('jobs.jobpost_reuse', compact('job', 'jobs', 'categories', 'job_questions', 'job_type'));
        }else
        {
            return view('jobs.jobpost_type', compact(['categories','jobs']));
        }
    	
    }

    public function createJob(Request $request){
    	$data = $request->all();

        if($request->job_id > 0){
            $job = Job::find($request->job_id);
        }else{
            $job = new Job;

            $user_id = Session::get('login_id');
            $job->user_id = $user_id;
        }
    	
    	$job->job_type = $request->job_type;
        $job->job_title = $request->job_title;
        $job->category_id = $request->category_id;
    	$job->budget = $request->budget;
    	$job->job_description = $request->job_description;
    	$job->project_type = $request->project_type;
    	$job->fl_number = $request->fl_number;
    	$job->job_skills = helper::maybe_serialize($request->job_skills);
    	$job->experience_level = $request->experience_level;
    	$job->job_duration = $request->job_duration;
    	$job->job_time = $request->job_time;
    	$job->job_questions = helper::maybe_serialize($request->job_questions);
        if($request->file('attachments'))
        {
            $job->attachments = helper::maybe_serialize(self::fileupload($request));
        }        
    	$job->job_cover_letter = !empty($request->job_cover_letter) ? $request->job_cover_letter : 0;

        $job->job_boost = !empty($request->job_boost) ? $request->job_boost : 0 ;

    	$job->status = !empty($request->status) ? $request->status : 0 ;

    	$job->save();

    	return redirect('/joblist');
    }
	public function update_job(Request $request)
	{
		$job = [];
        $job['job_title'] = $request->input('job_title');
        $job['category_id'] = $request->input('category_id');
    	$job['budget'] = $request->input('budget');
    	$job['job_description'] = $request->input('job_description');
    	$job['project_type'] = $request->input('project_type');
    	$job['fl_number'] = $request->input('fl_number');
    	$job['job_skills'] = helper::maybe_serialize($request->input('job_skills'));
    	$job['experience_level'] = $request->input('experience_level');
    	$job['job_duration'] = $request->input('job_duration');
    	$job['job_time'] = $request->input('job_time');
    	$job['job_questions'] = helper::maybe_serialize($request->input('job_questions'));
        
        if($request->file('attachments'))
        {
            $job['attachments'] = helper::maybe_serialize(self::fileupload($request));
        }
        
    	$job['job_cover_letter'] = !empty($request->input('job_cover_letter')) ? $request->input('job_cover_letter') : 0;

        $job['job_boost'] = !empty($request->input('job_boost')) ? $request->input('job_boost') : 0 ;

    	$job['status'] = !empty($request->input('status')) ? $request->input('status') : 0 ;

		$job_id = $request->input('job_id');
		DB::table('jobs')->where('job_id',$job_id)->update($job);
		return redirect('/joblist');
	}

    public function editjobpost($id){
        $jobs = \DB::table('jobs')->where('job_id', $id)->get()->first();
        $jobs->job_skills = (!empty($jobs->job_skills)?helper::maybe_unserialize($jobs->job_skills):$jobs->job_skills);
        $categories = Category::all();

        $job_questions = helper::maybe_unserialize($jobs->job_questions);
        
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
    public function fileupload($request){

       $files = $request->file('attachments');
          $uploaded_file = array();
          foreach($files as $file) {
                    $destinationPath = 'public/images/uploads/'.date('Y').'/'.date('M');
                    $filename = str_replace(array(' ','-','`',','),'_',time().'_'.$file->getClientOriginalName());
                    $upload_success = $file->move($destinationPath, $filename);
                    $uploaded_file[] = 'public/images/uploads/'.date('Y').'/'.date('M').'/'.$filename;
          }
          return $uploaded_file;
   }
    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;

class ProfileController extends Controller
{
    private $user_id;
    public function __construct(){
        $this->user_id = Session::get('login_id');
    }
    
    
    public function profile( $type, $username){
        $user_id = Session::get('login_id');

        $user_data = DB::table('users')->where('id', $user_id)->get()->first();

        //print_r($user_data);die();

        $profetional_skills = '';
        $selected_skills = array();
        //$profile_data = [];   

        $profile_data = DB::table('freelancer_profiles')->where('user_id', $username)->get()->first();

        $profetionl_skills = DB::table('profetionls')->select('id', 'name as text')->get();

        if(!empty($profile_data))
        $profetional_skills = explode(",", $profile_data->profetional_skills);
        

        if(!empty($profetional_skills))
        $selected_skills = DB::table('profetionls')->whereIn('id', $profetional_skills)->get();

        $all_languages = DB::table('user_languages')->where('user_id', $user_id)->get();

        $all_portfolio = DB::table('portfolios')->where('user_id', $user_id)->take(4)->get();

        $all_education = DB::table('user_education')->where('user_id', $user_id)->take(4)->get();

        $all_category = DB::table('categories')->get();

    	return view('user.profile', compact(['user_data', 'profile_data', 'profetionl_skills', 'selected_skills', 'all_languages', 'all_portfolio', 'all_education', 'all_category']));
    	
    }

    public function update(Request $request, $id){
        //return $request->all();
        $profile_data = array();

        $job_title = $request->input('job_title');
        $profetional_skills = $request->input('profetional_skills');
        $overview = $request->input('overview');
        $availability_type = $request->input('availability_type');
        $not_available_text = $request->input('not_available_text');

        if(!empty($job_title)){
            $profile_data['job_title'] = $job_title;
        }

        if(!empty($profetional_skills)){
            $profile_data['profetional_skills'] = $profetional_skills;
        }

        if(!empty($overview)){
            $profile_data['overview'] = $overview;
        }

        if(!empty($availability_type)){
            $profile_data['availability_type'] = $availability_type;
            $not_available_text = '';
        }

        if(!empty($not_available_text)){
            $profile_data['not_available_text'] = $not_available_text;

            $profile_data['availability_type'] = 0;
        }

        $user_id = Session::get('login_id');

        
        $profile_data['user_id'] = $user_id;
        
       
        //print_r($profile_data); die();

        $profile = DB::table('freelancer_profiles')->where('user_id', $id)->get()->first();

        if(count($profile) == 0){
            // insert into freelancer_profiles
            DB::table('freelancer_profiles')->insert($profile_data);

        }else{
            // update into freelancer_profiles
            Db::table('freelancer_profiles')->where('user_id', $id)->update($profile_data);
        }


        // Language Update
        $lang_skill = $request->input('lang_skill');
        $lang_name = $request->input('lang_name');
        $lang_id = $request->input('id');
        if(!empty($lang_skill)){
            $lang_data['lang_name'] = $lang_name;
            $lang_data['lang_skill'] = $lang_skill;
            $lang_data['user_id'] = $user_id;

            if($lang_id == 0){
                DB::table('user_languages')->insert($lang_data);
            }else{
                DB::table('user_languages')->where('id', $lang_id)->update($lang_data);
            }
        }

        // Portfolio

        $portfolio = array();
        $project_title = $request->input('project_title');
        if(!empty($project_title)){

            $thumb = $request->thumb_image;
            $file_name = $thumb->store('portfolio');

            $portfolio['thumb_image'] = $file_name;
            $portfolio['user_id'] = $user_id;
            $portfolio['project_title'] = $project_title;

            $portfolio['project_overview'] = $request->input('project_overview');

            $portfolio['project_id'] = $request->input('project_id');

            $portfolio['category_id'] = $request->input('category_id');

            $portfolio['project_url'] = $request->input('project_url');

            $portfolio['completion_date'] = $request->input('completion_date');

            $portfolio['completion_date'] = $request->input('completion_date');

            DB::table('portfolios')->insert($portfolio);
        }

        //Education
        $education = array();
        $education = $request->all();
        
        if(!empty($education['school'])){
            unset($education['_token']);
            $education['user_id'] = $user_id;
            DB::table('user_education')->insert($education);
        }


        $type = 'fl';
        $username = $id;
        return redirect('profile/'.$type.'/'.$id);
    }

    public function updateEducation(Request $request){

    }
}

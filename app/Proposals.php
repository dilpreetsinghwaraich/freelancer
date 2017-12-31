<?php

namespace App;
use Session, DB;
use Illuminate\Database\Eloquent\Model;

class Proposals extends Model
{
   protected function get_submitted_proposals()
   {
   		$user_id = Session::get('login_id');
   		return DB::table('proposals')
   						->join('jobs','jobs.job_id','=','proposals.job_id')
   						->where('proposals.user_id','=',$user_id)
   						->where('proposals.status',0)
   						->where('proposals.invitation_interview',0)
   						->where('proposals.offers',0)
   						->select('jobs.job_title','jobs.job_skills','jobs.job_description','jobs.job_id','proposals.created_at as received','proposals.proposal_id')
   						->get()
   						->toArray();
   }
   protected function get_invitaion_interview()
   {
   		$user_id = Session::get('login_id');
   		return DB::table('proposals')
   						->join('jobs','jobs.job_id','=','proposals.job_id')
   						->where('proposals.user_id','=',$user_id)
   						->where('proposals.status',1)
   						->where('proposals.invitation_interview',1)
   						->select('jobs.job_title','jobs.job_skills','jobs.job_description','jobs.job_id','proposals.created_at as received','proposals.proposal_id')
   						->get()
   						->toArray();
   }
   protected function get_offers()
   {
   		$user_id = Session::get('login_id');
   		return DB::table('proposals')
   						->join('jobs','jobs.job_id','=','proposals.job_id')
   						->where('proposals.user_id','=',$user_id)
   						->where('proposals.status',1)
   						->where('proposals.offers',1)
   						->select('jobs.job_title','jobs.job_skills','jobs.job_description','jobs.job_id','proposals.created_at as received','proposals.proposal_id')
   						->get()
   						->toArray();
   }
   protected function get_archived_proposals()
   {
   		$user_id = Session::get('login_id');
   		return DB::table('proposals')
   						->join('jobs','jobs.job_id','=','proposals.job_id')
   						->where('proposals.user_id','=',$user_id)
   						->where('proposals.status',-1)
   						->select('jobs.job_title','jobs.job_skills','jobs.job_description','jobs.job_id','proposals.created_at as received','proposals.proposal_id')
   						->get()
   						->toArray();
   }
   protected function get_saved_job()
   {
      $user_id = Session::get('login_id');
      $save_job = DB::table('job_saved')->where('user_id',$user_id)->where('status',1)->select('job_id')->get()->toArray();
      $job_ids = [];
      if ($save_job)
      {
         foreach ($save_job as $jobs) {
            $job_ids[] = $jobs->job_id;
         }
         return \DB::table('jobs')->select('*')->wherein('job_id', $job_ids)->select('*')->get()->toArray();
      }
      return;
   }
   protected function get_completed_job()
   {
      $user_id = Session::get('login_id');
      $save_job = DB::table('job_completed')
                           ->join('proposals','proposals.proposal_id','=','job_completed.proposal_id')
                           ->where('job_completed.user_id',$user_id)->where('job_completed.status',1)->select('job_completed.job_id')->get()->toArray();
      $job_ids = [];
      if ($save_job)
      {
         foreach ($save_job as $jobs) {
            $job_ids[] = $jobs->job_id;
         }
         return \DB::table('jobs')->select('*')->wherein('job_id', $job_ids)->where('job_completed',1)->select('*')->get()->toArray();
      }
      return;
   }
   protected function get_contract_job()
   {
      $user_id = Session::get('login_id');
      $save_job = DB::table('job_completed')
                           ->join('proposals','proposals.proposal_id','=','job_completed.proposal_id')
                           ->where('job_completed.user_id',$user_id)->where('job_completed.status',1)->select('job_completed.job_id')->get()->toArray();
      $job_ids = [];
      if ($save_job)
      {
         foreach ($save_job as $jobs) {
            $job_ids[] = $jobs->job_id;
         }
         return \DB::table('jobs')->select('*')->wherein('job_id', $job_ids)->where('job_completed',1)->select('*')->get()->toArray();
      }
      return;
   }
}

<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
   protected function search_job($keyword,$offset)
   {
   	   $offset = 15*$offset;
	   return DB::table('jobs')->select('*')->where('job_skills','like','%'.$keyword.'%')->limit(15)->offset($offset)->get()->toArray();
   }
   protected function get_search_count($keyword)
   {
   	   return DB::table('jobs')->select('*')->where('job_skills','like','%'.$keyword.'%')->get()->count();
   }
   protected function get_job_proposal($job_id)
   {
   		return \DB::table('jobs')->where('job_id', $job_id)->get()->first();
   }
   protected function get_job_proposal_count($job_id)
   {
      return DB::table('proposals')->where('job_id',$job_id)->get()->count();
   }
}

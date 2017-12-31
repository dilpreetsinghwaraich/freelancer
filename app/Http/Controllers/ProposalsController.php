<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Job as job;
use App\Proposals;
use Carbon\Carbon;
use App\Category;
use Session, DB;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\HelperController as helper;
class ProposalsController extends Controller
{
	public function index()
	{
		$proposals = proposals::get_submitted_proposals();
		$interview = proposals::get_invitaion_interview();
		$offers = proposals::get_offers();
		$archived = proposals::get_archived_proposals();	
		return view('proposals.proposal_list',compact(['proposals','interview','offers','archived']));
	}
	public function save_job()
	{
		$saved_job  = proposals::get_saved_job();
		return view('proposals.saved_job_list',compact('saved_job'));
	}
	public function my_completed_job()
	{
		$jobs  = proposals::get_completed_job();
		return view('proposals.my_job',compact('jobs'));
	}
	public function my_contract_job()
	{
		$jobs  = proposals::get_contract_job();
		return view('proposals.my_contract',compact('jobs'));
	}
    
}

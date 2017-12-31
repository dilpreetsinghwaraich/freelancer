@extends('layouts.app')

@section('content')
<div class="clientdashboardarea">
  <div class="container">
    <div class="clearfix"></div>
    
    <div class="row">
      <div class="col-md-12 col-sm-12 "> 
        <!-- Tab panes -->
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="sub_proposal">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="row">
                <?php
                if(!empty($jobs))
                {
        					foreach($jobs as $job)
        					{
        						$job_skills = App\Http\Controllers\HelperController::maybe_unserialize($job->job_skills);
        						$job_skills = (is_array($job_skills)?implode('</span><span>',$job_skills):$job_skills);
        					 ?>
        					  <div class="col-xs-12 with-border freelancer-list">
        						<div class="f-info">
        						  <label><a href="{{ url('job/proposal/') }}/<?php echo \Crypt::encryptString($job->job_id) ?>" ><?php echo $job->job_title; ?></a></label>
        						  <div class="projecttags"> <span><?php echo $job_skills ?></span> </div>
        						  <div class="col-md-12"> <?php echo date('M d, Y', strtotime($job->created_at)); ?> </div>
        						  <div class="col-xs-12 f-short-desc"><?php echo $job->job_description; ?></div>
        						</div>
        					  </div>
        					  <?php
        					}
                }else
                {
                  echo 'There is no Completed job yet!!!';
                }
        				?>
                </div>
              </div>
            </div>
          </div>     
          
          
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
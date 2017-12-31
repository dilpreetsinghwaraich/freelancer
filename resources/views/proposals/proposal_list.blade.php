@extends('layouts.app')

@section('content')
<div class="clientdashboardarea">
  <div class="container">
    <div class="clearfix"></div>
    <ul class="nav nav-tabs my_navs" role="tablist">
      <li role="presentation" class="active"><a href="#sub_proposal" aria-controls="sub_proposal" role="tab" data-toggle="tab" aria-expanded="true">Submitted Proposals (<?php echo count($proposals) ?>)</a></li>
      <li role="presentation" class=""><a href="#inter__invitation" aria-controls="inter__invitation" role="tab" data-toggle="tab" aria-expanded="true">Invitations to Interview (<?php echo count($interview) ?>)</a></li>
      <li role="presentation" class=""><a href="#Offers" aria-controls="Offers" role="tab" data-toggle="tab" aria-expanded="true">Offers (<?php echo count($offers) ?>)</a></li>
      <li role="presentation" class=""><a href="#archioved_proposal" aria-controls="archioved_proposal" role="tab" data-toggle="tab" aria-expanded="false"> Archived (<?php echo count($archived) ?>)</a></li>
    </ul>
    <div class="row">
      <div class="col-md-12 col-sm-12 "> 
        <!-- Tab panes -->
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="sub_proposal">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="row">
                <?php
                if(!empty($proposals))
                {
        					foreach($proposals as $proposal)
        					{
        						$job_skills = App\Http\Controllers\HelperController::maybe_unserialize($proposal->job_skills);
        						$job_skills = (is_array($job_skills)?implode('</span><span>',$job_skills):$job_skills);
        					 ?>
        					  <div class="col-xs-12 with-border freelancer-list">
        						<div class="f-info">
        						  <label><a href="{{ url('job/proposal/') }}/<?php echo \Crypt::encryptString($proposal->job_id) ?>" ><?php echo $proposal->job_title; ?></a></label>
        						  <div class="projecttags"> <span><?php echo $job_skills ?></span> </div>
        						  <div class="col-md-12"> <?php echo date('M d, Y', strtotime($proposal->received)); ?> </div>
        						  <div class="col-xs-12 f-short-desc"><?php echo $proposal->job_description; ?></div>
        						</div>
        					  </div>
        					  <?php
        					}
                }else
                {
                  echo 'There is no proposals yet!!!';
                }
        				?>
                </div>
              </div>
            </div>
          </div>
          <div role="tabpanel" class="tab-pane" id="inter__invitation">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="row">
                  <?php
                  if(!empty($interview))
                  {
          					foreach($interview as $int)
          					{
          						$job_skills = App\Http\Controllers\HelperController::maybe_unserialize($int->job_skills);
          						$job_skills = (is_array($job_skills)?implode('</span><span>',$job_skills):$job_skills);
          					 ?>
          					  <div class="col-xs-12 with-border freelancer-list">
          						<div class="f-info">
          						  <label><a href="{{ url('job/proposal/') }}/<?php echo \Crypt::encryptString($int->job_id) ?>" ><?php echo $int->job_title; ?></a></label>
          						  <div class="projecttags"> <span><?php echo $job_skills ?></span> </div>
          						  <div class="col-md-12"> <?php echo date('M d, Y', strtotime($int->received)); ?> </div>
          						  <div class="col-xs-12 f-short-desc"><?php echo $int->job_description; ?></div>
          						</div>
          					  </div>
          					  <?php
          					}
                  }else
                  {
                    echo 'There is no Interview received yet!!!';
                  }
          				?>
                </div>
              </div>
            </div>
          </div>
          <div role="tabpanel" class="tab-pane" id="Offers">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="row">
                  <?php
                  if(!empty($offers))
                  {
          					foreach($offers as $ofer)
          					{
          						$job_skills = App\Http\Controllers\HelperController::maybe_unserialize($ofer->job_skills);
          						$job_skills = (is_array($job_skills)?implode('</span><span>',$job_skills):$job_skills);
          					 ?>
          					  <div class="col-xs-12 with-border freelancer-list">
          						<div class="f-info">
          						  <label><a href="{{ url('job/proposal/') }}/<?php echo \Crypt::encryptString($ofer->job_id) ?>" ><?php echo $ofer->job_title; ?></a></label>
          						  <div class="projecttags"> <span><?php echo $job_skills ?></span> </div>
          						  <div class="col-md-6 col-lg-3"> <?php echo date('M d, Y', strtotime($ofer->received)); ?> </div>
          						  <div class="col-xs-12 f-short-desc"><?php echo $ofer->job_description; ?></div>
          						</div>
          					  </div>
          					  <?php
          					}
                  }else
                  {
                    echo 'There is no offer yet!!!';
                  }
          				?>
                </div>
              </div>
            </div>
          </div>
          <div role="tabpanel" class="tab-pane" id="archioved_proposal">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="row">
                  <?php
                  if(!empty($archived))
                  {
          					foreach($archived as $arch)
          					{
          						$job_skills = App\Http\Controllers\HelperController::maybe_unserialize($arch->job_skills);
          						$job_skills = (is_array($job_skills)?implode('</span><span>',$job_skills):$job_skills);
          					 ?>
          					  <div class="col-xs-12 with-border freelancer-list">
          						<div class="f-info">
          						  <label><a href="{{ url('job/proposal/') }}/<?php echo \Crypt::encryptString($arch->job_id) ?>" ><?php echo $arch->job_title; ?></a></label>
          						  <div class="projecttags"> <span><?php echo $job_skills ?></span> </div>
          						  <div class="col-md-6 col-lg-3"> <?php echo date('M d, Y', strtotime($arch->received)); ?> </div>
          						  <div class="col-xs-12 f-short-desc"><?php echo $arch->job_description; ?></div>
          						</div>
          					  </div>
          					  <?php
          					}
                  }else
                  {
                    echo 'There is not any archived propsals yet!!!';
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
@extends('layouts.app')

@section('content')
<?php 

$job_skills = (is_array($jobs->job_skills)?implode('</span><span>',$jobs->job_skills):$jobs->job_skills);

?>
	<div class="clientdashboardarea">
      <div class="container">
        <div class="row clienttoprow">
          <div class="col-md-9 col-sm-12">
            <h3 class="project-title">@if(!empty($jobs->job_title)) {{$jobs->job_title}} @endif</h3>
          </div>
          <div class="col-md-3 col-sm-12">
            <a href="#">Flag as inappropriate</a>
          </div>
        </div>
        <div class="row project-info-bar">
          <div class="col-sm-12 job-top-info">
            <button class="btn badge ">{{ $jobs->category_id }}</button> <small>Posted {{\Carbon\Carbon::createFromTimeStamp(strtotime($jobs->created_at))->diffForHumans()}}</small>
          </div>
          <div class="col-md-4 col-sm-6 job-info-col">
            <div class="pull-left">
              <span class="fa fa-money " aria-hidden="true"></span>
            </div>
            <div class="col-md-10">
              <div class="project-price"><small>Fixed Price</small></div>
              @if($jobs->budget > 0)
              <small class="text-muted">Budget: ${{ $jobs->budget }}</small>
              @endif
              <br>
            </div>
          </div>
          <div class="col-md-3 job-info-col">
          	@if($jobs->experience_level == 1)
            <div class="pull-left ">
            	$
        	</div>
            
            <div class="pull-left col-md-10">
              <p><small>Entry Level</small></p>
            </div>

            @elseif($jobs->experience_level == 2)
            	<div class="pull-left ">
            	$$
        	</div>
            
            <div class="pull-left col-md-10">
              <p><small>Intermediate Level</small></p>
            </div>

            @elseif($jobs->experience_level == 3)
            	<div class="pull-left ">
            	$$$
        	</div>
            
            <div class="pull-left col-md-10">
              <p><small>Expert Level</small></p>
            </div>

            @endif
          </div>
          <div class="col-md-4 col-sm-6  job-info-col">
            <div class="pull-left">
              <span class="fa fa-calendar " aria-hidden="true"></span>
            </div>
            <div class="col-md-10">
              <div class="project-date"><small>Start Date</small></div>
              <small class="text-muted">{{ date("F d Y", strtotime($jobs->created_at)) }}</small><br>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
          <div class="col-md-9 col-sm-12 ">
            <div class="clientjobfeed">
              <header>
                <h3>Details</h3>
              </header>
              <div class="jobfeed">
                <div class="jobpost">
                  <p>@if(!empty($jobs->job_description)){{ $jobs->job_description }} @endif</p>


                  <ul class="list-unstyled">
                  	@if(!empty($jobs->project_type))
                  		@if($jobs->project_type == 1)
                  			<li>
		                      <strong class="m-sm-right">Project Stage:</strong> One-time project
		                    </li>
                  		@endif

                  		@if($jobs->project_type == 2)
                  			<li>
		                      <strong class="m-sm-right">Project Stage:</strong> Ongoing project
		                    </li>
                  		@endif

                  		@if($jobs->project_type == 3)
                  			<li>
		                      <strong class="m-sm-right">Project Stage:</strong>  I am not sure 
		                    </li>
                  		@endif

                  	@endif
                    
                    <!--<li>
                      <strong class="m-sm-right">One-time Project:</strong> Develop website from scratch
                    </li>
                    <li>
                      <strong class="m-sm-right">Project Type:</strong> One-time project
                    </li>-->
                    <li>
                    </li>
                    <li>
                      <strong class="m-sm-right">Programming Languages Required:</strong> 
                      <div class="projecttags inline"> 
                      	<span><?php echo $job_skills ?></span>
                        <!--<span data-toggle="tooltip"
                              data-placement="bottom"
                              title="PHP is a general-purpose server-side scripting language originally designed for web development to produce dynamic web pages.">PHP</span>
                        <span data-toggle="tooltip"
                              data-placement="bottom"
                              title="PHP is a general-purpose server-side scripting language originally designed for web development to produce dynamic web pages.">Web Development</span>
                        <span data-toggle="tooltip"
                              data-placement="bottom"
                              title="PHP is a general-purpose server-side scripting language originally designed for web development to produce dynamic web pages.">MySQL</span>--> </div>
                    </li>
                    <!--<li>
                      <strong class="m-sm-right">Other Skills:</strong>
                      <div class="projecttags inline"> 
                        <span  data-toggle="tooltip"
                               data-placement="bottom"
                               title="PHP is a general-purpose server-side scripting language originally designed for web development to produce dynamic web pages.">PHP</span> </div>
                    </li>-->
                  </ul>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <h4>Preferred Qualifications</h4>
                    <p>
                      <span class="text-muted">Job Success Score:</span>
                      At least 90%
                      <i class="fa fa-check-circle-o"></i>
                    </p>
                  </div>
                  <div class="col-md-6">
                    <h4>Activity on this Job</h4>
                    <p>
                      <span class="text-muted">Proposals:</span>
                      50

                      <i class="fa fa-question-circle"
                         data-toggle="tooltip"
                         title="This range includes relevant proposals, but does not include proposals that are withdrawn, declined, or archived. Please note that all proposals are accessible to clients on their applicants page."
                         data-placement="bottom" 
                         ></i>
                    </p>
                    <p>
                      <span class="text-muted">Interviewing:</span>
                      1
                    </p>
                    <p>
                      <span class="text-muted">Invites Sent:</span>
                      2
                    </p>
                    <p>
                      <span class="text-muted">Unanswered Invites:</span>
                      0
                    </p>
                  </div>
                </div>

              </div>

            </div>
            <div class="clientjobfeed">
              <h3>Client's Work History and Feedback (8)</h3>

              <div class="client-history">
                <h4><a href="#">4 more banners for Magisto</a></h4>
                <div class="row">
                  <div class="col-md-8">
                    <p><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                      Shay is good and fantastic. Will work with him again.</p>
                    <p>
                      <small>
                        To Freelancer: <a href="#">Elron Mathew N.<i class="fa fa-star"></i><i class="fa fa-star"></i></a> 
                      </small>
                    </p>
                  </div>
                  <div class="col-md-4">
                    <ul class="feedback_meta">
                      <li>Feb 2017 - Mar 2017</li>
                      <li>13 hrs @ $25.00/hr</li>
                      <li>Billed: $329.17</li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="client-history">
                <h4><a href="#">4 more banners for Magisto</a></h4>
                <div class="row">
                  <div class="col-md-8">
                    <p><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                      Shay is good and fantastic. Will work with him again.</p>
                    <p>
                      <small>
                        To Freelancer: <a href="#">Elron Mathew N.<i class="fa fa-star"></i><i class="fa fa-star"></i></a> 
                      </small>
                    </p>
                  </div>
                  <div class="col-md-4">
                    <ul class="feedback_meta">
                      <li>Feb 2017 - Mar 2017</li>
                      <li>13 hrs @ $25.00/hr</li>
                      <li>Billed: $329.17</li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="client-history">
                <h4><a href="#">4 more banners for Magisto</a></h4>
                <div class="row">
                  <div class="col-md-8">
                    <p><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                      Shay is good and fantastic. Will work with him again.</p>
                    <p>
                      <small>
                        To Freelancer: <a href="#">Elron Mathew N.<i class="fa fa-star"></i><i class="fa fa-star"></i></a> 
                      </small>
                    </p>
                  </div>
                  <div class="col-md-4">
                    <ul class="feedback_meta">
                      <li>Feb 2017 - Mar 2017</li>
                      <li>13 hrs @ $25.00/hr</li>
                      <li>Billed: $329.17</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-12 clientrightsec">
            <a href="{{ url('submit/proposal/') }}/<?php echo \Crypt::encryptString($jobs->job_id) ?>" class="btn btn-primary btn-block m-md-bottom">Submit a Proposal</a>
            <a class="btn btn-secondary btn-block m-md-bottom save_job <?php if(isset($saved_job->status) && $saved_job->status == 1 ){ echo 'saved_job_active'; } ?>" data-ng_bind="<?php echo \Crypt::encryptString($jobs->job_id) ?>">Save Job</a>
            <p>Connects to submit a proposal: <?php echo (isset($proposals)?$proposals:0) ?> 
              <i class="fa fa-question-circle" data-toggle="tooltip" title="" data-placement="bottom" data-original-title="This is the number of Connects required to submit a proposal for this job."></i></p>

            <p>Available Connects: <?php echo (isset($proposal_user)?70-$proposal_user:0) ?> </p>
            <hr/>
            <ul class="about_client">
              <li>
                <label>About the Client <i class="fa fa-check-circle-o"></i></label>
                <p><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>(5.00) 5 reviews</p>
              </li>
              <li>
                <label>United States</label>
                <p>Sunnyvale 01:11 PM
                </p>
              </li>
              <li>
                <label>22 Jobs Posted </label>
                <p>60% Hire Rate, 1 Open Job
                </p>
              </li>
              <li>
                <label>$3k+ Total Spent </label>
                <p>16 Hires, 0 Active
                </p>
              </li>
              <li>
                <label>$12.78/hr Avg Hourly Rate Paid </label>
                <p>32 Hours
                </p>
              </li>
              <li>
                <p>Member Since Nov 9, 2010
                </p>
              </li>
            </ul>
           
          </div>
        </div>
      </div>
      <br>
      <br>
    </div>
@endsection
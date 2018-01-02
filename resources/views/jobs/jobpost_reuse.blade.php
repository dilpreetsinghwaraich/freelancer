@extends('layouts.app')

@section('content') 
<!-- Clientadmin dashboard section --> 


<div class="clientdashboardarea">
  <div class="container">
    <div class="row clienttoprow">
      <div class="col-md-12 col-sm-12">
        <h3 class="project-title">Post a Job</h3>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 ">
        <div class="clientjobfeed">         
          
          <form action="{{ url('createjob') }}" method="POST" enctype="multipart/form-data">
          <input type="hidden" value="1" name="job_type" />
           {{ csrf_field() }}
            <div class="rusejobe">
              <section class="form-section">
                <h4 class="section-title">Describe the job</h4>
                <div class="form-group">
                  <h4>Name the job posting</h4>
                  <input name="job_title" class="form-control c-form" type="text" placeholder="Example: Need help developing a powerpoint presentation" required 
                  value="@if(!empty($job->job_title)){{$job->job_title}}@endif"
                  />
                </div>
                <div class="form-group">
                  <select name="category_id" class="form-control" required style="color: #000;">
                    <option value="">Select Category</option>
                    <?php if(sizeof($categories) > 0) { ?>
                    <?php foreach($categories as $cat) { ?>
                    <option value="<?php echo $cat->category_id  ?>" <?php if(isset($job) && $cat->category_id == $job->category_id) { echo 'selected'; }?> > <?php echo $cat->name ?></option>
                    <?php
                    }
                    } ?>
                  </select>
                </div>
                <div class="form-group">
                  <h4>Budget</h4>
                  <input name="budget" class="form-control c-form" type="text" required value="@if(!empty($job->budget)) {{ $job->budget }}@endif" />
                </div>
                <div class="form-group">
                  <h4>Describe the work to be done</h4>
                  <textarea name="job_description" class="form-control c-form" 
                            placeholder="Example: Need help developing a powerpoint presentation Need help developing a powerpoint presentation  Need help developing a powerpoint presentation  Need help developing a powerpoint presentation" required>@if(!empty($job->job_description)){{$job->job_description}}@endif</textarea>
                </div>
                <div class="form-group">
                  <h4>Attachments</h4>
                  <!-- temporary upload html -->
                  <div class="flag-upload form-control c-form click_event">drag or upload project here</div>
                  <small>You may attach up to 5 files under 100mb</small> 
                  <input type="file" id="attachments" multiple="" name="attachments[]" style="display: none;">
                </div>
                <div class="form-group">
                  <h4>What type of project do you have?</h4>
                  <div class="checkbox">
                    <label>
                      <input class="c-radio" type="radio" name="project_type" value="1" required 
                      @if($job->
                      project_type == 1) checked @endif
                      /> <span class="custom-radio"></span> One-time project </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input class="c-radio" type="radio" name="project_type" value="2" required 
                      @if($job->
                      project_type == 2) checked @endif
                      /> <span class="custom-radio"></span> Ongoing project </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input class="c-radio" type="radio" name="project_type" value="3" required 
                      @if($job->
                      project_type == 3) checked @endif
                      /> <span class="custom-radio"></span> i am not sure </label>
                  </div>
                </div>
                <div class="form-group">
                  <h4>How many freelancers do you need to hire for this job?</h4>
                  <div class="checkbox">
                    <label>
                      <input class="c-radio" type="radio" name="fl_number" value="1"
                      @if($job->
                      fl_number == 1) checked @endif
                      /> <span class="custom-radio"></span> I want to hire one freelancer </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input class="c-radio" type="radio" name="fl_number" value="2" required 
                      @if($job->
                      fl_number == 2) checked @endif
                      /> <span class="custom-radio"></span> I need to hire more than one freelancer </label>
                  </div>
                </div>
                <div class="form-group">
                  <h4>Enter skills needed (optional)</h4>
                  <div class="addskillbox">
                    <?php
                  if(isset($job->job_skills) && is_array($job->job_skills))
                  {
                    $count = 0;
                    foreach ($job->job_skills as $skills)
                    {
                    ?>
                    <div class="addskilone">
                      <input name="job_skills[]" class="form-control c-form" type="text" value="<?php echo $skills; ?>" placeholder="Type here" required />
                      <?php if($count>0){ ?>
                      <a href="javascript:void(0);" class="remove_skil">X</a>
                      <?php } ?>
                    </div>
                    <?php 
                    $count++;
                    }
                  }else {
                    ?>
                    <div class="addskilone">
                      <input name="job_skills[]" class="form-control c-form" type="text" placeholder="Type here" required />
                    </div>
                    <?php
                  } ?>
                  </div>
                  <button type="button" class="addnewbtn">Add New</button>
                </div>
                <div class="form-group">
                  <h4>Desired Experience Level</h4>
                  <div class="radio_blocks_outer row">
                    <div class="col-md-8 col-sm-12">
                      <div class="block_md ">
                        <div class="radio_block col-md-4 col-sm-12">
                          <input type="radio" name="experience_level" value="1" selected required
                          @if($job->
                          experience_level == 1) checked @endif
                          />
                          <div class="block_inner"> <span>&#36</span>
                            <label>Entry Level</label>
                          </div>
                        </div>
                        <div class="radio_block col-md-4 col-sm-12">
                          <input type="radio" name="experience_level" value="2" required 
                          @if($job->
                          experience_level == 2) checked @endif
                          />
                          <div class="block_inner"> <span>&#36 &#36</span>
                            <label>Intermediate</label>
                          </div>
                        </div>
                        <div class="radio_block col-md-4 col-sm-12">
                          <input type="radio" name="experience_level" value="3" required 
                          @if($job->
                          experience_level == 3) checked @endif
                          />
                          <div class="block_inner"> <span>&#36 &#36 &#36</span>
                            <label>Expert</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <h4>How long do you expect this job to last?</h4>
                  <div class="radio_blocks_outer row">
                    <div class="col-md-12 col-sm-12">
                      <div class="block_md ">
                        <div class="radio_block col-md-2 col-sm-6">
                          <input type="radio" name="job_duration" value="1" required 
                          @if($job->
                          job_duration == 1) checked @endif
                          />
                          <div class="block_inner"> <span><i class="fa fa-calendar"></i></span>
                            <label>More then 6 months</label>
                          </div>
                        </div>
                        <div class="radio_block col-md-2 col-sm-6">
                          <input type="radio" name="job_duration" value="2" required 
                          @if($job->
                          job_duration == 2) checked @endif
                          />
                          <div class="block_inner"> <span><i class="fa fa-calendar"></i></span>
                            <label>3 to 6 months</label>
                          </div>
                        </div>
                        <div class="radio_block col-md-2 col-sm-12">
                          <input type="radio" name="job_duration" value="3" required 
                          @if($job->
                          job_duration == 3) checked @endif
                          />
                          <div class="block_inner"> <span><i class="fa fa-calendar"></i></span>
                            <label>1 to 3 months</label>
                          </div>
                        </div>
                        <div class="radio_block col-md-2 col-sm-6">
                          <input type="radio" name="job_duration" value="4" required 
                          @if($job->
                          job_duration == 4) checked @endif
                          />
                          <div class="block_inner"> <span><i class="fa fa-calendar"></i></span>
                            <label>Less then 1 months</label>
                          </div>
                        </div>
                        <div class="radio_block col-md-2 col-sm-6">
                          <input type="radio" name="job_duration" value="5" required 
                          @if($job->
                          job_duration == 5) checked @endif
                          />
                          <div class="block_inner"> <span><i class="fa fa-calendar"></i></span>
                            <label>Less then 1 week</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <h4>What time commitment is required for this job?</h4>
                  <div class="radio_blocks_outer row">
                    <div class="col-md-8 col-sm-12">
                      <div class="block_md ">
                        <div class="radio_block col-md-4 col-sm-12">
                          <input type="radio" name="job_time" value="1" required
                          @if($job->
                          job_time == 1) checked @endif
                          />
                          <div class="block_inner"> <span><i class='fa fa-clock-o'></i></span>
                            <label>More then 30 hrs/week</label>
                          </div>
                        </div>
                        <div class="radio_block col-md-4 col-sm-12">
                          <input type="radio" name="job_time" value="2" required
                          @if($job->
                          job_time == 2) checked @endif
                          />
                          <div class="block_inner"> <span><i class='fa fa-clock-o'></i></span>
                            <label>Less then 30 hrs/week</label>
                          </div>
                        </div>
                        <div class="radio_block col-md-4 col-sm-12">
                          <input type="radio" name="job_time" value="3" required
                            @if($job->
                          job_time == 3) checked @endif
                          />
                          <div class="block_inner"> <span><i class='fa fa-clock-o'></i></span>
                            <label>I don't know yet</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
              <section class="form-section">
                <h4 class="section-title">Freelancer Preferences</h4>
                <div class="form-group form-with-icon"> <i class='fa fa-comments-o'></i>
                  <h4>Screening Questions</h4>
                  <label>Add a few questions you'd like your candidates to answer when they applying your job.</label>
                  <div id='TextBoxesGroup'> @if(!empty($job_questions))
                    <?php $i = 1; ?>
                    @foreach($job_questions as $question)
                    <div class="TextBoxDiv">
                      <input type='textbox' id='textbox{{$i}}' name="job_questions[]" class="form-control c-form" value="{{ $question }}" >
                      <span class="remove-question btn btn-danger">-</span> </div>
                    <?php $i++ ?>
                    @endforeach
                    @endif </div>
                  <input class="btn btn-info" type='button' value='Add another question' id='addButton' style="float-left">
                  <input type='button' value='&#8211;' id='removeButton'>
                </div>
                <div class="form-group form-with-icon"> <i class="fa fa-file-text-o"></i>
                  <h4>Cover Letter</h4>
                  <label>Ask applicant to write a cover letter introducing themselves</label>
                  <div class="checkbox">
                    <label>
                      <input name="job_cover_letter" class="c-checkbox" type="checkbox" value="1"
                      @if($job->
                      job_cover_letter == 1) checked @endif
                      /> <span class="custom-checkbox"></span> Yes, require a cover letter </label>
                  </div>
                </div>
              </section>
              <section class="form-section highlighted">
                <div class="form-group form-with-icon "> <i class='fa fa-bolt'></i>
                  <h4>Boost your job's visibility</h4>
                  <div class="checkbox">
                    <label>
                      <input name="job_boost" class="c-checkbox" type="checkbox" value="1"
                      @if($job->
                      job_boost == 1) checked @endif
                      /> <span class="custom-checkbox"></span> Tell me how can i reach more freelancers and hire in less time </label>
                  </div>
                </div>
                <section>
                  <div class="form-group form-with-icon ">
                    <select name="status" class="form-control">
                      <option value="1" @if($job->status == 1) selected @endif>Open</option>
                      <option value="2" @if($job->status == 2) selected @endif>Filled</option>
                    </select>
                  </div>
                </section>
              </section>
            </div>
            
            <div class="">
              <input type="submit" class='btn btn-primary' value='Submit' />
              <button type="submit" class='btn btn-info' >Save as Draft</button>
              <button type="submit" class='btn btn-link' >Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <br>
  <br>
</div>
@endsection
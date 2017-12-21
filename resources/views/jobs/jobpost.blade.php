@extends('layouts.app')

@section('content')
<!-- Clientadmin dashboard section -->
<form action="{{ url('createjob') }}" method="POST">
	{{ csrf_field() }}
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
              <section class="form-section">
                <h4><b>What type of job are you posting?</b></h4>
                <div class="checkbox"> 
                  <label> 
                    <input class="c-radio" type="radio" name="job_type" value="1" required>
                    <span class="custom-radio"></span> 
                    I want to create a new job post 
                  </label> 
                </div>
                <div class="checkbox">
                  <label> 
                    <input class="c-radio" type="radio" name="job_type" value="2" required>
                    <span class="custom-radio"></span> 
                    I want to reuse a previous job post 
                  </label> 
                </div>

                <button class="btn btn-info">Next</button>
              </section>

              <section class="form-section">
                <h4 class="section-title">Describe the job</h4>

                <div class="form-group">
                  <h4>Name the job posting</h4>
                  <input name="job_title" class="form-control c-form" type="text" placeholder="Example: Need help developing a powerpoint presentation" required/>
                </div>

                <div class="form-group">
                  <select name="category" class="form-control" required>
                    <option value="">Select Category</option>
                    @if(sizeof($categories) > 0)
                    @foreach($categories as $cat)
                      <option value="{{ $cat->name }}">{{ $cat->name }}</option>
                    @endforeach
                    @endif
                  </select> 
                </div>

                <div class="form-group">
                  <h4>Budget</h4>
                  <input name="budget" class="form-control c-form" type="text" placeholder="Example: $25" required/>
                </div>

                <div class="form-group">
                  <h4>Describe the work to be done</h4>
                  <textarea name="job_description" class="form-control c-form" 
                            placeholder="Example: Need help developing a powerpoint presentation Need help developing a powerpoint presentation  Need help developing a powerpoint presentation  Need help developing a powerpoint presentation" required></textarea>
                </div>

                <div class="form-group">
                  <h4>Attachments</h4>
                  <!-- temporary upload html -->
                  <div class="flag-upload form-control c-form" onclick="hitfile()">drag or upload project here</div>
                  <input type="file" name="job_files[]" id="job_files" multiple="" style="display: none;">
                  <small>You may attach up to 5 files under 100mb</small>
                </div>

                <div class="form-group">
                  <h4>What type of project do you have?</h4>
                  <div class="checkbox"> 
                    <label> 
                      <input class="c-radio" type="radio" name="project_type" value="1" required />
                      <span class="custom-radio"></span> 
                      One-time project
                    </label> 
                  </div>
                  <div class="checkbox"> 
                    <label> 
                      <input class="c-radio" type="radio" name="project_type" value="2" required />
                      <span class="custom-radio"></span> 
                      Ongoing project
                    </label> 
                  </div>
                  <div class="checkbox"> 
                    <label> 
                      <input class="c-radio" type="radio" name="project_type" value="3" required />
                      <span class="custom-radio"></span> 
                      i am not sure
                    </label> 
                  </div>
                </div>

                <div class="form-group">
                  <h4>How many freelancers do you need to hire for this job?</h4>
                  <div class="checkbox"> 
                    <label> 
                      <input class="c-radio" type="radio" name="fl_number" value="1">
                      <span class="custom-radio"></span> 
                      I want to hire one freelancer
                    </label> 
                  </div>
                  <div class="checkbox"> 
                    <label> 
                      <input class="c-radio" type="radio" name="fl_number" value="2" required />
                      <span class="custom-radio"></span> 
                      I need to hire more than one freelancer
                    </label> 
                  </div>
                </div>

                <div class="form-group">
                  <h4>Enter skills needed (optional)</h4>
                  <input name="job_skills" class="form-control c-form" type="text" placeholder="Type here" required />
                </div>


                <div class="form-group">
                  <h4>Desired Experience Level</h4>
                  <div class="radio_blocks_outer row">
                    <div class="col-md-8 col-sm-12">
                      <div class="block_md ">

                        <div class="radio_block col-md-4 col-sm-12">
                          <input type="radio" name="experience_level" value="1" selected required/>
                          <div class="block_inner">
                            <span>&#36</span>
                            <label>Entry Level</label>
                          </div>
                        </div>

                        <div class="radio_block col-md-4 col-sm-12">
                          <input type="radio" name="experience_level" value="2" required/>
                          <div class="block_inner">
                            <span>&#36 &#36</span>
                            <label>Intermediate</label>
                          </div>
                        </div>

                        <div class="radio_block col-md-4 col-sm-12">
                          <input type="radio" name="experience_level" value="3" required/>
                          <div class="block_inner">
                            <span>&#36 &#36 &#36</span>
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
                          <input type="radio" name="job_duration" value="1" required/>
                          <div class="block_inner">
                            <span><i class="fa fa-calendar"></i></span>
                            <label>More then 6 months</label>
                          </div>
                        </div>

                        <div class="radio_block col-md-2 col-sm-6">
                          <input type="radio" name="job_duration" value="2" required/>
                          <div class="block_inner">
                            <span><i class="fa fa-calendar"></i></span>
                            <label>3 to 6 months</label>
                          </div>
                        </div>



                        <div class="radio_block col-md-2 col-sm-12">
                          <input type="radio" name="job_duration" value="3" required/>
                          <div class="block_inner">
                            <span><i class="fa fa-calendar"></i></span>
                            <label>1 to 3 months</label>
                          </div>
                        </div>

                        <div class="radio_block col-md-2 col-sm-6">
                          <input type="radio" name="job_duration" value="4" required/>
                          <div class="block_inner">
                            <span><i class="fa fa-calendar"></i></span>
                            <label>Less then 1 months</label>
                          </div>
                        </div>

                        <div class="radio_block col-md-2 col-sm-6">
                          <input type="radio" name="job_duration" value="5" required/>
                          <div class="block_inner">
                            <span><i class="fa fa-calendar"></i></span>
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
                          <input type="radio" name="job_time" value="1" required/>
                          <div class="block_inner">
                            <span><i class='fa fa-clock-o'></i></span>
                            <label>More then 30 hrs/week</label>
                          </div>
                        </div>
                        <div class="radio_block col-md-4 col-sm-12">
                          <input type="radio" name="job_time" value="2" required/>
                          <div class="block_inner">
                            <span><i class='fa fa-clock-o'></i></span>
                            <label>Less then 30 hrs/week</label>
                          </div>
                        </div>


                        <div class="radio_block col-md-4 col-sm-12">
                          <input type="radio" name="job_time" value="3" required/>
                          <div class="block_inner">
                            <span><i class='fa fa-clock-o'></i></span>
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
                
                <div class="form-group form-with-icon">
                  
                  <i class='fa fa-comments-o'></i>
                  <h4>Screening Questions</h4>
                  <label>Add a few questions you'd like your candidates to answer when they applying your job.</label>
                  <!--mahdi-->
                  

                 <div id='TextBoxesGroup'>
                    <div id="TextBoxDiv1">
                        <input type='textbox' id='textbox1' name="job_questions[]" class="form-control c-form" >
                    </div>
                </div>
                 <input class="btn btn-info" type='button' value='Add another question' id='addButton' style="float-left">
                <input type='button' value='&#8211;' id='removeButton'>
                  <!--mahdi-->
                </div>
                
                <div class="form-group form-with-icon">
                  <i class="fa fa-file-text-o"></i>
                  <h4>Cover Letter</h4>
                  <label>Ask applicant to write a cover letter introducing themselves</label>
                  <div class="checkbox"> 
                    <label> 
                      <input name="job_cover_letter" class="c-checkbox" checked type="checkbox" value="1">
                      <span class="custom-checkbox"></span> 
                      Yes, require a cover letter
                    </label> 
                  </div>
                </div>
               </section>
              
               <section class="form-section highlighted">
                
                <div class="form-group form-with-icon ">
                  <i class='fa fa-bolt'></i>
                  <h4>Boost your job's visibility</h4>
                  <div class="checkbox"> 
                    <label> 
                      <input name="job_boost" class="c-checkbox" type="checkbox" value="1">
                      <span class="custom-checkbox"></span> 
                      Tell me how can i reach more freelancers and hire in less time
                    </label> 
                  </div>
                </div>
                 
                 
               </section>

               <section>
                <div class="form-group form-with-icon ">
                  <select name="status" class="form-control">
                    <option value="1">Open</option>
                    <option value="2">Filled</option>
                  </select> 
                  <div class="form-group form-with-icon ">
               </section>
              <div class="">
                   <input type="submit" class='btn btn-primary' value='Submit' />
                   <button type="submit" class='btn btn-info' >Save as Draft</button>
                   <button type="submit" class='btn btn-link' >Cancel</button>
                 </div>
            </div>

          </div>

        </div>
      </div>
      <br>
      <br>
    </div>
</form>
<script type="text/javascript">
  function hitfile() {
    document.getElementById('job_files').click();
  }
</script>
@endsection
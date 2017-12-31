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
         
          <form action="{{ url('/select/type') }}" method="POST">
          {{ csrf_field() }}
            <section class="form-section">
              <h4><b>What type of job are you posting?</b></h4>
              <div class="checkbox">
                <label>
                  <input class="c-radio" type="radio" name="job_type" value="new-job" required>
                  <span class="custom-radio"></span> I want to create a new job post </label>
              </div>
              <?php if(!empty($jobs)){ ?>
              <div class="checkbox">
                <label>
                  <input class="c-radio" type="radio" name="job_type" value="re-usejobe" required>
                  <span class="custom-radio"></span> I want to reuse a previous job post </label>
              </div>
              <div class="checkbox col-md-12">
              <select name="job_id" class="form-control col-md-4" style="color:#000;width:200px;">
              <?php foreach($jobs as $jobd){ ?>
              	<option value="<?php echo $jobd->job_id ?>"><?php echo $jobd->job_title; ?></option>
                <?php } ?>
              </select>
              </div>
              <?php } ?>
              <button class="btn btn-info">Next</button>
            </section>
          </form>
          
        </div>
      </div>
    </div>
  </div>
  <br>
  <br>
</div>
@endsection
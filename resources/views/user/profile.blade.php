@extends('layouts.flprofile')

@section('content')

<section class="profile_page_design">
  <div class="container">
    <div class="heading">
      <h3>My Profile</h3>
    </div>

    <div class="freelancer_info">
      <div class="col-md-8 col-sm-8 col-lg-8">
        <div class="profile_pic">
          <img src="{{ asset('images/profile-pic.png') }}" alt="profile-pic">
        </div>
        <div class="freelancer_name">
          <h2>{{ $user_data->name }} {{ $user_data->last_name }}</h2>
          <h4 data-toggle="modal" data-target="#edite">
          @if(!empty($profile_data))
            {{ $profile_data->job_title }} 
          @endif
          <i class="fa fa-pencil-square-o edite" aria-hidden="true"></i>
          </h4>


          <!-- Trigger the modal with a button -->
          <!-- Modal -->
          <div class="Job-title-content">
            @include('user.job_title')
          </div>

          <p> <i class="fa fa-map-marker" aria-hidden="true"></i> Usa, california - 10:12pm local time</p>
          <p><i class="fa fa-clock-o" aria-hidden="true"></i> $5.00 /hr</p>
        </div>

        <div class="skills">
          @include('user.professional')
        </div>


        <div class="Overview">
          @include('user.overview')
        </div>


        <div class="porfolio">
          @include('user.portfolio')
          @include('user.edit_portfolio')
        </div>




        <div class="Education">
            @include('user.education')
        </div>
</div>
</form>
<div class="col-md-4 col-sm-4 col-lg-4 left-bar">
<a class="Setting" href="">Profile Setting</a>
<div class="Available">
<h3   data-toggle="modal" data-target="#Available">Available <a href="javascript:;"><i class="fa fa-pencil-square-o edite" aria-hidden="true"></i></a>
</h3>
<ul class="Availablelity">
<li><a href="">
@if(!empty($profile_data))
  @if(($profile_data->availability_type >=1) && empty($profile_data->not_available_text))
    Available
  @else
    Not Available
  @endif
@endif
</a></li>
<li><a href="">
@if(!empty($profile_data))
  @if($profile_data->availability_type ==1)
    More than 30 hrs/week
  @elseif($profile_data->availability_type ==2)
    Less than 30 hrs/week
  @elseif($profile_data->availability_type ==3)
    As Needed - Open to Offers
  @endif
@endif
</a></li>
response time ?

<form method="POST" action="{{ url('/profileupdate') }}/{{ $user_data->id }}">
          {{ csrf_field() }}
<div class="modal fade" id="Available" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Change Availability</h4>
        </div>
        <div class="modal-body">
 <div class="forms">
 <div class="col-lg-6 col-md-6 col-sm-6"> 
  <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
 
  <p><a href="">How do we use this info</a></p>
</div> 
 <div class="col-lg-6 col-md-6 col-sm-6"> 
		 <p><b>I am currently</b></p>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#homes">Availabil</a></li>
    <li><a data-toggle="tab" href="#menu1">Not Availabil</a></li>
  </ul>

  <div class="tab-content">
    <div id="homes" class="tab-pane fade in active">
      <p> <label>
        <input name="availability_type" value="1" type="radio"
        @if(!empty($profile_data))
        @if($profile_data->availability_type == '1')
          checked
        @endif
        @endif
        > 
      More than 30 hrs/week </label></p>
	   <p> 
        <input name="availability_type" value="2" type="radio"
        @if(!empty($profile_data))
        @if($profile_data->availability_type == '2')
          checked
        @endif
        @endif
        >  
        Less than 30 hrs/week </p>
	    <p> 
        <input name="availability_type" value="3" type="radio"
        @if(!empty($profile_data))
        @if($profile_data->availability_type == '3')
          checked
        @endif
        @endif
        > 
        As Needed - Open to Offers</p>

 
    </div>
    <div id="menu1" class="tab-pane fade">
   <p><label>When do you expect to be ready for new work?</label> 
   <input name="not_available_text" value="@if(!empty($profile_data)){{ $profile_data->not_available_text }}@endif" data-provide="datepicker"></p>
  </div>
		 
 </div>  
</div>  
 </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default">Publish Project</button>
		   <a href="" class="btn-btn-default" data-dismiss="modal">Cancel</a>
        </div>
      </div>
    </div>
  </div>
</div>
</form>


</ul>


<div class="Languages">
@include('user.language')

</div>

<div class="phone-number">
<h3>Verifications <a href=""><i class="fa fa-pencil-square-o edite" aria-hidden="true"></i></a></h3>
<ul class="Availablelity">
<li><a href=""><b>Phone Number:</b><i class="fa fa-check" aria-hidden="true"></i>
 Verified</a> </li>
</ul>
</div>

</div>
</div>
</div>
</div>
</section>

	
@endsection
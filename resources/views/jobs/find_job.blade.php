@extends('layouts.app')

@section('content')
<div class="clientdashboardarea">
  <div class="container">
    <div class="row clienttoprow">
      <div class="col-md-2 col-sm-12 col-lg-2">
        <h3>Find Work</h3>
      </div>
      <div class="col-md-8 col-sm-12 col-lg-8 ">
        <div class="serchfield">
          <form class="navbar-form" action="<?php url('/find/work') ?>" method="get">
            <div class="input-group add-on">
              <input class="form-control" value="<?php echo (isset($_REQUEST['search_keyword'])?$_REQUEST['search_keyword']:'') ?>" style="color:#000;" placeholder="Search by keywords (PHP, .NET, graphic design, etc.)" name="search_keyword" id="search_keyword" type="text">
              <input type="hidden" name="offset" value="0">
              <button class="btn-default submit" type="submit">Search</button>
            </div>
          </form>
          <input type="hidden" id="offset" value="<?php echo (empty($_REQUEST['offset'])?0:$_REQUEST['offset']); ?>">
        </div>
      </div>
      <div class="col-md-2 col-sm-12 col-lg-2"> </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-2 col-sm-12 col-lg-2 findworksidebar">
        <ul class="prelist">
          <li><a href="javascript:void();" class="active">Special Offer Jobs</a></li>
          <li><a href="javascript:void();">My Job Feed</a></li>
          <li><a href="javascript:void();">Web Development</a></li>
          <li><a href="javascript:void();">Recommended</a></li>
        </ul>
        <h4>Recent Searches</h4>
        <ul class="recent-searches">
          <li><a href="javascript:void();">CSS3</a></li>
          <li><a href="javascript:void();">Wordpress</a></li>
          <li><a href="javascript:void();">html 5</a></li>
          <li><a href="javascript:void();">PHP</a></li>
        </ul>
        <h4>My Categories</h4>
        <ul class="recent-searches">
          <li><a href="javascript:void();">Web & Mobile Design</a></li>
          <li><a href="javascript:void();">Mobile Development</a></li>
          <li><a href="javascript:void();">Web Development</a></li>
        </ul>
      </div>
      <div class="col-md-8 col-sm-12 col-lg-8">
        <div class="clientjobfeed">
          <header>
            <h3>Special Offer Jobs</h3>
          </header>
          <div class="jobfeed">
          <div class="jobpost_job">
            
            </div>
            <div class="loaderjob"><img src="<?php echo asset('/images/loading.gif'); ?>"></div>
            <div class="loadmorejobs"></div>
            <span id="site_url" data-site_href="<?php echo url('/find/search') ?>"></span>
          </div>
        </div>
      </div>
      <div class="col-md-2 col-sm-12 col-lg-2 clientrightsec">
        <div class="myprofile"><img style="max-width: 70px;" src="<?php if(isset($profile_data->profile_image)){ echo asset($profile_data->profile_image); }else { echo asset('images/profile-pic.png'); } ?>" alt="profile-pic"" class="img-circle">
          <h4>{{ $user_data->name }} {{ $user_data->last_name }}</h4>
        </div>
        
        <!-- Modal -->
        
        <div class="availability">
          <h4>Availability</h4>
          <p><span class="glyphicon">&#xe023;</span>More than <br>
            30 hrs/week </p>
          <div class="userlocation"> <span class="glyphicon glyphicon-map-marker"></span>&nbsp;<span class="locationvalue">Location</span>&nbsp;  <?php echo (isset($profile_data->city)?$profile_data->city:'').', '.(isset($profile_data->country)?$profile_data->country:'') ?> - <?php echo date('h:i:a') ?> local time</div>
          
          <div class="progress profileprogress">
            <div class="progress-bar" role="progressbar" aria-valuenow="70"
  aria-valuemin="0" aria-valuemax="100" style="width:70%"> 70% </div>
          </div>
          <div class="viewprofile"> <a href="<?php echo url('/profile');?>"> <span class="glyphicon glyphicon-eye-open"></span>&nbsp; View Profile </a> </div>
          
        </div>
      </div>
    </div>
  </div>
  <br>
<br>
</div>


<!-- divider section -->
<div class="container">
  <div class="row">
    <div class="col-md-1 col-sm-1"></div>
    <div class="col-md-10 col-sm-10">
      <hr>
    </div>
    <div class="col-md-1 col-sm-1"></div>
  </div>
</div>
@endsection
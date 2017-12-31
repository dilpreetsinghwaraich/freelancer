<div id="site_loader"><img src="<?php echo asset('images/loader.gif'); ?>" class="loader_image"></div>
<base href="<?php echo url('/'); ?>">
<div class="navbar navbar-default" role="navigation">
  <div class="navbar-header">
    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="icon icon-bar"></span> <span class="icon icon-bar"></span> <span class="icon icon-bar"></span> </button>
    <a href="<?php echo url('/') ?>" class="navbar-brand smoothScroll"> <img src="<?php echo asset('images/logo.jpg'); ?>" alt="Company Logo"> </a> </div>
  <div class="collapse navbar-collapse">
    <div class="box">
      <div class="container-2"> <span class="icon"><i class="fa fa-search"></i></span>
        <input type="text" name="search" placeholder="Find Freelancers">
      </div>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#home" class="smoothScroll">BROWSE </a></li>
      <li><a href="#service" class="smoothScroll">Common Question</a></li>
      <?php if(!Session::get('login_id')){ ?>
      <li class="register"><a href="<?php echo url('register'); ?>" class="smoothScroll ">SIGN UP</a></li>
      <li class="login"><a href="<?php echo url('login'); ?>" class="smoothScroll">LOGIN</a></li>
      <?php 
	  }
	  if(Session::get('login_id'))
	  {
	  ?>
      
      <?php
			if(Session::get('user_role')=='admin')
			{
				?>
      <li> <a href="<?php echo url('dashboard'); ?>" class="smoothScroll">Dashboard</a> </li>
      <?php
			}
			if(Session::get('user_role') == 'client' || Session::get('user_role')=='admin')
			{
				?>
                <li class="login login_submenu"> <a href="" class="smoothScroll">Jobs </a> 
      <ul class="drop_downmenu">
      <li> <a href="" class="smoothScroll">My Jobs</a> </li>
      <li> <a href="<?php echo url('joblist') ?>" class="smoothScroll">JOB LIST </a> </li>
      <li> <a href="<?php echo url('jobpost') ?>" class="smoothScroll">POST JOB </a> </li>
       </ul>
            </li>
            <li class="login login_submenu"> <a href="#" class="smoothScroll">Freelancer </a> 
      <ul class="drop_downmenu">
      <li> <a href="#" class="smoothScroll">Freelancer</a> </li>
      <li> <a href="<?php echo url('find/freelancer') ?>" class="smoothScroll">Find Freelancer </a> </li>
       </ul>
            </li>
      <?php
			}
			if((Session::get('user_role') == 'freelancer' || Session::get('user_role') == 'admin'))
			{
				?>
          <li class="login login_submenu"> <a href="#" class="smoothScroll">MY Jobs </a> 
          <ul class="drop_downmenu">
      		<li><a href="<?php echo url('my/job'); ?>">My Jobs</a></li>
            <li><a href="<?php echo url('my/contract'); ?>">All Contracts</a></li>
            <li><a href="#">Work Diary</a></li>
      
            </ul>
            </li>
            <li class="login login_submenu"> <a href="<?php echo url('/find/work'); ?>" class="smoothScroll">Find Works </a> 
              <ul class="drop_downmenu">
              <li><a href="<?php echo url('/find/work'); ?>">Find Work</a></li>
              <li><a href="<?php echo url('/saved/job'); ?>">Saved Job</a></li>
              <li><a href="<?php echo url('/proposals'); ?>">Proposal</a></li>
              <li><a href="<?php echo url('/profile')?>">Profile</a></li>
              <li><a href="#">My Stats</a></li>
              <li><a href="#">Test</a></li>
              </ul>
              </li>
              
              <?php
			}?>
      <li> <a href="<?php echo  url('logout') ?>" class="smoothScroll">LOGOUT</a></li>
            <?php
	  }
	  ?>
    </ul>
    <?php if(!Session::get('login_id')){ ?>
    <div class="freelancer-btn"> <a href="<?php echo url('register-freelancer') ?>">Become a Freelancer</a> </div>
    <?php } ?> </div>
</div>

@extends('layouts.clients')

@section('content') 
<!-- Clientadmin dashboard section -->
<div class="clientdashboardarea">
  <div class="container">
    <div class="clearfix"></div>
    
    <!-- Nav tabs -->
    <ul class="nav nav-tabs my_navs" role="tablist">
      <li role="presentation" <?php if(empty($tab)){ ?> class="active"<?php } ?>><a href="<?php echo url('find/freelancer'); ?>">Searchs</a></li>
      <li role="presentation"><a href="#past_hires" aria-controls="past_hires" role="tab" data-toggle="tab">Past hires</a></li>
      <li role="presentation" <?php if(!empty($tab) && $tab=='saved'){ ?> class="active"<?php } ?>><a href="<?php echo url('find/freelancer/saved'); ?>">Saved freelancer</a></li>
    </ul>
    <div class="row">
      <div class="col-md-12 col-sm-12 "> 
        
        <!-- Tab panes -->
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane <?php if(empty($tab)){ ?> active<?php } ?>" id="search_freelancer">
            <div class="panel panel-default">
              <div class="panel-heading">
                <div class="row">
                  <form action="<?php echo url('find/freelancer'); ?>" method="get">
                    <div class="col-md-8">
                      <div class="input-group input-group-search">
                        <input type="search" class="form-control  c-form" value="<?php echo (isset($_REQUEST['find'])?$_REQUEST['find']:''); ?>" name="find" placeholder="Search for freelancers"/>
                      </div>
                    </div>
                    <div class="col-md-4 v-middle">
                      <button class="btn btn-primary"><i class="fa fa-filter"></i>Filters</button>
                      <div class="pull-right"> <small>View</small>
                        <button id="vLabel" class="btn btn-primary" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="fa fa-bars"></span> </button>
                        <ul class="dropdown-menu" aria-labelledby="vLabel">
                          <li><a>Option</a></li>
                          <li><a>Option</a></li>
                          <li><a>Option</a></li>
                        </ul>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="panel-body">
                <div class="row">
                <?php
					if(!empty($freelancer))
					{ 
						foreach($freelancer as $freelncr)
						{
              
							?>
                            <div class="col-xs-12 with-border freelancer-list">
                            <div class="f-image">
                              <div class="f-image-inner"> <i class="fa fa-user"></i> <span class="f-availability f-invisible"></span> </div>
                            </div>
                            <div class="f-info">
                              <label><?php echo (isset($freelncr->name)?$freelncr->name:''); ?></label>
                              <div class="f-professional">UX/UI designer</div>
                              <div class="row">
                                <div class="col-md-6 col-lg-3"> <span>$15 / hr</span> </div>
                                <div class="col-md-6 col-lg-3"> <span>$20k+ earned</span> </div>
                                <div class="col-md-6 col-lg-3"> <span>80% job success</span>
                                  <div class="progress f-success">
                                    <div class="progress-bar " role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"> <span class="sr-only">60% Complete</span> </div>
                                  </div>
                                </div>
                                <div class="col-md-6 col-lg-3"> <span><i class="fa fa-map-marker"></i>India</span> </div>
                                <div class="col-xs-12 f-short-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore m</div>
                              </div>
                            </div>
                            <div class="f_buttons">
                              <button class="btn btn-primary">Post job To Invite</button>
                              <button class="btn btn-secondary save_freelancer <?php if(isset($freelncr->status->status) && $freelncr->status->status == 1 ){ echo 'saved_job_active'; } ?>" data-ng_bind="<?php echo \Crypt::encryptString($freelncr->user_id) ?>"><i class="fa fa-heart-o"></i>Save</button>
                            </div>
                          </div>
                            <?php							
						}
					}
				 ?>
                  
                </div>
              </div>
            </div>
          </div>
          <div role="tabpanel" class="tab-pane" id="past_hires">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="row">
                  <div class="col-xs-12 with-border freelancer-list">
                    <div class="f-image">
                      <div class="f-image-inner"> <i class="fa fa-user"></i> <span class="f-availability f-invisible"></span> </div>
                    </div>
                    <div class="f-info">
                      <label>Kunal</label>
                      <div class="f-professional">UX/UI designer</div>
                      <div class="row">
                        <div class="col-md-6 col-lg-3"> <span>$15 / hr</span> </div>
                        <div class="col-md-6 col-lg-3"> <span>$20k+ earned</span> </div>
                        <div class="col-md-6 col-lg-3"> <span>80% job success</span>
                          <div class="progress f-success">
                            <div class="progress-bar " role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"> <span class="sr-only">60% Complete</span> </div>
                          </div>
                        </div>
                        <div class="col-md-6 col-lg-3"> <span><i class="fa fa-map-marker"></i>India</span> </div>
                        <div class="col-xs-12 f-short-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore m</div>
                      </div>
                    </div>
                    <div class="f_buttons">
                      <button class="btn btn-primary">Post job To Invite</button>
                      <button class="btn btn-secondary"><i class="fa fa-heart-o"></i>Save</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div role="tabpanel" class="tab-pane <?php if(!empty($tab) && $tab=='saved'){ ?> active<?php } ?>" id="saved_freelancer">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="row">
                  <?php
					if(!empty($saved_freelancer))
					{ 
						foreach($saved_freelancer as $freelncrsedv)
						{
							?>
                            <div class="col-xs-12 with-border freelancer-list">
                            <div class="f-image">
                              <div class="f-image-inner"> <i class="fa fa-user"></i> <span class="f-availability f-invisible"></span> </div>
                            </div>
                            <div class="f-info">
                              <label><?php echo (isset($freelncrsedv->name)?$freelncrsedv->name:''); ?></label>
                              <div class="f-professional">UX/UI designer</div>
                              <div class="row">
                                <div class="col-md-6 col-lg-3"> <span>$15 / hr</span> </div>
                                <div class="col-md-6 col-lg-3"> <span>$20k+ earned</span> </div>
                                <div class="col-md-6 col-lg-3"> <span>80% job success</span>
                                  <div class="progress f-success">
                                    <div class="progress-bar " role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"> <span class="sr-only">60% Complete</span> </div>
                                  </div>
                                </div>
                                <div class="col-md-6 col-lg-3"> <span><i class="fa fa-map-marker"></i>India</span> </div>
                                <div class="col-xs-12 f-short-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore m</div>
                              </div>
                            </div>
                            <div class="f_buttons">
                              <button class="btn btn-primary">Post job To Invite</button>
                              <button class="btn btn-secondary save_job <?php if(isset($freelncrsedv->status) && $freelncrsedv->status == 1 ){ echo 'saved_job_active'; } ?>" data-ng_bind="<?php echo \Crypt::encryptString($freelncrsedv->user_id) ?>"><i class="fa fa-heart-o"></i>Save</button>
                            </div>
                          </div>
                            <?php							
						}
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
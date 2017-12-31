@extends('layouts.app')

@section('content')
<form action="{{ url('createproposal') }}" method="POST">
  {{ csrf_field() }}
	<div class="clientdashboardarea">
      <div class="container">
        <div class="row clienttoprow">
          <div class="col-md-12 col-sm-12">
            <h3 class="project-title">Submit a Propsal</h3>
          </div>
          @if($errors->any())
            <h4 style="color: red;">{{$errors->first()}}</h4>
          @endif
        </div>

        <div class="clearfix"></div>
        <div class="row">
          <div class="col-md-12 col-sm-12 ">
            <div class="panel panel-default">
              <div class="panel-heading"><h4>{{ $jobs->job_title }}</h4></div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-9 bordered-right">
                    <input value='{{ $jobs->job_id }}' type="hidden"  name="job_id" class="form-control c-form has-form-message  text-right" >
                    
                    <p>{{ $jobs->job_description }}<br/>
                      <a target="_blank" 
                      href="{{ url('/job/proposal/') }}/<?php echo \Crypt::encryptString($jobs->job_id) ?>">View Job Post</a></p>
                  </div>
                  <div class="col-md-3">
                    <ul class="project-specs">
                      @if($jobs->experience_level == 1)
                      <li>Entry Level <span>$$</span></li>

                       @elseif($jobs->experience_level == 2)
                      <li>Intermediate Level <span>$$</span></li>

                       @elseif($jobs->experience_level == 3)
                      <li>Expert Level <span>$$</span></li>

                       @endif


                      <li>Fixed Price <span class="fa fa-money " aria-hidden="true"></span></li>
                      <li>Start Date: <span class="fa fa-calendar " aria-hidden="true"></span> &nbsp;{{ date("F d Y", strtotime($jobs->created_at)) }}</li>

                    </ul>
                  </div>
                </div>

              </div>
            </div>


            <!--<div class="panel panel-default">
              <div class="panel-heading">Connects</div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-12">

                    <p>This proposal requires <b>2 Connects</b> 
                      <i class="fa fa-question-circle" data-toggle="tooltip" title="This is the number of Connects that will be deducted from your balance when you submit proposal." data-placement="bottom"></i>
                    </p>

                    <p>When you submit a proposal, you'll have 68 Connects remaining. Your Connects reset on November, 25.</p>

                  </div>

                </div>

              </div>
            </div>-->


            <div class="panel panel-default">
              <div class="panel-heading">Terms <small class='pull-right'>Client's budget: ${{ $jobs->budget }} USD</small></div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-9">
                    <h4 class="section-title">What is the amount you'd like to bid for this job?</h4>
                    <div class="form-group bordered-form" >
                      <div class="row">
                        <div class="col-md-7">
                          <h4>Bid</h4>
                          <span>
                            Total amount the client will see <span> on your proposal</span>.
                          </span>
                        </div>
                        <div class="col-md-4 col-md-offset-1 field-outside">

                          <span class="currency_icon">$</span>

                          <input value='{{ $jobs->budget }}' type="text"  name="bid_amount" class="form-control c-form has-form-message  text-right" >
                        </div>

                      </div>
                    </div>

                    <div class="form-group bordered-form" >
                      <div class="row">
                        <div class="col-md-7">
                          <h4>Upwork Service Fee <a href='#'>Explain this</a></h4>

                        </div>
                        <div class="col-md-4 col-md-offset-1">

                          <span class="currency_icon">$</span>

                          <input value='-12.00' readonly type="text"  name="chargedAmount" class="form-control c-form has-form-message field-outside text-right" >
                        </div>

                      </div>
                    </div>


                    <div class="form-group bordered-form" >
                      <div class="row">
                        <div class="col-md-7">
                          <h4>You'll be paid</h4>
                          <span>
                            The estimated amount you'll receive after service fees.
                            <i class="fa fa-question-circle" data-toggle="tooltip" title="Amount may vary slightly due to rounding."></i> 
                          </span>
                        </div>
                        <div class="col-md-4 col-md-offset-1 field-outside">

                          <span class="currency_icon">$</span>

                          <input value="{{ $jobs->budget - 12 }}" type="text"  name="pay_amount" class="form-control c-form has-form-message  text-right" >
                        </div>

                      </div>
                    </div>

                  </div>

                </div>

                <section class="form-section border-top">
                  <h5><b>How long will this project take?</b></h5>
                  <div class="form-group form-sm">
                    <select name="duration" class="c-form form-control">
                      <option>Select a duration</option>
                      <option value="Less then a week">Less then a week</option>
                      <option value="Less then a month">Less then a month</option>
                      <option value="1 to 3 months">1 to 3 months</option>
                      <option value="3 to 6 month">3 to 6 month</option>
                      <option value="More then 6 month">More then 6 month</option>

                    </select>
                  </div>

                </section>

              </div>
            </div>
            
           
             <div class="panel panel-default">
              <div class="panel-heading">Additional Information</div>
              <div class="panel-body">
                
                <div class="form-group">
                  <h4>Cover Letter</h4>
                  <textarea name = "cover_letter" class="form-control c-form c-fullform"></textarea>
                </div>
                @if(!empty($job_questions))
                  @foreach($job_questions as $questions)
                  <div class="form-group">
                    <h4>{{ $questions }}</h4>
                    <textarea name = "question_ans[]" class="form-control c-form c-fullform"></textarea>
                  </div>
                  @endforeach
                @endif
                
                <div class="form-group">
                  <h4>Attachments (optional)</h4>
                  <!-- temporary upload html -->
                  <div class="flag-upload form-control c-form c-fullform">drag or upload project here</div>
                  <small>You may attach up to 10 files under the size of <b>25MB</b> each. Include work samples or other documents to support your application. Do not attach your résumé — your Upwork profile is automatically forwarded to the client with your proposal.</small>
                </div>
              </div>
              
              <div class="panel-footer">
                <div class="">
                   <input type="submit" class="btn btn-primary" value="Submit a Propsal">
                   <button type="submit" class="btn btn-link">Cancel</button>
                 </div>
              </div>
             </div>
            
          </div>

        </div>
      </div>
      <br>
      <br>
    </div>
  </form>
@endsection
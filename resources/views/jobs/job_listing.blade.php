@extends('layouts.app')

@section('content')
	<!-- Clientadmin dashboard section -->
    <div class="clientdashboardarea">
      <div class="container">
        <div class="row clienttoprow">
          <div class="col-xs-12">
            <div class='row'><a href="{{ url('jobpost') }}" class='btn btn-link'><b>&lt; Back to previous page</b></a></div>
          </div>
          <div class="col-md-9 col-sm-12">
            <h3 class="project-title">Job Postings</h3>
          </div>
          <div class="col-md-3 col-sm-12 text-right">
            <a href="{{ url('create/jobpost') }}" class='btn btn-primary'>Post a job</a>
          </div>
        </div>
        <div class="row">
         

          <div class="col-sm-12">
            <div class="panel panel-default panel-custom">
              <div class="panel-heading">
                <div class="form-group form-sm">
              
              <select class="form-control c-form">
                <option>All Job Postings</option>
                <option>Another action</option>
                <option>Something else here</option>
              </select>
            </div>
              </div>
              <table class="table">
                <thead>
                  <tr>
                    <th>Job</th>
                    <th>Status</th>
                    <th>Date Posted</th>
                    <th>Posted By</th>
                    <th>Hires</th>
                  </tr>
                </thead>
                <tbody>
                	@foreach($jobs as $job)
                  <tr>
                    <th><a href="{{ url('jobpost') }}/{{$job->job_id}}/edit"> {{ $job->job_title }}</a></th>
                    <td>
                      @if($job->status == 1)
                        <span class="label label-success">Open</span>
                      @else
                        <span class="label label-warning">Filled</span>
                      @endif
                      
                    </td>
                    <td>{{ date("M d", strtotime($job->created_at)) }} <small>{{\Carbon\Carbon::createFromTimeStamp(strtotime($job->created_at))->diffForHumans()}}</small></td>
                    <td>Top notch solutionz</td>
                    <td><i class='fa fa-check-circle-o'></i> 1 Hire</td>
                  </tr>
                  @endforeach
                 
                </tbody>
              </table>
            </div>
          </div>


        </div>
        <div class="clearfix"></div>
        
      </div>
      <br>
      <br>
    </div>
    <!-- divider section -->
@endsection
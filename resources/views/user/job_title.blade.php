<div class="modal fade" id="edite" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Job Title</h4>
        </div>
        <form method="POST" action="{{ url('/profileupdate')}}/{{ $user_data->user_id }}">
        	{{ csrf_field() }}
        
        <div class="modal-body">
          <p>Job Title</p>
		  <input type="text" name="job_title" value="@if(!empty($profile_data)){{ $profile_data->job_title }}@endif">
        </div>
        <div class="modal-body">
          <p>Country</p>
      <input type="text" name="country" value="@if(!empty($profile_data)){{ $profile_data->country }}@endif">
        </div>
        <div class="modal-body">
          <p>City</p>
      <input type="text" name="city" value="@if(!empty($profile_data)){{ $profile_data->city }}@endif">
        </div>
        <div class="modal-body">
          <p>Hourly Rate</p>
          <p>Total amount the client will see.</p>
      <input type="text" name="hourly_rate" id="hourly_rate" value="@if(!empty($profile_data)){{ $profile_data->hourly_rate }}@endif">
        </div>
        <div class="modal-body">
          <p>20% Upwork Service Fee.</p>
      <input type="text" name="service_fee" id="service_fee" value="-@if(!empty($profile_data)){{ $profile_data->hourly_rate*20/100 }}@endif">
        </div>
        <div class="modal-body">
          <p>You'll be paid</p>
          <p>The estimated amount you'll receive after service fees.</p>
      <input type="text" name="will_be_paid" id="will_be_paid" value="@if(!empty($profile_data)){{ $profile_data->hourly_rate-($profile_data->hourly_rate*20/100) }}@endif">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default">Save</button>
		   <a href="" class="btn-btn-default" data-dismiss="modal">Cancel</a>
        </div>
        </form>
      </div>
    </div>
  </div>
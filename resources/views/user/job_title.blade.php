<div class="modal fade" id="edite" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Job Title</h4>
        </div>
        <form method="POST" action="{{ url('/profileupdate')}}/{{ $user_data->id }}">
        	{{ csrf_field() }}
        
        <div class="modal-body">
          <p>Job Title</p>
		  <input type="text" name="job_title" 
      value="@if(!empty($profile_data)){{ $profile_data->job_title }}@endif">
		  <input type="hidden" name="user_id" value="{{ $user_data->id }}">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default">Save</button>
		   <a href="" class="btn-btn-default" data-dismiss="modal">Cancel</a>
        </div>
        </form>
      </div>
    </div>
  </div>
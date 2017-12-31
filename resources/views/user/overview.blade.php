<h3 data-toggle="modal" data-target="#Overview" >Overview <a href="javascript:;"><i class="fa fa-pencil-square-o edite" aria-hidden="true"></i></a>
  </h3>
  <p>@if(!empty($profile_data)){{ $profile_data->overview }}@endif <a href="#">More</a></p>

<!-- POP up modal for overview -->

<div class="modal fade" id="Overview" role="dialog">
    <div class="modal-dialog modal-lg">
    <form method="POST" action="{{ url('/profileupdate') }}/{{ $user_data->user_id }}">
          {{ csrf_field() }}
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Overview</h4>
        </div>
        <div class="modal-body">
          <h4>Use this space to show clients you have the skills and experience they're looking for.</h4>
    		  <ul>
    		  <li>Describe your strengths and skills. </li>
    		  <li>Highlight projects, accomplishments and education.</li>
    		  <li>Keep it short and make sure error-free. </li>
    		  <li><a href="">View More </a></li>
    		  </ul>

		    <div class="text-area">
        <textarea name="overview" placeholder="">@if(!empty($profile_data)){{ $profile_data->overview }}@endif</textarea>
       </div>		 
		  
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default">Save</button>
		      <a href="" class="btn-btn-default" data-dismiss="modal">Cancel</a>
        </div>
      </div>
      </form>
    </div>
  </div>
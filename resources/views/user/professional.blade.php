<h3  data-toggle="modal" data-target="#skills">Professional Skills <a href="javascript:;"><i class="fa fa-pencil-square-o edite" aria-hidden="true"></i></a>
</h3>
<ul class="skills_view">
  @foreach($selected_skills as $skill)
    <li><a href="">{{ $skill->name }}</a></li>
  @endforeach
  
</ul>
<!-- Model pop up for skills -->
<div class="modal fade" id="skills" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">My Skills</h4>
        </div>

        <form method="POST" action="{{ url('/profileupdate') }}/{{ $user_data->id }}">
          {{ csrf_field() }}
        <div class="modal-body">
          <h4>Enter skills</h4>
          <input type="text" name="profetional_skills" id="placeSelect" 
          value="@if(!empty($profile_data)){{ $profile_data->profetional_skills }}@endif"/>

          <input type="hidden" name="user_id" value="{{ $user_data->id }}">
          <p class="Add-field">Add up to 10 skills. Reorder your skills by dragging tags to a new position. Remove skills by deleting tags.</p>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default">Save</button>
          <a href="" class="btn-btn-default" data-dismiss="modal">Cancel</a>
        </div>
        </form>
      </div>
    </div>
  </div>


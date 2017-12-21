

<div class="modal fade" id="Porfolio1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Project</h4>
        </div>

        <div class="modal-body">
            <div class="forms">	
              <form method="POST" action="{{ url('/profileupdate') }}/{{ $user_data->id }}" enctype="multipart/form-data">
  {{ csrf_field() }}
                <div class="col-lg-6 col-md-6 col-sm-6"> 
		                <p><label>Project Title</label>
                    <input type="text" name="project_title" value=""> 
                    </p> 		 		 
  		              <p><label>Project Overview</label>
                    <textarea name="project_overview"></textarea></p> 
  		              <p><label>Thumbnail Image</label>
                    <input name="thumb_image" type="file" value=""></p>
  		              <p><label>Project Files</label>
                    <input name="project_file" type="file" value=""></p>
		            </div>

		            <div class="col-lg-6 col-md-6 col-sm-6"> 
		              <p><label>Was this project done on Upwork?</label> 
                  <select name="project_id">
                    <option value="1"> Select a contract</option>
                    <option value="2"> Select a contract</option>
                  </select>
                </p>

		            <p><label>Was this project done on Upwork?</label> 
                <select name="category_id">
                  <option value="0"> Category</option> 
                  @if(!empty($all_category))
                    @foreach($all_category as $category)
                      <option value="{{ $category->id }}"> {{ $category->name }}</option>
                    @endforeach
                  @endif
                  
                </select>
                </p>

        		   <p><label>
                  <input name="" type="text" placeholder="Category" disabled></label>
                </p>

        		   <p><label>Project URL (optional)</label> 
                  <input name="project_url" type="text" value="">
                </p>

        		    <p><label>Completion Date (optional)</label> 
                  <input name="completion_date" data-provide="datepicker"></p>
          			<p><label>Skills (optional)</label> 
                  <input type="text" value=""></p>
              </div>  
            </div> 
            <p>Make sure you have copyright permissions to any work you Add to this project</p> 
          </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-default">Publish Project</button>
		      <a href="" class="btn-btn-default" data-dismiss="modal">Cancel</a>
        </div>
      </div>
    </div>
  </div>
</form>
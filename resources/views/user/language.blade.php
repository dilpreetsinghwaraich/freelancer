<h3  data-toggle="modal" data-target="#Languages">Languages <a href="javascript:;"><i class="fa fa-plus edite" aria-hidden="true"></i></a></h3>

    <ul class="Availablelity">
    @foreach($all_languages as $lang)
      <li><a href="javascript:;"><b>{{ $lang->lang_name }}:</b> {{ $lang->lang_skill }}</a> 

        <a data-toggle="modal" data-target="#lang{{$lang->id}}" href="javascript:;"><i class="fa fa-pencil-square-o edit-language" aria-hidden="true"></i></a>

      </li>
      @endforeach
    </ul>

    @foreach($all_languages as $lang)
      @include('user.edit_lang_popup', array('id' => $lang->id, 'lang_name' => $lang->lang_name, 'lang_skill' => $lang->lang_skill))
    @endforeach


<div class="modal fade" id="Languages" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Language</h4>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ url('/profileupdate') }}/{{ $user_data->user_id }}">
            {{ csrf_field() }}
            <div class="forms">	
		          <p>
                <label>Language</label>
                  <input type="text" name="lang_name" value=""> 
              </p> 		 		 
		          <p>
                <label>Proficiency</label>
               </p>
               <ul class="lang">
               <p> 
		              <input type="radio" name="lang_skill" value="Basic" /> 
		                <a href=""><b>Basic</b></br>
                      I am only able to communicate in this language through written communication
                    </a>
		          </p> 

		          <p><input type="radio" name="lang_skill" value="Conversational"> 
		            <a href=""><b>Conversational</b></br>
                  I know this language well enough to verbally discuss project details with a client
                </a>
		           </p> 

		          <p>
                <input type="radio" name="lang_skill" value="Fluent"> 
		              <a href=""><b>Fluent</b></br>
		              I have complete command of this language with perfect grammar</a>
		          </p>

      		    <p> 
                <input type="radio" name="lang_skill" value="Native or Bilingual"> 
      		      <a href=""><b>Native or Bilingual</b></br>
      		        I have complete command of this language, including breadth of vocabulary, idioms, and colloquialisms
                </a>
      		    </p>
            </ul>
            </div> 
          </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default">Publish Project</button>
		   <a href="" class="btn-btn-default" data-dismiss="modal">Cancel</a>
        </div>
        </form>
      </div>
    </div>
  </div>
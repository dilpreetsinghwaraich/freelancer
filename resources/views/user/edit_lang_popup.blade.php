<div class="modal fade" id="lang{{$id}}" role="dialog">
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
                  <input type="hidden" name="id" value="{{$id}}">
                  <input type="text" name="lang_name" value="{{$lang_name}}"> 
              </p> 		 		 
		          <p>
                <label>Proficiency</label>
               </p>
               <ul class="lang">
               <p> 
		              <input type="radio" name="lang_skill" value="Basic" 
                  @if($lang_skill == 'Basic')
                  checked
                  @endif
                   /> 
		                <a href=""><b>Basic</b></br>
                      I am only able to communicate in this language through written communication
                    </a>
		          </p> 

		          <p><input type="radio" name="lang_skill" value="Conversational"
                @if($lang_skill == 'Conversational')
                  checked
                  @endif
                > 
		            <a href=""><b>Conversational</b></br>
                  I know this language well enough to verbally discuss project details with a client
                </a>
		           </p> 

		          <p>
                <input type="radio" name="lang_skill" value="Fluent"
                @if($lang_skill == 'Fluent')
                  checked
                  @endif
                > 
		              <a href=""><b>Fluent</b></br>
		              I have complete command of this language with perfect grammar</a>
		          </p>

      		    <p> 
                <input type="radio" name="lang_skill" value="Native or Bilingual"
                @if($lang_skill == "Native /or /Bilingual")
                  checked
                  @endif
                > 
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
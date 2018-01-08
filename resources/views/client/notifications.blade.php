@extends('layouts.clients')

@section('content') 
  <div class="clearfix"></div>
    <!-- Clientadmin dashboard section -->
    <div class="clientdashboardarea">
      <div class="container">
        <div class="row clienttoprow">

          <div class="col-md-12 col-sm-12">
            <h3 class="project-title">Notifications</h3>
          </div>
        </div>
        <div class="row">

          <div class="col-sm-12">
            <div class="panel panel-default">
              <div class="panel-body" id="Notifications">
                <div class="notify_list">
                @if(count($notifications) > 0 )
                  @foreach($notifications as $noti)
                    <div class="notify_item {{ ($noti->status)?'':'unread' }}">
                      <a class="hide_notify"><i class="fa fa-times {{ ($noti->status)?'':'cross' }}" nitification-id="{{ $noti->id }}"></i></a>
                      <div class="notify_content">
                        You have received an invitation to interview for the job "Building BigCommerce Website For Men's Fashion Accessories
                      </div>
                      <span class="notify_date">{{ date('M d',strtotime($noti->created_at))}}</span>
                    </div>
                  @endforeach
                @else
                <div class="no-notifications"> <p> No Notifications Yet </p> </div>
                @endif
                </div>
              </div>
              <div class="panel-footer">
                <div class="text-center">
                @if($total_noti > 10)
                   <button  class="btn btn-primary" id="load_more">Load More</button>
                @endif
                </div>
              </div>
              
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
@section('script') 
<script type="text/javascript">

// Notification Script Code
jQuery(document).ready(function($){
 
      $(document).on('click','.notify_list .cross',function () {
            var id = $(this).attr('nitification-id');
            if(typeof id != 'undefiend' || id != ''){
              changeStatus(id);
              $(this).removeClass('cross').closest('.notify_item ').removeClass('unread');
            }
      });

    $('#load_more').on('click',function(){

        var id = $('.notify_list .notify_item').last().find('i').attr('nitification-id');
        if(typeof id != 'undefined'){

          $.ajax({
           url: '{{ url("/notifications/load-more") }}',
           type: 'POST',
           data:{ last_id : id, _token : $('meta[name="csrf-token"]').attr('content')
                    },
           dataType: 'json',
           success: function(data) {
            if(data.status == 1){
              $('.notify_list').append(data.result);

              if(data.total_noti == $('.notify_list .notify_item').length){
                $('#load_more').hide();
              }
            }
          }
         });

        }


      });

});


  function changeStatus(id){
  
  $.ajax({
           url: '{{ url("/notifications") }}/'+id,
           type: 'POST',
           data:{'_method':'PUT','_token':$('meta[name="csrf-token"]').attr('content')
                    },
           dataType: 'json',
           success: function(data) {

              if(data.count == 0 ){
                 $('#noti_Counter').text('0').hide();
               }else{
                $('#noti_Counter').text(data.count);
              }

          }
         });
}


</script>
@endsection
jQuery(document).ready(function($){

$("#notificationLink").click(function(e){
  e.preventDefault();
  e.stopPropagation();

  $("#notificationContainer").fadeToggle(300);
  $("#noti_Counter").fadeOut("slow");
  $('#noti-loader').show();

  var url = $('base').attr('href');
    $.ajax({
             url: url+'/latest_notifications',
             type: 'GET',
             data: {},
             dataType: 'json',
             success: function(data) {
               
              if(data.result){
                $('.mini_notifications_list_wrapper').html(data.result);
             }
           $('#noti-loader').hide();
           }
      });
  });

 // $('#not-loader').show();
      //Document Click hiding the popup 
      $(document).click(function(e){
       $("#notificationContainer").hide();
      });

      //Popup on click
      $("#notificationContainer").click(function(e){
          e.stopPropagation();
          if($(e.target).hasClass('cross')){
                var id = $(e.target).attr('nitification-id');
                if(typeof id != 'undefiend' || id != ''){
                 changeStatus(id);
                 $(e.target).removeClass('cross').closest('li').removeClass('unread');
               }
          }

      });


  ////////// Notification Script Start Here /////////////

       $(document).on('click','.cross',function (eve) {
             eve.stopPropagation();
            var id = $(this).attr('nitification-id');
            if(typeof id != 'undefiend' || id != ''){
              changeStatus(id);
              $(this).removeClass('cross').closest('.notify_item ').removeClass('unread');
            }
      });
  ///////

    // Load more Notifications funcation 
    $('#load_more').on('click',function(){
        var url = $('base').attr('href');
        var id = $('.notify_list .notify_item').last().find('.cross').attr('nitification-id');
        if(typeof id != 'undefined'){

          $.ajax({
           url: url+'/notifications/load-more',
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
            }else{
               $('#load_more').hide();
            }
          }
         });

        }
      });

           getNotification();
           setInterval(function(){ getNotification(); }, 4000);
       // end


});


  function changeStatus(id){
    var url = $('base').attr('href');
  $.ajax({
           url: url+'/notifications/'+id,
           type: 'POST',
           data:{'_method':'PUT','_token':$('meta[name="csrf-token"]').attr('content')
                    },
           dataType: 'json',
           success: function(data) {

              if(data.count == 0 ){
                 $('#noti_Counter').text('0').hide();
                 $('.notify_list .notify_item').removeClass('unread');
               }else{
                $('#noti_Counter').text(data.count);
              }

          }
         });
}



  function getNotification(){
    var old_notification = $('#noti_Counter').text().trim();
      var url = $('base').attr('href');
    $.ajax({
             url: url+'/get_notifications',
             type: 'GET',
             data: { },
             dataType: 'json',
             success: function(data) {
              if(data.status == 1){
                 if(data.count != old_notification && data.count > 0 ){

                  $('.no-notifications').remove();

                   // ANIMATEDLY DISPLAY THE NOTIFICATION COUNTER.
                  $('#noti_Counter')
                      .css({ opacity: 0 })
                      .text(data.count)              
                      .css({ top: '-10px', display : 'block' })
                      .animate({ top: '-2px', opacity: 1 }, 500);
                     
                      if($('.notify_list').length > 0  && $('#noti_Counter').attr('beg') == 'true' ){
                            getNewNotification();
                      }

                }else if(data.count == 0){
                     $('#noti_Counter').text('0').hide();
                     $('.notify_list .notify_item').removeClass('unread');
                }
                  $('#noti_Counter').attr('beg','true');
                }
             }
           });
  }

  function getNewNotification(){
    
      var url = $('base').attr('href');
      var html = '';
      var id = $('.notify_list .notify_item').first().find('i').attr('nitification-id');
    $.ajax({
             url: url+'/get_New_notifications',
             type: 'GET',
             data: { first_id  : id },
             dataType: 'json',
             success: function(data) {
              if(data.status){
                $('.notify_list').prepend(data.result);
             }
           }
           });
  }

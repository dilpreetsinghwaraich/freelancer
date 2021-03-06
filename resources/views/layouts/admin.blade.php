<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ config('app.name', 'Freelancer') }}</title>
<!--

Template 2080 Minimax

http://www.tooplate.com/view/2080-minimax

-->
<!-- stylesheet css -->
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/nivo-lightbox.css') }}">
<link rel="stylesheet" href="{{ asset('css/nivo_themes/default/default.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/select.css') }}">
<!-- google web font css -->
<link rel="stylesheet" href="{{ asset('web-fonts/Helvetica/styles.css') }}">
<link rel="stylesheet" href="{{ asset('web-fonts/BradleyHandITC/styles.css') }}">
<link rel="stylesheet" href="{{ asset('web-fonts/Krungthep/stylesheet.css') }}">
</head>
<body data-spy="scroll" data-target=".navbar-collapse">

<!-- navigation -->
<header>
  <div class="top-bar">
    <div class="container">
      <div class=" col-md-7 col-sm-7 col-lg-7 phone"> <a href="#"><i class="fa fa-envelope" aria-hidden="true"></i> Suport@freelancer.com</a> <a href="#"><i class="fa fa-phone" aria-hidden="true"></i> 1234567890</a> </div>
      <div class=" col-md-2 col-sm-2 col-lg-2 text-right">
        <div class="translatore">
          <select>
            <option> <img src="{{ asset('images/flag.jpg') }}"> English
            <option>
          </select>
        </div>
      </div>
      <div class=" col-md-3 col-sm-3 col-lg-3 text-right">
        <ul class="social">
        
       <!--  <li id="notification_li" >

               <a class="dropdown-toggle" href="#" id="notificationLink"  >
                <span class="fa fa-bell-o"></span>
                <span id="noti_Counter" class="notification-bubble" beg="false" >0</span>
               </a>

              <div id="notificationContainer">
              <div id="notificationTitle">Notifications</div>
              <div id="notificationsBody" class="notifications">
                <ul class="mini_notifications_list_wrapper" style="list-style: none;padding: 12px 0;">
                </ul>
                <div id="noti-loader" style="text-align: center; margin-top: 75px;"> 
                 <img src="{{ asset('images/notification.gif')}}" height="120px" width="120px">
                </div>
                  <div class="clearfix" style="clear:both;"></div>
              </div>
              <div id="notificationFooter"><a href="{{ url('notifications') }}">See All</a></div>
              </div>
          </li> -->

          <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
          <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
          <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
          <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
  </div>
  @include('layouts/header_navbar')
</header>
@yield('content') 

<!-- footer section -->
<footer>
  <div class="container">
       
    <div class="row">
      <div class="container">
        <div class="col-md-8 col-sm-8 lg-8 translatored">
          <div class="translatore Footer-localeSelector-btn"> India / English </div>
        </div>
        <div class="col-md-4 col-sm-4 lg-4 text-right">
          <ul class="social">
            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="container">
        <ul class="last-contry">
          <li><a href="#">South Arabia</a></li>
        </ul>
      </div>
    </div>
  </div>
</footer>

<!-- divider section -->
<div class="container">
  <div class="row">
    <div class="col-md-1 col-sm-1"></div>
    <div class="col-md-10 col-sm-10">
      <hr>
    </div>
    <div class="col-md-1 col-sm-1"></div>
  </div>
</div>

<!-- scrolltop section --> 
<a href="#top" class="go-top"><i class="fa fa-angle-up"></i></a> 

<!-- javascript js --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
<script src="{{ asset('js/jquery.js') }}"></script> 
<script src="{{ asset('js/bootstrap.min.js') }}"></script> 
<script src="{{ asset('js/nivo-lightbox.min.js') }}"></script> 
<script src="{{ asset('js/smoothscroll.js') }}"></script> 
<script src="{{ asset('js/jquery.nav.js') }}"></script> 
<script src="{{ asset('js/isotope.js') }}"></script> 
<script src="{{ asset('js/imagesloaded.min.js') }}"></script> 
<script src="{{ asset('js/custom.js') }}"></script> 
<script src="{{ asset('js/notification.js') }}"></script>
<script src="http://cdn.jsdelivr.net/select2/3.4.8/select2.js"></script> 
<script src="{{ asset('js/script.js') }}"></script> 
<script>
$(window).scroll(function() {    
    var scroll = $(window).scrollTop();

    if (scroll >= 150) {
        $(".navbar").addClass("navbar-fixed-top");
    } else {
        $(".navbar").removeClass("navbar-fixed-top");
    }
});

/*
$(window).scroll(function() { 
$(".navbar").addClass("navbar-fixed-top");
alert('rrrr');   
    var scroll = $(window).scrollTop();    
    if (scroll <= 500) {
        $(".navbar").addClass("navbar-fixed-top");
	//$(".navbar").removeClass("navbar-fixed-top");	
    }

}*/
</script> 
<script>
$(window).scroll(function() {    
    var scroll = $(window).scrollTop();

    if (scroll >= 150) {
        $(".navbar").addClass("navbar-fixed-top");
    } else {
        $(".navbar").removeClass("navbar-fixed-top");
    }
});

/*
$(window).scroll(function() { 
$(".navbar").addClass("navbar-fixed-top");
alert('rrrr');   
    var scroll = $(window).scrollTop();    
    if (scroll <= 500) {
        $(".navbar").addClass("navbar-fixed-top");
	//$(".navbar").removeClass("navbar-fixed-top");	
    }

}*/

	


	
$('.datepicker').datepicker({
    format: 'mm/dd/yyyy',
    startDate: '-3d'
});
    
</script> 
<script type="text/javascript">

                jQuery(document).ready(function($){

                    var counter = 2;

                    $("#addButton").click(function () {

                    var newTextBoxDiv = $(document.createElement('div'))
                         .attr("id", 'TextBoxDiv' + counter);

                    newTextBoxDiv.after().html('<label> : </label>' +
                          '<input class="form-control c-form" type="text" name="job_questions[]"' + counter +
                          '" id="textbox' + counter + '" value="" >');

                    newTextBoxDiv.appendTo("#TextBoxesGroup");


                    counter++;
                     });

                  });
                </script>
</body>
</html>
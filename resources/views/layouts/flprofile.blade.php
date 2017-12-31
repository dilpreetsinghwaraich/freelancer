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
@yield('content'); 

<!-- footer section -->
<footer>
  <div class="container">
    <div class="row">
      <div class="footer-scor">
        <div class="col-md-4 col-sm-4 col-lg-4">
          <h2>25,360,777 <br>
            <small>REGISTERED USERS</small></h2>
        </div>
        <div class="col-md-4 col-sm-4 col-lg-4">
          <h2>12,461,761 <br>
            <small>TOTAL JOBS POSTED </small></h2>
        </div>
        <div class="col-md-4 col-sm-4 col-lg-4"> </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-2 col-sm-2">
        <h2>Network</h2>
        <ul>
          <li><a href="#">Browse Categories </a></li>
          <li><a href="#">Browse Projects</a></li>
          <li><a href="#">Browse Contests</a></li>
          <li><a href="#">Browse Freelancers</a></li>
          <li><a href="#">Browse Freelancers</a></li>
          <li><a href="#">Sitemap</a></li>
          <li><a href="#">Freelancer Local</a></li>
          <li><a href="#">Showcase</a></li>
          <li><a href="#">Escrow</a></li>
          <li><a href="#">Warrior Forum</a></li>
        </ul>
      </div>
      <div class="col-md-2 col-sm-2">
        <h2>About </h2>
        <ul class="social-icons0">
          <li><a href="#">About us</a></li>
          <li><a href="#">How it Works</a></li>
          <li><a href="#">Team</a></li>
          <li><a href="#">Mobile App</a></li>
          <li><a href="#">Desktop App</a></li>
          <li><a href="#">Security</a></li>
          <li><a href="#">Fees & Charges</a></li>
          <li><a href="#">Investor</a></li>
          <li><a href="#">Quotes</a></li>
        </ul>
      </div>
      <div class="col-md-2 col-sm-2">
        <h2>Press</h2>
        <ul class="social-icons0">
          <li><a href="#">In the News</a></li>
          <li><a href="#">Press Releases</a></li>
          <li><a href="#">Awards</a></li>
          <li><a href="#">Testimonials</a></li>
          <li><a href="#">Timeline</a></li>
        </ul>
      </div>
      <div class="col-md-2 col-sm-2">
        <h2>Get in Touch </h2>
        <ul class="social-icons1">
          <li><a href="#">Get Support</a></li>
          <li><a href="#">Careers</a></li>
          <li><a href="#">Community</a></li>
          <li><a href="#">Affiliate Program</a></li>
          <li><a href="#">Merchandise</a></li>
          <li><a href="#">Help Translate</a></li>
          <li><a href="#">Contact Us</a></li>
        </ul>
      </div>
      <div class="col-md-4 col-sm-4">
        <h2>Freelancer</h2>
        <ul class="social-icons2">
          <li><a href="#">Privacy Policy</a></li>
          <li><a href="#">Terms and Conditions</a></li>
          <li><a href="#">Copyright Infringement Policy </a></li>
          <li><a href="#">Code of Conduct</a></li>
        </ul>
      </div>
    </div>
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
          <li><a href="#">US (International)</a></li>
          <li><a href="#">Australia</a></li>
          <li><a href="#">United Kingdom</a></li>
          <li><a href="#">Spain</a></li>
          <li><a href="#">Japan</a></li>
          <li><a href="#">Germany</a></li>
          <li><a href="#">Brazil</a></li>
          <li><a href="#">France</a></li>
          <li><a href="#">Canada</a></li>
          <li><a href="#">China</a></li>
          <li><a href="#">Hong Kong</a></li>
          <li><a href="#">Indonesia</a></li>
          <li><a href="#">Philippines</a></li>
          <li><a href="#">Pakistan</a></li>
          <li><a href="#">Mexico</a></li>
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
<script src="http://cdn.jsdelivr.net/select2/3.4.8/select2.js"></script> 
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

	$('#placeSelect').select2({
    width: '100%',
    allowClear: true,
    multiple: true,
    maximumSelectionSize: 20,
    placeholder: "Click here and start typing to search.",
    data: /*[
            { id: 1, text: "HTML"     },
            { id: 2, text: "CSS"    },
            { id: 3, text: "JavaScript" },
            { id: 4, text: "Responsive"   }
          ] */
          <?php echo json_encode($profetionl_skills); ?>   
});


	
/*$('.datepicker').datepicker({
    format: 'mm/dd/yyyy',
    startDate: '-3d'
});*/
</script>
</body>
</html>
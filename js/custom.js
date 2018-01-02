
// NIVO LIGHTBOX
$('.iso-box-section a').nivoLightbox({
        effect: 'fadeScale',
    });

// ISOTOPE FILTER
jQuery(document).ready(function($){

	if ( $('.iso-box-wrapper').length > 0 ) { 

	    var $container 	= $('.iso-box-wrapper'), 
	    	$imgs 		= $('.iso-box img');



	    $container.imagesLoaded(function () {

	    	$container.isotope({
				layoutMode: 'fitRows',
				itemSelector: '.iso-box'
	    	});

	    	$imgs.load(function(){
	    		$container.isotope('reLayout');
	    	})

	    });

	    //filter items on button click

	    $('.filter-wrapper li a').click(function(){

	        var $this = $(this), filterValue = $this.attr('data-filter');

			$container.isotope({ 
				filter: filterValue,
				animationOptions: { 
				    duration: 750, 
				    easing: 'linear', 
				    queue: false, 
				}              	 
			});	            

			// don't proceed if already selected 

			if ( $this.hasClass('selected') ) { 
				return false; 
			}

			var filter_wrapper = $this.closest('.filter-wrapper');
			filter_wrapper.find('.selected').removeClass('selected');
			$this.addClass('selected');

	      return false;
	    }); 

	}

/*
* Ajax request for edit educatoin
*/

$("a.edit-education").click(function(event){
	event.preventDefault();
	var educatoin_id = $(this).attr('educatoin_id');

	var data = {
		'id' : educatoin_id		
	};
	
	$.ajax({
		url : 'educationedit',
		method : 'GET',
		datatype: 'json',
		data : data

	});
});

});


// HIDE MOBILE MENU AFTER CLIKING ON A LINK
   $('.navbar-collapse a').click(function(){
        $(".navbar-collapse").collapse('hide');
    });


// SCROLLTO THE TOP
$(document).ready(function() {
	// Show or hide the sticky footer button
	$(window).scroll(function() {
		if ($(this).scrollTop() > 200) {
			$('.go-top').fadeIn(200);
		} else {
			$('.go-top').fadeOut(200);
		}
	});		
	// Animate the scroll to top
	$('.go-top').click(function(event) {
		event.preventDefault();
	
		$('html, body').animate({scrollTop: 0}, 300);
	})
});
jQuery(document).ready(function($) {
	$(window).load(function() {
		if($('.jobpost_job').length==0)
		{
			return false;
		}
		$('.loaderjob').show();
		$('.jobpost_job').fadeOut();
		var search_keyword = $('#search_keyword').val();
		var offset = $('#offset').val();
		var site_url = $('#site_url').data('site_href');
		var dataString = 'search_keyword='+search_keyword+'&offset='+offset;
		$.ajax({
			url: site_url,
			type: 'GET',
			data: dataString,
		})
		.done(function(data) {
			var res = $.parseJSON(data);
			$('.jobpost_job').fadeIn().html(res.html);
			$('.loadmorejobs').html(res.pagination);
			$('.loaderjob').fadeOut('fast');
		})
		.fail(function(error) {
			console.log(error);
		});
		
	});
	$(document).on('click', '.addnewbtn', function(event) {
		event.preventDefault();
		$('.addskillbox').append('<div class="addskilone"><input name="job_skills[]" class="form-control c-form" type="text" placeholder="Type here" required /><a href="javascript:void(0);" class="remove_skil">X</a></div>')
	});
	$(document).on('click', '.remove_skil', function(event) {
		event.preventDefault();
		$(this).closest('.addskilone').remove();
	});
	$(document).on('change', '#hourly_rate', function(event) {
		var value = $(this).val();
		var ttv = value*20/100;
		var ftt = value-ttv;
		$("#service_fee").val("-"+ttv);
		$("#will_be_paid").val(ftt);
	});
	$(document).on('keyup', '#hourly_rate', function(event) {
		if(!$.isNumeric($(this).val()))
		{
			$(this).val('').trigger('change');
			return false;
		}
	});
	$(document).on('click', '.upload_profile_image', function(event) {
		$('#profile_image').click();
	});
	$(document).on('change', '#profile_image', function(event) {
		var formdata = new FormData();
		console.log($('#profile_image')[0].files[0]);
		formdata.append('profile_image',$('#profile_image')[0].files[0]);
		var url = $('#profile_update_url').val();

		$.ajax({
			url: url,
			type: 'POST',
			data: formdata,
			processData: false, 
   			contentType: false,
   			headers: {
				    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				  },
		})
		.done(function(data) {
			$('#display_profile_image').attr('src',data);
		})
		.fail(function(error) {
			console.log(error);
		})
		.always(function() {
			console.log("complete");
		});
		
	});
	$(document).on('click', '.start_registration', function(event) {
		event.preventDefault();
		$("#site_loader").fadeIn();
		var error_check = false;
		$('.error').css('display','none');
		$('#common-error').html('');
		$.each($('.input_val'), function(index, val) {			
			if($(this).val()=='')
			{
				var id = $(this).attr('id');
				$('#'+id+'-error').css('display','block');
				error_check = true;
			}
		});
		if(error_check==true)
		{
			return false;
		}
		var dataString = $(this).closest('form').serialize();
		var url = $('base').attr('href');
		$.ajax({
			url: url+'/register',
			type: 'POST',
			data: dataString,
		})
		.done(function(data) {
			$("#site_loader").fadeOut();
			var result = $.parseJSON(data);
			if(result.status==true)
			{
				$('#common-error').css('display','block').css('color','green').html(result.message);
				$('.login-form')[0].reset();
				return false;
			}else {
				$('#common-error').css('display','block').css('color','red').html(result.message);
				return false;
			}

		})
		.fail(function(error) {
			console.log(error);
		});
		
	});
	$(document).on('click', '.save_job', function(event) {
		event.preventDefault();
		var url = $('base').attr('href');
		var job_id = $(this).data('ng_bind');
		var dataString = 'job_id='+job_id;
		$.ajax({ 
			url: url+'/save/job',
			type: 'POST',   
			data: dataString,
			headers: {
				    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				  },
		})
		.done(function(data) {
			if(data==1)
			{
				$('.save_job').addClass('saved_job_active');
			}else {
				$('.save_job').removeClass('saved_job_active');
			}
		})
		.fail(function(error) {
			console.log(error);
		});
		
	});
	$(document).on('click', '.save_freelancer', function(event) {
		event.preventDefault();
		var url = $('base').attr('href');
		var user_id = $(this).data('ng_bind');
		var dataString = 'user_id='+user_id;
		$.ajax({ 
			url: url+'/save/freelancer',
			type: 'POST',   
			data: dataString,
			headers: {
				    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				  },
		})
		.done(function(data) {
			if(data==1)
			{
				$('.save_freelancer').addClass('saved_job_active');
			}else {
				$('.save_freelancer').removeClass('saved_job_active');
			}
		})
		.fail(function(error) {
			console.log(error);
		});
		
	});
	$(document).on('click', '.click_event', function(event) {
		event.preventDefault();
		$('#attachments').click();
	});
});
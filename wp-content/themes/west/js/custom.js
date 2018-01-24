jQuery( document ).ready(function() {


	// Gallery Converted Slider
		jQuery('.image-gallery').slick({
		  infinite: true,
		  slidesToShow: 3,
		  slidesToScroll: 3,
		  responsive: [
		    {
		      breakpoint: 1024,
		      settings: {
		        slidesToShow: 3,
		        slidesToScroll: 3,
		        infinite: true,
		        dots: true
		      }
		    },
		    {
		      breakpoint: 767,
		      settings: {
		        slidesToShow: 2,
		        slidesToScroll: 2
		      }
		    },
		    {
		      breakpoint: 599,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1
		      }
		    }
		  ]
		});
		//Embed Gallery
		jQuery('.image-gallery').appendTo('.customgal');
		// Custom Js for open and close popup
		jQuery( ".trigger-popup" ).click(function(event) {
			event.preventDefault();
		    jQuery('.enquire-popup').show();
		    jQuery('.sucess').hide();
		    jQuery('.sucess-msg').show();
		    jQuery('body').addClass('fixed');
		});
		jQuery( ".close-btninner" ).click(function(event) { 
              jQuery('.enquire-popup').hide();
              jQuery('.sucess').hide();
              jQuery('body').removeClass('fixed');
		 });

		jQuery( ".close-btn" ).click(function(event) {
			event.preventDefault();
		    jQuery('.geraldtonpop').hide();
		    jQuery(".geraldtonpop").children().hide();
		    jQuery('body').removeClass('fixed');
		    jQuery(this).show();
		    jQuery('.sucess').hide();

		});
		jQuery( ".popen" ).click(function(event) {
			event.preventDefault();
		    var datas = jQuery(this).attr('data-ps');
		     console.log(datas);
		    jQuery('.newp').show();
		    jQuery('.' + datas).show();
		});

		if (jQuery('.qcf-style > #none h2:contains("Message sent")').length > 0) { 
          jQuery('#qcf_reload + br + .qcf-style #none').addClass('sucess-msg');
		  jQuery('.newp').show();
		  jQuery('.enquire-popup').show();
		  jQuery('.sucess').show();
		}
	});
/************Document Ready Functions************/
jQuery(document).ready(function () {
	
	$(".site-header").before($(".site-header").clone().addClass("fixed"));
	$(window).scroll(function(){
		if($(window).scrollTop() >= 150){
			$('.site-header.fixed').addClass('slideDown');
		}
		else{
			$('.site-header.fixed').removeClass('slideDown');
		}
	});
	
	/************MOBILE MENU************/
				
	var menu_toggle = $('.mobile-menu-toggle');
	var menu_container = $('.menu-container');
		
	function mobileFiltering() {
		menu_toggle.click( function(e) {
			e.preventDefault();
			e.stopPropagation();
			e.stopImmediatePropagation();
	        var status = menu_container.hasClass('active');
	      if(status){
	        menu_container.removeClass('active');
	      }else{
	        menu_container.addClass('active');
	      }
	  });
	}
	
	function mobileDrops() {
		
		// Add drop links
		
		$('header li.menu-item-has-children').each(function() {
			$(this).append('<a class="open-children" href="#"><i class="fa fa-chevron-down" aria-hidden="true"></i></a>');
		});
		
		// On click
		
		$('.open-children').click( function(e) {
			e.preventDefault();
			e.stopPropagation();
			e.stopImmediatePropagation();
			var link = $(this).parent();
	        var status = link.hasClass('active');
	      if(status){
	        link.removeClass('active');
	      }else{
	        link.addClass('active');
	      }
	  });
	}
	
	// Kill mobile menu
	
	function endMobile() {
		menu_toggle.unbind();
		menu_container.removeClass('active');
		$('header li.menu-item-has-children a').unbind();
		$('header li.menu-item-has-children').unbind().removeClass('active');
		
		$('header .open-children').remove();

	}
	
	// Active mobile menu
	
	if ($(window).width() < 992) {
	    mobileFiltering();
	    mobileDrops();
	} else {
		endMobile();
	}
	
	$( window ).resize(function() {
	    if($(window).width() < 992 ) {
	        mobileFiltering();
	        mobileDrops();
	    } else {
		    endMobile();
	    }
	});
	
	
	// Featured Slider
	var slider =  $('.features-slider').length;
	if(slider !== 0){
	$('.features-slider').owlCarousel({
		loop:true,
		margin:50,
		nav:true,
		center: true,
		navText: ["<span class='nav-left-icon'></span>","<span class='nav-right-icon'></span>"],
		dots: false,
		responsive:{
			0:{
				items:1
			},
			768:{
				items:3
			},
			992:{
				items:3
			}
		}
	});
	}
	var slider1 =  $('.owl-community-slider').length;
	if(slider1 !== 0){
	$('.owl-community-slider').owlCarousel({
		loop:true,
		margin:30,
		dots: false,
		nav:false,
		responsive:{
			0:{
				items:1
			},
			576:{
				items:2
			},
			992:{
				items:3
			}
		}
	});
	}
	var slider2 =  $('.owl-support-slider').length;
	if(slider2 !== 0){
	$('.owl-support-slider').owlCarousel({
		loop:true,
		margin:30,
		dots: false,
		nav:false,
		responsive:{
			0:{
				items:1
			},
			576:{
				items:1
			},
			767:{
				items:3
			},
			992:{
				items:3
			}
		}
	});
	}
	var slider3 =  $('.owl-plan-slider').length;
	if(slider3 !== 0){
	$('.owl-plan-slider').owlCarousel({
		center:false,
		loop:false,
		margin:30,
		dots: false,
		nav:false,
		responsive:{
			0:{
				items:1,
				center:true,
			},
			576:{
				items:1,
			},
			767:{
				items:2
			},
			992:{
				items:2
			}
		}
	});
	}

	var slider4 =  $('.owl-splitter-slider').length;
 
	if(slider4 !== 0){
	$('.owl-splitter-slider').owlCarousel({
		center:false,
		loop:false,
		margin:30,
		dots: false,
		nav:false,
		mouseDrag:false,
		pullDrag:false,
		autoplay:false,
		animateOut: 'fadeIn',
		animateIn: 'fadeIn',
		smartSpeed:0,
		URLhashListener:true,
		startPosition: 'URLHash',
		items:1,
		responsive:{
			0:{
				items:1,
			},
		}
	});
	}
	var slider5 =  $('.a-day-in-family-slider');
	if(slider5.length !== 0) {
        slider5.children().each( function( index ) {
          $(this).attr( 'data-position', index );
        });
    	slider5.owlCarousel({
    		loop:true,
    		nav:true,
    		center: true,
    		navText: ["<span class='nav-left-icon'></span>","<span class='nav-right-icon'></span>"],
    		dots: false,
    		URLhashListener:true,
    		autoplay:false,
    		autoplayTimeout:4000,
    		autoplayHoverPause:true,
    		responsive:{
    			0:{
    				items:1,
    				margin:0
    			},
    			576:{
    				items:1.5,
    				margin:0
    			},
    			768:{
    				items:1.5,
    				margin:30
    			},
    			992:{
    				items:2.2,
    				margin:30
    			}
    		}
    	});
    	$(document).on('click', '.owl-item>div', function() {
          slider5.trigger('to.owl.carousel', [$(this).data( 'position' ), 300] );
        });
	}
	
	// 	Pricing tabale All Same Size
	var maxHeight = 0;
	$('.sc_plan .pricing_table .card').each(function(){
	   var thisH = $(this).outerHeight();
	   if (thisH > maxHeight) { maxHeight = thisH; }
	});

	$('.sc_plan .pricing_table .card').css('min-height', maxHeight);
	
	// Bootstrap Accordiyan
	$('.faq-question').click(function() {
		var xy = $(this).hasClass('active');
		var parent = $(this).parents('div.card-header');
		var yz = $(parent).hasClass('active');
		if(xy == true){
			$(this).removeClass('active');
		} else{
			$('.faq-question').removeClass('active');
			$(this).addClass('active');
		}
		
		if(yz == true){
			$(parent).removeClass('active');
		} else{
			$('.sc_faqs .card-header').removeClass('active');
			$(parent).addClass('active');
		}
	});
	
	// Video Button
	$('.play-button-cont a').on('click',function(e){
		e.preventDefault();
		e.stopPropagation();
		e.stopImmediatePropagation();
		$('#home-hero-video').get(0).play();
	});

	$(".splitter-link").click(function() {
		var link = $(this).parent();
	    $('.splitter-link-box ul li').removeClass('active');
	   	$(link).addClass('active');
	});
	
	$('.day-smith-family .day-life-slider-nav a').on('click',function(){
		$('.day-smith-family .day-life-slider-nav a').not($(this)).removeClass('active');
		$(this).addClass('active');
	});

	var owl = $('.a-day-in-family-slider');	
	owl.on('translated.owl.carousel', function() {
		$('.owl-item').each(function(){
			if( $(this).hasClass('center') ){
				var xy = $(this).find('slider-play-btn');
				$(xy).addClass('active');
				var dataid = $(this).find('.item').attr("id");
				$('.day-smith-family .day-life-slider-nav a').each(function(){
					var bgid = $(this).attr('data-id');
					if( dataid == bgid ){
						$('.day-smith-family .day-life-slider-nav a').removeClass('active');
					   	$(this).addClass('active');

					}
				});
			}
		});
	});
	
 	owl.on('translated.owl.carousel', function() {
 		var cla = $('.owl-item.active.center').find('.slider-play-btn');
		$('.slider-play-btn').removeClass('active');
		$(cla).addClass('active');
 	});

	if($('.a-day-in-family-slider .owl-item.active.center video').length){
		$('.a-day-in-family-slider .owl-item.active.center video').get(0).play();
	}
  
	$('.a-day-in-family-slider').on('translate.owl.carousel',function(e){
		$('.a-day-in-family-slider .owl-item video').each(function(){
		  $(this).get(0).pause();
		});
	  });
	
	$('.a-day-in-family-slider').on('translated.owl.carousel',function(e){
		$('.owl-item.active.center video').get(0).play();
	});

	$('.play-video-btn').on('click', function(e) {
		e.preventDefault();
		var get_video = $(this).find('video');
		var check = $(this).hasClass('active');
		if(check == true){
			$(this).removeClass('active');
			$(get_video).get(0).pause();
		} else {
			$(this).addClass('active');
			$(get_video).get(0).play();;
		}
 	});

 	$('.slider-play-btn').on('click', function(e) {
 		e.preventDefault();
		var get_video1 = $(this).find('video');
		var check1 = $(this).hasClass('active');
		if(check1 == true){
			$(this).removeClass('active');
			$(get_video1).get(0).pause();
		} else {
			$(this).addClass('active');
			$(get_video1).get(0).play();;
		}
 	});
 	
 	var slider =  $('.features-slider_prod').length;
	if(slider !== 0){
	$('.features-slider_prod').owlCarousel({
		loop:true,
		margin:10,
		nav:false,
		center: true,
		//navText: ["<span class='nav-left-icon'></span>","<span class='nav-right-icon'></span>"],
		dots: true,
		autoplay:true,
        autoplayTimeout:9000,
		responsive:{
			0:{
				items:1
			},
			768:{
				items:1
			},
			992:{
				items:1
			}
		}
	});
	}
	
	$('.prodcut_slick_slider').owlCarousel({
    loop:true,
   /* items : 4,*/
    margin:0,
    nav:true,
    center: true,
    navText: ["<span class='nav-left-icon'></span>","<span class='nav-right-icon'></span>"],
    dots: false,
    /*autoplay:true,
        autoplayTimeout:8000,*/
    responsive:{
      0:{
        items:4
      },
      320:{
        items:1,
        margin:0
      },
      568:{
        items:2,
        margin:10
      },
      768:{
        items:3,
        margin:10
      },
      992:{
        items:4
      }
    }
  });

	$('.owl-fesc-product-sld').owlCarousel({
    	loop:true,
    	margin:0,
    	nav:true,
    	items:1,
    	navText: ["<span class='nav-left-icon'></span>","<span class='nav-right-icon'></span>"],
   	 	dots: false,
    	autoplay:false,
  	});

	$('.owl-interactive-simple-app').owlCarousel({
    	loop:true,
    	margin:0,
    	nav:true,
    	items:1,
    	navText: ["<span class='nav-left-icon'></span>","<span class='nav-right-icon'></span>"],
   	 	dots: true,
    	autoplay:false
  	});

	$('.sc-hoop-cam-slider').owlCarousel({
    	loop:true,
    	margin:0,
    	nav:true,
    	items:1,
    	navText: ["<span class='nav-left-icon'></span>","<span class='nav-right-icon'></span>"],
   	 	dots: true,
    	autoplay:false
  	});


  
    // hover menu cart
    /*var ccart = $( '.site-header .menu-cart' );
    var mcart = $( '.site-header .mini-cart' );
	ccart.add(mcart).on({
		mouseenter: function() {
			if($(window).width() >= 1000) {
				mcart.show();
			}
		},
		mouseleave: function() {
		 if($(window).width() >= 1000) {
				mcart.hide();
			}
		}
	});*/
    
    $('.owl-fesc-product-sld').on('translated.owl.carousel', function(event) {
    	$( '.owl-fesc-product-sld .owl-item' ).each(function(){
    		if($(this).hasClass('active')){
    			var slide_item_no = $(this).find('.item').data('item');
    			$( '.sc-features-product-nav .step-item').each(function(){
    				var slider_img_no = $(this).data('slider');
    				if( slide_item_no == slider_img_no ){
    					$(this).closest( '.sc-features-nav' ).find('.step-item').removeClass('active');
    					$(this).addClass('active');
    				}
    			});
    		}
    	});
    });

    $('.step-item a').on('click', function(event){
		var toIndex = $(this).parent('.step-item').index();
		$(".owl-fesc-product-sld").trigger("to.owl.carousel", [toIndex, 1, true]);
	});

	$('.sc-product-q-a .card-header h5').on('click', function(e){
		e.preventDefault();
		if($(this).hasClass('active')) {
			$(this).removeClass('active');
		} else {
			$('.sc-product-q-a .card-header h5').removeClass('active');
			$(this).addClass('active');
		}
		
	});

	$(document).on('click','.js-videoPoster',function(ev) {
		ev.preventDefault();
		var $poster = $(this);
		var $wrapper = $poster.closest('.js-videoWrapper');
		videoPlay($wrapper);
	});

	function videoPlay($wrapper) {
		video = document.getElementById('my-video');
		if(video){
			var playPromise = video.play();
			if (playPromise !== undefined) {
				playPromise.then(function() {
				// Automatic playback started!
			}).catch(function(error) {
				// Automatic playback failed.
				// Show a UI element to let the user manually start playback.
			});
			}
		}
		$wrapper.addClass('videoWrapperActive');
	}

});
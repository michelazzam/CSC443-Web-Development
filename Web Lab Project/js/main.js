;(function () {

	'use strict';



	// iPad and iPod detection
	var isiPad = function(){
		return (navigator.platform.indexOf("iPad") != -1);
	};

	var isiPhone = function(){
	    return (
			(navigator.platform.indexOf("iPhone") != -1) ||
			(navigator.platform.indexOf("iPod") != -1)
	    );
	};

	// Main Menu Superfish
	var mainMenu = function() {

		$('#fh5co-primary-menu').superfish({
			delay: 0,
			animation: {
				opacity: 'show'
			},
			speed: 'fast',
			cssArrows: true,
			disableHI: true
		});

	};

	// Parallaxs
	var parallax = function() {
		$(window).stellar();
	};

//added by azzam
	window.onscroll = ()=> {myFunction()};

	var headerr = document.getElementById("fh5co-header-section");
	var stickyy = headerr.offsetTop;

	function myFunction() {
	  if (window.pageYOffset > (stickyy+300)) {
	    headerr.classList.add("sticky");
			headerr.classList.remove("stick");

	  }
		 if(window.pageYOffset === (0)){
	    headerr.classList.remove("sticky");
			headerr.classList.add("stick");

	  }
		if(window.pageYOffset === (0)){
		 headerr.classList.remove("stick");
	 }
	}

	//stars rating in filter
	// var rating = ()=> {

		// $('#rating').rating({
		// 	delay: 0,
		// 	animation: {
		// 		opacity: 'show'
		// 	},
		// 	speed: 'fast',
		// 	cssArrows: true,
		// 	disableHI: true
		// });

	// };
	$(document).ready(function(){
  
		/* 1. Visualizing things on Hover - See next part for action on click */
		$('#stars li').on('mouseover', function(){
		  var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
		 
		  // Now highlight all the stars that's not after the current hovered star
		  $(this).parent().children('li.star').each(function(e){
			if (e < onStar) {
			  $(this).addClass('hover');
			}
			else {
			  $(this).removeClass('hover');
			}
		  });
		  
		}).on('mouseout', function(){
		  $(this).parent().children('li.star').each(function(e){
			$(this).removeClass('hover');
		  });
		});
		
		
		/* 2. Action to perform on click */
		$('#stars li').on('click', function(){
		  var onStar = parseInt($(this).data('value'), 10); // The star currently selected
		  var stars = $(this).parent().children('li.star');
		  
		  for (i = 0; i < stars.length; i++) {
			$(stars[i]).removeClass('selected');
		  }
		  
		  for (i = 0; i < onStar; i++) {
			$(stars[i]).addClass('selected');
		  }
		  
		  // JUST RESPONSE (Not needed)
		  var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
	  
		  responseMessage(ratingValue);
		 
		});
		
		
	  });
	  
	  
	  function responseMessage(msg) {
		$('.success-box').fadeIn(200);  
		$('.success-box div.text-message').html("<span>" + msg + "</span>");
	  }



	// Offcanvas and cloning of the main menu
	var offcanvas = function() {

		var $clone = $('#fh5co-menu-wrap').clone();
		$clone.attr({
			'id' : 'offcanvas-menu'
		});
		$clone.find('> ul').attr({
			'class' : '',
			'id' : ''
		});

		$('#fh5co-page').prepend($clone);

		// click the burger
		$('.js-fh5co-nav-toggle').on('click', function(){

			if ( $('body').hasClass('fh5co-offcanvas') ) {
				$('body').removeClass('fh5co-offcanvas');
			} else {
				$('body').addClass('fh5co-offcanvas');
			}
			// $('body').toggleClass('fh5co-offcanvas');

		});

		$('#offcanvas-menu').css('height', $(window).height());

		$(window).resize(function(){
			var w = $(window);


			$('#offcanvas-menu').css('height', w.height());

			if ( w.width() > 769 ) {
				if ( $('body').hasClass('fh5co-offcanvas') ) {
					$('body').removeClass('fh5co-offcanvas');
				}
			}

		});

	}



	// Click outside of the Mobile Menu
	var mobileMenuOutsideClick = function() {
		$(document).click(function (e) {
	    var container = $("#offcanvas-menu, .js-fh5co-nav-toggle");
	    if (!container.is(e.target) && container.has(e.target).length === 0) {
	      if ( $('body').hasClass('fh5co-offcanvas') ) {
				$('body').removeClass('fh5co-offcanvas');
			}
	    }
		});
	};


	// Animations

	var contentWayPoint = function() {
		var i = 0;
		$('.animate-box').waypoint( function( direction ) {

			if( direction === 'down' && !$(this.element).hasClass('animated') ) {

				i++;

				$(this.element).addClass('item-animate');
				setTimeout(function(){

					$('body .animate-box.item-animate').each(function(k){
						var el = $(this);
						setTimeout( function () {
							el.addClass('fadeInUp animated');
							el.removeClass('item-animate');
						},  k * 200, 'easeInOutExpo' );
					});

				}, 100);

			}

		} , { offset: '85%' } );
	};


	// Document on load.
	$(function(){
		mainMenu();
		parallax();
		offcanvas();
		mobileMenuOutsideClick();
		contentWayPoint();


	});



}());

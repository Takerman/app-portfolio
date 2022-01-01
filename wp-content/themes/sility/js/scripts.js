var $ = jQuery.noConflict();
(function ($) {
	"use strict";

	// Page Loaded...
	$(document).ready(function () {
		
		/*==========  Added  ==========*/
		/*timeline shortcode*/
		$('#timeline2').children().last().find('div.line').hide();
		
		// Prettyphoto
		$("a[data-rel^='prettyPhoto']").prettyPhoto({
			theme: 'pp_default',
			hook: 'data-rel', 
			default_width: 500,
			default_height: 344,
			social_tools: ''
		});
		
		$('body.archive').find('#blog-masonry').imagesLoaded( function(){
			$('#blog-masonry').isotope({ sortBy: 'original-order' });
			horizontalSections();
			$('.flexpost').flexslider({
				animation: "slide",
				slideshow: true,
				directionNav: true,
				slideshowSpeed: 3000,
				animationSpeed: 700,
				controlNav: false
			});
		});
		
		/*---------------Animation---------------------*/
		
		$('.animation').waypoint(function(direction) {
			$(this).addClass('animation-active');
		}, {offset: '100%', triggerOnce: true });
		
		/*-------------------------------------------------*/
		/* = Sticky Menu
		/*-------------------------------------------------*/
		$(document).scroll(function () {
			var y = $(document).scrollTop(),
				header = $(".fixed-top");

			if (y >= 120) {
				header.addClass('fixed');
			} else {
				header.removeClass('fixed');
			}
		});
		
		/*-------------------------------------------------*/
		/* = blog
		/*-------------------------------------------------*/
		$(function () {
			"use strict";
			if ($("#ajax-load-more").length) {
				var page = 1,
				$loading = true,
				$finished = false,
				$window = $(window),
				$el = $('#ajax-load-more'),
				$content = $('#ajax-load-more div.blog-posts'),
				$path = $content.attr('data-path');

				if ($path === undefined) {
					$path = '/wp-content/themes/sility';
				}

				var $button = 'Load More Posts';

			   //Define button text
			   if ($content.attr('data-button-text') === undefined) {
				  $button = 'Load More Posts <i class="md-refresh"></i>';
			   } else {
				  $button = $content.attr('data-button-text');
			   }
			   $el.append('<div class="blog-load-more"><a href="#" id="load-more" class="more blog-page-link button solid-button white icon-right"><span class="loader"></span><span class="text">' + $button + '</span></a></div>');

			   //Load posts function
			   var load_posts = function () {
					 $('#load-more').addClass('loading');
					 $('#load-more span.text').text("Loading...");
					 $.ajax({
						type: "GET",
						data: {
						   postType: $content.attr('data-post-type'),
						   category: $content.attr('data-category'),
						   author: $content.attr('data-author'),
						   taxonomy: $content.attr('data-taxonomy'),
						   tag: $content.attr('data-tag'),
						   postNotIn: $content.attr('data-post-not-in'),
						   numPosts: $content.attr('data-display-posts'),
						   pageNumber: page,
						},
						dataType: "html",
						url: $path + "/ajax-load-more.php",
						beforeSend: function () {
						   if (page != 1) {
							  $('#load-more').addClass('loading');
							  $('#load-more span.text').text("Loading...");
						   }
						},
						success: function (data) {

							var $data = $(data); // Convert data to an object   
							//alert(data);           
							if (data.length > 1) {
								$data.hide();
								$content.append($data);
								var $newItems = $data;
								$('#blog-masonry').imagesLoaded( function(){
									
									$('#blog-masonry').isotope( 'reloadItems' ).isotope({ sortBy: 'original-order' });
									horizontalSections();
									$('.flexpost').flexslider({
										animation: "slide",
										slideshow: true,
										directionNav: true,
										slideshowSpeed: 3000,
										animationSpeed: 700,
										controlNav: false
									});
								});

								$data.fadeIn(500, function () {
									$('#load-more').removeClass('loading');
									$('#load-more span.text').text($button);
									$loading = false;
								});
							} else {
								$('#load-more').removeClass('loading').addClass('done');
								$('#load-more span.text').text($button);
								$loading = false;
								$finished = true;
							}
						},
						error: function (jqXHR, textStatus, errorThrown) {
						   $('#load-more').removeClass('loading');
						   $('#load-more span.text').text($button);
						   //alert(jqXHR + " :: " + textStatus + " :: " + errorThrown);
						}
					 });
				  }

				$('#load-more').click(function (event) {
					event.preventDefault();
					if (!$loading && !$finished && !$(this).hasClass('done')) {
						$loading = true;
						page++;
						load_posts();
						// $("html, body").animate({ scrollTop: $(document).height() }, 1000);
					}
			   });
			   load_posts();
			}else{
				//alert("No posts found.");
			}
		});
		
		/*==========  Tooltip  ==========*/
		$('.tool-tip').tooltip();
		
		/*==========  Progress Bars  ==========*/
		$('.progress-bar').on('inview', function (event, isInView) {
			if (isInView) {
				$(this).css('width',  function() {
					return ($(this).attr('aria-valuenow')+'%');
				});
			}
		});
		$('.dial').on('inview', function (event, isInView) {
			if (isInView) {
				var $this = $(this);
				var myVal = $this.attr("value");
				var color = $this.attr("data-color");
				$this.knob({
					readOnly: true,
					width: 200,
					rotation: 'anticlockwise',
					thickness: .05,
					inputColor: '#232323',
					fgColor: color,
					bgColor: '#e8e8e8',
					'draw' : function () { 
						$(this.i).val(this.cv + '%')
					}
				});
				$({
					value: 0
				}).animate({
					value: myVal
				}, {
					duration: 1000,
					easing: 'swing',
					step: function() {
						$this.val(Math.ceil(this.value)).trigger('change');
					}
				});
			}
		});

		/*==========  Accordion  ==========*/
		$('.panel-heading a').on('click', function() {
			$('.panel-heading').removeClass('active');
			$(this).parents('.panel-heading').addClass('active');
		});

		/*==========  Responsive Navigation  ==========*/
		$('.main-nav').children().clone().appendTo('.responsive-nav');
		$('.responsive-menu-open').on('click', function(event) {
			event.preventDefault();
			$('body').addClass('no-scroll');
			$('.responsive-menu').addClass('open');
		});
		$('.responsive-menu-close').on('click', function(event) {
			event.preventDefault();
			$('body').removeClass('no-scroll');
			$('.responsive-menu').removeClass('open');
		});

		/*==========  Popup  ==========*/
		$('.share').on('click', function(event) {
			event.preventDefault();
			$('.popup').fadeToggle(250);
		});
		$('.slide-out-share').on('click', function(event) {
			event.preventDefault();
			$('.slide-out-popup').fadeToggle(250);
		});

		/*==========  Slide Out  ==========*/
		$('.header-action-button').on('click', function(event) {
			event.preventDefault();
			$('.slide-out-overlay').fadeIn(250);
			$('.slide-out').addClass('open');
		});
		$('.slide-out-close').on('click', function(event) {
			event.preventDefault();
			$('.slide-out-overlay').fadeOut(250);
			$('.slide-out').removeClass('open');
		});
		$('.slide-out-overlay').on('click', function(event) {
			event.preventDefault();
			$('.slide-out-overlay').fadeOut(250);
			$('.slide-out').removeClass('open');
		});

		/*==========  Search  ==========*/
		function positionSearch() {
			if ($(window).width() > $(window).height()) {
				var windowWidth = $(window).width();
				$('.search-overlay').css({'width': windowWidth*2.5, 'height': windowWidth*2.5});
			} else {
				var windowHeight = $(window).height();
				$('.search-overlay').css({'width': windowHeight*2.5, 'height': windowHeight*2.5});
			}
			
			var position = $('.header-open-search');
			if(position.length){
				//.offset()
				var height = $('.header-open-search').height();
				var width = $('.header-open-search').width();
			
				var top = position.offset().top + height/2 - $('.search-overlay').outerHeight()/2;
				var left = position.offset().left - width/2 - $('.search-overlay').outerWidth()/2;
				$('.search-overlay').css({'top': top, 'left': left});
			}
		}
		positionSearch();
		$(window).on('resize', function() {
			positionSearch();
		});
		$('.open-search').on('click', function(event) {
			event.preventDefault();
			$('.search-overlay').addClass('scale');
			$('.search-wrap').addClass('open');
		});
		$('.search-close').on('click', function(event) {
			event.preventDefault();
			$('.search-overlay').removeClass('scale');
			$('.search-wrap').removeClass('open');
		});

		/*==========  Portfolio  ==========*/
		var $portfolioContainer = $('#portfolio').imagesLoaded(function() {
			$portfolioContainer.isotope({
				itemSelector: '.item',
				layoutMode: 'masonry'
			});
			horizontalSections();
		});
		$('#portfolio-filters').on('click', 'ul.non-paginated a', function(event) {
			event.preventDefault();
			var filterValue = $(this).attr('data-filter');
			$portfolioContainer.isotope({filter: filterValue});
		});

		
		/*==========  Horizontal Scroll  ==========*/
		var hash = window.location.hash;
		var pathname = window.location.pathname;
		
		if(pathname === '/' && !hash) {
			 $('.main-nav ul li:first-child').addClass('active');
		}
		else if(hash){
			var str = location.href.toLowerCase();
			$('.main-nav a').each(function () {
				if (str.indexOf(this.href.toLowerCase()) > -1) {
					$('.main-nav li.active').removeClass('active');
					$(this).parent().addClass('active');
				}
			});
			$('section'+hash).addClass('active');
		}
		
		var url = 1;
		var count = 0;
		try {
			count = $('.sections-wrapper section').length;
		}
		catch (ex) {
		}
		if (location.hash) {
			setTimeout(function() {
				window.scrollTo(0, 0);
			}, 1);
			slide('link');
		}
		
		$('li.page-scroll>a[href*="#"]:not([href="#"])').click(function() {
			var href = $(this).attr('href');
			var checksearchpage = $('body').hasClass('search');
			if(checksearchpage){
				window.location = href;
			}
			//$('.sections-wrapper section').removeClass('active');
			$('li.page-scroll').removeClass('active');
			$(this).parent('li.page-scroll').addClass('active');
		});
		
		var slug = function(str) {
		  str = str.replace(/^\s+|\s+$/g, ''); // trim
		  str = str.toLowerCase();

		  // remove accents, swap ñ for n, etc
		  var from = "ãàáäâẽèéëêìíïîõòóöôùúüûñç·/_,:;";
		  var to   = "aaaaaeeeeeiiiiooooouuuunc------";
		  for (var i=0, l=from.length ; i<l ; i++) {
			str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
		  }

		  str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
			.replace(/\s+/g, '-') // collapse whitespace and replace by -
			.replace(/-+/g, '-'); // collapse dashes

		  return str;
		};
		function horizontalSections() {
			var vWidth = $(window).width();
			var vheight = $(window).height();
			var activeheight = $('.sections-wrapper.onepage section.active').outerHeight();
			if(activeheight === null) activeheight = $('.sections-wrapper section:first-child').outerHeight();
			
			$('.sections-wrapper > section').css('width', vWidth);
			$('.sections-wrapper').css('width', vWidth * count);
			
			$('.sections-wrapper.onepage').css('height', activeheight);
		}
		
		$('.section-nav a.backward').removeClass('disabled');
		var curlink=$('.main-nav ul').find('li.active').find('a').attr('href');
		var nextpage=$('.main-nav ul').find('li.active').nextAll('li.page-scroll');
		var nextlink=nextpage.first().find('a').attr('href');
		
		var prevpage=$('.main-nav ul').find('li.active').prevAll('li.page-scroll');
		
		var prevlink=prevpage.first().find('a').attr('href');
		
		$('a.prevpage.regular').attr({ href: nextlink });
		
		$('a.forward').on('click', function(e) {
			e.preventDefault;
			$('a.backward').removeClass('disabled');
			url++;
			curlink=$('.main-nav ul').find('li.active').find('a').attr('href');
			nextpage=$('.main-nav ul').find('li.active').nextAll('li.page-scroll');
			nextlink=nextpage.first().find('a').attr('href');
			var lastlink = $('.main-nav ul li:last-child').find('a').attr('href');
			
			if(nextpage.length){
				$('a.forward').attr({ href: nextlink });
			}else{
				$('a.forward').addClass('disabled');
			}
			
			if(nextlink === lastlink){$('a.forward').addClass('disabled');}
			
			$(this).attr({ href: nextlink });
			$('li.page-scroll').removeClass('active');
			nextpage.first().addClass('active');  
			
			var activesection = nextlink.substring(nextlink.indexOf('#'));
			$('.sections-wrapper section.active').removeClass('active');				
			$('.sections-wrapper section'+activesection).addClass('active');
			$('.sections-wrapper').css('height', $('.sections-wrapper section.active').outerHeight());
			
		});
		$('a.backward').on('click', function(e) {
			e.preventDefault;
			$('a.forward').removeClass('disabled');
			url++;
			curlink=$('.main-nav ul').find('li.active').find('a').attr('href');
			prevpage=$('.main-nav ul').find('li.active').prevAll('li.page-scroll');
			prevlink=prevpage.first().find('a').attr('href');
			
			var firstlink = $('.main-nav ul li:first-child').find('a').attr('href');
			
			if(prevpage.length){
				$('a.backward').attr({ href: prevlink });
			}else{
				$('a.backward').addClass('disabled');
			}
			
			if(firstlink === prevlink){$('a.backward').addClass('disabled');}
			
			$(this).attr({ href: prevlink });
			$('li.page-scroll').removeClass('active');
			prevpage.first().addClass('active');
			
			var activesection = prevlink.substring(prevlink.indexOf('#'));
			$('.sections-wrapper section.active').removeClass('active');				
			$('.sections-wrapper section'+activesection).addClass('active');
			$('.sections-wrapper').css('height', $('.sections-wrapper section.active').outerHeight());
			
		});
		
	
		
		function slide($type, $this) {
			
			
			if ($type == 'mainNav') {
				var sectionNum = $this.attr('href');
				
				var firstlink = $('.main-nav ul li:first-child').find('a').attr('href');
				var lastlink = $('.main-nav ul li:last-child').find('a').attr('href');
				
				var activesection = sectionNum.substring(sectionNum.indexOf('#'));
				$('.sections-wrapper section.active').removeClass('active');				
				$('.sections-wrapper section'+activesection).addClass('active');
			
				if(firstlink === sectionNum){
					$('a.backward').addClass('disabled');
				}else{
					$('a.backward').removeClass('disabled');
				}
				
				if(lastlink === sectionNum){
					$('a.forward').addClass('disabled');
				}else{
					$('a.forward').removeClass('disabled');
				}
				
				sectionNum = sectionNum.replace( /[^\d.]/g, '' );
				sectionNum = parseInt(sectionNum, 10);
				url = sectionNum;
			} else if ($type == 'link') {
				var sectionNum = hash;
				sectionNum = sectionNum.replace( /[^\d.]/g, '' );
				sectionNum = parseInt(sectionNum, 10);
				url = sectionNum;
				var checkforward = $('a.forward').attr('href');
				var checkbackward = $('a.backward').attr('href');
				if(checkforward === '') $('a.forward').hide();
				if(checkbackward === '') $('a.backward').hide();
			}
			
			$('.sections-wrapper').css('height', $('.sections-wrapper section.active').outerHeight());
			
		}
		
		horizontalSections();
		$(window).on('resize', function() {
			horizontalSections();
		});
		
		$('.main-nav a').on('click', function() {
			slide('mainNav', $(this));
			//$(this).parent().addClass('active');
		});
		$('.responsive-nav a').on('click', function() {
			
			slide('mainNav', $(this));
			$('body').removeClass('no-scroll');
			$('.responsive-menu').removeClass('open');
		});
		$('.available').on('click', function() {
			slide('mainNav', $(this));
		});
		$('a.forward, .section-nav a.backward, .responsive-nav a, .available').smoothScroll({ direction: 'left',  scrollElement: $('div.sections')});
		$('body').not('.single-portfolio').find('.main-nav a').smoothScroll({ direction: 'left',  scrollElement: $('div.sections')});
	});
	
})(jQuery);

/* ---------------------------------------------------
	Quick contact form widget
-------------------------------------------------- */

function checkemail(emailaddress){
	"use strict";
	var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i); 
	return pattern.test(emailaddress); 
}

jQuery(document).ready(function(){ 
	jQuery('.empty-widget-title').parent().parent('h4').css('display', 'none');
	jQuery('.empty-widget-title').parent('.footer-widget-title').css('display', 'none');
	jQuery('.sidebar-widget ul.drop-menu').removeClass('drop-menu').css('display', 'block');
	"use strict";
	jQuery('#contactFormWidget .contact-error, #contactFormWidget .contact-success, #contactFormWidget .contact-loading').hide();		
	var $messageshort = false;
	var $emailerror = false;
	var $nameshort = false;
	var $namelong = false;
	
	jQuery('#contactFormWidget input#wformsend').click(function(){ 
		var $name = jQuery('#wname').val();
		var $email = jQuery('#wemail').val();
		var $message = jQuery('#wmessage').val();
		var $contactemail = jQuery('#wcontactemail').val();
		var $contacturl = jQuery('#wcontacturl').val();
		var $subject = jQuery('#wsubject').val();
	
		if ($name !== '' && $name.length < 3){ $nameshort = true; } else { $nameshort = false; }
		if ($name !== '' && $name.length > 30){ $namelong = true; } else { $namelong = false; }
		if ($email !== '' && checkemail($email)){ $emailerror = true; } else { $emailerror = false; }
		if ($message !== '' && $message !== 'Message' && $message.length < 3){ $messageshort = true; } else { $messageshort = false; }
		
		jQuery('#contactFormWidget .contact-loading').fadeIn();
		
		if ($name !== '' && $nameshort !== true && $namelong !== true && $email !== '' && $emailerror !== false && $message !== '' && $messageshort !== true && $contactemail !== ''){ 
			jQuery.post($contacturl, 
				{type: 'widget', wcontactemail: $contactemail, subject: $subject, wname: $name, wemail: $email, wmessage: $message}, 
				function(/*data*/){
					jQuery('#contactFormWidget .contact-loading').fadeOut(500);
				//	jQuery('.form').fadeOut();
				//	jQuery('#bottom #wname, #bottom #wemail, #bottom #wmessage').css({'border':'0'});
					jQuery('#contactFormWidget .contact-error').hide();
					jQuery('#contactFormWidget .contact-success').delay(500).fadeIn('slow');
					jQuery('#contactFormWidget .contact-success').delay(2000).fadeOut(1000, function(){ 
						jQuery('#wname, #wemail, #wmessage').val('');
						jQuery('.form').fadeIn('slow');
					});
				}
			);
			
			return false;
		} else {
			jQuery('#contactFormWidget .contact-loading').fadeOut(500);
		//	jQuery('#contactFormWidget .contact-error').hide();
			jQuery('#contactFormWidget .contact-error').delay(500).fadeIn();
		//	jQuery('.widgeterror').delay(3000).fadeOut(1000);
			
			if ($name === '' || $name === 'Name' || $nameshort === true || $namelong === true){ 
				jQuery('#contactFormWidget .contact-error').find('.message').html('Please enter name.');
			} 
			
			else if ($email === '' || $email === 'Email' || $emailerror === false){ 
				jQuery('#contactFormWidget .contact-error').find('.message').html('Please enter a valid email.');
			}
			
			else if ($message === '' || $message === 'Message' || $messageshort === true){ 
				jQuery('#contactFormWidget .contact-error').find('.message').html('Message length must be more than 3 characters.');; 
			} 
			
			return false;
		}
	});
});
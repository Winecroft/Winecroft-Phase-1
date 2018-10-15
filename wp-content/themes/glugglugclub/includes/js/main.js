jQuery(document).ready(function($)
{
	new WOW().init();

	$(".toggle-subnav").click(function()
	{
		$(this).parent().toggleClass('open-subnav');
	});

	$('.toggleAccountNav').click(function()
	{
		$(this).next().slideToggle("slow", function() {});
	});

	$(".togglefieldset").click(function()
	{
		$(this).toggleClass('rotate180');

		$(this).parent().next().slideToggle("slow", function() {});
	});

	$('.berocket_aapf_widget-title').click(function()
	{
		$(this).toggleClass('filter_toggle');

		$(this).next().slideToggle("slow", function() {});
	});

	$("#ggc_step1_form a").click(function()
	{
		var currentHash = $(this).attr('href');

		$('html, body').animate(
		{
			scrollTop: $(currentHash).offset().top - 200
		}, 'slow');

		$('.question_holder').hide();

		$(currentHash).show();
	});

	// $('#ggc_step1_form label, #ggc_step1_form input').click(function() {
	// Q1,2,3 specific
	$('#question_1 label, #question_1 input, #question_2 label, #question_2 input, #question_3 label, #question_3 input').click(function()
	{
		$(this).parent().parent().addClass('can-progress');

		$(this).parent().parent().find('.disabled').removeClass('disabled');
	});

	//Q4 specific
	$('#ggc_q4_1 label, #ggc_q4_1 input').click(function()
	{
		$(this).parent().parent().find('.disabled').addClass('nearly-disabled');
	});

	//Q4 specific
	$('#ggc_q4_2 label, #ggc_q4_2 input').click(function()
	{
		if($('#question_4 .disabled').hasClass('nearly-disabled'))
		{
			$(this).parent().parent().find('.disabled').removeClass('nearly-disabled');

			$(this).parent().parent().addClass('can-progress');

			$(this).parent().parent().find('.disabled').removeClass('disabled');
		}
	});

	//Q5 
	$('#ggc_q5_1 select').on('change', function()
	{
		if($(this).val() != '9')
		{
			$(this).parent().parent().find('.disabled').addClass('selected-1');
		}
		else
		{
			$(this).parent().parent().find('.disabled').removeClass('selected-1');
		}
		if($('#question_5 .disabled').is('.selected-1.selected-2.selected-3.selected-4.selected-5.selected-6'))
		{
			$(this).parent().parent().addClass('can-progress');

			$(this).parent().parent().find('.disabled').removeClass('disabled');
		}
		else
		{
			$(this).parent().parent().removeClass('can-progress');

			$(this).parent().parent().find('.disabled').addClass('disabled');
		}
	});

	$('#ggc_q5_2 select').on('change', function()
	{
		if($(this).val() != '9')
		{
			$(this).parent().parent().find('.disabled').addClass('selected-2');
		}
		else
		{
			$(this).parent().parent().find('.disabled').removeClass('selected-2');
		}
		if($('#question_5 .disabled').is('.selected-1.selected-2.selected-3.selected-4.selected-5.selected-6'))
		{
			$(this).parent().parent().addClass('can-progress');

			$(this).parent().parent().find('.disabled').removeClass('disabled');
		}
		else
		{
			$(this).parent().parent().removeClass('can-progress');

			$(this).parent().parent().find('.disabled').addClass('disabled');
		}
	});

	$('#ggc_q5_3 select').on('change', function()
	{
		if($(this).val() != '9')
		{
			$(this).parent().parent().find('.disabled').addClass('selected-3');
		}
		else
		{
			$(this).parent().parent().find('.disabled').removeClass('selected-3');
		}
		if($('#question_5 .disabled').is('.selected-1.selected-2.selected-3.selected-4.selected-5.selected-6'))
		{
			$(this).parent().parent().addClass('can-progress');

			$(this).parent().parent().find('.disabled').removeClass('disabled');
		}
		else
		{
			$(this).parent().parent().removeClass('can-progress');

			$(this).parent().parent().find('.disabled').addClass('disabled');
		}
	});

	$('#ggc_q5_4 select').on('change', function()
	{
		if($(this).val() != '9')
		{
			$(this).parent().parent().find('.disabled').addClass('selected-4');
		}
		else
		{
			$(this).parent().parent().find('.disabled').removeClass('selected-4');
		}
		if($('#question_5 .disabled').is('.selected-1.selected-2.selected-3.selected-4.selected-5.selected-6'))
		{
			$(this).parent().parent().addClass('can-progress');

			$(this).parent().parent().find('.disabled').removeClass('disabled');
		}
		else
		{
			$(this).parent().parent().removeClass('can-progress');

			$(this).parent().parent().find('.disabled').addClass('disabled');
		}
	});

	$('#ggc_q5_5 select').on('change', function()
	{
		if($(this).val() != '9')
		{
			$(this).parent().parent().find('.disabled').addClass('selected-5');
		}
		else
		{
			$(this).parent().parent().find('.disabled').removeClass('selected-5');
		}
		if($('#question_5 .disabled').is('.selected-1.selected-2.selected-3.selected-4.selected-5.selected-6'))
		{
			$(this).parent().parent().addClass('can-progress');

			$(this).parent().parent().find('.disabled').removeClass('disabled');
		}
		else
		{
			$(this).parent().parent().removeClass('can-progress');

			$(this).parent().parent().find('.disabled').addClass('disabled');
		}
	});

	$('#ggc_q5_6 select').on('change', function()
	{
		if($(this).val() != '9')
		{
			$(this).parent().parent().find('.disabled').addClass('selected-6');
		}
		else
		{
			$(this).parent().parent().find('.disabled').removeClass('selected-6');
		}
		if($('#question_5 .disabled').is('.selected-1.selected-2.selected-3.selected-4.selected-5.selected-6'))
		{
			$(this).parent().parent().addClass('can-progress');

			$(this).parent().parent().find('.disabled').removeClass('disabled');
		}
		else
		{
			$(this).parent().parent().removeClass('can-progress');

			$(this).parent().parent().find('.disabled').addClass('disabled');
		}
	});

	$('#ggc_q5_7  select').on('change', function()
	{
		if($('#question_5 .disabled').is('.selected-1.selected-2.selected-3.selected-4.selected-5.selected-6'))
		{
			$(this).parent().parent().addClass('can-progress');

			$(this).parent().parent().find('.disabled').removeClass('disabled');
		}
		else
		{
			$(this).parent().parent().removeClass('can-progress');

			$(this).parent().parent().find('.disabled').addClass('disabled');
		}
	});

	// this is used to set the hidden input so we know what wine choices to choose from (red or white and quantity of each)
	$('select:not(.tribe-bar-views-select):not(#billing_country):not(#shipping_country):not(#billing_state):not(#shipping_state)').niceSelect();

	$('.coupontrigger').click(function()
	{
		$('.checkout_coupon').slideToggle("slow", function() {});
	});

	var activeMode = '#standard';

	$('.viewmode a').click(function()
	{
		$('.viewmode a ').removeClass('activeview');

		activeMode = $(this).attr('href');

		$(this).toggleClass('activeview');

		$('#products_list').attr('data-viewmode', activeMode);
	});

	$('.filter_toggle, .berocket_aapf_widget_update_button').click(function()
	{
		$('body').toggleClass('active_filtermenu');

		$('#filters').toggleClass('filtermenu__is-active');
	});

	$('.page_banner').slick(
	{
		dots:     false,
		infinite: true,
		speed:    500,
		fade:     false,
		arrows:   true,
		cssEase:  'linear'
	});

	$('#reviews_slider').slick(
	{
		dots:           true,
		infinite:       false,
		speed:          300,
		arrows:         false,
		slidesToShow:   3,
		slidesToScroll: 1,
		variableWidth:  true,
		cssEase:        'ease-in-out',
		responsive:
		[
			{
				breakpoint: 992,
				settings:
				{
					slidesToShow:   2,
					slidesToScroll: 2,
					variableWidth:  false,
					infinite:       false,
					dots:           false,
					arrows:         false,
					centerMode:     false
				}
			},
			{
				breakpoint: 650,
				settings:
				{
					slidesToShow:   1,
					slidesToScroll: 1,
					variableWidth:  false,
					infinite:       false,
					dots:           false,
					arrows:         false,
					centerMode:     false
				}
			}
		]
	});

	$('#products_slider').slick(
	{
		dots:           false,
		infinite:       true,
		speed:          500,
		arrows:         true,
		slidesToShow:   4,
		prevArrow:      '<button class="slick-prev button-prev"><i class="fa fa-angle-left"></i></button>',
		nextArrow:      '<button class="slick-next button-next"><i class="fa fa-angle-right"></i></button>',
		slidesToScroll: 1,
		responsive:
		[
			{
				breakpoint: 991,
				settings:
				{
					slidesToShow:   2,
					slidesToScroll: 2,
					infinite:       true,
					dots:           true,
					arrows:         false
				}
			},
			{
				breakpoint: 767,
				settings:
				{
					slidesToShow:   1,
					slidesToScroll: 1,
					infinite:       true,
					dots:           true,
					arrows:         false
				}
			}
		]
	});

	$('#wineselection_slider').slick(
	{
		dots:      false,
		infinite:  true,
		speed:     1,
		draggable: false,
		autoplay:  false,
		fade:      false,
		arrows:    true,
		prevArrow: '<button class="slick-prev button-prev"><i class="fa fa-angle-left"></i></button>',
		nextArrow: '<button class="slick-next button-next"><i class="fa fa-angle-right"></i></button>'
	});

	$('#wineselection_slider .slick-arrow').click(function()
	{
		var wineSelection = $('#wineselection_slider .slick-active').attr('data-wineamount');

		$('#ws_input').val(wineSelection);
	});

	$('#wineselection_slider_checkout').slick(
	{
		dots:       false,
		infinite:   true,
		speed:      300,
		draggable:  false,
		autoplay:   false,
		fade:       false,
		arrows:     true,
		centerMode: true,
		prevArrow:  '<button class="slick-prev button-prev"><i class="fa fa-angle-left"></i></button>',
		nextArrow:  '<button class="slick-next button-next"><i class="fa fa-angle-right"></i></button>'
	});

	$('.upcoming-events-carousel').slick(
	{
		dots:           false,
		infinite:       true,
		speed:          500,
		arrows:         false,
		slidesToShow:   3,
		prevArrow:      '',
		nextArrow:      '<button class="slick-next button-next"><i class="fa fa-chevron-right"></i></button>',
		slidesToScroll: 1,
		responsive:
		[
			{
				breakpoint: 767,
				settings:
				{
					slidesToShow:   1.1,
					slidesToScroll: 1,
					infinite:       false,
					dots:           false,
					variableWidth:  true
				}
			}
		]
	});

	$(".animsitionaaaa").animsition(
	{
		inClass:              'fade-in',
		outClass:             'fade-out',
		inDuration:           1500,
		outDuration:          800,
		// linkElement:       '.animsition-link',
		linkElement:          'a:not([target="_blank"]):not([href^="#"]):not([data-rel^=lightcase]):not([data-event="add-row"]):not([aria-label="dismiss cookie message"]):not([href="javascript:void(0);"]):not([aria-label="chocolat-gallery"]):not([href*="tel"]):not([href*="mailto"])',
		loading:              true,
		loadingParentElement: 'body', //animsition wrapper element
		loadingClass:         'animsition-loading',
		loadingInner:         '', // e.g '<img src="loading.svg" />'
		timeout:              false,
		timeoutCountdown:     5000,
		onLoadEvent:          true,
		browser:
		[
			'animation-duration',
			'-webkit-animation-duration'
		],
		// "browser" option allows you to disable the "animsition" in case the css property in the array is not supported by your browser.
		// The default setting is to disable the "animsition" in a browser that does not support "animation-duration".
		overlay:              false,
		overlayClass:         'animsition-overlay-slide',
		overlayParentElement: 'body',
		transition:           function(url)
		{
			window.location.href = url;
		}
	});

	$(window).scroll(function()
	{
		$(".home-banner, .page-banner").css("opacity", 1 - $(window).scrollTop() / 800);
	});

	$('.header-links').scrollToFixed(
	{
		marginTop: 0,
		preFixed:  function()
		{
			$(this).toggleClass('fixed-header');

			$('.site-logo').toggleClass('logo-hide');
		},
		postFixed: function()
		{
			$(this).toggleClass('fixed-header');

			$('.site-logo').toggleClass('logo-hide');
		}
	});

	$('#nav-icon3').click(function()
	{
		$(this).toggleClass('open');

		$('body').toggleClass('main-menu-open');
	});

	$('<i class="fa fa-angle-down hidden-md hidden-lg pull-right togglesubmenunav"></i>').insertBefore(".menu-item-has-children > ul");

	$('.togglesubmenunav').click(function()
	{
		$(this).next().toggleClass('open-submenu');
	});

	$('body').on('change', '#order_review', function()
	{
		$("#order_review tr.shipping th").html(function()
		{
			var text = $(this).text().trim().split(" "),
				first = text.shift();

			return(text.length > 0 ? "<span class='hidetherest'>" + first + "</span> " : first);
		});
	});

	$('body').on('change', '#account_addresses .account_form #ship-to-different-address #same_as_billing_address', function()
	{
		if(this.checked)
		{
			$('#account_addresses .account_form .woocommerce-address-fields').show();
		}
		else
		{
			$('#account_addresses .account_form .woocommerce-address-fields').hide();

			$('#account_addresses .account_form .account_form_btn[type="submit"]').attr('disabled', true);

			$.ajax(
			{
				url:      wpajax.url,
				data:
				{
					action: 'user_get_billing_address_fields'
				},
				dataType: 'json',
				type:     'GET',
				success:  function(data)
				{
					if(data)
					{
						for(var name in data)
						{
							var input = $('#account_addresses .account_form [name="shipping_' + name + '"]');

							if(input.length > 0)
							{
								if(input.attr('type') == 'checkbox' || input.attr('type') == 'radio')
								{
									input[0].checked = (!!data[name]);
								}
								else
								{
									input.val(data[name]);
								}

								input.trigger('change');
							}
						}
					}

					$('#account_addresses .account_form .account_form_btn[type="submit"]').removeAttr('disabled');
				}
			});
		}
	});

	setTimeout(function()
	{
		$('#account_addresses .account_form #ship-to-different-address #same_as_billing_address').trigger('change');
	}, 10);
});
/*
 * ClickToAddress for Woocommerce by Crafty Clicks
 *
 * @author		Crafty Clicks Limited
 * @link		https://craftyclicks.co.uk
 * @copyright	Copyright (c) 2018, Crafty Clicks Limited
 * @license		Licensed under the terms of the MIT license.
 * @version		1.1.5
 */

var colours = {
	default:	'#63a2f1',
	red:		'#F44336',
	pink:		'#E91E63',
	purple:		'#9C27B0',
	deepPurple:	'#673ab7',
	indigo:		'#3f51b5',
	blue:		'#2196f3',
	lightBlue:	'#03a9f4',
	cyan:		'#00bcd4',
	teal:		'#009688',
	green:		'#4caf50',
	lightGreen:	'#8bc34a',
	lime:		'#cddc39',
	yellow:		'#ffeb3b',
	amber:		'#ffc107',
	orange:		'#ff9800',
	deepOrange:	'#ff5722',
	brown:		'#795548',
	grey:		'#9e9e9e',
	blueGrey:	'#607d8b'
};

jQuery(document).ready(function(){
	var accentSelect = jQuery('#woocommerce_clicktoaddress_autocomplete_accent');
	if(!accentSelect.length) return;
	accentSelect.hide();
	var currentAccentVal = accentSelect.val();

	var coloursDiv = jQuery('<div id="colour_cubes"></div>');
	var fieldWidth = jQuery('#woocommerce_clicktoaddress_autocomplete_access_token').css('width');
	coloursDiv.css({width: fieldWidth});
	coloursDiv.insertAfter(jQuery('#woocommerce_clicktoaddress_autocomplete_accent'));

	for(var colour in colours){
		coloursDiv.append(	'<div '+
								'class="colour_cube" '+
								'style="background-color:'+colours[colour]+'" '+
								'title="'+colour+'" '+
								'name="'+colour+'">'+
							'</div>');
	}

	var colourCubes = jQuery('.colour_cube');
	// Inital setup
	colourCubes.css({
		height:			'32px',
		width:			'32px',
		cursor:			'pointer',
		border:			'1px solid black',
		boxSizing:		'border-box',
		display:		'inline-block',
		marginRight:	'6px',
		marginTop:		'2px'
	});
	var currentCube = coloursDiv.find('[name="'+currentAccentVal+'"]');
	currentCube.css({
		border: '2px solid black',
		boxSizing: 'border-box',
	});
	// On hover
	colourCubes.hover(function(){
		jQuery(this).css({
			webkitTransform:	'scale(1.2, 1.2)',
			transform:			'scale(1.2, 1.2)'
		});
	}, function(){
		jQuery(this).css({
			webkitTransform:	'scale(1, 1)',
			transform:			'scale(1, 1)'
		});
	});
	// On click
	colourCubes.on('click', function(){
		jQuery(colourCubes).css({
			webkitTransform:	'scale(1, 1)',
			transform:			'scale(1, 1)',
			border:				'1px solid black'
		});
		jQuery(this).css({
			border:		'2px solid black',
			boxSizing:	'border-box'
		});
		var colourName = jQuery(this).attr('name');
		if(accentSelect.find('option[value="'+colourName+'"]').length){
			accentSelect.val(colourName);
		}
	});


	var tmp_html =	jQuery('<br>'+
					'<span class="description">'+
						'Find My Access Token'+
					'</span>');
	jQuery(tmp_html[1]).css({color: '#0073aa', textDecoration: 'underline', cursor: 'pointer'});
	jQuery('#woocommerce_clicktoaddress_autocomplete_access_token').after(tmp_html);
	jQuery(tmp_html[1]).on('click', function(){
		get_cc_token(function(token){
			jQuery('#woocommerce_clicktoaddress_autocomplete_access_token').val(token);
		});
	});
});

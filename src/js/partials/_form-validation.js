document.addEventListener("DOMContentLoaded", function() {

	var $ = jQuery.noConflict();
	
	/* Phone / Numbers & + only Validation */
	$('form input[type=tel],input[type=number],form input[type=range],form input[type=time]').on('input propertychange', function (e) {
		e.target.value = e.target.value.replace(/[a-zA-Z]/g,'');
	  	return false;
	});

	/* Name / Text only Validation */
	$('form input[type=text]').on('input propertychange', function (e) {
		e.target.value = e.target.value.replace(/[0-9]/g,'');
	  	return false;
	});

	$('#events .btn-more__apply').on('click', function() {
		var $adult_price = $(this).parent().find('.event-details .event-adult-price').text();
		var $adult_price_val = ( $adult_price / 5 );
		var $t = $(this).parent().find('.h3 a').text();
		var $st = $('body.single-events .wp-block-post-title').text();
		setTimeout(function() {				
			$('#apply-form .event-title').val($t + $st);
			$('.adult-price-val-num').attr('value',$adult_price_val);
			//console.log($adult_price_val);
		}, 200);
	});

	$("#apply-form button").on('click', function() {
		setTimeout(function() {
			var $num = $('.adult-price-val-num').val();
			var $adults_val = $("#apply-form .f-adults").val();
			var $adults = ( parseFloat($adults_val) * parseFloat($num) );
			var $kids = $("#apply-form .f-kids").val();
			setTimeout(function() {
				if ( $kids >= 1 ) {
					$('.f-sum').text( ( parseFloat($adults) * 5 ) + ( parseFloat($kids) * 5 ) );
					$('.f-sum').val( ( parseFloat($adults) * 5 ) + ( parseFloat($kids) * 5 ) );
					$('.amount').val(5);
					$('.f-quantity').text(parseFloat($adults) + parseFloat($kids));
					$('.quantity').val(parseFloat($adults) + parseFloat($kids));
				} else {
					$('.f-sum').text(parseFloat(parseFloat($adults) * 5));
					$('.f-sum').val(parseFloat(parseFloat($adults) * 5));
					$('.amount').val(5);
					$('.f-quantity').text(parseFloat($adults));
					$('.quantity').val(parseFloat($adults));
				}
			}, 200);
		}, 300);
	});

	$("#apply-form").change(function() {
		setTimeout(function() {
			var $num = $('.adult-price-val-num').val();
			var $adults_val = $("#apply-form .f-adults").val();
			var $adults = ( parseFloat($adults_val) * parseFloat($num) );
			var $kids = $("#apply-form .f-kids").val();
			setTimeout(function() {
				if ( $kids >= 1 ) {
					$('.f-sum').text( ( parseFloat($adults) * 5 ) + ( parseFloat($kids) * 5 ) );
					$('.f-sum').val( ( parseFloat($adults) * 5 ) + ( parseFloat($kids) * 5 ) );
					$('.amount').val(5);
					$('.f-quantity').text(parseFloat($adults) + parseFloat($kids));
					$('.quantity').val(parseFloat($adults) + parseFloat($kids));
				} else {
					$('.f-sum').text(parseFloat(parseFloat($adults) * 5));
					$('.f-sum').val(parseFloat(parseFloat($adults) * 5));
					$('.amount').val(5);
					$('.f-quantity').text(parseFloat($adults));
					$('.quantity').val(parseFloat($adults));
				}
			}, 200);
		}, 300);
	});

});
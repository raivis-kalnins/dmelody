<?php
/**
 * Footer Global / Scripts & global settings - before </body>
 */
add_action('wp_footer', 'footer_global');

function footer_global() {
	global $post;
?>
<!-- Footer DP Global -->
<div class="fancybox-hidden" style="display:none"><div id="apply-form" class="get-form" style="background:#A67529;padding:40px"><?=do_shortcode('[contact-form-7 id="e5f3308" title="Apply Event"]')?></div></div>
<?php  if( has_post_thumbnail() ) :  $hero_bg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
	<!-- BG Hero -->
	<style>.hero::after,.hero-bg-mob::after{background-image:url('<?=$hero_bg[0]; ?>');}</style>
	<!-- /BG Hero -->
<?php endif; ?>
<?php 
	$f = get_fields('option');
	$sc_footer = $f['sc_footer'] ?? '';
	if( !empty($sc_footer) ) :
		echo $sc_footer;
	endif; 
?>
<?php wp_reset_postdata(); edit_post_link(); ?>
<div class="scroll-up hidden"></div>
<script id="global-foo-js">
	document.addEventListener("DOMContentLoaded",function(){ 
		var $=jQuery.noConflict(), 
			home_url='<?=home_url()?>';

		$('.btn-back-home').attr('href',home_url);

		$('#events .btn-more__apply').on('click', function() {
			var $adult_price = $(this).parent().find('.event-details .event-adult-price').text();
			var $adult_price_val = ( $adult_price / 5 );
			var $t = $(this).parent().find('.h3 a').text();
			setTimeout(function() {				
				$('#apply-form .event-title').val($t);
				$('.adult-price-val-num').attr('value',$adult_price_val);
				//console.log($adult_price_val);
			}, 200);
		});

		$("#apply-form").change(function() {
			setTimeout(function() {
				var $num = $('.adult-price-val-num').val();
				var $adults_val = $("#apply-form .f-adults").val();
				console.log($adults_val);
				var $adults = ( parseFloat($adults_val) * parseFloat($num) );
				var $kids = $("#apply-form .f-kids").val();
				setTimeout(function() {
					if ( $kids >= 1 ) {
						$('.f-sum').text(parseFloat((parseFloat($adults) + parseFloat($kids)) * 5));
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
</script>
<!-- /Footer DP Global -->
<?php
};

<?php
/**
 * Footer Global / Scripts & global settings - before </body>
 */
add_action('wp_footer', 'footer_global');

function footer_global() {
	global $post;
?>
<!-- Footer DP Global -->
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
		var $=jQuery.noConflict(), home_url='<?=home_url()?>';
		$('.btn-back-home').attr('href',home_url);
	});
</script>
<!-- /Footer DP Global -->
<?php
};

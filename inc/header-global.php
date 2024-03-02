<?php
/**
 * Header Global / Meta - before </head>
 */
add_action('wp_head', 'header_global');

function header_global() {
	do_shortcode( '[theme-settings]' );
	do_shortcode( '[theme-styles]' );
	do_shortcode( '[scss-compiler]' );

	$queriedObject = get_queried_object();
	$fields = get_fields($queriedObject);
	if (!empty($queriedObject->post_parent)) {
		//$fields = array_merge(array_filter(get_fields($queriedObject->post_parent)), array_filter($fields));
	}
	$assets = get_stylesheet_directory_uri() . '/assets';
?>
	<!-- Header DP Global -->
	<?php 
		$f = get_fields('option');
		$meta_header = $f['meta_header'] ?? '';
		if( !empty($meta_header) ) :
			echo $meta_header;
		endif; 
	?>
	<!-- /Header DP Global -->
<?php
};
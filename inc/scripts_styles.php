<?php

function dp_enqueue_scripts_and_styles() {

	$style_time = file_exists( get_stylesheet_directory() . '/dist/scss/dp-theme-main.css' ) ? filemtime( get_stylesheet_directory() . '/dist/scss/dp-theme-main.css' ) : false;
	$script_time = file_exists( get_stylesheet_directory() . '/dist/js/dp-theme-main.js' ) ? filemtime( get_stylesheet_directory() . '/dist/js/dp-theme-main.js' ) : false;

	// Enqueue style
	//wp_enqueue_style( 'css_magnific', '//cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/0.9.1/magnific-popup.min.css', [], '', 'all' );
	wp_enqueue_style( 'css_swiper', '//cdnjs.cloudflare.com/ajax/libs/Swiper/8.2.1/swiper-bundle.min.css', [], '', 'all' );
	wp_enqueue_style( 'css_select2', '//cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css', [], '', 'all' );
	wp_enqueue_style( 'dp-styles', get_stylesheet_directory_uri() .'/dist/scss/dp-theme-main.css?'.$style_time, [], '', 'all' );
	wp_enqueue_style( 'acf-styles', get_stylesheet_directory_uri() .'/dist/scss/acf-theme-main.css?'.$style_time, [], '', 'all' ); 

	// Enqueue scripts
	wp_enqueue_script( 'js_popper', '//cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js', ['jquery'], '', 'all' );
	wp_enqueue_script( 'js_bootstrap', '//cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0/js/bootstrap.min.js', ['jquery'], '', 'all' );
	//wp_enqueue_script( 'js_magnific', '//cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/0.9.1/jquery.magnific-popup.min.js', ['jquery'], '', 'all' );
	wp_enqueue_script( 'js_swiper', '//cdnjs.cloudflare.com/ajax/libs/Swiper/8.2.1/swiper-bundle.min.js', ['jquery'], '', 'all' );
	//wp_enqueue_script( 'js_rellax', '//cdnjs.cloudflare.com/ajax/libs/rellax/1.12.1/rellax.min.js', ['jquery'], '', 'all' );
	wp_enqueue_script( 'js_select2', '//cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js', ['jquery'], '', 'all' );
	wp_enqueue_script( 'dp-theme-js', get_stylesheet_directory_uri() .'/dist/js/dp-theme-main.js?'.$script_time, ['jquery'], '', 'all' );	
}
add_action( 'wp_enqueue_scripts', 'dp_enqueue_scripts_and_styles' );

// Admin Style
function dp_enqueue_custom_admin_script_style() {
	wp_enqueue_style( 'admin-css', get_stylesheet_directory_uri() . '/dist/scss/dp-theme-admin.css', array(), '1.0', 'all' );
	wp_enqueue_script( 'admin-js', get_stylesheet_directory_uri() . '/dist/js/dp-theme-admin.js', ['jquery'], '1.0', 'all' );
}
add_action( 'admin_enqueue_scripts', 'dp_enqueue_custom_admin_script_style' );

/**
 * Add Tag type="module"
 */
function add_module_to_my_script($tag, $handle, $src) {
    if ("dp-theme-js" === $handle) {
        $tag = '<script type="module" src="' . esc_url($src) . '"></script>';
    }
    return $tag;
}
add_filter("script_loader_tag", "add_module_to_my_script", 10, 3);

add_action( 'init', function() {

	if (  ! is_admin()) {
		if( is_ssl() ) {
			$protocol = 'https';
		} else {
			$protocol = 'http';
		}

		/** @var WP_Scripts $wp_scripts */
		global  $wp_scripts;
		/** @var _WP_Dependency $core */
		$core = $wp_scripts->registered[ 'jquery-core' ];
		$core_version = $core->ver;
		$core->src = "$protocol://ajax.googleapis.com/ajax/libs/jquery/$core_version/jquery.min.js";

		if ( WP_DEBUG ) {
			/** @var _WP_Dependency $migrate */
			$migrate         = $wp_scripts->registered[ 'jquery-migrate' ];
			$migrate_version = $migrate->ver;
			$migrate->src    = "$protocol://cdn.jsdelivr.net/jquery.migrate/$migrate_version/jquery-migrate.min.js";
		} else {
			/** @var _WP_Dependency $jquery */
			$jquery = $wp_scripts->registered[ 'jquery' ];
			$jquery->deps = [ 'jquery-core' ];
		}
    }
	
},11);

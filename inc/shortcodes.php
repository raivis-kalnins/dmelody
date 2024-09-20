<?php
/*
*  Create Shortcode to Display Components Post Types [com id=14]
*/
function dp_shortcode_com( $atts ) {
	$atts = shortcode_atts( array( 'id' => null, ), $atts,'com' );
	$content_post = get_post( $atts['id'] );
	$blocks = $content_post->post_content ?? '';
	return '<div class="short-component">'. do_blocks( $blocks ).'</div>';
}
// add_shortcode( 'com', 'dp_shortcode_com' ); => only if need specific large reusable sections

/*
*  Create Shortcode to Display Swiper navigation [swipernav]
*/
function dp_shortcode_swiper_nav( $sw ) {
	$sw = shortcode_atts( array(), $sw,'swipernav' );
	return do_shortcode('<div class="swiper-life"><div class="swiper-button-prev"></div><div class="swiper-button-next"></div><div class="swiper-pagination"></div></div>');
}
add_shortcode( 'swipernav', 'dp_shortcode_swiper_nav' );

/*
*  Create Shortcode to Display Back button [back-btn]
*/
function dp_shortcode_back_btn( $btn ) {
	$btn = shortcode_atts( array(), $btn,'back-btn' );
	if ( get_locale() == 'lv') { $back = str_replace('<p></p>','','Sākums'); }
	if ( get_locale() == 'en_GB') { $back = str_replace('<p></p>','','Back to Home'); }
	return '<p class="has-text-align-left btn-see-more--back" onclick="window.location.href=document.location.origin">'. $back .'</p>'; 
}
add_shortcode( 'back-btn', 'dp_shortcode_back_btn' );

/*
*  Create Shortcode to Display scroll down btn [scroll-down]
*/
function dp_shortcode_scrolldown( $gm ) {
	$gm = shortcode_atts( array(), $gm,'scroll-down' );
	return '<div class="scroll-down"><svg xmlns="http://www.w3.org/2000/svg" width="20.05" height="47.012" viewBox="0 0 20.05 47.012"><g id="Group_22636" data-name="Group 22636" transform="translate(-949.985 -1006.5)"><line id="Line_5" data-name="Line 5" y2="46" transform="translate(960 1006.5)" fill="none" stroke="#fff" stroke-width="1.5"/><path id="Path_30" data-name="Path 30" d="M969.52,1043.49l-9.52,8.99-9.5-8.99" fill="none" stroke="#fff" stroke-width="1.5"/></g></svg></div>';
}
add_shortcode( 'scroll-down', 'dp_shortcode_scrolldown' );

// Add short code Testimonials [testimonials]
include( get_template_directory() . '/templates/shortcodes/testimonials.php' );

// Add short code Hero Option [hero_option]
include( get_template_directory() . '/templates/shortcodes/hero_option.php' );

// Add short code Hero Category [seo-title]
include( get_template_directory() . '/templates/shortcodes/seo-title.php' );

// Add short code theme settings [theme-settings]
include( get_template_directory() . '/templates/shortcodes/theme_settings.php' );

// Add short code theme styles [theme-styles]
include( get_template_directory() . '/templates/shortcodes/theme_styles.php' );

// Add short code theme styles [scss-compiler]
include( get_template_directory() . '/templates/shortcodes/scss_compiler.php' );

// Add short code polylang flags [POLYLANG]
include( get_template_directory() . '/templates/shortcodes/polylang_flags.php' );

// Add short code Form [acf-form_en"]
include( get_template_directory() . '/templates/shortcodes/acf_form.php' );

// Add short code Form [load_more_shop]
include( get_template_directory() . '/templates/shortcodes/load_more.php' );
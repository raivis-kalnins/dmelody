<?php
/*
 *  DP
 *  Custom functions, support, custom post types and more.
 */

if ( ! function_exists( 'dp_support' ) ) :
	function dp_support() {
		// Alignwide and alignfull classes in the block editor.
		add_theme_support( 'align-wide' );

		// Add support for experimental link color control.
		add_theme_support( 'experimental-link-color' );

		// Add support for responsive embedded content.
		// https://github.com/Wordpress/gutenberg/issues/26901
		add_theme_support( 'responsive-embeds' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Add support for post thumbnails.
		add_theme_support( 'post-thumbnails' );

		// Enqueue editor styles.
		add_editor_style(
			array(
				'/assets/ponyfill.css',
			)
		);

		add_filter(
			'block_editor_settings_all',
			function( $settings ) {
				$settings['defaultBlockTemplate'] = '<!-- wp:group {"layout":{"inherit":true}} --><div class="wp-block-group"><!-- wp:post-content /--></div><!-- /wp:group -->';
				return $settings;
			}
		);

		// Add support for core custom logo.
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 192,
				'width'       => 192,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

	}
endif;
add_action( 'after_setup_theme', 'dp_support', 9 );

// Add the child theme patterns if they exist.
if ( file_exists( get_stylesheet_directory() . '/inc/patterns.php' ) ) {
	require_once get_stylesheet_directory() . '/inc/patterns.php';
}

// Include Woocommerce
if (class_exists('Woocommerce')) {
	require get_stylesheet_directory() . '/inc/woocommerce/functions.php';
}

/**
 * SVG WP Support
 * define( 'ALLOW_UNFILTERED_UPLOADS', true ); - need to add wp-config.php as well
 */
function add_file_types_to_uploads($file_types){
	$new_filetypes = array();
	$new_filetypes['svg'] = 'image/svg+xml';
	$file_types = array_merge($file_types, $new_filetypes );
	return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');

// REMOVE WP EMOJI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

/**
 * Use namespaced data attribute for Bootstrap's dropdown toggles.
 *
 * @param array    $atts HTML attributes applied to the item's `<a>` element.
 * @param WP_Post  $item The current menu item.
 * @param stdClass $args An object of wp_nav_menu() arguments.
 * @return array
 */
function prefix_bs5_dropdown_data_attribute( $atts, $item, $args ) {
	if ( is_a( $args->walker, 'WP_Bootstrap_Navwalker' ) ) {
		if ( array_key_exists( 'data-toggle', $atts ) ) {
			$atts['href'] = ! empty( $item->url ) ? $item->url : '';
		}
	}
	return $atts;
}
add_filter( 'nav_menu_link_attributes', 'prefix_bs5_dropdown_data_attribute', 20, 3 );

// show featured images in dashboard
add_image_size( 'haizdesign-admin-post-featured-image', 120, 120, false );

// Add the posts and pages columns filter. They both use the same function.
add_filter('manage_posts_columns', 'haizdesign_add_post_admin_thumbnail_column', 2);
add_filter('manage_pages_columns', 'haizdesign_add_post_admin_thumbnail_column', 2);

// Add the column
function haizdesign_add_post_admin_thumbnail_column($haizdesign_columns){
	$haizdesign_columns['haizdesign_thumb'] = __('Featured Image');
	return $haizdesign_columns;
}

// Manage Post and Page Admin Panel Columns
add_action('manage_posts_custom_column', 'haizdesign_show_post_thumbnail_column', 5, 2);
add_action('manage_pages_custom_column', 'haizdesign_show_post_thumbnail_column', 5, 2);

// Get featured-thumbnail size post thumbnail and display it
function haizdesign_show_post_thumbnail_column($haizdesign_columns, $haizdesign_id){
	switch($haizdesign_columns){
		case 'haizdesign_thumb':
		if( function_exists('the_post_thumbnail') ) {
			echo the_post_thumbnail( 'haizdesign-admin-post-featured-image' );
		}
		else
			echo 'hmm… your theme doesn\'t support featured image…';
		break;
	}
}

// Block Theme Support
function block_theme_features() {
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_theme_support('editor-styles');
}
add_action('after_setup_theme', 'block_theme_features');

/**
 * Register Gutenberg ACF Flex Blocks
 */
function acf_init_block_types() {
	// Check function exists.
	if( function_exists('acf_register_block_type') ) {
		// register a testimonial block.
		acf_register_block_type(array(
			'name'              => 'flex-layouts',
			'title'             => __('DP ACF Blocks'),
			'description'       => __('DP ACF Flexible Blocks'),
			'render_template'   => 'templates/acf/acf.php',
			'mode'          	=> 'preview',
			'category'          => 'design',
			'icon'              => 'layout',
			'show_in_graphql' 	=> true,
			'keywords'          => array( 'flex', 'layouts' ),
			'supports'      	=> [
				'align'         => false,
				'anchor'        => true,
				'customClassName'   => true,
				'jsx'           => true,
			]
		));
	}
}
add_action('acf/init', 'acf_init_block_types');

/**
 * Post Edit Link New Tab
 */
add_filter( 'edit_post_link', function( $link, $post_id, $text ) {
	// Add the target attribute 
	if( false === strpos( $link, 'target=' ) )
		$link = str_replace( '<a ', '<a target="_blank" ', $link );
	return $link;
}, 10, 3 );

/**
* Rename default post type to news
*
* @param object $labels
* @hooked post_type_labels_post
* @return object $labels
*/
function news_rename_labels( $labels ) {
	
	# Labels
	$labels->name = 'Blog';
	$labels->singular_name = 'Blog';
	$labels->add_new = 'Add Post';
	$labels->add_new_item = 'Add Post';
	$labels->edit_item = 'Edit Post';
	$labels->new_item = 'New Post';
	$labels->view_item = 'View Post';
	$labels->view_items = 'View Post';
	$labels->search_items = 'Search Post';
	$labels->not_found = 'No Post found.';
	$labels->not_found_in_trash = 'No Post found in Trash.';
	$labels->parent_item_colon = 'Parent Post'; // Not for "post"
	$labels->archives = 'Post Archives';
	$labels->attributes = 'Post Attributes';
	$labels->insert_into_item = 'Insert into Post';
	$labels->uploaded_to_this_item = 'Uploaded to this Post';
	$labels->featured_image = 'Featured Image';
	$labels->set_featured_image = 'Set featured image';
	$labels->remove_featured_image = 'Remove featured image';
	$labels->use_featured_image = 'Use as featured image';
	$labels->filter_items_list = 'Filter Post list';
	$labels->items_list_navigation = 'Post list navigation';
	$labels->items_list = 'Post list';

	# Menu
	$labels->menu_name = 'Blog';
	$labels->all_items = 'All Posts';
	$labels->name_admin_bar = 'Blog';

	return $labels;
}

add_filter( 'post_type_labels_post', 'news_rename_labels' );

/**
 * Add site ID to footer for admins
 */
function dp_display_blog_id() {
	if ( current_user_can( 'administrator' ) ) {
		echo 'Site Id :' . get_current_blog_id();
	} else {
		return false;
	}
}
add_filter( 'update_footer', 'dp_display_blog_id', 11 );

/**
 * Add Thumbnail Theme Support
 */
if (function_exists('add_theme_support')) {
	add_theme_support('post-thumbnails');
	add_image_size('large', 700, '', true); // Large Thumbnail
	add_image_size('medium', 250, '', true); // Medium Thumbnail
	add_image_size('small', 120, '', true); // Small Thumbnail
	add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');
}

/**
 * Custom image sizes.
 *
 * @package dp
 */

// Register new image sizes.
add_image_size( 'small_square', 250, 250, true );
add_image_size( 'medium', 300, 200, true );
add_image_size( 'hd', 1280, 720, true );
add_image_size( 'medium_square', 500, 500, true );
add_image_size( 'full_hd', 1920, 1080, true );

/**
 * Register a new image size options to the list of selectable sizes in the Media Library
 */
function dp_custom_image_sizes( $sizes ) {
	return array_merge(
		$sizes,
		array(
			'small_square'  => __( 'Small Square', 'dp' ),
			'medium'        => __( 'Medium', 'dp' ),
			'medium_square' => __( 'Medium Square', 'dp' ),
			'hd'            => __( 'HD', 'dp' ),
			'full_hd'       => __( 'Full HD', 'dp' ),
		)
	);
}
add_filter( 'image_size_names_choose', 'dp_custom_image_sizes' );

/*--------------------------------------------------------------
# Theme Supports
--------------------------------------------------------------*/
if ( ! function_exists( 'dp_setup' ) ) :
	function dp_setup() {

		load_theme_textdomain( 'dp', get_template_directory() . '/languages' );

		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1170, 0 );
		add_theme_support( 'editor-styles' );
		add_theme_support( 'html5', array( 'comment-form', 'comment-list' ) );
		add_theme_support( 'responsive-embeds' );

		// Adding support for core block visual styles.
		add_theme_support( 'wp-block-styles' );

		// Disable WooCommerce wizard redirect
		add_filter('woocommerce_enable_setup_wizard', '__return_false');
		add_filter('woocommerce_show_admin_notice', '__return_false');
		add_filter('woocommerce_prevent_automatic_wizard_redirect', '__return_false');
		
	}
	add_action( 'after_setup_theme', 'dp_setup' );
endif;

/**
 * Custom Admin Logo
 */
function my_login_logo() { ?><style type="text/css">#login h1 a,.login h1 a {background: url(<?php echo get_stylesheet_directory_uri(); // or echo home_url(); /wp-content/uploads/... ?>/assets/img/i/autohome_logo_white.png) center / auto 90% no-repeat;width:100%;padding:5px}</style><?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

/**
 * Contact Form 7 custom Countries list select
 */
function cf7_select_country($tag) {
	if ( $tag['name'] != 'cf7-countries' )
		return $tag;

	$countries = get_fields('options')['countries_list'] ?? '';
	if (!empty($countries)):
		foreach($countries as $country):
			$country = $country['countries_list_form'] . ' ';
			$tag['raw_values'][] = $country;
			$tag['labels'][] = $country;
			//var_dump($country);
		endforeach;
	endif;
	$pipes = new WPCF7_Pipes($tag['raw_values']);
	$tag['values'] = $pipes->collect_befores();
	$tag['pipes'] = $pipes;
	return $tag;
}
add_filter( 'wpcf7_form_tag', 'cf7_select_country', 10, 2);

remove_action( 'wpcf7_swv_create_schema', 'wpcf7_swv_add_select_enum_rules', 20, 2 );

/**
 * Contact Form 7 custom Sectors select list
 */
function cf7_select_sectors($tag) {
	if ( $tag['name'] != 'cf7-sectors' )
		return $tag;

	$countries = get_fields('options')['sectors_list'] ?? '';
	if (!empty($countries)):
		foreach($countries as $sector):
			$sector = $sector['sectors_list_form'] . ' ';
			$tag['raw_values'][] = $sector;
			$tag['labels'][] = $sector;
			//var_dump($sector);
		endforeach;
	endif;
	$pipes = new WPCF7_Pipes($tag['raw_values']);
	$tag['values'] = $pipes->collect_befores();
	$tag['pipes'] = $pipes;
	return $tag;
}
add_filter( 'wpcf7_form_tag', 'cf7_select_sectors', 10, 2);

/**
 * Remove <title> meta tag and keep Yoast SEO <title> tag
 */
function custom_remove_title_tag() {
	remove_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'custom_remove_title_tag', 10000 );

/**
 * Remove rel=shortlink WP head
 */
function remove_redundant_shortlink() {
	remove_action('wp_head', 'wp_shortlink_wp_head', 10);
	remove_action( 'template_redirect', 'wp_shortlink_header', 11);
}
add_filter('after_setup_theme', 'remove_redundant_shortlink');

/**
 * Remove xmlrpc WP head
 */
function removeHeadLinks() {
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
}
add_action('init', 'removeHeadLinks');

// Hide H1 title from Shop archive page
add_filter( 'woocommerce_show_page_title', '__return_false' );

// Ovveride Shop archive page template
// function woocommerce_archive_template( $template ) {

//     if ( is_woocommerce() && is_archive() ) {
//         $new_template = get_stylesheet_directory() . '/woocommerce/archive-product.php';
//         if ( !empty( $new_template ) ) {
//             return $new_template;
//         }
//     }
//     return $template;
// }
// add_filter( 'template_include', 'woocommerce_archive_template', 99 );

/**
 * Register DP Theme patterns
 */
register_block_pattern_category(
	'dp-patterns',
	array( 'label' => __( '| * DP Patterns * |', 'dp' ) )
);

/**
 * Hide from admin menu
 */
function remove_item_from_menu() {
	//remove_menu_page( 'edit.php' ); // removes blog posts
	remove_menu_page( 'edit-comments.php' ); // removes comment menu
	remove_menu_page( 'edit.php?post_type=acf-field-group' ); // removes acf
}
add_action( 'admin_init', 'remove_item_from_menu' );

/**
 * Post excerp limit
 */
function my_excerpt_length($length){ return 32; } 
add_filter( 'excerpt_length','my_excerpt_length' );

function wpdocs_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

/**
 * `Allow CSV and other file upload
 */
add_filter('upload_mimes', function ( $mimes ) {
	$mimes['*'] = 'text/plain';
	return $mimes;
});

add_filter( 'wp_check_filetype_and_ext', function ( $types, $file, $filename, $mimes) {
	# If filename doesn't containg a dot '.', allow upload
	if( false === strpos( $filename, '.' ) ) {
		$types['ext'] = '*';
		$types['type'] = 'text/plain';
	}
	return $types;
}, 10, 4 );

/**
 * Fix Shortcodes for block admin Global!!!
 */
add_filter('render_block_data', function($parsed_block) {
	if (isset($parsed_block['innerContent'])) {
		foreach ($parsed_block['innerContent'] as &$innerContent) {
			if (empty($innerContent)) {
				continue;
			}

			$innerContent = do_shortcode($innerContent);
		}
	}

	if (isset($parsed_block['innerBlocks'])) {
		foreach ($parsed_block['innerBlocks'] as $key => &$innerBlock) {
			if (! empty($innerBlock['innerContent'])) {
				foreach ($innerBlock['innerContent'] as &$innerContent) {
					if (empty($innerContent)) {
						continue;
					}

					$innerContent = do_shortcode($innerContent);
				}
			}
		}
	}

	return $parsed_block;
}, 10, 1);

/**
 * Remove template ID's from group blocks
 */
remove_filter( 'render_block', 'wp_render_layout_support_flag', 10, 2 );
remove_filter( 'render_block', 'gutenberg_render_layout_support_flag', 10, 2 );

/**
 * Register DP Theme patterns categories
 */
register_block_pattern_category('dp-patterns', array( 'label' => __( '| * DP Custom * |', 'dp' )));
register_block_pattern_category('dp-patterns-main', array( 'label' => __( '| * DP Main * |', 'dp' )));

/**
 * Register DP Default Menus
 */
function dp_menus() {
	$locations = array(
		'dp-header-menu'   => __( 'Header Menu', 'dp' ),
		'dp-footer-menu'  => __( 'Footer Menu', 'dp' ),
	);
	register_nav_menus( $locations );
}
add_action( 'init', 'dp_menus' );

// include_once 'wp-nav-walker.php'; // => Add WP Bootstrap 5 Menu Walker support

/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
	// require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
	require_once get_template_directory() . '/inc/wp-nav-walker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

/**
 * Custom CSS Theme Options Visual Code Editor
 */
function custom_admin_js() {
	echo "<link rel='stylesheet' href='". get_stylesheet_directory_uri() ."/inc/libraries/codemirror/lib/codemirror.css'>";
	echo "<link rel='stylesheet' href='". get_stylesheet_directory_uri() ."/inc/libraries/codemirror/theme/dracula.css'>";
	echo "<script src='". get_stylesheet_directory_uri() ."/inc/libraries/codemirror/lib/codemirror.js'></script>";
	echo "<script src='". get_stylesheet_directory_uri() ."/inc/libraries/codemirror/mode/sass/sass.js'></script>";
	echo "<script src='". get_stylesheet_directory_uri() ."/inc/libraries/codemirror/mode/css/css.js'></script>";
	echo "<script type='text/javascript'>
		var myCodeMirror = CodeMirror.fromTextArea(document.getElementById('acf-field_custom-options_scss_block'), {
			lineNumbers: true,
			theme: 'dracula',
			mode:  'css'
		});
		var myCodeMirror = CodeMirror.fromTextArea(document.getElementById('acf-field_custom-options_meta_header'), {
			lineNumbers: true,
			theme: 'dracula',
			mode:  'css'
		});
		var myCodeMirror = CodeMirror.fromTextArea(document.getElementById('acf-field_custom-options_sc_footer'), {
			lineNumbers: true,
			theme: 'dracula',
			mode:  'css'
		});
	</script>";
}
global $pagenow;
if ( (function_exists('acf_add_options_page')) && ( $pagenow == 'admin.php' ) ):
	add_action('admin_footer', 'custom_admin_js');
endif;

$admin_url = get_site_url(null, '/wp-admin/admin.php?page=acf-options', 'https');

if( function_exists('acf_add_options_page') && $admin_url ) {
	add_action('admin_footer', 'custom_admin_js');
}

// WP core warnings FIX
add_filter('theme_file_path', function($path, $file) {
    if($file === 'theme.json') {
        return false;
    }
    return $path;
}, 0, 2);

// Woo Add sort by title
function add_custom_sorting_options( $options ){
	
	$options[ 'title' ] = 'Sort alphabetically';
	$options[ 'in-stock' ] = 'Show products in stock first';
	
	return $options;
}
add_filter( 'woocommerce_catalog_orderby', 'add_custom_sorting_options' );
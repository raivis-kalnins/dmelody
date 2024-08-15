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

// Include Woocommerce
if (class_exists('Woocommerce')) {
	require get_stylesheet_directory() . '/inc/woo/functions.php';
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
* Change number of products that are displayed per page (shop page "Covers")
*/
function q_loop_shop_per_page( $cols ) {
	// $cols contains the current number of products per page based on the value stored on Options -> Reading
	// Return the number of products you wanna show per page.
	$cols = 8;
	return $cols;
}
add_filter( 'loop_shop_per_page', 'q_loop_shop_per_page', 20 );

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
 * Conditionally Override Yoast SEO Breadcrumb Trail
 * http://plugins.svn.wordpress.org/wordpress-seo/trunk/frontend/class-breadcrumbs.php
 * -----------------------------------------------------------------------------------
 */
function override_yoast_breadcrumb_trail( $links ) {
	global $post;
	if ( is_home() || is_singular( 'post' ) || is_archive() ) {
		$breadcrumb[] = array(
			'url' => get_permalink( get_page_by_title('blog') ),
			'text' => 'Blog',
		);
		array_splice( $links, 1, -2, $breadcrumb );
	}
	return $links;
}
add_filter( 'wpseo_breadcrumb_links', 'override_yoast_breadcrumb_trail' );

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

// Add the child theme patterns if they exist.
// if ( file_exists( get_stylesheet_directory() . '/inc/patterns.php' ) ) {
// 	require_once get_stylesheet_directory() . '/inc/patterns.php';
// }

/**
 * Register DP Theme patterns categories
 */


/**
 * Register pattern categories.
 */

 if ( ! function_exists( 'dp_pattern_categories' ) ) :
	/**
	 * Register pattern categories
	 *
	 */
	function dp_pattern_categories() {
		register_block_pattern_category('dp-patterns', array( 'label' => __( '| * DP Custom * |', 'dp' )));
		register_block_pattern_category('dp-patterns-main', array( 'label' => __( '| * DP Main * |', 'dp' )));
	}
endif;

add_action( 'init', 'dp_pattern_categories' );

// Add support for block styles.
add_theme_support( 'wp-block-styles' );

// Enqueue editor styles.
add_editor_style( 'style.css' );

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

	echo '	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/6.65.7/codemirror.min.css" integrity="sha512-uf06llspW44/LZpHzHT6qBOIVODjWtv4MxCricRxkzvopAlSWnTf6hpZTFxuuZcuNE9CBQhqE0Seu1CoRk84nQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/6.65.7/theme/dracula.min.css" integrity="sha512-gFMl3u9d0xt3WR8ZeW05MWm3yZ+ZfgsBVXLSOiFz2xeVrZ8Neg0+V1kkRIo9LikyA/T9HuS91kDfc2XWse0K0A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
			<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/6.65.7/codemirror.min.js" integrity="sha512-8RnEqURPUc5aqFEN04aQEiPlSAdE0jlFS/9iGgUyNtwFnSKCXhmB6ZTNl7LnDtDWKabJIASzXrzD0K+LYexU9g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/6.65.7/mode/sass/sass.min.js" integrity="sha512-KX6urL7liHg1q4mBDqbaX4WGbiTlW0a4L6gwr6iBl2AUmf3n+/L0ho5mf7zJzX8wHCv6IpDbcwVQ7pKysReD8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/6.65.7/mode/css/css.min.js" integrity="sha512-rQImvJlBa8MV1Tl1SXR5zD2bWfmgCEIzTieFegGg89AAt7j/NBEe50M5CqYQJnRwtkjKMmuYgHBqtD1Ubbk5ww==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>';
	
	echo "<script type='text/javascript'>
				if( document.body.classList.contains('toplevel_page_acf-options') ) {
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
				}
			</script>";
}
if( function_exists('acf_add_options_page') ) {
	add_action('admin_footer', 'custom_admin_js');
}

// Woo Add sort by title
function add_custom_sorting_options( $options ){
	
	$options[ 'title' ] = 'Sort alphabetically';
	$options[ 'in-stock' ] = 'Show products in stock first';
	
	return $options;
}
add_filter( 'woocommerce_catalog_orderby', 'add_custom_sorting_options' );

function combine_json_files_on_setup() {
    function combine_json_files( $input_files = array(), $output_path ) {
        $contents = [];
        foreach ( $input_files as $input_file ) {
            $contents = array_replace_recursive( $contents, json_decode( file_get_contents( $input_file ), true ) );
        }
        file_put_contents( $output_path, json_encode( $contents, JSON_PRETTY_PRINT ) );
    }

    combine_json_files(
        [
            get_theme_file_path( 'json-parts/version.json' ),
            // get_theme_file_path( 'json-parts/customTemplates.json' ),
            get_theme_file_path( 'json-parts/theme-settings.json' ),
            get_theme_file_path( 'json-parts/styles.json' ),
        ],
        get_theme_file_path( 'theme.json' )
    );
}
add_action( 'after_setup_theme', 'combine_json_files_on_setup' );

/**
 * Display Variations as Radio Buttons
 */
function dp_radio_variations( $html, $args ) {

	// in wc_dropdown_variation_attribute_options() they also extract all the array elements into variables
	$options   = $args[ 'options' ];
	$product   = $args[ 'product' ];
	$attribute = $args[ 'attribute' ];
	$name      = $args[ 'name' ] ? $args[ 'name' ] : 'attribute_' . sanitize_title( $attribute );
	$id        = $args[ 'id' ] ? $args[ 'id' ] : sanitize_title( $attribute );
	$class     = $args[ 'class' ];

	if( empty( $options ) || ! $product ) {
		return $html;
	}
	
	// HTML for our radio buttons
	$radios = '<div class="dp-variation-radios" id="attribute_' .$id.'">';

	// taxonomy-based attributes
	if( taxonomy_exists( $attribute ) ) {

		$terms = wc_get_product_terms(
			$product->get_id(),
			$attribute,
			array(
				'fields' => 'all',
			)
		);

		foreach( $terms as $term ) {
			if( in_array( $term->slug, $options, true ) ) {
				$radios .= "<input type=\"radio\" id=\"{$name}-{$term->slug}\" name=\"{$name}\" value=\"{$term->slug}\"" . checked( $args[ 'selected' ], $term->slug, false ) . "><label for=\"{$name}-{$term->slug}\">{$term->name}</label><br />";
			}
		}
	// individual product attributes
	} else {
		foreach( $options as $option ) {
			$checked = sanitize_title( $args[ 'selected' ] ) === $args[ 'selected' ] ? checked( $args[ 'selected' ], sanitize_title( $option ), false ) : checked( $args[ 'selected' ], $option, false );
			$radios .= "<input type=\"radio\" id=\"{$name}-{$option}\" name=\"{$name}\" value=\"{$option}\" id=\"{$option}\" {$checked}><label for=\"{$name}-{$option}\">{$option}</label>";
		}
	}
  
	$radios .= '</div>';

	return $html . $radios;
}
add_filter( 'woocommerce_dropdown_variation_attribute_options_html', 'dp_radio_variations', 20, 2 );
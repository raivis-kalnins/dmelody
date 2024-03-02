<?php
/**
 * Register the required plugins for this theme.
 */
require_once get_template_directory() . '/inc/plugins/activation/class-tgm-plugin-activation.php';

/**
 * Requeired & Recommended plugins
 */
function dp_register_required_plugins() {
	/*
	* Array of plugin arrays. Required keys are name and slug.
	* If the source is NOT from the .org repo, then source is also required.
	*/
	$plugins = array(

		array(
			'name'               => 'ACF Pro', // The plugin name.
			'slug'               => 'advanced-custom-fields-pro', // The plugin slug (typically the folder name).
			'source'             => get_template_directory() . '/inc/plugins/advanced-custom-fields-pro.zip', // The plugin source.
			'required'           => false, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),

		array(
			'name'        	=> 'DP Blocks',
			'slug'        	=> 'dp-blocks',
			'source'       	=> 'https://github.com/The-Fuel-Agency/dp-blocks/archive/refs/heads/master.zip',
			'required'     	=> true,
			//'version'     	=> '1.0.0',
			'external_url' 	=> 'https://github.com/The-Fuel-Agency',
		),

		array(
			'name'        	=> 'WooCommerce',
			'slug'        	=> 'woocommerce',
			'source'       	=> 'https://downloads.wordpress.org/plugin/woocommerce.8.3.1.zip',
			'required'     	=> false,
			'external_url' 	=> 'https://en-gb.wordpress.org/plugins/woocommerce/',
		),

		array(
			'name'        	=> 'WooCommerce Wishlist',
			'slug'        	=> 'yith-woocommerce-wishlist',
			'source'       	=> 'https://downloads.wordpress.org/plugin/yith-woocommerce-wishlist.3.27.0.zip',
			'required'     	=> false,
			'external_url' 	=> 'https://en-gb.wordpress.org/plugins/yith-woocommerce-wishlist/',
		),

		array(
			'name'        	=> 'WordPress SEO by Yoast',
			'slug'        	=> 'wordpress-seo',
			'source'       	=> 'https://downloads.wordpress.org/plugin/wordpress-seo.21.6.zip',
			'required'     	=> true,
			'external_url' 	=> 'https://en-gb.wordpress.org/plugins/contact-form-7/',
		),

		array(
			'name'        	=> 'All-in-One WP Migration',
			'slug'        	=> 'all-in-one-wp-migration',
			'source'       	=> 'https://downloads.wordpress.org/plugin/all-in-one-wp-migration.7.79.zip',
			'required'     	=> false,
			'external_url' 	=> 'https://servmask.com/',
		),

		array(
			'name'			=> 'All-in-One Pro Extension',
			'slug'			=> 'all-in-one-wp-migration-unlimited-extension', // The plugin slug (typically the folder name).
			'source'		=> get_template_directory() . '/inc/plugins/all-in-one-wp-migration-unlimited-extension.zip', // The plugin source.
			'required'		=> false, // If false, the plugin is only 'recommended' instead of required.
		),

		array(
			'name'         => 'Contact Form 7',
			'slug'         => 'contact-form-7',
			'source'       => 'https://downloads.wordpress.org/plugin/contact-form-7.5.5.6.1.zip',
			'required'     => false,
			'external_url' => 'https://en-gb.wordpress.org/plugins/contact-form-7/',
		),

		array(
			'name'        	=> 'WP Rocket',
			'slug'        	=> 'wp-rocket',
			'source'       	=> get_template_directory() . '/inc/plugins/wp-rocket.zip',
			'required'     	=> false,
			'external_url' 	=> 'https://github.com/The-Fuel-Agency',
		),

		array(
			'name'        	=> 'EWWW Image Optimizer',
			'slug'        	=> 'ewww-image-optimizer',
			'source'       	=> 'https://downloads.wordpress.org/plugin/ewww-image-optimizer.7.2.1.zip',
			'required'     	=> false,
			'external_url' 	=> 'https://en-gb.wordpress.org/plugins/ewww-image-optimizer/',
		),

		array(
			'name'        	=> 'Wordfence Security',
			'slug'        	=> 'wordfence',
			'source'       	=> 'https://downloads.wordpress.org/plugin/wordfence.7.11.0.zip',
			'required'     	=> true,
			'external_url' 	=> 'https://en-gb.wordpress.org/plugins/wordfence/',
		),

		array(
			'name'        	=> 'hCaptcha',
			'slug'        	=> 'hcaptcha-for-forms-and-more',
			'source'       	=> 'https://downloads.wordpress.org/plugin/hcaptcha-for-forms-and-more.3.4.1.zip',
			'required'     	=> false,
			'external_url' 	=> 'https://en-gb.wordpress.org/plugins/hcaptcha-for-forms-and-more/',
		),

		array(
			'name'        	=> 'GDPR Cookie Compliance',
			'slug'        	=> 'gdpr-cookie-compliance',
			'source'       	=> 'https://downloads.wordpress.org/plugin/gdpr-cookie-compliance.4.12.8.zip',
			'required'     	=> true,
			'external_url' 	=> 'https://en-gb.wordpress.org/plugins/gdpr-cookie-compliance/',
		),

		array(
			'name'        	=> 'WP Statistics',
			'slug'        	=> 'wp-statistics',
			'source'       	=> 'https://downloads.wordpress.org/plugin/wp-statistics.14.2.zip',
			'required'     	=> false,
			'external_url' 	=> 'https://en-gb.wordpress.org/plugins/wp-statistics/',
		),

		array(
			'name'        	=> 'Analytify – Google Analytics',
			'slug'        	=> 'wp-analytify',
			'source'       	=> 'https://downloads.wordpress.org/plugin/wp-analytify.5.2.0.zip',
			'required'     	=> false,
			'external_url' 	=> 'https://en-gb.wordpress.org/plugins/wp-analytify/',
		),

		array(
			'name'        	=> 'Analytify – Dashboard',
			'slug'        	=> 'analytify-analytics-dashboard-widget',
			'source'       	=> 'https://downloads.wordpress.org/plugin/analytify-analytics-dashboard-widget.5.1.0.zip',
			'required'     	=> false,
			'external_url' 	=> 'https://en-gb.wordpress.org/plugins/analytify-analytics-dashboard-widget/',
		),

		array(
			'name'        	=> 'Polylang',
			'slug'        	=> 'polylang',
			'source'       	=> 'https://downloads.wordpress.org/plugin/polylang.3.5.2.zip',
			'required'     	=> false,
			'external_url' 	=> 'https://en-gb.wordpress.org/plugins/simple-custom-post-order/',
		),

		array(
			'name'        	=> 'Simple Custom Post Order',
			'slug'        	=> 'simple-custom-post-order',
			'source'       	=> 'https://downloads.wordpress.org/plugin/simple-custom-post-order.2.5.7.zip',
			'required'     	=> false,
			'external_url' 	=> 'https://en-gb.wordpress.org/plugins/better-search-replace/',
		),

		array(
			'name'        	=> 'WhatsApp Chat',
			'slug'        	=> 'wp-whatsapp-chat',
			'source'       	=> 'https://downloads.wordpress.org/plugin/wp-whatsapp-chat.7.1.9.zip',
			'required'     	=> false,
			'external_url' 	=> 'https://en-gb.wordpress.org/plugins/wp-whatsapp-chat/',
		),

		/*
		* => Only when needed for Devs!
		*/

		// array(
		// 	'name'        	=> 'Redirection',
		// 	'slug'        	=> 'redirection',
		// 	'source'       	=> 'https://downloads.wordpress.org/plugin/redirection.5.3.10.zip',
		// 	'required'     	=> false,
		// 	'external_url' 	=> 'https://en-gb.wordpress.org/plugins/redirection/',
		// ),

		// array(
		// 	'name'        	=> 'Duplicate Page',
		// 	'slug'        	=> 'duplicate-page',
		// 	'source'       	=> 'https://downloads.wordpress.org/plugin/duplicate-page.zip',
		// 	'required'     	=> false,
		// 	'external_url' 	=> 'https://en-gb.wordpress.org/plugins/duplicate-page/',
		// ),

		// array(
		// 	'name'        	=> 'Better Search Replace',
		// 	'slug'        	=> 'better-search-replace',
		// 	'source'       	=> 'https://downloads.wordpress.org/plugin/better-search-replace.zip',
		// 	'required'     	=> false,
		// 	'external_url' 	=> 'https://en-gb.wordpress.org/plugins/better-search-replace/',
		// ),

		// array(
		// 	'name'        	=> 'Media Sync',
		// 	'slug'        	=> 'media-sync',
		// 	'source'       	=> 'https://downloads.wordpress.org/plugin/media-sync.zip',
		// 	'required'     	=> false,
		// 	'external_url' 	=> 'https://en-gb.wordpress.org/plugins/media-sync/',
		// ),

		// array(
		// 	'name'        	=> 'Post Type Switcher',
		// 	'slug'        	=> 'post-type-switcher',
		// 	'source'       	=> 'https://downloads.wordpress.org/plugin/post-type-switcher.zip',
		// 	'required'     	=> false,
		// 	'external_url' 	=> 'https://en-gb.wordpress.org/plugins/post-type-switcher/',
		// ),

		// array(
		// 	'name'      => 'BuddyPress',
		// 	'slug'      => 'buddypress',
		// 	'required'  => false,
		// ),

	);

	/*
	* Array of configuration settings. Amend each line as needed.
	*/
	$config = array(
		'id'           => 'dp',                 	// Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      	// Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', 	// Menu slug.
		'parent_slug'  => 'themes.php',            	// Parent menu slug.
		'capability'   => 'edit_theme_options',    	// Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    	// Show admin notices or not.
		'dismissable'  => true,                    	// If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      	// If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   	// Automatically activate plugins after installation or not.
		'message'      => '',                      	// Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}

add_action( 'tgmpa_register', 'dp_register_required_plugins' );
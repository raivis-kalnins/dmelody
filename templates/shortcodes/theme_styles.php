<?php
	// Add short code testimonials loop [theme-settings]
	function theme_stylesShortcode() {

		/**
		 * Getting img value from admin side
		 */

		 $theme_settings_img = get_fields('options')['img_border'];


		$styles = array (

			'styles' => array (

				'blocks'	=> array (

					'core/image'	=>	array (

						'border' 	=>	array (
							'color' 	=> true,
							'style'		=> true,
							'width'		=> true,
							'radius'	=> $theme_settings_img . 'px',
						)

					),

				),
				// 'elements'	=> array (

				// 	'link'			=> [
				// 		'typography'	=> array (
				// 			"textDecoration" => "none",
							
				// 		),
				// 		'color' 	=> array (
				// 			'text' 	=> '#dd3333',
				// 		),
				// 		':hover' 		=> array (
				// 			'typography'	=> array (
				// 				"textDecoration" => "underline"
				// 			),
				// 			'color' 	=> array (
				// 				'text' 	=> '#dd3333'
				// 			),
				// 		)
				// 	],

				// )

			)

		);

		$json = json_encode($styles);

		return $file_json = file_put_contents(get_template_directory() . "/json-parts/styles.json", $json);

	}
	add_shortcode('theme-styles', 'theme_stylesShortcode');
?>
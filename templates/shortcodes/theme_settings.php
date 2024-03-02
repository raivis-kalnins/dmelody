<?php


	/**
	 * convert hex code color in rgb code color
	 */
	function hex2rgb($color) {
		$color = preg_replace("/[^0-9A-Fa-f]/", '', $color);
		list($r, $g, $b) = array($color[0].$color[1],$color[2].$color[3],$color[4].$color[5]);
		$r = hexdec($r); $g = hexdec($g); $b = hexdec($b);
		$solution =  $r. ',' . $g. ',' . $b;
		return $solution;
	}

	/**
	 * generate slug from title string
	 */
	 function slugify($text, string $divider = '-') {
		// replace non letter or digits by divider
		$text = preg_replace('~[^\pL\d]+~u', $divider, $text);

		// transliterate
		$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

		// remove unwanted characters
		$text = preg_replace('~[^-\w]+~', '', $text);

		// trim
		$text = trim($text, $divider);

		// remove duplicate divider
		$text = preg_replace('~-+~', $divider, $text);

		// lowercase
		$text = strtolower($text);

		if (empty($text)) {
			return 'n-a';
		}

		return $text;
	}

	// Add short code testimonials loop [theme-settings]
	function theme_settingsShortcode() {

		$theme_settings_grid = get_fields('options')['grid_size'] ?? '';
		$theme_settings_colours = get_fields('options')['color_list'] ?? '';  //repeater
		$theme_settings_gradient = get_fields('options')['gradient_list'] ?? '';  //repeater
		$theme_settings_s_font = get_fields('options')['body_size_s'] ?? '';
		$theme_settings_m_font = get_fields('options')['body_size_m'] ?? '';
		$theme_settings_l_font = get_fields('options')['body_size_l'] ?? '';
		$theme_settings_xl_font = get_fields('options')['body_size_xl'] ?? '';
		$theme_settings_gradients = get_fields('options')['gradient_list'] ?? ''; //repeater
		$theme_settings_duotones = get_fields('options')['duotone_list'] ?? ''; //repeater

		/**
		 * Theme Base Colours -- Repeater
		 */

		 if(is_iterable($theme_settings_colours)):

			foreach( $theme_settings_colours as $theme_settings_colour ) :
				$colour_name = $theme_settings_colour["col_name"] ?? '';
				$colour_code = $theme_settings_colour["col_code"] ?? '';
				$coloursLoop[] = 	array (
										"color"		=> $colour_code,
										"name"		=> $colour_name,
										"slug"		=> strtolower($colour_name)
									);
			endforeach;

		endif;

		


		/**
		 * Theme Gradient Colours -- Repeater
		 */

		 if(is_iterable($theme_settings_gradients)):

			foreach( $theme_settings_gradients as $theme_settings_gradient ) :

				$gradient_name = $theme_settings_gradient["gradient_name"] ?? '';
				$gradient_dir = $theme_settings_gradient["gradient_dir"] ?? '';
				$gradient_col1 = $theme_settings_gradient["gradient_col_base"] ?? '';
				$gradient_deg1 = $theme_settings_gradient["gradient_deg_base"] ?? '';
				$gradient_repeaters = $theme_settings_gradient["colour_gradient_list"] ?? '';
				$adding_colours = '';

				foreach( $gradient_repeaters as $gradient_repeater ) :
					$gradient_extra_colour = $gradient_repeater["gradient_col"] ?? '';
					$gradient_extra_deg = $gradient_repeater["gradient_deg"] ?? '';
					//, rgb(". hex2rgb($gradient_col2) .") ". $gradient_deg2 ."%
					$adding_colours .= ', rgb('. hex2rgb($gradient_extra_colour) .') '. $gradient_extra_deg .'%' ?? '';
				endforeach;

				$gradient_slug = slugify($gradient_name);

				$gradientLoop[] = 	array (
					"slug"		=> $gradient_slug,
					"gradient"		=> "linear-gradient(". $gradient_dir .",rgb(". hex2rgb($gradient_col1) .") ". $gradient_deg1 ."%" . $adding_colours .")",
					"name"		=> $gradient_name
				) ?? '';
			endforeach;

		endif;

		/**
		 * Theme Duotone Colours -- Repeater
		 */

		if(is_iterable($theme_settings_duotones)):

			foreach( $theme_settings_duotones as $theme_settings_duotone ) :
				
				$colour_name = $theme_settings_duotone["duo_name"] ?? '';
				$colour_code_1 = $theme_settings_duotone["duo_code_1"] ?? '';
				$colour_code_2 = $theme_settings_duotone["duo_code_2"] ?? '';
				$duotoneLoop[] = 	array (
										"colors"		=> [$colour_code_1, $colour_code_2],
										"name"		=> $colour_name,
										"slug"		=> slugify($colour_name)
									);
			endforeach;

		endif;

		/**
		 * Array to Json is generated below
		 */

		$settings = array (
			'settings' => array (
				'appearanceTools' 	=> true,
				'border'			=> array (
					'color'			=> true,
					'radius'		=> true,
					'width'			=> true,
					'style'			=> true
				),
				'color'				=> array (
					'link'			=> true,
					"duotone"		=> $duotoneLoop ?? '',
					'palette' 		=> $coloursLoop ?? '',
					'gradients' 	=> $gradientLoop ?? ''
				),
				'layout'		=> array (
					'contentSize'	=> '100%',
					'wideSize'		=> $theme_settings_grid . 'px'
				),
				'typography'	=> array (
					'fontSizes' 	=> [
						array (
							"slug"	=> "small",
							"size"	=> $theme_settings_s_font . 'px',
							"name"	=> "Small"
						),
						array (
							"slug"	=> "medium",
							"size"	=> $theme_settings_m_font . 'px',
							"name"	=> "Medium"
						),
						array (
							"slug"	=> "large",
							"size"	=> $theme_settings_l_font . 'px',
							"name"	=> "Large"
						),
						array (
							"slug"	=> "x-large",
							"size"	=> $theme_settings_xl_font . 'px',
							"name"	=> "X Large"
						)
					],
					'fontFamilies'	=> [
						array (
							'fontFamily'	=> "\"Bestermind Regular\", serif",
							'name'			=> "Bestermind Regular",
							'slug'			=> "bestermind-regular",
							'fontFace'	=>	[

								array (
									'fontFamily'	=>	"Bestermind Regular",
									'fontWeight'	=>	"400",
									'fontStyle'		=>	'normal',
									'fontStretch'	=>	'normal',
									'src'			=>	array(
										'file'	=>  './assets/fonts/bestermind/BestermindRegular.woff'
									)
								)
							]
						),
						array (
							'fontFamily'	=> "\"Avenir Roman\", serif",
							'name'			=> "Avenir Roman",
							'slug'			=> "avenir-roman",
							'fontFace'	=>	[

								array (
									'fontFamily'	=>	"Avenir Roman",
									'fontWeight'	=>	"400",
									'fontStyle'		=>	'normal',
									'fontStretch'	=>	'normal',
									'src'			=>	array(
										'file'	=>  './assets/fonts/avenir/Avenir-Roman.woff2'
									)
								)
							]
						)
					]
				),
			)
		);
		$json = json_encode($settings);
		return $file_json = file_put_contents(get_template_directory() . "/json-parts/theme-settings.json", $json);
	}
	add_shortcode('theme-settings', 'theme_settingsShortcode');
?>
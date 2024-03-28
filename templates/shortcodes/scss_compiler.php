<?php

	require_once get_template_directory() . '/inc/scssphp/scss.inc.php';
	use ScssPhp\ScssPhp\Compiler;

	function remove_spaces($string){
		$string = preg_replace("/\s{2,}/", " ", $string);
		$string = str_replace("\n", "", $string);
		$string = str_replace(', ', ",", $string);
		return $string;
	}

	function remove_css_comments($css){
		$file = preg_replace("/(\/\*[\w\'\s\r\n\*\+\,\"\-\.]*\*\/)/", "", $css);
		return $file;
	}


	// Add short code testimonials loop [theme-settings]
	function scss_compilerShortcode() {

		$block_area = get_fields('options')['scss_block'] ?? '';

		try {

			$compiler = new Compiler();

			$scss_file = $compiler->compileString($block_area)->getCss();

			$scss_file_nocomments = remove_spaces($scss_file);

			$scss_file_min = remove_spaces($scss_file_nocomments);

		} catch (\Exception $e) {

			echo '';
			syslog(LOG_ERR, 'scssphp: Unable to compile content');

		}


		return $file_json = file_put_contents(get_template_directory() . "/dist/scss/acf-theme-main.css", $scss_file_min);

	}
	
	add_shortcode('scss-compiler', 'scss_compilerShortcode');
?>
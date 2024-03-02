<?php
	// Add short code SEO Title for filter or other generated pages [seo-title]
	function heroCatShortcode() {
		$currentUrl = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$currentUrl = rtrim($currentUrl,"/");
		$seo = get_fields('options')['dp_seo_list'];
		$home_url = get_home_url();
		$title = get_the_title();

		foreach($seo as $id => $s) {
			$seo_url = $seo[$id]['dp_seo_url'] ?? '';
			$sUrl = $home_url.'/resources/machine-selector'.$seo_url.'';
			$seo_meta_title = $seo[$id]['dp_meta_title'] ?? '';
			$seo_h1_title = $seo[$id]['dp_seo_title'] ?? '';
			$seo_desc = $seo[$id]['dp_seo_desc'] ?? '';

			if ( $sUrl === $currentUrl ) {
				$loop =  $loop ?? '';
				$loop .='<h1 class="has-text-align-center wp-block-post-title">'.$seo_h1_title.'<br><span class="p">'.$seo_desc.'</span></h1><script>setTimeout(() => { document.title = "'.$seo_meta_title.'"; }, 100);</script>';
				return '<div class="seo-filter-wrap">'.$loop.'</div>';
			}
		}

		return '<h1 class="has-text-align-center wp-block-post-title">'.$title.'</h1>';
	}
	add_shortcode('seo-title', 'heroCatShortcode');
?>
<?php
	// Add short code Hero [hero_option]
	function heroOptShortcode() {
		$h = get_fields() ?? '';
		$hero_white = $h['truefalse_hero_white'] ?? '';
		$hero_title = $h['truefalse_hero_title'] ?? '';
		$hero_h1 = $h['hero_title'] ?? '';
		if ( !empty($hero_h1) ) { 
			$hero_t = '<h1 class="alignwide wp-block-post-title">'.$hero_h1.'</h1>'; 
		} else { 
			$hero_t = '<!-- wp:post-title {"level":1,"align":"wide","textColor":"white"} /-->';
		}
		$hero_btn = $h['hero_btn'] ?? '';
		if ( !empty($hero_btn) ) { 
			$hero_b = '<a href="'.$hero_btn['url'].'" target="'.$hero_btn['target'].'" class="btn btn-primary">'.$hero_btn['title'].'</a>'; 
		} else { 
			$hero_b = '';
		}
		$hero_desc = $h['hero_desc'] ?? '';
		if ( !empty($hero_desc) ) {
			$hero_d = '<!-- wp:dp/post-acf-field {"fieldName":"hero_desc"} /-->'; 
		} else { 
			$hero_d = '';
		}
		$h_default 	= '<!-- wp:group {"tagName":"section","className":"wp-block-group hero hero-default} -->
						<section class="wp-block-group hero hero-default">
							<!-- wp:group {"className":"container-boxed hero-wrap"} -->
							<div class="wp-block-group container-boxed hero-wrap">
								<!-- wp:dp/post-acf-field {"fieldName":"hero_section"} /-->'.$hero_t.''.$hero_d.''.$hero_b.'</div>
							<!-- /wp:group -->
						</section>
						<!-- /wp:group -->';
		$h_white 	= '<!-- wp:group {"tagName":"section","className":"wp-block-group hero hero-white"} -->
						<section class="wp-block-group hero hero-white">
							<!-- wp:group {"className":"container-boxed hero-wrap"} -->
							<div class="wp-block-group container-boxed hero-wrap">
							<!-- wp:dp/post-acf-field {"fieldName":"hero_section"} /-->'.$hero_t.''.$hero_d.''.$hero_b.'</div>
							<!-- /wp:group -->
						</section>
						<!-- /wp:group -->';
		if ( $hero_white == 'true' ) {
			return $h_white;
		} elseif ( $hero_title == 'true' ) {
			return '<!-- wp:group {"className":"hero hero-title"} -->
					<div class="wp-block-group hero hero-title">
						<!-- wp:group {"className":"container-boxed hero-wrap"} -->
						<div class="wp-block-group container-boxed hero-wrap">
							<!-- wp:dp/post-acf-field {"fieldName":"hero_section"} /-->'.$hero_t.''.$hero_d.''.$hero_b.'</div>
						<!-- /wp:group -->
					</div>
					<!-- /wp:group -->';
		} else {
			return $h_default;
		}
	}
	add_shortcode('hero_option', 'heroOptShortcode');
?>
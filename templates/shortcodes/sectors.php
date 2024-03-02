<?php
	// Add short code sectors loop [sectors]
	function sectorsShortcode() {
		// $url = home_url();
		$args = array(
			'post_type' => 'sectors',
			'post_status' => 'publish',
			'order' => 'ASC',
			// 'orderby' => 'title',
			'posts_per_page' => -1,
		);

		$the_query = new WP_Query( $args );

		$loop =  $loop ?? '';

		if ( $the_query->have_posts() ) {
			while ( $the_query->have_posts() ) {
				$the_query->the_post();

				$hero = get_fields();
				$description = $hero["hero_excerpt"] ?? '';

				$loop .='<div class="swiper-slide">
					<div class="sectors-list__item faux-link__element">
						<div class="sectors-list__item--image">'. get_the_post_thumbnail() .'</div>
						<div class="sectors-list__item--text h3">'. get_the_title() .'</div>
						<div class="sectors-list__item--desc">'. $description .'</div>
						<div class="sectors-list__item--link">Learn more</div>
						<div class="sectors-list__item--link"><a href="'. get_the_permalink() .'" class="faux-link__overlay-link">Learn more</a></div>
					</div>
				</div>';

			}
			/* Restore original Post Data */
			wp_reset_postdata();
		} else {
			// no posts found
		}

		return '<div class="sectors-slider swiper"><div class="sectors-list swiper-wrapper">'. $loop .'</div><div class="swiper-button-prev"></div><div class="swiper-button-next"></div></div></div>';

		// var_dump($image);
		// var_dump($title);
		// var_dump($description);
		// die();

		

	}
	add_shortcode('sectors', 'sectorsShortcode');
?>
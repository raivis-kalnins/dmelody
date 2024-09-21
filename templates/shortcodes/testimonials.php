<?php
	// Add short code testimonials loop [testimonials]
	function testimonialsShortcode() {
		
		$url = home_url();

		$testimonials = get_fields('options')['testimonials_list'];

		foreach( $testimonials as $testimonial ) :

			$img = $testimonial["testimonial_image"] ?? '';
			$icon = wp_get_attachment_image_src($img,'full') ?? '';
			$ico = $icon[0] ?? '';
			$text = $testimonial["testimonial_text"] ?? '';
            $name = $testimonial["testimonial_name"] ?? '';
            $role = $testimonial["testimonial_role"] ?? '';

			$loop =  $loop ?? '';

		    $loop .='<div class="swiper-slide">
						<div class="testimonials-list__item">
							<div class="testimonials-list__item--img"><img src="'. $ico .'" alt="'.$name.'"></div>
							<div class="testimonials-list__item--name p">'. $name .'</div>
							<div class="testimonials-list__item--text p">"'. wp_trim_words( $text, 95, '...' ) .'"</div>                            
                            <div class="testimonials-list__item--role">'. $role .'</div>
						</div>
					</div>';
		endforeach;

		return '<div class="testimonials-slider swiper">
					<div class="testimonials-list swiper-wrapper">'. $loop .'</div>
					<div class="testimonials-slider--nav"><div class="swiper-button-prev"></div><div class="swiper-pagination"></div><div class="swiper-button-next"></div></div>
					<!--<div class="wp-block-dp-button-boot"><a class="btn btn-primary" href="'. $url .'/feedback/">View all Feedback</a></div>-->
				</div>';
	}
	add_shortcode('testimonials', 'testimonialsShortcode');

	function testimonialsLvShortcode() {
		
		$url = home_url();

		$testimonials = get_fields('options_lv')['testimonials_list'];

		foreach( $testimonials as $testimonial ) :

			$img = $testimonial["testimonial_image"] ?? '';
			$icon = wp_get_attachment_image_src($img,'full') ?? '';
			$ico = $icon[0] ?? '';
			$text = $testimonial["testimonial_text"] ?? '';
            $name = $testimonial["testimonial_name"] ?? '';
            $role = $testimonial["testimonial_role"] ?? '';

			$loop =  $loop ?? '';

		    $loop .='<div class="swiper-slide">
						<div class="testimonials-list__item">
							<div class="testimonials-list__item--img"><img src="'. $ico .'" alt="'.$name.'"></div>
							<div class="testimonials-list__item--name p">'. $name .'</div>
							<div class="testimonials-list__item--text p">"'. wp_trim_words( $text, 95, '...' ) .'"</div>                            
                            <div class="testimonials-list__item--role">'. $role .'</div>
						</div>
					</div>';
		endforeach;

		return '<div class="testimonials-slider swiper">
					<div class="testimonials-list swiper-wrapper">'. $loop .'</div>
					<div class="testimonials-slider--nav"><div class="swiper-button-prev"></div><div class="swiper-pagination"></div><div class="swiper-button-next"></div></div>
					<!--<div class="wp-block-dp-button-boot"><a class="btn btn-primary" href="'. $url .'/feedback/">View all Feedback</a></div>-->
				</div>';
	}
	add_shortcode('testimonials_lv', 'testimonialsLvShortcode');
?>
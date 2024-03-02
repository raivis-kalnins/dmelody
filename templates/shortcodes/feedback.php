<?php
	// Add short code testimonials loop for [feedback]
	function feedbackShortcode() {

		$testimonials = get_fields('options')['testimonials_list'];

		foreach( $testimonials as $testimonial ) :

			$img = $testimonial["testimonial_image"] ?? '';
			$icon = wp_get_attachment_image_src($img,'full') ?? '';
			$ico = $icon[0] ?? '';
			$text = $testimonial["testimonial_text"] ?? '';
            $name = $testimonial["testimonial_name"] ?? '';
            $role = $testimonial["testimonial_role"] ?? '';
			$loop =  $loop ?? '';
		    $loop .='<div class="feedback__item col-12 col-lg-6">
						<div class="wrap-container">
							<div class="row">
								<div class="col col-2 feedback__item-icon">
									<div class="feedback__item--img col"><img src="'.$ico.'" alt="'.$name.'"></div>
								</div>
								<div class="col col-10 feedback__item-head">
									<div class="feedback__item--name h3 col col-9">'. $name .'</div>
									<div class="feedback__item--role col col-12">'. $role .'</div>
								</div>
								<div class="col col-12 feedback__item-head">
									<div class="feedback__item--text">'. $text .'</div>
								</div>
							</div>
						</div>
						
					</div>';
		endforeach;

		return '<div class="section__feedback_grid row" style="grid-row-gap: 40px;--bs-gutter-x: 40px;">'. $loop .'</div>';
	}
	add_shortcode('feedback', 'feedbackShortcode');
?>
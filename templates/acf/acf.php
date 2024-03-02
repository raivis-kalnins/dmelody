<?php
	/*
	* Flexible ACF layouts
	*/
	$flex_layouts = get_fields()['flex_layouts'];

	if( !empty( $flex_layouts ) ):

		echo '<div class="section_acf-flexible-items">';

		foreach( $flex_layouts as $layout ):

			// Fexible item variables
			$hero = $layout['hero-slider'] ?? '';
			$products = $layout['products'] ?? '';
			$related_posts = $layout['related-posts']['relationship_field_posts'] ?? '';
			$related_pages = $layout['related-pages']['relationship_field_pages'] ?? '';
			$gallery = $layout['photo_gallery'] ?? '';
			$accordion = $layout['accordion'] ?? '';
			$tabs = $layout['tabs_repeater'] ?? '';

			if( !empty( $hero ) ) :

				include 'flexible/hero-slider.php';

			elseif( !empty( $products ) ) :

				echo '<nav id="products-section-nav" class="products-section-nav container-fluid boxed row hidden"></nav>';

				include 'flexible/products.php';

			elseif( !empty( $related_posts ) ) :

				include 'flexible/related-posts.php';
			
			elseif( !empty( $related_pages ) ) :

				include 'flexible/related-pages.php';

			elseif( !empty( $gallery ) ) :

				include 'flexible/gallery.php';

			elseif( !empty( $accordion ) ) :

				include 'flexible/accordion.php';

			elseif( !empty( $tabs ) ) :

				include 'flexible/tabs.php';

			endif;

		endforeach;

		echo '</div>';

	endif;
?>

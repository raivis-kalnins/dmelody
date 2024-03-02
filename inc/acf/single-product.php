<?php
/**
 *  Single product details list- admin
 */

use StoutLogic\AcfBuilder\FieldsBuilder;

$product_builder = new FieldsBuilder( 'product_details' );

$product_builder
	//->addGallery('product_gallery', ['return_format' => 'id', 'label' => 'Gallery Images'])
	->addWysiwyg('competition_content')

->setLocation('post_type', '==', 'product');

add_action('acf/init', function() use ($product_builder) {
	acf_add_local_field_group( $product_builder->build() );
	//print_r($product_builder->build());
});
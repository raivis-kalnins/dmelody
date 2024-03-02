<?php
/**
 *  Hero - admin
 */
use StoutLogic\AcfBuilder\FieldsBuilder;

$header_menu = new FieldsBuilder( 'header_menu' );
$header_menu
	->addImage('menu_image', ['return_format' => 'id', 'wrapper' => ['width' => 100], 'label' => 'Image'])
	->setLocation( 'nav_menu_item', '==','location/dp-header-menu'); // for each menu item
add_action('acf/init', function() use ($header_menu) {
	acf_add_local_field_group( $header_menu->build() );
});

$mega_menu = new FieldsBuilder( 'mega_menu' );
$mega_menu

	->addTrueFalse('truefalse_megamenu', [
		'label' => 'Mega Menu',
		'instructions' => '',
		'required' => 0,
		'wrapper' => [
			'width' => '10',
			'class' => '',
			'id' => '',
		],
		'message' => '',
		'default_value' => 0,
		'ui' => 1,
		'ui_on_text' => '',
		'ui_off_text' => '',
	])

	->addTrueFalse('truefalse_stickyheader', [
		'label' => 'Sticky Header',
		'instructions' => '',
		'required' => 0,
		'wrapper' => [
			'width' => '10',
			'class' => '',
			'id' => '',
		],
		'message' => '',
		'default_value' => 0,
		'ui' => 1,
		'ui_on_text' => '',
		'ui_off_text' => '',
	])

	->addTrueFalse('truefalse_lastnavbtn', [
		'label' => 'Last Nav Item Button',
		'instructions' => '',
		'required' => 0,
		'wrapper' => [
			'width' => '10',
			'class' => '',
			'id' => '',
		],
		'message' => '',
		'default_value' => 0,
		'ui' => 1,
		'ui_on_text' => '',
		'ui_off_text' => '',
	])

	->addTrueFalse('truefalse_search', [
		'label' => 'Search',
		'instructions' => '',
		'required' => 0,
		'wrapper' => [
			'width' => '10',
			'class' => '',
			'id' => '',
		],
		'message' => '',
		'default_value' => 0,
		'ui' => 1,
		'ui_on_text' => '',
		'ui_off_text' => '',
	])

	->addTrueFalse('truefalse_user', [
		'label' => 'MyAccount',
		'instructions' => '',
		'required' => 0,
		'wrapper' => [
			'width' => '10',
			'class' => '',
			'id' => '',
		],
		'message' => '',
		'default_value' => 0,
		'ui' => 1,
		'ui_on_text' => '',
		'ui_off_text' => '',
	])

	->addTrueFalse('truefalse_wishlist', [
		'label' => 'Wishlist',
		'instructions' => '',
		'required' => 0,
		'wrapper' => [
			'width' => '10',
			'class' => '',
			'id' => '',
		],
		'message' => '',
		'default_value' => 0,
		'ui' => 1,
		'ui_on_text' => '',
		'ui_off_text' => '',
	])

	->addTrueFalse('truefalse_cart', [
		'label' => 'Cart',
		'instructions' => '',
		'required' => 0,
		'wrapper' => [
			'width' => '10',
			'class' => '',
			'id' => '',
		],
		'message' => '',
		'default_value' => 0,
		'ui' => 1,
		'ui_on_text' => '',
		'ui_off_text' => '',
	])

	->addTrueFalse('truefalse_light_dark', [
		'label' => 'Light/Dark',
		'instructions' => '',
		'required' => 0,
		'wrapper' => [
			'width' => '10',
			'class' => '',
			'id' => '',
		],
		'message' => '',
		'default_value' => 0,
		'ui' => 1,
		'ui_on_text' => '',
		'ui_off_text' => '',
	])

	->addTrueFalse('truefalse_lang', [
		'label' => 'Languages',
		'instructions' => '',
		'required' => 0,
		'wrapper' => [
			'width' => '10',
			'class' => '',
			'id' => '',
		],
		'message' => '',
		'default_value' => 0,
		'ui' => 1,
		'ui_on_text' => '',
		'ui_off_text' => '',
	])

	->setLocation( 'nav_menu', '==','location/dp-header-menu'); // for all menu

add_action('acf/init', function() use ($mega_menu) {
	acf_add_local_field_group( $mega_menu->build() );
});
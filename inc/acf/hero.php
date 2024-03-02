<?php
/**
 *  Hero - admin
 */
use StoutLogic\AcfBuilder\FieldsBuilder;
$hero = new FieldsBuilder( 'hero' );
$hero
	//->addText('hero_section', ['label' => 'Hero section pre title', 'wrapper' => ['width' => 25]])
	->addTrueFalse('truefalse_hero_white', ['label' => 'White Hero','instructions' => '','required' => 0,'default_value' => 0,'ui' => 1,'ui_on_text' => 'White','ui_off_text' => ' ', 'wrapper' => ['width' => 25]])
	->addTrueFalse('truefalse_hero_title', ['label' => 'Title Only Hero','instructions' => '','required' => 0,'default_value' => 0,'ui' => 1,'ui_on_text' => 'Title','ui_off_text' => ' ', 'wrapper' => ['width' => 25]])
	->addLink('hero_btn', ['label' => 'Hero Link', 'wrapper' => ['width' => 25]])
	->addText('hero_title', ['label' => 'Hero custom H1 title'])
	->addWysiwyg('hero_desc', ['label' => 'Hero description'])
	->addText('hero_excerpt', ['label' => 'Card Excerpt text'])
	->addText('card_excerpt', ['label' => 'Card Excerpt text for expand Cards'])
	->addImage('card_image', ['return_format' => 'id', 'label' => 'Card Image'])

	->setLocation('post_type', '==', 'page' && 'post');

add_action('acf/init', function() use ($hero) {
	acf_add_local_field_group( $hero->build() );
	//print_r($hero->build());
});
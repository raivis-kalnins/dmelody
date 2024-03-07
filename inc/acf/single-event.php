<?php
/**
 *  Single event details list- admin
 */

use StoutLogic\AcfBuilder\FieldsBuilder;

$event_builder = new FieldsBuilder( 'event_details' );

$event_builder
    ->addDatePicker('event_date', ['layout' => 'block', 'label' => 'Event Date', 'wrapper' => ['width' => 24]])
    ->addTimePicker('event_time', ['layout' => 'block', 'label' => 'Event Time', 'wrapper' => ['width' => 24]])
    ->addNumber('event_adult_price', ['layout' => 'block', 'label' => 'Price', 'wrapper' => ['width' => 24]])
    ->addNumber('event_child_price', ['layout' => 'block', 'label' => 'Children Price', 'wrapper' => ['width' => 24]])

->setLocation('post_type', '==', 'events');

add_action('acf/init', function() use ($event_builder) {
	acf_add_local_field_group( $event_builder->build() );
	//print_r($event_builder->build());
});
<?php
/**
 *  Single event details list- admin
 */

use StoutLogic\AcfBuilder\FieldsBuilder;

$event_builder = new FieldsBuilder( 'event_details' );

$event_builder
    ->addDatePicker('event_date', ['layout' => 'block', 'label' => 'Event Date', 'wrapper' => ['width' => 16.5]])
    ->addTimePicker('event_time', ['layout' => 'block', 'label' => 'Event Time', 'wrapper' => ['width' => 16.5]])
    ->addNumber('event_adult_price', ['layout' => 'block', 'label' => 'Price', 'wrapper' => ['width' => 16.5]])
    ->addNumber('event_child_price', ['layout' => 'block', 'label' => 'Children Price', 'wrapper' => ['width' => 16.5]])
    ->addTrueFalse('event_soldout', ['label' => 'Dold Out','required' => 0,'default_value' => 0,'ui' => 1,'wrapper' => ['width' => 16.5]])
    ->addTrueFalse('event_done', ['label' => 'Done/Past','required' => 0,'default_value' => 0,'ui' => 1,'wrapper' => ['width' => 16.5]])

->setLocation('post_type', '==', 'events');

add_action('acf/init', function() use ($event_builder) {
	acf_add_local_field_group( $event_builder->build() );
	//print_r($event_builder->build());
});
<?php

if (function_exists('register_block_style')) {

	/**
     * Add styles to core blocks
     */

	// register_block_style('core/paragraph', [
    //     'name'         => 'intro',
    //     'label'        => 'Intro paragraph',
    //     'is_default'   => false,
    // ]);

	register_block_style('core/list', [
		'name'         => 'tick-list',
		'label'        => 'Tick List',
		'is_default'   => false,
	]);

    register_block_style('core/list', [
		'name'         => 'contact-details-white',
		'label'        => 'Contact White',
		'is_default'   => false,
	]);

	// register_block_style('core/navigation-link',[
    //     'name'         => 'nav-button',
    //     'label'        => 'Nav Button',
    //     'is_default'   => false,
    // ]);

	/**
     * Add styles to dp blocks
     */

    // register_block_style('dp/cta-card', [
    //     'name'         => 'cta-grey',
    //     'label'        => 'Grey card',
    //     'is_default'   => false,
    // ]);
}
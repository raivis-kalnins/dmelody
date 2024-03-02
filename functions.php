<?php
/*
 *  DP
 *  Custom functions, support, custom post types and more.
 */

foreach ( glob( __DIR__ . '/inc/*.php' ) as $filename ) :
	require_once $filename;
endforeach;
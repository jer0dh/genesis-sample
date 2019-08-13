<?php

// define bootstrap col's

// Title-area
add_filter( 'genesis_attr_title-area', function( $attributes ) {

	$attributes['class'] .= ' col-md-4 text-center text-md-left';

	return $attributes;
});

// Nav
add_filter( 'genesis_attr_nav-primary', function( $attributes ) {

	$attributes['class'] .= ' col-md-8 text-left text-md-right';

	return $attributes;
});



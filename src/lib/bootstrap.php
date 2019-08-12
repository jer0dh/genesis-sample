<?php
if( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

add_action( 'init', 'gdev_init_structural_wrap');

/**
 * Defines where structural wraps will occur in theme and adds filter to each to change markup to bootstrap wrap
 *
 *
 */
function gdev_init_structural_wrap() {

	$structural_wraps = array(
		'header',
		'menu-secondary',
		'site-inner',
		'footer-widgets',
		'footer'
	);

	$structural_wraps_with_col12 = array(
		'header',
		'menu-secondary',
		'site-inner',
		'footer'
	);

	add_theme_support( 'genesis-structural-wraps', $structural_wraps );

	foreach( $structural_wraps as $wrap ) {
		add_filter(  "genesis_structural_wrap-{$wrap}", 'gdev_structural_wrap', 15, 2 );
	}

	foreach( $structural_wraps_with_col12 as $wrap ) {
		add_filter( "genesis_structural_wrap-{$wrap}", 'gdev_structural_wrap_col12', 16, 2);
	}
}

/**
 * Adds opening or closing bootstrap wrap depending on $original_output
 *
 * @param $output
 * @param $original_output
 *
 * @return string
 */
function gdev_structural_wrap( $output, $original_output ) {

	switch ( $original_output ) {
		case 'open':
			$output = '<div class="container"><div class="row">';
			break;
		case 'close':
			$output = '</div></div>';
			break;
	}

	return $output;
}
/**
 * Adds col12 bootstrap wrap depending on $original_output
 *
 * @param $output
 * @param $original_output
 *
 * @return string
 */
function gdev_structural_wrap_col12( $output, $original_output ) {

	switch ( $original_output ) {
		case 'open':
			$output .= '<div class="col-12">';
			break;
		case 'close':
			$output .= '</div>';
			break;
	}

	return $output;
}

/**
 * For action hooks
 */

function gdev_add_structural_wrap_open() {
	echo gdev_structural_wrap('', 'open');
}

function gdev_add_structural_wrap_close() {
	echo gdev_structural_wrap('', 'close');
}

function gdev_add_structural_wrap_col12_open() {
	gdev_add_structural_wrap_open();
	echo '<div class="col-12">';
}

function gdev_add_structural_wrap_col12_close() {
	echo '</div>';
	gdev_add_structural_wrap_close();
}

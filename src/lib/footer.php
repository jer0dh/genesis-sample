<?php

/**
 * Filter to add classes to specific footer widgets.  Use switch on $column to alter classes on specific widgets
 */
add_filter( 'genesis_attr_footer-widget-area', 'gdev_attributes_footer_widget_area', 10, 3 );

function gdev_attributes_footer_widget_area( $attributes, $context, $args ) {

	$column = ! empty( $args['params'] ) && ! empty( $args['params']['column'] ) ? $args['params']['column'] : 0;

	$attributes['class'] .= ' mb-4';

	switch ($column) {
		case 0:
			break;
		case 1:
		case 2:
		case 3:
			$attributes['class'] .= ' col-12 col-md-3';
			break;
	}


	return $attributes;

}

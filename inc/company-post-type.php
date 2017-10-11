<?php

/*-------------------------------------*\
	COMPANY POST TYPE
\*-------------------------------------*/

add_action( 'init', 'create_company_post_type' );

function create_company_post_type() {
	$args = array(
		'description' => 'Company Post Type',
		'show_ui' => true,
		'menu_position' => 5,
		'exclude_from_search' => false,
		'labels' => array(
			'name'=> 'Companies',
			'singular_name' => 'Company',
			'add_new' => 'Add new company',
			'add_new_item' => 'Add new company',
			'edit' => 'Edit company',
			'edit_item' => 'Edit company',
			'new-item' => 'New company',
			'view' => 'View company',
			'view_item' => 'View company',
			'search_items' => 'Search companies',
			'not_found' => 'No companies found',
			'not_found_in_trash' => 'No companies found in the trash',
			'parent' => 'Parent company'
		),
		'public' => true,
		'has_archive' => true,
		'menu_icon'   => 'dashicons-building',
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => true,
		'supports' => array( 'editor', 'revisions', 'thumbnail', 'title' )
	);
	register_post_type( 'company' , $args );
}

function company_activate() {
	flush_rewrite_rules();
}

function company_deactivate() {
	flush_rewrite_rules();
}

register_activation_hook( __FILE__, 'company_activate' );
register_deactivation_hook( __FILE__, 'company_deactivate' );

function order_companies_random( $query ) {
	if ( !is_admin() && $query->is_main_query() && is_post_type_archive( 'company' ) ) {
		$query->set( 'orderby', 'rand' );
	}
}
add_action( 'pre_get_posts', 'order_companies_by_start_date' );

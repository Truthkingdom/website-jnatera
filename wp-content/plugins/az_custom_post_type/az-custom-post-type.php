<?php
/*
Plugin Name: AZ Custom Post Type
Plugin URI: http://www.alessioatzeni.com/
Description: Custom Post Type for Portfolio and Team for <strong>Alice Theme</strong> Only.
Author: Alessio Atzeni
Author URI: http://www.alessioatzeni.com
Version: 1.2
*/

// TRANSLATION
load_plugin_textdomain( 'textdomain', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

/*-----------------------------------------------------------------------------------*/
/*	Team Taxanomy
/*-----------------------------------------------------------------------------------*/
// Taxanomy Register
function az_team_register() {  
    	 
	$team_labels = array(
		'name' 			=> __( 'Team', 'taxonomy general name', 'textdomain' ),
		'singular_name' => __( 'Team Item', 'textdomain' ),
		'search_items' 	=> __( 'Search Team Item', 'textdomain' ),
		'all_items' 	=> __( 'Team', 'textdomain' ),
		'parent_item' 	=> __( 'Parent Team Item', 'textdomain' ),
		'edit_item' 	=> __( 'Edit Team Item', 'textdomain' ),
		'update_item' 	=> __( 'Update Team Item', 'textdomain' ),
		'add_new_item' 	=> __( 'Add New Team Item', 'textdomain' )
	);
	 
	$options_alice = get_option('alice');
	
	$custom_slug = null;		 
	if(!empty($options_alice['team_rewrite_slug'])) $custom_slug = $options_alice['team_rewrite_slug'];
	
	$args = array(
		'labels' 			 => $team_labels,
		'rewrite' 			 => array('slug' => $custom_slug,'with_front' => false),
		'singular_label' 	 => __('Person', 'textdomain'),
		'public' 			 => true,
		'publicly_queryable' => true,
		'show_ui' 			 => true,
		'hierarchical' 		 => false,
		'menu_position' 	 => 9,
		'menu_icon' 		 => plugins_url( 'img/icons/portfolio.png', __FILE__ ),
		'supports' 			 => array('title', 'editor', 'thumbnail', 'custom-fields', 'revisions', 'excerpt')  
	);
    register_post_type( 'team' , $args );
	
	$category_labels = array(
		'name' 			=> __( 'Disciplines', 'textdomain'),
		'singular_name' => __( 'Discipline', 'textdomain'),
		'search_items' 	=> __( 'Search Discipline', 'textdomain'),
		'all_items'	 	=> __( 'All Discipline', 'textdomain'),
		'parent_item' 	=> __( 'Parent Discipline', 'textdomain'),
		'edit_item' 	=> __( 'Edit Discipline', 'textdomain'),
		'update_item' 	=> __( 'Update Discipline', 'textdomain'),
		'add_new_item' 	=> __( 'Add New Discipline', 'textdomain'),
    	'menu_name' 	=> __( 'Disciplines', 'textdomain')
	); 	
	register_taxonomy('disciplines', 
		array('team'), 
		array(
			'hierarchical' 		=> true, 
			'labels' 			=> $category_labels,
			'show_ui' 			=> true,
			'show_admin_column' => true,
			'query_var' 		=> true,
			'rewrite' 			=> array( 'slug' => 'disciplines' )
		)
	);
	
	$attributes_labels = array(
		'name' 			=> __( 'Attributes', 'textdomain'),
		'singular_name' => __( 'Attribute', 'textdomain'),
		'search_items' 	=> __( 'Search Attributes', 'textdomain'),
		'all_items' 	=> __( 'All Attributes', 'textdomain'),
		'parent_item' 	=> __( 'Parent Attribute', 'textdomain'),
		'edit_item' 	=> __( 'Edit Attribute', 'textdomain'),
		'update_item' 	=> __( 'Update Attribute', 'textdomain'),
		'add_new_item' 	=> __( 'Add New Attribute', 'textdomain'),
		'new_item_name' => __( 'New Attribute', 'textdomain'),
		'menu_name' 	=> __( 'Attributes', 'textdomain')
	); 	
	
	register_taxonomy('attributes',
		array('team'),
		array(
			'hierarchical' 		=> true,
			'labels' 			=> $attributes_labels,
			'show_ui' 			=> true,
			'show_admin_column' => true,
			'query_var' 		=> true,
			'rewrite' 			=> array( 'slug' => 'attributes' )
		)
	);
}  
add_action('init', 'az_team_register');

// Include Team Single File
function az_include_template_team_function( $template_path ) {
if ( get_post_type() == 'team' ) {
	if ( is_single() ) {
		if ( $theme_file = locate_template( array ( 'single-team.php' ) ) ) {
			$template_path = $theme_file;
		} else {
			$template_path = plugin_dir_path( __FILE__ ) . '/single-team.php';
		}
	}
}
return $template_path;
}
add_filter( 'template_include', 'az_include_template_team_function', 1 );

// Add Columns to Team Edit Screen
function az_add_thumbnail_column( $columns ) {
	$column_thumbnail = array( 'thumbnail' => __('Thumbnail','textdomain' ) );
	$columns = array_slice( $columns, 0, 2, true ) + $column_thumbnail + array_slice( $columns, 1, NULL, true );
	return $columns;
}
function az_display_thumbnail( $column ) {
	global $post;
	switch ( $column ) {
		case 'thumbnail':
			echo get_the_post_thumbnail( $post->ID, array(50, 50) );
			break;
	}
}
add_filter( 'manage_edit-team_columns', 'az_add_thumbnail_column', 10, 1 );
add_action( 'manage_team_posts_custom_column', 'az_display_thumbnail', 10, 1 );

/*-----------------------------------------------------------------------------------*/
/*	Portfolio Taxanomy
/*-----------------------------------------------------------------------------------*/

// Taxanomy Register
function az_portfolio_register() {  
    	 
	$portfolio_labels = array(
		'name' 			=> __( 'Portfolio', 'taxonomy general name', 'textdomain'),
		'singular_name' => __( 'Portfolio Item', 'textdomain'),
		'search_items' 	=> __( 'Search Portfolio Item', 'textdomain'),
		'all_items' 	=> __( 'Portfolio', 'textdomain'),
		'parent_item' 	=> __( 'Parent Portfolio Item', 'textdomain'),
		'edit_item' 	=> __( 'Edit Portfolio Item', 'textdomain'),
		'update_item' 	=> __( 'Update Portfolio Item', 'textdomain'),
		'add_new_item' 	=> __( 'Add New Portfolio Item', 'textdomain')
	);
	 
	$options_alice = get_option('alice');
	
	$custom_slug = null;		 
	if(!empty($options_alice['portfolio_rewrite_slug'])) $custom_slug = $options_alice['portfolio_rewrite_slug'];

	$args = array(
		'labels' 			 => $portfolio_labels,
		'rewrite' 			 => array('slug' => $custom_slug,'with_front' => false),
		'singular_label' 	 => __('Project', 'textdomain'),
		'public' 			 => true,
		'publicly_queryable' => true,
		'show_ui' 			 => true,
		'hierarchical' 		 => false,
		'menu_position' 	 => 8,
		'menu_icon' 		 => plugins_url( 'img/icons/portfolio.png', __FILE__ ),
		'supports' 			 => array('title', 'editor', 'thumbnail', 'comments', 'custom-fields', 'revisions', 'excerpt')  
	);
    register_post_type( 'portfolio' , $args );
	
	$categories_portfolio_labels = array(
		'name' 			=> __( 'Project Categories', 'textdomain'),
		'singular_name' => __( 'Project Category', 'textdomain'),
		'search_items' 	=> __( 'Search Project Categories', 'textdomain'),
		'all_items' 	=> __( 'All Project Categories', 'textdomain'),
		'parent_item' 	=> __( 'Parent Project Category', 'textdomain'),
		'edit_item' 	=> __( 'Edit Project Category', 'textdomain'),
		'update_item' 	=> __( 'Update Project Category', 'textdomain'),
		'add_new_item' 	=> __( 'Add New Project Category', 'textdomain'),
		'menu_name' 	=> __( 'Project Categories', 'textdomain')
	); 	

	register_taxonomy('project-category', 
		array('portfolio'), 
		array(
			'hierarchical' 		=> true, 
			'labels' 			=> $categories_portfolio_labels,
			'show_ui' 			=> true,
			'show_admin_column' => true,
			'query_var' 		=> true,
			'rewrite' 			=> array( 'slug' => 'project-category' )
		)
	);
	
	$attributes_portfolio_labels = array(
		'name' 			=> __( 'Project Attributes', 'textdomain'),
		'singular_name' => __( 'Project Attribute', 'textdomain'),
		'search_items' 	=> __( 'Search Project Attributes', 'textdomain'),
		'all_items' 	=> __( 'All Project Attributes', 'textdomain'),
		'parent_item' 	=> __( 'Parent Project Attribute', 'textdomain'),
		'edit_item' 	=> __( 'Edit Project Attribute', 'textdomain'),
		'update_item' 	=> __( 'Update Project Attribute', 'textdomain'),
		'add_new_item' 	=> __( 'Add New Project Attribute', 'textdomain'),
		'new_item_name' => __( 'New Project Attribute', 'textdomain'),
		'menu_name' 	=> __( 'Project Attributes', 'textdomain')
	); 	
	
	register_taxonomy('project-attribute',
		array('portfolio'),
		array(
			'hierarchical' 		=> true,
			'labels' 			=> $attributes_portfolio_labels,
			'show_ui'			=> true,
			'show_admin_column' => true,
			'query_var' 		=> true,
			'rewrite' 			=> array( 'slug' => 'project-attribute' )
		)
	);  
}  
add_action('init', 'az_portfolio_register');

// Include Portfolio Single File
function az_include_template_portfolio_function( $template_path ) {
if ( get_post_type() == 'portfolio' ) {
	if ( is_single() ) {
		if ( $theme_file = locate_template( array ( 'single-portfolio.php' ) ) ) {
			$template_path = $theme_file;
		} else {
			$template_path = plugin_dir_path( __FILE__ ) . '/single-portfolio.php';
		}
	}
}
return $template_path;
}
add_filter( 'template_include', 'az_include_template_portfolio_function', 1 );

// Add Columns to Portfolio Edit Screen
function az_add_thumbnail_column_portfolio( $columns ) {
	$column_thumbnail = array( 'thumbnail' => __('Thumbnail','textdomain' ) );
	$columns = array_slice( $columns, 0, 2, true ) + $column_thumbnail + array_slice( $columns, 1, NULL, true );
	return $columns;
}
function az_display_thumbnail_portfolio( $column ) {
	global $post;
	switch ( $column ) {
		case 'thumbnail':
			echo get_the_post_thumbnail( $post->ID, array(50, 50) );
			break;
	}
}
add_filter( 'manage_edit-portfolio_columns', 'az_add_thumbnail_column_portfolio', 10, 1 );
add_action( 'manage_portfolio_posts_custom_column', 'az_display_thumbnail_portfolio', 10, 1 );

/*-----------------------------------------------------------------------------------*/
/*	Testimonial Taxanomy
/*-----------------------------------------------------------------------------------*/

// Taxanomy Register
function az_testimonials_register() {

	$testimonial_labels = array(
		'name' 			=> __( 'Testimonials', 'taxonomy general name', 'textdomain'),
		'singular_name' => __( 'Testimonial Item', 'textdomain'),
		'search_items' 	=> __( 'Search Testimonial Item', 'textdomain'),
		'all_items' 	=> __( 'Testimonials', 'textdomain'),
		'parent_item' 	=> __( 'Parent Testimonial Item', 'textdomain'),
		'edit_item' 	=> __( 'Edit Testimonial Item', 'textdomain'),
		'update_item' 	=> __( 'Update Testimonial Item', 'textdomain'),
		'add_new_item' 	=> __( 'Add New Testimonial Item', 'textdomain')
	);

	$args = array(
		'labels' 			 => $testimonial_labels,
		'rewrite' 			 => array('slug' => 'testimonial','with_front' => false),
		'singular_label' 	 => __('Testimonial', 'textdomain'),
		'public' 			 => true,
		'publicly_queryable' => true,
		'show_ui' 			 => true,
		'hierarchical' 		 => false,
		'menu_position' 	 => 7,
		'menu_icon' 		 => plugins_url( 'img/icons/portfolio.png', __FILE__ ),
		'supports' 			 => array('title', 'thumbnail')  
	);
	register_post_type( 'testimonial' , $args );

	$categories_testimonial_labels = array(
		'name' 			=> __( 'Testimonial Categories', 'textdomain'),
		'singular_name' => __( 'Testimonial Category', 'textdomain'),
		'search_items' 	=> __( 'Search Testimonial Categories', 'textdomain'),
		'all_items' 	=> __( 'All Testimonial Categories', 'textdomain'),
		'parent_item' 	=> __( 'Parent Testimonial Category', 'textdomain'),
		'edit_item' 	=> __( 'Edit Testimonial Category', 'textdomain'),
		'update_item' 	=> __( 'Update Testimonial Category', 'textdomain'),
		'add_new_item' 	=> __( 'Add New Testimonial Category', 'textdomain'),
		'menu_name' 	=> __( 'Testimonial Categories', 'textdomain')
	); 	

	register_taxonomy('testimonial-category', 
		array('testimonial'), 
		array(
			'hierarchical' 		=> true, 
			'labels' 			=> $categories_testimonial_labels,
			'show_ui' 			=> true,
			'show_admin_column' => true,
			'query_var' 		=> true,
			'rewrite' 			=> array( 'slug' => 'testimonial-category' )
		)
	);
}
add_action('init', 'az_testimonials_register');

// Add Columns to Testimonial Edit Screen
function az_add_thumbnail_column_testimonial( $columns ) {
	$column_thumbnail = array( 'thumbnail' => __('Thumbnail','textdomain' ) );
	$columns = array_slice( $columns, 0, 2, true ) + $column_thumbnail + array_slice( $columns, 1, NULL, true );
	return $columns;
}
function az_display_thumbnail_testimonial( $column ) {
	global $post;
	switch ( $column ) {
		case 'thumbnail':
			echo get_the_post_thumbnail( $post->ID, array(50, 50) );
			break;
	}
}
add_filter( 'manage_edit-testimonial_columns', 'az_add_thumbnail_column_testimonial', 10, 1 );
add_action( 'manage_testimonial_posts_custom_column', 'az_display_thumbnail_testimonial', 10, 1 );
    	 

/*-----------------------------------------------------------------------------------*/
/*	Clients Taxanomy
/*-----------------------------------------------------------------------------------*/

// Taxanomy Register
function az_clients_register() {  
    	 
	$client_labels = array(
		'name' 			=> __( 'Clients', 'taxonomy general name', 'textdomain'),
		'singular_name' => __( 'Client Item', 'textdomain'),
		'search_items' 	=> __( 'Search Client Item', 'textdomain'),
		'all_items' 	=> __( 'Clients', 'textdomain'),
		'parent_item' 	=> __( 'Parent Client Item', 'textdomain'),
		'edit_item' 	=> __( 'Edit Client Item', 'textdomain'),
		'update_item' 	=> __( 'Update Client Item', 'textdomain'),
		'add_new_item' 	=> __( 'Add New Client Item', 'textdomain')
	);
	
	$args = array(
		'labels' 		 	 => $client_labels,
		'rewrite' 		 	 => array('slug' => 'client','with_front' => false),
		'singular_label' 	 => __('Client', 'textdomain'),
		'public' 		 	 => true,
		'publicly_queryable' => true,
		'show_ui' 			 => true,
		'hierarchical' 		 => false,
		'menu_position' 	 => 6,
		'menu_icon' 		 => plugins_url( 'img/icons/portfolio.png', __FILE__ ),
		'supports'	 		 => array('title', 'thumbnail')  
	);
    register_post_type( 'client' , $args );

    $categories_client_labels = array(
		'name' 			=> __( 'Client Categories', 'textdomain'),
		'singular_name' => __( 'Client Category', 'textdomain'),
		'search_items' 	=> __( 'Search Client Categories', 'textdomain'),
		'all_items' 	=> __( 'All Client Categories', 'textdomain'),
		'parent_item' 	=> __( 'Parent Client Category', 'textdomain'),
		'edit_item' 	=> __( 'Edit Client Category', 'textdomain'),
		'update_item' 	=> __( 'Update Client Category', 'textdomain'),
		'add_new_item' 	=> __( 'Add New Client Category', 'textdomain'),
		'menu_name' 	=> __( 'Client Categories', 'textdomain')
	); 	

	register_taxonomy('client-category', 
		array('client'), 
		array(
			'hierarchical' 		=> true, 
			'labels' 			=> $categories_client_labels,
			'show_ui' 			=> true,
			'show_admin_column' => true,
			'query_var' 		=> true,
			'rewrite' 			=> array( 'slug' => 'client-category' )
		)
	);
}  
add_action('init', 'az_clients_register');

// Add Columns to Clients Edit Screen
function az_add_thumbnail_column_client( $columns ) {
	$column_thumbnail = array( 'thumbnail' => __('Thumbnail','textdomain' ) );
	$columns = array_slice( $columns, 0, 2, true ) + $column_thumbnail + array_slice( $columns, 1, NULL, true );
	return $columns;
}
function az_display_thumbnail_client( $column ) {
	global $post;
	switch ( $column ) {
		case 'thumbnail':
			echo get_the_post_thumbnail( $post->ID, array(50, 50) );
			break;
	}
}
add_filter( 'manage_edit-client_columns', 'az_add_thumbnail_column_client', 10, 1 );
add_action( 'manage_client_posts_custom_column', 'az_display_thumbnail_client', 10, 1 );

?>
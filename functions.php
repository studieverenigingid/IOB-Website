<?php
  // custom post types
  include 'inc/event-post-type.php';
  include 'inc/company-post-type.php';

  register_nav_menus( array(
    'primary' => 'Primary Menu'
  ) );

  add_action('init', 'modify_jquery');

  function custom_theme_setup() {
    add_theme_support( 'post-thumbnails' ); // Allow posts to have thumbnails
    add_theme_support( 'html5' ); // Make the search form input type="search"
    add_theme_support( 'title-tag' ); // Fix the document title tag
  }

  // Disable posts
  function remove_posts_menu() {
    remove_menu_page('edit.php');
  }
  add_action('admin_init', 'remove_posts_menu');

  /* Replace Wordpress’s version of jQuery with Google API version, since most
  browsers will have it in their cache. */

  function modify_jquery() {
    if (!is_admin()) {
      wp_deregister_script('jquery');
      wp_register_script('jquery',
      'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js',
      false, '3.1.1', true);
      wp_enqueue_script('jquery');
    }
  }

  /* Create a variable for the image folder, so you don’t have to PHP it every time, which would make your code significantly more ugly. */
	$img_folder = get_bloginfo('template_directory') . '/static/img/';

	/* Change max upload size for every installation where this theme is
		 installed */
	@ini_set( 'upload_max_size' , '64M' );
	@ini_set( 'post_max_size', '64M');
	@ini_set( 'max_execution_time', '300' );

?>

<?php
  // custom post types
  include 'inc/event-post-type.php';
  include 'inc/company-post-type.php';

  // Custom Fields
  include 'inc/front-page-custom-fields.php';
  include 'inc/event-custom-fields.php';
  include 'inc/event-custom-fields-speeddates.php';
  include 'inc/company-custom-fields.php';
  include 'inc/fair-custom-fields.php';
  include 'inc/dynamic-darken.php';
  include 'inc/contact-custom-fields.php';
  include 'inc/option-custom-fields.php';
  include 'inc/save-custom-css.php';

  // theme includes
  include 'inc/walkers.php';
  include 'inc/customizer.php';

  register_nav_menus( array(
    'primary-menu' => 'Primary Menu',
		'sitemap' => 'Footer Sitemap'
  ) );

  add_action( 'after_setup_theme', 'custom_theme_setup' );
  add_action('init', 'modify_jquery');
  add_action( 'customize_register', 'iob_customize_register' );
  add_action( 'wp_head', 'iob_customize_css');
  add_action( 'wp_ajax_nopriv_event_signup', 'event_signup');
  add_action( 'wp_ajax_event_signup', 'event_signup');

  function custom_theme_setup() {
    add_theme_support( 'post-thumbnails' ); // Allow posts to have thumbnails
    add_theme_support( 'html5' ); // Make the search form input type="search"
    add_theme_support( 'title-tag' ); // Fix the document title tag
  }

  // Add image sizes
  add_image_size( 'front-page-hero', 1920, 1080, true );

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

  function event_signup() {
		include 'inc/event-signup.php';
		wp_die();
	}

  /* Create a variable for the image folder, so you don’t have to PHP it every time, which would make your code significantly more ugly. */
	$img_folder = get_bloginfo('template_directory') . '/static/img/';

	/* Change max upload size for every installation where this theme is
		 installed */
	@ini_set( 'upload_max_size' , '64M' );
	@ini_set( 'post_max_size', '64M');
	@ini_set( 'max_execution_time', '300' );

?>

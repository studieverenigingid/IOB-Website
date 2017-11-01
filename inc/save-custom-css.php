<?php
  function generate_options_css() {
    $ss_dir = get_stylesheet_directory();
    ob_start();
    require($ss_dir . '/inc/custom-option-css.php');
    $css = ob_get_clean();
    file_put_contents($ss_dir . '/static/css/custom-options.css', $css, LOCK_EX);
  }
  add_action( 'acf/save_post', 'generate_options_css', 20 );

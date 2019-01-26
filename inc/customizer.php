<?php
  // Input Customize CSS

  function iob_customize_register( $wp_customize ) {
    //All our sections, settings, and controls will be added here
    $wp_customize->add_section('iob_colors', array(
      'title' => 'Theme Colors',
      'priority' => 30
    ));

    $wp_customize->add_setting( 'accent_color' , array(
      'default'   => '#31307D',
      'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_control( $wp_customize, 'iob_accent_color_control', array(
      'label' => 'Accent Color',
      'section' => 'iob_colors',
      'settings' => 'accent_color'
    )));

    $wp_customize->add_setting( 'accent--secondary_color' , array(
      'default'   => '#D8386C',
      'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_control( $wp_customize, 'iob_accent--secondary_color_control', array(
      'label' => 'Secondary Accent Color',
      'section' => 'iob_colors',
      'settings' => 'accent--secondary_color'
    )));
  }

  // Output Customize CSS

  function iob_customize_css() { ?>
    <style type="text/css">
      /* primary colors */
      .section__title__wrapper{background:<?= get_theme_mod('accent_color'); ?>}
      .button--light{background:none;border:1px solid <?= get_theme_mod('accent_color'); ?>;color:<?= get_theme_mod('accent_color'); ?>}
      .button--white:focus{color:<?= get_theme_mod('accent_color'); ?>;}
      .bies{background:<?= get_theme_mod('accent_color'); ?>;}
      .company--archive__top{background:<?= get_theme_mod('accent_color'); ?>;}
      .event--single__top, .company--single__top{background:<?= get_theme_mod('accent_color'); ?>;}
      .fair__top{background:<?= get_theme_mod('accent_color'); ?>;}
      .event--archive__top{background:<?= get_theme_mod('accent_color'); ?>;}
      .section--hero__container > * {background:<?= get_theme_mod('accent_color'); ?>;}
      .unsubscribe{background:<?= get_theme_mod('accent_color'); ?>;}
      .page-404{background:<?= get_theme_mod('accent_color'); ?>;}
      .section__subtitle {color: <?= get_theme_mod('accent_color'); ?>;}
      .pagination .page-numbers {border: 1px solid <?= get_theme_mod('accent_color'); ?>; color: <?= get_theme_mod('accent_color'); ?>;}
      .pagination .page-numbers.current {color: white; background: <?= get_theme_mod('accent_color'); ?>;}
      .pagination .page-numbers:hover {color: white; background: <?= get_theme_mod('accent_color'); ?>;}
      .pagination .page-numbers:focus {color: white; background: <?= get_theme_mod('accent_color'); ?>;}

      /* secondary colors */
      .section__title:after {background: <?= get_theme_mod('accent--secondary_color'); ?>; }
      .button{background:<?= get_theme_mod('accent--secondary_color'); ?>}
      .company--archive__title:after {background: <?= get_theme_mod('accent--secondary_color'); ?>; }
      .company--small__link{color:<?= get_theme_mod('accent--secondary_color'); ?>}
      .event--archive__title:after {background: <?= get_theme_mod('accent--secondary_color'); ?>; }
      .event--single__title:after {background: <?= get_theme_mod('accent--secondary_color'); ?>; }
      .event--single__categories a{background:<?= get_theme_mod('accent--secondary_color'); ?>; }
      .event--single__categories a:hover{background:<?= color_luminance(get_theme_mod('accent--secondary_color'), -.15); ?>}
      .fair__title:after {background: <?= get_theme_mod('accent--secondary_color'); ?>; }
      .section--hero__title:after {background: <?= get_theme_mod('accent--secondary_color'); ?>; }
      .unsubscribe__url:hover, .unsubscribe__url:focus {color: <?= get_theme_mod('accent--secondary_color'); ?>;}
      .page-404__url:hover, .page-404__url:focus {color: <?= get_theme_mod('accent--secondary_color'); ?>;}
      .menu-toggle {color:<?= get_theme_mod('accent--secondary_color'); ?>;}
      .menu-toggle::before, .menu-toggle::after {box-shadow: 0 11px 0 0 <?= get_theme_mod('accent--secondary_color'); ?>; background: <?= get_theme_mod('accent--secondary_color'); ?>;}
}

      .button:hover, .button:focus{background:<?= color_luminance(get_theme_mod('accent--secondary_color'), -.15); ?>}

      /* Reset Overruled Styles */
      .button--insta{background:#e1306c}
      .button--insta:hover{background:#c21c54}
      .button--insta:focus{background:#ac194b}
      .button--facebook{background:#3b5998}
      .button--facebook:hover{background:#2d4373}
      .button--facebook:focus{background:#263961}

    </style>
  <?php }

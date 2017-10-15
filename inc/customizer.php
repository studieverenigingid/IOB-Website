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
      .event--single__top{background:<?= get_theme_mod('accent_color'); ?>;}
      .fair__top{background:<?= get_theme_mod('accent_color'); ?>;}
      .event--archive__top{background:<?= get_theme_mod('accent_color'); ?>;}
      .section--hero__container > * {background:<?= get_theme_mod('accent_color'); ?>;}

      /* secondary colors */
      .section__title:after{background:<?= get_theme_mod('accent--secondary_color'); ?>;}
      .button{background:<?= get_theme_mod('accent--secondary_color'); ?>}
      .company--archive__title:after{background:<?= get_theme_mod('accent--secondary_color'); ?>}
      .company--small__link{color:<?= get_theme_mod('accent--secondary_color'); ?>}
      .event--archive__title:after{background:<?= get_theme_mod('accent--secondary_color'); ?>}
      .event--single__title:after{background:<?= get_theme_mod('accent--secondary_color'); ?>}
      .fair__title:after{background:<?= get_theme_mod('accent--secondary_color'); ?>}
      .section--hero__title:after{background:<?= get_theme_mod('accent--secondary_color'); ?>}

      .button:hover{background:<?= color_luminance(get_theme_mod('accent--secondary_color'), -.15); ?>}

      /* Reset Overruled Styles */
      .button--insta{background:#e1306c}
      .button--insta:hover{background:#c21c54}
      .button--insta:focus{background:#ac194b}
      .button--facebook{background:#3b5998}
      .button--facebook:hover{background:#2d4373}
      .button--facebook:focus{background:#263961}

    </style>
  <?php }

  // Dynamic Darken Colors
  function color_luminance( $hex, $percent ) {

  	// validate hex string

  	$hex = preg_replace( '/[^0-9a-f]/i', '', $hex );
  	$new_hex = '#';

  	if ( strlen( $hex ) < 6 ) {
  		$hex = $hex[0] + $hex[0] + $hex[1] + $hex[1] + $hex[2] + $hex[2];
  	}

  	// convert to decimal and change luminosity
  	for ($i = 0; $i < 3; $i++) {
  		$dec = hexdec( substr( $hex, $i*2, 2 ) );
  		$dec = min( max( 0, $dec + $dec * $percent ), 255 );
  		$new_hex .= str_pad( dechex( $dec ) , 2, 0, STR_PAD_LEFT );
  	}

  	return $new_hex;
  }

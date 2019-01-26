<?php
global $img_folder;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>

		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="theme-color" content="<?=get_theme_mod('accent_color');?>">

		<?php
		if ( ! function_exists( '_wp_render_title_tag' ) ) :
			function spi_render_title() {
				?>
				<title><?php wp_title( '|', true, 'right' ); ?></title>
				<?php
			}
			add_action( 'wp_head', 'spi_render_title' );
		endif;
		?>

		<?php $theme_info = wp_get_theme(); ?>

		<?php wp_enqueue_style('muli',
		'https://fonts.googleapis.com/css?family=Muli:300,800');
		wp_enqueue_style('main',
			get_template_directory_uri() . '/static/css/main.css',
			array(), $theme_info->version ); ?>

		<?php wp_enqueue_style('fontawesome',
		'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
		wp_enqueue_style('main',
			get_template_directory_uri() . '/static/css/main.css',
			array(), $theme_info->version );
		wp_enqueue_style( 'custom-styles',
			get_template_directory_uri() . '/static/css/custom-options.css' ); ?>

			<?php wp_enqueue_script( 'scripts',
				get_template_directory_uri() . '/static/js/main.js',
				array('jquery'), $theme_info->version, true );
				wp_localize_script( 'scripts', 'wpjs_object',
				array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
			?>

		<!-- Facebook Pixel Code -->
		<script>
			!function(f,b,e,v,n,t,s)
			{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
			n.callMethod.apply(n,arguments):n.queue.push(arguments)};
			if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
			n.queue=[];t=b.createElement(e);t.async=!0;
			t.src=v;s=b.getElementsByTagName(e)[0];
			s.parentNode.insertBefore(t,s)}(window,document,'script',
			'https://connect.facebook.net/en_US/fbevents.js');
			fbq('init', '139212640120747');
			fbq('track', 'PageView');
		</script>
		<noscript>
			<img height="1" width="1"
			src="https://www.facebook.com/tr?id=139212640120747&ev=PageView
			&noscript=1"/>
		</noscript>
		<!-- End Facebook Pixel Code -->


		<?php wp_head(); ?>
	</head>

	<body<?php if(is_home()) { echo ' class="home"'; } ?>>

	<header class="bies">

		<a href="<?php echo get_site_url(); ?>">
			<picture>
				<source srcset="<?=$img_folder?>bies.svg" type="image/svg+xml">
				<img class="bies__image" alt="Study association i.d"
					srcset="<?=$img_folder?>bies.png 1x,
						<?=$img_folder?>bies@2x.png 2x"
					src="<?=$img_folder?>bies.png">
			</picture>
		</a>

		<nav class="primary-menu">
			<?php wp_nav_menu( array(
				'theme_location' => 'primary-menu',
				'container' => false,
				'menu_class' => 'primary-menu__list' ) ); ?>
		</nav>

	</header>

	<div class="js-menu-toggle menu-toggle">
		menu
	</div>

<?php
	/**
	* Template Name: Fair Page
	*/

	get_header();
?>

	<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
		<main class="fair__top">
			<h1 class="fair__title"><span><?php the_title(); ?></span></h1>
		</main>

		<div class="section">
			<div class="section__wrapper">
				<p class="fair__descr"><?php echo get_the_content(); ?></p>
			</div>
		</div>
	<?php endwhile; endif; ?>


	<!-- ************ -->
	<!-- FAIR PROGRAM -->
	<!-- ************ -->

	<?php
		$fair_start_date = date_format(date_create_from_format('d/m/Y', get_field('fair_start_date', 'option')), 'Ymd');
		$fair_end_date = date_format(date_create_from_format('d/m/Y', get_field('fair_end_date', 'option')), 'Ymd');
		$fair_start_year = date_format(date_create_from_format('d/m/Y', get_field('fair_start_date', 'option')), 'Y')."-01-01 00:00:00Z";
		$current_date = "";

		$prefair_loop = new WP_Query( array(
		'post_type' => 'event',
		'posts_per_page' => -1,
		'meta_query' => array(
			'relation'    => 'AND',
			array(
				'key'     => 'start_datetime',
				'compare' => '<',
				'value'   => $fair_start_date,
				'type'    => 'date'
			),
			array(
				'key'     => 'start_datetime',
				'compare' => '>',
				'value'   => $fair_start_year,
				'type'    => 'date'
			)
		),
		'orderby' => 'start_datetime',
		'order' => 'ASC',
		) );

		$fair_loop = new WP_Query( array(
		'post_type' => 'event',
		'posts_per_page' => -1,
		'meta_query' => array(
			'relation'    => 'AND',
			array(
				'relation' => 'OR',
				array(
				'key'     => 'start_datetime',
				'compare' => '>=',
				'value'   => $fair_start_date,
				'type'    => 'date'
				), array(
					'key'     => 'start_datetime',
					'compare' => '=<',
					'value'   => $fair_end_date,
					'type'    => 'date'
				)
			),
			array(
				'key'     => 'start_datetime',
				'compare' => '>',
				'value'   => $fair_start_year,
				'type'    => 'date'
			)
		),
		'orderby' => 'start_datetime',
		'order' => 'ASC',
		) );

		if ($prefair_loop->have_posts() || $fair_loop->have_posts()) {
	?>
	<div class="section__title__wrapper">
		<h2 class="section__title"><span>Program</span></h2>
	</div>
	<div class="section section--fair">

		<?php
			if ($prefair_loop->have_posts()) {
		?>
		<div class="section__wrapper section__wrapper--fair">
			<h3 class="section__subtitle">Pre-Fair</h3>
			<div>
				<?php while($prefair_loop->have_posts()) : $prefair_loop->the_post(); ?>
					<?php include 'inc/event-micro.php';?>
				<?php endwhile;?>
			</div>
		</div>

		<?php }
			wp_reset_postdata();
			if ($fair_loop->have_posts()) {
		?>

		<div class="section__wrapper section__wrapper--fair">
			<h3 class="section__subtitle">Fair</h3>
			<div>
				<?php while($fair_loop->have_posts()) : $fair_loop->the_post(); ?>
					<?php include 'inc/event-micro.php';?>
				<?php endwhile;?>
			</div>
		</div>

		<?php }
			wp_reset_postdata();
		} ?>
	</div>

	<?php if(get_field('fair_map')) {?>
		<div class="section__title__wrapper">
			<h2 class="section__title"><span>Map</span></h2>
		</div>
		<div class="section">
			<div class="section__wrapper">
					<img src="<?= the_field('fair_map');?>" class="fair__map">
			</div>
		</div>
	<?php } ?>

<?php
	get_footer();
?>

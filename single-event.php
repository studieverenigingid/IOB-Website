<?php
	acf_form_head();
	get_header();
	if(have_posts()) : while(have_posts()) : the_post();
?>

	<main class="event--single__top">
		<div class="section__wrapper">
			<h1 class="event--single__title"><span><?= the_title(); ?></span></h1>

			<?php
				$start = new DateTime(get_field('start_datetime'));
				$start->setTimezone( new DateTimeZone('Europe/Amsterdam') );
				$end = new DateTime(get_field('end_datetime'));
				$end->setTimezone( new DateTimeZone('Europe/Amsterdam') );
				$start_month = $start->format('F');
				$start_day   = $start->format('jS');
				$end_month = $end->format('F');
				$end_day   = $end->format('jS');
				$start_time = $start->format('H:i');
				$end_time   = $end->format('H:i');
				$location_name = get_field('location_name');
				$categories = get_the_category_list(' ');
			?>

			<div class="event--single__meta">
				<?php
					echo $start_month . ' ' . $start_day . ', '. $start_time . ' – ';
					if ($start_day != $end_day){
						echo $end_month . ' ' . $end_day . ', ' . $end_time;
					} else {
						echo $end_time;
					}
					echo ($location_name) ? ' @ ' . $location_name : ' ';
				?>
			</div>

			<div class="event--single__categories">
				<?=$categories;?>
			</div>

			<?php if ( has_post_thumbnail() ) : ?>
					<div class="event--single__thumb">
						<?php
						the_post_thumbnail(
							'large',
							array('class' => 'event--single__img')
						);
						?>
					</div>
				<?php endif; ?>
			</div>
	</main>

	<div class="event--single__wrapper">
		<?php the_content(); ?>

		<h2>Sign-up</h2>
		<?php
			include 'inc/event-form.php';
		?>
	</div>

<?php
	endwhile; endif;
	get_footer();
?>

<?php
	get_header();
	if(have_posts()) : while(have_posts()) : the_post();
?>

	<main class="event--single__top">
		<div class="event--single__top__wrapper">
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
		<?php
			if(!empty(get_field('facebook_url'))){?>
				<a class="button" href="<?= get_field('facebook_url')?>" target="_blank">Facebook event</a>
			<?php }
		 	the_content(); ?>

		<h2>Sign-up</h2>
		<?php
			include 'inc/event-form.php';

			if (current_user_can('editor') || current_user_can('administrator')) { ?>

			<h3>Show Participant List (for admin)</h3>
			<p>
				This section is only visible to administrators and editors.<br>
				Useful for sending mass e-mails.
			</p>

			<form action="#" class="show-participants">
				<input type="hidden" name="post_ID" value="<?=get_the_ID()?>">
				<input type="hidden" name="action" value="show_participants">
				<input type="submit" name="action" class="button" value="Show Particpants" />
			</form>

			<?php } ?>
	</div>

<?php
	endwhile; endif;
	get_footer();
?>

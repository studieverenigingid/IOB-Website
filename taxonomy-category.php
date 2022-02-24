<?php
get_header();
?>
<main>
	<div class="event--archive__top">
		<h1 class="event--archive__title"><span><?= post_type_archive_title(); ?></span></h1>
	</div>

	<div class="events">

		<?php
		$current_date = new DateTime();
		$current_date->setTimezone( new DateTimeZone('Europe/Amsterdam') );
		$first_past = true;
		$post_no = 0;
		?>

		<?php if(have_posts()){?>
			<div class="section">
				<?php while(have_posts()) : the_post(); ?>

					<?php
					$start = new DateTime(get_field('start_datetime'));
					$start->setTimezone( new DateTimeZone('Europe/Amsterdam') );
					if ($start >= $current_date && $first_past && $post_no === 0):
						?>
						<div class="section__title__wrapper">
							<h2 class="section__title"><span>Upcoming Events</span></h2>
						</div>
						<div class="section__wrapper">
							<?php
						endif;
						if ($start < $current_date && $first_past):
							$first_past = false;
							?>
						</div>

						<div class="section__title__wrapper">
							<h2 class="section__title"><span>Past Events</span></h2>
						</div>
						<div class="section__wrapper">
						<?php endif; ?>

						<?php
						// Add an order to upcoming events to sort them reverse from how we got them
						if ($start > $current_date) {
							$order_override = "style='order: -$post_no'";
							$post_no++;
						} else {
							$order_override = '';
						}
						?>

						<?php include( 'inc/event-small.php' ); ?>

					<?php endwhile; ?>
				</div>
			<?php }; ?>
		</div>
	</main>

	<div class="section">
		<div class="section__wrapper">
			<?php include 'inc/pagination.php'; ?>
		</div>
	</div>

<?php
get_footer();
?>

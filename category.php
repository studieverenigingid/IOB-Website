<?php
	get_header();
?>

	<main>
		<div class="event--archive__top">
			<h1 class="event--archive__title"><span><?php single_cat_title(); ?> events</span></h1>
		</div>

		<div class="events">

			<?php
				$cat = get_query_var('cat');
	  		$currentcat = get_category ($cat);
				$args = array (
					'post_type' => 'event',
					'order' => 'DESC',
					'posts_per_page' => -1,
					'category_name' => $currentcat->slug
				);
				$the_query = new WP_Query( $args );
			?>

			<?php if($the_query->have_posts()){?>
				<div class="section">
					<div class="section__wrapper">
					<?php while($the_query->have_posts()) : $the_query->the_post(); ?>

							<?php include( 'inc/event-small.php' ); ?>

						<?php endwhile; ?>
					</div>
				</div>
				<?php } else {
					echo "No posts in ".single_cat_title('', false)." to display";
				};

				wp_reset_postdata();
				?>
			</div>
		</main>

<?php
	get_footer();
?>

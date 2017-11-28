<?php
	/**
	* Template Name: Contact Page
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
				<?php include 'inc/social-buttons.php';?>
			</div>
		</div>


	<!-- ********* -->
	<!-- COMMITTEE -->
	<!-- ********* -->

	<?php if(has_post_thumbnail() || get_field('committee_info')) {?>
		<div class="section__title__wrapper">
			<h2 class="section__title"><span>The Committee</span></h2>
		</div>
		<div class="section">
			<div class="section__wrapper">
					<?= the_post_thumbnail('large'); ?>
					<?= get_field('committee_info'); ?>
			</div>
		</div>
	<?php } ?>

	<?php endwhile; endif; ?>

<?php
	get_footer();
?>

<?php
	get_header();
	if(have_posts()) : while(have_posts()) : the_post();
?>

	<main class="fair__top">
		<h1 class="fair__title"><span><?php the_title(); ?></span></h1>
	</main>

	<div class="section">
		<div class="section__wrapper">
			<p class="fair__descr"><?php echo get_the_formatted_content(); ?></p>
		</div>
	</div>

<?php
	endwhile;
	endif;
	get_footer();
?>

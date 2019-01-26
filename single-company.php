<?php
	get_header();
	if(have_posts()) : while(have_posts()) : the_post();
?>

	<main class="company--single__top">
		<div class="company--single__top__wrapper">
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="company--single__thumb">
					<?php
					the_post_thumbnail(
						'large',
						array('class' => 'company--single__img')
					);
					?>
				</div>
			<?php endif; ?>

			<div class="company--single__meta">
				<h1 class="company--single__title"><?= the_title(); ?></h1> <?php the_field('company_type'); ?>
			</div>

			<?php
					$company_url = get_field('company_url');
					if ( $company_url ): ?>
					<div class="company--single__url">
						<a target="_blank" class="button"
							href="<?php echo $company_url ?>">
							<i class="fa fa-link"></i> Company Website
						</a>
					</div>
				<?php endif; ?>
		</div>
	</main>

	<div class="company--single__wrapper">
		<?php the_content(); ?>
	</div>

<?php
	endwhile; endif;
	get_footer();
?>

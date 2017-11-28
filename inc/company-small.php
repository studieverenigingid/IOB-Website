<div class="company--small">
	<a href="<?= the_permalink();?>" class="company--small__thumb">
		<?= the_post_thumbnail('medium'); ?>
	</a>

	<?php if(is_archive()){?>
		<h2 class="company--small__title"><a href="<?= the_permalink();?>"><?= the_title();?></a></h2>
		<?php if( get_field('company_type') ): ?>
			<span class="company--small__type"><?php the_field('company_type'); ?></span>
		<?php endif; ?>
		<a href="<?= the_permalink();?>" class="company--small__link">Read more...</a>
	<?php } ?>
</div>

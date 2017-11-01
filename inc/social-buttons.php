<?php
  if( have_rows('social_button_repeater', 'option') ):

      while ( have_rows('social_button_repeater', 'option') ) : the_row(); ?>

        <a href="<?= the_sub_field('social_link');?>" class="button button--<?= the_sub_field('social_name'); ?>" target="_blank">
            <?= the_sub_field('social_icon'); ?></i> <?= the_sub_field('social_name'); ?>
        </a>

      <?php endwhile;

  endif;

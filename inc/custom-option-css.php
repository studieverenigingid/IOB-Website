<?php
  if( have_rows('social_button_repeater', 'option') ):

      while ( have_rows('social_button_repeater', 'option') ) : the_row(); ?>
        .button.button--<?= the_sub_field('social_name'); ?>{
          background: <?= the_sub_field('social_color'); ?>;
        }

        .button.button--<?= the_sub_field('social_name'); ?>:hover {
          background: <?= color_luminance(get_sub_field('social_color'), -.15); ?>;
        }
<?php endwhile;

endif;?>

<?php
  get_header();
  if(have_posts()) : while(have_posts()) : the_post();
?>

  <div class="section section--hero">
    <?php the_post_thumbnail('front-page-hero', array( 'class' => 'thumbnail--front-page' )); ?>
    <div class="gradient-pattern"></div>
  </div>

  <div class="section section--stats">
    <div class="section__wrapper">
      <?php

      // check if the repeater field has rows of data
      if( have_rows('stats_repeat_group') ):

       	// loop through the rows of data
          while ( have_rows('stats_repeat_group') ) : the_row();?>
              <div class="section--stats__group">
                <h3><?=the_sub_field('stat_value');?>+</h3>
                <h4><?=the_sub_field('stat_description');?></h4>
              </div>

          <?php endwhile;

      else :

          // no rows found

      endif;

      ?>
    </div>
  </div>

  <div class="section__title__wrapper">
    <h2 class="section__title"><span>The Fair</span></h2>
  </div>
  <div class="section">
    <div class="section__wrapper">
      <?= the_content(); ?>
    </div>
  </div>

  <div class="section__title__wrapper">
    <h2 class="section__title"><span>The Companies</span></h2>
  </div>
  <div class="section">
    <div class="section__wrapper">
      <?php
      $args = array( 'post_type' => 'company', 'posts_per_page' => 10, 'orderby' => 'rand' );
      $loop = new WP_Query( $args );

      while ( $loop->have_posts() ) : $loop->the_post(); ?>
        <h3><?= the_title(); ?></h3>
        <?= the_post_thumbnail('medium'); ?>
      <?php endwhile; ?>
    </div>
  </div>

  <div class="section__title__wrapper">
    <h2 class="section__title"><span>Upcoming Events</span></h2>
  </div>
  <div class="section">
    <div class="section__wrapper">
      <?php
      $args = array( 'post_type' => 'event', 'posts_per_page' => 3 );
      $loop = new WP_Query( $args );

      while ( $loop->have_posts() ) : $loop->the_post(); ?>
        <h3><?= the_title(); ?></h3>
        <?= the_post_thumbnail('medium'); ?>

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
  			?>

        <?php
  					echo $start_month . ' ' . $start_day . ', '. $start_time . ' – ';
  					if ($start_day != $end_day){
  						echo $end_month . ' ' . $end_day . ', ' . $end_time;
  					} else {
  						echo $end_time;
  					}
  					echo ($location_name) ? ' @ ' . $location_name : '';
  				?>
        <p><?= the_excerpt(); ?></p>
      <?php endwhile; ?>
    </div>
  </div>

<?php
  endwhile;
  endif;
  get_footer();
?>

<?php
  /**
  * Template Name: Fair Page
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
      </div>
    </div>
  <?php endwhile; endif; ?>

  <div class="section__title__wrapper">
    <h2 class="section__title"><span>Program</span></h2>
  </div>
  <div class="section">
    <div class="section__wrapper">

    </div>
  </div>

  <?php if(get_field('fair_map')) {?>
    <div class="section__title__wrapper">
      <h2 class="section__title"><span>Map</span></h2>
    </div>
    <div class="section">
      <div class="section__wrapper">
          <img src="<?= the_field('fair_map');?>" class="fair__map">
      </div>
    </div>
  <?php } ?>

<?php
  get_footer();
?>

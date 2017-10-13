<?php
  /**
  * Template Name: Event Archive Page
  */

  get_header();
?>
  <main class="event--archive__top">
    <h1 class="event--archive__title"><span><?= post_type_archive_title(); ?></span></h1>
  </main>

  <?php
    if ( have_posts() ) {
  ?>

    <div class="section">
      <div class="section__wrapper">
        <?php while(have_posts()) : the_post(); ?>
          <?php include 'inc/event-small.php';?>
        <?php endwhile;?>
      </div>
    </div>

    <?php
      }
      wp_reset_postdata();
    ?>

<?php
  get_footer();
?>

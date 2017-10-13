<?php
  /**
  * Template Name: Company Archive Page
  */

  get_header();
?>
  <main class="company--archive__top">
    <h1 class="company--archive__title"><span><?= post_type_archive_title(); ?></span></h1>
  </main>

  <?php
    $args = array( 'post_type' => 'company', 'orderby' => 'title', 'order' => 'ASC' );
    $loop = new WP_Query( $args );
    if ( $loop->have_posts() ) {
  ?>

    <div class="section">
      <div class="section__wrapper">
        <?php while($loop->have_posts()) : $loop->the_post(); ?>
          <?php include 'inc/company-small.php';?>
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

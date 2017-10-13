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
    $today = date('Ymd');
    $upcoming_loop = new WP_Query( array(
    'post_type' => 'event',
    'posts_per_page' => 6,
    'meta_query' => array(
    array(
      'key'     => 'start_datetime',
      'compare' => '>=',
      'value'   => $today,
      'type'    => 'DATE'
    ),
    ),
    'orderby' => 'start_datetime',
    'order' => 'ASC',
    ) );
    if ($upcoming_loop->have_posts()) {
  ?>
    <div class="section__title__wrapper">
      <h2 class="section__title"><span>Upcoming Events</span></h2>
    </div>
    <div class="section">
      <div class="section__wrapper">
        <?php while($upcoming_loop->have_posts()) : $upcoming_loop->the_post(); ?>
          <?php include 'inc/event-small.php';?>
        <?php endwhile;?>
      </div>
    </div>

    <?php
      }
      wp_reset_postdata();
    ?>

    <?php
      $today = date('Ymd');
      $past_loop = new WP_Query( array(
      'post_type' => 'event',
      'posts_per_page' => 6,
      'meta_query' => array(
      array(
        'key'     => 'start_datetime',
        'compare' => '<',
        'value'   => $today,
        'type'    => 'DATE'
      ),
      ),
      'orderby' => 'start_datetime',
      'order' => 'DESC',
      ) );
      if ($past_loop->have_posts()) {
    ?>
      <div class="section__title__wrapper">
        <h2 class="section__title"><span>Past Events</span></h2>
      </div>
      <div class="section">
        <div class="section__wrapper">
          <?php while($past_loop->have_posts()) : $past_loop->the_post(); ?>
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

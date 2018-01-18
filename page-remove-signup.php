<?php
	/**
	* Template Name: Remove sign-up page
	*/

	get_header();
?>

<main class="unsubscribe">
	<?php
		$action = $_GET['action'];
		$post_ID = $_GET['post_ID'];
		$unique_ID = $_GET['unique_ID'];
		if ($action == "delete") {
			$args = array(
				'p'         => $post_ID, // ID of a page, post, or custom type
				'post_type' => 'event'
			);
			$delete_post = new WP_Query($args);

			if ( $delete_post->have_posts() ) {
				while ( $delete_post->have_posts() ) {
					$delete_post->the_post();
					?>
						<div>
							<?php

							$results = array();

							while( have_rows('participant_list') ): the_row();
								$results[] = get_row();
							endwhile;

							$unique_ID_found = array_search($unique_ID,array_column($results, 'field_5a1d7c37cfcc0'));

							if($unique_ID_found !== false){
								$row = $unique_ID_found+1;?>
								<h1 class="unsubscribe__title">Your subscription was removed from <?=get_the_title()?>.</h1>
								<h2 class="unsubscribe__sub-title">
									If you did this in error, sign up again <a href="<?=the_permalink();?>" class="unsubscribe__url">here</a>, or send us an <a class="unsubscribe__url" href='mailto:iob-svid@tudelft.nl'>e-mail</a>.
								</h2>
								<?php delete_row( 'participant_list', $row, $post_ID );
							} else { ?>
								<h1 class="unsubscribe__title">
									Could not unsubscribe from <?=get_the_title()?>.
								</h1>
								<h2 class="unsubscribe__sub-title">
									Your unique ID is invalid, if you're not sure whether your request was received,
									send us an <a class="unsubscribe__url" href='mailto:iob-svid@tudelft.nl'>e-mail</a>.
								</h2>
							<?php }; ?>
						</div>
					<?php
				}
				wp_reset_postdata();
			} else {?>
				<h1 class="unsubscribe__title">
					Could not remove signup.
				</h1>
				<h2 class="unsubscribe__sub-title">The value for post_ID is not an event, you should go back <a href="<?=home_url()?>" class="unsubscribe__url">home</a>.</h2>
			<?php }
		} else { ?>
			<h1 class="unsubscribe__title">
				Could not remove signup.
			</h1>
			<h2 class="unsubscribe__sub-title">The link is invalid, you should go back <a href="<?=home_url()?>" class="unsubscribe__url">home</a>.</h2>
		<?php
		}
	?>
</main>

<?php
	get_footer();
?>

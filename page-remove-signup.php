<?php
	/**
	* Template Name: Remove sign-up page
	*/

	get_header();
?>

<main class="unsubscribe">
	<h1 class="unsubscribe__title">
		Unsubscribed from
	</h1>
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
							<h2 class="unsubscribe__sub-title">
								<?=get_the_title();?>
							</h2>
							<?php

							$results = array();

							while( have_rows('participant_list') ): the_row();
								$results[] = get_row();
							endwhile;

							$unique_ID_found = array_search($unique_ID,array_column($results, 'field_5a1d7c37cfcc0'));

							if($unique_ID_found !== false){
								$row = $unique_ID_found+1;?>
								<p>Should <?=$action?> row <?=$row?> from <?=get_the_title()?>.</p>
								<?php delete_row( 'participant_list', $row, $post_ID );
							} else { ?>
								<p>Your unique ID is invalid, if you're not sure whether your request was received, send us an <a class="unsubscribe__url" href='mailto:iob-svid@tudelft.nl'>e-mail</a>.</p>
							<?php }; ?>
						</div>
					<?php
				}
				wp_reset_postdata();
			} else {
				echo "Post ID ".$post_ID." is not an event.";
			}
		} else {
			echo "No valid action was set, you should go back <a href=".home_url().">home</a>";
		}

	?>
</main>

<?php
	get_footer();
?>

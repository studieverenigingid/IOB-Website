<?php
	$post_ID = $_POST['post_ID'];
	$response = array();

	// check if the repeater field has rows of data
	if( have_rows('participant_list', $post_ID) ):

		$response[] = array('First Name', 'Last Name', 'email address');

		while ( have_rows('participant_list', $post_ID) ) : the_row();

				$first_name = get_sub_field('first_name');
				$last_name = get_sub_field('last_name');
				$email = get_sub_field('email');

				$response[] = array($first_name, $last_name, $email);

		endwhile;

	else :

		// no rows found

	endif;

	wp_send_json($response);

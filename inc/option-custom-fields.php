<?php
	if( function_exists('acf_add_options_sub_page') ) {
		$args = array(
			'page_title' => 'Fair',
			'parent_slug' => 'options-general.php', );
		acf_add_options_sub_page($args);
	}

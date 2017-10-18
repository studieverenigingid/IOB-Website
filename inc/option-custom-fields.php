<?php
	if( function_exists('acf_add_options_sub_page') ) {
		$args = array(
			'page_title' => 'Fair',
			'parent_slug' => 'options-general.php', );
		acf_add_options_sub_page($args);

		acf_add_local_field_group(array (
			'key' => 'group_59e4a1e61acac',
			'title' => 'IOB Settings',
			'fields' => array (
				array (
					'key' => 'field_59e4a1f69b7be',
					'label' => 'Fair Start Date',
					'name' => 'fair_start_date',
					'type' => 'date_picker',
					'instructions' => 'Set the first day of the IDE Business Fair',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'display_format' => 'd/m/Y',
					'return_format' => 'd/m/Y',
					'first_day' => 1,
				),
				array (
					'key' => 'field_59e4a2a19b7c1',
					'label' => 'Fair End Date',
					'name' => 'fair_end_date',
					'type' => 'date_picker',
					'instructions' => 'Set the last day of the IDE Business Fair',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'display_format' => 'd/m/Y',
					'return_format' => 'd/m/Y',
					'first_day' => 1,
				),
			),
			'location' => array (
				array (
					array (
						'param' => 'options_page',
						'operator' => '==',
						'value' => 'acf-options-fair',
					),
				),
			),
			'menu_order' => 0,
			'position' => 'normal',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => '',
			'active' => 1,
			'description' => '',
		));
	}

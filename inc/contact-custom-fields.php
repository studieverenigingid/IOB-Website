<?php
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
	'key' => 'group_59e75d8a053ad',
	'title' => 'Committee Info',
	'fields' => array (
		array (
			'key' => 'field_5a441551a8a01',
			'label' => 'Committee Image',
			'name' => 'committee_image',
			'type' => 'image',
			'instructions' => 'Upload the committee image.',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'thumbnail',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array (
			'key' => 'field_59e75d98f5a5b',
			'label' => 'Committee Info',
			'name' => 'committee_info',
			'type' => 'wysiwyg',
			'instructions' => 'Set the committee info',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'tabs' => 'all',
			'toolbar' => 'full',
			'media_upload' => 1,
			'delay' => 0,
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'page-contact.php',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array (
		0 => 'excerpt',
		1 => 'discussion',
		2 => 'comments',
		3 => 'featured_image',
		4 => 'categories',
		5 => 'tags',
	),
	'active' => 1,
	'description' => '',
));

endif;

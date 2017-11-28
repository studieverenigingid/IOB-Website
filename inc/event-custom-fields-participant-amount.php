<?php
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
	'key' => 'group_59e49e0fe2f38',
	'title' => 'Event Participant Fields',
	'fields' => array (
		array (
			'key' => 'field_59e49e1419265',
			'label' => 'Participant Limit',
			'name' => 'participant_limit',
			'type' => 'true_false',
			'instructions' => 'Check if the participant entries should be limited.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => 'Participant Limit',
			'default_value' => 0,
			'ui' => 0,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
		array (
			'key' => 'field_59e49e8719266',
			'label' => 'Desired Participants',
			'name' => 'desired_participants',
			'type' => 'number',
			'instructions' => 'Set the desired amount of allowed participants. Displayed on event page.',
			'required' => 1,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_59e49e1419265',
						'operator' => '==',
						'value' => '1',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => 30,
			'prepend' => '',
			'append' => 'Participants',
			'min' => '',
			'max' => '',
			'step' => '',
		),
		array (
			'key' => 'field_59e5be3109d59',
			'label' => 'Max Invited Participants',
			'name' => 'max_invited_participants',
			'type' => 'number',
			'instructions' => 'Set the maximum amount of participants that will be invited. This triggers the waiting list message on the event sign-ups.',
			'required' => 1,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_59e49e1419265',
						'operator' => '==',
						'value' => '1',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => 50,
			'prepend' => '',
			'append' => 'Participants',
			'min' => '',
			'max' => '',
			'step' => '',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'event',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'acf_after_title',
	'style' => 'default',
	'label_placement' => 'left',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

endif;

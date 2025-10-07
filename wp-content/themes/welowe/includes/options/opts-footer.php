<?php
Redux::setSection( $opt_name, array(
  	'title' => esc_html__('Footer Options', 'welowe'),
  	'icon' => 'el-icon-compass',
  	'fields' => array(
	 	array(
			'id' 			=> 'copyright_default',
			'type' 		=> 'button_set',
			'title' 		=> esc_html__('Enable/Disable Copyright Text', 'welowe'),
			'options' 	=> array(
				'yes' 	=> esc_html__('Enable', 'welowe'),
				'no' 		=> esc_html__('Disable', 'welowe')
			),
			'default' 	=> 'yes'
	 	),
	 	array(
			'id' 			=> 'copyright_text',
			'type' 		=> 'editor',
			'title' 		=> esc_html__('Footer Copyright Text', 'welowe'),
			'default' 	=> esc_html__('Copyright - 2024 - Company - All rights reserved. Powered by WordPress.', 'welowe')
	 	),
  	)
));
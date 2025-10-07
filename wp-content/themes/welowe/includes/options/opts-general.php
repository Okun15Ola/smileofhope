<?php
Redux::setSection( $opt_name, array(
	'title' => esc_html__('General Options', 'welowe'),
	'icon' => 'el-icon-wrench',
	'fields' => array(
		array(
			'id'           => 'page_layout',
			'type'         => 'button_set',
			'title'        => esc_html__('Page Layout', 'welowe'),
			'subtitle'     => esc_html__('Select the page layout type', 'welowe'),
			'options'      => array(
				'boxed'     => esc_html__('Boxed', 'welowe'),
				'fullwidth' => esc_html__('Fullwidth', 'welowe')
			),
			'default' => 'fullwidth'
		),
      array(
        'id' => 'map_api_key',
        'type' => 'text',
        'title' => esc_html__('Google Map API key', 'welowe'),
        'default' => ''
      ),

      // Logo Default Settings
      array(
         'id'     => 'logo_default',
         'type'   => 'info',
         'icon'   => true,
         'raw'    => '<h3 class="margin-bottom-0">' . esc_html__('Logo Default', 'welowe') . '</h3>',
      ),
      array(
        'id'      => 'header_logo', 
        'type'    => 'media',
        'url'     => true,
        'title'   => esc_html__('Logo in header default', 'welowe'), 
        'default' => ''
      ), 
         
		// Breadcrumb Default Settings
		array(
         'id'     => 'breadcrumb_default',
         'type'   => 'info',
         'icon'   => true,
         'raw'    => '<h3 class="margin-bottom-0">' . esc_html__('Breadcrumb Settings Without Elementor', 'welowe') . '</h3>',
      ),
		array(
         'id'        => 'breadcrumb_title',
         'type'      => 'button_set',
         'title'     => esc_html__('Breadcrumb Title', 'welowe'),
         'options'   => array(
            1 => esc_html__('Enable', 'welowe'),
            0 => esc_html__('Disable', 'welowe')
         ),
         'default'   => 1
      ),
      array(
         'id'        => 'breadcrumb_bg_color',
         'type'      => 'color',
         'title'     => esc_html__('Background Overlay Color', 'welowe'),
         'default'   => ''
      ),
      array(
         'id'        => 'breadcrumb_bg_opacity',
         'type'      => 'slider',
         'title'     => esc_html__('Breadcrumb Ovelay Color Opacity', 'welowe'),
         'default'   => 50,
         'min'       => 0,
         'max'       => 100,
         'step'      => 2,
         'display_value' => 'text',
      ),
      array(
         'id'        => 'breadcrumb_bg_image',
         'type'      => 'media',
         'url'       => true,
         'title'     => esc_html__('Breadcrumb Background Image', 'welowe'),
         'default'   => '',
         'required'  => array('woo_breadcrumb_bg', '=', 1 )
      ),
      array(
         'id'        => 'breadcrumb_text_stype',
         'type'      => 'select',
         'title'     => esc_html__('Breadcrumb Text Stype', 'welowe'),
         'options'   => 
         array(
            'text-light'     => esc_html__('Light', 'welowe'),
            'text-dark'      => esc_html__('Dark', 'welowe')
         ),
         'default' => 'text-light'
      )
	)
));
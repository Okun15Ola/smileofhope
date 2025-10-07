<?php
function welowe_register_meta_boxes(){
	$prefix = 'welowe_';
	global $meta_boxes;
	$meta_boxes = array();

	/* ====== Metabox Template ====== */
	$meta_boxes[] = array(
		'id'    => 'gavias_metaboxes_page',
		'title' => esc_html__('Page Meta', 'welowe'),
		'pages' => array( 'gva__template'),
		'priority'   => 'high',
		'fields' => array(
			array(
				'name' => esc_html__('Template Type', 'welowe'),
				'id'   => "gva_template_type",
				'type' => 'text'
			),
		)
	);

	/* ====== Metabox Page ====== */
	$meta_boxes[] = array(
		'id'    => 'gavias_metaboxes_page',
		'title' => esc_html__('Page Meta', 'welowe'),
		'pages' => array( 'page'),
		'priority'   => 'high',
		'fields' => array(
			array(
            'name' => esc_html__('Full Width', 'welowe'),
            'id'   => "{$prefix}page_full_width",
            'type' => 'switch',
            'desc' => esc_html__('Turn on to have the main area display at 100% width according to the window size. Turn off to follow site width.', 'welowe'),
            'std' => 0,
         ),
			array(
				'name' => esc_html__('Header Layout', 'welowe'),
				'id'   => "{$prefix}header_layout",
				'type' => 'select',
				'options' => welowe_list_header_layout(),
				'multiple' => false,
				'std'  => '_default_active',
			),
			array(
				'name' => esc_html__('Footer Layout', 'welowe'),
				'id'   => "{$prefix}footer_layout",
				'type' => 'select',
				'options' => welowe_list_footer_layout(),
				'multiple' => false,
				'std'  => '_default_active',
			),
			array(
				'name' => esc_html__('Extra page class', 'welowe'),
				'id' => $prefix . 'extra_page_class',
				'desc' => esc_html__("If you wish to add extra classes to the body class of the page (for custom css use), then please add the class(es) here.", 'welowe'),
				'clone' => false,
				'type'  => 'text',
				'std' => '',
			),
		)
	);

	/* ====== Metabox Page Title ====== */
	$meta_boxes[] = array(
		'id' => 'gavias_metaboxes_page_heading',
		'title' => esc_html__('Page Title & Breadcrumb', 'welowe'),
		'pages' => array( 'post', 'page', 'product', 'portfolio', 'tribe_events'),
		'context' => 'normal',
		'priority'   => 'high',
		'fields' => array(
		  	array(
				'name' => esc_html__('Remove Title of Page', 'welowe'),   
				'id'   => "{$prefix}disable_page_title",
				'type' => 'switch',
				'std'  => 0,
		  	),
		  	array(
			 	'name' => esc_html__('Disable Breadcrumbs', 'welowe'),
			 	'id'   => "{$prefix}no_breadcrumbs",
			 	'type' => 'switch',
			 	'desc' => esc_html__('Disable the breadcrumbs from under the page title on this page.', 'welowe'),
			 	'std' => 0,
		  	),
		  	array(
			 	'name' => esc_html__('Breadcrumb Layout', 'welowe'),
			 	'id'   => "{$prefix}breadcrumb_layout",
			 	'type' => 'select',
			 	'options' => array(
				 	'layout_options'    => esc_html__('Default Options in Layout Template', 'welowe'),
				 	'page_options'      => esc_html__('Individuals Options This Page', 'welowe')
			 	),
			 	'multiple' => false,
			 	'std'  => 'theme_options',
			 	'desc' => esc_html__('You can use breadcrumb settings default in Layout Template or individuals this page', 'welowe')
		  	),
		  	array(
			 	'name' 	=> esc_html__( 'Background Overlay Color', 'welowe' ),
			 	'id'   	=> "{$prefix}welowe_breacrumb_bg_color",
			 	'desc' 	=> esc_html__( "Set an overlay color for hero heading image.", 'welowe' ),
			 	'type' 	=> 'color',
			 	'class' => 'breadcrumb_setting',
			 	'std'  	=> '',
		  	),
		  	array(
			 	'name'       => esc_html__( 'Overlay Opacity', 'welowe' ),
			 	'id'         => "{$prefix}breacrumb_bg_opacity",
			 	'desc'       => esc_html__( 'Set the opacity level of the overlay. This will lighten or darken the image depening on the color selected.', 'welowe' ),
			 	'clone'      => false,
			 	'type'       => 'slider',
			 	'prefix'     => '',
			 	'class'   	  => 'breadcrumb_setting',
			 	'js_options' => array(
				  	'min'  => 0,
				  	'max'  => 100,
				  	'step' => 1,
			 	),
			 	'std'   => '50'
		  	),
		  	array(
			 	'name'  	=> esc_html__('Breadcrumb Background Image', 'welowe'),
			 	'id'    	=> "{$prefix}welowe_breacrumb_image",
			 	'type'  	=> 'image_advanced',
			 	'class'   	=> 'breadcrumb_setting',
			 	'max_file_uploads' => 1
		  	),
		)
	);

	$meta_boxes[] = array(
    	'id'    		=> 'metaboxes_give_forms',
    	'title' 		=> esc_html__('Give Forms Settings', 'welowe'),
    	'pages' 		=> array( 'give_forms' ),
    	'priority' 	=> 'high',
    	'fields' 	=> array(
	     	array (
	        	'name'   => esc_html__('Gallery Images', 'welowe'),
	        	'id'    	=> "{$prefix}give_gallery_images",
	        	'type'             => 'image_advanced',
	        	'max_file_uploads' => 50,
	      ),
	      array(
	        	'name' => esc_html__('Video URL', 'welowe'),
	        	'id' 	 => $prefix . 'give_video_url',
	        	'type' => 'text'
	      ),
	      array(
	        	'name' => esc_html__('Featured', 'welowe'),   
	        	'id'   => "{$prefix}give_featured",
	        	'type' => 'checkbox',
	        	'std'  => 0,
	      ),
		  	array(
				'name' => esc_html__('Layout Page', 'welowe'),
				'id'   => "{$prefix}template_layout",
				'type' => 'select',
				'options' => welowe_get_donation_layout(),
				'multiple' => false,
				'std'  => '_default_active',
			),
    	)
  	);

	$meta_boxes[] = array(
		'id'    => 'gavias_metaboxes_crowdfunding',
		'title' => esc_html__('Crowdfunding Meta', 'welowe'),
		'pages' => array( 'product'),
		'fields' => array(
			array(
				'name' => esc_html__('Layout Page', 'welowe'),
				'id'   => "{$prefix}template_layout",
				'type' => 'select',
				'options' => welowe_get_crowdfunding_layout(),
				'multiple' => false,
				'std'  => '_default_active',
			),
		)
	);

	return $meta_boxes;
 }  
  /********************* META BOX REGISTERING ***********************/
  add_filter( 'rwmb_meta_boxes', 'welowe_register_meta_boxes' , 99 );


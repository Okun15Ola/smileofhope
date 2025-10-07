<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Image_Size;
use Elementor\Icons_Manager;

class GVAElement_Features_Block extends GVAElement_Base {  
	const NAME = 'gva-features-block';
	const TEMPLATE = 'general/features-block';
	const CATEGORY = 'welowe_general';

   public function get_categories() {
      return array(self::CATEGORY);
   }
    
	public function get_name() {
		return self::NAME;
	}

	public function get_title() {
		return __( 'Features Block', 'welowe-themer' );
	}

	public function get_keywords() {
		return [ 'features', 'block', 'icon' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_icon',
			[
				'label' => __( 'Features Block', 'welowe-themer' ),
			]
		);
		
		$this->add_control(
			'style',
			[
				'label' => __( 'Style', 'welowe-themer' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'style-1' 		=> __( 'Style 01', 'welowe-themer' ),
					'style-2' 		=> __( 'Style 02', 'welowe-themer' ),
					'style-3' 		=> __( 'Style 03', 'welowe-themer' )
				],
				'default' => 'style-1',
			]
		);

		$this->add_control(
			'title_text',
			[
				'label' => __( 'Title', 'welowe-themer' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( 'Safe your money', 'welowe-themer' ),
				'placeholder' => __( 'Enter your title', 'welowe-themer' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'selected_icon',
			[
				'label' => __( 'Icon', 'welowe-themer' ),
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'default' => [
					'value' => 'fas fa-home',
					'library' => 'fa-solid',
				],
				'condition' => [
					'style' => ['style-2', 'style-3']
				]
			]
		);

		$this->add_control(
			'image',
			[
				'label' => __( 'Choose Image', 'welowe-themer' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => GAVIAS_WELOWE_PLUGIN_URL . 'elementor/assets/images/image-3.jpg',
				],
				'condition' => [
					'style' => ['style-1']
				]
			]
		);

		$this->add_control(
			'description_text',
			[
				'label' => '',
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( 'Lorem ipsum dolor amet consectetur adipiscing elit do eiusmod tempor incid idunt ut labore.', 'welowe-themer' ),
				'placeholder' => __( 'Enter your description', 'welowe-themer' ),
				'show_label' => false,
				'condition' => [
					'style' => ['style-1', 'style-2', 'style-3']
				]
			]
		);

		$this->add_control(
			'number',
			[
				'label' => __( 'Number Text', 'welowe-themer' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( '01', 'welowe-themer' ),
				'placeholder' => __( 'Enter your number', 'welowe-themer' ),
				'condition' => [
					'style' => ['style-2', 'style-3']
				]
			]
		);

		$this->add_control(
			'number_position',
			[
				'label' => __( 'Number Position', 'welowe-themer' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'number-top' 		=> esc_html__( 'Number Top Left', 'welowe-themer' ),
					'number-bottom' 	=> esc_html__( 'Number Bottom Right', 'welowe-themer' )
				],
				'default' => 'number-top',
				'condition' => [
					'style' => ['style-2']
				]
			]
		);

		$this->add_group_control(
         Elementor\Group_Control_Image_Size::get_type(),
         [
            'name'      => 'image',
            'default'   => 'full',
            'separator' => 'none',
            'condition' => [
					'style' => ['style-1']
				]
         ]
      );

		$this->add_control(
			'header_tag',
			[
				'label' => __( 'Title HTML Tag', 'welowe-themer' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
					'div' => 'div',
					'span' => 'span',
					'p' => 'p',
				],
				'default' => 'h3',
			]
		);

		$this->add_control(
			'active',
			[
				'label' 			=> __( 'Active', 'welowe-themer' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'no'
			]
		);

		

		$this->end_controls_section();

		$this->start_controls_section( //** Section Button
			'section_button',
			[
				'label' => __( 'Link', 'welowe-themer' ),
			]
		);

		$this->add_control(
			'button_url',
			[
				'label' => __( 'Link', 'welowe-themer' ),
				'type' => Controls_Manager::URL,
			]
		);

		$this->add_control(
			'button_text',
			[
				'label' => __( 'Button Text', 'welowe-themer' ),
				'type' => Controls_Manager::TEXT,
				'condition' => [
					'style' => ['style-2','style-1']
				],
				'default'	=> 'Make a donation'
			]
		);
		$this->add_control(
			'button_style',
			[
				'label' 	=> __( 'Button Style', 'welowe-themer' ),
				'type' 	=> Controls_Manager::SELECT,
				'options' => [
					'btn-theme' 			=> esc_html__('Button Theme', 'welowe-themer'),
					'btn-theme-2' 			=> esc_html__('Button Theme Second', 'welowe-themer'),
					'btn-theme-3' 			=> esc_html__('Button Theme Third', 'welowe-themer'),
					'btn-white' 			=> esc_html__('Button White', 'welowe-themer'),
					'btn-black' 			=> esc_html__('Button Black', 'welowe-themer'),
					'btn-border' 			=> esc_html__('Button Border', 'welowe-themer'),
					'btn-border-white' 	=> esc_html__('Button Border White', 'welowe-themer')
				],
				'default' => 'btn-theme',
			]
		);
		$this->end_controls_section();

		// Icon
		$this->start_controls_section(
			'section_style_icon',
			[
				'label' => __( 'Icon', 'welowe-themer' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' => [
					'selected_icon[value]!' => ''
				],
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label' => __( 'Icon Color', 'welowe-themer' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .feature-one__icon-box i, {{WRAPPER}} .feature-two__icon-box i, {{WRAPPER}} .feature-three__icon-box i' => 'color: {{VALUE}}!important;',
					'{{WRAPPER}} .feature-one__icon-box svg, {{WRAPPER}} .feature-two__icon-box svg, {{WRAPPER}} .feature-three__icon-box svg' => 'fill: {{VALUE}}!important;'
				],
			]
		);

		$this->add_responsive_control(
			'icon_size',
			[
				'label' => __( 'Size', 'welowe-themer' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 20,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .feature-one__icon-box i, {{WRAPPER}} .feature-two__icon-box i, {{WRAPPER}} .feature-three__icon-box i' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .feature-one__icon-box svg, {{WRAPPER}} .feature-two__icon-box svg, {{WRAPPER}} .feature-three__icon-box svg' => 'width: {{SIZE}}{{UNIT}};'
				],
			]
		);


		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_single',
			[
				'label' => esc_html__('Box Single', 'welowe-themer'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		// Box Styling
		$this->add_control(
			'box_color',
			[
				'label' => __( 'Background Color', 'welowe-themer' ),
				'type' => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .feature-one__single .background-overlay' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'style' => ['style-1']
				],
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'section_style_content',
			[
				'label' => __( 'Content', 'welowe-themer' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'heading_title',
			[
				'label' => __( 'Title', 'welowe-themer' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'title_bottom_space',
			[
				'label' => __( 'Spacing', 'welowe-themer' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .feature-one__title, {{WRAPPER}} .feature-two__title, {{WRAPPER}} .feature-three__title' => 'padding-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		); 

		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'welowe-themer' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .feature-one__title, {{WRAPPER}} .feature-two__title, {{WRAPPER}} .feature-three__title' => 'color: {{VALUE}};'
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .feature-one__title, {{WRAPPER}} .feature-two__title, {{WRAPPER}} .feature-three__title',
			]
		);

		$this->add_control(
			'heading_description',
			[
				'label' => __( 'Description', 'welowe-themer' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'style' => ['style-1', 'style-2'],
				],
			]
		);

		$this->add_control(
			'description_color',
			[
				'label' => __( 'Color', 'welowe-themer' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .feature-one__desc, {{WRAPPER}} .feature-two__desc' => 'color: {{VALUE}};',
				],
				'condition' => [
					'style' => ['style-1', 'style-2'],
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'description_typography',
				'selector' => '{{WRAPPER}} .feature-one__desc, {{WRAPPER}} .feature-two__desc',
				'condition' => [
					'style' => ['style-1'],
				],

			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render icon box widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		printf( '<div class="gva-element-%s gva-element">', $this->get_name() );
         include $this->get_template( self::TEMPLATE . '.php');
      print '</div>';
	}
}

$widgets_manager->register(new GVAElement_Features_Block());

<?php
if(!defined('ABSPATH')){ exit; }
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Image_Size;

class GVAElement_Counter extends GVAElement_Base {  

	const NAME = 'gva-counter';
   const TEMPLATE = 'general/counter';
   const CATEGORY = 'welowe_general';

   public function get_name() {
      return self::NAME;
   }

   public function get_categories() {
      return array(self::CATEGORY);
   }
   
	public function get_title() {
		return __( 'Counter', 'welowe-themer' );
	}

	
	public function get_keywords() {
		return [ 'counter', 'icon' ];
	}

	public function get_script_depends() {
      return [
         'jquery.count_to',
         'jquery.appear',
      ];
   }

	protected function register_controls() {
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Content', 'welowe-themer' ),
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
			'selected_icon',
			[
				'label' => __( 'Icon Class', 'welowe-themer' ),
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'default' => [
					'value' => 'fas fa-home',
					'library' => 'fa-solid',
				],
			]
		);
		$this->add_control(
			'number',
			[
				'label' => __( 'Number', 'welowe-themer' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 110
			]
		);
		$this->add_control(
			'text_before',
			[
				'label' => __( 'Text Before Number', 'welowe-themer' ),
				'type' => Controls_Manager::TEXT,
			]
		);
		$this->add_control(
			'text_after',
			[
				'label' => __( 'Text After Number', 'welowe-themer' ),
				'type' => Controls_Manager::TEXT,
			]
		);
		$this->add_control(
			'title_text',
			[
				'label' => __( 'Title', 'welowe-themer' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Projects Completed', 'welowe-themer' ),
				'placeholder' => __( 'Enter your title', 'welowe-themer' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'link',
			[
				'label' => __( 'Link', 'welowe-themer' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'welowe-themer' ),
			]
		);
		$this->add_control(
			'title_size',
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
				'default' => 'div',
			]
		);
		
		$this->end_controls_section();


		// Style Icon
		$this->start_controls_section(
			'section_style_icon',
			[
				'label' => __( 'Icon', 'welowe-themer' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label' => __( 'Icon Color', 'welowe-themer' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .milestone-one__icon i, 
					 {{WRAPPER}} .milestone-two__icon i,
					 {{WRAPPER}} .milestone-three__icon i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .milestone-one__icon svg, 
					 {{WRAPPER}} .milestone-two__icon svg,
					 {{WRAPPER}} .milestone-three__icon svg' => 'fill: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'icon_size',
			[
				'label' => __( 'Icon Size', 'welowe-themer' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 6,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .milestone-one__icon i, 
					 {{WRAPPER}} .milestone-two__icon i,
					 {{WRAPPER}} .milestone-three__icon i' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .milestone-one__icon svg, 
					 {{WRAPPER}} .milestone-two__icon svg,
					 {{WRAPPER}} .milestone-three__icon svg' => 'width: {{SIZE}}{{UNIT}};'
				],
			]
		);

		$this->add_responsive_control(
			'icon_space',
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
					'{{WRAPPER}} .milestone-one__icon,
					 {{WRAPPER}} .milestone-three__icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .milestone-two__icon' => 'margin-right: {{SIZE}}{{UNIT}};'
				],
			]
		);

		$this->end_controls_section();


		// Title
		$this->start_controls_section(
			'section_title_style',
			[
				'label' => __( 'Title', 'welowe-themer' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'title_top_space',
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
					'{{WRAPPER}} .milestone-one__title, 
					 {{WRAPPER}} .milestone-two__title,
					 {{WRAPPER}} .milestone-three__title' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .milestone-one__title, {{WRAPPER}} .milestone-two__title, {{WRAPPER}} .milestone-three__title',
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'welowe-themer' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .milestone-one__title, {{WRAPPER}} .milestone-two__title, {{WRAPPER}} .milestone-three__title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'title_bg_color',
			[
				'label' => __( 'Background Color', 'welowe-themer' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .milestone-one__title' => 'background: {{VALUE}};',
					'{{WRAPPER}} .milestone-one__title:after'	=> 'border-bottom-color: {{VALUE}};'
				],
				'condition' => [
					'style' => ['style-1']
				],
			]
		);
		
		$this->add_control(
			'title_hover',
			[
				'label' => __( 'Hover - Color', 'welowe-themer' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .milestone-one__single:hover .milestone-one__title, {{WRAPPER}} .milestone-one__single:focus .milestone-one__title' => 'color: {{VALUE}};',
				],
				'condition' => [
					'style' => ['style-1']
				],
			]
		);

		$this->add_control(
			'title_hover_bg',
			[
				'label' => __( 'Hover - Background Color', 'welowe-themer' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .milestone-one__single:hover .milestone-one__title, {{WRAPPER}} .milestone-one__single:focus .milestone-one__title' => 'background: {{VALUE}};',
					'{{WRAPPER}} .milestone-one__single:hover .milestone-one__title:after, {{WRAPPER}} .milestone-one__single:focus .milestone-one__title:after' => 'border-bottom-color: {{VALUE}};',
				],
				'condition' => [
					'style' => ['style-1']
				],
			]
		);
		$this->end_controls_section();

		// Number Text
		$this->start_controls_section(
			'section_number_style',
			[
				'label' => __( 'Number Text', 'welowe-themer' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'number_bottom_space',
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
					'{{WRAPPER}} .milestone-one__number, 
					 {{WRAPPER}} .milestone-two__number,
					 {{WRAPPER}} .milestone-three__number' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'number_text_color',
			[
				'label' => __( 'Color', 'welowe-themer' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .milestone-one__number, 
					 {{WRAPPER}} .milestone-two__number,
					 {{WRAPPER}} .milestone-three__number' => 'color: {{VALUE}};',
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'number_text_typography',
				'selector' => '{{WRAPPER}} .milestone-one__number, {{WRAPPER}} .milestone-two__number, {{WRAPPER}} .milestone-three__number',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		printf( '<div class="gva-element-%s gva-element">', $this->get_name() );
         include $this->get_template(self::TEMPLATE . '.php');
      print '</div>';
	}
}
$widgets_manager->register(new GVAElement_Counter());

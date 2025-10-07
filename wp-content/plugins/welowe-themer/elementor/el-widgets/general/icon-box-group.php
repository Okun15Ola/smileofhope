<?php

if (!defined('ABSPATH')) {
		exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Image_Size;
use Elementor\Repeater;

class GVAElement_Icon_Box_Group extends GVAElement_Base{
	const NAME = 'gva_icon_box_group';
	const TEMPLATE = 'booking/booking';
	const CATEGORY = 'welowe_general';

	public function get_categories() {
		return array(self::CATEGORY);
	}
		
	public function get_name() {
		return self::NAME;
	}

	public function get_title() {
		return esc_html__('Icon Box Carousel/Grid', 'welowe-themer');
	}

	public function get_keywords() {
		return [ 'icon', 'box', 'content', 'carousel', 'grid' ];
	}

	public function get_script_depends() {
		return [
			'swiper',
			'gavias.elements',
		];
	}

	public function get_style_depends() {
		return array('swiper');
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__('Content', 'welowe-themer'),
			]
		);
		$this->add_control( // xx Layout
			'layout_heading',
			[
				'label'   => esc_html__('Layout', 'welowe-themer'),
				'type'    => Controls_Manager::HEADING,
			]
		);
		
		$this->add_control(
			'layout',
			[
				'label'   => esc_html__('Layout Display', 'welowe-themer'),
				'type'    => Controls_Manager::SELECT,
				'default' => 'carousel',
				'options' => [
					'grid'      => esc_html__('Grid', 'welowe-themer'),
					'carousel'  => esc_html__('Carousel', 'welowe-themer')
				]
			]
		);

		$this->add_control(
			'style',
			[
				'label' 		=> esc_html__('Style', 'welowe-themer'),
				'type' 		=> Controls_Manager::SELECT,
				'options' 	=> [
					'style-1' => esc_html__('Style 01', 'welowe-themer'),
					'style-2' => esc_html__('Style 02', 'welowe-themer'),
					'style-3' => esc_html__('Style 03', 'welowe-themer'),
					'style-4' => esc_html__('Style 04', 'welowe-themer'),
					'style-5' => esc_html__('Style 05', 'welowe-themer')
				],
				'default' => 'style-1',
			]
		);

		$repeater = new Repeater();
		$repeater->add_control(
			'selected_icon',
			[
				'label'      	=> esc_html__('Choose Icon', 'welowe-themer'),
				'type'       	=> Controls_Manager::ICONS,
				'default' 		=> [
					'value' 		=> 'icon-welowe-strategy',
					'library' 	=> 'welowe-icons-theme'
				]
			]
		);
		$repeater->add_control(
			'title',
			[
				'label'       => esc_html__('Title', 'welowe-themer'),
				'type'        => Controls_Manager::TEXT,
				'default'     => 'Add your Title',
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'desc',
			[
				'label'       => esc_html__('Description', 'welowe-themer'),
				'type'        => Controls_Manager::TEXTAREA,
				'default'	  => ''
			]
		);
		$repeater->add_control(
			'link',
			[
				'label'     	=> esc_html__('Link', 'welowe-themer'),
				'type'      	=> Controls_Manager::URL,
				'placeholder' 	=> esc_html__('https://your-link.com', 'welowe-themer'),
				'label_block' 	=> true
			]
		);
		$repeater->add_control(
			'active',
			[
				'label' 			=> esc_html__('Active', 'welowe-themer'),
				'type' 			=> Controls_Manager::SWITCHER,
				'placeholder' 	=> esc_html__('Active', 'welowe-themer'),
				'default' 		=> 'no'
			]
		);
		$this->add_control(
			'icon_boxs',
			[
				'label'       => esc_html__('Brand Content Item', 'welowe-themer'),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'title_field' => '{{{ title }}}',
				'default'     => array(
					array(
						'title'  					=> esc_html__('Technology', 'welowe-themer'),
						'selected_icon' 			=> array('value' => 'wicon-cyborg')
					),
					array(
						'title'  					=> esc_html__('Education', 'welowe-themer'),
						'selected_icon' 			=> array('value' => 'wicon-reading-book-1')
					),
					array(
						'title'  					=> esc_html__('Fashion', 'welowe-themer'),
						'selected_icon' 			=> array('value' => 'wicon-fashion')
					),
					array(
						'title'  					=> esc_html__('Medical', 'welowe-themer'),
						'selected_icon' 			=> array('value' => 'wicon-medical-file')
					),
					array(
						'title'  					=> esc_html__('Design', 'welowe-themer'),
						'selected_icon' 			=> array('value' => 'wicon-design')
					),
					array(
						'title'  					=> esc_html__('Startup', 'welowe-themer'),
						'selected_icon' 			=> array('value' => 'wicon-rocket')
					)
				)
			]
		);
		$this->add_control(
			'active_highlight',
			[
				'label' 			=> esc_html__('Active Highlight Carousel', 'welowe-themer'),
				'type' 			=> Controls_Manager::SWITCHER,
				'placeholder' 	=> esc_html__('Active', 'welowe-themer'),
				'default' 		=> 'yes',
				'condition' => [
					'layout' => ['carousel']
				]
			]
		);
		$this->end_controls_section();

		$this->add_control_carousel(false, array('layout' => 'carousel'));

		$this->add_control_grid(array('layout' => 'grid'));

		// Icon Styling
		$this->start_controls_section(
			'section_style',
			[
				'label' => esc_html__('Style', 'welowe-themer'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'heading_box',
			[
				'label'	=> esc_html__('Box', 'welowe-themer'),
				'type'	=> Controls_Manager::HEADING
			]
		);

		$this->add_control(
			'primary_color',
			[
				'label' 		=> esc_html__('Primary Color', 'welowe-themer'),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors' => [
					'{{WRAPPER}} .iconbox-three__single' => 'border-color: {{VALUE}};'
				]
			] 
		);

		$this->add_control(
			'heading_icon',
			[
				'label'	=> esc_html__('Icon', 'welowe-themer'),
				'type'	=> Controls_Manager::HEADING
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label' 		=> esc_html__('Icon Color', 'welowe-themer'),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors' => [
					'{{WRAPPER}} .iconbox-one__icon i, {{WRAPPER}} .iconbox-two__icon i, {{WRAPPER}} .iconbox-three__icon i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .iconbox-one__icon svg, {{WRAPPER}} .iconbox-two__icon svg, {{WRAPPER}} .iconbox-three__icon svg' => 'fill: {{VALUE}};'
				],
			]
		);

		$this->add_responsive_control(
			'icon_size',
			[
				'label' 		=> esc_html__('Size', 'welowe-themer'),
				'type' 		=> Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 20,
						'max' => 80,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .iconbox-one__icon i, {{WRAPPER}} .iconbox-two__icon i, {{WRAPPER}} .iconbox-three__icon i' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .iconbox-one__icon svg, {{WRAPPER}} .iconbox-two__icon svg, {{WRAPPER}} .iconbox-three__icon svg' => 'width: {{SIZE}}{{UNIT}};',
					
				],
			]
		);

		$this->add_responsive_control(
			'icon_space',
			[
				'label' 		=> esc_html__('Spacing', 'welowe-themer'),
				'type' 		=> Controls_Manager::SLIDER,
				'default' 	=> [
					'size' 	=> 0,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .iconbox-three__icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'icon_padding',
			[
				'label' => esc_html__('Padding', 'welowe-themer'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .iconbox-three__icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'heading_title',
			[
				'label' => esc_html__('Title', 'welowe-themer'),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'title_bottom_space',
			[
				'label' => esc_html__('Spacing', 'welowe-themer'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'size'  => 5
				],
				'selectors' => [
					'{{WRAPPER}} .iconbox-one__title, {{WRAPPER}} .iconbox-two__title, {{WRAPPER}} .iconbox-three__title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		); 

		$this->add_control(
			'title_color',
			[
				'label' => esc_html__('Color', 'welowe-themer'),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .iconbox-one__title, {{WRAPPER}} .iconbox-two__title, {{WRAPPER}} .iconbox-three__title' => 'color: {{VALUE}};',
					'{{WRAPPER}} .iconbox-one__title a, {{WRAPPER}} .iconbox-two__title a, {{WRAPPER}} .iconbox-three__title a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .iconbox-one__title, {{WRAPPER}} .iconbox-two__title, {{WRAPPER}} .iconbox-three__title',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		printf('<div class="gva-element-%s gva-element">', $this->get_name() );
			if( !empty($settings['layout']) ){
				include $this->get_template('general/icon-box-group/' . $settings['layout'] . '.php');
			}
		print '</div>';
	}

}

$widgets_manager->register(new GVAElement_Icon_Box_Group());

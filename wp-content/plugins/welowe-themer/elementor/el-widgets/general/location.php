<?php
if(!defined('ABSPATH')){ exit; }

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Image_Size;
use Elementor\Repeater;

class GVAElement_Location extends GVAElement_Base{
  	const NAME = 'gva-location';
  	const TEMPLATE = 'general/location/';
  	const CATEGORY = 'welowe_general';

  	public function get_name() {
	 	return self::NAME;
  	}

  	public function get_categories() {
	 	return array(self::CATEGORY);
  	}

	public function get_title() {
		return esc_html__('Location', 'welowe-themer');
	}

	public function get_keywords() {
		return [ 'location', 'content' ];
	}

	public function get_script_depends() {
		return [
			'gavias.elements',
		];
	}

	public function get_style_depends() {
		return array();
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
			'title_text',
			[
				'label'       => esc_html__('Title', 'welowe-themer'),
				'type'        => Controls_Manager::TEXT,
				'default'     => 'Add your Title',
				'label_block' => true,
			]
		);
		$this->add_control(
			'layout',
			[
				'label'   => esc_html__('Layout Display', 'welowe-themer'),
				'type'    => Controls_Manager::SELECT,
				'default' => 'layout-1',
				'options' => [
					'layout-1'      => esc_html__('Layout 01', 'welowe-themer'),
				]
			]
	  	);
	  	$this->add_control(
			'image',
			[
				'label'      => esc_html__('Choose Image', 'welowe-themer'),
				'default'    => [
					'url' => GAVIAS_WELOWE_PLUGIN_URL . 'elementor/assets/images/map.png',
				],
				'type'       => Controls_Manager::MEDIA,
				'show_label' => false,
			]
		);
		$repeater = new Repeater();
		$repeater->add_control(
			'title',
			[
				'label'       => esc_html__('Title', 'welowe-themer'),
				'type'        => Controls_Manager::TEXT,
				'default'     => 'African refugee crises food & health program',
				'label_block' => true,
			]
		);
		$repeater->add_control(
         'image',
         [
            'label'      => __('Choose Image', 'welowe-themer'),
            'default'    => [
               'url' => GAVIAS_WELOWE_PLUGIN_URL . 'elementor/assets/images/team-1.jpg',
            ],
            'type'       => Controls_Manager::MEDIA,
            'show_label' => false,
         ]
      );
		$repeater->add_control(
			'left',
			[
				'label'     	=> esc_html__('Left', 'welowe-themer'),
				'type'      	=> Controls_Manager::SLIDER,
				'size_units' 	=> '%',
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}}' => 'left: {{SIZE}}{{UNIT}};',
				]
			]
		);
		$repeater->add_control(
			'top',
			[
				'label'     => esc_html__('Top', 'welowe-themer'),
				'type'      => Controls_Manager::SLIDER,
				'size_units' 	=> '%',
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}}' => 'top: {{SIZE}}{{UNIT}};',
				]
			]
		);
		$repeater->add_control(
			'link',
			[
				'label'       => esc_html__('Link', 'welowe-themer'),
				'type'        => Controls_Manager::URL,
			]
		);
		$this->add_control(
			'location_content',
			[
				'label'       => esc_html__('Location Content Item', 'welowe-themer'),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'title_field' => '{{{ title }}}',
				'default'     => array(
				  	array(
					 	'title'  => esc_html__('African refugee crises food & health program', 'welowe-themer'),
					 	'left'	=> array('unit' => '%','size' => 16),
					 	'top'	=> array('unit' => '%','size' => 25)
				  	),
				  	array(
					 	'title'  => esc_html__('African refugee crises food & health program', 'welowe-themer'),
					 	'left'	=> array('unit' => '%','size' => 40),
					 	'top'	=> array('unit' => '%','size' => 80)
				  	),
				  	array(
					 	'title'  => esc_html__('African refugee crises food & health program', 'welowe-themer'),
					 	'left'	=> array('unit' => '%','size' => 73),
					 	'top'	=> array('unit' => '%','size' => 22)
				  	),
				  	array(
					 	'title'  => esc_html__('African refugee crises food & health program', 'welowe-themer'),
					 	'left'	=> array('unit' => '%','size' => 75),
					 	'top'	=> array('unit' => '%','size' => 65)
				  	),
				  	array(
					 	'title'  => esc_html__('African refugee crises food & health program', 'welowe-themer'),
					 	'left'	=> array('unit' => '%','size' => 13),
					 	'top'	=> array('unit' => '%','size' => 51)
				  	)
				)
			]
		);

		$this->add_responsive_control(
			'min_height',
			[
				'label' 		=> esc_html__('Min Height', 'welowe-themer'),
				'type' 		=> Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 100,
						'max' => 1000,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .location-one__image' => 'min-height: {{SIZE}}{{UNIT}};',
					
				],
			]
		);

		$this->add_control(
			'image_size',
			[
				'label'     => __('Image Size', 'welowe-themer'),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options'   => $this->get_thumbnail_size(),
				'default'   => 'welowe_medium'
			]
		);

		$this->end_controls_section();

		// Icon Styling
		$this->start_controls_section(
			'section_style',
			[
				'label' => esc_html__('Style', 'welowe-themer'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		printf('<div class="gva-element-%s gva-element">', $this->get_name() );
		if( !empty($settings['layout']) ){
			include $this->get_template(self::TEMPLATE . $settings['layout'] . '.php');
		}
		print '</div>';
	}
}

$widgets_manager->register(new GVAElement_Location());

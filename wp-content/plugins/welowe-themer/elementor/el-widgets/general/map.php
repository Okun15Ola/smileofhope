<?php
if(!defined('ABSPATH')){ exit; }

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Image_Size;

class GVAElement_Map extends GVAElement_Base {
	const NAME = 'gva-map';
   const TEMPLATE = 'general/map';
   const CATEGORY = 'welowe_general';

   public function get_name() {
      return self::NAME;
   }

   public function get_categories() {
      return array(self::CATEGORY);
   }

	public function get_title() {
		return __( 'Map', 'welowe-themer' );
	}

	
	public function get_keywords() {
		return [ 'map', 'block' ];
	}

	public function get_script_depends() {
      return [
         'map-ui',
         'google-maps-api'
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
			'title_text',
			[
				'label' => __( 'Title', 'welowe-themer' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your title', 'welowe-themer' ),
				'label_block' => true
			]
		);

		$this->add_control(
			'map_type',
			[
				'label' => __( 'Map Type', 'welowe-themer' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'ROADMAP' => esc_html__('ROADMAP', 'welowe-themer'),
					'HYBRID' => esc_html__('HYBRID', 'welowe-themer'),
					'SATELLITE' => esc_html__('SATELLITE', 'welowe-themer'),
					'TERRAIN' => esc_html__('TERRAIN', 'welowe-themer'),
				],
				'default' => 'ROADMAP',
			]
		);

		$this->add_control(
			'link',
			[
				'label' => __( 'Latitude, Longitude for map', 'welowe-themer' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Latitude, Longitude', 'welowe-themer' ),
				'description' => esc_html__( 'eg: 21.0173222,105.78405279999993', 'welowe-themer' ),
				'label_block' => true
			]
		);

		$this->add_control(
			'height',
			[
				'label' => __( 'Map height', 'welowe-themer' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( '500px', 'welowe-themer' ),
				'default' => '500px',
				'description' => esc_html__( 'Enter map height (in pixels or leave empty for responsive map), eg: 400px', 'welowe-themer' )
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
$widgets_manager->register(new GVAElement_Map());

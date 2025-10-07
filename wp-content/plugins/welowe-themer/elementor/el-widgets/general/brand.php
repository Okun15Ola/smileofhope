<?php
if(!defined('ABSPATH')){ exit; }

use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Image_Size;
use Elementor\Repeater;

class GVAElement_Brand extends GVAElement_Base{

	const NAME = 'gva-brand';
   const TEMPLATE = 'general/brand';
   const CATEGORY = 'welowe_general';

   public function get_name() {
      return self::NAME;
   }

   public function get_categories() {
      return array(self::CATEGORY);
   }

	 
	public function get_title() {
		return __('Brand', 'welowe-themer');
	}

	public function get_keywords() {
		return [ 'brand', 'content', 'carousel' ];
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
					 'label' => __('Content', 'welowe-themer'),
				]
		  );
		  $repeater = new Repeater();
		  
		  $repeater->add_control(
				'title',
				[
					 'label'       => __('Title', 'welowe-themer'),
					 'type'        => Controls_Manager::TEXT,
					 'default'     => 'Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.',
					 'label_block' => true,
				]
		  );
		  $repeater->add_control(
				'image',
				[
					 'label'      => __('Choose Image', 'welowe-themer'),
					 'default'    => [
						  'url' => GAVIAS_WELOWE_PLUGIN_URL . 'elementor/assets/images/brand-1.png',
					 ],
					 'type'       => Controls_Manager::MEDIA,
					 'show_label' => false,
				]
		  );
		  $repeater->add_control(
				'link',
				[
					 'label'      => __('Link', 'welowe-themer'),
					 'placeholder' => __( 'https://your-link.com', 'welowe-themer' ),
					 'type'       => Controls_Manager::URL,
				]
		  );
		  
		  $this->add_control(
				'brands',
				[
					 'label'       => __('Brand Content Item', 'welowe-themer'),
					 'type'        => Controls_Manager::REPEATER,
					 'fields'      => $repeater->get_controls(),
					 'title_field' => '{{{ title }}}',
					 'default'     => array(
						  array(
								'title'  => esc_html__( 'Brand 1', 'welowe-themer' ),
								'image'  => array( 'url'	=> GAVIAS_WELOWE_PLUGIN_URL . 'elementor/assets/images/brand.png' )
						  ),
						  array(
								'title'  => esc_html__( 'Brand 2', 'welowe-themer' ),
								'image'  => array( 'url'	=> GAVIAS_WELOWE_PLUGIN_URL . 'elementor/assets/images/brand.png' )
						  ),
						  array(
								'title'  => esc_html__( 'Brand 3', 'welowe-themer' ),
								'image'  => array( 'url'	=> GAVIAS_WELOWE_PLUGIN_URL . 'elementor/assets/images/brand.png' )
						  ),
						  array(
								'title'  => esc_html__( 'Brand 4', 'welowe-themer' ),
								'image'  => array( 'url'	=> GAVIAS_WELOWE_PLUGIN_URL . 'elementor/assets/images/brand.png' )
						  ),
						  array(
								'title'  => esc_html__( 'Brand 5', 'welowe-themer' ),
								'image'  => array( 'url'	=> GAVIAS_WELOWE_PLUGIN_URL . 'elementor/assets/images/brand.png' )
						  ),
						  array(
								'title'  => esc_html__( 'Brand 6', 'welowe-themer' ),
								'image'  => array( 'url'	=> GAVIAS_WELOWE_PLUGIN_URL . 'elementor/assets/images/brand.png' )
						  ),
					 ),
				]
		  );
		  $this->add_control(
				'style',
				array(
					 'label'   => esc_html__( 'Style', 'welowe-themer' ),
					 'type'    => Controls_Manager::SELECT,
					 'default' => 'style-1',
					 'options' => [
						'style-1' => esc_html__('Style I', 'welowe-themer'),
						'style-2' => esc_html__('Style II', 'welowe-themer')
					 ]
				)
		  );
		  $this->add_group_control(
				Elementor\Group_Control_Image_Size::get_type(),
				[
					 'name'      => 'image', 
					 'default'   => 'full',
					 'separator' => 'none',
				]
		  );

		  $this->end_controls_section();

		  $this->add_control_carousel(false);


		  // Image Styling
		  $this->start_controls_section(
				'section_style_image',
				[
					 'label'     => __('Image', 'welowe-themer'),
					 'tab'       => Controls_Manager::TAB_STYLE,
				]
		  );
		  $this->add_group_control(
				Group_Control_Border::get_type(),
				[
					 'name'      => 'image_border',
					 'selector'  => '{{WRAPPER}} .gva-brand-carousel .brand-item-content img',
					 'separator' => 'before',
				]
		  );

		$this->add_control(
			'image_border_radius',
			[
				'label'      => __('Border Radius', 'welowe-themer'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors'  => [
					'{{WRAPPER}} .gva-brand-carousel .brand-item-content img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
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

$widgets_manager->register(new GVAElement_Brand());

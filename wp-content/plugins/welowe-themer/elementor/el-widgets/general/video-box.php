<?php
if(!defined('ABSPATH')){ exit; }

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Image_Size;

class GVAElement_Video_Box extends GVAElement_Base {  
	const NAME = 'gva-video-box';
   const TEMPLATE = 'general/video-box';
   const CATEGORY = 'welowe_general';

   public function get_categories(){
      return array(self::CATEGORY);
   }
    
   public function get_name(){
      return self::NAME;
   }

	public function get_title() {
		return __( 'Video Box', 'welowe-themer' );
	}

	public function get_keywords() {
		return [ 'video', 'box' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_icon',
			[
				'label' => __( 'Content', 'welowe-themer' ),
			]
		);
		$this->add_control(
			'title_text',
			[
				'label' => __( 'Title', 'welowe-themer' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Your Title', 'welowe-themer' ),
				'label_block' => true
			]
		);
		$this->add_control(
			'title_right',
			[
				'label' => __( 'Title Right', 'welowe-themer' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Your Title', 'welowe-themer' ),
				'label_block' => true,
				'condition' => [
					'style' => ['style-1']
				]
			]
		);
		$this->add_control(
			'style',
			[
				'label' => __( 'style', 'welowe-themer' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'style-1' 		=> __( 'Style I', 'welowe-themer' ),
					'style-2' 		=> __( 'Style II', 'welowe-themer' ),
					'style-3' 		=> __( 'Style III', 'welowe-themer' ),
				],
				'default' => 'style-1',
			]
		);

		$this->add_control(
			'image',
			[
				'label' => __( 'Image', 'welowe-themer' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
               'url' => GAVIAS_WELOWE_PLUGIN_URL . 'elementor/assets/images/image-video.jpg',
				],
				'condition' => [
					'style' => ['style-1', 'style-3']
				]
			]
		);

		$this->add_control(
			'link',
			[
				'label' => __( 'Link Video (Youtube/Vimeo)', 'welowe-themer' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'welowe-themer' ),
				'separator' => 'before',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_box_style',
			[
				'label' => __( 'Box Style', 'welowe-themer' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'box_primary_color',
			[
				'label' => __( 'Primary Color', 'welowe-themer' ),
				'type' => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .video-one__action .popup-video' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .video-one__action .popup-video::before, .video-one__action .popup-video::after' => 'border-color: {{VALUE}}!important;',
					'{{WRAPPER}} .video-two__action .popup-video' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .video-two__action .popup-video::before, .video-two__action .popup-video::after' => 'border-color: {{VALUE}}!important;',
				],
			]
		);
		$this->add_control(
			'box_second_color',
			[
				'label' => __( 'Second Color', 'welowe-themer' ),
				'type' => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .video-one__action .popup-video, {{WRAPPER}} .video-two__action .popup-video' => 'color: {{VALUE}};',
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

		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'welowe-themer' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .video-one__single .video-one__title,
					 {{WRAPPER}} .video-two__single .video-two__title,
					 {{WRAPPER}} .video-three__single .video-three__title, 
					 {{WRAPPER}} .video-one__single .video-one__title-second,
					 {{WRAPPER}} .video-two__single .video-two__title-second,
					 {{WRAPPER}} .video-three__single.video-one__title-second' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .video-one__single .video-one__title,
					 {{WRAPPER}} .video-two__single .video-two__title,
					 {{WRAPPER}} .video-three__single .video-three__title,
					 {{WRAPPER}} .video-one__single .video-one__title-second,
					 {{WRAPPER}} .video-two__single .video-two__title-second,
					 {{WRAPPER}} .video-three__single.video-one__title-second',
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

$widgets_manager->register(new GVAElement_Video_Box());

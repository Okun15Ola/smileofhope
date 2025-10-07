<?php
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

class GVAElement_Post_Tags extends GVAElement_Base{
	 const NAME = 'gva_post_tags';
	 const TEMPLATE = 'dynamic-tags/post-tags';
	 const CATEGORY = 'welowe_post';

	 public function get_categories(){
		  return array(self::CATEGORY);
	 }
	 
	 public function get_name(){
		  return self::NAME;
	 }

	 public function get_title(){
		  return esc_html__('Post Tag', 'welowe-themer');
	 }

	 public function get_keywords() {
		  return [ 'post', 'tag'];
	 }
	 
	 protected function register_controls(){
		  //--
		$this->start_controls_section(
			self::NAME . '_content',
			[
				'label' => esc_html__('Content', 'welowe-themer'),
			]
		);

		$this->add_control(
			'title_text',
			[
				'label'        => esc_html__( 'Title', 'welowe-themer' ),
				'type'         => Controls_Manager::TEXT,
				'placeholder'  => esc_html__( 'Enter your title', 'welowe-themer' ),
				'default'      => esc_html__( 'Tags', 'welowe-themer' ),
				'label_block'  => true
			]
		);

		$this->add_control(
			'heading_style_title',
			[
				'label' => esc_html__( 'Style Title Text', 'welowe-themer' ),
				'type' => Controls_Manager::HEADING
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Text Color', 'welowe-themer' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .welowe-post-tags .title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .welowe-post-tags .title',
			]
		);

		$this->end_controls_section();
	 }


	 protected function render(){
		  parent::render();

		  $settings = $this->get_settings_for_display();
		  printf( '<div class="gva-element-%s gva-element">', $this->get_name() );
				include $this->get_template(self::TEMPLATE . '.php');
		  print '</div>';
	 }
}

$widgets_manager->register(new GVAElement_Post_Tags());

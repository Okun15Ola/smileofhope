<?php
if (!defined('ABSPATH')) { exit; }

use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;

class GVAElement_GiveWP_Item_Social_Share extends GVAElement_Base{
		
	const NAME = 'gva_givewp_item_social_share';
	const TEMPLATE = 'givewp/item-social-share';
	const CATEGORY = 'welowe_givewp';

	public function get_categories() {
		return array(self::CATEGORY);
	}

	public function get_name() {
		return self::NAME;
	}

	public function get_title() {
		return __('GiveWP - Item Social Share', 'welowe-themer');
	}

	public function get_keywords() {
		return [ 'givewp', 'item', 'share', 'social' ];
	}

	public function get_script_depends() {
		return array(
			'social-share'
		);
	}

	public function get_style_depends() {
		return array();
	}

	protected function register_controls() {
		 
		$this->start_controls_section(
			self::NAME . '_content',
			[
				'label' => __('Content', 'welowe-themer'),
			]
		);

		$this->add_control(
         'title_text',
         [
            'label' => __( 'Title', 'welowe-themer' ),
            'type' => Controls_Manager::TEXT,
            'placeholder' => __( 'Enter your title', 'welowe-themer' ),
            'default' => __( 'Share', 'welowe-themer' ),
            'label_block' => true
         ]
      );

		$this->add_control(
			'show_title',
			[
				'label' => __( 'Show Title', 'welowe-themer' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes'
			]
		);

		$this->add_control(
			'facebook',
			[
				'label' => __( 'Facebook', 'welowe-themer' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes'
			]
		);
		$this->add_control(
			'twitter',
			[
				'label' => __( 'Twitter', 'welowe-themer' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes'
			]
		);
		$this->add_control(
			'pinterest',
			[
				'label' => __( 'Pinterest', 'welowe-themer' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes'
			]
		);
		$this->add_control(
			'linkedin',
			[
				'label' => __( 'Linkedin', 'welowe-themer' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes'
			]
		);
		$this->add_control(
			'tumblr',
			[
				'label' => __( 'Tumblr', 'welowe-themer' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes'
			]
		);
		$this->add_control(
			'blogger',
			[
				'label' => __( 'Blogger', 'welowe-themer' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes'
			]
		);
		$this->add_control(
			'delicious',
			[
				'label' => __( 'Delicious', 'welowe-themer' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes'
			]
		);
		$this->add_control(
			'digg',
			[
				'label' => __( 'Digg', 'welowe-themer' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes'
			]
		);
		$this->add_control(
			'reddit',
			[
				'label' => __( 'Reddit', 'welowe-themer' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes'
			]
		);
		$this->add_control(
			'stumbleupon',
			[
				'label' => __( 'Stumbleupon', 'welowe-themer' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes'
			]
		);
		$this->add_control(
			'pocket',
			[
				'label' => __( 'Pocket', 'welowe-themer' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes'
			]
		);
		$this->add_control(
			'wordpress',
			[
				'label' => __( 'Wordpress', 'welowe-themer' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes'
			]
		);
		$this->add_control(
			'whatsapp',
			[
				'label' => __( 'Whatsapp', 'welowe-themer' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes'
			]
		);

		$this->end_controls_section();

	}

	 protected function render(){
			parent::render();

			$settings = $this->get_settings_for_display();
			printf( '<div class="welowe-%s welowe-element">', $this->get_name() );
				 include $this->get_template(self::TEMPLATE . '.php');
			print '</div>';
	 }
}

$widgets_manager->register(new GVAElement_GiveWP_Item_Social_Share());

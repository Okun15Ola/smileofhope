<?php
if (!defined('ABSPATH')) { exit; }

use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;

class GVAElement_Product_Related extends GVAElement_Base{
    
   const NAME = 'gva-product-item-related';
   const TEMPLATE = 'product/item-related';
   const CATEGORY = 'welowe_woocommerce';

   public function get_categories() {
      return array(self::CATEGORY);
   }

   public function get_name() {
      return self::NAME;
   }

   public function get_title() {
      return __('Product Item Related', 'welowe-themer');
   }

   public function get_keywords() {
      return [ 'product', 'item', 'related' ];
   }

   public function get_script_depends() {
      return [
         'swiper',
         'gavias.elements',
      ];
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
         'posts_per_page',
         [
            'label' => __( 'Products Per Page', 'welowe-themer' ),
            'type' => Controls_Manager::NUMBER,
            'default' => 4,
            'range' => [
               'px' => [
                  'max' => 20,
               ],
            ],
         ]
      );

      $this->add_control(
         'orderby',
         [
            'label' => __( 'Order By', 'welowe-themer' ),
            'type' => Controls_Manager::SELECT,
            'default' => 'date',
            'options' => [
               'date' => __( 'Date', 'welowe-themer' ),
               'title' => __( 'Title', 'welowe-themer' ),
               'price' => __( 'Price', 'welowe-themer' ),
               'popularity' => __( 'Popularity', 'welowe-themer' ),
               'rating' => __( 'Rating', 'welowe-themer' ),
               'rand' => __( 'Random', 'welowe-themer' ),
               'menu_order' => __( 'Menu Order', 'welowe-themer' ),
            ]
         ]
      );

      $this->add_control(
         'order',
         [
            'label' => __( 'Order', 'welowe-themer' ),
            'type' => Controls_Manager::SELECT,
            'default' => 'desc',
            'options' => [
               'asc' => __( 'ASC', 'welowe-themer' ),
               'desc' => __( 'DESC', 'welowe-themer' ),
            ]
         ]
      );

      $this->add_control(
         'show_heading',
         [
            'label' => __( 'Heading', 'welowe-themer' ),
            'type' => Controls_Manager::SWITCHER,
            'label_off' => __( 'Hide', 'welowe-themer' ),
            'label_on' => __( 'Show', 'welowe-themer' ),
            'default' => 'yes',
            'return_value' => 'yes',
            'prefix_class' => 'wlshow-heading-',
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

$widgets_manager->register(new GVAElement_Product_Related());

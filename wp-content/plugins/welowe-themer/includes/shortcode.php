<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

final class Welowe_Themer_Shortcode{

   private static $_instance = null;
   public static function instance() {
      if ( is_null( self::$_instance ) ) {
         self::$_instance = new self();
      }
      return self::$_instance;
   }
   public function __construct() { 
      add_shortcode('welowe-template', [ $this, 'shortcode_template_elementor' ] );
   }

   public function shortcode_template_elementor($atts){
      if(!class_exists('Elementor\Plugin')){
         return '';
      }
      if(!isset($atts['id']) || empty($atts['id'])){
         return '';
      }

      $post_id = $atts['id'];
      $response = \Elementor\Plugin::instance()->frontend->get_builder_content_for_display($post_id);
      return $response;
   }
}

Welowe_Themer_Shortcode::instance();

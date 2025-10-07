<?php
function welowe_custom_color_theme(){
   $color_link                = welowe_get_option('color_link', '');
   $color_link_hover          = welowe_get_option('color_link_hover', '');
   $color_heading             = welowe_get_option('color_heading', '');
   $footer_bg_color           = welowe_get_option('footer_bg_color', '');
   $footer_color              = welowe_get_option('footer_color', '');
   $footer_color_link         = welowe_get_option('footer_color_link', '');
   $footer_color_link_hover   = welowe_get_option('footer_color_link_hover', '');
   $nfpage_image_width        = welowe_get_option('nfpage_image_width', '');

   $main_font = false;
   $main_font_enabled = ( welowe_get_option('main_font_source', 0) == 0 ) ? false : true;
   if ( $main_font_enabled ) {
      $font_main = welowe_get_option('main_font', '');
      if(isset($font_main['font-family']) && $font_main['font-family']){
         $main_font = $font_main['font-family'];
      }
   }

   $secondary_font = false;
   $secondary_font_enabled = ( welowe_get_option('secondary_font_source', 0) == 0 ) ? false : true;
   if ( $secondary_font_enabled ) {
      $font_second = welowe_get_option('secondary_font', '');
      if(isset($font_second['font-family']) && $font_second['font-family']){
         $secondary_font = $font_second['font-family'];
      }
   }
   ob_start();
   ?>

   :root{

      <?php if( !empty($color_link) ){ ?>
         --welowe-link-color: <?php echo esc_attr($color_link) ?>;
      <?php } ?> 

      <?php if( !empty($color_link_hover) ){ ?>
         --welowe-link-hover-color: <?php echo esc_attr($color_link_hover) ?>;
      <?php } ?> 

      <?php if( !empty($color_heading) ){ ?>
         --welowe-heading-color: <?php echo esc_attr($color_heading) ?>;
      <?php } ?> 

      <?php if( !empty($link_color) ){ ?>
         --welowe-font-sans-serif: "Kumbh Sans", sans-serif; 
      <?php } ?> 

      <?php if ( $main_font_enabled && isset($main_font) && $main_font ){ ?>
         --welowe-font-sans-serif:<?php echo esc_attr( $main_font ); ?>,sans-serif;
      <?php } ?>   

      <?php if ( $secondary_font_enabled && isset($secondary_font) && $secondary_font ){ ?>
         --welowe-heading-font-family :<?php echo esc_attr( $secondary_font ); ?>, sans-serif;
      <?php } ?>

      <?php if( !empty($footer_bg_color) ){ ?>
         --welowe-footer-bg-color: <?php echo esc_attr($footer_bg_color) ?>;
      <?php } ?>   
      
      <?php if( !empty($footer_color) ){ ?>
         --welowe-footer-color: <?php echo esc_attr($footer_color) ?>;
      <?php } ?>   

      <?php if( !empty($footer_color_link) ){ ?>
         --welowe-footer-color-link: <?php echo esc_attr($footer_color_link) ?>;
      <?php } ?>   

      <?php if( !empty($footer_color_link_hover) ){ ?>
         --welowe-footer-color-link-hover: <?php echo esc_attr($footer_color_link_hover) ?>;
      <?php } ?>

      <?php if( !empty($nfpage_image_width) ){ ?>
         --welowe-nfpage-image-width: <?php echo esc_attr($nfpage_image_width) ?>px;
      <?php } ?>   

   }

<?php
   $styles = ob_get_clean();
   $styles = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $styles );
   $styles = str_replace( array( "\r\n", "\r", "\n", "\t", '  ', '   ', '    ' ), '', $styles );
   if($styles){
      wp_enqueue_style( 'welowe-custom-style-color', WELOWE_THEME_URL . '/assets/css/custom_script.css');
      wp_add_inline_style( 'welowe-custom-style-color', $styles );
   }
}

add_action('wp_enqueue_scripts', 'welowe_custom_color_theme', 99999);
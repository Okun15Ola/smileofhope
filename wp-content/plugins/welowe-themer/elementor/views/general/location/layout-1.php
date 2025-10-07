<?php
   if (!defined('ABSPATH')) {
      exit; // Exit if accessed directly.
   }
   use Elementor\Icons_Manager;
?>

<div class="location-one__single">
   <div class="location-one__wrap">
      <?php 
         echo '<div class="location-one__image">';
            if( isset($settings['image']['url']) && $settings['image']['url'] ){
               echo '<img src="' . esc_url($settings['image']['url']) . '" alt="' . esc_attr($settings['title_text']) . '"/>';
            }
         echo '</div>';
      ?>
      <div class="location-one__locations">
         <?php 
            $i = 0;
            $_rand = wp_rand(5);
            foreach ($settings['location_content'] as $item){
               $i++;
               $image_id = isset($item['image']['id']) && $item['image']['id'] ? $item['image']['id'] : 0; 
               $image_url = isset($item['image']['url']) && $item['image']['url'] ? $item['image']['url'] : '';
               $image_alt = $item['title'];
               if($image_id){
                  $attach_url = wp_get_attachment_image_src( $image_id, $settings['image_size']);
                  if(isset($attach_url[0]) && $attach_url[0]){
                     $image_url = $attach_url[0];
                  }
                  $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
               }

               $classes = 'elementor-repeater-item-'. esc_attr($item['_id']) . ' item-' . esc_attr($i);
               echo '<div class="location-one__item ' . $classes . '">';
                  echo '<div class="location-one__map-marker"></div>';
                  echo '<div class="location-one__item-box">';
                     echo '<div class="location-one__item-popup">';
                        echo '<div class="location-one__item-content">';
                           echo '<div class="location-one__item-image">';
                              echo '<img src="' . esc_url($image_url) . '" alt="' . esc_html($image_alt) . '" />';
                           echo '</div>'; 
                           echo '<div class="location-one__content">';
                              echo '<div class="location-one__title">' . $item['title'] . '</div>';
                              if(!empty($item['link']['url'])){
                                 $this->add_link_attributes('link_' . $_rand, $item['link']);
                                 echo '<a class="location-one__link" ' . $this->get_render_attribute_string( 'link_' . $_rand ) . '>';
                                    echo esc_html__( 'View Detail', 'welowe-themer' ); 
                                    echo '<i class="fas fa-paper-plane"></i>';
                                 echo '</a>';
                              }
                           echo '</div>';   
                        echo '</div>';
                     echo '</div>';
                  echo '</div>';   
               echo '</div>';
            }
         ?>
      </div>
   </div>
</div>

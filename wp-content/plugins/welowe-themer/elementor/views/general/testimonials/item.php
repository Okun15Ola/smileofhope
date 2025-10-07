<?php 
use Elementor\Icons_Manager;
   
$has_icon = ! empty( $item['selected_icon']['value']); 
$style = $settings['style'];
$avatar = (isset($item['testimonial_image']['url']) && $item['testimonial_image']['url']) ? $item['testimonial_image']['url'] : '';
?>
<div class="testimonial-item <?php echo esc_attr($style) ?> elementor-repeater-item-<?php echo $item['_id'] ?>">
   
   <?php if( $style == 'style-1'){ ?>
      <div class="testimonial-one__single">
          <?php 
            if($avatar){ 
               echo '<div class="testimonial-one__image">';
                  echo '<img ' . $this->welowe_get_image_size($avatar) . ' src="' . esc_url($avatar) . '" alt="' . $item['testimonial_name'] . '" />';
               echo '</div>';
            }
         ?>
         <span class="testimonial-one__quote-icon"><i class="fas fa-quote-right"></i></span>
         <div class="testimonial-one__content">
            <div class="testimonial-one__quote">
               <?php echo esc_html($item['testimonial_content']); ?>
            </div>
            <div class="testimonial-one__meta">
               <div class="testimonial-one__information">
                  <span class="testimonial-one__name"><?php echo $item['testimonial_name']; ?></span>
                  <span class="testimonial-one__job"><?php echo $item['testimonial_job']; ?></span>
               </div>
               <div class="testimonial-one__stars">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
               </div>
            </div>
         </div>
      </div>   
   <?php } ?>  

   <?php if( $style == 'style-2'){ ?>
      <div class="testimonial-two__single">
         <div class="testimonial-two__wrap">
            <div class="testimonial-two__content">
               <div class="testimonial-two__meta">
                  <?php 
                     if($avatar){ 
                        echo '<div class="testimonial-two__image">';
                           echo '<img ' . $this->welowe_get_image_size($avatar) . ' src="' . esc_url($avatar) . '" alt="' . $item['testimonial_name'] . '" />';
                        echo '</div>';
                     }
                  ?>
                  <div class="testimonial-two__stars">
                     <i class="fa fa-star"></i>
                     <i class="fa fa-star"></i>
                     <i class="fa fa-star"></i>
                     <i class="fa fa-star"></i>
                     <i class="fa fa-star"></i>
                  </div>  
               </div>
               <div class="testimonial-two__quote">
                  <?php echo $item['testimonial_content']; ?>
               </div>
               <div class="testimonial-two__bottom">
                  <div class="testimonial-two__info">
                     <h4 class="testimonial-two__name"><?php echo $item['testimonial_name']; ?></h4>
                     <div class="testimonial-two__job"><?php echo $item['testimonial_job']; ?></div>
                  </div>
                  <span class="testimonial-two__quote-icon"><i class="fas fa-quote-right"></i></span>
               </div>
            </div>
         </div>
      </div>
   <?php } ?> 

   <?php if( $style == 'style-3'){ ?>
      <div class="testimonial-three__single">
         <div class="testimonial-three__content">
            <span class="testimonial-three__quote-icon"><i class="fas fa-quote-left"></i></span>
            <div class="testimonial-three__quote">
               <?php echo $item['testimonial_content']; ?>
            </div>
            <div class="testimonial-three__meta">
               <?php 
                  if($avatar){ 
                     echo '<div class="testimonial-three__image">';
                        echo '<img ' . $this->welowe_get_image_size($avatar) . ' src="' . esc_url($avatar) . '" alt="' . $item['testimonial_name'] . '" />';
                     echo '</div>';
                  }
               ?>
               <div class="testimonial-three__info">
                  <h4 class="testimonial-three__name"><?php echo $item['testimonial_name']; ?></h4>
                  <div class="testimonial-three__job"><?php echo $item['testimonial_job']; ?></div>
               </div>   
            </div>
         </div>
      </div>  
   <?php } ?>  

</div>


<?php
   if (!defined('ABSPATH')){ exit; }

   global $welowe_post;
   if( !$welowe_post || $welowe_post->post_type != 'product' ||  !$welowe_post->post_excerpt ){ return; }
   
   $post_id = $welowe_post->ID;
   $this->add_render_attribute('block', 'class', [ 'cf-item-social-share' ]);
?>

<div <?php echo $this->get_render_attribute_string( 'block' ) ?>>
   <?php wpcf_function()->template('include/social-share'); ?>
</div>
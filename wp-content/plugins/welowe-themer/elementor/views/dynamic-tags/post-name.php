<?php
   if (!defined('ABSPATH')) {
      exit; 
   }
   global $welowe_post;
   if (!$welowe_post){
      return;
   }
   $html_tag = $settings['html_tag'];
?>

<div class="welowe-post-title">
   <<?php echo esc_attr($html_tag) ?> class="post-title">
      <span><?php echo get_the_title($welowe_post) ?></span>
   </<?php echo esc_attr($html_tag) ?>>
</div>   
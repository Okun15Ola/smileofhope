<?php
   if (!defined('ABSPATH')) {
      exit; 
   }
   global $welowe_post;
   if (!$welowe_post){
      return;
   }
?>

<?php 
   $thumbnail_size = $settings['welowe_image_size'];

   if(has_post_thumbnail($welowe_post)){
      echo get_the_post_thumbnail($welowe_post, $thumbnail_size);
   }
?>


<?php
   if (!defined('ABSPATH')) {
      exit; 
   }
   global $welowe_post;
   if (!$welowe_post){
      return;
   }

   $author_id = get_post_field('post_author', $welowe_post->ID);

   ?>
   <a href="<?php echo get_author_posts_url($author_id) ?>">
      <?php echo get_avatar( $author_id, 64); ?>
   </a>
 



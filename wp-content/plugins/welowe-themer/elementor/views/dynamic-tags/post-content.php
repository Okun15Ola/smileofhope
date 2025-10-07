<?php
   if (!defined('ABSPATH')) {
      exit; 
   }
   global $welowe_post;
   if (!$welowe_post){
      return;
   }
   ?>
   
   <div class="post-content">
         <?php 
            echo apply_filters ('the_content', $welowe_post->post_content); 
         ?>
   </div>      


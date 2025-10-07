<?php
   if (!defined('ABSPATH')){ exit; }

   global $welowe_post, $post;

   if(!$welowe_post){ return; }
   $post = $welowe_post;
?>
   
<div class="post-comment">
   <?php
      if(comments_open($welowe_post->ID)){
         comments_template();
      }else{
         if(\Elementor\Plugin::$instance->editor->is_edit_mode()){
            echo '<div class="alert alert-info">' . esc_html__('This Post Disabled Comment', 'welowe-themer') . '</div>';
         }
      }
   ?>
</div>      


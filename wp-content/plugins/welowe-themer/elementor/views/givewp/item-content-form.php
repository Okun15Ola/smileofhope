<?php
   if (!defined('ABSPATH')){ exit; }
  
   global $welowe_post;

   if (!$welowe_post){ return; }

   if ($welowe_post->post_type != 'give_forms'){ return;}

   $form_id = $welowe_post->ID;

   $args = array(
      'show_title' => $settings['show_title'],
      'id'         => $form_id
   )
?>

<div class="givewp-content-form">
   <?php echo give_form_shortcode($args); ?>
</div>


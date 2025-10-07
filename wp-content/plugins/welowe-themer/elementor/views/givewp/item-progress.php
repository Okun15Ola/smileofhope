<?php
   if (!defined('ABSPATH')){ exit; }

   global $welowe_post;
   if( !$welowe_post ){ return; }
   if( $welowe_post->post_type != 'give_forms' ){ return; }

   $form_id = $welowe_post->ID;
   $form = new Give_Donate_Form( $form_id );
   $progress_stats = give_goal_progress_stats($form);
   $income = 0;
   $goal = '';

   $goal_option = give_get_meta( $form_id, '_give_goal_option', true );
   if($goal_option == 'disabled' || !$goal_option){
      $goal = 'unlimited';
      $progress = 100;
      $income = isset($progress_stats['actual']) ? $progress_stats['actual'] : 0;
   }

   if($goal == 'unlimited'){
      $progress_label = esc_html__( 'unlimited' , 'welowe-themer' );
      $progress = 100;
   }else{
      $progress = isset($progress_stats['progress']) ? $progress_stats['progress'] : 100;
      $progress_label = $progress . '%';
      $income = isset($progress_stats['actual']) ? $progress_stats['actual'] : 0;
      $goal = isset($progress_stats['goal']) ? $progress_stats['goal'] : 0;
      if($progress > 100) $progress = 100;
   }

   $percent = $progress;

   $size = $settings['size'];
   $thickness = $settings['thickness'];
   $empty_fill = !empty($settings['empty_fill']) ? $settings['empty_fill'] : '#E7E4DF';
   $color = !empty($settings['color']) ? $settings['color'] : '#E36955';

   

   $this->add_render_attribute('block', 'class', [ 'givewp-item-progress', $settings['style'] ]);
?>

<?php if($settings['style'] == 'style-1'){ ?>
   <div <?php echo $this->get_render_attribute_string( 'block' ) ?>>
      <div class="givewp-progress-information">
         <div class="funded">
            <div class="progress give__progress">
               <div class="give__progress-bar progress-bar" data-progress-animation="<?php echo esc_attr($progress)?>%">
                  <span class="percentage"><span></span></span>
                  <div class="progress-label"><?php echo esc_html($progress_label); ?></div>
               </div>
            </div>
         </div>
         <div class="campaign-values">
            <div class="campaign-goal"> 
               <span class="value"><?php echo esc_html($goal) ?></span>
               <span class="label"><?php echo esc_html__('Goal', 'welowe-themer') ?></span> 
            </div>
            <div class="campaign-raised">
               <span class="value"><?php echo esc_html($income) ?></span>
               <span class="label"><?php echo esc_html__('Raised', 'welowe-themer') ?></span> 
            </div>
         </div>
      </div>
   </div>
<?php } ?>

<!-- Style II -->
<?php if($settings['style'] == 'style-2'){ 
   $value = $percent ? $percent/100 : 0; 
?>
   <div <?php echo $this->get_render_attribute_string( 'block' ) ?>>
      <div class="content-inner">
         <div class="box-left">
            <div class="circle-progress" data-value="<?php echo esc_attr($value); ?>"  data-thickness="<?php echo $thickness ?>" data-empty-fill="<?php echo $empty_fill ?>" data-lineCap="square" data-size="<?php echo esc_attr($size) ?>" data-fill="{ &quot;color&quot;: &quot;<?php echo $color ?>&quot; }">
               <strong></strong>
            </div>
         </div>
         <div class="box-right">
            <div class="content-item">
               <span class="title"><?php echo esc_html__('Current', 'welowe-themer') ?></span>
               <span class="value"><?php echo esc_html($income) ?></span>
            </div>
            <div class="content-item">
               <span class="title"><?php echo esc_html__('Target', 'welowe-themer') ?></span>
               <span class="value"><?php echo esc_html($goal) ?></span>
            </div>
         </div>   
      </div>   
   </div>
<?php } ?>
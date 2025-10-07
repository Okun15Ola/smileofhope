<?php
   $form_id = get_the_ID();
   $form = new Give_Donate_Form( $form_id );
   $goal = apply_filters( 'give_goal_amount_target_output', $form->goal, $form_id, $form );
   $goal_option = give_get_meta( $form_id, '_give_goal_option', true );
   $progress = 0;
   $income = apply_filters( 'give_goal_amount_raised_output', $form->get_earnings(), $form_id, $form );
   $income = empty($income) ? 0 : $income;

   if($goal_option == 'disabled' || !$goal_option){
      $goal = 'unlimited';
      $progress = 100;
      $income = give_currency_filter(give_format_amount( $income, array( 'sanitize' => false ) ));
   }

  if($goal == 'unlimited'){
      $progress_label = esc_html__( '100%' , 'welowe' );
      $progress = 100;
      $togo = esc_html__("Unlimited", 'welowe');
  }else{
      $progress = apply_filters( 'give_goal_amount_funded_percentage_output', round( ( $income / $goal ) * 100, 1 ), $form_id, $form );
      $progress_label = $progress . '%';
      $income = give_currency_filter(give_format_amount( $income, array( 'sanitize' => false ) ));
      $goal = give_currency_filter(give_format_amount( $goal, array( 'sanitize' => false ) ));
      if($progress > 100) $progress = 100;
  }

   $post_category = ''; $separator = ' '; $output = '';
   $item_cats = get_the_terms( get_the_ID(), 'give_forms_category' );
   if(!empty($item_cats) && !is_wp_error($item_cats)){
      foreach((array)$item_cats as $item_cat){
         $output .= '<a href="' . esc_url(get_category_link( $item_cat->term_id )) . '" title="' . esc_attr( sprintf( esc_attr__( "View all campaign in %s", 'welowe' ), $item_cat->name ) ) . '">'.$item_cat->name.'</a>'.$separator;
      }
      $post_category = trim($output, $separator);
   }
   $sale = give_get_meta( $form_id, '_give_form_sales', true );
   $sale = empty($sale) ? '0': $sale;
   $thumbnail = (isset($thumbnail_size) && $thumbnail_size) ? $thumbnail_size : 'welowe_medium';
   $excerpt_words = (isset($excerpt_words) && $excerpt_words) ? $excerpt_words : '30';
?> 

<div class="give-five__single">
   <div class="give-five__image">
      <?php if ( has_post_thumbnail() ) { ?>
         <a class="link-content" href="<?php esc_url(the_permalink()) ?>"><?php the_post_thumbnail( $thumbnail ); ?></a>
      <?php } else { ?>
         <a class="link-content" href="<?php esc_url(the_permalink()) ?>"><img src="<?php echo esc_url(get_template_directory_uri() . '/images/no-image.jpg'); ?>" alt="<?php echo the_title_attribute() ?>"/></a>
      <?php } ?>

      <a href="<?php echo get_permalink(); ?>" class="give-five__overlay"></a>

      <div class="give-five__categories">
         <?php echo html_entity_decode($post_category) ?>
      </div> 

   </div>

   <div class="give-five__content">
      <?php get_template_part( 'give/part', 'media' ); ?>
      
      <h2 class="give-five__title"><a href="<?php esc_url(the_permalink()) ?>"><?php the_title() ?></a></h2>

      <?php 
         $progress_class = $progress < 10 ? 'percent-small' : 'percent-default';
         $progress_class .= ($progress == 0 ? ' percent-0' : '');
      ?>
      <div class="give-five__raised">
         <div class="give-five__total_raised">
            <span class="give-five__raised-value"><?php echo esc_html($income); ?></span>
            <span class="give-five__raised-label"><?php echo esc_html__('raised of ', 'welowe') ?></span>
            <span class="give-five__goal"><?php echo esc_html($goal); ?></span>
         </div>
         <div class="give-five__percent-raised"><?php echo esc_html($progress_label); ?></div>
      </div>
      <div class="give-five__progress">
         <div class="progress">
            <div class="progress-bar" data-progress-animation="<?php echo esc_attr($progress)?>%">
               <span class="percentage"><span></span></span>
            </div>
         </div>
      </div>
   </div>   
</div>

      

<?php 
   global $post;

   $thumbnail = (isset($thumbnail_size) && $thumbnail_size) ? $thumbnail_size : 'post-thumbnail';
   $excerpt_words = (isset($excerpt_words) && $excerpt_words) ? $excerpt_words : '0';

   $desc = welowe_limit_words($excerpt_words, get_the_excerpt(), '');

   $meta_classes = 'post-two__meta';
   if(empty(get_the_date())){
      $meta_classes = 'post-two__meta schedule-date';
   }
   $content_classes = 'post-two__content';
   $content_classes .= has_post_thumbnail() ? ' has-thumbnail' : ' has-no-thumbnail';
?>

<article <?php post_class('post post-two__single'); ?>>
   <div class="post-two__content-wrap">
      <?php if(has_post_thumbnail()){ ?>
         <div class="post-two__thumbnail">
            <a href="<?php echo esc_url( get_permalink() ) ?>">
               <?php the_post_thumbnail( $thumbnail, array( 'alt' => get_the_title() ) ); ?>
            </a>
            <?php if( get_the_date() ){
                  echo '<div class="post-two__entry-date">';
                     echo '<span class="date">' . esc_html( get_the_date('d')) . '</span>';
                     echo '<span class="month">' . esc_html( get_the_date('M')) . '</span>';
                  echo '</div>';
               }
            ?>
         </div>   
      <?php } ?>
      <div class="<?php echo esc_attr($content_classes) ?>">
         <div class="<?php echo esc_attr($meta_classes) ?>">
            <?php welowe_posted_on(); ?>
         </div> 
         <h3 class="post-two__title">
            <a href="<?php echo esc_url( get_permalink() ) ?>" rel="bookmark"><?php the_title() ?></a>
         </h3>
         <?php 
            if($desc){ 
               echo '<div class="post-two__desc">';
                  echo esc_html($desc);
               echo '</div>';   
            } 
         ?>
         <a class="post-two__read-more" href="<?php echo esc_url( get_permalink() ) ?>">
            <i class="fas fa-angle-double-right"></i> 
         </a>
      </div>
   </div>     
</article>
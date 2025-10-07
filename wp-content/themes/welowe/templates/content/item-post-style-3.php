<?php 
   $thumbnail = isset($thumbnail_size) && $thumbnail_size ? $thumbnail_size : 'post-thumbnail';
?>

<article <?php post_class('post post-three__single'); ?>>
   <div class="post-three__thumbnail" style="background-image:url('<?php echo get_the_post_thumbnail_url(get_the_ID(), $thumbnail) ?>');"></div>   
   <div class="post-three__wrap">
      <div class="post-three__content">
         <?php if( get_the_date() ){
               echo '<div class="post-three__entry-date">';
                  echo '<span class="date">' . esc_html( get_the_date('d')) . '</span>';
                  echo '<span class="month">' . esc_html( get_the_date('M')) . '</span>';
               echo '</div>';
            }
         ?>
         <div class="post-three__content-inner">
            <div class="post-three__meta">
               <?php welowe_posted_on(); ?>
            </div> 
            <h2 class="post-three__title">
               <a href="<?php echo esc_url( get_permalink() ) ?>"><?php the_title() ?></a>
            </h2>
         </div>
      </div>
   </div>
   <a href="<?php echo esc_url( get_permalink() ) ?>" class="post-three__link-overlay"></a>
</article>   

  
<?php
    defined( 'ABSPATH' ) || exit;

    if (!defined('ABSPATH')){ exit; }

    global $welowe_post;

    if (!$welowe_post){ return; }

    if ($welowe_post->post_type != 'give_forms'){ return;}

    $post_id = $welowe_post->ID;

    $description = apply_filters( 'the_excerpt', get_post_field('post_excerpt', $post_id) );
    $post_thumbnail_url = '';
    if ( has_post_thumbnail() ) {
        $post_thumbnail_id = get_post_thumbnail_id( $post_id );
        $post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
    }
?>

<div class="give-form-socials-share widget">
    <?php 
        if( $settings['show_title'] && $settings['title_text'] ){ 
            echo '<h3 class="widget-title"><span>' . $settings['title_text'] . '</span></h3>';
        }
    ?>
    <div class="widget-content">
        <div class="links">
            <?php if($settings['facebook']){ ?>
                <a href="javascript:void(0)" class="givewp-share s_facebook"><i class="welowe-icon welowe-icon-facebook"></i></a>
            <?php } ?>
            <?php if($settings['twitter']){ ?>
                <a href="javascript:void(0)" class="givewp-share s_twitter"><i class="welowe-icon welowe-icon-twitter"></i></a>
            <?php } ?>
            <?php if($settings['pinterest']){ ?>
                <a href="javascript:void(0)" class="givewp-share s_pinterest"><i class="welowe-icon welowe-icon-pinterest"></i></a>
            <?php } ?>
            <?php if($settings['linkedin']){ ?>
                <a href="javascript:void(0)" class="givewp-share s_linkedin"><i class="welowe-icon welowe-icon-linkedin"></i></a>
            <?php } ?>
            <?php if($settings['tumblr']){ ?>
                <a href="javascript:void(0)" class="givewp-share s_tumblr"><i class="welowe-icon welowe-icon-tumblr"></i></a>
            <?php } ?>
            <?php if($settings['blogger']){ ?>
                <a href="javascript:void(0)" class="givewp-share s_blogger"><i class="welowe-icon welowe-icon-blogger"></i></a>
            <?php } ?>
            <?php if($settings['delicious']){ ?>
                <a href="javascript:void(0)" class="givewp-share s_delicious"><i class="welowe-icon welowe-icon-delicious"></i></a>
            <?php } ?>
            <?php if($settings['digg']){ ?>
                <a href="javascript:void(0)" class="givewp-share s_digg"><i class="welowe-icon welowe-icon-digg"></i></a>
            <?php } ?>
            <?php if($settings['reddit']){ ?>
                <a href="javascript:void(0)" class="givewp-share s_reddit"><i class="welowe-icon welowe-icon-reddit"></i></a>
            <?php } ?>
            <?php if($settings['stumbleupon']){ ?>
                <a href="javascript:void(0)" class="givewp-share s_stumbleupon"><i class="welowe-icon welowe-icon-stumbleupon"></i></a>
            <?php } ?>
            <?php if($settings['pocket']){ ?>
                <a href="javascript:void(0)" class="givewp-share s_pocket"><i class="welowe-icon welowe-icon-pocket"></i></a>
            <?php } ?>
            <?php if($settings['wordpress']){ ?>
                <a href="javascript:void(0)" class="givewp-share s_wordpress"><i class="welowe-icon welowe-icon-wordpress"></i></a>
            <?php } ?>
            <?php if($settings['whatsapp']){ ?>
                <a href="javascript:void(0)" class="givewp-share s_whatsapp"><i class="welowe-icon welowe-icon-whatsapp"></i></a>
            <?php } ?>
        </div>
    </div>
</div>

<script type="text/javascript">
    jQuery(document).ready(function($){
        $('.givewp-share').ShareLink({
            title: "<?php echo get_the_title( $post_id ); ?>",
            text: "<?php echo sanitize_title(wp_strip_all_tags($description)); ?>",
            image: "<?php echo $post_thumbnail_url; ?>",
            url: "<?php echo get_permalink( $post_id ); ?>"
        });
    });
</script>
  

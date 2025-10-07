<?php
	if (!defined('ABSPATH')){ exit; }

	global $welowe_post, $post;
	if( !$welowe_post ){ return; }
	if( $welowe_post->post_type != 'product' ){ return; }
   $post_id = $welowe_post->ID;
	if(\Elementor\Plugin::$instance->editor->is_edit_mode() || $post->post_type == 'gva__template'){
      global $product;
      $product = wc_get_product($post_id);
   }
?>

<div class="product-item-price">
	<?php woocommerce_template_single_price() ?>
</div>
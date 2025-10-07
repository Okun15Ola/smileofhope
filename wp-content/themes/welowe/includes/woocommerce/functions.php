<?php 
add_filter('add_to_cart_fragments', 'welowe_woocommerce_header_add_to_cart_fragment');
add_action( 'wp_print_scripts', 'welowe_de_script', 100 );

function welowe_de_script() {
	wp_dequeue_script( 'wc-cart-fragments' );
	return true;
}

function welowe_woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	ob_start();
	welowe_get_cart_contents();
	$fragments['.cart'] = ob_get_clean();
	return $fragments;
}

function welowe_get_cart_contents(){
	global $woocommerce;
	?>
		<div class="cart mini-cart-inner">
			<a class="mini-cart" href="#" title="<?php echo esc_attr__('View your shopping cart', 'welowe'); ?>">
				<span class="title-cart"><i class="icon-welowe-shopping-cart"></i></span>
				<span class="mini-cart-items">
					<?php 
						if(!is_admin()){ 
					 		echo WC()->cart->get_cart_contents_count(); 
					 	}
					?>
				</span>
			</a>
			<div class="minicart-content">
				<?php woocommerce_mini_cart(); ?>
			</div>
			<div class="minicart-overlay"></div>
		</div>
	<?php
}

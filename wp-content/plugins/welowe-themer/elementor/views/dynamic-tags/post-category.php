<?php
	if (!defined('ABSPATH')) {
		exit; 
	}
	global $welowe_post;
	if (!$welowe_post){
		return;
	}
	?>
	
	<div class="post-category">
		<?php 
			if($settings['show_icon']){ 
				echo '<i class="fas fa-folder-open"></i>';
			}
			echo '<span>' . get_the_category_list( ", ", '', $welowe_post->ID ) . '</span>';
		?>
	</div>      


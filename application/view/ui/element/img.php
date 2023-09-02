<?php
	
	if(!empty($src) and is_array($src) ){
		if(!empty($src['function'])){
			switch ($src['function']) {
				case 'wp_get_attachment_url':
					if($src['template']=='the_loop'){
						global $product;
						$src = wp_get_attachment_url($product->get_image_id());;	
					}					
					break;
				
				default:
					break;
			}
		}
		
	}
?>

<img <?php echo (!empty($class) ? 'class="' . esc_attr($class) . '"' : ''); ?> <?php echo (!empty($id) ? 'id="' . esc_attr($id) . '"' : ''); ?> <?php echo (!empty($attr) ? $attr : ''); ?> <?php echo (!empty($src) ? 'src="' . esc_url($src) . '"' : ''); ?> <?php echo (!empty($style) ? 'style="' . esc_attr($style) . '"' : ''); ?> />

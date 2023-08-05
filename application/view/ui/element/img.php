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

<img <?php echo (!empty($class) ? 'class="'.esc_attr($class)/*$class*/.'"':''); ?> <?php echo (!empty($id) ? 'id="'.esc_attr($id)/*$id*/.'"':''); ?> <?php echo (!empty($attr)? esc_attr($attr)/*$attr*/: ''); ?> <?php echo (!empty($src)? 'src="'.esc_attr($src)/*$src*/.'"': ''); ?> <?php echo (!empty($style) ? 'style="'.$style.'"':''); ?> />

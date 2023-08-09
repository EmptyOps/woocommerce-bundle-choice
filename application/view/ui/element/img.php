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

<img <?php echo (!empty($class) ? 'class="'.$class.'"':''); ?> <?php echo (!empty($id) ? 'id="'.$id.'"':''); ?> <?php echo (!empty($attr)? $attr: ''); ?> <?php echo (!empty($src)? 'src="'.$src.'"': ''); ?> <?php echo (!empty($style) ? 'style="'.$style.'"':''); ?> />
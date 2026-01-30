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

<img 
	<?php echo (!empty($class) ? 'class="' . esc_attr($class) . '"' : ''); ?> 
	<?php echo (!empty($id) ? 'id="' . esc_attr($id) . '"' : ''); ?> 
	<?php /*phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- we are not escaping the $attr because it may contain multiple attributes and we do not want esc_attr function to escape the double qoutes(") of the different attribute values. but anyway we understand the security requirement here so we have always escaped the attribute value with the esc_attr from wherever this $attr var is passed*/
	echo (!empty($attr) ? $attr : ''); ?> 

	<?php // echo (!empty($src) ? 'src="' . ( (str_contains($src,'{{data.') && substr($src, -2)  == "}}") ? $src : esc_url($src) ) . '"' : ''); 
	if (!empty($src)) {
		
		echo 'src="';
		
		if ($src == '{{data.src}}') {

			echo '{{data.src}}"';

		} elseif ($src == '{{data.full_src}}') {
			
			echo '{{data.full_src}}"';
		
		} elseif ($src == '{{data.video_src}}') {
			
			echo '{{data.video_src}}"';
		
		} elseif ($src == '{{data.gallery_thumbnail_src}}') {
			
			echo '{{data.gallery_thumbnail_src}}"';
		
		} else {

			echo esc_url($src) . '"';

		}
	}
	?> 
	<?php echo (!empty($style) ? 'style="' . esc_attr($style) . '"' : ''); ?> 
/>


<td class="<?php echo !empty($class) ? esc_attr($class) : ''; ?>" id="<?php echo !empty($id) ? esc_attr($id) : ''; ?>" style="<?php echo !empty($style) ? esc_attr($style) : ''; ?>" <?php /*phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- we are not escaping the $attr because it may contain multiple attributes and we do not want esc_attr function to escape the double qoutes(") of the different attribute values. but anyway we understand the security requirement here so we have always escaped the attribute value with the esc_attr from wherever this $attr var is passed*/!empty($attr) ? _e($attr) : ''; ?>>
	<?php echo !empty($label) ? esc_html($label) : ''; ?>
	<?php 
	    if(!empty($builder) and !empty($child)){
	      $builder->build($child,$option_key,$process_form);
	    }
  	?>
</td>
<td class="<?php !empty($class) ? esc_attr_e($class) : ''; ?>" id="<?php !empty($id) ? esc_attr_e($id) : ''; ?>" style="<?php !empty($style) ? esc_attr_e($style) : ''; ?>" <?php !empty($attr) ? _e($attr) : ''; ?>>
	<?php !empty($label) ? esc_html_e($label) : ''; ?>
	<?php 
	    if(!empty($builder) and !empty($child)){
	      $builder->build($child,$option_key,$process_form);
	    }
  	?>
</td>
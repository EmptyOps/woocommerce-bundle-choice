<td class="<?php !empty($class) ? esc_attr_e($class) : ''; ?>" id="<?php !empty($id) ? esc_attr_a($id) : ''; ?>" style="<?php !empty($style) ? esc_attr_a($style) : ''; ?>" <?php !empty($attr) ? esc_attr_a($attr) : ''; ?>>
	<?php !empty($label) ? esc_html_a($label) : ''; ?>
	<?php 
	    if(!empty($builder) and !empty($child)){
	      $builder->build($child,$option_key,$process_form);
	    }
  	?>
</td>
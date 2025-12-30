<table class="ui <?php !empty($class) ? echo esc_attr($class) : ''; ?> table" id="<?php !empty($id) ? echo esc_attr($id) : ''; ?>" style="<?php !empty($style) ? echo esc_attr($style) : '';?>">
	<?php 
	    if(!empty($builder) and !empty($child)){
	      $builder->build($child,$option_key,$process_form);
	    }
  	?>
</table>
<tr class="<?php !empty($class)?_e($class):''; ?>" id="<?php !empty($id)?_e($id):''; ?>" style="<?php !empty($style)?_e($style):''; ?>">
	<?php 
	    if(!empty($builder) and !empty($child)){
	      $builder->build($child,$option_key,$process_form);
	    }
  	?>
</tr>
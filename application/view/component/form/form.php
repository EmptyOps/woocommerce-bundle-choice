<?php 

/*
*	template to generate form as output by taking $form_html as containing parameters.
*/



if(!empty($form_html) and !empty($id) /*and !empty($title)*/){

	if( !empty($title) ){?>
		<div class="ui vertical segment"><strong><?php echo $title ?></strong></div><?php 
	}
	?>
	<div class="ui vertical padded segment">
		<div class="ui form <?php !empty($class)?$class:''; ?>">
			<form name="<?php !empty($id)?$id:''; ?>" method="" <?php echo !empty($attr)?$attr:'';?>>	  			
	  			<?php echo $form_html; ?>
  			</form>
		</div>
	</div>
	<?php
}

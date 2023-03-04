<select class="form-control<?php echo (!empty($class) ? ' '.$class.'':''); ?>" <?php echo (!empty($id) ? 'id="'.$id.'"':''); ?> <?php echo (!empty($name) ? 'name="'.$name.'"':''); ?> <?php echo (!empty($attr)? $attr: ''); ?> >

	<?php if(!empty($option)){ ?>

			<?php foreach ($option as $option_key => $option_value) {
				?><option value="<?php echo $option_key; ?>"><?php echo $option_value; ?></option><?php
			} 

		}elseif(!empty($child) and !empty($builder)) {

			$builder->build($child);

		}
	?>
	
</select>

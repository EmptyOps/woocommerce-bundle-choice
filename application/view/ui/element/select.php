<select class="form-control<?php echo (!empty($class) ? ' '.esc_attr($class)/*$class*/.'':''); ?>" <?php echo (!empty($id) ? 'id="'.esc_attr($id)/*$id*/.'"':''); ?> <?php echo (!empty($name) ? 'name="'.esc_attr($name)/*$name*/.'"':''); ?> <?php echo (!empty($attr)? esc_attr($attr)/*$attr*/: ''); ?> >

	<?php if(!empty($option)){ ?>

			<?php foreach ($option as $option_key => $option_value) {
				?><option value="<?php echo esc_html($option_key)/*$option_key*/; ?>"><?php echo esc_html($option_value)/*$option_value*/; ?></option><?php
			} 

		}elseif(!empty($child) and !empty($builder)) {

			$builder->build($child, $option_key, $process_form, null, $ui_definition);

		}
	?>
	
</select>

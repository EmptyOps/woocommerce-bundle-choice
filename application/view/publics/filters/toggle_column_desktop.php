<div class="<?php echo esc_attr($width_class)/*$width_class*/; ?>" data-tab-group="<?php _e($tab_set); ?>">
	<p>
		<span class="ui header"><?php echo esc_html($term->name)/*$term->name*/; ?></span>		
	</p>		
	<div class="ui toggle button" id="togle_column_<?php echo esc_attr($term->slug)/*$term->slug*/ ?>" data-toggle_column="<?php echo esc_attr($term->slug)/*$term->slug*/ ?>" style="text-align: center;vertical-align: center; width: 100%;margin: auto;"> <?php spext_lang("Add Column", 'woo-bundle-choice') ?></div>
</div>

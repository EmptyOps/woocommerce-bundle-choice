<div class="title" data-tab-group="<?php _e($tab_set); ?>">
	<i class="dropdown icon"></i>		    
	<?php echo esc_attr($term->name)/*$term->name*/; ?>	
</div>
<div class="content">	
	<div class="ui toggle button" id="togle_column_<?php echo esc_attr($term->slug)/*$term->slug*/ ?>" data-toggle_column="<?php echo esc_attr($term->slug)/*$term->slug*/ ?>" style="text-align: center;vertical-align: center; width: 100%;margin: auto;"><?php spext_lang("Add Column", 'woo-bundle-choice') ?></div>	
</div>		

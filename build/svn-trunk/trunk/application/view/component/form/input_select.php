<?php

/**
*	template to show select as input method.
*/

//wbc()->common->pr($options,$force_debug = false,$die = false);
if(!empty($id) /*and !empty($label)*/){
	?>	
	<div class="<?php echo esc_attr(!empty($size_class)?$size_class:''); ?> field" <?php /*phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- we are not escaping the $attr because it may contain multiple attributes and we do not want esc_attr function to escape the double qoutes(") of the different attribute values. but anyway we understand the security requirement here so we have always escaped the attribute value with the esc_attr from wherever this $attr var is passed*/echo !empty($attr)?$attr:''; ?>>
		<?php 
		if( !empty($label) )
		{
			wbc()->load->template('component/form/input_label',array('id'=>$id,'label'=>$label)); 
		}
		?>
		<div class="ui selection dropdown <?php echo !empty($class) ? esc_attr($class) : ''; ?>" id="<?php echo esc_attr($id); ?>_dropdown_div" <?php _e(!empty($field_attr) ? implode(' ', $field_attr) : ''); ?>>
			<input type="hidden" id="<?php echo esc_attr($id); ?>" name="<?php echo esc_attr($id); ?>" value="<?php echo esc_attr($value); ?>">
			<i class="dropdown icon"></i>
			<div class="default text"></div>
			<div class="menu">
				<?php if (!empty($options) && is_array($options)): ?>
					<div class="item" data-value=""> - Select - </div>
					<?php foreach ($options as $key => $item): ?>
						<?php
						if (!is_array($item)) {
							?>
							<div class="item" data-value="<?php echo esc_attr($key); ?>"><?php echo esc_html($item); ?></div>
						<?php
						} else {
							if (isset($item["is_header"]) && $item["is_header"]) {
								?>
								<div class='divider'></div><div class='header'><?php echo esc_html($item["label"]); ?></div>
							<?php
							} else {
								?>
								<div class="item" <?php echo !empty($item["attr"]) ? $item["attr"] : ""; ?>
									data-value="<?php echo esc_attr($key); ?>"><?php echo esc_html($item["label"]); ?></div>
							<?php
							}
						}
						?>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div>

		<?php
		if (isset($visible_info))
		{
			wbc()->load->template('component/form/input_visible_info',$visible_info); 
		}
		?>
	</div>
	<?php
}



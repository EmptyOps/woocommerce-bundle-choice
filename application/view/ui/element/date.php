<input type="date" <?php echo (!empty($class) ? 'class="'.esc_attr($class).'"' : ''); ?> <?php echo (!empty($id) ? 'id="'.esc_attr($id).'"' : ''); ?> <?php echo (!empty($attr) ? $attr : ''); ?> <?php echo (!empty($name) ? 'name="'.esc_attr($name).'"' : ''); ?> value="<?php echo !empty($value) ? esc_attr($value) : ''; ?>" <?php echo (!empty($style) ? 'style="'.esc_attr($style).'"' : ''); ?>>


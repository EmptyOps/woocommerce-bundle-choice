
<canvas <?php echo (!empty($class) ? 'class="'.esc_html($class)/*$class*/.'"':''); ?> <?php echo (!empty($id) ? 'id="'.esc_html($id)/*$id*/.'"':''); ?> <?php echo (!empty($attr)? esc_html($attr)/*$attr*/: ''); ?> <?php echo (!empty($src)? 'src="'.esc_html($src)/*$src*/.'"': ''); ?> <?php echo (!empty($style) ? 'style="'.$style.'"':''); ?>/>

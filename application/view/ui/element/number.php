<input type="number" <?php echo (!empty($class) ? 'class="'.$class.'"':''); ?> <?php echo (!empty($id) ? 'id="'.$id.'"':''); ?> <?php echo (!empty($attr)? $attr: ''); ?> <?php echo (!empty($name) ? 'name="'.$name.'"':''); ?> <?php echo (!empty($min)?"min='${min}'":''); ?> <?php echo (!empty($max)?"max='${max}'":''); ?> <?php echo (!empty($step)?"step='${step}'":''); ?> <?php echo (!empty($value)?"value='${value}'":''); ?>  <?php echo (!empty($style) ? 'style="'.$style.'"':''); ?>>
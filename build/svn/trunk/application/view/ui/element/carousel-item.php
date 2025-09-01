<?php if(!empty($src)): ?>
<div class="carousel-item <?php echo (!empty($class) ? esc_attr(implode(' ', $class)) : ''); ?>">
  <img class="<?php echo (!empty($inner_class) ? esc_attr(implode(' ', $inner_class)) : ''); ?>" src="<?php echo esc_url($src); ?>" <?php echo (!empty($style) ? 'style="' . esc_attr($style) . '"' : ''); ?>>
</div>
<?php endif; ?>

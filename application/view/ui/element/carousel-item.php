<?php if(!empty($src)): ?>
<div class="carousel-item <?php echo (!empty($class)?implode(' ',$class) : '') ?>">
  <img class="<?php echo (!empty($inner_class)?implode(' ',$inner_class) : '') ?>" src="<?php echo  esc_attr($src)/*$src*/; ?>" <?php echo (!empty($style) ? 'style="'.$style.'"':''); ?>>
</div>
<?php endif; ?>

<?php if(!empty($src)): ?>
<div class="carousel-item <?php echo (!empty($class)?implode(' ',$class) : '') ?>">
  <img class="<?php echo (!empty($inner_class)?implode(' ',$inner_class) : '') ?>" src="<?php echo $src; ?>">
</div>
<?php endif; ?>
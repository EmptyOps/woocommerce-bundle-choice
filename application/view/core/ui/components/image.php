<?php if(!empty($src)): ?>
<div class="image <?php echo !empty($class) ? esc_attr($class) : ''; ?>" id="<?php echo !empty($id) ? esc_attr($id) : ''; ?>" style="<?php echo !empty($style) ? esc_attr($style) : ''; ?>">
    <img src="<?php echo esc_url($src); ?>">
</div>
<?php endif; ?>

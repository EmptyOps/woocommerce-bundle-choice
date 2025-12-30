<?php if(!empty($src)): ?>
<div class="image <?php !empty($class) ? echo esc_attr($class) : ''; ?>" id="<?php !empty($id) ? echo esc_attr($id) : ''; ?>" style="<?php !empty($style) ? echo esc_attr($style) : ''; ?>">
    <img src="<?php echo esc_url($src); ?>">
</div>
<?php endif; ?>

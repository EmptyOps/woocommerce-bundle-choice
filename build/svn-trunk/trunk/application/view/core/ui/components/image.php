<?php if(!empty($src)): ?>
<div class="image <?php !empty($class) ? esc_attr_e($class) : ''; ?>" id="<?php !empty($id) ? esc_attr_e($id) : ''; ?>" style="<?php !empty($style) ? esc_attr_e($style) : ''; ?>">
    <img src="<?php _e(esc_url($src)); ?>">
</div>
<?php endif; ?>

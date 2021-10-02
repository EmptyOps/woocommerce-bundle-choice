<?php if(!empty($src)): ?>
<div class="image <?php !empty($class)?_e($class):''; ?>" id="<?php !empty($id)?_e($id):''; ?>" style="<?php !empty($style)?_e($style):''; ?>">
    <img src="<?php _e($src) ?>">
</div>
<?php endif; ?>
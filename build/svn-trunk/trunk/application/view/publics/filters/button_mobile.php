<?php

/*
*	Template to show checkbox filters for mobile
*/

?>
	<div class="title" data-tab-group="<?php esc_attr_e($tab_set); ?>">
    <i class="dropdown icon"></i>
    <?php echo esc_html($filter['title']); ?>
    <?php if ($help) : ?>
        &nbsp; <span class="ui grey text" style="cursor: pointer;">&nbsp;<i class="question circle outline icon" data-help="<?php esc_attr_e($help); ?>"></i></span>
    <?php endif; ?>
    <?php if ($reset) : ?>
        &nbsp; <span class="ui grey text" style="cursor: pointer;" onclick="reset_checkbox(event,'.checklist_<?php echo esc_attr($filter['slug']); ?>')">&nbsp;<u><?php esc_html(spext_lang("reset", 'woo-bundle-choice')); ?></u></span>
    <?php endif; ?>
</div>
<div class="content">
    <div class="ui horizontal segments" data-reset="reset_button(new Event('click'),'.checklist_<?php echo esc_attr($filter['slug']); ?>')">
        <?php foreach ($filter['list'] as $term) : ?>
            <div class="ui segment wbc-button-input checklist_<?php echo esc_attr($filter['slug']); ?>" id='check_<?php echo esc_attr($term['slug']); ?>' data-slug="<?php echo esc_attr($term['slug']); ?>" data-filter-slug="<?php echo esc_attr($filter['slug']); ?>">
                <span><?php echo esc_html($term['name']); ?></span>
            </div>
        <?php endforeach; ?>
    </div>
</div>	
	<?php
	

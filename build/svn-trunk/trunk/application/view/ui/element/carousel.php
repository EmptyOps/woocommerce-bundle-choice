<?php $ride_id = uniqid() ?>
<div <?php echo (!empty($id) ? "id='" . esc_attr($id) . "'" : ""); ?>
     class="carousel slide <?php echo (!empty($class) ? esc_attr(implode(' ', $class)) : ""); ?>"
     data-ride="<?php echo esc_attr($ride_id); ?>"
     <?php echo (!empty($style) ? 'style="' . esc_attr($style) . '"' : ''); ?>>
  <div class="carousel-inner">

    <?php
    if (!empty($builder) && !empty($child)) {
        $builder->build($child, $option_key, $process_form, null, $ui_definition);
    }
    ?>

  </div>
  <a class="carousel-control-prev" <?php echo (!empty($id) ? "href='#" . esc_attr($id) . "'" : ""); ?>
     role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only"><?php esc_html_e('Previous'); ?></span>
  </a>
  <a class="carousel-control-next" <?php echo (!empty($id) ? "href='#" . esc_attr($id) . "'" : ""); ?>
     role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only"><?php esc_html_e('Next'); ?></span>
  </a>
</div>


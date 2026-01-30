<div class="<?php (!empty($class) ? esc_attr_e($class) : ''); ?> column" style="<?php (!empty($style) ? esc_attr_e($style) : ''); ?>" <?php /*phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- we are not escaping the $attr because it may contain multiple attributes and we do not want esc_attr function to escape the double qoutes(") of the different attribute values. but anyway we understand the security requirement here so we have always escaped the attribute value with the esc_attr from wherever this $attr var is passed*/(!empty($attr) ? _e($attr) : ''); ?> <?php echo (!empty($style) ? 'style="'.esc_attr($style).'"' : ''); ?>>
  <?php 
    if(!empty($builder) && !empty($child)){
      $builder->build($child, $option_key, $process_form, null, $ui_definition);
    }
  ?>  
</div>
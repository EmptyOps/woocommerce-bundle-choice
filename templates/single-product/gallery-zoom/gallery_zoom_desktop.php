<?php
/**
 * 
 * in case if you want to implement your custom html then follow our documentation guide on how to add add custom html templates by following this link https://sphereplugins.com/docs/how-to-override-templates-using-custom-html
 */


---- a code /purple_theme/application/controllers/publics/pages/Content_Single_Product.php no che
array(
    'type'=>'div',
    'class'=>'Zoom_Rigt-sec',
    'child'=>array(
        $pre_image_content,
        array(
            'type'=>'do_action',
            'name'=>'purple_theme_product_image_thumb_pre'
        ),
        apply_filters('purple_theme_product_image_thumb',array(
            'type'=>'image',
            'src'=>$product_image
            'class'=>array('img-fluid','big-img'),
            'attr'=>apply_filters('purple_theme_product_image_thumb_attrs',array())
        )),
        array(
            'type'=>'html',
            'preHTML'=>$after_thumb_image
        ),
    )
)
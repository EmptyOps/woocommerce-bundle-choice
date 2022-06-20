<?php
/**
 * 
 * in case if you want to implement your custom html then follow our documentation guide on how to add add custom html templates by following this link https://sphereplugins.com/docs/how-to-override-templates-using-custom-html
 */


---- a code /purple_theme/application/controllers/publics/pages/Content_Single_Product.php no che
$template = array(
    'type'=>'div',
    'class'=>'imgScrollWrap_v',
    'id'=>'slider1',
    'child'=>array(
        'type'=>'div',
        'class'=>'splide__track',
        'child'=>array(
            'type'=>'ul',
            'class'=>'exzoom_img_ul splide__list',
            'child'=>$data
        )
    )
);
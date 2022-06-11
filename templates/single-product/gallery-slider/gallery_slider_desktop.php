<?php
/**
 * 
 * in case if you want to implement your custom html then follow our documentation guide on how to add add custom html templates by following this link https://sphereplugins.com/docs/how-to-override-templates-using-custom-html
 */

---- a code /purple_theme/application/controllers/publics/pages/Content_Single_Product.php no che
if(!empty($ids)){
    foreach ($ids as $id) {
        --if below additional params of original and the second param is for any fix or improvement then drop below if condition and so it will be used for preview page as well
        if (is_previwe) {
           $src = wp_get_attachment_url($id);
        }else{
            $src = wp_get_attachment_image_url($id,'original',false); //wp_get_attachment_url($id);
        }
        $ui[] = array(
            'type'=>'li',
            'class'=>'splide__slide',
            'child'=>array(
                'type'=>'image',
                'src'=>$src,
                'class'=>array('img-fluid','small-img')
            )
        );              
    }
}








---- a code /purple_theme/application/controllers/publics/pages/Content_Single_Product.php no che
array(
    'type'=>'div',
    'class'=>'imgScrollWrap_v',
    'id'=>'slider1',
    'child'=>array(
        'type'=>'div',
        'class'=>'splide__track',
        'child'=>array(
            'type'=>'ul',
            'class'=>'exzoom_img_ul splide__list',
            'child'=>$this->gallery_images()
        )
    )
),
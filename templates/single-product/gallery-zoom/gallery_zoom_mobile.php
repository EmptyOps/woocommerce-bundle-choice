<?php
/**
 * 
 * in case if you want to implement your custom html then follow our documentation guide on how to add add custom html templates by following this link https://sphereplugins.com/docs/how-to-override-templates-using-custom-html
 */

    ---- a code /purple_theme/application/controllers/publics/pages/Content_Single_Product.php no che
    if(!empty($ids)) {
        foreach ($ids as $id) { 
            -----if below additional params of original and the second param is for any fix or improvement then drop below if condition and so it will be used for preview page as well 
             if (is_preview) {   
                $src = wp_get_attachment_url($id);
             }else{
                $src = wp_get_attachment_image_url($id,'original',false)/*wp_get_attachment_url($id)*/;
            }
            $ui[] = array(
                'type'=>'a',
                'href'=>$src,
                'child'=>array(
                    // 'type'=>'image',
                    // 'src'=>$src,
                    // 'class'=>array('xzoom-gallery3'),
                    // 'attr'=>array('width'=>'80','xpreview'=>$src)
                    'type'=>'span',
                    'src'=>$src,
                    'class'=>array('dots-sp-product xzoom-gallery3'),
                    (is_preview?'attr'=>array('width'=>'80','xpreview'=>$src):'attr'=>array('width'=>'80','src'=>$src))
                    
                )
            );              
        }
    }



---- a code /purple_theme/application/controllers/publics/pages/Content_Single_Product.php no che
$ui = array(
    'type'=>'div',
    'class'=>'Product_MObail_View_Images sp-purple-theme-product-dots',
    'child'=>array(                 
        $pre_image_content,
        array(
            'type'=>'section',
            'id'=>'lens',
            'child'=>array(
                array(
                    'type'=>'div',
                    'class'=>array('large-5','column'),
                    'child'=>array(
                        'type'=>'div',
                        'class'=>array('xzoom-container'),
                        'child'=>array(
                            array(
                                'type'=>'do_action',
                                'name'=>'purple_theme_product_image_thumb_pre'
                            ),
                            apply_filters('purple_theme_product_image_thumb',array(
                                'type'=>'image',
                                'src'=>$product_image,
                                'class'=>array('img-fluid','big-img',(wp_is_mobile()?'xzoom3 width_Class':'')),
                                'attr'=>array('xoriginal'=>$product_image)
                            )),                                     
                            array(
                                'type'=>'div',
                                'class'=>'xzoom-thumbs',
                                'child'=>$this->gallery_images()
                            ),
                            
                        )
                    )
                ),
                array(
                    'type'=>'html',
                    'preHTML'=>$after_thumb_image
                ),

                array(
                    'type'=>'div',
                    'class'=>array('large-7','column'),
                )
            )
        ),
    )
);
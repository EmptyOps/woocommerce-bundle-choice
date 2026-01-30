<?php
/**
 * 
 * in case if you want to implement your custom html then follow our documentation guide on how to add add custom html templates by following this link https://sphereplugins.com/docs/how-to-override-templates-using-custom-html
 */
defined( 'ABSPATH' ) || exit;
global $product;
$template = null;
$template_inner = array();
if(!empty($gallery_images_template_data['attachment_ids_loop_image'])){
    foreach ($gallery_images_template_data['attachment_ids_loop_image'] as $index=>$image) {

        // ACTIVE_TODO nid to lode admin settings here 
        $options = array();

        $defaults = array();
        $options  = wp_parse_args( $options, $defaults );

        $classes = array( '' );
        if ( isset( $image['video_link'] ) && ! empty( $image['video_link'] ) ) {
            array_push( $classes, '' );
        }
        $template_data['data']['image'] = $image;
        $template_data['data']['index'] = $index;
        if (!apply_filters('sp_slzm_zoom_image_loop_have_html',false,$index,$image)){
            if (!empty($template_data['template_key'])) {
                
                $template_inner[] =  wbc()->load->template($template_data['template_sub_dir'].'/'.$template_data['template_key'],(isset($template_data['data'])?$template_data['data']:array()),true,$template_data['singleton_function'],true,true);
            
            }
        } else {
           $template_inner[] =  apply_filters('sp_slzm_zoom_image_loop_html',null,$index,$image,$template_data['data']);
        }

       if ($gallery_images_configs['all_in_dom'] == 0) {
           break;
       }
    }
}

//---- a code /purple_theme/application/controllers/publics/pages/Content_Single_Product.php no che
 $template = //array(
//     'type'=>'div',
//     'class'=>'Product_MObail_View_Images sp-purple-theme-product-dots',
//     'child'=> array( 
    // ACTIVE_TODO_OC_START  
    // --- /themes/purple_theme/application/controllers/publics/pages/Content_Single_Product.php  file ma line no 265 to 325 ma jovu     
            // ACTIVE_TODO_OC_START  
            // $pre_image_content,
            // ACTIVE_TODO_OC_END
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
                                // ACTIVE_TODO_OC_START
                                // array(
                                //     'type'=>'do_action',
                                //     'name'=>'purple_theme_product_image_thumb_pre'
                                // ),
                                // apply_filters('purple_theme_product_image_thumb',array(
                                //     'type'=>'image',
                                //     'src'=>$product_image,
                                //     'class'=>array('img-fluid','big-img',(wp_is_mobile()?'xzoom3 width_Class':'')),
                                //     'attr'=>array('xoriginal'=>$product_image)
                                // )),    
                                // ACTIVE_TODO_OC_END

                                array(
                                    'type'=>'image',
                                    'src'=>$gallery_images_template_data['attachment_ids_loop_image'][0]['src'],
                                    'class'=>array('img-fluid','big-img',(wp_is_mobile()?'xzoom3 width_Class':'')),
                                    'attr'=>array('xoriginal'=>$gallery_images_template_data['attachment_ids_loop_image'][0]['full_src'])
                                ),
                                array(
                                    'type'=>'div',
                                    'class'=>'xzoom-thumbs',
                                    'child'=>$template_inner //$this->gallery_images()
                                ),
                                
                            )
                        )
                    ),
                    // ACTIVE_TODO_OC_START
                    // array(
                    //     'type'=>'html',
                    //     'preHTML'=>$after_thumb_image
                    // ),
                    // ACTIVE_TODO_OC_END
                    array(
                        'type'=>'div',
                        'class'=>array('large-7','column'),
                    )
                )
            //),
        //)
        // ACTIVE_TODO_OC_START             
);
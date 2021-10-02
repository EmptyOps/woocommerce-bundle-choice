<?php 

/*
*	Specification view temlate part.
*/


    global $product;
    global $post;
    if(empty($product)){
        $product = wbc()->wc->get_product($post->ID);
    }

    if(empty($product) or is_wp_error($product )) {
        return;
    }
    
    $product_data = array();
    $sku = $product->get_sku();
    if(!empty($sku)){
        $product_data[]=array('SKU',$sku);    
    }            

    if($product->has_weight()){
       $product_data[]=array('Weight',$product->get_weight());
    }

    if($product->has_dimensions()){
        $product_data[]=array('Height',$product->get_height());
        $product_data[]=array('Width',$product->get_width());
        $product_data[]=array('Length',$product->get_length());                
    }

    if($product->has_attributes()){
        $attributes = $product->get_attributes();
        if(!empty($attributes) and !is_wp_error($attributes)){
            foreach ($attributes as $key => $attribute) {
                $terms=$attribute['options'];                        

                if(!empty($terms) and !is_wp_error($terms)){
                    $_term_list_ = array();
                    foreach ($terms as $term_id) {
                        $_term_ = wbc()->wc->get_term_by( 'id',$term_id,$attribute['name']); 
                        if( !empty($_term_) && !is_wp_error($_term_) && is_object($_term_) && property_exists($_term_,'name')) {
                            $_term_list_[] = $_term_->name;   
                        }
                    }
                    $product_data[]=array(wc_attribute_label($attribute->get_name()),implode(', ',$_term_list_));
                }                        //wbc()->wc->get_term_by( 'id',,$attribute['name']);    
            }
        }
    }


    //Additional meta here
    $additional_meta_keys = wbc()->options->get_option('tiny_features','tiny_features_specification_meta_keys','');
    if(!empty($additional_meta_keys)){
        $additional_meta_keys = explode(',',$additional_meta_keys);
        if(is_array($additional_meta_keys) and !is_wp_error($additional_meta_keys)){
            foreach ($additional_meta_keys as $meta_key) {
                $meta_value = $product->get_meta($meta_key,true);
                if(!empty($meta_value)){
                    $product_data[] = array($meta_key,$meta_value);
                }

            }
        }
    }

    // Add certificate link here
    $certificate_link = $product->get_meta('_certificate_link',true);    
    if(!empty($certificate_link)){
        $product_data[] = array(__('Certificate','woo-bundle-choice'),"<a href='${certificate_link}' target='_blank'>".__('Click here','woo-bundle-choice')."</a>");
    }


    $product_data = apply_filters('eowbc_specification_data',$product_data,$product);
   
    if(!empty($product_data) and is_array($product_data)) {
        if(wp_is_mobile()) {
            wbc()->load->template('publics/features/default_mobile',compact('product_data'));
        } else {
            $display_style = wbc()->options->get_option('tiny_features','specification_view_style','default');
            if('default'===$display_style){
                if(sizeof($product_data) > 1) {
                    list($product_data_1, $product_data_2) = array_chunk($product_data, ceil(count($product_data) / 2));
                    wbc()->load->template('publics/features/default',compact('product_data','product_data_1','product_data_2'));
                }
                else {
                    wbc()->load->template('publics/features/default',compact('product_data'));
                }
            } elseif ('template_1'===$display_style) {            
                wbc()->load->template('publics/features/template_1',compact('product_data'));
                
            } elseif ('template_2'===$display_style) {
                wbc()->load->template('publics/features/template_2',compact('product_data'));
            }
        }
    }
   
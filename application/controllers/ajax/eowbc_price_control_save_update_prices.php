<?php
/**
*	Ajax handler to handle ajax save request for eowbc_price_control_save_update_prices form.	
*
*/

$res = array( "type"=>"success", "msg"=>"" );

// if (isset($_POST)
//     && isset($_POST['_wpnonce'])
//     && wp_verify_nonce($_POST['_wpnonce'],'eo_wbc_jpc_save_data')
//     && !empty($_POST['eo_wbc_action'])
//     && $_POST['eo_wbc_action']==='save_jpc_data'
//     && !empty($_POST['eo_wbc_jpc_form_data'])
// ) 
if(wp_verify_nonce(sanitize_text_field($_POST['_wpnonce']),'eowbc_price_control_save_update_prices')){                

	wbc()->common->pr( $_POST['eo_wbc_jpc_form_data'],$force_debug = false,$die = false);	

    //update_option('eo_wbc_jpc_data',serialize($_POST['eo_wbc_jpc_form_data']));
    wbc()->options->update_option('price_control','rules_data',(empty($_POST['eo_wbc_jpc_form_data'])?'':serialize($_POST['eo_wbc_jpc_form_data'])));
    
    global $wpdb;

    $q_gen="( SELECT DISTINCT({$wpdb->prefix}term_relationships.object_id), {$wpdb->prefix}terms.name,{$wpdb->prefix}terms.slug,{$wpdb->prefix}term_taxonomy.taxonomy FROM {$wpdb->prefix}term_relationships LEFT JOIN {$wpdb->prefix}term_taxonomy ON {$wpdb->prefix}term_relationships.term_taxonomy_id={$wpdb->prefix}term_taxonomy.term_taxonomy_id LEFT JOIN {$wpdb->prefix}terms ON {$wpdb->prefix}term_taxonomy.term_id={$wpdb->prefix}terms.term_id WHERE ({$wpdb->prefix}term_taxonomy.taxonomy='product_cat' ) OR ({$wpdb->prefix}term_taxonomy.taxonomy LIKE 'pa_%') )";

    $q_cat="( SELECT DISTINCT({$wpdb->prefix}term_relationships.object_id), {$wpdb->prefix}terms.name,{$wpdb->prefix}terms.slug,{$wpdb->prefix}term_taxonomy.taxonomy FROM {$wpdb->prefix}term_relationships LEFT JOIN {$wpdb->prefix}term_taxonomy ON {$wpdb->prefix}term_relationships.term_taxonomy_id={$wpdb->prefix}term_taxonomy.term_taxonomy_id LEFT JOIN {$wpdb->prefix}terms ON {$wpdb->prefix}term_taxonomy.term_id={$wpdb->prefix}terms.term_id WHERE {$wpdb->prefix}term_taxonomy.taxonomy='product_cat' )";
    
    $q_att="( SELECT DISTINCT({$wpdb->prefix}term_relationships.object_id), {$wpdb->prefix}terms.name,{$wpdb->prefix}terms.slug,{$wpdb->prefix}term_taxonomy.taxonomy FROM {$wpdb->prefix}term_relationships LEFT JOIN {$wpdb->prefix}term_taxonomy ON {$wpdb->prefix}term_relationships.term_taxonomy_id={$wpdb->prefix}term_taxonomy.term_taxonomy_id LEFT JOIN {$wpdb->prefix}terms ON {$wpdb->prefix}term_taxonomy.term_id={$wpdb->prefix}terms.term_id WHERE {$wpdb->prefix}term_taxonomy.taxonomy LIKE 'pa_%' )";                
    
    //$jpc_data=json_decode( unserialize(get_option('eo_wbc_jpc_data',serialize(array()))) );
    $jpc_data = json_decode( unserialize( wbc()->options->get_option('price_control','rules_data',serialize(array())) ) );


	wbc()->common->pr( array("jshdf","sdfjdf"),$force_debug = false,$die = false);	
	wbc()->common->pr($jpc_data,$force_debug = false,$die = true);

    if(is_array($jpc_data) OR is_object($jpc_data)){

        foreach ($jpc_data as $q_data) {

            
            /*$_cats=array();
            $_attr=array();*/
            $query=$q_gen;

            for($l=0;$l<count($q_data)-1;$l++){
                $_field_data=$q_data[$l];               
                if($_field_data->field_type==0){
                    //is category
                    $query=" ( SELECT * FROM {$q_cat} AS T1 WHERE slug = '".$_field_data->field_value."' AND object_id IN ( SELECT object_id FROM {$query} AS T2 ) )";
                }else {
                    //is attribute                        
                    $query=" ( SELECT * FROM {$q_att} AS T1 WHERE taxonomy='pa_{$_field_data->field_value}' AND ".($_field_data->cmp_value=="between"?" name BETWEEN '".explode('-',$_field_data->value_name)[0]."' AND '".explode('-',$_field_data->value_name)[1]."' ":" slug IN ('".implode("','",explode(',',$_field_data->value_data[0]))."') ")." AND object_id IN ( SELECT object_id FROM {$query} AS T2 ) ) ";
                }        
            }
            $_query = "SELECT object_id FROM {$query} AS T";                                   

            $rs=$wpdb->get_results($_query);
            //Only for simple products.
            if(is_array($rs) || is_object($rs)){                        
                
                foreach ($rs as $post_id) {
                    
                    if(!empty($q_data[count($q_data)-1]->sales_price)){

                    	//here seems bug should be regular_price instead of sales_price
                        //update_post_meta($post_id->object_id,'_price',$q_data[count($q_data)-1]->sales_price);
                        update_post_meta($post_id->object_id,'_price',$q_data[count($q_data)-1]->regular_price);
                        update_post_meta($post_id->object_id,'_sale_price',$q_data[count($q_data)-1]->sales_price);

                    } else{
                        delete_post_meta($post_id->object_id,'_sale_price');                    
                        update_post_meta($post_id->object_id,'_price',$q_data[count($q_data)-1]->regular_price);
                    }            
                    update_post_meta($post_id->object_id,'_regular_price',$q_data[count($q_data)-1]->regular_price);   
                    wc_delete_product_transients( $post_id->object_id );
                }
            }
            
            $query=" ( SELECT ID FROM {$wpdb->prefix}posts WHERE post_parent IN ( {$_query} ) ) ";

            for($l=0;$l<count($q_data)-1;$l++){
                
                $_field_data=$q_data[$l];               

                if($_field_data->field_type==1){                                
                    //is attribute                        
                    $query=" ( SELECT post_id FROM {$wpdb->prefix}postmeta WHERE meta_key='attribute_pa_{$_field_data->field_value}' AND meta_value IN ( SELECT slug FROM {$q_att} AS T1 WHERE taxonomy='pa_{$_field_data->field_value}' AND ".($_field_data->cmp_value=="between"?" name BETWEEN '".explode('-',$_field_data->value_name)[0]."' AND '".explode('-',$_field_data->value_name)[1]."' ":" slug IN ('".implode("','",explode(',',$_field_data->value_data[0]))."') ")." )  AND post_id IN ( {$query} ) ) ";
                }        
            }

            $rs=$wpdb->get_results($query);
            //Only for simple products.
            if(is_array($rs) || is_object($rs)){                        
                
                foreach ($rs as $post_id) {                                                               
                    if(!empty($q_data[count($q_data)-1]->sales_price)){

                        update_post_meta($post_id->post_id,'_price',$q_data[count($q_data)-1]->sales_price);
                        update_post_meta($post_id->post_id,'_sale_price',$q_data[count($q_data)-1]->sales_price);

                    } else{
                        delete_post_meta($post_id->post_id,'_sale_price');                    
                        update_post_meta($post_id->post_id,'_price',$q_data[count($q_data)-1]->regular_price);
                    }            
                    update_post_meta($post_id->post_id,'_regular_price',$q_data[count($q_data)-1]->regular_price); 
                    wc_delete_product_transients( $post_id->post_id );  
                }
            }
        }

    }
    else {
    	$res["type"] = "error";
    	$res["msg"] = "No input data provided";
    }

}
else {
	$res["type"] = "error";
	$res["msg"] = "Nonce validation failed";
}


echo json_encode($res);

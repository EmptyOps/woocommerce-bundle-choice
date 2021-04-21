<?php


/*
*	Woocommerc Category and Attribute Model.
*/

namespace eo\wbc\model\admin;

defined( 'ABSPATH' ) || exit;

class Eowbc_Price_Control_Save_Update_Prices {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {
		
	}

	public static function api_price_markup($price) {
		return $price;
	}

	public function save($eo_wbc_jpc_form_data) {
		wbc()->sanitize->clean($eo_wbc_jpc_form_data);

		wbc()->validate->check($eo_wbc_jpc_form_data);
		$res = array();
		$res["type"] = "success";
	    $res["msg"] = "";

	    //update_option('eo_wbc_jpc_data',serialize($eo_wbc_jpc_form_data));
	    wbc()->options->update_option('price_control','rules_data',(empty($eo_wbc_jpc_form_data)? '':serialize( $eo_wbc_jpc_form_data ) ) );
	    
	 //    $jpc_data = json_decode( stripslashes( unserialize( wbc()->options->get_option('price_control','rules_data',serialize(array())) ) ), true );
		// wbc()->common->var_dump($jpc_data,$force_debug = false,$die = true);

        return $res;
	}

	public function update_prices( $post_ID=null, $post=null, $update=null){                           

		//when called from hook 
        if ( !is_null($post) ) {
        	if( $post->post_type != 'product' || is_null($post_ID) ) {
        	   	return;	
        	}
        }

		////this rest of the code from hook callback handler function is not of any use since at no where in it the $post or $post_ID where seems used and neither the $update var
		// global $wpdb;

  //       $q_gen="( SELECT DISTINCT({$wpdb->prefix}term_relationships.object_id), {$wpdb->prefix}terms.name,{$wpdb->prefix}terms.slug,{$wpdb->prefix}term_taxonomy.taxonomy FROM {$wpdb->prefix}term_relationships LEFT JOIN {$wpdb->prefix}term_taxonomy ON {$wpdb->prefix}term_relationships.term_taxonomy_id={$wpdb->prefix}term_taxonomy.term_taxonomy_id LEFT JOIN {$wpdb->prefix}terms ON {$wpdb->prefix}term_taxonomy.term_id={$wpdb->prefix}terms.term_id WHERE ({$wpdb->prefix}term_taxonomy.taxonomy='product_cat' ) OR ({$wpdb->prefix}term_taxonomy.taxonomy LIKE 'pa_%') )";

  //       $q_cat="( SELECT DISTINCT({$wpdb->prefix}term_relationships.object_id), {$wpdb->prefix}terms.name,{$wpdb->prefix}terms.slug,{$wpdb->prefix}term_taxonomy.taxonomy FROM {$wpdb->prefix}term_relationships LEFT JOIN {$wpdb->prefix}term_taxonomy ON {$wpdb->prefix}term_relationships.term_taxonomy_id={$wpdb->prefix}term_taxonomy.term_taxonomy_id LEFT JOIN {$wpdb->prefix}terms ON {$wpdb->prefix}term_taxonomy.term_id={$wpdb->prefix}terms.term_id WHERE {$wpdb->prefix}term_taxonomy.taxonomy='product_cat' )";
        
  //       $q_att="( SELECT DISTINCT({$wpdb->prefix}term_relationships.object_id), {$wpdb->prefix}terms.name,{$wpdb->prefix}terms.slug,{$wpdb->prefix}term_taxonomy.taxonomy FROM {$wpdb->prefix}term_relationships LEFT JOIN {$wpdb->prefix}term_taxonomy ON {$wpdb->prefix}term_relationships.term_taxonomy_id={$wpdb->prefix}term_taxonomy.term_taxonomy_id LEFT JOIN {$wpdb->prefix}terms ON {$wpdb->prefix}term_taxonomy.term_id={$wpdb->prefix}terms.term_id WHERE {$wpdb->prefix}term_taxonomy.taxonomy LIKE 'pa_%' )";                
        
  //       $jpc_data=unserialize(get_option('eo_wbc_jpc_data',serialize(array())) );
  //       if(is_array($jpc_data) OR is_object($jpc_data)){

  //           foreach ($jpc_data as $q_data) {
                
  //               /*$_cats=array();
  //               $_attr=array();*/
  //               $query=$q_gen;

  //               for($l=0;$l<count($q_data)-1;$l++){
  //                   $_field_data=$q_data[$l];               
  //                   if($_field_data->field_type==0){
  //                       //is category
  //                       $query=" ( SELECT * FROM {$q_cat} AS T1 WHERE slug = '".$_field_data->field_value."' AND object_id IN ( SELECT object_id FROM {$query} AS T2 ) )";
  //                   }else {
  //                       //is attribute                        
  //                       $query=" ( SELECT * FROM {$q_att} AS T1 WHERE taxonomy='pa_{$_field_data->field_value}' AND ".($_field_data->cmp_value=="between"?" name BETWEEN '".explode('-',$_field_data->value_name)[0]."' AND '".explode('-',$_field_data->value_name)[1]."' ":" slug IN ('".implode("','",explode(',',$_field_data->value_data[0]))."') ")." AND object_id IN ( SELECT object_id FROM {$query} AS T2 ) ) ";
  //                   }        
  //               }
  //               $_query = "SELECT object_id FROM {$query} AS T";                                   

  //               $rs=$wpdb->get_results($_query);
  //               //Only for simple products.
  //               if(is_array($rs) || is_object($rs)){                        
                    
  //                   foreach ($rs as $post_id) {
                        
  //                       if(!empty($q_data[count($q_data)-1]->sales_price)){

  //                           update_post_meta($post_id->object_id,'_price',$q_data[count($q_data)-1]->sales_price);
  //                           update_post_meta($post_id->object_id,'_sale_price',$q_data[count($q_data)-1]->sales_price);

  //                       } else{
  //                           delete_post_meta($post_id->object_id,'_sale_price');                    
  //                           update_post_meta($post_id->object_id,'_price',$q_data[count($q_data)-1]->regular_price);
  //                       }            
  //                       update_post_meta($post_id->object_id,'_regular_price',$q_data[count($q_data)-1]->regular_price);   
  //                       wc_delete_product_transients( $post_id->object_id );
  //                   }
  //               }
                
  //               $query=" ( SELECT ID FROM {$wpdb->prefix}posts WHERE post_parent IN ( {$_query} ) ) ";

  //               for($l=0;$l<count($q_data)-1;$l++){
                    
  //                   $_field_data=$q_data[$l];               

  //                   if($_field_data->field_type==1){                                
  //                       //is attribute                        
  //                       $query=" ( SELECT post_id FROM {$wpdb->prefix}postmeta WHERE meta_key='attribute_pa_{$_field_data->field_value}' AND meta_value IN ( SELECT slug FROM {$q_att} AS T1 WHERE taxonomy='pa_{$_field_data->field_value}' AND ".($_field_data->cmp_value=="between"?" name BETWEEN '".explode('-',$_field_data->value_name)[0]."' AND '".explode('-',$_field_data->value_name)[1]."' ":" slug IN ('".implode("','",explode(',',$_field_data->value_data[0]))."') ")." )  AND post_id IN ( {$query} ) ) ";
  //                   }        
  //               }

  //               $rs=$wpdb->get_results($query);
  //               //Only for simple products.
  //               if(is_array($rs) || is_object($rs)){                        
                    
  //                   foreach ($rs as $post_id) {                                                               
  //                       if(!empty($q_data[count($q_data)-1]->sales_price)){

  //                           update_post_meta($post_id->post_id,'_price',$q_data[count($q_data)-1]->sales_price);
  //                           update_post_meta($post_id->post_id,'_sale_price',$q_data[count($q_data)-1]->sales_price);

  //                       } else{
  //                           delete_post_meta($post_id->post_id,'_sale_price');                    
  //                           update_post_meta($post_id->post_id,'_price',$q_data[count($q_data)-1]->regular_price);
  //                       }            
  //                       update_post_meta($post_id->post_id,'_regular_price',$q_data[count($q_data)-1]->regular_price); 
  //                       wc_delete_product_transients( $post_id->post_id );  
  //                   }
  //               }
  //           }
  //       }




		$res["type"] = "success";
	    $res["msg"] = "";
	    
	    global $wpdb;

	    $q_gen="( SELECT DISTINCT({$wpdb->prefix}term_relationships.object_id), {$wpdb->prefix}terms.name,{$wpdb->prefix}terms.slug,{$wpdb->prefix}term_taxonomy.taxonomy FROM {$wpdb->prefix}term_relationships LEFT JOIN {$wpdb->prefix}term_taxonomy ON {$wpdb->prefix}term_relationships.term_taxonomy_id={$wpdb->prefix}term_taxonomy.term_taxonomy_id LEFT JOIN {$wpdb->prefix}terms ON {$wpdb->prefix}term_taxonomy.term_id={$wpdb->prefix}terms.term_id WHERE ({$wpdb->prefix}term_taxonomy.taxonomy='product_cat' ) OR ({$wpdb->prefix}term_taxonomy.taxonomy LIKE 'pa_%') )";

	    $q_cat="( SELECT DISTINCT({$wpdb->prefix}term_relationships.object_id), {$wpdb->prefix}terms.name,{$wpdb->prefix}terms.slug,{$wpdb->prefix}term_taxonomy.taxonomy FROM {$wpdb->prefix}term_relationships LEFT JOIN {$wpdb->prefix}term_taxonomy ON {$wpdb->prefix}term_relationships.term_taxonomy_id={$wpdb->prefix}term_taxonomy.term_taxonomy_id LEFT JOIN {$wpdb->prefix}terms ON {$wpdb->prefix}term_taxonomy.term_id={$wpdb->prefix}terms.term_id WHERE {$wpdb->prefix}term_taxonomy.taxonomy='product_cat' )";
	    
	    $q_att="( SELECT DISTINCT({$wpdb->prefix}term_relationships.object_id), {$wpdb->prefix}terms.name,{$wpdb->prefix}terms.slug,{$wpdb->prefix}term_taxonomy.taxonomy FROM {$wpdb->prefix}term_relationships LEFT JOIN {$wpdb->prefix}term_taxonomy ON {$wpdb->prefix}term_relationships.term_taxonomy_id={$wpdb->prefix}term_taxonomy.term_taxonomy_id LEFT JOIN {$wpdb->prefix}terms ON {$wpdb->prefix}term_taxonomy.term_id={$wpdb->prefix}terms.term_id WHERE {$wpdb->prefix}term_taxonomy.taxonomy LIKE 'pa_%' )";                
	    
	    //$jpc_data=json_decode( unserialize(get_option('eo_wbc_jpc_data',serialize(array()))) );
	    $jpc_data = array();
	    $jpc_str = wbc()->options->get_option('price_control','rules_data', false);
	    if( $jpc_str ) {
	    	// $jpc_data = json_decode( stripslashes( unserialize( wbc()->options->get_option('price_control','rules_data',serialize(array())) ) ), true );
	    	$jpc_data = json_decode( stripslashes( unserialize( $jpc_str ) ), true );
	    	if(empty($jpc_data)){
	    		return false;
	    	}
	    }
	    
	    if( !is_null($post_ID) ) {

	    	return false;
	    	//here we need smarter way to keep only those rules in jpc_data of which category or attribute condition/criteria/range have the post_ID in its range, is is important for performance/effciency also 
		    $jpc_data = array( $todo_keep_applicable_rules_only );
		}

		$update_cnt = 0;
		$variations_cnt = 0;
		$res["msg"] = $update_cnt." times product(s) prices updated";
	    if(is_array($jpc_data) OR is_object($jpc_data)){

	        foreach ($jpc_data as $q_data) {

	            
	            if( !is_null($post_ID) ) {
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
	            }
	            else {
	            	$rs = array( $post_ID );
	            }

	            //Only for simple products.
	            if(is_array($rs) || is_object($rs)){                        
	                
	                foreach ($rs as $post_id) {
	                	$update_cnt++;
	                    
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
	            
	            if( !is_null($post_ID) ) {
	            	$query=" ( SELECT ID FROM {$wpdb->prefix}posts WHERE post_parent IN ( {$_query} ) ) ";

		            for($l=0;$l<count($q_data)-1;$l++){
		                
		                $_field_data=$q_data[$l];               

		                if($_field_data->field_type==1){                                
		                    //is attribute                        
		                    $query=" ( SELECT post_id FROM {$wpdb->prefix}postmeta WHERE meta_key='attribute_pa_{$_field_data->field_value}' AND meta_value IN ( SELECT slug FROM {$q_att} AS T1 WHERE taxonomy='pa_{$_field_data->field_value}' AND ".($_field_data->cmp_value=="between"?" name BETWEEN '".explode('-',$_field_data->value_name)[0]."' AND '".explode('-',$_field_data->value_name)[1]."' ":" slug IN ('".implode("','",explode(',',$_field_data->value_data[0]))."') ")." )  AND post_id IN ( {$query} ) ) ";
		                }        
		            }

	            	$rs=$wpdb->get_results($query);
	            }
	            //Only for simple products.
	            if(is_array($rs) || is_object($rs)){                        
	                
	                foreach ($rs as $post_id) {     
	                	$update_cnt++;
	                	$pid = 0;
	                	if(is_object($post_id)){
	                		$pid = $post_id->post_id;
	                	} elseif(is_array($post_id)){
	                		$pid = $post_id['post_id'];
	                	}

	                    if(!empty($q_data[count($q_data)-1]->sales_price)){

	                        update_post_meta($pid,'_price',$q_data[count($q_data)-1]->sales_price);
	                        update_post_meta($pid,'_sale_price',$q_data[count($q_data)-1]->sales_price);

	                    } else{
	                        delete_post_meta($pid,'_sale_price');                    
	                        update_post_meta($pid,'_price',$q_data[count($q_data)-1]->regular_price);
	                    }            
	                    if(!empty($q_data[count($q_data)-1]->regular_price)){
	                    	update_post_meta($pid,'_regular_price',$q_data[count($q_data)-1]->regular_price); 
	                    }
	                    wc_delete_product_transients($pid);  
	                }
	            }
	        }

			$res["msg"] = $update_cnt." times product(s) prices updated";
	    }
	    else {
	    	$res["type"] = "error";
	    	$res["msg"] = "No input data provided";
	    }

        return $res;
	}
	
}

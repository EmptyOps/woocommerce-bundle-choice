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

	public function update_product( $product, $store ) {
		$this->update_prices($product->get_id(),$product,null);
	}

	public function update_prices( $post_ID=null, $post=null, $update=null){                           

		//when called from hook 
        if ( !is_null($post) ) {
        	if( $post->post_type != 'product' || is_null($post_ID) ) {
        	   	return;	
        	}
        }

		$res["type"] = "success";
	    $res["msg"] = "";
	    
	    ACTIVE_TODO_OC_START
	    -- we need to confirm that below queries are not having any issues aspecialy so that the prices are not updated on any unwanted products. yaah after that we need to take test the entire function once we need to run and test the entire funciton once, means when the user click save and update prices button from the price control admin pannel the last button that is that entire process is a yet not run and tested -- to h & -- to s
	    	-- so below return is temporary and we have added that so that as of now the action do not go furture and do not affect anything till it is not run and tested so simply remove it and we do run and testing.
	    ACTIVE_TODO_OC_END

	    return $result;

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

	        -- we now most probebly need to disable this loop but before that we need to confirm that nothing is breaking aspecialy the above if of is null and the query will remain working as it is -- to h & -- to s
	        	-- and regarding queries most probebly it should remain working but we need to confirm about above is null condition -- to h & -- to s
	        	-- and in the same way we need to confirm if there is anything else that is if breaking then we need to take care of it 
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

	                    	$prices_data = array();
	                    	
	                    	$prices_data['price'] = get_post_meta($post_id->object_id,'_price');
	                    	$prices_data['sales_price'] = get_post_meta($post_id->object_id,'_sale_price');

	                    	-- we need to figure out here how to prepare the $prices_data to pass in below function -- to h & -- to s
							$prices_data = self::price_markup_def_apply_rules($prices_data);

	                    	// //here seems bug should be regular_price instead of sales_price
	                        // //update_post_meta($post_id->object_id,'_price',$q_data[count($q_data)-1]->sales_price);
	                        // update_post_meta($post_id->object_id,'_price',$q_data[count($q_data)-1]->regular_price);
	                        // update_post_meta($post_id->object_id,'_sale_price',$q_data[count($q_data)-1]->sales_price);
	                        update_post_meta($post_id->object_id,'_price',$prices_data['price']);
	                        update_post_meta($post_id->object_id,'_sale_price',$prices_data['sales_price']);

	                    } else{

	                    	$prices_data = array();

	                    	$prices_data['price'] = get_post_meta($post_id->object_id,'_price');
	                        
	                        -- we need to figure out here how to prepare the $prices_data to pass in below function -- to h & -- to s
							$prices_data = self::price_markup_def_apply_rules($prices_data);

	                        delete_post_meta($post_id->object_id,'_sale_price');                    
	                        // update_post_meta($post_id->object_id,'_price',$q_data[count($q_data)-1]->regular_price);
	                        update_post_meta($post_id->object_id,'_price',$prices_data['price']);
	                    } 

	                    $prices_data = array();

                    	$prices_data['regular_price'] = get_post_meta($post_id->object_id,'_regular_price');
                        
                        -- we need to figure out here how to prepare the $prices_data to pass in below function -- to h & -- to s
						$prices_data = self::price_markup_def_apply_rules($prices_data);

	                    // update_post_meta($post_id->object_id,'_regular_price',$q_data[count($q_data)-1]->regular_price);   
	                    update_post_meta($post_id->object_id,'_regular_price',$prices_data['regular_price']);   
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

	                    	$prices_data = array();

	                    	$prices_data['price'] = get_post_meta($pid,'_price');
	                    	$prices_data['sales_price'] = get_post_meta($pid,'_sale_price');
	                        
	                        -- we need to figure out here how to prepare the $prices_data to pass in below function -- to h & -- to s
							$prices_data = self::price_markup_def_apply_rules($prices_data);

	                        // update_post_meta($pid,'_price',$q_data[count($q_data)-1]->sales_price);
	                        // update_post_meta($pid,'_sale_price',$q_data[count($q_data)-1]->sales_price);
	                        update_post_meta($pid,'_price',$prices_data['price']);
	                        update_post_meta($pid,'_sale_price',$prices_data['sales_price']);

	                    } else{

	                    	$prices_data = array();

	                    	$prices_data['price'] = get_post_meta($pid,'_price');
	                        
	                        -- we need to figure out here how to prepare the $prices_data to pass in below function -- to h & -- to s
							$prices_data = self::price_markup_def_apply_rules($prices_data);

	                        delete_post_meta($pid,'_sale_price');                    
	                        // update_post_meta($pid,'_price',$q_data[count($q_data)-1]->regular_price);
	                        update_post_meta($pid,'_price',$prices_data['price']);
	                    }            
	                    if(!empty($q_data[count($q_data)-1]->regular_price)){
	                    	
	                    	$prices_data = array();

	                    	$prices_data['regular_price'] = get_post_meta($pid,'_regular_price');
	                        
	                        -- we need to figure out here how to prepare the $prices_data to pass in below function -- to h & -- to s
							$prices_data = self::price_markup_def_apply_rules($prices_data);

	                    	// update_post_meta($pid,'_regular_price',$q_data[count($q_data)-1]->regular_price); 
	                    	update_post_meta($pid,'_regular_price',$prices_data['regular_price']); 
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

	/**
	 *	Price Markup rules
	 */
	public static function price_markup_rules(){

		-- here we need to set the static variables like we read for builders list so that we can reuse it for multiple calls that happen.

		aa delete maravani chhe.
		$price_markup_rules = array( 
						'prod_cat'=>array(

						), 
						'attr'=>array(

						),
						'variation'=>array(
							array( 'legacy_key'=> 'meta', 'map_def_key'=>'meta', 'meta_key'=>'sp_variations_data need to confirm exact key', 'requirement'=>'' )
						),
					);


		$price_markup_rules/*jpc_data*/ = array();
	    $jpc_str = wbc()->options->get_option('price_control','rules_data', false);
	    if( $jpc_str ) {
	    	// $jpc_data = json_decode( stripslashes( unserialize( wbc()->options->get_option('price_control','rules_data',serialize(array())) ) ), true );
	    	$price_markup_rules/*jpc_data*/ = json_decode( stripslashes( unserialize( $jpc_str ) ), true );
	    	if(empty($price_markup_rules/*jpc_data*/)){
	    		return false;
	    	}
	    }
		
		return apply_filters('wbc_price_markup_rules', $price_markup_rules);
	}

	/**
	 *	@param $prices_data should be in array
	 */
	public static function price_markup_def_apply_rules($prices_data, $args = array()) {

		// $prices_data = array();

		// NOTE: prod_structure_def function should be called and of use to those which supports entire loop and so on. like dapii, tableview and so on. 

		$price_markup_rules = self::price_markup_rules();

		if( is_array($price_markup_rules) OR is_object($price_markup_rules) ) {

			return $prices_data;
		} 

		$prices_data = apply_filters('wbc_price_markup_def_apply_rules', $prices_data, $price_markup_rules, $args);

		foreach($price_markup_rules as $type => $val) {

			if( empty($val->jpc_target) ){

				$prices_data = self::apply_rule($val, $prices_data);
            }




	        -- below apply rules logic there is one bit flow error maybe that we are not actualy appling the % rules and as far as a remember yaa we have that missing so far so now we need to detect if it is % or so but anyway what we should to do at this point the simply set the % in the label in the price control admin so that user know that only % are supported and maybe we can also put help text -- to h
	        	-- so maybe we should simply add the % in the label at last and also help text -- to h & -- to s
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




		}

		return $prices_data;
	}

	public static function apply_rule( $rule, $price ) {

	}
}

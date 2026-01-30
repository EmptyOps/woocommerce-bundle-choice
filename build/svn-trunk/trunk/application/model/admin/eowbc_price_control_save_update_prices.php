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

		// ACTIVE_TODO in furure when required we need to add the cron support for the wbc free layer of price control. but yaah it is a fact that we always need to keep in mind that the fundamental function of updating entire catelog prices based on one click on the save update prices button is important and that should always remains working and supported and so the cron is only in addition to that and we can do that only when required. and maybe that is not so necessary as of now. and if user wants to update their jewelery product prices based on changing gold rate or something such for jewelery items then in that case they need to use jewelry api extension so that it works just like the diamond api with the fundamental cron of the dapii. so maybe we can simply mark it as todo if nothing comes up by second or third revision -- to h


		//when called from hook 
        if ( !is_null($post) ) {
        	if( $post->post_type != 'product' || is_null($post_ID) ) {
        	   	return;	
        	}
        }

		$res["type"] = "success";
	    $res["msg"] = "";
	    
	    // ACTIVE_TODO_OC_START
	    // -- we need to confirm that below queries are not having any issues aspecialy so that the prices are not updated on any unwanted products. yaah after that we need to run and test the entire funciton once, means when the user click save and update prices button from the price control admin pannel, the last button. that entire process is yet not run and tested -- to h & -- to s
	    // 		--	and when we confirm everything we must keep in mind that there seems grouping supported means multiple category or attributes based rules can be created and then one regular_price and sales_price expression can be set on that. which means directly or indirectly it is grouping of multiple rules. so when we run and test everything this need to be confirmed. and this is contradictory to what we initially thought that it is not supporting grouping and it may require grouping -- to h 
	    // 	-- so below return is temporary and we have added that so that as of now the action do not go further and do not affect anything till it is not run and tested so simply remove it, when we do run and testing.
	    // ACTIVE_TODO_OC_END
	    return $res;

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

		    // ACTIVE_TODO_OC_START
	        // -- we now most probebly need to disable this loop but before that we need to confirm that nothing is breaking aspecialy the above if of is null and the query will remain working as it is -- to h & -- to s
	        // 		--	it would not be that easier and straight forward, especially since the based on below rules loop of jpc_data and then the q_data loop the sql query is generated products to be processed are determined. so maybe we should think about it again, maybe simply the wbc layers implementation here in the price_markup_def_apply_rules would skip implementing any conditions related to category and attribute and it should be simply done from here and then the particular rule linked to particular data should be sent in the prices_data var. 
	        // 	-- and regarding queries most probebly it should remain working but we need to confirm about above is null condition -- to h & -- to s
	        // 	-- and in the same way we need to confirm if there is anything else that is if breaking then we need to take care of it 
		    // ACTIVE_TODO_OC_END
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

						    // ACTIVE_TODO_OC_START
	                    	// -- we need to figure out here how to prepare the $prices_data to pass in below function -- to h & -- to s done 
	               			// 	--	above is done but maybe we need additional conditions layer to make sure that if legacy storage products wants to skip the non default target rules then it should or simply maybe the target dropdown based if condition everywhere is enough for that, no it is not since the data is commonly passed everywhere so we simply need to add some param like data source in the $prices_data var and maybe use that to add condition for specific layer then only it would be suffice. -- to h 
	               			// 		--	and maybe we needed all these conditions, and separate layers, because the conditions of rule s category and attribute if match or not is required to be executed on different (data) storage layers like here in wbc the sql query on woo catalog data while on dapii it would be on the definition data layer. so if that is the case then that is worth it but we need to confirm otherwise it feels that we need to rethink about the structure and implementation and just simplify it, and make it mature and solid structure. 
						    // ACTIVE_TODO_OC_END
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
	                        
						    // ACTIVE_TODO_OC_START
	                    	// -- we need to figure out here how to prepare the $prices_data to pass in below function -- to h & -- to s done 
	               			// 	--	above is done but maybe we need additional conditions layer to make sure that if legacy storage products wants to skip the non default target rules then it should or simply maybe the target dropdown based if condition everywhere is enough for that, no it is not since the data is commonly passed everywhere so we simply need to add some param like data source in the $prices_data var and maybe use that to add condition for specific layer then only it would be suffice. -- to h 
	               			// 		--	and maybe we needed all these conditions, and separate layers, because the conditions of rule s category and attribute if match or not is required to be executed on different (data) storage layers like here in wbc the sql query on woo catalog data while on dapii it would be on the definition data layer. so if that is the case then that is worth it but we need to confirm otherwise it feels that we need to rethink about the structure and implementation and just simplify it, and make it mature and solid structure. 
						    // ACTIVE_TODO_OC_END
							$prices_data = self::price_markup_def_apply_rules($prices_data);

	                        delete_post_meta($post_id->object_id,'_sale_price');                    
	                        // update_post_meta($post_id->object_id,'_price',$q_data[count($q_data)-1]->regular_price);
	                        update_post_meta($post_id->object_id,'_price',$prices_data['price']);
	                    } 

	                    $prices_data = array();

                    	$prices_data['regular_price'] = get_post_meta($post_id->object_id,'_regular_price');
                        
					    	// ACTIVE_TODO_OC_START
	                    	// -- we need to figure out here how to prepare the $prices_data to pass in below function -- to h & -- to s done 
	               			// 	--	above is done but maybe we need additional conditions layer to make sure that if legacy storage products wants to skip the non default target rules then it should or simply maybe the target dropdown based if condition everywhere is enough for that, no it is not since the data is commonly passed everywhere so we simply need to add some param like data source in the $prices_data var and maybe use that to add condition for specific layer then only it would be suffice. -- to h 
	               			// 		--	and maybe we needed all these conditions, and separate layers, because the conditions of rule s category and attribute if match or not is required to be executed on different (data) storage layers like here in wbc the sql query on woo catalog data while on dapii it would be on the definition data layer. so if that is the case then that is worth it but we need to confirm otherwise it feels that we need to rethink about the structure and implementation and just simplify it, and make it mature and solid structure. 
						    // ACTIVE_TODO_OC_END
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
	                        
						    // ACTIVE_TODO_OC_START
	                    	// -- we need to figure out here how to prepare the $prices_data to pass in below function -- to h & -- to s done 
	               			// 	--	above is done but maybe we need additional conditions layer to make sure that if legacy storage products wants to skip the non default target rules then it should or simply maybe the target dropdown based if condition everywhere is enough for that, no it is not since the data is commonly passed everywhere so we simply need to add some param like data source in the $prices_data var and maybe use that to add condition for specific layer then only it would be suffice. -- to h 
	               			// 		--	and maybe we needed all these conditions, and separate layers, because the conditions of rule s category and attribute if match or not is required to be executed on different (data) storage layers like here in wbc the sql query on woo catalog data while on dapii it would be on the definition data layer. so if that is the case then that is worth it but we need to confirm otherwise it feels that we need to rethink about the structure and implementation and just simplify it, and make it mature and solid structure. 
						    // ACTIVE_TODO_OC_END
							$prices_data = self::price_markup_def_apply_rules($prices_data);

	                        // update_post_meta($pid,'_price',$q_data[count($q_data)-1]->sales_price);
	                        // update_post_meta($pid,'_sale_price',$q_data[count($q_data)-1]->sales_price);
	                        update_post_meta($pid,'_price',$prices_data['price']);
	                        update_post_meta($pid,'_sale_price',$prices_data['sales_price']);

	                    } else{

	                    	$prices_data = array();

	                    	$prices_data['price'] = get_post_meta($pid,'_price');
	                        
							// ACTIVE_TODO_OC_START
	                    	// -- we need to figure out here how to prepare the $prices_data to pass in below function -- to h & -- to s done 
	               			// 	--	above is done but maybe we need additional conditions layer to make sure that if legacy storage products wants to skip the non default target rules then it should or simply maybe the target dropdown based if condition everywhere is enough for that, no it is not since the data is commonly passed everywhere so we simply need to add some param like data source in the $prices_data var and maybe use that to add condition for specific layer then only it would be suffice. -- to h 
	               			// 		--	and maybe we needed all these conditions, and separate layers, because the conditions of rule s category and attribute if match or not is required to be executed on different (data) storage layers like here in wbc the sql query on woo catalog data while on dapii it would be on the definition data layer. so if that is the case then that is worth it but we need to confirm otherwise it feels that we need to rethink about the structure and implementation and just simplify it, and make it mature and solid structure. 
						    // ACTIVE_TODO_OC_END
							$prices_data = self::price_markup_def_apply_rules($prices_data);

	                        delete_post_meta($pid,'_sale_price');                    
	                        // update_post_meta($pid,'_price',$q_data[count($q_data)-1]->regular_price);
	                        update_post_meta($pid,'_price',$prices_data['price']);
	                    }            
	                    if(!empty($q_data[count($q_data)-1]->regular_price)){
	                    	
	                    	$prices_data = array();

	                    	$prices_data['regular_price'] = get_post_meta($pid,'_regular_price');
	                        
							// ACTIVE_TODO_OC_START
	                    	// -- we need to figure out here how to prepare the $prices_data to pass in below function -- to h & -- to s done 
	               			// 	--	above is done but maybe we need additional conditions layer to make sure that if legacy storage products wants to skip the non default target rules then it should or simply maybe the target dropdown based if condition everywhere is enough for that, no it is not since the data is commonly passed everywhere so we simply need to add some param like data source in the $prices_data var and maybe use that to add condition for specific layer then only it would be suffice. -- to h 
	               			// 		--	and maybe we needed all these conditions, and separate layers, because the conditions of rule s category and attribute if match or not is required to be executed on different (data) storage layers like here in wbc the sql query on woo catalog data while on dapii it would be on the definition data layer. so if that is the case then that is worth it but we need to confirm otherwise it feels that we need to rethink about the structure and implementation and just simplify it, and make it mature and solid structure. 
						    // ACTIVE_TODO_OC_END 
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
	private static $_price_markup_rules = null;
	public static function price_markup_rules(){

		if ( ! isset( self::$_price_markup_rules ) ) {

			$price_markup_rules/*jpc_data*/ = array();
		    $jpc_str = wbc()->options->get_option('price_control','rules_data', false);
		    
		    if( $jpc_str ) {

		    	// $jpc_data = json_decode( stripslashes( unserialize( wbc()->options->get_option('price_control','rules_data',serialize(array())) ) ), true );
		    	$price_markup_rules/*jpc_data*/ = json_decode( stripslashes( unserialize( $jpc_str ) ), true );
		    	
		    	if(empty($price_markup_rules/*jpc_data*/)){

		    		self::$_price_markup_rules = false;

		    		return self::$_price_markup_rules;
		    	}
		    }
			
			self::$_price_markup_rules = apply_filters('wbc_price_markup_rules', $price_markup_rules);
		}

		return self::$_price_markup_rules;
	}

	/**
	 * 
	 *	@param $prices_data should be as array type
	 */
	public static function price_markup_def_apply_rules($prices_data, $args = array()) {

		if( wbc()->sanitize->get('is_test') == 1 ) {

			wbc_pr("Eowbc_Price_Control_Save_Update_Prices price_markup_def_apply_rules 1");
			wbc_pr($prices_data);
		}

		// $prices_data = array();

		$price_markup_rules = self::price_markup_rules();

		if( !is_array($price_markup_rules) and !is_object($price_markup_rules) ) {

			return $prices_data;
		} 

		$prices_data = apply_filters('wbc_price_markup_def_apply_rules', $prices_data, $price_markup_rules, $args);

		foreach($price_markup_rules as $type => $val) {

			if( empty($val[0]['jpc_target']) ){

				foreach( $prices_data as $price_field_key => $price_field_value ) {

					$prices_data[$price_field_key] = self::apply_rule( $val, $price_field_value, (strpos( $price_field_key, "sales_price" ) !== FALSE ? true : false) );
				}
            }

		}

		return $prices_data;
	}

	public static function apply_rule( $rule, $price, $is_sales_price ) {

		// if( wbc()->sanitize->get('is_test') == 1 ) {

		// 	wbc_pr("Eowbc_Price_Control_Save_Update_Prices apply_rule 1");
		// 	wbc_pr($rule);
		// 	wbc_pr($price);
		// }


		// -- below apply rules logic there is one bit flow error maybe that we are not actualy appling the % rules and as far as a remember yaa we have that missing so far so now we need to detect if it is % or so but anyway what we should to do at this point the simply set the % in the label in the price control admin so that user know that only % are supported and maybe we can also put help text -- to h done 
		// 	-- so maybe we should simply add the % in the label at last and also help text -- to h & -- to s done help text was not neccessary so that is not added


		if($is_sales_price) {

			return ( $price + ( $price * ( $rule[count($rule)-1]['sales_price'] / 100 ) ) );
		} else {

			return ( $price + ( $price * ( $rule[count($rule)-1]['regular_price'] / 100 ) ) );
		}
	}
}

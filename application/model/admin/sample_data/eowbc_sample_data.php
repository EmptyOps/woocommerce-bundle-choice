<?php


/*
*	Sample data Model.
*/

namespace eo\wbc\model\admin\sample_data;

defined( 'ABSPATH' ) || exit;

class Eowbc_Sample_Data {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	protected $number_of_step = 3;
	protected $data_template = null;

	private function __construct() {
		set_time_limit(300);
	}

	public function get_data_template(){
		return $this->data_template;
	}

	public function number_of_step() {
		return $this->number_of_step;
	}

	public function data_template() {
		return $this->data_template;
	}

	public function get( $form_definition ) {
		return $form_definition;
	}

	public function save( $form_definition ) {
		
		$res = array();
		$res["type"] = "success";
	    $res["msg"] = "";
	    
        return $res;
	}

	public function after_cat_created($feature_key) {
		
		$category = $this->data_template->get_categories();
		$_maps = $this->data_template->get_maps();

		if(!empty($category)){
			      	
	        //Send for creation and update returned array.
	        $catat_category=$this->create_category($category);            
	        // update_option('eo_wbc_cats',serialize($catat_category)); 
	        wbc()->options->set('eo_wbc_cats',serialize($catat_category)); 
	      
	      	if(!empty($_maps)){
	        	$this->add_maps($_maps);
	      	}

	        $this->data_template->set_configs_after_categories($catat_category);
	    }
	}

	public function after_attr_created($feature_key) {
		
		$attributes = $this->data_template->get_attributes();

		if(!empty($attributes)){
	    
	        //Send for creation and update returned array.
	        $catat_attribute = unserialize(wbc()->options->get( $feature_key.'_created_attribute', 'a:0:{}')); 	//$this->create_attribute($attributes);            
	        
	        // update_option('eo_wbc_attr',serialize($catat_attribute));
	        wbc()->options->set('eo_wbc_attr',serialize($catat_attribute));
	        $this->add_filters();
	        if(!empty(wbc()->sanitize->get('type')) and wbc()->sanitize->get('type')=='filters_automation'){
	        	$this->add_filters_custom_filter();	
	        }			        

	        // update_option('eo_wbc_filter_enable','1');    
	        $this->data_template->set_configs_after_attributes();

	        wbc()->options->delete($feature_key.'_created_attribute');
	        
	    } 
	}

	public function process_post(&$_step, $_category, $_atttriutes, $_maps, $feature_key) {
		
		if(!empty(wbc()->sanitize->get('type')) and !empty(wbc()->sanitize->get('eo_wbc_view_auto_jewel')) and wbc()->sanitize->get('type')=='remove_filters_automation' and wbc()->sanitize->get('eo_wbc_view_auto_jewel')==1){
			wbc()->options->update_option('tiny_feature','filter_widget',serialize(array()));
			header("Location: ".admin_url('admin.php?page=eowbc-tiny-features')); 
			exit; 
		}
		if(!empty($_POST)) {			
			
			if(isset($_POST['_wpnonce']) && wp_verify_nonce(wbc()->sanitize->post('_wpnonce'),'eo_wbc_auto_jewel')) {
			  
			  // commented since moved it to batch based processing
			  // $index=0;
			  // $category=array();
			  // while(!empty($_POST['cat_value_'.$index])){
			  //   if(!empty($_POST['cat_'.$index])){
			  //     $_category[$index]['name']=$_POST['cat_value_'.$index];
			  //     $category[]=$_category[$index];
			  //   }
			  //   $index++;
			  // }      

			  // $index=0;
			  // $attributes=array();
			  // while(!empty($_POST['attr_value_'.$index])){
			  //   if(!empty($_POST['attr_'.$index])){
			  //     $_atttriutes[$index]['name']=$_POST['attr_value_'.$index];
			  //     $attributes[]=$_atttriutes[$index]; 
			  //   }
			  //   $index++;
			  // }

			  ////////////////////////////////////////////////////////////////////////
			  //require_once ('library/EO_WBC_CatAt.php');
			  //$catat=new EO_WBC_CatAt();
			  // $this->CatAtData__construct();
			  // $catat = $this;
			  $catat = $this->data_template;

			  		// commented since moved it to batch based processing
			      // if(!empty($category)){
			      	
			      //   //Send for creation and update returned array.
			      //   $catat_category=$this->create_category($category);            
			      //   // update_option('eo_wbc_cats',serialize($catat_category)); 
			      //   wbc()->options->set('eo_wbc_cats',serialize($catat_category)); 
			      
			      // 	if(!empty($_maps)){
			      //   	$this->add_maps($_maps);
			      // 	}

			      //   $this->data_template->set_configs_after_categories($catat_category);
			      // }

			      // if(!empty($attributes)){
			    
			      //   //Send for creation and update returned array.
			      //   $catat_attribute=$this->create_attribute($attributes);            
			      //   // update_option('eo_wbc_attr',serialize($catat_attribute));
			      //   wbc()->options->set('eo_wbc_attr',serialize($catat_attribute));
			      //   $this->add_filters();
			      //   if(!empty(wbc()->sanitize->get('type')) and wbc()->sanitize->get('type')=='filters_automation'){
			      //   	$this->add_filters_custom_filter();	
			      //   }			        

			      //   // update_option('eo_wbc_filter_enable','1');    
			      //   $this->data_template->set_configs_after_attributes();
			      // } 
			  
			  ///////////////////////////////////////////////////////////////////////
			  
			}

			if(!empty(wbc()->sanitize->post('step'))){
			  if(wbc()->sanitize->post('step')==3) {

			    ?>
			    <script type="text/javascript" >
			    jQuery(document).ready(function($) {            

			        var eo_wbc_max_products=<?php echo($this->get_product_size()); ?>;            
			        function eo_wbc_add_products(index){

			            if(index>=eo_wbc_max_products){
			                
			                window.location.href="<?php echo(admin_url('admin.php?page=eowbc')); ?>";
			                return false;
			            }

			            jQuery(".button.button-primary.button-hero.action.disabled").val("Adding "+(index+1)+" of "+eo_wbc_max_products+" products");

			            var data = {
			                //'action': 'eo_wbc_add_products',
			                '_wpnonce': '<?php echo wp_create_nonce('sample_data_jewelry');?>',
			                'action':'eowbc_ajax',
			                'resolver':'sample_data/<?php _e($feature_key); ?>',
			                'product_index':index 
			            };

			            jQuery.post('<?php echo admin_url( 'admin-ajax.php' ); ?>', data, function(response) {
			            	var resjson = jQuery.parseJSON(response);
			                if( typeof(resjson["type"]) != undefined && resjson["type"] == "success" ){
				                eo_wbc_add_products(++index);                    
			                } else {
			                	var type = (typeof(resjson["type"]) != undefined ? resjson["type"] : 'error');
			                	var msg = (typeof(resjson["msg"]) != undefined && resjson["msg"] != "" ? resjson["msg"] : `Failed! Please check Logs page for for more details.`);
			                    eowbc_toast_common( type, msg );
			                }  
			            });                
			        }   
			        
			        $(".button.button-primary.button-hero.action").on('click',function(e){
			            e.stopPropagation();
			            e.preventDefault();
			            if(!$(this).hasClass('disabled')) {
			                $(".button.button-hero.action:not(.disabled)").toggleClass('disabled');
			                eo_wbc_add_products(0);
			                //eo_wbc_add_products(119);
			            }                
			            return false;
			        });

			    });
			    </script> <?php
			  }      
			    $_step=wbc()->sanitize->post('step');
			} else {
			    $_step=1;
			}

		}
	}

	public function create_category($args) {
		if(!empty($args) AND is_array($args)) {
			foreach($args as $index=>$cat) {					
				//to be removed. No more can remove this check as since now due to batch processing we are retrieving all ids later on.
			   	if(term_exists( $cat['slug'] , 'product_cat' )){
			   		$args[$index]['id']=wbc()->wc->get_term_by('slug',$cat['slug'] , 'product_cat')->term_id;
			   	} else {
			   		$cat_id=$this->create_category_factory($cat);
			   		$args[$index]['id']=$cat_id;	
				}				   
			}
			return $args;
		} else {
			return FALSE;				
		}
	}
	
	public function create_product($index){

		$res = array( "type"=>"success", "msg"=>"" );

		global $wpdb;

		if(!isset($this->data_template->get_products()[$index])) {
			return array( "type"=>"error", "msg"=>"No product found at index ".$index );	//FALSE;
		}

		
		$product=$this->data_template->get_products()[$index];

		if(!empty($product['sku']) and !empty(wc_get_product_id_by_sku($product['sku'])) ) {
			return $res;
		}
		
		$product_id= wp_insert_post( array(
		    'post_author' => get_current_user_id(),
		    'post_title' => $product['title'],
		    'post_content' => $product['content'],
		    'post_status' => 'publish',
		    'post_type' => "product",
		));

		wp_set_object_terms( $product_id,$product['type'],'product_type');
		wp_set_object_terms( $product_id,$product['category'],'product_cat');					

		if(!empty($product['attribute'])){
			foreach ($product['attribute'] as $_tax => $_val) {

				$_val = explode('|',$_val['value']);
				
				if(is_array($_val) and !empty($_val)){
					
					foreach ($_val as $key => $value) {
						
						$tax_term = term_exists( $value, $_tax );
						if ( ! $tax_term ) {								
							$tax_term = wp_insert_term( $value, $_tax );								
						}

						if(!empty($tax_term) and !is_wp_error($tax_term)){
							$term_slug = wbc()->wc->get_term_by('term_taxonomy_id',$tax_term['term_taxonomy_id'],$_tax);	
							if(!empty($term_slug->slug) and !is_wp_error($term_slug)) {
								$_val[$key] = $term_slug->slug;
							}
						}

					}						
					
				}
				$product['attribute'][$_tax]['value'] = implode('|',$_val);					
			}	
		}

		update_post_meta( $product_id, '_product_attributes', $product['attribute'] );

		if(!empty($product['sku'])) {
			update_post_meta( $product_id, '_sku', $product['sku'] );			
		}

		foreach ($product['attribute'] as $attr_index => $attribute) {
			wp_set_object_terms( $product_id, explode('|',$attribute['value']) , $attr_index );					
		}
		
		$img_id=$this->add_image_gallary($product['thumb']);
		if($img_id){	
			set_post_thumbnail( $product_id,$img_id );
		}

		if(!empty($product['images']) and is_array($product['images'])){

			$imgs = array();
			foreach ($product['images'] as $img) {
				$imgid = $this->add_image_gallary($this->data_template->gallay_img.$img);
				if(!empty($imgid)){
					array_push( $imgs, $imgid);	
				}					
			}

			update_post_meta($product_id,"_product_image_gallery",implode(',', $imgs));
		}

		

		$parent_id = $product_id;
		if(!empty($product['variation'])){

			foreach ($product['variation'] as $var_index => $variation) {						

				if(!empty($variation['terms'])){					 
					foreach($variation['terms'] as $taxonomy=>$term_name){
							
						if( ! taxonomy_exists($taxonomy) ){						            
				            register_taxonomy(
				                $taxonomy,
				               'product_variation',
				                array(
				                    'hierarchical' => false,
				                    'label' => ucfirst( substr($taxonomy,3)),
				                    'query_var' => true,
				                    'rewrite' => array( 'slug' => sanitize_title(substr($taxonomy ,3) ) ), // The base slug
				                )
				            );
				        }
						
						$tax_term = term_exists( $term_name, $taxonomy );
						if ( ! $tax_term ) {								
							$tax_term = wp_insert_term( $term_name, $taxonomy );								
						} 
						if(!empty($tax_term) and !is_wp_error($tax_term)){
	    					$term_slug = wbc()->wc->get_term_by('term_taxonomy_id',$tax_term['term_taxonomy_id'],$taxonomy);
	    					if(!empty($term_slug->slug) and !is_wp_error($term_slug)) {
	    						$variation['terms'][$taxonomy] = $term_slug->slug;	    					
	    					}
	    				}
    				}
    				
    				$var_ = new \WC_Product_Variation();
					$var_->set_props(
						array(
							'parent_id'     => $parent_id,							
							'regular_price' => $variation['regular_price'],
							'sale_price' => $variation['price']
						)
					);
					$var_->set_attributes($variation['terms']);							
					$var_->save();
				}				
			}	

			$_product = wc_get_product($parent_id);
			$_product->set_default_attributes($product['variation'][0]['terms']);					
			$_product->save();

		} elseif (!empty($product['regular_price'])) {
			update_post_meta( $parent_id, '_regular_price',$product['regular_price'] );
			update_post_meta( $parent_id, '_price', $product['sale_price']);						
			update_post_meta( $parent_id, '_sales_price', $product['price']);
			update_post_meta( $parent_id, '_sale_price', $product['sale_price']);				
			update_post_meta( $parent_id, '_manage_stock','no' );						
		}

		return $res;	// TRUE;
	}	

	public function create_products($args) {
		
		if(!empty($args) || is_array($args)) {

			//////////////////////////////////////////////////////////////////////////////
			//////////////////////////////////////////////////////////////////////////////
			foreach ($args as $index => $product) {
					
				$product_id= wp_insert_post( array(
				    'post_author' => get_current_user_id(),
				    'post_title' => $product['title'],
				    'post_content' => $product['content'],
				    'post_status' => 'publish',
				    'post_type' => "product",
				));

				wp_set_object_terms( $product_id,$product['type'],'product_type');
				wp_set_object_terms( $product_id,$product['category'],'product_cat');					
				update_post_meta( $product_id, '_product_attributes', $product['attribute'] );

				foreach ($product['attribute'] as $attr_index => $attribute) {
					wp_set_object_terms( $product_id, explode('|',$attribute['value']) , $attr_index );						
				}
				
				$img_id=$this->add_image_gallary($product['thumb']);
				if($img_id){	
					set_post_thumbnail( $product_id,$img_id );
				}

				if($product['type']==='simple'){
					
					update_post_meta( $product_id, '_regular_price',$product['regular_price'] );
					update_post_meta( $product_id, '_price', $product['regular_price']);						
					update_post_meta( $product_id, '_sales_price', $product['sale_price']);
					update_post_meta( $product_id, '_manage_stock','no' );
				}

				$parent_id = $product_id;

				foreach ($product['variation'] as $var_index => $variation) {						

					$variation_data = array(
					    'post_title'   => $product['title'],
					    'post_name'   => 'product-'.$parent_id.'-variation',						    
					    'post_status'  => 'publish',
					    'post_parent'  => $parent_id,
					    'post_type'    => 'product_variation',
					    'guid'        => wbc()->wc->eo_wbc_get_product($parent_id)->get_permalink()
					);						

					$variation_id = wp_insert_post( $variation_data );

					$variation_obj = new \WC_Product_Variation( $variation_id );

					update_post_meta( $variation_id, '_regular_price',$variation['regular_price'] );
					update_post_meta( $variation_id, '_price', $variation['regular_price']);						
					update_post_meta( $variation_id, '_sales_price', $variation['price']);
					update_post_meta( $variation_id, '_manage_stock','no' );						
																	
					if(!empty($variation['terms'])){					 

						foreach($variation['terms'] as $taxonomy=>$term_name){										

							if( ! taxonomy_exists($taxonomy) ){						            
					            register_taxonomy(
					                $taxonomy,
					               'product_variation',
					                array(
					                    'hierarchical' => false,
					                    'label' => ucfirst( substr($taxonomy,3)),
					                    'query_var' => true,
					                    'rewrite' => array( 'slug' => sanitize_title(substr($taxonomy ,3) ) ), // The base slug
					                )
					            );
					        }

					        if( ! term_exists( $term_name, $taxonomy ) )
        						wp_insert_term( $term_name, $taxonomy );           					

        					$term_slug = wbc()->wc->get_term_by('name', $term_name, $taxonomy );
        					if(!empty($term_slug->slug) and !is_wp_error($term_slug)){
        						update_post_meta( $variation_id, 'attribute_'.$taxonomy, $term_slug->slug );	
        					}				
						}						
						\WC_Product_Variable::sync($parent_id);
					}

				    $variation_obj->save(); // Save the data
				}
			}									
			return true;
		} else {
			return false;
		}
	}

	function add_filters_custom_filter(){

		$__cat = get_categories(array(
            'hierarchical' => 1,
            'show_option_none' => '',
            'hide_empty' => 0,
            'parent' => 0,
            'taxonomy' => 'product_cat'
        ));

        $__cat__=array();

        foreach ($__cat as $__cat_) {
        	$__cat__[$__cat_->slug]=array($__cat_->term_id,$__cat_->name);
        }

        $__att=wc_get_attribute_taxonomies();        
        
        $__att__=array();

        foreach ($__att as $__att_) {                     
        	$__att__[$__att_->attribute_name]=array($__att_->attribute_id,$__att_->attribute_label);
        }		        

		$this->filter=array();

		//Filters for diamond....						
		if(!empty($__cat__['eo_diamond_shape_cat'])){
			$this->filter['woo_custome_filter_widget'][]=array(
									                        'name'=>$__cat__['eo_diamond_shape_cat'][0],
									                        'type'=>"0",
									                        'label'=>$__cat__['eo_diamond_shape_cat'][1],
									                        'advance'=>"0",
									                        'dependent'=>"0",
									                        'input'=>"icon_text",
									                        'column_width'=> "100",
									                        'order'=>"0",
									                    );
		}
		if(!empty($__att__['eo_carat_attr'])){
			$this->filter['woo_custome_filter_widget'][]=array(
									                        'name'=>$__att__['eo_carat_attr'][0],
									                        'type'=>"1",
									                        'label'=>$__att__['eo_carat_attr'][1],
									                        'advance'=>"0",
									                        'dependent'=>"0",
									                        'input'=>"numeric_slider",
									                        'column_width'=> "50",
									                        'order'=>"1",
									                    );
		}			
		if(!empty($__att__['eo_clarity_attr'])){
			$this->filter['woo_custome_filter_widget'][]=array(
									                        'name'=>$__att__['eo_clarity_attr'][0],
									                        'type'=>"1",
									                        'label'=>$__att__['eo_clarity_attr'][1],
									                        'advance'=>"0",
									                        'dependent'=>"0",
									                        'input'=>"text_slider",
									                        'column_width'=> "50",
									                        'order'=>"2",
									                    );
		}
		if(!empty($__att__['eo_colour_attr'])){
			$this->filter['woo_custome_filter_widget'][]=array(
									                        'name'=>$__att__['eo_colour_attr'][0],
									                        'type'=>"1",
									                        'label'=>$__att__['eo_colour_attr'][1],
									                        'advance'=>"0",
									                        'dependent'=>"0",
									                        'input'=>"text_slider",
									                        'column_width'=> "50",
									                        'order'=>"3",
									                    );
		}
		if(!empty($__att__['eo_polish_attr'])){
			$this->filter['woo_custome_filter_widget'][]=array(
									                        'name'=>$__att__['eo_polish_attr'][0],
									                        'type'=>"1",
									                        'label'=>$__att__['eo_polish_attr'][1],
									                        'advance'=>"1",
									                        'dependent'=>"0",
									                        'input'=>"text_slider",
									                        'column_width'=> "50",
									                        'order'=>"4",
									                    );
		}
		if(!empty($__att__['eo_symmertry_attr'])){
			$this->filter['woo_custome_filter_widget'][]=array(
									                        'name'=>$__att__['eo_symmertry_attr'][0],
									                        'type'=>"1",
									                        'label'=>$__att__['eo_symmertry_attr'][1],
									                        'advance'=>"1",
									                        'dependent'=>"0",
									                        'input'=>"text_slider",
									                        'column_width'=> "50",
									                        'order'=>"5",
									                    );
		}
		if(!empty($__att__['eo_fluorescence_attr'])){
			$this->filter['woo_custome_filter_widget'][]=array(
									                        'name'=>$__att__['eo_fluorescence_attr'][0],
									                        'type'=>"1",
									                        'label'=>$__att__['eo_fluorescence_attr'][1],
									                        'advance'=>"1",
									                        'dependent'=>"0",
									                        'input'=>"text_slider",
									                        'column_width'=> "50",
									                        'order'=>"6",
									                    );
		}
		if(!empty($__att__['eo_depth_attr'])){
			$this->filter['woo_custome_filter_widget'][]=array(
									                        'name'=>$__att__['eo_depth_attr'][0],
									                        'type'=>"1",
									                        'label'=>$__att__['eo_depth_attr'][1],
									                        'advance'=>"1",
									                        'dependent'=>"0",
									                        'input'=>"numeric_slider",
									                        'column_width'=> "50",
									                        'order'=>"7",
									                    );
		}
		if(!empty($__att__['eo_table_attr'])){
			$this->filter['woo_custome_filter_widget'][]=array(
									                        'name'=>$__att__['eo_table_attr'][0],
									                        'type'=>"1",
									                        'label'=>$__att__['eo_table_attr'][1],
									                        'advance'=>"1",
									                        'dependent'=>"0",
									                        'input'=>"numeric_slider",
									                        'column_width'=> "50",
									                        'order'=>"8",
									                    );
		}
		if(!empty($__att__['eo_grading_report_attr'])){
			$this->filter['woo_custome_filter_widget'][]=array(
									                        'name'=>$__att__['eo_grading_report_attr'][0],
									                        'type'=>"1",
									                        'label'=>$__att__['eo_grading_report_attr'][1],
									                        'advance'=>"1",
									                        'dependent'=>"0",
									                        'input'=>"checkbox",
									                        'column_width'=> "50",
									                        'order'=>"9",
									                    );
		}

		

        foreach ($this->filter as $filters) {
				
				  foreach($filters as $filter){        		

	        		$_data=unserialize(wbc()->options->get_option('tiny_feature','filter_widget',"a:0:{}"));
	        		$names=array_column($_data,'name');
	        		if( !in_array($filter['name'], $names)){
	        			$_data[]=array(
		                        'name'=>$filter['name'],
		                        'type'=>$filter['type'],
		                        'label'=>$filter['label'],
		                        'advance'=>$filter['advance'],
		                        'dependent'=>$filter['dependent'],
		                        'input'=>$filter['input'],
		                        'column_width'=>$filter['column_width'],
		                        'order'=>(int)$filter['order'],
		                    );    	                
	        			wbc()->options->update_option('tiny_feature','filter_widget',serialize($_data)); 
	        	  }
	        }
        }        	
	}

	function add_filters(){

		$__cat = get_categories(array(
            'hierarchical' => 1,
            'show_option_none' => '',
            'hide_empty' => 0,
            'parent' => 0,
            'taxonomy' => 'product_cat'
        ));

        $__cat__=array();

        foreach ($__cat as $__cat_) {
        	$__cat__[$__cat_->slug]=array($__cat_->term_id,$__cat_->name);
        }

        $__att=wc_get_attribute_taxonomies();        
        
        $__att__=array();

        foreach ($__att as $__att_) {                     
        	$__att__[$__att_->attribute_name]=array($__att_->attribute_id,$__att_->attribute_label);
        }		        

		$this->filter=array();

		//Filters for particular feature....						
		$this->filter = $this->data_template->get_filters($__cat__, $__att__);

		wbc()->load->model('admin/eowbc_filters');
		wbc()->load->model('admin/form-builder');

    	foreach ($this->filter as $index => $filters) {
			
			foreach($filters as $filter){        		

        		// // $_data=unserialize(get_option($index,"a:0:{}"));
        		// $_data = unserialize(wbc()->options->get_option_group('filters_'.$index,"a:0:{}"));
        		// $names=array_column($_data,'name');
        		// if( !in_array($filter['name'], $names)){

        			$prefix = "";
        			if(empty($this->tab_key_prefix)){
        				$this->tab_key_prefix = '';
        			}

        			if( $index == "d_fconfig" ) {
						$_POST["saved_tab_key"] = $this->tab_key_prefix."d_fconfig";
						$prefix = "d";
						$_POST['first_category_altr_filt_widgts'] = $filter['template'];
        			}
        			else {
        				$_POST["saved_tab_key"] = $this->tab_key_prefix."s_fconfig";
						$prefix = "s";
						$_POST['second_category_altr_filt_widgts'] = $filter['template'];
        			}

        			if(!empty($filter['filter_set'])) {        				
        				$_POST[$prefix.'_fconfig_set']=$filter['filter_set'];
        			}
        			        			 	
        			$_POST[$prefix.'_fconfig_filter']=$filter['name'];
	                $_POST[$prefix.'_fconfig_type']=$filter['type'];
	                $_POST[$prefix.'_fconfig_label']=$filter['label'];
	                $_POST[$prefix.'_fconfig_is_advanced']=$filter['advance'];
	                $_POST[$prefix.'_fconfig_dependent']=$filter['dependent'];
	                $_POST[$prefix.'_fconfig_input_type']=$filter['input'];
	                $_POST[$prefix.'_fconfig_column_width']=$filter['column_width'];
	                $_POST['filter_template'] = $filter['template'];
	                
	                $_POST[$prefix.'_fconfig_ordering']=$filter['order'];
	                $_POST[$prefix.'_fconfig_icon_size']='';
	                $_POST[$prefix.'_fconfig_icon_label_size']='';
	                $_POST[$prefix.'_fconfig_add_reset_link']='';
	                $_POST[$prefix.'_fconfig_add_help']=$filter['help'];
	                $_POST[$prefix.'_fconfig_add_help_text']=$filter['help_text'];
	                $_POST[$prefix.'_fconfig_add_enabled']=$filter['enabled'];
	                

	                if(!empty($filter['filter_category'])) {
						$_POST['filter_category']=$filter['filter_category'];	                	
	                }

        			// update_option($index,serialize($_data)); 
        			// wbc()->options->update_option_group( 'filters_'.$index, serialize($_data) );
        			$filter_model = \eo\wbc\model\admin\Eowbc_Filters::instance();
        			$filter_model->tab_key_prefix = $this->tab_key_prefix;

        			if(empty($this->form_defination)) {
        				$this->form_defination = \eo\wbc\controllers\admin\menu\page\Filters::get_form_definition(); 
        			}

					$res = $filter_model->save( $this->form_defination ,true);

					unset($_POST[$prefix.'_fconfig_filter']);
	                unset($_POST[$prefix.'_fconfig_type']);
	                unset($_POST[$prefix.'_fconfig_label']);
	                unset($_POST[$prefix.'_fconfig_is_advanced']);
	                unset($_POST[$prefix.'_fconfig_dependent']);
	                unset($_POST[$prefix.'_fconfig_input_type']);
	                unset($_POST[$prefix.'_fconfig_column_width']);
	                unset($_POST[$prefix.'_fconfig_ordering']);
	                unset($_POST[$prefix.'_fconfig_icon_size']);
	                unset($_POST[$prefix.'_fconfig_icon_label_size']);
	                unset($_POST[$prefix.'_fconfig_add_reset_link']);


	                if(!empty($filter['filter_set'])) {        				
        				unset($_POST[$prefix.'_fconfig_set']);
        			}

	                if( $index == "d_fconfig" ) {						
						unset($_POST['first_category_altr_filt_widgts']);
        			}
        			else {        				
						unset($_POST['second_category_altr_filt_widgts']);
        			}

	                unset($_POST['filter_template']);
	                unset($_POST['first_category_altr_filt_widgts']);
	                unset($_POST[$prefix.'_fconfig_add_help']);
	                unset($_POST[$prefix.'_fconfig_add_help_text']);
	                unset($_POST[$prefix.'_fconfig_add_enabled']);

	                if(!empty($filter['filter_category'])) {
						unset($_POST['filter_category']);
	                }

        		// }
        	}
    	}
    	
    	do_action('eowbc_automation_post_sample_filters',$__cat__, $__att__);        	
	}

	function create_attribute( $args ){
		
	    if(!empty($args) AND is_array($args)){
	    	
	    	foreach ($args as $index=>$attribute) {		    				        

	    		if(!isset($attribute['label']) && !isset($attribute['terms'])) return;
	    		//adding post data to store data in posts
	    		$data = array(
			        'name'   => wp_unslash($attribute['label']),
			        'slug'    => empty($attribute['slug']) ? wc_sanitize_taxonomy_name(wp_unslash($attribute['label'])) : $attribute['slug'],
			        'type'    => (empty($attribute['type'])?'select':$attribute['type']),
			        'order_by' => 'menu_order',
			        'has_archives'  => 1, // Enable archives ==> true (or 1)
			    );		

	    		$id = wbc()->wc->eo_wbc_create_attribute( $data );
	    		// @mahesh - added to store the ribbon color from sample data
	    		if(!empty($id) and !is_wp_error($id) and !empty($attribute['ribbon_color'])) {
	    			update_term_meta($id,'wbc_ribbon_color',$attribute['ribbon_color']);
	    		}
	    		
    			if( ! taxonomy_exists('pa_'.$data['slug']) ){	
    				register_taxonomy(
		                'pa_'.$data['slug'],
		                array( 'product', 'product_variation' ),
		                array(
		                    'hierarchical' => false,
		                    'label' => ucfirst($data['slug']),
		                    'query_var' => true,
		                    'rewrite' => array( 'slug' => sanitize_title($data['slug'])),
		                )
		            );		 
		        }

	    		/*if( ! taxonomy_exists('pa_'.$data['slug']) ){						            		    			
		            register_taxonomy(
		                'pa_'.$data['slug'],
		               	array( 'product','product_variation' )			                
		            );
		        }*/ 				
					
				if(empty($attribute['range'])){
		    		
		    		foreach ($attribute['terms'] as $term_index=>$term)  {	

	    				if( ! term_exists( $term, 'pa_'.$data['slug']) ) {

							$attr_term_id = wp_insert_term( $term,'pa_'.$data['slug'],array('slug' => sanitize_title($term)) ); 
							
							if(!empty($attr_term_id) and !is_wp_error($attr_term_id)) {

		    					$_attr_term_id = null;
		    					if(is_array($attr_term_id)) {

		    						$_attr_term_id=isset($attr_term_id['term_id']) ? $attr_term_id['term_id'] : null;

		    						if(!empty($_attr_term_id)) {

		    							if(!empty($attribute['thumb'][$term_index])){
											$thumb_id=0;
				    						$thumb_id=$this->add_image_gallary($attribute['thumb'][$term_index]);
				    						update_term_meta( $_attr_term_id, 'pa_'.$data['slug'].'_attachment', wp_get_attachment_url( $thumb_id ) );
		    								update_term_meta( $_attr_term_id, sanitize_title($term).'_attachment', wp_get_attachment_url( $thumb_id ) );
				    					}

		    							if(!empty($attribute['type']) and !empty($attribute['terms_meta']) and is_array($attribute['terms_meta'])){

		    								switch ($attribute['type']) {
		    									case 'color':
		    									
		    									function_exists( 'update_term_meta' ) ? update_term_meta( $_attr_term_id,'wbc_color',$attribute['terms_meta'][$term_index]) : update_metadata( 'woocommerce_term', $_attr_term_id,'wbc_color',$attribute['terms_meta'][$term_index]);
		    										break;
		    									
		    									case 'image':				
		    									case 'image_text':	
		    									case 'dropdown_image':
		    									case 'dropdown_image_only':	

		    									$wbc_attachment_id = $this->add_image_gallary($attribute['terms_meta'][$term_index]);

		    									$wbc_attachment_src =wp_get_attachment_url( $wbc_attachment_id );
		    									function_exists( 'update_term_meta' ) ? update_term_meta( $_attr_term_id,'wbc_attachment',$wbc_attachment_src) : update_metadata( 'woocommerce_term', $_attr_term_id,'wbc_attachment',$wbc_attachment_src);

		    										break;
		    								}
		    							}
		    						}		    						
		    					}
							}		    								    			
			    		}
			    	}
		    	}
		    	else{
		    		
		    		if(!empty($attribute['terms']['min']) && !empty($attribute['terms']['max'])) {
		    			
		    			for($i=(float)$attribute['terms']['min'];$i<=(int)$attribute['terms']['max'];$i=round($i+0.1,1)){
		    				
		    				if( ! term_exists( $i, 'pa_'.$data['slug']) ){					    					
		    					
								wp_insert_term( $i, 'pa_'.$data['slug'],array('slug' => sanitize_title($i))); 
							}
		    			}
		    		}			    		
		    	}	    					    	
	    		$args[$index]['id']=$id;
	    	}
	    	return $args;
	    }	    
	}

	private function create_category_factory( $cat ){

		if(!empty($cat) AND is_array($cat)) {
			$param=array(
		            'description'=> $cat['description'],
		            'slug' => $cat['slug'],			            
		        );

			if(!empty($cat['parent'])) {

				$param['parent'] = $cat['parent'];
			}
			
			// TODO I think we should use WC API for managing categories if that is available and I believe that must be available. 
		    $id = wp_insert_term(
		        $cat['name'], // the term 
		        'product_cat', // the taxonomy
		        $param
		    );			    

		    if(!is_wp_error($id) || isset($id->error_data['term_exists'])) {

		    	$thumb_id=0;
		    	if( isset($cat['thumb']) ) {
			    	$thumb_id=$this->add_image_gallary($cat['thumb']);
			    }

		    	$cat_id = null;
		    	if(is_array($id)) {
					
					$cat_id=isset($id['term_id']) ? $id['term_id'] : null;			    		

					if( isset( $id['term_id'] ) ){

			    		update_term_meta( $cat_id, 'thumbnail_id', absint( $thumb_id ) );	

			    		if( !empty($cat["thumb_selected"]) ) {
			    			update_term_meta( $cat_id, 'wbc_attachment', wp_get_attachment_url(absint($this->add_image_gallary($cat["thumb_selected"])) ));	
			    		}
			    	}

		    	}
		    	elseif (is_object($id)) {

		    		if(is_wp_error($id)){

		    			$cat_id=isset($id->error_data['term_exists'])?$id->error_data['term_exists']:null;
		    		}
		    	}					

				if(!empty($cat['child'])) {

			    	foreach ($cat['child'] as $child) {

			    		$child['parent']=$cat_id;				    		
			    		$this->create_category_factory($child);
			    	}
		    	}

		    	if(isset($cat_id)){
		    		return $cat_id;
		    	} else {
		    		return false;
		    	}
		    } else {
		    	if(!is_wp_error($id) and !empty($id['term_id'])) {
		    		return $id['term_id'];
		    	} else {
		    		return false;
		    	}			    	
		    }			    
		}
	}

	/* Add image to the wordpress image media gallary */
	public function add_image_gallary($path) {

		if(!$path) return FALSE;

		$name = basename($path);

		$attachment_check=new \Wp_Query( array(
	        'posts_per_page' => 1,
	        'post_type'      => 'attachment',
	        'name'           => implode('-',explode(' ',strtolower($name))).'-image'
	    ));

	    if ( $attachment_check->have_posts() ) {
	      $posts=$attachment_check->get_posts();
	      return $posts[0]->ID;
	    }

		//$file = wp_upload_bits($name, null, file_get_contents(str_replace(' ','%20',$path)));

	    ///////////// 14-05-2022 -- @drashti /////////////

		$file_bits = wbc()->common->file_get_contents($path);

		$file = wp_upload_bits($name, null, $file_bits);

	    /////////////////////////////////////////////////

		if (!$file['error']) {

			$type = wp_check_filetype($name, null );

			$attachment = array(
				'post_mime_type' => $type['type'],
				'post_parent' => null,
				'post_title' => implode('-',explode(' ',strtolower($name))).'-image'/*preg_replace('/\.[^.]+$/', '', $name)*/,
				'post_content' => '',
				'post_status' => 'inherit'
			);

			$id = wp_insert_attachment( $attachment, $file['file'], null );

			if (!is_wp_error($id)) {

				require_once(ABSPATH . "wp-admin" . '/includes/image.php');

				$data = wp_generate_attachment_metadata( $id, $file['file'] );
				wp_update_attachment_metadata( $id, $data );

				return $id;

			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}

	/**
		array(
			array(
				['slug','my_cat','product_cat'],
				['name','term','pa_attr']
			)
		);
	*/
	function add_maps($args) {     

		//return true;

		wbc()->load->model('admin/eowbc_mapping');
		wbc()->load->model('admin\form-builder');

		if(!empty($args) && is_array($args)){

			foreach ($args as $map) {
        
				$first=wbc()->wc->get_term_by($map[0][0],$map[0][1],$map[0][2]);
      
		          if(!empty($first) and !is_wp_error($first)){
		            $first = $first->term_taxonomy_id;
		          }

				$second=wbc()->wc->get_term_by($map[1][0],$map[1][1],$map[1][2]);
      
		          if(!empty($second) and !is_wp_error($second)){
		            $second = $second->term_taxonomy_id;
		          }

				$discount='0';

				if(!empty($first) && !empty($second)) {


					// $maps=unserialize(get_option('eo_wbc_cat_maps',"a:0:{}"));
    
			  //       if(!empty($maps) and !is_wp_error($maps)){

			            // $match_found = false;
			            // foreach ($maps as $key=>$value) {    

			            //     if($value[0]==$first and $value[1]==$second) {                 
			            //         $match_found = true;
			            //         break;
			            //     } elseif ($value[1]==$first and $value[0]==$second) {
			            //         $match_found = true;
			            //         break;
			            //     }
			            // }

			            // if(!$match_found){				                
			            //     $maps[] = array($first,$second,$discount);
			            // }

			        // } else {
			        //     $maps = array(array($first,$second,$discount));
			        // }

					$_POST["saved_tab_key"] = "map_creation_modification";
				 	
        			$_POST['range_first']='';
	                $_POST['eo_wbc_first_category']=$first;
	                $_POST['eo_wbc_first_category_range']='';

	                $_POST['range_second']='';
	                $_POST['eo_wbc_second_category']=$second;
	                $_POST['eo_wbc_second_category_range']='';

                    $_POST['eo_wbc_add_discount']='0';

        			$res = \eo\wbc\model\admin\Eowbc_Mapping::instance()->save( \eo\wbc\controllers\admin\menu\page\Mapping::get_form_definition() );

        			unset($_POST["saved_tab_key"]);
        			unset($_POST['range_first']);
	                unset($_POST['eo_wbc_first_category']);
	                unset($_POST['eo_wbc_first_category_range']);
	                unset($_POST['range_second']);
	                unset($_POST['eo_wbc_second_category']);
	                unset($_POST['eo_wbc_second_category_range']);
                    unset($_POST['eo_wbc_add_discount']);

			        // update_option('eo_wbc_cat_maps',serialize($maps)); 
			        // update_option('eo_wbc_config_map',"1");	
			        wbc()->options->update_option('configuration','config_map',"1");		                            				        
				}
			}
    		return true;        		
      	}	
      	return false;			
	}

	/**
	* @return number of products in product list.
	* the list is defined in constructor of the calss.
	*/
	function get_product_size() {

		return count($this->data_template->get_products());
	}

	/**
	* @return number of attributes in data template
	*/
	function get_attributes_size() {

		return count($this->data_template->get_attributes());
	}

	/**
	* @return number of categories in data template
	*/
	function get_categories_size() {

		$template = $this->data_template->get_categories();

		$index = 0;
		foreach ($template as $catind => $cat) {
			
			$index++;

			if( isset($cat['child']) ) {
				foreach ($cat['child'] as $childcatind => $childcat) {

					$index++;
				}
			}
		}

		return $index;
	}

}

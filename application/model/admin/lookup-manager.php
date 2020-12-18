<?php


/*
*	Woocommerc Category and Attribute Model.
*/

namespace eo\wbc\model\admin;

defined( 'ABSPATH' ) || exit;

class Lookup_Manager {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {
		
	}

	public function init($args=array()) {
		// 	On remove category and attribute.
		add_action('delete_term',array($this,'remove_category_column'),99,5);

		add_action('woocommerce_attribute_deleted',array($this,'remove_attribute_column'), 10,3);

		add_action( 'woocommerce_new_product',array($this,'add_product'),99,2);
		add_action( 'woocommerce_new_product_variation',array($this,'add_product_variation'),99,2);

		add_action( 'woocommerce_update_product',array($this,'update_product'),99,2);
		add_action( 'woocommerce_update_product_variation',array($this,'update_product_variation'),99,2);
	}

	public function get_data($product) {
		if(!empty($product) and !is_wp_error($product)){
			$attributes = $product->get_attributes();
			$categories = $product->get_category_ids();

			$attributes_list = array();
			if(!empty($attributes) and is_array($attributes)) {
				foreach ($attributes as $attr_key => $attr_value) {
					if( !empty($attr_value) and is_object($attr_value) and !is_wp_error($attr_value) ) {
						$attr_options = $attr_value->get_options();
						if(!empty($attr_options) and is_array($attr_options)) {
							$attributes_list[$attr_key] = $attr_options[0];
						}					
					}elseif (is_string($attr_value)) {
						$attr_value = get_term_by('slug',$attr_value,$attr_key);
						
						if( !empty($attr_value) and is_object($attr_value) and !is_wp_error($attr_value) ) {
							$attributes_list[$attr_key] = $attr_value->term_id;
						}
					}
				}
			}

			$category_slug = array();
			if(!empty($categories) and is_array($categories)){
				foreach ($categories as $cat_id) {
					$category_object = get_term_by('id',$cat_id,'product_cat');
					if(!empty($category_object) and !is_wp_error($category_object)) {
						$category_slug[$category_object->slug] = $category_object->slug;	
					}
				}
			}
			return array('attribute'=>$attributes_list,'category'=>$category_slug);
		} else {
			return array('attribute'=>null,'category'=>null);
		}
	}

	public function process_columns($data) {

		global $wpdb;
		require_once( constant('ABSPATH') . '/wp-admin/includes/upgrade.php' );
		$lookup_table = $wpdb->prefix."wc_product_meta_lookup";

		$table_columns = unserialize(wbc()->options->get_option('lookup_manager','table_columns',serialize(array()))) ;

		if(empty($table_columns)){
			$table_columns = array('attribute'=>array(),'category'=>array());
		}

		if(empty($table_columns['attribute'])){
			$table_columns['attribute'] = array();
		}

		if(empty($table_columns['category'])){
			$table_columns['category'] = array();
		}
		
		if(!empty($data['attribute'])){
			foreach ($data['attribute'] as $attr_key => $attr_value) {
				if($wpdb->get_var("SHOW COLUMNS FROM `".$lookup_table."` LIKE '".$attr_key."'" ) != $attr_key)
		        {
		            $sql="alter TABLE `".$lookup_table."` ADD `".$attr_key."` bigint(20) null";   
		            $wpdb->query($sql);
		            $table_columns['attribute'][$attr_key] = $attr_key;
		        }  
			}
		}

		if(!empty($data['category'])){
			foreach ($data['category'] as $cat_key => $cat_value) {
				if($wpdb->get_var("SHOW COLUMNS FROM `".$lookup_table."` LIKE '".$cat_value."'" ) != $cat_value)
		        {
		            $sql="alter TABLE `".$lookup_table."` ADD `".$cat_value."` bigint(20) null DEFAULT 0";   
		            $wpdb->query($sql);
		            $table_columns['category'][$cat_value] = $cat_value;
		        }  
			}
		}

		if($wpdb->get_var("SHOW COLUMNS FROM `".$lookup_table."` LIKE 'parent_id'" ) != 'parent_id')
        {
            $sql="alter TABLE `".$lookup_table."` ADD `parent_id` bigint(20) null";   
            $wpdb->query($sql);
        }

		wbc()->options->update_option('lookup_manager','table_columns',serialize($table_columns));
	}

	public function save($id,$data,$parent_id=0) {

		global $wpdb;
		$lookup_table = $wpdb->prefix."wc_product_meta_lookup";
		if(empty($id) or empty($data)){
			return false;
		}

		$table_columns = unserialize(wbc()->options->get_option('lookup_manager','table_columns',serialize(array())));
		$fields = array();
		$fields_type = array();
		if(!empty($table_columns['attribute']) and is_array($table_columns['attribute']) and !empty($data['attribute']) and is_array($data['attribute']) ) {
			foreach ($table_columns['attribute'] as $attr_key => $attr_value) {
				if(!empty($data['attribute'][$attr_key])) {
					$fields[$attr_key] = $data['attribute'][$attr_key];
					$fields_type[] = '%d';
				} else {
					$fields[$attr_key] = "";
					$fields_type[] = '%d';
				}
			}
		}
		
		if(!empty($table_columns['category']) and is_array($table_columns['category']) and !empty($data['category']) and is_array($data['category']) ) {
			foreach ($table_columns['category'] as $cat_key => $cat_value) {
				if(!empty($data['category'][$cat_key])) {
					$fields[$cat_key] = 1;
					$fields_type[] = '%d';
				} else {
					$fields[$cat_key] = 0;
					$fields_type[] = '%d';
				}
			}
		}

		if(!empty($parent_id) and is_numeric($parent_id)) {
			$fields['parent_id'] = $parent_id;
			$fields_type[] = '%d';
		}
		$wpdb->update( $lookup_table,$fields,array('product_id'=>$id),$fields_type, array('%d'));
		return $wpdb->last_query;
	}

	public function add_product($id, $product) {
		$data = $this->get_data($product);
		$this->process_columns($data);
		return $this->save($id,$data);
	}

	public function add_product_variation($id, $product) {
		$parent_id = $product->get_parent_id();
		$data = $this->get_data($product);
		$this->process_columns($data);
		return $this->save($id,$data,$parent_id);
	}

	public function update_product($id, $product) {
		$data = $this->get_data($product);
		$this->process_columns($data);
		return $this->save($id,$data);
	}

	public function update_product_variation($id, $product) {
		$parent_id = $product->get_parent_id();
		$data = $this->get_data($product);
		$this->process_columns($data);
		return $this->save($id,$data,$parent_id);
	}
		
	public function remove_attribute_column($id, $name, $taxonomy) {
		
		$table_columns = unserialize(wbc()->options->get_option('lookup_manager','table_columns',serialize(array())));

		if(!empty($table_columns['attribute']) and !empty($table_columns['attribute'][$taxonomy])){

			global $wpdb;
			require_once( constant('ABSPATH') . '/wp-admin/includes/upgrade.php' );
			$lookup_table = $wpdb->prefix."wc_product_meta_lookup";

			if($wpdb->get_var("SHOW COLUMNS FROM `".$lookup_table."` LIKE '".$taxonomy."'" ) == $taxonomy) {

	            $sql="alter TABLE `".$lookup_table."` DROP COLUMN `".$taxonomy."`";
	            $wpdb->query($sql);
	            unset($table_columns['attribute'][$taxonomy]);

	            wbc()->options->update_option('lookup_manager','table_columns',serialize($table_columns));
	        } 
		}
	}

	public function remove_category_column($term, $tt_id, $taxonomy, $deleted_term, $object_ids )
	{
		if($taxonomy == 'product_cat' and !empty($deleted_term) and !is_wp_error($deleted_term) ){
			
			$table_columns = unserialize(wbc()->options->get_option('lookup_manager','table_columns',serialize(array())));
			$term_slug = $deleted_term->slug;

			if(!empty($table_columns['category']) and !empty($table_columns['category'][$term_slug])){

				global $wpdb;
				require_once( constant('ABSPATH') . '/wp-admin/includes/upgrade.php' );
				$lookup_table = $wpdb->prefix."wc_product_meta_lookup";

				if($wpdb->get_var("SHOW COLUMNS FROM `".$lookup_table."` LIKE '".$term_slug."'" ) == $term_slug) {

		            $sql="alter TABLE `".$lookup_table."` DROP COLUMN `".$term_slug."`";
		            $wpdb->query($sql);
		            unset($table_columns['category'][$term_slug]);

		            wbc()->options->update_option('lookup_manager','table_columns',serialize($table_columns));
		        } 
			}

		}
	}	
}

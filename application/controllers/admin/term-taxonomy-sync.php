<?php
namespace eo\wbc\controllers\admin;

defined( 'ABSPATH' ) || exit;

class Term_Taxonomy_Sync {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {
		
	}



	public function sync_single() {

		add_action('created_term', array($this,'save_terms'), 10, 3);
		add_action('edit_term', array($this,'save_terms'), 10, 3);

		add_action('woocommerce_attribute_added',array($this,'save_taxonomy'), 10,2);
		add_action('woocommerce_attribute_updated',array($this,'save_taxonomy'), 10, 2);
		if( is_admin() and !empty(wbc()->sanitize->get('sync_terms'))) {
			add_action('init',function(){
				$this->sync_taxonomy();
				$this->sync_terms();
			});
		}
	}

	public function sync_terms() {
		$taxonomies = wc_get_attribute_taxonomies();
		if(!empty($taxonomies) and is_array($taxonomies)) {
			foreach($taxonomies as $taxonomy){
				$terms = get_terms(array('taxonomy'=>wc_attribute_taxonomy_name($taxonomy->attribute_name),'hide_empty'=>false));
				if(is_wp_error($terms)){
					$terms=get_terms(wc_attribute_taxonomy_name($taxonomy->attribute_name),array('hide_empty'=>false));
				}
				if(!empty($terms) and is_array($terms) and !is_wp_error($terms)) {
					foreach($terms as $term) {
						$this->save_terms($term->term_id, $term->term_taxonomy_id, wc_attribute_taxonomy_name($taxonomy->attribute_name));
					}					
				}
			}
			$terms = get_terms('product_cat', array('hide_empty' => 0, 'orderby' => 'menu_order'/*, 'parent'=>-1*/));
			if(!empty($terms) and is_array($terms) and !is_wp_error($terms)) {
				foreach($terms as $term) {
					$this->save_terms($term->term_id, $term->term_taxonomy_id,'product_cat');
				}					
			}
		}
	}

	public function get_term($by,$value,$taxonomy) {
		global $wpdb;
		switch($by) {
			case 'term_taxonomy_id':
				$by ='term_taxonomy_id';
				break;
			case 'name':
				$by ='name';
				break;
			case 'slug':
				$by ='slug';
				break;
			default:
				$by ='term_id';
		};

		$table = 'wp_wc_terms_lookup';		
		$lookup_table = $wpdb->prefix.$table;
		return $wpdb->get_row("SELECT * FROM ${lookup_table} WHERE `${by}`='${value}' AND `taxonomy`='${taxonomy}'");
	}

	public function get_terms($taxonomy,$parent_id = 0) {
		global $wpdb;
		$table = 'wp_wc_terms_lookup';		
		$lookup_table = $wpdb->prefix.$table;
		return $wpdb->get_results("SELECT * FROM ${lookup_table} WHERE `taxonomy`='${taxonomy}' AND `parent`='${parent_id}'");
	}

	//Saves the product attribute taxonomy term data
	public function save_terms($term_id, $tt_id, $taxonomy) {

		$id = $tt_id;

		$term = wbc()->wc->get_term_by('term_taxonomy_id',$tt_id,$taxonomy);
		if(empty($term) or is_wp_error($term)) {
			return true;
		}

		$data = (array)$term;

		$table = 'wp_wc_terms_lookup';
		$index_key = 'taxonomy_id';

		$no_icon = wc()->plugin_url() . '/assets/images/placeholder.png';

		$icon = '';
		if(!empty(wbc()->sanitize->post('product_cat_thumbnail_id'))) {
			$icon = wp_get_attachment_url(wbc()->sanitize->post('product_cat_thumbnail_id'));
		} elseif(!empty(wbc()->sanitize->post('wbc_attachment_thumb'))) {
			$icon = wbc()->sanitize->post('wbc_attachment_thumb');
		} else{
			$icon = wp_get_attachment_url( @get_term_meta( $tt_id, 'thumbnail_id', true ));
		}

		if(empty($icon)) {
			$icon = $no_icon;
		}


		
		if(!empty(wbc()->sanitize->post('wbc_attachment'))) {
			$select_icon = wbc()->sanitize->post('wbc_attachment');	
		} else {
			$select_icon = get_term_meta($tt_id, 'wbc_attachment',true);
		}

		if(empty($select_icon)) {
			$select_icon = $no_icon;	
		}

		$data['thumbnail_id'] = $icon;
		$data['wbc_attachment'] = $select_icon;
		$data['wbc_color'] = (empty(wbc()->sanitize->post('wbc_color'))?'#ffffff':wbc()->sanitize->post('wbc_color'));

		$column_data = array(
			'term_id'=> 'int(20)',
			'name' => 'varchar(255)',
			'slug' => 'varchar(255)',
			'term_group' => 'varchar(255)',
			'term_taxonomy_id' => 'int(20)',
			'taxonomy'=> 'varchar(255)',
			'description' => 'mediumtext',
			'parent'=>'int(20)',
			'count'=>'int(20)',
			'filter'=>'varchar(255)',
			'thumbnail_id'=>'mediumtext',
			'wbc_attachment'=>'mediumtext',
			'wbc_color'=>'varchar(10)'
		);

		$this->process_columns($column_data,$table,$index_key);
		$this->save($id,$data,$table,$index_key);		
	}

	public function sync_taxonomy() {

		$taxonomies = wc_get_attribute_taxonomies();

		if(!empty($taxonomies) and is_array($taxonomies)) {
			foreach($taxonomies as $taxonomy){
				$this->save_taxonomy($taxonomy->attribute_id,(array)$taxonomy);			
			}
		}
	}

	public function get_taxonomy($by,$value) {

		global $wpdb;
		switch($by) {
			case 'name':
				$by ='attribute_label';
				break;
			case 'slug':
				$by ='attribute_name';
				break;
			default:
				$by ='attribute_id';
		};

		$table = 'wp_wc_taxonomy_lookup';
		$index_key = 'taxonomy_id';
		$lookup_table = $wpdb->prefix.$table;
		$taxonomy = $wpdb->get_row("SELECT * FROM ${lookup_table} WHERE `${by}`='${value}'");
		
		if(empty($taxonomy)) {
			return false;
		}

		$taxonomy->id = $taxonomy->taxonomy_id;
		$taxonomy->slug = $taxonomy->attribute_name;
		$taxonomy->name = $taxonomy->attribute_label;

		// implement the missing fields;
		return $taxonomy;
	}

	public function save_taxonomy($id, $data) {

		$table = 'wp_wc_taxonomy_lookup';
		$index_key = 'taxonomy_id';

		$data = array_replace(array(
			'attribute_id' => $id,
			'wbc_color' => (empty(wbc()->sanitize->post('wbc_color'))?'#ffffff':wbc()->sanitize->post('wbc_color'))
		), $data);
	
		$column_data = array(
			'attribute_id'=> 'int(20)',
			'wbc_color' => 'varchar(10)',
			'attribute_label' => 'varchar(255)',
			'attribute_name' => 'varchar(255)',
			'attribute_type' => 'varchar(20)',
			'attribute_orderby'=> 'varchar(20)',
			'attribute_public' => 'int(0)',			
		);

		$this->process_columns($column_data,$table,$index_key);
		$this->save($id,$data,$table,$index_key);		
	}

	public function check_table($table,$index_key) {
		global $wpdb;
		$lookup_table = $wpdb->prefix.$table;		
		if($wpdb->get_var( "SHOW TABLES LIKE '$lookup_table'" ) != $lookup_table and !empty($index_key)) {
            $sql = "CREATE TABLE `$lookup_table`( ";	            
            $sql .= "${index_key} INT(20) NULL ) ".$wpdb->get_charset_collate().";";
            require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );
            dbDelta($sql);
        }
	}

	public function process_columns($data,$table,$index_key) {

		global $wpdb;

		$this->check_table($table,$index_key);		

		require_once( constant('ABSPATH') . '/wp-admin/includes/upgrade.php' );
		$lookup_table = $wpdb->prefix.$table;

		$table_columns = unserialize(wbc()->options->get_option('sp_lookup_manager_'.$table,'table_columns',serialize(array()))) ;

		if(!empty($data)) {
			foreach ($data as $column=>$data_type) {

				if($wpdb->get_var("SHOW COLUMNS FROM `".$lookup_table."` LIKE '".$column."'" ) != $column) {					
		            $sql="alter TABLE `".$lookup_table."` ADD `".$column."` ${data_type} null";   
		            $wpdb->query($sql);
		            $table_columns[$column] = $data_type;
		        }
			}
		}
		
		wbc()->options->update_option('sp_lookup_manager_'.$table,'table_columns',serialize($table_columns));
	}

	public function save($id,$data,$table,$index_key) {

		global $wpdb;
		$lookup_table = $wpdb->prefix.$table;

		if(empty($id) or empty($data)) {
			return false;
		}

		$table_columns = unserialize(wbc()->options->get_option('sp_lookup_manager_'.$table,'table_columns',serialize(array())));
		
		$fields = array();
		$fields_type = array();

		if(!empty($data) and !empty($index_key) and ( !empty($table_columns) and is_array($table_columns) )) {
			foreach ($table_columns as $column_name => $column_type) {
				
				if(strpos($column_type,'int')!==false) {
					$fields[$column_name] = (empty($data[$column_name])?0:$data[$column_name]);
					$fields_type[] = '%d';
				} else {
					$fields[$column_name] = (empty($data[$column_name])?'':$data[$column_name]);
					$fields_type[] = '%s';
				}
			}
			
			if($wpdb->get_var("SELECT ${index_key} FROM `${lookup_table}` WHERE ${index_key}=${id}") == $id){
				$wpdb->update( $lookup_table,$fields,array($index_key=>$id),$fields_type, array('%d'));
				return $wpdb->last_query;
			} else {

				$fields = array_merge([$index_key=>$id],$fields);
				$fields_type =array_merge(['%d'],$fields_type);

				$wpdb->insert( $lookup_table,$fields,$fields_type );
				return $wpdb->last_query;
			}
		}
				
				
	}

}
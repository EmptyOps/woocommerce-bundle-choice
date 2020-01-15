<?php 
if (!defined('ABSPATH')) exit;

if(!class_exists('WP_List_Table')){
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );    
}

if(!class_exists('EO_WBC_List_Table')){
	
	class EO_WBC_List_Table extends WP_List_Table{
		
		public function __construct(){

			 parent::__construct([
	                        'singular' => 'map', 
	                        'plural'   => 'maps', 
	                        'ajax'     => false 
                        ]);
		}
		
		public function get_maps(){

            global $wpdb;
            $query='select * from `'.$wpdb->prefix.'eo_wbc_cat_maps`';
            $maps=$wpdb->get_results($query,'ARRAY_A');
            if(count($maps)>0):
            	$_maps=array();
            	$_ID=array();
	            foreach ($maps as $map):                            
	            		$_first_term=false;
	            		$_second_term=false;
	            		
	            		if( strpos($map['first_cat_id'], 'pid_' )===0 ){	
	            			//get product title here...
	            			$_first_term=EO_WBC_Support::eo_wbc_get_product((int)substr($map['first_cat_id'],4));
	            		} else {
	            			$_first_term=EO_WBC_Support::get_term_by_term_taxonomy_id($map['first_cat_id']);	
	            		}
	            		
	            		if( strpos($map['second_cat_id'], 'pid_' ) ===0 ){	
	            			//get product title here...
	            			$_second_term=EO_WBC_Support::eo_wbc_get_product((int)substr($map['second_cat_id'],4));
	            		} else {
	            			$_second_term=EO_WBC_Support::get_term_by_term_taxonomy_id($map['second_cat_id']);
	            		}
	            		
	            		if(!(empty($_first_term) OR empty($_second_term))){
	            			
		            		$_ID[]=array('first'=>@$map['first_cat_id'],'second'=>@$map['second_cat_id']);
		            		$_maps[]=array( 'id'=>@$_first_term->term_taxonomy_id.'_'.@$_second_term->term_taxonomy_id,
		            						'slug'=>@$_first_term->slug.'_'.@$_second_term->slug,
		            						'first_term'=>@$_first_term->name,
		            						'second_term'=>@$_second_term->name,
		            						'discount'=>$map['discount']
		            					);
		            	}

	        	endforeach; 
	        	return array($_ID,$_maps);
	        else:
	        	return array();
            endif;          
		}

		function no_items(){
			echo "<span style='color:red'>".__("No map(s) exists, please add some maps.","woo-bundle-choice")."</span>";
		}

		function column_cb($item) {
			
			$actions = array(
		        /*'edit'      => sprintf('<a href="?page=%s&action=%s&map=%s&eo_wbc_action=single_map">Edit</a>',$_REQUEST['page'],'edit',$item['id']),*/
		        'delete'    => sprintf('<a href="?page=%s&action=%s&map=%s&eo_wbc_action=single_map">'.__('Delete',"woo-bundle-choice").'</a>',$_REQUEST['page'],'delete',$item['id']),
		    );

	        return sprintf('<span><input type="checkbox" name="cb[]" value="%1s" /></span><div style="width: max-content;">%2s</div>', $item['id'],$this->row_actions($actions));    
	    }
	
		//get list of columns to label on the table's top and bottom.
        function get_columns(){
          $columns = array(        
          	'cb'=>'<input type="checkbox" />',    
            'first_term'    => __('First Term',"woo-bundle-choice"),
            'second_term'   => __('Second Term',"woo-bundle-choice"),
            'discount'=>__('Discount',"woo-bundle-choice")
          );
          return $columns;
        }
     
        //make data ready to be shown.
        function prepare_items() {
          	$columns = $this->get_columns();
          
        	$hidden = array();
    	    $sortable = array();

	        $this->_column_headers = array($columns, $hidden, $sortable);          

          	$data=$this->get_maps()[1];

		  	$per_page = 5;
		  	$current_page = $this->get_pagenum();
		  	$total_items = count($data);
		  	
		  	// only ncessary because we have sample data
		  	if(is_array($data)){
		  		$data = array_slice($data,(($current_page-1)*$per_page),$per_page);	
		  	}
		  	
		  	$this->set_pagination_args( array(
			    'total_items' => $total_items,                  //WE have to calculate the total number of items
		    	'per_page'    => $per_page                     //WE have to determine how many items to show on a page
		  	) );

          	$this->items =$data;          
        }
        
        function column_default( $item, $column_name ) {
              switch( $column_name ) { 
                case 'first_term':                    
                case 'second_term':
                case 'discount':                
                  return $item[ $column_name ];
                default:
                  return print_r( $item, true ) ; //Show the whole array for troubleshooting purposes
            }
        }

        function get_bulk_actions() {
		  $actions = array(
		    'delete'    => __('Delete',"woo-bundle-choice"),
		    /*'edit'    => 'Edit'*/
		  );
		  return $actions;
		}
	}
}
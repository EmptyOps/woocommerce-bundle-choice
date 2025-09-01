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
		
		//return term object or false if no term found
		public function eo_wbc_get_term_by_id($id){
			if($id){
				if(empty(@get_term_by('term_taxonomy_id',$id,'category'))) {
					return @get_term_by('term_taxonomy_id',$id,'product_cat');
				}
				else{
					return @get_term_by('term_taxonomy_id',$id,'category'); 
				}
			}
			else{
				return false;
			}			
		}

		public function get_maps(){

            global $wpdb;
            $query='select * from `'.$wpdb->prefix.'eo_wbc_cat_maps`';
            $maps=$wpdb->get_results($query,'ARRAY_A');
            if(count($maps)>0):
            	$_maps=array();
            	$_ID=array();
	            foreach ($maps as $map):                            
	            		
	            		$_ID[]=array('first'=>@$map['first_cat_id'],'second'=>@$map['second_cat_id']);

	            		$_first_term=$this->eo_wbc_get_term_by_id($map['first_cat_id']);
	            		$_second_term=$this->eo_wbc_get_term_by_id($map['second_cat_id']);

	            		$_maps[]=array( 'id'=>@$_first_term->term_id.'_'.@$_second_term->term_id,
	            						'slug'=>@$_first_term->slug.'_'.@$_second_term->slug,
	            						'first_term'=>@$_first_term->name,
	            						'second_term'=>@$_second_term->name,
	            						'discount'=>$map['discount']
	            					);

	        	endforeach; 
	        	return array($_ID,$_maps);
	        else:
	        	return false;
            endif;          
		}

		function no_items(){
			echo "<span style='color:red'>No map(s) exists, please add some maps.</span>";
		}

		function column_cb($item) {
			
			$actions = array(
		        /*'edit'      => sprintf('<a href="?page=%s&action=%s&map=%s&eo_wbc_action=single_map">Edit</a>',$_REQUEST['page'],'edit',$item['id']),*/
		        'delete'    => sprintf('<a href="?page=%s&action=%s&map=%s&eo_wbc_action=single_map">Delete</a>',$_REQUEST['page'],'delete',$item['id']),
		    );

	        return sprintf('<span><input type="checkbox" name="cb[]" value="%1$s" /></span><div style="width: max-content;">%2$s</div>', $item['id'],$this->row_actions($actions));    
	    }
	
		//get list of columns to label on the table's top and bottom.
        function get_columns(){
          $columns = array(        
          	'cb'=>'<input type="checkbox" />',    
            'first_term'    => 'First Term',
            'second_term'   => 'Second Term',
            'discount'=>'Discount'
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
		    'delete'    => 'Delete',
		    /*'edit'    => 'Edit'*/
		  );
		  return $actions;
		}
	}
}
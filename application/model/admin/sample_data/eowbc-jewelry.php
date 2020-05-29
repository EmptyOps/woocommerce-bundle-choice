<?php


/*
*	Sample data jewelry Model.
*/

namespace eo\wbc\model\admin\sample_data;

defined( 'ABSPATH' ) || exit;

class Eowbc_Jewelry {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {
		
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

	public function process_post(&$_step) {

		if(!empty($_POST)) {

			if(isset($_POST['_wpnonce']) && wp_verify_nonce($_POST['_wpnonce'],'eo_wbc_auto_jewel')) {
			  $index=0;
			  $category=array();
			  while(!empty($_POST['cat_value_'.$index])){
			    if(!empty($_POST['cat_'.$index])){
			      $_category[$index]['name']=$_POST['cat_value_'.$index];
			      $category[]=$_category[$index];
			    }
			    $index++;
			  }      

			  $index=0;
			  $attributes=array();
			  while(!empty($_POST['attr_value_'.$index])){
			    if(!empty($_POST['attr_'.$index])){
			      $_atttriutes[$index]['name']=$_POST['attr_value_'.$index];
			      $attributes[]=$_atttriutes[$index]; 
			    }
			    $index++;
			  }

			  ////////////////////////////////////////////////////////////////////////
			  require_once ('library/EO_WBC_CatAt.php');
			  $catat=new EO_WBC_CatAt();

			      if(!empty($category)){
			        //Send for creation and update returned array.
			        $catat_category=$catat->create_category($category);            
			        update_option('eo_wbc_cats',serialize($catat_category));           

			        $catat->add_maps(array(
			            array(
			                ['slug','eo_diamond_round_shape_cat','product_cat'],
			                ['slug','eo_setting_round_shape_cat','product_cat']
			            ),
			            array(
			                ['slug','eo_diamond_princess_shape_cat','product_cat'],
			                ['slug','eo_setting_pear_shape_cat','product_cat']
			            ),
			            array(
			                ['slug','eo_diamond_emerald_shape_cat','product_cat'],
			                ['slug','eo_setting_emerald_shape_cat','product_cat']
			            ),
			            array(
			                ['slug','eo_diamond_asscher_shape_cat','product_cat'],
			                ['slug','eo_setting_asscher_shape_cat','product_cat']
			            ),
			            array(
			                ['slug','eo_diamond_marquise_shape_cat','product_cat'],
			                ['slug','eo_setting_marquise_shape_cat','product_cat']
			            ),
			            array(
			                ['slug','eo_diamond_oval_shape_cat','product_cat'],
			                ['slug','eo_setting_oval_shape_cat','product_cat']
			            ),
			            array(
			                ['slug','eo_diamond_radiant_shape_cat','product_cat'],
			                ['slug','eo_setting_radiant_shape_cat','product_cat']
			            ),
			            array(
			                ['slug','eo_diamond_pear_shape_cat','product_cat'],
			                ['slug','eo_setting_pear_shape_cat','product_cat']
			            ),
			            array(
			                ['slug','eo_diamond_heart_shape_cat','product_cat'],
			                ['slug','eo_setting_heart_shape_cat','product_cat']
			            ),
			            array(
			                ['slug','eo_diamond_cushion_shape_cat','product_cat'],
			                ['slug','eo_setting_cushion_shape_cat','product_cat']
			            )
			        ));

			        update_option('eo_wbc_first_name','Diamond Shape');//FIRST : NAME
			        update_option('eo_wbc_first_slug','eo_diamond_shape_cat');//FIRST : SLUG
			        update_option('eo_wbc_first_url','/product-category/eo_diamond_shape_cat/');//FIRST : NAME
			        
			        update_option('eo_wbc_second_name','Setting Shape');//SECOND : NAME
			        update_option('eo_wbc_second_slug','eo_setting_shape_cat');//SECOND : SLUG
			        update_option('eo_wbc_second_url','/product-category/eo_setting_shape_cat/');//SECOND : URL   

			        update_option('eo_wbc_config_category',1);
			        update_option('eo_wbc_config_map',1);    
			        update_option('eo_wbc_btn_setting','0');
			        update_option('eo_wbc_btn_position','begining');

			      }

			      if(!empty($attributes)){
			        //Send for creation and update returned array.
			        $catat_attribute=$catat->create_attribute($attributes);            
			        update_option('eo_wbc_attr',serialize($catat_attribute));
			        $catat->add_filters();     
			        update_option('eo_wbc_filter_enable','1');     
			      } 
			  
			  ///////////////////////////////////////////////////////////////////////
			  
			}

			if(!empty($_POST['step'])){
			  if($_POST['step']==3) {

			    ?>
			    <script type="text/javascript" >
			    jQuery(document).ready(function($) {            

			        var eo_wbc_max_products=<?php echo($catat->get_product_size()); ?>;            
			        function eo_wbc_add_products(index){

			            if(index>=eo_wbc_max_products){
			                
			                window.location.href="<?php echo(admin_url('admin.php?page=eo-wbc-home')); ?>";
			                return false;
			            }

			            jQuery(".button.button-primary.button-hero.action.disabled").val("Adding "+(index+1)+" of "+eo_wbc_max_products+" products");

			            var data = {
			                'action': 'eo_wbc_add_products',
			                'product_index':index 
			            };

			            jQuery.post('<?php echo admin_url( 'admin-ajax.php' ); ?>', data, function(response) {
			                
			                eo_wbc_add_products(++index);                    
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
			    $_step=$_POST['step'];
			} else {
			    $_step=1;
			}

		}
	}
	
}

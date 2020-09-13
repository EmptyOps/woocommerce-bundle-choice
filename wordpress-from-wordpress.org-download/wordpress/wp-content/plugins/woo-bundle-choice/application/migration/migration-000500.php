<?php

defined( 'ABSPATH' ) || exit;

class Migration_000500 {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {
		
	}
	
	public static function run() {
		self::instance()->db();
		self::instance()->option();
	}

	public function db() {
		global $wpdb;
        $eo_wbc_cat_map= $wpdb->prefix."eo_wbc_cat_maps";
        require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );

        if($wpdb->get_var("SHOW COLUMNS FROM `".$eo_wbc_cat_map."` LIKE 'discount'" ) != 'discount')
        {
            $sql="alter TABLE `".$eo_wbc_cat_map."` ADD `discount` VARCHAR(20) not null DEFAULT '0%' AFTER `second_cat_id` ";   
            $wpdb->query($sql);
        }  


        $query='select * from `'.$wpdb->prefix.'eo_wbc_cat_maps`';
        $maps=$wpdb->get_results($query,'ARRAY_A');
        if(!empty($maps)){                

            for ($i=0; $i < count($maps) ; $i++) { 

                $first_term_taxonomy_id=$wpdb->get_var("SELECT term_taxonomy_id FROM `{$wpdb->prefix}term_taxonomy` INNER JOIN `{$wpdb->prefix}terms` ON wbc_terms.term_id=wbc_term_taxonomy.term_id AND wbc_term_taxonomy.taxonomy='product_cat' AND wbc_terms.term_id={$maps[$i]['first_cat_id']}");

                $second_term_taxonomy_id=$wpdb->get_var("SELECT term_taxonomy_id FROM `{$wpdb->prefix}term_taxonomy` INNER JOIN `{$wpdb->prefix}terms` ON wbc_terms.term_id=wbc_term_taxonomy.term_id AND wbc_term_taxonomy.taxonomy='product_cat' AND wbc_terms.term_id={$maps[$i]['second_cat_id']}");

                if(!$first_term_taxonomy_id){
                    $first_term_taxonomy_id=$wpdb->get_var("SELECT term_taxonomy_id FROM `wbc_term_taxonomy` where taxonomy LIKE 'pa_%' and term_id={$maps[$i]['first_cat_id']}");
                }
                if(!$second_term_taxonomy_id){
                    $second_term_taxonomy_id=$wpdb->get_var("SELECT term_taxonomy_id FROM `wbc_term_taxonomy` where taxonomy LIKE 'pa_%' and term_id={$maps[$i]['second_cat_id']}");
                }   

                if($first_term_taxonomy_id && $second_term_taxonomy_id){
                    $wpdb->query("UPDATE `wbc_eo_wbc_cat_maps` SET `first_cat_id`={$first_term_taxonomy_id},`second_cat_id`={$second_term_taxonomy_id} WHERE first_cat_id={$maps[$i]['first_cat_id']} AND second_cat_id={$maps[$i]['second_cat_id']}");
                }
            }                
        }
	}

	public function option() {
        // commented since isn't necessary anymore and isn't right either 
		// update_option('eo_wbc_version','0.5.70');
	}
}
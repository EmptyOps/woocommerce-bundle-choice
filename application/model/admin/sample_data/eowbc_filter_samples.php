<?php
namespace eo\wbc\model\admin\sample_data;

defined( 'ABSPATH' ) || exit;

class Filter_Samples {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {
		
	}

	public function get_category() {
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
        return $__cat__;
	}

	public function get_attribute() {
		$__att=wc_get_attribute_taxonomies();        
        
        $__att__=array();

        foreach ($__att as $__att_) {                     
        	$__att__[$__att_->attribute_name]=array($__att_->attribute_id,$__att_->attribute_label);
        }	

        return $__att__;
	}

	public function save($filter,$tprefix='') {

		$this->filter = $filter;		

		wbc()->load->model('admin/eowbc_filters');
		wbc()->load->model('admin/form-builder');

    	foreach ($this->filter as $index => $filters) {
			
			foreach($filters as $filter){        						
        		// // $_data=unserialize(get_option($index,"a:0:{}"));
        		// $_data = unserialize(wbc()->options->get_option_group('filters_'.$index,"a:0:{}"));
        		// $names=array_column($_data,'name');
        		// if( !in_array($filter['name'], $names)){
        			$prefix = "";
        			if( $index == "d_fconfig" ) {
						$_POST["saved_tab_key"] = $tprefix."d_fconfig";
						$prefix = "d";
        			}
        			else {
        				$_POST["saved_tab_key"] = $tprefix."s_fconfig";
						$prefix = "s";
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

                    do_action('eowbc_filter_sample_data_pre',$prefix);

        			// update_option($index,serialize($_data)); 
        			// wbc()->options->update_option_group( 'filters_'.$index, serialize($_data) );
        			
                    if(empty($tprefix)){

    					$res = \eo\wbc\model\admin\Eowbc_Filters::instance()->save( \eo\wbc\controllers\admin\menu\page\Filters::get_form_definition(), true );
                    } else {
                        if( $tprefix == "sc_" ) {
                            $res = \eo\wbc\model\admin\Eowbc_Shop_Category_Filter::instance()->save( \eo\wbc\controllers\admin\menu\page\Shop_Category_Filter::get_form_definition(), true );
                        }
                        elseif( $tprefix == "shortflt_" ) {
                            $res = \eo\wbc\model\admin\Eowbc_Shortcode_Filters::instance()->save( \eo\wbc\controllers\admin\menu\page\Shortcode_Filters::get_form_definition(), true );
                        } elseif( $tprefix == "eorad_sc_" ) {
                            $res = \eo\rad\model\admin\Eorad_Filter::instance()->save( \eo\rad\controller\admin\pages\Request_Diamond_Filter::get_form_definition(), true );
                        }
                        else {
                            throw new \Exception("Sample data process not implemented for the provided prefix ".$tprefix, 1);
                        }
                    }

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

	                unset($_POST['filter_template']);

	                unset($_POST[$prefix.'_fconfig_add_help']);
	                unset($_POST[$prefix.'_fconfig_add_help_text']);
	                unset($_POST[$prefix.'_fconfig_add_enabled']);

                    do_action('eowbc_filter_sample_data_post',$prefix);

        		// }
        	}
    	}        	
	}

	public function fc1() {
		$__cat__ = $this->get_category();
        $__att__ = $this->get_attribute();

		$this->filter=array();

		//Filters for diamond....						
		if(!empty($__cat__['eo_diamond_shape_cat'])){
			$this->filter['d_fconfig'][]=array(
                    'name'=>$__cat__['eo_diamond_shape_cat'][0],
                    'type'=>"0",
                    'label'=>$__cat__['eo_diamond_shape_cat'][1],
                    'advance'=>"0",
                    'dependent'=>"0",
                    'input'=>"icon_text",
                    'column_width'=> "100",
                    'order'=>"0",
                    'template'=>'fc1',
                    'help'=>0,
                    'help_text'=>'',
                    'enabled'=>1
                );
		}
		if(!empty($__att__['eo_carat_attr'])){
			$this->filter['d_fconfig'][]=array(
                    'name'=>$__att__['eo_carat_attr'][0],
                    'type'=>"1",
                    'label'=>$__att__['eo_carat_attr'][1],
                    'advance'=>"0",
                    'dependent'=>"0",
                    'input'=>"numeric_slider",
                    'column_width'=> "50",
                    'order'=>"1",
                    'template'=>'fc1',
                    'help'=>0,
                    'help_text'=>'',
                    'enabled'=>1
                );
		}			
		if(!empty($__att__['eo_clarity_attr'])){
			$this->filter['d_fconfig'][]=array(
                'name'=>$__att__['eo_clarity_attr'][0],
                'type'=>"1",
                'label'=>$__att__['eo_clarity_attr'][1],
                'advance'=>"0",
                'dependent'=>"0",
                'input'=>"text_slider",
                'column_width'=> "50",
                'order'=>"2",
                'template'=>'fc1',
                'help'=>0,
                'help_text'=>'',
                'enabled'=>1

            );
		}
		if(!empty($__att__['eo_colour_attr'])){
			$this->filter['d_fconfig'][]=array(
                'name'=>$__att__['eo_colour_attr'][0],
                'type'=>"1",
                'label'=>$__att__['eo_colour_attr'][1],
                'advance'=>"0",
                'dependent'=>"0",
                'input'=>"text_slider",
                'column_width'=> "50",
                'order'=>"3",
                'template'=>'fc1',
                'help'=>0,
                'help_text'=>'',
                'enabled'=>1
            );
		}
		if(!empty($__att__['eo_polish_attr'])){
			$this->filter['d_fconfig'][]=array(
                'name'=>$__att__['eo_polish_attr'][0],
                'type'=>"1",
                'label'=>$__att__['eo_polish_attr'][1],
                'advance'=>"1",
                'dependent'=>"0",
                'input'=>"text_slider",
                'column_width'=> "50",
                'order'=>"4",
                'template'=>'fc1',
                'help'=>0,
                'help_text'=>'',
                'enabled'=>1
            );
		}
		if(!empty($__att__['eo_symmertry_attr'])){
			$this->filter['d_fconfig'][]=array(
                'name'=>$__att__['eo_symmertry_attr'][0],
                'type'=>"1",
                'label'=>$__att__['eo_symmertry_attr'][1],
                'advance'=>"1",
                'dependent'=>"0",
                'input'=>"text_slider",
                'column_width'=> "50",
                'order'=>"5",
                'template'=>'fc1',
                'help'=>0,
                'help_text'=>'',
                'enabled'=>1
            );
		}
		if(!empty($__att__['eo_fluorescence_attr'])){
			$this->filter['d_fconfig'][]=array(
                'name'=>$__att__['eo_fluorescence_attr'][0],
                'type'=>"1",
                'label'=>$__att__['eo_fluorescence_attr'][1],
                'advance'=>"1",
                'dependent'=>"0",
                'input'=>"text_slider",
                'column_width'=> "50",
                'order'=>"6",
                'template'=>'fc1',
                'help'=>0,
                'help_text'=>'',
                'enabled'=>1
            );
		}
		if(!empty($__att__['eo_depth_attr'])){
			$this->filter['d_fconfig'][]=array(
                'name'=>$__att__['eo_depth_attr'][0],
                'type'=>"1",
                'label'=>$__att__['eo_depth_attr'][1],
                'advance'=>"1",
                'dependent'=>"0",
                'input'=>"numeric_slider",
                'column_width'=> "50",
                'order'=>"7",
                'template'=>'fc1',
                'help'=>0,
                'help_text'=>'',
                'enabled'=>1
            );
		}
		if(!empty($__att__['eo_table_attr'])){
			$this->filter['d_fconfig'][]=array(
                'name'=>$__att__['eo_table_attr'][0],
                'type'=>"1",
                'label'=>$__att__['eo_table_attr'][1],
                'advance'=>"1",
                'dependent'=>"0",
                'input'=>"numeric_slider",
                'column_width'=> "50",
                'order'=>"8",
                'template'=>'fc1',
                'help'=>0,
                'help_text'=>'',
                'enabled'=>1
            );
		}
		if(!empty($__att__['eo_grading_report_attr'])){
			$this->filter['d_fconfig'][]=array(
                'name'=>$__att__['eo_grading_report_attr'][0],
                'type'=>"1",
                'label'=>$__att__['eo_grading_report_attr'][1],
                'advance'=>"1",
                'dependent'=>"0",
                'input'=>"checkbox",
                'column_width'=> "50",
                'order'=>"9",
                'template'=>'fc1',
                'help'=>0,
                'help_text'=>'',
                'enabled'=>1
            );
		}
		return $this->filter;
	}

	public function fc2() {
		$__cat__ = $this->get_category();
        $__att__ = $this->get_attribute();

		$this->filter=array();

		//Filters for diamond....						
		if(!empty($__cat__['eo_diamond_shape_cat'])){
			$this->filter['d_fconfig'][]=array(
                    'name'=>$__cat__['eo_diamond_shape_cat'][0],
                    'type'=>"0",
                    'label'=>$__cat__['eo_diamond_shape_cat'][1],
                    'advance'=>"0",
                    'dependent'=>"0",
                    'input'=>"icon_text",
                    'column_width'=> "100",
                    'order'=>"0",
                    'template'=>'fc2',
                    'help'=>0,
                    'help_text'=>'',
                    'enabled'=>1
                );
		}
		if(!empty($__att__['eo_carat_attr'])){
			$this->filter['d_fconfig'][]=array(
                    'name'=>$__att__['eo_carat_attr'][0],
                    'type'=>"1",
                    'label'=>$__att__['eo_carat_attr'][1],
                    'advance'=>"0",
                    'dependent'=>"0",
                    'input'=>"numeric_slider",
                    'column_width'=> "50",
                    'order'=>"1",
                    'template'=>'fc2',
                    'help'=>0,
                    'help_text'=>'',
                    'enabled'=>1
                );
		}			
		if(!empty($__att__['eo_clarity_attr'])){
			$this->filter['d_fconfig'][]=array(
                'name'=>$__att__['eo_clarity_attr'][0],
                'type'=>"1",
                'label'=>$__att__['eo_clarity_attr'][1],
                'advance'=>"0",
                'dependent'=>"0",
                'input'=>"text_slider",
                'column_width'=> "50",
                'order'=>"2",
                'template'=>'fc2',
                'help'=>0,
                'help_text'=>'',
                'enabled'=>1

            );
		}
		if(!empty($__att__['eo_colour_attr'])){
			$this->filter['d_fconfig'][]=array(
                'name'=>$__att__['eo_colour_attr'][0],
                'type'=>"1",
                'label'=>$__att__['eo_colour_attr'][1],
                'advance'=>"0",
                'dependent'=>"0",
                'input'=>"text_slider",
                'column_width'=> "50",
                'order'=>"3",
                'template'=>'fc2',
                'help'=>0,
                'help_text'=>'',
                'enabled'=>1
            );
		}
		if(!empty($__att__['eo_polish_attr'])){
			$this->filter['d_fconfig'][]=array(
                'name'=>$__att__['eo_polish_attr'][0],
                'type'=>"1",
                'label'=>$__att__['eo_polish_attr'][1],
                'advance'=>"1",
                'dependent'=>"0",
                'input'=>"text_slider",
                'column_width'=> "50",
                'order'=>"4",
                'template'=>'fc2',
                'help'=>0,
                'help_text'=>'',
                'enabled'=>1
            );
		}
		if(!empty($__att__['eo_symmertry_attr'])){
			$this->filter['d_fconfig'][]=array(
                'name'=>$__att__['eo_symmertry_attr'][0],
                'type'=>"1",
                'label'=>$__att__['eo_symmertry_attr'][1],
                'advance'=>"1",
                'dependent'=>"0",
                'input'=>"text_slider",
                'column_width'=> "50",
                'order'=>"5",
                'template'=>'fc2',
                'help'=>0,
                'help_text'=>'',
                'enabled'=>1
            );
		}
		if(!empty($__att__['eo_fluorescence_attr'])){
			$this->filter['d_fconfig'][]=array(
                'name'=>$__att__['eo_fluorescence_attr'][0],
                'type'=>"1",
                'label'=>$__att__['eo_fluorescence_attr'][1],
                'advance'=>"1",
                'dependent'=>"0",
                'input'=>"text_slider",
                'column_width'=> "50",
                'order'=>"6",
                'template'=>'fc2',
                'help'=>0,
                'help_text'=>'',
                'enabled'=>1
            );
		}
		if(!empty($__att__['eo_depth_attr'])){
			$this->filter['d_fconfig'][]=array(
                'name'=>$__att__['eo_depth_attr'][0],
                'type'=>"1",
                'label'=>$__att__['eo_depth_attr'][1],
                'advance'=>"1",
                'dependent'=>"0",
                'input'=>"numeric_slider",
                'column_width'=> "50",
                'order'=>"7",
                'template'=>'fc2',
                'help'=>0,
                'help_text'=>'',
                'enabled'=>1
            );
		}
		if(!empty($__att__['eo_table_attr'])){
			$this->filter['d_fconfig'][]=array(
                'name'=>$__att__['eo_table_attr'][0],
                'type'=>"1",
                'label'=>$__att__['eo_table_attr'][1],
                'advance'=>"1",
                'dependent'=>"0",
                'input'=>"numeric_slider",
                'column_width'=> "50",
                'order'=>"8",
                'template'=>'fc2',
                'help'=>0,
                'help_text'=>'',
                'enabled'=>1
            );
		}
		if(!empty($__att__['eo_grading_report_attr'])){
			$this->filter['d_fconfig'][]=array(
                'name'=>$__att__['eo_grading_report_attr'][0],
                'type'=>"1",
                'label'=>$__att__['eo_grading_report_attr'][1],
                'advance'=>"1",
                'dependent'=>"0",
                'input'=>"checkbox",
                'column_width'=> "50",
                'order'=>"9",
                'template'=>'fc2',
                'help'=>0,
                'help_text'=>'',
                'enabled'=>1
            );
		}
		return $this->filter;
	}

	public function fc3() {
		$__cat__ = $this->get_category();
        $__att__ = $this->get_attribute();

		$this->filter=array();

		//Filters for diamond....						
		if(!empty($__cat__['eo_diamond_shape_cat'])){
			$this->filter['d_fconfig'][]=array(
                    'name'=>$__cat__['eo_diamond_shape_cat'][0],
                    'type'=>"0",
                    'label'=>$__cat__['eo_diamond_shape_cat'][1],
                    'advance'=>"0",
                    'dependent'=>"0",
                    'input'=>"icon_text",
                    'column_width'=> "100",
                    'order'=>"0",
                    'template'=>'fc3',
                    'help'=>1,
                    'help_text'=>'Shape of the diamond',
                    'enabled'=>1
                );
		}
		if(!empty($__att__['eo_carat_attr'])){
			$this->filter['d_fconfig'][]=array(
                    'name'=>$__att__['eo_carat_attr'][0],
                    'type'=>"1",
                    'label'=>$__att__['eo_carat_attr'][1],
                    'advance'=>"0",
                    'dependent'=>"0",
                    'input'=>"numeric_slider",
                    'column_width'=> "50",
                    'order'=>"1",
                    'template'=>'fc3',
                    'help'=>1,
                    'help_text'=>'Measurment of diamond weight',
                    'enabled'=>1
                );
		}			
		if(!empty($__att__['eo_clarity_attr'])){
			$this->filter['d_fconfig'][]=array(
                'name'=>$__att__['eo_clarity_attr'][0],
                'type'=>"1",
                'label'=>$__att__['eo_clarity_attr'][1],
                'advance'=>"0",
                'dependent'=>"0",
                'input'=>"text_slider",
                'column_width'=> "50",
                'order'=>"2",
                'template'=>'fc3',
                'help'=>1,
                'help_text'=>'Defines clarity of diamond',
                'enabled'=>1

            );
		}
		if(!empty($__att__['eo_colour_attr'])){
			$this->filter['d_fconfig'][]=array(
                'name'=>$__att__['eo_colour_attr'][0],
                'type'=>"1",
                'label'=>$__att__['eo_colour_attr'][1],
                'advance'=>"0",
                'dependent'=>"0",
                'input'=>"text_slider",
                'column_width'=> "50",
                'order'=>"3",
                'template'=>'fc3',
                'help'=>1,
                'help_text'=>'Defines color of the diamond',
                'enabled'=>1
            );
		}
		if(!empty($__att__['eo_polish_attr'])){
			$this->filter['d_fconfig'][]=array(
                'name'=>$__att__['eo_polish_attr'][0],
                'type'=>"1",
                'label'=>$__att__['eo_polish_attr'][1],
                'advance'=>"1",
                'dependent'=>"0",
                'input'=>"text_slider",
                'column_width'=> "50",
                'order'=>"4",
                'template'=>'fc3',
                'help'=>1,
                'help_text'=>'Polish quality of the diamond',
                'enabled'=>1
            );
		}
		if(!empty($__att__['eo_symmertry_attr'])){
			$this->filter['d_fconfig'][]=array(
                'name'=>$__att__['eo_symmertry_attr'][0],
                'type'=>"1",
                'label'=>$__att__['eo_symmertry_attr'][1],
                'advance'=>"1",
                'dependent'=>"0",
                'input'=>"text_slider",
                'column_width'=> "50",
                'order'=>"5",
                'template'=>'fc3',
                'help'=>1,
                'help_text'=>'Symmetry of the diamond',
                'enabled'=>1
            );
		}
		if(!empty($__att__['eo_fluorescence_attr'])){
			$this->filter['d_fconfig'][]=array(
                'name'=>$__att__['eo_fluorescence_attr'][0],
                'type'=>"1",
                'label'=>$__att__['eo_fluorescence_attr'][1],
                'advance'=>"1",
                'dependent'=>"0",
                'input'=>"text_slider",
                'column_width'=> "50",
                'order'=>"6",
                'template'=>'fc3',
                'help'=>1,
                'help_text'=>'Fluorecence of the diamond',
                'enabled'=>1
            );
		}
		if(!empty($__att__['eo_depth_attr'])){
			$this->filter['d_fconfig'][]=array(
                'name'=>$__att__['eo_depth_attr'][0],
                'type'=>"1",
                'label'=>$__att__['eo_depth_attr'][1],
                'advance'=>"1",
                'dependent'=>"0",
                'input'=>"numeric_slider",
                'column_width'=> "50",
                'order'=>"7",
                'template'=>'fc3',
                'help'=>1,
                'help_text'=>'Depth of the diamond from head',
                'enabled'=>1
            );
		}
		if(!empty($__att__['eo_table_attr'])){
			$this->filter['d_fconfig'][]=array(
                'name'=>$__att__['eo_table_attr'][0],
                'type'=>"1",
                'label'=>$__att__['eo_table_attr'][1],
                'advance'=>"1",
                'dependent'=>"0",
                'input'=>"numeric_slider",
                'column_width'=> "50",
                'order'=>"8",
                'template'=>'fc3',
                'help'=>1,
                'help_text'=>'Table size of the diamond',
                'enabled'=>1
            );
		}
		if(!empty($__att__['eo_grading_report_attr'])){
			$this->filter['d_fconfig'][]=array(
                'name'=>$__att__['eo_grading_report_attr'][0],
                'type'=>"1",
                'label'=>$__att__['eo_grading_report_attr'][1],
                'advance'=>"1",
                'dependent'=>"0",
                'input'=>"checkbox",
                'column_width'=> "50",
                'order'=>"9",
                'template'=>'fc3',
                'help'=>1,
                'help_text'=>'Lab report created by',
                'enabled'=>1
            );
		}
		return $this->filter;
	}

	public function fc4() {
		$__cat__ = $this->get_category();
        $__att__ = $this->get_attribute();

		$this->filter=array();

		//Filters for diamond....						
		if(!empty($__cat__['eo_diamond_shape_cat'])){
			$this->filter['d_fconfig'][]=array(
                    'name'=>$__cat__['eo_diamond_shape_cat'][0],
                    'type'=>"0",
                    'label'=>"Shape",    //$__cat__['eo_diamond_shape_cat'][1],
                    'advance'=>"0",
                    'dependent'=>"0",
                    'input'=>"icon_text",
                    'column_width'=> "50",
                    'order'=>"0",
                    'template'=>'fc4',
                    'help'=>1,
                    'help_text'=>'Shape of the diamond',
                    'enabled'=>1
                );
		}
		if(!empty($__att__['eo_carat_attr'])){
			$this->filter['d_fconfig'][]=array(
                    'name'=>$__att__['eo_carat_attr'][0],
                    'type'=>"1",
                    'label'=>$__att__['eo_carat_attr'][1],
                    'advance'=>"0",
                    'dependent'=>"0",
                    'input'=>"numeric_slider",
                    'column_width'=> "50",
                    'order'=>"1",
                    'template'=>'fc4',
                    'help'=>1,
                    'help_text'=>'Measurment of diamond weight',
                    'enabled'=>1
                );
		}			
		if(!empty($__att__['eo_clarity_attr'])){
			$this->filter['d_fconfig'][]=array(
                'name'=>$__att__['eo_clarity_attr'][0],
                'type'=>"1",
                'label'=>$__att__['eo_clarity_attr'][1],
                'advance'=>"0",
                'dependent'=>"0",
                'input'=>"text_slider",
                'column_width'=> "50",
                'order'=>"2",
                'template'=>'fc4',
                'help'=>1,
                'help_text'=>'Defines clarity of diamond',
                'enabled'=>1

            );
		}
		if(!empty($__att__['eo_colour_attr'])){
			$this->filter['d_fconfig'][]=array(
                'name'=>$__att__['eo_colour_attr'][0],
                'type'=>"1",
                'label'=>$__att__['eo_colour_attr'][1],
                'advance'=>"0",
                'dependent'=>"0",
                'input'=>"text_slider",
                'column_width'=> "50",
                'order'=>"3",
                'template'=>'fc4',
                'help'=>1,
                'help_text'=>'Defines color of the diamond',
                'enabled'=>1
            );
		}
		if(!empty($__att__['eo_polish_attr'])){
			$this->filter['d_fconfig'][]=array(
                'name'=>$__att__['eo_polish_attr'][0],
                'type'=>"1",
                'label'=>$__att__['eo_polish_attr'][1],
                'advance'=>"1",
                'dependent'=>"0",
                'input'=>"text_slider",
                'column_width'=> "50",
                'order'=>"4",
                'template'=>'fc4',
                'help'=>1,
                'help_text'=>'Polish quality of the diamond',
                'enabled'=>1
            );
		}
		if(!empty($__att__['eo_symmertry_attr'])){
			$this->filter['d_fconfig'][]=array(
                'name'=>$__att__['eo_symmertry_attr'][0],
                'type'=>"1",
                'label'=>$__att__['eo_symmertry_attr'][1],
                'advance'=>"1",
                'dependent'=>"0",
                'input'=>"text_slider",
                'column_width'=> "50",
                'order'=>"5",
                'template'=>'fc4',
                'help'=>1,
                'help_text'=>'Symmetry of the diamond',
                'enabled'=>1
            );
		}
		if(!empty($__att__['eo_fluorescence_attr'])){
			$this->filter['d_fconfig'][]=array(
                'name'=>$__att__['eo_fluorescence_attr'][0],
                'type'=>"1",
                'label'=>$__att__['eo_fluorescence_attr'][1],
                'advance'=>"1",
                'dependent'=>"0",
                'input'=>"text_slider",
                'column_width'=> "50",
                'order'=>"6",
                'template'=>'fc4',
                'help'=>1,
                'help_text'=>'Fluorecence of the diamond',
                'enabled'=>1
            );
		}
		if(!empty($__att__['eo_depth_attr'])){
			$this->filter['d_fconfig'][]=array(
                'name'=>$__att__['eo_depth_attr'][0],
                'type'=>"1",
                'label'=>$__att__['eo_depth_attr'][1],
                'advance'=>"1",
                'dependent'=>"0",
                'input'=>"numeric_slider",
                'column_width'=> "50",
                'order'=>"7",
                'template'=>'fc4',
                'help'=>1,
                'help_text'=>'Depth of the diamond from head',
                'enabled'=>1
            );
		}
		if(!empty($__att__['eo_table_attr'])){
			$this->filter['d_fconfig'][]=array(
                'name'=>$__att__['eo_table_attr'][0],
                'type'=>"1",
                'label'=>$__att__['eo_table_attr'][1],
                'advance'=>"1",
                'dependent'=>"0",
                'input'=>"numeric_slider",
                'column_width'=> "50",
                'order'=>"8",
                'template'=>'fc4',
                'help'=>1,
                'help_text'=>'Table size of the diamond',
                'enabled'=>1
            );
		}
		if(!empty($__att__['eo_grading_report_attr'])){
			$this->filter['d_fconfig'][]=array(
                'name'=>$__att__['eo_grading_report_attr'][0],
                'type'=>"1",
                'label'=>$__att__['eo_grading_report_attr'][1],
                'advance'=>"1",
                'dependent'=>"0",
                'input'=>"checkbox",
                'column_width'=> "50",
                'order'=>"9",
                'template'=>'fc4',
                'help'=>1,
                'help_text'=>'Lab report created by',
                'enabled'=>1
            );
		}
		return $this->filter;
	}

    public function fc5() {
        $__cat__ = $this->get_category();
        $__att__ = $this->get_attribute();

        $this->filter=array();

        //Filters for diamond....                       
        if(!empty($__cat__['eo_diamond_shape_cat'])){
            $this->filter['d_fconfig'][]=array(
                    'name'=>$__cat__['eo_diamond_shape_cat'][0],
                    'type'=>"0",
                    'label'=>$__cat__['eo_diamond_shape_cat'][1],
                    'advance'=>"0",
                    'dependent'=>"0",
                    'input'=>"icon_text",
                    'column_width'=> "31.25",
                    'order'=>"0",
                    'template'=>'fc3',
                    'help'=>1,
                    'help_text'=>'Shape of the diamond',
                    'enabled'=>1
                );
        }
        if(!empty($__att__['eo_carat_attr'])){
            $this->filter['d_fconfig'][]=array(
                    'name'=>$__att__['eo_carat_attr'][0],
                    'type'=>"1",
                    'label'=>$__att__['eo_carat_attr'][1],
                    'advance'=>"0",
                    'dependent'=>"0",
                    'input'=>"numeric_slider",
                    'column_width'=> "37.5",
                    'order'=>"1",
                    'template'=>'fc3',
                    'help'=>1,
                    'help_text'=>'Measurment of diamond weight',
                    'enabled'=>1
                );
        }           
        if(!empty($__att__['eo_clarity_attr'])){
            $this->filter['d_fconfig'][]=array(
                'name'=>$__att__['eo_clarity_attr'][0],
                'type'=>"1",
                'label'=>$__att__['eo_clarity_attr'][1],
                'advance'=>"0",
                'dependent'=>"0",
                'input'=>"text_slider",
                'column_width'=> "31.25",
                'order'=>"2",
                'template'=>'fc3',
                'help'=>1,
                'help_text'=>'Defines clarity of diamond',
                'enabled'=>1

            );
        }
        if(!empty($__att__['eo_colour_attr'])){
            $this->filter['d_fconfig'][]=array(
                'name'=>$__att__['eo_colour_attr'][0],
                'type'=>"1",
                'label'=>$__att__['eo_colour_attr'][1],
                'advance'=>"0",
                'dependent'=>"0",
                'input'=>"text_slider",
                'column_width'=> "31.25",
                'order'=>"3",
                'template'=>'fc3',
                'help'=>1,
                'help_text'=>'Defines color of the diamond',
                'enabled'=>1
            );
        }
        if(!empty($__att__['eo_polish_attr'])){
            $this->filter['d_fconfig'][]=array(
                'name'=>$__att__['eo_polish_attr'][0],
                'type'=>"1",
                'label'=>$__att__['eo_polish_attr'][1],
                'advance'=>"1",
                'dependent'=>"0",
                'input'=>"text_slider",
                'column_width'=> "31.25",
                'order'=>"4",
                'template'=>'fc3',
                'help'=>1,
                'help_text'=>'Polish quality of the diamond',
                'enabled'=>1
            );
        }
        if(!empty($__att__['eo_symmertry_attr'])){
            $this->filter['d_fconfig'][]=array(
                'name'=>$__att__['eo_symmertry_attr'][0],
                'type'=>"1",
                'label'=>$__att__['eo_symmertry_attr'][1],
                'advance'=>"1",
                'dependent'=>"0",
                'input'=>"text_slider",
                'column_width'=> "37.5",
                'order'=>"5",
                'template'=>'fc3',
                'help'=>1,
                'help_text'=>'Symmetry of the diamond',
                'enabled'=>1
            );
        }
        if(!empty($__att__['eo_fluorescence_attr'])){
            $this->filter['d_fconfig'][]=array(
                'name'=>$__att__['eo_fluorescence_attr'][0],
                'type'=>"1",
                'label'=>$__att__['eo_fluorescence_attr'][1],
                'advance'=>"1",
                'dependent'=>"0",
                'input'=>"text_slider",
                'column_width'=> "31.25",
                'order'=>"6",
                'template'=>'fc3',
                'help'=>1,
                'help_text'=>'Fluorecence of the diamond',
                'enabled'=>1
            );
        }
        if(!empty($__att__['eo_depth_attr'])){
            $this->filter['d_fconfig'][]=array(
                'name'=>$__att__['eo_depth_attr'][0],
                'type'=>"1",
                'label'=>$__att__['eo_depth_attr'][1],
                'advance'=>"1",
                'dependent'=>"0",
                'input'=>"numeric_slider",
                'column_width'=> "31.25",
                'order'=>"7",
                'template'=>'fc3',
                'help'=>1,
                'help_text'=>'Depth of the diamond from head',
                'enabled'=>1
            );
        }
        if(!empty($__att__['eo_table_attr'])){
            $this->filter['d_fconfig'][]=array(
                'name'=>$__att__['eo_table_attr'][0],
                'type'=>"1",
                'label'=>$__att__['eo_table_attr'][1],
                'advance'=>"1",
                'dependent'=>"0",
                'input'=>"numeric_slider",
                'column_width'=> "37.5",
                'order'=>"8",
                'template'=>'fc3',
                'help'=>1,
                'help_text'=>'Table size of the diamond',
                'enabled'=>1
            );
        }
        if(!empty($__att__['eo_grading_report_attr'])){
            $this->filter['d_fconfig'][]=array(
                'name'=>$__att__['eo_grading_report_attr'][0],
                'type'=>"1",
                'label'=>$__att__['eo_grading_report_attr'][1],
                'advance'=>"1",
                'dependent'=>"0",
                'input'=>"checkbox",
                'column_width'=> "31.25",
                'order'=>"9",
                'template'=>'fc3',
                'help'=>1,
                'help_text'=>'Lab report created by',
                'enabled'=>1
            );
        }
        return $this->filter;
    }

	public function sc1() {
		$__cat__ = $this->get_category();
        $__att__ = $this->get_attribute();

		$this->filter=array();
		//Filters for settings....
		if(!empty($__cat__['eo_setting_shape_cat'])){
			$this->filter['s_fconfig'][]=array(
                'name'=>$__cat__['eo_setting_shape_cat'][0],
                'type'=>"0",
                'label'=>$__cat__['eo_setting_shape_cat'][1],
                'advance'=>"0",
                'dependent'=>"0",
                'input'=>"icon_text",
                'column_width'=> "100",
                'order'=>"0",
                'template'=>'sc1',
                'help'=>0,
                'help_text'=>'',
                'enabled'=>1
            );
		}
		if(!empty($__cat__['eo_ring_style_cat'])){
			$this->filter['s_fconfig'][]=array(
                'name'=>$__cat__['eo_ring_style_cat'][0],
                'type'=>"0",
                'label'=>$__cat__['eo_ring_style_cat'][1],
                'advance'=>"0",
                'dependent'=>"0",
                'input'=>"icon_text",
                'column_width'=> "50",
                'order'=>"1",
                'template'=>'sc1',
                'help'=>0,
                'help_text'=>'',
                'enabled'=>1
            );
		}
		if(!empty($__cat__['eo_metal_cat'])){
			$this->filter['s_fconfig'][]=array(
                'name'=>$__cat__['eo_metal_cat'][0],
                'type'=>"0",
                'label'=>$__cat__['eo_metal_cat'][1],
                'advance'=>"0",
                'dependent'=>"0",
                'input'=>"icon",
                'column_width'=> "50",
                'order'=>"2",
                'template'=>'sc1',
                'help'=>0,
                'help_text'=>'',
                'enabled'=>1
            );
		}
		
		return $this->filter;
	}

	public function sc2() {
		$__cat__ = $this->get_category();
        $__att__ = $this->get_attribute();

		$this->filter=array();
		//Filters for settings....
		if(!empty($__cat__['eo_setting_shape_cat'])){
			$this->filter['s_fconfig'][]=array(
                'name'=>$__cat__['eo_setting_shape_cat'][0],
                'type'=>"0",
                'label'=>$__cat__['eo_setting_shape_cat'][1],
                'advance'=>"0",
                'dependent'=>"0",
                'input'=>"icon_text",
                'column_width'=> "100",
                'order'=>"0",
                'template'=>'sc2',
                'help'=>0,
                'help_text'=>'',
                'enabled'=>1
            );
		}
		if(!empty($__cat__['eo_ring_style_cat'])){
			$this->filter['s_fconfig'][]=array(
                'name'=>$__cat__['eo_ring_style_cat'][0],
                'type'=>"0",
                'label'=>$__cat__['eo_ring_style_cat'][1],
                'advance'=>"0",
                'dependent'=>"0",
                'input'=>"icon_text",
                'column_width'=> "50",
                'order'=>"1",
                'template'=>'sc2',
                'help'=>0,
                'help_text'=>'',
                'enabled'=>1
            );
		}
		if(!empty($__cat__['eo_metal_cat'])){
			$this->filter['s_fconfig'][]=array(
                'name'=>$__cat__['eo_metal_cat'][0],
                'type'=>"0",
                'label'=>$__cat__['eo_metal_cat'][1],
                'advance'=>"0",
                'dependent'=>"0",
                'input'=>"icon",
                'column_width'=> "50",
                'order'=>"2",
                'template'=>'sc2',
                'help'=>0,
                'help_text'=>'',
                'enabled'=>1
            );
		}
		
		return $this->filter;	
	}

	public function sc3() {
		$__cat__ = $this->get_category();
        $__att__ = $this->get_attribute();

		$this->filter=array();
		//Filters for settings....
		if(!empty($__cat__['eo_setting_shape_cat'])){
			$this->filter['s_fconfig'][]=array(
                'name'=>$__cat__['eo_setting_shape_cat'][0],
                'type'=>"0",
                'label'=>$__cat__['eo_setting_shape_cat'][1],
                'advance'=>"0",
                'dependent'=>"0",
                'input'=>"icon_text",
                'column_width'=> "100",
                'order'=>"0",
                'template'=>'sc3',
                'help'=>1,
                'help_text'=>'Shape of diamond supported by the setting',
                'enabled'=>1
            );
		}
		if(!empty($__cat__['eo_ring_style_cat'])){
			$this->filter['s_fconfig'][]=array(
                'name'=>$__cat__['eo_ring_style_cat'][0],
                'type'=>"0",
                'label'=>$__cat__['eo_ring_style_cat'][1],
                'advance'=>"0",
                'dependent'=>"0",
                'input'=>"icon_text",
                'column_width'=> "50",
                'order'=>"1",
                'template'=>'sc3',
                'help'=>1,
                'help_text'=>'Setting style',
                'enabled'=>1
            );
		}
		if(!empty($__cat__['eo_metal_cat'])){
			$this->filter['s_fconfig'][]=array(
                'name'=>$__cat__['eo_metal_cat'][0],
                'type'=>"0",
                'label'=>$__cat__['eo_metal_cat'][1],
                'advance'=>"0",
                'dependent'=>"0",
                'input'=>"icon",
                'column_width'=> "50",
                'order'=>"2",
                'template'=>'sc3',
                'help'=>1,
                'help_text'=>'Setting metal',
                'enabled'=>1
            );
		}
		
		return $this->filter;
	}

	public function sc4() {
		$__cat__ = $this->get_category();
        $__att__ = $this->get_attribute();

		$this->filter=array();
		//Filters for settings....
		if(!empty($__cat__['eo_setting_shape_cat'])){
			$this->filter['s_fconfig'][]=array(
                'name'=>$__cat__['eo_setting_shape_cat'][0],
                'type'=>"0",
                'label'=>"Shape",    //$__cat__['eo_setting_shape_cat'][1],
                'advance'=>"0",
                'dependent'=>"0",
                'input'=>"icon_text",
                'column_width'=> "50",
                'order'=>"0",
                'template'=>'sc4',
                'help'=>1,
                'help_text'=>'Shape of diamond supported by the setting',
                'enabled'=>1
            );
		}
		if(!empty($__cat__['eo_ring_style_cat'])){
			$this->filter['s_fconfig'][]=array(
                'name'=>$__cat__['eo_ring_style_cat'][0],
                'type'=>"0",
                'label'=>$__cat__['eo_ring_style_cat'][1],
                'advance'=>"0",
                'dependent'=>"0",
                'input'=>"icon_text",
                'column_width'=> "50",
                'order'=>"1",
                'template'=>'sc4',
                'help'=>1,
                'help_text'=>'Setting style',
                'enabled'=>1
            );
		}
		if(!empty($__cat__['eo_metal_cat'])){
			$this->filter['s_fconfig'][]=array(
                'name'=>$__cat__['eo_metal_cat'][0],
                'type'=>"0",
                'label'=>$__cat__['eo_metal_cat'][1],
                'advance'=>"0",
                'dependent'=>"0",
                'input'=>"icon",
                'column_width'=> "50",
                'order'=>"2",
                'template'=>'sc4',
                'help'=>1,
                'help_text'=>'Setting metal',
                'enabled'=>1
            );
		}
		
		return $this->filter;
	}

    public function sc5() {
        $__cat__ = $this->get_category();
        $__att__ = $this->get_attribute();

        $this->filter=array();
        //Filters for settings....
        if(!empty($__cat__['eo_setting_shape_cat'])){
            $this->filter['s_fconfig'][]=array(
                'name'=>$__cat__['eo_setting_shape_cat'][0],
                'type'=>"0",
                'label'=>$__cat__['eo_setting_shape_cat'][1],
                'advance'=>"0",
                'dependent'=>"0",
                'input'=>"icon_text",
                'column_width'=> "31.25",
                'order'=>"0",
                'template'=>'sc3',
                'help'=>1,
                'help_text'=>'Shape of diamond supported by the setting',
                'enabled'=>1
            );
        }
        if(!empty($__cat__['eo_ring_style_cat'])){
            $this->filter['s_fconfig'][]=array(
                'name'=>$__cat__['eo_ring_style_cat'][0],
                'type'=>"0",
                'label'=>$__cat__['eo_ring_style_cat'][1],
                'advance'=>"0",
                'dependent'=>"0",
                'input'=>"icon_text",
                'column_width'=> "37.5",
                'order'=>"1",
                'template'=>'sc3',
                'help'=>1,
                'help_text'=>'Setting style',
                'enabled'=>1
            );
        }
        if(!empty($__cat__['eo_metal_cat'])){
            $this->filter['s_fconfig'][]=array(
                'name'=>$__cat__['eo_metal_cat'][0],
                'type'=>"0",
                'label'=>$__cat__['eo_metal_cat'][1],
                'advance'=>"0",
                'dependent'=>"0",
                'input'=>"icon",
                'column_width'=> "31.25",
                'order'=>"2",
                'template'=>'sc3',
                'help'=>1,
                'help_text'=>'Setting metal',
                'enabled'=>1
            );
        }
        
        return $this->filter;
    }
}

<?php


/*
*   ring builder template for Sample data.
*/

namespace eo\wbc\model\admin\sample_data\data_templates;

defined( 'ABSPATH' ) || exit;

class Ring_Builder_Data_Template extends Pair_Builder_Data_Template {

    private static $_instance = null;

    public static function instance() {
        if ( ! isset( self::$_instance ) ) {
            self::$_instance = new self;
        }

        return self::$_instance;
    }

    private function __construct() {
        
        $this->asset_folder = 'jewelry';
    }

    public function get_attributes() {
        return array(
                    array(
                        'label' => __('Carat','woo-bundle-choice'),
                        'range'=>true,
                        'terms' => array('min'=>'0.2','max'=>'3'),
                        'description' => 'Carat attributes for diamond shape',
                        'slug' => 'eo_carat_attr'
                    ),
                    array(
                        'label' => __('Clarity','woo-bundle-choice'),
                        'terms' => array('IF','VVS1','VVS2','VS1','VS2','SI1'),
                        'description' => 'Clarity attributes for diamond shape',
                        'slug' => 'eo_clarity_attr'
                    ),
                    array(
                        'label' => __('Colour','woo-bundle-choice'),
                        'terms' => array('D','E','F','G','H','I','J','K','L','M'),
                        'description' => 'Colour attributes for diamond shape',
                        'slug' => 'eo_colour_attr'
                    ),
                    array(
                        'label' => __('Polish','woo-bundle-choice'),
                        'terms' => array('Excellent','Very Good','Good','Fair'),
                        'description' => 'Polish attributes for diamond shape',
                        'slug' => 'eo_polish_attr'
                    ),
                    array(
                        'label' => __('Symmetry','woo-bundle-choice'),
                        'terms' => array('Excellent','Very Good','Good','Fair'),
                        'description' => 'Symmetry attributes for diamond shape',
                        'slug' => 'eo_symmertry_attr'
                    ),
                    array(
                        'label' => __('Fluorescence','woo-bundle-choice'),
                        'terms' => array('None','Very','Slight','Slight','Faint'),
                        'description' => 'Fluorescence attributes for diamond shape',
                        'slug' => 'eo_fluorescence_attr'
                    ),
                    array(
                        'label' => __('Depth','woo-bundle-choice'),
                        'range'=>true,
                        'terms' => array('min'=>'45','max'=>'55'),        
                        'description' => 'Depth attributes for diamond shape',
                        'slug' => 'eo_depth_attr'
                    ),
                    array(
                        'label' => __('Size','woo-bundle-choice'),
                        'range'=>true,
                        'terms' => array('min'=>'4','max'=>'7'),        
                        'description' => 'Size attributes for settings',
                        'slug' => 'eo_size_attr'
                    ),
                    array(
                        'label' => __('Table','woo-bundle-choice'),
                        'range'=>true,
                        'terms' => array('min'=>'45','max'=>'55'),
                        'description' => 'Table attributes for diamond shape',
                        'slug' => 'eo_table_attr'
                    ),
                    array(
                        'label' => __('Grading Report','woo-bundle-choice'),
                        'terms' => array('GIA','IGI','AGS','HRD'),
                        'description' => 'Grading report attributes for diamond shape',
                        'slug' => 'eo_grading_report_attr'
                    ),
                    array(
                        'label' => __('Ring Style','woo-bundle-choice'),
                        'terms' => array('Halo','Pave','Solitaire','Trilogy'),
                        'description' => 'Ring style attributes for diamond shape',
                        'slug' => 'eo_ring_style_attr'
                    ),
                    array(
                        'label' => __('Metal','woo-bundle-choice'),
                        'terms' => array('14K White Gold','18K White Gold','14K Yellow Gold','18K Yellow Gold','14K Rose Gold','18K Rose Gold','Platinum'),
                        'description' => 'Metal attributes for diamond shape',
                        'slug' => 'eo_metal_attr'
                    ),
                  ); 
    }

    public function get_categories() {
        $_img_url= constant('EOWBC_ASSET_URL').'img/sample_data/'.$this->asset_folder.'/';    // EO_WBC_PLUGIN_DIR.'EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/';
        
        return array(
                    array(
                        'thumb' => '',
                        'name' =>__( 'Diamond Shape','woo-bundle-choice'),
                        'description' => 'Diamond shapes category',
                        'slug' => 'eo_diamond_shape_cat',
                        'child'=> 
                        array(
                                array(
                                    'thumb' => $_img_url.'round.png',
                                    'thumb_selected' => $_img_url.'round_selected.png',
                                    'name' => __('Round','woo-bundle-choice'),
                                    'description' => 'Diamond round shape',
                                    'slug' => 'eo_diamond_round_shape_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'princess.png',
                                    'thumb_selected' => $_img_url.'princess_selected.png',
                                    'name' => __('Princess','woo-bundle-choice'),
                                    'description' => 'Diamond princess shape',
                                    'slug' => 'eo_diamond_princess_shape_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'emerald.png',
                                    'thumb_selected' => $_img_url.'emerald_selected.png',
                                    'name' => __('Emerald','woo-bundle-choice'),
                                    'description' => 'Diamond emerald shape',
                                    'slug' => 'eo_diamond_emerald_shape_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'asscher.png',
                                    'thumb_selected' => $_img_url.'asscher_selected.png',
                                    'name' => __('Asscher','woo-bundle-choice'),
                                    'description' => 'Diamond asscher shape',
                                    'slug' => 'eo_diamond_asscher_shape_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'marquise.png',
                                    'thumb_selected' => $_img_url.'marquise_selected.png',
                                    'name' => __('Marquise','woo-bundle-choice'),
                                    'description' => 'Diamond marquise shape',
                                    'slug' => 'eo_diamond_marquise_shape_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'oval.png',
                                    'thumb_selected' => $_img_url.'oval_selected.png',
                                    'name' => __('Oval','woo-bundle-choice'),
                                    'description' => 'Diamond oval shape',
                                    'slug' => 'eo_diamond_oval_shape_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'rediant.png',
                                    'thumb_selected' => $_img_url.'rediant_selected.png',
                                    'name' => __('Radiant','woo-bundle-choice'),
                                    'description' => 'Diamond radiant shape',
                                    'slug' => 'eo_diamond_radiant_shape_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'pear.png',
                                    'thumb_selected' => $_img_url.'pear_selected.png',
                                    'name' => __('Pear','woo-bundle-choice'),
                                    'description' => 'Diamond pear shape',
                                    'slug' => 'eo_diamond_pear_shape_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'heart.png',
                                    'thumb_selected' => $_img_url.'heart_selected.png',
                                    'name' => __('Heart','woo-bundle-choice'),
                                    'description' => 'Diamond heart shape',
                                    'slug' => 'eo_diamond_heart_shape_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'cushion.png',
                                    'thumb_selected' => $_img_url.'cushion_selected.png',
                                    'name' => __('Cushion','woo-bundle-choice'),
                                    'description' => 'Diamond cushion shape',
                                    'slug' => 'eo_diamond_cushion_shape_cat'
                                )
                        )
                    ),
                    array(
                        'thumb' => '',
                        'name' => __('Setting Shape','woo-bundle-choice'),
                        'description' => 'Setting shapes category',
                        'slug' => 'eo_setting_shape_cat',
                        'child'=> 
                        array(
                                array(
                                    'thumb' => $_img_url.'round.png',
                                    'thumb_selected' => $_img_url.'round_selected.png',
                        'description' => 'Setting shapes category','woo-bundle-choice',
                                    'description' => 'Setting round shape',
                                    'slug' => 'eo_setting_round_shape_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'princess.png',
                                    'thumb_selected' => $_img_url.'princess_selected.png',
                                    'name' => __('Princess Setting','woo-bundle-choice'),
                                    'description' => 'setting princess shape',
                                    'slug' => 'eo_setting_princess_shape_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'emerald.png',
                                    'thumb_selected' => $_img_url.'emerald_selected.png',
                                    'name' => __('Emerald Setting','woo-bundle-choice'),
                                    'description' => 'Setting emerald shape',
                                    'slug' => 'eo_setting_emerald_shape_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'asscher.png',
                                    'thumb_selected' => $_img_url.'asscher_selected.png',
                                    'name' => __('Asscher Setting','woo-bundle-choice'),
                                    'description' => 'Setting asscher shape',
                                    'slug' => 'eo_setting_asscher_shape_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'marquise.png',
                                    'thumb_selected' => $_img_url.'marquise_selected.png',
                                    'name' => __('Marquise Setting','woo-bundle-choice'),
                                    'description' => 'Setting marquise shape',
                                    'slug' => 'eo_setting_marquise_shape_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'oval.png',
                                    'thumb_selected' => $_img_url.'oval_selected.png',
                                    'name' => __('Oval Setting','woo-bundle-choice'),
                                    'description' => 'Setting oval shape',
                                    'slug' => 'eo_setting_oval_shape_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'rediant.png',
                                    'thumb_selected' => $_img_url.'rediant_selected.png',
                                    'name' => __('Radiant Setting','woo-bundle-choice'),
                                    'description' => 'Setting radiant shape',
                                    'slug' => 'eo_setting_radiant_shape_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'pear.png',
                                    'thumb_selected' => $_img_url.'pear_selected.png',
                                    'name' => __('Pear Setting','woo-bundle-choice'),
                                    'description' => 'Setting pear shape',
                                    'slug' => 'eo_setting_pear_shape_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'heart.png',
                                    'thumb_selected' => $_img_url.'heart_selected.png',
                                    'name' => __('Heart Setting','woo-bundle-choice'),
                                    'description' => 'Setting heart shape',
                                    'slug' => 'eo_setting_heart_shape_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'cushion.png',
                                    'thumb_selected' => $_img_url.'cushion_selected.png',
                                    'name' => __('Cushion Setting','woo-bundle-choice'),
                                    'description' => 'Setting cushion shape',
                                    'slug' => 'eo_setting_cushion_shape_cat'
                                )
                        )
                    ),
                    array(
                        'thumb' => '',
                        'name' => __('Ring Style','woo-bundle-choice'),
                        'description' => 'Ring style category',
                        'slug' => 'eo_ring_style_cat',
                        'child'=> 
                        array(
                                array(
                                    'thumb' => $_img_url.'halo.png',
                                    'thumb_selected' => $_img_url.'halo_selected.png',
                                    'name' => __('Halo','woo-bundle-choice'),
                                    'description' => 'Halo style for ring',
                                    'slug' => 'eo_ring_halo_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'pave.png',
                                    'thumb_selected' => $_img_url.'pave_selected.png',
                                    'name' => __('Pave','woo-bundle-choice'),
                                    'description' => 'Pave style for ring',
                                    'slug' => 'eo_ring_pave_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'solitaire.png',
                                    'thumb_selected' => $_img_url.'solitaire_selected.png',
                                    'name' => __('Solitaire','woo-bundle-choice'),
                                    'description' => 'Solitaire style for ring',
                                    'slug' => 'eo_ring_solitaire_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'trilogy.png',
                                    'thumb_selected' => $_img_url.'trilogy_selected.png',
                                    'name' => __('Trilogy','woo-bundle-choice'),
                                    'description' => 'Trilogy style for ring',
                                    'slug' => 'eo_ring_trilogy_cat'
                                )
                        )            
                     ),
                     array(
                        'thumb' => '',
                        'name' => __('Metal','woo-bundle-choice'),
                        'description' => 'Metal category',
                        'slug' => 'eo_metal_cat',
                        'child'=> 
                        array(
                                array(
                                    'thumb' => $_img_url.'wg-14.jpg',
                                    'name' => __('14K White Gold','woo-bundle-choice'),
                                    'description' => '14k white gold category for metal',
                                    'slug' => 'eo_metal_14k_white_gold_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'wg-18.jpg',
                                    'name' => __('18K White Gold','woo-bundle-choice'),
                                    'description' => '18k white gold category for metal',
                                    'slug' => 'eo_metal_18k_white_gold_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'yg-14.jpg',
                                    'name' => __('14K Yellow Gold','woo-bundle-choice'),
                                    'description' => '14k yellow gold category for metal',
                                    'slug' => 'eo_metal_14k_yellow_gold_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'yg-18.jpg',
                                    'name' => __('18K Yellow Gold','woo-bundle-choice'),
                                    'description' => '18k yellow gold category for metal',
                                    'slug' => 'eo_metal_18k_yellow_gold_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'rg-14.jpg',
                                    'name' => __('14K Rose Gold','woo-bundle-choice'),
                                    'description' => '14k rose gold category for metal',
                                    'slug' => 'eo_metal_14k_rose_gold_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'rg-18.jpg',
                                    'name' => __('18K Rose Gold','woo-bundle-choice'),
                                    'description' => '18k rose gold category for metal',
                                    'slug' => 'eo_metal_18k_rose_gold_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'pl.jpg',
                                    'name' => __('Platinum','woo-bundle-choice'),
                                    'description' => 'Platinum category for metal',
                                    'slug' => 'eo_metal_platinum_cat'
                                )
                        )            
                     )
                  );
    }

    public function get_maps() {
        return array(
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
                    );
    }

    public function get_filters($__cat__, $__att__) {
        $filter = array();

        if(!empty($__cat__['eo_diamond_shape_cat'])){
            $filter['d_fconfig'][]=array(
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
            $filter['d_fconfig'][]=array(
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
            $filter['d_fconfig'][]=array(
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
            $filter['d_fconfig'][]=array(
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
            $filter['d_fconfig'][]=array(
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
            $filter['d_fconfig'][]=array(
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
            $filter['d_fconfig'][]=array(
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
            $filter['d_fconfig'][]=array(
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
            $filter['d_fconfig'][]=array(
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
            $filter['d_fconfig'][]=array(
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

        //Filters for settings....
        if(!empty($__cat__['eo_setting_shape_cat'])){
            $filter['s_fconfig'][]=array(
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
            $filter['s_fconfig'][]=array(
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
            $filter['s_fconfig'][]=array(
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

        return $filter;
    }

}

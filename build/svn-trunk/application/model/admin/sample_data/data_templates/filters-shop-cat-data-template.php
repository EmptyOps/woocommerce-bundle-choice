<?php


/*
*   ring builder template for Sample data.
*/

namespace eo\wbc\model\admin\sample_data\data_templates;

defined( 'ABSPATH' ) || exit;

class Filters_Shop_Cat_Data_Template extends Pair_Builder_Data_Template {

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
        $_img_url= constant('EOWBC_ASSET_URL').'img/sample_data/'.$this->asset_folder.'/';
        return array(
                    array(
                        'label' => 'Carat',
                        'range'=>true,
                        'terms' => array('min'=>'0.2','max'=>'3'),
                        'description' => 'Carat attributes for diamond shape',
                        'slug' => 'eo_carat_attr',
                        'type'=>'button',
                        'ribbon_color'=>'#8245dd'
                    ),
                    array(
                        'label' => 'Clarity',
                        'terms' => array('IF','VVS1','VVS2','VS1','VS2','SI1'),
                        'description' => 'Clarity attributes for diamond shape',
                        'slug' => 'eo_clarity_attr',
                        'type'=>'dropdown',
                        'ribbon_color'=>'#8245dd',
                    ),
                    array(
                        'label' => 'Colour',
                        'terms' => array('D','E','F','G','H','I','J','K','L','M'),
                        'terms_meta'=>array('#7edff2','#54de97','#608bf0','#f252ca','#60630a','#ffa70f','#ab7113','#c70fff','#968d8d','#96f38d'),
                        'description' => 'Colour attributes for diamond shape',
                        'slug' => 'eo_colour_attr',
                        'type'=>'color',
                        'ribbon_color'=>'#8245dd',  
                    ),
                    array(
                        'label' => 'Polish',
                        'terms' => array('Excellent','Very Good','Good','Fair'),
                        'description' => 'Polish attributes for diamond shape',
                        'slug' => 'eo_polish_attr',
                        'type'=>'button',
                        'ribbon_color'=>'#8245dd'
                    ),
                    array(
                        'label' => 'Symmetry',
                        'terms' => array('Excellent','Very Good','Good','Fair'),
                        'description' => 'Symmetry attributes for diamond shape',
                        'slug' => 'eo_symmertry_attr',
                        'type'=>'button',
                        'ribbon_color'=>'#8245dd'
                    ),
                    array(
                        'label' => 'Fluorescence',
                        'terms' => array('None','Very','Slight','Slight','Faint'),
                        'description' => 'Fluorescence attributes for diamond shape',
                        'slug' => 'eo_fluorescence_attr',
                        'type'=>'dropdown',
                        'ribbon_color'=>'#8245dd'
                    ),
                    array(
                        'label' => 'Depth',
                        'range'=>true,
                        'terms' => array('min'=>'45','max'=>'55'),        
                        'description' => 'Depth attributes for diamond shape',
                        'slug' => 'eo_depth_attr',
                        'type'=>'dropdown',
                        'ribbon_color'=>'#8245dd'
                    ),
                    array(
                        'label' => 'Size',
                        'range'=>true,
                        'terms' => array('min'=>'4','max'=>'7'),        
                        'description' => 'Size attributes for settings',
                        'slug' => 'eo_size_attr',
                        'type'=>'button',
                        'ribbon_color'=>'#8245dd'
                    ),
                    array(
                        'label' => 'Table',
                        'range'=>true,
                        'terms' => array('min'=>'45','max'=>'55'),
                        'description' => 'Table attributes for diamond shape',
                        'slug' => 'eo_table_attr',
                        'type'=>'button',
                        'ribbon_color'=>'#8245dd'
                    ),
                    array(
                        'label' => 'Grading Report',
                        'terms' => array('GIA','IGI','AGS','HRD'),
                        'description' => 'Grading report attributes for diamond shape',
                        'slug' => 'eo_grading_report_attr',
                        'type'=>'button',
                        'ribbon_color'=>'#8245dd'
                    ),
                    array(
                        'label' => 'Ring Style',
                        'terms' => array('Halo','Pave','Solitaire','Trilogy'),
                        'terms_meta'=>array(
                                        $_img_url.'halo.png',
                                        $_img_url.'pave.png',
                                        $_img_url.'solitaire.png',
                                        $_img_url.'trilogy.png'
                                    ),
                        'description' => 'Ring style attributes for diamond shape',
                        'slug' => 'eo_ring_style_attr',
                        'type'=>'dropdown_image',
                        'ribbon_color'=>'#8245dd'
                    ),
                    array(
                        'label' => 'Metal',
                        'terms' => array('14K White Gold','18K White Gold','14K Yellow Gold','18K Yellow Gold','14K Rose Gold','18K Rose Gold','Platinum'),
                        'terms_meta'=>array(
                                        $_img_url.'wg-14.jpg',
                                        $_img_url.'wg-18.jpg',
                                        $_img_url.'yg-14.jpg',
                                        $_img_url.'yg-18.jpg',
                                        $_img_url.'rg-14.jpg',
                                        $_img_url.'rg-18.jpg',
                                        $_img_url.'pl.jpg'
                                    ),
                        'description' => 'Metal attributes for diamond shape',
                        'slug' => 'eo_metal_attr',
                        'type'=>'dropdown_image',
                        'ribbon_color'=>'#8245dd'
                    ),
                  ); 
    }

    public function get_categories() {
        $_img_url= constant('EOWBC_ASSET_URL').'img/sample_data/'.$this->asset_folder.'/';    // EO_WBC_PLUGIN_DIR.'EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/';
        
        return array(
                    array(
                        'thumb' => '',
                        'name' => 'Diamond',
                        'description' => 'Diamond shapes category',
                        'slug' => 'eo_diamond_shape_cat',
                        'child'=> 
                        array(
                                array(
                                    'thumb' => $_img_url.'round.png',
                                    'thumb_selected' => $_img_url.'round_selected.png',
                                    'name' => 'Round',
                                    'description' => 'Diamond round shape',
                                    'slug' => 'eo_diamond_round_shape_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'princess.png',
                                    'thumb_selected' => $_img_url.'princess_selected.png',
                                    'name' => 'Princess',
                                    'description' => 'Diamond princess shape',
                                    'slug' => 'eo_diamond_princess_shape_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'emerald.png',
                                    'thumb_selected' => $_img_url.'emerald_selected.png',
                                    'name' => 'Emerald',
                                    'description' => 'Diamond emerald shape',
                                    'slug' => 'eo_diamond_emerald_shape_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'asscher.png',
                                    'thumb_selected' => $_img_url.'asscher_selected.png',
                                    'name' => 'Asscher',
                                    'description' => 'Diamond asscher shape',
                                    'slug' => 'eo_diamond_asscher_shape_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'marquise.png',
                                    'thumb_selected' => $_img_url.'marquise_selected.png',
                                    'name' => 'Marquise',
                                    'description' => 'Diamond marquise shape',
                                    'slug' => 'eo_diamond_marquise_shape_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'oval.png',
                                    'thumb_selected' => $_img_url.'oval_selected.png',
                                    'name' => 'Oval',
                                    'description' => 'Diamond oval shape',
                                    'slug' => 'eo_diamond_oval_shape_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'rediant.png',
                                    'thumb_selected' => $_img_url.'rediant_selected.png',
                                    'name' => 'Radiant',
                                    'description' => 'Diamond radiant shape',
                                    'slug' => 'eo_diamond_radiant_shape_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'pear.png',
                                    'thumb_selected' => $_img_url.'pear_selected.png',
                                    'name' => 'Pear',
                                    'description' => 'Diamond pear shape',
                                    'slug' => 'eo_diamond_pear_shape_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'heart.png',
                                    'thumb_selected' => $_img_url.'heart_selected.png',
                                    'name' => 'Heart',
                                    'description' => 'Diamond heart shape',
                                    'slug' => 'eo_diamond_heart_shape_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'cushion.png',
                                    'thumb_selected' => $_img_url.'cushion_selected.png',
                                    'name' => 'Cushion',
                                    'description' => 'Diamond cushion shape',
                                    'slug' => 'eo_diamond_cushion_shape_cat'
                                )
                        )
                    ),
                    
                    array(
                        'thumb' => '',
                        'name' => 'Setting',
                        'description' => 'Setting shapes category',
                        'slug' => 'eo_setting_shape_cat',
                        'child'=> 
                        array(
                                array(
                                    'thumb' => $_img_url.'round.png',
                                    'thumb_selected' => $_img_url.'round_selected.png',
                                    'name' => 'Round',
                                    'description' => 'Setting round shape',
                                    'slug' => 'eo_setting_round_shape_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'princess.png',
                                    'thumb_selected' => $_img_url.'princess_selected.png',
                                    'name' => 'Princess',
                                    'description' => 'setting princess shape',
                                    'slug' => 'eo_setting_princess_shape_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'emerald.png',
                                    'thumb_selected' => $_img_url.'emerald_selected.png',
                                    'name' => 'Emerald',
                                    'description' => 'Setting emerald shape',
                                    'slug' => 'eo_setting_emerald_shape_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'asscher.png',
                                    'thumb_selected' => $_img_url.'asscher_selected.png',
                                    'name' => 'Asscher',
                                    'description' => 'Setting asscher shape',
                                    'slug' => 'eo_setting_asscher_shape_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'marquise.png',
                                    'thumb_selected' => $_img_url.'marquise_selected.png',
                                    'name' => 'Marquise',
                                    'description' => 'Setting marquise shape',
                                    'slug' => 'eo_setting_marquise_shape_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'oval.png',
                                    'thumb_selected' => $_img_url.'oval_selected.png',
                                    'name' => 'Oval',
                                    'description' => 'Setting oval shape',
                                    'slug' => 'eo_setting_oval_shape_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'rediant.png',
                                    'thumb_selected' => $_img_url.'rediant_selected.png',
                                    'name' => 'Radiant',
                                    'description' => 'Setting radiant shape',
                                    'slug' => 'eo_setting_radiant_shape_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'pear.png',
                                    'thumb_selected' => $_img_url.'pear_selected.png',
                                    'name' => 'Pear',
                                    'description' => 'Setting pear shape',
                                    'slug' => 'eo_setting_pear_shape_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'heart.png',
                                    'thumb_selected' => $_img_url.'heart_selected.png',
                                    'name' => 'Heart',
                                    'description' => 'Setting heart shape',
                                    'slug' => 'eo_setting_heart_shape_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'cushion.png',
                                    'thumb_selected' => $_img_url.'cushion_selected.png',
                                    'name' => 'Cushion',
                                    'description' => 'Setting cushion shape',
                                    'slug' => 'eo_setting_cushion_shape_cat'
                                )
                        )
                    ),
                    
                    /*Lab-Growns ----*/
                    array(
                        'thumb' => '',
                        'name' => 'Lab-Grown',
                        'description' => 'Lab-Grown',
                        'slug' => 'eo_lab_diamond_shape_cat',
                        'child'=> 
                        array(
                                array(
                                    'thumb' => $_img_url.'round.png',
                                    'thumb_selected' => $_img_url.'round_selected.png',
                                    'name' => 'Round',
                                    'description' => 'Diamond round shape',
                                    'slug' => 'eo_lab_diamond_round_shape_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'princess.png',
                                    'thumb_selected' => $_img_url.'princess_selected.png',
                                    'name' => 'Princess',
                                    'description' => 'Diamond princess shape',
                                    'slug' => 'eo_lab_diamond_princess_shape_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'emerald.png',
                                    'thumb_selected' => $_img_url.'emerald_selected.png',
                                    'name' => 'Emerald',
                                    'description' => 'Diamond emerald shape',
                                    'slug' => 'eo_lab_diamond_emerald_shape_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'asscher.png',
                                    'thumb_selected' => $_img_url.'asscher_selected.png',
                                    'name' => 'Asscher',
                                    'description' => 'Diamond asscher shape',
                                    'slug' => 'eo_lab_diamond_asscher_shape_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'marquise.png',
                                    'thumb_selected' => $_img_url.'marquise_selected.png',
                                    'name' => 'Marquise',
                                    'description' => 'Diamond marquise shape',
                                    'slug' => 'eo_lab_diamond_marquise_shape_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'oval.png',
                                    'thumb_selected' => $_img_url.'oval_selected.png',
                                    'name' => 'Oval',
                                    'description' => 'Diamond oval shape',
                                    'slug' => 'eo_lab_diamond_oval_shape_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'rediant.png',
                                    'thumb_selected' => $_img_url.'rediant_selected.png',
                                    'name' => 'Radiant',
                                    'description' => 'Diamond radiant shape',
                                    'slug' => 'eo_lab_diamond_radiant_shape_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'pear.png',
                                    'thumb_selected' => $_img_url.'pear_selected.png',
                                    'name' => 'Pear',
                                    'description' => 'Diamond pear shape',
                                    'slug' => 'eo_lab_diamond_pear_shape_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'heart.png',
                                    'thumb_selected' => $_img_url.'heart_selected.png',
                                    'name' => 'Heart',
                                    'description' => 'Diamond heart shape',
                                    'slug' => 'eo_lab_diamond_heart_shape_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'cushion.png',
                                    'thumb_selected' => $_img_url.'cushion_selected.png',
                                    'name' => 'Cushion',
                                    'description' => 'Diamond cushion shape',
                                    'slug' => 'eo_lab_diamond_cushion_shape_cat'
                                )
                        )
                    ),
                    /*LAb-Growns ---- END*/

                    array(
                        'thumb' => '',
                        'name' => 'Style',
                        'description' => 'Ring style category',
                        'slug' => 'eo_ring_style_cat',
                        'child'=> 
                        array(
                                array(
                                    'thumb' => $_img_url.'halo.png',
                                    'thumb_selected' => $_img_url.'halo_selected.png',
                                    'name' => 'Halo',
                                    'description' => 'Halo style for ring',
                                    'slug' => 'eo_ring_halo_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'pave.png',
                                    'thumb_selected' => $_img_url.'pave_selected.png',
                                    'name' => 'Pave',
                                    'description' => 'Pave style for ring',
                                    'slug' => 'eo_ring_pave_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'solitaire.png',
                                    'thumb_selected' => $_img_url.'solitaire_selected.png',
                                    'name' => 'Solitaire',
                                    'description' => 'Solitaire style for ring',
                                    'slug' => 'eo_ring_solitaire_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'trilogy.png',
                                    'thumb_selected' => $_img_url.'trilogy_selected.png',
                                    'name' => 'Trilogy',
                                    'description' => 'Trilogy style for ring',
                                    'slug' => 'eo_ring_trilogy_cat'
                                )
                        )            
                     ),
                     array(
                        'thumb' => '',
                        'name' => 'Metal',
                        'description' => 'Metal category',
                        'slug' => 'eo_metal_cat',
                        'child'=> 
                        array(
                                array(
                                    'thumb' => $_img_url.'wg-14.jpg',
                                    'thumb_selected' => $_img_url.'wg-14.jpg',
                                    'name' => '14K White Gold',
                                    'description' => '14k white gold category for metal',
                                    'slug' => 'eo_metal_14k_white_gold_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'wg-18.jpg',
                                    'thumb_selected' => $_img_url.'wg-14.jpg',
                                    'name' => '18K White Gold',
                                    'description' => '18k white gold category for metal',
                                    'slug' => 'eo_metal_18k_white_gold_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'yg-14.jpg',
                                    'thumb_selected' => $_img_url.'wg-14.jpg',
                                    'name' => '14K Yellow Gold',
                                    'description' => '14k yellow gold category for metal',
                                    'slug' => 'eo_metal_14k_yellow_gold_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'yg-18.jpg',
                                    'thumb_selected' => $_img_url.'wg-14.jpg',
                                    'name' => '18K Yellow Gold',
                                    'description' => '18k yellow gold category for metal',
                                    'slug' => 'eo_metal_18k_yellow_gold_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'rg-14.jpg',
                                    'thumb_selected' => $_img_url.'wg-14.jpg',
                                    'name' => '14K Rose Gold',
                                    'description' => '14k rose gold category for metal',
                                    'slug' => 'eo_metal_14k_rose_gold_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'rg-18.jpg',
                                    'thumb_selected' => $_img_url.'wg-14.jpg',
                                    'name' => '18K Rose Gold',
                                    'description' => '18k rose gold category for metal',
                                    'slug' => 'eo_metal_18k_rose_gold_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'pl.jpg',
                                    'thumb_selected' => $_img_url.'wg-14.jpg',
                                    'name' => 'Platinum',
                                    'description' => 'Platinum category for metal',
                                    'slug' => 'eo_metal_platinum_cat'
                                )
                        )            
                     )
                  );
    }

/*    public function get_maps() {
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
*/
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
                    'filter_category'=>$__cat__['eo_diamond_shape_cat'][0],
                    'help'=>0,
                    'help_text'=>'',
                    'enabled'=>1,
                    'filter_set'=>'6085411b707ad'
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
                    'filter_category'=>$__cat__['eo_diamond_shape_cat'][0],
                    'help'=>0,
                    'help_text'=>'',
                    'enabled'=>1,
                    'filter_set'=>'6085411b707ad'
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
                'filter_category'=>$__cat__['eo_diamond_shape_cat'][0],
                'help'=>0,
                'help_text'=>'',
                'enabled'=>1,
                'filter_set'=>'6085411b707ad'

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
                'filter_category'=>$__cat__['eo_diamond_shape_cat'][0],
                'help'=>0,
                'help_text'=>'',
                'enabled'=>1,
                'filter_set'=>'6085411b707ad'
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
                'filter_category'=>$__cat__['eo_diamond_shape_cat'][0],
                'help'=>0,
                'help_text'=>'',
                'enabled'=>1,
                'filter_set'=>'6085411b707ad'
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
                'filter_category'=>$__cat__['eo_diamond_shape_cat'][0],
                'help'=>0,
                'help_text'=>'',
                'enabled'=>1,
                'filter_set'=>'6085411b707ad'
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
                'filter_category'=>$__cat__['eo_diamond_shape_cat'][0],
                'help'=>0,
                'help_text'=>'',
                'enabled'=>1,
                'filter_set'=>'6085411b707ad'
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
                'filter_category'=>$__cat__['eo_diamond_shape_cat'][0],
                'help'=>0,
                'help_text'=>'',
                'enabled'=>1,
                'filter_set'=>'6085411b707ad'
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
                'filter_category'=>$__cat__['eo_diamond_shape_cat'][0],
                'help'=>0,
                'help_text'=>'',
                'enabled'=>1,
                'filter_set'=>'6085411b707ad'
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
                'filter_category'=>$__cat__['eo_diamond_shape_cat'][0],
                'help'=>0,
                'help_text'=>'',
                'enabled'=>1,
                'filter_set'=>'6085411b707ad'
            );
        }



        if(!empty($__cat__['eo_lab_diamond_shape_cat'])){
            $filter['d_fconfig'][]=array(
                    'name'=>$__cat__['eo_lab_diamond_shape_cat'][0],
                    'type'=>"0",
                    'label'=>$__cat__['eo_lab_diamond_shape_cat'][1],
                    'advance'=>"0",
                    'dependent'=>"0",
                    'input'=>"icon_text",
                    'column_width'=> "100",
                    'order'=>"0",
                    'template'=>'fc1',
                    'filter_category'=>$__cat__['eo_diamond_shape_cat'][0],
                    'help'=>0,
                    'help_text'=>'',
                    'enabled'=>1,
                    'filter_set'=>'6085412e4cc9b'
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
                    'filter_category'=>$__cat__['eo_diamond_shape_cat'][0],
                    'help'=>0,
                    'help_text'=>'',
                    'enabled'=>1,
                    'filter_set'=>'6085412e4cc9b'
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
                'filter_category'=>$__cat__['eo_diamond_shape_cat'][0],
                'help'=>0,
                'help_text'=>'',
                'enabled'=>1,
                'filter_set'=>'6085412e4cc9b'

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
                'filter_category'=>$__cat__['eo_diamond_shape_cat'][0],
                'help'=>0,
                'help_text'=>'',
                'enabled'=>1,
                'filter_set'=>'6085412e4cc9b'
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
                'filter_category'=>$__cat__['eo_diamond_shape_cat'][0],
                'help'=>0,
                'help_text'=>'',
                'enabled'=>1,
                'filter_set'=>'6085412e4cc9b'
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
                'filter_category'=>$__cat__['eo_diamond_shape_cat'][0],
                'help'=>0,
                'help_text'=>'',
                'enabled'=>1,
                'filter_set'=>'6085412e4cc9b'
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
                'filter_category'=>$__cat__['eo_diamond_shape_cat'][0],
                'help'=>0,
                'help_text'=>'',
                'enabled'=>1,
                'filter_set'=>'6085412e4cc9b'
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
                'filter_category'=>$__cat__['eo_diamond_shape_cat'][0],
                'help'=>0,
                'help_text'=>'',
                'enabled'=>1,
                'filter_set'=>'6085412e4cc9b'
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
                'filter_category'=>$__cat__['eo_diamond_shape_cat'][0],
                'help'=>0,
                'help_text'=>'',
                'enabled'=>1,
                'filter_set'=>'6085412e4cc9b'
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
                'filter_category'=>$__cat__['eo_diamond_shape_cat'][0],
                'help'=>0,
                'help_text'=>'',
                'enabled'=>1,
                'filter_set'=>'6085412e4cc9b'
            );
        }



        //Filters for settings....
        if(!empty($__cat__['eo_setting_shape_cat'])){
            $filter['d_fconfig'][]=array(
                'name'=>$__cat__['eo_setting_shape_cat'][0],
                'type'=>"0",
                'label'=>$__cat__['eo_setting_shape_cat'][1],
                'advance'=>"0",
                'dependent'=>"0",
                'input'=>"icon_text",
                'column_width'=> "100",
                'order'=>"0",
                'template'=>'fc2',
                'filter_category'=>$__cat__['eo_setting_shape_cat'][0],
                'help'=>0,
                'help_text'=>'',
                'enabled'=>1
            );
        }
        if(!empty($__cat__['eo_ring_style_cat'])){
            $filter['d_fconfig'][]=array(
                'name'=>$__cat__['eo_ring_style_cat'][0],
                'type'=>"0",
                'label'=>$__cat__['eo_ring_style_cat'][1],
                'advance'=>"0",
                'dependent'=>"0",
                'input'=>"icon_text",
                'column_width'=> "50",
                'order'=>"1",
                'template'=>'fc2',
                'filter_category'=>$__cat__['eo_setting_shape_cat'][0],
                'help'=>0,
                'help_text'=>'',
                'enabled'=>1
            );
        }
        if(!empty($__cat__['eo_metal_cat'])){
            $filter['d_fconfig'][]=array(
                'name'=>$__cat__['eo_metal_cat'][0],
                'type'=>"0",
                'label'=>$__cat__['eo_metal_cat'][1],
                'advance'=>"0",
                'dependent'=>"0",
                'input'=>"icon",
                'column_width'=> "50",
                'order'=>"2",
                'template'=>'fc2',
                'filter_category'=>$__cat__['eo_setting_shape_cat'][0],
                'help'=>0,
                'help_text'=>'',
                'enabled'=>1
            );
        }

        return $filter;
    }

}

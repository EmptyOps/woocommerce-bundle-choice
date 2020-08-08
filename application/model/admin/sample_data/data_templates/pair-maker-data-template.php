<?php


/*
*   pair maker template for Sample data.
*/

namespace eo\wbc\model\admin\sample_data\data_templates;

defined( 'ABSPATH' ) || exit;

class Pair_Maker_Data_Template extends Pair_Builder_Data_Template {

    private static $_instance = null;

    public static function instance() {
        if ( ! isset( self::$_instance ) ) {
            self::$_instance = new self;
        }

        return self::$_instance;
    }

    private function __construct() {
        
        $this->asset_folder = 'pair_maker';
    }

    public function get_attributes() {
        return array(
                    array(
                        'label' => 'Size',
                        'terms' => array('XS','S','M','L','XL','2XL','3XL','28','30','32','34','36','38'),
                        'description' => 'Size attributes for clothing wear',
                        'slug' => 'wbc_cloth_size_attr'
                    ),
                    array(
                        'label' => 'Colour',
                        'terms' => array('White','Black','Red','Purpal', 'Blue', 'Green','Yellow','Orange'),
                        'description' => 'Colour attributes for clothing wear',
                        'slug' => 'wbc_cloth_colour_attr'
                    ),
                    array(
                        'label' => 'Fabric',
                        'terms' => array('Cotton', 'Silk', 'Canvas', 'Chiffon', 'Damask', 'Wool', 'Jersey', 'Polyester', 'Velvet','Linen'),
                        'description' => 'Fabric attributes for clothings wear',
                        'slug' => 'wbc_cloth_fabric_attr'
                    ),
                    array(
                        'label' => 'Fit',
                        'terms' => array('Skinny fit','Slim fit','Regular fit','Tapered fit','Hem fit', 'Ultra slim','Flared','Easy'),
                        'description' => 'Fit attributes for clothing wear',
                        'slug' => 'wbc_cloth_fit_attr'
                    ),
                    array(
                        'label' => 'Neck',
                        'terms' => array('Round','Crew' , 'Jewel', 'U neckline', 'Square' , 'V neckline', 'Collared neckline', 'Funnel Neckline'),
                        'description' => 'Neck types attributes for clothings wear',
                        'slug' => 'wbc_cloth_neck_attr'
                    ),
                    array(
                        'label' => 'Occasion',
                        'terms' => array('Causal','Formal','Lounge','Tie','Cocktail Attire','Ethnic'),
                        'description' => 'Occasion attributes for clothings wear',
                        'slug' => 'wbc_cloth_occasion_attr'
                    ),
                    array(
                        'label' => 'Pattern',
                        'terms' => array('Solid/plain','Stripes','Checks', 'Plaid', 'Floral','Polka Dots','Printed','Detailing'),        
                        'description' => 'Pattern attributes for clothings wear',
                        'slug' => 'wbc_cloth_pattern_attr'
                    ),
                    array(
                        'label' => 'Sleeve',
                        'terms' => array('Long sleeve', 'Short sleeve', 'Roll-up sleeve'),        
                        'description' => 'Sleeve attributes for clothings wear',
                        'slug' => 'wbc_cloth_sleeve_attr'
                    ),
                    array(
                        'label' => 'Collar',
                        'terms' => array('Mandrin', 'Band', 'Polo', 'Slim','Spread','Regular','Mao'),
                        'description' => 'Collar attributes for clothings wear',
                        'slug' => 'wbc_cloth_collar_attr'
                    ),
                    array(
                        'label' => 'Closure Type',
                        'terms' => array('Buttons','Zipper','Hook','Frog & toggle'),
                        'description' => 'Closure type attributes for clothings wear',
                        'slug' => 'wbc_cloth_closure_type_attr'
                    ),
                    array(
                        'label' => 'Length',
                        'terms' => array('Halo','Pave','Solitaire','Trilogy'),
                        'description' => 'Length attributes for clothings wear',
                        'slug' => 'wbc_cloth_length_attr'
                    ),
                    array(
                        'label' => 'Bottom Type',
                        'terms' => array('Dhotis', 'Pants', 'Leggings','Palazzos','Sharara','Skirts', 'Culottes'),
                        'description' => 'Bottom type attributes for clothings wear',
                        'slug' => 'wbc_cloth_bottom_type_attr'
                    ),
                  ); 
    }

    public function get_categories() {
        $_img_url= constant('EOWBC_ASSET_URL').'img/sample_data/'.$this->asset_folder.'/category/';    // EO_WBC_PLUGIN_DIR.'EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/';
          
        return array(
                    array(
                        'thumb' => '',
                        'name' => 'Top wear',
                        'description' => 'Top wear category',
                        'slug' => 'wbc_top_wear_cat',
                        'child'=> 
                        array(
                                array(
                                    'thumb' => $_img_url.'shirts.png',
                                    'thumb_selected' => $_img_url.'shirts_selected.png',
                                    'name' => 'Shirt',
                                    'description' => 'Top wear shirts',
                                    'slug' => 'wbc_top_wear_shirts_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'tshirt.png',
                                    'thumb_selected' => $_img_url.'tshirt_selected.png',
                                    'name' => 'T-shirts',
                                    'description' => 'Top wear t-shirts',
                                    'slug' => 'wbc_top_wear_t-shirts_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'sweater.png',
                                    'thumb_selected' => $_img_url.'sweater_selected.png',
                                    'name' => 'Sweaters',
                                    'description' => 'Top wear sweaters',
                                    'slug' => 'wbc_top_wear_sweaters_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'jacket.png',
                                    'thumb_selected' => $_img_url.'jacket_selected.png',
                                    'name' => 'Jackets',
                                    'description' => 'Top wear Jackets',
                                    'slug' => 'wbc_top_wear_jackets_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'blazers.png',
                                    'thumb_selected' => $_img_url.'blazers_selected.png',
                                    'name' => 'Blazers & coats',
                                    'description' => 'Top wear blazers and coats',
                                    'slug' => 'wbc_top_wear_blazers_coats_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'suit.png',
                                    'thumb_selected' => $_img_url.'suit_selected.png',
                                    'name' => 'Suits',
                                    'description' => 'Top wear suits',
                                    'slug' => 'wbc_top_wear_suits_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'hoodie.png',
                                    'thumb_selected' => $_img_url.'hoodie_selected.png',
                                    'name' => 'Hoodies',
                                    'description' => 'Top wear hoodies',
                                    'slug' => 'wbc_top_wear_hoodies_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'tops.png',
                                    'thumb_selected' => $_img_url.'tops_selected.png',
                                    'name' => 'Tops',
                                    'description' => 'Top wear tops',
                                    'slug' => 'wbc_top_wear_tops_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'tunic.png',
                                    'thumb_selected' => $_img_url.'tunic_selected.png',
                                    'name' => 'Tunics',
                                    'description' => 'Top wear tunics',
                                    'slug' => 'wbc_top_wear_tunics_cat'
                                )
                        )
                    ),
                    array(
                        'thumb' => '',
                        'name' => 'Bottom wear',
                        'description' => 'Bottom wear category',
                        'slug' => 'wbc_bottom_wear_cat',
                        'child'=> 
                        array(
                                array(
                                    'thumb' => $_img_url.'trousers.png',
                                    'thumb_selected' => $_img_url.'trousers_selected.png',
                                    'name' => 'Trousers',
                                    'description' => 'Bottom wear trousers',
                                    'slug' => 'wbc_bottom_wear_trousers_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'jeans.png',
                                    'thumb_selected' => $_img_url.'jeans_selected.png',
                                    'name' => 'Jeans',
                                    'description' => 'Bottom wear jeans',
                                    'slug' => 'wbc_bottom_wear_jeans_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'shorts.png',
                                    'thumb_selected' => $_img_url.'shorts_selected.png',
                                    'name' => 'Shorts',
                                    'description' => 'Bottom wear shorts',
                                    'slug' => 'wbc_bottom_wear_shorts_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'track.png',
                                    'thumb_selected' => $_img_url.'track_selected.png',
                                    'name' => 'Track pants',
                                    'description' => 'Bottom wear track pants',
                                    'slug' => 'wbc_bottom_wear_track_pants_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'palazzos.png',
                                    'thumb_selected' => $_img_url.'palazzos_selected.png',
                                    'name' => 'Palazzos',
                                    'description' => 'Bottom wear palazzos',
                                    'slug' => 'wbc_bottom_wear_plazzos_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'skirt.png',
                                    'thumb_selected' => $_img_url.'skirt_selected.png',
                                    'name' => 'Skirts',
                                    'description' => 'Bottom wear skirts',
                                    'slug' => 'wbc_bottom_wear_skirts_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'leggings.png',
                                    'thumb_selected' => $_img_url.'leggings_selected.png',
                                    'name' => 'Leggings',
                                    'description' => 'Bottom wear leggings',
                                    'slug' => 'wbc_bottom_wear_leggings_cat'
                                )
                        )
                    )
                );
    }

    public function get_maps() {
        return array(
                        array(
                            ['slug','wbc_diamond_round_shape_cat','product_cat'],
                            ['slug','wbc_setting_round_shape_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_diamond_princess_shape_cat','product_cat'],
                            ['slug','wbc_setting_pear_shape_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_diamond_emerald_shape_cat','product_cat'],
                            ['slug','wbc_setting_emerald_shape_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_diamond_asscher_shape_cat','product_cat'],
                            ['slug','wbc_setting_asscher_shape_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_diamond_marquise_shape_cat','product_cat'],
                            ['slug','wbc_setting_marquise_shape_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_diamond_oval_shape_cat','product_cat'],
                            ['slug','wbc_setting_oval_shape_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_diamond_radiant_shape_cat','product_cat'],
                            ['slug','wbc_setting_radiant_shape_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_diamond_pear_shape_cat','product_cat'],
                            ['slug','wbc_setting_pear_shape_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_diamond_heart_shape_cat','product_cat'],
                            ['slug','wbc_setting_heart_shape_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_diamond_cushion_shape_cat','product_cat'],
                            ['slug','wbc_setting_cushion_shape_cat','product_cat']
                        )
                    );
    }

    public function get_products() {
        
        $_img_url=constant('EOWBC_ASSET_URL').'img/sample_data/'.$this->asset_folder.'/';   //EO_WBC_PLUGIN_DIR.'EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/';
        $this->gallay_img = $_img_url. 'product/';
        return array(
        array(
          'title'=>'Top_wear #20000001',
          'thumb'=>$_img_url.'men_white_shirt.jpg',
          'images'=>array('men_white_shirt_1.jpg','men_white_shirt_2.jpg'),
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable', //simple | variable
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_shirts_cat','wbc_top_wear_t-shirts_cat','wbc_top_wear_jackets_cat','wbc_top_wear_suits_cat','wbc_top_wear_sweaters_cat','wbc_top_wear_blazers_coats_cat','wbc_top_wear_hoodies_cat','wbc_top_wear_tops_cat','wbc_top_wear_tunics_cat'),
          'attribute'=>array(
                    'pa_wbc_cloth_size_attr'=>array(
                              'name'=>'pa_wbc_cloth_size_attr',
                              'value'=>'XS|S|M|L|XL|2XL|3XL',
                              'position'=>0,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                    ),
                    'pa_wbc_cloth_colour_attr'=>array(
                              'name'=>'pa_wbc_cloth_colour_attr',
                              'value'=>'White|Black|Red|Blue|Green|Purpal|Orange|Yellow',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                    ),
                    'pa_wbc_cloth_fabric_attr'=>array(
                              'name'=>'pa_wbc_cloth_fabric_attr',
                              'value'=>'Cotton|Silk|Canvas|Chiffon|Damask|Wool|Jersey|Polyester|Velvet|Linen',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                    )
            ),
          'variation'=>array(
                          array(
                            'regular_price'=>'250',
                            'price'=>'245',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'XS','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_fabric_attr'=>'Cotton')
                          ),
                          array(
                            'regular_price'=>'260',
                            'price'=>'255',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'XS','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fabric_attr'=>'Polyester')
                          ),
                          array(
                            'regular_price'=>'270',
                            'price'=>'265',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'XS','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_fabric_attr'=>'Polyester')
                          ),
                          array(
                            'regular_price'=>'280',
                            'price'=>'275',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'S','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_fabric_attr'=>'Polyester')
                          ),
                          array(
                            'regular_price'=>'300',
                            'price'=>'295',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'S','pa_wbc_cloth_colour_attr'=>'Red','pa_wbc_cloth_fabric_attr'=>'Wool')
                          ),
                          array(
                            'regular_price'=>'310',
                            'price'=>'305',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'S','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_fabric_attr'=>'Linen')
                          ),
                          array(
                            'regular_price'=>'320',
                            'price'=>'315',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'M','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_fabric_attr'=>'Polyester')
                          ),
                          array(
                            'regular_price'=>'330',
                            'price'=>'325',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'M','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fabric_attr'=>'Cotton')
                          ),
                          array(
                            'regular_price'=>'340',
                            'price'=>'335',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'M','pa_wbc_cloth_colour_attr'=>'Red','pa_wbc_cloth_fabric_attr'=>'Linen')
                          ),
                          array(
                            'regular_price'=>'350',
                            'price'=>'345',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'XL','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_fabric_attr'=>'Polyester')
                          ),
                          array(
                            'regular_price'=>'360',
                            'price'=>'355',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'XL','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fabric_attr'=>'Cotton')
                          ),
                          array(
                            'regular_price'=>'370',
                            'price'=>'365',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'XL','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_fabric_attr'=>'Silk')
                          )            
        ),
        array(
          'title'=>'Top_wear #20000002',
          'thumb'=>$_img_url.'men_shirts.jpg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable', //simple | variable
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_shirts_cat','wbc_top_wear_t-shirts_cat','wbc_top_wear_jackets_cat','wbc_top_wear_suits_cat','wbc_top_wear_sweaters_cat','wbc_top_wear_blazers_coats_cat','wbc_top_wear_hoodies_cat','wbc_top_wear_tops_cat','wbc_top_wear_tunics_cat'),
          'attribute'=>array(
                    'pa_wbc_cloth_size_attr'=>array(
                              'name'=>'pa_wbc_cloth_size_attr',
                              'value'=>'XS|S|M|L|XL|2XL|3XL',
                              'position'=>0,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_colour_attr'=>array(
                              'name'=>'pa_wbc_cloth_colour_attr',
                              'value'=>'White|Black|Red|Blue|Green|Purpal|Orange|Yellow',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_fabric_attr'=>array(
                              'name'=>'pa_wbc_cloth_fabric_attr',
                              'value'=>'Cotton|Silk|Canvas|Chiffon|Damask|Wool|Jersey|Polyester|Velvet|Linen',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            )
                    ),
          'variation'=>array(
                          array(
                            'regular_price'=>'350',
                            'price'=>'345',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'S','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_fabric_attr'=>'Cotton')
                          ),
                          array(
                            'regular_price'=>'360',
                            'price'=>'355',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'S','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fabric_attr'=>'Polyester')
                          ),
                          array(
                            'regular_price'=>'370',
                            'price'=>'365',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'S','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_fabric_attr'=>'Polyester')
                          ),
                          array(
                            'regular_price'=>'380',
                            'price'=>'375',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'M','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_fabric_attr'=>'Polyester')
                          ),
                          array(
                            'regular_price'=>'400',
                            'price'=>'395',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'M','pa_wbc_cloth_colour_attr'=>'Red','pa_wbc_cloth_fabric_attr'=>'Wool')
                          ),
                          array(
                            'regular_price'=>'410',
                            'price'=>'405',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'M','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_fabric_attr'=>'Linen')
                          ),
                          array(
                            'regular_price'=>'420',
                            'price'=>'415',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'2XL','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_fabric_attr'=>'Polyester')
                          ),
                          array(
                            'regular_price'=>'430',
                            'price'=>'425',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'2XL','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fabric_attr'=>'Cotton')
                          ),
                          array(
                            'regular_price'=>'440',
                            'price'=>'435',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'2XL','pa_wbc_cloth_colour_attr'=>'Red','pa_wbc_cloth_fabric_attr'=>'Linen')
                          ),
                          array(
                            'regular_price'=>'450',
                            'price'=>'445',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'XL','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_fabric_attr'=>'Polyester')
                          ),
                          array(
                            'regular_price'=>'460',
                            'price'=>'455',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'XL','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fabric_attr'=>'Cotton')
                          ),
                          array(
                            'regular_price'=>'470',
                            'price'=>'465',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'XL','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_fabric_attr'=>'Silk')
                          )
                )           
        ),
        array(
          'title'=>'Top_wear #20000003',
          'thumb'=>$_img_url.'black_tops.jpg',
          'images'=>array('black_tops_1.jpg'),
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable', //simple | variable
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_shirts_cat','wbc_top_wear_t-shirts_cat','wbc_top_wear_jackets_cat','wbc_top_wear_suits_cat','wbc_top_wear_sweaters_cat','wbc_top_wear_blazers_coats_cat','wbc_top_wear_hoodies_cat','wbc_top_wear_tops_cat','wbc_top_wear_tunics_cat'),
          'attribute'=>array(
                    'pa_wbc_cloth_size_attr'=>array(
                              'name'=>'pa_wbc_cloth_size_attr',
                              'value'=>'XS|S|M|L|XL|2XL|3XL',
                              'position'=>0,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_colour_attr'=>array(
                              'name'=>'pa_wbc_cloth_colour_attr',
                              'value'=>'White|Black|Red|Blue|Green|Purpal|Orange|Yellow',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_fabric_attr'=>array(
                              'name'=>'pa_wbc_cloth_fabric_attr',
                              'value'=>'Cotton|Silk|Canvas|Chiffon|Damask|Wool|Jersey|Polyester|Velvet|Linen',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            )
            ),
          'variation'=>array(
                          array(
                            'regular_price'=>'550',
                            'price'=>'545',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'S','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_fabric_attr'=>'Cotton')
                          ),
                          array(
                            'regular_price'=>'560',
                            'price'=>'555',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'S','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fabric_attr'=>'Polyester')
                          ),
                          array(
                            'regular_price'=>'570',
                            'price'=>'565',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'S','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_fabric_attr'=>'Polyester')
                          ),
                          array(
                            'regular_price'=>'580',
                            'price'=>'575',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'M','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_fabric_attr'=>'Polyester')
                          ),
                          array(
                            'regular_price'=>'500',
                            'price'=>'495',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'M','pa_wbc_cloth_colour_attr'=>'Red','pa_wbc_cloth_fabric_attr'=>'Wool')
                          ),
                          array(
                            'regular_price'=>'510',
                            'price'=>'505',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'M','pa_wbc_cloth_colour_attr'=>'Purpal','pa_wbc_cloth_fabric_attr'=>'Linen')
                          ),
                          array(
                            'regular_price'=>'620',
                            'price'=>'615',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'2XL','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_fabric_attr'=>'Wool')
                          ),
                          array(
                            'regular_price'=>'630',
                            'price'=>'625',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'2XL','pa_wbc_cloth_colour_attr'=>'Green','pa_wbc_cloth_fabric_attr'=>'Cotton')
                          ),
                          array(
                            'regular_price'=>'640',
                            'price'=>'635',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'2XL','pa_wbc_cloth_colour_attr'=>'Red','pa_wbc_cloth_fabric_attr'=>'Linen')
                          ),
                          array(
                            'regular_price'=>'550',
                            'price'=>'545',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'XL','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_fabric_attr'=>'Polyester')
                          ),
                          array(
                            'regular_price'=>'560',
                            'price'=>'555',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'XL','pa_wbc_cloth_colour_attr'=>'Orange','pa_wbc_cloth_fabric_attr'=>'Cotton')
                          ),
                          array(
                            'regular_price'=>'570',
                            'price'=>'565',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'XL','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_fabric_attr'=>'Linen')
                          )
                        )            
        ),
        array(
          'title'=>'Top_wear #20000004',
          'thumb'=>$_img_url.'women_pink_tops.jpg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable', //simple | variable
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_shirts_cat','wbc_top_wear_t-shirts_cat','wbc_top_wear_jackets_cat','wbc_top_wear_suits_cat','wbc_top_wear_sweaters_cat','wbc_top_wear_blazers_coats_cat','wbc_top_wear_hoodies_cat','wbc_top_wear_tops_cat','wbc_top_wear_tunics_cat'),
          'attribute'=>array(
                   'pa_wbc_cloth_size_attr'=>array(
                              'name'=>'pa_wbc_cloth_size_attr',
                              'value'=>'XS|S|M|L|XL|2XL|3XL',
                              'position'=>0,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_colour_attr'=>array(
                              'name'=>'pa_wbc_cloth_colour_attr',
                              'value'=>'White|Black|Red|Blue|Green|Purpal|Orange|Yellow',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_fabric_attr'=>array(
                              'name'=>'pa_wbc_cloth_fabric_attr',
                              'value'=>'Cotton|Silk|Canvas|Chiffon|Damask|Wool|Jersey|Polyester|Velvet|Linen',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            )
           ),
          'variation'=>array(
                          array(
                            'regular_price'=>'250',
                            'price'=>'245',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'S','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_fabric_attr'=>'Cotton')
                          ),
                          array(
                            'regular_price'=>'260',
                            'price'=>'255',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'S','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fabric_attr'=>'Polyester')
                          ),
                          array(
                            'regular_price'=>'270',
                            'price'=>'265',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'S','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_fabric_attr'=>'Canvas')
                          ),
                          array(
                            'regular_price'=>'280',
                            'price'=>'275',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'M','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_fabric_attr'=>'Polyester')
                          ),
                          array(
                            'regular_price'=>'300',
                            'price'=>'295',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'M','pa_wbc_cloth_colour_attr'=>'Red','pa_wbc_cloth_fabric_attr'=>'Cotton')
                          ),
                          array(
                            'regular_price'=>'310',
                            'price'=>'305',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'M','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_fabric_attr'=>'Linen')
                          ),
                          array(
                            'regular_price'=>'320',
                            'price'=>'315',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'XS','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_fabric_attr'=>'Chiffon')
                          ),
                          array(
                            'regular_price'=>'330',
                            'price'=>'325',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'XS','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fabric_attr'=>'Damask')
                          ),
                          array(
                            'regular_price'=>'340',
                            'price'=>'335',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'XS','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_fabric_attr'=>'Linen')
                          ),
                          array(
                            'regular_price'=>'350',
                            'price'=>'345',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'L','pa_wbc_cloth_colour_attr'=>'Yellow','pa_wbc_cloth_fabric_attr'=>'Polyester')
                          ),
                          array(
                            'regular_price'=>'360',
                            'price'=>'355',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'L','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_fabric_attr'=>'Silk')
                          ),
                          array(
                            'regular_price'=>'370',
                            'price'=>'365',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'L','pa_wbc_cloth_colour_attr'=>'Purpal','pa_wbc_cloth_fabric_attr'=>'Canvas')
                          )
            )           
        ),
        array(
          'title'=>'Top_wear #20000005',
          'thumb'=>$_img_url.'women_tshirt.jpg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable', //simple | variable
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_shirts_cat','wbc_top_wear_t-shirts_cat','wbc_top_wear_jackets_cat','wbc_top_wear_suits_cat','wbc_top_wear_sweaters_cat','wbc_top_wear_blazers_coats_cat','wbc_top_wear_hoodies_cat','wbc_top_wear_tops_cat','wbc_top_wear_tunics_cat'),
          'attribute'=>array(
                   'pa_wbc_cloth_size_attr'=>array(
                              'name'=>'pa_wbc_cloth_size_attr',
                              'value'=>'XS|S|M|L|XL|2XL|3XL',
                              'position'=>0,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_colour_attr'=>array(
                              'name'=>'pa_wbc_cloth_colour_attr',
                              'value'=>'White|Black|Red|Blue|Green|Purpal|Orange|Yellow',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                    ),
                    'pa_wbc_cloth_fabric_attr'=>array(
                              'name'=>'pa_wbc_cloth_fabric_attr',
                              'value'=>'Cotton|Silk|Canvas|Chiffon|Damask|Wool|Jersey|Polyester|Velvet|Linen',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            )
           ),
          'variation'=>array(
                          array(
                            'regular_price'=>'750',
                            'price'=>'745',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'L','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_fabric_attr'=>'Cotton')
                          ),
                          array(
                            'regular_price'=>'760',
                            'price'=>'755',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'XL','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fabric_attr'=>'Polyester')
                          ),
                          array(
                            'regular_price'=>'770',
                            'price'=>'765',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'S','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_fabric_attr'=>'Canvas')
                          ),
                          array(
                            'regular_price'=>'780',
                            'price'=>'775',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'M','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_fabric_attr'=>'Polyester')
                          ),
                          array(
                            'regular_price'=>'800',
                            'price'=>'795',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'L','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fabric_attr'=>'Jersey')
                          ),
                          array(
                            'regular_price'=>'810',
                            'price'=>'805',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'M','pa_wbc_cloth_colour_attr'=>'white','pa_wbc_cloth_fabric_attr'=>'Damask')
                          ),
                          array(
                            'regular_price'=>'820',
                            'price'=>'815',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'L','pa_wbc_cloth_colour_attr'=>'Red','pa_wbc_cloth_fabric_attr'=>'Cotton')
                          ),
                          array(
                            'regular_price'=>'830',
                            'price'=>'825',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'XS','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fabric_attr'=>'Damask')
                          ),
                          array(
                            'regular_price'=>'840',
                            'price'=>'835',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'XL','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_fabric_attr'=>'Linen')
                          ),
                          array(
                            'regular_price'=>'850',
                            'price'=>'845',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'XL','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_fabric_attr'=>'Linen')
                          ),
                          array(
                            'regular_price'=>'860',
                            'price'=>'855',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'2XL','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_fabric_attr'=>'Cotton')
                          ),
                          array(
                            'regular_price'=>'870',
                            'price'=>'865',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'3XL','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fabric_attr'=>'Polyester')
                          )
                        )            
        ),
        array(
          'title'=>'Top_wear #20000006',
          'thumb'=>$_img_url.'women_white_shirt.jpg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable', //simple | variable
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_shirts_cat','wbc_top_wear_t-shirts_cat','wbc_top_wear_jackets_cat','wbc_top_wear_suits_cat','wbc_top_wear_sweaters_cat','wbc_top_wear_blazers_coats_cat','wbc_top_wear_hoodies_cat','wbc_top_wear_tops_cat','wbc_top_wear_tunics_cat'),
          'attribute'=>array('pa_wbc_cloth_size_attr'=>array(
                              'name'=>'pa_wbc_cloth_size_attr',
                              'value'=>'XS|S|M|L|XL|2XL|3XL',
                              'position'=>0,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_colour_attr'=>array(
                              'name'=>'pa_wbc_cloth_colour_attr',
                              'value'=>'White|Black|Red|Blue|Green|Purpal|Orange|Yellow',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                    ),
                    'pa_wbc_cloth_fabric_attr'=>array(
                              'name'=>'pa_wbc_cloth_fabric_attr',
                              'value'=>'Cotton|Silk|Canvas|Chiffon|Damask|Wool|Jersey|Polyester|Velvet|Linen',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                    )
           ),
          'variation'=>array(
                          array(
                            'regular_price'=>'950',
                            'price'=>'945',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'2XL','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_fabric_attr'=>'Cotton')
                          ),
                          array(
                            'regular_price'=>'960',
                            'price'=>'955',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'3XL','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fabric_attr'=>'Polyester')
                          ),
                          array(
                            'regular_price'=>'970',
                            'price'=>'965',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'XL','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_fabric_attr'=>'Canvas')
                          ),
                          array(
                            'regular_price'=>'980',
                            'price'=>'975',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'L','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_fabric_attr'=>'Polyester')
                          ),
                          array(
                            'regular_price'=>'1000',
                            'price'=>'995',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'M','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fabric_attr'=>'Jersey')
                          ),
                          array(
                            'regular_price'=>'1010',
                            'price'=>'1005',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'S','pa_wbc_cloth_colour_attr'=>'white','pa_wbc_cloth_fabric_attr'=>'Damask')
                          ),
                          array(
                            'regular_price'=>'1020',
                            'price'=>'1015',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'L','pa_wbc_cloth_colour_attr'=>'Red','pa_wbc_cloth_fabric_attr'=>'Cotton')
                          ),
                          array(
                            'regular_price'=>'1030',
                            'price'=>'1025',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'XS','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fabric_attr'=>'Damask')
                          ),
                          array(
                            'regular_price'=>'1040',
                            'price'=>'1035',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'XL','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_fabric_attr'=>'Linen')
                          ),
                          array(
                            'regular_price'=>'1050',
                            'price'=>'1045',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'XL','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_fabric_attr'=>'Linen')
                          ),
                          array(
                            'regular_price'=>'1060',
                            'price'=>'1055',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'3XL','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_fabric_attr'=>'Cotton')
                          ),
                          array(
                            'regular_price'=>'970',
                            'price'=>'965',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'2XL','pa_wbc_cloth_colour_attr'=>'white','pa_wbc_cloth_fabric_attr'=>'Polyester')
                          )
               )            
        ),
        array(
          'title'=>'Top_wear #20000007',
          'thumb'=>$_img_url.'men_skyblue_shirt.jpg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable', //simple | variable
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_shirts_cat','wbc_top_wear_t-shirts_cat','wbc_top_wear_jackets_cat','wbc_top_wear_suits_cat','wbc_top_wear_sweaters_cat','wbc_top_wear_blazers_coats_cat','wbc_top_wear_hoodies_cat','wbc_top_wear_tops_cat','wbc_top_wear_tunics_cat'),
          'attribute'=>array(
                    'pa_wbc_cloth_size_attr'=>array(
                              'name'=>'pa_wbc_cloth_size_attr',
                              'value'=>'XS|S|M|L|XL|2XL|3XL',
                              'position'=>0,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_colour_attr'=>array(
                              'name'=>'pa_wbc_cloth_colour_attr',
                              'value'=>'White|Black|Red|Blue|Green|Purpal|Orange|Yellow',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            )
                    ),
                    'pa_wbc_cloth_fabric_attr'=>array(
                              'name'=>'pa_wbc_cloth_fabric_attr',
                              'value'=>'Cotton|Silk|Canvas|Chiffon|Damask|Wool|Jersey|Polyester|Velvet|Linen',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            )
           ),
          'variation'=>array(
                          array(
                            'regular_price'=>'750',
                            'price'=>'745',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'L','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_fabric_attr'=>'Polyester')
                          ),
                          array(
                            'regular_price'=>'760',
                            'price'=>'755',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'XL','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fabric_attr'=>'Linen')
                          ),
                          array(
                            'regular_price'=>'770',
                            'price'=>'765',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'S','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_fabric_attr'=>'Jersey')
                          ),
                          array(
                            'regular_price'=>'780',
                            'price'=>'775',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'M','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_fabric_attr'=>'Canvas')
                          ),
                          array(
                            'regular_price'=>'800',
                            'price'=>'795',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'L','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fabric_attr'=>'Wool')
                          ),
                          array(
                            'regular_price'=>'810',
                            'price'=>'805',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'M','pa_wbc_cloth_colour_attr'=>'white','pa_wbc_cloth_fabric_attr'=>'Cotton')
                          ),
                          array(
                            'regular_price'=>'820',
                            'price'=>'815',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'L','pa_wbc_cloth_colour_attr'=>'Red','pa_wbc_cloth_fabric_attr'=>'Cotton')
                          ),
                          array(
                            'regular_price'=>'830',
                            'price'=>'825',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'XS','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fabric_attr'=>'Silk')
                          ),
                          array(
                            'regular_price'=>'840',
                            'price'=>'835',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'XL','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_fabric_attr'=>'Cotton')
                          ),
                          array(
                            'regular_price'=>'850',
                            'price'=>'845',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'XL','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_fabric_attr'=>'Polyester')
                          ),
                          array(
                            'regular_price'=>'860',
                            'price'=>'865',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'2XL','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_fabric_attr'=>'Polyester')
                          ),
                          array(
                            'regular_price'=>'870',
                            'price'=>'855',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'3XL','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fabric_attr'=>'Polyester')
                          )
                )
        ),                            
        array(
          'title'=>'Top_wear #20000008',
          'thumb'=>$_img_url.'men_shirts.jpg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable', //simple | variable
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_shirts_cat','wbc_top_wear_t-shirts_cat','wbc_top_wear_jackets_cat','wbc_top_wear_suits_cat','wbc_top_wear_sweaters_cat','wbc_top_wear_blazers_coats_cat','wbc_top_wear_hoodies_cat','wbc_top_wear_tops_cat','wbc_top_wear_tunics_cat'),
          'attribute'=>array(
                    'pa_wbc_cloth_size_attr'=>array(
                              'name'=>'pa_wbc_cloth_size_attr',
                              'value'=>'XS|S|M|L|XL|2XL|3XL',
                              'position'=>0,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_colour_attr'=>array(
                              'name'=>'pa_wbc_cloth_colour_attr',
                              'value'=>'White|Black|Red|Blue|Green|Purpal|Orange|Yellow',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                    ),
                    'pa_wbc_cloth_fabric_attr'=>array(
                              'name'=>'pa_wbc_cloth_fabric_attr',
                              'value'=>'Cotton|Silk|Canvas|Chiffon|Damask|Wool|Jersey|Polyester|Velvet|Linen',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                    )
          ),
          'variation'=>array(
                          array(
                            'regular_price'=>'250',
                            'price'=>'245',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'M','pa_wbc_cloth_colour_attr'=>'white','pa_wbc_cloth_fabric_attr'=>'Linen')
                          ),
                          array(
                            'regular_price'=>'260',
                            'price'=>'255',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'L','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fabric_attr'=>'wool')
                          ),
                          array(
                            'regular_price'=>'270',
                            'price'=>'265',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'XL','pa_wbc_cloth_colour_attr'=>'Red','pa_wbc_cloth_fabric_attr'=>'Damask')
                          ),
                          array(
                            'regular_price'=>'280',
                            'price'=>'275',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'XS','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_fabric_attr'=>'Polyester')
                          ),
                          array(
                            'regular_price'=>'200',
                            'price'=>'295',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'S','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_fabric_attr'=>'Jersey')
                          ),
                          array(
                            'regular_price'=>'210',
                            'price'=>'205',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'M','pa_wbc_cloth_colour_attr'=>'Orange','pa_wbc_cloth_fabric_attr'=>'Cotton')
                          ),
                          array(
                            'regular_price'=>'220',
                            'price'=>'215',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'XS','pa_wbc_cloth_colour_attr'=>'Purpal','pa_wbc_cloth_fabric_attr'=>'Linen')
                          ),
                          array(
                            'regular_price'=>'230',
                            'price'=>'225',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'S','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fabric_attr'=>'Silk')
                          ),
                          array(
                            'regular_price'=>'240',
                            'price'=>'235',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'M','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_fabric_attr'=>'Cotton')
                          ),
                          array(
                            'regular_price'=>'350',
                            'price'=>'345',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'M','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_fabric_attr'=>'Polyester')
                          ),
                          array(
                            'regular_price'=>'360',
                            'price'=>'255',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'L','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_fabric_attr'=>'Polyester')
                          ),
                          array(
                            'regular_price'=>'370',
                            'price'=>'365',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'XL','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fabric_attr'=>'Polyester')
                          )
                )
        ),
        array(
          'title'=>'Top_wear #20000009',
          'thumb'=>$_img_url.'women_white_tshirt.jpg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable', //simple | variable
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_shirts_cat','wbc_top_wear_t-shirts_cat','wbc_top_wear_jackets_cat','wbc_top_wear_suits_cat','wbc_top_wear_sweaters_cat','wbc_top_wear_blazers_coats_cat','wbc_top_wear_hoodies_cat','wbc_top_wear_tops_cat','wbc_top_wear_tunics_cat'),
          'attribute'=>array(
                    'pa_wbc_cloth_size_attr'=>array(
                              'name'=>'pa_wbc_cloth_size_attr',
                              'value'=>'XS|S|M|L|XL|2XL|3XL',
                              'position'=>0,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_colour_attr'=>array(
                              'name'=>'pa_wbc_cloth_colour_attr',
                              'value'=>'White|Black|Red|Blue|Green|Purpal|Orange|Yellow',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                    ),
                    'pa_wbc_cloth_fabric_attr'=>array(
                              'name'=>'pa_wbc_cloth_fabric_attr',
                              'value'=>'Cotton|Silk|Canvas|Chiffon|Damask|Wool|Jersey|Polyester|Velvet|Linen',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                    )
           ),
          'variation'=>array(
                          array(
                            'regular_price'=>'450',
                            'price'=>'445',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'M','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fabric_attr'=>'Cotton')
                          ),
                          array(
                            'regular_price'=>'460',
                            'price'=>'455',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'L','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_fabric_attr'=>'Jersey')
                          ),
                          array(
                            'regular_price'=>'470',
                            'price'=>'465',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'XL','pa_wbc_cloth_colour_attr'=>'Green','pa_wbc_cloth_fabric_attr'=>'Silk')
                          ),
                          array(
                            'regular_price'=>'480',
                            'price'=>'475',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'XS','pa_wbc_cloth_colour_attr'=>'Orange','pa_wbc_cloth_fabric_attr'=>'Canvas')
                          ),
                          array(
                            'regular_price'=>'400',
                            'price'=>'495',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'S','pa_wbc_cloth_colour_attr'=>'Yellow','pa_wbc_cloth_fabric_attr'=>'Wool')
                          ),
                          array(
                            'regular_price'=>'410',
                            'price'=>'405',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'M','pa_wbc_cloth_colour_attr'=>'Purpal','pa_wbc_cloth_fabric_attr'=>'Polyester')
                          ),
                          array(
                            'regular_price'=>'420',
                            'price'=>'415',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'XS','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_fabric_attr'=>'Damask')
                          ),
                          array(
                            'regular_price'=>'430',
                            'price'=>'425',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'S','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_fabric_attr'=>'Linen')
                          ),
                          array(
                            'regular_price'=>'440',
                            'price'=>'435',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'M','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_fabric_attr'=>'Polyester')
                          ),
                          array(
                            'regular_price'=>'550',
                            'price'=>'545',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'M','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_fabric_attr'=>'Silk')
                          ),
                          array(
                            'regular_price'=>'560',
                            'price'=>'555',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'L','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_fabric_attr'=>'Cotton')
                          ),
                          array(
                            'regular_price'=>'570',
                            'price'=>'565',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'XL','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_fabric_attr'=>'Linen')
                          )
                )
        ),
        array(
          'title'=>'Top_wear #20000010',
          'thumb'=>$_img_url.'women_white_shirt',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable', //simple | variable
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_shirts_cat','wbc_top_wear_t-shirts_cat','wbc_top_wear_jackets_cat','wbc_top_wear_suits_cat','wbc_top_wear_sweaters_cat','wbc_top_wear_blazers_coats_cat','wbc_top_wear_hoodies_cat','wbc_top_wear_tops_cat','wbc_top_wear_tunics_cat'),
          'attribute'=>array(
                   'pa_wbc_cloth_size_attr'=>array(
                              'name'=>'pa_wbc_cloth_size_attr',
                              'value'=>'XS|S|M|L|XL|2XL|3XL',
                              'position'=>0,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_colour_attr'=>array(
                              'name'=>'pa_wbc_cloth_colour_attr',
                              'value'=>'White|Black|Red|Blue|Green|Purpal|Orange|Yellow',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                    ),
                    'pa_wbc_cloth_fabric_attr'=>array(
                              'name'=>'pa_wbc_cloth_fabric_attr',
                              'value'=>'Cotton|Silk|Canvas|Chiffon|Damask|Wool|Jersey|Polyester|Velvet|Linen',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                    )
            ),
          'variation'=>array(
                          array(
                            'regular_price'=>'550',
                            'price'=>'545',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'S','pa_wbc_cloth_colour_attr'=>'white','pa_wbc_cloth_fabric_attr'=>'Linen')
                          ),
                          array(
                            'regular_price'=>'560',
                            'price'=>'555',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'M','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fabric_attr'=>'Polyester')
                          ),
                          array(
                            'regular_price'=>'570',
                            'price'=>'565',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'L','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_fabric_attr'=>'Polyester')
                          ),
                          array(
                            'regular_price'=>'580',
                            'price'=>'575',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'XL','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fabric_attr'=>'Polyester')
                          ),
                          array(
                            'regular_price'=>'500',
                            'price'=>'595',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'S','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_fabric_attr'=>'Jersey')
                          ),
                          array(
                            'regular_price'=>'510',
                            'price'=>'505',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'M','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_fabric_attr'=>'Linen')
                          ),
                          array(
                            'regular_price'=>'520',
                            'price'=>'515',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'XS','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fabric_attr'=>'Linen')
                          ),
                          array(
                            'regular_price'=>'530',
                            'price'=>'525',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'L','pa_wbc_cloth_colour_attr'=>'Red','pa_wbc_cloth_fabric_attr'=>'Damask')
                          ),
                          array(
                            'regular_price'=>'540',
                            'price'=>'535',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'M','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_fabric_attr'=>'Silk')
                          ),
                          array(
                            'regular_price'=>'650',
                            'price'=>'645',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'S','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_fabric_attr'=>'Polyester')
                          ),
                          array(
                            'regular_price'=>'660',
                            'price'=>'655',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'XL','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_fabric_attr'=>'Polyester')
                          ),
                          array(
                            'regular_price'=>'670',
                            'price'=>'665',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'2XL','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fabric_attr'=>'Polyester')
                          )
                )
        ),

        //Bpttom-wear

        array(
          'title'=>'Bottom_wear #20000011',
          'thumb'=>$_img_url.'black_jeans.jpg',
          'images'=>array('jeans.jpg'),
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable', //simple | variable
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_trousers_cat','wbc_bottom_wear_jeans_cat','wbc_bottom_wear_shorts_cat','wbc_bottom_wear_track_pants_cat','wbc_bottom_wear_plazzos_cat','wbc_bottom_wear_skirts_cat','wbc_bottom_wear_leggings_cat'),
          'attribute'=>array('pa_wbc_cloth_size_attr'=>array(
                              'name'=>'pa_wbc_cloth_size_attr',
                              'value'=>'28|30|32|34|36|38',
                              'position'=>0,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_colour_attr'=>array(
                              'name'=>'pa_wbc_cloth_colour_attr',
                              'value'=>'White|Black|Red|Blue|Green|Purpal|Orange|Yellow',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                    ),
                    'pa_wbc_cloth_fabric_attr'=>array(
                              'name'=>'pa_wbc_cloth_fabric_attr',
                              'value'=>'Cotton|Silk|Canvas|Chiffon|Damask|Wool|Jersey|Polyester|Velvet|Linen',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                    ),
                    'pa_wbc_cloth_occasion_attr'=>array(
                              'name'=>'pa_wbc_cloth_occasion_attr',
                              'value'=>'Causal|Formal|Lounge|Tie|Cocktail Attire|Ethnic',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                    )
            ),
                    
          'variation'=>array(
                          array(
                            'regular_price'=>'250',
                            'price'=>'245',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'28','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fabric_attr'=>'Cotton','pa_wbc_cloth_occasion_attr'=>'Causal')
                          ),
                          array(
                            'regular_price'=>'260',
                            'price'=>'255',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'30','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fabric_attr'=>'wool','pa_wbc_cloth_occasion_attr'=>'Causal')
                          ),
                          array(
                            'regular_price'=>'270',
                            'price'=>'265',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'32','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_fabric_attr'=>'Damask','pa_wbc_cloth_occasion_attr'=>'Formal')
                          ),
                          array(
                            'regular_price'=>'280',
                            'price'=>'275',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'28','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_fabric_attr'=>'Polyester','pa_wbc_cloth_occasion_attr'=>'Causal')
                          ),
                          array(
                            'regular_price'=>'200',
                            'price'=>'295',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'38','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fabric_attr'=>'Linen','pa_wbc_cloth_occasion_attr'=>'Causal')
                          ),
                          array(
                            'regular_price'=>'210',
                            'price'=>'205',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'30','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fabric_attr'=>'Cotton','pa_wbc_cloth_occasion_attr'=>'Formal')
                          ),
                          array(
                            'regular_price'=>'220',
                            'price'=>'215',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'28','pa_wbc_cloth_colour_attr'=>'Purpal','pa_wbc_cloth_fabric_attr'=>'Linen','pa_wbc_cloth_occasion_attr'=>'Causal')
                          ),
                          array(
                            'regular_price'=>'230',
                            'price'=>'225',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'28','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fabric_attr'=>'Silk','pa_wbc_cloth_occasion_attr'=>'Leggings')
                          ),
                          array(
                            'regular_price'=>'240',
                            'price'=>'235',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'32','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_fabric_attr'=>'Linen','pa_wbc_cloth_occasion_attr'=>'Formal')
                          ),
                          array(
                            'regular_price'=>'350',
                            'price'=>'345',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'30','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_fabric_attr'=>'Polyester','pa_wbc_cloth_occasion_attr'=>'Causal')
                          ),
                          array(
                            'regular_price'=>'360',
                            'price'=>'255',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'28','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_fabric_attr'=>'Cotton','pa_wbc_cloth_occasion_attr'=>'Causal')
                          ),
                          array(
                            'regular_price'=>'370',
                            'price'=>'365',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'34','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fabric_attr'=>'Cotton','pa_wbc_cloth_occasion_attr'=>'Formal')
                          )
               )
        ),
        array(
          'title'=>'Bottom_wear #20000012',
          'thumb'=>$_img_url.'formal_black_pant.jpg',
          'images'=>array('formal_black_pant_1.jpg'),
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable', //simple | variable
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_trousers_cat','wbc_bottom_wear_jeans_cat','wbc_bottom_wear_shorts_cat','wbc_bottom_wear_track_pants_cat','wbc_bottom_wear_plazzos_cat','wbc_bottom_wear_skirts_cat','wbc_bottom_wear_leggings_cat'),
          'attribute'=>array(
                   'pa_wbc_cloth_size_attr'=>array(
                              'name'=>'pa_wbc_cloth_size_attr',
                              'value'=>'28|30|32|34|36|38',
                              'position'=>0,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                    ),
                    'pa_wbc_cloth_colour_attr'=>array(
                              'name'=>'pa_wbc_cloth_colour_attr',
                              'value'=>'White|Black|Red|Blue|Green|Purpal|Orange|Yellow',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                    ),
                    'pa_wbc_cloth_fit_attr'=>array(
                              'name'=>'pa_wbc_cloth_fit_attr',
                              'value'=>'Skinny fit|Slim fit|Regular fit|Tapered fit|Hem fit|Ultra slim|Flared|Easy',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                    ),
                    'pa_wbc_cloth_bottom_type_attr'=>array(
                              'name'=>'pa_wbc_cloth_bottom_type_attr',
                              'value'=>'Dhotis|Pants|Leggings|Palazzos|Sharara|Skirts|Culottes',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                    )
           ),
                    
          'variation'=>array(
                          array(
                            'regular_price'=>'550',
                            'price'=>'545',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'28','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fit_attr'=>'Regular fit','pa_wbc_cloth_bottom_type_attr'=>'Pants')
                          ),
                          array(
                            'regular_price'=>'560',
                            'price'=>'555',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'30','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fit_attr'=>'Slim fit','pa_wbc_cloth_bottom_type_attr'=>'Pants')
                          ),
                          array(
                            'regular_price'=>'570',
                            'price'=>'565',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'32','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_fit_attr'=>'Skinny fit','pa_wbc_cloth_bottom_type_attr'=>'Leggings')
                          ),
                          array(
                            'regular_price'=>'580',
                            'price'=>'575',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'28','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_fit_attr'=>'Regular fit','pa_wbc_cloth_bottom_type_attr'=>'Dhotis')
                          ),
                          array(
                            'regular_price'=>'500',
                            'price'=>'595',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'38','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_fit_attr'=>'Regular fit','pa_wbc_cloth_bottom_type_attr'=>'Pants')
                          ),
                          array(
                            'regular_price'=>'510',
                            'price'=>'505',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'30','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fit_attr'=>'Slim fit','pa_wbc_cloth_bottom_type_attr'=>'Sharara')
                          ),
                          array(
                            'regular_price'=>'520',
                            'price'=>'515',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'30','pa_wbc_cloth_colour_attr'=>'Purpal','pa_wbc_cloth_fit_attr'=>'Regular fit','pa_wbc_cloth_bottom_type_attr'=>'culotees')
                          ),
                          array(
                            'regular_price'=>'530',
                            'price'=>'525',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'28','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fit_attr'=>'Flared','pa_wbc_cloth_bottom_type_attr'=>'Skirts')
                          ),
                          array(
                            'regular_price'=>'540',
                            'price'=>'535',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'30','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_fit_attr'=>'Tapered fit','pa_wbc_cloth_bottom_type_attr'=>'Pants')
                          ),
                          array(
                            'regular_price'=>'650',
                            'price'=>'645',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'32','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_fit_attr'=>'Slim fit','pa_wbc_cloth_bottom_type_attr'=>'Pants')
                          ),
                          array(
                            'regular_price'=>'660',
                            'price'=>'655',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'34','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_fit_attr'=>'Skinny fit','pa_wbc_cloth_bottom_type_attr'=>'Pants')
                          ),
                          array(
                            'regular_price'=>'670',
                            'price'=>'665',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'38','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fit_attr'=>'Easy','pa_wbc_cloth_bottom_type_attr'=>'Palazzos')
                          )
                )
        ),
        array(
          'title'=>'Bottom_wear #20000013',
          'thumb'=>$_img_url.'formal_pant.jpg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable', //simple | variable
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_trousers_cat','wbc_bottom_wear_jeans_cat','wbc_bottom_wear_shorts_cat','wbc_bottom_wear_track_pants_cat','wbc_bottom_wear_plazzos_cat','wbc_bottom_wear_skirts_cat','wbc_bottom_wear_leggings_cat'),
          'attribute'=>array('pa_wbc_cloth_size_attr'=>array(
                              'name'=>'pa_wbc_cloth_size_attr',
                              'value'=>'28|30|32|34|36|38',
                              'position'=>0,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_colour_attr'=>array(
                              'name'=>'pa_wbc_cloth_colour_attr',
                              'value'=>'White|Black|Red|Blue|Green|Purpal|Orange|Yellow',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                    ),
                    'pa_wbc_cloth_fit_attr'=>array(
                              'name'=>'pa_wbc_cloth_fit_attr',
                              'value'=>'Skinny fit|Slim fit|Regular fit|Tapered fit|Hem fit|Ultra slim|Flared|Easy',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                    ),
                    'pa_wbc_cloth_bottom_type_attr'=>array(
                              'name'=>'pa_wbc_cloth_bottom_type_attr',
                              'value'=>'Dhotis|Pants|Leggings|Palazzos|Sharara|Skirts|Culottes',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            )
            ),
                    
          'variation'=>array(
                          array(
                            'regular_price'=>'550',
                            'price'=>'545',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'30','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fit_attr'=>'Regular fit','pa_wbc_cloth_bottom_type_attr'=>'Pants')
                          ),
                          array(
                            'regular_price'=>'560',
                            'price'=>'555',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'32','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fit_attr'=>'Slim fit','pa_wbc_cloth_bottom_type_attr'=>'Pants')
                          ),
                          array(
                            'regular_price'=>'570',
                            'price'=>'565',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'34','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_fit_attr'=>'Regular fit','pa_wbc_cloth_bottom_type_attr'=>'Pants')
                          ),
                          array(
                            'regular_price'=>'580',
                            'price'=>'575',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'36','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_fit_attr'=>'Regular fit','pa_wbc_cloth_bottom_type_attr'=>'Pants')
                          ),
                          array(
                            'regular_price'=>'500',
                            'price'=>'595',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'38','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_fit_attr'=>'Regular fit','pa_wbc_cloth_bottom_type_attr'=>'Pants')
                          ),
                          array(
                            'regular_price'=>'510',
                            'price'=>'505',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'30','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fit_attr'=>'Slim fit','pa_wbc_cloth_bottom_type_attr'=>'Pants')
                          ),
                          array(
                            'regular_price'=>'520',
                            'price'=>'515',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'32','pa_wbc_cloth_colour_attr'=>'Purpal','pa_wbc_cloth_fit_attr'=>'Regular fit','pa_wbc_cloth_bottom_type_attr'=>'Pants')
                          ),
                          array(
                            'regular_price'=>'530',
                            'price'=>'525',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'28','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fit_attr'=>'Flared','pa_wbc_cloth_bottom_type_attr'=>'Pants')
                          ),
                          array(
                            'regular_price'=>'540',
                            'price'=>'535',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'34','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_fit_attr'=>'Tapered fit','pa_wbc_cloth_bottom_type_attr'=>'Pants')
                          ),
                          array(
                            'regular_price'=>'650',
                            'price'=>'645',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'36','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_fit_attr'=>'Slim fit','pa_wbc_cloth_bottom_type_attr'=>'Pants')
                          ),
                          array(
                            'regular_price'=>'660',
                            'price'=>'655',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'30','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_fit_attr'=>'Skinny fit','pa_wbc_cloth_bottom_type_attr'=>'Pants')
                          ),
                          array(
                            'regular_price'=>'670',
                            'price'=>'665',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'38','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fit_attr'=>'Regular fit','pa_wbc_cloth_bottom_type_attr'=>'Pants')
                          )
                )
        ),
        array(
          'title'=>'Bottom_wear #20000014',
          'thumb'=>$_img_url.'leggings.jpg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable', //simple | variable
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_trousers_cat','wbc_bottom_wear_jeans_cat','wbc_bottom_wear_shorts_cat','wbc_bottom_wear_track_pants_cat','wbc_bottom_wear_plazzos_cat','wbc_bottom_wear_skirts_cat','wbc_bottom_wear_leggings_cat'),
          'attribute'=>array('pa_wbc_cloth_size_attr'=>array(
                              'name'=>'pa_wbc_cloth_size_attr',
                              'value'=>'28|30|32|34|36|38',
                              'position'=>0,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_colour_attr'=>array(
                              'name'=>'pa_wbc_cloth_colour_attr',
                              'value'=>'White|Black|Red|Blue|Green|Purpal|Orange|Yellow',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                    ),
                    'pa_wbc_cloth_fit_attr'=>array(
                              'name'=>'pa_wbc_cloth_fit_attr',
                              'value'=>'Skinny fit|Slim fit|Regular fit|Tapered fit|Hem fit|Ultra slim|Flared|Easy',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                    ),
                    'pa_wbc_cloth_bottom_type_attr'=>array(
                              'name'=>'pa_wbc_cloth_bottom_type_attr',
                              'value'=>'Dhotis|Pants|Leggings|Palazzos|Sharara|Skirts|Culottes',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                    )
            ),
                    
          'variation'=>array(
                          array(
                            'regular_price'=>'950',
                            'price'=>'945',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'28','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fit_attr'=>'Hem fit','pa_wbc_cloth_bottom_type_attr'=>'Dhotis')
                          ),
                          array(
                            'regular_price'=>'960',
                            'price'=>'955',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'28','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fit_attr'=>'Slim fit','pa_wbc_cloth_bottom_type_attr'=>'Sharara')
                          ),
                          array(
                            'regular_price'=>'570',
                            'price'=>'965',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'30','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_fit_attr'=>'Skinny fit','pa_wbc_cloth_bottom_type_attr'=>'Leggings')
                          ),
                          array(
                            'regular_price'=>'980',
                            'price'=>'975',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'30','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_fit_attr'=>'Regular fit','pa_wbc_cloth_bottom_type_attr'=>'Dhotis')
                          ),
                          array(
                            'regular_price'=>'900',
                            'price'=>'995',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'32','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_fit_attr'=>'Tapered fit','pa_wbc_cloth_bottom_type_attr'=>'Pants')
                          ),
                          array(
                            'regular_price'=>'910',
                            'price'=>'905',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'36','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fit_attr'=>'Ultra Slim','pa_wbc_cloth_bottom_type_attr'=>'Sharara')
                          ),
                          array(
                            'regular_price'=>'920',
                            'price'=>'915',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'34','pa_wbc_cloth_colour_attr'=>'Purpal','pa_wbc_cloth_fit_attr'=>'Flared','pa_wbc_cloth_bottom_type_attr'=>'culotees')
                          ),
                          array(
                            'regular_price'=>'930',
                            'price'=>'925',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'28','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fit_attr'=>'Easy','pa_wbc_cloth_bottom_type_attr'=>'Skirts')
                          ),
                          array(
                            'regular_price'=>'940',
                            'price'=>'935',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'30','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_fit_attr'=>'Tapered fit','pa_wbc_cloth_bottom_type_attr'=>'Pants')
                          ),
                          array(
                            'regular_price'=>'1050',
                            'price'=>'1045',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'32','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_fit_attr'=>'Regular fit','pa_wbc_cloth_bottom_type_attr'=>'Culottes')
                          ),
                          array(
                            'regular_price'=>'1060',
                            'price'=>'1055',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'34','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_fit_attr'=>'Skinny fit','pa_wbc_cloth_bottom_type_attr'=>'Leggings')
                          ),
                          array(
                            'regular_price'=>'1070',
                            'price'=>'1065',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'38','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fit_attr'=>'Easy','pa_wbc_cloth_bottom_type_attr'=>'Palazzos')
                          )
                )
        ),
        array(
          'title'=>'Bottom_wear #20000014',
          'thumb'=>$_img_url.'men_track.jpg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable', //simple | variable
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_trousers_cat','wbc_bottom_wear_jeans_cat','wbc_bottom_wear_shorts_cat','wbc_bottom_wear_track_pants_cat','wbc_bottom_wear_plazzos_cat','wbc_bottom_wear_skirts_cat','wbc_bottom_wear_leggings_cat'),
          'attribute'=>array('pa_wbc_cloth_size_attr'=>array(
                              'name'=>'pa_wbc_cloth_size_attr',
                              'value'=>'28|30|32|34|36|38',
                              'position'=>0,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_colour_attr'=>array(
                              'name'=>'pa_wbc_cloth_colour_attr',
                              'value'=>'White|Black|Red|Blue|Green|Purpal|Orange|Yellow',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                    ),
                    'pa_wbc_cloth_fit_attr'=>array(
                              'name'=>'pa_wbc_cloth_fit_attr',
                              'value'=>'Skinny fit|Slim fit|Regular fit|Tapered fit|Hem fit|Ultra slim|Flared|Easy',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                    ),
                    'pa_wbc_cloth_bottom_type_attr'=>array(
                              'name'=>'pa_wbc_cloth_bottom_type_attr',
                              'value'=>'Dhotis|Pants|Leggings|Palazzos|Sharara|Skirts|Culottes',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                    )
            ),
                    
          'variation'=>array(
                          array(
                            'regular_price'=>'850',
                            'price'=>'845',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'30','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fit_attr'=>'Hem fit','pa_wbc_cloth_bottom_type_attr'=>'Dhotis')
                          ),
                          array(
                            'regular_price'=>'860',
                            'price'=>'855',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'32','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_fit_attr'=>'Slim fit','pa_wbc_cloth_bottom_type_attr'=>'Sharara')
                          ),
                          array(
                            'regular_price'=>'870',
                            'price'=>'865',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'34','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_fit_attr'=>'Skinny fit','pa_wbc_cloth_bottom_type_attr'=>'Leggings')
                          ),
                          array(
                            'regular_price'=>'880',
                            'price'=>'875',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'36','pa_wbc_cloth_colour_attr'=>'Yellow','pa_wbc_cloth_fit_attr'=>'Regular fit','pa_wbc_cloth_bottom_type_attr'=>'Dhotis')
                          ),
                          array(
                            'regular_price'=>'800',
                            'price'=>'895',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'38','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_fit_attr'=>'Tapered fit','pa_wbc_cloth_bottom_type_attr'=>'Pants')
                          ),
                          array(
                            'regular_price'=>'810',
                            'price'=>'805',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'30','pa_wbc_cloth_colour_attr'=>'Purple','pa_wbc_cloth_fit_attr'=>'Ultra Slim','pa_wbc_cloth_bottom_type_attr'=>'Sharara')
                          ),
                          array(
                            'regular_price'=>'820',
                            'price'=>'815',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'32','pa_wbc_cloth_colour_attr'=>'Red','pa_wbc_cloth_fit_attr'=>'Flared','pa_wbc_cloth_bottom_type_attr'=>'culotees')
                          ),
                          array(
                            'regular_price'=>'830',
                            'price'=>'825',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'30','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_fit_attr'=>'Easy','pa_wbc_cloth_bottom_type_attr'=>'Skirts')
                          ),
                          array(
                            'regular_price'=>'840',
                            'price'=>'835',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'28','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fit_attr'=>'Tapered fit','pa_wbc_cloth_bottom_type_attr'=>'Pants')
                          ),
                          array(
                            'regular_price'=>'950',
                            'price'=>'945',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'32','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_fit_attr'=>'Regular fit','pa_wbc_cloth_bottom_type_attr'=>'Culottes')
                          ),
                          array(
                            'regular_price'=>'960',
                            'price'=>'955',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'32','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fit_attr'=>'Skinny fit','pa_wbc_cloth_bottom_type_attr'=>'Leggings')
                          ),
                          array(
                            'regular_price'=>'970',
                            'price'=>'965',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'30','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fit_attr'=>'Easy','pa_wbc_cloth_bottom_type_attr'=>'Palazzos')
                          )
                )
        ),
        array(
          'title'=>'Bottom_wear #20000015',
          'thumb'=>$_img_url.'palazzos.jpg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable', //simple | variable
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_trousers_cat','wbc_bottom_wear_jeans_cat','wbc_bottom_wear_shorts_cat','wbc_bottom_wear_track_pants_cat','wbc_bottom_wear_plazzos_cat','wbc_bottom_wear_skirts_cat','wbc_bottom_wear_leggings_cat'),
          'attribute'=>array('pa_wbc_cloth_size_attr'=>array(
                              'name'=>'pa_wbc_cloth_size_attr',
                              'value'=>'28|30|32|34|36|38',
                              'position'=>0,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_colour_attr'=>array(
                              'name'=>'pa_wbc_cloth_colour_attr',
                              'value'=>'White|Black|Red|Blue|Green|Purpal|Orange|Yellow',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                    ),
                    'pa_wbc_cloth_fit_attr'=>array(
                              'name'=>'pa_wbc_cloth_fit_attr',
                              'value'=>'Skinny fit|Slim fit|Regular fit|Tapered fit|Hem fit|Ultra slim|Flared|Easy',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                    ),
                    'pa_wbc_cloth_bottom_type_attr'=>array(
                              'name'=>'pa_wbc_cloth_bottom_type_attr',
                              'value'=>'Dhotis|Pants|Leggings|Palazzos|Sharara|Skirts|Culottes',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                    )
            ),
                    
          'variation'=>array(
                          array(
                            'regular_price'=>'850',
                            'price'=>'845',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'28','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fit_attr'=>'Hem fit','pa_wbc_cloth_bottom_type_attr'=>'Dhotis')
                          ),
                          array(
                            'regular_price'=>'860',
                            'price'=>'855',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'28','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fit_attr'=>'Slim fit','pa_wbc_cloth_bottom_type_attr'=>'Sharara')
                          ),
                          array(
                            'regular_price'=>'870',
                            'price'=>'865',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'30','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_fit_attr'=>'Skinny fit','pa_wbc_cloth_bottom_type_attr'=>'Leggings')
                          ),
                          array(
                            'regular_price'=>'880',
                            'price'=>'875',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'30','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_fit_attr'=>'Tapered fit','pa_wbc_cloth_bottom_type_attr'=>'Dhotis')
                          ),
                          array(
                            'regular_price'=>'800',
                            'price'=>'895',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'32','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_fit_attr'=>'Tapered fit','pa_wbc_cloth_bottom_type_attr'=>'Pants')
                          ),
                          array(
                            'regular_price'=>'810',
                            'price'=>'805',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'30','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fit_attr'=>'Ultra Slim','pa_wbc_cloth_bottom_type_attr'=>'Leggings')
                          ),
                          array(
                            'regular_price'=>'820',
                            'price'=>'815',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'32','pa_wbc_cloth_colour_attr'=>'Red','pa_wbc_cloth_fit_attr'=>'Flared','pa_wbc_cloth_bottom_type_attr'=>'Skirts')
                          ),
                          array(
                            'regular_price'=>'830',
                            'price'=>'825',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'28','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fit_attr'=>'Easy','pa_wbc_cloth_bottom_type_attr'=>'culotees')
                          ),
                          array(
                            'regular_price'=>'840',
                            'price'=>'835',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'28','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_fit_attr'=>'Tapered fit','pa_wbc_cloth_bottom_type_attr'=>'Pants')
                          ),
                          array(
                            'regular_price'=>'950',
                            'price'=>'945',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'30','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_fit_attr'=>'Tapered fit','pa_wbc_cloth_bottom_type_attr'=>'Sharara')
                          ),
                          array(
                            'regular_price'=>'960',
                            'price'=>'955',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'28','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_fit_attr'=>'Regular fit','pa_wbc_cloth_bottom_type_attr'=>'Pants')
                          ),
                          array(
                            'regular_price'=>'970',
                            'price'=>'965',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'30','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fit_attr'=>'Regular fit','pa_wbc_cloth_bottom_type_attr'=>'Pants')
                          )
                )
        ),
        array(
          'title'=>'Bottom_wear #20000016',
          'thumb'=>$_img_url.'pant.jpg',
          'images'=>array('palazzos.jpg'),
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable', //simple | variable
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_trousers_cat','wbc_bottom_wear_jeans_cat','wbc_bottom_wear_shorts_cat','wbc_bottom_wear_track_pants_cat','wbc_bottom_wear_plazzos_cat','wbc_bottom_wear_skirts_cat','wbc_bottom_wear_leggings_cat'),
          'attribute'=>array('pa_wbc_cloth_size_attr'=>array(
                              'name'=>'pa_wbc_cloth_size_attr',
                              'value'=>'28|30|32|34|36|38',
                              'position'=>0,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_colour_attr'=>array(
                              'name'=>'pa_wbc_cloth_colour_attr',
                              'value'=>'White|Black|Red|Blue|Green|Purpal|Orange|Yellow',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                    ),
                    'pa_wbc_cloth_fabric_attr'=>array(
                              'name'=>'pa_wbc_cloth_fabric_attr',
                              'value'=>'Cotton|Silk|Canvas|Chiffon|Damask|Wool|Jersey|Polyester|Velvet|Linen',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                    ),
                    'pa_wbc_cloth_occasion_attr'=>array(
                              'name'=>'pa_wbc_cloth_occasion_attr',
                              'value'=>'Causal|Formal|Lounge|Tie|Cocktail Attire|Ethnic',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                    )
            ),
                    
          'variation'=>array(
                          array(
                            'regular_price'=>'750',
                            'price'=>'745',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'30','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_fabric_attr'=>'Cotton','pa_wbc_cloth_occasion_attr'=>'Causal')
                          ),
                          array(
                            'regular_price'=>'760',
                            'price'=>'755',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'28','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_fabric_attr'=>'wool','pa_wbc_cloth_occasion_attr'=>'Causal')
                          ),
                          array(
                            'regular_price'=>'770',
                            'price'=>'765',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'34','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fabric_attr'=>'Damask','pa_wbc_cloth_occasion_attr'=>'Formal')
                          ),
                          array(
                            'regular_price'=>'780',
                            'price'=>'775',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'36','pa_wbc_cloth_colour_attr'=>'Purpal','pa_wbc_cloth_fabric_attr'=>'Polyester','pa_wbc_cloth_occasion_attr'=>'Causal')
                          ),
                          array(
                            'regular_price'=>'700',
                            'price'=>'795',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'34','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_fabric_attr'=>'Linen','pa_wbc_cloth_occasion_attr'=>'Causal')
                          ),
                          array(
                            'regular_price'=>'710',
                            'price'=>'705',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'32','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fabric_attr'=>'Cotton','pa_wbc_cloth_occasion_attr'=>'Formal')
                          ),
                          array(
                            'regular_price'=>'720',
                            'price'=>'715',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'30','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_fabric_attr'=>'Linen','pa_wbc_cloth_occasion_attr'=>'Causal')
                          ),
                          array(
                            'regular_price'=>'730',
                            'price'=>'725',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'38','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fabric_attr'=>'Silk','pa_wbc_cloth_occasion_attr'=>'Leggings')
                          ),
                          array(
                            'regular_price'=>'740',
                            'price'=>'735',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'30','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fabric_attr'=>'Linen','pa_wbc_cloth_occasion_attr'=>'Formal')
                          ),
                          array(
                            'regular_price'=>'850',
                            'price'=>'845',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'28','pa_wbc_cloth_colour_attr'=>'Red','pa_wbc_cloth_fabric_attr'=>'Polyester','pa_wbc_cloth_occasion_attr'=>'Causal')
                          ),
                          array(
                            'regular_price'=>'860',
                            'price'=>'855',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'38','pa_wbc_cloth_colour_attr'=>'Orange','pa_wbc_cloth_fabric_attr'=>'Cotton','pa_wbc_cloth_occasion_attr'=>'Causal')
                          ),
                          array(
                            'regular_price'=>'870',
                            'price'=>'865',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'30','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fabric_attr'=>'Cotton','pa_wbc_cloth_occasion_attr'=>'Formal')
                          )
                )
        ),
        array(
          'title'=>'Bottom_wear #20000017',
          'thumb'=>$_img_url.'women_palazzos.jpg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable', //simple | variable
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_trousers_cat','wbc_bottom_wear_jeans_cat','wbc_bottom_wear_shorts_cat','wbc_bottom_wear_track_pants_cat','wbc_bottom_wear_plazzos_cat','wbc_bottom_wear_skirts_cat','wbc_bottom_wear_leggings_cat'),
          'attribute'=>array('pa_wbc_cloth_size_attr'=>array(
                              'name'=>'pa_wbc_cloth_size_attr',
                              'value'=>'28|30|32|34|36|38',
                              'position'=>0,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_colour_attr'=>array(
                              'name'=>'pa_wbc_cloth_colour_attr',
                              'value'=>'White|Black|Red|Blue|Green|Purpal|Orange|Yellow',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                    ),
                    'pa_wbc_cloth_fit_attr'=>array(
                              'name'=>'pa_wbc_cloth_fit_attr',
                              'value'=>'Skinny fit|Slim fit|Regular fit|Tapered fit|Hem fit|Ultra slim|Flared|Easy',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                    ),
                    'pa_wbc_cloth_bottom_type_attr'=>array(
                              'name'=>'pa_wbc_cloth_bottom_type_attr',
                              'value'=>'Dhotis|Pants|Leggings|Palazzos|Sharara|Skirts|Culottes',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                    )
            ),
                    
          'variation'=>array(
                          array(
                            'regular_price'=>'750',
                            'price'=>'745',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'28','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_fit_attr'=>'Slim fit','pa_wbc_cloth_bottom_type_attr'=>'Pants')
                          ),
                          array(
                            'regular_price'=>'760',
                            'price'=>'755',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'30','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fit_attr'=>'Slim fit','pa_wbc_cloth_bottom_type_attr'=>'Pants')
                          ),
                          array(
                            'regular_price'=>'770',
                            'price'=>'765',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'32','pa_wbc_cloth_colour_attr'=>'Purpal','pa_wbc_cloth_fit_attr'=>'Skinny fit','pa_wbc_cloth_bottom_type_attr'=>'Leggings')
                          ),
                          array(
                            'regular_price'=>'780',
                            'price'=>'775',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'28','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_fit_attr'=>'Slim fit','pa_wbc_cloth_bottom_type_attr'=>'Dhotis')
                          ),
                          array(
                            'regular_price'=>'700',
                            'price'=>'795',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'38','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fit_attr'=>'Tapered fit','pa_wbc_cloth_bottom_type_attr'=>'Pants')
                          ),
                          array(
                            'regular_price'=>'710',
                            'price'=>'705',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'30','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fit_attr'=>'Ultra fit','pa_wbc_cloth_bottom_type_attr'=>'Sharara')
                          ),
                          array(
                            'regular_price'=>'720',
                            'price'=>'715',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'30','pa_wbc_cloth_colour_attr'=>'Green','pa_wbc_cloth_fit_attr'=>'Easy','pa_wbc_cloth_bottom_type_attr'=>'culotees')
                          ),
                          array(
                            'regular_price'=>'730',
                            'price'=>'725',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'28','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_fit_attr'=>'Flared','pa_wbc_cloth_bottom_type_attr'=>'Pants')
                          ),
                          array(
                            'regular_price'=>'740',
                            'price'=>'735',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'30','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fit_attr'=>'Tapered fit','pa_wbc_cloth_bottom_type_attr'=>'culotees')
                          ),
                          array(
                            'regular_price'=>'650',
                            'price'=>'645',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'32','pa_wbc_cloth_colour_attr'=>'Green','pa_wbc_cloth_fit_attr'=>'Slim fit','pa_wbc_cloth_bottom_type_attr'=>'leggings')
                          ),
                          array(
                            'regular_price'=>'600',
                            'price'=>'655',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'34','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fit_attr'=>'Skinny fit','pa_wbc_cloth_bottom_type_attr'=>'Pants')
                          ),
                          array(
                            'regular_price'=>'670',
                            'price'=>'665',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'38','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_fit_attr'=>'Easy','pa_wbc_cloth_bottom_type_attr'=>'Dhotis')
                          )
                )
        ),
        array(
          'title'=>'Bottom_wear #20000018',
          'thumb'=>$_img_url.'women_blue_jens.jpg',
          'images'=>array('Ring-round-2.jpg','Ring-round-3.jpg'),
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable', //simple | variable
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_trousers_cat','wbc_bottom_wear_jeans_cat','wbc_bottom_wear_shorts_cat','wbc_bottom_wear_track_pants_cat','wbc_bottom_wear_plazzos_cat','wbc_bottom_wear_skirts_cat','wbc_bottom_wear_leggings_cat'),
          'attribute'=>array('pa_wbc_cloth_size_attr'=>array(
                              'name'=>'pa_wbc_cloth_size_attr',
                              'value'=>'28|30|32|34|36|38',
                              'position'=>0,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_colour_attr'=>array(
                              'name'=>'pa_wbc_cloth_colour_attr',
                              'value'=>'White|Black|Red|Blue|Green|Purpal|Orange|Yellow',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                    ),
                    'pa_wbc_cloth_fit_attr'=>array(
                              'name'=>'pa_wbc_cloth_fit_attr',
                              'value'=>'Skinny fit|Slim fit|Regular fit|Tapered fit|Hem fit|Ultra slim|Flared|Easy',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                    ),
                    'pa_wbc_cloth_bottom_type_attr'=>array(
                              'name'=>'pa_wbc_cloth_bottom_type_attr',
                              'value'=>'Dhotis|Pants|Leggings|Palazzos|Sharara|Skirts|Culottes',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                    )
           ),
                    
          'variation'=>array(
                          array(
                            'regular_price'=>'1550',
                            'price'=>'1545',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'30','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fit_attr'=>'Regular fit','pa_wbc_cloth_bottom_type_attr'=>'Pants')
                          ),
                          array(
                            'regular_price'=>'1560',
                            'price'=>'1555',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'32','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fit_attr'=>'Slim fit','pa_wbc_cloth_bottom_type_attr'=>'Pants')
                          ),
                          array(
                            'regular_price'=>'1570',
                            'price'=>'1565',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'34','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_fit_attr'=>'Regular fit','pa_wbc_cloth_bottom_type_attr'=>'Pants')
                          ),
                          array(
                            'regular_price'=>'1580',
                            'price'=>'1575',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'36','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_fit_attr'=>'Regular fit','pa_wbc_cloth_bottom_type_attr'=>'Pants')
                          ),
                          array(
                            'regular_price'=>'1500',
                            'price'=>'1595',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'38','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_fit_attr'=>'Regular fit','pa_wbc_cloth_bottom_type_attr'=>'Pants')
                          ),
                          array(
                            'regular_price'=>'1510',
                            'price'=>'1505',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'30','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fit_attr'=>'Slim fit','pa_wbc_cloth_bottom_type_attr'=>'Pants')
                          ),
                          array(
                            'regular_price'=>'1520',
                            'price'=>'1515',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'32','pa_wbc_cloth_colour_attr'=>'Purpal','pa_wbc_cloth_fit_attr'=>'Regular fit','pa_wbc_cloth_bottom_type_attr'=>'Pants')
                          ),
                          array(
                            'regular_price'=>'1530',
                            'price'=>'1525',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'28','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fit_attr'=>'Flared','pa_wbc_cloth_bottom_type_attr'=>'Pants')
                          ),
                          array(
                            'regular_price'=>'1540',
                            'price'=>'1535',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'34','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_fit_attr'=>'Tapered fit','pa_wbc_cloth_bottom_type_attr'=>'Pants')
                          ),
                          array(
                            'regular_price'=>'1650',
                            'price'=>'1645',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'36','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_fit_attr'=>'Slim fit','pa_wbc_cloth_bottom_type_attr'=>'Pants')
                          ),
                          array(
                            'regular_price'=>'1660',
                            'price'=>'1655',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'30','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_fit_attr'=>'Skinny fit','pa_wbc_cloth_bottom_type_attr'=>'Pants')
                          ),
                          array(
                            'regular_price'=>'1670',
                            'price'=>'1665',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'38','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fit_attr'=>'Regular fit','pa_wbc_cloth_bottom_type_attr'=>'Pants')
                          )
                )
        ),
        array(
          'title'=>'Bottom_wear #20000019',
          'thumb'=>$_img_url.'women_black_pant',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable', //simple | variable
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_trousers_cat','wbc_bottom_wear_jeans_cat','wbc_bottom_wear_shorts_cat','wbc_bottom_wear_track_pants_cat','wbc_bottom_wear_plazzos_cat','wbc_bottom_wear_skirts_cat','wbc_bottom_wear_leggings_cat'),
          'attribute'=>array('pa_wbc_cloth_size_attr'=>array(
                              'name'=>'pa_wbc_cloth_size_attr',
                              'value'=>'28|30|32|34|36|38',
                              'position'=>0,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_colour_attr'=>array(
                              'name'=>'pa_wbc_cloth_colour_attr',
                              'value'=>'White|Black|Red|Blue|Green|Purpal|Orange|Yellow',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                    ),
                    'pa_wbc_cloth_fit_attr'=>array(
                              'name'=>'pa_wbc_cloth_fit_attr',
                              'value'=>'Skinny fit|Slim fit|Regular fit|Tapered fit|Hem fit|Ultra slim|Flared|Easy',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                    ),
                    'pa_wbc_cloth_bottom_type_attr'=>array(
                              'name'=>'pa_wbc_cloth_bottom_type_attr',
                              'value'=>'Dhotis|Pants|Leggings|Palazzos|Sharara|Skirts|Culottes',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                    )
            ),
                    
          'variation'=>array(
                          array(
                            'regular_price'=>'950',
                            'price'=>'945',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'30','pa_wbc_cloth_colour_attr'=>'Orange','pa_wbc_cloth_fit_attr'=>'Hem fit','pa_wbc_cloth_bottom_type_attr'=>'Dhotis')
                          ),
                          array(
                            'regular_price'=>'960',
                            'price'=>'955',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'38','pa_wbc_cloth_colour_attr'=>'Purple','pa_wbc_cloth_fit_attr'=>'Slim fit','pa_wbc_cloth_bottom_type_attr'=>'Sharara')
                          ),
                          array(
                            'regular_price'=>'570',
                            'price'=>'965',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'32','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fit_attr'=>'Skinny fit','pa_wbc_cloth_bottom_type_attr'=>'Leggings')
                          ),
                          array(
                            'regular_price'=>'980',
                            'price'=>'975',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'28','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_fit_attr'=>'Regular fit','pa_wbc_cloth_bottom_type_attr'=>'Dhotis')
                          ),
                          array(
                            'regular_price'=>'900',
                            'price'=>'995',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'30','pa_wbc_cloth_colour_attr'=>'Red','pa_wbc_cloth_fit_attr'=>'Tapered fit','pa_wbc_cloth_bottom_type_attr'=>'Pants')
                          ),
                          array(
                            'regular_price'=>'910',
                            'price'=>'905',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'34','pa_wbc_cloth_colour_attr'=>'Green','pa_wbc_cloth_fit_attr'=>'Ultra Slim','pa_wbc_cloth_bottom_type_attr'=>'Sharara')
                          ),
                          array(
                            'regular_price'=>'920',
                            'price'=>'915',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'36','pa_wbc_cloth_colour_attr'=>'Yellow','pa_wbc_cloth_fit_attr'=>'Flared','pa_wbc_cloth_bottom_type_attr'=>'culotees')
                          ),
                          array(
                            'regular_price'=>'930',
                            'price'=>'925',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'30','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_fit_attr'=>'Easy','pa_wbc_cloth_bottom_type_attr'=>'Skirts')
                          ),
                          array(
                            'regular_price'=>'940',
                            'price'=>'935',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'28','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fit_attr'=>'Tapered fit','pa_wbc_cloth_bottom_type_attr'=>'Pants')
                          ),
                          array(
                            'regular_price'=>'1050',
                            'price'=>'1045',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'30','pa_wbc_cloth_colour_attr'=>'Purpal','pa_wbc_cloth_fit_attr'=>'Regular fit','pa_wbc_cloth_bottom_type_attr'=>'Culottes')
                          ),
                          array(
                            'regular_price'=>'1060',
                            'price'=>'1055',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'32','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fit_attr'=>'Skinny fit','pa_wbc_cloth_bottom_type_attr'=>'Leggings')
                          ),
                          array(
                            'regular_price'=>'1070',
                            'price'=>'1065',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'28','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_fit_attr'=>'Easy','pa_wbc_cloth_bottom_type_attr'=>'Palazzos')
                          )
                )
        ),
        array(
          'title'=>'Bottom_wear #20000020',
          'thumb'=>$_img_url.'women_white_pant.jpg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable', //simple | variable
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_trousers_cat','wbc_bottom_wear_jeans_cat','wbc_bottom_wear_shorts_cat','wbc_bottom_wear_track_pants_cat','wbc_bottom_wear_plazzos_cat','wbc_bottom_wear_skirts_cat','wbc_bottom_wear_leggings_cat'),
          'attribute'=>array('pa_wbc_cloth_size_attr'=>array(
                              'name'=>'pa_wbc_cloth_size_attr',
                              'value'=>'28|30|32|34|36|38',
                              'position'=>0,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_colour_attr'=>array(
                              'name'=>'pa_wbc_cloth_colour_attr',
                              'value'=>'White|Black|Red|Blue|Green|Purpal|Orange|Yellow',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                    ),
                    'pa_wbc_cloth_fit_attr'=>array(
                              'name'=>'pa_wbc_cloth_fit_attr',
                              'value'=>'Skinny fit|Slim fit|Regular fit|Tapered fit|Hem fit|Ultra slim|Flared|Easy',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                    ),
                    'pa_wbc_cloth_bottom_type_attr'=>array(
                              'name'=>'pa_wbc_cloth_bottom_type_attr',
                              'value'=>'Dhotis|Pants|Leggings|Palazzos|Sharara|Skirts|Culottes',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                    )
            ),
                    
          'variation'=>array(
                          array(
                            'regular_price'=>'1850',
                            'price'=>'1845',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'32','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fit_attr'=>'Hem fit','pa_wbc_cloth_bottom_type_attr'=>'Dhotis')
                          ),
                          array(
                            'regular_price'=>'1860',
                            'price'=>'1855',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'34','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_fit_attr'=>'Slim fit','pa_wbc_cloth_bottom_type_attr'=>'Sharara')
                          ),
                          array(
                            'regular_price'=>'1870',
                            'price'=>'1865',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'36','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_fit_attr'=>'Skinny fit','pa_wbc_cloth_bottom_type_attr'=>'Leggings')
                          ),
                          array(
                            'regular_price'=>'1880',
                            'price'=>'1875',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'38','pa_wbc_cloth_colour_attr'=>'Yellow','pa_wbc_cloth_fit_attr'=>'Regular fit','pa_wbc_cloth_bottom_type_attr'=>'Dhotis')
                          ),
                          array(
                            'regular_price'=>'1800',
                            'price'=>'1895',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'30','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_fit_attr'=>'Tapered fit','pa_wbc_cloth_bottom_type_attr'=>'Pants')
                          ),
                          array(
                            'regular_price'=>'1810',
                            'price'=>'1805',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'33','pa_wbc_cloth_colour_attr'=>'Purple','pa_wbc_cloth_fit_attr'=>'Ultra Slim','pa_wbc_cloth_bottom_type_attr'=>'Sharara')
                          ),
                          array(
                            'regular_price'=>'1820',
                            'price'=>'1815',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'34','pa_wbc_cloth_colour_attr'=>'Red','pa_wbc_cloth_fit_attr'=>'Flared','pa_wbc_cloth_bottom_type_attr'=>'culotees')
                          ),
                          array(
                            'regular_price'=>'1830',
                            'price'=>'1825',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'32','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_fit_attr'=>'Easy','pa_wbc_cloth_bottom_type_attr'=>'Skirts')
                          ),
                          array(
                            'regular_price'=>'1840',
                            'price'=>'1835',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'38','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fit_attr'=>'Tapered fit','pa_wbc_cloth_bottom_type_attr'=>'Pants')
                          ),
                          array(
                            'regular_price'=>'1950',
                            'price'=>'1945',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'36','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_fit_attr'=>'Regular fit','pa_wbc_cloth_bottom_type_attr'=>'Culottes')
                          ),
                          array(
                            'regular_price'=>'1960',
                            'price'=>'1955',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'30','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fit_attr'=>'Skinny fit','pa_wbc_cloth_bottom_type_attr'=>'Leggings')
                          ),
                          array(
                            'regular_price'=>'1970',
                            'price'=>'1965',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'28','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_fit_attr'=>'Easy','pa_wbc_cloth_bottom_type_attr'=>'Palazzos')
                          )
                )
        )
    );  
    }

    public function set_configs_after_categories($catat_category) {

        // set dynamic variables here for the parent class 

        // and then call parent function 
        parent::set_configs_after_categories($catat_category);
    }

    public function set_configs_after_attributes() {

        // do if any override is required 

        // and then call parent function 
        parent::set_configs_after_attributes();
    }

}

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
                        'terms' => array('White','Black','Red','Purpal', 'Blue', 'Green','Yellow','Orange','Gray','Pink'),
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
                        'terms' => array('Plain','Stripes','Checks', 'Plaid', 'Floral','Polka Dots','Printed','Detailing'),        
                        'description' => 'Pattern attributes for clothings wear',
                        'slug' => 'wbc_cloth_pattern_attr'
                    ),
                    array(
                        'label' => 'Sleeve',
                        'terms' => array('Long sleeve', 'Short sleeve', 'Roll-up sleeve','Sleeveless'),        
                        'description' => 'Sleeve attributes for clothings wear',
                        'slug' => 'wbc_cloth_sleeve_attr'
                    ),
                    array(
                        'label' => 'Collar',
                        'terms' => array('Mandrin', 'Band', 'Polo','Funnel','Slim','Spread','Regular','Mao'),
                        'description' => 'Collar attributes for clothings wear',
                        'slug' => 'wbc_cloth_collar_attr'
                    ),
                    array(
                        'label' => 'Closure Type',
                        'terms' => array('Button','Zipper','Hook','Frog & toggle','Elastic'),
                        'description' => 'Closure type attributes for clothings wear',
                        'slug' => 'wbc_cloth_closure_type_attr'
                    ),
                    array(
                        'label' => 'Length',
                        'terms' => array('Ankle','Full','Calf','Thigh','Knee','Regular'),
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
                                    'name' => 'Shirts',
                                    'description' => 'Top wear shirts',
                                    'slug' => 'wbc_top_wear_shirts_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'shirts.png',
                                    'thumb_selected' => $_img_url.'shirts_selected.png',
                                    'name'=> 'Men Shirts',
                                    'description' => 'Top wear men shirts',
                                    'slug' => 'wbc_top_wear_men_shirts_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'shirts.png',
                                    'thumb_selected' => $_img_url.'shirts_selected.png',
                                    'name'=> 'Women Shirts',
                                    'description' => 'Top wear women shirts',
                                    'slug' => 'wbc_top_wear_women_shirts_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'tshirt.png',
                                    'thumb_selected' => $_img_url.'tshirt_selected.png',
                                    'name' => 'T-shirts',
                                    'description' => 'Top wear t-shirts',
                                    'slug' => 'wbc_top_wear_tshirts_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'tshirt.png',
                                    'thumb_selected' => $_img_url.'tshirt_selected.png',
                                    'name' => 'Men T-shirts',
                                    'description' => 'Top wear men t-shirts',
                                    'slug' => 'wbc_top_wear_men_tshirts_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'tshirt.png',
                                    'thumb_selected' => $_img_url.'tshirt_selected.png',
                                    'name' => 'Women T-shirts',
                                    'description' => 'Top wear women t-shirts',
                                    'slug' => 'wbc_top_wear_women_tshirts_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'sweater.png',
                                    'thumb_selected' => $_img_url.'sweater_selected.png',
                                    'name' => 'Sweaters',
                                    'description' => 'Top wear sweaters',
                                    'slug' => 'wbc_top_wear_sweaters_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'sweater.png',
                                    'thumb_selected' => $_img_url.'sweater_selected.png',
                                    'name' => 'Men Sweaters',
                                    'description' => 'Top wear men sweaters',
                                    'slug' => 'wbc_top_wear_men_sweaters_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'sweater.png',
                                    'thumb_selected' => $_img_url.'sweater_selected.png',
                                    'name' => 'Women Sweaters',
                                    'description' => 'Top wear women sweaters',
                                    'slug' => 'wbc_top_wear_women_sweaters_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'jacket.png',
                                    'thumb_selected' => $_img_url.'jacket_selected.png',
                                    'name' => 'Jackets',
                                    'description' => 'Top wear Jackets',
                                    'slug' => 'wbc_top_wear_jackets_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'jacket.png',
                                    'thumb_selected' => $_img_url.'jacket_selected.png',
                                    'name' => 'Men Jackets',
                                    'description' => 'Top wear men jackets',
                                    'slug' => 'wbc_top_wear_men_jackets_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'jacket.png',
                                    'thumb_selected' => $_img_url.'jacket_selected.png',
                                    'name' => 'Women Jackets',
                                    'description' => 'Top wear women jackets',
                                    'slug' => 'wbc_top_wear_women_jackets_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'blazers.png',
                                    'thumb_selected' => $_img_url.'blazers_selected.png',
                                    'name' => 'Blazers & Coats',
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
                                    'thumb' => $_img_url.'hoodie.png',
                                    'thumb_selected' => $_img_url.'hoodie_selected.png',
                                    'name' => 'Men Hoodies',
                                    'description' => 'Top wear men hoodies',
                                    'slug' => 'wbc_top_wear_men_hoodies_cat'
                                ),array(
                                    'thumb' => $_img_url.'hoodie.png',
                                    'thumb_selected' => $_img_url.'hoodie_selected.png',
                                    'name' => 'Women Hoodies',
                                    'description' => 'Top wear women hoodies',
                                    'slug' => 'wbc_top_wear_women_hoodies_cat'
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
                                    'thumb' => $_img_url.'trousers.png',
                                    'thumb_selected' => $_img_url.'trousers_selected.png',
                                    'name' => 'Men Trousers',
                                    'description' => 'Bottom wear men trousers',
                                    'slug' => 'wbc_bottom_wear_men_trousers_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'trousers.png',
                                    'thumb_selected' => $_img_url.'trousers_selected.png',
                                    'name' => 'Women Trousers',
                                    'description' => 'Bottom wear women trousers',
                                    'slug' => 'wbc_bottom_wear_women_trousers_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'jeans.png',
                                    'thumb_selected' => $_img_url.'jeans_selected.png',
                                    'name' => 'Jeans',
                                    'description' => 'Bottom wear jeans',
                                    'slug' => 'wbc_bottom_wear_jeans_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'jeans.png',
                                    'thumb_selected' => $_img_url.'jeans_selected.png',
                                    'name' => 'Men Jeans',
                                    'description' => 'Bottom wear men jeans',
                                    'slug' => 'wbc_bottom_wear_men_jeans_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'jeans.png',
                                    'thumb_selected' => $_img_url.'jeans_selected.png',
                                    'name' => 'Women Jeans',
                                    'description' => 'Bottom wear women jeans',
                                    'slug' => 'wbc_bottom_wear_women_jeans_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'shorts.png',
                                    'thumb_selected' => $_img_url.'shorts_selected.png',
                                    'name' => 'Shorts',
                                    'description' => 'Bottom wear shorts',
                                    'slug' => 'wbc_bottom_wear_shorts_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'shorts.png',
                                    'thumb_selected' => $_img_url.'shorts_selected.png',
                                    'name' => 'Men Shorts',
                                    'description' => 'Bottom wear men shorts',
                                    'slug' => 'wbc_bottom_wear_men_shorts_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'shorts.png',
                                    'thumb_selected' => $_img_url.'shorts_selected.png',
                                    'name' => 'Women Shorts',
                                    'description' => 'Bottom wear women shorts',
                                    'slug' => 'wbc_bottom_wear_women_shorts_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'track.png',
                                    'thumb_selected' => $_img_url.'track_selected.png',
                                    'name' => 'Track pants',
                                    'description' => 'Bottom wear track pants',
                                    'slug' => 'wbc_bottom_wear_track_pants_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'track.png',
                                    'thumb_selected' => $_img_url.'track_selected.png',
                                    'name' => 'Men track pants',
                                    'description' => 'Bottom wear men track pants',
                                    'slug' => 'wbc_bottom_wear_men_track_pants_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'track.png',
                                    'thumb_selected' => $_img_url.'track_selected.png',
                                    'name' => 'Women track pants',
                                    'description' => 'Bottom wear women track pants',
                                    'slug' => 'wbc_bottom_wear_women_track_pants_cat'
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
                    ),
                    array(
                        'thumb' => '',
                        'name' => 'Fabric',
                        'description' => 'Fabric category',
                        'slug' => 'wbc_fabric_cat',
                        'child'=> 
                        array(
                                array(
                                    'thumb' => $_img_url.'fabric.png',
                                    'thumb_selected' => $_img_url.'fabric_selected.png',
                                    'name' => 'Cotton',
                                    'description' => 'Fabric type cotton',
                                    'slug' => 'wbc_fabric_cotton_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'fabric.png',
                                    'thumb_selected' => $_img_url.'fabric_selected.png',
                                    'name' => 'Silk',
                                    'description' => 'Fabric type silk',
                                    'slug' => 'wbc_fabric_silk_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'fabric.png',
                                    'thumb_selected' => $_img_url.'fabric_selected.png',
                                    'name' => 'Canvas',
                                    'description' => 'Fabric type canvas',
                                    'slug' => 'wbc_fabric_canvas_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'fabric.png',
                                    'thumb_selected' => $_img_url.'fabric_selected.png',
                                    'name' => 'Chiffon',
                                    'description' => 'Fabric type chiffon',
                                    'slug' => 'wbc_fabric_chiffon_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'fabric.png',
                                    'thumb_selected' => $_img_url.'fabric_selected.png',
                                    'name' => 'Damask',
                                    'description' => 'Fabric type damask',
                                    'slug' => 'wbc_fabric_damask_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'fabric.png',
                                    'thumb_selected' => $_img_url.'fabric_selected.png',
                                    'name' => 'Wool',
                                    'description' => 'Fabric type wool',
                                    'slug' => 'wbc_fabric_wool_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'fabric.png',
                                    'thumb_selected' => $_img_url.'fabric_selected.png',
                                    'name' => 'Jersey',
                                    'description' => 'Fabric type jersey',
                                    'slug' => 'wbc_fabric_jersey_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'fabric.png',
                                    'thumb_selected' => $_img_url.'fabric_selected.png',
                                    'name' => 'Polyester',
                                    'description' => 'Fabric type polyester',
                                    'slug' => 'wbc_fabric_polyester_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'fabric.png',
                                    'thumb_selected' => $_img_url.'fabric_selected.png',
                                    'name' => 'Velvet',
                                    'description' => 'Fabric type velvet',
                                    'slug' => 'wbc_fabric_velvet_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'fabric.png',
                                    'thumb_selected' => $_img_url.'fabric_selected.png',
                                    'name' => 'Linen',
                                    'description' => 'Fabric type linen',
                                    'slug' => 'wbc_fabric_linen_cat'
                                )
                        )
                    ), 
                    array(
                        'thumb' => '',
                        'name' => 'Pattern',
                        'description' => 'Pattern category',
                        'slug' => 'wbc_pattern_cat',
                        'child'=> 
                        array(
                                array(
                                    'thumb' => $_img_url.'pattern.png',
                                    'thumb_selected' => $_img_url.'pattern_selected.png',
                                    'name' => 'Plain',
                                    'description' => 'Pattern type plain',
                                    'slug' => 'wbc_pattern_plain_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'pattern.png',
                                    'thumb_selected' => $_img_url.'pattern_selected.png',
                                    'name' => 'Stripes',
                                    'description' => 'Pattern type stripes',
                                    'slug' => 'wbc_pattern_stripes_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'pattern.png',
                                    'thumb_selected' => $_img_url.'pattern_selected.png',
                                    'name' => 'Checks',
                                    'description' => 'Pattern type checks',
                                    'slug' => 'wbc_pattern_checks_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'pattern.png',
                                    'thumb_selected' => $_img_url.'pattern_selected.png',
                                    'name' => 'Plaid',
                                    'description' => 'Pattern type plaid',
                                    'slug' => 'wbc_pattern_plaid_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'pattern.png',
                                    'thumb_selected' => $_img_url.'pattern_selected.png',
                                    'name' => 'Floral',
                                    'description' => 'Pattern type floral',
                                    'slug' => 'wbc_pattern_floral_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'pattern.png',
                                    'thumb_selected' => $_img_url.'pattern_selected.png',
                                    'name' => 'Polka Dots',
                                    'description' => 'Pattern type polka dots',
                                    'slug' => 'wbc_pattern_polkadots_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'pattern.png',
                                    'thumb_selected' => $_img_url.'pattern_selected.png',
                                    'name' => 'Printed',
                                    'description' => 'Pattern type printed',
                                    'slug' => 'wbc_pattern_printed_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'pattern.png',
                                    'thumb_selected' => $_img_url.'pattern_selected.png',
                                    'name' => 'Detailing',
                                    'description' => 'Pattern type detailing',
                                    'slug' => 'wbc_pattern_detailing_cat'
                                )

                        )
                    )
                    
                );
    }

    public function get_maps() {
        return array(
                        array(
                            ['slug','wbc_top_wear_men_shirts_cat','product_cat'],
                            ['slug','wbc_bottom_wear_men_trousers_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_top_wear_women_shirts_cat','product_cat'],
                            ['slug','wbc_bottom_wear_women_trousers_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_top_wear_tshirts_cat','product_cat'],
                            ['slug','wbc_bottom_wear_jeans_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_top_wear_men_tshirts_cat','product_cat'],
                            ['slug','wbc_bottom_wear_men_jeans_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_top_wear_women_tshirts_cat','product_cat'],
                            ['slug','wbc_bottom_wear_women_jeans_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_top_wear_sweaters_cat','product_cat'],
                            ['slug','wbc_bottom_wear_jeans_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_top_wear_men_sweaters_cat','product_cat'],
                            ['slug','wbc_bottom_wear_men_jeans_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_top_wear_women_sweaters_cat','product_cat'],
                            ['slug','wbc_bottom_wear_women_jeans_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_top_wear_jackets_cat','product_cat'],
                            ['slug','wbc_bottom_wear_jeans_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_top_wear_men_jackets_cat','product_cat'],
                            ['slug','wbc_bottom_wear_men_jeans_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_top_wear_women_jackets_cat','product_cat'],
                            ['slug','wbc_bottom_wear_women_jeans_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_top_wear_blazers_coats_cat','product_cat'],
                            ['slug','wbc_bottom_wear_men_trousers_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_top_wear_tshirts_cat','product_cat'],
                            ['slug','wbc_bottom_wear_track_pants_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_top_wear_men_tshirts_cat','product_cat'],
                            ['slug','wbc_bottom_wear_men_track_pants_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_top_wear_women_tshirts_cat','product_cat'],
                            ['slug','wbc_bottom_wear_women_track_pants_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_top_wear_hoodies_cat','product_cat'],
                            ['slug','wbc_bottom_wear_jeans_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_top_wear_men_hoodies_cat','product_cat'],
                            ['slug','wbc_bottom_wear_men_jeans_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_top_wear_women_hoodies_cat','product_cat'],
                            ['slug','wbc_bottom_wear_women_jeans_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_top_wear_tops_cat','product_cat'],
                            ['slug','wbc_bottom_wear_women_shorts_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_top_wear_men_tshirts_cat','product_cat'],
                            ['slug','wbc_bottom_wear_men_shorts_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_top_wear_tunics_cat','product_cat'],
                            ['slug','wbc_bottom_wear_plazzos_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_top_wear_tunics_cat','product_cat'],
                            ['slug','wbc_bottom_wear_leggings_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_top_wear_tops_cat','product_cat'],
                            ['slug','wbc_bottom_wear_skirts_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_top_wear_tops_cat','product_cat'],
                            ['slug','wbc_bottom_wear_leggings_cat','product_cat']
                        )

                    );
    }

    public function get_filters($__cat__, $__att__) {
        $filter = array();
        
        if(!empty($__cat__['wbc_top_wear_cat'])){
            $filter['d_fconfig'][]=array(
                'name'=>$__cat__['wbc_top_wear_cat'][0],
                'type'=>"0",
                'label'=>$__cat__['wbc_top_wear_cat'][1],
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
        if(!empty($__att__['wbc_cloth_size_attr'])){
            $filter['d_fconfig'][]=array(
                'name'=>$__att__['wbc_cloth_size_attr'][0],
                'type'=>"1",
                'label'=>$__att__['wbc_cloth_size_attr'][1],
                'advance'=>"0",
                'dependent'=>"0",
                'input'=>"text_slider",
                'column_width'=> "50",
                'order'=>"1",
                'template'=>'fc1',
                'help'=>0,
                'help_text'=>'',
                'enabled'=>1
            );
        }
        if(!empty($__att__['wbc_cloth_fit_attr'])){
            $filter['d_fconfig'][]=array(
                'name'=>$__att__['wbc_cloth_fit_attr'][0],
                'type'=>"0",
                'label'=>$__att__['wbc_cloth_fit_attr'][1],
                'advance'=>"0",
                'dependent'=>"0",
                'input'=>"checkbox",
                'column_width'=> "50",
                'order'=>"2",
                'template'=>'fc1',
                'help'=>0,
                'help_text'=>'',
                'enabled'=>1
            );
        }
        if(!empty($__att__['wbc_cloth_neck_attr'])){
            $filter['d_fconfig'][]=array(
                'name'=>$__att__['wbc_cloth_neck_attr'][0],
                'type'=>"0",
                'label'=>$__att__['wbc_cloth_neck_attr'][1],
                'advance'=>"0",
                'dependent'=>"0",
                'input'=>"checkbox",
                'column_width'=> "50",
                'order'=>"3",
                'template'=>'fc1',
                'help'=>0,
                'help_text'=>'',
                'enabled'=>1
            );
        }
        if(!empty($__att__['wbc_cloth_occasion_attr'])){
            $filter['d_fconfig'][]=array(
                'name'=>$__att__['wbc_cloth_occasion_attr'][0],
                'type'=>"0",
                'label'=>$__att__['wbc_cloth_occasion_attr'][1],
                'advance'=>"0",
                'dependent'=>"0",
                'input'=>"checkbox",
                'column_width'=> "50",
                'order'=>"4",
                'template'=>'fc1',
                'help'=>0,
                'help_text'=>'',
                'enabled'=>1
            );
        }
        if(!empty($__att__['wbc_cloth_sleeve_attr'])){
            $filter['d_fconfig'][]=array(
                'name'=>$__att__['wbc_cloth_sleeve_attr'][0],
                'type'=>"0",
                'label'=>$__att__['wbc_cloth_sleeve_attr'][1],
                'advance'=>"0",
                'dependent'=>"0",
                'input'=>"checkbox",
                'column_width'=> "50",
                'order'=>"5",
                'template'=>'fc1',
                'help'=>0,
                'help_text'=>'',
                'enabled'=>1
            );
        }
        if(!empty($__att__['wbc_cloth_collar_attr'])){
            $filter['d_fconfig'][]=array(
                'name'=>$__att__['wbc_cloth_sleeve_attr'][0],
                'type'=>"0",
                'label'=>$__att__['wbc_cloth_sleeve_attr'][1],
                'advance'=>"0",
                'dependent'=>"0",
                'input'=>"checkbox",
                'column_width'=> "50",
                'order'=>"6",
                'template'=>'fc1',
                'help'=>0,
                'help_text'=>'',
                'enabled'=>1
            );
        }
        //filter for bottom wear
        if(!empty($__cat__['wbc_bottom_wear_cat'])){
            $filter['s_fconfig'][]=array(
                'name'=>$__cat__['wbc_bottom_wear_cat'][0],
                'type'=>"0",
                'label'=>$__cat__['wbc_bottom_wear_cat'][1],
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
        if(!empty($__att__['wbc_cloth_closure_type_attr'])){
            $filter['s_fconfig'][]=array(
                'name'=>$__att__['wbc_cloth_closure_type_attr'][0],
                'type'=>"0",
                'label'=>$__att__['wbc_cloth_closure_type_attr'][1],
                'advance'=>"0",
                'dependent'=>"0",
                'input'=>"checkbox",
                'column_width'=> "50",
                'order'=>"1",
                'template'=>'sc1',
                'help'=>0,
                'help_text'=>'',
                'enabled'=>1
            );
        }
        if(!empty($__att__['wbc_cloth_length_attr'])){
            $filter['s_fconfig'][]=array(
                'name'=>$__att__['wbc_cloth_length_attr'][0],
                'type'=>"0",
                'label'=>$__att__['wbc_cloth_length_attr'][1],
                'advance'=>"0",
                'dependent'=>"0",
                'input'=>"checkbox",
                'column_width'=> "50",
                'order'=>"2",
                'template'=>'sc1',
                'help'=>0,
                'help_text'=>'',
                'enabled'=>1
            );
        }
        if(!empty($__att__['wbc_cloth_bottom_type_attr'])){
            $filter['s_fconfig'][]=array(
                'name'=>$__att__['wbc_cloth_bottom_type_attr'][0],
                'type'=>"0",
                'label'=>$__att__['wbc_cloth_bottom_type_attr'][1],
                'advance'=>"0",
                'dependent'=>"0",
                'input'=>"checkbox",
                'column_width'=> "50",
                'order'=>"3",
                'template'=>'sc1',
                'help'=>0,
                'help_text'=>'',
                'enabled'=>1
            );
        }
        if(!empty($__cat__['wbc_pattern_cat'])){
            $filter['d_fconfig'][]=array(
                'name'=>$__cat__['wbc_pattern_cat'][0],
                'type'=>"0",
                'label'=>$__cat__['wbc_pattern_cat'][1],
                'advance'=>"0",
                'dependent'=>"0",
                'input'=>"checkbox",
                'column_width'=> "50",
                'order'=>"7",
                'template'=>'fc1',
                'help'=>0,
                'help_text'=>'',
                'enabled'=>1
            );
        }
        if(!empty($__cat__['wbc_fabric_cat'])){
            $filter['d_fconfig'][]=array(
                'name'=>$__cat__['wbc_fabric_cat'][0],
                'type'=>"0",
                'label'=>$__cat__['wbc_fabric_cat'][1],
                'advance'=>"0",
                'dependent'=>"0",
                'input'=>"checkbox",
                'column_width'=> "50",
                'order'=>"8",
                'template'=>'fc1',
                'help'=>0,
                'help_text'=>'',
                'enabled'=>1
            );
        }

        return $filter;
    }

    public function get_products() {
        
        $_img_url=constant('EOWBC_ASSET_URL').'img/sample_data/'.$this->asset_folder.'/';   //EO_WBC_PLUGIN_DIR.'EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/';

        $_img_url = $_img_url. 'product/';

        $this->gallay_img = $_img_url;

        return array(
         array(
          'title'=>'Shirt #20000001',
          'thumb'=>$_img_url.'men_white_shirt.jpg',
          'images'=>array('men_white_shirt.jpg','men_white_shirt_2.jpg'),
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable', //simple | variable
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_men_shirts_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_fabric_cotton_cat','wbc_pattern_plain_cat'),
          'attribute'=>array(
                    'pa_wbc_cloth_size_attr'=>array(
                              'name'=>'pa_wbc_cloth_size_attr',
                              'value'=>'M',
                              'position'=>0,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_colour_attr'=>array(
                              'name'=>'pa_wbc_cloth_colour_attr',
                              'value'=>'White',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_neck_attr'=>array(
                              'name'=>'pa_wbc_cloth_neck_attr',
                              'value'=>'Collared neckline',
                              'position'=>2,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_occasion_attr'=>array(
                              'name'=>'pa_wbc_cloth_occasion_attr',
                              'value'=>'Formal',
                              'position'=>3,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_sleeve_attr'=>array(
                              'name'=>'pa_wbc_cloth_sleeve_attr',
                              'value'=>'Long sleeve',
                              'position'=>4,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),

                    'pa_wbc_cloth_collar_attr'=>array(
                              'name'=>'pa_wbc_cloth_collar_attr',
                              'value'=>'Regular',
                              'position'=>5,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            )       
                    ),
          'variation'=>array(
                          array(
                            'regular_price'=>'950',
                            'price'=>'939',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'M','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_neck_attr'=>'Collared neckline','pa_wbc_cloth_occasion_attr'=>'Formal','pa_wbc_cloth_sleeve_attr'=>'Long sleeve','pa_wbc_cloth_collar_attr'=>'Regular')
                          )
                   ) 
        ),
        array(
          'title'=>'T-shirt #20000002',
          'thumb'=>$_img_url.'men_white_tshirt.jpg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_men_tshirts_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_fabric_cotton_cat','wbc_pattern_plain_cat'),
          'attribute'=>array(
                    'pa_wbc_cloth_size_attr'=>array(
                              'name'=>'pa_wbc_cloth_size_attr',
                              'value'=>'L',
                              'position'=>0,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_colour_attr'=>array(
                              'name'=>'pa_wbc_cloth_colour_attr',
                              'value'=>'White',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_neck_attr'=>array(
                              'name'=>'pa_wbc_cloth_neck_attr',
                              'value'=>'Collared neckline',
                              'position'=>2,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_occasion_attr'=>array(
                              'name'=>'pa_wbc_cloth_occasion_attr',
                              'value'=>'Causal',
                              'position'=>3,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_sleeve_attr'=>array(
                              'name'=>'pa_wbc_cloth_sleeve_attr',
                              'value'=>'Short sleeve',
                              'position'=>4,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),

                    'pa_wbc_cloth_collar_attr'=>array(
                              'name'=>'pa_wbc_cloth_collar_attr',
                              'value'=>'Regular',
                              'position'=>5,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            )       
                    ),
          'variation'=>array(
                          array(
                            'regular_price'=>'750',
                            'price'=>'740',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'L','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_neck_attr'=>'Collared neckline','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_sleeve_attr'=>'Short sleeve','pa_wbc_cloth_collar_attr'=>'Regular')
                          )
                   ) 
        ),
        array(
          'title'=>'Shirt #20000003',
          'thumb'=>$_img_url.'men_shirts.jpg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_men_shirts_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_fabric_chiffon_cat','wbc_pattern_plain_cat'),
          'attribute'=>array(
                    'pa_wbc_cloth_size_attr'=>array(
                              'name'=>'pa_wbc_cloth_size_attr',
                              'value'=>'L',
                              'position'=>0,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_colour_attr'=>array(
                              'name'=>'pa_wbc_cloth_colour_attr',
                              'value'=>'Gray',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_neck_attr'=>array(
                              'name'=>'pa_wbc_cloth_neck_attr',
                              'value'=>'Round',
                              'position'=>2,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_occasion_attr'=>array(
                              'name'=>'pa_wbc_cloth_occasion_attr',
                              'value'=>'Causal',
                              'position'=>3,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_sleeve_attr'=>array(
                              'name'=>'pa_wbc_cloth_sleeve_attr',
                              'value'=>'Long sleeve',
                              'position'=>4,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),

                    'pa_wbc_cloth_collar_attr'=>array(
                              'name'=>'pa_wbc_cloth_collar_attr',
                              'value'=>'Band',
                              'position'=>5,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            )       
                    ),
          'variation'=>array(
                          array(
                            'regular_price'=>'1050',
                            'price'=>'1039',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'L','pa_wbc_cloth_colour_attr'=>'Gray','pa_wbc_cloth_neck_attr'=>'Round','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_sleeve_attr'=>'Long sleeve','pa_wbc_cloth_collar_attr'=>'Band')
                          )
                   ) 
        ),
        array(
          'title'=>'T-shirt #20000004',
          'thumb'=>$_img_url.'men_white_tshirt_2.jpg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_men_tshirts_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_fabric_silk_cat','wbc_pattern_printed_cat'),
          'attribute'=>array(
                    'pa_wbc_cloth_size_attr'=>array(
                              'name'=>'pa_wbc_cloth_size_attr',
                              'value'=>'XL',
                              'position'=>0,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_colour_attr'=>array(
                              'name'=>'pa_wbc_cloth_colour_attr',
                              'value'=>'White',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_neck_attr'=>array(
                              'name'=>'pa_wbc_cloth_neck_attr',
                              'value'=>'Round',
                              'position'=>2,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_occasion_attr'=>array(
                              'name'=>'pa_wbc_cloth_occasion_attr',
                              'value'=>'Causal',
                              'position'=>3,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_sleeve_attr'=>array(
                              'name'=>'pa_wbc_cloth_sleeve_attr',
                              'value'=>'Short sleeve',
                              'position'=>4,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),

                    'pa_wbc_cloth_collar_attr'=>array(
                              'name'=>'pa_wbc_cloth_collar_attr',
                              'value'=>'Funnel',
                              'position'=>5,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            )       
                    ),
          'variation'=>array(
                          array(
                            'regular_price'=>'650',
                            'price'=>'645',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'XL','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_neck_attr'=>'Round','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_sleeve_attr'=>'Short sleeve','pa_wbc_cloth_collar_attr'=>'Funnel')
                          )
                   ) 
        ),
        array(
          'title'=>'Tops #20000005',
          'thumb'=>$_img_url.'black_tops.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_tops_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_fabric_canvas_cat','wbc_pattern_plaid_cat'),
          'attribute'=>array(
                    'pa_wbc_cloth_size_attr'=>array(
                              'name'=>'pa_wbc_cloth_size_attr',
                              'value'=>'S',
                              'position'=>0,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_colour_attr'=>array(
                              'name'=>'pa_wbc_cloth_colour_attr',
                              'value'=>'Black',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_neck_attr'=>array(
                              'name'=>'pa_wbc_cloth_neck_attr',
                              'value'=>'Crew',
                              'position'=>2,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_occasion_attr'=>array(
                              'name'=>'pa_wbc_cloth_occasion_attr',
                              'value'=>'Causal',
                              'position'=>3,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_sleeve_attr'=>array(
                              'name'=>'pa_wbc_cloth_sleeve_attr',
                              'value'=>'Short sleeve',
                              'position'=>4,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),

                    'pa_wbc_cloth_collar_attr'=>array(
                              'name'=>'pa_wbc_cloth_collar_attr',
                              'value'=>'Spread',
                              'position'=>5,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            )       
                    ),
          'variation'=>array(
                          array(
                            'regular_price'=>'850',
                            'price'=>'845',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'S','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_neck_attr'=>'Crew','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_sleeve_attr'=>'Short sleeve','pa_wbc_cloth_collar_attr'=>'Spread')
                          )
                   ) 
        ),
        array(
          'title'=>'T-shirt #20000006',
          'thumb'=>$_img_url.'women_white_tshirt.jpg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_women_tshirt_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_fabric_silk_cat','wbc_pattern_checks_cat'),
          'attribute'=>array(
                    'pa_wbc_cloth_size_attr'=>array(
                              'name'=>'pa_wbc_cloth_size_attr',
                              'value'=>'M',
                              'position'=>0,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_colour_attr'=>array(
                              'name'=>'pa_wbc_cloth_colour_attr',
                              'value'=>'White',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_neck_attr'=>array(
                              'name'=>'pa_wbc_cloth_neck_attr',
                              'value'=>'Crew',
                              'position'=>2,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_occasion_attr'=>array(
                              'name'=>'pa_wbc_cloth_occasion_attr',
                              'value'=>'Causal',
                              'position'=>3,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_sleeve_attr'=>array(
                              'name'=>'pa_wbc_cloth_sleeve_attr',
                              'value'=>'Short sleeve',
                              'position'=>4,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),

                    'pa_wbc_cloth_collar_attr'=>array(
                              'name'=>'pa_wbc_cloth_collar_attr',
                              'value'=>'Spread',
                              'position'=>5,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            )       
                    ),
          'variation'=>array(
                          array(
                            'regular_price'=>'750',
                            'price'=>'745',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'M','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_neck_attr'=>'Crew','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_sleeve_attr'=>'Short sleeve','pa_wbc_cloth_collar_attr'=>'Spread')
                          )
                   ) 
        ),
        array(
          'title'=>'Shirt #20000007',
          'thumb'=>$_img_url.'women_white_shirt.jpg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_women_shirt_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_fabric_cotton_cat','wbc_pattern_plain_cat'),
          'attribute'=>array(
                    'pa_wbc_cloth_size_attr'=>array(
                              'name'=>'pa_wbc_cloth_size_attr',
                              'value'=>'M',
                              'position'=>0,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_colour_attr'=>array(
                              'name'=>'pa_wbc_cloth_colour_attr',
                              'value'=>'White',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_neck_attr'=>array(
                              'name'=>'pa_wbc_cloth_neck_attr',
                              'value'=>'Collared neckline',
                              'position'=>2,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_occasion_attr'=>array(
                              'name'=>'pa_wbc_cloth_occasion_attr',
                              'value'=>'Causal',
                              'position'=>3,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_sleeve_attr'=>array(
                              'name'=>'pa_wbc_cloth_sleeve_attr',
                              'value'=>'Short sleeve',
                              'position'=>4,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),

                    'pa_wbc_cloth_collar_attr'=>array(
                              'name'=>'pa_wbc_cloth_collar_attr',
                              'value'=>'Mandrin',
                              'position'=>5,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            )       
                    ),
          'variation'=>array(
                          array(
                            'regular_price'=>'1250',
                            'price'=>'1245',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'M','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_neck_attr'=>'Collared neckline','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_sleeve_attr'=>'Short sleeve','pa_wbc_cloth_collar_attr'=>'Mandrin')
                          )
                   ) 
        ),
        array(
          'title'=>'Tops #20000008',
          'thumb'=>$_img_url.'women_pink_tops.jpg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_tops_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_fabric_polyester_cat','wbc_pattern_polkadots_cat'),
          'attribute'=>array(
                    'pa_wbc_cloth_size_attr'=>array(
                              'name'=>'pa_wbc_cloth_size_attr',
                              'value'=>'L',
                              'position'=>0,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_colour_attr'=>array(
                              'name'=>'pa_wbc_cloth_colour_attr',
                              'value'=>'Pink',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_neck_attr'=>array(
                              'name'=>'pa_wbc_cloth_neck_attr',
                              'value'=>'Crew',
                              'position'=>2,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_occasion_attr'=>array(
                              'name'=>'pa_wbc_cloth_occasion_attr',
                              'value'=>'Causal',
                              'position'=>3,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_sleeve_attr'=>array(
                              'name'=>'pa_wbc_cloth_sleeve_attr',
                              'value'=>'Sleeveless',
                              'position'=>4,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),

                    'pa_wbc_cloth_collar_attr'=>array(
                              'name'=>'pa_wbc_cloth_collar_attr',
                              'value'=>'Spread',
                              'position'=>5,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            )       
                    ),
          'variation'=>array(
                          array(
                            'regular_price'=>'1500',
                            'price'=>'1480',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'L','pa_wbc_cloth_colour_attr'=>'Pink','pa_wbc_cloth_neck_attr'=>'Crew','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_sleeve_attr'=>'Sleeveless','pa_wbc_cloth_collar_attr'=>'Spread')
                          )
                   ) 
        ),
        array(
          'title'=>'T-shirt #20000009',
          'thumb'=>$_img_url.'women_red_tshirt.jpg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_women_tshirts_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_fabric_polyester_cat','wbc_pattern_stripes_cat'),
          'attribute'=>array(
                    'pa_wbc_cloth_size_attr'=>array(
                              'name'=>'pa_wbc_cloth_size_attr',
                              'value'=>'XL',
                              'position'=>0,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_colour_attr'=>array(
                              'name'=>'pa_wbc_cloth_colour_attr',
                              'value'=>'Red',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_neck_attr'=>array(
                              'name'=>'pa_wbc_cloth_neck_attr',
                              'value'=>'Crew',
                              'position'=>2,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_occasion_attr'=>array(
                              'name'=>'pa_wbc_cloth_occasion_attr',
                              'value'=>'Causal',
                              'position'=>3,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_sleeve_attr'=>array(
                              'name'=>'pa_wbc_cloth_sleeve_attr',
                              'value'=>'Short sleeve',
                              'position'=>4,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),

                    'pa_wbc_cloth_collar_attr'=>array(
                              'name'=>'pa_wbc_cloth_collar_attr',
                              'value'=>'Spread',
                              'position'=>5,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            )       
                    ),
          'variation'=>array(
                          array(
                            'regular_price'=>'1000',
                            'price'=>'995',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'XL','pa_wbc_cloth_colour_attr'=>'Red','pa_wbc_cloth_neck_attr'=>'Crew','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_sleeve_attr'=>'Short sleeve','pa_wbc_cloth_collar_attr'=>'Spread')
                          )
                    )      
          ),
          array(
          'title'=>'Shirt #20000010',
          'thumb'=>$_img_url.'men_blue_shirt.jpg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_men_shirts_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_fabric_linen_cat','wbc_pattern_floral_cat'),
          'attribute'=>array(
                    'pa_wbc_cloth_size_attr'=>array(
                              'name'=>'pa_wbc_cloth_size_attr',
                              'value'=>'L',
                              'position'=>0,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_colour_attr'=>array(
                              'name'=>'pa_wbc_cloth_colour_attr',
                              'value'=>'Blue',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_neck_attr'=>array(
                              'name'=>'pa_wbc_cloth_neck_attr',
                              'value'=>'Collared neckline',
                              'position'=>2,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_occasion_attr'=>array(
                              'name'=>'pa_wbc_cloth_occasion_attr',
                              'value'=>'Formal',
                              'position'=>3,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_sleeve_attr'=>array(
                              'name'=>'pa_wbc_cloth_sleeve_attr',
                              'value'=>'Short sleeve',
                              'position'=>4,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),

                    'pa_wbc_cloth_collar_attr'=>array(
                              'name'=>'pa_wbc_cloth_collar_attr',
                              'value'=>'Regular',
                              'position'=>5,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            )       
                    ),
          'variation'=>array(
                          array(
                            'regular_price'=>'850',
                            'price'=>'745',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'L','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_neck_attr'=>'Collared neckline','pa_wbc_cloth_occasion_attr'=>'Formal','pa_wbc_cloth_sleeve_attr'=>'Short sleeve','pa_wbc_cloth_collar_attr'=>'Regular')
                          )
                   )
          ),

          // Bottom-wear 
          array(
          'title'=>'Trouser #20000011',
          'thumb'=>$_img_url.'formal_white_pant.jpg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_men_trousers_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_fabric_cotton_cat','wbc_pattern_plain_cat'),
          'attribute'=>array(
                    'pa_wbc_cloth_size_attr'=>array(
                              'name'=>'pa_wbc_cloth_size_attr',
                              'value'=>'30',
                              'position'=>0,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_colour_attr'=>array(
                              'name'=>'pa_wbc_cloth_colour_attr',
                              'value'=>'White',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_occasion_attr'=>array(
                              'name'=>'pa_wbc_cloth_occasion_attr',
                              'value'=>'Formal',
                              'position'=>2,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_bottom_type_attr'=>array(
                              'name'=>'pa_wbc_cloth_bottom_type_attr',
                              'value'=>'Pants',
                              'position'=>3,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_fit_attr'=>array(
                              'name'=>'pa_wbc_cloth_fit_attr',
                              'value'=>'Easy',
                              'position'=>4,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_closure_type_attr'=>array(
                              'name'=>'pa_wbc_cloth_closure_type_attr',
                              'value'=>'Button',
                              'position'=>5,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_length_attr'=>array(
                              'name'=>'pa_wbc_cloth_length_attr',
                              'value'=>'Regular',
                              'position'=>6,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            )
                    ),
          'variation'=>array(
                          array(
                            'regular_price'=>'1020',
                            'price'=>'1010',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'30','pa_wbc_cloth_colour_attr'=>'Gray','pa_wbc_cloth_occasion_attr'=>'Formal','pa_wbc_cloth_bottom_type_attr'=>'Pants','pa_wbc_cloth_fit_attr'=>'Easy','pa_wbc_cloth_closure_type_attr'=>'Button','pa_wbc_cloth_length_attr'=>'Regular')
                          )
                   )
          ),
          array(
          'title'=>'Trouser #20000012',
          'thumb'=>$_img_url.'formal_black_pant.jpg',
          'images'=>array('formal_black_pant_1'),
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_men_trousers_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_fabric_cotton_cat','wbc_pattern_plain_cat'),
          'attribute'=>array(
                    'pa_wbc_cloth_size_attr'=>array(
                              'name'=>'pa_wbc_cloth_size_attr',
                              'value'=>'32',
                              'position'=>0,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_colour_attr'=>array(
                              'name'=>'pa_wbc_cloth_colour_attr',
                              'value'=>'Black',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_occasion_attr'=>array(
                              'name'=>'pa_wbc_cloth_occasion_attr',
                              'value'=>'Formal',
                              'position'=>2,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_bottom_type_attr'=>array(
                              'name'=>'pa_wbc_cloth_bottom_type_attr',
                              'value'=>'Pants',
                              'position'=>3,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_fit_attr'=>array(
                              'name'=>'pa_wbc_cloth_fit_attr',
                              'value'=>'Slim fit',
                              'position'=>4,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_closure_type_attr'=>array(
                              'name'=>'pa_wbc_cloth_closure_type_attr',
                              'value'=>'Button',
                              'position'=>5,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_length_attr'=>array(
                              'name'=>'pa_wbc_cloth_length_attr',
                              'value'=>'Regular',
                              'position'=>6,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            )
                    ),
          'variation'=>array(
                          array(
                            'regular_price'=>'950',
                            'price'=>'945',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'32','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_occasion_attr'=>'Formal','pa_wbc_cloth_bottom_type_attr'=>'Pants','pa_wbc_cloth_fit_attr'=>'Slim fit','pa_wbc_cloth_closure_type_attr'=>'Button','pa_wbc_cloth_length_attr'=>'Regular')
                          )
                   )
          ),
          array(
          'title'=>'Jeans #20000013',
          'thumb'=>$_img_url.'men_black_jeans.jpg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_men_jeans_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_fabric_cotton_cat','wbc_pattern_plain_cat'),
          'attribute'=>array(
                    'pa_wbc_cloth_size_attr'=>array(
                              'name'=>'pa_wbc_cloth_size_attr',
                              'value'=>'28',
                              'position'=>0,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_colour_attr'=>array(
                              'name'=>'pa_wbc_cloth_colour_attr',
                              'value'=>'Black',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_occasion_attr'=>array(
                              'name'=>'pa_wbc_cloth_occasion_attr',
                              'value'=>'Causal',
                              'position'=>2,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_bottom_type_attr'=>array(
                              'name'=>'pa_wbc_cloth_bottom_type_attr',
                              'value'=>'Pants',
                              'position'=>3,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_fit_attr'=>array(
                              'name'=>'pa_wbc_cloth_fit_attr',
                              'value'=>'Regular fit',
                              'position'=>4,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_closure_type_attr'=>array(
                              'name'=>'pa_wbc_cloth_closure_type_attr',
                              'value'=>'Button',
                              'position'=>5,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_length_attr'=>array(
                              'name'=>'pa_wbc_cloth_length_attr',
                              'value'=>'Regular',
                              'position'=>6,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            )
                    ),
          'variation'=>array(
                          array(
                            'regular_price'=>'1350',
                            'price'=>'1340',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'28','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_bottom_type_attr'=>'Pants','pa_wbc_cloth_fit_attr'=>'Regular fit','pa_wbc_cloth_closure_type_attr'=>'Button','pa_wbc_cloth_length_attr'=>'Regular')
                          )
                   )
          ),
        array(
          'title'=>'Track pant #20000014',
          'thumb'=>$_img_url.'men_track.jpg',
          'images'=>array('men_black_track'),
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_men_track_pants_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_fabric_silk_cat','wbc_pattern_plain_cat'),
          'attribute'=>array(
                    'pa_wbc_cloth_size_attr'=>array(
                              'name'=>'pa_wbc_cloth_size_attr',
                              'value'=>'30',
                              'position'=>0,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_colour_attr'=>array(
                              'name'=>'pa_wbc_cloth_colour_attr',
                              'value'=>'Blue',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_occasion_attr'=>array(
                              'name'=>'pa_wbc_cloth_occasion_attr',
                              'value'=>'Causal',
                              'position'=>2,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_bottom_type_attr'=>array(
                              'name'=>'pa_wbc_cloth_bottom_type_attr',
                              'value'=>'Pants',
                              'position'=>3,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_fit_attr'=>array(
                              'name'=>'pa_wbc_cloth_fit_attr',
                              'value'=>'Skinny fit',
                              'position'=>4,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_closure_type_attr'=>array(
                              'name'=>'pa_wbc_cloth_closure_type_attr',
                              'value'=>'Frog & toggle',
                              'position'=>5,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_length_attr'=>array(
                              'name'=>'pa_wbc_cloth_length_attr',
                              'value'=>'Regular',
                              'position'=>6,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            )
                    ),
          'variation'=>array(
                          array(
                            'regular_price'=>'1200',
                            'price'=>'1190',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'30','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_bottom_type_attr'=>'Pants','pa_wbc_cloth_fit_attr'=>'Skinny fit','pa_wbc_cloth_closure_type_attr'=>'Frog & toggle','pa_wbc_cloth_length_attr'=>'Regular')
                          )
                   )
          ),
        array(
          'title'=>'Pant #20000015',
          'thumb'=>$_img_url.'women_black_pant.jpg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_women_trousers_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_fabric_cotton_cat','wbc_pattern_plain_cat'),
          'attribute'=>array(
                    'pa_wbc_cloth_size_attr'=>array(
                              'name'=>'pa_wbc_cloth_size_attr',
                              'value'=>'28',
                              'position'=>0,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_colour_attr'=>array(
                              'name'=>'pa_wbc_cloth_colour_attr',
                              'value'=>'Black',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_occasion_attr'=>array(
                              'name'=>'pa_wbc_cloth_occasion_attr',
                              'value'=>'Formal',
                              'position'=>2,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_bottom_type_attr'=>array(
                              'name'=>'pa_wbc_cloth_bottom_type_attr',
                              'value'=>'Pants',
                              'position'=>3,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_fit_attr'=>array(
                              'name'=>'pa_wbc_cloth_fit_attr',
                              'value'=>'Regular fit',
                              'position'=>4,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_closure_type_attr'=>array(
                              'name'=>'pa_wbc_cloth_closure_type_attr',
                              'value'=>'Elastic',
                              'position'=>5,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_length_attr'=>array(
                              'name'=>'pa_wbc_cloth_length_attr',
                              'value'=>'Regular',
                              'position'=>6,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            )
                    ),
          'variation'=>array(
                          array(
                            'regular_price'=>'850',
                            'price'=>'840',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'28','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_occasion_attr'=>'Formal','pa_wbc_cloth_bottom_type_attr'=>'Pants','pa_wbc_cloth_fit_attr'=>'Regular fit','pa_wbc_cloth_closure_type_attr'=>'Elastic','pa_wbc_cloth_length_attr'=>'Regular')
                          )
                   )
          ),
         array(
          'title'=>'Jeans #20000016',
          'thumb'=>$_img_url.'women_skyblue_jeans.jpg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_women_jeans_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_fabric_damask_cat','wbc_pattern_stripes_cat'),
          'attribute'=>array(
                    'pa_wbc_cloth_size_attr'=>array(
                              'name'=>'pa_wbc_cloth_size_attr',
                              'value'=>'30',
                              'position'=>0,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_colour_attr'=>array(
                              'name'=>'pa_wbc_cloth_colour_attr',
                              'value'=>'Blue',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_occasion_attr'=>array(
                              'name'=>'pa_wbc_cloth_occasion_attr',
                              'value'=>'Causal',
                              'position'=>2,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_bottom_type_attr'=>array(
                              'name'=>'pa_wbc_cloth_bottom_type_attr',
                              'value'=>'Pants',
                              'position'=>3,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_fit_attr'=>array(
                              'name'=>'pa_wbc_cloth_fit_attr',
                              'value'=>'Slim fit',
                              'position'=>4,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_closure_type_attr'=>array(
                              'name'=>'pa_wbc_cloth_closure_type_attr',
                              'value'=>'Button',
                              'position'=>5,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_length_attr'=>array(
                              'name'=>'pa_wbc_cloth_length_attr',
                              'value'=>'Regular',
                              'position'=>6,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            )
                    ),
          'variation'=>array(
                          array(
                            'regular_price'=>'1000',
                            'price'=>'990',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'30','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_bottom_type_attr'=>'Pants','pa_wbc_cloth_fit_attr'=>'Slim fit','pa_wbc_cloth_closure_type_attr'=>'Button','pa_wbc_cloth_length_attr'=>'Regular')
                          )
                   )
          ),
         array(
          'title'=>'Leggings #20000016',
          'thumb'=>$_img_url.'leggings.jpg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_leggings_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_fabric_silk_cat','wbc_pattern_plain_cat'),
          'attribute'=>array(
                    'pa_wbc_cloth_size_attr'=>array(
                              'name'=>'pa_wbc_cloth_size_attr',
                              'value'=>'30',
                              'position'=>0,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_colour_attr'=>array(
                              'name'=>'pa_wbc_cloth_colour_attr',
                              'value'=>'Black',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_occasion_attr'=>array(
                              'name'=>'pa_wbc_cloth_occasion_attr',
                              'value'=>'Causal',
                              'position'=>2,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_bottom_type_attr'=>array(
                              'name'=>'pa_wbc_cloth_bottom_type_attr',
                              'value'=>'Leggings',
                              'position'=>3,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_fit_attr'=>array(
                              'name'=>'pa_wbc_cloth_fit_attr',
                              'value'=>'Skinny fit',
                              'position'=>4,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_closure_type_attr'=>array(
                              'name'=>'pa_wbc_cloth_closure_type_attr',
                              'value'=>'Elastic',
                              'position'=>5,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_length_attr'=>array(
                              'name'=>'pa_wbc_cloth_length_attr',
                              'value'=>'Regular',
                              'position'=>6,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            )
                    ),
          'variation'=>array(
                          array(
                            'regular_price'=>'550',
                            'price'=>'545',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'30','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_bottom_type_attr'=>'Leggings','pa_wbc_cloth_fit_attr'=>'Skinny fit','pa_wbc_cloth_closure_type_attr'=>'Elastic','pa_wbc_cloth_length_attr'=>'Regular')
                          )
                   )
          ),
         array(
          'title'=>'Culottes #20000017',
          'thumb'=>$_img_url.'women_palazzos.jpg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_culotees_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_fabric_cotton_cat','wbc_pattern_printed_cat'),
          'attribute'=>array(
                    'pa_wbc_cloth_size_attr'=>array(
                              'name'=>'pa_wbc_cloth_size_attr',
                              'value'=>'32',
                              'position'=>0,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_colour_attr'=>array(
                              'name'=>'pa_wbc_cloth_colour_attr',
                              'value'=>'White',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_occasion_attr'=>array(
                              'name'=>'pa_wbc_cloth_occasion_attr',
                              'value'=>'Causal',
                              'position'=>2,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_bottom_type_attr'=>array(
                              'name'=>'pa_wbc_cloth_bottom_type_attr',
                              'value'=>'Culottes',
                              'position'=>3,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_fit_attr'=>array(
                              'name'=>'pa_wbc_cloth_fit_attr',
                              'value'=>'Flared',
                              'position'=>4,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_closure_type_attr'=>array(
                              'name'=>'pa_wbc_cloth_closure_type_attr',
                              'value'=>'Elastic',
                              'position'=>5,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_length_attr'=>array(
                              'name'=>'pa_wbc_cloth_length_attr',
                              'value'=>'Ankle',
                              'position'=>6,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            )
                    ),
          'variation'=>array(
                          array(
                            'regular_price'=>'1260',
                            'price'=>'1250',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'32','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_bottom_type_attr'=>'Culottes','pa_wbc_cloth_fit_attr'=>'Flared','pa_wbc_cloth_closure_type_attr'=>'Elastic','pa_wbc_cloth_length_attr'=>'Ankle')
                          )
                   )
          ),
          array(
          'title'=>'Jeans #20000018',
          'thumb'=>$_img_url.'women_black_pant.jpg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_women_jeans_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_fabric_cotton_cat','wbc_pattern_plain_cat'),
          'attribute'=>array(
                    'pa_wbc_cloth_size_attr'=>array(
                              'name'=>'pa_wbc_cloth_size_attr',
                              'value'=>'28',
                              'position'=>0,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_colour_attr'=>array(
                              'name'=>'pa_wbc_cloth_colour_attr',
                              'value'=>'Black',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_occasion_attr'=>array(
                              'name'=>'pa_wbc_cloth_occasion_attr',
                              'value'=>'Causal',
                              'position'=>2,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_bottom_type_attr'=>array(
                              'name'=>'pa_wbc_cloth_bottom_type_attr',
                              'value'=>'Pants',
                              'position'=>3,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_fit_attr'=>array(
                              'name'=>'pa_wbc_cloth_fit_attr',
                              'value'=>'Skinny fit',
                              'position'=>4,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_closure_type_attr'=>array(
                              'name'=>'pa_wbc_cloth_closure_type_attr',
                              'value'=>'Frog & toggle',
                              'position'=>5,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_length_attr'=>array(
                              'name'=>'pa_wbc_cloth_length_attr',
                              'value'=>'Ankle',
                              'position'=>6,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            )
                    ),
          'variation'=>array(
                          array(
                            'regular_price'=>'1200',
                            'price'=>'1190',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'28','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_bottom_type_attr'=>'Pants','pa_wbc_cloth_fit_attr'=>'Skinny fit','pa_wbc_cloth_closure_type_attr'=>'Frog & toggle','pa_wbc_cloth_length_attr'=>'Ankle')
                          )
                   )
          ),
         array(
          'title'=>'Palazzos #20000019',
          'thumb'=>$_img_url.'palazzos.jpg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_palazzos_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_fabric_canvas_cat','wbc_pattern_plain_cat'),
          'attribute'=>array(
                    'pa_wbc_cloth_size_attr'=>array(
                              'name'=>'pa_wbc_cloth_size_attr',
                              'value'=>'32',
                              'position'=>0,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_colour_attr'=>array(
                              'name'=>'pa_wbc_cloth_colour_attr',
                              'value'=>'Black',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_occasion_attr'=>array(
                              'name'=>'pa_wbc_cloth_occasion_attr',
                              'value'=>'Causal',
                              'position'=>2,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_bottom_type_attr'=>array(
                              'name'=>'pa_wbc_cloth_bottom_type_attr',
                              'value'=>'Palazzos',
                              'position'=>3,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_fit_attr'=>array(
                              'name'=>'pa_wbc_cloth_fit_attr',
                              'value'=>'Regular fit',
                              'position'=>4,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_closure_type_attr'=>array(
                              'name'=>'pa_wbc_cloth_closure_type_attr',
                              'value'=>'Hook',
                              'position'=>5,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_length_attr'=>array(
                              'name'=>'pa_wbc_cloth_length_attr',
                              'value'=>'Ankle',
                              'position'=>6,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            )
                    ),
          'variation'=>array(
                          array(
                            'regular_price'=>'1500',
                            'price'=>'1490',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'32','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_bottom_type_attr'=>'Palazzos','pa_wbc_cloth_fit_attr'=>'Regular fit','pa_wbc_cloth_closure_type_attr'=>'Hook','pa_wbc_cloth_length_attr'=>'Ankle')
                          )
                   )
          ),
          array(
          'title'=>'Pant #20000020',
          'thumb'=>$_img_url.'women_white_palazzos.jpg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_women_pants_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_fabric_cotton_cat','wbc_pattern_plain_cat'),
          'attribute'=>array(
                    'pa_wbc_cloth_size_attr'=>array(
                              'name'=>'pa_wbc_cloth_size_attr',
                              'value'=>'30',
                              'position'=>0,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_colour_attr'=>array(
                              'name'=>'pa_wbc_cloth_colour_attr',
                              'value'=>'White',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_occasion_attr'=>array(
                              'name'=>'pa_wbc_cloth_occasion_attr',
                              'value'=>'Causal',
                              'position'=>2,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_bottom_type_attr'=>array(
                              'name'=>'pa_wbc_cloth_bottom_type_attr',
                              'value'=>'Palazzos',
                              'position'=>3,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_fit_attr'=>array(
                              'name'=>'pa_wbc_cloth_fit_attr',
                              'value'=>'Regular fit',
                              'position'=>4,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_closure_type_attr'=>array(
                              'name'=>'pa_wbc_cloth_closure_type_attr',
                              'value'=>'Elastic',
                              'position'=>5,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_length_attr'=>array(
                              'name'=>'pa_wbc_cloth_length_attr',
                              'value'=>'Ankle',
                              'position'=>6,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            )
                    ),
          'variation'=>array(
                          array(
                            'regular_price'=>'1550',
                            'price'=>'1540',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'30','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_bottom_type_attr'=>'Palazzos','pa_wbc_cloth_fit_attr'=>'Regular fit','pa_wbc_cloth_closure_type_attr'=>'Elastic','pa_wbc_cloth_length_attr'=>'Ankle')
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

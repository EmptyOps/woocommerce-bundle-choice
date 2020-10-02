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
        $_img_url= constant('EOWBC_ASSET_URL').'img/sample_data/'.$this->asset_folder.'/attributes/'; 
        $_alphabets_img_url= constant('EOWBC_ASSET_URL').'img/sample_data/'.$this->asset_folder.'/alphabets/'; 
        return array(
                    array(
                        /* Language function - comment */ 
                        'label' => __('Size','woo-bundle-choice'),
                        'terms' => array('XS','S','M','L','XL','2XL','3XL','28','30','32','34','36','38'),
                        'description' => __('Size attributes for clothing wear','woo-bundle-choice'),
                        'slug' => 'wbc_cloth_size_attr'
                    ),
                    array(
                        /* Language function - comment */ 
                        'label' => __('Colour','woo-bundle-choice'),
                        'terms' => array('White','Black','Red','Purple', 'Blue', 'Green','Yellow','Orange','Gray','Pink','Maroon','Lime','Aqua'),
                        'description' => __('Colour attributes for clothing wear','woo-bundle-choice'),
                        'slug' => 'wbc_cloth_colour_attr',
                        'thumb' => array($_img_url.'colours/white.png',$_img_url.'colours/black.png',$_img_url.'colours/red.png', $_img_url.'colours/purple.png',$_img_url.'colours/blue.png',$_img_url.'colours/green.png',$_img_url.'colours/yellow.png',$_img_url.'colours/orange.png',$_img_url.'colours/gray.png',$_img_url.'colours/pink.png',$_img_url.'colours/maroon.png',$_img_url.'colours/lime.png',$_img_url.'colours/aqua.png')
                    ),
                    array(
                        /* Language function - comment */ 
                        'label' => __('Fabric','woo-bundle-choice'),
                        'terms' => array('Cotton', 'Silk', 'Canvas', 'Chiffon', 'Damask', 'Wool', 'Jersey', 'Polyester', 'Velvet','Linen'),
                        'description' => __('Fabric attributes for clothings wear','woo-bundle-choice'),
                        'slug' => 'wbc_cloth_fabric_attr'
                    ),
                    array(
                        /* Language function - comment */ 
                        'label' => __('Fit','woo-bundle-choice'),
                        'terms' => array('Skinny fit','Slim fit','Regular fit','Tapered fit','Hem fit', 'Ultra slim','Flared','Easy'),
                        'description' => __('Fit attributes for clothing wear','woo-bundle-choice'),
                        'slug' => 'wbc_cloth_fit_attr'
                    ),
                    array(
                        /* Language function - comment */ 
                        'label' => __('Neck','woo-bundle-choice'),
                        'terms' => array('Round','Crew' , 'Jewel', 'U neckline', 'Square' , 'V neckline', 'Collared neckline', 'Funnel Neckline'),
                        'description' => __('Neck types attributes for clothings wear','woo-bundle-choice'),
                        'slug' => 'wbc_cloth_neck_attr'
                    ),
                    array(
                        /* Language function - comment */ 
                        'label' => __('Occasion','woo-bundle-choice'),
                        'terms' => array('Causal','Formal','Lounge','Tie','Cocktail Attire','Ethnic'),
                        'description' => __('Occasion attributes for clothings wear','woo-bundle-choice'),
                        'slug' => 'wbc_cloth_occasion_attr'
                    ),
                    // array(
                    //     'label' => 'Pattern',
                    //     'terms' => array('Plain','Stripes','Checks', 'Plaid', 'Floral','Polka Dots','Printed','Detailing'),        
                    //     'description' => 'Pattern attributes for clothings wear',
                    //     'slug' => 'wbc_cloth_pattern_attr'
                    // ),
                    array(
                        /* Language function - comment */ 
                        'label' => __('Sleeve','woo-bundle-choice'),
                        'terms' => array('Long sleeve', 'Short sleeve', 'Roll-up sleeve','Sleeveless'),        
                        'description' => __('Sleeve attributes for clothings wear','woo-bundle-choice'),
                        'slug' => 'wbc_cloth_sleeve_attr'
                    ),
                    array(
                        /* Language function - comment */ 
                        'label' => __('Collar','woo-bundle-choice'),
                        'terms' => array('Mandrin', 'Band', 'Polo','Funnel','Slim','Spread','Regular','Mao','Notch Lapels'),
                        'description' => __('Collar attributes for clothings wear','woo-bundle-choice'),
                        'slug' => 'wbc_cloth_collar_attr',
                        'thumb' => array($_alphabets_img_url.'icons8-circled-m-100.png', $_alphabets_img_url.'icons8-circled-b-100.png', $_alphabets_img_url.'icons8-circled-p-100.png',$_alphabets_img_url.'icons8-circled-f-100.png',$_alphabets_img_url.'icons8-circled-s-100.png',$_alphabets_img_url.'icons8-circled-s-100.png',$_alphabets_img_url.'icons8-circled-r-100.png',$_alphabets_img_url.'icons8-circled-m-100.png',$_alphabets_img_url.'icons8-circled-n-100.png')
                    ),
                    array(
                        /* Language function - comment */ 
                        'label' => __('Closure Type','woo-bundle-choice'),
                        'terms' => array('Button','Zipper','Hook','Frog & toggle','Elastic'),
                        'description' => __('Closure type attributes for clothings wear','woo-bundle-choice'),
                        'slug' => 'wbc_cloth_closure_type_attr'
                    ),
                    array(
                        /* Language function - comment */ 
                        'label' => __('Length','woo-bundle-choice'),
                        'terms' => array('Ankle','Full','Calf','Thigh','Knee','Regular'),
                        'description' => __('Length attributes for clothings wear','woo-bundle-choice'),
                        'slug' => 'wbc_cloth_length_attr'
                    )
                    // array(
                    //     'label' => 'Bottom Type',
                    //     'terms' => array('Dhotis', 'Pants', 'Leggings','Palazzos','Sharara','Skirts', 'Culottes','Shorts'),
                    //     'description' => 'Bottom type attributes for clothings wear',
                    //     'slug' => 'wbc_cloth_bottom_type_attr'
                    // ),
                  ); 
    }

    public function get_categories() {
        $_img_url= constant('EOWBC_ASSET_URL').'img/sample_data/'.$this->asset_folder.'/category/';    // EO_WBC_PLUGIN_DIR.'EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/';
        $_alphabets_img_url= constant('EOWBC_ASSET_URL').'img/sample_data/'.$this->asset_folder.'/alphabets/';

        return array(
                    array(
                        'thumb' => '',
                        /* Language function - comment */ 
                        'name' => __('Top wear','woo-bundle-choice','woo-bundle-choice'),
                        'description' => 'Top wear category',
                        'slug' => 'wbc_top_wear_cat',
                        'child'=> 
                        array(
                                array(
                                    'thumb' => $_img_url.'shirts.png',
                                    'thumb_selected' => $_img_url.'shirts_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Shirts','woo-bundle-choice','woo-bundle-choice'),
                                    'description' => 'Top wear shirts',
                                    'slug' => 'wbc_top_wear_shirts_cat'
                                ),
                                // array(
                                //     'thumb' => $_img_url.'shirts.png',
                                //     'thumb_selected' => $_img_url.'shirts_selected.png',
                                //     'name'=> 'Men Shirts',
                                //     'description' => 'Top wear men shirts',
                                //     'slug' => 'wbc_top_wear_men_shirts_cat'
                                // ),
                                // array(
                                //     'thumb' => $_img_url.'shirts.png',
                                //     'thumb_selected' => $_img_url.'shirts_selected.png',
                                //     'name'=> 'Women Shirts',
                                //     'description' => 'Top wear women shirts',
                                //     'slug' => 'wbc_top_wear_women_shirts_cat'
                                // ),
                                array(
                                    'thumb' => $_img_url.'tshirt.png',
                                    'thumb_selected' => $_img_url.'tshirt_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('T-shirts','woo-bundle-choice'),
                                    'description' => 'Top wear t-shirts',
                                    'slug' => 'wbc_top_wear_tshirts_cat'
                                ),
                                // array(
                                //     'thumb' => $_img_url.'tshirt.png',
                                //     'thumb_selected' => $_img_url.'tshirt_selected.png',
                                //     'name' => 'Men T-shirts',
                                //     'description' => 'Top wear men t-shirts',
                                //     'slug' => 'wbc_top_wear_men_tshirts_cat'
                                // ),
                                // array(
                                //     'thumb' => $_img_url.'tshirt.png',
                                //     'thumb_selected' => $_img_url.'tshirt_selected.png',
                                //     'name' => 'Women T-shirts',
                                //     'description' => 'Top wear women t-shirts',
                                //     'slug' => 'wbc_top_wear_women_tshirts_cat'
                                // ),
                                array(
                                    'thumb' => $_img_url.'sweater.png',
                                    'thumb_selected' => $_img_url.'sweater_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Sweaters','woo-bundle-choice'),
                                    'description' => 'Top wear sweaters',
                                    'slug' => 'wbc_top_wear_sweaters_cat'
                                ),
                                // array(
                                //     'thumb' => $_img_url.'sweater.png',
                                //     'thumb_selected' => $_img_url.'sweater_selected.png',
                                //     'name' => 'Men Sweaters',
                                //     'description' => 'Top wear men sweaters',
                                //     'slug' => 'wbc_top_wear_men_sweaters_cat'
                                // ),
                                // array(
                                //     'thumb' => $_img_url.'sweater.png',
                                //     'thumb_selected' => $_img_url.'sweater_selected.png',
                                //     'name' => 'Women Sweaters',
                                //     'description' => 'Top wear women sweaters',
                                //     'slug' => 'wbc_top_wear_women_sweaters_cat'
                                // ),
                                array(
                                    'thumb' => $_img_url.'jacket.png',
                                    'thumb_selected' => $_img_url.'jacket_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Jackets','woo-bundle-choice'),
                                    'description' => 'Top wear Jackets',
                                    'slug' => 'wbc_top_wear_jackets_cat'
                                ),
                                // array(
                                //     'thumb' => $_img_url.'jacket.png',
                                //     'thumb_selected' => $_img_url.'jacket_selected.png',
                                //     'name' => 'Men Jackets',
                                //     'description' => 'Top wear men jackets',
                                //     'slug' => 'wbc_top_wear_men_jackets_cat'
                                // ),
                                // array(
                                //     'thumb' => $_img_url.'jacket.png',
                                //     'thumb_selected' => $_img_url.'jacket_selected.png',
                                //     'name' => 'Women Jackets',
                                //     'description' => 'Top wear women jackets',
                                //     'slug' => 'wbc_top_wear_women_jackets_cat'
                                // ),
                                array(
                                    'thumb' => $_img_url.'blazers.png',
                                    'thumb_selected' => $_img_url.'blazers_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Blazers & Coats','woo-bundle-choice'),
                                    'description' => 'Top wear blazers and coats',
                                    'slug' => 'wbc_top_wear_blazers_coats_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'suit.png',
                                    'thumb_selected' => $_img_url.'suit_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Suits','woo-bundle-choice'),
                                    'description' => 'Top wear suits',
                                    'slug' => 'wbc_top_wear_suits_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'hoodie.png',
                                    'thumb_selected' => $_img_url.'hoodie_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Hoodies','woo-bundle-choice'),
                                    'description' => 'Top wear hoodies',
                                    'slug' => 'wbc_top_wear_hoodies_cat'
                                ),
                                // array(
                                //     'thumb' => $_img_url.'hoodie.png',
                                //     'thumb_selected' => $_img_url.'hoodie_selected.png',
                                //     'name' => 'Men Hoodies',
                                //     'description' => 'Top wear men hoodies',
                                //     'slug' => 'wbc_top_wear_men_hoodies_cat'
                                // ),array(
                                //     'thumb' => $_img_url.'hoodie.png',
                                //     'thumb_selected' => $_img_url.'hoodie_selected.png',
                                //     'name' => 'Women Hoodies',
                                //     'description' => 'Top wear women hoodies',
                                //     'slug' => 'wbc_top_wear_women_hoodies_cat'
                                // ),
                                array(
                                    'thumb' => $_img_url.'tops.png',
                                    'thumb_selected' => $_img_url.'tops_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Tops','woo-bundle-choice'),
                                    'description' => 'Top wear tops',
                                    'slug' => 'wbc_top_wear_tops_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'tunic.png',
                                    'thumb_selected' => $_img_url.'tunic_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Tunics','woo-bundle-choice'),
                                    'description' => 'Top wear tunics',
                                    'slug' => 'wbc_top_wear_tunics_cat'
                                )
                                
                        )
                    ),
                    array(
                        'thumb' => '',
                        /* Language function - comment */ 
                        'name' => __('Bottom wear','woo-bundle-choice'),
                        'description' => 'Bottom wear category',
                        'slug' => 'wbc_bottom_wear_cat',
                        'child'=> 
                        array(
                                array(
                                    'thumb' => $_img_url.'trousers.png',
                                    'thumb_selected' => $_img_url.'trousers_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Trousers','woo-bundle-choice'),
                                    'description' => 'Bottom wear trousers',
                                    'slug' => 'wbc_bottom_wear_trousers_cat'
                                ),
                                // array(
                                //     'thumb' => $_img_url.'trousers.png',
                                //     'thumb_selected' => $_img_url.'trousers_selected.png',
                                //     'name' => 'Men Trousers',
                                //     'description' => 'Bottom wear men trousers',
                                //     'slug' => 'wbc_bottom_wear_men_trousers_cat'
                                // ),
                                // array(
                                //     'thumb' => $_img_url.'trousers.png',
                                //     'thumb_selected' => $_img_url.'trousers_selected.png',
                                //     'name' => 'Women Trousers',
                                //     'description' => 'Bottom wear women trousers',
                                //     'slug' => 'wbc_bottom_wear_women_trousers_cat'
                                // ),
                                array(
                                    'thumb' => $_img_url.'jeans.png',
                                    'thumb_selected' => $_img_url.'jeans_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Jeans','woo-bundle-choice'),
                                    'description' => 'Bottom wear jeans',
                                    'slug' => 'wbc_bottom_wear_jeans_cat'
                                ),
                                // array(
                                //     'thumb' => $_img_url.'jeans.png',
                                //     'thumb_selected' => $_img_url.'jeans_selected.png',
                                //     'name' => 'Men Jeans',
                                //     'description' => 'Bottom wear men jeans',
                                //     'slug' => 'wbc_bottom_wear_men_jeans_cat'
                                // ),
                                // array(
                                //     'thumb' => $_img_url.'jeans.png',
                                //     'thumb_selected' => $_img_url.'jeans_selected.png',
                                //     'name' => 'Women Jeans',
                                //     'description' => 'Bottom wear women jeans',
                                //     'slug' => 'wbc_bottom_wear_women_jeans_cat'
                                // ),
                                array(
                                    'thumb' => $_img_url.'shorts.png',
                                    'thumb_selected' => $_img_url.'shorts_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Shorts','woo-bundle-choice'),
                                    'description' => 'Bottom wear shorts',
                                    'slug' => 'wbc_bottom_wear_shorts_cat'
                                ),
                                // array(
                                //     'thumb' => $_img_url.'shorts.png',
                                //     'thumb_selected' => $_img_url.'shorts_selected.png',
                                //     'name' => 'Men Shorts',
                                //     'description' => 'Bottom wear men shorts',
                                //     'slug' => 'wbc_bottom_wear_men_shorts_cat'
                                // ),
                                // array(
                                //     'thumb' => $_img_url.'shorts.png',
                                //     'thumb_selected' => $_img_url.'shorts_selected.png',
                                //     'name' => 'Women Shorts',
                                //     'description' => 'Bottom wear women shorts',
                                //     'slug' => 'wbc_bottom_wear_women_shorts_cat'
                                // ),
                                array(
                                    'thumb' => $_img_url.'track.png',
                                    'thumb_selected' => $_img_url.'track_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Track pants','woo-bundle-choice'),
                                    'description' => 'Bottom wear track pants',
                                    'slug' => 'wbc_bottom_wear_track_pants_cat'
                                ),
                                // array(
                                //     'thumb' => $_img_url.'track.png',
                                //     'thumb_selected' => $_img_url.'track_selected.png',
                                //     'name' => 'Men track pants',
                                //     'description' => 'Bottom wear men track pants',
                                //     'slug' => 'wbc_bottom_wear_men_track_pants_cat'
                                // ),
                                // array(
                                //     'thumb' => $_img_url.'track.png',
                                //     'thumb_selected' => $_img_url.'track_selected.png',
                                //     'name' => 'Women track pants',
                                //     'description' => 'Bottom wear women track pants',
                                //     'slug' => 'wbc_bottom_wear_women_track_pants_cat'
                                // ),
                                array(
                                    'thumb' => $_img_url.'palazzos.png',
                                    'thumb_selected' => $_img_url.'palazzos_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Palazzos','woo-bundle-choice'),
                                    'description' => 'Bottom wear palazzos',
                                    'slug' => 'wbc_bottom_wear_plazzos_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'skirt.png',
                                    'thumb_selected' => $_img_url.'skirt_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Skirts','woo-bundle-choice'),
                                    'description' => 'Bottom wear skirts',
                                    'slug' => 'wbc_bottom_wear_skirts_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'leggings.png',
                                    'thumb_selected' => $_img_url.'leggings_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Leggings','woo-bundle-choice'),
                                    'description' => 'Bottom wear leggings',
                                    'slug' => 'wbc_bottom_wear_leggings_cat'
                                )
                        )
                    ),
                    array(
                        'thumb' => '',
                        /* Language function - comment */ 
                        'name' => __('Top wear','woo-bundle-choice'),
                        'description' => 'Top-wear category',
                        'slug' => 'wbc_topwear_cat',
                        'child'=> 
                        array(
                                array(
                                    // 'thumb' => $_img_url.'shirts.png',
                                    // 'thumb_selected' => $_img_url.'shirts_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Men white shirts','woo-bundle-choice'),
                                    'description' => 'Men white shirts',
                                    'slug' => 'wbc_men_white_shirts_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'shirts.png',
                                    // 'thumb_selected' => $_img_url.'shirts_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Men black shirts','woo-bundle-choice'),
                                    'description' => 'Men balck shirts',
                                    'slug' => 'wbc_men_black_shirts_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'shirts.png',
                                    // 'thumb_selected' => $_img_url.'shirts_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Men white shirts black bottom only','woo-bundle-choice'),
                                    'description' => 'Men white shirts black bottom only',
                                    'slug' => 'wbc_men_white_shirts_blackbottom_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'shirts.png',
                                    // 'thumb_selected' => $_img_url.'shirts_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Men blue shirts blue bottom only','woo-bundle-choice'),
                                    'description' => 'Men blue shirts blue bottom only',
                                    'slug' => 'wbc_men_blue_shirts_bluebottom_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'shirts.png',
                                    // 'thumb_selected' => $_img_url.'shirts_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Men blue blazer black bottom only','woo-bundle-choice'),
                                    'description' => 'Men blue blazer black bottom only',
                                    'slug' => 'wbc_men_blue_blazers_blackbottom_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'shirts.png',
                                    // 'thumb_selected' => $_img_url.'shirts_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Men light blue blazer','woo-bundle-choice'),
                                    'description' => 'Men light blue blazer',
                                    'slug' => 'wbc_men_lightblue_blazers_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'shirts.png',
                                    // 'thumb_selected' => $_img_url.'shirts_selected.png',
                                    'name' => __('Men gray blazer','woo-bundle-choice'),
                                    'description' => 'Men gray blazer',
                                    'slug' => 'wbc_men_gray_blazers_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'shirts.png',
                                    // 'thumb_selected' => $_img_url.'shirts_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Men blue shirts','woo-bundle-choice'),
                                    'description' => 'Men blue shirts',
                                    'slug' => 'wbc_men_blue_shirts_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'shirts.png',
                                    // 'thumb_selected' => $_img_url.'shirts_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Men green shirts','woo-bundle-choice'),
                                    'description' => 'Men green shirts',
                                    'slug' => 'wbc_men_green_shirts_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'shirts.png',
                                    // 'thumb_selected' => $_img_url.'shirts_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Men black Jockey tshirts','woo-bundle-choice'),
                                    'description' => 'Men black Jockey tshirts',
                                    'slug' => 'wbc_men_black_jockey_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'shirts.png',
                                    // 'thumb_selected' => $_img_url.'shirts_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Men white Jockey tshirts','woo-bundle-choice'),
                                    'description' => 'Men white Jockey tshirts',
                                    'slug' => 'wbc_men_white_jockey_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'shirts.png',
                                    // 'thumb_selected' => $_img_url.'shirts_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Men gray shirts','woo-bundle-choice'),
                                    'description' => 'Men gray shirts',
                                    'slug' => 'wbc_men_gray_shirts_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'shirts.png',
                                    // 'thumb_selected' => $_img_url.'shirts_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Men black shirts','woo-bundle-choice'),
                                    'description' => 'Men black shirts',
                                    'slug' => 'wbc_men_black_shirts_cat'
                                ),
                                //women
                                array(
                                    // 'thumb' => $_img_url.'shirts.png',
                                    // 'thumb_selected' => $_img_url.'shirts_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Women white shirts','woo-bundle-choice'),
                                    'description' => 'Women white shirts',
                                    'slug' => 'wbc_women_white_shirts_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'shirts.png',
                                    // 'thumb_selected' => $_img_url.'shirts_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Women white shirts','woo-bundle-choice'),
                                    'description' => 'Women white shirts',
                                    'slug' => 'wbc_women_whiteshirts_blackbottom_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'shirts.png',
                                    // 'thumb_selected' => $_img_url.'shirts_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Women black shirts','woo-bundle-choice'),
                                    'description' => 'Women black shirts',
                                    'slug' => 'wbc_women_black_shirts_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'tshirt.png',
                                    // 'thumb_selected' => $_img_url.'tshirt_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Women blue shirts','woo-bundle-choice'),
                                    'description' => 'Women blue shirts',
                                    'slug' => 'wbc_women_blue_shirts_cat'
                                ),
                                //men -tshirt
                                array(
                                    // 'thumb' => $_img_url.'tshirt.png',
                                    // 'thumb_selected' => $_img_url.'tshirt_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Men white tshirts','woo-bundle-choice'),
                                    'description' => 'Men white tshirts',
                                    'slug' => 'wbc_men_white_tshirts_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'tshirt.png',
                                    // 'thumb_selected' => $_img_url.'tshirt_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Men black tshirts','woo-bundle-choice'),
                                    'description' => 'Men black tshirts',
                                    'slug' => 'wbc_men_black_tshirts_cat'
                                ),
                                //women-tshirt
                                array(
                                    // 'thumb' => $_img_url.'tshirt.png',
                                    // 'thumb_selected' => $_img_url.'tshirt_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Women white tshirts','woo-bundle-choice'),
                                    'description' => 'Women white tshirts',
                                    'slug' => 'wbc_women_white_tshirts_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'tshirt.png',
                                    // 'thumb_selected' => $_img_url.'tshirt_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Women black tshirts','woo-bundle-choice'),
                                    'description' => 'Women black tshirts',
                                    'slug' => 'wbc_women_black_tshirts_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'tshirt.png',
                                    // 'thumb_selected' => $_img_url.'tshirt_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Women red tshirts','woo-bundle-choice'),
                                    'description' => 'Women red tshirts',
                                    'slug' => 'wbc_women_red_tshirts_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'tshirt.png',
                                    // 'thumb_selected' => $_img_url.'tshirt_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Women white tshirts','woo-bundle-choice'),
                                    'description' => 'Women white tshirts',
                                    'slug' => 'wbc_women_white_tshirts_blackbottom_cat'
                                ),
                                //sweater-men
                                array(
                                    // 'thumb' => $_img_url.'sweater.png',
                                    // 'thumb_selected' => $_img_url.'sweater_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Men white sweater','woo-bundle-choice'),
                                    'description' => 'Men white sweater',
                                    'slug' => 'wbc_men_white_sweater_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'sweater.png',
                                    // 'thumb_selected' => $_img_url.'sweater_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Men black sweater','woo-bundle-choice'),
                                    'description' => 'Men balck sweater',
                                    'slug' => 'wbc_men_black_sweater_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'sweater.png',
                                    // 'thumb_selected' => $_img_url.'sweater_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Men green sweater','woo-bundle-choice'),
                                    'description' => 'Men green sweater',
                                    'slug' => 'wbc_men_green_sweater_cat'
                                ),
                                //women-sweater
                                array(
                                    // 'thumb' => $_img_url.'sweater.png',
                                    // 'thumb_selected' => $_img_url.'sweater_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Women green sweater','woo-bundle-choice'),
                                    'description' => 'Women green sweater',
                                    'slug' => 'wbc_women_green_sweater_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'sweater.png',
                                    // 'thumb_selected' => $_img_url.'sweater_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Women purple sweater','woo-bundle-choice'),
                                    'description' => 'Women purple sweater',
                                    'slug' => 'wbc_women_purple_sweater_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'sweater.png',
                                    // 'thumb_selected' => $_img_url.'sweater_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Women gray sweater','woo-bundle-choice'),
                                    'description' => 'Women gray sweater',
                                    'slug' => 'wbc_women_gray_sweater_cat'
                                ),
                                //men-jacket
                                array(
                                    // 'thumb' => $_img_url.'jacket.png',
                                    // 'thumb_selected' => $_img_url.'jacket_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Men white jacket','woo-bundle-choice'),
                                    'description' => 'Men white jacket',
                                    'slug' => 'wbc_men_white_jacket_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'jacket.png',
                                    // 'thumb_selected' => $_img_url.'jacket_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Men black jacket','woo-bundle-choice'),
                                    'description' => 'Men balck jacket',
                                    'slug' => 'wbc_men_black_jacket_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'jacket.png',
                                    // 'thumb_selected' => $_img_url.'jacket_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Men orange jacket','woo-bundle-choice'),
                                    'description' => 'Men orange jacket',
                                    'slug' => 'wbc_men_orange_jacket_cat'
                                ),
                                //women-jacket
                                array(
                                    // 'thumb' => $_img_url.'jacket.png',
                                    // 'thumb_selected' => $_img_url.'jacket_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Women blue jacket','woo-bundle-choice'),
                                    'description' => 'Women blue jacket',
                                    'slug' => 'wbc_women_blue_jacket_cat'
                                ),
                                //men-blazer
                                array(
                                    // 'thumb' => $_img_url.'blazers.png',
                                    // 'thumb_selected' => $_img_url.'blazers_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Men black blazers','woo-bundle-choice'),
                                    'description' => 'Men balck blazers',
                                    'slug' => 'wbc_men_black_blazers_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'blazers.png',
                                    // 'thumb_selected' => $_img_url.'blazers_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Men blue blazers','woo-bundle-choice'),
                                    'description' => 'Men blue blazers',
                                    'slug' => 'wbc_men_blue_blazers_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'blazers.png',
                                    // 'thumb_selected' => $_img_url.'blazers_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Men green blazers','woo-bundle-choice'),
                                    'description' => 'Men green blazers',
                                    'slug' => 'wbc_men_green_blazers_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'blazers.png',
                                    // 'thumb_selected' => $_img_url.'blazers_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Men purple blazers','woo-bundle-choice'),
                                    'description' => 'Men purple blazers',
                                    'slug' => 'wbc_men_purple_blazers_cat'
                                ),
                                //men-suit
                                array(
                                    // 'thumb' => $_img_url.'suit.png',
                                    // 'thumb_selected' => $_img_url.'suit_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Men orange suit','woo-bundle-choice'),
                                    'description' => 'Men orange suit',
                                    'slug' => 'wbc_men_orange_suit_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'suit.png',
                                    // 'thumb_selected' => $_img_url.'suit_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Men blue suit','woo-bundle-choice'),
                                    'description' => 'Men blue suit',
                                    'slug' => 'wbc_men_blue_suit_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'suit.png',
                                    // 'thumb_selected' => $_img_url.'suit_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Men purple suit','woo-bundle-choice'),
                                    'description' => 'Men purple blue suit',
                                    'slug' => 'wbc_men_purple_suits_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'suit.png',
                                    // 'thumb_selected' => $_img_url.'suit_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Men light gray suit','woo-bundle-choice'),
                                    'description' => 'Men light gray suit',
                                    'slug' => 'wbc_men_lightgray_suit_cat'
                                ),
                                //men-hoodie
                                
                                array(
                                    // 'thumb' => $_img_url.'hoodie.png',
                                    // 'thumb_selected' => $_img_url.'hoodie_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Men white hoodie','woo-bundle-choice'),
                                    'description' => 'Men white hoodie',
                                    'slug' => 'wbc_men_white_hoddies_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'hoodie.png',
                                    // 'thumb_selected' => $_img_url.'hoodie_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Men black hoodie','woo-bundle-choice'),
                                    'description' => 'Men balck hoodie',
                                    'slug' => 'wbc_men_black_hoodie_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'hoodie.png',
                                    // 'thumb_selected' => $_img_url.'hoodie_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Men green hoodie','woo-bundle-choice'),
                                    'description' => 'Men green hoodie',
                                    'slug' => 'wbc_men_green_hoodie_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'hoodie.png',
                                    // 'thumb_selected' => $_img_url.'hoodie_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Men red hoodie','woo-bundle-choice'),
                                    'description' => 'Men red hoodie',
                                    'slug' => 'wbc_men_red_hoodie_cat'
                                ),
                                //women-hoodies 
                                array(
                                    // 'thumb' => $_img_url.'hoodie.png',
                                    // 'thumb_selected' => $_img_url.'hoodie_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Women blue hoodie','woo-bundle-choice'),
                                    'description' => 'Women blue hoodie',
                                    'slug' => 'wbc_women_blue_hoodie_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'hoodie.png',
                                    // 'thumb_selected' => $_img_url.'hoodie_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Women red hoodie','woo-bundle-choice'),
                                    'description' => 'Women red hoodie',
                                    'slug' => 'wbc_women_red_hoodie_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'hoodie.png',
                                    // 'thumb_selected' => $_img_url.'hoodie_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Women yellow hoodie','woo-bundle-choice'),
                                    'description' => 'Women yellow hoodie',
                                    'slug' => 'wbc_women_yellow_hoodie_cat'
                                ),
                                // women-tops 
                                array(
                                    // 'thumb' => $_img_url.'tops.png',
                                    // 'thumb_selected' => $_img_url.'tops_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Women black tops','woo-bundle-choice'),
                                    'description' => 'Women balck tops',
                                    'slug' => 'wbc_Women_black_tops_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'tops.png',
                                    // 'thumb_selected' => $_img_url.'tops_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Women green tops','woo-bundle-choice'),
                                    'description' => 'Women green tops',
                                    'slug' => 'wbc_women_green_tops_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'tops.png',
                                    // 'thumb_selected' => $_img_url.'tops_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Women red tops','woo-bundle-choice'),
                                    'description' => 'Women red tops',
                                    'slug' => 'wbc_women_red_tops_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'tops.png',
                                    // 'thumb_selected' => $_img_url.'tops_selected.png',
<<<<<<< HEAD
                                    /* Language function - comment */ 
                                    'name' => __('Women purple tops','woo-bundle-choice'),
                                    'description' => 'Women purple tops',
                                    'slug' => 'wbc_women_purple_tops_cat'
=======
                                    'name' => 'Women maroon tops',
                                    'description' => 'Women maroon tops',
                                    'slug' => 'wbc_women_maroon_tops_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'tops.png',
                                    // 'thumb_selected' => $_img_url.'tops_selected.png',
                                    'name' => 'Women maroon tops',
                                    'description' => 'Women maroon tops',
                                    'slug' => 'wbc_women_maroon_tops_bluebottom_cat'
>>>>>>> dev
                                ),
                                array(
                                    // 'thumb' => $_img_url.'tops.png',
                                    // 'thumb_selected' => $_img_url.'tops_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Women pink tops','woo-bundle-choice'),
                                    'description' => 'Women pink tops',
                                    'slug' => 'wbc_women_pink_tops_cat'
                                ),
                                //tunic
                                array(
                                    // 'thumb' => $_img_url.'tunic.png',
                                    // 'thumb_selected' => $_img_url.'tunic_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Women white tunic','woo-bundle-choice'),
                                    'description' => 'Women white tunic',
                                    'slug' => 'wbc_women_white_tunic_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'tunic.png',
                                    // 'thumb_selected' => $_img_url.'tunic_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Women white tunic','woo-bundle-choice'),
                                    'description' => 'Women white tunic',
                                    'slug' => 'wbc_women_whitetunic_bluebottom_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'tunic.png',
                                    // 'thumb_selected' => $_img_url.'tunic_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Women orange tunic','woo-bundle-choice'),
                                    'description' => 'Women orange tunic',
                                    'slug' => 'wbc_women_orange_tunic_cat'
                                )

                        )
                    ),
                    array(
                        'thumb' => '',
                        /* Language function - comment */ 
                        'name' => __('Bottom wear','woo-bundle-choice'),
                        'description' => 'Bottom-wear category',
                        'slug' => 'wbc_bottomwear_cat',
                        'child'=> 
                        array(
                                array(
                                    // 'thumb' => $_img_url.'trousers.png',
                                    // 'thumb_selected' => $_img_url.'trousers_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Men white trouser','woo-bundle-choice'),
                                    'description' => 'Men white trousers',
                                    'slug' => 'wbc_men_white_trousers_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'trousers.png',
                                    // 'thumb_selected' => $_img_url.'trousers_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Men maroon trouser','woo-bundle-choice'),
                                    'description' => 'Men maroon trousers',
                                    'slug' => 'wbc_men_maroon_trousers_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'trousers.png',
                                    // 'thumb_selected' => $_img_url.'trousers_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Men gray trouser','woo-bundle-choice'),
                                    'description' => 'Men gray trousers',
                                    'slug' => 'wbc_men_gray_trousers_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'trousers.png',
                                    // 'thumb_selected' => $_img_url.'trousers_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Men orange suit trouser','woo-bundle-choice'),
                                    'description' => 'Men orange suit trouser',
                                    'slug' => 'wbc_men_orange_suitpant_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'trousers.png',
                                    // 'thumb_selected' => $_img_url.'trousers_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Men blue suit trouser','woo-bundle-choice'),
                                    'description' => 'Men blue suit trouser',
                                    'slug' => 'wbc_men_blue_suitpant_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'trousers.png',
                                    // 'thumb_selected' => $_img_url.'trousers_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Men gray suit trouser','woo-bundle-choice'),
                                    'description' => 'Men gray suit trouser',
                                    'slug' => 'wbc_men_gray_suitpant_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'trousers.png',
                                    // 'thumb_selected' => $_img_url.'trousers_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Men light gray suit trouser','woo-bundle-choice'),
                                    'description' => 'Men light gray suit trouser',
                                    'slug' => 'wbc_men_lightgray_suitpant_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'trousers.png',
                                    // 'thumb_selected' => $_img_url.'trousers_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Men black trouser','woo-bundle-choice'),
                                    'description' => 'Men black trousers',
                                    'slug' => 'wbc_men_black_trousers_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'trousers.png',
                                    // 'thumb_selected' => $_img_url.'trousers_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Men green trouser','woo-bundle-choice'),
                                    'description' => 'Men green trousers',
                                    'slug' => 'wbc_men_green_trousers_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'trousers.png',
                                    // 'thumb_selected' => $_img_url.'trousers_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Men blue trouser','woo-bundle-choice'),
                                    'description' => 'Men blue trousers',
                                    'slug' => 'wbc_men_blue_trousers_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'trousers.png',
                                    // 'thumb_selected' => $_img_url.'trousers_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Men purple suit trouser','woo-bundle-choice'),
                                    'description' => 'Men purple suit trousers',
                                    'slug' => 'wbc_men_purple_suitspant_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'trousers.png',
                                    // 'thumb_selected' => $_img_url.'trousers_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Men yellow trouser','woo-bundle-choice'),
                                    'description' => 'Men yellow trousers',
                                    'slug' => 'wbc_men_yellow_trousers_cat'
                                ),
                                //women-trousers
                                array(
                                    // 'thumb' => $_img_url.'trousers.png',
                                    // 'thumb_selected' => $_img_url.'trousers_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Women white trouser','woo-bundle-choice'),
                                    'description' => 'Women white trousers',
                                    'slug' => 'wbc_women_white_trousers_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'trousers.png',
                                    // 'thumb_selected' => $_img_url.'trousers_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Women black trouser','woo-bundle-choice'),
                                    'description' => 'Women black trousers',
                                    'slug' => 'wbc_women_black_trousers_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'trousers.png',
                                    // 'thumb_selected' => $_img_url.'trousers_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Women blue trouser','woo-bundle-choice'),
                                    'description' => 'Women blue trousers',
                                    'slug' => 'wbc_women_blue_trousers_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'trousers.png',
                                    // 'thumb_selected' => $_img_url.'trousers_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Women pink trouser','woo-bundle-choice'),
                                    'description' => 'Women pink trousers',
                                    'slug' => 'wbc_women_pink_trousers_cat'
                                ),
                                //men-jeans
                                array(
                                    // 'thumb' => $_img_url.'jeans.png',
                                    // 'thumb_selected' => $_img_url.'jeans_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Men black jeans','woo-bundle-choice'),
                                    'description' => 'Men black jeans',
                                    'slug' => 'wbc_men_black_jeans_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'jeans.png',
                                    // 'thumb_selected' => $_img_url.'jeans_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Men blue jeans','woo-bundle-choice'),
                                    'description' => 'Men blue jeans',
                                    'slug' => 'wbc_men_blue_jeans_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'jeans.png',
                                    // 'thumb_selected' => $_img_url.'jeans_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Men white jeans','woo-bundle-choice'),
                                    'description' => 'Men white jeans',
                                    'slug' => 'wbc_men_white_jeans_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'jeans.png',
                                    // 'thumb_selected' => $_img_url.'jeans_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Men light blue jeans','woo-bundle-choice'),
                                    'description' => 'Men light blue jeans',
                                    'slug' => 'wbc_men_lightblue_jeans_cat'
                                ),
                                //women-jeans
                                array(
                                    // 'thumb' => $_img_url.'jeans.png',
                                    // 'thumb_selected' => $_img_url.'jeans_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Women black jeans','woo-bundle-choice'),
                                    'description' => 'Women black jeans',
                                    'slug' => 'wbc_women_black_jeans_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'jeans.png',
                                    // 'thumb_selected' => $_img_url.'jeans_selected.png',
<<<<<<< HEAD
                                    /* Language function - comment */ 
                                    'name' => __('Women blue jeans','woo-bundle-choice'),
=======
                                    'name' => 'Women blue jogger jeans',
                                    'description' => 'Women blue jogger jeans',
                                    'slug' => 'wbc_women_blue_jogger_jeans_cat'
                                ),
                                 array(
                                    // 'thumb' => $_img_url.'jeans.png',
                                    // 'thumb_selected' => $_img_url.'jeans_selected.png',
                                    'name' => 'Women blue jeans',
>>>>>>> dev
                                    'description' => 'Women blue jeans',
                                    'slug' => 'wbc_women_blue_jeans_cat'
                                ),
                                 array(
                                    // 'thumb' => $_img_url.'jeans.png',
                                    // 'thumb_selected' => $_img_url.'jeans_selected.png',
<<<<<<< HEAD
                                    /* Language function - comment */ 
                                    'name' => __('Women sky blue jeans','woo-bundle-choice'),
                                    'description' => 'Women sky blue jeans',
                                    'slug' => 'wbc_women_skyblue_jeans_cat'
=======
                                    'name' => 'Women blue jeans',
                                    'description' => 'Women blue jeans',
                                    'slug' => 'wbc_women_darkblue_jeans_cat'
>>>>>>> dev
                                ),
                                //men-shorts
                                array(
                                    // 'thumb' => $_img_url.'shorts.png',
                                    // 'thumb_selected' => $_img_url.'shorts_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Men white shorts','woo-bundle-choice'),
                                    'description' => 'Men white shorts',
                                    'slug' => 'wbc_men_white_shorts_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'shorts.png',
                                    // 'thumb_selected' => $_img_url.'shorts_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Men black shorts','woo-bundle-choice'),
                                    'description' => 'Men black shorts',
                                    'slug' => 'wbc_men_black_shorts_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'shorts.png',
                                    // 'thumb_selected' => $_img_url.'shorts_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Men blue shorts','woo-bundle-choice'),
                                    'description' => 'Men blue shorts',
                                    'slug' => 'wbc_men_blue_shorts_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'shorts.png',
                                    // 'thumb_selected' => $_img_url.'shorts_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Men gray shorts','woo-bundle-choice'),
                                    'description' => 'Men gray shorts',
                                    'slug' => 'wbc_men_gray_shorts_cat'
                                ),
                                //women-shorts
                                array(
                                    // 'thumb' => $_img_url.'shorts.png',
                                    // 'thumb_selected' => $_img_url.'shorts_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Women black shorts','woo-bundle-choice'),
                                    'description' => 'Women black shorts',
                                    'slug' => 'wbc_women_black_shorts_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'shorts.png',
                                    // 'thumb_selected' => $_img_url.'jeans_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Women blue shorts','woo-bundle-choice'),
                                    'description' => 'Women blue shorts',
                                    'slug' => 'wbc_women_blue_shorts_cat'
                                ),
                                //men-track
                                array(
                                    // 'thumb' => $_img_url.'track.png',
                                    // 'thumb_selected' => $_img_url.'track_selected.png',
                                    /* Language function - comment */ 
                                    'name' => __('Men white track','woo-bundle-choice'),
                                    'description' => 'Men white track',
                                    'slug' => 'wbc_men_white_track_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'track.png',
                                    // 'thumb_selected' => $_img_url.'track_selected.png',
                                    'name' => __('Men gray track','woo-bundle-choice'),
                                    'description' => 'Men gray track',
                                    'slug' => 'wbc_men_gray_track_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'track.png',
                                    // 'thumb_selected' => $_img_url.'track_selected.png',
                                    'name' => __('Men black track','woo-bundle-choice'),
                                    'description' => 'Men black track',
                                    'slug' => 'wbc_men_black_track_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'track.png',
                                    // 'thumb_selected' => $_img_url.'track_selected.png',
                                    'name' => __('Men black track','woo-bundle-choice'),
                                    'description' => 'Men black track',
                                    'slug' => 'wbc_men_blue_track_cat'
                                ),
                                //women-track
                                array(
                                    // 'thumb' => $_img_url.'track.png',
                                    // 'thumb_selected' => $_img_url.'track_selected.png',
                                    'name' => __('Women black track','woo-bundle-choice'),
                                    'description' => 'Women black track',
                                    'slug' => 'wbc_women_black_track_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'track.png',
                                    // 'thumb_selected' => $_img_url.'track_selected.png',
                                    'name' => __('Women blue track','woo-bundle-choice'),
                                    'description' => 'Women blue track',
                                    'slug' => 'wbc_women_blue_track_cat'
                                ),
                                //women-plazzo
                                array(
                                    // 'thumb' => $_img_url.'palazzos.png',
                                    // 'thumb_selected' => $_img_url.'palazzos_selected.png',
                                    'name' => __('Women white palazzos','woo-bundle-choice'),
                                    'description' => 'Women white palazzos',
                                    'slug' => 'wbc_women_white_palazzos_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'palazzos.png',
                                    // 'thumb_selected' => $_img_url.'palazzos_selected.png',
                                    'name' => __('Women black palazzos','woo-bundle-choice'),
                                    'description' => 'Women palazzos palazzos',
                                    'slug' => 'wbc_women_black_palazzos_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'palazzos.png',
                                    // 'thumb_selected' => $_img_url.'palazzos_selected.png',
                                    'name' => __('Women blue palazzos','woo-bundle-choice'),
                                    'description' => 'Women blue palazzos',
                                    'slug' => 'wbc_women_blue_palazzos_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'palazzos.png',
                                    // 'thumb_selected' => $_img_url.'palazzos_selected.png',
                                    'name' => __('Women sky blue palazzos','woo-bundle-choice'),
                                    'description' => 'Women sky blue palazzos',
                                    'slug' => 'wbc_women_skyblue_palazzos_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'palazzos.png',
                                    // 'thumb_selected' => $_img_url.'palazzos_selected.png',
                                    'name' => __('Women orange palazzos','woo-bundle-choice'),
                                    'description' => 'Women orange palazzos',
                                    'slug' => 'wbc_women_orange_palazzos_cat'
                                ),
                                //skirt
                                array(
                                    // 'thumb' => $_img_url.'skirt.png',
                                    // 'thumb_selected' => $_img_url.'skirt_selected.png',
                                    'name' => __('Women black skirt','woo-bundle-choice'),
                                    'description' => 'Women palazzos skirt',
                                    'slug' => 'wbc_women_black_skirt_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'skirt.png',
                                    // 'thumb_selected' => $_img_url.'skirt_selected.png',
                                    'name' => __('Women red skirt','woo-bundle-choice'),
                                    'description' => 'Women red skirt',
                                    'slug' => 'wbc_women_red_skirt_cat'
                                ),
                                //women-leggings
                                array(
                                    // 'thumb' => $_img_url.'leggings.png',
                                    // 'thumb_selected' => $_img_url.'leggings_selected.png',
                                    'name' => __('Women white leggings','woo-bundle-choice'),
                                    'description' => 'Women white leggings',
                                    'slug' => 'wbc_women_white_leggings_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'leggings.png',
                                    // 'thumb_selected' => $_img_url.'leggings_selected.png',
                                    'name' => __('Women blue leggings','woo-bundle-choice'),
                                    'description' => 'Women blue leggings',
                                    'slug' => 'wbc_women_blue_leggings_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'leggings.png',
                                    // 'thumb_selected' => $_img_url.'leggings_selected.png',
                                    'name' => __('Women black leggings','woo-bundle-choice'),
                                    'description' => 'Women black leggings',
                                    'slug' => 'wbc_women_black_leggings_cat'
                                ),
                                array(
                                    // 'thumb' => $_img_url.'leggings.png',
                                    // 'thumb_selected' => $_img_url.'leggings_selected.png',
                                    'name' => __('Women gray leggings','woo-bundle-choice'),
                                    'description' => 'Women gray leggings',
                                    'slug' => 'wbc_women_gray_leggings_cat'
                                )
                        )
                    ),
                    array(
                        'thumb' => '',
                        'name' => __('Fabric','woo-bundle-choice'),
                        'description' => 'Fabric category',
                        'slug' => 'wbc_fabric_cat',
                        'child'=> 
                        array(
                                array(
                                    'thumb' => $_img_url.'fabric.png',
                                    'thumb_selected' => $_img_url.'fabric_selected.png',
                                    'name' => __('Cotton','woo-bundle-choice'),
                                    'description' => 'Fabric type cotton',
                                    'slug' => 'wbc_fabric_cotton_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'fabric.png',
                                    'thumb_selected' => $_img_url.'fabric_selected.png',
                                    'name' => __('Silk','woo-bundle-choice'),
                                    'description' => 'Fabric type silk',
                                    'slug' => 'wbc_fabric_silk_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'fabric.png',
                                    'thumb_selected' => $_img_url.'fabric_selected.png',
                                    'name' => __('Canvas','woo-bundle-choice'),
                                    'description' => 'Fabric type canvas',
                                    'slug' => 'wbc_fabric_canvas_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'fabric.png',
                                    'thumb_selected' => $_img_url.'fabric_selected.png',
                                    'name' => __('Chiffon','woo-bundle-choice'),
                                    'description' => 'Fabric type chiffon',
                                    'slug' => 'wbc_fabric_chiffon_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'fabric.png',
                                    'thumb_selected' => $_img_url.'fabric_selected.png',
                                    'name' => __('Damask','woo-bundle-choice'),
                                    'description' => 'Fabric type damask',
                                    'slug' => 'wbc_fabric_damask_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'fabric.png',
                                    'thumb_selected' => $_img_url.'fabric_selected.png',
                                    'name' => __('Wool','woo-bundle-choice'),
                                    'description' => 'Fabric type wool',
                                    'slug' => 'wbc_fabric_wool_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'fabric.png',
                                    'thumb_selected' => $_img_url.'fabric_selected.png',
                                    'name' => __('Jersey','woo-bundle-choice'),
                                    'description' => 'Fabric type jersey',
                                    'slug' => 'wbc_fabric_jersey_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'fabric.png',
                                    'thumb_selected' => $_img_url.'fabric_selected.png',
                                    'name' => __('Polyester','woo-bundle-choice'),
                                    'description' => 'Fabric type polyester',
                                    'slug' => 'wbc_fabric_polyester_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'fabric.png',
                                    'thumb_selected' => $_img_url.'fabric_selected.png',
                                    'name' => __('Velvet','woo-bundle-choice'),
                                    'description' => 'Fabric type velvet',
                                    'slug' => 'wbc_fabric_velvet_cat'
                                ),
                                array(
                                    'thumb' => $_img_url.'fabric.png',
                                    'thumb_selected' => $_img_url.'fabric_selected.png',
                                    'name' => __('Linen','woo-bundle-choice'),
                                    'description' => 'Fabric type linen',
                                    'slug' => 'wbc_fabric_linen_cat'
                                )
                        )
                    ), 
                    array(
                        'thumb' => '',
                        'name' => __('Pattern','woo-bundle-choice'),
                        'description' => 'Pattern category',
                        'slug' => 'wbc_pattern_cat',
                        'child'=> 
                        array(
                                array(
                                    'thumb' => $_alphabets_img_url.'icons8-circled-p-100.png',
                                    'name' => __('Plain','woo-bundle-choice'),
                                    'description' => 'Pattern type plain',
                                    'slug' => 'wbc_pattern_plain_cat'
                                ),
                                array(
                                    'thumb' => $_alphabets_img_url.'icons8-circled-s-100.png',
                                    'name' => __('Stripes','woo-bundle-choice'),
                                    'description' => 'Pattern type stripes',
                                    'slug' => 'wbc_pattern_stripes_cat'
                                ),
                                array(
                                    'thumb' => $_alphabets_img_url.'icons8-circled-c-100.png',
                                    // 'thumb_selected' => $_alphabets_img_url.'pattern_selected.png',
                                    'name' => __('Checks','woo-bundle-choice'),
                                    'description' => 'Pattern type checks',
                                    'slug' => 'wbc_pattern_checks_cat'
                                ),
                                array(
                                    'thumb' => $_alphabets_img_url.'icons8-circled-p-100.png',
                                    'name' => __('Plaid','woo-bundle-choice'),
                                    'description' => 'Pattern type plaid',
                                    'slug' => 'wbc_pattern_plaid_cat'
                                ),
                                array(
                                    'thumb' => $_alphabets_img_url.'icons8-circled-f-100.png',
                                    'name' => __('Floral','woo-bundle-choice'),
                                    'description' => 'Pattern type floral',
                                    'slug' => 'wbc_pattern_floral_cat'
                                ),
                                array(
                                    'thumb' => $_alphabets_img_url.'icons8-circled-p-100.png',
                                    'name' => __('Polka Dots','woo-bundle-choice'),
                                    'description' => 'Pattern type polka dots',
                                    'slug' => 'wbc_pattern_polkadots_cat'
                                ),
                                array(
                                    'thumb' => $_alphabets_img_url.'icons8-circled-p-100.png',
                                    'name' => __('Printed','woo-bundle-choice'),
                                    'description' => 'Pattern type printed',
                                    'slug' => 'wbc_pattern_printed_cat'
                                ),
                                array(
                                    'thumb' => $_alphabets_img_url.'icons8-circled-d-100.png',
                                    'name' => __('Detailing','woo-bundle-choice'),
                                    'description' => 'Pattern type detailing',
                                    'slug' => 'wbc_pattern_detailing_cat'
                                )

                        )
                    ) 
                );
    }

    public function get_maps() {
        return array(
                        // array(
                        //     ['slug','wbc_top_wear_men_shirts_cat','product_cat'],
                        //     ['slug','wbc_bottom_wear_men_trousers_cat','product_cat']
                        // ),
                        // array(
                        //     ['slug','wbc_top_wear_men_shirts_cat','product_cat'],
                        //     ['slug','wbc_bottom_wear_men_jeans_cat','product_cat']
                        // ),
                        // array(
                        //     ['slug','wbc_top_wear_women_shirts_cat','product_cat'],
                        //     ['slug','wbc_bottom_wear_women_trousers_cat','product_cat']
                        // ),
                        // array(
                        //     ['slug','wbc_top_wear_tshirts_cat','product_cat'],
                        //     ['slug','wbc_bottom_wear_jeans_cat','product_cat']
                        // ),
                        // array(
                        //     ['slug','wbc_top_wear_men_tshirts_cat','product_cat'],
                        //     ['slug','wbc_bottom_wear_men_jeans_cat','product_cat']
                        // ),
                        // array(
                        //     ['slug','wbc_top_wear_women_tshirts_cat','product_cat'],
                        //     ['slug','wbc_bottom_wear_women_jeans_cat','product_cat']
                        // ),
                        // array(
                        //     ['slug','wbc_top_wear_sweaters_cat','product_cat'],
                        //     ['slug','wbc_bottom_wear_jeans_cat','product_cat']
                        // ),
                        // array(
                        //     ['slug','wbc_top_wear_men_sweaters_cat','product_cat'],
                        //     ['slug','wbc_bottom_wear_men_jeans_cat','product_cat']
                        // ),
                        // array(
                        //     ['slug','wbc_top_wear_men_sweaters_cat','product_cat'],
                        //     ['slug','wbc_bottom_wear_men_trousers_cat','product_cat']
                        // ),
                        // array(
                        //     ['slug','wbc_top_wear_women_sweaters_cat','product_cat'],
                        //     ['slug','wbc_bottom_wear_women_jeans_cat','product_cat']
                        // ),
                        // array(
                        //     ['slug','wbc_top_wear_women_sweaters_cat','product_cat'],
                        //     ['slug','wbc_bottom_wear_women_trousers_cat','product_cat']
                        // ),
                        // array(
                        //     ['slug','wbc_top_wear_jackets_cat','product_cat'],
                        //     ['slug','wbc_bottom_wear_jeans_cat','product_cat']
                        // ),
                        // array(
                        //     ['slug','wbc_top_wear_men_jackets_cat','product_cat'],
                        //     ['slug','wbc_bottom_wear_men_jeans_cat','product_cat']
                        // ),
                        // array(
                        //     ['slug','wbc_top_wear_women_jackets_cat','product_cat'],
                        //     ['slug','wbc_bottom_wear_women_jeans_cat','product_cat']
                        // ),
                        // array(
                        //     ['slug','wbc_top_wear_blazers_coats_cat','product_cat'],
                        //     ['slug','wbc_bottom_wear_men_trousers_cat','product_cat']
                        // ),
                        // array(
                        //     ['slug','wbc_top_wear_tshirts_cat','product_cat'],
                        //     ['slug','wbc_bottom_wear_track_pants_cat','product_cat']
                        // ),
                        // array(
                        //     ['slug','wbc_top_wear_men_tshirts_cat','product_cat'],
                        //     ['slug','wbc_bottom_wear_men_track_pants_cat','product_cat']
                        // ),
                        // array(
                        //     ['slug','wbc_top_wear_women_tshirts_cat','product_cat'],
                        //     ['slug','wbc_bottom_wear_women_track_pants_cat','product_cat']
                        // ),
                        // array(
                        //     ['slug','wbc_top_wear_hoodies_cat','product_cat'],
                        //     ['slug','wbc_bottom_wear_jeans_cat','product_cat']
                        // ),
                        // array(
                        //     ['slug','wbc_top_wear_men_hoodies_cat','product_cat'],
                        //     ['slug','wbc_bottom_wear_men_jeans_cat','product_cat']
                        // ),
                        // array(
                        //     ['slug','wbc_top_wear_women_hoodies_cat','product_cat'],
                        //     ['slug','wbc_bottom_wear_women_jeans_cat','product_cat']
                        // ),
                        // array(
                        //     ['slug','wbc_top_wear_tops_cat','product_cat'],
                        //     ['slug','wbc_bottom_wear_women_shorts_cat','product_cat']
                        // ),
                        // array(
                        //     ['slug','wbc_top_wear_men_tshirts_cat','product_cat'],
                        //     ['slug','wbc_bottom_wear_men_shorts_cat','product_cat']
                        // ),
                        //  array(
                        //     ['slug','wbc_top_wear_women_tshirts_cat','product_cat'],
                        //     ['slug','wbc_bottom_wear_women_shorts_cat','product_cat']
                        // ),
                        // array(
                        //     ['slug','wbc_top_wear_tunics_cat','product_cat'],
                        //     ['slug','wbc_bottom_wear_plazzos_cat','product_cat']
                        // ),
                        // array(
                        //     ['slug','wbc_top_wear_women_tshirts_cat','product_cat'],
                        //     ['slug','wbc_bottom_wear_plazzos_cat','product_cat']
                        // ),
                        // array(
                        //     ['slug','wbc_top_wear_women_shirts_cat','product_cat'],
                        //     ['slug','wbc_bottom_wear_plazzos_cat','product_cat']
                        // ),
                        // array(
                        //     ['slug','wbc_top_wear_women_shirts_cat','product_cat'],
                        //     ['slug','wbc_bottom_wear_women_jeans_cat','product_cat']
                        // ),
                        // array(
                        //     ['slug','wbc_top_wear_tops_cat','product_cat'],
                        //     ['slug','wbc_bottom_wear_plazzos_cat','product_cat']
                        // ),
                        // array(
                        //     ['slug','wbc_top_wear_tunics_cat','product_cat'],
                        //     ['slug','wbc_bottom_wear_leggings_cat','product_cat']
                        // ),
                        // array(
                        //     ['slug','wbc_top_wear_tunics_cat','product_cat'],
                        //     ['slug','wbc_bottom_wear_women_jeans_cat','product_cat']
                        // ),
                        // array(
                        //     ['slug','wbc_top_wear_women_shirts_cat','product_cat'],
                        //     ['slug','wbc_bottom_wear_leggings_cat','product_cat']
                        // ),
                        // array(
                        //     ['slug','wbc_top_wear_women_tshirts_cat','product_cat'],
                        //     ['slug','wbc_bottom_wear_leggings_cat','product_cat']
                        // ),
                        // array(
                        //     ['slug','wbc_top_wear_tops_cat','product_cat'],
                        //     ['slug','wbc_bottom_wear_women_jeans_cat','product_cat']
                        // ),
                        // array(
                        //     ['slug','wbc_top_wear_women_shirts_cat','product_cat'],
                        //     ['slug','wbc_bottom_wear_skirts_cat','product_cat']
                        // ),
                        // array(
                        //     ['slug','wbc_top_wear_women_tshirts_cat','product_cat'],
                        //     ['slug','wbc_bottom_wear_skirts_cat','product_cat']
                        // ),
                        // array(
                        //     ['slug','wbc_top_wear_tops_cat','product_cat'],
                        //     ['slug','wbc_bottom_wear_skirts_cat','product_cat']
                        // ),
                        // array(
                        //     ['slug','wbc_top_wear_tops_cat','product_cat'],
                        //     ['slug','wbc_bottom_wear_leggings_cat','product_cat']
                        // ),
            
                        array(
                            ['slug','wbc_women_maroon_tops_bluebottom_cat','product_cat'],
                            ['slug','wbc_women_maroon_tops_bluebottom_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_men_white_hoddies_cat','product_cat'],
                            ['slug','wbc_men_lightblue_jeans_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_women_whiteshirts_blackbottom_cat','product_cat'],
                            ['slug','wbc_women_black_trousers_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_women_whiteshirts_blackbottom_cat','product_cat'],
                            ['slug','wbc_women_black_jeans_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_women_whitetunic_bluebottom_cat','product_cat'],
                            ['slug','wbc_women_blue_leggings_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_men_white_jockey_cat','product_cat'],
                            ['slug','wbc_men_black_shorts_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_men_white_jockey_cat','product_cat'],
                            ['slug','wbc_men_blue_shorts_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_men_green_hoodie_cat','product_cat'],
                            ['slug','wbc_men_white_jeans_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_men_green_hoodie_cat','product_cat'],
                            ['slug','wbc_men_white_track_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_men_white_jockey_cat','product_cat'],
                            ['slug','wbc_men_blue_shorts_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_men_black_jockey_cat','product_cat'],
                            ['slug','wbc_men_white_shorts_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_men_black_jockey_cat','product_cat'],
                            ['slug','wbc_men_gray_shorts_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_women_white_tshirts_blackbottom_cat','product_cat'],
                            ['slug','wbc_women_black_jeans_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_women_white_tshirts_blackbottom_cat','product_cat'],
                            ['slug','wbc_women_black_shorts_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_men_blue_shirts_bluebottom_cat','product_cat'],
                            ['slug','wbc_men_blue_jeans_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_men_orange_suit_cat','product_cat'],
                            ['slug','wbc_men_orange_suitpant_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_men_blue_suit_cat','product_cat'],
                            ['slug','wbc_men_blue_suitpant_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_men_purple_suits_cat','product_cat'],
                            ['slug','wbc_men_purple_suitspant_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_men_lightgray_suit_cat','product_cat'],
                            ['slug','wbc_men_lightgray_suitpant_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_men_white_shirts_blackbottom_cat','product_cat'],
                            ['slug','wbc_men_black_trousers_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_men_blue_blazers_blackbottom_cat','product_cat'],
                            ['slug','wbc_men_black_trousers_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_men_white_shirts_cat','product_cat'],
                            ['slug','wbc_men_black_trousers_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_men_white_shirts_cat','product_cat'],
                            ['slug','wbc_men_blue_trousers_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_women_white_shirts_cat','product_cat'],
                            ['slug','wbc_women_black_trousers_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_women_white_shirts_cat','product_cat'],
                            ['slug','wbc_women_blue_trousers_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_women_blue_shirts_cat','product_cat'],
                            ['slug','wbc_women_blue_jeans_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_men_blue_shirts_cat','product_cat'],
                            ['slug','wbc_men_white_trousers_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_men_blue_shirts_cat','product_cat'],
                            ['slug','wbc_men_white_jeans_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_men_black_shirts_cat','product_cat'],
                            ['slug','wbc_men_white_trousers_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_men_black_shirts_cat','product_cat'],
                            ['slug','wbc_men_maroon_trousers_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_men_black_shirts_cat','product_cat'],
                            ['slug','wbc_men_yellow_trousers_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_men_green_shirts_cat','product_cat'],
                            ['slug','wbc_men_white_trousers_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_men_gray_shirts_cat','product_cat'],
                            ['slug','wbc_men_blue_jeans_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_men_white_jacket_cat','product_cat'],
                            ['slug','wbc_men_blue_jeans_cat','product_cat']
                        ),
                         array(
                            ['slug','wbc_men_white_jacket_cat','product_cat'],
                            ['slug','wbc_men_black_jeans_cat','product_cat']
                        ),
                         array(
                            ['slug','wbc_men_black_jacket_cat','product_cat'],
                            ['slug','wbc_men_black_jeans_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_men_black_jacket_cat','product_cat'],
                            ['slug','wbc_men_white_jeans_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_men_orange_jacket_cat','product_cat'],
                            ['slug','wbc_men_black_jeans_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_men_white_tshirts_cat','product_cat'],
                            ['slug','wbc_men_blue_jeans_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_men_white_tshirts_cat','product_cat'],
                            ['slug','wbc_men_lightblue_jeans_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_men_white_tshirts_cat','product_cat'],
                            ['slug','wbc_men_black_jeans_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_men_white_tshirts_cat','product_cat'],
                            ['slug','wbc_men_black_jeans_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_men_white_tshirts_cat','product_cat'],
                            ['slug','wbc_men_green_trousers_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_men_black_tshirts_cat','product_cat'],
                            ['slug','wbc_men_white_jeans_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_men_black_tshirts_cat','product_cat'],
                            ['slug','wbc_men_gray_track_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_men_black_tshirts_cat','product_cat'],
                            ['slug','wbc_men_blue_jeans_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_men_white_tshirts_cat','product_cat'],
                            ['slug','wbc_men_blue_track_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_men_white_tshirts_cat','product_cat'],
                            ['slug','wbc_men_black_track_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_women_white_tshirts_cat','product_cat'],
                            ['slug','wbc_women_black_jeans_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_women_white_tshirts_cat','product_cat'],
                            ['slug','wbc_women_blue_track_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_women_white_tshirts_cat','product_cat'],
                            ['slug','wbc_women_blue_shorts_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_women_black_tshirts_cat','product_cat'],
                            ['slug','wbc_women_gray_leggings_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_women_black_tshirts_cat','product_cat'],
                            ['slug','wbc_women_black_jeans_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_women_white_tshirts_cat','product_cat'],
                            ['slug','wbc_women_black_track_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_women_white_tshirts_cat','product_cat'],
                            ['slug','wbc_women_blue_jogger_jeans_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_women_red_tshirts_cat','product_cat'],
                            ['slug','wbc_women_blue_jeans_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_women_red_tshirts_cat','product_cat'],
                            ['slug','wbc_women_blue_palazzos_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_women_red_tshirts_cat','product_cat'],
                            ['slug','wbc_women_skyblue_palazzos_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_women_red_tshirts_cat','product_cat'],
                            ['slug','wbc_women_black_track_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_women_red_tshirts_cat','product_cat'],
                            ['slug','wbc_women_black_jeans_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_men_white_sweater_cat','product_cat'],
                            ['slug','wbc_men_black_jeans_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_men_white_sweater_cat','product_cat'],
                            ['slug','wbc_men_blue_jeans_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_men_black_sweater_cat','product_cat'],
                            ['slug','wbc_men_blue_jeans_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_men_black_sweater_cat','product_cat'],
                            ['slug','wbc_men_white_jeans_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_men_green_sweater_cat','product_cat'],
                            ['slug','wbc_men_white_jeans_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_women_green_sweater_cat','product_cat'],
                            ['slug','wbc_women_black_jeans_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_women_purple_sweater_cat','product_cat'],
                            ['slug','wbc_women_black_jeans_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_women_gray_sweater_cat','product_cat'],
                            ['slug','wbc_women_blue_jeans_cat','product_cat']
                        ),
                         array(
                            ['slug','wbc_women_blue_jacket_cat','product_cat'],
                            ['slug','wbc_women_blue_jeans_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_men_black_blazers_cat','product_cat'],
                            ['slug','wbc_men_white_jeans_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_men_black_blazers_cat','product_cat'],
                            ['slug','wbc_men_black_jeans_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_men_blue_blazers_cat','product_cat'],
                            ['slug','wbc_men_blue_jeans_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_men_lightblue_blazers_cat','product_cat'],
                            ['slug','wbc_men_black_trousers_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_men_gray_blazers_cat','product_cat'],
                            ['slug','wbc_men_gray_suitpant_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_men_gray_blazers_cat','product_cat'],
                            ['slug','wbc_men_gray_trousers_cat','product_cat']
                        ),
                         array(
                            ['slug','wbc_men_blue_blazers_cat','product_cat'],
                            ['slug','wbc_men_blue_jeans_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_men_green_blazers_cat','product_cat'],
                            ['slug','wbc_men_black_trousers_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_men_purple_blazers_cat','product_cat'],
                            ['slug','wbc_men_white_jeans_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_men_purple_blazers_cat','product_cat'],
                            ['slug','wbc_men_blue_jeans_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_men_black_hoodie_cat','product_cat'],
                            ['slug','wbc_men_white_track_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_men_black_hoodie_cat','product_cat'],
                            ['slug','wbc_men_blue_jeans_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_men_black_hoodie_cat','product_cat'],
                            ['slug','wbc_men_white_jeans_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_men_red_hoodie_cat','product_cat'],
                            ['slug','wbc_men_black_jeans_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_men_red_hoodie_cat','product_cat'],
                            ['slug','wbc_men_blue_jeans_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_women_blue_hoodie_cat','product_cat'],
                            ['slug','wbc_women_white_trousers_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_women_red_hoodie_cat','product_cat'],
                            ['slug','wbc_women_black_jeans_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_women_yellow_hoodie_cat','product_cat'],
                            ['slug','wbc_women_black_jeans_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_women_black_tops_cat','product_cat'],
                            ['slug','wbc_women_white_palazzos_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_women_black_tops_cat','product_cat'],
                            ['slug','wbc_women_white_leggings_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_women_black_tops_cat','product_cat'],
                            ['slug','wbc_women_red_skirt_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_women_black_shirts_cat','product_cat'],
                            ['slug','wbc_women_pink_trousers_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_women_black_shirts_cat','product_cat'],
                            ['slug','wbc_women_white_trousers_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_women_black_shirts_cat','product_cat'],
                            ['slug','wbc_women_white_trousers_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_women_green_tops_cat','product_cat'],
                            ['slug','wbc_women_black_leggings_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_women_green_tops_cat','product_cat'],
                            ['slug','wbc_women_black_jeans_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_women_red_tops_cat','product_cat'],
                            ['slug','wbc_women_blue_palazzos_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_women_red_tops_cat','product_cat'],
                            ['slug','wbc_women_blue_jeans_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_women_red_tops_cat','product_cat'],
                            ['slug','wbc_women_black_skirt_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_women_red_tops_cat','product_cat'],
                            ['slug','wbc_women_black_palazzos_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_women_maroon_tops_cat','product_cat'],
                            ['slug','wbc_women_white_leggings_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_women_pink_tops_cat','product_cat'],
                            ['slug','wbc_women_blue_leggings_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_women_white_tunic_cat','product_cat'],
                            ['slug','wbc_women_blue_jeans_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_women_orange_tunic_cat','product_cat'],
                            ['slug','wbc_women_blue_jeans_cat','product_cat']
                        ),
                        array(
                            ['slug','wbc_women_orange_tunic_cat','product_cat'],
                            ['slug','wbc_women_black_jeans_cat','product_cat']
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
        if(!empty($__att__['wbc_cloth_colour_attr'])){
            $filter['d_fconfig'][]=array(
                'name'=>$__att__['wbc_cloth_colour_attr'][0],
                'type'=>"1",
                'label'=>$__att__['wbc_cloth_colour_attr'][1],
                'advance'=>"0",
                'dependent'=>"0",
                'input'=>"icon_text",
                'column_width'=> "100",    // "43.75",
                'order'=>"1",
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
                'advance'=>"1",
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
        if(!empty($__att__['wbc_cloth_fit_attr'])){
            $filter['d_fconfig'][]=array(
                'name'=>$__att__['wbc_cloth_fit_attr'][0],
                'type'=>"1",
                'label'=>$__att__['wbc_cloth_fit_attr'][1],
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
        if(!empty($__att__['wbc_cloth_sleeve_attr'])){
            $filter['d_fconfig'][]=array(
                'name'=>$__att__['wbc_cloth_sleeve_attr'][0],
                'type'=>"1",
                'label'=>$__att__['wbc_cloth_sleeve_attr'][1],
                'advance'=>"0",
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
        if(!empty($__att__['wbc_cloth_neck_attr'])){
            $filter['d_fconfig'][]=array(
                'name'=>$__att__['wbc_cloth_neck_attr'][0],
                'type'=>"1",
                'label'=>$__att__['wbc_cloth_neck_attr'][1],
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
        if(!empty($__att__['wbc_cloth_occasion_attr'])){
            $filter['d_fconfig'][]=array(
                'name'=>$__att__['wbc_cloth_occasion_attr'][0],
                'type'=>"1",
                'label'=>$__att__['wbc_cloth_occasion_attr'][1],
                'advance'=>"1",
                'dependent'=>"0",
                'input'=>"text_slider",
                'column_width'=> "100",
                'order'=>"6",
                'template'=>'fc1',
                'help'=>0,
                'help_text'=>'',
                'enabled'=>1
            );
        }
        if(!empty($__att__['wbc_cloth_collar_attr'])){
            $filter['d_fconfig'][]=array(
                'name'=>$__att__['wbc_cloth_collar_attr'][0],
                'type'=>"1",
                'label'=>$__att__['wbc_cloth_collar_attr'][1],
                'advance'=>"1",
                'dependent'=>"0",
                'input'=>"icon_text",
                'column_width'=> "100",
                'order'=>"7",
                'template'=>'fc1',
                'help'=>0,
                'help_text'=>'',
                'enabled'=>1
            );
        }
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
                'type'=>"1",
                'label'=>$__att__['wbc_cloth_closure_type_attr'][1],
                'advance'=>"0",
                'dependent'=>"0",
                'input'=>"text_slider",
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
                'type'=>"1",
                'label'=>$__att__['wbc_cloth_length_attr'][1],
                'advance'=>"0",
                'dependent'=>"0",
                'input'=>"text_slider",
                'column_width'=> "50",
                'order'=>"2",
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
                'input'=>"icon_text",
                'column_width'=> "100",
                'order'=>"8",
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
                'input'=>"text_slider",
                'column_width'=> "50",
                'order'=>"9",
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
          'thumb'=>$_img_url.'men_white_shirt_1.jpg',
          'images'=>array('men_white_shirt.jpg','men_white_shirt_2.jpg'),
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable', //simple | variable
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_shirts_cat','wbc_topwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_white_shirts_cat','wbc_fabric_cotton_cat','wbc_pattern_plain_cat'),
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
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_tshirts_cat','wbc_topwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_white_tshirts_cat','wbc_fabric_cotton_cat','wbc_pattern_plain_cat'),
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
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_shirts_cat','wbc_topwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_gray_shirts_cat','wbc_fabric_chiffon_cat','wbc_pattern_plain_cat'),
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
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_tshirts_cat','wbc_topwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_white_tshirts_cat','wbc_fabric_silk_cat','wbc_pattern_printed_cat'),
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
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_tops_cat','wbc_topwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_women_black_tops_cat','wbc_fabric_canvas_cat','wbc_pattern_plaid_cat'),
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
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_tshirts_cat','wbc_topwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_women_white_tshirts_blackbottom_cat','wbc_fabric_silk_cat','wbc_pattern_checks_cat'),
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
          'title'=>'Women T-shirt #20000122',
          'thumb'=>$_img_url.'women_black_tshirt.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_tshirts_cat','wbc_topwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_women_black_tshirts_cat','wbc_fabric_cotton_cat','wbc_pattern_pain_cat'),
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
                              'value'=>'Mao',
                              'position'=>5,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            )       
                    ),
          'variation'=>array(
                          array(
                            'regular_price'=>'950',
                            'price'=>'945',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'M','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_neck_attr'=>'Crew','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_sleeve_attr'=>'Short sleeve','pa_wbc_cloth_collar_attr'=>'Mao')
                          )
                   ) 
        ),
        array(
          'title'=>'Women shirt #20000125',
          'thumb'=>$_img_url.'women_black_shirt.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_shirts_cat','wbc_topwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_women_black_shirts_cat','wbc_fabric_cotton_cat','wbc_pattern_pain_cat'),
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
                              'value'=>'Black',
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
                            'price'=>'945',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'M','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_neck_attr'=>'Round','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_sleeve_attr'=>'Long sleeve','pa_wbc_cloth_collar_attr'=>'Regular')
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
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_shirts_cat','wbc_topwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_women_white_shirts_cat','wbc_fabric_cotton_cat','wbc_pattern_plain_cat'),
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
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_tops_cat','wbc_topwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_women_pink_tops_cat','wbc_fabric_polyester_cat','wbc_pattern_polkadots_cat'),
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
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_tshirts_cat','wbc_topwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_women_red_tshirts_cat','wbc_fabric_polyester_cat','wbc_pattern_stripes_cat'),
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
          'thumb'=>$_img_url.'men_blue_shirt.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_shirts_cat','wbc_topwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_blue_shirts_cat','wbc_fabric_linen_cat','wbc_pattern_floral_cat'),
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
        // copy -1
        array(
          'title'=>'Men hoodies #20000021',
          'thumb'=>$_img_url.'men_white_hoddie_001.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable', //simple | variable
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_hoodies_cat','wbc_topwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_white_hoddies_cat','wbc_fabric_cotton_cat','wbc_pattern_printed_cat'),
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
                            'price'=>'730',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'L','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_neck_attr'=>'Round','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_sleeve_attr'=>'Long sleeve','pa_wbc_cloth_collar_attr'=>'Spread')
                          )
                   ) 
        ),
        array(
          'title'=>'Men T-shirt #20000022',
          'thumb'=>$_img_url.'men_white_tshirt_1.jpg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_tshirts_cat','wbc_topwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_white_tshirts_cat','wbc_fabric_polyester_cat','wbc_pattern_plain_cat'),
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
                            'regular_price'=>'850',
                            'price'=>'840',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'XL','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_neck_attr'=>'Collared neckline','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_sleeve_attr'=>'Short sleeve','pa_wbc_cloth_collar_attr'=>'Regular')
                          )
                   ) 
        ),
        array(
          'title'=>'Men Shirt #20000023',
          'thumb'=>$_img_url.'men_shirt_001.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_shirts_cat','wbc_topwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_white_shirts_blackbottom_cat','wbc_fabric_cotton_cat','wbc_pattern_checks_cat'),
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
                            'regular_price'=>'450',
                            'price'=>'440',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'XL','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_neck_attr'=>'Collared neckline','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_sleeve_attr'=>'Long sleeve','pa_wbc_cloth_collar_attr'=>'Regular')
                          )
                   ) 
        ),
        array(
          'title'=>'Men T-shirt #20000024',
          'thumb'=>$_img_url.'men_white_tshirt_3.jpg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_tshirts_cat','wbc_topwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_white_tshirts_cat','wbc_fabric_silk_cat','wbc_pattern_plain_cat'),
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
                              'value'=>'Mao',
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
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'L','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_neck_attr'=>'Round','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_sleeve_attr'=>'Long sleeve','pa_wbc_cloth_collar_attr'=>'Mao')
                          )
                   ) 
        ),
        array(
          'title'=>'Men T-shirt #20000123',
          'thumb'=>$_img_url.'men_black_tshirt.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_tshirts_cat','wbc_topwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_black_tshirts_cat','wbc_fabric_silk_cat','wbc_pattern_plain_cat'),
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
                              'value'=>'Black',
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
                              'value'=>'Mao',
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
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'L','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_neck_attr'=>'Round','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_sleeve_attr'=>'Long sleeve','pa_wbc_cloth_collar_attr'=>'Mao')
                          )
                   ) 
        ),
        array(
          'title'=>'Men shirt #20000124',
          'thumb'=>$_img_url.'man_black_shirt.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_shirts_cat','wbc_topwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_black_shirts_cat','wbc_fabric_silk_cat','wbc_pattern_plain_cat'),
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
                              'value'=>'Black',
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
                              'value'=>'Regular',
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
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'L','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_neck_attr'=>'Round','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_sleeve_attr'=>'Long sleeve','pa_wbc_cloth_collar_attr'=>'Regular')
                          )
                   ) 
        ),
        array(
          'title'=>'Men Jacket #20000025',
          'thumb'=>$_img_url.'men_jacket_001.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_jackets_cat','wbc_topwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_white_jacket_cat','wbc_fabric_wool_cat','wbc_pattern_plaid_cat'),
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
                              'value'=>'Long sleeve',
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
                            'regular_price'=>'950',
                            'price'=>'945',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'L','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_neck_attr'=>'Crew','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_sleeve_attr'=>'Long sleeve','pa_wbc_cloth_collar_attr'=>'Spread')
                          )
                   ) 
        ),
        array(
          'title'=>'Men Blazer #20000026',
          'thumb'=>$_img_url.'men_blazer_001.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_blazers_coats_cat','wbc_topwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_blue_blazers_cat','wbc_fabric_damask_cat','wbc_pattern_plain_cat'),
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
                              'value'=>'Notch Lapels',
                              'position'=>5,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            )       
                    ),
          'variation'=>array(
                          array(
                            'regular_price'=>'1550',
                            'price'=>'1545',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'L','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_neck_attr'=>'Collared neckline','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_sleeve_attr'=>'Long sleeve','pa_wbc_cloth_collar_attr'=>'Notch Lapels')
                          )
                   ) 
        ),
        array(
          'title'=>'Men Hoodies #20000027',
          'thumb'=>$_img_url.'men_black_hoddies_003.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_hoodies_cat','wbc_topwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_green_hoodie_cat','wbc_fabric_jersey_cat','wbc_pattern_printed_cat'),
          'attribute'=>array(
                    'pa_wbc_cloth_size_attr'=>array(
                              'name'=>'pa_wbc_cloth_size_attr',
                              'value'=>'XXL',
                              'position'=>0,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_colour_attr'=>array(
                              'name'=>'pa_wbc_cloth_colour_attr',
                              'value'=>'Green',
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
                              'value'=>'Long sleeve',
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
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'XXL','pa_wbc_cloth_colour_attr'=>'Green','pa_wbc_cloth_neck_attr'=>'Collared neckline','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_sleeve_attr'=>'Long sleeve','pa_wbc_cloth_collar_attr'=>'Mandrin')
                          )
                   ) 
        ),
        array(
          'title'=>'Men hoodies #20000028',
          'thumb'=>$_img_url.'men_black_hoodies_004.jpg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_hoodies_cat','wbc_topwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_black_hoodie_cat','wbc_fabric_cotton_cat','wbc_pattern_plain_cat'),
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
                              'value'=>'Black',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_neck_attr'=>array(
                              'name'=>'pa_wbc_cloth_neck_attr',
                              'value'=>'V neckline',
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
                              'value'=>'Regular',
                              'position'=>5,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            )       
                    ),
          'variation'=>array(
                          array(
                            'regular_price'=>'1200',
                            'price'=>'1180',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'XL','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_neck_attr'=>'V neckline','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_sleeve_attr'=>'Long sleeve','pa_wbc_cloth_collar_attr'=>'Regular')
                          )
                   ) 
        ),
        array(
          'title'=>'Men blazer #20000029',
          'thumb'=>$_img_url.'men_blazer_002.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_blazers_coats_cat','wbc_topwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_gray_blazers_cat','wbc_fabric_cotton_cat','wbc_pattern_plain_cat'),
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
                            'regular_price'=>'1500',
                            'price'=>'1495',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'XL','pa_wbc_cloth_colour_attr'=>'Gray','pa_wbc_cloth_neck_attr'=>'Round','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_sleeve_attr'=>'Long sleeve','pa_wbc_cloth_collar_attr'=>'Band')
                          )
                    )      
          ),
          array(
          'title'=>'Men blazer #20000030',
          'thumb'=>$_img_url.'men_blazer_003.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_blazers_coats_cat','wbc_topwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_black_blazers_cat','wbc_fabric_linen_cat','wbc_pattern_plaid_cat'),
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
                              'value'=>'Black',
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
                              'value'=>'Long sleeve',
                              'position'=>4,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),

                    'pa_wbc_cloth_collar_attr'=>array(
                              'name'=>'pa_wbc_cloth_collar_attr',
                              'value'=>'Notch Lapels',
                              'position'=>5,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            )       
                    ),
          'variation'=>array(
                          array(
                            'regular_price'=>'1850',
                            'price'=>'1745',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'L','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_neck_attr'=>'Collared neckline','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_sleeve_attr'=>'Long sleeve','pa_wbc_cloth_collar_attr'=>'Notch Lapels')
                          )
                   )
          ),
         //copy-2
          array(
          'title'=>'Men blazer #20000031',
          'thumb'=>$_img_url.'men_blazer_004.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable', //simple | variable
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_blazers_coats_cat','wbc_topwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_gray_blazers_cat','wbc_fabric_linen_cat','wbc_pattern_plain_cat'),
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
                              'value'=>'Gray',
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
                              'value'=>'Long sleeve',
                              'position'=>4,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),

                    'pa_wbc_cloth_collar_attr'=>array(
                              'name'=>'pa_wbc_cloth_collar_attr',
                              'value'=>'Notch Lapels',
                              'position'=>5,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            )       
                    ),
          'variation'=>array(
                          array(
                            'regular_price'=>'750',
                            'price'=>'730',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'XL','pa_wbc_cloth_colour_attr'=>'Gray','pa_wbc_cloth_neck_attr'=>'Collared neckline','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_sleeve_attr'=>'Long sleeve','pa_wbc_cloth_collar_attr'=>'Notch Lapels')
                          )
                   ) 
        ),
        array(
          'title'=>'Men blazer #20000032',
          'thumb'=>$_img_url.'men_blazer_005.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_blazers_coats_cat','wbc_topwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_purple_blazers_cat','wbc_fabric_polyester_cat','wbc_pattern_plain_cat'),
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
                              'value'=>'Purple',
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
                              'value'=>'Long sleeve',
                              'position'=>4,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),

                    'pa_wbc_cloth_collar_attr'=>array(
                              'name'=>'pa_wbc_cloth_collar_attr',
                              'value'=>'Notch Lapels',
                              'position'=>5,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            )       
                    ),
          'variation'=>array(
                          array(
                            'regular_price'=>'850',
                            'price'=>'840',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'L','pa_wbc_cloth_colour_attr'=>'Purple','pa_wbc_cloth_neck_attr'=>'Collared neckline','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_sleeve_attr'=>'Long sleeve','pa_wbc_cloth_collar_attr'=>'Notch Lapels')
                          )
                   ) 
        ),
        array(
          'title'=>'Men blazer #20000033',
          'thumb'=>$_img_url.'men_blazer_006.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_blazers_coats_cat','wbc_topwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_green_blazers_cat','wbc_fabric_cotton_cat','wbc_pattern_plaid_cat'),
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
                              'value'=>'Green',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_neck_attr'=>array(
                              'name'=>'pa_wbc_cloth_neck_attr',
                              'value'=>'Funnel Neckline',
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
                              'value'=>'Band',
                              'position'=>5,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            )       
                    ),
          'variation'=>array(
                          array(
                            'regular_price'=>'450',
                            'price'=>'440',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'L','pa_wbc_cloth_colour_attr'=>'Green','pa_wbc_cloth_neck_attr'=>'Funnel neckline','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_sleeve_attr'=>'Sleeveless','pa_wbc_cloth_collar_attr'=>'Band')
                          )
                   ) 
        ),
        array(
          'title'=>'Men blazer #20000034',
          'thumb'=>$_img_url.'men_blazer_007.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_blazers_coats_cat','wbc_topwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_lightblue_blazers_cat','wbc_fabric_silk_cat','wbc_pattern_plain_cat'),
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
                              'value'=>'Blue',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_neck_attr'=>array(
                              'name'=>'pa_wbc_cloth_neck_attr',
                              'value'=>'Funnel neckline',
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
                              'value'=>'Band',
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
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'XL','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_neck_attr'=>'Funnel neckline','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_sleeve_attr'=>'Sleeveless','pa_wbc_cloth_collar_attr'=>'Band')
                          )
                   ) 
        ),
        array(
          'title'=>'Men blazer #20000035',
          'thumb'=>$_img_url.'men_blazer_008.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_blazers_coats_cat','wbc_topwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_blue_blazers_blackbottom_cat','wbc_fabric_velvet_cat','wbc_pattern_plaid_cat'),
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
                              'value'=>'Blue',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_neck_attr'=>array(
                              'name'=>'pa_wbc_cloth_neck_attr',
                              'value'=>'Funnel neckline',
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
                              'value'=>'Band',
                              'position'=>5,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            )       
                    ),
          'variation'=>array(
                          array(
                            'regular_price'=>'950',
                            'price'=>'945',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'M','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_neck_attr'=>'Funnel neckline','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_sleeve_attr'=>'Sleeveless','pa_wbc_cloth_collar_attr'=>'Band')
                          )
                   ) 
        ),
        array(
          'title'=>'Men jacket #20000036',
          'thumb'=>$_img_url.'men_jacket_002.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_jackets_cat','wbc_topwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_black_jacket_cat','wbc_fabric_polyester_cat','wbc_pattern_plain_cat'),
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
                              'value'=>'Black',
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
                            'regular_price'=>'1550',
                            'price'=>'1545',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'XL','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_neck_attr'=>'Collared neckline','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_sleeve_attr'=>'Long sleeve','pa_wbc_cloth_collar_attr'=>'Regular')
                          )
                   ) 
        ),
        array(
          'title'=>'Men jacket #20000037',
          'thumb'=>$_img_url.'men_jacket_003.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_jackets_cat','wbc_topwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_black_jacket_cat','wbc_fabric_cotton_cat','wbc_pattern_pain_cat'),
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
                              'value'=>'Black',
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
                            'regular_price'=>'1250',
                            'price'=>'1245',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'XL','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_neck_attr'=>'Collared neckline','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_sleeve_attr'=>'Long sleeve','pa_wbc_cloth_collar_attr'=>'Regular')
                          )
                   ) 
        ),
        array(
          'title'=>'Men jacket #20000038',
          'thumb'=>$_img_url.'men_jacket_004.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_jackets_cat','wbc_topwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_orange_jacket_cat','wbc_fabric_polyester_cat','wbc_pattern_plain_cat'),
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
                              'value'=>'Orange',
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
                            'regular_price'=>'1200',
                            'price'=>'1180',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'XL','pa_wbc_cloth_colour_attr'=>'Orange','pa_wbc_cloth_neck_attr'=>'Collared neckline','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_sleeve_attr'=>'Long sleeve','pa_wbc_cloth_collar_attr'=>'Regular')
                          )
                   ) 
        ),
        array(
          'title'=>'Men hoodie #20000039',
          'thumb'=>$_img_url.'men_red_hoddie_002.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_hoodies_cat','wbc_topwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_red_hoodie_cat','wbc_fabric_cotton_cat','wbc_pattern_plain_cat'),
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
                              'value'=>'Red',
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
                              'value'=>'Mao',
                              'position'=>5,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            )       
                    ),
          'variation'=>array(
                          array(
                            'regular_price'=>'1500',
                            'price'=>'1495',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'M','pa_wbc_cloth_colour_attr'=>'Red','pa_wbc_cloth_neck_attr'=>'Round','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_sleeve_attr'=>'Long sleeve','pa_wbc_cloth_collar_attr'=>'Mao')
                          )
                    )      
          ),
          array(
          'title'=>'Women tshirt #20000040',
          'thumb'=>$_img_url.'women_white_tshirt_1.jpg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_tshirts_cat','wbc_topwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_women_white_tshirts_cat','wbc_fabric_linen_cat','wbc_pattern_printed_cat'),
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
                              'value'=>'Band',
                              'position'=>5,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            )       
                    ),
          'variation'=>array(
                          array(
                            'regular_price'=>'1850',
                            'price'=>'1745',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'S','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_neck_attr'=>'Crew','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_sleeve_attr'=>'Short sleeve','pa_wbc_cloth_collar_attr'=>'Band')
                          )
                   )
          ),
          //copy-3
          array(
          'title'=>'Men shirt #20000041',
          'thumb'=>$_img_url.'men_shirt_002.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable', //simple | variable
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_shirts_cat','wbc_topwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_blue_shirts_cat','wbc_fabric_cotton_cat','wbc_pattern_checks_cat'),
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
                            'price'=>'730',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'XL','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_neck_attr'=>'Collared neckline','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_sleeve_attr'=>'Long sleeve','pa_wbc_cloth_collar_attr'=>'Regular')
                          )
                   ) 
        ),
        array(
          'title'=>'Men shirt #20000042',
          'thumb'=>$_img_url.'men_shirt_004.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_shirts_cat','wbc_topwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_white_shirts_blackbottom_cat','wbc_fabric_cotton_cat','wbc_pattern_stripes_cat'),
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
                              'value'=>'white',
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
                            'regular_price'=>'850',
                            'price'=>'840',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'L','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_neck_attr'=>'Collared neckline','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_sleeve_attr'=>'Long sleeve','pa_wbc_cloth_collar_attr'=>'Regular')
                          )
                   ) 
        ),
        array(
          'title'=>'Men shirt #20000043',
          'thumb'=>$_img_url.'men_shirt_006.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_shirts_cat','wbc_topwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_green_shirts_cat','wbc_fabric_chiffon_cat','wbc_pattern_floral_cat'),
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
                              'value'=>'Green',
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
                            'regular_price'=>'450',
                            'price'=>'440',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'M','pa_wbc_cloth_colour_attr'=>'Green','pa_wbc_cloth_neck_attr'=>'Collared neckline','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_sleeve_attr'=>'Long sleeve','pa_wbc_cloth_collar_attr'=>'Regular')
                          )
                   ) 
        ),
        array(
          'title'=>'Men shirt #20000044',
          'thumb'=>$_img_url.'men_shirt_007.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_shirts_cat','wbc_topwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_blue_shirts_bluebottom_cat','wbc_fabric_cotton_cat','wbc_pattern_plain_cat'),
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
                              'value'=>'Regular',
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
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'L','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_neck_attr'=>'Collared neckline','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_sleeve_attr'=>'Long sleeve','pa_wbc_cloth_collar_attr'=>'Regular')
                          )
                   ) 
        ),
        array(
          'title'=>'Men suit #20000045',
          'thumb'=>$_img_url.'men_suit_001.jpg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_suits_cat','wbc_topwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_blue_suit_cat','wbc_fabric_wool_cat','wbc_pattern_plaid_cat'),
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
                              'value'=>'Notch Lapels',
                              'position'=>5,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            )       
                    ),
          'variation'=>array(
                          array(
                            'regular_price'=>'950',
                            'price'=>'945',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'XL','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_neck_attr'=>'Collared neckline','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_sleeve_attr'=>'Long sleeve','pa_wbc_cloth_collar_attr'=>'Notch Lapels')
                          )
                   ) 
        ),
        array(
          'title'=>'Men suit #20000046',
          'thumb'=>$_img_url.'men_suit_002.jpg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_suits_cat','wbc_topwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_purple_suits_cat','wbc_fabric_cotton_cat','wbc_pattern_plain_cat'),
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
                              'value'=>'Purple',
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
                              'value'=>'Long sleeve',
                              'position'=>4,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),

                    'pa_wbc_cloth_collar_attr'=>array(
                              'name'=>'pa_wbc_cloth_collar_attr',
                              'value'=>'Notch Lapels',
                              'position'=>5,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            )       
                    ),
          'variation'=>array(
                          array(
                            'regular_price'=>'1550',
                            'price'=>'1545',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'L','pa_wbc_cloth_colour_attr'=>'Purple','pa_wbc_cloth_neck_attr'=>'Collared neckline','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_sleeve_attr'=>'Long sleeve','pa_wbc_cloth_collar_attr'=>'Notch Lapels')
                          )
                   ) 
        ),
        array(
          'title'=>'Men suit #20000047',
          'thumb'=>$_img_url.'men_suit_004.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_suits_cat','wbc_topwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_lightgray_suit_cat','wbc_fabric_jersey_cat','wbc_pattern_stripes_cat'),
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
                              'value'=>'Gray',
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
                              'value'=>'Long sleeve',
                              'position'=>4,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),

                    'pa_wbc_cloth_collar_attr'=>array(
                              'name'=>'pa_wbc_cloth_collar_attr',
                              'value'=>'Notch Lapels',
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
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'M','pa_wbc_cloth_colour_attr'=>'Gray','pa_wbc_cloth_neck_attr'=>'Collared neckline','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_sleeve_attr'=>'Long sleeve','pa_wbc_cloth_collar_attr'=>'Notch Lapels')
                          )
                   ) 
        ),
        array(
          'title'=>'Men suit #20000048',
          'thumb'=>$_img_url.'men_suit_006.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_suits_cat','wbc_topwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_orange_suit_cat','wbc_fabric_chiffon_cat','wbc_pattern_plain_cat'),
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
                              'value'=>'Orange',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_neck_attr'=>array(
                              'name'=>'pa_wbc_cloth_neck_attr',
                              'value'=>'V neckline',
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
                              'value'=>'Notch Lapels',
                              'position'=>5,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            )       
                    ),
          'variation'=>array(
                          array(
                            'regular_price'=>'1200',
                            'price'=>'1180',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'XL','pa_wbc_cloth_colour_attr'=>'Orange','pa_wbc_cloth_neck_attr'=>'V neckline','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_sleeve_attr'=>'Long sleeve','pa_wbc_cloth_collar_attr'=>'Notch Lapels')
                          )
                   ) 
        ),
        array(
          'title'=>'Men sweater #20000049',
          'thumb'=>$_img_url.'men_sweater_001.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_sweaters_cat','wbc_topwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_white_sweater_cat','wbc_fabric_jersey_cat','wbc_pattern_plain_cat'),
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
                              'value'=>'Polo',
                              'position'=>5,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            )       
                    ),
          'variation'=>array(
                          array(
                            'regular_price'=>'1500',
                            'price'=>'1495',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'L','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_neck_attr'=>'Round','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_sleeve_attr'=>'Long sleeve','pa_wbc_cloth_collar_attr'=>'Polo')
                          )
                    )      
          ),
          array(
          'title'=>'Men sweater #20000050',
          'thumb'=>$_img_url.'men_sweater_002.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_sweaters_cat','wbc_topwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_green_sweater_cat','wbc_fabric_wool_cat','wbc_pattern_stripes_cat'),
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
                              'value'=>'Green',
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
                              'value'=>'Polo',
                              'position'=>5,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            )       
                    ),
          'variation'=>array(
                          array(
                            'regular_price'=>'1850',
                            'price'=>'1745',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'L','pa_wbc_cloth_colour_attr'=>'Green','pa_wbc_cloth_neck_attr'=>'Round','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_sleeve_attr'=>'Long sleeve','pa_wbc_cloth_collar_attr'=>'Polo')
                          )
                   )
          ),
          //copy-4
          array(
          'title'=>'Men sweater #20000051',
          'thumb'=>$_img_url.'men_sweater_003.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable', //simple | variable
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_sweaters_cat','wbc_topwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_black_sweater_cat','wbc_fabric_wool_cat','wbc_pattern_detailing_cat'),
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
                              'value'=>'Black',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_neck_attr'=>array(
                              'name'=>'pa_wbc_cloth_neck_attr',
                              'value'=>'Funnel Neckline',
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
                              'value'=>'Funnel',
                              'position'=>5,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            )       
                    ),
          'variation'=>array(
                          array(
                            'regular_price'=>'750',
                            'price'=>'730',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'XL','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_neck_attr'=>'Funnel Neckline','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_sleeve_attr'=>'Long sleeve','pa_wbc_cloth_collar_attr'=>'Funnel')
                          )
                   ) 
        ),
        array(
          'title'=>'Men shirt #20000052',
          'thumb'=>$_img_url.'men_shirt_008.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_shirts_cat','wbc_topwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_white_shirts_blackbottom_cat','wbc_fabric_silk_cat','wbc_pattern_polkadots_cat'),
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
                              'value'=>'Funnel',
                              'position'=>5,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            )       
                    ),
          'variation'=>array(
                          array(
                            'regular_price'=>'850',
                            'price'=>'840',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'L','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_neck_attr'=>'Round','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_sleeve_attr'=>'Long sleeve','pa_wbc_cloth_collar_attr'=>'Funnel')
                          )
                   ) 
        ),
        array(
          'title'=>'Women hoodies #20000053',
          'thumb'=>$_img_url.'women_hoodie_001.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_hoodies_cat','wbc_topwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_women_blue_hoodie_cat','wbc_fabric_cotton_cat','wbc_pattern_checks_cat'),
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
                              'value'=>'Regular',
                              'position'=>5,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            )       
                    ),
          'variation'=>array(
                          array(
                            'regular_price'=>'450',
                            'price'=>'440',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'L','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_neck_attr'=>'Collared neckline','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_sleeve_attr'=>'Long sleeve','pa_wbc_cloth_collar_attr'=>'Regular')
                          )
                   ) 
        ),
        array(
          'title'=>'Women hoodie #20000054',
          'thumb'=>$_img_url.'women_hoodie_002.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_hoodies_cat','wbc_topwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_women_yellow_hoodie_cat','wbc_fabric_cotton_cat','wbc_pattern_plain_cat'),
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
                              'value'=>'Yellow',
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
                              'value'=>'Mao',
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
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'M','pa_wbc_cloth_colour_attr'=>'Yellow','pa_wbc_cloth_neck_attr'=>'Round','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_sleeve_attr'=>'Long sleeve','pa_wbc_cloth_collar_attr'=>'Mao')
                          )
                   ) 
        ),
        array(
          'title'=>'Women hoodie #20000055',
          'thumb'=>$_img_url.'women_hoodie_003.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_hoodies_cat','wbc_topwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_women_red_hoodie_cat','wbc_fabric_cotton_cat','wbc_pattern_plaid_cat'),
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
                              'value'=>'Long sleeve',
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
                            'regular_price'=>'950',
                            'price'=>'945',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'L','pa_wbc_cloth_colour_attr'=>'Red','pa_wbc_cloth_neck_attr'=>'Crew','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_sleeve_attr'=>'Long sleeve','pa_wbc_cloth_collar_attr'=>'Spread')
                          )
                   ) 
        ),
        array(
          'title'=>'Women jacket #20000056',
          'thumb'=>$_img_url.'women_jacket_001.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_jackets_cat','wbc_topwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_women_blue_jacket_cat','wbc_fabric_damask_cat','wbc_pattern_plain_cat'),
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
                              'value'=>'Regular',
                              'position'=>5,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            )       
                    ),
          'variation'=>array(
                          array(
                            'regular_price'=>'1550',
                            'price'=>'1545',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'M','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_neck_attr'=>'Collared neckline','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_sleeve_attr'=>'Long sleeve','pa_wbc_cloth_collar_attr'=>'Regular')
                          )
                   ) 
        ),
        array(
          'title'=>'Women jacket #20000057',
          'thumb'=>$_img_url.'women_jacket_002.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_jackets_cat','wbc_topwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_women_blue_jacket_cat','wbc_fabric_cotton_cat','wbc_pattern_plain_cat'),
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
                              'value'=>'Regular',
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
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'L','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_neck_attr'=>'Collared neckline','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_sleeve_attr'=>'Long sleeve','pa_wbc_cloth_collar_attr'=>'Regular')
                          )
                   ) 
        ),
        array(
          'title'=>'Women top #20000058',
          'thumb'=>$_img_url.'women_tops_003.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_tops_cat','wbc_topwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_women_maroon_tops_bluebottom_cat','wbc_fabric_silk_cat','wbc_pattern_plain_cat'),
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
                              'value'=>'Maroon',
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
                              'value'=>'Long sleeve',
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
                            'regular_price'=>'1200',
                            'price'=>'1180',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'M','pa_wbc_cloth_colour_attr'=>'Maroon','pa_wbc_cloth_neck_attr'=>'Crew','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_sleeve_attr'=>'Long sleeve','pa_wbc_cloth_collar_attr'=>'Spread')
                          )
                   ) 
        ),
        array(
          'title'=>'Women shirt #20000059',
          'thumb'=>$_img_url.'women_shirt_002.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_shirts_cat','wbc_topwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_women_blue_shirts_cat','wbc_fabric_cotton_cat','wbc_pattern_plain_cat'),
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
                              'value'=>'Regular',
                              'position'=>5,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            )       
                    ),
          'variation'=>array(
                          array(
                            'regular_price'=>'1500',
                            'price'=>'1495',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'XL','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_neck_attr'=>'Collared neckline','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_sleeve_attr'=>'Long sleeve','pa_wbc_cloth_collar_attr'=>'Regular')
                          )
                    )      
          ),
          array(
          'title'=>'Women shirt #20000060',
          'thumb'=>$_img_url.'women_shirts_002.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_shirts_cat','wbc_topwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_women_whiteshirts_blackbottom_cat','wbc_fabric_cotton_cat','wbc_pattern_checks_cat'),
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
                              'value'=>'Roll-up sleeve',
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
                            'regular_price'=>'1850',
                            'price'=>'1745',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'L','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_neck_attr'=>'Collared neckline','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_sleeve_attr'=>'Roll-up sleeve','pa_wbc_cloth_collar_attr'=>'Regular')
                          )
                   )
          ),
          //copy-5
          array(
          'title'=>'Women sweater #20000061',
          'thumb'=>$_img_url.'women_sweater_001.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable', //simple | variable
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_sweaters_cat','wbc_topwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_women_green_sweater_cat','wbc_fabric_jersey_cat','wbc_pattern_plaid_cat'),
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
                              'value'=>'Green',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_neck_attr'=>array(
                              'name'=>'pa_wbc_cloth_neck_attr',
                              'value'=>'V neckline',
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
                            'price'=>'730',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'L','pa_wbc_cloth_colour_attr'=>'Green','pa_wbc_cloth_neck_attr'=>'V neckline','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_sleeve_attr'=>'Long sleeve','pa_wbc_cloth_collar_attr'=>'Spread')
                          )
                   ) 
        ),
        array(
          'title'=>'Women sweater #20000062',
          'thumb'=>$_img_url.'women_sweater_002.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_sweaters_cat','wbc_topwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_women_gray_sweater_cat','wbc_fabric_jersey_cat','wbc_pattern_stripes_cat'),
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
                            'regular_price'=>'850',
                            'price'=>'840',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'L','pa_wbc_cloth_colour_attr'=>'Gray','pa_wbc_cloth_neck_attr'=>'Collared neckline','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_sleeve_attr'=>'Long sleeve','pa_wbc_cloth_collar_attr'=>'Regular')
                          )
                   ) 
        ),
        array(
          'title'=>'Women sweater #20000063',
          'thumb'=>$_img_url.'women_sweater_003.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_sweaters_cat','wbc_topwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_women_purple_sweater_cat','wbc_fabric_wool_cat','wbc_pattern_stripes_cat'),
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
                              'value'=>'Purple',
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
                            'regular_price'=>'450',
                            'price'=>'440',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'M','pa_wbc_cloth_colour_attr'=>'Purple','pa_wbc_cloth_neck_attr'=>'Collared neckline','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_sleeve_attr'=>'Long sleeve','pa_wbc_cloth_collar_attr'=>'Regular')
                          )
                   ) 
        ),
        array(
          'title'=>'Women top #20000064',
          'thumb'=>$_img_url.'women_tops_001.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_tops_cat','wbc_topwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_women_red_tops_cat','wbc_fabric_silk_cat','wbc_pattern_plain_cat'),
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
                              'value'=>'Lounge',
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
                              'value'=>'Spread',
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
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'L','pa_wbc_cloth_colour_attr'=>'Red','pa_wbc_cloth_neck_attr'=>'Crew','pa_wbc_cloth_occasion_attr'=>'Lounge','pa_wbc_cloth_sleeve_attr'=>'Long sleeve','pa_wbc_cloth_collar_attr'=>'Spread')
                          )
                   ) 
        ),
        array(
          'title'=>'Women top #20000065',
          'thumb'=>$_img_url.'women_tops_002.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_tops_cat','wbc_topwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_women_green_tops_cat','wbc_fabric_cotton_cat','wbc_pattern_plaid_cat'),
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
                              'value'=>'Green',
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
                            'price'=>'945',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'L','pa_wbc_cloth_colour_attr'=>'Green','pa_wbc_cloth_neck_attr'=>'Collared neckline','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_sleeve_attr'=>'Long sleeve','pa_wbc_cloth_collar_attr'=>'Regular')
                          )
                   ) 
        ),
        array(
          'title'=>'Women top #20000066',
          'thumb'=>$_img_url.'women_tops_004.jpg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_tops_cat','wbc_topwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_women_maroon_tops_cat','wbc_fabric_damask_cat','wbc_pattern_detailing_cat'),
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
                              'value'=>'Maroon',
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
                              'value'=>'Long sleeve',
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
                            'regular_price'=>'1550',
                            'price'=>'1545',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'L','pa_wbc_cloth_colour_attr'=>'Maroon','pa_wbc_cloth_neck_attr'=>'Crew','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_sleeve_attr'=>'Long sleeve','pa_wbc_cloth_collar_attr'=>'Spread')
                          )
                   ) 
        ),
        array(
          'title'=>'Women tunic #20000067',
          'thumb'=>$_img_url.'women_tunic_001.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_tunics_cat','wbc_topwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_women_whitetunic_bluebottom_cat','wbc_fabric_linen_cat','wbc_pattern_printed_cat'),
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
                              'value'=>'Long sleeve',
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
                            'regular_price'=>'1250',
                            'price'=>'1245',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'XL','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_neck_attr'=>'Crew','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_sleeve_attr'=>'Long sleeve','pa_wbc_cloth_collar_attr'=>'Spread')
                          )
                   ) 
        ),
        array(
          'title'=>'Women tunic #20000068',
          'thumb'=>$_img_url.'women_tunic_002.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_tunics_cat','wbc_topwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_women_orange_tunic_cat','wbc_fabric_cotton_cat','wbc_pattern_plain_cat'),
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
                              'value'=>'Orange',
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
                              'value'=>'Roll-up sleeve',
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
                            'regular_price'=>'1200',
                            'price'=>'1180',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'L','pa_wbc_cloth_colour_attr'=>'Orange','pa_wbc_cloth_neck_attr'=>'Crew','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_sleeve_attr'=>'Roll-up sleeve','pa_wbc_cloth_collar_attr'=>'Spread')
                          )
                   ) 
        ),
        array(
          'title'=>'Women tunic #20000069',
          'thumb'=>$_img_url.'women_tunic_003.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_tunics_cat','wbc_topwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_women_white_tunic_cat','wbc_fabric_cotton_cat','wbc_pattern_detailing_cat'),
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
                              'value'=>'Funnel neckline',
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
                            'regular_price'=>'1500',
                            'price'=>'1495',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'XL','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_neck_attr'=>'Funnel neckline','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_sleeve_attr'=>'Short sleeve','pa_wbc_cloth_collar_attr'=>'Funnel')
                          )
                    )      
          ),
          array(
          'title'=>'Women shirt #20000060',
          'thumb'=>$_img_url.'women_white_shirt_1.jpg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_shirts_cat','wbc_topwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_women_white_shirts_cat','wbc_fabric_linen_cat','wbc_pattern_plain_cat'),
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
                              'value'=>'V neckline',
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
                              'value'=>'Roll-up sleeve',
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
                            'regular_price'=>'1850',
                            'price'=>'1745',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'L','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_neck_attr'=>'V neckline','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_sleeve_attr'=>'Roll-up sleeve','pa_wbc_cloth_collar_attr'=>'Band')
                          )
                   )
          ),
          // Bottom-wear 
          array(
          'title'=>'Trouser #20000011',
          'thumb'=>$_img_url.'formal_white_pant.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_trousers_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_white_trousers_cat','wbc_fabric_cotton_cat','wbc_pattern_plain_cat'),
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
                    'pa_wbc_cloth_fit_attr'=>array(
                              'name'=>'pa_wbc_cloth_fit_attr',
                              'value'=>'Easy',
                              'position'=>3,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_closure_type_attr'=>array(
                              'name'=>'pa_wbc_cloth_closure_type_attr',
                              'value'=>'Button',
                              'position'=>4,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_length_attr'=>array(
                              'name'=>'pa_wbc_cloth_length_attr',
                              'value'=>'Regular',
                              'position'=>5,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            )
                    ),
          'variation'=>array(
                          array(
                            'regular_price'=>'1020',
                            'price'=>'1010',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'30','pa_wbc_cloth_colour_attr'=>'white','pa_wbc_cloth_occasion_attr'=>'Formal','pa_wbc_cloth_fit_attr'=>'Easy','pa_wbc_cloth_closure_type_attr'=>'Button','pa_wbc_cloth_length_attr'=>'Regular')
                          )
                   )
          ),
          array(
          'title'=>'Trouser #20000012',
          'thumb'=>$_img_url.'formal_black_pant_1.jpg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_trousers_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_gray_trousers_cat','wbc_fabric_cotton_cat','wbc_pattern_plain_cat'),
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
                              'value'=>'Gray',
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
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'32','pa_wbc_cloth_colour_attr'=>'Gray','pa_wbc_cloth_occasion_attr'=>'Formal','pa_wbc_cloth_fit_attr'=>'Slim fit','pa_wbc_cloth_closure_type_attr'=>'Button','pa_wbc_cloth_length_attr'=>'Regular')
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
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_jeans_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_black_jeans_cat','wbc_fabric_cotton_cat','wbc_pattern_plain_cat'),
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
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'28','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_fit_attr'=>'Regular fit','pa_wbc_cloth_closure_type_attr'=>'Button','pa_wbc_cloth_length_attr'=>'Regular')
                          )
                   )
          ),
        array(
          'title'=>'Track pant #20000014',
          'thumb'=>$_img_url.'men_black_track.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_track_pants_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_black_track_cat','wbc_fabric_silk_cat','wbc_pattern_plain_cat'),
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
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'30','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_fit_attr'=>'Skinny fit','pa_wbc_cloth_closure_type_attr'=>'Frog & toggle','pa_wbc_cloth_length_attr'=>'Regular')
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
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_trousers_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_women_black_trousers_cat','wbc_fabric_cotton_cat','wbc_pattern_plain_cat'),
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
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'28','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_occasion_attr'=>'Formal','pa_wbc_cloth_fit_attr'=>'Regular fit','pa_wbc_cloth_closure_type_attr'=>'Elastic','pa_wbc_cloth_length_attr'=>'Regular')
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
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_jeans_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_women_blue_jeans_cat','wbc_fabric_damask_cat','wbc_pattern_stripes_cat'),
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
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'30','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_fit_attr'=>'Slim fit','pa_wbc_cloth_closure_type_attr'=>'Button','pa_wbc_cloth_length_attr'=>'Regular')
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
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_leggings_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_women_blue_leggings_cat','wbc_fabric_silk_cat','wbc_pattern_plain_cat'),
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
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'30','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_fit_attr'=>'Skinny fit','pa_wbc_cloth_closure_type_attr'=>'Elastic','pa_wbc_cloth_length_attr'=>'Regular')
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
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_plazzos_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_women_white_palazzos_cat','wbc_fabric_cotton_cat','wbc_pattern_printed_cat'),
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
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'32','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_fit_attr'=>'Flared','pa_wbc_cloth_closure_type_attr'=>'Elastic','pa_wbc_cloth_length_attr'=>'Ankle')
                          )
                   )
          ),
          array(
          'title'=>'Women jeans #20000018',
          'thumb'=>$_img_url.'women_black_pant.jpg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_jeans_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_women_black_jeans_cat','wbc_fabric_cotton_cat','wbc_pattern_plain_cat'),
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
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'28','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_fit_attr'=>'Skinny fit','pa_wbc_cloth_closure_type_attr'=>'Frog & toggle','pa_wbc_cloth_length_attr'=>'Ankle')
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
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_plazzos_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_women_black_palazzos_cat','wbc_fabric_canvas_cat','wbc_pattern_plain_cat'),
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
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'32','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_fit_attr'=>'Regular fit','pa_wbc_cloth_closure_type_attr'=>'Hook','pa_wbc_cloth_length_attr'=>'Ankle')
                          )
                   )
          ),
          array(
          'title'=>'Women jeans #20000020',
          'thumb'=>$_img_url.'women_jeans_005.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_jeans_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_women_darkblue_jeans_cat','wbc_fabric_cotton_cat','wbc_pattern_plain_cat'),
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
                            'regular_price'=>'1550',
                            'price'=>'1540',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'30','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_fit_attr'=>'Regular fit','pa_wbc_cloth_closure_type_attr'=>'Button','pa_wbc_cloth_length_attr'=>'Regular')
                          )
                   )
          ),
          //copy-01
          array(
          'title'=>'Men jeans #20000071',
          'thumb'=>$_img_url.'men_blue_jeans_4.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_jeans_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_blue_jeans_cat','wbc_fabric_cotton_cat','wbc_pattern_plain_cat'),
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
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'32','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_fit_attr'=>'Easy','pa_wbc_cloth_closure_type_attr'=>'Button','pa_wbc_cloth_length_attr'=>'Regular')
                          )
                   )
          ),
          array(
          'title'=>'Men jeans #20000072',
          'thumb'=>$_img_url.'men_blue_jeans_5.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_jeans_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_blue_jeans_cat','wbc_fabric_cotton_cat','wbc_pattern_plain_cat'),
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
                            'regular_price'=>'950',
                            'price'=>'945',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'28','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_fit_attr'=>'Regular fit','pa_wbc_cloth_closure_type_attr'=>'Button','pa_wbc_cloth_length_attr'=>'Regular')
                          )
                   )
          ),
          array(
          'title'=>'Men trouser #20000073',
          'thumb'=>$_img_url.'men_trouser_008.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_trousers_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_blue_trousers_cat','wbc_fabric_cotton_cat','wbc_pattern_checks_cat'),
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
                              'value'=>'Formal',
                              'position'=>2,
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
                              'value'=>'Ankle',
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
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'30','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_occasion_attr'=>'Formal','pa_wbc_cloth_fit_attr'=>'Regular fit','pa_wbc_cloth_closure_type_attr'=>'Button','pa_wbc_cloth_length_attr'=>'Ankle')
                          )
                   )
          ),
         array(
          'title'=>'Men trouser #20000121',
          'thumb'=>$_img_url.'men_black_pant.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_trousers_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_black_trousers_cat','wbc_fabric_cotton_cat','wbc_pattern_pain_cat'),
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
                              'value'=>'Ankle',
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
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'28','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_occasion_attr'=>'Formal','pa_wbc_cloth_fit_attr'=>'Regular fit','pa_wbc_cloth_closure_type_attr'=>'Button','pa_wbc_cloth_length_attr'=>'Ankle')
                          )
                   )
          ),
        array(
          'title'=>'Men jeans #20000074',
          'thumb'=>$_img_url.'men_jeans_002.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_jeans_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_blue_jeans_cat','wbc_fabric_cotton_cat','wbc_pattern_plain_cat'),
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
                            'regular_price'=>'1200',
                            'price'=>'1190',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'32','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_fit_attr'=>'Regular fit','pa_wbc_cloth_closure_type_attr'=>'Button','pa_wbc_cloth_length_attr'=>'Regular')
                          )
                   )
          ),
        array(
          'title'=>'Men jeans #20000075',
          'thumb'=>$_img_url.'men_jeans_003.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_jeans_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_black_jeans_cat','wbc_fabric_cotton_cat','wbc_pattern_plain_cat'),
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
                            'regular_price'=>'850',
                            'price'=>'840',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'28','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_fit_attr'=>'Regular fit','pa_wbc_cloth_closure_type_attr'=>'Button','pa_wbc_cloth_length_attr'=>'Regular')
                          )
                   )
          ),
         array(
          'title'=>'Men jeans #20000076',
          'thumb'=>$_img_url.'men_jeans_006.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_jeans_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_blck_jeans_cat','wbc_fabric_cotton_cat','wbc_pattern_plaid_cat'),
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
                            'regular_price'=>'1000',
                            'price'=>'990',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'32','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_fit_attr'=>'Regular fit','pa_wbc_cloth_closure_type_attr'=>'Button','pa_wbc_cloth_length_attr'=>'Regular')
                          )
                   )
          ),
         array(
          'title'=>'Men jeans #20000077',
          'thumb'=>$_img_url.'men_jeans_007.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_jeans_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_white_jeans_cat','wbc_fabric_cotton_cat','wbc_pattern_plain_cat'),
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
                            'regular_price'=>'550',
                            'price'=>'545',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'28','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_fit_attr'=>'Skinny fit','pa_wbc_cloth_closure_type_attr'=>'Button','pa_wbc_cloth_length_attr'=>'Regular')
                          )
                   )
          ),
         array(
          'title'=>'Men short #20000078',
          'thumb'=>$_img_url.'men_short_001.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_shorts_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_gray_shorts_cat','wbc_fabric_cotton_cat','wbc_pattern_plain_cat'),
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
                              'value'=>'Gray',
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
                              'value'=>'Knee',
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
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'30','pa_wbc_cloth_colour_attr'=>'Gray','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_fit_attr'=>'Skinny fit','pa_wbc_cloth_closure_type_attr'=>'Frog & toggle','pa_wbc_cloth_length_attr'=>'Knee')
                          )
                   )
          ),
          array(
          'title'=>'Men short #20000079',
          'thumb'=>$_img_url.'men_short_002.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_shorts_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_black_shorts_cat','wbc_fabric_silk_cat','wbc_pattern_plain_cat'),
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
                              'value'=>'Elastic',
                              'position'=>5,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_length_attr'=>array(
                              'name'=>'pa_wbc_cloth_length_attr',
                              'value'=>'Knee',
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
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'30','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_fit_attr'=>'Easy','pa_wbc_cloth_closure_type_attr'=>'Elastic','pa_wbc_cloth_length_attr'=>'Knee')
                          )
                   )
          ),
         array(
          'title'=>'Men short #20000080',
          'thumb'=>$_img_url.'men_short_003.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_shorts_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_white_shorts_cat','wbc_fabric_cotton_cat','wbc_pattern_printed_cat'),
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
                              'value'=>'Frog & toggle',
                              'position'=>5,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_length_attr'=>array(
                              'name'=>'pa_wbc_cloth_length_attr',
                              'value'=>'Knee',
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
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'28','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_fit_attr'=>'Easy','pa_wbc_cloth_closure_type_attr'=>'Frog & toggle','pa_wbc_cloth_length_attr'=>'Knee')
                          )
                   )
          ),
          //copy-02
          array(
          'title'=>'Men short #20000081',
          'thumb'=>$_img_url.'men_short_004.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_shorts_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_blue_shorts_cat','wbc_fabric_cotton_cat','wbc_pattern_plain_cat'),
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
                              'value'=>'Knee',
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
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'30','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_fit_attr'=>'Easy','pa_wbc_cloth_closure_type_attr'=>'Button','pa_wbc_cloth_length_attr'=>'Knee')
                          )
                   )
          ),
          array(
          'title'=>'Women plazzo #20000082',
          'thumb'=>$_img_url.'women_plazzo_002.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_plazzos_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_women_blue_palazzos_cat','wbc_fabric_silk_cat','wbc_pattern_printed_cat'),
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
                            'regular_price'=>'950',
                            'price'=>'945',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'28','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_fit_attr'=>'Easy','pa_wbc_cloth_closure_type_attr'=>'Frog & toggle','pa_wbc_cloth_length_attr'=>'Ankle')
                          )
                   )
          ),
          array(
          'title'=>'Men track #20000083',
          'thumb'=>$_img_url.'men_track_001.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_track_pants_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_black_track_cat','wbc_fabric_cotton_cat','wbc_pattern_plain_cat'),
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
                            'regular_price'=>'1350',
                            'price'=>'1340',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'28','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_fit_attr'=>'Regular fit','pa_wbc_cloth_closure_type_attr'=>'Frog & toggle','pa_wbc_cloth_length_attr'=>'Regular')
                          )
                   )
          ),
        array(
          'title'=>'Men track #20000084',
          'thumb'=>$_img_url.'men_track_003.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_track_pants_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_white_track_cat','wbc_fabric_cotton_cat','wbc_pattern_printed_cat'),
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
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'30','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_fit_attr'=>'Skinny fit','pa_wbc_cloth_closure_type_attr'=>'Frog & toggle','pa_wbc_cloth_length_attr'=>'Regular')
                          )
                   )
          ),
        array(
          'title'=>'Men track #20000085',
          'thumb'=>$_img_url.'men_track_004.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_track_pants_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_gray_track_cat','wbc_fabric_silk_cat','wbc_pattern_printed_cat'),
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
                              'value'=>'Gray',
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
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'32','pa_wbc_cloth_colour_attr'=>'Gray','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_fit_attr'=>'Regular fit','pa_wbc_cloth_closure_type_attr'=>'Elastic','pa_wbc_cloth_length_attr'=>'Regular')
                          )
                   )
          ),
         array(
          'title'=>'Men trouser #20000086',
          'thumb'=>$_img_url.'men_trouser_001.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_trousers_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_yellow_trousers_cat','wbc_fabric_cotton_cat','wbc_pattern_plain_cat'),
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
                              'value'=>'Yellow',
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
                            'regular_price'=>'1000',
                            'price'=>'990',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'32','pa_wbc_cloth_colour_attr'=>'Yellow','pa_wbc_cloth_occasion_attr'=>'Formal','pa_wbc_cloth_fit_attr'=>'Regular fit','pa_wbc_cloth_closure_type_attr'=>'Button','pa_wbc_cloth_length_attr'=>'Regular')
                          )
                   )
          ),
         array(
          'title'=>'Men trouser #20000087',
          'thumb'=>$_img_url.'men_trouser_002.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_trousers_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_maroon_trousers_cat','wbc_fabric_cotton_cat','wbc_pattern_plain_cat'),
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
                              'value'=>'Maroon',
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
                            'regular_price'=>'550',
                            'price'=>'545',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'28','pa_wbc_cloth_colour_attr'=>'Maroon','pa_wbc_cloth_occasion_attr'=>'Formal','pa_wbc_cloth_fit_attr'=>'Regular fit','pa_wbc_cloth_closure_type_attr'=>'Button','pa_wbc_cloth_length_attr'=>'Regular')
                          )
                   )
          ),
         array(
          'title'=>'Men track #20000088',
          'thumb'=>$_img_url.'men_track.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_track_pants_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_blue_track_cat','wbc_fabric_cotton_cat','wbc_pattern_plain_cat'),
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
                            'regular_price'=>'1260',
                            'price'=>'1250',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'30','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_fit_attr'=>'Regular fit','pa_wbc_cloth_closure_type_attr'=>'Frog & toggle','pa_wbc_cloth_length_attr'=>'Regular')
                          )
                   )
          ),
          array(
          'title'=>'Men jeans #20000089',
          'thumb'=>$_img_url.'men_jeans_008.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_jeans_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_blue_jeans_cat','wbc_fabric_cotton_cat','wbc_pattern_plain_cat'),
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
                            'regular_price'=>'1200',
                            'price'=>'1190',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'28','pa_wbc_cloth_colour_attr'=>'Button','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_fit_attr'=>'Skinny fit','pa_wbc_cloth_closure_type_attr'=>'Button','pa_wbc_cloth_length_attr'=>'Regular')
                          )
                   )
          ),
         array(
          'title'=>'Men trouser #20000090',
          'thumb'=>$_img_url.'men_trouser_005.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_trousers_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_blue_trousers_cat','wbc_fabric_canvas_cat','wbc_pattern_plain_cat'),
          'attribute'=>array(
                    'pa_wbc_cloth_size_attr'=>array(
                              'name'=>'pa_wbc_cloth_size_attr',
                              'value'=>'36',
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
                              'value'=>'Formal',
                              'position'=>2,
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
                              'value'=>'Regular',
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
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'36','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_occasion_attr'=>'Formal','pa_wbc_cloth_fit_attr'=>'Regular fit','pa_wbc_cloth_closure_type_attr'=>'Hook','pa_wbc_cloth_length_attr'=>'Regular')
                          )
                   )
          ),
          //copy-03
          array(
          'title'=>'Men trouser #20000091',
          'thumb'=>$_img_url.'men_trouser_006.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_trousers_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_white_trousers_cat','wbc_fabric_cotton_cat','wbc_pattern_checks_cat'),
          'attribute'=>array(
                    'pa_wbc_cloth_size_attr'=>array(
                              'name'=>'pa_wbc_cloth_size_attr',
                              'value'=>'38',
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
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'38','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_occasion_attr'=>'Formal','pa_wbc_cloth_fit_attr'=>'Skinny fit','pa_wbc_cloth_closure_type_attr'=>'Button','pa_wbc_cloth_length_attr'=>'Regular')
                          )
                   )
          ),
          array(
          'title'=>'Men jeans #20000092',
          'thumb'=>$_img_url.'men_jeans_009.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_jeans_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_blue_jeans_cat','wbc_fabric_cotton_cat','wbc_pattern_plain_cat'),
          'attribute'=>array(
                    'pa_wbc_cloth_size_attr'=>array(
                              'name'=>'pa_wbc_cloth_size_attr',
                              'value'=>'38',
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
                            'regular_price'=>'950',
                            'price'=>'945',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'38','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_fit_attr'=>'Regular fit','pa_wbc_cloth_closure_type_attr'=>'Button','pa_wbc_cloth_length_attr'=>'Regular')
                          )
                   )
          ),
          array(
          'title'=>'Women jeans #20000093',
          'thumb'=>$_img_url.'women_jeans_001.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_jeans_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_women_blue_jogger_jeans_cat','wbc_fabric_canvas_cat','wbc_pattern_printed_cat'),
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
                            'regular_price'=>'1350',
                            'price'=>'1340',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'S','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_fit_attr'=>'Regular fit','pa_wbc_cloth_closure_type_attr'=>'Frog & toggle','pa_wbc_cloth_length_attr'=>'Regular')
                          )
                   )
          ),
        array(
          'title'=>'Women jeans #20000094',
          'thumb'=>$_img_url.'women_jeans_002.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_jeans_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_women_black_jeans_cat','wbc_fabric_polyester_cat','wbc_pattern_plain_cat'),
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
                            'regular_price'=>'1200',
                            'price'=>'1190',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'28','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_fit_attr'=>'Skinny fit','pa_wbc_cloth_closure_type_attr'=>'Elastic','pa_wbc_cloth_length_attr'=>'Regular')
                          )
                   )
          ),
        array(
          'title'=>'Women jeans #20000095',
          'thumb'=>$_img_url.'women_jeans_003.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_jeans_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_women_blue_jogger_jeans_cat','wbc_fabric_cotton_cat','wbc_pattern_printed_cat'),
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
                            'regular_price'=>'850',
                            'price'=>'840',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'30','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_fit_attr'=>'Regular fit','pa_wbc_cloth_closure_type_attr'=>'Frog & toggle','pa_wbc_cloth_length_attr'=>'Regular')
                          )
                   )
          ),
         array(
          'title'=>'Women leggings #20000096',
          'thumb'=>$_img_url.'women_leggins_001.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_leggings_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_women_black_leggings_cat','wbc_fabric_damask_cat','wbc_pattern_plaid_cat'),
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
                            'regular_price'=>'1000',
                            'price'=>'990',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'30','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_fit_attr'=>'Slim fit','pa_wbc_cloth_closure_type_attr'=>'Elastic','pa_wbc_cloth_length_attr'=>'Regular')
                          )
                   )
          ),
         array(
          'title'=>'Women leggings #20000097',
          'thumb'=>$_img_url.'women_leggins_003.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_leggings_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_women_gray_leggings_cat','wbc_fabric_cotton_cat','wbc_pattern_plain_cat'),
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
                              'value'=>'Gray',
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
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'30','pa_wbc_cloth_colour_attr'=>'Gray','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_fit_attr'=>'Skinny fit','pa_wbc_cloth_closure_type_attr'=>'Elastic','pa_wbc_cloth_length_attr'=>'Regular')
                          )
                   )
          ),
         array(
          'title'=>'Women leggings #20000098',
          'thumb'=>$_img_url.'women_leggins_004.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_leggings_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_women_black_leggings_cat','wbc_fabric_cotton_cat','wbc_pattern_plain_cat'),
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
                            'regular_price'=>'1260',
                            'price'=>'1250',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'28','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_fit_attr'=>'Skinny fit','pa_wbc_cloth_closure_type_attr'=>'Elastic','pa_wbc_cloth_length_attr'=>'Regular')
                          )
                   )
          ),
          array(
          'title'=>'Women Leggings #20000099',
          'thumb'=>$_img_url.'women_leggins_005.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_leggings_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_women_blue_leggings_cat','wbc_fabric_cotton_cat','wbc_pattern_plain_cat'),
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
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'28','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_fit_attr'=>'Skinny fit','pa_wbc_cloth_closure_type_attr'=>'Frog & toggle','pa_wbc_cloth_length_attr'=>'Regular')
                          )
                   )
          ),
         array(
          'title'=>'Women plazzo #2000100',
          'thumb'=>$_img_url.'women_plazzo_001.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_plazzos_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_women_white_palazzos_cat','wbc_fabric_canvas_cat','wbc_pattern_printed_cat'),
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
                    
                    'pa_wbc_cloth_fit_attr'=>array(
                              'name'=>'pa_wbc_cloth_fit_attr',
                              'value'=>'Tapered fit',
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
                            'regular_price'=>'1500',
                            'price'=>'1490',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'32','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_fit_attr'=>'Tapered fit','pa_wbc_cloth_closure_type_attr'=>'Elastic','pa_wbc_cloth_length_attr'=>'Regular')
                          )
                   )
          ),
         //copy-04
          array(
          'title'=>'Women skirt #20000101',
          'thumb'=>$_img_url.'women_skirt_002.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_skirts_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_women_red_skirt_cat','wbc_fabric_linen_cat','wbc_pattern_plaid_cat'),
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
                              'value'=>'Red',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_occasion_attr'=>array(
                              'name'=>'pa_wbc_cloth_occasion_attr',
                              'value'=>'Ethnic',
                              'position'=>2,
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
                            'regular_price'=>'1020',
                            'price'=>'1010',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'30','pa_wbc_cloth_colour_attr'=>'Red','pa_wbc_cloth_occasion_attr'=>'Ethnic','pa_wbc_cloth_fit_attr'=>'Flared','pa_wbc_cloth_closure_type_attr'=>'Frog & toggle','pa_wbc_cloth_length_attr'=>'Regular')
                          )
                   )
          ),
          array(
          'title'=>'Women track #20000102',
          'thumb'=>$_img_url.'women_tack_002.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_track_pants_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_women_black_track_cat','wbc_fabric_cotton_cat','wbc_pattern_plain_cat'),
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
                            'regular_price'=>'950',
                            'price'=>'945',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'28','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_fit_attr'=>'Slim fit','pa_wbc_cloth_closure_type_attr'=>'Frog & toggle','pa_wbc_cloth_length_attr'=>'Regular')
                          )
                   )
          ),
          array(
          'title'=>'Women track #20000103',
          'thumb'=>$_img_url.'women_track_001.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_track_pants_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_women_blue_track_cat','wbc_fabric_cotton_cat','wbc_pattern_plain_cat'),
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
                    
                    'pa_wbc_cloth_fit_attr'=>array(
                              'name'=>'pa_wbc_cloth_fit_attr',
                              'value'=>'Ultra slim',
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
                            'regular_price'=>'1350',
                            'price'=>'1340',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'28','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_fit_attr'=>'Ultra slim','pa_wbc_cloth_closure_type_attr'=>'Frog & toggle','pa_wbc_cloth_length_attr'=>'Regular')
                          )
                   )
          ),
        array(
          'title'=>'Women track #20000104',
          'thumb'=>$_img_url.'women_track_003.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_track_pants_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_women_black_track_cat','wbc_fabric_silk_cat','wbc_pattern_plain_cat'),
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
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'30','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_fit_attr'=>'Skinny fit','pa_wbc_cloth_closure_type_attr'=>'Frog & toggle','pa_wbc_cloth_length_attr'=>'Regular')
                          )
                   )
          ),
        array(
          'title'=>'Women trouser #20000105',
          'thumb'=>$_img_url.'women_trouser_001.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_trousers_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_women_pink_trousers_cat','wbc_fabric_cotton_cat','wbc_pattern_plain_cat'),
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
                              'value'=>'Pink',
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
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'28','pa_wbc_cloth_colour_attr'=>'Pink','pa_wbc_cloth_occasion_attr'=>'Formal','pa_wbc_cloth_fit_attr'=>'Regular fit','pa_wbc_cloth_closure_type_attr'=>'Elastic','pa_wbc_cloth_length_attr'=>'Regular')
                          )
                   )
          ),
         array(
          'title'=>'Women trouser #20000106',
          'thumb'=>$_img_url.'women_trouser_002.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_trousers_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_women_blue_trousers_cat','wbc_fabric_damask_cat','wbc_pattern_checks_cat'),
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
                            'regular_price'=>'1000',
                            'price'=>'990',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'30','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_fit_attr'=>'Slim fit','pa_wbc_cloth_closure_type_attr'=>'Elastic','pa_wbc_cloth_length_attr'=>'Regular')
                          )
                   )
          ),
         array(
          'title'=>'Women trouser #20000107',
          'thumb'=>$_img_url.'women_trouser_003.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_trousers_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_women_blue_trousers_cat','wbc_fabric_silk_cat','wbc_pattern_plain_cat'),
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
                              'value'=>'Cocktail Attire',
                              'position'=>2,
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
                            'regular_price'=>'550',
                            'price'=>'545',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'30','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_occasion_attr'=>'Cocktail Attire','pa_wbc_cloth_fit_attr'=>'Regular fit','pa_wbc_cloth_closure_type_attr'=>'Elastic','pa_wbc_cloth_length_attr'=>'Regular')
                          )
                   )
          ),
         array(
          'title'=>'Women Trouser #20000108',
          'thumb'=>$_img_url.'women_trouser_004.jpg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_trousers_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_women_white_trousers_cat','wbc_fabric_cotton_cat','wbc_pattern_plain_cat'),
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
                              'value'=>'Button',
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
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'32','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_fit_attr'=>'Skinny fit','pa_wbc_cloth_closure_type_attr'=>'Button','pa_wbc_cloth_length_attr'=>'Ankle')
                          )
                   )
          ),
          array(
          'title'=>'Women trouser #20000109',
          'thumb'=>$_img_url.'women_trouser_005.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_trousers_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_women_black_trousers_cat','wbc_fabric_cotton_cat','wbc_pattern_plain_cat'),
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
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'28','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_fit_attr'=>'Skinny fit','pa_wbc_cloth_closure_type_attr'=>'Elastic','pa_wbc_cloth_length_attr'=>'Ankle')
                          )
                   )
          ),
         array(
          'title'=>'Men track #20000110',
          'thumb'=>$_img_url.'men_track_002.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_track_pants_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_white_track_cat','wbc_fabric_canvas_cat','wbc_pattern_plain_cat'),
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
                            'regular_price'=>'1500',
                            'price'=>'1490',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'32','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_fit_attr'=>'Regular fit','pa_wbc_cloth_closure_type_attr'=>'\Frog & toggle','pa_wbc_cloth_length_attr'=>'Regular')
                          )
                   )
          ),
        //copy-05
        array(
          'title'=>'Women leggins #20000111',
          'thumb'=>$_img_url.'women_leggins_002.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_leggings_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_women_white_leggings_cat','wbc_fabric_cotton_cat','wbc_pattern_plain_cat'),
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
                    
                    'pa_wbc_cloth_fit_attr'=>array(
                              'name'=>'pa_wbc_cloth_fit_attr',
                              'value'=>'Ultra slim',
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
                            'regular_price'=>'1320',
                            'price'=>'1310',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'30','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_fit_attr'=>'Ultra slim','pa_wbc_cloth_closure_type_attr'=>'Elastic','pa_wbc_cloth_length_attr'=>'Regular')
                          )
                   )
          ),
          array(
          'title'=>'Women plazzo #20000112',
          'thumb'=>$_img_url.'women_plazzo_003.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_plazzos_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_women_white_palazzos_cat','wbc_fabric_cotton_cat','wbc_pattern_plain_cat'),
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
                              'value'=>'Regular',
                              'position'=>6,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            )
                    ),
          'variation'=>array(
                          array(
                            'regular_price'=>'1950',
                            'price'=>'1945',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'32','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_fit_attr'=>'Flared','pa_wbc_cloth_closure_type_attr'=>'Elastic','pa_wbc_cloth_length_attr'=>'Regular')
                          )
                   )
          ),
          array(
          'title'=>'Women plazzo #20000113',
          'thumb'=>$_img_url.'women_plazzo_004.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_plazzos_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_women_black_palazzos_cat','wbc_fabric_cotton_cat','wbc_pattern_checks_cat'),
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
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'28','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_fit_attr'=>'Flared','pa_wbc_cloth_closure_type_attr'=>'Elastic','pa_wbc_cloth_length_attr'=>'Regular')
                          )
                   )
          ),
        array(
          'title'=>'Women jeans #20000114',
          'thumb'=>$_img_url.'women_jeans_004.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_jeans_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_women_blue_jeans_cat','wbc_fabric_cotton_cat','wbc_pattern_plain_cat'),
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
                            'regular_price'=>'1700',
                            'price'=>'1790',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'30','pa_wbc_cloth_colour_attr'=>'blue','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_fit_attr'=>'Skinny fit','pa_wbc_cloth_closure_type_attr'=>'Button','pa_wbc_cloth_length_attr'=>'Regular')
                          )
                   )
          ),
        array(
          'title'=>'Women plazzo #20000115',
          'thumb'=>$_img_url.'women_plazzo_006.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_plazzos_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_women_skyblue_palazzos_cat','wbc_fabric_cotton_cat','wbc_pattern_plain_cat'),
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
                              'value'=>'Blue',
                              'position'=>1,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_occasion_attr'=>array(
                              'name'=>'pa_wbc_cloth_occasion_attr',
                              'value'=>'Cocktail Attire',
                              'position'=>2,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    
                    'pa_wbc_cloth_fit_attr'=>array(
                              'name'=>'pa_wbc_cloth_fit_attr',
                              'value'=>'Hem fit',
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
                            'regular_price'=>'1850',
                            'price'=>'1840',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'28','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_occasion_attr'=>'Cocktail Attire','pa_wbc_cloth_fit_attr'=>'Hem fit','pa_wbc_cloth_closure_type_attr'=>'Elastic','pa_wbc_cloth_length_attr'=>'Regular')
                          )
                   )
          ),
         array(
          'title'=>'Women short #20000116',
          'thumb'=>$_img_url.'women_short_001.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_shorts_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_women_blue_shorts_cat','wbc_fabric_cotton_cat','wbc_pattern_printed_cat'),
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
                            'regular_price'=>'1090',
                            'price'=>'1080',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'30','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_fit_attr'=>'Regular fit','pa_wbc_cloth_closure_type_attr'=>'Frog & toggle','pa_wbc_cloth_length_attr'=>'Regular')
                          )
                   )
          ),
         array(
          'title'=>'Women short #20000117',
          'thumb'=>$_img_url.'women_short_002.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_shorts_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_women_blue_shorts_cat','wbc_fabric_cotton_cat','wbc_pattern_plain_cat'),
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
                              'value'=>'Knee',
                              'position'=>6,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            )
                    ),
          'variation'=>array(
                          array(
                            'regular_price'=>'1650',
                            'price'=>'1645',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'30','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_fit_attr'=>'Regular fit','pa_wbc_cloth_closure_type_attr'=>'Button','pa_wbc_cloth_length_attr'=>'Knee')
                          )
                   )
          ),
         array(
          'title'=>'Women short #20000118',
          'thumb'=>$_img_url.'women_short_003.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_shorts_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_women_black_shorts_cat','wbc_fabric_cotton_cat','wbc_pattern_printed_cat'),
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
                              'value'=>'Frog & toggle',
                              'position'=>5,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_length_attr'=>array(
                              'name'=>'pa_wbc_cloth_length_attr',
                              'value'=>'Knee',
                              'position'=>6,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            )
                    ),
          'variation'=>array(
                          array(
                            'regular_price'=>'2260',
                            'price'=>'2250',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'32','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_fit_attr'=>'Regular fit','pa_wbc_cloth_closure_type_attr'=>'Frog & toggle','pa_wbc_cloth_length_attr'=>'Knee')
                          )
                   )
          ),
          array(
          'title'=>'Women short #20000119',
          'thumb'=>$_img_url.'women_short_004.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_shorts_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_women_black_shorts_cat','wbc_fabric_cotton_cat','wbc_pattern_plain_cat'),
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
                              'value'=>'Knee',
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
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'28','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_fit_attr'=>'Skinny fit','pa_wbc_cloth_closure_type_attr'=>'Elastic','pa_wbc_cloth_length_attr'=>'Knee')
                          )
                   )
          ),
         array(
          'title'=>'Women skirt #20000120',
          'thumb'=>$_img_url.'women_skirt_001.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_skirts_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_women_black_skirt_cat','wbc_fabric_canvas_cat','wbc_pattern_plain_cat'),
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
                              'value'=>'Regular',
                              'position'=>6,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            )
                    ),
          'variation'=>array(
                          array(
                            'regular_price'=>'2500',
                            'price'=>'2490',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'32','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_fit_attr'=>'Flared','pa_wbc_cloth_closure_type_attr'=>'Elastic','pa_wbc_cloth_length_attr'=>'Regular')
                          )
                   )
          ),
          array(
          'title'=>'Men trouser #20000126',
          'thumb'=>$_img_url.'men_suit_pant_001.jpg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_trousers_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_blue_suitpant_cat','wbc_fabric_cotton_cat','wbc_pattern_plain_cat'),
          'attribute'=>array(
                    'pa_wbc_cloth_size_attr'=>array(
                              'name'=>'pa_wbc_cloth_size_attr',
                              'value'=>'34',
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
                              'value'=>'Formal',
                              'position'=>2,
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
                            'regular_price'=>'1660',
                            'price'=>'1650',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'34','pa_wbc_cloth_colour_attr'=>'Blue','pa_wbc_cloth_occasion_attr'=>'Formal','pa_wbc_cloth_fit_attr'=>'Regular fit','pa_wbc_cloth_closure_type_attr'=>'Button','pa_wbc_cloth_length_attr'=>'Regular')
                          )
                   )
          ),
          array(
          'title'=>'Men trouser #20000127',
          'thumb'=>$_img_url.'men_suit_pant_006.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_trousers_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_orange_suitpant_cat','wbc_fabric_cotton_cat','wbc_pattern_plain_cat'),
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
                              'value'=>'Orange',
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
                            'regular_price'=>'1960',
                            'price'=>'1950',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'32','pa_wbc_cloth_colour_attr'=>'Orange','pa_wbc_cloth_occasion_attr'=>'Formal','pa_wbc_cloth_fit_attr'=>'Regular fit','pa_wbc_cloth_closure_type_attr'=>'Button','pa_wbc_cloth_length_attr'=>'Regular')
                          )
                   )
          ),
          array(
          'title'=>'Men trouser #20000128',
          'thumb'=>$_img_url.'men_suit_pant_002.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_trousers_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_gray_suitpant_cat','wbc_fabric_cotton_cat','wbc_pattern_plain_cat'),
          'attribute'=>array(
                    'pa_wbc_cloth_size_attr'=>array(
                              'name'=>'pa_wbc_cloth_size_attr',
                              'value'=>'36',
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
                    'pa_wbc_cloth_occasion_attr'=>array(
                              'name'=>'pa_wbc_cloth_occasion_attr',
                              'value'=>'Formal',
                              'position'=>2,
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
                            'regular_price'=>'1760',
                            'price'=>'1750',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'36','pa_wbc_cloth_colour_attr'=>'Gray','pa_wbc_cloth_occasion_attr'=>'Formal','pa_wbc_cloth_fit_attr'=>'Regular fit','pa_wbc_cloth_closure_type_attr'=>'Button','pa_wbc_cloth_length_attr'=>'Regular')
                          )
                   )
          ),
          array(
          'title'=>'Men trouser #20000129',
          'thumb'=>$_img_url.'men_suit_pnat_004.jpg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_trousers_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_lightgray_suitpant_cat','wbc_fabric_cotton_cat','wbc_pattern_plain_cat'),
          'attribute'=>array(
                    'pa_wbc_cloth_size_attr'=>array(
                              'name'=>'pa_wbc_cloth_size_attr',
                              'value'=>'34',
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
                    'pa_wbc_cloth_occasion_attr'=>array(
                              'name'=>'pa_wbc_cloth_occasion_attr',
                              'value'=>'Formal',
                              'position'=>2,
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
                            'regular_price'=>'1560',
                            'price'=>'1550',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'34','pa_wbc_cloth_colour_attr'=>'Gray','pa_wbc_cloth_occasion_attr'=>'Formal','pa_wbc_cloth_fit_attr'=>'Regular fit','pa_wbc_cloth_closure_type_attr'=>'Button','pa_wbc_cloth_length_attr'=>'Regular')
                          )
                   )
          ),
          array(
          'title'=>'T-shirt #20000130',
          'thumb'=>$_img_url.'men_jockey_001.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_tshirts_cat','wbc_topwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_black_jockey_cat','wbc_fabric_cotton_cat','wbc_pattern_printed_cat'),
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
                              'value'=>'Sleeveless',
                              'position'=>4,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),

                    'pa_wbc_cloth_collar_attr'=>array(
                              'name'=>'pa_wbc_cloth_collar_attr',
                              'value'=>'Mao',
                              'position'=>5,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            )       
                    ),
          'variation'=>array(
                          array(
                            'regular_price'=>'300',
                            'price'=>'295',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'XL','pa_wbc_cloth_colour_attr'=>'Black','pa_wbc_cloth_neck_attr'=>'Crew','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_sleeve_attr'=>'Sleeveless','pa_wbc_cloth_collar_attr'=>'Mao')
                          )
                    )      
          ),
          array(
          'title'=>'T-shirt #20000131',
          'thumb'=>$_img_url.'men_jockey_002.jpeg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_top_wear_cat','wbc_top_wear_tshirts_cat','wbc_topwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_white_jockey_cat','wbc_fabric_cotton_cat','wbc_pattern_plain_cat'),
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
                              'value'=>'Mao',
                              'position'=>5,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            )       
                    ),
          'variation'=>array(
                          array(
                            'regular_price'=>'250',
                            'price'=>'245',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'XL','pa_wbc_cloth_colour_attr'=>'White','pa_wbc_cloth_neck_attr'=>'Crew','pa_wbc_cloth_occasion_attr'=>'Causal','pa_wbc_cloth_sleeve_attr'=>'Sleeveless','pa_wbc_cloth_collar_attr'=>'Mao')
                          )
                    )      
          ),
        array(
          'title'=>'Men trouser #20000132',
          'thumb'=>$_img_url.'men_blue_suit_pant.jpg',
          'content'=>'',
          'regular_price'=>'',
          'sale_price'=>'',
          'price'=>'',
          'type'=>'variable',
          'category'=>array('wbc_bottom_wear_cat','wbc_bottom_wear_trousers_cat','wbc_bottomwear_cat','wbc_fabric_cat','wbc_pattern_cat','wbc_men_purple_suitspant_cat','wbc_fabric_cotton_cat','wbc_pattern_plain_cat'),
          'attribute'=>array(
                    'pa_wbc_cloth_size_attr'=>array(
                              'name'=>'pa_wbc_cloth_size_attr',
                              'value'=>'34',
                              'position'=>0,
                              'is_visible'=>1,
                              'is_variation'=>1,
                              'is_taxonomy'=>1
                            ),
                    'pa_wbc_cloth_colour_attr'=>array(
                              'name'=>'pa_wbc_cloth_colour_attr',
                              'value'=>'Purple',
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
                            'regular_price'=>'1960',
                            'price'=>'1950',
                            'terms'=>array('pa_wbc_cloth_size_attr'=>'34','pa_wbc_cloth_colour_attr'=>'Purple','pa_wbc_cloth_occasion_attr'=>'Formal','pa_wbc_cloth_fit_attr'=>'Regular fit','pa_wbc_cloth_closure_type_attr'=>'Button','pa_wbc_cloth_length_attr'=>'Regular')
                          )
                   )
          )

    );  
    }

    public function set_configs_after_categories($catat_category) {

        // set dynamic variables here for the parent class 

        // override since the category structure is unique for mapping specific requirements 
        $catat_category_new = $catat_category;
        $catat_category_new[0] = $catat_category_new[2];
        $catat_category_new[1] = $catat_category_new[3];

        // and then call parent function 
        parent::set_configs_after_categories($catat_category_new);
    }

    public function set_configs_after_attributes() {

        // do if any override is required 

        // and then call parent function 
        parent::set_configs_after_attributes();
    }

}

<?php

if(!class_exists('EO_WBC_CatAt')){
	/**
	 * Class to create product category, attribute and add them to the products
	 */
	class EO_WBC_CatAt {

		function __construct(){
			$_img_url=EO_WBC_PLUGIN_DIR.'EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/';
			$this->gallay_img = $_img_url. 'EO_WBC_Img/Products/';
			$this->product= array(
            array(
              'title'=>'Setting #8800950587',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Ring-round-1.jpg',
              'images'=>array('Ring-round-2.jpg','Ring-round-3.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_setting_shape_cat','eo_setting_round_shape_cat','eo_ring_style_cat','eo_metal_cat','eo_ring_halo_cat','eo_metal_14k_white_gold_cat','eo_metal_14k_yellow_gold_cat','eo_metal_14k_rose_gold_cat'),
              'attribute'=>array('pa_eo_metal_attr'=>array(
                                  'name'=>'pa_eo_metal_attr',
                                  'value'=>'14K Yellow Gold|14K Rose Gold|14K White Gold',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'4.0|5.0|6.0|7.0',
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
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'260',
                                'price'=>'255',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'270',
                                'price'=>'265',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'280',
                                'price'=>'275',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'300',
                                'price'=>'295',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'310',
                                'price'=>'305',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'320',
                                'price'=>'315',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'330',
                                'price'=>'325',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'340',
                                'price'=>'335',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'350',
                                'price'=>'345',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'360',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'370',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'7.0')
                              )
                            )            
            ),
            array(
              'title'=>'Setting #6461855726',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Ring-princess-1.jpg',
              'images'=>array(),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_setting_shape_cat','eo_setting_princess_shape_cat','eo_ring_style_cat','eo_metal_cat','eo_ring_pave_cat','eo_metal_18k_white_gold_cat','eo_metal_18k_yellow_gold_cat','eo_metal_18k_rose_gold_cat'),
              'attribute'=>array('pa_eo_metal_attr'=>array(
                                  'name'=>'pa_eo_metal_attr',
                                  'value'=>'18K Yellow Gold|18K Rose Gold|18K White Gold',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'4.0|5.0|6.0|7.0',
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
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'260',
                                'price'=>'255',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'270',
                                'price'=>'265',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'280',
                                'price'=>'275',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'300',
                                'price'=>'295',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'310',
                                'price'=>'305',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'320',
                                'price'=>'315',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'330',
                                'price'=>'325',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'340',
                                'price'=>'335',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'350',
                                'price'=>'345',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'360',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'370',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'7.0')
                              )
                            )            
            ),
            array(
              'title'=>'Setting #2871986691',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Ring-emerald-3.jpg',
              'images'=>array('Ring-emerald-4.jpg','Ring-emerald-5.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_setting_shape_cat','eo_setting_emerald_shape_cat','eo_ring_style_cat','eo_metal_cat','eo_ring_solitaire_cat','eo_metal_18k_white_gold_cat','eo_metal_18k_yellow_gold_cat','eo_metal_18k_rose_gold_cat'),
              'attribute'=>array('pa_eo_metal_attr'=>array(
                                  'name'=>'pa_eo_metal_attr',
                                  'value'=>'18K Yellow Gold|18K Rose Gold|18K White Gold',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'4.0|5.0|6.0|7.0',
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
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'260',
                                'price'=>'255',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'270',
                                'price'=>'265',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'280',
                                'price'=>'275',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'300',
                                'price'=>'295',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'310',
                                'price'=>'305',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'320',
                                'price'=>'315',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'330',
                                'price'=>'325',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'340',
                                'price'=>'335',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'350',
                                'price'=>'345',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'360',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'370',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'7.0')
                              )
                            )
            ),
            array(
              'title'=>'Setting #1318544274',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Ring-asscher-1.jpg',
              'images'=>array('Ring-asscher-2.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_setting_shape_cat','eo_setting_asscher_shape_cat','eo_ring_style_cat','eo_metal_cat','eo_ring_trilogy_cat','eo_metal_14k_white_gold_cat','eo_metal_14k_yellow_gold_cat','eo_metal_14k_rose_gold_cat'),
              'attribute'=>array('pa_eo_metal_attr'=>array(
                                  'name'=>'pa_eo_metal_attr',
                                  'value'=>'14K Yellow Gold|14K Rose Gold|14K White Gold',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'4.0|5.0|6.0|7.0',
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
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'260',
                                'price'=>'255',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'270',
                                'price'=>'265',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'280',
                                'price'=>'275',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'300',
                                'price'=>'295',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'310',
                                'price'=>'305',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'320',
                                'price'=>'315',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'330',
                                'price'=>'325',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'340',
                                'price'=>'335',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'350',
                                'price'=>'345',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'360',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'370',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'7.0')
                              )
                            )
            ),
            array(
              'title'=>'Setting #7707154336',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Ring-marquise.jpg',
              'images'=>array(),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_setting_shape_cat','eo_setting_marquise_shape_cat','eo_ring_style_cat','eo_metal_cat','eo_ring_pave_cat','eo_metal_14k_white_gold_cat','eo_metal_14k_yellow_gold_cat','eo_metal_14k_rose_gold_cat'),
              'attribute'=>array('pa_eo_metal_attr'=>array(
                                  'name'=>'pa_eo_metal_attr',
                                  'value'=>'14K Yellow Gold|14K Rose Gold|14K White Gold',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'4.0|5.0|6.0|7.0',
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
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'260',
                                'price'=>'255',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'270',
                                'price'=>'265',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'280',
                                'price'=>'275',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'300',
                                'price'=>'295',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'310',
                                'price'=>'305',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'320',
                                'price'=>'315',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'330',
                                'price'=>'325',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'340',
                                'price'=>'335',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'350',
                                'price'=>'345',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'360',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'370',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'7.0')
                              )
                            )
            ),
            array(
              'title'=>'Setting #1388912063',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Ring-oval-1.jpg',
              'images'=>array(),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_setting_shape_cat','eo_setting_oval_shape_cat','eo_ring_style_cat','eo_metal_cat','eo_ring_halo_cat','eo_metal_18k_white_gold_cat','eo_metal_18k_yellow_gold_cat','eo_metal_18k_rose_gold_cat'),
              'attribute'=>array('pa_eo_metal_attr'=>array(
                                  'name'=>'pa_eo_metal_attr',
                                  'value'=>'18K Yellow Gold|18K Rose Gold|18K White Gold',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'4.0|5.0|6.0|7.0',
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
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'260',
                                'price'=>'255',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'270',
                                'price'=>'265',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'280',
                                'price'=>'275',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'300',
                                'price'=>'295',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'310',
                                'price'=>'305',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'320',
                                'price'=>'315',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'330',
                                'price'=>'325',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'340',
                                'price'=>'335',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'350',
                                'price'=>'345',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'360',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'370',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'7.0')
                              )
                            )
            ),
            array(
              'title'=>'Setting #0412854474',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Ring-radiant-1.jpg',
              'images'=>array(),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_setting_shape_cat','eo_setting_radiant_shape_cat','eo_ring_style_cat','eo_metal_cat','eo_ring_pave_cat','eo_metal_14k_yellow_gold_cat'),
              'attribute'=>array('pa_eo_metal_attr'=>array(
                                  'name'=>'pa_eo_metal_attr',
                                  'value'=>'14K Yellow Gold',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'4.0|5.0|6.0|7.0',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'340',
                                'price'=>'335',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'350',
                                'price'=>'345',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'360',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'370',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'7.0')
                              )
                            )
            ),
            array(
              'title'=>'Setting #4270635040',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Ring-pear-1.jpg',
              'images'=>array(),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_setting_shape_cat','eo_setting_pear_shape_cat','eo_ring_style_cat','eo_metal_cat','eo_ring_trilogy_cat','eo_metal_18k_white_gold_cat','eo_metal_18k_yellow_gold_cat','eo_metal_18k_rose_gold_cat'),
              'attribute'=>array('pa_eo_metal_attr'=>array(
                                  'name'=>'pa_eo_metal_attr',
                                  'value'=>'18K Yellow Gold|18K Rose Gold|18K White Gold',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'4.0|5.0|6.0|7.0',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'340',
                                'price'=>'335',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'350',
                                'price'=>'345',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'360',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'370',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'250',
                                'price'=>'245',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'260',
                                'price'=>'255',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'270',
                                'price'=>'265',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'280',
                                'price'=>'275',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'300',
                                'price'=>'295',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'310',
                                'price'=>'305',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'320',
                                'price'=>'315',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'330',
                                'price'=>'325',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'7.0')
                              )
                            )
            ),
            array(
              'title'=>'Setting #4927991215',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Ring-hert-1.jpg',
              'images'=>array('Ring-hert-2.jpg','Ring-hert-3.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_setting_shape_cat','eo_setting_heart_shape_cat','eo_ring_style_cat','eo_metal_cat','eo_ring_solitaire_cat','eo_metal_14k_white_gold_cat','eo_metal_14k_yellow_gold_cat','eo_metal_14k_rose_gold_cat'),
              'attribute'=>array('pa_eo_metal_attr'=>array(
                                  'name'=>'pa_eo_metal_attr',
                                  'value'=>'14K Yellow Gold|14K Rose Gold|14K White Gold',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'4.0|5.0|6.0|7.0',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'340',
                                'price'=>'335',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'350',
                                'price'=>'345',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'360',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'370',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'250',
                                'price'=>'245',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'260',
                                'price'=>'255',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'270',
                                'price'=>'265',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'280',
                                'price'=>'275',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'300',
                                'price'=>'295',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'310',
                                'price'=>'305',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'320',
                                'price'=>'315',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'330',
                                'price'=>'325',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'7.0')
                              )
                            )
            ),
            array(
              'title'=>'Setting #2375118707',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Ring-cusion-1.jpg',
              'images'=>array('Ring-cusion-2.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_setting_shape_cat','eo_setting_cushion_shape_cat','eo_ring_style_cat','eo_metal_cat','eo_ring_halo_cat','eo_metal_18k_white_gold_cat','eo_metal_18k_yellow_gold_cat','eo_metal_18k_rose_gold_cat'),
              'attribute'=>array('pa_eo_metal_attr'=>array(
                                  'name'=>'pa_eo_metal_attr',
                                  'value'=>'18K Yellow Gold|18K Rose Gold|18K White Gold',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'4.0|5.0|6.0|7.0',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'340',
                                'price'=>'335',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'350',
                                'price'=>'345',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'360',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'370',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'250',
                                'price'=>'245',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'260',
                                'price'=>'255',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'270',
                                'price'=>'265',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'280',
                                'price'=>'275',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'300',
                                'price'=>'295',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'310',
                                'price'=>'305',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'320',
                                'price'=>'315',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'330',
                                'price'=>'325',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'7.0')
                              )
                            )
            ),

            //s-copy-1

            array(
              'title'=>'Setting #10000001',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Ring-round-1.jpg',
              'images'=>array('Ring-round-2.jpg','Ring-round-3.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_setting_shape_cat','eo_setting_round_shape_cat','eo_ring_style_cat','eo_metal_cat','eo_ring_pave_cat','eo_metal_18k_white_gold_cat','eo_metal_18k_yellow_gold_cat','eo_metal_18k_rose_gold_cat'),
              'attribute'=>array('pa_eo_metal_attr'=>array(
                                  'name'=>'pa_eo_metal_attr',
                                  'value'=>'18K Yellow Gold|18K Rose Gold|18K White Gold',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'4.0|5.0|6.0|7.0',
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
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'360',
                                'price'=>'355',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'370',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'380',
                                'price'=>'375',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'400',
                                'price'=>'395',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'410',
                                'price'=>'405',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'420',
                                'price'=>'415',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'430',
                                'price'=>'425',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'440',
                                'price'=>'435',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'450',
                                'price'=>'445',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'460',
                                'price'=>'465',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'470',
                                'price'=>'465',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'7.0')
                              )
                            )            
            ),
            array(
              'title'=>'Setting #10000002',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Ring-princess-1.jpg',
              'images'=>array(),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_setting_shape_cat','eo_setting_princess_shape_cat','eo_ring_style_cat','eo_metal_cat','eo_ring_pave_cat','eo_metal_14k_white_gold_cat','eo_metal_14k_yellow_gold_cat','eo_metal_14k_rose_gold_cat'),
              'attribute'=>array('pa_eo_metal_attr'=>array(
                                  'name'=>'pa_eo_metal_attr',
                                  'value'=>'14K Yellow Gold|14K Rose Gold|14K White Gold',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'4.0|5.0|6.0|7.0',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'150',
                                'price'=>'145',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'160',
                                'price'=>'255',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'170',
                                'price'=>'165',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'180',
                                'price'=>'175',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'200',
                                'price'=>'195',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'210',
                                'price'=>'205',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'220',
                                'price'=>'215',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'230',
                                'price'=>'225',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'240',
                                'price'=>'235',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'250',
                                'price'=>'245',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'260',
                                'price'=>'265',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'270',
                                'price'=>'265',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'7.0')
                              )
                            )            
            ),
            array(
              'title'=>'Setting #10000003',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Ring-emerald-3.jpg',
              'images'=>array('Ring-emerald-4.jpg','Ring-emerald-5.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_setting_shape_cat','eo_setting_emerald_shape_cat','eo_ring_style_cat','eo_metal_cat','eo_ring_solitaire_cat','eo_metal_14k_white_gold_cat','eo_metal_14k_yellow_gold_cat','eo_metal_14k_rose_gold_cat'),
              'attribute'=>array('pa_eo_metal_attr'=>array(
                                  'name'=>'pa_eo_metal_attr',
                                  'value'=>'14K Yellow Gold|14K Rose Gold|14K White Gold',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'4.0|5.0|6.0|7.0',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'150',
                                'price'=>'145',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'160',
                                'price'=>'155',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'170',
                                'price'=>'165',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'180',
                                'price'=>'175',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'200',
                                'price'=>'295',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'210',
                                'price'=>'205',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'220',
                                'price'=>'215',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'230',
                                'price'=>'225',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'240',
                                'price'=>'235',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'250',
                                'price'=>'245',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'260',
                                'price'=>'265',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'270',
                                'price'=>'265',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'7.0')
                              )
                            )
            ),
            array(
              'title'=>'Setting #10000004',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Ring-asscher-1.jpg',
              'images'=>array('Ring-asscher-2.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_setting_shape_cat','eo_setting_asscher_shape_cat','eo_ring_style_cat','eo_metal_cat','eo_ring_trilogy_cat','eo_metal_18k_white_gold_cat','eo_metal_18k_yellow_gold_cat','eo_metal_18k_rose_gold_cat'),
              'attribute'=>array('pa_eo_metal_attr'=>array(
                                  'name'=>'pa_eo_metal_attr',
                                  'value'=>'18K Yellow Gold|18K Rose Gold|18K White Gold',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'4.0|5.0|6.0|7.0',
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
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'460',
                                'price'=>'455',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'470',
                                'price'=>'465',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'480',
                                'price'=>'475',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'400',
                                'price'=>'495',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'410',
                                'price'=>'405',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'420',
                                'price'=>'415',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'430',
                                'price'=>'425',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'440',
                                'price'=>'435',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'450',
                                'price'=>'445',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'460',
                                'price'=>'465',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'470',
                                'price'=>'465',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'7.0')
                              )
                            )
            ),
            array(
              'title'=>'Setting #10000005',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Ring-marquise.jpg',
              'images'=>array(),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_setting_shape_cat','eo_setting_marquise_shape_cat','eo_ring_style_cat','eo_metal_cat','eo_ring_pave_cat','eo_metal_18k_white_gold_cat','eo_metal_18k_yellow_gold_cat','eo_metal_18k_rose_gold_cat'),
              'attribute'=>array('pa_eo_metal_attr'=>array(
                                  'name'=>'pa_eo_metal_attr',
                                  'value'=>'18K Yellow Gold|18K Rose Gold|18K White Gold',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'4.0|5.0|6.0|7.0',
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
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'360',
                                'price'=>'355',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'370',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'380',
                                'price'=>'375',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'400',
                                'price'=>'395',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'410',
                                'price'=>'405',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'420',
                                'price'=>'415',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'430',
                                'price'=>'425',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'440',
                                'price'=>'435',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'450',
                                'price'=>'445',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'460',
                                'price'=>'465',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'470',
                                'price'=>'465',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'7.0')
                              )
                            )
            ),
            array(
              'title'=>'Setting #10000006',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Ring-oval-1.jpg',
              'images'=>array(),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_setting_shape_cat','eo_setting_oval_shape_cat','eo_ring_style_cat','eo_metal_cat','eo_ring_halo_cat','eo_metal_14k_white_gold_cat','eo_metal_14k_yellow_gold_cat','eo_metal_14k_rose_gold_cat'),
              'attribute'=>array('pa_eo_metal_attr'=>array(
                                  'name'=>'pa_eo_metal_attr',
                                  'value'=>'14K Yellow Gold|14K Rose Gold|14K White Gold',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'4.0|5.0|6.0|7.0',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'150',
                                'price'=>'145',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'160',
                                'price'=>'155',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'170',
                                'price'=>'165',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'180',
                                'price'=>'175',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'200',
                                'price'=>'195',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'210',
                                'price'=>'205',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'220',
                                'price'=>'215',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'230',
                                'price'=>'225',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'240',
                                'price'=>'235',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'250',
                                'price'=>'245',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'260',
                                'price'=>'265',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'270',
                                'price'=>'265',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'7.0')
                              )
                            )
            ),
            array(
              'title'=>'Setting #10000007',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Ring-radiant-1.jpg',
              'images'=>array(),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_setting_shape_cat','eo_setting_radiant_shape_cat','eo_ring_style_cat','eo_metal_cat','eo_ring_pave_cat','eo_metal_18k_yellow_gold_cat'),
              'attribute'=>array('pa_eo_metal_attr'=>array(
                                  'name'=>'pa_eo_metal_attr',
                                  'value'=>'18K Yellow Gold',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'4.0|5.0|6.0|7.0',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'440',
                                'price'=>'435',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'450',
                                'price'=>'445',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'460',
                                'price'=>'465',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'470',
                                'price'=>'465',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'7.0')
                              )
                            )
            ),
            array(
              'title'=>'Setting #10000008',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Ring-pear-1.jpg',
              'images'=>array(),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_setting_shape_cat','eo_setting_pear_shape_cat','eo_ring_style_cat','eo_metal_cat','eo_ring_trilogy_cat','eo_metal_14k_white_gold_cat','eo_metal_14k_yellow_gold_cat','eo_metal_14k_rose_gold_cat'),
              'attribute'=>array('pa_eo_metal_attr'=>array(
                                  'name'=>'pa_eo_metal_attr',
                                  'value'=>'14K Yellow Gold|14K Rose Gold|14K White Gold',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'4.0|5.0|6.0|7.0',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'240',
                                'price'=>'235',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'250',
                                'price'=>'245',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'260',
                                'price'=>'265',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'270',
                                'price'=>'265',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'150',
                                'price'=>'145',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'160',
                                'price'=>'155',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'170',
                                'price'=>'165',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'180',
                                'price'=>'175',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'200',
                                'price'=>'195',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'210',
                                'price'=>'205',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'220',
                                'price'=>'215',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'230',
                                'price'=>'225',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'7.0')
                              )
                            )
            ),
            array(
              'title'=>'Setting #10000009',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Ring-hert-1.jpg',
              'images'=>array('Ring-hert-2.jpg','Ring-hert-3.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_setting_shape_cat','eo_setting_heart_shape_cat','eo_ring_style_cat','eo_metal_cat','eo_ring_solitaire_cat','eo_metal_18k_white_gold_cat','eo_metal_18k_yellow_gold_cat','eo_metal_18k_rose_gold_cat'),
              'attribute'=>array('pa_eo_metal_attr'=>array(
                                  'name'=>'pa_eo_metal_attr',
                                  'value'=>'18K Yellow Gold|18K Rose Gold|18K White Gold',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'4.0|5.0|6.0|7.0',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'440',
                                'price'=>'435',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'450',
                                'price'=>'445',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'460',
                                'price'=>'465',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'470',
                                'price'=>'465',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'350',
                                'price'=>'345',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'360',
                                'price'=>'355',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'370',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'380',
                                'price'=>'375',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'400',
                                'price'=>'395',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'410',
                                'price'=>'405',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'420',
                                'price'=>'415',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'430',
                                'price'=>'425',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'7.0')
                              )
                            )
            ),
            array(
              'title'=>'Setting #10000010',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Ring-cusion-1.jpg',
              'images'=>array('Ring-cusion-2.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_setting_shape_cat','eo_setting_cushion_shape_cat','eo_ring_style_cat','eo_metal_cat','eo_ring_halo_cat','eo_metal_14k_white_gold_cat','eo_metal_14k_yellow_gold_cat','eo_metal_14k_rose_gold_cat'),
              'attribute'=>array('pa_eo_metal_attr'=>array(
                                  'name'=>'pa_eo_metal_attr',
                                  'value'=>'14K Yellow Gold|14K Rose Gold|14K White Gold',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'4.0|5.0|6.0|7.0',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'240',
                                'price'=>'235',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'250',
                                'price'=>'245',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'260',
                                'price'=>'265',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'270',
                                'price'=>'265',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'150',
                                'price'=>'145',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'160',
                                'price'=>'155',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'170',
                                'price'=>'165',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'180',
                                'price'=>'175',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'200',
                                'price'=>'195',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'210',
                                'price'=>'205',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'220',
                                'price'=>'215',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'230',
                                'price'=>'225',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'7.0')
                              )
                            )
            ),

            //s-copy-2

            array(
              'title'=>'Setting #10000011',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Ring-round-1.jpg',
              'images'=>array('Ring-round-2.jpg','Ring-round-3.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_setting_shape_cat','eo_setting_round_shape_cat','eo_ring_style_cat','eo_metal_cat','eo_ring_halo_cat','eo_metal_platinum_cat'),
              'attribute'=>array('pa_eo_metal_attr'=>array(
                                  'name'=>'pa_eo_metal_attr',
                                  'value'=>'Platinum',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'4.0|5.0|6.0|7.0',
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
                                'terms'=>array('pa_eo_metal_attr'=>'Platinum','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'360',
                                'price'=>'355',
                                'terms'=>array('pa_eo_metal_attr'=>'Platinum','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'370',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'Platinum','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'380',
                                'price'=>'375',
                                'terms'=>array('pa_eo_metal_attr'=>'Platinum','pa_eo_size_attr'=>'7.0')
                              )
                            )            
            ),
            array(
              'title'=>'Setting #10000012',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Ring-princess-1.jpg',
              'images'=>array(),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_setting_shape_cat','eo_setting_princess_shape_cat','eo_ring_style_cat','eo_metal_cat','eo_ring_pave_cat','eo_metal_platinum_cat'),
              'attribute'=>array('pa_eo_metal_attr'=>array(
                                  'name'=>'pa_eo_metal_attr',
                                  'value'=>'Platinum',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'4.0|5.0|6.0|7.0',
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
                                'terms'=>array('pa_eo_metal_attr'=>'Platinum','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'360',
                                'price'=>'355',
                                'terms'=>array('pa_eo_metal_attr'=>'Platinum','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'370',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'Platinum','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'380',
                                'price'=>'375',
                                'terms'=>array('pa_eo_metal_attr'=>'Platinum','pa_eo_size_attr'=>'7.0')
                              )
                            )            
            ),
            array(
              'title'=>'Setting #10000012',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Ring-emerald-3.jpg',
              'images'=>array('Ring-emerald-4.jpg','Ring-emerald-5.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_setting_shape_cat','eo_setting_emerald_shape_cat','eo_ring_style_cat','eo_metal_cat','eo_ring_solitaire_cat','eo_metal_platinum_cat'),
              'attribute'=>array('pa_eo_metal_attr'=>array(
                                  'name'=>'pa_eo_metal_attr',
                                  'value'=>'Platinum',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'4.0|5.0|6.0|7.0',
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
                                'terms'=>array('pa_eo_metal_attr'=>'Platinum','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'360',
                                'price'=>'355',
                                'terms'=>array('pa_eo_metal_attr'=>'Platinum','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'370',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'Platinum','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'380',
                                'price'=>'375',
                                'terms'=>array('pa_eo_metal_attr'=>'Platinum','pa_eo_size_attr'=>'7.0')
                              )
                            )
            ),
            array(
              'title'=>'Setting #10000013',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Ring-asscher-1.jpg',
              'images'=>array('Ring-asscher-2.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_setting_shape_cat','eo_setting_asscher_shape_cat','eo_ring_style_cat','eo_metal_cat','eo_ring_trilogy_cat','eo_metal_platinum_cat'),
              'attribute'=>array('pa_eo_metal_attr'=>array(
                                  'name'=>'pa_eo_metal_attr',
                                  'value'=>'Platinum',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'4.0|5.0|6.0|7.0',
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
                                'terms'=>array('pa_eo_metal_attr'=>'Platinum','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'360',
                                'price'=>'355',
                                'terms'=>array('pa_eo_metal_attr'=>'Platinum','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'370',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'Platinum','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'380',
                                'price'=>'375',
                                'terms'=>array('pa_eo_metal_attr'=>'Platinum','pa_eo_size_attr'=>'7.0')
                              )
                            )
            ),
            array(
              'title'=>'Setting #10000014',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Ring-marquise.jpg',
              'images'=>array(),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_setting_shape_cat','eo_setting_marquise_shape_cat','eo_ring_style_cat','eo_metal_cat','eo_ring_pave_cat','eo_metal_platinum_cat'),
              'attribute'=>array('pa_eo_metal_attr'=>array(
                                  'name'=>'pa_eo_metal_attr',
                                  'value'=>'Platinum',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'4.0|5.0|6.0|7.0',
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
                                'terms'=>array('pa_eo_metal_attr'=>'Platinum','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'360',
                                'price'=>'355',
                                'terms'=>array('pa_eo_metal_attr'=>'Platinum','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'370',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'Platinum','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'380',
                                'price'=>'375',
                                'terms'=>array('pa_eo_metal_attr'=>'Platinum','pa_eo_size_attr'=>'7.0')
                              )
                            )
            ),
            array(
              'title'=>'Setting #10000015',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Ring-oval-1.jpg',
              'images'=>array(),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_setting_shape_cat','eo_setting_oval_shape_cat','eo_ring_style_cat','eo_metal_cat','eo_ring_halo_cat','eo_metal_platinum_cat'),
              'attribute'=>array('pa_eo_metal_attr'=>array(
                                  'name'=>'pa_eo_metal_attr',
                                  'value'=>'Platinum',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'4.0|5.0|6.0|7.0',
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
                                'terms'=>array('pa_eo_metal_attr'=>'Platinum','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'360',
                                'price'=>'355',
                                'terms'=>array('pa_eo_metal_attr'=>'Platinum','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'370',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'Platinum','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'380',
                                'price'=>'375',
                                'terms'=>array('pa_eo_metal_attr'=>'Platinum','pa_eo_size_attr'=>'7.0')
                              )
                            )
            ),
            array(
              'title'=>'Setting #10000016',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Ring-radiant-1.jpg',
              'images'=>array(),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_setting_shape_cat','eo_setting_radiant_shape_cat','eo_ring_style_cat','eo_metal_cat','eo_ring_pave_cat','eo_metal_platinum_cat'),
              'attribute'=>array('pa_eo_metal_attr'=>array(
                                  'name'=>'pa_eo_metal_attr',
                                  'value'=>'Platinum',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'4.0|5.0|6.0|7.0',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'440',
                                'price'=>'435',
                                'terms'=>array('pa_eo_metal_attr'=>'Platinum','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'450',
                                'price'=>'445',
                                'terms'=>array('pa_eo_metal_attr'=>'Platinum','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'460',
                                'price'=>'465',
                                'terms'=>array('pa_eo_metal_attr'=>'Platinum','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'470',
                                'price'=>'465',
                                'terms'=>array('pa_eo_metal_attr'=>'Platinum','pa_eo_size_attr'=>'7.0')
                              )
                            )
            ),
            array(
              'title'=>'Setting #10000017',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Ring-pear-1.jpg',
              'images'=>array(),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_setting_shape_cat','eo_setting_pear_shape_cat','eo_ring_style_cat','eo_metal_cat','eo_ring_trilogy_cat','eo_metal_platinum_cat'),
              'attribute'=>array('pa_eo_metal_attr'=>array(
                                  'name'=>'pa_eo_metal_attr',
                                  'value'=>'Platinum',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'4.0|5.0|6.0|7.0',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'440',
                                'price'=>'435',
                                'terms'=>array('pa_eo_metal_attr'=>'Platinum','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'450',
                                'price'=>'445',
                                'terms'=>array('pa_eo_metal_attr'=>'Platinum','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'460',
                                'price'=>'465',
                                'terms'=>array('pa_eo_metal_attr'=>'Platinum','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'470',
                                'price'=>'465',
                                'terms'=>array('pa_eo_metal_attr'=>'Platinum','pa_eo_size_attr'=>'7.0')
                              )
                            )
            ),
            array(
              'title'=>'Setting #10000018',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Ring-hert-1.jpg',
              'images'=>array('Ring-hert-2.jpg','Ring-hert-3.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_setting_shape_cat','eo_setting_heart_shape_cat','eo_ring_style_cat','eo_metal_cat','eo_ring_solitaire_cat','eo_metal_platinum_cat'),
              'attribute'=>array('pa_eo_metal_attr'=>array(
                                  'name'=>'pa_eo_metal_attr',
                                  'value'=>'Platinum',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'4.0|5.0|6.0|7.0',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'440',
                                'price'=>'435',
                                'terms'=>array('pa_eo_metal_attr'=>'Platinum','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'450',
                                'price'=>'445',
                                'terms'=>array('pa_eo_metal_attr'=>'Platinum','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'460',
                                'price'=>'465',
                                'terms'=>array('pa_eo_metal_attr'=>'Platinum','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'470',
                                'price'=>'465',
                                'terms'=>array('pa_eo_metal_attr'=>'Platinum','pa_eo_size_attr'=>'7.0')
                              )
                            )
            ),
            array(
              'title'=>'Setting #10000019',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Ring-cusion-1.jpg',
              'images'=>array('Ring-cusion-2.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_setting_shape_cat','eo_setting_cushion_shape_cat','eo_ring_style_cat','eo_metal_cat','eo_ring_halo_cat','eo_metal_platinum_cat'),
              'attribute'=>array('pa_eo_metal_attr'=>array(
                                  'name'=>'pa_eo_metal_attr',
                                  'value'=>'Platinum',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'4.0|5.0|6.0|7.0',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'440',
                                'price'=>'435',
                                'terms'=>array('pa_eo_metal_attr'=>'Platinum','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'450',
                                'price'=>'445',
                                'terms'=>array('pa_eo_metal_attr'=>'Platinum','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'460',
                                'price'=>'465',
                                'terms'=>array('pa_eo_metal_attr'=>'Platinum','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'470',
                                'price'=>'465',
                                'terms'=>array('pa_eo_metal_attr'=>'Platinum','pa_eo_size_attr'=>'7.0')
                              )
                            )
            ),

            //s-copy-3
            
            array(
              'title'=>'Setting #10000020',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Ring-round-1.jpg',
              'images'=>array('Ring-round-2.jpg','Ring-round-3.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_setting_shape_cat','eo_setting_round_shape_cat','eo_ring_style_cat','eo_metal_cat','eo_ring_halo_cat','eo_metal_14k_white_gold_cat','eo_metal_14k_yellow_gold_cat','eo_metal_14k_rose_gold_cat'),
              'attribute'=>array('pa_eo_metal_attr'=>array(
                                  'name'=>'pa_eo_metal_attr',
                                  'value'=>'14K Yellow Gold|14K Rose Gold|14K White Gold',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'4.0|5.0|6.0|7.0',
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
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'260',
                                'price'=>'255',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'270',
                                'price'=>'265',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'280',
                                'price'=>'275',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'300',
                                'price'=>'295',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'310',
                                'price'=>'305',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'320',
                                'price'=>'315',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'330',
                                'price'=>'325',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'340',
                                'price'=>'335',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'350',
                                'price'=>'345',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'360',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'370',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'7.0')
                              )
                            )            
            ),
            array(
              'title'=>'Setting #10000021',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Ring-princess-1.jpg',
              'images'=>array(),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_setting_shape_cat','eo_setting_princess_shape_cat','eo_ring_style_cat','eo_metal_cat','eo_ring_pave_cat','eo_metal_18k_white_gold_cat','eo_metal_18k_yellow_gold_cat','eo_metal_18k_rose_gold_cat'),
              'attribute'=>array('pa_eo_metal_attr'=>array(
                                  'name'=>'pa_eo_metal_attr',
                                  'value'=>'18K Yellow Gold|18K Rose Gold|18K White Gold',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'4.0|5.0|6.0|7.0',
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
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'260',
                                'price'=>'255',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'270',
                                'price'=>'265',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'280',
                                'price'=>'275',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'300',
                                'price'=>'295',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'310',
                                'price'=>'305',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'320',
                                'price'=>'315',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'330',
                                'price'=>'325',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'340',
                                'price'=>'335',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'350',
                                'price'=>'345',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'360',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'370',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'7.0')
                              )
                            )            
            ),
            array(
              'title'=>'Setting #10000022',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Ring-emerald-3.jpg',
              'images'=>array('Ring-emerald-4.jpg','Ring-emerald-5.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_setting_shape_cat','eo_setting_emerald_shape_cat','eo_ring_style_cat','eo_metal_cat','eo_ring_solitaire_cat','eo_metal_18k_white_gold_cat','eo_metal_18k_yellow_gold_cat','eo_metal_18k_rose_gold_cat'),
              'attribute'=>array('pa_eo_metal_attr'=>array(
                                  'name'=>'pa_eo_metal_attr',
                                  'value'=>'18K Yellow Gold|18K Rose Gold|18K White Gold',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'4.0|5.0|6.0|7.0',
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
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'260',
                                'price'=>'255',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'270',
                                'price'=>'265',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'280',
                                'price'=>'275',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'300',
                                'price'=>'295',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'310',
                                'price'=>'305',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'320',
                                'price'=>'315',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'330',
                                'price'=>'325',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'340',
                                'price'=>'335',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'350',
                                'price'=>'345',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'360',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'370',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'7.0')
                              )
                            )
            ),
            array(
              'title'=>'Setting #10000023',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Ring-asscher-1.jpg',
              'images'=>array('Ring-asscher-2.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_setting_shape_cat','eo_setting_asscher_shape_cat','eo_ring_style_cat','eo_metal_cat','eo_ring_trilogy_cat','eo_metal_14k_white_gold_cat','eo_metal_14k_yellow_gold_cat','eo_metal_14k_rose_gold_cat'),
              'attribute'=>array('pa_eo_metal_attr'=>array(
                                  'name'=>'pa_eo_metal_attr',
                                  'value'=>'14K Yellow Gold|14K Rose Gold|14K White Gold',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'4.0|5.0|6.0|7.0',
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
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'260',
                                'price'=>'255',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'270',
                                'price'=>'265',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'280',
                                'price'=>'275',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'300',
                                'price'=>'295',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'310',
                                'price'=>'305',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'320',
                                'price'=>'315',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'330',
                                'price'=>'325',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'340',
                                'price'=>'335',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'350',
                                'price'=>'345',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'360',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'370',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'7.0')
                              )
                            )
            ),
            array(
              'title'=>'Setting #10000024',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Ring-marquise.jpg',
              'images'=>array(),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_setting_shape_cat','eo_setting_marquise_shape_cat','eo_ring_style_cat','eo_metal_cat','eo_ring_pave_cat','eo_metal_14k_white_gold_cat','eo_metal_14k_yellow_gold_cat','eo_metal_14k_rose_gold_cat'),
              'attribute'=>array('pa_eo_metal_attr'=>array(
                                  'name'=>'pa_eo_metal_attr',
                                  'value'=>'14K Yellow Gold|14K Rose Gold|14K White Gold',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'4.0|5.0|6.0|7.0',
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
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'260',
                                'price'=>'255',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'270',
                                'price'=>'265',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'280',
                                'price'=>'275',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'300',
                                'price'=>'295',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'310',
                                'price'=>'305',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'320',
                                'price'=>'315',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'330',
                                'price'=>'325',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'340',
                                'price'=>'335',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'350',
                                'price'=>'345',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'360',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'370',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'7.0')
                              )
                            )
            ),
            array(
              'title'=>'Setting #10000025',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Ring-oval-1.jpg',
              'images'=>array(),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_setting_shape_cat','eo_setting_oval_shape_cat','eo_ring_style_cat','eo_metal_cat','eo_ring_halo_cat','eo_metal_18k_white_gold_cat','eo_metal_18k_yellow_gold_cat','eo_metal_18k_rose_gold_cat'),
              'attribute'=>array('pa_eo_metal_attr'=>array(
                                  'name'=>'pa_eo_metal_attr',
                                  'value'=>'18K Yellow Gold|18K Rose Gold|18K White Gold',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'4.0|5.0|6.0|7.0',
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
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'260',
                                'price'=>'255',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'270',
                                'price'=>'265',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'280',
                                'price'=>'275',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'300',
                                'price'=>'295',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'310',
                                'price'=>'305',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'320',
                                'price'=>'315',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'330',
                                'price'=>'325',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'340',
                                'price'=>'335',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'350',
                                'price'=>'345',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'360',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'370',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'7.0')
                              )
                            )
            ),
            array(
              'title'=>'Setting #10000026',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Ring-radiant-1.jpg',
              'images'=>array(),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_setting_shape_cat','eo_setting_radiant_shape_cat','eo_ring_style_cat','eo_metal_cat','eo_ring_pave_cat','eo_metal_14k_yellow_gold_cat'),
              'attribute'=>array('pa_eo_metal_attr'=>array(
                                  'name'=>'pa_eo_metal_attr',
                                  'value'=>'14K Yellow Gold',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'4.0|5.0|6.0|7.0',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'340',
                                'price'=>'335',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'350',
                                'price'=>'345',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'360',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'370',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'7.0')
                              )
                            )
            ),
            array(
              'title'=>'Setting #10000027',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Ring-pear-1.jpg',
              'images'=>array(),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_setting_shape_cat','eo_setting_pear_shape_cat','eo_ring_style_cat','eo_metal_cat','eo_ring_trilogy_cat','eo_metal_18k_white_gold_cat','eo_metal_18k_yellow_gold_cat','eo_metal_18k_rose_gold_cat'),
              'attribute'=>array('pa_eo_metal_attr'=>array(
                                  'name'=>'pa_eo_metal_attr',
                                  'value'=>'18K Yellow Gold|18K Rose Gold|18K White Gold',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'4.0|5.0|6.0|7.0',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'340',
                                'price'=>'335',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'350',
                                'price'=>'345',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'360',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'370',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'250',
                                'price'=>'245',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'260',
                                'price'=>'255',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'270',
                                'price'=>'265',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'280',
                                'price'=>'275',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'300',
                                'price'=>'295',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'310',
                                'price'=>'305',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'320',
                                'price'=>'315',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'330',
                                'price'=>'325',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'7.0')
                              )
                            )
            ),
            array(
              'title'=>'Setting #10000028',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Ring-hert-1.jpg',
              'images'=>array('Ring-hert-2.jpg','Ring-hert-3.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_setting_shape_cat','eo_setting_heart_shape_cat','eo_ring_style_cat','eo_metal_cat','eo_ring_solitaire_cat','eo_metal_14k_white_gold_cat','eo_metal_14k_yellow_gold_cat','eo_metal_14k_rose_gold_cat'),
              'attribute'=>array('pa_eo_metal_attr'=>array(
                                  'name'=>'pa_eo_metal_attr',
                                  'value'=>'14K Yellow Gold|14K Rose Gold|14K White Gold',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'4.0|5.0|6.0|7.0',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'340',
                                'price'=>'335',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'350',
                                'price'=>'345',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'360',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'370',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'250',
                                'price'=>'245',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'260',
                                'price'=>'255',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'270',
                                'price'=>'265',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'280',
                                'price'=>'275',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'300',
                                'price'=>'295',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'310',
                                'price'=>'305',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'320',
                                'price'=>'315',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'330',
                                'price'=>'325',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'7.0')
                              )
                            )
            ),
            array(
              'title'=>'Setting #10000029',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Ring-cusion-1.jpg',
              'images'=>array('Ring-cusion-2.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_setting_shape_cat','eo_setting_cushion_shape_cat','eo_ring_style_cat','eo_metal_cat','eo_ring_halo_cat','eo_metal_18k_white_gold_cat','eo_metal_18k_yellow_gold_cat','eo_metal_18k_rose_gold_cat'),
              'attribute'=>array('pa_eo_metal_attr'=>array(
                                  'name'=>'pa_eo_metal_attr',
                                  'value'=>'18K Yellow Gold|18K Rose Gold|18K White Gold',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'4.0|5.0|6.0|7.0',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'340',
                                'price'=>'335',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'350',
                                'price'=>'345',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'360',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'370',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'250',
                                'price'=>'245',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'260',
                                'price'=>'255',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'270',
                                'price'=>'265',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'280',
                                'price'=>'275',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'300',
                                'price'=>'295',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'310',
                                'price'=>'305',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'320',
                                'price'=>'315',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'330',
                                'price'=>'325',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'7.0')
                              )
                            )
            ),

            //s-copy-4

            array(
              'title'=>'Setting #10000030',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Ring-round-1.jpg',
              'images'=>array('Ring-round-2.jpg','Ring-round-3.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_setting_shape_cat','eo_setting_round_shape_cat','eo_ring_style_cat','eo_metal_cat','eo_ring_halo_cat','eo_metal_14k_white_gold_cat','eo_metal_14k_yellow_gold_cat','eo_metal_14k_rose_gold_cat'),
              'attribute'=>array('pa_eo_metal_attr'=>array(
                                  'name'=>'pa_eo_metal_attr',
                                  'value'=>'14K Yellow Gold|14K Rose Gold|14K White Gold',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'4.0|5.0|6.0|7.0',
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
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'260',
                                'price'=>'255',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'270',
                                'price'=>'265',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'280',
                                'price'=>'275',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'300',
                                'price'=>'295',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'310',
                                'price'=>'305',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'320',
                                'price'=>'315',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'330',
                                'price'=>'325',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'340',
                                'price'=>'335',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'350',
                                'price'=>'345',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'360',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'370',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'7.0')
                              )
                            )            
            ),
            array(
              'title'=>'Setting #10000031',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Ring-princess-1.jpg',
              'images'=>array(),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_setting_shape_cat','eo_setting_princess_shape_cat','eo_ring_style_cat','eo_metal_cat','eo_ring_pave_cat','eo_metal_18k_white_gold_cat','eo_metal_18k_yellow_gold_cat','eo_metal_18k_rose_gold_cat'),
              'attribute'=>array('pa_eo_metal_attr'=>array(
                                  'name'=>'pa_eo_metal_attr',
                                  'value'=>'18K Yellow Gold|18K Rose Gold|18K White Gold',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'4.0|5.0|6.0|7.0',
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
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'260',
                                'price'=>'255',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'270',
                                'price'=>'265',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'280',
                                'price'=>'275',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'300',
                                'price'=>'295',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'310',
                                'price'=>'305',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'320',
                                'price'=>'315',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'330',
                                'price'=>'325',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'340',
                                'price'=>'335',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'350',
                                'price'=>'345',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'360',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'370',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'7.0')
                              )
                            )            
            ),
            array(
              'title'=>'Setting #10000032',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Ring-emerald-3.jpg',
              'images'=>array('Ring-emerald-4.jpg','Ring-emerald-5.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_setting_shape_cat','eo_setting_emerald_shape_cat','eo_ring_style_cat','eo_metal_cat','eo_ring_solitaire_cat','eo_metal_18k_white_gold_cat','eo_metal_18k_yellow_gold_cat','eo_metal_18k_rose_gold_cat'),
              'attribute'=>array('pa_eo_metal_attr'=>array(
                                  'name'=>'pa_eo_metal_attr',
                                  'value'=>'18K Yellow Gold|18K Rose Gold|18K White Gold',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'4.0|5.0|6.0|7.0',
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
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'260',
                                'price'=>'255',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'270',
                                'price'=>'265',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'280',
                                'price'=>'275',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'300',
                                'price'=>'295',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'310',
                                'price'=>'305',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'320',
                                'price'=>'315',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'330',
                                'price'=>'325',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'340',
                                'price'=>'335',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'350',
                                'price'=>'345',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'360',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'370',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'7.0')
                              )
                            )
            ),
            array(
              'title'=>'Setting #10000033',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Ring-asscher-1.jpg',
              'images'=>array('Ring-asscher-2.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_setting_shape_cat','eo_setting_asscher_shape_cat','eo_ring_style_cat','eo_metal_cat','eo_ring_trilogy_cat','eo_metal_14k_white_gold_cat','eo_metal_14k_yellow_gold_cat','eo_metal_14k_rose_gold_cat'),
              'attribute'=>array('pa_eo_metal_attr'=>array(
                                  'name'=>'pa_eo_metal_attr',
                                  'value'=>'14K Yellow Gold|14K Rose Gold|14K White Gold',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'4.0|5.0|6.0|7.0',
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
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'260',
                                'price'=>'255',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'270',
                                'price'=>'265',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'280',
                                'price'=>'275',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'300',
                                'price'=>'295',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'310',
                                'price'=>'305',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'320',
                                'price'=>'315',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'330',
                                'price'=>'325',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'340',
                                'price'=>'335',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'350',
                                'price'=>'345',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'360',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'370',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'7.0')
                              )
                            )
            ),
            array(
              'title'=>'Setting #10000034',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Ring-marquise.jpg',
              'images'=>array(),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_setting_shape_cat','eo_setting_marquise_shape_cat','eo_ring_style_cat','eo_metal_cat','eo_ring_pave_cat','eo_metal_14k_white_gold_cat','eo_metal_14k_yellow_gold_cat','eo_metal_14k_rose_gold_cat'),
              'attribute'=>array('pa_eo_metal_attr'=>array(
                                  'name'=>'pa_eo_metal_attr',
                                  'value'=>'14K Yellow Gold|14K Rose Gold|14K White Gold',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'4.0|5.0|6.0|7.0',
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
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'260',
                                'price'=>'255',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'270',
                                'price'=>'265',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'280',
                                'price'=>'275',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'300',
                                'price'=>'295',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'310',
                                'price'=>'305',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'320',
                                'price'=>'315',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'330',
                                'price'=>'325',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'340',
                                'price'=>'335',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'350',
                                'price'=>'345',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'360',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'370',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'7.0')
                              )
                            )
            ),
            array(
              'title'=>'Setting #10000035',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Ring-oval-1.jpg',
              'images'=>array(),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_setting_shape_cat','eo_setting_oval_shape_cat','eo_ring_style_cat','eo_metal_cat','eo_ring_halo_cat','eo_metal_18k_white_gold_cat','eo_metal_18k_yellow_gold_cat','eo_metal_18k_rose_gold_cat'),
              'attribute'=>array('pa_eo_metal_attr'=>array(
                                  'name'=>'pa_eo_metal_attr',
                                  'value'=>'18K Yellow Gold|18K Rose Gold|18K White Gold',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'4.0|5.0|6.0|7.0',
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
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'260',
                                'price'=>'255',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'270',
                                'price'=>'265',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'280',
                                'price'=>'275',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'300',
                                'price'=>'295',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'310',
                                'price'=>'305',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'320',
                                'price'=>'315',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'330',
                                'price'=>'325',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'340',
                                'price'=>'335',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'350',
                                'price'=>'345',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'360',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'370',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'7.0')
                              )
                            )
            ),
            array(
              'title'=>'Setting #10000036',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Ring-radiant-1.jpg',
              'images'=>array(),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_setting_shape_cat','eo_setting_radiant_shape_cat','eo_ring_style_cat','eo_metal_cat','eo_ring_pave_cat','eo_metal_14k_yellow_gold_cat'),
              'attribute'=>array('pa_eo_metal_attr'=>array(
                                  'name'=>'pa_eo_metal_attr',
                                  'value'=>'14K Yellow Gold',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'4.0|5.0|6.0|7.0',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'340',
                                'price'=>'335',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'350',
                                'price'=>'345',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'360',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'370',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'7.0')
                              )
                            )
            ),
            array(
              'title'=>'Setting #10000037',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Ring-pear-1.jpg',
              'images'=>array(),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_setting_shape_cat','eo_setting_pear_shape_cat','eo_ring_style_cat','eo_metal_cat','eo_ring_trilogy_cat','eo_metal_18k_white_gold_cat','eo_metal_18k_yellow_gold_cat','eo_metal_18k_rose_gold_cat'),
              'attribute'=>array('pa_eo_metal_attr'=>array(
                                  'name'=>'pa_eo_metal_attr',
                                  'value'=>'18K Yellow Gold|18K Rose Gold|18K White Gold',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'4.0|5.0|6.0|7.0',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'340',
                                'price'=>'335',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'350',
                                'price'=>'345',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'360',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'370',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'250',
                                'price'=>'245',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'260',
                                'price'=>'255',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'270',
                                'price'=>'265',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'280',
                                'price'=>'275',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'300',
                                'price'=>'295',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'310',
                                'price'=>'305',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'320',
                                'price'=>'315',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'330',
                                'price'=>'325',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'7.0')
                              )
                            )
            ),
            array(
              'title'=>'Setting #10000038',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Ring-hert-1.jpg',
              'images'=>array('Ring-hert-2.jpg','Ring-hert-3.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_setting_shape_cat','eo_setting_heart_shape_cat','eo_ring_style_cat','eo_metal_cat','eo_ring_solitaire_cat','eo_metal_14k_white_gold_cat','eo_metal_14k_yellow_gold_cat','eo_metal_14k_rose_gold_cat'),
              'attribute'=>array('pa_eo_metal_attr'=>array(
                                  'name'=>'pa_eo_metal_attr',
                                  'value'=>'14K Yellow Gold|14K Rose Gold|14K White Gold',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'4.0|5.0|6.0|7.0',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'340',
                                'price'=>'335',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'350',
                                'price'=>'345',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'360',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'370',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'250',
                                'price'=>'245',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'260',
                                'price'=>'255',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'270',
                                'price'=>'265',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'280',
                                'price'=>'275',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'300',
                                'price'=>'295',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'310',
                                'price'=>'305',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'320',
                                'price'=>'315',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'330',
                                'price'=>'325',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'7.0')
                              )
                            )
            ),
            array(
              'title'=>'Setting #10000039',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Ring-cusion-1.jpg',
              'images'=>array('Ring-cusion-2.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_setting_shape_cat','eo_setting_cushion_shape_cat','eo_ring_style_cat','eo_metal_cat','eo_ring_halo_cat','eo_metal_18k_white_gold_cat','eo_metal_18k_yellow_gold_cat','eo_metal_18k_rose_gold_cat'),
              'attribute'=>array('pa_eo_metal_attr'=>array(
                                  'name'=>'pa_eo_metal_attr',
                                  'value'=>'18K Yellow Gold|18K Rose Gold|18K White Gold',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'4.0|5.0|6.0|7.0',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'340',
                                'price'=>'335',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'350',
                                'price'=>'345',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'360',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'370',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'250',
                                'price'=>'245',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'260',
                                'price'=>'255',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'270',
                                'price'=>'265',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'280',
                                'price'=>'275',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'300',
                                'price'=>'295',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'310',
                                'price'=>'305',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'320',
                                'price'=>'315',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'330',
                                'price'=>'325',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'7.0')
                              )
                            )
            ),

            //s-copy-5

            array(
              'title'=>'Setting #10000040',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Ring-round-1.jpg',
              'images'=>array('Ring-round-2.jpg','Ring-round-3.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_setting_shape_cat','eo_setting_round_shape_cat','eo_ring_style_cat','eo_metal_cat','eo_ring_halo_cat','eo_metal_14k_white_gold_cat','eo_metal_14k_yellow_gold_cat','eo_metal_14k_rose_gold_cat'),
              'attribute'=>array('pa_eo_metal_attr'=>array(
                                  'name'=>'pa_eo_metal_attr',
                                  'value'=>'14K Yellow Gold|14K Rose Gold|14K White Gold',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'4.0|5.0|6.0|7.0',
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
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'260',
                                'price'=>'255',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'270',
                                'price'=>'265',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'280',
                                'price'=>'275',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'300',
                                'price'=>'295',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'310',
                                'price'=>'305',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'320',
                                'price'=>'315',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'330',
                                'price'=>'325',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'340',
                                'price'=>'335',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'350',
                                'price'=>'345',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'360',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'370',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'7.0')
                              )
                            )            
            ),
            array(
              'title'=>'Setting #10000041',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Ring-princess-1.jpg',
              'images'=>array(),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_setting_shape_cat','eo_setting_princess_shape_cat','eo_ring_style_cat','eo_metal_cat','eo_ring_pave_cat','eo_metal_18k_white_gold_cat','eo_metal_18k_yellow_gold_cat','eo_metal_18k_rose_gold_cat'),
              'attribute'=>array('pa_eo_metal_attr'=>array(
                                  'name'=>'pa_eo_metal_attr',
                                  'value'=>'18K Yellow Gold|18K Rose Gold|18K White Gold',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'4.0|5.0|6.0|7.0',
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
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'260',
                                'price'=>'255',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'270',
                                'price'=>'265',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'280',
                                'price'=>'275',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'300',
                                'price'=>'295',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'310',
                                'price'=>'305',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'320',
                                'price'=>'315',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'330',
                                'price'=>'325',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'340',
                                'price'=>'335',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'350',
                                'price'=>'345',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'360',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'370',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'7.0')
                              )
                            )            
            ),
            array(
              'title'=>'Setting #10000042',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Ring-emerald-3.jpg',
              'images'=>array('Ring-emerald-4.jpg','Ring-emerald-5.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_setting_shape_cat','eo_setting_emerald_shape_cat','eo_ring_style_cat','eo_metal_cat','eo_ring_solitaire_cat','eo_metal_18k_white_gold_cat','eo_metal_18k_yellow_gold_cat','eo_metal_18k_rose_gold_cat'),
              'attribute'=>array('pa_eo_metal_attr'=>array(
                                  'name'=>'pa_eo_metal_attr',
                                  'value'=>'18K Yellow Gold|18K Rose Gold|18K White Gold',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'4.0|5.0|6.0|7.0',
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
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'260',
                                'price'=>'255',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'270',
                                'price'=>'265',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'280',
                                'price'=>'275',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'300',
                                'price'=>'295',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'310',
                                'price'=>'305',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'320',
                                'price'=>'315',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'330',
                                'price'=>'325',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'340',
                                'price'=>'335',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'350',
                                'price'=>'345',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'360',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'370',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'7.0')
                              )
                            )
            ),
            array(
              'title'=>'Setting #10000043',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Ring-asscher-1.jpg',
              'images'=>array('Ring-asscher-2.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_setting_shape_cat','eo_setting_asscher_shape_cat','eo_ring_style_cat','eo_metal_cat','eo_ring_trilogy_cat','eo_metal_14k_white_gold_cat','eo_metal_14k_yellow_gold_cat','eo_metal_14k_rose_gold_cat'),
              'attribute'=>array('pa_eo_metal_attr'=>array(
                                  'name'=>'pa_eo_metal_attr',
                                  'value'=>'14K Yellow Gold|14K Rose Gold|14K White Gold',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'4.0|5.0|6.0|7.0',
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
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'260',
                                'price'=>'255',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'270',
                                'price'=>'265',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'280',
                                'price'=>'275',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'300',
                                'price'=>'295',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'310',
                                'price'=>'305',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'320',
                                'price'=>'315',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'330',
                                'price'=>'325',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'340',
                                'price'=>'335',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'350',
                                'price'=>'345',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'360',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'370',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'7.0')
                              )
                            )
            ),
            array(
              'title'=>'Setting #10000044',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Ring-marquise.jpg',
              'images'=>array(),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_setting_shape_cat','eo_setting_marquise_shape_cat','eo_ring_style_cat','eo_metal_cat','eo_ring_pave_cat','eo_metal_14k_white_gold_cat','eo_metal_14k_yellow_gold_cat','eo_metal_14k_rose_gold_cat'),
              'attribute'=>array('pa_eo_metal_attr'=>array(
                                  'name'=>'pa_eo_metal_attr',
                                  'value'=>'14K Yellow Gold|14K Rose Gold|14K White Gold',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'4.0|5.0|6.0|7.0',
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
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'260',
                                'price'=>'255',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'270',
                                'price'=>'265',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'280',
                                'price'=>'275',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'300',
                                'price'=>'295',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'310',
                                'price'=>'305',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'320',
                                'price'=>'315',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'330',
                                'price'=>'325',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'340',
                                'price'=>'335',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'350',
                                'price'=>'345',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'360',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'370',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'7.0')
                              )
                            )
            ),
            array(
              'title'=>'Setting #10000045',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Ring-oval-1.jpg',
              'images'=>array(),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_setting_shape_cat','eo_setting_oval_shape_cat','eo_ring_style_cat','eo_metal_cat','eo_ring_halo_cat','eo_metal_18k_white_gold_cat','eo_metal_18k_yellow_gold_cat','eo_metal_18k_rose_gold_cat'),
              'attribute'=>array('pa_eo_metal_attr'=>array(
                                  'name'=>'pa_eo_metal_attr',
                                  'value'=>'18K Yellow Gold|18K Rose Gold|18K White Gold',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'4.0|5.0|6.0|7.0',
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
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'260',
                                'price'=>'255',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'270',
                                'price'=>'265',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'280',
                                'price'=>'275',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'300',
                                'price'=>'295',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'310',
                                'price'=>'305',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'320',
                                'price'=>'315',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'330',
                                'price'=>'325',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'340',
                                'price'=>'335',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'350',
                                'price'=>'345',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'360',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'370',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'7.0')
                              )
                            )
            ),
            array(
              'title'=>'Setting #10000046',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Ring-radiant-1.jpg',
              'images'=>array(),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_setting_shape_cat','eo_setting_radiant_shape_cat','eo_ring_style_cat','eo_metal_cat','eo_ring_pave_cat','eo_metal_14k_yellow_gold_cat'),
              'attribute'=>array('pa_eo_metal_attr'=>array(
                                  'name'=>'pa_eo_metal_attr',
                                  'value'=>'14K Yellow Gold',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'4.0|5.0|6.0|7.0',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'340',
                                'price'=>'335',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'350',
                                'price'=>'345',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'360',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'370',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'7.0')
                              )
                            )
            ),
            array(
              'title'=>'Setting #10000047',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Ring-pear-1.jpg',
              'images'=>array(),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_setting_shape_cat','eo_setting_pear_shape_cat','eo_ring_style_cat','eo_metal_cat','eo_ring_trilogy_cat','eo_metal_18k_white_gold_cat','eo_metal_18k_yellow_gold_cat','eo_metal_18k_rose_gold_cat'),
              'attribute'=>array('pa_eo_metal_attr'=>array(
                                  'name'=>'pa_eo_metal_attr',
                                  'value'=>'18K Yellow Gold|18K Rose Gold|18K White Gold',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'4.0|5.0|6.0|7.0',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'340',
                                'price'=>'335',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'350',
                                'price'=>'345',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'360',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'370',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'250',
                                'price'=>'245',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'260',
                                'price'=>'255',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'270',
                                'price'=>'265',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'280',
                                'price'=>'275',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'300',
                                'price'=>'295',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'310',
                                'price'=>'305',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'320',
                                'price'=>'315',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'330',
                                'price'=>'325',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'7.0')
                              )
                            )
            ),
            array(
              'title'=>'Setting #10000048',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Ring-hert-1.jpg',
              'images'=>array('Ring-hert-2.jpg','Ring-hert-3.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_setting_shape_cat','eo_setting_heart_shape_cat','eo_ring_style_cat','eo_metal_cat','eo_ring_solitaire_cat','eo_metal_14k_white_gold_cat','eo_metal_14k_yellow_gold_cat','eo_metal_14k_rose_gold_cat'),
              'attribute'=>array('pa_eo_metal_attr'=>array(
                                  'name'=>'pa_eo_metal_attr',
                                  'value'=>'14K Yellow Gold|14K Rose Gold|14K White Gold',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'4.0|5.0|6.0|7.0',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'340',
                                'price'=>'335',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'350',
                                'price'=>'345',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'360',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'370',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Yellow Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'250',
                                'price'=>'245',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'260',
                                'price'=>'255',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'270',
                                'price'=>'265',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'280',
                                'price'=>'275',
                                'terms'=>array('pa_eo_metal_attr'=>'14K Rose Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'300',
                                'price'=>'295',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'310',
                                'price'=>'305',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'320',
                                'price'=>'315',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'330',
                                'price'=>'325',
                                'terms'=>array('pa_eo_metal_attr'=>'14K White Gold','pa_eo_size_attr'=>'7.0')
                              )
                            )
            ),
            array(
              'title'=>'Setting #10000049',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Ring-cusion-1.jpg',
              'images'=>array('Ring-cusion-2.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_setting_shape_cat','eo_setting_cushion_shape_cat','eo_ring_style_cat','eo_metal_cat','eo_ring_halo_cat','eo_metal_18k_white_gold_cat','eo_metal_18k_yellow_gold_cat','eo_metal_18k_rose_gold_cat'),
              'attribute'=>array('pa_eo_metal_attr'=>array(
                                  'name'=>'pa_eo_metal_attr',
                                  'value'=>'18K Yellow Gold|18K Rose Gold|18K White Gold',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'4.0|5.0|6.0|7.0',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'340',
                                'price'=>'335',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'350',
                                'price'=>'345',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'360',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'370',
                                'price'=>'365',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Yellow Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'250',
                                'price'=>'245',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'260',
                                'price'=>'255',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'270',
                                'price'=>'265',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'280',
                                'price'=>'275',
                                'terms'=>array('pa_eo_metal_attr'=>'18K Rose Gold','pa_eo_size_attr'=>'7.0')
                              ),
                              array(
                                'regular_price'=>'300',
                                'price'=>'295',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'4.0')
                              ),
                              array(
                                'regular_price'=>'310',
                                'price'=>'305',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'5.0')
                              ),
                              array(
                                'regular_price'=>'320',
                                'price'=>'315',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'6.0')
                              ),
                              array(
                                'regular_price'=>'330',
                                'price'=>'325',
                                'terms'=>array('pa_eo_metal_attr'=>'18K White Gold','pa_eo_size_attr'=>'7.0')
                              )
                            )
            ),

            //Diamonds__
            
            array(
              'title'=>'Round Diamond #89302496',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Round-4.jpg',
              'images'=>array('Round-5.jpg','Round-1.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_diamond_shape_cat','eo_diamond_round_shape_cat'),
              'attribute'=>array('pa_eo_carat_attr'=>array(
                                  'name'=>'pa_eo_carat_attr',
                                  'value'=>'0.5',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_clarity_attr'=>array(
                                  'name'=>'pa_eo_clarity_attr',
                                  'value'=>'IF',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_colour_attr'=>array(
                                  'name'=>'pa_eo_colour_attr',
                                  'value'=>'D',
                                  'position'=>2,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_depth_attr'=>array(
                                  'name'=>'pa_eo_depth_attr',
                                  'value'=>'78',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_fluorescence_attr'=>array(
                                  'name'=>'pa_eo_fluorescence_attr',
                                  'value'=>'Slight',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),

                        'pa_eo_grading_report_attr'=>array(
                                  'name'=>'pa_eo_grading_report_attr',
                                  'value'=>'IGI',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),        
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'4.0',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_symmertry_attr'=>array(
                                  'name'=>'pa_eo_symmertry_attr',
                                  'value'=>'Fair',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_table_attr'=>array(
                                  'name'=>'pa_eo_table_attr',
                                  'value'=>'56',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )        
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'15691',
                                'price'=>'15500',
                                'terms'=>array('pa_eo_carat_attr'=>'0.5','pa_eo_clarity_attr'=>'IF','pa_eo_colour_attr'=>'D','pa_eo_depth_attr'=>'78','pa_eo_fluorescence_attr'=>'Slight','pa_eo_grading_report_attr'=>'IGI','pa_eo_size_attr'=>'4.0','pa_eo_symmertry_attr'=>'Fair','pa_eo_table_attr'=>'56')
                              )
                       )       
            ),
            array(
              'title'=>'Emerald Diamond #66984597',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Emerald-1.jpg',
              'images'=>array('Emerald-2.jpg','Emerald-3.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_diamond_shape_cat','eo_diamond_emerald_shape_cat'),
              'attribute'=>array('pa_eo_carat_attr'=>array(
                                  'name'=>'pa_eo_carat_attr',
                                  'value'=>'0.7',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_clarity_attr'=>array(
                                  'name'=>'pa_eo_clarity_attr',
                                  'value'=>'VVS1',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_colour_attr'=>array(
                                  'name'=>'pa_eo_colour_attr',
                                  'value'=>'G',
                                  'position'=>2,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_depth_attr'=>array(
                                  'name'=>'pa_eo_depth_attr',
                                  'value'=>'72',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_fluorescence_attr'=>array(
                                  'name'=>'pa_eo_fluorescence_attr',
                                  'value'=>'None',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),

                        'pa_eo_grading_report_attr'=>array(
                                  'name'=>'pa_eo_grading_report_attr',
                                  'value'=>'HRD',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),        
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'5.0',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_symmertry_attr'=>array(
                                  'name'=>'pa_eo_symmertry_attr',
                                  'value'=>'Very Good',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ), 
                        'pa_eo_table_attr'=>array(
                                  'name'=>'pa_eo_table_attr',
                                  'value'=>'50',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )        
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'20500',
                                'price'=>'20399',
                                'terms'=>array('pa_eo_carat_attr'=>'0.7','pa_eo_clarity_attr'=>'VVS1','pa_eo_colour_attr'=>'G','pa_eo_depth_attr'=>'72','pa_eo_fluorescence_attr'=>'None','pa_eo_grading_report_attr'=>'HRD','pa_eo_size_attr'=>'5.0','pa_eo_symmertry_attr'=>'Very Good','pa_eo_table_attr'=>'50')
                              )
                       )        
            ),
            array(
              'title'=>'Asscher Diamond #99649028',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/asscher-1.jpg',
              'images'=>array('asscher-2.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_diamond_shape_cat','eo_diamond_asscher_shape_cat'),
              'attribute'=>array('pa_eo_carat_attr'=>array(
                                  'name'=>'pa_eo_carat_attr',
                                  'value'=>'0.4',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_clarity_attr'=>array(
                                  'name'=>'pa_eo_clarity_attr',
                                  'value'=>'IF',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_colour_attr'=>array(
                                  'name'=>'pa_eo_colour_attr',
                                  'value'=>'J',
                                  'position'=>2,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_depth_attr'=>array(
                                  'name'=>'pa_eo_depth_attr',
                                  'value'=>'45',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_fluorescence_attr'=>array(
                                  'name'=>'pa_eo_fluorescence_attr',
                                  'value'=>'Very',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),

                        'pa_eo_grading_report_attr'=>array(
                                  'name'=>'pa_eo_grading_report_attr',
                                  'value'=>'AGS',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),        
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'1.0',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_symmertry_attr'=>array(
                                  'name'=>'pa_eo_symmertry_attr',
                                  'value'=>'Fair',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ), 
                        'pa_eo_table_attr'=>array(
                                  'name'=>'pa_eo_table_attr',
                                  'value'=>'55',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )        
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'12500',
                                'price'=>'11390',
                                'terms'=>array('pa_eo_carat_attr'=>'0.4','pa_eo_clarity_attr'=>'IF','pa_eo_colour_attr'=>'J','pa_eo_depth_attr'=>'45','pa_eo_fluorescence_attr'=>'Very','pa_eo_grading_report_attr'=>'AGS','pa_eo_size_attr'=>'1.0','pa_eo_symmertry_attr'=>'Fair','pa_eo_table_attr'=>'55')
                              )
                       )
            ),
            array(
              'title'=>'PRINCESS DIAMOND #39398077',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Princess-3.jpg',
              'images'=>array('Princess-1.jpg','Princess-2.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_diamond_shape_cat','eo_diamond_princess_shape_cat'),
              'attribute'=>array('pa_eo_carat_attr'=>array(
                                  'name'=>'pa_eo_carat_attr',
                                  'value'=>'5.5',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_clarity_attr'=>array(
                                  'name'=>'pa_eo_clarity_attr',
                                  'value'=>'VS1',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_colour_attr'=>array(
                                  'name'=>'pa_eo_colour_attr',
                                  'value'=>'K',
                                  'position'=>2,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_depth_attr'=>array(
                                  'name'=>'pa_eo_depth_attr',
                                  'value'=>'75',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_fluorescence_attr'=>array(
                                  'name'=>'pa_eo_fluorescence_attr',
                                  'value'=>'None',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),

                        'pa_eo_grading_report_attr'=>array(
                                  'name'=>'pa_eo_grading_report_attr',
                                  'value'=>'GIA',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),        
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'1.2',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_symmertry_attr'=>array(
                                  'name'=>'pa_eo_symmertry_attr',
                                  'value'=>'Slight',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ), 
                        'pa_eo_table_attr'=>array(
                                  'name'=>'pa_eo_table_attr',
                                  'value'=>'80',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )        
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'22500',
                                'price'=>'22390',
                                'terms'=>array('pa_eo_carat_attr'=>'5.5','pa_eo_clarity_attr'=>'VS1','pa_eo_colour_attr'=>'K','pa_eo_depth_attr'=>'75','pa_eo_fluorescence_attr'=>'None','pa_eo_grading_report_attr'=>'GIA','pa_eo_size_attr'=>'1.2','pa_eo_symmertry_attr'=>'Slight','pa_eo_table_attr'=>'80')
                              )
                       ) 
            ),
            array(
              'title'=>'Cusion Diamond #87671292',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Cusion-1.jpg',
              'images'=>array('Cusion-2.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_diamond_shape_cat','eo_diamond_cushion_shape_cat'),
              'attribute'=>array('pa_eo_carat_attr'=>array(
                                  'name'=>'pa_eo_carat_attr',
                                  'value'=>'0.5',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_clarity_attr'=>array(
                                  'name'=>'pa_eo_clarity_attr',
                                  'value'=>'SI1',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_colour_attr'=>array(
                                  'name'=>'pa_eo_colour_attr',
                                  'value'=>'M',
                                  'position'=>2,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_depth_attr'=>array(
                                  'name'=>'pa_eo_depth_attr',
                                  'value'=>'48',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_fluorescence_attr'=>array(
                                  'name'=>'pa_eo_fluorescence_attr',
                                  'value'=>'Faint',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),

                        'pa_eo_grading_report_attr'=>array(
                                  'name'=>'pa_eo_grading_report_attr',
                                  'value'=>'HRD',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),        
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'0.8',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_symmertry_attr'=>array(
                                  'name'=>'pa_eo_symmertry_attr',
                                  'value'=>'Excellent',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ), 
                        'pa_eo_table_attr'=>array(
                                  'name'=>'pa_eo_table_attr',
                                  'value'=>'56',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )        
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'45500',
                                'price'=>'45399',
                                'terms'=>array('pa_eo_carat_attr'=>'0.5','pa_eo_clarity_attr'=>'SI1','pa_eo_colour_attr'=>'M','pa_eo_depth_attr'=>'48','pa_eo_fluorescence_attr'=>'Faint','pa_eo_grading_report_attr'=>'HRD','pa_eo_size_attr'=>'0.8','pa_eo_symmertry_attr'=>'Excellent','pa_eo_table_attr'=>'56')
                              )
                       )
            ),
            array(
              'title'=>'Heart Diamond #95296856',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Heart-1.jpg',
              'images'=>array('Heart-2.jpg','Heart-3.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_diamond_shape_cat','eo_diamond_heart_shape_cat'),
              'attribute'=>array('pa_eo_carat_attr'=>array(
                                  'name'=>'pa_eo_carat_attr',
                                  'value'=>'0.9',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_clarity_attr'=>array(
                                  'name'=>'pa_eo_clarity_attr',
                                  'value'=>'IF',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_colour_attr'=>array(
                                  'name'=>'pa_eo_colour_attr',
                                  'value'=>'D',
                                  'position'=>2,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_depth_attr'=>array(
                                  'name'=>'pa_eo_depth_attr',
                                  'value'=>'67',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_fluorescence_attr'=>array(
                                  'name'=>'pa_eo_fluorescence_attr',
                                  'value'=>'None',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),

                        'pa_eo_grading_report_attr'=>array(
                                  'name'=>'pa_eo_grading_report_attr',
                                  'value'=>'IGI',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),        
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'1.1',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_symmertry_attr'=>array(
                                  'name'=>'pa_eo_symmertry_attr',
                                  'value'=>'Excellent',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ), 
                        'pa_eo_table_attr'=>array(
                                  'name'=>'pa_eo_table_attr',
                                  'value'=>'77',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )        
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'7500',
                                'price'=>'7399',
                                'terms'=>array('pa_eo_carat_attr'=>'0.9','pa_eo_clarity_attr'=>'IF','pa_eo_colour_attr'=>'D','pa_eo_depth_attr'=>'67','pa_eo_fluorescence_attr'=>'None','pa_eo_grading_report_attr'=>'IGI','pa_eo_size_attr'=>'1.1','pa_eo_symmertry_attr'=>'Excellent','pa_eo_table_attr'=>'77')
                              )
                       )
            ),
            array(
              'title'=>'Marquise Diamond #16931364',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Marquise-1.jpg',
              'images'=>array('Marquise-2.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_diamond_shape_cat','eo_diamond_marquise_shape_cat'),
              'attribute'=>array('pa_eo_carat_attr'=>array(
                                  'name'=>'pa_eo_carat_attr',
                                  'value'=>'12',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_clarity_attr'=>array(
                                  'name'=>'pa_eo_clarity_attr',
                                  'value'=>'IF',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_colour_attr'=>array(
                                  'name'=>'pa_eo_colour_attr',
                                  'value'=>'L',
                                  'position'=>2,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_depth_attr'=>array(
                                  'name'=>'pa_eo_depth_attr',
                                  'value'=>'66',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_fluorescence_attr'=>array(
                                  'name'=>'pa_eo_fluorescence_attr',
                                  'value'=>'Faint',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),

                        'pa_eo_grading_report_attr'=>array(
                                  'name'=>'pa_eo_grading_report_attr',
                                  'value'=>'AGS',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),        
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'2.0',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_symmertry_attr'=>array(
                                  'name'=>'pa_eo_symmertry_attr',
                                  'value'=>'Very Good',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ), 
                        'pa_eo_table_attr'=>array(
                                  'name'=>'pa_eo_table_attr',
                                  'value'=>'85',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )        
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'85089',
                                'price'=>'85080',
                                'terms'=>array('pa_eo_carat_attr'=>'12','pa_eo_clarity_attr'=>'IF','pa_eo_colour_attr'=>'L','pa_eo_depth_attr'=>'66','pa_eo_fluorescence_attr'=>'Faint','pa_eo_grading_report_attr'=>'AGS','pa_eo_size_attr'=>'2.0','pa_eo_symmertry_attr'=>'Very Good','pa_eo_table_attr'=>'85')
                              )
                       )
            ),
            array(
              'title'=>'Oval Diamond #75138961',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Oval-1.jpg',
              'images'=>array('Oval-2.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_diamond_shape_cat','eo_diamond_oval_shape_cat'),
              'attribute'=>array('pa_eo_carat_attr'=>array(
                                  'name'=>'pa_eo_carat_attr',
                                  'value'=>'2',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_clarity_attr'=>array(
                                  'name'=>'pa_eo_clarity_attr',
                                  'value'=>'VVS1',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_colour_attr'=>array(
                                  'name'=>'pa_eo_colour_attr',
                                  'value'=>'F',
                                  'position'=>2,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_depth_attr'=>array(
                                  'name'=>'pa_eo_depth_attr',
                                  'value'=>'72',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_fluorescence_attr'=>array(
                                  'name'=>'pa_eo_fluorescence_attr',
                                  'value'=>'Faint',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),

                        'pa_eo_grading_report_attr'=>array(
                                  'name'=>'pa_eo_grading_report_attr',
                                  'value'=>'HRD',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),        
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'2.0',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_symmertry_attr'=>array(
                                  'name'=>'pa_eo_symmertry_attr',
                                  'value'=>'Good',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_table_attr'=>array(
                                  'name'=>'pa_eo_table_attr',
                                  'value'=>'80',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )        
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'80089',
                                'price'=>'80080',
                                'terms'=>array('pa_eo_carat_attr'=>'2','pa_eo_clarity_attr'=>'VVS1','pa_eo_colour_attr'=>'F','pa_eo_depth_attr'=>'72','pa_eo_fluorescence_attr'=>'Faint','pa_eo_grading_report_attr'=>'HRD','pa_eo_size_attr'=>'2.0','pa_eo_symmertry_attr'=>'Good','pa_eo_table_attr'=>'80')
                              )
                       )
            ),
            array(
              'title'=>'Radiant Solitaire Diamond #59218358',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Radiant-1.jpg',
              'images'=>array('Radiant-2.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_diamond_shape_cat','eo_diamond_radiant_shape_cat'),
              'attribute'=>array('pa_eo_carat_attr'=>array(
                                  'name'=>'pa_eo_carat_attr',
                                  'value'=>'5',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_clarity_attr'=>array(
                                  'name'=>'pa_eo_clarity_attr',
                                  'value'=>'VVS2',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_colour_attr'=>array(
                                  'name'=>'pa_eo_colour_attr',
                                  'value'=>'G',
                                  'position'=>2,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_depth_attr'=>array(
                                  'name'=>'pa_eo_depth_attr',
                                  'value'=>'75',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_fluorescence_attr'=>array(
                                  'name'=>'pa_eo_fluorescence_attr',
                                  'value'=>'Faint',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),

                        'pa_eo_grading_report_attr'=>array(
                                  'name'=>'pa_eo_grading_report_attr',
                                  'value'=>'HRD',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),        
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'2.0',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_symmertry_attr'=>array(
                                  'name'=>'pa_eo_symmertry_attr',
                                  'value'=>'Good',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ), 
                        'pa_eo_table_attr'=>array(
                                  'name'=>'pa_eo_table_attr',
                                  'value'=>'83',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )        
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'92089',
                                'price'=>'92080',
                                'terms'=>array('pa_eo_carat_attr'=>'5','pa_eo_clarity_attr'=>'VVS2','pa_eo_colour_attr'=>'G','pa_eo_depth_attr'=>'73','pa_eo_fluorescence_attr'=>'Faint','pa_eo_grading_report_attr'=>'HRD','pa_eo_size_attr'=>'2.0','pa_eo_symmertry_attr'=>'Good','pa_eo_table_attr'=>'83')
                              )
                       )
            ),
            array(
              'title'=>'Pear Diamond #95299666',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Pear-1.jpg',
              'images'=>array('Pear-2.jpg','Pear-3.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_diamond_shape_cat','eo_diamond_pear_shape_cat'),
              'attribute'=>array('pa_eo_carat_attr'=>array(
                                  'name'=>'pa_eo_carat_attr',
                                  'value'=>'0.2',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_clarity_attr'=>array(
                                  'name'=>'pa_eo_clarity_attr',
                                  'value'=>'IF',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_colour_attr'=>array(
                                  'name'=>'pa_eo_colour_attr',
                                  'value'=>'E',
                                  'position'=>2,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_depth_attr'=>array(
                                  'name'=>'pa_eo_depth_attr',
                                  'value'=>'48',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_fluorescence_attr'=>array(
                                  'name'=>'pa_eo_fluorescence_attr',
                                  'value'=>'Slight',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),

                        'pa_eo_grading_report_attr'=>array(
                                  'name'=>'pa_eo_grading_report_attr',
                                  'value'=>'GIA',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),        
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'0.2',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_symmertry_attr'=>array(
                                  'name'=>'pa_eo_symmertry_attr',
                                  'value'=>'Good',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ), 
                        'pa_eo_table_attr'=>array(
                                  'name'=>'pa_eo_table_attr',
                                  'value'=>'75',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )        
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'5500',
                                'price'=>'5399',
                                'terms'=>array('pa_eo_carat_attr'=>'0.2','pa_eo_clarity_attr'=>'IF','pa_eo_colour_attr'=>'E','pa_eo_depth_attr'=>'48','pa_eo_fluorescence_attr'=>'Slight','pa_eo_grading_report_attr'=>'GIA','pa_eo_size_attr'=>'0.2','pa_eo_symmertry_attr'=>'Good','pa_eo_table_attr'=>'75')
                              )
                       )
            ),

            //d-copy-1

            array(
              'title'=>'Round Diamond #10000050',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Round-4.jpg',
              'images'=>array('Round-5.jpg','Round-1.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_diamond_shape_cat','eo_diamond_round_shape_cat'),
              'attribute'=>array('pa_eo_carat_attr'=>array(
                                  'name'=>'pa_eo_carat_attr',
                                  'value'=>'0.5',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_clarity_attr'=>array(
                                  'name'=>'pa_eo_clarity_attr',
                                  'value'=>'IF',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_colour_attr'=>array(
                                  'name'=>'pa_eo_colour_attr',
                                  'value'=>'D',
                                  'position'=>2,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_depth_attr'=>array(
                                  'name'=>'pa_eo_depth_attr',
                                  'value'=>'78',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_fluorescence_attr'=>array(
                                  'name'=>'pa_eo_fluorescence_attr',
                                  'value'=>'Slight',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),

                        'pa_eo_grading_report_attr'=>array(
                                  'name'=>'pa_eo_grading_report_attr',
                                  'value'=>'IGI',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),        
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'4.0',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_symmertry_attr'=>array(
                                  'name'=>'pa_eo_symmertry_attr',
                                  'value'=>'Fair',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_table_attr'=>array(
                                  'name'=>'pa_eo_table_attr',
                                  'value'=>'56',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )        
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'15691',
                                'price'=>'15500',
                                'terms'=>array('pa_eo_carat_attr'=>'0.5','pa_eo_clarity_attr'=>'IF','pa_eo_colour_attr'=>'D','pa_eo_depth_attr'=>'78','pa_eo_fluorescence_attr'=>'Slight','pa_eo_grading_report_attr'=>'IGI','pa_eo_size_attr'=>'4.0','pa_eo_symmertry_attr'=>'Fair','pa_eo_table_attr'=>'56')
                              )
                       )       
            ),
            array(
              'title'=>'Emerald Diamond #10000051',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Emerald-1.jpg',
              'images'=>array('Emerald-2.jpg','Emerald-3.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_diamond_shape_cat','eo_diamond_emerald_shape_cat'),
              'attribute'=>array('pa_eo_carat_attr'=>array(
                                  'name'=>'pa_eo_carat_attr',
                                  'value'=>'0.7',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_clarity_attr'=>array(
                                  'name'=>'pa_eo_clarity_attr',
                                  'value'=>'VVS1',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_colour_attr'=>array(
                                  'name'=>'pa_eo_colour_attr',
                                  'value'=>'G',
                                  'position'=>2,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_depth_attr'=>array(
                                  'name'=>'pa_eo_depth_attr',
                                  'value'=>'72',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_fluorescence_attr'=>array(
                                  'name'=>'pa_eo_fluorescence_attr',
                                  'value'=>'None',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),

                        'pa_eo_grading_report_attr'=>array(
                                  'name'=>'pa_eo_grading_report_attr',
                                  'value'=>'HRD',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),        
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'5.0',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_symmertry_attr'=>array(
                                  'name'=>'pa_eo_symmertry_attr',
                                  'value'=>'Very Good',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ), 
                        'pa_eo_table_attr'=>array(
                                  'name'=>'pa_eo_table_attr',
                                  'value'=>'50',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )        
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'20500',
                                'price'=>'20399',
                                'terms'=>array('pa_eo_carat_attr'=>'0.7','pa_eo_clarity_attr'=>'VVS1','pa_eo_colour_attr'=>'G','pa_eo_depth_attr'=>'72','pa_eo_fluorescence_attr'=>'None','pa_eo_grading_report_attr'=>'HRD','pa_eo_size_attr'=>'5.0','pa_eo_symmertry_attr'=>'Very Good','pa_eo_table_attr'=>'50')
                              )
                       )        
            ),
            array(
              'title'=>'Asscher Diamond #10000052',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/asscher-1.jpg',
              'images'=>array('asscher-2.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_diamond_shape_cat','eo_diamond_asscher_shape_cat'),
              'attribute'=>array('pa_eo_carat_attr'=>array(
                                  'name'=>'pa_eo_carat_attr',
                                  'value'=>'0.4',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_clarity_attr'=>array(
                                  'name'=>'pa_eo_clarity_attr',
                                  'value'=>'IF',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_colour_attr'=>array(
                                  'name'=>'pa_eo_colour_attr',
                                  'value'=>'J',
                                  'position'=>2,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_depth_attr'=>array(
                                  'name'=>'pa_eo_depth_attr',
                                  'value'=>'45',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_fluorescence_attr'=>array(
                                  'name'=>'pa_eo_fluorescence_attr',
                                  'value'=>'Very',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),

                        'pa_eo_grading_report_attr'=>array(
                                  'name'=>'pa_eo_grading_report_attr',
                                  'value'=>'AGS',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),        
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'1.0',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_symmertry_attr'=>array(
                                  'name'=>'pa_eo_symmertry_attr',
                                  'value'=>'Fair',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ), 
                        'pa_eo_table_attr'=>array(
                                  'name'=>'pa_eo_table_attr',
                                  'value'=>'55',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )        
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'12500',
                                'price'=>'11390',
                                'terms'=>array('pa_eo_carat_attr'=>'0.4','pa_eo_clarity_attr'=>'IF','pa_eo_colour_attr'=>'J','pa_eo_depth_attr'=>'45','pa_eo_fluorescence_attr'=>'Very','pa_eo_grading_report_attr'=>'AGS','pa_eo_size_attr'=>'1.0','pa_eo_symmertry_attr'=>'Fair','pa_eo_table_attr'=>'55')
                              )
                       )
            ),
            array(
              'title'=>'PRINCESS DIAMOND #10000053',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Princess-3.jpg',
              'images'=>array('Princess-1.jpg','Princess-2.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_diamond_shape_cat','eo_diamond_princess_shape_cat'),
              'attribute'=>array('pa_eo_carat_attr'=>array(
                                  'name'=>'pa_eo_carat_attr',
                                  'value'=>'5.5',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_clarity_attr'=>array(
                                  'name'=>'pa_eo_clarity_attr',
                                  'value'=>'VS1',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_colour_attr'=>array(
                                  'name'=>'pa_eo_colour_attr',
                                  'value'=>'K',
                                  'position'=>2,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_depth_attr'=>array(
                                  'name'=>'pa_eo_depth_attr',
                                  'value'=>'75',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_fluorescence_attr'=>array(
                                  'name'=>'pa_eo_fluorescence_attr',
                                  'value'=>'None',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),

                        'pa_eo_grading_report_attr'=>array(
                                  'name'=>'pa_eo_grading_report_attr',
                                  'value'=>'GIA',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),        
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'1.2',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_symmertry_attr'=>array(
                                  'name'=>'pa_eo_symmertry_attr',
                                  'value'=>'Slight',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ), 
                        'pa_eo_table_attr'=>array(
                                  'name'=>'pa_eo_table_attr',
                                  'value'=>'80',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )        
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'22500',
                                'price'=>'22390',
                                'terms'=>array('pa_eo_carat_attr'=>'5.5','pa_eo_clarity_attr'=>'VS1','pa_eo_colour_attr'=>'K','pa_eo_depth_attr'=>'75','pa_eo_fluorescence_attr'=>'None','pa_eo_grading_report_attr'=>'GIA','pa_eo_size_attr'=>'1.2','pa_eo_symmertry_attr'=>'Slight','pa_eo_table_attr'=>'80')
                              )
                       ) 
            ),
            array(
              'title'=>'Cusion Diamond #10000054',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Cusion-1.jpg',
              'images'=>array('Cusion-2.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_diamond_shape_cat','eo_diamond_cushion_shape_cat'),
              'attribute'=>array('pa_eo_carat_attr'=>array(
                                  'name'=>'pa_eo_carat_attr',
                                  'value'=>'0.5',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_clarity_attr'=>array(
                                  'name'=>'pa_eo_clarity_attr',
                                  'value'=>'SI1',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_colour_attr'=>array(
                                  'name'=>'pa_eo_colour_attr',
                                  'value'=>'M',
                                  'position'=>2,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_depth_attr'=>array(
                                  'name'=>'pa_eo_depth_attr',
                                  'value'=>'48',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_fluorescence_attr'=>array(
                                  'name'=>'pa_eo_fluorescence_attr',
                                  'value'=>'Faint',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),

                        'pa_eo_grading_report_attr'=>array(
                                  'name'=>'pa_eo_grading_report_attr',
                                  'value'=>'HRD',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),        
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'0.8',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_symmertry_attr'=>array(
                                  'name'=>'pa_eo_symmertry_attr',
                                  'value'=>'Excellent',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_table_attr'=>array(
                                  'name'=>'pa_eo_table_attr',
                                  'value'=>'56',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )        
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'45500',
                                'price'=>'45399',
                                'terms'=>array('pa_eo_carat_attr'=>'0.5','pa_eo_clarity_attr'=>'SI1','pa_eo_colour_attr'=>'M','pa_eo_depth_attr'=>'48','pa_eo_fluorescence_attr'=>'Faint','pa_eo_grading_report_attr'=>'HRD','pa_eo_size_attr'=>'0.8','pa_eo_symmertry_attr'=>'Excellent','pa_eo_table_attr'=>'56')
                              )
                       )
            ),
            array(
              'title'=>'Heart Diamond #10000055',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Heart-1.jpg',
              'images'=>array('Heart-2.jpg','Heart-3.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_diamond_shape_cat','eo_diamond_heart_shape_cat'),
              'attribute'=>array('pa_eo_carat_attr'=>array(
                                  'name'=>'pa_eo_carat_attr',
                                  'value'=>'0.9',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_clarity_attr'=>array(
                                  'name'=>'pa_eo_clarity_attr',
                                  'value'=>'IF',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_colour_attr'=>array(
                                  'name'=>'pa_eo_colour_attr',
                                  'value'=>'D',
                                  'position'=>2,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_depth_attr'=>array(
                                  'name'=>'pa_eo_depth_attr',
                                  'value'=>'67',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_fluorescence_attr'=>array(
                                  'name'=>'pa_eo_fluorescence_attr',
                                  'value'=>'None',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),

                        'pa_eo_grading_report_attr'=>array(
                                  'name'=>'pa_eo_grading_report_attr',
                                  'value'=>'IGI',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),        
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'1.1',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_symmertry_attr'=>array(
                                  'name'=>'pa_eo_symmertry_attr',
                                  'value'=>'Excellent',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ), 
                        'pa_eo_table_attr'=>array(
                                  'name'=>'pa_eo_table_attr',
                                  'value'=>'77',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )        
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'7500',
                                'price'=>'7399',
                                'terms'=>array('pa_eo_carat_attr'=>'0.9','pa_eo_clarity_attr'=>'IF','pa_eo_colour_attr'=>'D','pa_eo_depth_attr'=>'67','pa_eo_fluorescence_attr'=>'None','pa_eo_grading_report_attr'=>'IGI','pa_eo_size_attr'=>'1.1','pa_eo_symmertry_attr'=>'Excellent','pa_eo_table_attr'=>'77')
                              )
                       )
            ),
            array(
              'title'=>'Marquise Diamond #10000056',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Marquise-1.jpg',
              'images'=>array('Marquise-2.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_diamond_shape_cat','eo_diamond_marquise_shape_cat'),
              'attribute'=>array('pa_eo_carat_attr'=>array(
                                  'name'=>'pa_eo_carat_attr',
                                  'value'=>'12',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_clarity_attr'=>array(
                                  'name'=>'pa_eo_clarity_attr',
                                  'value'=>'IF',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_colour_attr'=>array(
                                  'name'=>'pa_eo_colour_attr',
                                  'value'=>'L',
                                  'position'=>2,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_depth_attr'=>array(
                                  'name'=>'pa_eo_depth_attr',
                                  'value'=>'66',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_fluorescence_attr'=>array(
                                  'name'=>'pa_eo_fluorescence_attr',
                                  'value'=>'Faint',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),

                        'pa_eo_grading_report_attr'=>array(
                                  'name'=>'pa_eo_grading_report_attr',
                                  'value'=>'AGS',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),        
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'2.0',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_symmertry_attr'=>array(
                                  'name'=>'pa_eo_symmertry_attr',
                                  'value'=>'Very Good',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ), 
                        'pa_eo_table_attr'=>array(
                                  'name'=>'pa_eo_table_attr',
                                  'value'=>'85',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )        
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'85089',
                                'price'=>'85080',
                                'terms'=>array('pa_eo_carat_attr'=>'12','pa_eo_clarity_attr'=>'IF','pa_eo_colour_attr'=>'L','pa_eo_depth_attr'=>'66','pa_eo_fluorescence_attr'=>'Faint','pa_eo_grading_report_attr'=>'AGS','pa_eo_size_attr'=>'2.0','pa_eo_symmertry_attr'=>'Very Good','pa_eo_table_attr'=>'85')
                              )
                       )
            ),
            array(
              'title'=>'Oval Diamond #10000057',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Oval-1.jpg',
              'images'=>array('Oval-2.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_diamond_shape_cat','eo_diamond_oval_shape_cat'),
              'attribute'=>array('pa_eo_carat_attr'=>array(
                                  'name'=>'pa_eo_carat_attr',
                                  'value'=>'2',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_clarity_attr'=>array(
                                  'name'=>'pa_eo_clarity_attr',
                                  'value'=>'VVS1',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_colour_attr'=>array(
                                  'name'=>'pa_eo_colour_attr',
                                  'value'=>'F',
                                  'position'=>2,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_depth_attr'=>array(
                                  'name'=>'pa_eo_depth_attr',
                                  'value'=>'72',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_fluorescence_attr'=>array(
                                  'name'=>'pa_eo_fluorescence_attr',
                                  'value'=>'Faint',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),

                        'pa_eo_grading_report_attr'=>array(
                                  'name'=>'pa_eo_grading_report_attr',
                                  'value'=>'HRD',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),        
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'2.0',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_symmertry_attr'=>array(
                                  'name'=>'pa_eo_symmertry_attr',
                                  'value'=>'Good',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ), 
                        'pa_eo_table_attr'=>array(
                                  'name'=>'pa_eo_table_attr',
                                  'value'=>'80',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )        
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'80089',
                                'price'=>'80080',
                                'terms'=>array('pa_eo_carat_attr'=>'2','pa_eo_clarity_attr'=>'VVS1','pa_eo_colour_attr'=>'F','pa_eo_depth_attr'=>'72','pa_eo_fluorescence_attr'=>'Faint','pa_eo_grading_report_attr'=>'HRD','pa_eo_size_attr'=>'2.0','pa_eo_symmertry_attr'=>'Good','pa_eo_table_attr'=>'80')
                              )
                       )
            ),
            array(
              'title'=>'Radiant Solitaire Diamond #10000058',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Radiant-1.jpg',
              'images'=>array('Radiant-2.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_diamond_shape_cat','eo_diamond_radiant_shape_cat'),
              'attribute'=>array('pa_eo_carat_attr'=>array(
                                  'name'=>'pa_eo_carat_attr',
                                  'value'=>'5',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_clarity_attr'=>array(
                                  'name'=>'pa_eo_clarity_attr',
                                  'value'=>'VVS2',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_colour_attr'=>array(
                                  'name'=>'pa_eo_colour_attr',
                                  'value'=>'G',
                                  'position'=>2,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_depth_attr'=>array(
                                  'name'=>'pa_eo_depth_attr',
                                  'value'=>'75',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_fluorescence_attr'=>array(
                                  'name'=>'pa_eo_fluorescence_attr',
                                  'value'=>'Faint',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),

                        'pa_eo_grading_report_attr'=>array(
                                  'name'=>'pa_eo_grading_report_attr',
                                  'value'=>'HRD',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),        
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'2.0',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_symmertry_attr'=>array(
                                  'name'=>'pa_eo_symmertry_attr',
                                  'value'=>'Good',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ), 
                        'pa_eo_table_attr'=>array(
                                  'name'=>'pa_eo_table_attr',
                                  'value'=>'83',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )        
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'92089',
                                'price'=>'92080',
                                'terms'=>array('pa_eo_carat_attr'=>'5','pa_eo_clarity_attr'=>'VVS2','pa_eo_colour_attr'=>'G','pa_eo_depth_attr'=>'73','pa_eo_fluorescence_attr'=>'Faint','pa_eo_grading_report_attr'=>'HRD','pa_eo_size_attr'=>'2.0','pa_eo_symmertry_attr'=>'Good','pa_eo_table_attr'=>'83')
                              )
                       )
            ),
            array(
              'title'=>'Pear Diamond #10000059',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Pear-1.jpg',
              'images'=>array('Pear-2.jpg','Pear-3.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_diamond_shape_cat','eo_diamond_pear_shape_cat'),
              'attribute'=>array('pa_eo_carat_attr'=>array(
                                  'name'=>'pa_eo_carat_attr',
                                  'value'=>'0.2',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_clarity_attr'=>array(
                                  'name'=>'pa_eo_clarity_attr',
                                  'value'=>'IF',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_colour_attr'=>array(
                                  'name'=>'pa_eo_colour_attr',
                                  'value'=>'E',
                                  'position'=>2,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_depth_attr'=>array(
                                  'name'=>'pa_eo_depth_attr',
                                  'value'=>'48',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_fluorescence_attr'=>array(
                                  'name'=>'pa_eo_fluorescence_attr',
                                  'value'=>'Slight',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),

                        'pa_eo_grading_report_attr'=>array(
                                  'name'=>'pa_eo_grading_report_attr',
                                  'value'=>'GIA',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),        
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'0.2',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_symmertry_attr'=>array(
                                  'name'=>'pa_eo_symmertry_attr',
                                  'value'=>'Good',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ), 
                        'pa_eo_table_attr'=>array(
                                  'name'=>'pa_eo_table_attr',
                                  'value'=>'75',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )        
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'5500',
                                'price'=>'5399',
                                'terms'=>array('pa_eo_carat_attr'=>'0.2','pa_eo_clarity_attr'=>'IF','pa_eo_colour_attr'=>'E','pa_eo_depth_attr'=>'48','pa_eo_fluorescence_attr'=>'Slight','pa_eo_grading_report_attr'=>'GIA','pa_eo_size_attr'=>'0.2','pa_eo_symmertry_attr'=>'Good','pa_eo_table_attr'=>'75')
                              )
                       )
            ),

            //d-copy-2

            array(
              'title'=>'Round Diamond #10000060',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Round-4.jpg',
              'images'=>array('Round-5.jpg','Round-1.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_diamond_shape_cat','eo_diamond_round_shape_cat'),
              'attribute'=>array('pa_eo_carat_attr'=>array(
                                  'name'=>'pa_eo_carat_attr',
                                  'value'=>'0.5',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_clarity_attr'=>array(
                                  'name'=>'pa_eo_clarity_attr',
                                  'value'=>'IF',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_colour_attr'=>array(
                                  'name'=>'pa_eo_colour_attr',
                                  'value'=>'D',
                                  'position'=>2,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_depth_attr'=>array(
                                  'name'=>'pa_eo_depth_attr',
                                  'value'=>'78',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_fluorescence_attr'=>array(
                                  'name'=>'pa_eo_fluorescence_attr',
                                  'value'=>'Slight',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),

                        'pa_eo_grading_report_attr'=>array(
                                  'name'=>'pa_eo_grading_report_attr',
                                  'value'=>'IGI',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),        
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'4.0',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_symmertry_attr'=>array(
                                  'name'=>'pa_eo_symmertry_attr',
                                  'value'=>'Fair',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_table_attr'=>array(
                                  'name'=>'pa_eo_table_attr',
                                  'value'=>'56',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )        
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'15691',
                                'price'=>'15500',
                                'terms'=>array('pa_eo_carat_attr'=>'0.5','pa_eo_clarity_attr'=>'IF','pa_eo_colour_attr'=>'D','pa_eo_depth_attr'=>'78','pa_eo_fluorescence_attr'=>'Slight','pa_eo_grading_report_attr'=>'IGI','pa_eo_size_attr'=>'4.0','pa_eo_symmertry_attr'=>'Fair','pa_eo_table_attr'=>'56')
                              )
                       )       
            ),
            array(
              'title'=>'Emerald Diamond #10000061',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Emerald-1.jpg',
              'images'=>array('Emerald-2.jpg','Emerald-3.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_diamond_shape_cat','eo_diamond_emerald_shape_cat'),
              'attribute'=>array('pa_eo_carat_attr'=>array(
                                  'name'=>'pa_eo_carat_attr',
                                  'value'=>'0.7',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_clarity_attr'=>array(
                                  'name'=>'pa_eo_clarity_attr',
                                  'value'=>'VVS1',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_colour_attr'=>array(
                                  'name'=>'pa_eo_colour_attr',
                                  'value'=>'G',
                                  'position'=>2,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_depth_attr'=>array(
                                  'name'=>'pa_eo_depth_attr',
                                  'value'=>'72',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_fluorescence_attr'=>array(
                                  'name'=>'pa_eo_fluorescence_attr',
                                  'value'=>'None',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),

                        'pa_eo_grading_report_attr'=>array(
                                  'name'=>'pa_eo_grading_report_attr',
                                  'value'=>'HRD',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),        
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'5.0',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_symmertry_attr'=>array(
                                  'name'=>'pa_eo_symmertry_attr',
                                  'value'=>'Very Good',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ), 
                        'pa_eo_table_attr'=>array(
                                  'name'=>'pa_eo_table_attr',
                                  'value'=>'50',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )        
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'20500',
                                'price'=>'20399',
                                'terms'=>array('pa_eo_carat_attr'=>'0.7','pa_eo_clarity_attr'=>'VVS1','pa_eo_colour_attr'=>'G','pa_eo_depth_attr'=>'72','pa_eo_fluorescence_attr'=>'None','pa_eo_grading_report_attr'=>'HRD','pa_eo_size_attr'=>'5.0','pa_eo_symmertry_attr'=>'Very Good','pa_eo_table_attr'=>'50')
                              )
                       )        
            ),
            array(
              'title'=>'Asscher Diamond #10000062',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/asscher-1.jpg',
              'images'=>array('asscher-2.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_diamond_shape_cat','eo_diamond_asscher_shape_cat'),
              'attribute'=>array('pa_eo_carat_attr'=>array(
                                  'name'=>'pa_eo_carat_attr',
                                  'value'=>'0.4',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_clarity_attr'=>array(
                                  'name'=>'pa_eo_clarity_attr',
                                  'value'=>'IF',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_colour_attr'=>array(
                                  'name'=>'pa_eo_colour_attr',
                                  'value'=>'J',
                                  'position'=>2,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_depth_attr'=>array(
                                  'name'=>'pa_eo_depth_attr',
                                  'value'=>'45',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_fluorescence_attr'=>array(
                                  'name'=>'pa_eo_fluorescence_attr',
                                  'value'=>'Very',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),

                        'pa_eo_grading_report_attr'=>array(
                                  'name'=>'pa_eo_grading_report_attr',
                                  'value'=>'AGS',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),        
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'1.0',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_symmertry_attr'=>array(
                                  'name'=>'pa_eo_symmertry_attr',
                                  'value'=>'Fair',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ), 
                        'pa_eo_table_attr'=>array(
                                  'name'=>'pa_eo_table_attr',
                                  'value'=>'55',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )        
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'12500',
                                'price'=>'11390',
                                'terms'=>array('pa_eo_carat_attr'=>'0.4','pa_eo_clarity_attr'=>'IF','pa_eo_colour_attr'=>'J','pa_eo_depth_attr'=>'45','pa_eo_fluorescence_attr'=>'Very','pa_eo_grading_report_attr'=>'AGS','pa_eo_size_attr'=>'1.0','pa_eo_symmertry_attr'=>'Fair','pa_eo_table_attr'=>'55')
                              )
                       )
            ),
            array(
              'title'=>'PRINCESS DIAMOND #10000063',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Princess-3.jpg',
              'images'=>array('Princess-1.jpg','Princess-2.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_diamond_shape_cat','eo_diamond_princess_shape_cat'),
              'attribute'=>array('pa_eo_carat_attr'=>array(
                                  'name'=>'pa_eo_carat_attr',
                                  'value'=>'5.5',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_clarity_attr'=>array(
                                  'name'=>'pa_eo_clarity_attr',
                                  'value'=>'VS1',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_colour_attr'=>array(
                                  'name'=>'pa_eo_colour_attr',
                                  'value'=>'K',
                                  'position'=>2,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_depth_attr'=>array(
                                  'name'=>'pa_eo_depth_attr',
                                  'value'=>'75',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_fluorescence_attr'=>array(
                                  'name'=>'pa_eo_fluorescence_attr',
                                  'value'=>'None',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),

                        'pa_eo_grading_report_attr'=>array(
                                  'name'=>'pa_eo_grading_report_attr',
                                  'value'=>'GIA',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),        
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'1.2',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_symmertry_attr'=>array(
                                  'name'=>'pa_eo_symmertry_attr',
                                  'value'=>'Slight',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ), 
                        'pa_eo_table_attr'=>array(
                                  'name'=>'pa_eo_table_attr',
                                  'value'=>'80',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )        
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'22500',
                                'price'=>'22390',
                                'terms'=>array('pa_eo_carat_attr'=>'5.5','pa_eo_clarity_attr'=>'VS1','pa_eo_colour_attr'=>'K','pa_eo_depth_attr'=>'75','pa_eo_fluorescence_attr'=>'None','pa_eo_grading_report_attr'=>'GIA','pa_eo_size_attr'=>'1.2','pa_eo_symmertry_attr'=>'Slight','pa_eo_table_attr'=>'80')
                              )
                       ) 
            ),
            array(
              'title'=>'Cusion Diamond #10000064',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Cusion-1.jpg',
              'images'=>array('Cusion-2.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_diamond_shape_cat','eo_diamond_cushion_shape_cat'),
              'attribute'=>array('pa_eo_carat_attr'=>array(
                                  'name'=>'pa_eo_carat_attr',
                                  'value'=>'0.5',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_clarity_attr'=>array(
                                  'name'=>'pa_eo_clarity_attr',
                                  'value'=>'SI1',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_colour_attr'=>array(
                                  'name'=>'pa_eo_colour_attr',
                                  'value'=>'M',
                                  'position'=>2,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_depth_attr'=>array(
                                  'name'=>'pa_eo_depth_attr',
                                  'value'=>'48',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_fluorescence_attr'=>array(
                                  'name'=>'pa_eo_fluorescence_attr',
                                  'value'=>'Faint',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),

                        'pa_eo_grading_report_attr'=>array(
                                  'name'=>'pa_eo_grading_report_attr',
                                  'value'=>'HRD',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),        
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'0.8',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_symmertry_attr'=>array(
                                  'name'=>'pa_eo_symmertry_attr',
                                  'value'=>'Excellent',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_table_attr'=>array(
                                  'name'=>'pa_eo_table_attr',
                                  'value'=>'56',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )        
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'45500',
                                'price'=>'45399',
                                'terms'=>array('pa_eo_carat_attr'=>'0.5','pa_eo_clarity_attr'=>'SI1','pa_eo_colour_attr'=>'M','pa_eo_depth_attr'=>'48','pa_eo_fluorescence_attr'=>'Faint','pa_eo_grading_report_attr'=>'HRD','pa_eo_size_attr'=>'0.8','pa_eo_symmertry_attr'=>'Excellent','pa_eo_table_attr'=>'56')
                              )
                       )
            ),
            array(
              'title'=>'Heart Diamond #10000065',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Heart-1.jpg',
              'images'=>array('Heart-2.jpg','Heart-3.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_diamond_shape_cat','eo_diamond_heart_shape_cat'),
              'attribute'=>array('pa_eo_carat_attr'=>array(
                                  'name'=>'pa_eo_carat_attr',
                                  'value'=>'0.9',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_clarity_attr'=>array(
                                  'name'=>'pa_eo_clarity_attr',
                                  'value'=>'IF',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_colour_attr'=>array(
                                  'name'=>'pa_eo_colour_attr',
                                  'value'=>'D',
                                  'position'=>2,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_depth_attr'=>array(
                                  'name'=>'pa_eo_depth_attr',
                                  'value'=>'67',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_fluorescence_attr'=>array(
                                  'name'=>'pa_eo_fluorescence_attr',
                                  'value'=>'None',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),

                        'pa_eo_grading_report_attr'=>array(
                                  'name'=>'pa_eo_grading_report_attr',
                                  'value'=>'IGI',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),        
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'1.1',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_symmertry_attr'=>array(
                                  'name'=>'pa_eo_symmertry_attr',
                                  'value'=>'Excellent',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_table_attr'=>array(
                                  'name'=>'pa_eo_table_attr',
                                  'value'=>'77',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )        
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'7500',
                                'price'=>'7399',
                                'terms'=>array('pa_eo_carat_attr'=>'0.9','pa_eo_clarity_attr'=>'IF','pa_eo_colour_attr'=>'D','pa_eo_depth_attr'=>'67','pa_eo_fluorescence_attr'=>'None','pa_eo_grading_report_attr'=>'IGI','pa_eo_size_attr'=>'1.1','pa_eo_symmertry_attr'=>'Excellent','pa_eo_table_attr'=>'77')
                              )
                       )
            ),
            array(
              'title'=>'Marquise Diamond #10000066',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Marquise-1.jpg',
              'images'=>array('Marquise-2.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_diamond_shape_cat','eo_diamond_marquise_shape_cat'),
              'attribute'=>array('pa_eo_carat_attr'=>array(
                                  'name'=>'pa_eo_carat_attr',
                                  'value'=>'12',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_clarity_attr'=>array(
                                  'name'=>'pa_eo_clarity_attr',
                                  'value'=>'IF',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_colour_attr'=>array(
                                  'name'=>'pa_eo_colour_attr',
                                  'value'=>'L',
                                  'position'=>2,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_depth_attr'=>array(
                                  'name'=>'pa_eo_depth_attr',
                                  'value'=>'66',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_fluorescence_attr'=>array(
                                  'name'=>'pa_eo_fluorescence_attr',
                                  'value'=>'Faint',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),

                        'pa_eo_grading_report_attr'=>array(
                                  'name'=>'pa_eo_grading_report_attr',
                                  'value'=>'AGS',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),        
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'2.0',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_symmertry_attr'=>array(
                                  'name'=>'pa_eo_symmertry_attr',
                                  'value'=>'Very Good',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ), 
                        'pa_eo_table_attr'=>array(
                                  'name'=>'pa_eo_table_attr',
                                  'value'=>'85',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )        
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'85089',
                                'price'=>'85080',
                                'terms'=>array('pa_eo_carat_attr'=>'12','pa_eo_clarity_attr'=>'IF','pa_eo_colour_attr'=>'L','pa_eo_depth_attr'=>'66','pa_eo_fluorescence_attr'=>'Faint','pa_eo_grading_report_attr'=>'AGS','pa_eo_size_attr'=>'2.0','pa_eo_symmertry_attr'=>'Very Good','pa_eo_table_attr'=>'85')
                              )
                       )
            ),
            array(
              'title'=>'Oval Diamond #10000067',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Oval-1.jpg',
              'images'=>array('Oval-2.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_diamond_shape_cat','eo_diamond_oval_shape_cat'),
              'attribute'=>array('pa_eo_carat_attr'=>array(
                                  'name'=>'pa_eo_carat_attr',
                                  'value'=>'2',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_clarity_attr'=>array(
                                  'name'=>'pa_eo_clarity_attr',
                                  'value'=>'VVS1',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_colour_attr'=>array(
                                  'name'=>'pa_eo_colour_attr',
                                  'value'=>'F',
                                  'position'=>2,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_depth_attr'=>array(
                                  'name'=>'pa_eo_depth_attr',
                                  'value'=>'72',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_fluorescence_attr'=>array(
                                  'name'=>'pa_eo_fluorescence_attr',
                                  'value'=>'Faint',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),

                        'pa_eo_grading_report_attr'=>array(
                                  'name'=>'pa_eo_grading_report_attr',
                                  'value'=>'HRD',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),        
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'2.0',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_symmertry_attr'=>array(
                                  'name'=>'pa_eo_symmertry_attr',
                                  'value'=>'Good',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_table_attr'=>array(
                                  'name'=>'pa_eo_table_attr',
                                  'value'=>'80',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )        
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'80089',
                                'price'=>'80080',
                                'terms'=>array('pa_eo_carat_attr'=>'2','pa_eo_clarity_attr'=>'VVS1','pa_eo_colour_attr'=>'F','pa_eo_depth_attr'=>'72','pa_eo_fluorescence_attr'=>'Faint','pa_eo_grading_report_attr'=>'HRD','pa_eo_size_attr'=>'2.0','pa_eo_symmertry_attr'=>'Good','pa_eo_table_attr'=>'80')
                              )
                       )
            ),
            array(
              'title'=>'Radiant Solitaire Diamond #10000068',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Radiant-1.jpg',
              'images'=>array('Radiant-2.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_diamond_shape_cat','eo_diamond_radiant_shape_cat'),
              'attribute'=>array('pa_eo_carat_attr'=>array(
                                  'name'=>'pa_eo_carat_attr',
                                  'value'=>'5',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_clarity_attr'=>array(
                                  'name'=>'pa_eo_clarity_attr',
                                  'value'=>'VVS2',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_colour_attr'=>array(
                                  'name'=>'pa_eo_colour_attr',
                                  'value'=>'G',
                                  'position'=>2,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_depth_attr'=>array(
                                  'name'=>'pa_eo_depth_attr',
                                  'value'=>'75',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_fluorescence_attr'=>array(
                                  'name'=>'pa_eo_fluorescence_attr',
                                  'value'=>'Faint',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),

                        'pa_eo_grading_report_attr'=>array(
                                  'name'=>'pa_eo_grading_report_attr',
                                  'value'=>'HRD',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),        
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'2.0',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_symmertry_attr'=>array(
                                  'name'=>'pa_eo_symmertry_attr',
                                  'value'=>'Good',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_table_attr'=>array(
                                  'name'=>'pa_eo_table_attr',
                                  'value'=>'83',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )        
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'92089',
                                'price'=>'92080',
                                'terms'=>array('pa_eo_carat_attr'=>'5','pa_eo_clarity_attr'=>'VVS2','pa_eo_colour_attr'=>'G','pa_eo_depth_attr'=>'73','pa_eo_fluorescence_attr'=>'Faint','pa_eo_grading_report_attr'=>'HRD','pa_eo_size_attr'=>'2.0','pa_eo_symmertry_attr'=>'Good','pa_eo_table_attr'=>'83')
                              )
                       )
            ),
            array(
              'title'=>'Pear Diamond #10000069',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Pear-1.jpg',
              'images'=>array('Pear-2.jpg','Pear-3.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_diamond_shape_cat','eo_diamond_pear_shape_cat'),
              'attribute'=>array('pa_eo_carat_attr'=>array(
                                  'name'=>'pa_eo_carat_attr',
                                  'value'=>'0.2',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_clarity_attr'=>array(
                                  'name'=>'pa_eo_clarity_attr',
                                  'value'=>'IF',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_colour_attr'=>array(
                                  'name'=>'pa_eo_colour_attr',
                                  'value'=>'E',
                                  'position'=>2,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_depth_attr'=>array(
                                  'name'=>'pa_eo_depth_attr',
                                  'value'=>'48',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_fluorescence_attr'=>array(
                                  'name'=>'pa_eo_fluorescence_attr',
                                  'value'=>'Slight',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),

                        'pa_eo_grading_report_attr'=>array(
                                  'name'=>'pa_eo_grading_report_attr',
                                  'value'=>'GIA',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),        
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'0.2',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_symmertry_attr'=>array(
                                  'name'=>'pa_eo_symmertry_attr',
                                  'value'=>'Good',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_table_attr'=>array(
                                  'name'=>'pa_eo_table_attr',
                                  'value'=>'75',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )        
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'5500',
                                'price'=>'5399',
                                'terms'=>array('pa_eo_carat_attr'=>'0.2','pa_eo_clarity_attr'=>'IF','pa_eo_colour_attr'=>'E','pa_eo_depth_attr'=>'48','pa_eo_fluorescence_attr'=>'Slight','pa_eo_grading_report_attr'=>'GIA','pa_eo_size_attr'=>'0.2','pa_eo_symmertry_attr'=>'Good','pa_eo_table_attr'=>'75')
                              )
                       )
            ),

            //d-copy-3

            array(
              'title'=>'Round Diamond #10000070',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Round-4.jpg',
              'images'=>array('Round-5.jpg','Round-1.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_diamond_shape_cat','eo_diamond_round_shape_cat'),
              'attribute'=>array('pa_eo_carat_attr'=>array(
                                  'name'=>'pa_eo_carat_attr',
                                  'value'=>'0.5',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_clarity_attr'=>array(
                                  'name'=>'pa_eo_clarity_attr',
                                  'value'=>'IF',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_colour_attr'=>array(
                                  'name'=>'pa_eo_colour_attr',
                                  'value'=>'D',
                                  'position'=>2,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_depth_attr'=>array(
                                  'name'=>'pa_eo_depth_attr',
                                  'value'=>'78',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_fluorescence_attr'=>array(
                                  'name'=>'pa_eo_fluorescence_attr',
                                  'value'=>'Slight',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),

                        'pa_eo_grading_report_attr'=>array(
                                  'name'=>'pa_eo_grading_report_attr',
                                  'value'=>'IGI',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),        
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'4.0',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_symmertry_attr'=>array(
                                  'name'=>'pa_eo_symmertry_attr',
                                  'value'=>'Fair',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_table_attr'=>array(
                                  'name'=>'pa_eo_table_attr',
                                  'value'=>'56',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )        
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'15691',
                                'price'=>'15500',
                                'terms'=>array('pa_eo_carat_attr'=>'0.5','pa_eo_clarity_attr'=>'IF','pa_eo_colour_attr'=>'D','pa_eo_depth_attr'=>'78','pa_eo_fluorescence_attr'=>'Slight','pa_eo_grading_report_attr'=>'IGI','pa_eo_size_attr'=>'4.0','pa_eo_symmertry_attr'=>'Fair','pa_eo_table_attr'=>'56')
                              )
                       )       
            ),
            array(
              'title'=>'Emerald Diamond #10000071',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Emerald-1.jpg',
              'images'=>array('Emerald-2.jpg','Emerald-3.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_diamond_shape_cat','eo_diamond_emerald_shape_cat'),
              'attribute'=>array('pa_eo_carat_attr'=>array(
                                  'name'=>'pa_eo_carat_attr',
                                  'value'=>'0.7',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_clarity_attr'=>array(
                                  'name'=>'pa_eo_clarity_attr',
                                  'value'=>'VVS1',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_colour_attr'=>array(
                                  'name'=>'pa_eo_colour_attr',
                                  'value'=>'G',
                                  'position'=>2,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_depth_attr'=>array(
                                  'name'=>'pa_eo_depth_attr',
                                  'value'=>'72',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_fluorescence_attr'=>array(
                                  'name'=>'pa_eo_fluorescence_attr',
                                  'value'=>'None',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),

                        'pa_eo_grading_report_attr'=>array(
                                  'name'=>'pa_eo_grading_report_attr',
                                  'value'=>'HRD',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),        
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'5.0',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_symmertry_attr'=>array(
                                  'name'=>'pa_eo_symmertry_attr',
                                  'value'=>'Very Good',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_table_attr'=>array(
                                  'name'=>'pa_eo_table_attr',
                                  'value'=>'50',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )        
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'20500',
                                'price'=>'20399',
                                'terms'=>array('pa_eo_carat_attr'=>'0.7','pa_eo_clarity_attr'=>'VVS1','pa_eo_colour_attr'=>'G','pa_eo_depth_attr'=>'72','pa_eo_fluorescence_attr'=>'None','pa_eo_grading_report_attr'=>'HRD','pa_eo_size_attr'=>'5.0','pa_eo_symmertry_attr'=>'Very Good','pa_eo_table_attr'=>'50')
                              )
                       )        
            ),
            array(
              'title'=>'Asscher Diamond #10000072',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/asscher-1.jpg',
              'images'=>array('asscher-2.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_diamond_shape_cat','eo_diamond_asscher_shape_cat'),
              'attribute'=>array('pa_eo_carat_attr'=>array(
                                  'name'=>'pa_eo_carat_attr',
                                  'value'=>'0.4',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_clarity_attr'=>array(
                                  'name'=>'pa_eo_clarity_attr',
                                  'value'=>'IF',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_colour_attr'=>array(
                                  'name'=>'pa_eo_colour_attr',
                                  'value'=>'J',
                                  'position'=>2,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_depth_attr'=>array(
                                  'name'=>'pa_eo_depth_attr',
                                  'value'=>'45',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_fluorescence_attr'=>array(
                                  'name'=>'pa_eo_fluorescence_attr',
                                  'value'=>'Very',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),

                        'pa_eo_grading_report_attr'=>array(
                                  'name'=>'pa_eo_grading_report_attr',
                                  'value'=>'AGS',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),        
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'1.0',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_symmertry_attr'=>array(
                                  'name'=>'pa_eo_symmertry_attr',
                                  'value'=>'Fair',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_table_attr'=>array(
                                  'name'=>'pa_eo_table_attr',
                                  'value'=>'55',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )        
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'12500',
                                'price'=>'11390',
                                'terms'=>array('pa_eo_carat_attr'=>'0.4','pa_eo_clarity_attr'=>'IF','pa_eo_colour_attr'=>'J','pa_eo_depth_attr'=>'45','pa_eo_fluorescence_attr'=>'Very','pa_eo_grading_report_attr'=>'AGS','pa_eo_size_attr'=>'1.0','pa_eo_symmertry_attr'=>'Fair','pa_eo_table_attr'=>'55')
                              )
                       )
            ),
            array(
              'title'=>'PRINCESS DIAMOND #10000073',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Princess-3.jpg',
              'images'=>array('Princess-1.jpg','Princess-2.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_diamond_shape_cat','eo_diamond_princess_shape_cat'),
              'attribute'=>array('pa_eo_carat_attr'=>array(
                                  'name'=>'pa_eo_carat_attr',
                                  'value'=>'5.5',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_clarity_attr'=>array(
                                  'name'=>'pa_eo_clarity_attr',
                                  'value'=>'VS1',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_colour_attr'=>array(
                                  'name'=>'pa_eo_colour_attr',
                                  'value'=>'K',
                                  'position'=>2,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_depth_attr'=>array(
                                  'name'=>'pa_eo_depth_attr',
                                  'value'=>'75',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_fluorescence_attr'=>array(
                                  'name'=>'pa_eo_fluorescence_attr',
                                  'value'=>'None',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),

                        'pa_eo_grading_report_attr'=>array(
                                  'name'=>'pa_eo_grading_report_attr',
                                  'value'=>'GIA',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),        
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'1.2',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_symmertry_attr'=>array(
                                  'name'=>'pa_eo_symmertry_attr',
                                  'value'=>'Slight',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_table_attr'=>array(
                                  'name'=>'pa_eo_table_attr',
                                  'value'=>'80',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )        
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'22500',
                                'price'=>'22390',
                                'terms'=>array('pa_eo_carat_attr'=>'5.5','pa_eo_clarity_attr'=>'VS1','pa_eo_colour_attr'=>'K','pa_eo_depth_attr'=>'75','pa_eo_fluorescence_attr'=>'None','pa_eo_grading_report_attr'=>'GIA','pa_eo_size_attr'=>'1.2','pa_eo_symmertry_attr'=>'Slight','pa_eo_table_attr'=>'80')
                              )
                       ) 
            ),
            array(
              'title'=>'Cusion Diamond #10000074',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Cusion-1.jpg',
              'images'=>array('Cusion-2.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_diamond_shape_cat','eo_diamond_cushion_shape_cat'),
              'attribute'=>array('pa_eo_carat_attr'=>array(
                                  'name'=>'pa_eo_carat_attr',
                                  'value'=>'0.5',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_clarity_attr'=>array(
                                  'name'=>'pa_eo_clarity_attr',
                                  'value'=>'SI1',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_colour_attr'=>array(
                                  'name'=>'pa_eo_colour_attr',
                                  'value'=>'M',
                                  'position'=>2,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_depth_attr'=>array(
                                  'name'=>'pa_eo_depth_attr',
                                  'value'=>'48',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_fluorescence_attr'=>array(
                                  'name'=>'pa_eo_fluorescence_attr',
                                  'value'=>'Faint',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),

                        'pa_eo_grading_report_attr'=>array(
                                  'name'=>'pa_eo_grading_report_attr',
                                  'value'=>'HRD',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),        
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'0.8',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_symmertry_attr'=>array(
                                  'name'=>'pa_eo_symmertry_attr',
                                  'value'=>'Excellent',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ), 
                        'pa_eo_table_attr'=>array(
                                  'name'=>'pa_eo_table_attr',
                                  'value'=>'56',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )        
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'45500',
                                'price'=>'45399',
                                'terms'=>array('pa_eo_carat_attr'=>'0.5','pa_eo_clarity_attr'=>'SI1','pa_eo_colour_attr'=>'M','pa_eo_depth_attr'=>'48','pa_eo_fluorescence_attr'=>'Faint','pa_eo_grading_report_attr'=>'HRD','pa_eo_size_attr'=>'0.8','pa_eo_symmertry_attr'=>'Excellent','pa_eo_table_attr'=>'56')
                              )
                       )
            ),
            array(
              'title'=>'Heart Diamond #10000075',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Heart-1.jpg',
              'images'=>array('Heart-2.jpg','Heart-3.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_diamond_shape_cat','eo_diamond_heart_shape_cat'),
              'attribute'=>array('pa_eo_carat_attr'=>array(
                                  'name'=>'pa_eo_carat_attr',
                                  'value'=>'0.9',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_clarity_attr'=>array(
                                  'name'=>'pa_eo_clarity_attr',
                                  'value'=>'IF',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_colour_attr'=>array(
                                  'name'=>'pa_eo_colour_attr',
                                  'value'=>'D',
                                  'position'=>2,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_depth_attr'=>array(
                                  'name'=>'pa_eo_depth_attr',
                                  'value'=>'67',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_fluorescence_attr'=>array(
                                  'name'=>'pa_eo_fluorescence_attr',
                                  'value'=>'None',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),

                        'pa_eo_grading_report_attr'=>array(
                                  'name'=>'pa_eo_grading_report_attr',
                                  'value'=>'IGI',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),        
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'1.1',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_symmertry_attr'=>array(
                                  'name'=>'pa_eo_symmertry_attr',
                                  'value'=>'Excellent',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_table_attr'=>array(
                                  'name'=>'pa_eo_table_attr',
                                  'value'=>'77',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )        
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'7500',
                                'price'=>'7399',
                                'terms'=>array('pa_eo_carat_attr'=>'0.9','pa_eo_clarity_attr'=>'IF','pa_eo_colour_attr'=>'D','pa_eo_depth_attr'=>'67','pa_eo_fluorescence_attr'=>'None','pa_eo_grading_report_attr'=>'IGI','pa_eo_size_attr'=>'1.1','pa_eo_symmertry_attr'=>'Excellent','pa_eo_table_attr'=>'77')
                              )
                       )
            ),
            array(
              'title'=>'Marquise Diamond #10000076',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Marquise-1.jpg',
              'images'=>array('Marquise-2.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_diamond_shape_cat','eo_diamond_marquise_shape_cat'),
              'attribute'=>array('pa_eo_carat_attr'=>array(
                                  'name'=>'pa_eo_carat_attr',
                                  'value'=>'12',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_clarity_attr'=>array(
                                  'name'=>'pa_eo_clarity_attr',
                                  'value'=>'IF',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_colour_attr'=>array(
                                  'name'=>'pa_eo_colour_attr',
                                  'value'=>'L',
                                  'position'=>2,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_depth_attr'=>array(
                                  'name'=>'pa_eo_depth_attr',
                                  'value'=>'66',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_fluorescence_attr'=>array(
                                  'name'=>'pa_eo_fluorescence_attr',
                                  'value'=>'Faint',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),

                        'pa_eo_grading_report_attr'=>array(
                                  'name'=>'pa_eo_grading_report_attr',
                                  'value'=>'AGS',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),        
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'2.0',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_symmertry_attr'=>array(
                                  'name'=>'pa_eo_symmertry_attr',
                                  'value'=>'Very Good',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ), 
                        'pa_eo_table_attr'=>array(
                                  'name'=>'pa_eo_table_attr',
                                  'value'=>'85',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )        
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'85089',
                                'price'=>'85080',
                                'terms'=>array('pa_eo_carat_attr'=>'12','pa_eo_clarity_attr'=>'IF','pa_eo_colour_attr'=>'L','pa_eo_depth_attr'=>'66','pa_eo_fluorescence_attr'=>'Faint','pa_eo_grading_report_attr'=>'AGS','pa_eo_size_attr'=>'2.0','pa_eo_symmertry_attr'=>'Very Good','pa_eo_table_attr'=>'85')
                              )
                       )
            ),
            array(
              'title'=>'Oval Diamond #10000077',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Oval-1.jpg',
              'images'=>array('Oval-2.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_diamond_shape_cat','eo_diamond_oval_shape_cat'),
              'attribute'=>array('pa_eo_carat_attr'=>array(
                                  'name'=>'pa_eo_carat_attr',
                                  'value'=>'2',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_clarity_attr'=>array(
                                  'name'=>'pa_eo_clarity_attr',
                                  'value'=>'VVS1',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_colour_attr'=>array(
                                  'name'=>'pa_eo_colour_attr',
                                  'value'=>'F',
                                  'position'=>2,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_depth_attr'=>array(
                                  'name'=>'pa_eo_depth_attr',
                                  'value'=>'72',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_fluorescence_attr'=>array(
                                  'name'=>'pa_eo_fluorescence_attr',
                                  'value'=>'Faint',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),

                        'pa_eo_grading_report_attr'=>array(
                                  'name'=>'pa_eo_grading_report_attr',
                                  'value'=>'HRD',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),        
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'2.0',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_symmertry_attr'=>array(
                                  'name'=>'pa_eo_symmertry_attr',
                                  'value'=>'Good',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ), 
                        'pa_eo_table_attr'=>array(
                                  'name'=>'pa_eo_table_attr',
                                  'value'=>'80',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )        
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'80089',
                                'price'=>'80080',
                                'terms'=>array('pa_eo_carat_attr'=>'2','pa_eo_clarity_attr'=>'VVS1','pa_eo_colour_attr'=>'F','pa_eo_depth_attr'=>'72','pa_eo_fluorescence_attr'=>'Faint','pa_eo_grading_report_attr'=>'HRD','pa_eo_size_attr'=>'2.0','pa_eo_symmertry_attr'=>'Good','pa_eo_table_attr'=>'80')
                              )
                       )
            ),
            array(
              'title'=>'Radiant Solitaire Diamond #10000078',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Radiant-1.jpg',
              'images'=>array('Radiant-2.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_diamond_shape_cat','eo_diamond_radiant_shape_cat'),
              'attribute'=>array('pa_eo_carat_attr'=>array(
                                  'name'=>'pa_eo_carat_attr',
                                  'value'=>'5',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_clarity_attr'=>array(
                                  'name'=>'pa_eo_clarity_attr',
                                  'value'=>'VVS2',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_colour_attr'=>array(
                                  'name'=>'pa_eo_colour_attr',
                                  'value'=>'G',
                                  'position'=>2,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_depth_attr'=>array(
                                  'name'=>'pa_eo_depth_attr',
                                  'value'=>'75',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_fluorescence_attr'=>array(
                                  'name'=>'pa_eo_fluorescence_attr',
                                  'value'=>'Faint',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),

                        'pa_eo_grading_report_attr'=>array(
                                  'name'=>'pa_eo_grading_report_attr',
                                  'value'=>'HRD',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),        
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'2.0',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_symmertry_attr'=>array(
                                  'name'=>'pa_eo_symmertry_attr',
                                  'value'=>'Good',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ), 
                        'pa_eo_table_attr'=>array(
                                  'name'=>'pa_eo_table_attr',
                                  'value'=>'83',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )        
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'92089',
                                'price'=>'92080',
                                'terms'=>array('pa_eo_carat_attr'=>'5','pa_eo_clarity_attr'=>'VVS2','pa_eo_colour_attr'=>'G','pa_eo_depth_attr'=>'73','pa_eo_fluorescence_attr'=>'Faint','pa_eo_grading_report_attr'=>'HRD','pa_eo_size_attr'=>'2.0','pa_eo_symmertry_attr'=>'Good','pa_eo_table_attr'=>'83')
                              )
                       )
            ),
            array(
              'title'=>'Pear Diamond #10000079',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Pear-1.jpg',
              'images'=>array('Pear-2.jpg','Pear-3.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_diamond_shape_cat','eo_diamond_pear_shape_cat'),
              'attribute'=>array('pa_eo_carat_attr'=>array(
                                  'name'=>'pa_eo_carat_attr',
                                  'value'=>'0.2',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_clarity_attr'=>array(
                                  'name'=>'pa_eo_clarity_attr',
                                  'value'=>'IF',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_colour_attr'=>array(
                                  'name'=>'pa_eo_colour_attr',
                                  'value'=>'E',
                                  'position'=>2,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_depth_attr'=>array(
                                  'name'=>'pa_eo_depth_attr',
                                  'value'=>'48',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_fluorescence_attr'=>array(
                                  'name'=>'pa_eo_fluorescence_attr',
                                  'value'=>'Slight',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),

                        'pa_eo_grading_report_attr'=>array(
                                  'name'=>'pa_eo_grading_report_attr',
                                  'value'=>'GIA',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),        
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'0.2',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_symmertry_attr'=>array(
                                  'name'=>'pa_eo_symmertry_attr',
                                  'value'=>'Good',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ), 
                        'pa_eo_table_attr'=>array(
                                  'name'=>'pa_eo_table_attr',
                                  'value'=>'75',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )        
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'5500',
                                'price'=>'5399',
                                'terms'=>array('pa_eo_carat_attr'=>'0.2','pa_eo_clarity_attr'=>'IF','pa_eo_colour_attr'=>'E','pa_eo_depth_attr'=>'48','pa_eo_fluorescence_attr'=>'Slight','pa_eo_grading_report_attr'=>'GIA','pa_eo_size_attr'=>'0.2','pa_eo_symmertry_attr'=>'Good','pa_eo_table_attr'=>'75')
                              )
                       )
            ),

            //d-copy-4

            array(
              'title'=>'Round Diamond #10000080',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Round-4.jpg',
              'images'=>array('Round-5.jpg','Round-1.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_diamond_shape_cat','eo_diamond_round_shape_cat'),
              'attribute'=>array('pa_eo_carat_attr'=>array(
                                  'name'=>'pa_eo_carat_attr',
                                  'value'=>'0.5',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_clarity_attr'=>array(
                                  'name'=>'pa_eo_clarity_attr',
                                  'value'=>'IF',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_colour_attr'=>array(
                                  'name'=>'pa_eo_colour_attr',
                                  'value'=>'D',
                                  'position'=>2,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_depth_attr'=>array(
                                  'name'=>'pa_eo_depth_attr',
                                  'value'=>'78',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_fluorescence_attr'=>array(
                                  'name'=>'pa_eo_fluorescence_attr',
                                  'value'=>'Slight',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),

                        'pa_eo_grading_report_attr'=>array(
                                  'name'=>'pa_eo_grading_report_attr',
                                  'value'=>'IGI',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),        
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'4.0',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_symmertry_attr'=>array(
                                  'name'=>'pa_eo_symmertry_attr',
                                  'value'=>'Fair',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ), 
                        'pa_eo_table_attr'=>array(
                                  'name'=>'pa_eo_table_attr',
                                  'value'=>'56',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )        
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'15691',
                                'price'=>'15500',
                                'terms'=>array('pa_eo_carat_attr'=>'0.5','pa_eo_clarity_attr'=>'IF','pa_eo_colour_attr'=>'D','pa_eo_depth_attr'=>'78','pa_eo_fluorescence_attr'=>'Slight','pa_eo_grading_report_attr'=>'IGI','pa_eo_size_attr'=>'4.0','pa_eo_symmertry_attr'=>'Fair','pa_eo_table_attr'=>'56')
                              )
                       )       
            ),
            array(
              'title'=>'Emerald Diamond #10000081',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Emerald-1.jpg',
              'images'=>array('Emerald-2.jpg','Emerald-3.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_diamond_shape_cat','eo_diamond_emerald_shape_cat'),
              'attribute'=>array('pa_eo_carat_attr'=>array(
                                  'name'=>'pa_eo_carat_attr',
                                  'value'=>'0.7',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_clarity_attr'=>array(
                                  'name'=>'pa_eo_clarity_attr',
                                  'value'=>'VVS1',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_colour_attr'=>array(
                                  'name'=>'pa_eo_colour_attr',
                                  'value'=>'G',
                                  'position'=>2,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_depth_attr'=>array(
                                  'name'=>'pa_eo_depth_attr',
                                  'value'=>'72',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_fluorescence_attr'=>array(
                                  'name'=>'pa_eo_fluorescence_attr',
                                  'value'=>'None',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),

                        'pa_eo_grading_report_attr'=>array(
                                  'name'=>'pa_eo_grading_report_attr',
                                  'value'=>'HRD',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),        
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'5.0',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_symmertry_attr'=>array(
                                  'name'=>'pa_eo_symmertry_attr',
                                  'value'=>'Very Good',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ), 
                        'pa_eo_table_attr'=>array(
                                  'name'=>'pa_eo_table_attr',
                                  'value'=>'50',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )        
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'20500',
                                'price'=>'20399',
                                'terms'=>array('pa_eo_carat_attr'=>'0.7','pa_eo_clarity_attr'=>'VVS1','pa_eo_colour_attr'=>'G','pa_eo_depth_attr'=>'72','pa_eo_fluorescence_attr'=>'None','pa_eo_grading_report_attr'=>'HRD','pa_eo_size_attr'=>'5.0','pa_eo_symmertry_attr'=>'Very Good','pa_eo_table_attr'=>'50')
                              )
                       )        
            ),
            array(
              'title'=>'Asscher Diamond #10000082',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/asscher-1.jpg',
              'images'=>array('asscher-2.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_diamond_shape_cat','eo_diamond_asscher_shape_cat'),
              'attribute'=>array('pa_eo_carat_attr'=>array(
                                  'name'=>'pa_eo_carat_attr',
                                  'value'=>'0.4',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_clarity_attr'=>array(
                                  'name'=>'pa_eo_clarity_attr',
                                  'value'=>'IF',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_colour_attr'=>array(
                                  'name'=>'pa_eo_colour_attr',
                                  'value'=>'J',
                                  'position'=>2,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_depth_attr'=>array(
                                  'name'=>'pa_eo_depth_attr',
                                  'value'=>'45',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_fluorescence_attr'=>array(
                                  'name'=>'pa_eo_fluorescence_attr',
                                  'value'=>'Very',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),

                        'pa_eo_grading_report_attr'=>array(
                                  'name'=>'pa_eo_grading_report_attr',
                                  'value'=>'AGS',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),        
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'1.0',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_symmertry_attr'=>array(
                                  'name'=>'pa_eo_symmertry_attr',
                                  'value'=>'Fair',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ), 
                        'pa_eo_table_attr'=>array(
                                  'name'=>'pa_eo_table_attr',
                                  'value'=>'55',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )        
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'12500',
                                'price'=>'11390',
                                'terms'=>array('pa_eo_carat_attr'=>'0.4','pa_eo_clarity_attr'=>'IF','pa_eo_colour_attr'=>'J','pa_eo_depth_attr'=>'45','pa_eo_fluorescence_attr'=>'Very','pa_eo_grading_report_attr'=>'AGS','pa_eo_size_attr'=>'1.0','pa_eo_symmertry_attr'=>'Fair','pa_eo_table_attr'=>'55')
                              )
                       )
            ),
            array(
              'title'=>'PRINCESS DIAMOND #10000083',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Princess-3.jpg',
              'images'=>array('Princess-1.jpg','Princess-2.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_diamond_shape_cat','eo_diamond_princess_shape_cat'),
              'attribute'=>array('pa_eo_carat_attr'=>array(
                                  'name'=>'pa_eo_carat_attr',
                                  'value'=>'5.5',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_clarity_attr'=>array(
                                  'name'=>'pa_eo_clarity_attr',
                                  'value'=>'VS1',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_colour_attr'=>array(
                                  'name'=>'pa_eo_colour_attr',
                                  'value'=>'K',
                                  'position'=>2,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_depth_attr'=>array(
                                  'name'=>'pa_eo_depth_attr',
                                  'value'=>'75',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_fluorescence_attr'=>array(
                                  'name'=>'pa_eo_fluorescence_attr',
                                  'value'=>'None',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),

                        'pa_eo_grading_report_attr'=>array(
                                  'name'=>'pa_eo_grading_report_attr',
                                  'value'=>'GIA',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),        
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'1.2',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_symmertry_attr'=>array(
                                  'name'=>'pa_eo_symmertry_attr',
                                  'value'=>'Slight',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ), 
                        'pa_eo_table_attr'=>array(
                                  'name'=>'pa_eo_table_attr',
                                  'value'=>'80',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )        
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'22500',
                                'price'=>'22390',
                                'terms'=>array('pa_eo_carat_attr'=>'5.5','pa_eo_clarity_attr'=>'VS1','pa_eo_colour_attr'=>'K','pa_eo_depth_attr'=>'75','pa_eo_fluorescence_attr'=>'None','pa_eo_grading_report_attr'=>'GIA','pa_eo_size_attr'=>'1.2','pa_eo_symmertry_attr'=>'Slight','pa_eo_table_attr'=>'80')
                              )
                       ) 
            ),
            array(
              'title'=>'Cusion Diamond #10000084',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Cusion-1.jpg',
              'images'=>array('Cusion-2.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_diamond_shape_cat','eo_diamond_cushion_shape_cat'),
              'attribute'=>array('pa_eo_carat_attr'=>array(
                                  'name'=>'pa_eo_carat_attr',
                                  'value'=>'0.5',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_clarity_attr'=>array(
                                  'name'=>'pa_eo_clarity_attr',
                                  'value'=>'SI1',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_colour_attr'=>array(
                                  'name'=>'pa_eo_colour_attr',
                                  'value'=>'M',
                                  'position'=>2,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_depth_attr'=>array(
                                  'name'=>'pa_eo_depth_attr',
                                  'value'=>'48',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_fluorescence_attr'=>array(
                                  'name'=>'pa_eo_fluorescence_attr',
                                  'value'=>'Faint',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),

                        'pa_eo_grading_report_attr'=>array(
                                  'name'=>'pa_eo_grading_report_attr',
                                  'value'=>'HRD',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),        
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'0.8',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_symmertry_attr'=>array(
                                  'name'=>'pa_eo_symmertry_attr',
                                  'value'=>'Excellent',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_table_attr'=>array(
                                  'name'=>'pa_eo_table_attr',
                                  'value'=>'56',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )        
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'45500',
                                'price'=>'45399',
                                'terms'=>array('pa_eo_carat_attr'=>'0.5','pa_eo_clarity_attr'=>'SI1','pa_eo_colour_attr'=>'M','pa_eo_depth_attr'=>'48','pa_eo_fluorescence_attr'=>'Faint','pa_eo_grading_report_attr'=>'HRD','pa_eo_size_attr'=>'0.8','pa_eo_symmertry_attr'=>'Excellent','pa_eo_table_attr'=>'56')
                              )
                       )
            ),
            array(
              'title'=>'Heart Diamond #10000085',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Heart-1.jpg',
              'images'=>array('Heart-2.jpg','Heart-3.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_diamond_shape_cat','eo_diamond_heart_shape_cat'),
              'attribute'=>array('pa_eo_carat_attr'=>array(
                                  'name'=>'pa_eo_carat_attr',
                                  'value'=>'0.9',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_clarity_attr'=>array(
                                  'name'=>'pa_eo_clarity_attr',
                                  'value'=>'IF',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_colour_attr'=>array(
                                  'name'=>'pa_eo_colour_attr',
                                  'value'=>'D',
                                  'position'=>2,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_depth_attr'=>array(
                                  'name'=>'pa_eo_depth_attr',
                                  'value'=>'67',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_fluorescence_attr'=>array(
                                  'name'=>'pa_eo_fluorescence_attr',
                                  'value'=>'None',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),

                        'pa_eo_grading_report_attr'=>array(
                                  'name'=>'pa_eo_grading_report_attr',
                                  'value'=>'IGI',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),        
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'1.1',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_symmertry_attr'=>array(
                                  'name'=>'pa_eo_symmertry_attr',
                                  'value'=>'Excellent',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_table_attr'=>array(
                                  'name'=>'pa_eo_table_attr',
                                  'value'=>'77',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )        
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'7500',
                                'price'=>'7399',
                                'terms'=>array('pa_eo_carat_attr'=>'0.9','pa_eo_clarity_attr'=>'IF','pa_eo_colour_attr'=>'D','pa_eo_depth_attr'=>'67','pa_eo_fluorescence_attr'=>'None','pa_eo_grading_report_attr'=>'IGI','pa_eo_size_attr'=>'1.1','pa_eo_symmertry_attr'=>'Excellent','pa_eo_table_attr'=>'77')
                              )
                       )
            ),
            array(
              'title'=>'Marquise Diamond #10000086',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Marquise-1.jpg',
              'images'=>array('Marquise-2.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_diamond_shape_cat','eo_diamond_marquise_shape_cat'),
              'attribute'=>array('pa_eo_carat_attr'=>array(
                                  'name'=>'pa_eo_carat_attr',
                                  'value'=>'12',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_clarity_attr'=>array(
                                  'name'=>'pa_eo_clarity_attr',
                                  'value'=>'IF',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_colour_attr'=>array(
                                  'name'=>'pa_eo_colour_attr',
                                  'value'=>'L',
                                  'position'=>2,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_depth_attr'=>array(
                                  'name'=>'pa_eo_depth_attr',
                                  'value'=>'66',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_fluorescence_attr'=>array(
                                  'name'=>'pa_eo_fluorescence_attr',
                                  'value'=>'Faint',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),

                        'pa_eo_grading_report_attr'=>array(
                                  'name'=>'pa_eo_grading_report_attr',
                                  'value'=>'AGS',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),        
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'2.0',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_symmertry_attr'=>array(
                                  'name'=>'pa_eo_symmertry_attr',
                                  'value'=>'Very Good',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_table_attr'=>array(
                                  'name'=>'pa_eo_table_attr',
                                  'value'=>'85',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )        
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'85089',
                                'price'=>'85080',
                                'terms'=>array('pa_eo_carat_attr'=>'12','pa_eo_clarity_attr'=>'IF','pa_eo_colour_attr'=>'L','pa_eo_depth_attr'=>'66','pa_eo_fluorescence_attr'=>'Faint','pa_eo_grading_report_attr'=>'AGS','pa_eo_size_attr'=>'2.0','pa_eo_symmertry_attr'=>'Very Good','pa_eo_table_attr'=>'85')
                              )
                       )
            ),
            array(
              'title'=>'Oval Diamond #10000087',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Oval-1.jpg',
              'images'=>array('Oval-2.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_diamond_shape_cat','eo_diamond_oval_shape_cat'),
              'attribute'=>array('pa_eo_carat_attr'=>array(
                                  'name'=>'pa_eo_carat_attr',
                                  'value'=>'2',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_clarity_attr'=>array(
                                  'name'=>'pa_eo_clarity_attr',
                                  'value'=>'VVS1',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_colour_attr'=>array(
                                  'name'=>'pa_eo_colour_attr',
                                  'value'=>'F',
                                  'position'=>2,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_depth_attr'=>array(
                                  'name'=>'pa_eo_depth_attr',
                                  'value'=>'72',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_fluorescence_attr'=>array(
                                  'name'=>'pa_eo_fluorescence_attr',
                                  'value'=>'Faint',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),

                        'pa_eo_grading_report_attr'=>array(
                                  'name'=>'pa_eo_grading_report_attr',
                                  'value'=>'HRD',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),        
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'2.0',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_symmertry_attr'=>array(
                                  'name'=>'pa_eo_symmertry_attr',
                                  'value'=>'Good',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_table_attr'=>array(
                                  'name'=>'pa_eo_table_attr',
                                  'value'=>'80',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )        
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'80089',
                                'price'=>'80080',
                                'terms'=>array('pa_eo_carat_attr'=>'2','pa_eo_clarity_attr'=>'VVS1','pa_eo_colour_attr'=>'F','pa_eo_depth_attr'=>'72','pa_eo_fluorescence_attr'=>'Faint','pa_eo_grading_report_attr'=>'HRD','pa_eo_size_attr'=>'2.0','pa_eo_symmertry_attr'=>'Good','pa_eo_table_attr'=>'80')
                              )
                       )
            ),
            array(
              'title'=>'Radiant Solitaire Diamond #10000088',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Radiant-1.jpg',
              'images'=>array('Radiant-2.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_diamond_shape_cat','eo_diamond_radiant_shape_cat'),
              'attribute'=>array('pa_eo_carat_attr'=>array(
                                  'name'=>'pa_eo_carat_attr',
                                  'value'=>'5',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_clarity_attr'=>array(
                                  'name'=>'pa_eo_clarity_attr',
                                  'value'=>'VVS2',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_colour_attr'=>array(
                                  'name'=>'pa_eo_colour_attr',
                                  'value'=>'G',
                                  'position'=>2,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_depth_attr'=>array(
                                  'name'=>'pa_eo_depth_attr',
                                  'value'=>'75',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_fluorescence_attr'=>array(
                                  'name'=>'pa_eo_fluorescence_attr',
                                  'value'=>'Faint',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),

                        'pa_eo_grading_report_attr'=>array(
                                  'name'=>'pa_eo_grading_report_attr',
                                  'value'=>'HRD',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),        
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'2.0',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_symmertry_attr'=>array(
                                  'name'=>'pa_eo_symmertry_attr',
                                  'value'=>'Good',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_table_attr'=>array(
                                  'name'=>'pa_eo_table_attr',
                                  'value'=>'83',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )        
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'92089',
                                'price'=>'92080',
                                'terms'=>array('pa_eo_carat_attr'=>'5','pa_eo_clarity_attr'=>'VVS2','pa_eo_colour_attr'=>'G','pa_eo_depth_attr'=>'73','pa_eo_fluorescence_attr'=>'Faint','pa_eo_grading_report_attr'=>'HRD','pa_eo_size_attr'=>'2.0','pa_eo_symmertry_attr'=>'Good','pa_eo_table_attr'=>'83')
                              )
                       )
            ),
            array(
              'title'=>'Pear Diamond #10000089',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Pear-1.jpg',
              'images'=>array('Pear-2.jpg','Pear-3.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_diamond_shape_cat','eo_diamond_pear_shape_cat'),
              'attribute'=>array('pa_eo_carat_attr'=>array(
                                  'name'=>'pa_eo_carat_attr',
                                  'value'=>'0.2',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_clarity_attr'=>array(
                                  'name'=>'pa_eo_clarity_attr',
                                  'value'=>'IF',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_colour_attr'=>array(
                                  'name'=>'pa_eo_colour_attr',
                                  'value'=>'E',
                                  'position'=>2,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_depth_attr'=>array(
                                  'name'=>'pa_eo_depth_attr',
                                  'value'=>'48',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_fluorescence_attr'=>array(
                                  'name'=>'pa_eo_fluorescence_attr',
                                  'value'=>'Slight',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),

                        'pa_eo_grading_report_attr'=>array(
                                  'name'=>'pa_eo_grading_report_attr',
                                  'value'=>'GIA',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),        
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'0.2',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_symmertry_attr'=>array(
                                  'name'=>'pa_eo_symmertry_attr',
                                  'value'=>'Good',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_table_attr'=>array(
                                  'name'=>'pa_eo_table_attr',
                                  'value'=>'75',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )        
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'5500',
                                'price'=>'5399',
                                'terms'=>array('pa_eo_carat_attr'=>'0.2','pa_eo_clarity_attr'=>'IF','pa_eo_colour_attr'=>'E','pa_eo_depth_attr'=>'48','pa_eo_fluorescence_attr'=>'Slight','pa_eo_grading_report_attr'=>'GIA','pa_eo_size_attr'=>'0.2','pa_eo_symmertry_attr'=>'Good','pa_eo_table_attr'=>'75')
                              )
                       )
            ),

            //d-copy-5

            array(
              'title'=>'Round Diamond #10000090',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Round-4.jpg',
              'images'=>array('Round-5.jpg','Round-1.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_diamond_shape_cat','eo_diamond_round_shape_cat'),
              'attribute'=>array('pa_eo_carat_attr'=>array(
                                  'name'=>'pa_eo_carat_attr',
                                  'value'=>'0.5',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_clarity_attr'=>array(
                                  'name'=>'pa_eo_clarity_attr',
                                  'value'=>'IF',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_colour_attr'=>array(
                                  'name'=>'pa_eo_colour_attr',
                                  'value'=>'D',
                                  'position'=>2,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_depth_attr'=>array(
                                  'name'=>'pa_eo_depth_attr',
                                  'value'=>'78',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_fluorescence_attr'=>array(
                                  'name'=>'pa_eo_fluorescence_attr',
                                  'value'=>'Slight',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),

                        'pa_eo_grading_report_attr'=>array(
                                  'name'=>'pa_eo_grading_report_attr',
                                  'value'=>'IGI',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),        
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'4.0',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_symmertry_attr'=>array(
                                  'name'=>'pa_eo_symmertry_attr',
                                  'value'=>'Fair',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_table_attr'=>array(
                                  'name'=>'pa_eo_table_attr',
                                  'value'=>'56',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )        
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'15691',
                                'price'=>'15500',
                                'terms'=>array('pa_eo_carat_attr'=>'0.5','pa_eo_clarity_attr'=>'IF','pa_eo_colour_attr'=>'D','pa_eo_depth_attr'=>'78','pa_eo_fluorescence_attr'=>'Slight','pa_eo_grading_report_attr'=>'IGI','pa_eo_size_attr'=>'4.0','pa_eo_symmertry_attr'=>'Fair','pa_eo_table_attr'=>'56')
                              )
                       )       
            ),
            array(
              'title'=>'Emerald Diamond #10000091',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Emerald-1.jpg',
              'images'=>array('Emerald-2.jpg','Emerald-3.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_diamond_shape_cat','eo_diamond_emerald_shape_cat'),
              'attribute'=>array('pa_eo_carat_attr'=>array(
                                  'name'=>'pa_eo_carat_attr',
                                  'value'=>'0.7',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_clarity_attr'=>array(
                                  'name'=>'pa_eo_clarity_attr',
                                  'value'=>'VVS1',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_colour_attr'=>array(
                                  'name'=>'pa_eo_colour_attr',
                                  'value'=>'G',
                                  'position'=>2,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_depth_attr'=>array(
                                  'name'=>'pa_eo_depth_attr',
                                  'value'=>'72',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_fluorescence_attr'=>array(
                                  'name'=>'pa_eo_fluorescence_attr',
                                  'value'=>'None',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),

                        'pa_eo_grading_report_attr'=>array(
                                  'name'=>'pa_eo_grading_report_attr',
                                  'value'=>'HRD',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),        
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'5.0',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_symmertry_attr'=>array(
                                  'name'=>'pa_eo_symmertry_attr',
                                  'value'=>'Very Good',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_table_attr'=>array(
                                  'name'=>'pa_eo_table_attr',
                                  'value'=>'50',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )        
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'20500',
                                'price'=>'20399',
                                'terms'=>array('pa_eo_carat_attr'=>'0.7','pa_eo_clarity_attr'=>'VVS1','pa_eo_colour_attr'=>'G','pa_eo_depth_attr'=>'72','pa_eo_fluorescence_attr'=>'None','pa_eo_grading_report_attr'=>'HRD','pa_eo_size_attr'=>'5.0','pa_eo_symmertry_attr'=>'Very Good','pa_eo_table_attr'=>'50')
                              )
                       )        
            ),
            array(
              'title'=>'Asscher Diamond #10000092',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/asscher-1.jpg',
              'images'=>array('asscher-2.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_diamond_shape_cat','eo_diamond_asscher_shape_cat'),
              'attribute'=>array('pa_eo_carat_attr'=>array(
                                  'name'=>'pa_eo_carat_attr',
                                  'value'=>'0.4',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_clarity_attr'=>array(
                                  'name'=>'pa_eo_clarity_attr',
                                  'value'=>'IF',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_colour_attr'=>array(
                                  'name'=>'pa_eo_colour_attr',
                                  'value'=>'J',
                                  'position'=>2,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_depth_attr'=>array(
                                  'name'=>'pa_eo_depth_attr',
                                  'value'=>'45',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_fluorescence_attr'=>array(
                                  'name'=>'pa_eo_fluorescence_attr',
                                  'value'=>'Very',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),

                        'pa_eo_grading_report_attr'=>array(
                                  'name'=>'pa_eo_grading_report_attr',
                                  'value'=>'AGS',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),        
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'1.0',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_symmertry_attr'=>array(
                                  'name'=>'pa_eo_symmertry_attr',
                                  'value'=>'Fair',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_table_attr'=>array(
                                  'name'=>'pa_eo_table_attr',
                                  'value'=>'55',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )        
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'12500',
                                'price'=>'11390',
                                'terms'=>array('pa_eo_carat_attr'=>'0.4','pa_eo_clarity_attr'=>'IF','pa_eo_colour_attr'=>'J','pa_eo_depth_attr'=>'45','pa_eo_fluorescence_attr'=>'Very','pa_eo_grading_report_attr'=>'AGS','pa_eo_size_attr'=>'1.0','pa_eo_symmertry_attr'=>'Fair','pa_eo_table_attr'=>'55')
                              )
                       )
            ),
            array(
              'title'=>'PRINCESS DIAMOND #10000093',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Princess-3.jpg',
              'images'=>array('Princess-1.jpg','Princess-2.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_diamond_shape_cat','eo_diamond_princess_shape_cat'),
              'attribute'=>array('pa_eo_carat_attr'=>array(
                                  'name'=>'pa_eo_carat_attr',
                                  'value'=>'5.5',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_clarity_attr'=>array(
                                  'name'=>'pa_eo_clarity_attr',
                                  'value'=>'VS1',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_colour_attr'=>array(
                                  'name'=>'pa_eo_colour_attr',
                                  'value'=>'K',
                                  'position'=>2,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_depth_attr'=>array(
                                  'name'=>'pa_eo_depth_attr',
                                  'value'=>'75',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_fluorescence_attr'=>array(
                                  'name'=>'pa_eo_fluorescence_attr',
                                  'value'=>'None',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),

                        'pa_eo_grading_report_attr'=>array(
                                  'name'=>'pa_eo_grading_report_attr',
                                  'value'=>'GIA',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),        
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'1.2',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_symmertry_attr'=>array(
                                  'name'=>'pa_eo_symmertry_attr',
                                  'value'=>'Slight',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ), 
                        'pa_eo_table_attr'=>array(
                                  'name'=>'pa_eo_table_attr',
                                  'value'=>'80',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )        
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'22500',
                                'price'=>'22390',
                                'terms'=>array('pa_eo_carat_attr'=>'5.5','pa_eo_clarity_attr'=>'VS1','pa_eo_colour_attr'=>'K','pa_eo_depth_attr'=>'75','pa_eo_fluorescence_attr'=>'None','pa_eo_grading_report_attr'=>'GIA','pa_eo_size_attr'=>'1.2','pa_eo_symmertry_attr'=>'Slight','pa_eo_table_attr'=>'80')
                              )
                       ) 
            ),
            array(
              'title'=>'Cusion Diamond #10000094',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Cusion-1.jpg',
              'images'=>array('Cusion-2.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_diamond_shape_cat','eo_diamond_cushion_shape_cat'),
              'attribute'=>array('pa_eo_carat_attr'=>array(
                                  'name'=>'pa_eo_carat_attr',
                                  'value'=>'0.5',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_clarity_attr'=>array(
                                  'name'=>'pa_eo_clarity_attr',
                                  'value'=>'SI1',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_colour_attr'=>array(
                                  'name'=>'pa_eo_colour_attr',
                                  'value'=>'M',
                                  'position'=>2,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_depth_attr'=>array(
                                  'name'=>'pa_eo_depth_attr',
                                  'value'=>'48',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_fluorescence_attr'=>array(
                                  'name'=>'pa_eo_fluorescence_attr',
                                  'value'=>'Faint',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),

                        'pa_eo_grading_report_attr'=>array(
                                  'name'=>'pa_eo_grading_report_attr',
                                  'value'=>'HRD',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),        
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'0.8',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_symmertry_attr'=>array(
                                  'name'=>'pa_eo_symmertry_attr',
                                  'value'=>'Excellent',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ), 
                        'pa_eo_table_attr'=>array(
                                  'name'=>'pa_eo_table_attr',
                                  'value'=>'56',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )        
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'45500',
                                'price'=>'45399',
                                'terms'=>array('pa_eo_carat_attr'=>'0.5','pa_eo_clarity_attr'=>'SI1','pa_eo_colour_attr'=>'M','pa_eo_depth_attr'=>'48','pa_eo_fluorescence_attr'=>'Faint','pa_eo_grading_report_attr'=>'HRD','pa_eo_size_attr'=>'0.8','pa_eo_symmertry_attr'=>'Excellent','pa_eo_table_attr'=>'56')
                              )
                       )
            ),
            array(
              'title'=>'Heart Diamond #10000095',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Heart-1.jpg',
              'images'=>array('Heart-2.jpg','Heart-3.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_diamond_shape_cat','eo_diamond_heart_shape_cat'),
              'attribute'=>array('pa_eo_carat_attr'=>array(
                                  'name'=>'pa_eo_carat_attr',
                                  'value'=>'0.9',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_clarity_attr'=>array(
                                  'name'=>'pa_eo_clarity_attr',
                                  'value'=>'IF',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_colour_attr'=>array(
                                  'name'=>'pa_eo_colour_attr',
                                  'value'=>'D',
                                  'position'=>2,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_depth_attr'=>array(
                                  'name'=>'pa_eo_depth_attr',
                                  'value'=>'67',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_fluorescence_attr'=>array(
                                  'name'=>'pa_eo_fluorescence_attr',
                                  'value'=>'None',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),

                        'pa_eo_grading_report_attr'=>array(
                                  'name'=>'pa_eo_grading_report_attr',
                                  'value'=>'IGI',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),        
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'1.1',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_symmertry_attr'=>array(
                                  'name'=>'pa_eo_symmertry_attr',
                                  'value'=>'Excellent',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ), 
                        'pa_eo_table_attr'=>array(
                                  'name'=>'pa_eo_table_attr',
                                  'value'=>'77',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )        
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'7500',
                                'price'=>'7399',
                                'terms'=>array('pa_eo_carat_attr'=>'0.9','pa_eo_clarity_attr'=>'IF','pa_eo_colour_attr'=>'D','pa_eo_depth_attr'=>'67','pa_eo_fluorescence_attr'=>'None','pa_eo_grading_report_attr'=>'IGI','pa_eo_size_attr'=>'1.1','pa_eo_symmertry_attr'=>'Excellent','pa_eo_table_attr'=>'77')
                              )
                       )
            ),
            array(
              'title'=>'Marquise Diamond #10000096',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Marquise-1.jpg',
              'images'=>array('Marquise-2.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_diamond_shape_cat','eo_diamond_marquise_shape_cat'),
              'attribute'=>array('pa_eo_carat_attr'=>array(
                                  'name'=>'pa_eo_carat_attr',
                                  'value'=>'12',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_clarity_attr'=>array(
                                  'name'=>'pa_eo_clarity_attr',
                                  'value'=>'IF',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_colour_attr'=>array(
                                  'name'=>'pa_eo_colour_attr',
                                  'value'=>'L',
                                  'position'=>2,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_depth_attr'=>array(
                                  'name'=>'pa_eo_depth_attr',
                                  'value'=>'66',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_fluorescence_attr'=>array(
                                  'name'=>'pa_eo_fluorescence_attr',
                                  'value'=>'Faint',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),

                        'pa_eo_grading_report_attr'=>array(
                                  'name'=>'pa_eo_grading_report_attr',
                                  'value'=>'AGS',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),        
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'2.0',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_symmertry_attr'=>array(
                                  'name'=>'pa_eo_symmertry_attr',
                                  'value'=>'Very Good',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ), 
                        'pa_eo_table_attr'=>array(
                                  'name'=>'pa_eo_table_attr',
                                  'value'=>'85',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )        
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'85089',
                                'price'=>'85080',
                                'terms'=>array('pa_eo_carat_attr'=>'12','pa_eo_clarity_attr'=>'IF','pa_eo_colour_attr'=>'L','pa_eo_depth_attr'=>'66','pa_eo_fluorescence_attr'=>'Faint','pa_eo_grading_report_attr'=>'AGS','pa_eo_size_attr'=>'2.0','pa_eo_symmertry_attr'=>'Very Good','pa_eo_table_attr'=>'85')
                              )
                       )
            ),
            array(
              'title'=>'Oval Diamond #10000097',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Oval-1.jpg',
              'images'=>array('Oval-2.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_diamond_shape_cat','eo_diamond_oval_shape_cat'),
              'attribute'=>array('pa_eo_carat_attr'=>array(
                                  'name'=>'pa_eo_carat_attr',
                                  'value'=>'2',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_clarity_attr'=>array(
                                  'name'=>'pa_eo_clarity_attr',
                                  'value'=>'VVS1',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_colour_attr'=>array(
                                  'name'=>'pa_eo_colour_attr',
                                  'value'=>'F',
                                  'position'=>2,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_depth_attr'=>array(
                                  'name'=>'pa_eo_depth_attr',
                                  'value'=>'72',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_fluorescence_attr'=>array(
                                  'name'=>'pa_eo_fluorescence_attr',
                                  'value'=>'Faint',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),

                        'pa_eo_grading_report_attr'=>array(
                                  'name'=>'pa_eo_grading_report_attr',
                                  'value'=>'HRD',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),        
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'2.0',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_symmertry_attr'=>array(
                                  'name'=>'pa_eo_symmertry_attr',
                                  'value'=>'Good',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ), 
                        'pa_eo_table_attr'=>array(
                                  'name'=>'pa_eo_table_attr',
                                  'value'=>'80',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )        
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'80089',
                                'price'=>'80080',
                                'terms'=>array('pa_eo_carat_attr'=>'2','pa_eo_clarity_attr'=>'VVS1','pa_eo_colour_attr'=>'F','pa_eo_depth_attr'=>'72','pa_eo_fluorescence_attr'=>'Faint','pa_eo_grading_report_attr'=>'HRD','pa_eo_size_attr'=>'2.0','pa_eo_symmertry_attr'=>'Good','pa_eo_table_attr'=>'80')
                              )
                       )
            ),
            array(
              'title'=>'Radiant Solitaire Diamond #10000098',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Radiant-1.jpg',
              'images'=>array('Radiant-2.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_diamond_shape_cat','eo_diamond_radiant_shape_cat'),
              'attribute'=>array('pa_eo_carat_attr'=>array(
                                  'name'=>'pa_eo_carat_attr',
                                  'value'=>'5',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_clarity_attr'=>array(
                                  'name'=>'pa_eo_clarity_attr',
                                  'value'=>'VVS2',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_colour_attr'=>array(
                                  'name'=>'pa_eo_colour_attr',
                                  'value'=>'G',
                                  'position'=>2,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_depth_attr'=>array(
                                  'name'=>'pa_eo_depth_attr',
                                  'value'=>'75',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_fluorescence_attr'=>array(
                                  'name'=>'pa_eo_fluorescence_attr',
                                  'value'=>'Faint',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),

                        'pa_eo_grading_report_attr'=>array(
                                  'name'=>'pa_eo_grading_report_attr',
                                  'value'=>'HRD',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),        
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'2.0',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_symmertry_attr'=>array(
                                  'name'=>'pa_eo_symmertry_attr',
                                  'value'=>'Good',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ), 
                        'pa_eo_table_attr'=>array(
                                  'name'=>'pa_eo_table_attr',
                                  'value'=>'83',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )        
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'92089',
                                'price'=>'92080',
                                'terms'=>array('pa_eo_carat_attr'=>'5','pa_eo_clarity_attr'=>'VVS2','pa_eo_colour_attr'=>'G','pa_eo_depth_attr'=>'73','pa_eo_fluorescence_attr'=>'Faint','pa_eo_grading_report_attr'=>'HRD','pa_eo_size_attr'=>'2.0','pa_eo_symmertry_attr'=>'Good','pa_eo_table_attr'=>'83')
                              )
                       )
            ),
            array(
              'title'=>'Pear Diamond #10000099',
              'thumb'=>$_img_url.'EO_WBC_Img/Products/Pear-1.jpg',
              'images'=>array('Pear-2.jpg','Pear-3.jpg'),
              'content'=>'',
              'regular_price'=>'',
              'sale_price'=>'',
              'price'=>'',
              'type'=>'variable', //simple | variable
              'category'=>array('eo_diamond_shape_cat','eo_diamond_pear_shape_cat'),
              'attribute'=>array('pa_eo_carat_attr'=>array(
                                  'name'=>'pa_eo_carat_attr',
                                  'value'=>'0.2',
                                  'position'=>0,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_clarity_attr'=>array(
                                  'name'=>'pa_eo_clarity_attr',
                                  'value'=>'IF',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_colour_attr'=>array(
                                  'name'=>'pa_eo_colour_attr',
                                  'value'=>'E',
                                  'position'=>2,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_depth_attr'=>array(
                                  'name'=>'pa_eo_depth_attr',
                                  'value'=>'48',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_fluorescence_attr'=>array(
                                  'name'=>'pa_eo_fluorescence_attr',
                                  'value'=>'Slight',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),

                        'pa_eo_grading_report_attr'=>array(
                                  'name'=>'pa_eo_grading_report_attr',
                                  'value'=>'GIA',
                                  'position'=>1,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),        
                        'pa_eo_size_attr'=>array(
                                  'name'=>'pa_eo_size_attr',
                                  'value'=>'0.2',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ),
                        'pa_eo_symmertry_attr'=>array(
                                  'name'=>'pa_eo_symmertry_attr',
                                  'value'=>'Good',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                ), 
                        'pa_eo_table_attr'=>array(
                                  'name'=>'pa_eo_table_attr',
                                  'value'=>'75',
                                  'position'=>3,
                                  'is_visible'=>1,
                                  'is_variation'=>1,
                                  'is_taxonomy'=>1
                                )        
                        ),
              'variation'=>array(
                              array(
                                'regular_price'=>'5500',
                                'price'=>'5399',
                                'terms'=>array('pa_eo_carat_attr'=>'0.2','pa_eo_clarity_attr'=>'IF','pa_eo_colour_attr'=>'E','pa_eo_depth_attr'=>'48','pa_eo_fluorescence_attr'=>'Slight','pa_eo_grading_report_attr'=>'GIA','pa_eo_size_attr'=>'0.2','pa_eo_symmertry_attr'=>'Good','pa_eo_table_attr'=>'75')
                              )
                       )
            )      
);	
		}

		public function create_category($args) {
			if(!empty($args) AND is_array($args)) {
				foreach($args as $index=>$cat) {					
					//to be removed
				   	if(term_exists( $cat['slug'] , 'product_cat' )){
				   		$args[$index]['id']=get_term_by('slug',$cat['slug'] , 'product_cat')->term_id;
				   	} else {
				   		$cat_id=$this->create_category_factory($cat);
				   		$args[$index]['id']=$cat_id;	
					}				   
				}
				return $args;
			} else {
				return FALSE;				
			}
		}
		
		public function create_product($index){

			global $wpdb;

			if(!isset($this->product[$index])) return FALSE;

			$product=$this->product[$index];

			$product_id= wp_insert_post( array(
			    'post_author' => get_current_user_id(),
			    'post_title' => $product['title'],
			    'post_content' => $product['content'],
			    'post_status' => 'publish',
			    'post_type' => "product",
			));

			wp_set_object_terms( $product_id,$product['type'],'product_type');
			wp_set_object_terms( $product_id,$product['category'],'product_cat');					

			if(!empty($product['attribute'])){
				foreach ($product['attribute'] as $_tax => $_val) {

					$_val = explode('|',$_val['value']);
					
					if(is_array($_val) and !empty($_val)){
						
						foreach ($_val as $key => $value) {
							
							$tax_term = term_exists( $value, $_tax );
							if ( ! $tax_term ) {								
								$tax_term = wp_insert_term( $value, $_tax );								
							}

							if(!empty($tax_term) and !is_wp_error($tax_term)){
								$term_slug = get_term_by('term_taxonomy_id',$tax_term['term_taxonomy_id'],$_tax);	
								if(!empty($term_slug->slug) and !is_wp_error($term_slug)) {
									$_val[$key] = $term_slug->slug;
								}
							}

						}						
						
					}
					$product['attribute'][$_tax]['value'] = implode('|',$_val);					
				}	
			}

			update_post_meta( $product_id, '_product_attributes', $product['attribute'] );

			foreach ($product['attribute'] as $attr_index => $attribute) {
				wp_set_object_terms( $product_id, explode('|',$attribute['value']) , $attr_index );					
			}
			
			$img_id=$this->add_image_gallary($product['thumb']);
			if($img_id){	
				set_post_thumbnail( $product_id,$img_id );
			}

			if(!empty($product['images']) and is_array($product['images'])){

				$imgs = array();
				foreach ($product['images'] as $img) {
					$imgid = $this->add_image_gallary($this->gallay_img.$img);
					if(!empty($imgid)){
						array_push( $imgs, $imgid);	
					}					
				}

				update_post_meta($product_id,"_product_image_gallery",implode(',', $imgs));
			}

			$parent_id = $product_id;
			if(!empty($product['variation'])){

				foreach ($product['variation'] as $var_index => $variation) {						

					if(!empty($variation['terms'])){					 
						foreach($variation['terms'] as $taxonomy=>$term_name){
								
							if( ! taxonomy_exists($taxonomy) ){						            
					            register_taxonomy(
					                $taxonomy,
					               'product_variation',
					                array(
					                    'hierarchical' => false,
					                    'label' => ucfirst( substr($taxonomy,3)),
					                    'query_var' => true,
					                    'rewrite' => array( 'slug' => sanitize_title(substr($taxonomy ,3) ) ), // The base slug
					                )
					            );
					        }
							
							$tax_term = term_exists( $term_name, $taxonomy );
							if ( ! $tax_term ) {								
								$tax_term = wp_insert_term( $term_name, $taxonomy );								
							} 
							if(!empty($tax_term) and !is_wp_error($tax_term)){
		    					$term_slug = get_term_by('term_taxonomy_id',$tax_term['term_taxonomy_id'],$taxonomy);
		    					if(!empty($term_slug->slug) and !is_wp_error($term_slug)) {
		    						$variation['terms'][$taxonomy] = $term_slug->slug;	    					
		    					}
		    				}
	    				}
	    				
	    				$var_ = new WC_Product_Variation();
						$var_->set_props(
							array(
								'parent_id'     => $parent_id,							
								'regular_price' => $variation['regular_price'],
								'sale_price' => $variation['price']
							)
						);
						$var_->set_attributes($variation['terms']);							
						$var_->save();
					}				
				}	

				$_product = wc_get_product($parent_id);
				$_product->set_default_attributes($product['variation'][0]['terms']);					
				$_product->save();

			} elseif (!empty($product['regular_price'])) {
				update_post_meta( $parent_id, '_regular_price',$product['regular_price'] );
				update_post_meta( $parent_id, '_price', $product['sale_price']);						
				update_post_meta( $parent_id, '_sales_price', $product['price']);
				update_post_meta( $parent_id, '_sale_price', $product['sale_price']);				
				update_post_meta( $parent_id, '_manage_stock','no' );						
			}			

			return TRUE;
		}	

		public function create_products($args) {
			
			if(!empty($args) || is_array($args)) {
				
				fwrite(STDERR, print_r("User_ID.:".get_current_user_id(), TRUE));
				//////////////////////////////////////////////////////////////////////////////
				//////////////////////////////////////////////////////////////////////////////
				foreach ($args as $index => $product) {
						
					$product_id= wp_insert_post( array(
					    'post_author' => get_current_user_id(),
					    'post_title' => $product['title'],
					    'post_content' => $product['content'],
					    'post_status' => 'publish',
					    'post_type' => "product",
					));

					wp_set_object_terms( $product_id,$product['type'],'product_type');
					wp_set_object_terms( $product_id,$product['category'],'product_cat');					
					update_post_meta( $product_id, '_product_attributes', $product['attribute'] );

					foreach ($product['attribute'] as $attr_index => $attribute) {
						wp_set_object_terms( $product_id, explode('|',$attribute['value']) , $attr_index );						
					}
					
					$img_id=$this->add_image_gallary($product['thumb']);
					if($img_id){	
						set_post_thumbnail( $product_id,$img_id );
					}

					$parent_id = $product_id;

					fwrite(STDERR, print_r("Post_id.:".$parent_id, TRUE));

					foreach ($product['variation'] as $var_index => $variation) {						

						$variation_data = array(
						    'post_title'   => $product['title'],
						    'post_name'   => 'product-'.$parent_id.'-variation',						    
						    'post_status'  => 'publish',
						    'post_parent'  => $parent_id,
						    'post_type'    => 'product_variation',
						    'guid'        => EO_WBC_Support::eo_wbc_get_product($parent_id)->get_permalink()
						);						

						$variation_id = wp_insert_post( $variation_data );

						$variation_obj = new WC_Product_Variation( $variation_id );

						update_post_meta( $variation_id, '_regular_price',$variation['regular_price'] );
						update_post_meta( $variation_id, '_price', $variation['regular_price']);						
						update_post_meta( $variation_id, '_sales_price', $variation['price']);
						update_post_meta( $variation_id, '_manage_stock','no' );						
																		
						if(!empty($variation['terms'])){					 

							foreach($variation['terms'] as $taxonomy=>$term_name){										

								if( ! taxonomy_exists($taxonomy) ){						            
						            register_taxonomy(
						                $taxonomy,
						               'product_variation',
						                array(
						                    'hierarchical' => false,
						                    'label' => ucfirst( substr($taxonomy,3)),
						                    'query_var' => true,
						                    'rewrite' => array( 'slug' => sanitize_title(substr($taxonomy ,3) ) ), // The base slug
						                )
						            );
						        }

						        if( ! term_exists( $term_name, $taxonomy ) )
            						wp_insert_term( $term_name, $taxonomy );           					

            					$term_slug = get_term_by('name', $term_name, $taxonomy );
            					if(!empty($term_slug->slug) and !is_wp_error($term_slug)){
            						update_post_meta( $variation_id, 'attribute_'.$taxonomy, $term_slug->slug );	
            					}				
							}						
							WC_Product_Variable::sync($parent_id);
						}

					    $variation_obj->save(); // Save the data
					}
				}									
			}
		}

		function add_filters(){

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

	        $__att=wc_get_attribute_taxonomies();        
	        
	        $__att__=array();

	        foreach ($__att as $__att_) {                     
	        	$__att__[$__att_->attribute_name]=array($__att_->attribute_id,$__att_->attribute_label);
	        }		        

			$this->filter=array();

			//Filters for diamond....						
			if(!empty($__cat__['eo_diamond_shape_cat'])){
				$this->filter['eo_wbc_add_filter_first'][]=array(
										                        'name'=>$__cat__['eo_diamond_shape_cat'][0],
										                        'type'=>"0",
										                        'label'=>$__cat__['eo_diamond_shape_cat'][1],
										                        'advance'=>"0",
										                        'dependent'=>"0",
										                        'input'=>"icon_text",
										                        'column_width'=> "100",
										                        'order'=>"0",
										                    );
			}
			if(!empty($__att__['eo_carat_attr'])){
				$this->filter['eo_wbc_add_filter_first'][]=array(
										                        'name'=>$__att__['eo_carat_attr'][0],
										                        'type'=>"1",
										                        'label'=>$__att__['eo_carat_attr'][1],
										                        'advance'=>"0",
										                        'dependent'=>"0",
										                        'input'=>"numeric_slider",
										                        'column_width'=> "50",
										                        'order'=>"1",
										                    );
			}			
			if(!empty($__att__['eo_clarity_attr'])){
				$this->filter['eo_wbc_add_filter_first'][]=array(
										                        'name'=>$__att__['eo_clarity_attr'][0],
										                        'type'=>"1",
										                        'label'=>$__att__['eo_clarity_attr'][1],
										                        'advance'=>"0",
										                        'dependent'=>"0",
										                        'input'=>"text_slider",
										                        'column_width'=> "50",
										                        'order'=>"2",
										                    );
			}
			if(!empty($__att__['eo_colour_attr'])){
				$this->filter['eo_wbc_add_filter_first'][]=array(
										                        'name'=>$__att__['eo_colour_attr'][0],
										                        'type'=>"1",
										                        'label'=>$__att__['eo_colour_attr'][1],
										                        'advance'=>"0",
										                        'dependent'=>"0",
										                        'input'=>"text_slider",
										                        'column_width'=> "50",
										                        'order'=>"3",
										                    );
			}
			if(!empty($__att__['eo_polish_attr'])){
				$this->filter['eo_wbc_add_filter_first'][]=array(
										                        'name'=>$__att__['eo_polish_attr'][0],
										                        'type'=>"1",
										                        'label'=>$__att__['eo_polish_attr'][1],
										                        'advance'=>"1",
										                        'dependent'=>"0",
										                        'input'=>"text_slider",
										                        'column_width'=> "50",
										                        'order'=>"4",
										                    );
			}
			if(!empty($__att__['eo_symmertry_attr'])){
				$this->filter['eo_wbc_add_filter_first'][]=array(
										                        'name'=>$__att__['eo_symmertry_attr'][0],
										                        'type'=>"1",
										                        'label'=>$__att__['eo_symmertry_attr'][1],
										                        'advance'=>"1",
										                        'dependent'=>"0",
										                        'input'=>"text_slider",
										                        'column_width'=> "50",
										                        'order'=>"5",
										                    );
			}
			if(!empty($__att__['eo_fluorescence_attr'])){
				$this->filter['eo_wbc_add_filter_first'][]=array(
										                        'name'=>$__att__['eo_fluorescence_attr'][0],
										                        'type'=>"1",
										                        'label'=>$__att__['eo_fluorescence_attr'][1],
										                        'advance'=>"1",
										                        'dependent'=>"0",
										                        'input'=>"text_slider",
										                        'column_width'=> "50",
										                        'order'=>"6",
										                    );
			}
			if(!empty($__att__['eo_depth_attr'])){
				$this->filter['eo_wbc_add_filter_first'][]=array(
										                        'name'=>$__att__['eo_depth_attr'][0],
										                        'type'=>"1",
										                        'label'=>$__att__['eo_depth_attr'][1],
										                        'advance'=>"1",
										                        'dependent'=>"0",
										                        'input'=>"numeric_slider",
										                        'column_width'=> "50",
										                        'order'=>"7",
										                    );
			}
			if(!empty($__att__['eo_table_attr'])){
				$this->filter['eo_wbc_add_filter_first'][]=array(
										                        'name'=>$__att__['eo_table_attr'][0],
										                        'type'=>"1",
										                        'label'=>$__att__['eo_table_attr'][1],
										                        'advance'=>"1",
										                        'dependent'=>"0",
										                        'input'=>"numeric_slider",
										                        'column_width'=> "50",
										                        'order'=>"8",
										                    );
			}
			if(!empty($__att__['eo_grading_report_attr'])){
				$this->filter['eo_wbc_add_filter_first'][]=array(
										                        'name'=>$__att__['eo_grading_report_attr'][0],
										                        'type'=>"1",
										                        'label'=>$__att__['eo_grading_report_attr'][1],
										                        'advance'=>"1",
										                        'dependent'=>"0",
										                        'input'=>"checkbox",
										                        'column_width'=> "50",
										                        'order'=>"9",
										                    );
			}

			//Filters for settings....
			if(!empty($__cat__['eo_setting_shape_cat'])){
				$this->filter['eo_wbc_add_filter_second'][]=array(
										                        'name'=>$__cat__['eo_setting_shape_cat'][0],
										                        'type'=>"0",
										                        'label'=>$__cat__['eo_setting_shape_cat'][1],
										                        'advance'=>"0",
										                        'dependent'=>"0",
										                        'input'=>"icon_text",
										                        'column_width'=> "100",
										                        'order'=>"0",
										                    );
			}
			if(!empty($__cat__['eo_ring_style_cat'])){
				$this->filter['eo_wbc_add_filter_second'][]=array(
										                        'name'=>$__cat__['eo_ring_style_cat'][0],
										                        'type'=>"0",
										                        'label'=>$__cat__['eo_ring_style_cat'][1],
										                        'advance'=>"0",
										                        'dependent'=>"0",
										                        'input'=>"icon_text",
										                        'column_width'=> "50",
										                        'order'=>"1",
										                    );
			}
			if(!empty($__cat__['eo_metal_cat'])){
				$this->filter['eo_wbc_add_filter_second'][]=array(
										                        'name'=>$__cat__['eo_metal_cat'][0],
										                        'type'=>"0",
										                        'label'=>$__cat__['eo_metal_cat'][1],
										                        'advance'=>"0",
										                        'dependent'=>"0",
										                        'input'=>"icon",
										                        'column_width'=> "50",
										                        'order'=>"2",
										                    );
			}

        	foreach ($this->filter as $index => $filters) {
				
				foreach($filters as $filter){        		

	        		$_data=unserialize(get_option($index,"a:0:{}"));
	        		$names=array_column($_data,'name');
	        		if( !in_array($filter['name'], $names)){
	        			$_data[]=array(
		                        'name'=>$filter['name'],
		                        'type'=>$filter['type'],
		                        'label'=>$filter['label'],
		                        'advance'=>$filter['advance'],
		                        'dependent'=>$filter['dependent'],
		                        'input'=>$filter['input'],
		                        'column_width'=>$filter['column_width'],
		                        'order'=>(int)$filter['order'],
		                    );    	                
	        			update_option($index,serialize($_data)); 
	        		}
	        	}
        	}        	
		}

		function create_attribute( $args ){
			
		    if(!empty($args) AND is_array($args)){
		    	
		    	foreach ($args as $index=>$attribute) {		    				        

		    		if(!isset($attribute['label']) && !isset($attribute['terms'])) return;
		    		//adding post data to store data in posts
		    		$data = array(
				        'name'   => wp_unslash($attribute['label']),
				        'slug'    => empty($attribute['slug']) ? wc_sanitize_taxonomy_name(wp_unslash($attribute['label'])) : $attribute['slug'],
				        'type'    => 'select',
				        'order_by' => 'menu_order',
				        'has_archives'  => 1, // Enable archives ==> true (or 1)
				    );		

		    		$id = EO_WBC_Support::eo_wbc_create_attribute( $data );
		    		
	    			if( ! taxonomy_exists('pa_'.$data['slug']) ){	
	    				register_taxonomy(
			                'pa_'.$data['slug'],
			                array( 'product', 'product_variation' ),
			                array(
			                    'hierarchical' => false,
			                    'label' => ucfirst($data['slug']),
			                    'query_var' => true,
			                    'rewrite' => array( 'slug' => sanitize_title($data['slug'])),
			                )
			            );		 
			        }

		    		/*if( ! taxonomy_exists('pa_'.$data['slug']) ){						            		    			
			            register_taxonomy(
			                'pa_'.$data['slug'],
			               	array( 'product','product_variation' )			                
			            );
			        }*/ 				
						
					if(empty($attribute['range'])){
			    		
			    		foreach ($attribute['terms'] as $term)  {	

		    				if( ! term_exists( $term, 'pa_'.$data['slug']) ) {

								wp_insert_term( $term,'pa_'.$data['slug'],array('slug' => sanitize_title($term)) ); 
				    		}
				    	}
			    	}
			    	else{
			    		
			    		if(!empty($attribute['terms']['min']) && !empty($attribute['terms']['max'])) {
			    			
			    			for($i=(float)$attribute['terms']['min'];$i<=(int)$attribute['terms']['max'];$i=round($i+0.1,1)){
			    				
			    				if( ! term_exists( $i, 'pa_'.$data['slug']) ){					    					
			    					
									wp_insert_term( $i, 'pa_'.$data['slug'],array('slug' => sanitize_title($i))); 
								}
			    			}
			    		}			    		
			    	}	    					    	
		    		$args[$index]['id']=$id;
		    	}
		    	return $args;
		    }	    
		}

		private function create_category_factory( $cat ){

			if(!empty($cat) AND is_array($cat)) {
				$param=array(
			            'description'=> $cat['description'],
			            'slug' => $cat['slug'],			            
			        );

				if(!empty($cat['parent'])) {

					$param['parent'] = $cat['parent'];
				}
				
			    $id = wp_insert_term(
			        $cat['name'], // the term 
			        'product_cat', // the taxonomy
			        $param
			    );			    

			    if(!is_wp_error($id) || isset($id->error_data['term_exists'])) {

			    	$thumb_id=0;
			    	$thumb_id=$this->add_image_gallary($cat['thumb']);

			    	$cat_id = null;
			    	if(is_array($id)) {
						
						$cat_id=isset($id['term_id']) ? $id['term_id'] : null;			    		

						if( isset( $id['term_id'] ) ){

				    		update_term_meta( $cat_id, 'thumbnail_id', absint( $thumb_id ) );	
				    	}

			    	}
			    	elseif (is_object($id)) {

			    		if(is_wp_error($id)){

			    			$cat_id=isset($id->error_data['term_exists'])?$id->error_data['term_exists']:null;
			    		}
			    	}					

					if(!empty($cat['child'])) {

				    	foreach ($cat['child'] as $child) {

				    		$child['parent']=$cat_id;				    		
				    		$this->create_category_factory($child);
				    	}
			    	}

			    	if(isset($cat_id)){
			    		return $cat_id;
			    	} else {
			    		return false;
			    	}
			    } else {
			    	if(!is_wp_error($id) and !empty($id['term_id'])) {
			    		return $id['term_id'];
			    	} else {
			    		return false;
			    	}			    	
			    }			    
			}
		}

		/* Add image to the wordpress image media gallary */
		private function add_image_gallary($path) {

			if(!$path) return FALSE;

			$name = basename($path);

			$attachment_check=new Wp_Query( array(
		        'posts_per_page' => 1,
		        'post_type'      => 'attachment',
		        'name'           => implode('-',explode(' ',strtolower($name))).'-image'
		    ));

		    if ( $attachment_check->have_posts() ) {
		      $posts=$attachment_check->get_posts();
		      return $posts[0]->ID;
		    }

			$file = wp_upload_bits($name, null, file_get_contents($path));

			if (!$file['error']) {

				$type = wp_check_filetype($name, null );

				$attachment = array(
					'post_mime_type' => $type['type'],
					'post_parent' => null,
					'post_title' => preg_replace('/\.[^.]+$/', '', $name),
					'post_content' => '',
					'post_status' => 'inherit'
				);

				$id = wp_insert_attachment( $attachment, $file['file'], null );

				if (!is_wp_error($id)) {

					require_once(ABSPATH . "wp-admin" . '/includes/image.php');

					$data = wp_generate_attachment_metadata( $id, $file['file'] );
					wp_update_attachment_metadata( $id, $data );

					return $id;

				} else {
					return FALSE;
				}
			} else {
				return FALSE;
			}
		}

		/**
			array(
				array(
					['slug','my_cat','product_cat'],
					['name','term','pa_attr']
				)
			);
		*/
		function add_maps($args) {      
			
			return true;
			if(!empty($args) && is_array($args)){

				foreach ($args as $map) {
            
					$first=get_term_by($map[0][0],$map[0][1],$map[0][2]);
          
			          if(!empty($first) and !is_wp_error($first)){
			            $first = $first->term_taxonomy_id;
			          }

					$second=get_term_by($map[1][0],$map[1][1],$map[1][2]);
          
			          if(!empty($second) and !is_wp_error($second)){
			            $second = $second->term_taxonomy_id;
			          }

					$discount='0';

					if(!empty($first) && !empty($second)) {


						$maps=unserialize(get_option('eo_wbc_cat_maps',"a:0:{}"));
        
				        if(!empty($maps) and !is_wp_error($maps)){

				            $match_found = false;
				            foreach ($maps as $key=>$value) {    

				                if($value[0]==$first and $value[1]==$second) {                 
				                    $match_found = true;
				                    break;
				                } elseif ($value[1]==$first and $value[0]==$second) {
				                    $match_found = true;
				                    break;
				                }
				            }

				            if(!$match_found){				                
				                $maps[] = array($first,$second,$discount);
				            }

				        } else {
				            $maps = array(array($first,$second,$discount));
				        }

				        update_option('eo_wbc_cat_maps',serialize($maps)); 
				        update_option('eo_wbc_config_map',"1");			                            				        
					}
				}
        		return true;        		
	      	}	
	      	return false;			
		}

		/**
		* @return number of products in product list.
		* the list is defined in constructor of the calss.
		*/
		function get_product_size() {

			return count($this->product);
		}
	}
}
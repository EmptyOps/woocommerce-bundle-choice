<?php

if(!class_exists('EO_WBC_CatAt')){
	/**
	 * Class to create product category, attribute and add them to the products
	 */
	class EO_WBC_CatAt {

		function __construct(){
			$_img_url=EO_WBC_PLUGIN_DIR.'EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/';
			$this->product=array(
					            array(
					              'title'=>'Setting #8800950587',
					              'thumb'=>$_img_url.'EO_WBC_Img/Products/round_1.jpg',
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
					              'thumb'=>$_img_url.'EO_WBC_Img/Products/princess_1.jpg',
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
					              'thumb'=>$_img_url.'EO_WBC_Img/Products/emerald_1.jpg',
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
					              'thumb'=>$_img_url.'EO_WBC_Img/Products/asscher_1.jpg',
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
					              'thumb'=>$_img_url.'EO_WBC_Img/Products/marquise_1.jpg',
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
					              'thumb'=>$_img_url.'EO_WBC_Img/Products/oval_1.jpg',
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
					              'thumb'=>$_img_url.'EO_WBC_Img/Products/radiant_1.jpg',
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
					              'thumb'=>$_img_url.'EO_WBC_Img/Products/pear_1.jpg',
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
					              'thumb'=>$_img_url.'EO_WBC_Img/Products/heart_1.jpg',
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
					              'thumb'=>$_img_url.'EO_WBC_Img/Products/cusion_1.jpg',
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
					            array(
					              'title'=>'Round Diamond #89302496',
					              'thumb'=>$_img_url.'EO_WBC_Img/Products/round.jpg',
					              'content'=>'',
					              'regular_price'=>'',
					              'sale_price'=>'',
					              'price'=>'',
					              'type'=>'variable', //simple | variable
					              'category'=>array('eo_diamond_shape_cat','eo_diamond_round_shape_cat'),
					              'attribute'=>array('pa_eo_carat_attr'=>array(
					                                  'name'=>'pa_eo_carat_attr',
					                                  'value'=>'0.5|0.20|0.25',
					                                  'position'=>0,
					                                  'is_visible'=>1,
					                                  'is_variation'=>1,
					                                  'is_taxonomy'=>1
					                                ),
					                        'pa_eo_clarity_attr'=>array(
					                                  'name'=>'pa_eo_clarity_attr',
					                                  'value'=>'IF|SI1|VVS1',
					                                  'position'=>1,
					                                  'is_visible'=>1,
					                                  'is_variation'=>1,
					                                  'is_taxonomy'=>1
					                                ),
					                        'pa_eo_colour_attr'=>array(
					                                  'name'=>'pa_eo_colour_attr',
					                                  'value'=>'D|E|F',
					                                  'position'=>2,
					                                  'is_visible'=>1,
					                                  'is_variation'=>1,
					                                  'is_taxonomy'=>1
					                                ),
					                        'pa_eo_size_attr'=>array(
					                                  'name'=>'pa_eo_size_attr',
					                                  'value'=>'4.0|5.0|6.0|',
					                                  'position'=>3,
					                                  'is_visible'=>1,
					                                  'is_variation'=>1,
					                                  'is_taxonomy'=>1
					                                ),
					                        ),
					              'variation'=>array(
					                              array(
					                                'regular_price'=>'15691',
					                                'price'=>'15500',
					                                'terms'=>array('pa_eo_carat_attr'=>'0.5','pa_eo_clarity_attr'=>'IF','pa_eo_colour_attr'=>'D','pa_eo_size_attr'=>'4.0')
					                              ),
					                              array(
					                                'regular_price'=>'17691',
					                                'price'=>'17500',
					                                'terms'=>array('pa_eo_carat_attr'=>'0.20','pa_eo_clarity_attr'=>'SI1','pa_eo_colour_attr'=>'E','pa_eo_size_attr'=>'5.0')
					                              ),
					                              array(
					                                'regular_price'=>'18691',
					                                'price'=>'18500',
					                                'terms'=>array('pa_eo_carat_attr'=>'0.25','pa_eo_clarity_attr'=>'VVS1','pa_eo_colour_attr'=>'F','pa_eo_size_attr'=>'6.0')
					                              )
					                            )
					            ),
					            array(
					              'title'=>'Radiant Diamond #66984597',
					              'thumb'=>$_img_url.'EO_WBC_Img/Products/radiant.jpg',
					              'content'=>'',
					              'regular_price'=>'',
					              'sale_price'=>'',
					              'price'=>'',
					              'type'=>'variable', //simple | variable
					              'category'=>array('eo_diamond_shape_cat','eo_diamond_radiant_shape_cat'),
					              'attribute'=>array('pa_eo_carat_attr'=>array(
					                                  'name'=>'pa_eo_carat_attr',
					                                  'value'=>'0.20|0.26|0.30',
					                                  'position'=>0,
					                                  'is_visible'=>1,
					                                  'is_variation'=>1,
					                                  'is_taxonomy'=>1
					                                ),
					                        'pa_eo_clarity_attr'=>array(
					                                  'name'=>'pa_eo_clarity_attr',
					                                  'value'=>'IF|VVS1|SI1',
					                                  'position'=>1,
					                                  'is_visible'=>1,
					                                  'is_variation'=>1,
					                                  'is_taxonomy'=>1
					                                ),
					                        'pa_eo_colour_attr'=>array(
					                                  'name'=>'pa_eo_colour_attr',
					                                  'value'=>'D|F|H',
					                                  'position'=>2,
					                                  'is_visible'=>1,
					                                  'is_variation'=>1,
					                                  'is_taxonomy'=>1
					                                ),
					                        'pa_eo_size_attr'=>array(
					                                  'name'=>'pa_eo_size_attr',
					                                  'value'=>'0.7|1.0|1.5',
					                                  'position'=>3,
					                                  'is_visible'=>1,
					                                  'is_variation'=>1,
					                                  'is_taxonomy'=>1
					                                ),
					                        ),
					              'variation'=>array(
					                              array(
					                                'regular_price'=>'17591',
					                                'price'=>'17400',
					                                'terms'=>array('pa_eo_carat_attr'=>'0.20','pa_eo_clarity_attr'=>'IF','pa_eo_colour_attr'=>'D','pa_eo_size_attr'=>'0.7')
					                              ),
					                              array(
					                                'regular_price'=>'18591',
					                                'price'=>'18400',
					                                'terms'=>array('pa_eo_carat_attr'=>'0.26','pa_eo_clarity_attr'=>'VVS1','pa_eo_colour_attr'=>'F','pa_eo_size_attr'=>'1.0')
					                              ),
					                              array(
					                                'regular_price'=>'19591',
					                                'price'=>'19400',
					                                'terms'=>array('pa_eo_carat_attr'=>'0.30','pa_eo_clarity_attr'=>'SI1','pa_eo_colour_attr'=>'H','pa_eo_size_attr'=>'1.5')
					                              )
					                            )
					            ),
					            array(
					              'title'=>'Asscher Diamond #99649028',
					              'thumb'=>$_img_url.'EO_WBC_Img/Products/asscher.jpg',
					              'content'=>'',
					              'regular_price'=>'',
					              'sale_price'=>'',
					              'price'=>'',
					              'type'=>'variable', //simple | variable
					              'category'=>array('eo_diamond_shape_cat','eo_diamond_asscher_shape_cat'),
					              'attribute'=>array('pa_eo_carat_attr'=>array(
					                                  'name'=>'pa_eo_carat_attr',
					                                  'value'=>'0.30|0.43|0.48',
					                                  'position'=>0,
					                                  'is_visible'=>1,
					                                  'is_variation'=>1,
					                                  'is_taxonomy'=>1
					                                ),
					                        'pa_eo_clarity_attr'=>array(
					                                  'name'=>'pa_eo_clarity_attr',
					                                  'value'=>'IF|VVS1|VVS2',
					                                  'position'=>1,
					                                  'is_visible'=>1,
					                                  'is_variation'=>1,
					                                  'is_taxonomy'=>1
					                                ),
					                        'pa_eo_colour_attr'=>array(
					                                  'name'=>'pa_eo_colour_attr',
					                                  'value'=>'D|E|I',
					                                  'position'=>2,
					                                  'is_visible'=>1,
					                                  'is_variation'=>1,
					                                  'is_taxonomy'=>1
					                                ),
					                        'pa_eo_size_attr'=>array(
					                                  'name'=>'pa_eo_size_attr',
					                                  'value'=>'0.8|1.4|1.8',
					                                  'position'=>3,
					                                  'is_visible'=>1,
					                                  'is_variation'=>1,
					                                  'is_taxonomy'=>1
					                                ),
					                        ),
					              'variation'=>array(
					                              array(
					                                'regular_price'=>'42776',
					                                'price'=>'42676',
					                                'terms'=>array('pa_eo_carat_attr'=>'0.30','pa_eo_clarity_attr'=>'IF','pa_eo_colour_attr'=>'D','pa_eo_size_attr'=>'0.8')
					                              ),
					                              array(
					                                'regular_price'=>'43776',
					                                'price'=>'43676',
					                                'terms'=>array('pa_eo_carat_attr'=>'0.43','pa_eo_clarity_attr'=>'VVS1','pa_eo_colour_attr'=>'E','pa_eo_size_attr'=>'1.4')
					                              ),
					                              array(
					                                'regular_price'=>'44776',
					                                'price'=>'44676',
					                                'terms'=>array('pa_eo_carat_attr'=>'0.48','pa_eo_clarity_attr'=>'VVS2','pa_eo_colour_attr'=>'F','pa_eo_size_attr'=>'1.8')
					                              )
					                            )
					            ),
					            array(
					              'title'=>'PRINCESS DIAMOND #39398077',
					              'thumb'=>$_img_url.'EO_WBC_Img/Products/princess.jpg',
					              'content'=>'',
					              'regular_price'=>'',
					              'sale_price'=>'',
					              'price'=>'',
					              'type'=>'variable', //simple | variable
					              'category'=>array('eo_diamond_shape_cat','eo_diamond_princess_shape_cat'),
					              'attribute'=>array('pa_eo_carat_attr'=>array(
					                                  'name'=>'pa_eo_carat_attr',
					                                  'value'=>'0.50|0.70|0.90',
					                                  'position'=>0,
					                                  'is_visible'=>1,
					                                  'is_variation'=>1,
					                                  'is_taxonomy'=>1
					                                ),
					                        'pa_eo_clarity_attr'=>array(
					                                  'name'=>'pa_eo_clarity_attr',
					                                  'value'=>'IF|VS1|VS2',
					                                  'position'=>1,
					                                  'is_visible'=>1,
					                                  'is_variation'=>1,
					                                  'is_taxonomy'=>1
					                                ),
					                        'pa_eo_colour_attr'=>array(
					                                  'name'=>'pa_eo_colour_attr',
					                                  'value'=>'F|E|H',
					                                  'position'=>2,
					                                  'is_visible'=>1,
					                                  'is_variation'=>1,
					                                  'is_taxonomy'=>1
					                                ),
					                        'pa_eo_size_attr'=>array(
					                                  'name'=>'pa_eo_size_attr',
					                                  'value'=>'0.3|0.5|0.7',
					                                  'position'=>3,
					                                  'is_visible'=>1,
					                                  'is_variation'=>1,
					                                  'is_taxonomy'=>1
					                                ),
					                        'pa_eo_grading_report_attr'=>array(
					                                  'name'=>'pa_eo_grading_report_attr',
					                                  'value'=>'GIA|HRD|IGI',
					                                  'position'=>4,
					                                  'is_visible'=>1,
					                                  'is_variation'=>1,
					                                  'is_taxonomy'=>1
					                                ),
					                        'pa_eo_fluorescence_attr'=>array(
					                                  'name'=>'pa_eo_fluorescence_attr',
					                                  'value'=>'Slight|Faint|Very',
					                                  'position'=>5,
					                                  'is_visible'=>1,
					                                  'is_variation'=>1,
					                                  'is_taxonomy'=>1
					                                ),
					                        'pa_eo_polish_attr'=>array(
					                                  'name'=>'pa_eo_polish_attr',
					                                  'value'=>'Excellent|Good|Fair',
					                                  'position'=>6,
					                                  'is_visible'=>1,
					                                  'is_variation'=>1,
					                                  'is_taxonomy'=>1
					                                ),
					                        'pa_eo_symmertry_attr'=>array(
					                                  'name'=>'pa_eo_symmertry_attr',
					                                  'value'=>'Excellent|Very Good|Good',
					                                  'position'=>7,
					                                  'is_visible'=>1,
					                                  'is_variation'=>1,
					                                  'is_taxonomy'=>1
					                                )
					                        ),
					              'variation'=>array(
					                              array(
					                                'regular_price'=>'1890',
					                                'price'=>'1800',
					                                'terms'=>array('pa_eo_carat_attr'=>'0.50','pa_eo_clarity_attr'=>'IF','pa_eo_colour_attr'=>'F','pa_eo_size_attr'=>'0.3','pa_eo_grading_report_attr'=>'GIA','pa_eo_fluorescence_attr'=>'Slight','pa_eo_polish_attr'=>'Excellent','pa_eo_symmertry_attr'=>'Excellent')
					                              ),
					                              array(
					                                'regular_price'=>'1990',
					                                'price'=>'1900',
					                                'terms'=>array('pa_eo_carat_attr'=>'0.70','pa_eo_clarity_attr'=>'VS1','pa_eo_colour_attr'=>'E','pa_eo_size_attr'=>'0.5','pa_eo_grading_report_attr'=>'HRD','pa_eo_fluorescence_attr'=>'Faint','pa_eo_polish_attr'=>'Good','pa_eo_symmertry_attr'=>'Very Good')
					                              ),
					                              array(
					                                'regular_price'=>'2090',
					                                'price'=>'2000',
					                                'terms'=>array('pa_eo_carat_attr'=>'0.80','pa_eo_clarity_attr'=>'VS2','pa_eo_colour_attr'=>'H','pa_eo_size_attr'=>'0.7','pa_eo_grading_report_attr'=>'IGI','pa_eo_fluorescence_attr'=>'Very','pa_eo_polish_attr'=>'Fair','pa_eo_symmertry_attr'=>'Good')
					                              )
					                            )
					            ),
					            array(
					              'title'=>'Cusion Diamond #87671292',
					              'thumb'=>$_img_url.'EO_WBC_Img/Products/cusion.jpg',
					              'content'=>'',
					              'regular_price'=>'',
					              'sale_price'=>'',
					              'price'=>'',
					              'type'=>'variable', //simple | variable
					              'category'=>array('eo_diamond_shape_cat','eo_diamond_cushion_shape_cat'),
					              'attribute'=>array('pa_eo_carat_attr'=>array(
					                                  'name'=>'pa_eo_carat_attr',
					                                  'value'=>'0.06|0.08|1.0',
					                                  'position'=>0,
					                                  'is_visible'=>1,
					                                  'is_variation'=>1,
					                                  'is_taxonomy'=>1
					                                ),
					                        'pa_eo_clarity_attr'=>array(
					                                  'name'=>'pa_eo_clarity_attr',
					                                  'value'=>'VVS1|IF|VVS2',
					                                  'position'=>1,
					                                  'is_visible'=>1,
					                                  'is_variation'=>1,
					                                  'is_taxonomy'=>1
					                                ),
					                        'pa_eo_colour_attr'=>array(
					                                  'name'=>'pa_eo_colour_attr',
					                                  'value'=>'E|D|J',
					                                  'position'=>2,
					                                  'is_visible'=>1,
					                                  'is_variation'=>1,
					                                  'is_taxonomy'=>1
					                                ),
					                        'pa_eo_size_attr'=>array(
					                                  'name'=>'pa_eo_size_attr',
					                                  'value'=>'1.2|1.4|1.6',
					                                  'position'=>3,
					                                  'is_visible'=>1,
					                                  'is_variation'=>1,
					                                  'is_taxonomy'=>1
					                                ),
					                        'pa_eo_fluorescence_attr'=>array(
					                                  'name'=>'pa_eo_fluorescence_attr',
					                                  'value'=>'None|Faint|Slight',
					                                  'position'=>4,
					                                  'is_visible'=>1,
					                                  'is_variation'=>1,
					                                  'is_taxonomy'=>1
					                                ),
					                        'pa_eo_polish_attr'=>array(
					                                  'name'=>'pa_eo_polish_attr',
					                                  'value'=>'Excellent|Very Good|Good',
					                                  'position'=>5,
					                                  'is_visible'=>1,
					                                  'is_variation'=>1,
					                                  'is_taxonomy'=>1
					                                ),
					                        'pa_eo_symmertry_attr'=>array(
					                                  'name'=>'pa_eo_symmertry_attr',
					                                  'value'=>'Excellent|Very Good|Good',
					                                  'position'=>6,
					                                  'is_visible'=>1,
					                                  'is_variation'=>1,
					                                  'is_taxonomy'=>1
					                                ),
					                        'pa_eo_depth_attr'=>array(
					                                  'name'=>'pa_eo_depth_attr',
					                                  'value'=>'72|76|80',
					                                  'position'=>7,
					                                  'is_visible'=>1,
					                                  'is_variation'=>1,
					                                  'is_taxonomy'=>1
					                                ),
					                        'pa_eo_table_attr'=>array(
					                                  'name'=>'pa_eo_table_attr',
					                                  'value'=>'80|83|86',
					                                  'position'=>8,
					                                  'is_visible'=>1,
					                                  'is_variation'=>1,
					                                  'is_taxonomy'=>1
					                                ),
					                        ),
					              'variation'=>array(
					                              array(
					                                'regular_price'=>'1100',
					                                'price'=>'1000',
					                                'terms'=>array('pa_eo_carat_attr'=>'0.06','pa_eo_clarity_attr'=>'VVS1','pa_eo_colour_attr'=>'E','pa_eo_size_attr'=>'1.2','pa_eo_fluorescence_attr'=>'None','pa_eo_polish_attr'=>'Excellent','pa_eo_symmertry_attr'=>'Excellent','pa_eo_depth_attr'=>'72','pa_eo_table_attr'=>'80')
					                              ),
					                              array(
					                                'regular_price'=>'1200',
					                                'price'=>'1100',
					                                'terms'=>array('pa_eo_carat_attr'=>'0.08','pa_eo_clarity_attr'=>'IF','pa_eo_colour_attr'=>'E','pa_eo_size_attr'=>'1.4','pa_eo_fluorescence_attr'=>'Faint','pa_eo_polish_attr'=>'Very Good','pa_eo_symmertry_attr'=>'Very Good','pa_eo_depth_attr'=>'76','pa_eo_table_attr'=>'83')
					                              ),
					                              array(
					                                'regular_price'=>'1300',
					                                'price'=>'1200',
					                                'terms'=>array('pa_eo_carat_attr'=>'1.0','pa_eo_clarity_attr'=>'VVS2','pa_eo_colour_attr'=>'J','pa_eo_size_attr'=>'1.6','pa_eo_fluorescence_attr'=>'Slight','pa_eo_polish_attr'=>'Good','pa_eo_symmertry_attr'=>'Good','pa_eo_depth_attr'=>'80','pa_eo_table_attr'=>'86')
					                              )
					                            )
					            ),
					            array(
					              'title'=>'Heart Diamond #95296856',
					              'thumb'=>$_img_url.'EO_WBC_Img/Products/heart.jpg',
					              'content'=>'',
					              'regular_price'=>'',
					              'sale_price'=>'',
					              'price'=>'',
					              'type'=>'variable', //simple | variable
					              'category'=>array('eo_diamond_shape_cat','eo_diamond_heart_shape_cat'),
					              'attribute'=>array(
					                        'pa_eo_clarity_attr'=>array(
					                                  'name'=>'pa_eo_clarity_attr',
					                                  'value'=>'VS1|IF|VS2',
					                                  'position'=>0,
					                                  'is_visible'=>1,
					                                  'is_variation'=>1,
					                                  'is_taxonomy'=>1
					                                ),
					                        'pa_eo_colour_attr'=>array(
					                                  'name'=>'pa_eo_colour_attr',
					                                  'value'=>'J|D|K',
					                                  'position'=>1,
					                                  'is_visible'=>1,
					                                  'is_variation'=>1,
					                                  'is_taxonomy'=>1
					                                ),
					                        'pa_eo_grading_report_attr'=>array(
					                                  'name'=>'pa_eo_grading_report_attr',
					                                  'value'=>'GIA|AGS|HRD',
					                                  'position'=>2,
					                                  'is_visible'=>1,
					                                  'is_variation'=>1,
					                                  'is_taxonomy'=>1
					                                ),
					                        'pa_eo_carat_attr'=>array(
					                                  'name'=>'pa_eo_carat_attr',
					                                  'value'=>'0.05|0.07|0.09',
					                                  'position'=>3,
					                                  'is_visible'=>1,
					                                  'is_variation'=>1,
					                                  'is_taxonomy'=>1
					                                ),
					                        'pa_eo_fluorescence_attr'=>array(
					                                  'name'=>'pa_eo_fluorescence_attr',
					                                  'value'=>'Very|None|Faint',
					                                  'position'=>4,
					                                  'is_visible'=>1,
					                                  'is_variation'=>1,
					                                  'is_taxonomy'=>1
					                                ),
					                        'pa_eo_symmertry_attr'=>array(
					                                  'name'=>'pa_eo_symmertry_attr',
					                                  'value'=>'Excellent|Good|Very Good',
					                                  'position'=>5,
					                                  'is_visible'=>1,
					                                  'is_variation'=>1,
					                                  'is_taxonomy'=>1
					                                ),
					                        'pa_eo_polish_attr'=>array(
					                                  'name'=>'pa_eo_polish_attr',
					                                  'value'=>'Excellent|Fair|Very Good',
					                                  'position'=>6,
					                                  'is_visible'=>1,
					                                  'is_variation'=>1,
					                                  'is_taxonomy'=>1
					                                )
					                        ),
					              'variation'=>array(
					                              array(
					                                'regular_price'=>'120',
					                                'price'=>'115',
					                                'terms'=>array('pa_eo_clarity_attr'=>'VS1','pa_eo_colour_attr'=>'J','pa_eo_grading_report_attr'=>'GIA','pa_eo_carat_attr'=>'0.05','pa_eo_fluorescence_attr'=>'Very','pa_eo_symmertry_attr'=>'Excellent','pa_eo_polish_attr'=>'Excellent')
					                              ),
					                              array(
					                                'regular_price'=>'125',
					                                'price'=>'120',
					                                'terms'=>array('pa_eo_clarity_attr'=>'IF','pa_eo_colour_attr'=>'D','pa_eo_grading_report_attr'=>'AGS','pa_eo_carat_attr'=>'0.07','pa_eo_fluorescence_attr'=>'None','pa_eo_symmertry_attr'=>'Good','pa_eo_polish_attr'=>'Fair')
					                              ),
					                              array(
					                                'regular_price'=>'130',
					                                'price'=>'125',
					                                'terms'=>array('pa_eo_clarity_attr'=>'VS2','pa_eo_colour_attr'=>'K','pa_eo_grading_report_attr'=>'HRD','pa_eo_carat_attr'=>'0.09','pa_eo_fluorescence_attr'=>'Faint','pa_eo_symmertry_attr'=>'Very Good','pa_eo_polish_attr'=>'Very Good')
					                              )

					                            )
					            ),
					            array(
					              'title'=>'Marquise Diamond #16931364',
					              'thumb'=>$_img_url.'EO_WBC_Img/Products/marquise.jpg',
					              'content'=>'',
					              'regular_price'=>'',
					              'sale_price'=>'',
					              'price'=>'',
					              'type'=>'variable', //simple | variable
					              'category'=>array('eo_diamond_shape_cat','eo_diamond_marquise_shape_cat'),
					              'attribute'=>array('pa_eo_carat_attr'=>array(
					                                  'name'=>'pa_eo_carat_attr',
					                                  'value'=>'0.2|0.4|0.6',
					                                  'position'=>0,
					                                  'is_visible'=>1,
					                                  'is_variation'=>1,
					                                  'is_taxonomy'=>1
					                                ),
					                        'pa_eo_clarity_attr'=>array(
					                                  'name'=>'pa_eo_clarity_attr',
					                                  'value'=>'VVS1|IF|VVS2',
					                                  'position'=>1,
					                                  'is_visible'=>1,
					                                  'is_variation'=>1,
					                                  'is_taxonomy'=>1
					                                ),
					                        'pa_eo_colour_attr'=>array(
					                                  'name'=>'pa_eo_colour_attr',
					                                  'value'=>'H|L|M',
					                                  'position'=>2,
					                                  'is_visible'=>1,
					                                  'is_variation'=>1,
					                                  'is_taxonomy'=>1
					                                ),
					                        'pa_eo_grading_report_attr'=>array(
					                                  'name'=>'pa_eo_grading_report_attr',
					                                  'value'=>'GIA|HRD|AGS',
					                                  'position'=>3,
					                                  'is_visible'=>1,
					                                  'is_variation'=>1,
					                                  'is_taxonomy'=>1
					                                ),
					                        'pa_eo_fluorescence_attr'=>array(
					                                  'name'=>'pa_eo_fluorescence_attr',
					                                  'value'=>'None|Slight|Faint',
					                                  'position'=>4,
					                                  'is_visible'=>1,
					                                  'is_variation'=>1,
					                                  'is_taxonomy'=>1
					                                ),
					                        'pa_eo_symmertry_attr'=>array(
					                                  'name'=>'pa_eo_symmertry_attr',
					                                  'value'=>'Excellent|Good|Fair',
					                                  'position'=>5,
					                                  'is_visible'=>1,
					                                  'is_variation'=>1,
					                                  'is_taxonomy'=>1
					                                ),
					                        'pa_eo_polish_attr'=>array(
					                                  'name'=>'pa_eo_polish_attr',
					                                  'value'=>'Excellent|Good|Fair',
					                                  'position'=>6,
					                                  'is_visible'=>1,
					                                  'is_variation'=>1,
					                                  'is_taxonomy'=>1
					                                ),
					                        'pa_eo_depth_attr'=>array(
					                                  'name'=>'pa_eo_depth_attr',
					                                  'value'=>'57|59|61',
					                                  'position'=>7,
					                                  'is_visible'=>1,
					                                  'is_variation'=>1,
					                                  'is_taxonomy'=>1
					                                ),
					                        'pa_eo_table_attr'=>array(
					                                  'name'=>'pa_eo_table_attr',
					                                  'value'=>'77|79|81',
					                                  'position'=>8,
					                                  'is_visible'=>1,
					                                  'is_variation'=>1,
					                                  'is_taxonomy'=>1
					                                ),
					                        ),
					              'variation'=>array(
					                              array(
					                                'regular_price'=>'126',
					                                'price'=>'120',
					                                'terms'=>array('pa_eo_carat_attr'=>'0.2','pa_eo_clarity_attr'=>'VVS1','pa_eo_colour_attr'=>'H','pa_eo_grading_report_attr'=>'GIA','pa_eo_fluorescence_attr'=>'None','pa_eo_symmertry_attr'=>'Excellent','pa_eo_polish_attr'=>'Excellent','pa_eo_depth_attr'=>'57','pa_eo_table_attr'=>'77')
					                              ),
					                              array(
					                                'regular_price'=>'136',
					                                'price'=>'130',
					                                'terms'=>array('pa_eo_carat_attr'=>'0.4','pa_eo_clarity_attr'=>'IF','pa_eo_colour_attr'=>'L','pa_eo_grading_report_attr'=>'HRD','pa_eo_fluorescence_attr'=>'Slight','pa_eo_symmertry_attr'=>'Good','pa_eo_polish_attr'=>'Good','pa_eo_depth_attr'=>'59','pa_eo_table_attr'=>'79')
					                              ),
					                              array(
					                                'regular_price'=>'146',
					                                'price'=>'140',
					                                'terms'=>array('pa_eo_carat_attr'=>'0.6','pa_eo_clarity_attr'=>'VVS2','pa_eo_colour_attr'=>'M','pa_eo_grading_report_attr'=>'AGS','pa_eo_fluorescence_attr'=>'Faint','pa_eo_symmertry_attr'=>'Fair','pa_eo_polish_attr'=>'Fair','pa_eo_depth_attr'=>'61','pa_eo_table_attr'=>'81')
					                              )
					                            )
					            ),
					            array(
					              'title'=>'Oval Diamond #75138961',
					              'thumb'=>$_img_url.'EO_WBC_Img/Products/oval.jpg',
					              'content'=>'',
					              'regular_price'=>'',
					              'sale_price'=>'',
					              'price'=>'',
					              'type'=>'variable', //simple | variable
					              'category'=>array('eo_diamond_shape_cat','eo_diamond_oval_shape_cat'),
					              'attribute'=>array('pa_eo_carat_attr'=>array(
					                                  'name'=>'pa_eo_carat_attr',
					                                  'value'=>'0.6|0.8|1.0',
					                                  'position'=>0,
					                                  'is_visible'=>1,
					                                  'is_variation'=>1,
					                                  'is_taxonomy'=>1
					                                ),
					                        'pa_eo_clarity_attr'=>array(
					                                  'name'=>'pa_eo_clarity_attr',
					                                  'value'=>'VS1|IF|VS2',
					                                  'position'=>1,
					                                  'is_visible'=>1,
					                                  'is_variation'=>1,
					                                  'is_taxonomy'=>1
					                                ),
					                        'pa_eo_colour_attr'=>array(
					                                  'name'=>'pa_eo_colour_attr',
					                                  'value'=>'G|L|K',
					                                  'position'=>2,
					                                  'is_visible'=>1,
					                                  'is_variation'=>1,
					                                  'is_taxonomy'=>1
					                                ),
					                        'pa_eo_grading_report_attr'=>array(
					                                  'name'=>'pa_eo_grading_report_attr',
					                                  'value'=>'GIA|HRD|AGS',
					                                  'position'=>3,
					                                  'is_visible'=>1,
					                                  'is_variation'=>1,
					                                  'is_taxonomy'=>1
					                                ),
					                        'pa_eo_fluorescence_attr'=>array(
					                                  'name'=>'pa_eo_fluorescence_attr',
					                                  'value'=>'Slight|None|Faint',
					                                  'position'=>4,
					                                  'is_visible'=>1,
					                                  'is_variation'=>1,
					                                  'is_taxonomy'=>1
					                                ),
					                        'pa_eo_polish_attr'=>array(
					                                  'name'=>'pa_eo_polish_attr',
					                                  'value'=>'Excellent|Good|Fair',
					                                  'position'=>5,
					                                  'is_visible'=>1,
					                                  'is_variation'=>1,
					                                  'is_taxonomy'=>1
					                                ),
					                        'pa_eo_symmertry_attr'=>array(
					                                  'name'=>'pa_eo_symmertry_attr',
					                                  'value'=>'Excellent|Very Good|Fair',
					                                  'position'=>6,
					                                  'is_visible'=>1,
					                                  'is_variation'=>1,
					                                  'is_taxonomy'=>1
					                                ),
					                        'pa_eo_depth_attr'=>array(
					                                  'name'=>'pa_eo_depth_attr',
					                                  'value'=>'57|59|61',
					                                  'position'=>7,
					                                  'is_visible'=>1,
					                                  'is_variation'=>1,
					                                  'is_taxonomy'=>1
					                                ),
					                        'pa_eo_table_attr'=>array(
					                                  'name'=>'pa_eo_table_attr',
					                                  'value'=>'81|83|85',
					                                  'position'=>8,
					                                  'is_visible'=>1,
					                                  'is_variation'=>1,
					                                  'is_taxonomy'=>1
					                                )
					                        ),
					              'variation'=>array(
					                              array(
					                                'regular_price'=>'126',
					                                'price'=>'120',
					                                'terms'=>array('pa_eo_carat_attr'=>'0.6','pa_eo_clarity_attr'=>'VS1','pa_eo_colour_attr'=>'G','pa_eo_grading_report_attr'=>'GIA','pa_eo_fluorescence_attr'=>'Slight','pa_eo_polish_attr'=>'Excellent','pa_eo_symmertry_attr'=>'Excellent','pa_eo_depth_attr'=>'57','pa_eo_table_attr'=>'81')
					                              ),
					                              array(
					                                'regular_price'=>'136',
					                                'price'=>'130',
					                                'terms'=>array('pa_eo_carat_attr'=>'0.8','pa_eo_clarity_attr'=>'IF','pa_eo_colour_attr'=>'L','pa_eo_grading_report_attr'=>'HRD','pa_eo_fluorescence_attr'=>'None','pa_eo_polish_attr'=>'Good','pa_eo_symmertry_attr'=>'Very Good','pa_eo_depth_attr'=>'59','pa_eo_table_attr'=>'83')
					                              ),
					                              array(
					                                'regular_price'=>'146',
					                                'price'=>'140',
					                                'terms'=>array('pa_eo_carat_attr'=>'1.0','pa_eo_clarity_attr'=>'VS2','pa_eo_colour_attr'=>'K','pa_eo_grading_report_attr'=>'AGS','pa_eo_fluorescence_attr'=>'Faint','pa_eo_polish_attr'=>'Fair','pa_eo_symmertry_attr'=>'Fair','pa_eo_depth_attr'=>'61','pa_eo_table_attr'=>'85')
					                              )
					                            )
					            ),
					            array(
					              'title'=>'Radiant Solitaire Diamond #59218358',
					              'thumb'=>$_img_url.'EO_WBC_Img/Products/radiant.jpg',
					              'content'=>'',
					              'regular_price'=>'',
					              'sale_price'=>'',
					              'price'=>'',
					              'type'=>'variable', //simple | variable
					              'category'=>array('eo_diamond_shape_cat','eo_diamond_radiant_shape_cat'),
					              'attribute'=>array('pa_eo_clarity_attr'=>array(
					                                  'name'=>'pa_eo_clarity_attr',
					                                  'value'=>'IF|SI1|VS2',
					                                  'position'=>0,
					                                  'is_visible'=>1,
					                                  'is_variation'=>1,
					                                  'is_taxonomy'=>1
					                                  ),
					                                  'pa_eo_carat_attr'=>array(
					                                    'name'=>'pa_eo_carat_attr',
					                                    'value'=>'0.1|0.3|0.5',
					                                    'position'=>1,
					                                    'is_visible'=>1,
					                                    'is_variation'=>1,
					                                    'is_taxonomy'=>1
					                                  ),
					                                  'pa_eo_grading_report_attr'=>array(
					                                    'name'=>'pa_eo_grading_report_attr',
					                                    'value'=>'IGI|GIA|HRD',
					                                    'position'=>2,
					                                    'is_visible'=>1,
					                                    'is_variation'=>1,
					                                    'is_taxonomy'=>1
					                                  ),
					                                  'pa_eo_colour_attr'=>array(
					                                  'name'=>'pa_eo_colour_attr',
					                                  'value'=>'K|L|J',
					                                  'position'=>2,
					                                  'is_visible'=>1,
					                                  'is_variation'=>1,
					                                  'is_taxonomy'=>1
					                                ),
					                                  'pa_eo_fluorescence_attr'=>array(
					                                  'name'=>'pa_eo_fluorescence_attr',
					                                  'value'=>'None|Slight|Faint',
					                                  'position'=>4,
					                                  'is_visible'=>1,
					                                  'is_variation'=>1,
					                                  'is_taxonomy'=>1
					                                ),
					                                'pa_eo_polish_attr'=>array(
					                                  'name'=>'pa_eo_polish_attr',
					                                  'value'=>'Excellent|Good|Fair',
					                                  'position'=>5,
					                                  'is_visible'=>1,
					                                  'is_variation'=>1,
					                                  'is_taxonomy'=>1
					                                ),
					                                'pa_eo_symmertry_attr'=>array(
					                                  'name'=>'pa_eo_symmertry_attr',
					                                  'value'=>'Excellent|Very Good|Fair',
					                                  'position'=>6,
					                                  'is_visible'=>1,
					                                  'is_variation'=>1,
					                                  'is_taxonomy'=>1
					                                ),
					                                'pa_eo_depth_attr'=>array(
					                                  'name'=>'pa_eo_depth_attr',
					                                  'value'=>'75|77|79',
					                                  'position'=>7,
					                                  'is_visible'=>1,
					                                  'is_variation'=>1,
					                                  'is_taxonomy'=>1
					                                ),
					                                'pa_eo_table_attr'=>array(
					                                  'name'=>'pa_eo_table_attr',
					                                  'value'=>'78|80|82',
					                                  'position'=>8,
					                                  'is_visible'=>1,
					                                  'is_variation'=>1,
					                                  'is_taxonomy'=>1
					                                )
					                        ),
					              'variation'=>array(
					                              array(
					                                'regular_price'=>'257',
					                                'price'=>'250',
					                                'terms'=>array('pa_eo_clarity_attr'=>'IF','pa_eo_carat_attr'=>'0.1','pa_eo_grading_report_attr'=>'IGI','pa_eo_colour_attr'=>'K','pa_eo_fluorescence_attr'=>'None','pa_eo_polish_attr'=>'Excellent','pa_eo_symmertry_attr'=>'Excellent','pa_eo_depth_attr'=>'75','pa_eo_table_attr'=>'78')
					                              ),
					                              array(
					                                'regular_price'=>'267',
					                                'price'=>'260',
					                                'terms'=>array('pa_eo_clarity_attr'=>'SI1','pa_eo_carat_attr'=>'0.3','pa_eo_grading_report_attr'=>'GIA','pa_eo_colour_attr'=>'L','pa_eo_fluorescence_attr'=>'Slight','pa_eo_polish_attr'=>'Good','pa_eo_symmertry_attr'=>'Very Good','pa_eo_depth_attr'=>'77','pa_eo_table_attr'=>'80')
					                              ),
					                              array(
					                                'regular_price'=>'277',
					                                'price'=>'270',
					                                'terms'=>array('pa_eo_clarity_attr'=>'VS2','pa_eo_carat_attr'=>'0.5','pa_eo_grading_report_attr'=>'HRD','pa_eo_colour_attr'=>'J','pa_eo_fluorescence_attr'=>'Faint','pa_eo_polish_attr'=>'Fair','pa_eo_symmertry_attr'=>'Fair','pa_eo_depth_attr'=>'79','pa_eo_table_attr'=>'82')
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
			update_post_meta( $product_id, '_product_attributes', $product['attribute'] );

			foreach ($product['attribute'] as $attr_index => $attribute) {
				wp_set_object_terms( $product_id, explode('|',$attribute['value']) , $attr_index );						
			}
			
			$img_id=$this->add_image_gallary($product['thumb']);
			if($img_id){	
				set_post_thumbnail( $product_id,$img_id );
			}

			$parent_id = $product_id;

			foreach ($product['variation'] as $var_index => $variation) {						

				$variation_data = array(
				    'post_title'   => $product['title'],
				    'post_name'   => 'product-'.$parent_id.'-variation',						    
				    'post_status'  => 'publish',
				    'post_parent'  => $parent_id,
				    'post_type'    => 'product_variation',
				    'guid'        => wc_get_product($parent_id)->get_permalink()
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

    					$term_slug = get_term_by('name', $term_name, $taxonomy )->slug;
    					
    					update_post_meta( $variation_id, 'attribute_'.$taxonomy, $term_slug );								
					}						
					WC_Product_Variable::sync($parent_id);
				}

			    $variation_obj->save(); // Save the data
			}

			return TRUE;
		}	

		public function create_products($args) {			
			
			if(!empty($args) || is_array($args)) {


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

					foreach ($product['variation'] as $var_index => $variation) {						

						$variation_data = array(
						    'post_title'   => $product['title'],
						    'post_name'   => 'product-'.$parent_id.'-variation',						    
						    'post_status'  => 'publish',
						    'post_parent'  => $parent_id,
						    'post_type'    => 'product_variation',
						    'guid'        => wc_get_product($parent_id)->get_permalink()
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

            					$term_slug = get_term_by('name', $term_name, $taxonomy )->slug;
            					
            					update_post_meta( $variation_id, 'attribute_'.$taxonomy, $term_slug );								
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
			    	if(isset($id['term_id'])){
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
			
			global $wpdb;
			if(!empty($args) && is_array($args)){

				foreach ($args as $map) {
					$first=get_term_by($map[0][0],$map[0][1],$map[0][2])->term_taxonomy_id;
					$second=get_term_by($map[1][0],$map[1][1],$map[1][2])->term_taxonomy_id;
					$discount='0';

					if(!empty($map[0] && !empty($map[1]))) {

						if(!$wpdb->get_var("select * from {$wpdb->prefix}eo_wbc_cat_maps where first_cat_id in ('{$first}','{$second}') and second_cat_id in ('{$first}','{$second}')"))
				        {				            
				            if($wpdb->insert($wpdb->prefix.'eo_wbc_cat_maps',array('first_cat_id'=>$first,'second_cat_id'=>$second,'discount'=>$discount.'%'),array("%s","%s","%s")))
				            {
				                update_option('eo_wbc_config_map',"1");			                            
				            }  				            
				        }
					}
				}
			}
			
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
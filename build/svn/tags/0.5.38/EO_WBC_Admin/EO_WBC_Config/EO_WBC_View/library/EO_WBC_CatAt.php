<?php

if(!class_exists('EO_WBC_CatAt')){
	/**
	 * Class to create product category, attribute and add them to the products
	 */
	class EO_WBC_CatAt {

		function __construct(){
			$_img_url=EO_WBC_PLUGIN_DIR.'EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/';
			$this->gallay_img = $_img_url. 'EO_WBC_Img/Products/';
			$this->product=array(
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
			      'thumb'=>$_img_url.'EO_WBC_Img/Products/Marquise-1.jpg',
			      'images'=>array('Marquise-2.jpg'),
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
			    //copy--1
			    array(
			      'title'=>'Setting #10000001',
			      'thumb'=>$_img_url.'EO_WBC_Img/Products/Ring-round-1.jpg',
			      'images'=>array('Ring-round-2.jpg','Ring-round-3.jpg'),
			      'content'=>'',
			      'regular_price'=>'',
			      'sale_price'=>'',
			      'price'=>'',
			      'type'=>'variable', //simple | variable
			      'category'=>array('eo_setting_shape_cat','eo_diamond_round_shape_cat','eo_ring_style_cat','eo_metal_cat','eo_ring_pave_cat','eo_metal_18k_white_gold_cat','eo_metal_18k_yellow_gold_cat','eo_metal_18k_rose_gold_cat'),
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
			      'thumb'=>$_img_url.'EO_WBC_Img/Products/Marquise-1.jpg',
			      'images'=>array('Marquise-2.jpg'),
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
			    //Copy2
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
			      'thumb'=>$_img_url.'EO_WBC_Img/Products/Marquise-1.jpg',
			      'images'=>array('Marquise-2.jpg'),
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
			    //copy3
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
			      'thumb'=>$_img_url.'EO_WBC_Img/Products/Marquise-1.jpg',
			      'images'=>array('Marquise-2.jpg'),
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
			    //copy4
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
			      'thumb'=>$_img_url.'EO_WBC_Img/Products/Marquise-1.jpg',
			      'images'=>array('Marquise-2.jpg'),
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
			    //copy5
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
			      'thumb'=>$_img_url.'EO_WBC_Img/Products/Marquise-1.jpg',
			      'images'=>array('Marquise-2.jpg'),
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
			      'thumb'=>$_img_url.'EO_WBC_Img/Products/Heart-1.jpg',
			      'images'=>array('Heart-2.jpg','Heart-3.jpg'),
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
			      'thumb'=>$_img_url.'EO_WBC_Img/Products/Radiant-1.jpg',
			      'images'=>array('Radiant-2.jpg'),
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
			    //d-copy1
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
			      'title'=>'Heart Diamond #10000055',
			      'thumb'=>$_img_url.'EO_WBC_Img/Products/Heart-1.jpg',
			      'images'=>array('Heart-2.jpg','Heart-3.jpg'),
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
			      'title'=>'Radiant Solitaire Diamond #10000058',
			      'thumb'=>$_img_url.'EO_WBC_Img/Products/Radiant-1.jpg',
			      'images'=>array('Radiant-2.jpg'),
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
			    ),
			    array(
			      'title'=>'Pear Diamond #10000097',
			      'thumb'=>$_img_url.'EO_WBC_Img/Products/Pear-1.jpg',
			      'images'=>array('Pear-2.jpg','Pear-3.jpg'),
			      'content'=>'',
			      'regular_price'=>'',
			      'sale_price'=>'',
			      'price'=>'',
			      'type'=>'variable', //simple | variable
			      'category'=>array('eo_diamond_shape_cat','eo_diamond_pear_shape_cat'),
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
			    //d-copy2
			    array(
			      'title'=>'Round Diamond #10000059',
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
			      'title'=>'Emerald Diamond #10000060',
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
			      'title'=>'Asscher Diamond #10000061',
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
			      'title'=>'PRINCESS DIAMOND #10000062',
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
			      'title'=>'Cusion Diamond #10000063',
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
			      'title'=>'Heart Diamond #10000064',
			      'thumb'=>$_img_url.'EO_WBC_Img/Products/Heart-1.jpg',
			      'images'=>array('Heart-2.jpg','Heart-3.jpg'),
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
			      'title'=>'Marquise Diamond #10000065',
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
			      'title'=>'Radiant Solitaire Diamond #10000068',
			      'thumb'=>$_img_url.'EO_WBC_Img/Products/Radiant-1.jpg',
			      'images'=>array('Radiant-2.jpg'),
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
			    ),
			    array(
			      'title'=>'Pear Diamond #10000098',
			      'thumb'=>$_img_url.'EO_WBC_Img/Products/Pear-1.jpg',
			      'images'=>array('Pear-2.jpg','Pear-3.jpg'),
			      'content'=>'',
			      'regular_price'=>'',
			      'sale_price'=>'',
			      'price'=>'',
			      'type'=>'variable', //simple | variable
			      'category'=>array('eo_diamond_shape_cat','eo_diamond_pear_shape_cat'),
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
			    //d-copy3
			    array(
			      'title'=>'Round Diamond #10000069',
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
			      'title'=>'Emerald Diamond #10000070',
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
			      'title'=>'Asscher Diamond #10000071',
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
			      'title'=>'PRINCESS DIAMOND #10000072',
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
			      'title'=>'Cusion Diamond #10000073',
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
			      'title'=>'Heart Diamond #10000074',
			      'thumb'=>$_img_url.'EO_WBC_Img/Products/Heart-1.jpg',
			      'images'=>array('Heart-2.jpg','Heart-3.jpg'),
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
			      'title'=>'Marquise Diamond #10000075',
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
			      'title'=>'Oval Diamond #10000076',
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
			      'title'=>'Radiant Solitaire Diamond #10000077',
			      'thumb'=>$_img_url.'EO_WBC_Img/Products/Radiant-1.jpg',
			      'images'=>array('Radiant-2.jpg'),
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
			    //d-copy4
			    array(
			      'title'=>'Round Diamond #10000078',
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
			      'title'=>'Emerald Diamond #10000079',
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
			      'title'=>'Asscher Diamond #10000080',
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
			      'title'=>'PRINCESS DIAMOND #10000081',
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
			      'title'=>'Cusion Diamond #10000082',
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
			      'title'=>'Heart Diamond #10000083',
			      'thumb'=>$_img_url.'EO_WBC_Img/Products/Heart-1.jpg',
			      'images'=>array('Heart-2.jpg','Heart-3.jpg'),
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
			      'title'=>'Marquise Diamond #10000084',
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
			      'title'=>'Oval Diamond #10000085',
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
			      'title'=>'Radiant Solitaire Diamond #10000086',
			      'thumb'=>$_img_url.'EO_WBC_Img/Products/Radiant-1.jpg',
			      'images'=>array('Radiant-2.jpg'),
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
			    ),
			    array(
			      'title'=>'Pear Diamond #10000100',
			      'thumb'=>$_img_url.'EO_WBC_Img/Products/Pear-1.jpg',
			      'images'=>array('Pear-2.jpg','Pear-3.jpg'),
			      'content'=>'',
			      'regular_price'=>'',
			      'sale_price'=>'',
			      'price'=>'',
			      'type'=>'variable', //simple | variable
			      'category'=>array('eo_diamond_shape_cat','eo_diamond_pear_shape_cat'),
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
			    //d-copy5
			    array(
			      'title'=>'Round Diamond #10000087',
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
			      'title'=>'Emerald Diamond #10000088',
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
			      'title'=>'Asscher Diamond #10000089',
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
			      'title'=>'PRINCESS DIAMOND #10000090',
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
			      'title'=>'Cusion Diamond #10000091',
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
			      'title'=>'Heart Diamond #10000092',
			      'thumb'=>$_img_url.'EO_WBC_Img/Products/Heart-1.jpg',
			      'images'=>array('Heart-2.jpg','Heart-3.jpg'),
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
			      'title'=>'Marquise Diamond #10000093',
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
			      'title'=>'Oval Diamond #10000094',
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
			      'title'=>'Radiant Solitaire Diamond #10000095',
			      'thumb'=>$_img_url.'EO_WBC_Img/Products/Radiant-1.jpg',
			      'images'=>array('Radiant-2.jpg'),
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
			    ),
			    array(
			      'title'=>'Pear Diamond #10000096',
			      'thumb'=>$_img_url.'EO_WBC_Img/Products/Pear-1.jpg',
			      'images'=>array('Pear-2.jpg','Pear-3.jpg'),
			      'content'=>'',
			      'regular_price'=>'',
			      'sale_price'=>'',
			      'price'=>'',
			      'type'=>'variable', //simple | variable
			      'category'=>array('eo_diamond_shape_cat','eo_diamond_pear_shape_cat'),
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
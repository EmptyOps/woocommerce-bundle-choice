<?php 
class EO_WBC_Filter_Widget {

	function __construct()
	{	        		
		$this->_category=$this->eo_wbc_get_category();
		if(!empty($this->_category)){
		
			$this->get_widget();		
			$this->eo_wbc_filter_enque_asset();

		} else {

			EO_WBC_Log_Message("Could not find current category in EO_WBC_Frontend\EO_WBC_Filter_Widget.php");
		}
	}

	public function eo_wbc_filter_enque_asset()
	{
		$current_category=$this->_category;
		$site_url=site_url();

		wp_enqueue_script('jquery');	
		wp_dequeue_script('jquery-ui-core');
		wp_deregister_script('jquery-ui-core');

		add_action( 'wp_footer',function(){



		$fg_color=wc()->session->get('EO_WBC_BG_COLOR','#357DFD');

		$active_color=get_option('eo_wbc_active_breadcrumb_color',$fg_color);
		//wp-head here....
		echo "<style>		
				.loading{												
					background-image:url(".plugin_dir_url(__FILE__)."icon/spinner.gif);
					background-color: rgba(255,255,255, 0.6);				    	
					background-position: center center;
					background-repeat: no-repeat;	    				    
				    margin: 0;
				    position:fixed;				    
				    top:0;
				    left:0;				    
				    z-index: 10000;				    				    
				    width: 100%;
				    height: 100%;				
				}			
				.ui.grid.container.mobile.only{
					padding-bottom: 0px !important;
					margin-left: 0px !important;
					margin-right: 0px !important;
					margin-top: 0px !important;
				}
				.ui.styled.fluid.accordion{
					padding:0px !important;
				}
				
				@media only screen and (max-width: 768px) {
					.ui.segments>.ui.segment{
						padding-left:0px !important;
						padding-right:0px !important;
						padding-top:0px !important;
					}
				}
				.ui.slider:not(.vertical):not(.checkbox){
					width:auto !important;
					padding: 1em 1em !important;
				}
				.ui.range.slider.text_slider{
					padding-top:0px !important;
				}							
				.ui.tiny.images{
					margin-top: 1em;
				}
				.ui.header{
					z-index: 0 !important;
				}				
				.eo-wbc-container.filters{
					text-align:left;
				}
				
				/*Modifications............................*/
				#eo_wbc_filter_table th{
					background-color: {$active_color} !important;
				}

				.ui.slider .inner .track-fill,.ui.slider .inner .thumb{
					background-color: {$active_color} !important;	
				}								

				.ui-widget-header{
					border: 1px solid {$active_color} !important;
				    background: {$active_color} !important;
				    color: {$active_color} !important;				    
				}				

				.ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default, .ui-button, html .ui-button.ui-state-disabled:hover, html .ui-button.ui-state-disabled:active{
					    border: 1px solid {$active_color} !important;
					    background: {$active_color} !important;
				}

				.ui-widget.ui-widget-content{
					 border: 1px solid {$active_color} !important;
					 background: {$active_color} !important;
				}
				.eo_wbc_filter_icon_select{
					border-bottom:2px solid {$active_color} !important;
				}				
				.eo_wbc_filter_icon:hover:not(.none_editable){
					border-bottom:2px solid ".get_option('eo_wbc_filter_config_slidernode_color',$active_color)." !important;						
				}
				.ui.button.primary{
					background-color:{$active_color} !important;
				}								

				.ui.slider .inner .track-fill{
					background-color:".get_option('eo_wbc_filter_config_slidertrack_color','')." !important;
				}				
				.ui.slider .inner .thumb {
					background-color:".get_option('eo_wbc_filter_config_slidernode_color','')." !important;
				}
				.eo-wbc-container.filters{
					font-family:".get_option('eo_wbc_filter_config_font_family','')." !important;
				}
				.eo-wbc-container.filters .ui.styled.accordion .title,.eo-wbc-container.filters .ui.header{
					color:".get_option('eo_wbc_filter_config_header_color','')." !important;
				}
				.eo-wbc-container.filters .eo_wbc_filter_icon,.eo-wbc-container.filters .slider .label,.eo-wbc-container.filters input{
					color:".get_option('eo_wbc_filter_config_label_color','')." !important;
				}
				.eo_wbc_filter_icon.ui.image{
					width:fit-content"./*get_option('eo_wbc_filter_config_icon_size','min-content').*/" !important;
					font-size:".get_option('eo_wbc_filter_config_icon_label_size','0.78571429rem')." !important;
					cursor:pointer;
				}
				.eo_wbc_filter_icon.ui.image img{
					width:".get_option('eo_wbc_filter_config_icon_size','min-content')." !important;
					margin:auto auto;
				}
				
				/*Modifications............................*/
			</style>";	

        }, 10 );

        wp_register_script('eo_wbc_filter_js',plugins_url('js/eo_wbc_filter.js',__FILE__),array('jquery'));
        
        wp_localize_script('eo_wbc_filter_js','eo_wbc_object',array(
        					'eo_product_url'=>$this->product_url(),
        					//'eo_view_tabular'=>($current_category=='solitaire'?1:0),
        					'disp_regular'=>get_option('eo_wbc_e_tabview_status',false)?1:0,
        					'eo_admin_ajax_url'=>$site_url."/wp-admin/admin-ajax.php",
        					'eo_part_site_url'=>$site_url.'/product/',
        					'eo_part_end_url'=>'/'.$this->product_url(),
        					'eo_cat_site_url'=>$site_url."/product-category/".$current_category,
        					'eo_cat_query'=>'/?'.http_build_query($_GET)
        				));            

        wp_enqueue_script('eo_wbc_filter_js');
        
	}		

	public function product_url() {
		$url='?EO_WBC=1'.
            '&BEGIN='.sanitize_text_field($_GET['BEGIN']).
            '&STEP='.sanitize_text_field($_GET['STEP']).                            
            '&FIRST='.
            (
                $this->_category==get_option('eo_wbc_first_slug') 
                    ?
                ''
                    :
                (
                    !empty($_GET['FIRST'])
                        ? 
                    sanitize_text_field( $_GET['FIRST'])
                        :
                    ''
                )
            ).
            '&SECOND='.
            (
                $this->_category==get_option('eo_wbc_second_slug')
                    ?
                ''
                    :
                (
                    !empty($_GET['SECOND'])
                        ?
                    sanitize_text_field($_GET['SECOND'])
                        :
                    ''
                )
            );
        return $url;
	}

	//Returns minimum value and maximum value of range;
	public function range_min_max($id,$title='',$filter_type=0) {
		
		$field_title='';	
		$field_slug='';
		$min_value=array("id"=>'',"slug"=>'',"name"=>"0","type"=>'');
		$max_value=array("id"=>'',"slug"=>'',"name"=>"0","type"=>'');
		$seprator = '.';
		if ($filter_type) {

			$term=EO_WBC_Support::eo_wbc_get_attribute($id);

			if(!empty($term) && !is_wp_error($term)){

				$field_title=empty($title)?$term->name:$title;		

				$field_slug=$term->slug;			

				$taxonomies=get_terms(array('taxonomy'=>wc_attribute_taxonomy_name_by_id($term->id),'hide_empty'=>false));

				if(is_wp_error($taxonomies) or empty($taxonomies)){
					$taxonomies=get_terms(wc_attribute_taxonomy_name_by_id($term->id),array('hide_empty'=>false));
				}

				if( is_wp_error($taxonomies) or empty($taxonomies) ) return false;

				$min_value=array("id"=>$taxonomies[0]->term_id,"slug"=>$taxonomies[0]->slug,"name"=>str_replace(',','.',$taxonomies[0]->name),"type"=>'attr');
				$max_value=array("id"=>$taxonomies[0]->term_id,"slug"=>$taxonomies[0]->slug,"name"=>str_replace(',','.',$taxonomies[0]->name),"type"=>'attr');

				foreach ($taxonomies as $taxonomy){
					if(str_replace(',','.',$taxonomy->name) < str_replace(',','.',$min_value['name'])){
						$min_value=array("id"=>$taxonomy->term_id,"slug"=>$taxonomy->slug,"name"=>str_replace(',','.',$taxonomy->name),"type"=>'attr');
						//To markdown if coma is used as seperator of in numeric value.
						if(strpos($taxonomy->name,',')!==false){
							$seprator = ',';
						}
					}

					if(str_replace(',','.',$taxonomy->name) > str_replace(',','.',$max_value['name'])){
						$max_value=array("id"=>$taxonomy->term_id,"slug"=>$taxonomy->slug,"name"=>str_replace(',','.',$taxonomy->name),"type"=>'attr');
						//To markdown if coma is used as seperator of in numeric value.
						if(strpos($taxonomy->name,',')!==false){
							$seprator = ',';
						}
					}				                	  	
	        	}
		        
			} else {
				return false;
			}			
		}		
		else {

			$category=get_term_by('id',$id,'product_cat');

			if(!empty($category) && !is_wp_error($category)){

				$field_title=empty($title)?$category->name:$title;
				$field_slug=$category->slug;

				$sub_categories = get_categories(array(
		            'hierarchical' => 1,
		            'show_option_none' => '',
		            'hide_empty' => false,
		            'parent' => $id,
		            'taxonomy' => 'product_cat'
		        ));

				if( is_wp_error($sub_categories) or empty($sub_categories) ) return false;				

		        $min_value=array("id"=>$sub_categories[0]->term_id,"slug"=>$sub_categories[0]->slug,"name"=>$sub_categories[0]->name,"type"=>'cat');
				$max_value=array("id"=>$sub_categories[0]->term_id,"slug"=>$sub_categories[0]->slug,"name"=>$sub_categories[0]->name,"type"=>'cat');
				
		        foreach ($sub_categories as $sub_category) {

		        	if($sub_category->name < $min_value['name']){
						$min_value=array("id"=>$sub_category->term_id,"slug"=>$sub_category->slug,"name"=>$sub_category->name,"type"=>'cat');
					}

					if($sub_category->name > $max_value['name']){
						$max_value=array("id"=>$sub_category->term_id,"slug"=>$sub_category->slug,"name"=>$sub_category->name,"type"=>'cat');
					}
		        }			
			   
		    } else {
		    	return false;
		    }
		}		
		return array('min_value'=>$min_value,'max_value'=>$max_value,'title'=>$field_title,'slug'=>$field_slug,'seprator'=>$seprator);
	}
	
	public function get_width_class($percent_value){
		if(empty($this->width_class)){
			$this->width_class = array( '1' =>'one wide column',
										'2' => 'two wide column',
										'3' => 'three wide column',
										'4' => 'four wide column',
										'5' => 'five wide column',
										'6' => 'six wide column',
										'7' => 'seven wide column',
										'8' => 'eight wide column',
										'9' => 'nine wide column',
										'10' => 'ten wide column',
										'11' => 'eleven wide column',
										'12' => 'twelve wide column',
										'13' => 'thirteen wide column',
										'14' => 'fourteen wide column',
										'15' => 'fifteen wide column',
										'16' => 'sixteen wide column',
									 );

		}
		return $this->width_class[($percent_value/(100/16))];
	}

	//Generate text slider/ non-labeled sliders
	public function input_text_slider($id,$title,$filter_type,$desktop=1,$width='50') {
		$filter=$this->range_min_max($id,$title,$filter_type);						
		if(!$filter) return false;		

		array_push($this->__filters,array(
										"type"=>"hidden",
										"name"=>"min_".$filter['slug'],
										"id"=>"min_".$filter['slug'],
										"class"=>"text_slider_".$filter['slug'],
										"value"=>$filter['min_value']['name'],
									));

		array_push($this->__filters,array(
									"type"=>"hidden",
									"name"=>"max_".$filter['slug'],
									"id"=>"max_".$filter['slug'],
									"class"=>"text_slider_".$filter['slug'],
									"value"=>$filter['max_value']['name'],
								));
		if($desktop):
			
		?>
		<div class="<?php echo $this->get_width_class($width); ?>">
			<h3 class="ui header"><?php echo $filter['title']; ?></h3>			
			<div class="ui tiny form">
			  <div class="three fields">
			    <div class="field">	      
			      <input value="<?php echo ($filter['seprator']=='.'?$filter['min_value']['name']:str_replace('.',',',$filter['min_value']['name'])); ?>" type="text" class="text_slider_<?php echo $filter['slug'] ?> aligned left" name="text_min_<?php echo $filter['slug'] ?>">
			    </div>
			    <div class="field"></div>
			    <div class="field">	      
			      <input value="<?php echo ($filter['seprator']=='.'?$filter['max_value']['name']:str_replace('.',',',$filter['max_value']['name'])); ?>" type="text" class="text_slider_<?php echo $filter['slug'] ?> aligned right" name="text_max_<?php echo $filter['slug'] ?>">
			    </div>
			  </div>	  
			</div>			
			<div class="ui range slider text_slider" id="text_slider_<?php echo $filter['slug'] ?>" data-min="<?php echo $filter['min_value']['name']; ?>" data-max="<?php echo $filter['max_value']['name']; ?>" data-slug="<?php echo $filter['slug'] ?>" data-sep="<?php echo $filter['seprator']; ?>"></div>
		</div>
		<?php
		else:
		?>
		<div class="title">
		    <i class="dropdown icon"></i>		    
		    <?php echo $filter['title']; ?>
		</div>
	  	<div class="content">	
	  		<div class="ui tiny form">
			  <div class="two fields">
			    <div class="field" style="width: fit-content !important;">	      
			      <input value="<?php echo $filter['min_value']['name']; ?>" type="text" class="text_slider_<?php echo $filter['slug'] ?> aligned left" name="text_min_<?php echo $filter['slug'] ?>">
			    </div>			    
			    <div class="field" style="position: absolute;right: 0px;width: fit-content !important;">
			      <input value="<?php echo $filter['max_value']['name']; ?>" type="text" class="text_slider_<?php echo $filter['slug'] ?> aligned right" name="text_max_<?php echo $filter['slug'] ?>">
			    </div>
			  </div>	  
			</div>				    
	  		<div class="ui range slider text_slider" id="text_slider_<?php echo $filter['slug'] ?>" data-min="<?php echo $filter['min_value']['name']; ?>" data-max="<?php echo $filter['max_value']['name']; ?>" data-slug="<?php echo $filter['slug'] ?>"></div>
	  	</div>		
		<?php
		endif;
	}

	//Returns all values in range;
	//@input : filter_type - wether it is category filter or term filter;
	public function range_steps($id,$title='',$filter_type=0) {

		$list=array();		
		$field_title='';	
		$field_slug='';

		if ($filter_type) {
			
			$term=EO_WBC_Support::eo_wbc_get_attribute($id);			

			if(!empty($term) && !is_wp_error($term)) {

				$field_title=empty($title)?$term->name:$title;
				$field_slug=$term->slug;

				$taxonomies=get_terms(array('taxonomy'=>wc_attribute_taxonomy_name_by_id($term->id),'hide_empty'=>false));

				if(is_wp_error($taxonomies)){

					$taxonomies=get_terms(wc_attribute_taxonomy_name_by_id($term->id),array('hide_empty'=>false));
				}

				if(is_wp_error($taxonomies) or empty($taxonomies)) return false;

				foreach ($taxonomies as $taxonomy){
					
					$list[]=array("id"=>$taxonomy->term_id,"slug"=>$taxonomy->slug,"name"=>$taxonomy->name,"type"=>'attr');                	  	
	        	}

	        } else {

	        	return false;
	        }
		}		
		else {

			$category=get_term_by('id',$id,'product_cat');
			
			if(!empty($category) && !is_wp_error($category)) {

				$field_title=empty($title)?$category->name:$title;
				$field_slug=$category->slug;

				$sub_categories = get_categories(array(
		            'hierarchical' => 1,
		            'show_option_none' => '',
		            'hide_empty' => false,
		            'parent' => $id,
		            'taxonomy' => 'product_cat'
		        ));

				if(is_wp_error($sub_categories) or empty($sub_categories)) return false;

		        foreach ($sub_categories as $sub_category) {
		        	$list[]=array("id"=>$sub_category->term_id,"slug"=>$sub_category->slug,"name"=>$sub_category->name,"type"=>'cat');
		        }

		    } else {

	        	return false;
	        }	
		}		

		return array('list'=>$list,'title'=>$field_title,'slug'=>$field_slug);			
	}

	//Generate step slider;
	public function input_step_slider($id,$title,$filter_type,$desktop=1,$width='50') {

		$filter=$this->range_steps($id,$title,$filter_type);
		if(empty($filter)) return false;
		
		$items_name=EO_WBC_Support::array_column($filter['list'],'name');			
		$items_slug=EO_WBC_Support::array_column($filter['list'],'slug');

		array_push($this->__filters,array(
										"type"=>"hidden",
										"name"=>"min_".$filter['slug'],
										"id"=>'min_'.$filter['slug'],
										"class"=>"step_slider_".$filter['slug'],
										"value"=>$items_slug[0],
									));

		array_push($this->__filters,array(
									"type"=>"hidden",
									"name"=>"max_".$filter['slug'],
									"id"=>"max_".$filter['slug'],
									"class"=>"step_slider_".$filter['slug'],
									"value"=>$items_slug[count($items_slug)-1],
								));	
		if($desktop):

			
		?>
		<div class="<?php echo $this->get_width_class($width); ?>">
			<h3 class="ui header"><?php echo $filter['title']; ?></h3>		

			<div class="ui labeled ticked range slider" id="text_slider_<?php echo $filter['slug'] ?>" data-slug="<?php echo $filter['slug'] ?>" data-labels="<?php echo(implode(",", $items_name)); ?>" data-slugs="<?php echo(implode(",", $items_slug)); ?>" style="bottom: -12.5%;"></div>
		</div>
		<?php
		else:
		?>
		<div class="title">
		    <i class="dropdown icon"></i>		    
		    <?php echo $filter['title']; ?>
		</div>
	  	<div class="content">		    
	  		<div class="ui labeled ticked range slider" id="text_slider_<?php echo $filter['slug'] ?>" data-slug="<?php echo $filter['slug'] ?>" data-labels="<?php echo(implode(",", $items_name)); ?>" data-slugs="<?php echo(implode(",", $items_slug)); ?>" style="bottom: -12.5%;"></div>
	  	</div>		
		<?php
		endif;
	}

	//Generate checkbox based filter option;
	public function input_checkbox($id,$title,$filter_type,$desktop=1,$width='50') {
		$filter=$this->range_steps($id,$title,$filter_type);
		if(empty($filter)) return false;

		array_push($this->__filters,array(
										"type"=>"hidden",
										"name"=>"checklist_".$filter['slug'],
										"id"=>"checklist_".$filter['slug'],
										"class"=>"",
									"value"=>implode(',',EO_WBC_Support::array_column($filter['list'],'slug')),
									));
		if($desktop):			
			
		?>
		<div class="<?php echo $this->get_width_class($width); ?>">
			<h3 class="ui header"><?php echo($filter['title']); ?></h3>			
			<div class="ui tiny form">
				<?php foreach ($filter['list'] as $term) : ?>
					<div class="ui checkbox checked">
						<input type="checkbox" checked="checked" tabindex="0" class="hidden checklist_<?php echo $filter['slug'] ?>" id='check_<?php echo $term['slug']; ?>' data-slug="<?php echo $term['slug']; ?>" data-filter-slug="<?php echo $filter['slug']; ?>">
				        <label><?php echo $term['name']; ?></label>
				    </div>&nbsp;&nbsp;						
    			<?php endforeach; ?>
    		</div>			
		</div>
		<?php
		else:
		?>
		<div class="title">
		    <i class="dropdown icon"></i>		    
		    <?php echo($filter['title']); ?>
		</div>
	  	<div class="content">	
	  		<div class="ui tiny form">
			  	<?php foreach ($filter['list'] as $term) : ?>
					<div class="ui checkbox checked">
						<input type="checkbox" checked="checked" tabindex="0" class="hidden checklist_<?php echo $filter['slug'] ?>" id='check_<?php echo $term['slug']; ?>' data-slug="<?php echo $term['slug']; ?>" data-filter-slug="<?php echo $filter['slug']; ?>">
				        <label><?php echo $term['name']; ?></label>
				    </div>						
    			<?php endforeach; ?>  
			</div>				    	  	
	  	</div>		
		<?php
		endif;
	}

	private function slider_price($desktop=1,$width='50') {

		$prices = $this->get_filtered_price();
		$min    = floor( $prices->min_price );
		$max    = ceil( $prices->max_price );

		array_push($this->__filters,array(
										"type"=>"hidden",
										"name"=>"min_price",
										"id"=>"min_price",
										"class"=>"text_slider_price",
										"value"=>$min,
									));

		array_push($this->__filters,array(
									"type"=>"hidden",
									"name"=>"max_price",
									"id"=>"max_price",
									"class"=>"text_slider_price",
									"value"=>$max,
								));
		
		if($desktop):
			
		?>
		<div class="<?php echo $this->get_width_class($width); ?>">
			<h3 class="ui header">Price</h3>			
			<div class="ui tiny form">
			  <div class="three fields">
			    <div class="field">	      
			      <input value="<?php echo $min; ?>" type="text" class="text_slider_price aligned left" name="text_min_price">
			    </div>
			    <div class="field"></div>
			    <div class="field">	      
			      <input value="<?php echo $max; ?>" type="text" class="text_slider_price aligned right" name="text_max_price">
			    </div>
			  </div>	  
			</div>			
			<div class="ui range slider text_slider" id="text_slider_price" data-min="<?php echo $min; ?>" data-max="<?php echo $max; ?>" data-slug="price"></div>
		</div>
		<?php
		else:
		?>
		<div class="title">
		    <i class="dropdown icon"></i>		    
		    Price
		</div>
	  	<div class="content">	
	  		<div class="ui tiny form">
			  <div class="two fields">
			    <div class="field" style="width: fit-content !important;">
			      	<input value="<?php echo $min; ?>" type="text" class="text_slider_price aligned left" name="text_min_price">
			    </div>			    
			    <div class="field" style="position: absolute;right: 0px;width: fit-content !important;">
			     	<input value="<?php echo $max; ?>" type="text" class="text_slider_price aligned right" name="text_max_price"> 
			    </div>
			  </div>	  
			</div>				    
	  		<div class="ui range slider text_slider" id="text_slider_price" data-min="<?php echo $min; ?>" data-max="<?php echo $max; ?>" data-slug="price"></div>
	  	</div>		
		<?php
		endif;			
	}
	
	public function get_widget() {

		$current_category=$this->_category;

		$filter_first=unserialize(get_option('eo_wbc_add_filter_first'));
		$filter_second=unserialize(get_option('eo_wbc_add_filter_second'));
		if($current_category==get_option('eo_wbc_first_slug')){
			$filter=$filter_first;
		}
		elseif($current_category==get_option('eo_wbc_second_slug')){
			$filter=$filter_second;	
		}		

		//Hidden input filter lists.
		$this->__filters=array();
		//Advance filters count
		$advance_count=0;		
		//Category Filters
		$_category=array();
		//Attribute Filters
		$_attr_list=array();

		$non_adv_ordered_filter=array();
		$adv_ordered_filter=array();

		if(!(is_array($filter) xor is_object($filter)) or empty($filter)) return false;

		foreach ($filter as $key => $item) {

			if($item['advance']==0){
				$item['order']= ( empty($item['order'])?(-1*count($non_adv_ordered_filter)):$item['order']);
				
				$item['column_width']= ( empty($item['column_width']) ? '50' : $item['column_width'] );

				$non_adv_ordered_filter[$item['order']]=$item;				
			}
			else{
				$item['order']= ( empty($item['order'])?(-1*count($adv_ordered_filter)):$item['order']);

				$item['column_width']= ( empty($item['column_width']) ? '50' : $item['column_width'] );

				$adv_ordered_filter[$item['order']]=$item;
			}
		}		
		ksort($non_adv_ordered_filter);
		ksort($adv_ordered_filter);

		?>
		<!--Primary filter button that will only be visible on desktop/tablet-->
		<!-- This widget is created with Wordpress plugin - WooCommerce Product bundle choice -->
		<div id="loading"></div>
		<div class="ui grid mobile only container centered" style="margin-left: 0 !important; margin-right: 0 !important">
			<div class="row">
				<div class="ui button primary fluid" id="primary_filter" style="border-radius: 0 0 0 0;margin-right: 0;">Filters&nbsp;&nbsp;<i class="ui icon angle up"></i></div>
			</div>
		</div>

		<div class="eo-wbc-container filters container">
			<div class="ui segments">    			
				<div class="ui segment">
					<!-- Begin Primary filters -->
					
				  	<div class="ui grid computer tablet only align middle relaxed">				  		
				  		<!-- Filters to be shown at desktop and tablet systems only. -->				  		
		  				<?php
							if(!empty($non_adv_ordered_filter) && (is_array($non_adv_ordered_filter) or is_object($non_adv_ordered_filter) ) ){
								foreach ($non_adv_ordered_filter as $key => $item) {

									if($item['type']==0 && ($item['input']=='icon' OR $item['input']=='icon_text')) {

										$this->eo_wbc_filter_ui_icon($item['name'],$item['label'],$item['type'],$item['input'],1,$item['column_width'],(isset($item['icon_size'])?$item['icon_size']:false),(isset($item['font_size'])?$item['font_size']:false));							
										
										$term = get_term_by('id',$item['name'],'product_cat');

										if( !empty( $term ) and !is_wp_error( $term ) ) {
											$_category[] = $term->slug;
										}
									}
									elseif ($item['type']==0 ) {

										$this->input_step_slider($item['name'],$item['label'],$item['type'],1,$item['column_width']);		
									}
									elseif($item['type']==1 ) {
										switch ($item['input']) {
											case 'icon':
											case 'icon_text':												
												$this->eo_wbc_filter_ui_icon($item['name'],$item['label'],$item['type'],$item['input'],1,$item['column_width'],(isset($item['icon_size'])?$item['icon_size']:false),(isset($item['font_size'])?$item['font_size']:false));				
												break;
											case 'numeric_slider':
												$this->input_text_slider($item['name'],$item['label'],$item['type'],1,$item['column_width']);
												break;
											case 'text_slider':
												$this->input_step_slider($item['name'],$item['label'],$item['type'],1,$item['column_width']);
												break;
											case 'checkbox':
												$this->input_checkbox($item['name'],$item['label'],$item['type'],1,$item['column_width']);
												break;						
											default:
												$this->input_step_slider($item['name'],$item['label'],$item['type'],1,$item['column_width']);
										}		
										$term = EO_WBC_Support::eo_wbc_get_attribute($item['name']);		
										if(!empty($term) and !is_wp_error($term) ){
											$_attr_list[]=$term->slug;	
										}			
									}
								}
							}
						?>									
						<?php $this->slider_price(); ?>						
				  	</div>				  	
				  	<div class="ui grid container mobile only" style="padding-bottom: 0px;">
			  			<!-- Filters to be shown at mobile only. -->
				  		<div class="ui styled fluid accordion" style="border-top-left-radius: 0px !important; border-top-right-radius: 0px !important;">
						  	<?php
								if( !empty($non_adv_ordered_filter) && ( is_array($non_adv_ordered_filter) or is_object($non_adv_ordered_filter)) ){
									foreach ($non_adv_ordered_filter as $key => $item) {

										if($item['type']==0 && ($item['input']=='icon' OR $item['input']=='icon_text')) {

											$this->eo_wbc_filter_ui_icon($item['name'],$item['label'],$item['type'],$item['input'],0,$item['column_width'],(isset($item['icon_size'])?$item['icon_size']:false),(isset($item['font_size'])?$item['font_size']:false));								
											$cat_term=@get_term_by('id',$item['name'],'product_cat');
											
											if(!empty($cat_term) and !is_wp_error($cat_term)){
												$_category[]=$cat_term->slug;	
											}			
										}
										elseif ($item['type']==0 ) {

											$this->input_step_slider($item['name'],$item['label'],$item['type'],0,$item['column_width']);		
										}
										elseif($item['type']==1 ) {

											switch ($item['input']) {
												case 'icon':
												case 'icon_text':												
													$this->eo_wbc_filter_ui_icon($item['name'],$item['label'],$item['type'],$item['input'],0,$item['column_width'],(isset($item['icon_size'])?$item['icon_size']:false),(isset($item['font_size'])?$item['font_size']:false));			
													break;
												case 'numeric_slider':
													$this->input_text_slider($item['name'],$item['label'],$item['type'],0,$item['column_width']);
													break;
												case 'text_slider':
													$this->input_step_slider($item['name'],$item['label'],$item['type'],0,$item['column_width']);
													break;
												case 'checkbox':
													$this->input_checkbox($item['name'],$item['label'],$item['type'],0,$item['column_width']);
													break;						
												default:
													$this->input_step_slider($item['name'],$item['label'],$item['type'],0,$item['column_width']);
											}	
													
											$term = EO_WBC_Support::eo_wbc_get_attribute($item['name']);
											if(!empty($term) && !empty($term->slug)){
												$_attr_list[] = $term->slug;	
											} 					
										}
									}
								}
							?>
							<?php $this->slider_price(0); ?>
						</div>
					</div>					
				</div>
				<?php if( !empty($adv_ordered_filter) ): ?>
				<div class="ui segment secondary">
					<!-- Begin Advance filters -->
					<div class="ui grid container computer tablet only align middle relaxed">					  	
					  	<!-- Filters to be shown at desktop and tablet systems only. -->					  		
		  				<?php 
							if( !empty($adv_ordered_filter) && (is_array($adv_ordered_filter) or is_object($adv_ordered_filter)) ){
								foreach ($adv_ordered_filter as $key => $item) {

									if($item['type']==0 && ($item['input']=='icon' OR $item['input']=='icon_text')) {

										$this->eo_wbc_filter_ui_icon($item['name'],$item['label'],$item['type'],$item['input'],1,$item['column_width'],(isset($item['icon_size'])?$item['icon_size']:false),(isset($item['font_size'])?$item['font_size']:false));								
										$cat_term=@get_term_by('id',$item['name'],'product_cat');
										
										if(!empty($cat_term) and !is_wp_error($cat_term)){

											$_category[]=$cat_term->slug;
										}
									}
									elseif ($item['type']==0 ) {

										$this->input_step_slider($item['name'],$item['label'],$item['type'],1,$item['column_width']);		
									}
									elseif($item['type']==1 ) {

										switch ($item['input']) {
											case 'icon':
											case 'icon_text':												
												$this->eo_wbc_filter_ui_icon($item['name'],$item['label'],$item['type'],$item['input'],1,$item['column_width'],(isset($item['icon_size'])?$item['icon_size']:false),(isset($item['font_size'])?$item['font_size']:false));				
												break;
											case 'numeric_slider':
												$this->input_text_slider($item['name'],$item['label'],$item['type'],1,$item['column_width']);
												break;
											case 'text_slider':
												$this->input_step_slider($item['name'],$item['label'],$item['type'],1,$item['column_width']);
												break;
											case 'checkbox':
												$this->input_checkbox($item['name'],$item['label'],$item['type'],1,$item['column_width']);
												break;						
											default:
												$this->input_step_slider($item['name'],$item['label'],$item['type'],1,$item['column_width']);
										}
										
										$term = EO_WBC_Support::eo_wbc_get_attribute($item['name']);
										if(!empty($term) and !is_wp_error($term) ){
											$_attr_list[]=$term->slug;	
										}				
									}
								}
							}
		  				?>		  				
					</div>
					
					<div class="ui grid container mobile only middle aligned" style="padding-bottom: 0px;">
				  			<!-- Filters to be shown at mobile only. -->
					  		<div class="ui styled fluid accordion">
							  	<?php 
								if((is_array($adv_ordered_filter) or is_object($adv_ordered_filter)) and !empty($adv_ordered_filter)){
								  	foreach ($adv_ordered_filter as $key => $item) {

										if($item['type']==0 && ($item['input']=='icon' OR $item['input']=='icon_text')) {

											$this->eo_wbc_filter_ui_icon($item['name'],$item['label'],$item['type'],$item['input'],0,$item['column_width'],(isset($item['icon_size'])?$item['icon_size']:false),(isset($item['font_size'])?$item['font_size']:false));								
											$term = @get_term_by('id',$item['name'],'product_cat');
											if(!empty($term) and !is_wp_error($term)){
												$_category[]=$term->slug;	
											}				
										}
										elseif ($item['type']==0 ) {

											$this->input_step_slider($item['name'],$item['label'],$item['type'],0,$item['column_width']);		
										}
										elseif($item['type']==1 ) {				
											switch ($item['input']) {
												case 'icon':
												case 'icon_text':												
													$this->eo_wbc_filter_ui_icon($item['name'],$item['label'],$item['type'],$item['input'],0,$item['column_width'],(isset($item['icon_size'])?$item['icon_size']:false),(isset($item['font_size'])?$item['font_size']:false));
													break;
												case 'numeric_slider':
													$this->input_text_slider($item['name'],$item['label'],$item['type'],0,$item['column_width']);
													break;
												case 'text_slider':
													$this->input_step_slider($item['name'],$item['label'],$item['type'],0,$item['column_width']);
													break;
												case 'checkbox':
													$this->input_checkbox($item['name'],$item['label'],$item['type'],0,$item['column_width']);
													break;						
												default:
													$this->input_step_slider($item['name'],$item['label'],$item['type'],0,$item['column_width']);
											}
											$term=EO_WBC_Support::eo_wbc_get_attribute($item['name']);
											if(!empty($term) and !is_wp_error( $term )){
												$_attr_list[]=$term->slug;	
											}				
										}
									}
								}
							  	?>
							</div>
					</div>					
				</div>
				<?php endif; ?>
			</div>
		</div>	
		<?php if( !empty($adv_ordered_filter) ): ?>
		<div class="ui grid centered">
			<div class="row">
				<div class="ui button primary" id="advance_filter" style="border-radius: 0 0 0 0;width: fit-content !important;">Advance Filter&nbsp;<i class="ui icon angle double up"></i></div>
			</div>
		</div>			
		<?php endif; ?>
		<!-- Created with Wordpress plugin - WooCommerce Product bundle choice -->
		<!--WooCommerce Product Bundle Choice filter form-->
		<form method="GET" name="eo_wbc_filter" id="eo_wbc_filter" style="clear: both;">

			<input type="hidden" name="eo_wbc_filter" value="1" />	
			<input type="hidden" name="paged" value="1" />	
			<input type="hidden" name="last_paged" value="1" />
			<input type="hidden" name="action" value="eo_wbc_filter"/>
			
			<input type="hidden" name="_current_category" value="<?php echo (!empty($_GET['CAT_LINK'])?','.sanitize_text_field($_GET['CAT_LINK']):$current_category); ?>" />

			<input type="hidden" name="_category_query" id="eo_wbc_cat_query" 
				value="<?php echo (!empty($_GET['CAT_LINK'])?','.sanitize_text_field($_GET['CAT_LINK']):'')?>" />

			<input type="hidden" name="_category" value="<?php echo implode(',',$_category) ?>"/>
			<input type="hidden" name="_attribute" id="eo_wbc_attr_query" value="" />			
			<?php if(isset($_GET['products_in']) AND !empty($_GET['products_in']) ): ?>
				<input type="hidden" name="products_in" value="<?php echo $_GET['products_in'] ?>" />			
			<?php endif; ?>

			<?php				
				if(!empty($this->__filters)){
					foreach ($this->__filters as $__filter) {						
						?>
							<input type="<?php echo $__filter['type'] ?>" name="<?php echo $__filter['name'] ?>" id="<?php echo $__filter['id'] ?>" class="<?php echo $__filter['class'] ?>" value="<?php echo $__filter['value'] ?>" <?php echo (isset($__filter['data-edit'])?'data-edit="'.$__filter['data-edit'].'"':'') ?>/>
						<?php
					}
				}
			?>
		</form>
		<br/><br/>
		<script type="text/javascript">		

			jQuery(document).ready(function($){			

				window.eo=new Object();
				
				//Slider creation function
				window.eo.slider=function(selector){

					$(selector).each(function(i,e){

						_min = Number($(e).attr('data-min'));						
						_max = Number($(e).attr('data-max'));												
						_labels = $(e).attr('data-labels');						

						_params=new Object();												
												
						if(_labels != undefined && _labels != false){

							_labels=_labels.split(',');
							_params.interpretLabel=function(value){ 							
								if(_labels!=undefined){
									return _labels[value];
								} else {
									return value;
								}
								
							}			
							_params.step=1;

							_params.min=0;
							_params.max=_labels.length-1;
							_params.start=0;
							_params.end=_labels.length-1;

						} else {

							_params.min=_min;
							_params.max=_max;
							_params.start=_min;
							_params.end=_max;

							_params.smooth=true;
							_params.step=(_max-_min)/100;	
						}
						_params.smooth=true;
						_params.autoAdjustLabels=true;
						_params.decimalPlaces=4;
						_params.onMove=function(value, min, max) {

							__slugs = $(e).attr('data-slugs');
							
							if(typeof __slugs != typeof undefined && __slugs != false){
								//PASS
							} else {
					        	$("input[name='text_min_"+$(e).attr('data-slug')+"']").val(_sep=='.'?Number(min).toFixed(2):(Number(min).toFixed(2)).toString().replace('.',','));
					        	$("input[name='text_max_"+$(e).attr('data-slug')+"']").val(_sep=='.'?Number(max).toFixed(2):(Number(max).toFixed(2)).toString().replace('.',','));
					        }					      	
						}

						_params.onChange=function(value, min, max) {	

							_labels = $(e).attr('data-labels');
							_min = Number ($(e).attr('data-min'));						
							_max = Number($(e).attr('data-max'));
							_sep = $(e).attr('data-sep');

							if(typeof _labels != typeof undefined && _labels != false){
								_labels=_labels.split(',');
								_min=0;
								_max=_labels.length-1;
							}

							if(
								(
									($(this).data('prev_val_min')!=min && $(this).data('prev_val_min')!=undefined)
									|| 
									($(this).data('prev_val_max')!=max && $(this).data('prev_val_max')!=undefined)
								)
								||
								( min!=_min || max!=_max )
							){

								if(typeof __slugs != typeof undefined && __slugs != false){
										
									$("input[name='min_"+$(e).attr('data-slug')+"']").val(__slugs.split(',')[min]);
						        	$("input[name='max_"+$(e).attr('data-slug')+"']").val(__slugs.split(',')[max]);

								} else {

						        	$("input[name='min_"+$(e).attr('data-slug')+"']").val(Number(min).toFixed(2));
						        	$("input[name='max_"+$(e).attr('data-slug')+"']").val(Number(max).toFixed(2));
						        }

						        if($(this).attr('data-slug')!='price'){
							    	//Action of notifying filter change when changes are done.
							    	if($(this).attr('data-min')==min && $(this).attr('data-max')==max) {

							    		if($("[name='_attribute']").val().includes($(this).attr('data-slug'))) {
							    			
							    			_values=$("[name='_attribute']").val().split(',')
							    			_index=_values.indexOf($(this).attr('data-slug'))
							    			_values.splice(_index,1)
							    			$("[name='_attribute']").val(_values.join());
							    		}
							    	}
							    	else {
							    		if(! $("[name='_attribute']").val().includes($(this).attr('data-slug'))) {
							    			_values=$("[name='_attribute']").val().split(',')
							    			_values.push($(this).attr('data-slug'))
							    			$("[name='_attribute']").val(_values.join())
							    		}
							    	}
						    	}
						    	$('[name="paged"]').val('1');
						    	jQuery.fn.eo_wbc_filter_change();
						    }
						    
						    $(this).data('prev_val_min',min);						    
						    $(this).data('prev_val_max',max);
						}

						$("input.text_slider_"+$(e).attr('data-slug')).change(function() {				    

							$("#text_slider_"+$(e).attr('data-slug')).slider("set rangeValue",$("[name=min_"+$(e).attr('data-slug')+"]").val(),$("[name=max_"+$(e).attr('data-slug')+"]").val());
						});							
						$(e).slider(_params);
					});
				}

				var primary_filter=$(".eo-wbc-container.filters .ui.segment:not(.secondary)");
				var primary_computer_only=$(primary_filter).find(".computer.tablet.only");
				var primary_mobile_only=$(primary_filter).find(".mobile.only");

				var secondary_filter=$(".eo-wbc-container.filters .ui.segment.secondary");
				var secondary_computer_only=$(secondary_filter).find(".computer.tablet.only");
				var secondary_mobile_only=$(secondary_filter).find(".mobile.only");

				
				$('.ui.accordion').accordion();
				window.eo.slider($('.eo-wbc-container.filters').find('.ui.slider'));				
			
				/* Activate initiation of sliders at secondary segments. */
				if($(secondary_computer_only).css('display')!='none'){				

					$("#advance_filter").on('click',function(){
						$("#advance_filter").find('.ui.icon').toggleClass('up down');
						$(secondary_filter).transition('slide down');
					}).trigger('click');				

				} else if($(secondary_mobile_only).css('display')!='none') {					
					
					$("#advance_filter").on('click',function(){
						$("#advance_filter").find('.ui.icon').toggleClass('up down');
						$(secondary_filter).transition('fly right');				
					}).trigger('click');
				}

				/*$(secondary_filter).transition('fade');*/

				if($("#primary_filter").parent().parent().css('display')!='none'){
					
					$("#primary_filter").click(function(e){
						e.preventDefault();
						e.stopPropagation();
						$("#primary_filter").find('.ui.icon').toggleClass("down up");
						$('.eo-wbc-container.filters,#advance_filter').transition('fade');
					}).trigger('click');
				}
				
				/*----------------------------------------------------*/
				/*----------------------------------------------------*/
				$('.checkbox').checkbox({onChange:function(){

					__slug=$(this).attr('data-filter-slug');					

					_values=jQuery('[name="checklist_'+__slug+'"]').val().split(',');

					if(_values.indexOf($(this).attr('data-slug'))!=-1){

						_values=jQuery('[name="checklist_'+__slug+'"]').val().split(',');
						_index=_values.indexOf($(this).attr('data-slug'));						
						_values.splice(_index,1);						
						jQuery('[name="checklist_'+__slug+'"]').val(_values.join());

					} else {

						_values=jQuery('[name="checklist_'+__slug+'"]').val().split(',');
		    			_values.push($(this).attr('data-slug'));
		    			jQuery('[name="checklist_'+__slug+'"]').val(_values.join());
					}
					
					if( ( jQuery('.checklist_'+__slug+':checkbox').length==jQuery('.checklist_'+__slug+':checkbox:checked').length)  || (jQuery('.checklist_'+__slug+':checkbox:checked').length==0) ) {

			    		if($("[name='_attribute']").val().includes(__slug)) {
			    			
			    			_values=$("[name='_attribute']").val().split(',')
			    			_index=_values.indexOf(__slug)			    			
			    			_values.splice(_index,1)				    			
			    			$("[name='_attribute']").val(_values.join());
			    		}
			    	}
			    	else {
			    		if(! $("[name='_attribute']").val().includes(__slug)) {
			    			_values=$("[name='_attribute']").val().split(',')
			    			_values.push(__slug)
			    			$("[name='_attribute']").val(_values.join())
			    		}
			    	}
			    	$('[name="paged"]').val('1');
			    	jQuery.fn.eo_wbc_filter_change();
				}});				
				/*----------------------------------------------------*/
				/*----------------------------------------------------*/

			});			
		</script> 
		<?php			
	}

	public function eo_wbc_filter_ui_icon($id,$title='',$type=0,$input='icon',$desktop=1,$width='50',$icon_width=FALSE,$label_size=FALSE) {
		global $woocommerce;
		$icon_css = '';
		if($input == 'icon'){
			$icon_css.=($icon_width?'width:'.$icon_width.' !important;':'');
		} elseif($input == 'icon_text'){
			$icon_css.=($icon_width?'width:'.$icon_width.' !important;':'').($label_size?'font-size:'.$label_size.' !important;':'');
		}

		$term = False;
		$non_edit=false;
		$list=array();
		$cat_filter_list=array();
		$term_list = array();

		if($type == 1){
			$term = EO_WBC_Support::eo_wbc_get_attribute($id);
			$term_list = $this->range_steps($id,$title,$type)['list'];
		} else{
			$term = get_term_by('id',$id,'product_cat');
			$term_list = get_terms('product_cat', array('hide_empty' => 0, 'orderby' => 'ASC', 'child_of'=>$id));
		}
		
		if( empty($term) or is_wp_error($term) ) return false;

		if(empty($term_list) or is_wp_error($term_list) or !(is_array($term_list) or is_object($term_list))) return false;
		
		foreach ($term_list  as $term_item) {
			$term_item = (object)$term_item;
			if(!empty($term_item) and is_object($term_item))
			$icon = '';
			$mark = false;

			$query_list = array();

			if(empty($term_item->term_id) and $type == 1){

				$icon = get_term_meta( $term_item->id, $term->slug . '_attachment');
				if(is_array($icon)){
					$icon = $icon[0];
				} else {
					$icon = $woocommerce->plugin_url() . '/assets/images/placeholder.png';
				}

				if(!empty($_GET['ATT_LINK'])){
					$query_list = explode(' ',$_GET['ATT_LINK']);
				}

				$mark = in_array($term_item->id,$query_list);				
				if($non_edit==false && in_array($term_item->id,$query_list)) {
					$non_edit=true;						
				}

			} else {
				$icon = wp_get_attachment_url( @get_term_meta( $term_item->term_id, 'thumbnail_id', true ));
				
				if(!empty($_GET['CAT_LINK'])){
					$query_list = explode(' ',$_GET['CAT_LINK']);
				}

				$mark = in_array($term_item->slug,$query_list);
				if($non_edit==false && in_array($term_item->slug,$query_list)) {
					$non_edit=true;						
				}
			}

			$list[]=array("icon" => $icon ,
							"name" => $term_item->name,
							"slug"=> $term_item->slug,
							"mark"=> $mark
						);					
			
						

			if(in_array($term_item->slug,$query_list)) {
				$cat_filter_list[]=$term_item->slug;
			}
		}

		if( empty($list) ) return false;

		$title=(!empty($title) ? $title : $term->name);
		
		if($type == 1){
			array_push($this->__filters,array(
										"type"=>"hidden",
										"name"=>"checklist_".$term->slug,
										"id"=>"checklist_".$term->slug,
										"class"=>"",
										"value"=>implode(',',$cat_filter_list),
									));
		} else {

			array_push($this->__filters,array(
										"type"=>"hidden",
										"name"=>"cat_filter_".$term->slug,
										"id"=>"cat_filter_".$term->slug,
										"class"=>"",
										"value"=>implode(',', $cat_filter_list),
										"edit"=>($non_edit?'0':'1'),
									));
		}

		if($desktop):		
			
		?>
			<div class="<?php echo $this->get_width_class($width); ?>">
				<h3 class="ui header"><?php echo($title); ?></h3>						
				<div class="ui tiny images ui equal width center aligned grid" style="text-align: center;">				
					<?php foreach ($list as $filter_icon): ?>
						<div title="<?php $filter_icon["name"]; ?>"
							class="eo_wbc_filter_icon column <?php echo $non_edit ? 'none_editable':'' ?> 
								<?php echo $filter_icon['mark'] ? 'eo_wbc_filter_icon_select':''?> ui image" 
							data-slug="<?php echo $filter_icon['slug']; ?>" 
							data-filter="<?php echo $term->slug; ?>" style="border-bottom: 2px solid transparent;<?php echo $icon_css; ?>"
							data-type="<?php echo $type; ?>">
							<div>
								<img src='<?php echo $filter_icon['icon']; ?>'/>
							</div>
							<?php if($input=='icon_text'): ?>
								<div><?php echo($filter_icon['name']); ?></div>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>			  	
				</div>		    		
			</div>
		<?php
		else:
		?>
			<div class="title">
			    <i class="dropdown icon"></i>		    
			    <?php echo($title); ?>
			</div>
		  	<div class="content">	
		  		<div class="ui tiny images" style="text-align: justify;">
					<?php foreach ($list as $filter_icon): ?>
						<div title="<?php $filter_icon["name"]; ?>"
							class="eo_wbc_filter_icon <?php echo $non_edit ? 'none_editable':'' ?> 
								<?php echo $filter_icon['mark'] ? 'eo_wbc_filter_icon_select':''?> ui image" 
							data-slug="<?php echo $filter_icon['slug']; ?>" 
							data-filter="<?php echo $term->slug; ?>" style="border-bottom: 2px solid transparent;"
							data-type="<?php echo $type; ?>">
							<div>
								<img src='<?php echo $filter_icon['icon']; ?>'/>
							</div>
							<?php if($input=='icon_text'): ?>
								<div><?php echo($filter_icon['name']); ?></div>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>			  	
				</div>
		  	</div>		
		<?php
		endif;
		?>					
		<script>
			jQuery(document).ready(function($){
				
				__data_filter_slug="<?php echo $term->slug; ?>";
				if(__data_filter_slug){
					//TO BE FIXED LATER.
					jQuery('[data-filter="'+__data_filter_slug+'"]:not(.none_editable)').off();
					jQuery('[data-filter="'+__data_filter_slug+'"]:not(.none_editable)').on('click',function(e){
						
						e.stopPropagation();
						e.preventDefault();

						var icon_filter_type = jQuery(this).attr('data-type');
						var filter_name = jQuery(this).attr('data-filter');

						var filter_list= undefined;
						var filter_target = undefined;

						if(icon_filter_type == 1) {
							filter_list = jQuery('[name="checklist_'+__data_filter_slug+'"]');							
							filter_target = jQuery('[name="_attribute"]');
						} else {
							filter_list = jQuery('[name="cat_filter_'+__data_filter_slug+'"]');
							filter_target = jQuery('[name="_category"]');
						}						
																
						if(filter_list.val().includes( jQuery(this).attr('data-slug'))){
							filter_list.val(filter_list.val().replace(','+jQuery(this).attr('data-slug'),''));
						}
						else {
							filter_list.val(filter_list.val()+','+jQuery(this).attr("data-slug"));
						}

						if(filter_target.val().includes(filter_name) && filter_list.val().length==0) {
							filter_target.val(filter_target.val().replace(','+filter_name,''));
						} else { if((!filter_target.val().includes(filter_name)) && filter_list.val().length) {
							filter_target.val(filter_target.val()+','+filter_name);	
						} }					

						var icon_val=jQuery(filter_list).val();	
						jQuery(filter_list).val(icon_val.substr(0,icon_val.length));
						
						jQuery(this).toggleClass('eo_wbc_filter_icon_select');
						$('[name="paged"]').val('1');
						jQuery.fn.eo_wbc_filter_change();
					});

					jQuery(".eo_wbc_srch_btn:eq(2)").on('reset',function(){	
						var icon_filter_type = "<?php echo $type; ?>";
						var filter_list= undefined;
						if(icon_filter_type == 1) {
							filter_list = jQuery('[name="checklist_'+__data_filter_slug+'"]');
						} else {
							filter_list = jQuery('[name="cat_filter_'+__data_filter_slug+'"]');
						}

						if(jQuery(filter_list).attr('data-edit')=='1') {
							jQuery(filter_list).val("");

							jQuery(".eo_wbc_filter_icon_select").each(function(index,element){
								jQuery(element).removeClass("eo_wbc_filter_icon_select");
							});
						}				
					});
				}				
			});
		</script>
		<?php
	}	

	//convert category id to slug
	public function eo_wbc_id_2_slug($id) {
		$term = get_term_by('id',$id,'product_cat');

		if(empty($term) or is_wp_error($term)){
			return false;
		} else {
			return $term->slug;	
		}
    }
    
    public function eo_wbc_get_category()
    {        
        global $wp_query;        
        
        //get list of slug which are ancestors of current page item's category
        $term_slug=array_map(array('self',"eo_wbc_id_2_slug"),get_ancestors($wp_query->get_queried_object()->term_id, 'product_cat'));

        //append current page's slug so that create complete list of terms including current term even if it is parent.
        $term_slug[]=$wp_query->get_queried_object()->slug;                 

        if(in_array(get_option('eo_wbc_first_slug'),$term_slug))
        {
            return get_option('eo_wbc_first_slug');
        }
        elseif(in_array(get_option('eo_wbc_second_slug'),$term_slug))
        {
            return get_option('eo_wbc_second_slug');
        }
    }

    //get min and max price.
	protected function get_filtered_price() {
		global $wpdb;

		$args       = wc()->query->query_vars;
		$tax_query  = isset( $args['tax_query'] ) ? $args['tax_query'] : array();
		$meta_query = isset( $args['meta_query'] ) ? $args['meta_query'] : array();

		if ( ! is_post_type_archive('product') && ! empty( $args['taxonomy'] ) && ! empty( $args['term'] ) ) {
			$tax_query[] = array(
				'taxonomy' => $args['taxonomy'],
				'terms'    => array( $args['term'] ),
				'field'    => 'slug',
			);
		}

		foreach ( $meta_query + $tax_query as $key => $query ) {
			if ( ! empty( $query['price_filter'] ) || ! empty( $query['rating_filter'] ) ) {
				unset( $meta_query[ $key ] );
			}
		}

		$meta_query = new WP_Meta_Query( $meta_query );
		$tax_query  = new WP_Tax_Query( $tax_query );

		$meta_query_sql = $meta_query->get_sql( 'post', $wpdb->posts, 'ID' );
		$tax_query_sql  = $tax_query->get_sql( $wpdb->posts, 'ID' );

		$sql  = "SELECT min( FLOOR( price_meta.meta_value ) ) as min_price, max( CEILING( price_meta.meta_value ) ) as max_price FROM {$wpdb->posts} ";
		$sql .= " LEFT JOIN {$wpdb->postmeta} as price_meta ON {$wpdb->posts}.ID = price_meta.post_id " . $tax_query_sql['join'] . $meta_query_sql['join'];
		$sql .= " 	WHERE {$wpdb->posts}.post_type IN ('" . implode( "','", array_map( 'esc_sql', apply_filters( 'woocommerce_price_filter_post_type', array( 'product' ) ) ) ) . "')
			AND {$wpdb->posts}.post_status = 'publish'
			AND price_meta.meta_key IN ('" . implode( "','", array_map( 'esc_sql', apply_filters( 'woocommerce_price_filter_meta_keys', array( '_price' ) ) ) ) . "')
			AND price_meta.meta_value > '' ";
		$sql .= $tax_query_sql['where'] . $meta_query_sql['where'];

		$search = WC_Query::get_main_search_query_sql();
		if ( $search ) {
			$sql .= ' AND ' . $search;
		}

		$sql = apply_filters( 'woocommerce_price_filter_sql', $sql, $meta_query_sql, $tax_query_sql );

		return $wpdb->get_row( $sql ); // WPCS: unprepared SQL ok.
	}
}	
?>
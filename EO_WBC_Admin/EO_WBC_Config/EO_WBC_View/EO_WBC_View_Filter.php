<?php	
	
	/*add_action( 'admin_enqueue_scripts',function(){*/
		wp_register_style('eo_wbc_semaintic_style',plugin_dir_url(constant('EO_WBC_PLUGIN_FILE')).'css/fomantic/semantic.min.css',false,'1.0');
		wp_enqueue_style('eo_wbc_semaintic_style');

		wp_register_script('eo_wbc_semaintic_script',plugin_dir_url(constant('EO_WBC_PLUGIN_FILE')).'js/fomantic/semantic.min.js',array('jquery'),'1.0');
		wp_enqueue_script('eo_wbc_semaintic_script');

	/*},10);*/	

	function eo_wbc_prime_category_($slug='',$prefix='')
    {
        $map_base = get_categories(array(
            'hierarchical' => 1,
            'show_option_none' => '',
            'hide_empty' => 1,
            'parent' => (get_term_by('slug',$slug,'product_cat')?get_term_by('slug',$slug,'product_cat')->term_id:''),
            'taxonomy' => 'product_cat'
        ));
        
        $category_option_list='';
        
        foreach ($map_base as $base) {

            $category_option_list.= 
            	"<option data-type='0' data-slug='{$base->slug}' value='".$base->term_id."'>".$prefix.$base->name."</option>".eo_wbc_prime_category_($base->slug,' --');

        }
        return $category_option_list;
    }

	function eo_wbc_attributes_()
    {
        $attributes="";        
        foreach (wc_get_attribute_taxonomies() as $item) {                     
        	$attributes .= "<option data-type='1' data-slug='{$item->attribute_name}' value='{$item->attribute_id}'>{$item->attribute_label}</option>";            
        }
        return $attributes;
    }
?>
<style type="text/css">
	.tablenav.bottom{
		display: none;
	}
	tfoot{
		display: none;
	}
	@media only screen and (max-width: 720px) {
		.form-filter-td{
			display: grid;
		}
		.boxed-container{
			padding:1em !important;
		}
	}
</style>
<div>
	<div class="wrap woocommerce">		
		<h1></h1>
		<?php	EO_WBC_Head_Banner::get_head_banner(); ?>
		<br/>
	        <p><a href="https://wordpress.org/support/plugin/woo-bundle-choice" target="_blank"><?php _e('If you are facing any issue, please write to us immediately.',"woo-bundle-choice"); ?></a></p>
		<br/>
	    <?php do_action('eo_wbc_menu_tabs','eo-wbc-filter'); ?>
		<hr/>

		<h3>Filter configuration</h3>	
		<div class="ui segment">
			<form class="ui form" method="post" action="">
				<?php echo wp_nonce_field('eo_wbc_save_filter_config'); ?>
				<input type="hidden" name="eo_wbc_action" value="save-filter-config">
				<div class="field">
					<h4 class="ui dividing header">Alternate filter widget&nbsp;
						<span class="ui icon" data-tooltip="Swich filter UI between Grid and Expand/Collapse view." data-position="top left" data-inverted="">
  							<i class="question circle outline icon "></i>
  						</span>
					</h4>
					
					<div class="field">
						<label>Default(Grid View)</label>
						<div class="grouped fields">
							<div class="field">
								<div class="ui toggle checkbox">
								    <input type="radio" id="default_alternate_first" class="hidden" name="filter_alternate_first" <?php echo get_option('eo_wbc_first_collapse_view',0) == 0?'checked="checked"':'';  ?> value='0'>
								    <label for="default_alternate_first">First Category</label>
								</div>
							</div>	
							<div class="field">
								<div class="ui toggle checkbox">
								    <div class="ui toggle checkbox">
									    <input type="radio" id="default_alternate_second" class="hidden" name="filter_alternate_second" <?php echo get_option('eo_wbc_second_collapse_view',0) == 0 ? 'checked="checked"' : '' ;  ?> value='0'>
									    <label for="default_alternate_second">Second Category</label>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="field">
						<label>Expand/Collapse</label>
						<div class="grouped fields">
							<div class="field">
								<div class="ui toggle checkbox">
								    <input type="radio" id="expand_collapse_alternate_first" class="hidden" name="filter_alternate_first" <?php echo get_option('eo_wbc_first_collapse_view',0) == 1?'checked="checked"':'';  ?> value='1'>
								    <label for="expand_collapse_alternate_first">First Category</label>
								</div>
							</div>	
							<div class="field">
								<div class="ui toggle checkbox">
								    <div class="ui toggle checkbox">
									    <input type="radio" id="expand_collapse_alternate_second" class="hidden" name="filter_alternate_second" <?php echo get_option('eo_wbc_second_collapse_view',0) == 1 ? 'checked="checked"' : '' ;  ?> value='1'>
									    <label for="expand_collapse_alternate_second">Second Category</label>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="field">
					<input type="submit" class="ui primary button" name="save_filter_cfg" value="Save">
				</div>
			</form>
		</div>

		<h3><?php printf(__("%s's filter configuration"),get_option('eo_wbc_first_name','First category')); ?></h3>	
		<div style="border: 1px solid black;padding:3em;" class="boxed-container">
            <form target="_self" action="" method="post">				
				<?php
				    
				    $ob=new EO_WBC_First_Filter_Table();
				    $ob->prepare_items();
				    $ob->display();
				?>   				
				<input type="hidden" name="eo_wbc_action" value="bulk-filter-action">
				<input type="hidden" name="eo_filter_target" value="eo_wbc_add_filter_first">
			</form>
			<div style="text-align: center;font-size: 1.5em;margin-top: 2em;margin-bottom:0.5em;font-weight: bold;"><?php printf(__("Add %s's filter"),get_option('eo_wbc_first_name','First category')); ?></div>
			<form method="POST" name="add_filter_first">
				<?php echo wp_nonce_field('eo_add_filter_first'); ?>
				<input type="hidden" name="eo_wbc_action" value="bulk-filter-add">
				<input type="hidden" name="eo_filter_target" value="eo_wbc_add_filter_first">
				<table style="width: 100%;background-color: #f9f9f9;">
					<tbody>
						<tr  class="form-filter-td">
							<td>
								<table>
									<tbody>
										<tr>
											<td><?php _e("Filter","woo-bundle-choice") ?></td>
											<td>
												<select name="filter_name" data-group='first' onchange="document.getElementById('filter_type_first').value=this.options[this.selectedIndex].getAttribute('data-type')">
					                        		<?php echo eo_wbc_prime_category_(); ?>
					                        		<?php echo eo_wbc_attributes_(); ?>
					                        	</select>
					                        	<input type="hidden" name="filter_type" value="0" data-group='first' id="filter_type_first">
											</td>
										</tr>
									</tbody>
								</table>
							</td>							
							<td>
								<table>
									<tbody>
										<tr>
											<td><?php _e("Label","woo-bundle-choice"); ?></td>
											<td><input type="text" name="filter_label"/></td>
										</tr>
									</tbody>
								</table>
							</td>
							<td>
								<table>
									<tbody>
										<tr>
											<td><?php _e("Is advanced filter option ?","woo-bundle-choice");?></td>
											<td><input type="checkbox" name="filter_advanced" class="form-input"></td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
						<tr  class="form-filter-td">
							<td>
								<table>
									<tbody>
										<tr>
											<td><?php _e("Column Width","woo-bundle-choice");?></td>
											<td><input type="number" name="filter_width" class="form-input" style="width: 5em;" value="50" step="6.25" min="6.25" max="100">%</td>
										</tr>
									</tbody>
								</table>
							</td>
							<td>
								<table>
									<tbody>
										<tr>
											<td><?php _e("Ordering","woo-bundle-choice"); ?></td>
											<td>
												<input type="number" step="1" name="filter_order" value="0" placeholder="Numeric" style="width: 3em;">
											</td>
										</tr>
									</tbody>
								</table>
							</td>
							<td>
								<table>
									<tbody>
										<tr>
											<td><?php _e("Input Type","woo-bundle-choice"); ?></td>
											<td>
												<select name="filter_input" data-group='first' data-ificon-action=".icon-config-first">
					                        		<option value="icon"><?php _e("Icon Only","woo-bundle-choice"); ?></option>
					                        		<option value="icon_text"><?php _e("Icon and Text","woo-bundle-choice"); ?></option>
					                        		<option value="numeric_slider"><?php _e("Numeric slider","woo-bundle-choice"); ?></option>
					                        		<option value="text_slider"><?php _e("Text slider","woo-bundle-choice"); ?></option>
					                        		<option value="checkbox"><?php _e("Checkbox","woo-bundle-choice"); ?></option>
					                        	</select>
					                        	<script type="text/javascript">
					                        		jQuery(document).ready(function($){
					                        			$("[name='filter_input'][data-group='first']").on('change',function(){
					                        				_value = $(this).val()
					                        				if( _value == 'icon'){
					                        					
					                        					$($(this).attr('data-ificon-action')).css('visibility','hidden');

					                        					$($(this).attr('data-ificon-action')+'.config-icon').css('visibility','visible');

					                        				} else if(_value == 'icon_text' ){

					                        					$($(this).attr('data-ificon-action')).css('visibility','visible');
					                        				}
					                        				else {
					                        					$($(this).attr('data-ificon-action')).css('visibility','hidden');
					                        				}
					                        			});
					                        		})
					                        	</script>
											</td>
										</tr>
									</tbody>
								</table>
							</td>							
						</tr>
						<tr  class="form-filter-td">
							<td class="icon-config-first config-icon">
								<table>
									<tbody>
										<tr>
											<td><?php _e("Icon size","woo-bundle-choice") ?></td>
											<td>
												<input type="text" name="filter_icon_size" value="45px"/>
											</td>
										</tr>
									</tbody>
								</table>
							</td>							
							<td class="icon-config-first config-label">
								<table>
									<tbody>
										<tr>
											<td><?php _e("Icon label size","woo-bundle-choice") ?></td>
											<td>
												<input type="text" name="filter_icon_font_size" value="0.78571429rem"/>
											</td>
										</tr>
									</tbody>
								</table>
							</td>							
							<td>								
								<table>
									<tbody>
										<tr>
											<td>
												<label>Add reset link?</label>
												<input type="checkbox" value="1" name="filter_reset"/>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
						<tr  class="form-filter-td">
							<td>								
								<table>
									<tbody>
										<tr>
											<td><input type="submit" value="<?php _e("Save","woo-bundle-choice"); ?>" class="submit button-primary" name="Submit"></td>
										</tr>
									</tbody>
								</table>
							</td>													
						</tr>						
					</tbody>
				</table>												
			</form>
			<div data-group="first" class="icon_msg" style="display:none;">
				<p><strong>Since you want to use icons with attributes filter this plugin will enable icon option for attributes on woocommerce page, so please set icons from there.</strong></p>
			</div>
		</div>
            
       
        <hr/>
        <h3><?php printf(__("%s's filter configuration"),get_option('eo_wbc_second_name','Second category')); ?></h3>            
		<div style="border: 1px solid black;padding:3em;" class="boxed-container">
            <form target="_self" action="" method="post">				
				<?php
				    
				    $ob=new EO_WBC_Second_Filter_Table();
				    $ob->prepare_items();
				    $ob->display();
				?>   
				<input type="hidden" name="eo_wbc_action" value="bulk-filter-action">
				<input type="hidden" name="eo_filter_target" value="eo_wbc_add_filter_second">
			</form>
			<div style="text-align: center;font-size: 1.5em;margin-top: 2em;margin-bottom:0.5em;font-weight: bold;"><?php
				/* translators: %s: filter's name */		    
			 	printf(__("Add %s's filter","woo-bundle-choice"),get_option('eo_wbc_second_name','Second category')); 
			 ?></div>
			<form method="POST" name="add_filter_second">
				<?php wp_nonce_field('eo_add_filter_second'); ?>
				<input type="hidden" name="eo_wbc_action" value="bulk-filter-add">
				<input type="hidden" name="eo_filter_target" value="eo_wbc_add_filter_second">
				<table style="width: 100%;background-color: #f9f9f9;">
					<tbody>
						<tr class="form-filter-td">
							<td>
								<table>
									<tbody>
										<tr>
											<td><?php _e("Filter","woo-bundle-choice"); ?></td>
											<td>
												<select name="filter_name" data-group='second' onchange="document.getElementById('filter_type_second').value=this.options[this.selectedIndex].getAttribute('data-type')">                        		
					                        		<?php echo eo_wbc_prime_category_(/*get_option('eo_wbc_first_slug'),''*/); ?>
					                        		<?php echo eo_wbc_attributes_(); ?>
					                        	</select>
					                        	<input type="hidden" name="filter_type" value="0" data-group='second' id="filter_type_second">
											</td>
										</tr>
									</tbody>
								</table>
							</td>							
							<td>
								<table>
									<tbody>
										<tr>
											<td>Label</td>
											<td><input type="text" name="filter_label"/></td>
										</tr>
									</tbody>
								</table>
							</td>
							<td>
								<table>
									<tbody>
										<tr>
											<td><?php _e("Is advanced filter option ?","woo-bundle-choice"); ?></td>
											<td><input type="checkbox" name="filter_advanced" class="form-input"></td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
						<tr class="form-filter-td">
							<td>
								<table>
									<tbody>
										<tr>
											<td><?php _e("Column Width","woo-bundle-choice");?></td>
											<td><input type="number" name="filter_width" class="form-input" style="width: 5em;" value="50" step="6.25" min="6.25" max="100">%</td>
										</tr>
									</tbody>
								</table>
							</td>
							<td>
								<table>
									<tbody>
										<tr>
											<td><?php _e("Ordering","woo-bundle-choice"); ?></td>
											<td>
												<input type="number" step="1" name="filter_order" value="0" placeholder="Numeric" style="width: 3em;">
											</td>
										</tr>
									</tbody>
								</table>
							</td>
							<td>
								<table>
									<tbody>
										<tr>
											<td>Input Type</td>
											<td>
												<select name="filter_input" data-group='second' data-ificon-action=".icon-config-second">
					                        		<option value="icon"><?php _e("Icon Only","woo-bundle-choice"); ?></option>
					                        		<option value="icon_text"><?php _e("Icon and Text","woo-bundle-choice"); ?></option>
					                        		<option value="numeric_slider"><?php _e("Number slider","woo-bundle-choice"); ?></option>
					                        		<option value="text_slider"><?php _e("Text slider","woo-bundle-choice"); ?></option>
					                        		<option value="checkbox"><?php _e("Checkbox","woo-bundle-choice"); ?></option>
					                        	</select>
					                        	<script type="text/javascript">
					                        		jQuery(document).ready(function($){
					                        			$("[name='filter_input'][data-group='second']").on('change',function(){
					                        				_value = $(this).val()
					                        				if( _value == 'icon'){
					                        					
					                        					$($(this).attr('data-ificon-action')).css('visibility','hidden');

					                        					$($(this).attr('data-ificon-action')+'.config-icon').css('visibility','visible');

					                        				} else if(_value == 'icon_text' ){

					                        					$($(this).attr('data-ificon-action')).css('visibility','visible');
					                        				}
					                        				else {
					                        					$($(this).attr('data-ificon-action')).css('visibility','hidden');
					                        				}
					                        			});
					                        		})
					                        	</script>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
						<tr class="form-filter-td">
							<td class="icon-config-second config-icon">
								<table>
									<tbody>
										<tr>
											<td><?php _e("Icon size","woo-bundle-choice") ?></td>
											<td>
												<input type="text" name="filter_icon_size" value="45px"/>
											</td>
										</tr>
									</tbody>
								</table>
							</td>							
							<td class="icon-config-second config-label">
								<table>
									<tbody>
										<tr>
											<td><?php _e("Icon label size","woo-bundle-choice") ?></td>
											<td>
												<input type="text" name="filter_icon_font_size" value="0.78571429rem"/>
											</td>
										</tr>
									</tbody>
								</table>
							</td>							
							<td>								
								<table>
									<tbody>
										<tr>
											<td>
												<label>Add reset link?</label>
												<input type="checkbox" value="1" name="filter_reset"/>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
						<tr class="form-filter-td">							
							<td>
								<table>
									<tbody>
										<tr>
											<td><input type="submit" value="<?php _e("Save","woo-bundle-choice"); ?>" class="submit button-primary" name="Submit"></td>
										</tr>
									</tbody>
								</table>
							</td>													
						</tr>						
					</tbody>					
				</table>	
				<div data-group="second" class="icon_msg" style="display:none;">
					<p><strong>Since you want to use icons with attributes filter this plugin will enable icon option for attributes on woocommerce page, so please set icons from there.</strong></p>
				</div>				
			</form>
		</div>
	</div>
</div>

<?php EO_WBC_Head_Banner::get_footer_line(); ?>

<script>
	jQuery(document).ready(function($){
		
		jQuery(".popup").popup({transition:'Horizontal Flip'});

		$('[name="filter_name"],[name="filter_input"]').on('change',function(){

			group = jQuery(this).attr('data-group');
			console.log(group);
			
			jQuery('.icon_msg[data-group="'+group+'"]').css('display','none');

			if($('[name="filter_type"][data-group="'+group+'"]').val()==1 && ($('[name="filter_input"][data-group="'+group+'"]').val() == 'icon' || $('[name="filter_input"][data-group="'+group+'"]').val() == 'icon_text')){
				jQuery('.icon_msg[data-group="'+group+'"]').css('display','block');
			} 
		});
		/*$('[name="filter_name"]').on('change',function(){
			if($('[name="filter_type"][data-group="'+$(this).data('group')+'"]').val()==0){
				$('[name="filter_input"][data-group="'+$(this).data('group')+'"]>option').each(function(i,e){
					
					category_ops=['icon','icon_text','text_slider'];

					if(category_ops.indexOf($(e).val())!=-1){
						$(e).removeAttr('disabled');
					}
					else{
						$(e).attr('disabled','disabled');	
					}
				});
				jQuery(jQuery("[name='filter_input'][data-group='"+$(this).data('group')+"']>option:not(:disabled)")[0]).attr('selected','selected');
			} else {
				$('[name="filter_input"][data-group="'+$(this).data('group')+'"]>option').each(function(i,e){
					
					category_ops=['icon','icon_text'];

					if(category_ops.indexOf($(e).val())==-1){
						$(e).removeAttr('disabled');
					}
					else{
						$(e).attr('disabled','disabled');	
					}
				});
				jQuery(jQuery("[name='filter_input'][data-group='"+$(this).data('group')+"']>option:not(:disabled)")[0]).attr('selected','selected');
			}
		}).trigger('change');*/

	});
</script>
	
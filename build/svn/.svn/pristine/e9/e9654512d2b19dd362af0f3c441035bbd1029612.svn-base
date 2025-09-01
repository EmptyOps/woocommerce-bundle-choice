<?php
	function eo_wbc_prime_category_($slug)
    {
        $map_base = get_categories(array(
            'hierarchical' => 1,
            'show_option_none' => '',
            'hide_empty' => 0,
            'parent' => get_term_by('slug',$slug,'product_cat')->term_id,
            'taxonomy' => 'product_cat'
        ));
        
        $category_option_list='';
        
        foreach ($map_base as $base) {
            $category_option_list.= "<option data-type='0' data-slug='{$base->slug}' value='".$base->term_id."'>".$base->name."</option>";
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
	<div>
		<h1>Filter's menu configuration</h1>
	</div>
	<hr/>	
	<div class="wrap woocommerce">				
		<h3><?php echo get_option('eo_wbc_first_name','First category') ?>'s filter configuration</h3>
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
			<div style="text-align: center;font-size: 1.5em;margin-top: 2em;margin-bottom:0.5em;font-weight: bold;">Add <?php echo get_option('eo_wbc_first_name','First category') ?>'s filter</div>
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
											<td>Filter</td>
											<td>
												<select name="filter_name" data-group='first' onchange="document.getElementById('filter_type_first').value=this.options[this.selectedIndex].getAttribute('data-type')">                        		
					                        		<?php echo eo_wbc_prime_category_(get_option('eo_wbc_first_slug'),''); ?>
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
											<td>Is advanced filter option ?</td>
											<td><input type="checkbox" name="filter_advanced" class="form-input"></td>
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
												<select name="filter_input">
					                        		<option value="icon">Icon Only</option>
					                        		<option value="icon_text">Icon and Text</option>
					                        		<option value="text_slider">Text slider</option>
					                        		<option value="step_slider">Step slider</option>
					                        		<option value="checkbox">Checkbox</option>
					                        	</select>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						
							<td>
								<table>
									<tbody>
										<tr>
											<td><input type="submit" value="Save" class="submit button-primary" name="Submit"></td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
					</tbody>
				</table>					
			</form>
		</div>
            
       
        <hr/>
        <h3><?php echo get_option('eo_wbc_second_name','Second category') ?>'s filter configuration</h3>            
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
			<div style="text-align: center;font-size: 1.5em;margin-top: 2em;margin-bottom:0.5em;font-weight: bold;">Add <?php echo get_option('eo_wbc_second_name','Second category') ?>'s filter</div>
			<form method="POST" name="add_filter_second">
				<?php wp_nonce_field('eo_add_filter_second'); ?>
				<input type="hidden" name="eo_wbc_action" value="bulk-filter-add">
				<input type="hidden" name="eo_filter_target" value="eo_wbc_add_filter_second">
				<table style="width: 100%;background-color: #f9f9f9;">
					<tbody>
						<tr  class="form-filter-td">
							<td>
								<table>
									<tbody>
										<tr>
											<td>Filter</td>
											<td>
												<select name="filter_name" data-group='second' onchange="document.getElementById('filter_type_second').value=this.options[this.selectedIndex].getAttribute('data-type')">                        		
					                        		<?php echo eo_wbc_prime_category_(get_option('eo_wbc_first_slug'),''); ?>
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
											<td>Is advanced filter option ?</td>
											<td><input type="checkbox" name="filter_advanced" class="form-input"></td>
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
												<select name="filter_input">
					                        		<option value="icon">Icon Only</option>
					                        		<option value="icon_text">Icon and Text</option>
					                        		<option value="text_slider">Text slider</option>
					                        		<option value="step_slider">Step slider</option>
					                        		<option value="checkbox">Checkbox</option>
					                        	</select>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						
							<td>
								<table>
									<tbody>
										<tr>
											<td><input type="submit" value="Save" class="submit button-primary" name="Submit"></td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
					</tbody>
				</table>					
			</form>
		</div>
	</div>
</div>
	
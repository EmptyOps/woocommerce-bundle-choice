<?php
    
    function yc_init_load_cat($slug,$prefix)
    {
        $map_base = get_categories(array(
            'hierarchical' => 1,
            'show_option_none' => '',
            'hide_empty' => 0,
            'parent' => get_term_by('slug',$slug,'product_cat')->term_id,
            'taxonomy' => 'product_cat'
        ));
        $res='';
        foreach ($map_base as $base) {
            $res.= "<option value='".$base->term_id."'>".$prefix.$base->name."</option>".yc_init_load_cat($base->slug, $prefix.'-');
        }
        return $res;
    }   
?>
<form name="yc_remove_frm" action="<?php echo admin_url('admin.php?page=yc-map'); ?>" method="post">
	<input type="hidden" name="first" value="">
	<input type="hidden" name="second" value="">
	<input type="hidden" name="action" value="remove">
</form>

<style>
    .info{
        color:grey !important;
        font-style: italic;
    }
</style>
<div class="wrap woocommerce">
<h1></h1>
	<?php	Head_Banner::get_head_banner(); ?>
	<br/>
	<hr/>
    <br/>
    <form action="" method="post">
              <table class="widefat fixed" cellspacing="0">
                <thead>
                <tr>                                   
                    <th class="check-column"></th>
                    <th class="manage-column column-columnname num" scope="col">First Product Category</th>                        
                    <th class="manage-column column-columnname num" scope="col"></th>
                    <th class="manage-column column-columnname num" scope="col">Second Product Category</th>                        
                    <th class="manage-column column-columnname num" scope="col">Action</th>
                </tr>
                </thead>
            
                <tbody>                    
                    <?php 
                        global $wpdb;
                        $query='select * from `'.$wpdb->prefix.'yc_cat_maps`';
                        $maps=$wpdb->get_results($query,'ARRAY_A');
                        if(count($maps)>0):
                        foreach ($maps as $map):
                    ?>
                    	<tr class="alternate">
                            <td class="check-column"></td>                        
                            <td class="column-columnname num"><?php echo get_term_by('id',$map['first_cat_id'],'product_cat')->name;?></td>
                            <td class="column-columnname num"><-------------------></td>
                            <td class="column-columnname num"><?php echo get_term_by('id',$map['second_cat_id'],'product_cat')->name;?></td>
                            <td class="column-columnname num"><a href="#" onclick="yc_remove_map('<?php echo $map['first_cat_id']; ?>','<?php echo $map['second_cat_id'] ?>')">Remove</a></td>                       
                    	</tr>                    
                    <?php  endforeach; else: ?>
                    			<tr>
                    			<td class="check-column"></td>
                        	    <td colspan=3 class="column-columnname num" style="color: red;font-weight: bold;">No Maps is available</td>
                        	    <td class="column-columnname num"></td>
                        	    </tr>
                        <?php 
                        endif;
                    
                    ?>
                    
                </tbody>
                
                <tfoot>                
                    <tr>                            
                            <th class="check-column"></th>
                            <th class="manage-column column-columnname num" scope="col">First Product Category</th>                            
                            <th class="manage-column column-columnname num" scope="col"></th>
                            <th class="manage-column column-columnname num" scope="col">Second Product Category</th>                            
                            <th class="manage-column column-columnname num" scope="col">Action</th>            
                    </tr>
                </tfoot>
            </table>    
            <br/>
            <table class="widefat fixed">
            	<tbody>
                	<tr>
                                <th class="check-column"></th>                            
                                <th class="manage-column column-columnname num" scope="col">
                                        <select name="yc_first_category" id="yc_first_category">
                    						<?php echo yc_init_load_cat(get_option('yc_first_slug'),'') ?>
                    					</select>
                    					<p class="info">( Select sub-category from first category. )</p>
            					</th>
                                <th class="manage-column column-columnname num" scope="col"><-------------------></th>
                                <th class="manage-column column-columnname num" scope="col">
                                    	<select name="yc_second_category" id="yc_second_category">
                							<?php echo yc_init_load_cat(get_option('yc_second_slug'),'') ?>
                						</select>            						
                						<p class="info">( Select sub-category from second category. )</p>
                                </th>                            
                                <th class="manage-column column-columnname num" scope="col"><button class="button button-primary button-hero action" style="float: right">Save New Map</button></th>            
                     </tr>
                 </tbody>
           </table>
    </form>    
</div>
<script type="text/javascript">
	function yc_remove_map(first,second)
	{
			document.getElementsByName("first")[0].value=first;
			document.getElementsByName("second")[0].value=second;
			document.forms.yc_remove_frm.submit();
	}
</script>
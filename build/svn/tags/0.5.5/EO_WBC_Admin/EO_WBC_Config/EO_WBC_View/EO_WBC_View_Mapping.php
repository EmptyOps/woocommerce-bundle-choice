<?php  

    $error_flag=true;
    if (get_option('eo_wbc_first_slug',false) && get_option('eo_wbc_second_slug',false)) {
        
        $_first_id=@(get_term_by('slug',get_option('eo_wbc_first_slug'),'product_cat')->term_id);
        $_second_id=@(get_term_by('slug',get_option('eo_wbc_second_slug'),'product_cat')->term_id);

        if($_first_id && $_second_id){

            global $wpdb;
            $query='select * from `'.$wpdb->prefix.'eo_wbc_cat_maps`';
            $maps=$wpdb->get_results($query,'ARRAY_A');
            if(!empty($maps)){                

                for ($i=0; $i < count($maps) ; $i++) { 
                    $_first_term=get_term_by('term_id',$maps[$i]['first_cat_id'],'product_cat');
                    $_second_term=get_term_by('term_id',$maps[$i]['second_cat_id'],'product_cat');

                    if(!empty($_first_term))
                        $error_flag=eo_wbc_product_has_cat_parent($_first_term,$_first_id);
                        if($error_flag===false)
                            break;
                    if(!empty($_second_term))
                        $error_flag=eo_wbc_product_has_cat_parent($_second_term,$_second_id);
                        if($error_flag===false)
                            break;
                }                
            }
        }
    }

    function eo_wbc_product_has_cat_parent($term_id,$top_parent){
        $_products=get_posts(
                            array(  'post_type' => 'product',
                                    'tax_query' => array(
                                        array(
                                            'taxonomy' => 'product_cat',
                                            'terms' => $term_id,
                                            'operator' => 'IN',
                                        )
                                    )
                                )
                            );
        for ($i=0; $i < count($_products) ; $i++) { 
            if(!in_array($top_parent,wp_get_post_terms($_products[0]->ID,'product_cat',array('fields'=>'ids'))))
                return false;
        }        
        return true;
    }

    //Footer Rating bar :)
    add_filter( 'admin_footer_text',function($footer_text){
        /* translators: %1s: <strong> tag */
        /* translators: %2s: </strong> tag */
        /* translators: %3s: rating link */
      return "<p id='footer-left' class='alignleft'>".sprintf(__("If you like %1s WooCommerce Bundle Choice %2s please leave us a %3s  rating. A huge thanks in advance!"),"<strong>","</strong>","<a href='https://wordpress.org/support/plugin/woo-bundle-choice/reviews?rate=5#new-post' target='_blank' class='wc-rating-link' data-rated='Thanks :)'>★★★★★</a>")."</p>";  
    });

    function eo_wbc_prime_category($slug,$prefix)
    {        
        $map_base = get_categories(array(
            'hierarchical' => 1,
            'show_option_none' => '',
            'hide_empty' => 0,
            'parent' => !empty(get_term_by('slug',$slug,'product_cat')) ?get_term_by('slug',$slug,'product_cat')->term_id : '',
            'taxonomy' => 'product_cat'
        ));
        
        $category_option_list='';
        
        foreach ($map_base as $base) {            
            $category_option_list.= "<option value='".$base->term_taxonomy_id."'>".$prefix.$base->name."</option>".eo_wbc_prime_category($base->slug, $prefix.'-');
        }
        return $category_option_list;
    }   

    function eo_wbc_attributes()
    {        
        $taxonomies="";
        foreach (wc_get_attribute_taxonomies() as $attribute) {                 
            $taxonomies.="<option disabled='disabled' value='".$attribute->attribute_id."'>".($attribute->attribute_label?$attribute->attribute_label:$attribute->attribute_name)."</option>";                
                foreach (get_terms(['taxonomy' => wc_attribute_taxonomy_name($attribute->attribute_name),'hide_empty' => false]) as $term) {
                $taxonomies.="<option value='".$term->term_taxonomy_id."'>-- ".$term->name."</option>";   
            }
        }
        return $taxonomies;
    }

    add_action( 'wp_enqueue_scripts',function(){
        wp_enqueue_script( 'jquery-ui-core' );
        wp_enqueue_script( 'jquery-ui-widget' );
        wp_enqueue_script( 'jquery-ui-mouse' );
        wp_enqueue_script( 'jquery-ui-accordion' );
        wp_enqueue_script( 'jquery-ui-autocomplete' );
        wp_enqueue_script( 'jquery-ui-slider' );
    });

    add_action( 'wp_enqueue_scripts',function(){
        $wp_scripts = wp_scripts();
        wp_enqueue_style(
          'jquery-ui-theme-smoothness',
          sprintf(
            '//ajax.googleapis.com/ajax/libs/jqueryui/%s/themes/smoothness/jquery-ui.css', // working for https as well now
            $wp_scripts->registered['jquery-ui-core']->ver
          )
        );
    });
?>
<form name="eo_wbc_remove_frm" action="<?php echo admin_url('admin.php?page=eo-wbc-map'); ?>" method="post">
	<?php wp_nonce_field('eo_wbc_nonce_remove_map'); ?>
	<input type="hidden" name="eo_wbc_source" value="">
	<input type="hidden" name="eo_wbc_target" value="">
	<input type="hidden" name="eo_wbc_action" value="eo_wbc_remove_map">
</form>

<style>
    .info{
        color:grey !important;
        font-style: italic;
    }

    @media only screen and (max-width: 782px) {
        #add_maps_row{            
            display: grid !important;        
        }
        #add_maps_row th:nth-child(3){            
            display: none !important;
        }
        #add_maps_row th:nth-child(2)::before{            
            content: "First Product Category \A\A";            
            display: grid;
            font-size: medium;
            font-weight: 600;
            white-space: pre;
        }
        #add_maps_row th:nth-child(4)::before{            
            content: "Second Product Category \A\A";
            display: grid;            
            font-size: medium;
            font-weight: 600;
            white-space: pre;
        }
        tfoot{
            display: none;
        }
    }
</style>
<div class="wrap woocommerce">
    <h1></h1>
	<?php	EO_WBC_Head_Banner::get_head_banner(); ?>
    <?php     
    if(!$error_flag){
        echo "<div class='notice notice-error is-dismissible'><p>".__( '<strong>Product mapping is  possibly incorrect,</strong> please ensure required products have at least assigned to the main product categories.', 'woocommerce' )."</p></div>";
    } ?>
    <br/>
        <p><a href="https://wordpress.org/support/plugin/woo-bundle-choice" target="_blank"><?php _e('If you are facing any issue, please write to us immediately.',"woo-bundle-choice"); ?></a></p>
	<br/>
    <?php do_action('eo_wbc_menu_tabs','eo-wbc-map'); ?>
	<hr/>
    
    <form action="<?php echo admin_url('admin.php?page=eo-wbc-map'); ?>" method="post">
        <?php wp_nonce_field('eo_wbc_nonce_map_pref'); ?>
        <input type="hidden" name="eo_wbc_action" value="eo_wbc_save_map_pref">
        
        <fieldset style="border: 1px solid black;border-radius: 2px;width: fit-content;padding: 1.5em;">
            <legend><h3><?php _e("Product mapping preference","woo-bundle-choice"); ?></h3></legend>
            <p class="info">( <?php _e("Determine how the product mapping shoul behave.<br/> eg: AND - product belongs to both category/attribute A and B<br/> OR - product belongs to either of category/attribute A or B","woo-bundle-choice"); ?> )</p>                        
            <table class="fixed">
                <tbody>                
                    <tr>
                        <td style="width: 10em;vertical-align: text-top;"><?php _e("Category","woo-bundle-choice"); ?></td>
                        <td>
                            <input type="radio" name="cat_pref" value="and" <?php echo get_option('eo_wbc_map_cat_pref','and')==='and'?'checked="checked"':''; ?> >&nbsp;&nbsp;<?php _e("And","woo-bundle-choice"); ?>
                            &nbsp;
                            <input type="radio" name="cat_pref" value="or" <?php echo get_option('eo_wbc_map_cat_pref','and')==='or'?'checked="checked"':''; ?>>&nbsp;&nbsp;<?php _e("Or","woo-bundle-choice");?>
                            <br/><br/>
                        </td>
                        <td>&nbsp;</td>                        
                    </tr>
                    <tr>
                        <td style="width: 10em;vertical-align: text-top;"><?php _e("Attribute","woo-bundle-choice"); ?></td>
                        <td>
                            <input type="radio" name="attr_pref" value="and" <?php echo get_option('eo_wbc_map_attr_pref','or')==='and'?'checked="checked"':''; ?> >&nbsp;&nbsp;<?php _e("And","woo-bundle-choice"); ?>
                            &nbsp;
                            <input type="radio" name="attr_pref" value="or" <?php echo get_option('eo_wbc_map_attr_pref','or')==='or'?'checked="checked"':''; ?> >&nbsp;&nbsp;<?php _e("Or","woo-bundle-choice"); ?>
                        </td>                    
                        <td>&nbsp;</td>
                     </tr>                 
                    <tr>
                        <td class="manage-column column-columnname num" scope="col" colspan="3">
                            <br/>
                            <button class="button button-primary action" style="float: right"><?php _e("Save Preference","woo-bundle-choice"); ?></button>
                        </td>            
                     </tr>
                 </tbody>
           </table>    
        </fieldset>        
    </form>
    <br/>
    <hr/>

    <fieldset style="border: 1px solid black;border-radius: 2px;width: fit-content;padding: 1.5em;">
        <legend><h3><?php _e("Map creation and modification","woo-bundle-choice"); ?></h3></legend>
    
        <form target="_self" action="" method="post">
            <!-- <input type="hidden" name="eo_wbc_action" value="bulk-map"> -->
            <?php
                
                $ob=new EO_WBC_List_Table();
                $ob->prepare_items();
                $ob->display();
            ?>   
            <input type="hidden" name="eo_wbc_action" value="bulk-map">
        </form>
        
        <form action="<?php echo admin_url('admin.php?page=eo-wbc-map'); ?>" method="post">
            <?php wp_nonce_field('eo_wbc_nonce_add_map'); ?>
            <input type="hidden" name="eo_wbc_action" value="eo_wbc_add_map">
            <br/>
            <table class="widefat fixed">
                <tbody>
                    <tr>
                        <th class="check-column">&nbsp;</th>
                        <td colspan="3" style="text-align: center;font-size: larger;font-weight: bold;"><?php _e("Add New Maps","woo-bundle-choice"); ?></td>
                        <th class="manage-column column-columnname num">&nbsp;</th>
                    </tr>
                    <tr id="add_maps_row">
                        <th class="check-column"></th>                            
                        <th class="manage-column column-columnname num" scope="col">
                                <select name="eo_wbc_first_category" id="eo_wbc_first_category">
                                    <option disabled="disabled"><?php _e("Category","woo-bundle-choice"); ?></option>
                                    <?php echo eo_wbc_prime_category(get_option('eo_wbc_first_slug'),' -- ') ?>
                                    <?php echo eo_wbc_attributes(); ?>
                                </select>
                                <p class="info">( <?php _e("Select sub-category from first category.","woo-bundle-choice"); ?> )</p>
                        </th>
                        <th class="manage-column column-columnname num" scope="col"><-------------></th>
                        <th class="manage-column column-columnname num" scope="col">
                                <select name="eo_wbc_second_category" id="eo_wbc_second_category">
                                    <option disabled="disabled"><?php _e("Category","woo-bundle-choice"); ?></option>
                                    <?php echo eo_wbc_prime_category(get_option('eo_wbc_second_slug'),' -- ') ?>
                                    <?php echo eo_wbc_attributes(); ?>
                                </select>                                   
                                <p class="info">( <?php _e("Select sub-category from second category.","woo-bundle-choice"); ?> )</p>
                        </th>
                        <th class="manage-column column-columnname num" scope="col">
                                <input type="number" name="eo_wbc_add_discount" min="0" max="100" value="0" step="0" style="text-align: right;"/>
                                <p class="info">( <?php _e("Discount rate in %","woo-bundle-choice"); ?> )</p>
                        </th>
                                                    
                        <th class="manage-column column-columnname num" scope="col"><button class="button button-primary button-hero action" style="float: right"><?php _e("Save New Map","woo-bundle-choice"); ?></button></th>            
                     </tr>
                 </tbody>
           </table>
       </form>
   </fieldset>
   <script type="text/javascript">
        function eo_wbc_remove_map(first,second)
        {
                document.getElementsByName("eo_wbc_source")[0].value=first;
                document.getElementsByName("eo_wbc_target")[0].value=second;
                document.forms.eo_wbc_remove_frm.submit();
        }
    </script> 
</div>

   
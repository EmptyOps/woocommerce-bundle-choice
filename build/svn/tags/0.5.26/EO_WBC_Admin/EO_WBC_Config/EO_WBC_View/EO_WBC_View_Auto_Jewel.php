<?php 
  $_atttriutes=array(
                    array(
                        'label' => 'Carat',
                        'range'=>true,
                        'terms' => array('min'=>'0.2','max'=>'25'),
                        'description' => 'Carat attributes for diamond shape',
                        'slug' => 'eo_carat_attr'
                    ),
                    array(
                        'label' => 'Clarity',
                        'terms' => array('IF','VVS1','VVS2','VS1','VS2','SI1'),
                        'description' => 'Clarity attributes for diamond shape',
                        'slug' => 'eo_clarity_attr'
                    ),
                    array(
                        'label' => 'Colour',
                        'terms' => array('D','E','F','G','H','I','J','K','L','M'),
                        'description' => 'Colour attributes for diamond shape',
                        'slug' => 'eo_colour_attr'
                    ),
                    array(
                        'label' => 'Polish',
                        'terms' => array('Excellent','Very Good','Good','Fair'),
                        'description' => 'Polish attributes for diamond shape',
                        'slug' => 'eo_polish_attr'
                    ),
                    array(
                        'label' => 'Symmertry',
                        'terms' => array('Excellent','Very Good','Good','Fair'),
                        'description' => 'Symmertry attributes for diamond shape',
                        'slug' => 'eo_symmertry_attr'
                    ),
                    array(
                        'label' => 'Fluorescence',
                        'terms' => array('None','Very','Slight','Slight','Faint'),
                        'description' => 'Fluorescence attributes for diamond shape',
                        'slug' => 'eo_fluorescence_attr'
                    ),
                    array(
                        'label' => 'Depth',
                        'range'=>true,
                        'terms' => array('min'=>'45','max'=>'85'),        
                        'description' => 'Depth attributes for diamond shape',
                        'slug' => 'eo_depth_attr'
                    ),
                    array(
                        'label' => 'Size',
                        'range'=>true,
                        'terms' => array('min'=>'4','max'=>'7'),        
                        'description' => 'Size attributes for settings',
                        'slug' => 'eo_size_attr'
                    ),
                    array(
                        'label' => 'Table',
                        'range'=>true,
                        'terms' => array('min'=>'45','max'=>'85'),
                        'description' => 'Table attributes for diamond shape',
                        'slug' => 'eo_table_attr'
                    ),
                    array(
                        'label' => 'Grading Report',
                        'terms' => array('GIA','IGI','AGS','HRD'),
                        'description' => 'Grading report attributes for diamond shape',
                        'slug' => 'eo_grading_report_attr'
                    ),
                    array(
                        'label' => 'Ring Style',
                        'terms' => array('Halo','Pave','Solitaire','Trilogy'),
                        'description' => 'Ring style attributes for diamond shape',
                        'slug' => 'eo_ring_style_attr'
                    ),
                    array(
                        'label' => 'Metal',
                        'terms' => array('14K White Gold','18K White Gold','14K Yellow Gold','18K Yellow Gold','14K Rose Gold','18K Rose Gold','Platinum'),
                        'description' => 'Metal attributes for diamond shape',
                        'slug' => 'eo_metal_attr'
                    ),
                  ); 

  $_img_url=EO_WBC_PLUGIN_DIR.'EO_WBC_Admin/EO_WBC_Config/EO_WBC_View/';
  
  $_category=array(
                array(
                    'thumb' => '',
                    'name' => 'Diamond Shape',
                    'description' => 'Diamond shapes category',
                    'slug' => 'eo_diamond_shape_cat',
                    'child'=> 
                    array(
                            array(
                                'thumb' => $_img_url.'EO_WBC_Img/round.png',
                                'name' => 'Round',
                                'description' => 'Diamond round shape',
                                'slug' => 'eo_diamond_round_shape_cat'
                            ),
                            array(
                                'thumb' => $_img_url.'EO_WBC_Img/princess.png',
                                'name' => 'Princess',
                                'description' => 'Diamond princess shape',
                                'slug' => 'eo_diamond_princess_shape_cat'
                            ),
                            array(
                                'thumb' => $_img_url.'EO_WBC_Img/emerald.png',
                                'name' => 'Emerald',
                                'description' => 'Diamond emerald shape',
                                'slug' => 'eo_diamond_emerald_shape_cat'
                            ),
                            array(
                                'thumb' => $_img_url.'EO_WBC_Img/asscher.png',
                                'name' => 'Asscher',
                                'description' => 'Diamond asscher shape',
                                'slug' => 'eo_diamond_asscher_shape_cat'
                            ),
                            array(
                                'thumb' => $_img_url.'EO_WBC_Img/marquise.png',
                                'name' => 'Marquise',
                                'description' => 'Diamond marquise shape',
                                'slug' => 'eo_diamond_marquise_shape_cat'
                            ),
                            array(
                                'thumb' => $_img_url.'EO_WBC_Img/oval.png',
                                'name' => 'Oval',
                                'description' => 'Diamond oval shape',
                                'slug' => 'eo_diamond_oval_shape_cat'
                            ),
                            array(
                                'thumb' => $_img_url.'EO_WBC_Img/rediant.png',
                                'name' => 'Radiant',
                                'description' => 'Diamond radiant shape',
                                'slug' => 'eo_diamond_radiant_shape_cat'
                            ),
                            array(
                                'thumb' => $_img_url.'EO_WBC_Img/pear.png',
                                'name' => 'Pear',
                                'description' => 'Diamond pear shape',
                                'slug' => 'eo_diamond_pear_shape_cat'
                            ),
                            array(
                                'thumb' => $_img_url.'EO_WBC_Img/heart.png',
                                'name' => 'Heart',
                                'description' => 'Diamond heart shape',
                                'slug' => 'eo_diamond_heart_shape_cat'
                            ),
                            array(
                                'thumb' => $_img_url.'EO_WBC_Img/cushion.png',
                                'name' => 'Cushion',
                                'description' => 'Diamond cushion shape',
                                'slug' => 'eo_diamond_cushion_shape_cat'
                            )
                    )
                ),
                array(
                    'thumb' => '',
                    'name' => 'Setting Shape',
                    'description' => 'Setting shapes category',
                    'slug' => 'eo_setting_shape_cat',
                    'child'=> 
                    array(
                            array(
                                'thumb' => $_img_url.'EO_WBC_Img/round.png',
                                'name' => 'Round Setting',
                                'description' => 'Setting round shape',
                                'slug' => 'eo_setting_round_shape_cat'
                            ),
                            array(
                                'thumb' => $_img_url.'EO_WBC_Img/princess.png',
                                'name' => 'Princess Setting',
                                'description' => 'setting princess shape',
                                'slug' => 'eo_setting_princess_shape_cat'
                            ),
                            array(
                                'thumb' => $_img_url.'EO_WBC_Img/emerald.png',
                                'name' => 'Emerald Setting',
                                'description' => 'Setting emerald shape',
                                'slug' => 'eo_setting_emerald_shape_cat'
                            ),
                            array(
                                'thumb' => $_img_url.'EO_WBC_Img/asscher.png',
                                'name' => 'Asscher Setting',
                                'description' => 'Setting asscher shape',
                                'slug' => 'eo_setting_asscher_shape_cat'
                            ),
                            array(
                                'thumb' => $_img_url.'EO_WBC_Img/marquise.png',
                                'name' => 'Marquise Setting',
                                'description' => 'Setting marquise shape',
                                'slug' => 'eo_setting_marquise_shape_cat'
                            ),
                            array(
                                'thumb' => $_img_url.'EO_WBC_Img/oval.png',
                                'name' => 'Oval Setting',
                                'description' => 'Setting oval shape',
                                'slug' => 'eo_setting_oval_shape_cat'
                            ),
                            array(
                                'thumb' => $_img_url.'EO_WBC_Img/rediant.png',
                                'name' => 'Radiant Setting',
                                'description' => 'Setting radiant shape',
                                'slug' => 'eo_setting_radiant_shape_cat'
                            ),
                            array(
                                'thumb' => $_img_url.'EO_WBC_Img/pear.png',
                                'name' => 'Pear Setting',
                                'description' => 'Setting pear shape',
                                'slug' => 'eo_setting_pear_shape_cat'
                            ),
                            array(
                                'thumb' => $_img_url.'EO_WBC_Img/heart.png',
                                'name' => 'Heart Setting',
                                'description' => 'Setting heart shape',
                                'slug' => 'eo_setting_heart_shape_cat'
                            ),
                            array(
                                'thumb' => $_img_url.'EO_WBC_Img/cushion.png',
                                'name' => 'Cushion Setting',
                                'description' => 'Setting cushion shape',
                                'slug' => 'eo_setting_cushion_shape_cat'
                            )
                    )
                ),
                array(
                    'thumb' => '',
                    'name' => 'Ring Style',
                    'description' => 'Ring style category',
                    'slug' => 'eo_ring_style_cat',
                    'child'=> 
                    array(
                            array(
                                'thumb' => $_img_url.'EO_WBC_Img/halo.png',
                                'name' => 'Halo',
                                'description' => 'Halo style for ring',
                                'slug' => 'eo_ring_halo_cat'
                            ),
                            array(
                                'thumb' => $_img_url.'EO_WBC_Img/pave.png',
                                'name' => 'Pave',
                                'description' => 'Pave style for ring',
                                'slug' => 'eo_ring_pave_cat'
                            ),
                            array(
                                'thumb' => $_img_url.'EO_WBC_Img/solitaire.png',
                                'name' => 'Solitaire',
                                'description' => 'Solitaire style for ring',
                                'slug' => 'eo_ring_solitaire_cat'
                            ),
                            array(
                                'thumb' => $_img_url.'EO_WBC_Img/trilogy.png',
                                'name' => 'Trilogy',
                                'description' => 'Trilogy style for ring',
                                'slug' => 'eo_ring_trilogy_cat'
                            )
                    )            
                 ),
                 array(
                    'thumb' => '',
                    'name' => 'Metal',
                    'description' => 'Metal category',
                    'slug' => 'eo_metal_cat',
                    'child'=> 
                    array(
                            array(
                                'thumb' => $_img_url.'EO_WBC_Img/wg-14.jpg',
                                'name' => '14K White Gold',
                                'description' => '14k white gold category for metal',
                                'slug' => 'eo_metal_14k_white_gold_cat'
                            ),
                            array(
                                'thumb' => $_img_url.'EO_WBC_Img/wg-18.jpg',
                                'name' => '18K White Gold',
                                'description' => '18k white gold category for metal',
                                'slug' => 'eo_metal_18k_white_gold_cat'
                            ),
                            array(
                                'thumb' => $_img_url.'EO_WBC_Img/yg-14.jpg',
                                'name' => '14K Yellow Gold',
                                'description' => '14k yellow gold category for metal',
                                'slug' => 'eo_metal_14k_yellow_gold_cat'
                            ),
                            array(
                                'thumb' => $_img_url.'EO_WBC_Img/yg-18.jpg',
                                'name' => '18K Yellow Gold',
                                'description' => '18k yellow gold category for metal',
                                'slug' => 'eo_metal_18k_yellow_gold_cat'
                            ),
                            array(
                                'thumb' => $_img_url.'EO_WBC_Img/rg-14.jpg',
                                'name' => '14K Rose Gold',
                                'description' => '14k rose gold category for metal',
                                'slug' => 'eo_metal_14k_rose_gold_cat'
                            ),
                            array(
                                'thumb' => $_img_url.'EO_WBC_Img/rg-18.jpg',
                                'name' => '18K Rose Gold',
                                'description' => '18k rose gold category for metal',
                                'slug' => 'eo_metal_18k_rose_gold_cat'
                            ),
                            array(
                                'thumb' => $_img_url.'EO_WBC_Img/pl.jpg',
                                'name' => 'Platinum',
                                'description' => 'Platinum category for metal',
                                'slug' => 'eo_metal_platinum_cat'
                            )
                    )            
                 )
              );

  $_step=1;

  if(!empty($_POST)) {

    if(isset($_POST['_wpnonce']) && wp_verify_nonce($_POST['_wpnonce'],'eo_wbc_auto_jewel')) {
      $index=0;
      $category=array();
      while(!empty($_POST['cat_value_'.$index])){
        if(!empty($_POST['cat_'.$index])){
          $_category[$index]['name']=$_POST['cat_value_'.$index];
          $category[]=$_category[$index];
        }
        $index++;
      }      

      $index=0;
      $attributes=array();
      while(!empty($_POST['attr_value_'.$index])){
        if(!empty($_POST['attr_'.$index])){
          $_atttriutes[$index]['name']=$_POST['attr_value_'.$index];
          $attributes[]=$_atttriutes[$index]; 
        }
        $index++;
      }

      ////////////////////////////////////////////////////////////////////////
      require_once ('library/EO_WBC_CatAt.php');
      $catat=new EO_WBC_CatAt();

          if(!empty($category)){
            //Send for creation and update returned array.
            $catat_category=$catat->create_category($category);            
            update_option('eo_wbc_cats',serialize($catat_category));           

            $catat->add_maps(array(
                array(
                    ['slug','eo_diamond_round_shape_cat','product_cat'],
                    ['slug','eo_setting_round_shape_cat','product_cat']
                ),
                array(
                    ['slug','eo_diamond_princess_shape_cat','product_cat'],
                    ['slug','eo_setting_pear_shape_cat','product_cat']
                ),
                array(
                    ['slug','eo_diamond_emerald_shape_cat','product_cat'],
                    ['slug','eo_setting_emerald_shape_cat','product_cat']
                ),
                array(
                    ['slug','eo_diamond_asscher_shape_cat','product_cat'],
                    ['slug','eo_setting_asscher_shape_cat','product_cat']
                ),
                array(
                    ['slug','eo_diamond_marquise_shape_cat','product_cat'],
                    ['slug','eo_setting_marquise_shape_cat','product_cat']
                ),
                array(
                    ['slug','eo_diamond_oval_shape_cat','product_cat'],
                    ['slug','eo_setting_oval_shape_cat','product_cat']
                ),
                array(
                    ['slug','eo_diamond_radiant_shape_cat','product_cat'],
                    ['slug','eo_setting_radiant_shape_cat','product_cat']
                ),
                array(
                    ['slug','eo_diamond_pear_shape_cat','product_cat'],
                    ['slug','eo_setting_pear_shape_cat','product_cat']
                ),
                array(
                    ['slug','eo_diamond_heart_shape_cat','product_cat'],
                    ['slug','eo_setting_heart_shape_cat','product_cat']
                ),
                array(
                    ['slug','eo_diamond_cushion_shape_cat','product_cat'],
                    ['slug','eo_setting_cushion_shape_cat','product_cat']
                )
            ));

            update_option('eo_wbc_first_name','Diamond Shape');//FIRST : NAME
            update_option('eo_wbc_first_slug','eo_diamond_shape_cat');//FIRST : SLUG
            update_option('eo_wbc_first_url','/product-category/eo_diamond_shape_cat/');//FIRST : NAME
            
            update_option('eo_wbc_second_name','Setting Shape');//SECOND : NAME
            update_option('eo_wbc_second_slug','eo_setting_shape_cat');//SECOND : SLUG
            update_option('eo_wbc_second_url','/product-category/eo_setting_shape_cat/');//SECOND : URL   

            update_option('eo_wbc_config_category',1);
            update_option('eo_wbc_config_map',1);    
            update_option('eo_wbc_btn_setting','0');
            update_option('eo_wbc_btn_position','begining');

          }

          if(!empty($attributes)){
            //Send for creation and update returned array.
            $catat_attribute=$catat->create_attribute($attributes);            
            update_option('eo_wbc_attr',serialize($catat_attribute));
            $catat->add_filters();     
            update_option('eo_wbc_filter_enable','1');     
          } 
      
      ///////////////////////////////////////////////////////////////////////
      
    }
    
    if(!empty($_POST['step'])){
      if($_POST['step']==3) {

        ?>
        <script type="text/javascript" >
        jQuery(document).ready(function($) {            

            var eo_wbc_max_products=<?php echo($catat->get_product_size()); ?>;            
            function eo_wbc_add_products(index){

                if(index>=eo_wbc_max_products){
                    
                    window.location.href="<?php echo(admin_url('admin.php?page=eo-wbc-home')); ?>";
                    return false;
                }

                jQuery(".button.button-primary.button-hero.action.disabled").val("Adding "+(index+1)+" of "+eo_wbc_max_products+" products");

                var data = {
                    'action': 'eo_wbc_add_products',
                    'product_index':index 
                };

                jQuery.post('<?php echo admin_url( 'admin-ajax.php' ); ?>', data, function(response) {
                    
                    eo_wbc_add_products(++index);                    
                });                
            }   
            
            $(".button.button-primary.button-hero.action").on('click',function(e){
                e.stopPropagation();
                e.preventDefault();
                if(!$(this).hasClass('disabled')) {
                    $(".button.button-hero.action:not(.disabled)").toggleClass('disabled');
                    for(i=0;i<=18;i++){
                        eo_wbc_add_products(0);    
                    }
                }                
                return false;
            });

        });
        </script> <?php
      }      
        $_step=$_POST['step'];
    } else {
        $_step=1;
    }
    
  }
?>

<div class="wrap woocommerce">
  <h1></h1>
  <?php EO_WBC_Head_Banner::get_head_banner(); ?> 
  <br/>
        <p><a href="https://wordpress.org/support/plugin/woo-bundle-choice" target="_blank"><?php _e("If you are facing any issue, please write to us immediately.","woo-bundle-choice"); ?></a></p>
  <br/>
  <hr/>
  <div style="clear:both;"></div>
  
  <form method="post">
    <?php wp_nonce_field('eo_wbc_auto_jewel'); ?>
    <input type="hidden" name="step" value="<?php echo $_step+1; ?>">
    <div>
      <h1><strong>Jewellary Setup</strong></h1>
      <p>You are at step <?php echo $_step; ?> of 3 steps.</p>
        <table class="form-table">
          <tbody>
            <tr valign="top">
              <!-- Sample Product Installation -->
              <?php if( !empty($_POST['step']) && $_POST['step']==3):?>
                <th>
                  <h3>Sample Products</h3>
                </th>
              </tr>
              <tr>
                <td> Sample products of rings and diamond will be added.</td>
              <!-- Attributes Installation -->
              <?php elseif($_step==2):?>
                <th>
                  <h3>Attributes</h3>
                </th>
              </tr>
              <tr>
                <td>                    
                  <?php foreach ($_atttriutes as $index=>$_attr): ?>                                                                  
                    <input type="checkbox" name="attr_<?php echo $index; ?>" id="<?php _e($_attr['slug']); ?>" value="<?php _e($_attr['slug']) ?>" checked="checked">
                    <input type="text" name="attr_value_<?php echo $index; ?>" placeholder="<?php _e($_attr['label']) ?>" value="<?php _e($_attr['label']); ?>">
                    <!--<label for="<?php _e($_attr['slug']); ?>"><?php _e($_attr['label']); ?></label>-->
                    <br/><br/>                        
                  <?php endforeach;?>                      
                </td>
              <!-- Category Installation -->
              <?php else:?>
                <th>
                  <h3>Category</h3>
                </th>
              </tr>
              <tr>
                <td>                    
                  <?php foreach ($_category as $index=>$_cat): ?>                                              
                    <input type="checkbox" name="cat_<?php echo $index; ?>" id="<?php _e($_cat['name']); ?>" value="<?php _e($_cat['slug']) ?>" checked="checked">
                    <!--<label for="<?php //_e($_cat['name']); ?>"><?php //_e($_cat['name']); ?></label> -->    
                    <input type="text" name="cat_value_<?php echo $index; ?>" placeholder="<?php _e($_cat['name']) ?>" value="<?php _e($_cat['name']); ?>">
                    <br/><br/>                        
                  <?php endforeach;?>                      
                </td>
              <?php endif; ?>
            </tr>
          </tbody>
          <tfoot>
            <tr>
              <td>
                <?php $_steps=["catagorie(s)","attribute(s)","product(s)"]; ?>
                <input type="submit" name="save" value="<?php printf(__("Create sample %1s","woo-bundle-choice"),$_steps[$_step-1]); ?>"  class="button button-primary button-hero action">                
              </td>
              <td>
                <a href="#" class="button button-hero action" onclick="if(!jQuery(this).hasClass('disabled')){ window.location.href='<?php echo admin_url('admin.php?page=eo-wbc-home'); ?>'; }">Cancel</a>
              </td>
            </tr>
          </tfoot>
        </table>
    </div>            
  </form>
</div>

<?php EO_WBC_Head_Banner::get_footer_line(); ?>

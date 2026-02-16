<?php

/*
*	Template to show cart page
*/

?>
    <tr>
        <td data-title="">
            <a href="?EO_WBC=1&EO_WBC_REMOVE=<?php echo esc_url($index);?>" class="remove" aria-label="Remove this item" >&times;</a>                                    
        </td>
        <td data-title="Thumbnail">
            <div class="ui two equal width column grid">
                <div class="row">
                    <span class="column ui small image"><?php echo esc_html($first->get_image('thumbnail')); ?></span>
                    <?php if($cart['SECOND']):?>                        
                        <span class="column ui small image"><?php echo esc_html($second->get_image('thumbnail')); ?></span>
                    <?php endif; ?>
                </div>
            </div>
        </td>
        <td data-title="Product">           
            <p><?php echo esc_html($first->get_title().
                ($cart['FIRST'][2]  ? "<br/>&nbsp; - &nbsp;".implode(',',wbc()->wc->eo_wbc_get_product_variation_attributes($cart['FIRST'][2],$cart['FIRST']['variation'])) :'')); ?></p>          
        
            <?php if($cart['SECOND']):?>
            <p><?php echo esc_html($second->get_title().
                   ($cart['SECOND'][2] ? "<br/>&nbsp; - &nbsp;".implode(',',wbc()->wc->eo_wbc_get_product_variation_attributes($cart['SECOND'][2],$cart['SECOND']['variation'])):'')); ?></p>
            <?php endif; ?>                                 
        </td>
        <td data-title="Price"> 
            <p>
                <?php 
                    $product_obj=wbc()->wc->eo_wbc_get_product($cart['FIRST'][2]?$cart['FIRST'][2]:$cart['FIRST'][0]);
                    echo esc_html(wc_price($product_obj->get_price())); 
                ?>                    
            </p>
            <?php $price=($product_obj->get_price()*$cart['FIRST'][1]); ?>
        
        
            <?php if($cart['SECOND']):?>
                <p>
                    <?php 
                        $product_obj=wbc()->wc->eo_wbc_get_product($cart['SECOND'][2]?$cart['SECOND'][2]:$cart['SECOND'][0]);
                        echo esc_html(wc_price($product_obj->get_price())); 
                    ?>                        
                </p>
                <?php $price+=($product_obj->get_price()*$cart['SECOND'][1]); ?>
            <?php endif; ?>             
        </td>
        <td data-title="Quantity">
            <p><?php echo esc_html($cart['FIRST'][1]); ?></p>
            <?php if($cart['SECOND']):?>
            <p><?php echo esc_html($cart['SECOND'][1]); ?></p>
            <?php endif; ?>
        </td>
        <td data-title="Cost">
            <div class="ui middle aligned four column centered grid">
                <?php echo esc_html(wc_price($price)); ?>
            </div>
        </td>                               
    </tr> 

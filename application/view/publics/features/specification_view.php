<?php 

/*
*	Specification view temlate part.
*/


    global $product;
    
    $product_data = array();
    $sku = $product->get_sku();
    if(!empty($sku)){
        $product_data[]=array('SKU',$sku);    
    }            

    if($product->has_weight()){
       $product_data[]=array('Weight',$product->get_weight());
    }

    if($product->has_dimensions()){
        $product_data[]=array('Height',$product->get_height());
        $product_data[]=array('Width',$product->get_width());
        $product_data[]=array('Length',$product->get_length());                
    }

    if($product->has_attributes()){
        $attributes = $product->get_attributes();
        if(!empty($attributes) and !is_wp_error($attributes)){
            foreach ($attributes as $key => $attribute) {
                $terms=$attribute['options'];                        

                if(!empty($terms) and !is_wp_error($terms)){
                    $_term_list_ = array();
                    foreach ($terms as $term_id) {
                        $_term_ = get_term_by( 'id',$term_id,$attribute['name']);                                
                        $_term_list_[] = $_term_->name;
                    }
                    $product_data[]=array(wc_attribute_label($attribute->get_name()),implode(', ',$_term_list_));
                }                        //get_term_by( 'id',,$attribute['name']);    
            }
        }
    }

    if(!empty($product_data)){
    list($product_data_1, $product_data_2) = array_chunk($product_data, ceil(count($product_data) / 2));
    ?>

        <div class="ui two equal width grid container stackable product_specification">
            <div class="row">
                <?php if(!empty($product_data_1) and is_array($product_data_1)):?>
                <div class="column">                            
                    <table class="ui single line unstackable table" style="border: none;">  
                      <tbody>                            
                        <?php foreach ($product_data_1 as $data): ?> 
                            <tr>
                                <td style="border-top: 1px solid #dddddd;
                border-left: none !important;
                border-right: none !important;
                border-bottom: none !important;"><?php echo $data[0]; ?> :</td>
                                <td style="border-top: 1px solid #dddddd;
                border-left: none !important;
                border-right: none !important;
                border-bottom: none !important;"><?php echo $data[1]; ?></td>    
                            </tr>                            
                        <?php endforeach;?>
                      </tbody>
                    </table>                                                
                </div>
                <?Php endif; ?>
                <?php if(!empty($product_data_2) and is_array($product_data_2)):?>
                <div class="column">                            
                    <table class="ui single line unstackable table" style="border: none;">  
                      <tbody>                            
                        <?php foreach ($product_data_2 as $data): ?> 
                            <tr>
                                <td style="border-top: 1px solid #dddddd;
                border-left: none !important;
                border-right: none !important;
                border-bottom: none !important;"><?php echo $data[0]; ?> :</td>
                                <td style="border-top: 1px solid #dddddd;
                border-left: none !important;
                border-right: none !important;
                border-bottom: none !important;"><?php echo $data[1]; ?></td>    
                            </tr>                            
                        <?php endforeach;?>
                      </tbody>
                    </table>
                </div>
                <?Php endif; ?>
            </div>
        </div>
        <br/>            
    <?php
    }
   
<?php
/*
* Template to show specification view as Template series default.
*/

if(!empty($product_data)):
  ob_start();
 ?>
<hr style="clear: both;margin-top: 0.5em;margin-bottom: 0.5em;" />
    <h4 style="text-align: center;">Specifications</h4>
<hr style="clear: both;margin-top: 0.5em;margin-bottom: 0.5em;" />
<div class="ui two equal width grid container stackable product_specification" style="direction: ltr;">
    <div class="row">
        <?php if(!empty($product_data_1) and is_array($product_data_1)):?>
        <div class="column">                            
            <table class="ui single line unstackable table striped" style="border: none;">  
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
            <table class="ui single line unstackable table striped" style="border: none;">  
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
<style type="text/css">
    body .ui.two.equal.width.grid.product_specification>.row>.column {
        max-width: 50%;
    }
    .product_specification .column table tbody tr:nth-child(odd) {
        background: #efefef;
    }
</style>
<br/>            
<?php 
    echo ob_get_clean();
  endif; 
?>
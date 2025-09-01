<?php
/*
* Template to show specification view as Template series 2.
*/

if(!empty($product_data)):
  ob_start();
 ?>
<table class="ui compact celled definition table" style="clear:both;direction: ltr;">
    <thead style="text-align:center;">
      <tr>
        <th style="border-top:1px solid rgba(34,36,38,.1); border-left:1px solid rgba(34,36,38,.1);">Specifications</th>
        <?php foreach ($product_data as $spec):?>
            <th><?php _e($spec[0]); ?></th>                         
        <?php endforeach; ?>                    
      </tr>
    </thead>
    <tbody>                            
      <tr style="text-align:center;">
        <td style="border:none;"></td>
        <?php foreach ($product_data as $spec):?>
            <td style="border:none;"><?php _e($spec[1]); ?></td>
        <?php endforeach; ?>                                        
      </tr> 
    </tbody>
</table>
<?php 
    echo ob_get_clean();
  endif; 
?>
<?php
/*
* Template to show specification view as Template series 1.
*/

if(!empty($product_data)):
  ob_start();
 ?>
<table class="ui striped single line unstackable table" style="clear:both;direction: ltr;">
    <tbody>    
        <tr>
          <td rowspan="2" class="center aligned" style="font-weight: bold;    text-align: center;vertical-align: middle;">Specifications</td>
            <?php foreach ($product_data as $spec):?>
                
                <td class="center aligned" style="background-color: rgba(0,0,0,.1);     font-weight: bold;"><?php _e($spec[0]); ?></td>
            <?php endforeach; ?>
        </tr>
        <tr> 
            <?php foreach ($product_data as $spec):?>
                <td style="border:none;" class="center aligned"><?php _e($spec[1]); ?></td>        
            <?php endforeach; ?>
        </tr>
    </tbody>
</table>
<?php 
    echo ob_get_clean();
  endif; 
?>
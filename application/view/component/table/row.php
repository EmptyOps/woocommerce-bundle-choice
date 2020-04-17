<?php 

/**
 * Table row
 *
 * $head_item @array : It's contains details fo the table header data
 * $body @array : It's contains details fo the table body data
 * $meta @array : It's contains row data type E.g: <th> or <td>
 * $rows @array : It's contains table row data
 */

?>
	
 <tr>
   <?php if(!empty($row) && is_array($row)) { 

		foreach ($row as $index => $column) {
     	
	     	if(isset($column['is_header']) && $column['is_header'] == 1) { ?>
	     		<th>
				    <?php echo $column["val"]; ?>	
				</th>
	     	<?php }
	     	else { ?>
	     		<td>
	     			<?php 
	     				if( !isset($column["is_icon"]) || !$column["is_icon"] ){
		     				echo $column["val"]; 
	     				}
	     				else{?>
			     			<i class="<?php echo !empty($column["icon_class"]) ? $column["icon_class"] : "";?> icon"></i><?php
	     				}

					?>	
	     		</td>
	     	<?php }
	    } 
	}
	?>
 </tr>

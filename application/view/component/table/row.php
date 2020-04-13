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
   <?php if(!empty($head) || is_array($head)) { 

   		if(!empty($meta) || !empty($rows) || is_array($meta) || is_array($rows))
   		{
   			foreach ($rows as $index => $row) {
		     	
		     	if(in_array($meta['header'], $index)) { ?>
		     		<th>
					    <?php echo $row; ?>	
					</th>
		     	<?php }
		     	else { ?>
		     		<td>
		     			<?php echo $row; ?>
		     		</td>
		     	<?php }
		    } 
   		}
	}
	elseif( !empty($body) || is_array($body)) { 

		if(!empty($meta) || !empty($rows) || is_array($meta) || is_array($rows))
   		{
   			foreach ($rows as $index => $row) {
		     	
		     	if(in_array($meta['header'], $index)) { ?>
		     		<th>
					    <?php echo $row; ?>	
					</th>
		     	<?php }
		     	else { ?>
		     		<td>
		     			<?php echo $row; ?>
		     		</td>
		     	<?php }
		    } 
   		}
	} ?>
 </tr>

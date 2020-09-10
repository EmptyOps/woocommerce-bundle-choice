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
     		//start tag
	     	if(isset($column['is_header']) && $column['is_header'] == 1) { ?>
	     		<th <?php echo !empty($column['colspan']) ? 'colspan="'.$column['colspan'].'"' : '';?> class="<?php echo !empty($column['align']) ? $column['align'] : 'center';?> aligned header <?php echo !empty($column['class']) ? $column['class'] : '';?> <?php echo !empty($column['disabled']) ? 'disabled' : '';?>">
	     	<?php 
	     	}
	     	else { ?>
	     		<td <?php echo !empty($column['colspan']) ? 'colspan="'.$column['colspan'].'"' : '';?> class="<?php echo !empty($column['align']) ? $column['align'] : 'center';?> aligned <?php echo !empty($column['class']) ? $column['class'] : '';?> <?php echo !empty($column['disabled']) ? 'disabled' : '';?>">

	     			<?php 
	     			if(!empty($column['link']) and isset($column['edit_id'])){
	     				?> <a href="#" data-wbc-editid="<?php _e($column['edit_id']); ?>"> <?php
	     			}
			}
 			
 			//val
			if( isset($column["is_icon"]) && $column["is_icon"] ){
 				wbc()->load->template('component/tiny_elements/icon',array('icon_class'=>!empty($column["icon_class"]) ? $column["icon_class"] : "")); 
			}
			elseif ( isset($column["is_checkbox"]) && $column["is_checkbox"] ) {
				wbc()->load->template('component/form/input_checkbox',$column["checkbox"]); 
 			}
 			else{
				echo $column["val"]; 
 			}

			//end tag
			if(isset($column['is_header']) && $column['is_header'] == 1) { ?>
				</th>
	     	<?php 
	     	}
	     	else { 

	     			if(!empty($column['link']) and isset($column['edit_id'])){
	     				?> </a> <?php
	     			}
	     			?>
	     		</td>
	     	<?php 
	     	}
	    } 
	}
	?>
 </tr>

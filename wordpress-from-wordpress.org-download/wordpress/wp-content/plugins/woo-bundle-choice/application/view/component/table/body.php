<?php 

/**
 * Table body
 *
 * $body @array : It's contains details fo the table body data
 * 
 */
?>
<tbody>
<?php 
	if(!empty($body) && is_array($body)) { ?>
  		<?php 
		foreach ($body as $index => $row) {
			wbc()->load->template('component/table/row', array("row"=>$row) ); 
		}	
	} 
?>
</tbody>

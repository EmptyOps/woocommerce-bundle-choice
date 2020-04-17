<?php 

/**
 * Table body
 *
 * $body @array : It's contains details fo the table body data
 * 
 */

<?php if(!empty($body) && is_array($body)) { ?>
	
  <tbody>
  		<?php 
		foreach ($body as $index => $row) {
			wbc()->load->template('component/table/row.php', array("row"=>$row) ); 
		}	
		?>
  </tbody>

<?php }
<?php 

/**
 * Table body
 *
 * $body @array : It's contains details fo the table body data
 * 
 */

if(!empty($body) && is_array($body)) { ?>
	
  <tbody>
  		<?php 
		foreach ($body as $index => $row) {
			wbc()->load->template('component/table/row', array("row"=>$row) ); 
		}	
		?>
  </tbody>

<?php }
<?php 

/**
 * Table header
 *
 * $head_item @array : It's contains details for the table header data
 * 
 */
if(!empty($head) && is_array($head)) { ?>
	<thead>
		<?php 
		foreach ($head as $index => $row) {
			wbc()->load->template('component/table/row', array("row"=>$row) ); 
		}	
		?>
	</thead>
<?php }
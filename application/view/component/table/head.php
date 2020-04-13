<?php 

/**
 * Table header
 *
 * $head_item @array : It's contains details fo the table header data
 * 
 */

if( is_array(!empty($head) || $head)) { ?>
	<thead>
		<?php wbc()->load->template('admin/component/table/wbc-row.php',$head); ?>
	</thead>
<?php }
<?php 

/**
 * Table body
 *
 * $body @array : It's contains details fo the table body data
 * 
 */

<?php if(!empty($body) || is_array($body)) { ?>
	
  <tbody>
  		<?php wbc()->load->template('admin/component/table/wbc-row.php',$body); ?>
  </tbody>

<?php }
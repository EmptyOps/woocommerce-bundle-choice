<?php 

/**
 * Table
 *
 * $head_item @array : It's contains details fo the table header data
 * $body @array : It's contains details fo the table body data
 *
 */

if(!empty($head) || !empty($body_data) || is_array($head) ||  is_array($body)) { ?>
<table class="ui celled structured table">

	<?php wbc()->load->templates('admin/component/table/wbc-head.php',$head); ?>

	<?php wbc()->load->templates('admin/component/table/wbc-body.php',$body); ?>	

</table>	
<?php }
<?php 

/**
 * Table
 *
 * $head_item @array : It's contains details fo the table header data
 * $body @array : It's contains details fo the table body data
 *
 */

//TODO use helper function here to check if var is non empty array
if(!empty($id) && !empty($head) && !empty($body) && is_array($head) && is_array($body)) { ?>
<table id="<?php echo $id; ?>" class="ui celled structured table <?php echo !empty($class)?$class:''; ?>" <?php echo !empty($attr)?$attr:''; ?>>

	<?php wbc()->load->template('component/table/head.php', array( "head"=>$head ) ); ?>

	<?php wbc()->load->template('component/table/body.php', array( "body"=>$body ) ); ?>	

</table>	
<?php }
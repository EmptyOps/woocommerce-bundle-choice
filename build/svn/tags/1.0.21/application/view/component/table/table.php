<?php 

/**
 * Table
 *
 * $head_item @array : It's contains details fo the table header data
 * $body @array : It's contains details fo the table body data
 *
 */

//TODO use helper function here to check if var is non empty array
if(!empty($id) /*&& !empty($head) && !empty($body) && is_array($head) && is_array($body)*/ ) { ?>
<table id="<?php echo $id; ?>" class="ui celled structured table <?php echo !empty($class)?$class:''; ?>" <?php echo !empty($attr)?$attr:''; ?>>

	<?php 
	if(!empty($head)){
		wbc()->load->template('component/table/head', array( "head"=>$head ) ); 
	}
	?>

	<?php 
	if(true || /*always at least load the body tag which is important for some javascript operations*/ !empty($body)){
		wbc()->load->template('component/table/body', array( "body"=>$body ) ); 
	}
	?>	

</table>	
<?php }
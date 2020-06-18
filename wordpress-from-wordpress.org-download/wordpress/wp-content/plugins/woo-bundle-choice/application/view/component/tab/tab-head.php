<?php 

/**
 * Tabs
 *
 * $tabs @array : contains details of the tabs items e.g:- array(name,slug,status)
 */

if(!empty($tabs) || is_array($tabs)) { ?>

  <div class='ui top attached tabular menu tab-wrapped'>

 	<?php foreach($tabs as $tab) {  		
 		wbc()->load->template('component/tab/tab-item', $tab);
 	} ?>

  </div>
<?php } ?>
 
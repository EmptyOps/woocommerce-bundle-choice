<?php

/*
*   Template to show breadcrumb first step for desktop
*/

?>
<div class="<?php echo (($step==3)?'active ':(($step>3)?'completed ':(!empty(\eo\wbc\model\publics\component\EOWBC_Breadcrumb::$clickable_breadcrumb)?'':' '))); ?> step">
	<div class="ui equal width middle aligned grid" style="width: 100%;padding-top: 0px;text-transform:none;font-family: '<?php echo wbc()->options->get_option('appearance_filters','header_font','ZapfHumanist601BT-Roman'); ?>';">        

	    <div class="ui column left aligned">3</div>
	    <div class="ui column left aligned">
	        <div class="title">Complete</div>
	        <div><?php _e($preview_name); ?></div>
	    </div>    
	</div>
</div>
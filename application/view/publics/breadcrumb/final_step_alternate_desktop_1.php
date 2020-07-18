<?php

/*
*	Template to show breadcrumb final step for desktop
*/

?>
<div class="ui equal width grid" style="width: 100%;margin-top: -1em !important;">

    <div class="column">3</div>
    <div class="column" style="text-align: left;">
        <div class="description">Complete</div>
        <div class="title"><?php echo $preview_name; ?></div>
        <div>&nbsp;</div>
    </div>                                                                     
    <div class="column " style="<?php echo empty($preview_icon)?'visibility: hidden;':''; ?>"><img src="<?php echo $preview_icon; ?>" class="ui mini image" style="margin: auto auto;"/></div>                            
</div>
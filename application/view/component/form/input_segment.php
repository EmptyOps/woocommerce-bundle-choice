<?php

// Template to show the segment at very begining of the ui form container


?>

<?php if(!empty($label)): ?>
	<div class="field" style="width: 100% !important">
		<div class="ui vertical segment"><strong><?php echo $label ?></strong></div>
		<?php if(!empty($desc)): ?>		
		<span class="ui grey text fluid medium sixteen wide">(<?php echo $desc; ?>)</span>
		<?php endif; ?>
	</div>
<?php endif; ?>

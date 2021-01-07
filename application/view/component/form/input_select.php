<?php

/**
*	template to show select as input method.
*/

//wbc()->common->pr($options,$force_debug = false,$die = false);
if(!empty($id) /*and !empty($label)*/){
	?>	
	<div class="<?php echo !empty($size_class)?$size_class:''; ?> field" <?php echo !empty($attr)?$attr:''; ?>>
		<?php 
		if( !empty($label) )
		{
			wbc()->load->template('component/form/input_label',array('id'=>$id,'label'=>$label)); 
		}
		?>
		<div class="ui selection dropdown <?php echo !empty($class)?$class:''; ?>" id="<?php echo $id; ?>_dropdown_div" <?php _e(!empty($field_attr)?implode(' ',$field_attr):''); ?>>
		  	<input type="hidden" id="<?php echo $id; ?>" name="<?php echo $id; ?>" value="<?php echo $value; ?>">
		  	<i class="dropdown icon"></i>		
		  	<div class="default text"></div>		  	
		  	<div class="menu">
		  		<?php if(!empty($options) and is_array($options)): ?>
			    	<div class="item" data-value=""> - Select - </div>
		  			<?php foreach($options as $key=>$item): ?>
		  				<?php 
		  				if( !is_array($item) ){ ?>
			    			<div class="item" data-value="<?php echo $key; ?>"><?php echo $item; ?></div> <?php
			    		}
			    		else { 
			    			if(isset($item["is_header"]) && $item["is_header"]) { ?>
			    				<div class='divider'></div><div class='header'><?php echo $item["label"]; ?></div> <?php
			    			}
			    			else {
			    		?>
							<div class="item" <?php echo !empty($item["attr"]) ? $item["attr"] : ""; ?> data-value="<?php echo $key; ?>"><?php echo $item["label"]; ?></div> <?php
			    			}
			    		}
			    		?>
			    	<?php endforeach; ?>	
		    	<?php endif; ?>
		  	</div>		
		</div>
		<?php
		if (isset($visible_info))
		{
			wbc()->load->template('component/form/input_visible_info',$visible_info); 
		}
		?>
	</div>
	<?php
}



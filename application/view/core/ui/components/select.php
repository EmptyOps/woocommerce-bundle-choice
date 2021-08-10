<?php 
	//Semantic UI : fields
?>

<div class="ui selection dropdown <?php echo !empty($class)?$class:''; ?>" <?php !empty($id)?_e('id="'.$id.'_dropdown"'):''; ?> <?php !empty($attr)?_e($attr):''; ?>>
  	<input type="hidden" <?php !empty($id)?_e('id="'.$id.'"'):''; ?> <?php !empty($name)?_e('name="'.$name.'"'):''; ?> value="<?php !empty($value)?_e($value):''; ?>">
  	<i class="dropdown icon"></i>		
  	<div class="default text"></div>		  	
  	<div class="menu">
  		<?php if(!empty($options) and is_array($options)): ?>
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

<?php 
	//Semantic UI : fields
?>

<div class="ui selection dropdown <?php echo !empty($class)?esc_attr($class)/*$class*/:''; ?>" <?php !empty($id)?_e('id="'.$id.'_dropdown"'):''; ?> <?php !empty($attr)?_e($attr):''; ?>>
  	<input type="hidden" <?php !empty($id)?_e('id="'.$id.'"'):''; ?> <?php !empty($name)?_e('name="'.$name.'"'):''; ?> value="<?php !empty($value)?_e($value):''; ?>">
  	<i class="dropdown icon"></i>		
  	<div class="default text"></div>		  	
  	<div class="menu">
  		<?php if(!empty($options) and is_array($options)): ?>
  			<?php foreach($options as $key=>$item): ?>
  				<?php 
  				if( !is_array($item) ){ ?>
	    			<div class="item" data-value="<?php echo esc_attr($key)/*$key*/; ?>"><?php echo esc_attr($item)/*$item*/; ?></div> <?php
	    		}
	    		else { 
	    			if(isset($item["is_header"]) && $item["is_header"]) { ?>
	    				<div class='divider'></div><div class='header'><?php echo esc_attr($item["label"])/*$item["label"]*/; ?></div> <?php
	    			}
	    			else {
	    			?>
					<div class="item" <?php echo !empty($item["attr"]) ? esc_attr($item["attr"])/*$item["attr"]*/ : ""; ?> data-value="<?php echo esc_attr($key)/*$key*/; ?>"><?php echo esc_attr($item["label"])/*$item["label"]*/; ?></div> <?php
	    			}
	    		}
	    		?>
	    	<?php endforeach; ?>	
    	<?php endif; ?>
  	</div>		
</div>

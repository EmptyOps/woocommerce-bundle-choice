<?php 
	//Semantic UI : fields
?>

<div class="ui selection dropdown <?php echo !empty($class) ? esc_attr($class) : ''; ?>" <?php !empty($id) ? 'id="'.esc_attr_e($id.'_dropdown').'"' : ''; ?> <?php !empty($attr) ? esc_attr_e($attr) : ''; ?>>
  	<input type="hidden" <?php !empty($id) ? 'id="'.esc_attr_e($id).'"' : ''; ?> <?php !empty($name) ? 'name="'.esc_attr_e($name).'"' : ''; ?> value="<?php !empty($value) ? esc_attr_e($value) : ''; ?>">
  	<i class="dropdown icon"></i>		
  	<div class="default text"></div>		  	
  	<div class="menu">
  		<?php if(!empty($options) && is_array($options)): ?>
  			<?php foreach($options as $key => $item): ?>
  				<?php 
  				if( !is_array($item) ){ ?>
	    			<div class="item" data-value="<?php echo esc_attr($key); ?>"><?php echo esc_html($item); ?></div> <?php
	    		}
	    		else { 
	    			if(isset($item["is_header"]) && $item["is_header"]) { ?>
	    				<div class='divider'></div><div class='header'><?php echo esc_html($item["label"]); ?></div> <?php
	    			}
	    			else {
	    			?>
					<div class="item" <?php echo !empty($item["attr"]) ? esc_attr($item["attr"]) : ""; ?> data-value="<?php echo esc_attr($key); ?>"><?php echo esc_html($item["label"]); ?></div> <?php
	    			}
	    		}
	    		?>
	    	<?php endforeach; ?>	
    	<?php endif; ?>
  	</div>		
</div>


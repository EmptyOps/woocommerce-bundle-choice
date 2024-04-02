<?php 
	//Semantic UI : fields
?>

<div class="ui selection dropdown <?php echo !empty($class) ? esc_attr($class) : ''; ?>" <?php !empty($id) ? 'id="'.esc_attr_e($id.'_dropdown').'"' : ''; ?> <?php /*NOTE: we are not escaping the $attr because it may contain multiple attributes and we do not want esc_attr function to escape the double qoutes(") of the different attribute values. but anyway we understand the security requirement here so we have always escaped the attribute value with the esc_attr from wherever this $attr var is passed*/!empty($attr) ? _e($attr) : ''; ?>>
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
					<div class="item" <?php echo !empty($item["attr"]) ? $item["attr"] : ""; ?> data-value="<?php echo esc_attr($key); ?>"><?php echo esc_html($item["label"]); ?></div> <?php
	    			}
	    		}
	    		?>
	    	<?php endforeach; ?>	
    	<?php endif; ?>
  	</div>		
</div>


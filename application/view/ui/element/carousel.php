<?php $ride_id = uniqid() ?>
<div <?php echo (!empty($id)? "id='${id}'" : "") ?> class="carousel slide <?php echo (!empty($class) ? implode(' ',$class) : "") ?>" data-ride="<?php echo $ride_id ?>">
  <div class="carousel-inner">

  	<?php 
		if(!empty($builder) and !empty($child)){
	    	$builder->build($child,$option_key);
	    }
	?>

  </div>
  <a class="carousel-control-prev" <?php echo (!empty($id)? "href='#${id}'" : "") ?> role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only"><?php _e('Previous'); ?></span>
  </a>
  <a class="carousel-control-next" <?php echo (!empty($id)? "href='#${id}'" : "") ?> role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only"><?php _e('Next'); ?></span>
  </a>
</div>
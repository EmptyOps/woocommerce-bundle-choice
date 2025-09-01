<style type="text/css">
	.wc_addons_wrap {
 	   max-width: 1200px;
	}
	.wc_addons_wrap .addons-featured {
	    margin: 0;
	}
	.wc_addons_wrap .addons-banner-block, .wc_addons_wrap .addons-wcs-banner-block {
	    background: #fff;
	    border: 1px solid #ddd;
	    margin: 0 0 1em 0;
	    padding: 2em 2em 1em;
	}
	.wc_addons_wrap .addons-banner-block-items {
	    display: -webkit-box;
	    display: -webkit-flex;
	    display: flex;
	    -webkit-box-orient: horizontal;
	    -webkit-box-direction: normal;
	    -webkit-flex-direction: row;
	    flex-direction: row;
	    -webkit-flex-wrap: wrap;
	    flex-wrap: wrap;
	    -webkit-justify-content: space-around;
	    justify-content: space-around;
	    margin: 0 -10px 0 -10px;
	}

	.wc_addons_wrap .addons-banner-block-item:nth-child(-n+3) {
	    display: block;
	}
	.wc_addons_wrap .addons-banner-block-item, .wc_addons_wrap .addons-column-block-item {
	    display: none;
	}
	.wc_addons_wrap .addons-banner-block-item {
	    border: 1px solid #e6e6e6;
	    border-radius: 3px;
	    -webkit-box-flex: 1;
	    -webkit-flex: 1;
	    flex: 1;
	    margin: 1em;
	    min-width: 200px;
	    width: 30%;
	}
	.wc_addons_wrap .addons-banner-block-item-icon {
	    background: #f7f7f7;
	    height: 143px;
	}
	.wc_addons_wrap .addons-banner-block-item-icon, .wc_addons_wrap .addons-column-block-item-icon {
	    -webkit-box-align: center;
	    -webkit-align-items: center;
	    align-items: center;
	    display: -webkit-box;
	    display: -webkit-flex;
	    display: flex;
	    -webkit-box-pack: center;
	    -webkit-justify-content: center;
	    justify-content: center;
	}
	.wc_addons_wrap .addons-banner-block-item-content {
	    display: -webkit-box;
	    display: -webkit-flex;
	    display: flex;
	    -webkit-box-orient: vertical;
	    -webkit-box-direction: normal;
	    -webkit-flex-direction: column;
	    flex-direction: column;
	    height: 300px;
	    -webkit-box-pack: justify;
	    -webkit-justify-content: space-between;
	    justify-content: space-between;
	    padding: 24px;
	}
	.wc_addons_wrap .addons-button-solid {
	    background-color: #27292a;
	    color: #fff;
	}
	.wc_addons_wrap .addons-button {
	    border-radius: 3px;
	    cursor: pointer;
	    display: block;
	    height: 37px;
	    line-height: 37px;
	    text-align: center;
	    text-decoration: none;
	    width: 100%;
	    margin-left: 1em;	    
	}

	.inline-buttons{
		grid-column-gap: 1em;
		display: grid;
		grid-template-columns: auto auto;
	}
</style>

<?php 

//////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////
$this_plugin_slug = '';	// since slug is supposed to change in short time, so relied on id 
$this_plugin_id = 126;
//////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////


function get_string_between($string,$start,$end) {
	$string = ''.$string;
	$ini = strpos($string, $start);
	if($ini == 0) return;
	$ini += strlen($start);
	$len = strpos($string, $end, $ini) - $ini;
	return substr($string, $ini, $len);
}

function get_extensions_data() {
	$url = "https://sphereplugins.com/?filter_plugin_list=1";
    return wp_remote_get( $url);
}

$this_plugin = '';
?>

<?php //$make_buy= "https://sphereplugins.com/buy-a-plugin-extension/?cemail=".wp_get_current_user()->data->user_email."&cpname="; ?>

<div class="wrap woocommerce">
    
    <div class="addons-featured wc_addons_wrap">

	    <?php 

	    $response = get_extensions_data();
	    for($try=0; $try<2; $try++) {
	    	if( !is_wp_error( $response ) and wp_remote_retrieve_response_code($response)==200 ) {
	    		break;
	    	}
	    	else {
	    		$response = get_extensions_data();
	    	}
	    }

		// if( is_wp_error( $api_response ) ) {
		// 	return false; // Bail early
		// }
		$error_message = "";
		if(!is_wp_error( $response ) and wp_remote_retrieve_response_code($response)==200 ) {
			$response = json_decode(wp_remote_retrieve_body($response));			
		} else {
			$response = "";
			$error_message = "Ooops! Something went wrong please try reloading the page.";
		}
		if(!empty($response) and !is_wp_error($response) and is_array($response)) {
			$data = $response;
		?>
			
			<div class="addons-banner-block">

				<h1>Extensions</h1>
				<hr/>

				<?php if( ! empty( $data ) ) {

				  $count = 0;
				  $product_category = array();
				  ?>

				  <?php foreach( $data as $product ) {  
				  	
				  	if($product->slug == $this_plugin_slug){ continue; }
				  	foreach ($product->categories as $category) {
					  	    $product_category[] = $category->slug;
					} ?>

					<?php if(in_array("wordpress-extensions", $product_category)): ?>

					  	<?php if($count % 3 == 0): ?>	
						  <div class='addons-banner-block-items'>
						<?php endif; ?>

						  <div class="addons-banner-block-item">
							<div class="addons-banner-block-item-icon">
								<img class="addons-img" style="height: inherit;" src="
								<?php foreach($product->images as $images) {
				  					echo $images->src;
				  					break;
				  				} ?>" />
							</div>
							<div class="addons-banner-block-item-content">
								<h3 style="align-self: center;"><?php echo $product->name; ?></h3>
								<div style="overflow: hidden;text-overflow: ellipsis;">
								<?php 
									// if( strpos($product->short_description, '<span>') !== FALSE ) {
										$findSome = get_string_between($product->short_description, '<span>', '</span>');
										echo $findSome; 
									// }
									// else {
									// 	$my_string = $product->short_description;
									// 	echo implode(' ', array_slice(explode(' ', $my_string), 0, 25))."\n";
									// }
								?>
								</div>
								<div>
									<a class="addons-button addons-button-solid" target="_blank" href="<?php echo $product->permalink; ?>" style="margin-left:0 !important;">
										<?php if(!empty($product->price)){
										    echo "Buy Now ($".$product->price.")";
										  }else {
										  	 echo "Get free access";
										  }
										?>	
									</a>							
								</div>
							</div>
					      </div> 
			 			<?php if($count % 3 == 2): ?>
						  </div>
					    <?php endif; 

					    unset($product_category);

					    $count++;    

					endif; 
				  } 

				} ?>
			</div>

			<div class="addons-banner-block">

				<h1>Our Other Plugins</h1>
				<hr/>

				<?php if( ! empty( $data ) ) {

				  $count = 0;
				  $product_category = array(); ?>

				  <?php foreach( $data as $product ) { 
						if($product->id == $this_plugin_id || $product->slug == $this_plugin_slug){ continue; }
				   	
				  	foreach ($product->categories as $category) {				  		
					  	$product_category[] = $category->slug;				  		
					} 
					?>

					<?php if(/*in_array("wordpress-plugins", $product_category) ||*/ in_array("popular-plugins", $product_category)): ?>						
					  	<?php if($count % 3 == 0): ?>	
						  <div class='addons-banner-block-items'>
						<?php endif; ?>
						  
						  <div class="addons-banner-block-item">
							<div class="addons-banner-block-item-icon">
								<img class="addons-img" style="height: inherit;" src="
								<?php foreach($product->images as $images) {
				  					echo $images->src;
				  					break;
				  				} ?>" />
							</div>
							<div class="addons-banner-block-item-content">
								<h3 style="align-self: center;"><?php echo $product->name; ?></h3>
								<div style="overflow: hidden;text-overflow: ellipsis;">
								<?php $findSome = get_string_between($product->short_description, '<span>', '</span>');
									echo $findSome; 
								?>
								</div>
								<div>
									<a class="addons-button addons-button-solid" target="_blank" href="<?php echo $product->permalink; ?>" style="margin-left:0 !important;">Download Now</a>							
								</div>
							</div>
					      </div>

			 			<?php if($count % 3 == 2): ?>
						  </div>
					    <?php endif; 

					    unset($product_category);

					    $count++;    

					endif; 
				  }

				} ?>
			</div>

		<?php }
		else {
			?>
				<div class="addons-banner-block">

					<p><?php echo $error_message;?></p>

				</div>
			<?php
		}
		?>
	</div>
</div>

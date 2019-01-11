<?php 
class Head_Banner{
    public static function get_head_banner()
    {
        ?>
       	<div>
        	<span style="display: inline-block;">
        		<img style="max-height: 100px;max-width:100px;position:relative;top:1em;" alt="Your Choice" src="<?php echo plugin_dir_url(dirname(__FILE__)).'YC_View/YC_Img/YC_Cart.png'; ?>">
        	</span>&nbsp;&nbsp;
        	<div style="display: inline-block;">
        		<h1><?php _e(constant('PLUGIN_NAME')."&nbsp;&nbsp;&nbsp;".constant('PLUGIN_VERSION')) ?></h1>
        		<p class="info">
        			Thank you for installing Woocommerce Bundled Choice! Woocommerce Bundled Choice excites users to buy with joy.			
        		</p>
        	</div>	
        </div>
        <?php         
    }
}


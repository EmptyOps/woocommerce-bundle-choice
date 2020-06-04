<?php

/*
*	Template to show breadcrumb first step for mobile
*/

?>
        <div class="step <?php echo (($step==$order)?'active ':(($step>$order)?'completed ':'disabled')); ?> second_mobile">
            <div class="content"><?php echo wbc()->options->get_option('configuration','first_name','')/*get_option('eo_wbc_second_name','')*/; ?></div>
            <div class="ui flowing popup bottom right transition hidden second_mobile" style="width: 80%;">
                <div class="ui grid">
                    <div class="six wide column" style="width: 80px;height: auto;margin: auto;">
                        <?php if(!empty($second)) : ?>
                        <?php echo $second->get_image(); ?>
                        <?php endif; ?>
                    </div>
                    <div class="ten wide column">
                        <div class="ui header">
                            <?php if(!empty($second)) : ?>
                            <?php _e(wc_price($second->get_price())); ?>
                            <?php endif; ?>
                        </div>
                        <br/>
                        <div class="ui equal width grid">                            
                            <u><a href="<?php echo $view_url; ?>">View</a>
                            </u>
                            <u>
                                <a href="<?php echo $change_url; ?>">Remove</a>
                            </u>
                        </div>  
                    </div>                
                </div>
            </div>                          
        </div>
        <script>
            jQuery(document).ready(function(){
                jQuery('.step.completed.second_mobile').popup({
                    popup : jQuery('.ui.popup.second_mobile'),
                    on    : 'click',
                    target   :jQuery('.step.completed.second_mobile').parent(),
                    position : 'bottom left',
                    inline: true
                });
            });
        </script>

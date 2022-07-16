
<!-- ---- a code /themes/purple_theme/woocommerce/content-single-product.php no che 
--- Splide_Slider
 -->
 <?php 
 // enqueue common assets 
add_action( 'wp_enqueue_scripts' ,function(){
    wbc()->load->asset('css','variations/gallery_images/external-plugins/splide/splide-core.min',array(),"",false,true);
    wbc()->load->asset('js','variations/gallery_images/external-plugins/splide/splide.min',array(),"",true,true);
    ?>
    <!-- <script type="text/javascript">
        var splide = new Splide( '#slider1', {
            direction   : 'ttb',
             wheel       : true,
             releaseWheel: true,
            height     : '30rem',
            pagination: false,
             perPage: 5,
            gap: '10px',
            cover:false,
             type   : 'loop',
             updateOnMove: true,
              arrows:true,
            slider:true,
            perMove     : 1,
            rewind      : true,
            isNavigation: true,
            drag:true,
            dragMinThreshold: {
                mouse: 4,
                touch: 10,
            },
        } );
        splide.mount();
    </script> -->

    <!-- -- a tejas che api che -->
    <script type="text/javascript">

        var init_function = function(){

            console.log("slider asset init_function");

            var splide = new Splide( /*'#slider1'*/ '.splide_slider_container', {
                direction   : 'ttb',
                 wheel       : true,
                 releaseWheel: true,
                height     : '30rem',
                pagination: false,
                 perPage: 5,
                gap: '10px',
                cover:false,
                  type   : 'slide',
                 updateOnMove: true,
                  arrows:true,
                slider:true,
                perMove     : 1,
                rewind      : true,
                isNavigation: true,
                drag:true,
                dragMinThreshold: {
                    mouse: 4,
                    touch: 10,
                },
            } );
            splide.mount();
        };

        /*document.addEventListener("DOMContentLoaded", function(event) {
            
            window.document.splugins.wbc.variations.gallery_images.sp_slzm.api.init_listener(function(){

                init_function();
            });
            window.document.splugins.wbc.variations.gallery_images.sp_slzm.api.refresh_listener(function(){

                init_function();
            });

        } );*/

        // jQuery( window ).on('load', function() {
        document.addEventListener("DOMContentLoaded", function() { 

            // ACTIVE_TODO below timeout function is temporary. remove it when the loading sequence is fixed. 
            window.setTimeout(function(){

                console.log("asset slider addEventListener");

                window.document.splugins.wbc.variations.gallery_images.sp_slzm.api.init_listener(function(event, stat_object, notification_response){

                    console.log("asset slider init_listener");

                    init_function();
                });
                window.document.splugins.wbc.variations.gallery_images.sp_slzm.api.refresh_listener(function(event, stat_object, notification_response){

                    console.log("asset slider refresh_listener");

                    init_function();
                });

            },1000);    

        });

        document.addEventListener("DOMContentLoaded", function() { 

            // ACTIVETODO enable below code if requared
            // //slider
            // jQuery(".small-img").click(function(){
            //     jQuery(".big-img").attr('src',jQuery(this).attr('src'));
            // });


             //-- seme che uper lode karli che
            /*var splide = new Splide( '#slider1', {
                direction   : 'ttb',
                 wheel       : true,
                 releaseWheel: true,
                height     : '30rem',
                pagination: false,
                 perPage: 5,
                gap: '10px',
                cover:false,
                 type   : 'loop',
                 updateOnMove: true,
                  arrows:true,
                slider:true,
                perMove     : 1,
                rewind      : true,
                isNavigation: true,
                drag:true,
                dragMinThreshold: {
                    mouse: 4,
                    touch: 10,
                },
            } );
            splide.mount();*/
        });
    </script>
<?php
},1049);
?>
<style type="text/css">
    .sp-variations-gallery-images-slider.splide_slider_container li img {
        display: block;
        margin: auto;
    }

    /*tejas_22_07_2022 it for new QC upgrades so it is permenent*/
    .Product_Left_Wrapper_Plugin_Images {
        max-width: 58%;  /*---Change---*/
        min-width: 58%;  /*---Change---*/
        float: left;
        overflow: hidden;
        clear: left;
    }
    .splide_slider_container {
        float: left;
        width: 80px;
    }

    /*====Slider=====*/


    div#slider1 {
        float: left;
        width: 80px;
        position: relative;
    }

    .splide__list{
        height: auto;
    }



    body div#slider1 .splide__list li {
        border-radius: 5px;
        cursor: pointer;
        padding: 1px;
        margin-bottom: 10px;
        border: 1px solid #d3d3d3;
    }


    div#slider1 .splide__list li img{
        width: 100%;
        height: 100%;
        object-fit: contain !important;
    }



    div#slider1 .splide__arrows .splide__arrow.splide__arrow--prev {
        top: -1.5rem;
        left: 50%;
        transform: translate(-50%);
        background: transparent;
        border: 0;
        cursor: pointer;
        position: absolute;
    }


    div#slider1 .splide__arrows .splide__arrow.splide__arrow--next {
        bottom: -1.8rem;
        top: auto;
        left: 50%;
        transform: translate(-50%);
        right: -2.5rem;
        background: transparent;
        border: 0;
        cursor: pointer;
        position: absolute;
    }


    div#slider1 .splide__arrows .splide__arrow.splide__arrow--prev svg {
        transform: rotate(-90deg);
        fill: #333;
        stroke: currentColor;
        stroke-linecap: square;
        stroke-width: 0px;
        height: 1.2rem;
        vertical-align: middle;
        width: 1.2rem;
    }



     .splide__arrows .splide__arrow.splide__arrow--next svg {
        transform: rotate(90deg);
        fill: #333;
        stroke: currentColor;
        stroke-linecap: square;
        stroke-width: 0px;
        height: 1.2rem;
        vertical-align: middle;
        width: 1.2rem;
    }
</style>

 <?php 

// ---- a code /themes/purple_theme/woocommerce/content-single-product.php no che 
// --- Splide_Slider



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

        var splide_init_function = function(){

            console.log("slider asset init_function");

            var splide = new Splide( '#slider1'/* '.splide_slider_container'*/, {
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

                // ACTIVE_TODO temp.
                // return false;

                console.log("asset slider addEventListener");

                window.document.splugins.wbc.variations.gallery_images.sp_slzm.api.init_listener('splide',function(event, stat_object, notification_response){

                    console.log("asset slider init_listener");

                    splide_init_function();
                });
                window.document.splugins.wbc.variations.gallery_images.sp_slzm.api.refresh_listener('splide',function(event, stat_object, notification_response){

                    console.log("asset slider refresh_listener");

                    splide_init_function();
                });

            },1000);    

        });

        // document.addEventListener("DOMContentLoaded", function() { 

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
        // });
    </script>
<?php
},1049);
?>
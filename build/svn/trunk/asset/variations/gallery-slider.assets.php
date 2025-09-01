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
        clear: left;
    }
    .splide_slider_container {
        float: left;
        width: 80px;
    }

    /*====Slider=====*/
    :root{
        --spui-slider-unselected-border-color: #d3d3d3;
        --spui-slider-hover-selected-border-color: #000000;
    }

    .splide_slider_container .imgScrollWrap_v {
            float: left;
            width: 100%;
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
        border: 1px solid var(--spui-slider-unselected-border-color);
    }
    body div#slider1 .splide__list li:hover,
    body div#slider1 .splide__list li:active,
    body div#slider1 .splide__list li:focus,
    body div#slider1 .splide__list li:target,
    body div#slider1 .splide__list li:visited
    {
        border-color: var(--spui-slider-hover-selected-border-color);
    }

    .splide__track .splide__list {
        height: auto;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
            -ms-flex-direction: column;
                flex-direction: column;
    }


    div#slider1 .splide__list li img{
        width: 100%;
        height: 100%;
        -o-object-fit: contain !important;
           object-fit: contain !important;
        max-height: 5rem;
        min-height: 5rem;
        display: block;
        margin: auto;
        max-width: 100%;
        opacity: .5;
    }
    body div#slider1 .splide__list li:hover img,
    body div#slider1 .splide__list li:active img,
    body div#slider1 .splide__list li:focus img,
    body div#slider1 .splide__list li:target img,
    body div#slider1 .splide__list li:visited img
    {
        opacity: 1;
    }



    div#slider1 .splide__arrows .splide__arrow.splide__arrow--prev {
        top: -2.5rem;
        left: 50%;
        transform: translate(-50%);
        background: transparent;
        border: 0;
        cursor: pointer;
        position: absolute;
    }


    div#slider1 .splide__arrows .splide__arrow.splide__arrow--next {
        bottom: -2.8rem;
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




    /*----Responsive-----*/

    @media(max-width:480px){

        body .Product_Left_Wrapper_Plugin_Images {
            display: -webkit-box !important;
            display: -ms-flexbox !important;
            display: flex !important;
            -webkit-box-orient: vertical;
            -webkit-box-direction: reverse;
                -ms-flex-direction: column-reverse;
                    flex-direction: column-reverse;
            -ms-flex-wrap: wrap;
                flex-wrap: wrap;
            padding: 0 15px;
        }

        .Product_Left_Wrapper_Plugin_Images .sp-variations-gallery-images-slider {
            float: none !important;
            width: 100% !important;
            margin-top: 1rem;
        }
        .Product_Left_Wrapper_Plugin_Images .sp-variations-gallery-images-slider .splide_slider_container-loop {
            -webkit-box-orient: horizontal !important;
            -webkit-box-direction: normal !important;
                -ms-flex-direction: row !important;
                    flex-direction: row !important;
            gap: .5em;
            -ms-flex-wrap: wrap !important;
                flex-wrap: wrap !important;
            -webkit-box-pack: center;
                -ms-flex-pack: center;
                    justify-content: center;
            overflow-y: hidden;
        }

        .Product_Left_Wrapper_Plugin_Images .sp-variations-gallery-images-slider .splide_slider_container-loop li {
            width: 100% !important;
            -webkit-box-flex: 0;
                -ms-flex: 0 1 18%;
                    flex: 0 1 18%;
            margin-bottom: 0 !important;
            float: none;
        }
            ul.sp-variations-gallery-images-slider-loop.splide_slider_container-loop.exzoom_img_ul.splide__list {
                    overflow-x: scroll;
                    overflow-y: hidden;
                    white-space: nowrap;
                    display: block;
        }
            ul.sp-variations-gallery-images-slider-loop.splide_slider_container-loop.exzoom_img_ul.splide__list::-webkit-scrollbar {
                display: none ;
        } 
    
            body div#slider1 .splide__list li {
            display: inline-flex; !important;
            width: 25% !important;
            margin: 0 3px;
            
        }


    }



    @media(max-width:393px){
        .Product_Left_Wrapper_Plugin_Images .sp-variations-gallery-images-slider .splide_slider_container-loop li{
            width: 14px !important;
            display: inline-block;
            height: auto !important;
            -webkit-box-flex: inherit !important;
                -ms-flex: inherit !important;
                    flex: 0 1 18% !important;
            background: #fff;
            border-radius: 5px !important;
            border: 1px solid #a7a7a7 !important;
            min-width: 14px;
            max-width: 100%;
            min-height: auto !important;
            max-height: 100% !important;
        }

        .Product_Left_Wrapper_Plugin_Images .sp-variations-gallery-images-slider .splide_slider_container-loop li img.img-fluid {
            width: auto !important;
            height: auto !important;
            max-width: 100% !important;
            min-height: 100%;
            border-radius: 0px !important;
            /* visibility: hidden; */
            opacity: 1 !important;
        }

        body div#slider1 .splide__list li:hover, body div#slider1 .splide__list li:active, body div#slider1 .splide__list li:focus, 
        body div#slider1 .splide__list li:target, body div#slider1 .splide__list li:visited{
            background: none !important;
            border: 1px solid black !important;
        }
        div#slider1 .splide__list li img {
            width: 100% !important;
            height: auto !important;
        }


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
        
        var is_splide_initiated = false;

        var is_splide_initiated = false;

        var splide_init_function = function(){

            if(is_splide_initiated){
                return;
            }
            is_splide_initiated = true;

            console.log("slider asset init_function");
            // setTimeout(function(argument) {
                
            //     var splide = new Splide( '#slider1'/* '.splide_slider_container'*/, {
            //         direction       : 'ttb',
            //         wheel           : true,
            //         // releaseWheel    : true,
            //         height          : '30rem',
            //         pagination      : false,
            //         perPage         : 5,
            //         gap             : '10px',
            //         cover           : false,
            //         type            : 'loop',
            //         // updateOnMove    : true,
            //         arrows          : true,
            //         // slider          : true,
            //         perMove         : 1,
            //         rewind          : true,
            //         isNavigation    : true,
            //         drag            : false,
            //         // dragMinThreshold: {
            //         //     mouse: 4,
            //         //     touch: 10,
            //         // },
            //     } );
            //     splide.mount();
            // },1000);
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
<?php
if(WBC_SCRIPT_DEBUG == ture){
?>    
    <style type="text/css">
        .container{
            width: 100% !important;
        }

        #main-content .container{
            padding-top: 1em !important;
        }
        .top-ticker{
            display:none;
        }
        .store-wrapper{
            padding: 1em !important;
            width: 100% !important;
        }
        .woocommerce-products-header__title.page-title{
            display: none;
        }
    </style>

<?php
}else{
?>
    <style type="text/css">
        .container{width:100%!important}#main-content .container{padding-top:1em!important}.top-ticker{display:none}.store-wrapper{padding:1em!important;width:100%!important}.woocommerce-products-header__title.page-title{display:none}
    </style>
    
<?php
}
?>
<?php
if(WBC_SCRIPT_DEBUG == true){
?>    
    <style type="text/css">
        .container{
            width: 100% !important;
        }

        #main-content .container{
            padding-top: 1em !important;
        }
        #main-content>.container{
            margin-left: 5% !important;
            margin-right:5% !important;
            max-width: unset;
            width: 90%;
        }
        .eo-wbc-container.container{
            margin: 0px !important;
            width: 100% !important;
            min-width: 100% !important;
        }
    </style>

<?php
}else{
?>
    <style type="text/css">
        .container{width:100%!important}#main-content .container{padding-top:1em!important}#main-content>.container{margin-left:5%!important;margin-right:5%!important;max-width:unset;width:90%}.eo-wbc-container.container{margin:0!important;width:100%!important;min-width:100%!important}
    </style>
    
<?php
}
?>
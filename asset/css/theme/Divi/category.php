<?php
if(WBC_SCRIPT_DEBUG == false){
?>    
    <style type="text/css">
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
       #main-content>.container{margin-left:5%!important;margin-right:5%!important;max-width:unset;width:90%}.eo-wbc-container.container{margin:0!important;width:100%!important;min-width:100%!important}
    </style>
<?php
}
?>
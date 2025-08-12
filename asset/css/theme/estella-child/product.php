<?php
if(WBC_SCRIPT_DEBUG == false){
?>    
    <style type="text/css">
        .container{
            width: 100% !important;
        }
        #main-content .container{
            padding-top: 1em !important;
        }

        .eo-wbc-container>.ui.steps .step::after{
            border-top: 4em solid transparent !important;
            border-bottom: 4em solid transparent !important;
        }   

        .eo-wbc-container>.ui.steps .step:not(:first-child):before{
            border-top: 4em solid transparent !important;
            border-bottom: 4em solid transparent !important;
            border-left: 1em solid #d2d2d2 !important;
        }
    </style>

<?php
}else{
?>
    <style type="text/css">
        .eo-wbc-container>.ui.steps .step::after,.eo-wbc-container>.ui.steps .step:not(:first-child):before{border-top:4em solid transparent!important;border-bottom:4em solid transparent!important}.container{width:100%!important}#main-content .container{padding-top:1em!important}.eo-wbc-container>.ui.steps .step:not(:first-child):before{border-left:1em solid #d2d2d2!important}
    </style>
    
<?php
}
?>
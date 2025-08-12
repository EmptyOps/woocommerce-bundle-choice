<?php
if(WBC_SCRIPT_DEBUG == ture){
?>    
    <style type="text/css">
        
        .wrap,.entry-content{
            min-width: 100% !important;
            max-width: 100% !important;
            width: 100% !important;
            margin: 0px !important;
            padding: 0px !important;
        }
        .ui.cards .card{
            margin-top:0px !important;
            margin-bottom:0px !important;
        }
        .eo-wbc-container>.ui.steps div{
            font-size: 0.85em !important;
        }
    </style>

<?php
}else{
?>
    
    <style type="text/css">
        
        .entry-content,.wrap{min-width:100%!important;max-width:100%!important;width:100%!important;margin:0!important;padding:0!important}.ui.cards .card{margin-top:0!important;margin-bottom:0!important}.eo-wbc-container>.ui.steps div{font-size:.85em!important}
    </style>
<?php
}
?>
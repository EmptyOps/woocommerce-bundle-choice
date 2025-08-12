<?php
if(WBC_SCRIPT_DEBUG == ture){
?>    
    <style type="text/css">
        .ui.grid{
            min-width: unset !important;
            max-width: unset !important;
            width:100% !important;
            margin-top: 0rem !important;
        }
        .ui.grid.centered>.row{
            padding-top: 0px;
        }   
        @media only screen and (max-width: 768px) {
            #main{
                margin-left: 0px !important; 
            }
        }
    </style>

<?php
}else{
?>
    <style type="text/css">
       .ui.grid{min-width:unset!important;max-width:unset!important;width:100%!important;margin-top:0!important}.ui.grid.centered>.row{padding-top:0}@media only screen and (max-width:768px){#main{margin-left:0!important}}
    </style>
    
<?php
}
?>
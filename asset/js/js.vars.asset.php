<?php 

//	the common global vars -- these common global vars will load before any js layer or even inline javascript of the wbc, extensions and themes 

//	enqueue common assets 
wbc()->load->asset('js','common',array(),"0.1.2",false,true);

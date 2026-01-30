<?php 
	if(!empty($name)){
		if(empty($param)){
			echo do_shortcode("[$name]");
		} else {
			$format_param = array();
			foreach ($param as $param_key => $param_value) {
				$format_param[] = $param_key.'="'.$param_value.'"';
			}
			$format_param = implode(' ',$format_param);			
			echo do_shortcode("[${name} ${format_param}]");
		}
	}
?>
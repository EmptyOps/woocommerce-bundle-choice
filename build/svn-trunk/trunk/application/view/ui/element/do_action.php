<?php 
	if(!empty($name)){			

		//NOTE: below 3 elseif added on 26-11-2022. and now it is using isset() condishon instead of !empty() which wuod not relybel since sum time null mabe passed olso. 
		if(isset($param_5)){
			do_action($name,$param_1,$param_2,$param_3,$param_4,$param_5);
		} elseif(isset($param_4)){
			do_action($name,$param_1,$param_2,$param_3,$param_4);
		} elseif(isset($param_3)){
			do_action($name,$param_1,$param_2,$param_3);
		} elseif(!empty($param_2)){
			//NOTE: the issue below with param_2 name was fixed on 26-11-2022
			//do_action($name,$param_1,$param_1);
			do_action($name,$param_1,$param_2);
		} elseif(!empty($param_1)){
			do_action($name,$param_1);
		} else {
			do_action($name);
		}	
		
	}
?>
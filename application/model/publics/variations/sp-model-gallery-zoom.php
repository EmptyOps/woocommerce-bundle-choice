<?php
/*
*	SP Model Gallery Zoom class 
*/

namespace eo\wbc\model\publics\variations;

defined( 'ABSPATH' ) || exit;

use eo\wbc\system\core\publics\Eowbc_Base_Model_Publics ;

class SP_Model_Gallery_Zoom extends Eowbc_Base_Model_Publics {

	private static $_instance = null;

	public static function instance() {

		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	public function __construct() {

	}
	
	public function get_data($for_section="default", $args=null) {

		ACTIVE_TODO all below flows will go insise the get_data function in feed model of this class 
			and how the flow is implemented will also depend on how the variations fronntend and js layer evolves 
			get_data funciton here may get two kings of data here, the default means the one specified above with default as default value, and the default data would be the legacy data and the second will be the dapii custom data 
		-- one very important thing to note here is that get() function would rely on SP_Product class s definition and to___View functions and its hooks to recieve data so if getUI directly needs data or if it is managing like placeholder based templates like tableview is big question. well in case of the extensions preparing the UI html/css/js directly on the php layer then data is needed directly so the calls definition, to___View functions and its hooks should be planned accrodingly 
			--	from within the get manage that all call flow and so on 
				-- so firstly definition related functions and then to___View related functions called in the SP_Product class of particular extension, for example in this case it SP_VWDS_Product -- so ultimately it will depend on the hooks as to when the data will be recieved -- so on that regard getUI if preparing everything on php layer then that would have need to depend on hook -- anyway need to keep it simple, 1-2 hooks are fine but so many hooks is not seem necessary 
			--	what is in case of legacy mode means when the dapii/tableview is not active or simply their layers are not applicable, this is matter of data layer so should be answered by data_model especially the flows planned by dapii/tableview but I think it is simple answer from their which is to condition based on what mode is it if it is legacy mode or anything else but anyway it is not a question at all as long as item page model is considered since on item page we always and only show and depend on the legacy data and flow only. 
				--	in case of feed page models of the item page set extensions or anyone else we can simply bind to the dapii/tableview hooks(if those extensions are active) and additionally prepare for providing legacy data if the dapii/tableview are not active or if their flags say so. 
	}

	public function render_ui(){
		

	}
	public function load_asset(){

	}
}
<?php

namespace eo\wbc\controllers\admin\menu;

use eo\wbc\controllers\admin\menu\Admin_Menu;

defined( 'ABSPATH' ) || exit;

class Admin_Menu_Factory {

	private static $_instance = null;
	
	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}
		return self::$_instance;
	}

	private function __construct() {
		//	no implementation
	}
	
	public function build_menu(Admin_Menu $admin_menu ) {

		$menu_details = $admin_menu->get_menu_structure();

		if(empty($menu_details) or !is_array($menu_details)) return false;

		//	check required parameters to build menu page.
		if(empty($menu_details['title']) or empty($menu_details['menu_title']) or empty($menu_details['capability']) or empty($menu_details['slug'])) { 
			return false;
		} else {
			$this->menu = $menu_details;
		}

		//	check if has empty submenu then return
		if(array_key_exists('submenu', $menu_details) and empty($menu_details['submenu'])) {
			return false;
		} else {
			$this->submenu = $menu_details['submenu'];
		}		

		add_action( 'admin_menu',array($this,'generate_menu'),11);
	}

	public function generate_menu(){
		
		if(!empty($this->menu)){

			$menu = $this->menu;			
			
			$callback = $this->get_page($menu['template']);
			
			$icon = empty($menu['icon'])?'':$menu['icon'];

			$position = empty($menu['position'])?66:$menu['position'];

			add_menu_page($menu['title'],$menu['menu_title'],$menu['capability'],$menu['slug'],$callback,$icon,$position);   

			if(!empty($this->submenu) and is_array($this->submenu)) {

				foreach ($this->submenu as $submenu) {
					
					$callback = $this->get_page($submenu['template']);		
					
					add_submenu_page($submenu['parent_slug'],$submenu['title'],$submenu['menu_title'],$submenu['capability'],$submenu['slug'],$callback,$submenu['position']);   	
				}				
			}

			$this->menu_processed = true;
			return true;
		} else {
			$this->menu_processed = false;
			return false;
		}				
	}

	public function get_tabs_details() {
		
		if(empty($this->tabs)) {
			$this->tabs = array();
			if(!empty($this->menu['submenu']) and is_array($this->menu['submenu'])) {

				// $page = (empty(wbc()->sanitize->get('page')) or wbc()->sanitize->get('page')=='eowbc') ? $this->menu['submenu'][1]['slug']:wbc()->sanitize->get('page');
				$page = (empty(wbc()->sanitize->get('page')) or wbc()->sanitize->get('page')=='eowbc') ? "":wbc()->sanitize->get('page');
				if(empty($page)) {
					// get the page available after default first menu link 
					$cnt = 0;
					foreach ($this->menu['submenu'] as $sm => $smv) {
						$cnt++;
						if($cnt <= 1) { continue; }
						$page = $smv['slug'];
						break;
					}
				}

				/*ob_start();
				wbc()->load->template($this->menu['template']);
				$content = ob_get_clean();*/

				/*$active = $this->menu['slug']==$page?1:0;*/

				$this->tabs = array(
						/*array(	'title'=>$this->menu['title'],
								'slug'=>$this->menu['slug'],
								'active'=>$active,
								'content'=>$content
							)*/
					);

				foreach ($this->menu['submenu'] as $submenu) {		
					
					if(!empty($submenu['parent_slug'])) {
						if($page==$submenu['slug']){
							ob_start();
							wbc()->load->template($submenu['template']);
							$content = ob_get_clean();
	
						} else {
							$content = '';						
						}
						
						array_push($this->tabs,array(
												'title'=>$submenu['title'],
												'menu_title'=>$submenu['menu_title'],
												'slug'=>$submenu['slug'],
												'active'=>($page==$submenu['slug']?1:0),
												'content'=>$content,
											)
								);	
					}
				}				
			}
		} 
		return $this->tabs;		
	}

	public function get_page(string $template){

		$template = empty($template)?'':$template;
		$callback = (empty($template)?'':function() use(&$template){

			wbc()->load->template('admin/menu/page/header-part',array());
			wbc()->load->template('component/tab/tab',array('tab_data'=>$this->get_tabs_details()));			
			wbc()->load->template('admin/menu/page/footer-part',array());
		});
		return $callback;
	}
}

<?php


/*
*	Woocommerc Category and Attribute Model.
*/

namespace eo\wbc\model;
use \DateTimeZone;
use \DateTime;

defined( 'ABSPATH' ) || exit;

class Time{

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {
		
	}

    public function get_timezones_list(){

    
        $timezones = DateTimeZone::listIdentifiers( DateTimeZone::ALL );
        
        $timezone_offsets = array();
        foreach( $timezones as $timezone )
        {
            $tz = new DateTimeZone($timezone);
            $timezone_offsets[$timezone] = $tz->getOffset(new DateTime);
        }

        // sort timezone by offset
        asort($timezone_offsets);

        $timezone_list = array();
        foreach( $timezone_offsets as $timezone => $offset )
        {
            $offset_prefix = $offset < 0 ? '-' : '+';
            $offset_formatted = gmdate( 'H:i', abs($offset) );

            $pretty_offset = "UTC${offset_prefix}${offset_formatted}";

            $timezone_list[$pretty_offset] = "(${pretty_offset}) $timezone";
        }

        return $timezone_list;
    }

    public function get_24hr_list() {
        $list = array();
        for($i = 1;$i<=24;$i++){
            $list[$i.':00'] = "${i} Hr";
        }
        return $list;        
    }

    public function get_12hr_list() {
        $list = array();
        $shift = 1;
        $hr = 1;
        foreach (array('AM','PM') as $value) {
            for ($i=1; $i <=12 ; ++$i) { 
                $list[$hr.':00'] = "${i} ${value}";       
                ++$hr;
                if($i==12){
                    ++$shift;
                }
            }
        }
            
        
        return $list;
    }
}

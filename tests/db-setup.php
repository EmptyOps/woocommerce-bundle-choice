<?php

/**
 * create table to store orders in a SETS form that are recived from customers
 */
global $wpdb;
$eo_wbc_order_map= $wpdb->prefix."eo_wbc_order_maps";
if($wpdb->get_var( "SHOW TABLES LIKE '$eo_wbc_order_map'" ) != $eo_wbc_order_map)
{
    $sql = "CREATE TABLE `$eo_wbc_order_map`( ";
    $sql .= "  `order_id`  int(11) NOT NULL, ";
    $sql .= "  `order_map` text NOT NULL, ";
    $sql .= "  PRIMARY KEY(`order_id`)";
    $sql .= ") ".$wpdb->get_charset_collate().";";
    require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );
    dbDelta($sql);
}

/**
 * create table to store maps between product that is created by admin
 */
$eo_wbc_cat_map= $wpdb->prefix."eo_wbc_cat_maps";
if($wpdb->get_var( "show tables like '$eo_wbc_cat_map'" ) != $eo_wbc_cat_map)
{
    $sql='';
    $sql = "CREATE TABLE `$eo_wbc_cat_map` ( ";
    $sql .= " `first_cat_id` VARCHAR(125) NOT NULL , `second_cat_id` VARCHAR(125) NOT NULL, `discount` VARCHAR(20) not null DEFAULT '0%', PRIMARY KEY (`first_cat_id`, `second_cat_id`)";
    $sql .= ") ".$wpdb->get_charset_collate().";";                        
    require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );
    dbDelta($sql);            
}

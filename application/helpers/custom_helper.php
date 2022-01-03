<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
*
* Get Service ID Using Service Name
**/
if ( ! function_exists('get_serviceID'))
{
    function get_serviceID($servicename)
    {	
    	$CI=&get_instance();        
        $CI->db->select("id");
        $CI->db->from("service_master");
        $CI->db->where("title",$servicename);
        $ex = $CI->db->get();
        $result = $ex->row_array();
        if (!empty($result)) {
            return $result["id"];
        }else{
            return 0;    
        }
        
    }   
}
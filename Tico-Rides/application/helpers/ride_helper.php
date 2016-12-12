<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    
	function buscarRide($id)
	{
 
     $ci =& get_instance();

     $query = $ci->db->get_where('rides',array("id"=>$id));
	  return $query->result_array();
 
	}

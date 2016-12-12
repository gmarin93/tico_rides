<?php


    class Ride_usuario extends CI_Model{
  
         function __construct() {
            parent::__construct();
     }
        
    
    function nuevo_ride($data)
	{  
      
         $this->db->insert('rides',$data);
    }
        
    function cargar_rides($id){
        
       
     $query = $this->db->get_where('rides',
      array('id_usuario' => $id));

	  return $query->result_array();
  
        
    }
        
     function cargar_rides_lugar($ride){
        
       
     $query = $this->db->get_where('rides',
      array('ir' => $ride['ir'], 'va'=> $ride['va']));

	  return $query->result_array();
  
        
    }
        
        
        function buscarRide($id)
	{
        
     $query = $this->db->get_where('rides',array("id"=>$id['id']));
	  return $query->result_array();
 
	}

        
    function cargar_todos(){
        
     $query = $this->db->get('rides');
	  return $query->result_array();
        
    } 
        
       function eliminarRide($id)
	{
        $this->db->where('id',$id);
		return $this->db->delete('rides');
    }
        
     function actualizarRide($id,$data)
	{
      $this->db->where('id', $id);
$this->db->update('rides', $data); 
    }
        
        
       
    }
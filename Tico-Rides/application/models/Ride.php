<?php


    class Ride extends CI_Model{
  
         function __construct() {
            parent::__construct();
     }
        
    
    function nuevo_ride($data,$user_photo)
	{  
      
         $this->db->insert('usuarios',$data);
         $user_photo['id_usuario']= $this->db->insert_id();
         $this->db->insert('usuario_foto',$user_photo);
        
	}
        
    function autenticar($user, $pass) {
    $query = $this->db->get_where('usuarios',
      array('usuario' => $user, 'contrasena' => $pass));

	  return $query->result_object();
  }
        
       function usuario_foto($id) {
    $query = $this->db->get_where('usuario_foto',
      array('id_usuario' => $id));
           
    $row = $query->fetch_array();

	  return $row;
  }
          
        
        
       
    }
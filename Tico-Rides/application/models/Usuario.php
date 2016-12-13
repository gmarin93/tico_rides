<?php


    class Usuario extends CI_Model{
  
         function __construct() {
            parent::__construct();
     }
        
        //Registra un nuevo usuario
    
    function nuevo_usuario($data,$user_photo)
	{  
      
         $this->db->insert('usuarios',$data);
         $user_photo['id_usuario']= $this->db->insert_id();
         $this->db->insert('usuario_foto',$user_photo);
        
	}
        //Auntentica al usuario
        
    function autenticar($user, $pass) {
    $query = $this->db->get_where('usuarios',
      array('usuario' => $user, 'contrasena' => $pass));

	  return $query->result_object();
  }
        
//Inserta la foto con su usuario
        
       function usuario_foto($id) {
    $query = $this->db->get_where('usuario_foto',
      array('id_usuario' => $id));
           
    $row = $query->fetch_array();

	  return $row;
  }
    
        //Actualiza el usuario
        
     function actualizarUser($data)
	{
      $this->db->where('id', $data['id']);
$this->db->update('usuarios', $data); 
    }
        
    //Validar si el usuario existe    
        
     function validarexiste($username) {
    $query = $this->db->get_where('usuarios',
      array('usuario' => $username));

	  return $query->result_object();
  }     
        
        
       
    }
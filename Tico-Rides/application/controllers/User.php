<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    
    
    	 public function __construct()
	{
		parent::__construct();
		//cargamos nuestro helper y el helper url
        
        $this->load->model('Ride_usuario');
		$this->load->helper('ride_helper');
		
	}
    
    
    //Autentifica el usuario
    
    public function autenticar() {
        
		
		$user = $this->input->post('user');
		$pass = $this->input->post('pass');
	
		$this->load->model('Usuario');
		$r = $this->Usuario->autenticar($user, $pass);
       
		if(sizeof($r) > 0) {
            
            session_start();
              
            //$var= $_SESSION['user'];
           // $s = $this->Usuario->usuario_foto($var->id);
           
        
            //$m='<img style="width:38px;" src="data:
            //image/jpeg;base64,'.base64_encode($s['imagen']).'"/>';
        
             $this->session->set_userdata('user', $r[0]);
             //$this->session->set_userdata('userf',$s);
            
			// $this->load->view('gui/Perfil');
            
            if(isset($_SESSION['user'])){
               
                redirect('/Ride/perf');    
            }
            
		} else {
			 echo '<script language="javascript">alert("Acceso Invalido");</script>'; 
           redirect('/', 'refresh'); 
            
		}
	}
    
    //Actualiza el usuario
         public function actualizarallUser() {
        
          $var= $_SESSION['user'];
         // $id['id'] =$_GET['id'];   
        
         
       $config['upload_path'] = './uploads/';
       $config['allowed_types'] = 'gif|jpg|png|jpeg';
       $config['max_size']    = '1000000';
       $config['overwrite'] = TRUE;
       $config['remove_spaces'] = TRUE;
       $config['encrypt_name'] = TRUE;
       $this->load->library('upload', $config);
       $this->upload->do_upload('imagen');
       $data_upload_files = $this->upload->data();
       $user_photo['imagen'] = $data_upload_files['full_path'];
           
        $this->load->model('Usuario');
		$user['nombre'] = $this->input->post('nombre');
       
        $user['id']=$var->id;
		$user['telefono'] = $this->input->post('numero');
        $user['usuario'] = $this->input->post('user');
        $user['contrasena'] = $this->input->post('pass');
        
        $comprobar=$this->Usuario->validarexiste($user['usuario']);
         
          
        if(sizeof($comprobar) > 0){
           
             echo "<script> 
              alert('El usuario ya existe');
          </script>"; 
              redirect('Ride/act', 'refresh');
        }
        else{
                $result = $this->Usuario->actualizarUser($user);
        
       if(!$result){
           
            echo '<script language="javascript">alert("Los datos se cargaran cuando vuelva a ingresar");</script>'; 
          session_destroy();
           redirect('/', 'refresh');
             
       }
        else{
            echo '<script language="javascript">alert("Error");</script>';
        }
        
             //  redirect('/Ride/reg');
        }
         }
             
         //Actualiza la configuracion del usuario        
     function actualizarUser() {
        
          $var= $_SESSION['user'];
         // $id['id'] =$_GET['id'];   
        
        $this->load->model('Usuario');
		$user['nombre'] = $this->input->post('nombre');
        $user['acerca'] = $this->input->post('acerca');
       	$user['velocidad'] = $this->input->post('velocidad');
        $user['id'] = $var->id;
        $user['telefono'] = $var->telefono;
        $user['usuario'] = $var->usuario;
        $user['contrasena'] = $var->contrasena;
      
       
        
       // $dias = $var->dias;
        
       // $user_ride['dias']=json_encode($dias);
    
       // if(isset($dias)){
               $result = $this->Usuario->actualizarUser($user);
        
       if(!$result){
           
            echo '<script language="javascript">alert("Los datos se cargaran cuando vuelva a ingresar");</script>'; 
           redirect('/ride/perf', 'refresh'); 
       }
        else{
            echo '<script language="javascript">alert("Error");</script>';
        }
            
        //}
       // else{
         //    echo '<script language="javascript">alert("No selecciono los dias");</script>'; 
        //}
        
	}
             //Guarda el usuario
        
     function guardarUsuario() {
        
        
       $config['upload_path'] = './uploads/';
       $config['allowed_types'] = 'gif|jpg|png|jpeg';
       $config['max_size']    = '1000000';
       $config['overwrite'] = TRUE;
       $config['remove_spaces'] = TRUE;
       $config['encrypt_name'] = TRUE;
       $this->load->library('upload', $config);
       $this->upload->do_upload('imagen');
       $data_upload_files = $this->upload->data();
       $user_photo['imagen'] = $data_upload_files['full_path'];
           
        $this->load->model('Usuario');
		$user['nombre'] = $this->input->post('nombre');
       
     
		$user['telefono'] = $this->input->post('numero');
        $user['usuario'] = $this->input->post('user');
        $user['contrasena'] = $this->input->post('pass');
        
        $comprobar=$this->Usuario->validarexiste($user['usuario']);
        
        if(sizeof($comprobar) > 0){
           
            echo '<script language="javascript">alert("El usuario ya existe");</script>'; 
           //redirect('/Ride/perf');  
        }
        else{
               $result = $this->Usuario->nuevo_usuario($user,$user_photo);
        
               redirect('/Ride/reg');
        }
        
	}
    

    
    
}
         
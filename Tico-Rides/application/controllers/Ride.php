<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ride extends CI_Controller {

    
    
	public function index()
	{
       $this->load->view('gui/TicoRide');
	}
    
    public function salir()
	{
       $this->load->view('gui/TicoRide');
        session_destroy();
	}
    
    public function reg()
	{
      $this->load->view('gui/Registro');
	}
    
       public function perf()
	{
        
        if(isset($_SESSION['user'])){
                   
      $this->load->view('gui/Perfile');
        }
        else{
            
            redirect('/Ride/index');  
        }
	}
    
     public function conf()
	{
      if(isset($_SESSION['user'])){
      $this->load->view('gui/configuracion');
      }
        else{
            
            redirect('/Ride/index');  
        }
	}
     public function addride()
	{
        if(isset($_SESSION['user'])){
      $this->load->view('gui/AgregarRide');
        }
         else{
            
            redirect('/Ride/index');  
        }
        
	}
     public function acercade()
	{
          if(isset($_SESSION['user'])){
      $this->load->view('gui/Acercade');
          }
          else{
            
            redirect('/Ride/index');  
        }
        
	}
      public function editride()
	{
           if(isset($_SESSION['user'])){
      $this->load->view('gui/EditarRide');
           }
         else{
            
            redirect('/Ride/index');  
        }
	}
    
    //Insercion a la base de datos
    
    public function guardarUsuario() {
        
        
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
        $result = $this->Usuario->nuevo_usuario($user,$user_photo);
        
	}
    
    
    public function guardarRide() {
        

           
        $this->load->model('Ride');
		$user_ride['nombre'] = $this->input->post('rnombre');
        $user_ride['esta'] = $this->input->post('resta');
       	$user_ride['inicia'] = $this->input->post('rinicia');
        $user_ride['salida'] = $this->input->post('rsalida');
        $user_ride['dir'] = $this->input->post('rdir');
        $user_ride['va'] = $this->input->post('rva');
     
		
        $result = $this->Usuario->nuevo_usuario($user_ride);
        
	}
    
/*function cargar_foto($Id){

$image = $this->Usuario->usuario_foto($Id);
header("Content-type: image/jpeg");
print($image);

}*/
    
    
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
            //2 $this->session->set_userdata('user_foto'$m);
            
			// $this->load->view('gui/Perfil');
            
            if(isset($_SESSION['user'])){
               
                redirect('/Ride/perf');    
            }
            
		} else {
			echo '<script language="javascript">alert("Acceso invalido");</script>'; 
            $this->load->view('gui/TicoRide');
            
		}
	}

}

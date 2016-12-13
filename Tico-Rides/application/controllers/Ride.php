<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ride extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		//cargamos nuestro helper y el helper url
        
        $this->load->model('Ride_usuario');
		$this->load->helper('ride_helper');
		
	}
    
    
	public function index()
	{
         $this->load->model('Ride_usuario');
         $data['todos'] = $this->Ride_usuario->cargar_todos();
       
        
       $this->load->view('gui/TicoRide',$data);
	}
    
    public function busca_ride()
	{
         $this->load->model('Ride_usuario');
         
		$ride['ir'] = $this->input->post('estoy');
        $ride['va'] = $this->input->post('va');
        
         $data['todos'] = $this->Ride_usuario->cargar_rides_lugar($ride);
       
        
       $this->load->view('gui/TicoRide',$data);
	}
    
    public function salir()
	{
        $this->load->model('Ride_usuario');
         $data['todos'] = $this->Ride_usuario->cargar_todos();
       
       $this->load->view('gui/TicoRide',$data);
        session_destroy();
	}
    
    public function reg()
	{
      $this->load->view('gui/Registro');
	}
    
       public function perf()
	{
        
        if(isset($_SESSION['user'])){
            
       $this->load->model('Ride_usuario');
        
        $var= $_SESSION['user'];
        
          $data['rides'] = $this->Ride_usuario->cargar_rides($var->id);
          
            
        $this->load->view('gui/Perfile',$data);
        
                   
    //  $this->load->view('gui/Perfile');
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
          
      $this->load->view('gui/Acercade');
        
        
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
    
     public function editrides()
	{
         $this->load->model('Ride_usuario');
		 $id['id'] =$_GET['id'];
       
        
         $data['ride']=$this->Ride_usuario->buscarRide($id);
         
        
           if(isset($_SESSION['user'])){
     
      $this->load->view('gui/EditarRide',$data);
           }
         else{
            
            redirect('/Ride/index');  
        }
	}
    
     public function editridesP()
	{
         $this->load->model('Ride_usuario');
		 $id['id'] =$_GET['id'];
       
        
         $data['ride']=$this->Ride_usuario->buscarRide($id);
         
        
     
      $this->load->view('gui/Ver',$data);
           
            
            
        
	}
    
    public function deleterides()
	{
         $this->load->model('Ride_usuario');
		 $id['id'] =$_GET['id'];
       
        
        
         $data['ride']=$this->Ride_usuario->eliminarRide($id['id']);
         
        
           if(isset($_SESSION['user'])){
     
       redirect('/Ride/perf'); 
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
    
    
    public function guardarRide() {
        
          $var= $_SESSION['user'];
           
        
        $this->load->model('Ride_usuario');
		$user_ride['nombre'] = $this->input->post('rnombre');
        $user_ride['va'] = $this->input->post('resta');
       	$user_ride['hora_llegada'] = $this->input->post('rinicia');
        $user_ride['hora_salida'] = $this->input->post('rsalida');
        $user_ride['descripcion'] = $this->input->post('rdir');
        $user_ride['ir'] = $this->input->post('rva');
        $user_ride['id_usuario']=$var->id;
        
        $dias = array($this->input->post('l'), $this->input->post('k'), $this->input->post('m'),$this->input->post('j'),$this->input->post('v'),$this->input->post('s'),$this->input->post('d'));
        
        $user_ride['dias']=json_encode($dias);
    
        if(isset($dias)){
               $result = $this->Ride_usuario->nuevo_ride($user_ride);
        
       
             redirect('/Ride/addride');  
        }
        
	}
    
    public function actualizarRide() {
        
          $var= $_SESSION['user'];
          $id['id'] =$_GET['id'];   
        
        $this->load->model('Ride_usuario');
		$user_ride['nombre'] = $this->input->post('rnombre');
        $user_ride['va'] = $this->input->post('resta');
       	$user_ride['hora_llegada'] = $this->input->post('rinicia');
        $user_ride['hora_salida'] = $this->input->post('rsalida');
        $user_ride['descripcion'] = $this->input->post('rdir');
        $user_ride['ir'] = $this->input->post('rva');
        $user_ride['id_usuario']=$var->id;
        
        $dias = array($this->input->post('l'), $this->input->post('k'), $this->input->post('m'),$this->input->post('j'),$this->input->post('v'),$this->input->post('s'),$this->input->post('d'));
        
        $user_ride['dias']=json_encode($dias);
    
        if(isset($dias)){
               $result = $this->Ride_usuario->actualizarRide($id['id'],$user_ride);
        
       
             redirect('/Ride/perf');  
        }
        
	}
    
    public function actualizarUser() {
        
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
            redirect('/Ride/perf');  
       }
        else{
            echo '<script language="javascript">alert("Error");</script>';
        }
            
        //}
       // else{
         //    echo '<script language="javascript">alert("No selecciono los dias");</script>'; 
        //}
        
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
             //$this->session->set_userdata('userf',$s);
            
			// $this->load->view('gui/Perfil');
            
            if(isset($_SESSION['user'])){
               
                redirect('/Ride/perf');    
            }
            
		} else {
			echo '<script language="javascript">alert("Acceso invalido");</script>'; 
           redirect('/Ride/salir');  
            
		}
	}
    
    public function cargar_rides(){
        
        $this->load->model('Ride_usuario');
        
        $var= $_SESSION['user'];
        
          $data['rides'] = $this->Ride_usuario->cargar_rides($var->id);
       
        $this->load->view('gui/Perfile',$data);
        
    }
    
    

}

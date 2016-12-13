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
    
    //Carga la pagina principal con los rides
    
	public function index()
	{
         $this->load->model('Ride_usuario');
         $data['todos'] = $this->Ride_usuario->cargar_todos();
       
        
       $this->load->view('gui/TicoRide',$data);
	}
    
    //Busca los ride
    
    public function busca_ride()
	{
         $this->load->model('Ride_usuario');
         
		$ride['ir'] = $this->input->post('estoy');
        $ride['va'] = $this->input->post('va');
        
         $data['todos'] = $this->Ride_usuario->cargar_rides_lugar($ride);
       
        
       $this->load->view('gui/TicoRide',$data);
	}
    
    //Log out
    
    public function salir()
	{
        $this->load->model('Ride_usuario');
         $data['todos'] = $this->Ride_usuario->cargar_todos();
       
       $this->load->view('gui/TicoRide',$data);
        session_destroy();
	}
    //Carga la pagina para Registar
    
    public function reg()
	{
      $this->load->view('gui/Registro');
	}
    public function act()
	{
      $this->load->view('gui/Actualizar');
	}
    
    //Carga la pagina perfil con sus rides
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
    
    // Carga la configuracion del usuario
    
     public function conf()
	{
      if(isset($_SESSION['user'])){
      $this->load->view('gui/configuracion');
      }
        else{
            
            redirect('/Ride/index');  
        }
	}
    
    //Carga un la pagina para agregar rides
    
     public function addride()
	{
        if(isset($_SESSION['user'])){
      $this->load->view('gui/AgregarRide');
        }
         else{
            
            redirect('/Ride/index');  
        }
        
	}
    //Carga la pagina para saber acerca de la pagina
    
     public function acercade()
	{
          
      $this->load->view('gui/Acercade');
        
        
	}
    
    //Carga el formulario para editar los rides
    
      public function editride()
	{
           if(isset($_SESSION['user'])){
      $this->load->view('gui/EditarRide');
           }
         else{
            
            redirect('/Ride/index');  
        }
	}
    
    // Carga el formulario para edtar los rides
    
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
    
    //Carga el formulario para editar el ride
    
     public function editridesP()
	{
         $this->load->model('Ride_usuario');
		 $id['id'] =$_GET['id'];
       
        
         $data['ride']=$this->Ride_usuario->buscarRide($id);
         
        
     
      $this->load->view('gui/Ver',$data);
           
            
            
        
	}
    
    //Elimina los rides desde la tabla
    
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
    
    //Carga el formulario para guardar el ride

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
    
    //Carga el formulario para actualizar el ride
    
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

        
       // $dias = $var->dias;
        
       // $user_ride['dias']=json_encode($dias);
    
       // if(isset($dias)){
             
            
        //}
       // else{
         //    echo '<script language="javascript">alert("No selecciono los dias");</script>'; 
        //}
        
	}
    
    
    //Funcion para cargar la foto
    
/*function cargar_foto($Id){

$image = $this->Usuario->usuario_foto($Id);
header("Content-type: image/jpeg");
print($image);

}*/

//Carga todos los rides

    function cargar_rides(){
        
        $this->load->model('Ride_usuario');
        
        $var= $_SESSION['user'];
        
          $data['rides'] = $this->Ride_usuario->cargar_rides($var->id);
       
        $this->load->view('gui/Perfile',$data);
        
    }
    
    



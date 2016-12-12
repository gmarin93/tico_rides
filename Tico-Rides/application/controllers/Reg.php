<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ride extends CI_Controller {

	
	public function index()
	{
      $this->load->view('gui/Registro');
	}
    
    public function guardarUsuario() {
        
        $this->load->model('usuario');
		$user['nombre'] = $this->input->post('nombre');
     
		$user['direccion'] = $this->input->post('direccion');
        $user['id_instrumento'] = $this->input->post('instrumento');
        $user['id_genero'] = $this->input->post('genero');
        
        
        
		$result = $this->Registro_model->nuevo_usuario($user);
        index();
        
	}
    
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ciudadanos extends CI_Controller {

	public function __construct()
	{
	  parent::__construct();
	  $metodo = $this->router->fetch_method();
	  if(!isset($_SESSION['votacion']) && $metodo != 'login'){
		redirect('login');
      }
      $this->load->model('Ciudadano_model');

    }

    public function index(){
        $datos['title'] = 'Ciudadanos';
        
        if(isset($_POST['add_cidadanos'])){
            $identidad = $this->input->post('cocumento_identidad');
            $nombre = $this->input->post('nombre_ciudadano');
            $apellido = $this->input->post('apellido_ciudadano');
            $email = $this->input->post('email_ciudadano');
            $estado = $this->input->post('estado_ciudadano');

            $this->Ciudadano_model->add_ciudadano($identidad,$nombre,$apellido, $email, $estado);
        }

        $datos['mostrar_ciudadano'] = $this->Ciudadano_model->mostrar_candidatos();

        $this->load->view('Plantilla/head',$datos);
        $this->load->view('Ciudadanos/Ciudadano');

    }

    public function delete_ciudadano($id, $nombre){
        $this->Ciudadano_model->delete_ciudadanos($id, $nombre);
        redirect('ciudadanos');
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrar extends CI_Controller {

	public function __construct()
	{
	  parent::__construct();
	  $metodo = $this->router->fetch_method();
	  if(!isset($_SESSION['votacion']) && $metodo != 'login'){
		redirect('login');
	  }
  
	  $this->load->model('Administracion_model');
	  //Codeigniter : Write Less Do More
	}

	public function index(){
		// $this->output->enable_profiler(TRUE);
		$this->load->view('Plantilla/head');
	}

	public function login()
	{
		$data['title'] = 'Login';

		$this->load->view('login',$data);

	}

	public function cerrar_session(){
		session_destroy();
		redirect('login');
	}






	public function partidos(){

		$data['title'] = 'Partidos';


		if(isset($_POST['add_partido'])){
			$nombre = $this->input->post('nombre');
			$descripcion = $this->input->post('descripcion');

			$img = $_FILES['logo'];
			$nombre_limpio = str_replace(' ','-', $nombre);
			$url = "assest/img/partidos/{$nombre_limpio}.jpg";
			move_uploaded_file($img['tmp_name'], $url);
			
			$estado = $this->input->post('estado');

			$this->Administracion_model->add_partidos($nombre,$descripcion,$url,$estado );

			echo "
				<script>
					alert('Partido agregado correctamete');
				</script>
			";
		}



		$data['partido'] = $this->Administracion_model->mostrar_partidos();


		$this->load->view('Plantilla/head',$data);
		$this->load->view('Administracion/Partido/Partidos');
		$this->load->view('Plantilla/footer');

	}

	public function edict_partido($id,$nombre){
		// $this->output->enable_profiler(TRUE);
		$data['ver_partido'] = $this->Administracion_model->mostrar_partido_uno($id);

		if(isset($_POST['edict_partido'])){
			$nombre = $this->input->post('nombre');
			$descripcion = $this->input->post('descripcion');

			$img = $_FILES['logo'];
			$nombre_limpio = str_replace(' ','-', $nombre);
			$url = "assest/img/partidos/{$nombre_limpio}.jpg";
			move_uploaded_file($img['tmp_name'], $url);
			
			$estado = $this->input->post('estado');

			$this->Administracion_model->editar_partidos($nombre,$descripcion,$url,$estado,$id);
			redirect('partidos');

		}


		$data['title'] = 'Editar';
		$this->load->view('Plantilla/head',$data);
		$this->load->view('Administracion/Partido/PartidosEditar');
		$this->load->view('Plantilla/footer');



	}

	public function delete_partidos($id, $nombre){
		// $this->output->enable_profiler(TRUE);
		$this->Administracion_model->delete_partido($id, $nombre);
		redirect('partidos');
	}



	
	
}

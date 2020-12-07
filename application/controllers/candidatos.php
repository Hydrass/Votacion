<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Candidatos extends CI_Controller {

	public function __construct()
	{
	  parent::__construct();
	  $metodo = $this->router->fetch_method();
	  if(!isset($_SESSION['votacion']) && $metodo != 'login'){
		redirect('login');
      }
      $this->load->model('Partidos_model');

    }
	public function candidatos(){
        // $this->output->enable_profiler(TRUE);
        $data['title'] = 'Cadidatos';
        

        $data['mostrar_partido'] = $this->Partidos_model->mostrar_partidos();
        
		if(isset($_POST['add_candidato'])){
            
            $nombre = $this->input->post('nombre_candidatos');
            $apellido = $this->input->post('apellido_candidatos');
            
			$partido = $this->input->post('partidos_candidato');
            
            $puesto = $this->input->post('puesto_candidatos');
            
            $img = $_FILES['foto_candidatos'];
			$nombre_limpio = str_replace(' ','-', $nombre);
			$url = "assest/img/Foto/{$nombre_limpio}.jpg";
			move_uploaded_file($img['tmp_name'], $url);
            
            
            $estado = $this->input->post('estado_candidato');





			$this->Partidos_model->add_candidatos($nombre,$apellido,$partido,$puesto,$url,$estado);

			echo "
				<script>
					alert('Candidato agregado correctamete');
				</script>
			";
        }
        
        $data['mostrar_condidato'] = $this->Partidos_model->mostrar_datos_candidatos();


		$this->load->view('Plantilla/head',$data);
		$this->load->view('Candidatos/candidatos');
		$this->load->view('Plantilla/footer');

    }
    
    public function delete_candidato($id, $nombre){
        // $this->output->enable_profiler(TRUE);
        // if(isset($_POST['editar_candidato'])){
            $this->Partidos_model->delete_candidato($id, $nombre);
            redirect('candidatos');
        // }
    }

}
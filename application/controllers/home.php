<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
	  parent::__construct();
      
      $this->load->model('Home_model');
    }

    public function index(){
        $dato['title'] = 'Sistema de votacion';


        $dato['partido'] = $this->Home_model->home();

        $this->load->view('Plantilla/head',$dato);
        $this->load->view('Home/Home');

    }


    public function partido($id){
        // $this->output->enable_profiler(TRUE);
        $dato['title'] = 'Sistema de votacion';


        $dato['partido'] = $this->Home_model->home();

        $dato['candidato_elegir'] = $this->Home_model->elegir_candidatos($id);


        $this->load->view('Plantilla/head',$dato);
        $this->load->view('Home/votar');
    }
}
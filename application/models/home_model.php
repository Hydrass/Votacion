<?php 
 class Home_model extends CI_Model{
    
    public function __construct(){
        parent::__construct();
    }
    
    public function home(){
        $dato = $this->db->get('partidos');

        return $dato->result();
    }

    public function elegir_candidatos($id){
        $sql = "SELECT * FROM `candidatos` WHERE `Partido_pertenece` = '$id'";
        
        $dato = $this->db->query($sql);

        return $dato->result();
    }

    public function elegir_candidatos_nombre($nombre){
        $sql = "SELECT * FROM `candidatos` WHERE `Nombre_candidatos` = '$nombre'";
        
        $dato = $this->db->query($sql);

        return $dato->row();
    }
}
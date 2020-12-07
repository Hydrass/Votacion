<?php 
 class Ciudadano_model extends CI_Model{
    
    public function __construct(){
        parent::__construct();
    }

    public function add_ciudadano($identidad, $nombre, $apellido, $email,$estado){
        $sql = "INSERT INTO `ciudadanos`(`Documento_identidad`, `Nombre`, `Apellido`, `Email`, `Estado`) 
        VALUES 
        ('$identidad','$nombre','$apellido','$email','$estado')";

        $this->db->query($sql);
    }

    public function mostrar_candidatos(){
        $datos = $this->db->get('ciudadanos');
        return $datos->result();
    }

    public function delete_ciudadanos($id, $nombre){
        $sql = "DELETE FROM `ciudadanos` WHERE `Id` = '$id' AND `Nombre` = '$nombre'";
        $this->db->query($sql);
    }
 }
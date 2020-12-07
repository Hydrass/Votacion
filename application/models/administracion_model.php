<?php 
 class Administracion_model extends CI_Model{
    
    public function __construct(){
        parent::__construct();
    }

    public function add_partidos($nombre, $descripcion, $logo, $estado){
        $sql = "INSERT INTO `partidos`(`Nombre`, `Descripcion`, `Logo_partido`, `Estado`) 
        VALUES 
        ('$nombre','$descripcion','$logo','$estado')";

        $this->db->query($sql);
    }

    public function mostrar_partidos(){
        $data = $this->db->get('Partidos');
        return $data->result(); 
    }

    // Mostramos los datos que vamos a editar
    public function mostrar_partido_uno($id){
        $sql = "SELECT * FROM `partidos` WHERE `Id` = '$id'";
        $data = $this->db->query($sql);

        return $data->row();
    }

    // Mostrar partido a editar 
    public function editar_partidos($nombre, $descripcion, $logo_partido, $estado, $id){
        $sql = "UPDATE `partidos` SET `Nombre`='$nombre',`Descripcion`='$descripcion',`Logo_partido`='$logo_partido',`Estado`='$estado' WHERE `Id` = '$id'";
        $this->db->query($sql);
    }

    // Eliminamos el partido 
    public function delete_partido($id, $nombre){
        $sql = "DELETE FROM `partidos` WHERE `Id` = '$id' AND `Nombre` = '$nombre'  ";
        $this->db->query($sql);
        
    }
}
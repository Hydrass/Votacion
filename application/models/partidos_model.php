<?php 
 class Partidos_model extends CI_Model{
    
    public function __construct(){
        parent::__construct();
    }

    public function mostrar_partidos(){
        $data = $this->db->get('partidos');
        return $data->result();
    }

    public function add_candidatos($nombre, $apellido, $partido, $puesto, $foto, $estado){
        $sql = "INSERT INTO `candidatos`(`Nombre_candidatos`, `Apellido_candidatos`, `Partido_pertenece`, `Puesto_aspira`, `Foto_perfil`, `Estado_candidatos`) 
        VALUES 
        ('$nombre','$apellido','$partido','$puesto','$foto','$estado')";

        $this->db->query($sql);
    }

    public function mostrar_datos_candidatos(){
        $sql = "SELECT * FROM candidatos INNER JOIN partidos ON candidatos.Partido_pertenece = partidos.Id";

        $datos = $this->db->query($sql);

        return $datos->result();
    }

    public function delete_candidato($id, $nombre){
        $sql = "DELETE FROM `candidatos` WHERE `id_candidato`  = '$id' AND `Nombre_candidatos` ='$nombre'";
        $data = $this->db->query($sql);
    }
 }
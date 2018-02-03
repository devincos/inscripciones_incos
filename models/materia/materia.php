<?php
require_once 'conexion.php';

class Materia
{
    
    public $id_materia;
    public $nom_materia;
    public $nro_hors;
    public $anio_materia;
    public $id_carrera;
    private $con;

    public function __construct()
    {
        $this->con = new Conexion();
    }

    public function getMaterias()
    {
        try {
            $conexion = new Conexion();
            $query = $conexion->dbh->prepare('select * from materia');
            $query->execute();
            return $query->fetchAll();
            $conexion->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

}


?>
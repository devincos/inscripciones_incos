<?php
require_once 'conexion.php';

class Materia
{
    
    public $id_materia;
    public $nom_materia;
    public $nro_hors;
    public $anio_materia;
    public $id_carrera;
    private $con; /* es para hacer la conexion a la BD  */

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
            $conexion->dbh = null;/*esta demas ya no se va a ejecutar*/
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

}


?>
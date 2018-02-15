<?php
require_once 'conexion.php';

class Materia
{
    
    public $id_materia;
    public $nom_materia;
    public $nro_hrs;
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
            //$query = $conexion->dbh->prepare('select * from materia');

            $query = $conexion->dbh->prepare('select m.id_materia, m.nom_materia, m.nro_hrs, m.anio_materia, c.nombre FROM materia m JOIN carrera c ON m.id_carrera = c.id ORDER BY m.id_materia');



            $query->execute();
            return $query->fetchAll();
            $conexion->dbh = null;/*esta demas ya no se va a ejecutar*/
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function insertarMateria($nombre, $nro_horas, $anio_materia, $id_carrera)
    {
        $resultado = false;
        try {
            $consulta = "insert into materia (nom_materia, nro_hrs, anio_materia,id_carrera) values('" . $nombre . "'," . $nro_horas . "," . $anio_materia.",".$id_carrera.")";
            $query = $this->con->dbh->prepare($consulta);
            $resultado = $query->execute();
            $this->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
        return $resultado;
    }

 public function getMateria($id)
    {
        try {
            $conexion = new Conexion();
            $query = $conexion->dbh->prepare('select * from materia where id_materia=?;');
            $query->bindValue(1, $id, PDO::PARAM_INT);
            $query->execute();
            return $query->fetch();
            $conexion->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }


    public function ActualizarMateria($id_materia, $nombre, $nro_horas, $anio_materia, $id_carrera)
    {
        $resulta=false;
        try {
            $query = $this->con->dbh->prepare('update materia SET nom_materia = ?, nro_hrs= ?, anio_materia= ?, id_carrera= ? WHERE id_materia = ?');
            $query->bindParam(1, $nombre);
            $query->bindParam(2, $nro_horas);
            $query->bindParam(3, $anio_materia);
            $query->bindParam(4, $id_carrera);
            $query->bindParam(5, $id_materia);
            $resulta=$query->execute();
            $this->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
        return $resulta;
    }

}
?>
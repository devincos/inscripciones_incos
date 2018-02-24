<?php
require_once 'conexion.php';

class Carrera
{
    public $id;
    public $nombre;
    public $id_modalidad;
    public $id_formacion_carr;
    public $duracion;
    public $fecha_creacion;
    public $carga_horaria;
    public $fecha_reg;
    private $con;

    public function __construct()
    {
        $this->con = new Conexion();
    }

    public function getCarreras()
    {
        try {
            $conexion = new Conexion();
            $query = $conexion->dbh->prepare('select c.id, c.nombre,m.modalidad,fe.evaluacion,c.fecha_reg from carrera c join modalidad m ON c.id_modalidad = m.id JOIN forma_evaluacion fe ON c.id_formacion_carr = fe.id');
            $query->execute();
            return $query->fetchAll();
            $conexion->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    //lista de select personalizados
    public function getSelects($tabla)
    {
        try {

            $conexion = new Conexion();
            $query = $conexion->dbh->prepare('select * from ' . $tabla);
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function insertarCarrera($nombre, $id_modalidad, $id_formacion_carr, $duracion,
                                    $fecha_creacion, $carga_horaria)
    {
        $resultado = false;
        try {
            $consulta = "insert into carrera (nombre, id_modalidad, id_formacion_carr, duracion, fecha_creacion, carga_horaria, fecha_reg) values('" . $nombre . "'," . $id_modalidad . "," . $id_formacion_carr . "," . $duracion . ",'" . $fecha_creacion . "'," . $carga_horaria . ",now())";
            $query = $this->con->dbh->prepare($consulta);
            $resultado = $query->execute();
            $this->dbh = null;
            //echo "entre";
            // echo $consulta;

        } catch (PDOException $e) {
            $e->getMessage();
        }
        return $resultado;
    }


    public function getCarrera($id)
    {
        try {
            $conexion = new Conexion();
            $query = $conexion->dbh->prepare('select c.* from carrera c where id=?;');
            $query->bindValue(1, $id, PDO::PARAM_INT);
            $query->execute();
            return $query->fetch();
            $conexion->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function ActualizarCarrera($id, $nombre, $id_modalidad, $id_formacion_carr, $duracion,
                                      $fecha_creacion, $carga_horaria)
    {
        $resulta=false;
        try {
            $query = $this->con->dbh->prepare('update carrera SET nombre = ?, id_modalidad= ?, id_formacion_carr= ?, duracion= ?, fecha_creacion= ?, carga_horaria= ? WHERE id = ?');
            $query->bindParam(1, $nombre);
            $query->bindParam(2, $id_modalidad);
            $query->bindParam(3, $id_formacion_carr);
            $query->bindParam(4, $duracion);
            $query->bindParam(5, $fecha_creacion);
            $query->bindParam(6, $carga_horaria);
           // $query->bindParam(7, $fecha_reg);
            $query->bindParam(7, $id);
            $resulta=$query->execute();
            $this->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
        return $resulta;
    }

    public function BorrarCarrera($id)
    {

        try {
            $query = $this->con->dbh->prepare('delete from carrera where id = ?');
            $query->bindParam(1, $id);
            $query->execute();
            $this->dbh = null;
            return true;
        } catch (PDOException $e) {
            $e->getMessage();
        }
        return false;
    }


    public function __clone()
    {
        trigger_error('La clonación no es permitida!.', E_USER_ERROR);
    }

}


?>
<?php
require_once 'conexion.php';

class Carrera
{
    private $id;
    private $nombre;
    private $id_modalidad;
    private $id_formacion_carr;
    private $duracion;
    private $fecha_creacion;
    private $carga_horaria;
    private $fecha_reg;
    private $con;

    public function __construct()
    {
        $this->con = new Conexion();
    }

    public function getCarreras()
    {
        try {
            $conexion = new Conexion();
            $query = $conexion->con->dbh->prepare('select * from carrera');
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
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

    public function setCarrera()

    {  //     $this->dbh->'carrera';

    }

    public function delete_Carrera($id)
    {
        try {
            $query = $this->dbh->prepare('delete from carrera where id = ?');
            $query->bindParam(1, $id);
            $query->execute();
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


    public function update_Carrera($id, $nombre, $id_modalidad, $id_formacion_carr, $duracion,
                                   $fecha_creacion, $carga_horaria, $fecha_reg)
    {
        try {
            $query = $this->dbh->prepare('update carrera SET nombre = ?, id_modalidad= ?, id_formacion_carr= ?, duracion= ?, fecha_creacion= ?, carga_horaria= ?, fecha_reg= ? 
                WHERE id = ?');
            $query->bindParam(1, $nombre);
            $query->bindParam(2, $id_modalidad);
            $query->bindParam(3, $id_formacion_carr);
            $query->bindParam(4, $duracion);
            $query->bindParam(5, $fecha_creacion);
            $query->bindParam(6, $carga_horaria);
            $query->bindParam(7, $fecha_reg);
            $query->bindParam(8, $id);
            $query->execute();
            $this->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function listar_Carrera($id, $nombre, $id_modalidad, $id_formacion_carr, $duracion,
                                   $fecha_creacion, $carga_horaria, $fecha_reg)
    {
        try {
            $query = $this->dbh->prepare('select all  from carrera');
            $query->bindParam(1, $nombre);
            $query->bindParam(2, $id_modalidad);
            $query->bindParam(3, $id_formacion_carr);
            $query->bindParam(4, $duracion);
            $query->bindParam(5, $fecha_creacion);
            $query->bindParam(6, $carga_horaria);
            $query->bindParam(7, $fecha_reg);
            $query->bindParam(8, $id);
            $query->execute();
            $this->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function __clone()
    {
        trigger_error('La clonación no es permitida!.', E_USER_ERROR);
    }

}


?>
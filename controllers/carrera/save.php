<?php
require_once "../../models/config.php";
require_once "../../models/carrera.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $datos = array(
        'nombre' => filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING),
        'id_modalidad' => filter_input(INPUT_POST, 'id_modalidad', FILTER_SANITIZE_NUMBER_INT),
        'id_formacion_carr' => filter_input(INPUT_POST, 'id_formacion_carr', FILTER_SANITIZE_NUMBER_INT),
        'duracion' => filter_input(INPUT_POST, 'duracion', FILTER_SANITIZE_STRING),
        'fecha_creacion' => filter_input(INPUT_POST, 'fecha_creacion', FILTER_SANITIZE_STRING),
        'carga_horaria' => filter_input(INPUT_POST, 'carga_horaria', FILTER_SANITIZE_STRING)
    );

    $carrera_nueva = new Carrera();

    $carrera_nueva->nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
    $id_modalidad = filter_input(INPUT_POST, 'id_modalidad', FILTER_SANITIZE_NUMBER_INT);
    $id_formacion_carr = filter_input(INPUT_POST, 'id_formacion_carr', FILTER_SANITIZE_NUMBER_INT);
    $duracion = filter_input(INPUT_POST, 'duracion', FILTER_SANITIZE_STRING);
    $fecha_creacion = filter_input(INPUT_POST, 'fecha_creacion', FILTER_SANITIZE_STRING);
    $carga_horaria = filter_input(INPUT_POST, 'carga_horaria', FILTER_SANITIZE_STRING);

    $mensaje = 'Datos registrados satisfactoriamente!!!';
    $error = 'Error al registrar, revise los datos que esta introducionedo';

    if ($carrera_nueva->insertarCarrera($datos['nombre'], $datos['id_modalidad'], $datos['id_formacion_carr'], $datos['duracion'], $datos['fecha_creacion'], $datos['carga_horaria'])) {
        header("Location:" . Config::baseurl() . "views/carrera/lista.php?mensaje=$mensaje");
        exit();

    } else {
        //si existe alguina falla envia el mensaje de error y los datos del formulario para que revise el usuario
        header("Location:" . Config::baseurl() . "views/carrera/form.php?error=$error&nombre=" . $datos['nombre'] . "&id_modalidad=" . $datos['id_modalidad'] . "&id_formacion_carr=" . $datos['id_formacion_carr'] . "&duracion=" . $datos['duracion'] . "&fecha_creacion=" . $datos['fecha_creacion'] . "&carga_horaria=" . $datos['carga_horaria']);
        exit();
    }
}

?>
<?php
require_once "../../models/config.php";
require_once "../../models/carrera.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    //$datito='id_carrera' => filter_input(INPUT_POST, 'id_carrera', FILTER_SANITIZE_NUMBER_INT);
    //echo "LLEGA HASTA AQUI!!!!!";
    $datos = array(
        'id_carrera' => filter_input(INPUT_GET, 'id_carrera', FILTER_SANITIZE_NUMBER_INT),
        'nombre' => filter_input(INPUT_GET, 'nombre', FILTER_SANITIZE_STRING),
        'id_modalidad' => filter_input(INPUT_GET, 'id_modalidad', FILTER_SANITIZE_NUMBER_INT),
        'id_formacion_carr' => filter_input(INPUT_GET, 'id_formacion_carr', FILTER_SANITIZE_NUMBER_INT),
        'duracion' => filter_input(INPUT_GET, 'duracion', FILTER_SANITIZE_STRING),
        'fecha_creacion' => filter_input(INPUT_GET, 'fecha_creacion', FILTER_SANITIZE_STRING),
        'carga_horaria' => filter_input(INPUT_GET, 'carga_horaria', FILTER_SANITIZE_STRING),
        'fecha_registro' => filter_input(INPUT_GET, 'fecha_registro', FILTER_SANITIZE_STRING)
    );

    if (isset($_GET['id'])) {
                list($datos['id_carrera'], $datos['nombre'], $datos['id_modalidad'], $datos['id_formacion_carr'], $datos['duracion'], $datos['fecha_creacion'], $datos['carga_horaria'], $datos['fecha_registro']) = Carrera::getCarrera(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
            }

    $carrera_nueva = new Carrera();

    //echo $datos['nombre'];

    $mensaje = 'Datos eliminados satisfactoriamente!!!';
    $error = 'Error al eliminar, revise los datos que esta ingresando';

   
        if ($carrera_nueva->BorrarCarrera($datos['id_carrera'])) {
            header("Location:" . Config::baseurl() . "views/carrera/lista.php?mensaje=$mensaje");
            exit();

        } else {
            //si existe alguina falla envia el mensaje de error y los datos del formulario para que revise el usuario
            header("Location:" . Config::baseurl() . "views/carrera/form.php?error=$error&id_carrera=" . $datos['id_carrera'] . "&nombre=" . $datos['nombre'] . "&id_modalidad=" . $datos['id_modalidad'] . "&id_formacion_carr=" . $datos['id_formacion_carr'] . "&duracion=" . $datos['duracion'] . "&fecha_creacion=" . $datos['fecha_creacion'] . "&carga_horaria=" . $datos['carga_horaria']);
            exit();
        }
}

?>
<?php
require_once "../../models/config.php";
require_once "../../models/materia.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $datos = array(
        'id_materia' => filter_input(INPUT_POST, 'id_materia', FILTER_SANITIZE_NUMBER_INT),
        'nom_materia' => filter_input(INPUT_POST, 'nom_materia', FILTER_SANITIZE_STRING),
        'nro_hrs' => filter_input(INPUT_POST, 'nro_hrs', FILTER_SANITIZE_NUMBER_INT),
        'anio_materia' => filter_input(INPUT_POST, 'anio_materia', FILTER_SANITIZE_NUMBER_INT),
    );

    $materia_nueva = new Materia();

    $mensaje = 'Datos de materia registrados satisfactoriamente!!!';
    $error = 'Error al registrar, revise los datos que esta ingresando';

    if (empty($datos['id_materia'])) {
        if ($materia_nueva->insertarMateria($datos['nom_materia'], $datos['nro_hrs'], $datos['anio_materia'])) {
            header("Location:" . Config::baseurl() . "views/materia/lista.php?mensaje=$mensaje");
            exit();

        } else {
            //si existe alguina falla envia el mensaje de error y los datos del formulario para que revise el usuario
            header("Location:" . Config::baseurl() . "views/materia/form.php?error=$error&nom_materia=" . $datos['nom_materia'] . "&nro_hrs=" . $datos['nro_hrs'] . "&anio_materia=" . $datos['anio_materia']);
            exit();
        }
    }else{
        if ($materia_nueva->ActualizarMateria($datos['id_materia'],$datos['nom_materia'], $datos['nro_hrs'], $datos['anio_materia'])) {
            header("Location:" . Config::baseurl() . "views/materia/lista.php?mensaje=$mensaje");
            exit();

        } else {
            //si existe alguina falla envia el mensaje de error y los datos del formulario para que revise el usuario
            header("Location:" . Config::baseurl() . "views/materia/form.php?error=$error&id_materia=" . $datos['id_materia'] . "&nom_materia=" . $datos['nom_materia'] . "&nro_hrs=" . $datos['nro_hrs'] . "&anio_materia=" . $datos['anio_materia']);
            exit();
        }
    }
}

?>
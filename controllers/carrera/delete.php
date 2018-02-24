<?php
require_once "../../models/config.php";
require_once "../../models/carrera.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $mensaje = "Se elimino con exito!!!";
    if (!empty($id)) {
        $carrera_nueva = new Carrera();

        if ($carrera_nueva->BorrarCarrera($id)) {

            header("Location:" . Config::baseurl() . "views/carrera/lista.php?mensaje=$mensaje");
        } else {
            $mensaje = "hubo un error";
            header("Location:" . Config::baseurl() . "views/carrera/lista.php?error=$mensaje");


        }
    }
    exit();
    
}

?>
<?php
require_once "../models/carrera.php";
/*if (empty($_POST['submit']))
{
      header("Location:" . User::baseurl() . "app/list.php");
      exit;
}*/
 
$args = array(
    'nombre'  => FILTER_SANITIZE_STRING,
    'id_modalidad'  => FILTER_SANITIZE_STRING,
    'id_formacion_carr'  => FILTER_SANITIZE_STRING,
    'duracion'  => FILTER_SANITIZE_STRING,
    'fecha_creacion'  => FILTER_SANITIZE_STRING,
    'carga_horaria'  => FILTER_SANITIZE_STRING,
);
 
$post = (object)filter_input_array(INPUT_POST, $args);
 

$carrera_nueva = new Carrera();
if($carrera_nueva->insertarCarrera($post->nombre, $post->id_modalidad, $post->id_formacion_carr, $post->duracion,$post->fecha_creacion, $post->carga_horaria)){
	header("Location:" . Carrera::baseurl() . "controllers/list.php");

}
else
{
	echo "error al insertar";
}

?>
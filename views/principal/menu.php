<?php
/**
 * Created by PhpStorm.
 * User: maste
 * Date: 24/12/2017
 * Time: 10:59
 */
include_once("../../models/comun.php");
include_once("cabecera.php");
?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse"
                data-target="#menu">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?= Comun::baseurl(); ?>views/principal/inicio.php">INCOS</a>
    </div>
    <div class="collapse navbar-collapse" id="menu">
        <ul class="nav navbar-nav">
            <li><a href="<?= Comun::baseurl(); ?>views/principal/inicio.php">Inicio</a></li>
            <li><a href="<?= Comun::baseurl(); ?>views/carrera/lista.php">Carreras</a></li>
            <li><a href="estudiante.php">Estudiantes</a></li>
        </ul>
    </div>
</nav>
<br><br>
<br><br>

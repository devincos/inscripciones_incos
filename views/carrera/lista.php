<?php
require_once "../../models/comun.php";
//llamando a la funcion del controlador
require_once "../../controllers/carrera/list.php";
include_once("../principal/menu.php"); ?>
<div class="container">

    <div class="main">
        <div class="row">
            <a href="<?= Comun::baseurl(); ?>views/carrera/form.php" class="btn btn-success"> Nueva carrera</a><br><br>
        </div>
        <table class='table table-condensed'>
            <thead>
            <th> ID</th>
            <th> NOMBRE</th>
            <th> MODALIDAD</th>
            <th> EVALUACION</th>
            <th> FECHA DE REGISTRO</th>
            <th> OPCIONES</th>
            </thead>
            <tbody>
            <?php foreach ($arrCarreras as $carrera) { ?>
                <tr>
                    <td>
                        <?= $carrera['id']; ?>
                    </td>
                    <td>
                        <?= $carrera['nombre']; ?>
                    </td>
                    <td>
                        <?= $carrera['modalidad']; ?>
                    </td>
                    <td>
                        <?= $carrera['evaluacion']; ?>
                    </td>
                    <td>
                        <?= $carrera['fecha_reg']; ?>
                    </td>
                    <td>
                        <a href="<?= Comun::baseurl() ?>'controllers/carrera/update.php" class="btn btn-primary glyphicon glyphicon-pencil"></a>
                        <a href="<?= Comun::baseurl() ?>'controllers/carrera/delete.php" class="btn btn-danger glyphicon glyphicon-trash"></a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php include_once("../principal/pie.php"); ?>

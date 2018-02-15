<?php
require_once "../../models/config.php";
//llamando a la funcion del controlador
require_once "../../controllers/materia/list.php";
include_once("../principal/menu.php"); ?>
<div class="container">

    <div class="main">
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $mensaje = filter_input(INPUT_GET, 'mensaje', FILTER_SANITIZE_STRING);
            $error = filter_input(INPUT_GET, 'error', FILTER_SANITIZE_STRING);
            if (!empty($mensaje)) { ?>
                <div class="alert alert-success">
                    <strong>Exito!</strong> <?= $mensaje ?>.
                </div>
            <?php }
        } ?>

        <div class="row">
            <a href="<?= Config::baseurl(); ?>views/materia/form.php" class="btn btn-success"> Nueva Materia</a><br><br>
        </div>
        <table class='table table-condensed'>
            <thead>
            <th> ID</th>
            <th> MATERIA</th>
            <th> NRO.HRS.</th>
            <th> AÑO DE MATERIA</th>
            <th> CARRERA</th>
            </thead>
            <tbody>
            <?php foreach ($arrMateria as $materia) { ?>
                <tr>
                    <td>
                        <?= $materia['id_materia']; ?>
                    </td>
                    <td>
                        <?= $materia['nom_materia']; ?>
                    </td>
                    <td>
                        <?= $materia['nro_hrs']; ?>
                    </td>
                    <td>
                        <?= $materia['anio_materia']; ?>
                    </td>
                    <td>
                        <?= $materia['nombre']; ?>
                    </td>
                    <td>
                        <!--Opcion para actualizar el valor de la carrera-->
                        <a href="<?= Config::baseurl() ?>views/materia/form.php?id=<?= $materia['id_materia'] ?>"
                           class="btn btn-primary glyphicon glyphicon-pencil"></a>
                        <a href="<?= Config::baseurl() ?>controllers/materia/delete.php"
                           class="btn btn-danger glyphicon glyphicon-trash"></a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php include_once("../principal/pie.php"); ?>

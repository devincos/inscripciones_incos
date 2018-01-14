<?php
require_once "../../models/config.php";
require_once "../../models/carrera.php";
include_once("../principal/menu.php");

?>
<div class="main">
    <div class="container">


        <h1> Registrar nueva carrera</h1>
        <?php
        $id_carrera = $nombre = $id_modalidad = $id_formacion_carr = $duracion = $fecha_creacion = $carga_horaria = '';
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $error = filter_input(INPUT_GET, 'error', FILTER_SANITIZE_STRING);
            $nombre = filter_input(INPUT_GET, 'nombre', FILTER_SANITIZE_STRING);
            $id_modalidad = filter_input(INPUT_GET, 'id_modalidad', FILTER_SANITIZE_STRING);
            $id_formacion_carr = filter_input(INPUT_GET, 'id_formacion_carr', FILTER_SANITIZE_STRING);
            $duracion = filter_input(INPUT_GET, 'duracion', FILTER_SANITIZE_STRING);
            $fecha_creacion = filter_input(INPUT_GET, 'fecha_creacion', FILTER_SANITIZE_STRING);
            $carga_horaria = filter_input(INPUT_GET, 'carga_horaria', FILTER_SANITIZE_STRING);

            if (!empty($error)) { ?>
                <div class="alert alert-danger">
                    <strong>Error!</strong> <?= $error ?>.
                </div>
            <?php }
        } ?>

        <form id="formulario" action="<?= Config::baseurl(); ?>controllers/carrera/save.php" method="POST">
            <fieldset align="center">
                <legend>Datos de las carreras</legend>

                <div class="form-group">
                    <label for="id">ID carrera</label>
                    <input type="number" name="id" id="id" value="<?= htmlspecialchars($id_carrera) ?>" maxlength="20"
                           placeholder=" " class="form-control"
                           disabled>
                    <small id="emailHelp" class="form-text text-muted">El identificador de la carrera es autodefinido
                        por el sistema.
                    </small>
                </div>
                <div class="form-group">
                    <label for="nombre">CARRERA</label>
                    <input type="text" name="nombre" id="nombre" value="<?= htmlspecialchars($nombre) ?>" maxlength="20"
                           placeholder="Escriba nombre carrera" class="form-control">
                </div>
                <div class="form-group">
                    <label for="id_modalidad">MODALIDAD</label>
                    <select name="id_modalidad" id="id_modalidad" class="form-control">
                        <option value="">seleccione una modalidad</option>
                        <?php foreach (Carrera::getSelects('modalidad') as $modalidad) { ?>
                            <option value="<?= $modalidad['id'] ?>" <?= ($id_modalidad == $modalidad['id'] ? 'selected' : '') ?>><?php echo $modalidad['modalidad'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="id_formacion_carr">FORMA EVALUAR</label>
                    <select name="id_formacion_carr" id="id_formacion_carr" class="form-control">
                        <option value="">seleccion un dato</option>
                        <?php foreach (Carrera::getSelects('forma_evaluacion') as $formaEvaluacion) { ?>

                            <option value="<?= $formaEvaluacion['id'] ?>" <?= ($id_formacion_carr == $formaEvaluacion['id'] ? 'selected' : '') ?>><?php echo $formaEvaluacion['evaluacion'] ?></option>

                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="duracion">DURACION</label>
                    <input type="text" name="duracion" id="duracion" value="<?= htmlspecialchars($duracion)?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="fecha_creacion">FECHA DE CREACION</label>
                    <input type="date" name="fecha_creacion" id="fecha_creacion" value="<?= htmlspecialchars($fecha_creacion)?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="carga_horaria">CARGA HORARIA</label>
                    <input type="text" name="carga_horaria" id="carga_horaria" value="<?= htmlspecialchars($carga_horaria)?>" class="form-control">
                </div>

            </fieldset>

            <br>
            <input type="submit" value="Guardar" id="guardar" name="guardar" class="btn btn-success">
            <input type="reset" value="Limpiar" class="btn btn-primary">
        </form>
    </div>
</div>
<?php include_once("../principal/pie.php"); ?>

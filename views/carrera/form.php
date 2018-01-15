<?php
require_once "../../models/config.php";
require_once "../../models/carrera.php";
include_once("../principal/menu.php");

?>
<div class="main">
    <div class="container">


        <?php
        $id_carrera = $nombre = $id_modalidad = $id_formacion_carr = $duracion = $fecha_creacion = $carga_horaria = '';
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $error = filter_input(INPUT_GET, 'error', FILTER_SANITIZE_STRING);

            //datos del formulario
            $id_carrera = filter_input(INPUT_GET, 'id_carrera', FILTER_SANITIZE_NUMBER_INT);
            $nombre = filter_input(INPUT_GET, 'nombre', FILTER_SANITIZE_STRING);
            $id_modalidad = filter_input(INPUT_GET, 'id_modalidad', FILTER_SANITIZE_STRING);
            $id_formacion_carr = filter_input(INPUT_GET, 'id_formacion_carr', FILTER_SANITIZE_STRING);
            $duracion = filter_input(INPUT_GET, 'duracion', FILTER_SANITIZE_STRING);
            $fecha_creacion = filter_input(INPUT_GET, 'fecha_creacion', FILTER_SANITIZE_STRING);
            $carga_horaria = filter_input(INPUT_GET, 'carga_horaria', FILTER_SANITIZE_STRING);

            if (isset($_GET['id'])) {
                list($id_carrera, $nombre, $id_modalidad, $id_formacion_carr, $duracion, $fecha_creacion, $carga_horaria, $fecha_registro) = Carrera::getCarrera(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
            }
            ?>

            <h1> <?= (!empty($id_carrera) ? 'Modificar' : 'Registrar ') ?> carrera</h1>

            <?php if (!empty($error)) { ?>
                <div class="alert alert-danger">
                    <strong>Error!</strong> <?= $error ?>.
                </div>
            <?php }
        } ?>

        <form id="formulario" action="<?= Config::baseurl(); ?>controllers/carrera/save.php" method="POST"
              class="form-container">
            <fieldset align="center">
                <legend>Datos de las carrera</legend>

                <div class="form-group">
                    <label for="id">ID carrera</label>
                    <input type="number" name="id_carrera" id="id_carrera" value="<?= htmlspecialchars($id_carrera) ?>" maxlength="20"
                           placeholder=" " class="form-control"
                           readonly>
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
                            <option value="<?= $modalidad['id'] ?>" <?= ($id_modalidad == $modalidad['id'] ? 'selected' : '') ?> ><?php echo $modalidad['modalidad'] ?></option>
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
                    <input type="text" name="duracion" id="duracion" value="<?= htmlspecialchars($duracion) ?>"
                           class="form-control">
                </div>
                <div class="form-group">
                    <label for="fecha_creacion">FECHA DE CREACION</label>
                    <input type="date" name="fecha_creacion" id="fecha_creacion"
                           value="<?= htmlspecialchars($fecha_creacion) ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="carga_horaria">CARGA HORARIA</label>
                    <input type="text" name="carga_horaria" id="carga_horaria"
                           value="<?= htmlspecialchars($carga_horaria) ?>" class="form-control">
                </div>

            </fieldset>

            <br>
            <input type="submit" value="<?= (!empty($id_carrera) ? 'Modificar' : 'Guardar ') ?> " id="guardar" name="guardar" class="btn btn-<?= (!empty($id_carrera) ? 'primary' : 'success') ?> ">
            <input type="reset" value="Limpiar" class="btn btn-default">
        </form>
    </div>
</div>
<?php include_once("../principal/pie.php"); ?>

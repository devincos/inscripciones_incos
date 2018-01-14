<?php
require_once "../../models/comun.php";
require_once "../../models/carrera.php";
include_once("../principal/menu.php");

?>
<div class="main">
    <div class="container">


        <h1> Registrar nueva carrera</h1>
        <form id="form1" name="form1" action="<?= Comun::baseurl(); ?>controllers/carrera/save.php" method="POST">
            <fieldset align="center">
                <legend>Datos de las carreras</legend>

                <div class="form-group">
                    <label for="id">ID carrera</label>
                    <input type="number" name="id" id="id" value="" maxlength="20" placeholder=" " class="form-control" disabled>
                    <small id="emailHelp" class="form-text text-muted">El identificador de la carrera es autodefinido por el sistema.
                    </small>
                </div>
                <div class="form-group">
                    <label for="nombre">CARRERA</label>
                    <input type="text" name="nombre" id="nombre" value="" maxlength="20"
                           placeholder="Escriba nombre carrera" class="form-control">
                </div>
                <div class="form-group">
                    <label for="id_modalidad">MODALIDAD</label>
                    <select name="id_modalidad" id="id_modalidad" class="form-control">
                        <option value="">seleccione una modalidad</option>
                        <?php foreach (Carrera::getSelects('modalidad') as $modalidad) { ?>

                            <option value="<?= $modalidad['id'] ?>"><?php echo $modalidad['modalidad'] ?></option>

                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="id_formacion_carr">FORMA EVALUAR</label>
                    <select name="id_formacion_carr" id="id_formacion_carr" class="form-control">
                        <option value="">seleccion un dato</option>
                        <?php foreach (Carrera::getSelects('forma_evaluacion') as $formaEvaluacion) { ?>

                            <option value="<?= $formaEvaluacion['id'] ?>"><?php echo $formaEvaluacion['evaluacion'] ?></option>

                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="duracion">DURACION</label>
                    <input type="text" name="duracion" id="duracion" value="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="fecha_creacion">FECHA DE CREACION</label>
                    <input type="date" name="fecha_creacion" id="fecha_creacion" class="form-control">
                </div>
                <div class="form-group">
                    <label for="carga_horaria">CARGA HORARIA</label>
                    <input type="text" name="carga_horaria" id="carga_horaria" value="" class="form-control">
                </div>

            </fieldset>

            <br>
            <input type="submit" value="Guardar" id="guardar" name="guardar" class="btn btn-success">
            <input type="reset" value="Limpiar" class="btn btn-primary">
        </form>
    </div>
</div>
<?php include_once("../principal/pie.php"); ?>

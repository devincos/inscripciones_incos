<?php
require_once "../../models/config.php";
require_once "../../models/carrera.php";
require_once "../../models/materia.php";
include_once("../principal/menu.php");

?>
<div class="main">
    <div class="container">


        <?php
        $id_materia = $nom_materia = $nro_hrs = $anio_materia  = $id_carrera = '';
        $anual= array("", "Primero", "Segundo","Tercero");
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $error = filter_input(INPUT_GET, 'error', FILTER_SANITIZE_STRING);

            //datos del formulario de la materia
            $id_materia = filter_input(INPUT_GET, 'id_materia', FILTER_SANITIZE_NUMBER_INT);
            $nom_materia  = filter_input(INPUT_GET, 'nom_materia', FILTER_SANITIZE_STRING);
            $nro_hrs = filter_input(INPUT_GET, 'nro_hrs', FILTER_SANITIZE_NUMBER_INT);
            $anio_materia = filter_input(INPUT_GET, 'anio_materia', FILTER_SANITIZE_NUMBER_INT);
            $id_carrera = filter_input(INPUT_GET, 'id_carrera', FILTER_SANITIZE_NUMBER_INT);

            if (isset($_GET['id'])) {
                list($id_materia, $nom_materia, $nro_hrs, $anio_materia, $id_carrera) = Materia::getMateria(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
            }
            ?>

            <h1> <?= (!empty($id_materia) ? 'Modificar' : 'Registrar ') ?> MATERIA</h1>

            <?php if (!empty($error)) { ?>
                <div class="alert alert-danger">
                    <strong>Error!</strong> <?= $error ?>.
                </div>
            <?php }
        } ?>

        <form id="formulario" action="<?= Config::baseurl(); ?>controllers/materia/save.php" method="POST"
              class="form-container">
            <fieldset align="center">
                <legend>Datos de la MATERIA</legend>

                <div class="form-group">
                    <label for="id_materia">CODIGO MATERIA</label>
                    <input type="number" name="id_materia" id="id_materia" value="<?= htmlspecialchars($id_materia) ?>" maxlength="20"
                           placeholder=" " class="form-control"
                           readonly>
                    <small id="emailHelp" class="form-text text-muted">El identificador de la materia es autodefinido por el sistema.
                    </small>
                </div>
                <div class="form-group">
                    <label for="nom_materia">MATERIA</label>
                    <input type="text" name="nom_materia" id="nom_materia" value="<?= htmlspecialchars($nom_materia) ?>" maxlength="50"
                           placeholder="Escriba nombre materia" class="form-control">
                </div>
                <div class="form-group">
                    <label for="nro_hrs">NUMERO DE HORAS</label>
                    <input type="text" name="nro_hrs" id="nro_hrs" value="<?= htmlspecialchars($nro_hrs) ?>"
                           class="form-control">
                </div>

                <div class="form-group">
                    <label for="anio_materia">A QUE AÑO CORRESPONDE LA MATERIA</label>
                    <select name="anio_materia" id="anio_materia" class="form-control">
                        <option value="">seleccione un año</option>
                        $i
                         <?php for ($i=1; $i<=3; $i++) { ?>

                            <option value="<?= $i ?>" <?= ($anio_materia == $i ? 'selected' : '') ?>><?php echo $anual[$i] ?></option>

                        <?php } ?>
                    </select>

                </div>


                <div class="form-group">
                    <label for="id_carrera">CARRERA</label>
                    <select name="id_carrera" id="id_carrera" class="form-control">
                        <option value="">seleccione una carrera</option>
                        <?php foreach (Carrera::getSelects('carrera') as $carrera) { ?>

                            <option value="<?= $carrera['id'] ?>" <?= ($id_carrera == $carrera['id'] ? 'selected' : '') ?>><?php echo $carrera['nombre'] ?></option>

                        <?php } ?>
                    </select>
                </div>

  
            </fieldset>

            <br>
            <input type="submit" value="<?= (!empty($id_materia) ? 'Modificar' : 'Guardar ') ?> " id="guardar" name="guardar" class="btn btn-<?= (!empty($id_materia) ? 'primary' : 'success') ?> ">
            <input type="reset" value="Limpiar" class="btn btn-default">
        </form>
    </div>
</div>
<?php include_once("../principal/pie.php"); ?>

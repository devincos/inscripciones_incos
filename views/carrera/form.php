<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	
</head>
<body>
 	<?php
   	 require_once "../../models/carrera.php";
    ?>
	<h1> Formulario de la carrera</h1>
	<form id="form1" name="form1" action="<?= Carrera::baseurl(); ?>controllers/save.php" method="POST">
		<fieldset align="center">
			<legend>Datos  de las carreras</legend>
            <label>ID carrera</label>
			<input type="text" name="id" id="id" value="" maxlength="20" placeholder=" "  ><br>	
			<label>CARRERA</label>
			<input type="text" name="nombre" id="nombre" value="" maxlength="20" placeholder="Escriba nombre carrera"  ><br>	
			<label>MODALIAD</label>
			<select name="id_modalidad" id="id_modalidad">
				<option value="">seleccion un dato</option>
				<?php foreach(Carrera::getSelects('modalidad') as $modalidad){ ?>

					<option value="<?= $modalidad['id'] ?>"><?php echo $modalidad['modalidad'] ?></option>		

				<?php } ?>
			</select><br>
			<label>FORMA EVALUAR</label>
		
			<select name="id_formacion_carr" id="id_formacion_carr">
				<option value="">seleccion un dato</option>
				<?php foreach(Carrera::getSelects('forma_evaluacion') as $formaEvaluacion){ ?>
					
					<option value="<?= $formaEvaluacion['id'] ?>"><?php echo $formaEvaluacion['evaluacion'] ?></option>		

				<?php } ?>
			</select>

			<br>	
			<label>DURACION</label>
			<input type="text" name="duracion" id="duracion" value=""><br>	
			<label>Fecha de CREACIOn</label>
			<input type="fcreacion" name="fecha_creacion" id="fecha_creacion"><br>
			<label>CARGA HORARIO</label>
			<input type="text" name="carga_horaria" id="carga_horaria" value="">	<br>
			<label>Fecha de REGISTRO</label>
			<input type="fcreacion" name="fecha_reg" id="fecha_reg"><br>
		</fieldset>
		
		<br>
		<input type="submit" value="Guardar" id="guardar" name="guardar" >
		<input type="reset" value="Limpiar">
	</form>
</body>
</html>
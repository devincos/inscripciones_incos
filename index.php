<?php require_once 'models/carrera.php';
//require_once 'class/users.class.php';
$carrerita=new Carrera();
//($nombre, $id_modalidad, $id_formacion_carr, $duracion, 
   //     $fecha_creacion, $carga_horaria)
$carrerita->insertarCarrera('secretariado', 1,1,3,'02/03/2012',3600);
echo "<table> 
<thead>
<th> id </th>
<th> nombre </th>
<th> id_modalidad </th>
</thead>
<tbody>";
foreach ($carrerita->getCarreras() as $key => $value) {
	//echo $key;
	echo "<tr><td>";
	echo $value['id'];
	echo "</td> ";
	echo "<td>";
	echo $value['nombre'];
	echo "</td>";
	echo "<td>";
	echo $value['id_modalidad'];
	echo "</td>";
	echo "</tr>";
	//print_r($value);
}
echo "</tbody>
</table>";
?>

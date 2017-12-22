<?php require_once '../models/carrera.php';

$carrerita=new Carrera();


echo "<table> 
<thead>
<th> id </th>
<th> nombre </th>
<th> id_modalidad </th>
</thead>
<tbody>";
foreach ($carrerita->getCarreras() as $key => $value) {
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
}
echo "</tbody>
</table>";
?>

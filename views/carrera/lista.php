<?php
require_once "../../models/comun.php";
//llamando a la funcion del controlador
require_once "../../controllers/carrera/list.php";
include_once("../principal/menu.php"); ?>
<div class="container">

    <div class="main">
        <?php
        echo "<table class='table table-condensed'> 
<thead>
<th> ID </th>
<th> NOMBRE </th>
<th> MODALIDAD </th>
<th> OPCIONES</th>
</thead>
<tbody>";
        foreach ($arrCarreras as $carrera) {
            echo "<tr><td>";
            echo $carrera['id'];
            echo "</td> ";
            echo "<td>";
            echo $carrera['nombre'];
            echo "</td>";
            echo "<td>";
            echo $carrera['id_modalidad'];
            echo "</td>";
            echo "<td>";
            echo '<a href="' . Comun::baseurl() . 'controllers/carrera/update.php" >Actualizar</a>';
            echo "</td>";
            echo "</tr>";
        }
        echo "</tbody>
</table>";
        ?>
    </div>
</div>
<?php include_once("../principal/pie.php"); ?>

<?php
require_once('../Controlador/controladorServicios.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
   	<title>Document</title>
</head>
<body>   
    <a href="../Controlador/controladorServicios.php?vista=registrarServicios.php" >Registrar</a>
    <h1 align="center">Servicios</h1>
    <table border="1" align="center">
        <thead>
            <tr>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Fecha Inicio</th>
                <th>Fecha Fin</th>
                <th>Valor</th>
                <th>ID Cliente</th>
                <th>ID Vehiculo</th>
                <th>ID Trabajador</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($listaServicios as $Servicio){
                    echo "<tr>";
                    echo "<td>".$Servicio['idServicio']."</td>";
                    echo "<td>".$Servicio['nombre']."</td>";
					echo "<td>".$Servicio['descripcion']."</td>";
					echo "<td>".$Servicio['fechaInicio']."</td>";
					echo "<td>".$Servicio['fechaFin']."</td>";
					echo "<td>".$Servicio['valor']."</td>";
					echo "<td>".$Servicio['idCliente']."</td>";
					echo "<td>".$Servicio['idVehiculo']."</td>";
					echo "<td>".$Servicio['idTrabajador']."</td>";
                    echo "<td>
						<form id='frmServicios$Servicio[idServicio]' method='POST' action='../Controlador/controladorServicios.php'>
							<input type='hidden' name='idServicio' value=".$Servicio['idServicio']." />
							<button type='submit' name='Editar'>Editar</button>
							<input type='hidden' name='Eliminar' />
							<button type='button' onclick='validarEliminacion($Servicio[idServicio])' name='Eliminar'>Eliminar</button>
                        </form>
                    </td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
    <script>
        //Declarar la función de javascript
        function validarEliminacion(idServicio){
            if(confirm('¿Realmente desea eliminar?')){
                //document.frmCategoria.submit();
                document.getElementById('frmServicios'+idServicio).submit();
            }
        }
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
</body>
</html>
<?php
require_once('../Controlador/controladorServicios.php');
$servicio = $controladorServicios->buscarServicio($_REQUEST['idServicio']);
//var_dump($categoria);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form style="text-align:Center" action="../Controlador/controladorServicios.php" method="POST">
        <label>Id:</label>
        <input type="number" name="idServicio" id="idServicio" value="<?php echo $servicio->getidServicio(); ?>"  readonly />
        <br>
        <label>Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="<?php echo $servicio->getnombre(); ?>" />
        <br>
        <label>Descripcion:</label>
        <input type="text" name="descripcion" id="descripcion" value="<?php echo $servicio->getdescripcion(); ?>" />
        <br> 
        <label>fecha Inicio:</label>
        <input type="date" name="fechaInicio" id="fechaInicio" value="<?php echo $servicio->getfechaInicio(); ?>" />
        <br> 
        <label>Fecha Fin:</label>
        <input type="date" name="fechaFin" id="fechaFin" value="<?php echo $servicio->getfechaFin(); ?>" />
        <br>
        <label>Valor:</label>
        <input type="number" name="valor" id="valor" value="<?php echo $servicio->getvalor(); ?>" />
        <br> 
        <label>ID CLiente:</label>
        <input type="number" name="idCliente" id="idCliente" value="<?php echo $servicio->getidCliente(); ?>" />
        <br> 
        <label>ID Vehiculo:</label>
        <input type="number" name="idVehiculo" id="idVehiculo" value="<?php echo $servicio->getidVehiculo(); ?>" />
        <br> 
        <label>ID Trabajador:</label>
        <input type="number" name="idTrabajador" id="idTrabajador" value="<?php echo $servicio->getidTrabajador(); ?>" />
        <br>  <br>
        <button type="submit" name="Actualizar">Actualizar</button>
    </form>
</body>
</html>
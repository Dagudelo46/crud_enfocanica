<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
    <form style="text-align:center;" action="../Controlador/controladorServicios.php" method="POST">
        <label>Nombre:</label>
        <input type="text" name="nombre" id="nombre" />
        <br> 
        <label>Descripcion:</label>
        <input type="text" name="descripcion" id="descripcion" />
        <br> 
        <label>Fecha Inicio:</label>
        <input type="date" name="fechaInicio" id="fechaInicio" />
        <br> 
        <label>Fecha Fin:</label>
        <input type="date" name="fechaFin" id="fechaFin" />
        <br>
        <label>Valor:</label>
        <input type="number" name="valor" id="valor" />
        <br> 
        <label>ID CLiente:</label>
        <input type="number" name="idCliente" id="idCliente" />
        <br> 
        <label>ID Vehiculo:</label>
        <input type="number" name="idVehiculo" id="idVehiculo" />
        <br> 
        <label>ID Trabajador:</label>
        <input type="number" name="idTrabajador" id="idTrabajador" />
        <br>  <br>
        <button type="submit" name="Registrar">Registrar</button>
    </form>	
</body>
</html>


   

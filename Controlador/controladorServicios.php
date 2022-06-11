<?php
require_once('../Modelo/Servicios.php');//Incluir el modelo Categoria
require_once('../Modelo/crudServicios.php');//Incluir el CRUD.
class controladorServicios{
    //Crear el constructor
      
    public function __construct(){
       //$categoria = new Categoria(); //Instanciar un objeto categoria
       //$crudCategoria = new crudCategoria();//Instanciar crudCategoria
    }

    public function listarServicios(){
       //Llamar el método listarCategoria del crudCategoria.
       $crudServicios = new crudServicios();//Instanciar crudCategoria
       $listaServicios = $crudServicios->listarServicios();//Listado de categorias
       return $listaServicios;
    }

    ////Recibe los valores del formulario, crea un objeto y envía la petición al CRUD
    public function registrarServicio($e_nombre,$e_descripcion,$e_fechaInicio,$e_fechaFin,$e_valor,$e_idCliente,$e_idVehiculo,$e_idTrabajador){
      //Instanciación del objeto categoria
      	$servicio = new Servicio();//Crear un objeto del tipo categoria
      	$servicio->setidServicio('');//Asignar el valor del formulario al objeto
      	$servicio->setnombre($e_nombre);
		$servicio->setdescripcion($e_descripcion);
		$servicio->setfechaInicio($e_fechaInicio);
		$servicio->setfechaFin($e_fechaFin);
		$servicio->setvalor($e_valor);
		$servicio->setidCliente($e_idCliente);
		$servicio->setidVehiculo($e_idVehiculo);
		$servicio->setidTrabajador($e_idTrabajador);
    
      //Solicitar al crudCategoria realice la inserción
      $crudServicios = new crudServicios();
      $mensaje = $crudServicios->registrarServicio($servicio);
      //Imprimir el mensaje del resultado de la inserción con jscript
      echo "
      <script>
         alert('$mensaje');
         document.location.href = '../Vista/listarServicios.php';
      </script>
      ";
   }

   public function buscarServicio($e_idServicio){
      $servicio = new Servicio(); //Definir un objeto de la clase Categoria
      $servicio->setidServicio($e_idServicio);//Setear valores

      $crudServicios = new crudServicios(); //Definir un objeto de la clase crudCategoria
      $datosCategoria = $crudServicios->buscarServicio($servicio); //LLamar el método del crud
   
      $servicio->setnombre($datosCategoria['nombre']);
      $servicio->setdescripcion($datosCategoria['descripcion']);
      $servicio->setfechaInicio($datosCategoria['fechaInicio']);
      $servicio->setfechaFin($datosCategoria['fechaFin']);
      $servicio->setvalor($datosCategoria['valor']);
      $servicio->setidCliente($datosCategoria['idCliente']);
      $servicio->setidVehiculo($datosCategoria['idVehiculo']);
      $servicio->setidTrabajador($datosCategoria['idTrabajador']);
      return $servicio;
   }

   public function actualizarServicio($e_idServicio,$e_nombre,$e_descripcion,$e_fechaInicio,$e_fechaFin,$e_valor,$e_idCliente,$e_idVehiculo,$e_idTrabajador){
      //Instanciación del objeto servicio
      	$servicio = new Servicio();//Crear un objeto del tipo categoria
      	$servicio->setidServicio($e_idServicio);//Asignar el valor del formulario al objeto
	   	$servicio->setnombre($e_nombre);
		$servicio->setdescripcion($e_descripcion);
		$servicio->setfechaInicio($e_fechaInicio);
		$servicio->setfechaFin($e_fechaFin);
		$servicio->setvalor($e_valor);
		$servicio->setidCliente($e_idCliente);
		$servicio->setidVehiculo($e_idVehiculo);
		$servicio->setidTrabajador($e_idTrabajador);
    
    
      //Solicitar al crudCategoria realice la actualización
      $crudServicios = new crudServicios();
      $crudServicios->actualizarServicio($servicio); 
   }

   public function eliminarServicio($e_idServicio){
      //Instanciación del objeto categoria
      $servicio = new Servicio();//Crear un objeto del tipo categoria
      $servicio->setidServicio($e_idServicio);//Asignar el valor del formulario al objeto
    
      //Solicitar al crudCategoria realice la eliminación
      $crudServicios = new crudServicios();
      $crudServicios->eliminarServicio($servicio); 
   }

   public function desplegarVista($pagina){
      //Redireccionar hacia la una vista
      header("Location:../Vista/".$pagina);
   }

}

//Probar el Controlador
$controladorServicios = new controladorServicios();
$listaServicios = $controladorServicios->listarServicios();//Verificar si se devuelven datos

//Verificar la acción a realizar.
if(isset($_POST['Registrar'])){//isset: Establer si una variable existe
   //echo "Registrando";
   //Capturar los datos enviados desde el formulario
   $e_nombre = $_POST['nombre']; //Captura del nombre digitado en la caja de texto
   $e_descripcion = $_POST['descripcion']; 
   $e_fechaInicio = $_POST['fechaInicio']; 
   $e_fechaFin = $_POST['fechaFin']; 
   $e_valor = $_POST['valor']; 
   $e_idCliente = $_POST['idCliente']; 
   $e_idVehiculo = $_POST['idVehiculo']; 
   $e_idTrabajador = $_POST['idTrabajador']; 

   //Hacer la petición al controlador
   $controladorServicios->registrarServicio($e_nombre,$e_descripcion,$e_fechaInicio,$e_fechaFin,$e_valor,$e_idCliente,$e_idVehiculo,$e_idTrabajador);
}
else if(isset($_POST['Editar'])){
   $e_idServicio = $_POST['idServicio']; //Recibir variable del formulario
   //echo $e_idCategoria;
   $controladorServicios->desplegarVista("editarServicios.php?idServicio=$e_idServicio");
}
else if(isset($_REQUEST['Actualizar'])){
   //Capturar valores enviados desde la vista
	$e_idServicio = $_REQUEST['idServicio'];
	$e_nombre = $_POST['nombre']; 
   	$e_descripcion = $_POST['descripcion']; 
   	$e_fechaInicio = $_POST['fechaInicio']; 
   	$e_fechaFin = $_POST['fechaFin']; 
   	$e_valor = $_POST['valor']; 
   	$e_idCliente = $_POST['idCliente']; 
   	$e_idVehiculo = $_POST['idVehiculo']; 
   	$e_idTrabajador = $_POST['idTrabajador']; 
	
   //Llamar el método actualizarCategoria()
   $controladorServicios->actualizarServicio($e_idServicio,$e_nombre,$e_descripcion,$e_fechaInicio,$e_fechaFin,$e_valor,$e_idCliente,$e_idVehiculo,$e_idTrabajador); 
}
else if(isset($_REQUEST['Eliminar'])){
   //Capturar valores enviados desde la vista
   $e_idServicio = $_REQUEST['idServicio'];

   //Llamar el método eliminarCategoria()
   $controladorServicios->eliminarServicio($e_idServicio); 
}
else if(isset($_REQUEST['vista'])){
   $controladorServicios->desplegarVista($_REQUEST['vista']);
}

?>
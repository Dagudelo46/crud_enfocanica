<?php
//CRUD =C:CREAR,INSERT, R:READ:LEER:SELECT,U:UPDATE:MODIFICAR D:DELETE:ELIMINAR O BORRAR
require_once('conexion.php');//8959-15C9Incluir el archivo conexión
class crudServicios{
    public function __construct(){
    }

    //Método para consultar todas las categorías
    //de la base de datos.
    public function listarServicios(){//Read del CRUD:SELECT
      //Establecer la conexión a la base datos
      $baseDatos = Conexion::conectar();
      //Definir la sentencia sql
      $sql = $baseDatos->query('SELECT * FROM servicios ORDER BY nombre ASC');
      //Ejecutar la consulta
      $sql->execute();
      //Cerrar la conexión
      Conexion::desconectar($baseDatos);
      //Retornar el resultado de la consulta a la tabla.
      return($sql->fetchAll());//Retornar el resultado de la consulta
    }

    public function registrarServicio($servicio){ //Recibe un objeto de la clase categoria
      $mensaje = ""; //Declarar una variable llamada mensaje
      //Establecer la conexión a la base datos
      $baseDatos = Conexion::conectar();  
      //Preparar la sentencia sql
      //e_ indica que es un dato de entrada
      $sql = $baseDatos->prepare('INSERT INTO 
      servicios(idServicio,nombre,descripcion,fechaInicio,fechaFin,valor,IdCliente,idVehiculo,idTrabajador)
      VALUES(:e_idServicio, :e_nombre, :e_descripcion, :e_fechaInicio, :e_fechaFin, :e_valor, :e_idCliente, :e_idVehiculo, :e_idTrabajador) ');
      //Las siguientes líneas capturan los valores de los atributos del objeto
      $sql->bindValue('e_idServicio', $servicio->getidServicio());
      $sql->bindValue('e_nombre', $servicio->getnombre());
		$sql->bindValue('e_descripcion', $servicio->getdescripcion());
		$sql->bindValue('e_fechaInicio', $servicio->getfechaInicio());
		$sql->bindValue('e_fechaFin', $servicio->getfechaFin());
		$sql->bindValue('e_valor', $servicio->getvalor());
		$sql->bindValue('e_idCliente', $servicio->getIdCliente());
		$sql->bindValue('e_idVehiculo', $servicio->getidVehiculo());
		$sql->bindValue('e_idTrabajador', $servicio->getidTrabajador());
      try{ //Capturar excepciones de la base de datos
        //Ejecutar la consulta
        $sql->execute();
        $mensaje = "Registro exitoso";
      }
      catch(Exception $excepcion){ //Exception: Excepción o un error
        //echo $excepcion->getMessage();
        $mensaje = "Problemas en el registro";
      }
      //Cerrar la conexión
      Conexion::desconectar($baseDatos);
      return $mensaje;
    }

    public function buscarServicio($servico){//Read del CRUD:SELECT
      //Establecer la conexión a la base datos
      //var_dump($categoria);
      $baseDatos = Conexion::conectar();
      //Definir la sentencia sql
      $sql = $baseDatos->query("SELECT * FROM servicios WHERE idServicio=".$servico->getidServicio());
      //Ejecutar la consulta
      $sql->execute();
      //Cerrar la conexión
      Conexion::desconectar($baseDatos);
      //Retornar el resultado de la consulta a la tabla.
      return($sql->fetch());//Retornar el resultado de la consulta
    }

    public function actualizarServicio($servicio){ //Recibe un objeto de la clase categoria
      //Establecer la conexión a la base datos
      $baseDatos = Conexion::conectar();  
      //Preparar la sentencia sql
      //e_ indica que es un dato de entrada
      $sql = $baseDatos->prepare('UPDATE  
      servicios SET idServicio=:e_idServicio, nombre=:e_nombre, descripcion=:e_descripcion, fechaInicio=:e_fechaInicio, fechaFin=:e_fechaFin, valor=:e_valor, idCliente=:e_idCliente, idVehiculo=:e_idVehiculo, idTrabajador= :e_idTrabajador WHERE idServicio=:e_idServicio');
      //Las siguientes líneas capturan los valores de los atributos del objeto
      $sql->bindValue('e_idServicio', $servicio->getidServicio());
      $sql->bindValue('e_nombre', $servicio->getnombre());
      $sql->bindValue('e_descripcion', $servicio->getdescripcion());
      $sql->bindValue('e_fechaInicio', $servicio->getfechaInicio());
      $sql->bindValue('e_fechaFin', $servicio->getfechaFin());
      $sql->bindValue('e_valor', $servicio->getvalor());
      $sql->bindValue('e_idCliente', $servicio->getidCliente());
      $sql->bindValue('e_idVehiculo', $servicio->getidVehiculo());
      $sql->bindValue('e_idTrabajador', $servicio->getidTrabajador());
      try{ //Capturar excepciones de la base de datos
        //Ejecutar la consulta
        $sql->execute();
        echo "Actualización exitosa";
      }
      catch(Exception $excepcion){ //Exception: Excepción o un error
        echo $excepcion->getMessage();
        echo "Problemas en la actualización";
      }
      //Cerrar la conexión
      Conexion::desconectar($baseDatos);
    }

    public function eliminarServicio($servicio){ //Recibe un objeto de la clase categoria
      //Establecer la conexión a la base datos
      $baseDatos = Conexion::conectar();  
      //Preparar la sentencia sql
      //e_ indica que es un dato de entrada
      $sql = $baseDatos->prepare('DELETE FROM  
      servicios WHERE idServicio=:e_idServicio');
      //Las siguientes líneas capturan los valores de los atributos del objeto
      $sql->bindValue('e_idServicio', $servicio->getidServicio());
      try{ //Capturar excepciones de la base de datos
        //Ejecutar la consulta
        $sql->execute();
        echo "Eliminación exitosa";
      }
      catch(Exception $excepcion){ //Exception: Excepción o un error
        //echo $excepcion->getMessage();
        echo "Problemas en la eliminación";
      }
      //Cerrar la conexión
      Conexion::desconectar($baseDatos);
    }
}



?>
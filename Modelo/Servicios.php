<?php
class Servicio{
    //Definición de atributos
    private $idServicio; //El atributo idCategoria
    private $nombre; //El atributo nombre
    private $descripcion;
    private $fechaInicio;
    private $fechaFin;
    private $valor;
    private $idCliente;
    private $idVehiculo;
    private $idTrabajador;

    //Definir el constructor de la clase
    //Es estándar para cualquier proyecto php
    public function __construct(){

    }
    
    //Definir los métodos set: Asignar valores a los atributos
    public function setidServicio($e_idServicio){
        $this->idServicio = $e_idServicio; //Asigna al atributo id la variable $id
    }
	
    public function setnombre($e_nombre){
        $this->nombre = $e_nombre; 
    }
	
	public function setdescripcion($e_descripcion){
        $this->descripcion = $e_descripcion; 
    }

	public function setfechaInicio($e_fechaInicio){
        $this->fechaInicio = $e_fechaInicio; 
    }

	public function setfechaFin($e_fechaFin){
        $this->fechaFin = $e_fechaFin; 
    }

	public function setvalor($e_valor){
        $this->valor = $e_valor; 
    }

	public function setidCliente($e_Cliente){
        $this->idCliente = $e_Cliente;
    }
	
	public function setidVehiculo($e_idVehiculo){
        $this->idVehiculo = $e_idVehiculo;
    }
	
	public function setidTrabajador($e_idtrabajador){
        $this->idTrabajador = $e_idtrabajador;
    }

	
    //Definir los métodos get: Obtener los valores de los atributos.
	
    public function getidServicio(){
        return $this->idServicio; //Retornar el valor del atributo id
    }

    public function getnombre(){
        return $this->nombre; //Retornar el valor del atributo nombre
    }
	
	public function getdescripcion(){
        return $this->descripcion; 
    }
	
	public function getfechainicio(){
        return $this->fechaInicio; 
    }
	
	public function getfechaFin(){
        return $this->fechaFin; 
    }
	
	public function getvalor(){
        return $this->valor;
    }
	
	public function getidCliente(){
        return $this->idCliente; 
    }
	
	public function getidVehiculo(){
        return $this->idVehiculo; 
    }
	
	public function getidTrabajador(){
        return $this->idTrabajador; 
    }
}

?>
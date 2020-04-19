<?php 
//Conexion a la BBDD
require "../config/Conexion.php";

Class Permiso{
	
	//Implemento constructor
	public function __construct(){

	}

	//Implemento metodo para listar los registros
	public function listar(){

		$sql="SELECT * FROM permiso";
		return ejecutarConsulta($sql);
	}
}

?>
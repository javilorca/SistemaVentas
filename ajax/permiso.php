<?php 
require_once "../modelos/Permiso.php";

$permiso=new Permiso();

switch ($_GET["op"]) {	
	
	case 'listar':
		$rspta=$permiso->listar();//llama a la funcion lista de ../modelos/permiso.php

		//Declaro array
		$data=Array();

		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>$reg->nombre
 				);
		}	
		$results=array(
			"sEcho"=>1, //Informacion para el datatables
			"iTotalRedords"=>count($data), //enviamos el total registros al datatable
			"iTotalDisplayRecord"=>count($data), //enviamos el total registros a visualizar
			"aaData"=>$data);
		echo json_encode(($results));
		
	break;		
	
}

 ?>
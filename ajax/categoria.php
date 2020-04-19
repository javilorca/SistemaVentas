<?php 
require_once "../modelos/Categoria.php";

$categoria=new Categoria();

//si existe, realiza la primera acción, si no, realiza lo que hay despues de los dos puntos (envia una cadena vacia)
$idcategoria=isset($_POST["idcategoria"])? limpiarCadena($_POST["idcategoria"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$descripcion=isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";

switch ($_GET["op"]) {
	case 'guardaryeditar':
		if(empty($idcategoria)){
			$rspta=$categoria->insertar($nombre, $descripcion);
			echo $rspta ? "Categoria registrada" : "Categoria no se pudo registrar";
		}
		else{
			$rspta=$categoria->editar($idcategoria, $nombre, $descripcion);
			echo $rspta ? "Categoria actualizada" : "Categoria no se pudo actualizar";
		}
		break;

	case 'desactivar':
		$rspta=$categoria->desactivar($idcategoria);
			echo $rspta ? "Categoria desactivada" : "Categoria no se pudo desactivada";
		break;

	case 'activar':
		$rspta=$categoria->activar($idcategoria);
			echo $rspta ? "Categoria activada" : "Categoria no se pudo activar";
		break;	

	case 'mostrar':
		$rspta=$categoria->mostrar($idcategoria);
		//Codificar el resutado utilizando _json
		echo json_encode($rspta);
		break;		
	
	case 'listar':
		$rspta=$categoria->listar();

		//Declaro array
		$data=Array();

		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idcategoria.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->idcategoria.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->idcategoria.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->idcategoria.')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg->nombre,
 				"2"=>$reg->descripcion,
 				"3"=>($reg->condicion)?'<span class="label bg-green">Activado</span>':
 				'<span class="label bg-red">Desactivado</span>'
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
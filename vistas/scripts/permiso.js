var tabla;

//Funcion que se ejecuta al inicio
function init(){
	mostrarform(false);
	listar();
}


//Funcion mostrar formulario
function mostrarform(flag){
	//limpiar();
	if(flag){
		$("#listadoregistros").hide();
		$("#formularioregistros").show();
		$("#btnGuardar").prop("disabled", false);
		$("#btnagregar").hide();
	}else{
		$("#listadoregistros").show();
		$("#formularioregistros").hide();
		$("#btnagregar").hide();
	}
}


//Funcion listar
function listar(){
	tabla=$('#tbllistado').dataTable({
		"aProcessing":true,//Activamos el procesamiento del datatables
		"aServerSide":true,//Paginacion y filtrados realizados por el servidor
		dom: 'Bfrtip',//Definimos los elementos del control de tabla
		buttons: [
					'copyHtml5',
					'excelHtml5',
					'csvHtml5',
					'pdf'
				 ],
		"ajax":{
			url: '../ajax/permiso.php?op=listar',
			type: "get",
			dataType: "json",
			error: function(e){
				console.log(e.responseText);
			}
		},
	"bDestroy": true,
	"iDisplayLength":5,//Paginacion de 5 en 5
	"order":[[ 0, "desc"]] //Ordeno de manera descendente

	}).DataTable();
}

init();
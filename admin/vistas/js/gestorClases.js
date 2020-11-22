/*=============================================
CARGAR LA TABLA DINÁMICA DE CLASES
=============================================*/
$(".tablaClases").DataTable({
	 "ajax": "ajax/tablaClases.ajax.php",
	 "deferRender": true,
	 "retrieve": true,
	 "processing": true/*,
	 "language": {
	 	"sProcessing":     "Procesando...",
		"sLengthMenu":     "Mostrar _MENU_ registros",
		"sZeroRecords":    "No se encontraron resultados",
		"sEmptyTable":     "Ningún dato disponible en esta tabla",
		"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
		"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
		"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
		"sInfoPostFix":    "",
		"sSearch":         "Buscar:",
		"sUrl":            "",
		"sInfoThousands":  ",",
		"sLoadingRecords": "Cargando...",
		"oPaginate": {
			"sFirst":    "Primero",
			"sLast":     "Último",
			"sNext":     "Siguiente",
			"sPrevious": "Anterior"
		},
		"oAria": {
				"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
		}
	 }*/
});
/*=============================================
ACTIVAR CLASE
=============================================*/
$(".tablaClases tbody").on("click", ".btnActivar", function(){
	var idClase = $(this).attr("idClase");
	var estadoClase = $(this).attr("estadoClase");
	var datos = new FormData();
 	datos.append("activarId", idClase);
  	datos.append("activarClase", estadoClase);
  	$.ajax({
  		 url:"ajax/clases.ajax.php",
  		 method: "POST",
	  	data: datos,
	  	cache: false,
      	contentType: false,
      	processData: false,
      	success: function(respuesta){ 
      	    // console.log("respuesta", respuesta);
      	} 	 
  	});
  	if(estadoClase == 0){
  		$(this).removeClass('btn-success');
  		$(this).addClass('btn-danger');
  		$(this).html('Disable');
  		$(this).attr('estadoClase',1);
  	}else{
  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-danger');
  		$(this).html('Enable');
  		$(this).attr('estadoClase',0);
  	}
});
  $(".fotoPrincipal").change(function() {
  	var Cual ="#modalEditarClase";
  	var imagen = this.files[0];
  	if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
  		swal({
  			title: "Error",
  			text: "¡JPG o PNG!",
  			type: "error",
  			confirmButtonText: "¡Close!"
  		});
  	} else {
  		SubirArchivo_FILE(imagen, function(rutaImagen) {
  			var Cual = "#modalEditarClase";
  			$(Cual + " .previsualizarPrincipal").attr("src", rutaImagen.replace('admin/', ''));
  			$(Cual + " .rutaImagenPortada").val(rutaImagen);
  			var IdArchivo = getNameFROM_FILE(rutaImagen);
  			$(Cual + " .idArchivoImagenPortada").val(IdArchivo);
  		});
  	}
  });
/*=============================================
EDITAR CLASE
=============================================*/
$(".tablaClases tbody").on("click", ".btnEditarClase", function(){
	var idClase = $(this).attr("idClase");
	var datos = new FormData();
	datos.append("idClase", idClase);
	$.ajax({
		url:"ajax/clases.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			$("#modalEditarClase .editarIdClase").val(respuesta["id"]);
			$("#modalEditarClase .tituloClase").val(respuesta["clase"]);
			$("#modalEditarClase .idArchivoImagenPortada").val(respuesta["idArchivoImagen"]);
  			$("#modalEditarClase .rutaImagenPortada").val(respuesta["rutaImagen"]);
  			var resRutaImagenPortada = respuesta["rutaImagen"] == "" ? "admin/vistas/img/productos/default/default.jpg" : respuesta["rutaImagen"];
  			$("#modalEditarClase .previsualizarPrincipal").attr("src", resRutaImagenPortada.replace('admin/', '') + "?" + parseInt(Math.random() * 10000));

		}
	});
});
/*=============================================
ELIMINAR CLASE
=============================================*/
$(".tablaClases tbody").on("click", ".btnEliminarClase", function(){
	var idClase = $(this).attr("idClase");
  	var imgOferta = $(this).attr("imgOferta");
  	var rutaCabecera = $(this).attr("rutaCabecera");
  	var imgPortada = $(this).attr("imgPortada");
  	swal({
    	title: 'Are you sure?',
    	text: "Can not reverse this action!",
    	type: 'warning',
    	showCancelButton: true,
    	confirmButtonColor: '#3085d6',
      	cancelButtonColor: '#d33',
      	cancelButtonText: 'Cancelar',
      	confirmButtonText: 'Yes, delete!'
	 }).then(function(result){
    	if(result.value){
      	window.location = "index.php?ruta=clases&idClase="+idClase+"&imgOferta="+imgOferta+"&rutaCabecera="+rutaCabecera+"&imgPortada="+imgPortada;
    	}
  	})
})
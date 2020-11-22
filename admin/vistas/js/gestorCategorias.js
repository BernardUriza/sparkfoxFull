/*=============================================
CARGAR LA TABLA DINÁMICA DE CATEGORÍAS
=============================================*/
// $.ajax({
// 	url:"ajax/tablaCategorias.ajax.php",
// 	success:function(respuesta){
// 		console.log("respuesta", respuesta);
// 	}
// })
$(".tablaCategorias").DataTable({
	 "ajax": "ajax/tablaCategorias.ajax.php",
	 "deferRender": true,
	 "retrieve": true,
	 "processing": true,
	 /*"language": {
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
SUBIENDO LA FOTO PRINCIPAL
=============================================*/
var imagenFotoPrincipal = null;
$(".fotoPrincipal").change(function() {
	var Cual = $('#modalEditarCategoria').hasClass('in') ? "#modalEditarCategoria" : "#modalAgregarCategoria";
	var imagen = this.files[0];
	if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
		$(Cual + " .previsualizarPrincipal").attr('src', 'vistas/img/productos/default/default.jpg');
		$(Cual + " .fotoPrincipal").val("");
		swal({
			title: "Error uploading",
			text: "Must be JPG o PNG!",
			type: "error",
			confirmButtonText: "Close!"
		});
	} 
	else {
		SubirArchivo_FILE(imagen, function(rutaImagen) {
			var Cual = $('#modalEditarCategoria').hasClass('in') ? "#modalEditarCategoria" : "#modalAgregarCategoria";
			$(Cual + " .previsualizarPrincipal").attr("src", rutaImagen.replace('admin/', ''));
			$(Cual + " .rutaImagenPortada").val(rutaImagen);
			var IdArchivo = getNameFROM_FILE(rutaImagen);
			$(Cual + " .idArchivoImagenPortada").val(IdArchivo);
		});
	}
});
/*=============================================
SUBIENDO LA FOTO PRINCIPAL
=============================================*/
var imagenFotoFondo = null;
$(".fotoFondo").change(function() {
	var Cual = $('#modalEditarCategoria').hasClass('in') ? "#modalEditarCategoria" : "#modalAgregarCategoria";
	var imagen = this.files[0];
	if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
		$(Cual + " .previsualizarFondo").attr('src', 'vistas/img/productos/default/default.jpg');
		$(Cual + " .fotoPrincipal").val("");
		swal({
			title: "Error uploading",
			text: "Must be JPG o PNG!",
			type: "error",
			confirmButtonText: "Close!"
		});
	} 
	else {
		SubirArchivo_FILE(imagen, function(rutaImagen) {
			var Cual = $('#modalEditarCategoria').hasClass('in') ? "#modalEditarCategoria" : "#modalAgregarCategoria";
			$(Cual + " .previsualizarFondo").attr("src", rutaImagen.replace('admin/', ''));
			$(Cual + " .rutaImagenFondo").val(rutaImagen);
			var IdArchivo = getNameFROM_FILE(rutaImagen);
			$(Cual + " .idArchivoImagenFondo").val(IdArchivo);
		});
	}
});
/*=============================================
ACTIVAR CATEGORÍA
=============================================*/
$(".tablaCategorias tbody").on("click", ".btnActivar", function(){
	var idCategoria = $(this).attr("idCategoria");
	var estadoCategoria = $(this).attr("estadoCategoria");
	var datos = new FormData();
 	datos.append("activarId", idCategoria);
  	datos.append("activarCategoria", estadoCategoria);
  	$.ajax({
  		 url:"ajax/categorias.ajax.php",
  		 method: "POST",
	  	data: datos,
	  	cache: false,
      	contentType: false,
      	processData: false,
      	success: function(respuesta){ 
      	    // console.log("respuesta", respuesta);
      	} 	 
  	});
  	if(estadoCategoria == 0){
  		$(this).removeClass('btn-success');
  		$(this).addClass('btn-danger');
  		$(this).html('Disable');
  		$(this).attr('estadoCategoria',1);
  	}else{
  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-danger');
  		$(this).html('Enable');
  		$(this).attr('estadoCategoria',0);
  	}
})
/*=============================================
EDITAR CATEGORÍA
=============================================*/
$(".tablaCategorias tbody").on("click", ".btnEditarCategoria", function(){
	var idCategoria = $(this).attr("idCategoria");
	var datos = new FormData();
	datos.append("idCategoria", idCategoria);
	$.ajax({
		url:"ajax/categorias.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			$("#modalEditarCategoria .editarIdCategoria").val(respuesta["id"]);
			$("#modalEditarCategoria .tituloCategoria").val(respuesta["categoria"]);
			$("#modalEditarCategoria .serviciosTexto").val(respuesta["serviciosTexto"]);
			$("#modalEditarCategoria .productosTexto").val(respuesta["productosTexto"]);
			/*=============================================
			CARGAMOS LA IMAGEN PRINCIPAL
			=============================================*/
			$("#modalEditarCategoria .idArchivoImagenPortada").val(respuesta["idArchivoImagenPortada"]);
			$("#modalEditarCategoria .rutaImagenPortada").val(respuesta["rutaImagenPortada"]);
			$("#modalEditarCategoria .idArchivoImagenFondo").val(respuesta["idArchivoImagenFondo"]);
			$("#modalEditarCategoria .rutaImagenFondo").val(respuesta["rutaImagenFondo"]);

			var resRutaImagenPortada = respuesta["rutaImagenPortada"] == "" ? "admin/vistas/img/productos/default/default.jpg" : respuesta["rutaImagenPortada"];
			$("#modalEditarCategoria .previsualizarPrincipal").attr("src", resRutaImagenPortada.replace('admin/', '') + "?" + parseInt(Math.random() * 10000));
		
			var resRutaImagenFondo = respuesta["rutaImagenFondo"] == "" ? "admin/vistas/img/productos/default/default.jpg" : respuesta["rutaImagenFondo"];
			$("#modalEditarCategoria .previsualizarFondo").attr("src", resRutaImagenFondo.replace('admin/', '') + "?" + parseInt(Math.random() * 10000));
		
		}
	})
})
/*=============================================
ELIMINAR CATEGORIA
=============================================*/
$(".tablaCategorias tbody").on("click", ".btnEliminarCategoria", function(){
	var idCategoria = $(this).attr("idCategoria");
  	var imgOferta = $(this).attr("imgOferta");
  	var rutaCabecera = $(this).attr("rutaCabecera");
  	var imgPortada = $(this).attr("imgPortada");
  	swal({
    	title: 'Are you sure?',
    	text: "Can´t reverse this action!",
    	type: 'warning',
    	showCancelButton: true,
    	confirmButtonColor: '#3085d6',
      	cancelButtonColor: '#d33',
      	cancelButtonText: 'Cancelar',
      	confirmButtonText: 'Yes, delete!'
	 }).then(function(result){
    	if(result.value){
      	window.location = "index.php?ruta=categorias&idCategoria="+idCategoria+"&imgOferta="+imgOferta+"&rutaCabecera="+rutaCabecera+"&imgPortada="+imgPortada;
    	}
  	})
})
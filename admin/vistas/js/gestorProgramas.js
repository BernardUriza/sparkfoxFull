/*=============================================
CARGAR LA TABLA DINÁMICA DE PROGRAMAS
=============================================*/
function CargarTabla() {
return $(".tablaProgramas").DataTable({
	 "ajax": "ajax/tablaProgramas.ajax.php",
	 "deferRender": true,
	 "retrieve": true,
	 "processing": true,
	 "order": [[ 0, "desc" ]]/*,
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
}
function DeshabilitarClientePrograma(ignorar,argument) {
	$('.guardarCambiosPrograma, .guardarPrograma').prop('disabled', argument);
	 $('body').toggleClass('loading');
}
var TablaPrincipalPrograma=CargarTabla();
/*=============================================
GUARDAR CAMBIOS DE LA PROGRAMA 
=============================================*/
$(".guardarCambiosPrograma").click(function() {
	DeshabilitarClientePrograma('disabled', true);
	setTimeout(function() {
		var idPrograma = $("#modalEditarPrograma .editarIdPrograma").val();
		var rutaImagenPortada = $("#modalEditarPrograma .rutaImagen").val();
		var tituloPrograma = $("#modalEditarPrograma .tituloPrograma").val();
		var tituloDescriptivo = $("#modalEditarPrograma .tituloDescriptivo").val();
		
		var datosProducto = new FormData();
		datosProducto.append("editarIdPrograma", idPrograma);
		datosProducto.append("editarTituloPrograma", tituloPrograma);
		datosProducto.append("tituloDescriptivo", tituloDescriptivo);
		datosProducto.append("rutaImagen", rutaImagenPortada);
		$.ajax({
			url: "ajax/programas.ajax.php",
			method: "POST",
			data: datosProducto,
			cache: false,
			contentType: false,
			processData: false,
			success: function(respuesta) {
					eval(respuesta.replace('<script>', '').replace('</script>', ''));
			}
		});
	}, 1000);
});
/*=============================================
AGREGAR PROGRAMA 
=============================================*/
$(".guardarPrograma").click(function() {
	DeshabilitarClientePrograma('disabled', true);
	setTimeout(function() {
		var tituloPrograma = $("#modalAgregarPrograma .tituloPrograma").val();
		var rutaImagenPortada = $("#modalAgregarPrograma .rutaImagenPortada").val();
		var datosProducto = new FormData();
		datosProducto.append("tituloPrograma", tituloPrograma);
		datosProducto.append("rutaImagen", "");
		$.ajax({
			url: "ajax/programas.ajax.php",
			method: "POST",
			data: datosProducto,
			cache: false,
			contentType: false,
			processData: false,
			success: function(respuesta) {
					eval(respuesta.replace('<script>', '').replace('</script>', ''));
			}
		});
	}, 1000);
});
/*=============================================
ELIMINAR Programa
=============================================*/
$(".tablaProgramas tbody").on("click", ".btnEliminarPrograma", function(){
			var idPrograma = $(this).attr("idprograma");
  	swal({
    	title: 'Are you sure you want to delete?',
    	text: "Cancel if you are not sure.",
    	type: 'warning',
    	showCancelButton: true,
    	confirmButtonColor: '#3085d6',
      	cancelButtonColor: '#d33',
      	cancelButtonText: 'Cancel',
      	confirmButtonText: 'Yes, delete!'
	 }).then(function(result){
    	if(result.value){
			var datosProducto = new FormData();
			datosProducto.append("idBorrar", idPrograma);
			datosProducto.append("idPrograma", idPrograma);
			$.ajax({
				url: "ajax/programas.ajax.php",
				method: "POST",
				data: datosProducto,
				cache: false,
				contentType: false,
				processData: false,
				success: function(respuesta) {
						eval(respuesta.replace('<script>', '').replace('</script>', ''));
				}
			});
    	}
  	})
});

/*=============================================
SUBIENDO LA FOTO PRINCIPAL
=============================================*/
var imagenFotoPrincipal = null;
$(".fotoPrincipal").change(function() {
	var Cual = $('#modalEditarPrograma').hasClass('in') ? "#modalEditarPrograma" : "#modalAgregarPrograma";
	var imagen = this.files[0];
	if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
		$(Cual + " .previsualizarPrincipal").attr('src', 'vistas/img/productos/default/default.jpg');
		$(Cual + " .fotoPrincipal").val("");
		swal({
			title: "Error al subir la imagen",
			text: "¡La imagen debe estar en formato JPG o PNG!",
			type: "error",
			confirmButtonText: "¡Cerrar!"
		});
	} else {
	SubirArchivo_FILE(imagen, function(rutaImagen) {
		var Cual = $('#modalEditarPrograma').hasClass('in') ? "#modalEditarPrograma" : "#modalAgregarPrograma";
		$(Cual + " .previsualizarPrincipal").attr("src", rutaImagen.replace('admin/', ''));
		$(Cual + " .rutaImagen").val(rutaImagen);
		var IdArchivo = getNameFROM_FILE(rutaImagen);
		$(Cual + " .idArchivoImagen").val(IdArchivo);
	});
	}
});
/*=============================================
ACTIVAR PROGRAMA
=============================================*/
$(".tablaProgramas tbody").on("click", ".btnActivar", function(){
	var idPrograma = $(this).attr("idPrograma");
	var estadoPrograma = $(this).attr("estadoPrograma");
	var datos = new FormData();
 	datos.append("activarId", idPrograma);
  	datos.append("activarPrograma", estadoPrograma);
  	$.ajax({
  		 url:"ajax/programas.ajax.php",
  		 method: "POST",
	  	data: datos,
	  	cache: false,
      	contentType: false,
      	processData: false,
      	success: function(respuesta){ 
      	    // console.log("respuesta", respuesta);
      	} 	 
  	});
  	if(estadoPrograma == 0){
  		$(this).removeClass('btn-success');
  		$(this).addClass('btn-danger');
  		$(this).html('Disabled');
  		$(this).attr('estadoPrograma',1);
  	}else{
  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-danger');
  		$(this).html('Enabled');
  		$(this).attr('estadoPrograma',0);
  	}
})
/*=============================================
EDITAR PROGRAMA
=============================================*/
$(".tablaProgramas tbody").on("click", ".btnEditarPrograma", function(){
	var idPrograma = $(this).attr("idPrograma");
	var datos = new FormData();
	datos.append("idPrograma", idPrograma);
	$.ajax({
		url:"ajax/programas.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			console.log("respuesta", respuesta);
			$("#modalEditarPrograma .editarIdPrograma").val(respuesta["id"]);
			$("#modalEditarPrograma .tituloPrograma").val(respuesta["titulo"]);
			$("#modalEditarPrograma .tituloDescriptivo").val(respuesta["idYoutube"]);
			/*=============================================
			CARGAMOS LA IMAGEN PRINCIPAL
			=============================================*/
			var resRutaImagenPortada = respuesta["rutaImagen"] == undefined || respuesta["rutaImagen"] == "" ? "admin/vistas/img/productos/default/default.jpg" : respuesta["rutaImagen"];
			$("#modalEditarPrograma .previsualizarPrincipal").attr("src", resRutaImagenPortada.replace('admin/', '') + "?" + parseInt(Math.random() * 10000));
			$("#modalEditarPrograma .rutaImagen").val(respuesta["rutaImagen"]);
		}
	})
})
function ProgramaEditadaCorrectamente() {
	$(".tablaProgramas").fadeOut("slow");
	swal({
	  type: "success",
		title: "The product has  been saved",
	  showConfirmButton: true,
	  confirmButtonText: "Cerrar"
	  }).then(function(result){
		if (result.value) {
			TablaPrincipalPrograma.ajax.reload(function() {
				setTimeout(function() {
					$(".tablaProgramas").fadeIn( "slow", function() {
				 		$('#modalEditarPrograma').modal('toggle');
						document.getElementById("EditarFORM_ID").reset();
						$('.previsualizarPortada').attr('src', 'vistas/img/cabeceras/default/default.jpg');
						imagenEditar="";
						DeshabilitarClientePrograma('disabled', false);
	  				});
				},700);
			});
		}
	});
}
function ProgramaNOEditadaCorrectamente() {
	swal({
		  type: "error",
		title: "Not empty, not special chars!",
		  showConfirmButton: true,
		  confirmButtonText: "Cerrar"
		  }).then(function(result){
			if (result.value) {
				DeshabilitarClientePrograma('disabled', false);
			}
		});
}
function ProgramaCreadaCorrectamente() {
	$(".tablaProgramas").fadeOut("slow");
	swal({
	  type: "success",
		title: "The product has  been saved",
	  showConfirmButton: true,
	  confirmButtonText: "Cerrar"
	  }).then(function(result){
		if (result.value) {
			TablaPrincipalPrograma.ajax.reload(function() {
				setTimeout(function() {
					$(".tablaProgramas").fadeIn( "slow", function() {
				 		$('#modalAgregarPrograma').modal('toggle');
						document.getElementById("AgregarFORM_ID").reset();
						$('.previsualizarPortada').attr('src', 'vistas/img/cabeceras/default/default.jpg');
						imagenEditar="";
						DeshabilitarClientePrograma('disabled', false);
	  				});
				},700);
			});
		}
	});
}
function ProgramaNOCreadaCorrectamente() {
	swal({
		  type: "error",
		title: "Not empty, not special chars!",
		  showConfirmButton: true,
		  confirmButtonText: "Cerrar"
		  }).then(function(result){
			if (result.value) {
				DeshabilitarClientePrograma('disabled', false);
			}
		});
}
function ProgramaBorradaCorrectamente() {
	$(".tablaProgramas").fadeOut("slow");
	swal({
	  type: "success",
	  title: "Success erasing!",
	  showConfirmButton: true,
	  confirmButtonText: "Cerrar"
	  }).then(function(result){
				if (result.value) {
				TablaPrincipalPrograma.ajax.reload(function() {
					setTimeout(function() {
						$(".tablaProgramas").fadeIn( "slow", function() {
		  				});
					},70);
				});
			}
		});
}
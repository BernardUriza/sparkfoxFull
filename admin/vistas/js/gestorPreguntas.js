/*=============================================
CARGAR LA TABLA DINÁMICA DE PREGUNTAS
=============================================*/
function CargarTabla() {
return $(".tablaPreguntas").DataTable({
	 "ajax": "ajax/tablaPreguntas.ajax.php",
	 "deferRender": true,
	 "retrieve": true,
	 "processing": true,
	 "order": [[ 0, "desc" ]]
});
}
function DeshabilitarClientePregunta(ignorar,argument) {
	$('.guardarCambiosPregunta, .guardarPregunta').prop('disabled', argument);
	 $('body').toggleClass('loading');
}
var TablaPrincipalPregunta=CargarTabla();

/*=============================================
SUBIENDO LA FOTO PRINCIPAL
=============================================*/
var imagenFotoPrincipal = null;
$(".fotoPrincipal").change(function() {
	var Cual = $('#modalEditarPregunta').hasClass('in') ? "#modalEditarPregunta" : "#modalAgregarPregunta";
	var imagen = this.files[0];
	if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
		$(Cual + " .previsualizarPrincipal").attr('src', 'vistas/img/productos/default/default.jpg');
		$(Cual + " .fotoPrincipal").val("");
		swal({
			title: "Error al subir la imagen",
			text: "¡La imagen debe estar en formato JPG o PNG!",
			type: "error",
			confirmButtonText: "¡Close!"
		});
	} else {
		var fr = new FileReader();
		fr.onload = function(e) {
			var imgNoCrop = new Image();
			imgNoCrop.src = e.target.result;
			var c = document.createElement('canvas');
			var d = new Date();
			var idCanvas = "CursorLayer" + d.getTime();
			c.id = idCanvas;
			c.style.visibility = 'hidden';
			c.style.display = 'none';
			c.style.width = '100%';
			c.style.height = '100%';
			var body = document.getElementsByTagName("body")[0];
			body.appendChild(c);
			cursorLayer = document.getElementById(idCanvas);
			imgNoCrop.onload = function() {
				var ctx = c.getContext("2d");
				var width = this.width;
				var height = this.height;
				var dim = Math.max(width, height);
				c.width = dim;
				c.height = dim;
				ctx.drawImage(this, 0, 0, width, height, (dim - width) / 2, (dim - height) / 2, width, height);
				var dataURL = c.toDataURL();
				var blobBin = atob(dataURL.split(',')[1]);
				var array = [];
				for (var i = 0; i < blobBin.length; i++) {
					array.push(blobBin.charCodeAt(i));
				}
				var file = new Blob([new Uint8Array(array)], {
					type: 'image/png'
				});
				console.log(file);
				SubirArchivo_FILE(file, function(rutaImagen) {
					var Cual = $('#modalEditarPregunta').hasClass('in') ? "#modalEditarPregunta" : "#modalAgregarPregunta";
					$(Cual + " .previsualizarPrincipal").attr("src", rutaImagen.replace('admin/', ''));
					$(Cual + " .rutaImagenPortada").val(rutaImagen);
					var IdArchivo = getNameFROM_FILE(rutaImagen);
					$(Cual + " .idArchivoImagenPortada").val(IdArchivo);
				});
			};
		};
		fr.readAsDataURL(imagen);
	}
});
/*=============================================
GUARDAR CAMBIOS DE LA PREGUNTA 
=============================================*/
$(".guardarCambiosPregunta").click(function() {
	DeshabilitarClientePregunta('disabled', true);
	setTimeout(function() {
		var idPregunta = $("#modalEditarPregunta .editarIdPregunta").val();
		var tituloPregunta = $("#modalEditarPregunta .tituloPregunta").val();
		var respuestaPregunta = $("#modalEditarPregunta .respuestaPregunta").val();
		var seleccionarCountry = $("#modalEditarPregunta .seleccionarCountry").val();
		var rutaImagenPortada = $("#modalEditarPregunta .rutaImagenPortada").val();

		var datosProducto = new FormData();
		datosProducto.append("editarIdPregunta", idPregunta);
		datosProducto.append("seleccionarCountry", seleccionarCountry);
		datosProducto.append("editarTituloPregunta", tituloPregunta);
		datosProducto.append("rutaImagenPortada", rutaImagenPortada);
		datosProducto.append("respuestaPregunta", respuestaPregunta);

		$.ajax({
			url: "ajax/preguntas.ajax.php",
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
AGREGAR PREGUNTA 
=============================================*/
$(".guardarPregunta").click(function() {
	DeshabilitarClientePregunta('disabled', true);
	setTimeout(function() {
		var tituloPregunta = $("#modalAgregarPregunta .tituloPregunta").val();
		var respuestaPregunta = $("#modalAgregarPregunta .respuestaPregunta").val();
		var datosProducto = new FormData();
		datosProducto.append("tituloPregunta", tituloPregunta);
		datosProducto.append("respuestaPregunta", respuestaPregunta);
		$.ajax({
			url: "ajax/preguntas.ajax.php",
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
ELIMINAR Pregunta
=============================================*/
$(".tablaPreguntas tbody").on("click", ".btnEliminarPregunta", function(){
			var idPregunta = $(this).attr("idpregunta");
  	swal({
    	title: 'Are you sure you want to delete the store?',
    	text: "If it is not, you can cancel the action!",
    	type: 'warning',
    	showCancelButton: true,
    	confirmButtonColor: '#3085d6',
      	cancelButtonColor: '#d33',
      	cancelButtonText: 'Cancel',
      	confirmButtonText: 'Yes, delete store!'
	 }).then(function(result){
    	if(result.value){
			var datosProducto = new FormData();
			datosProducto.append("idBorrar", idPregunta);
			datosProducto.append("idPregunta", idPregunta);
			$.ajax({
				url: "ajax/preguntas.ajax.php",
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
ACTIVAR PREGUNTA
=============================================*/
$(".tablaPreguntas tbody").on("click", ".btnActivar", function(){
	var idPregunta = $(this).attr("idPregunta");
	var estadoPregunta = $(this).attr("estadoPregunta");
	var datos = new FormData();
 	datos.append("activarId", idPregunta);
  	datos.append("activarPregunta", estadoPregunta);
  	$.ajax({
  		 url:"ajax/preguntas.ajax.php",
  		 method: "POST",
	  	data: datos,
	  	cache: false,
      	contentType: false,
      	processData: false,
      	success: function(respuesta){ 
      	} 	 
  	});
  	if(estadoPregunta == 0){
  		$(this).removeClass('btn-success');
  		$(this).addClass('btn-danger');
  		$(this).html('Disabled');
  		$(this).attr('estadoPregunta',1);
  	}else{
  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-danger');
  		$(this).html('Enable');
  		$(this).attr('estadoPregunta',0);
  	}
})
/*============================================
REVISAR SI LA PREGUNTA YA EXISTE
=============================================*/
$(".validarPregunta").change(function(){
	$(".alert").remove();
	var Pregunta = $(this).val();
	var datos = new FormData();
	datos.append("validarPregunta", Pregunta);
	$.ajax({
	    url:"ajax/preguntas.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	    success:function(respuesta){
	    	if(respuesta){
	    		$(".validarPregunta").parent().after('<div class="alert alert-warning">Este pregunta ya existe en la base de datos</div>')
	    		$(".validarPregunta").val("");
	    	}   
	    }
	  })
});

/*=============================================
EDITAR PREGUNTA
=============================================*/

$(".tablaPreguntas tbody").on("click", ".btnEditarPregunta", function(){
	var idPregunta = $(this).attr("idPregunta");
	var datos = new FormData();
	datos.append("idPregunta", idPregunta);
	$.ajax({
		url:"ajax/preguntas.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			$("#modalEditarPregunta .editarIdPregunta").val(respuesta["id"]);
			$("#modalEditarPregunta .tituloPregunta").val(respuesta["pregunta"]);
			$("#modalEditarPregunta .respuestaPregunta").val(respuesta["respuesta"]);
			$("#modalEditarPregunta .seleccionarCountry").val(respuesta["idPais"]);
			$("#modalEditarPregunta .rutaImagenPortada").val(respuesta["rutaImagenPortada"]);		
			var resRutaImagenPortada = respuesta["rutaImagenPortada"] == "" ? "admin/vistas/img/productos/default/default.jpg" : respuesta["rutaImagenPortada"];
			$("#modalEditarPregunta .previsualizarPrincipal").attr("src", resRutaImagenPortada.replace('admin/', '') + "?" + parseInt(Math.random() * 10000));
		
		}
	});
});


function PreguntaEditadaCorrectamente() {
	$(".tablaPreguntas").fadeOut("slow");
	swal({
	  type: "success",
	  title: "It has been changed correctly",
	  showConfirmButton: true,
	  confirmButtonText: "Close"
	  }).then(function(result){
		if (result.value) {
			TablaPrincipalPregunta.ajax.reload(function() {
				setTimeout(function() {
					$(".tablaPreguntas").fadeIn( "slow", function() {
				 		$('#modalEditarPregunta').modal('toggle');
						document.getElementById("EditarFORM_ID").reset();
						DeshabilitarClientePregunta('disabled', false);
	  				});
				},700);
			});
		}
	});
}
function PreguntaNOEditadaCorrectamente() {

		swal({
		  type: "error",
		 title: "It can not go empty!",
		  showConfirmButton: true,
		  confirmButtonText: "Close"
		  }).then(function(result){
			if (result.value) {
				DeshabilitarClientePregunta('disabled', false);
			}
		});
}
function PreguntaCreadaCorrectamente() {
	$(".tablaPreguntas").fadeOut("slow");
	swal({
	  type: "success",
	  title: "It has been created correctly",
	  showConfirmButton: true,
	  confirmButtonText: "Close"
	  }).then(function(result){
		if (result.value) {
			TablaPrincipalPregunta.ajax.reload(function() {
				setTimeout(function() {
					$(".tablaPreguntas").fadeIn( "slow", function() {
				 		$('#modalAgregarPregunta').modal('toggle');
						document.getElementById("AgregarFORM_ID").reset();
						DeshabilitarClientePregunta('disabled', false);
	  				});
				},700);
			});
		}
	});
}
function PreguntaNOCreadaCorrectamente() {
	swal({
		  type: "error",
		  title: "It can not go empty!",
		  showConfirmButton: true,
		  confirmButtonText: "Close"
		  }).then(function(result){
			if (result.value) {
				DeshabilitarClientePregunta('disabled', false);
			}
		});
}
function PreguntaBorradaCorrectamente() {
	$(".tablaPreguntas").fadeOut("slow");
	swal({
	  type: "success",
	  title: "It has been removed correctly",
	  showConfirmButton: true,
	  confirmButtonText: "Close"
	  }).then(function(result){
				if (result.value) {
				TablaPrincipalPregunta.ajax.reload(function() {
					setTimeout(function() {
						$(".tablaPreguntas").fadeIn( "slow", function() {
		  				});
					},70);
				});
			}
		});
}
/*=============================================
CARGAR LA TABLA DINÁMICA DE MARCAS
=============================================*/
function CargarTabla() {
return $(".tablaMarcas").DataTable({
	 "ajax": "ajax/tablaMarcas.ajax.php",
	 "deferRender": true,
	 "retrieve": true,
	 "processing": true,
	 "order": [[ 0, "desc" ]],
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

	 }


});
}
function DeshabilitarClienteMarca(ignorar,argument) {
	$('.guardarCambiosMarca, .guardarMarca').prop('disabled', argument);
	 $('body').toggleClass('loading');
}
var TablaPrincipalMarca=CargarTabla();
/*=============================================
GUARDAR CAMBIOS DE LA MARCA 
=============================================*/
$(".guardarCambiosMarca").click(function() {
	DeshabilitarClienteMarca('disabled', true);
	setTimeout(function() {
		var idMarca = $("#modalEditarMarca .editarIdMarca").val();
		var tituloMarca = $("#modalEditarMarca .tituloMarca").val();
		var rutaMarca = $("#modalEditarMarca .rutaMarca").val();
		var antiguaFotoPortada = $("#modalEditarMarca .antiguaFotoPortada").val();
		var idCabecera = $("#modalEditarMarca .editarIdCabecera").val();

		var datosProducto = new FormData();
		datosProducto.append("editarIdMarca", idMarca);
		datosProducto.append("editarTituloMarca", tituloMarca);
		datosProducto.append("rutaMarca", rutaMarca);
		datosProducto.append("antiguaFotoPortada", antiguaFotoPortada);
		datosProducto.append("fotoPortada", imagenEditar);
		datosProducto.append("editarIdCabecera", idCabecera);

		$.ajax({
			url: "ajax/marcas.ajax.php",
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
AGREGAR MARCA 
=============================================*/
$(".guardarMarca").click(function() {
	DeshabilitarClienteMarca('disabled', true);
	setTimeout(function() {
		var tituloMarca = $("#modalAgregarMarca .tituloMarca").val();
		var rutaMarca = $("#modalAgregarMarca .rutaMarca").val();
		var idCabecera = $("#modalAgregarMarca .editarIdCabecera").val();

		var datosProducto = new FormData();
		datosProducto.append("tituloMarca", tituloMarca);
		datosProducto.append("rutaMarca", rutaMarca);
		datosProducto.append("fotoPortada", imagenEditar);
		datosProducto.append("editarIdCabecera", idCabecera);

		$.ajax({
			url: "ajax/marcas.ajax.php",
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
ELIMINAR Marca
=============================================*/
$(".tablaMarcas tbody").on("click", ".btnEliminarMarca", function(){
			var idMarca = $(this).attr("idmarca");
		  	var imgOferta = $(this).attr("imgOferta");
		  	var rutaCabecera = $(this).attr("rutaCabecera");
		  	var imgPortada = $(this).attr("imgPortada");
  	swal({
    	title: '¿Está seguro de borrar el marca?',
    	text: "¡Si no lo está puede cancelar la accíón!",
    	type: 'warning',
    	showCancelButton: true,
    	confirmButtonColor: '#3085d6',
      	cancelButtonColor: '#d33',
      	cancelButtonText: 'Cancelar',
      	confirmButtonText: 'Si, borrar marca!'
	 }).then(function(result){
    	if(result.value){
			var datosProducto = new FormData();
			datosProducto.append("idBorrar", idMarca);
			datosProducto.append("idMarca", idMarca);
			datosProducto.append("imgOferta", imgOferta);
			datosProducto.append("rutaCabecera", rutaCabecera);
			datosProducto.append("imgPortada", imgPortada);
			$.ajax({
				url: "ajax/marcas.ajax.php",
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
ACTIVAR MARCA
=============================================*/

$(".tablaMarcas tbody").on("click", ".btnActivar", function(){

	var idMarca = $(this).attr("idMarca");
	var estadoMarca = $(this).attr("estadoMarca");

	var datos = new FormData();
 	datos.append("activarId", idMarca);
  	datos.append("activarMarca", estadoMarca);

  	$.ajax({

  		 url:"ajax/marcas.ajax.php",
  		 method: "POST",
	  	data: datos,
	  	cache: false,
      	contentType: false,
      	processData: false,
      	success: function(respuesta){ 
      	    
      	    // console.log("respuesta", respuesta);

      	} 	 

  	});

  	if(estadoMarca == 0){

  		$(this).removeClass('btn-success');
  		$(this).addClass('btn-danger');
  		$(this).html('Desactivado');
  		$(this).attr('estadoMarca',1);
  	
  	}else{

  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-danger');
  		$(this).html('Activado');
  		$(this).attr('estadoMarca',0);

  	}

})

/*=============================================
REVISAR SI LA MARCA YA EXISTE
=============================================*/

$(".validarMarca").change(function(){

	$(".alert").remove();

	var Marca = $(this).val();
	// console.log("Marca", Marca);

	var datos = new FormData();
	datos.append("validarMarca", Marca);

	$.ajax({
	    url:"ajax/marcas.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	    success:function(respuesta){
	    	
	    	// console.log("respuesta", respuesta);

	    	if(respuesta){

	    		$(".validarMarca").parent().after('<div class="alert alert-warning">Este marca ya existe en la base de datos</div>')
	    		$(".validarMarca").val("");
	    	}   

	    }

	  })
});


/*=============================================
RUTA MARCA
=============================================*/

function limpiarUrl(texto){

	var texto = texto.toLowerCase();
	texto = texto.replace(/[á]/, 'a');
	texto = texto.replace(/[é]/, 'e');
	texto = texto.replace(/[í]/, 'i');
	texto = texto.replace(/[ó]/, 'o');
	texto = texto.replace(/[ú]/, 'u');
	texto = texto.replace(/[ñ]/, 'n');
	texto = texto.replace(/ /g, '-');
	return texto;

}


$(".tituloMarca").change(function(){

	$(".rutaMarca").val(

		limpiarUrl($(".tituloMarca").val())

	);

})

/*=============================================
SUBIENDO LA FOTO DE PORTADA
=============================================*/
var rutaImagen,imagenEditar;
$(".fotoPortada").change(function(){

	var imagen = this.files[0];
	imagenEditar=imagen;
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/
  	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

		$(".fotoPortada").val("");

		swal({
	      title: "Error al subir la imagen",
	      text: "¡La imagen debe estar en formato JPG o PNG!",
	      type: "error",
	      confirmButtonText: "¡Cerrar!"
	    });

		return;

  	}else if(imagen["size"] > 2000000){

  		$(".fotoPortada").val("");

		swal({
	      title: "Error al subir la imagen",
	      text: "¡La imagen no debe pesar más de 2MB!",
	      type: "error",
	      confirmButtonText: "¡Cerrar!"
	    });

		return;

  	}else{

  		var datosImagen = new FileReader;
  		datosImagen.readAsDataURL(imagen);

  		$(datosImagen).on("load", function(event){
		
  			 rutaImagen = event.target.result;

  			$(".previsualizarPortada").attr("src", rutaImagen);

		})
  	}

})

/*=============================================
ACTIVAR OFERTA
=============================================*/

function activarOferta(evento){

	if(evento == "oferta"){

		$(".datosOferta").show();
		$(".valorOferta").prop("required",true);
		$(".valorOferta").val("");

	}else{

		$(".datosOferta").hide();
		$(".valorOferta").prop("required",false);
		$(".valorOferta").val("");

	}

}

$(".selActivarOferta").change(function(){

	activarOferta($(this).val());

})

/*=============================================
VALOR OFERTA
=============================================*/
$(".valorOferta").change(function(){

	if($(this).attr("id") == "precioOferta"){

		$("#precioOferta").prop("readonly",true);
		$("#descuentoOferta").prop("readonly",false);
		$("#descuentoOferta").val(0);

	}

	if($(this).attr("id") == "descuentoOferta"){

		$("#descuentoOferta").prop("readonly",true);
		$("#precioOferta").prop("readonly",false);
		$("#precioOferta").val(0);

	}


})

/*=============================================
SUBIENDO LA FOTO DE PORTADA
=============================================*/

$(".fotoOferta").change(function(){

	var imagen = this.files[0];

	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/
  	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

		$(".fotoOferta").val("");

		swal({
	      title: "Error al subir la imagen",
	      text: "¡La imagen debe estar en formato JPG o PNG!",
	      type: "error",
	      confirmButtonText: "¡Cerrar!"
	    });

		return;

  	}else if(imagen["size"] > 2000000){

  		$(".fotoOferta").val("");

		swal({
	      title: "Error al subir la imagen",
	      text: "¡La imagen no debe pesar más de 2MB!",
	      type: "error",
	      confirmButtonText: "¡Cerrar!"
	    });

		return;

  	}else{

  		var datosImagen = new FileReader;
  		datosImagen.readAsDataURL(imagen);

  		$(datosImagen).on("load", function(event){
		
  			var rutaImagen = event.target.result;

  			$(".previsualizarOferta").attr("src", rutaImagen);

		})
  	}

})


/*=============================================
EDITAR MARCA
=============================================*/

$(".tablaMarcas tbody").on("click", ".btnEditarMarca", function(){

	var idMarca = $(this).attr("idMarca");

	var datos = new FormData();
	datos.append("idMarca", idMarca);

	$.ajax({

		url:"ajax/marcas.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

			$("#modalEditarMarca .editarIdMarca").val(respuesta["id"]);
			$("#modalEditarMarca .tituloMarca").val(respuesta["marca"]);
			$("#modalEditarMarca .rutaMarca").val(respuesta["ruta"]);

			/*=============================================
			EDITAR NOMBRE MARCA Y RUTA
			=============================================*/

			$("#modalEditarMarca .tituloMarca").change(function(){

				$("#modalEditarMarca .rutaMarca").val(limpiarUrl($("#modalEditarMarca .tituloMarca").val()));

			})

			/*=============================================
			TRAEMOS DATOS DE CABECERA
			=============================================*/
					
			var datosCabecera = new FormData();
			datosCabecera.append("ruta", respuesta["ruta"]);

			$.ajax({

				url:"ajax/cabeceras.ajax.php",
				method: "POST",
				data: datosCabecera,
				cache: false,
				contentType: false,
				processData: false,
				dataType: "json",
				success: function(respuesta){
					$("#modalEditarMarca .editarIdCabecera").val(respuesta["id"]);
					
					/*=============================================
					CARGAMOS LA DESCRIPCION
					=============================================*/

					$("#modalEditarMarca .descripcionMarca").val(respuesta["descripcion"]);

					/*=============================================
					CARGAMOS LAS PALABRAS CLAVES
					=============================================*/

					if(respuesta["palabrasClaves"] != null){

						$(".editarPalabrasClaves").html(

							'<div class="input-group">'+
                
			                '<span class="input-group-addon"><i class="fa fa-key"></i></span>'+

			                '<input type="text" class="form-control input-lg pClavesMarca tagsInput" data-role="tagsinput" value="'+respuesta["palabrasClaves"]+'" name="pClavesMarca">'+

			              '</div>'

						);

						$("#modalEditarMarca .pClavesMarca").tagsinput('items');

						$(".bootstrap-tagsinput").css({"padding":"11px",
							   						   "width":"100%",
 							   						   "border-radius":"1px"})

					}else{

						$(".editarPalabrasClaves").html(

							'<div class="input-group">'+
                
			                '<span class="input-group-addon"><i class="fa fa-key"></i></span>'+

			                '<input type="text" class="form-control input-lg pClavesMarca tagsInput" data-role="tagsinput" value="" placeholder="Ingresar palabras claves"  name="pClavesMarca">'+

			              '</div>'

						);
						$("#modalEditarMarca .pClavesMarca").tagsinput('items');

						$(".bootstrap-tagsinput").css({"padding":"11px",
							   						   "width":"100%",
 							   						   "border-radius":"1px"})


					}

					/*=============================================
					CARGAMOS LA IMAGEN DE PORTADA
					=============================================*/

					$("#modalEditarMarca .previsualizarPortada").attr("src", respuesta["portada"]);//   $("#modalEditarMarca .previsualizarPortada").attr("src", respuesta["portada"]+"?"+Math.random() * 1000000);
					$("#modalEditarMarca .antiguaFotoPortada").val(respuesta["portada"]);
						
				}

			})

			/*=============================================
			PREGUNTAMOS SI EXITE OFERTA
			=============================================*/

			if(respuesta["oferta"] != 0){

				$("#modalEditarMarca .selActivarOferta").val("oferta");

				$("#modalEditarMarca .datosOferta").show();

				$("#modalEditarMarca .valorOferta").prop("required",true);

				$("#modalEditarMarca #precioOferta").val(respuesta["precioOferta"]);
				$("#modalEditarMarca #descuentoOferta").val(respuesta["descuentoOferta"]);

				if(respuesta["precioOferta"] != 0){

					$("#modalEditarMarca #precioOferta").prop("readonly",true);
					$("#modalEditarMarca #descuentoOferta").prop("readonly",false);

				}

				if(respuesta["descuentoOferta"] != 0){

					$("#modalEditarMarca #precioOferta").prop("readonly",false);
					$("#modalEditarMarca #descuentoOferta").prop("readonly",true);

				}

				$("#modalEditarMarca .previsualizarOferta").attr("src", respuesta["imgOferta"]);

				$("#modalEditarMarca .antiguaFotoOferta").val(respuesta["imgOferta"]);

				$("#modalEditarMarca .finOferta").val(respuesta["finOferta"]);		

			}else{

				$("#modalEditarMarca .selActivarOferta").val("");
				$("#modalEditarMarca .datosOferta").hide();
				$("#modalEditarMarca .valorOferta").prop("required",false);
				$("#modalEditarMarca .previsualizarOferta").attr("src", "vistas/img/ofertas/default/default.jpg");
				$("#modalEditarMarca .antiguaFotoOferta").val(respuesta["imgOferta"]);

			}

			/*=============================================
			CREAR NUEVA OFERTA AL EDITAR
			=============================================*/

			$("#modalEditarMarca .selActivarOferta").change(function(){

				activarOferta($(this).val());

			})

			$("#modalEditarMarca .valorOferta").change(function(){

				if($(this).attr("id") == "precioOferta"){

					$("#modalEditarMarca #precioOferta").prop("readonly",true);
					$("#modalEditarMarca #descuentoOferta").prop("readonly",false);
					$("#modalEditarMarca #descuentoOferta").val(0);

				}

				if($(this).attr("id") == "descuentoOferta"){

					$("#modalEditarMarca #descuentoOferta").prop("readonly",true);
					$("#modalEditarMarca #precioOferta").prop("readonly",false);
					$("#modalEditarMarca #precioOferta").val(0);

				}

			})

		}

	})

})


function MarcaEditadaCorrectamente() {
	$(".tablaMarcas").fadeOut("slow");
	swal({
	  type: "success",
	  title: "La marca ha sido cambiada correctamente",
	  showConfirmButton: true,
	  confirmButtonText: "Cerrar"
	  }).then(function(result){
		if (result.value) {
			TablaPrincipalMarca.ajax.reload(function() {
				setTimeout(function() {
					$(".tablaMarcas").fadeIn( "slow", function() {
				 		$('#modalEditarMarca').modal('toggle');
						document.getElementById("EditarFORM_ID").reset();
						$('.previsualizarPortada').attr('src', 'vistas/img/cabeceras/default/default.jpg');
						imagenEditar="";
						DeshabilitarClienteMarca('disabled', false);
	  				});
				},700);
			});
		}
	});
}
function MarcaNOEditadaCorrectamente() {
	swal({
		  type: "error",
		  title: "¡La marca no puede editarse vacía o llevar caracteres especiales!",
		  showConfirmButton: true,
		  confirmButtonText: "Cerrar"
		  }).then(function(result){
			if (result.value) {
				DeshabilitarClienteMarca('disabled', false);
			}
		});
}
function MarcaCreadaCorrectamente() {
	$(".tablaMarcas").fadeOut("slow");
	swal({
	  type: "success",
	  title: "La marca ha sido creada correctamente",
	  showConfirmButton: true,
	  confirmButtonText: "Cerrar"
	  }).then(function(result){
		if (result.value) {
			TablaPrincipalMarca.ajax.reload(function() {
				setTimeout(function() {
					$(".tablaMarcas").fadeIn( "slow", function() {
				 		$('#modalAgregarMarca').modal('toggle');
						document.getElementById("AgregarFORM_ID").reset();
						$('.previsualizarPortada').attr('src', 'vistas/img/cabeceras/default/default.jpg');
						imagenEditar="";
						DeshabilitarClienteMarca('disabled', false);
	  				});
				},700);
			});
		}
	});
}
function MarcaNOCreadaCorrectamente() {
	swal({
		  type: "error",
		  title: "¡La marca no puede ir vacía o llevar caracteres especiales!",
		  showConfirmButton: true,
		  confirmButtonText: "Cerrar"
		  }).then(function(result){
			if (result.value) {
				DeshabilitarClienteMarca('disabled', false);
			}
		});
}
function MarcaBorradaCorrectamente() {
	$(".tablaMarcas").fadeOut("slow");
	swal({
	  type: "success",
	  title: "La marca ha sido eliminada correctamente",
	  showConfirmButton: true,
	  confirmButtonText: "Cerrar"
	  }).then(function(result){
				if (result.value) {
				TablaPrincipalMarca.ajax.reload(function() {
					setTimeout(function() {
						$(".tablaMarcas").fadeIn( "slow", function() {
		  				});
					},70);
				});
			}
		});
}
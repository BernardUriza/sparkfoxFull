/*=============================================
CARGAR LA TABLA DINÁMICA DE GRUPOS
=============================================*/

// $.ajax({

// 	url:"ajax/tablaGrupos.ajax.php",
// 	success:function(respuesta){
		
// 		console.log("respuesta", respuesta);

// 	}

// })

$(".tablaGrupos").DataTable({
	 "ajax": "ajax/tablaGrupos.ajax.php",
	 "deferRender": true,
	 "retrieve": true,
	 "processing": true,
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

/*=============================================
ACTIVAR GRUPO
=============================================*/

$(".tablaGrupos tbody").on("click", ".btnActivar", function(){

	var idGrupo = $(this).attr("idGrupo");
	var estadoGrupo = $(this).attr("estadoGrupo");

	var datos = new FormData();
 	datos.append("activarId", idGrupo);
  	datos.append("activarGrupo", estadoGrupo);

  	$.ajax({

  		 url:"ajax/grupos.ajax.php",
  		 method: "POST",
	  	data: datos,
	  	cache: false,
      	contentType: false,
      	processData: false,
      	success: function(respuesta){ 
      	    
      	    // console.log("respuesta", respuesta);

      	} 	 

  	});

  	if(estadoGrupo == 0){

  		$(this).removeClass('btn-success');
  		$(this).addClass('btn-danger');
  		$(this).html('Desactivado');
  		$(this).attr('estadoGrupo',1);
  	
  	}else{

  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-danger');
  		$(this).html('Activado');
  		$(this).attr('estadoGrupo',0);

  	}

})

/*=============================================
REVISAR SI LA GRUPO YA EXISTE
=============================================*/

$(".validarGrupo").change(function(){

	$(".alert").remove();

	var Grupo = $(this).val();
	// console.log("Grupo", Grupo);

	var datos = new FormData();
	datos.append("validarGrupo", Grupo);

	$.ajax({
	    url:"ajax/grupos.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	    success:function(respuesta){
	    	
	    	// console.log("respuesta", respuesta);

	    	if(respuesta){

	    		$(".validarGrupo").parent().after('<div class="alert alert-warning">Este grupo ya existe en la base de datos</div>')
	    		$(".validarGrupo").val("");
	    	}   

	    }

	  })
});


/*=============================================
RUTA GRUPO
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


$(".tituloGrupo").change(function(){

	$(".rutaGrupo").val(

		limpiarUrl($(".tituloGrupo").val())

	);

})

/*=============================================
SUBIENDO LA FOTO DE PORTADA
=============================================*/

$(".fotoPortada").change(function(){

	var imagen = this.files[0];

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
		
  			var rutaImagen = event.target.result;

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
EDITAR GRUPO
=============================================*/

$(".tablaGrupos tbody").on("click", ".btnEditarGrupo", function(){

	var idGrupo = $(this).attr("idGrupo");

	var datos = new FormData();
	datos.append("idGrupo", idGrupo);

	$.ajax({

		url:"ajax/grupos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

			$("#modalEditarGrupo .editarIdGrupo").val(respuesta["id"]);
			$("#modalEditarGrupo .tituloGrupo").val(respuesta["grupo"]);
			$("#modalEditarGrupo .rutaGrupo").val(respuesta["ruta"]);

			/*=============================================
			EDITAR NOMBRE GRUPO Y RUTA
			=============================================*/

			$("#modalEditarGrupo .tituloGrupo").change(function(){

				$("#modalEditarGrupo .rutaGrupo").val(limpiarUrl($("#modalEditarGrupo .tituloGrupo").val()));

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
					$("#modalEditarGrupo .editarIdCabecera").val(respuesta["id"]);
					
					/*=============================================
					CARGAMOS LA DESCRIPCION
					=============================================*/

					$("#modalEditarGrupo .descripcionGrupo").val(respuesta["descripcion"]);

					/*=============================================
					CARGAMOS LAS PALABRAS CLAVES
					=============================================*/

					if(respuesta["palabrasClaves"] != null){

						$(".editarPalabrasClaves").html(

							'<div class="input-group">'+
                
			                '<span class="input-group-addon"><i class="fa fa-key"></i></span>'+

			                '<input type="text" class="form-control input-lg pClavesGrupo tagsInput" data-role="tagsinput" value="'+respuesta["palabrasClaves"]+'" name="pClavesGrupo">'+

			              '</div>'

						);

						$("#modalEditarGrupo .pClavesGrupo").tagsinput('items');

						$(".bootstrap-tagsinput").css({"padding":"11px",
							   						   "width":"100%",
 							   						   "border-radius":"1px"})

					}else{

						$(".editarPalabrasClaves").html(

							'<div class="input-group">'+
                
			                '<span class="input-group-addon"><i class="fa fa-key"></i></span>'+

			                '<input type="text" class="form-control input-lg pClavesGrupo tagsInput" data-role="tagsinput" value="" placeholder="Ingresar palabras claves"  name="pClavesGrupo">'+

			              '</div>'

						);
						$("#modalEditarGrupo .pClavesGrupo").tagsinput('items');

						$(".bootstrap-tagsinput").css({"padding":"11px",
							   						   "width":"100%",
 							   						   "border-radius":"1px"})


					}

					/*=============================================
					CARGAMOS LA IMAGEN DE PORTADA
					=============================================*/

					$("#modalEditarGrupo .previsualizarPortada").attr("src", respuesta["portada"]);
					$("#modalEditarGrupo .antiguaFotoPortada").val(respuesta["portada"]);
						
				}

			})

			/*=============================================
			PREGUNTAMOS SI EXITE OFERTA
			=============================================*/

			if(respuesta["oferta"] != 0){

				$("#modalEditarGrupo .selActivarOferta").val("oferta");

				$("#modalEditarGrupo .datosOferta").show();

				$("#modalEditarGrupo .valorOferta").prop("required",true);

				$("#modalEditarGrupo #precioOferta").val(respuesta["precioOferta"]);
				$("#modalEditarGrupo #descuentoOferta").val(respuesta["descuentoOferta"]);

				if(respuesta["precioOferta"] != 0){

					$("#modalEditarGrupo #precioOferta").prop("readonly",true);
					$("#modalEditarGrupo #descuentoOferta").prop("readonly",false);

				}

				if(respuesta["descuentoOferta"] != 0){

					$("#modalEditarGrupo #precioOferta").prop("readonly",false);
					$("#modalEditarGrupo #descuentoOferta").prop("readonly",true);

				}

				$("#modalEditarGrupo .previsualizarOferta").attr("src", respuesta["imgOferta"]);

				$("#modalEditarGrupo .antiguaFotoOferta").val(respuesta["imgOferta"]);

				$("#modalEditarGrupo .finOferta").val(respuesta["finOferta"]);		

			}else{

				$("#modalEditarGrupo .selActivarOferta").val("");
				$("#modalEditarGrupo .datosOferta").hide();
				$("#modalEditarGrupo .valorOferta").prop("required",false);
				$("#modalEditarGrupo .previsualizarOferta").attr("src", "vistas/img/ofertas/default/default.jpg");
				$("#modalEditarGrupo .antiguaFotoOferta").val(respuesta["imgOferta"]);

			}

			/*=============================================
			CREAR NUEVA OFERTA AL EDITAR
			=============================================*/

			$("#modalEditarGrupo .selActivarOferta").change(function(){

				activarOferta($(this).val());

			})

			$("#modalEditarGrupo .valorOferta").change(function(){

				if($(this).attr("id") == "precioOferta"){

					$("#modalEditarGrupo #precioOferta").prop("readonly",true);
					$("#modalEditarGrupo #descuentoOferta").prop("readonly",false);
					$("#modalEditarGrupo #descuentoOferta").val(0);

				}

				if($(this).attr("id") == "descuentoOferta"){

					$("#modalEditarGrupo #descuentoOferta").prop("readonly",true);
					$("#modalEditarGrupo #precioOferta").prop("readonly",false);
					$("#modalEditarGrupo #precioOferta").val(0);

				}

			})

		}

	})

})

/*=============================================
ELIMINAR Grupo
=============================================*/
$(".tablaGrupos tbody").on("click", ".btnEliminarGrupo", function(){

	var idGrupo = $(this).attr("idGrupo");
  	var imgOferta = $(this).attr("imgOferta");
  	var rutaCabecera = $(this).attr("rutaCabecera");
  	var imgPortada = $(this).attr("imgPortada");

  	swal({
    	title: '¿Está seguro de borrar el grupo?',
    	text: "¡Si no lo está puede cancelar la accíón!",
    	type: 'warning',
    	showCancelButton: true,
    	confirmButtonColor: '#3085d6',
      	cancelButtonColor: '#d33',
      	cancelButtonText: 'Cancelar',
      	confirmButtonText: 'Si, borrar grupo!'
	 }).then(function(result){

    	if(result.value){

      	window.location = "index.php?ruta=grupos&idGrupo="+idGrupo+"&imgOferta="+imgOferta+"&rutaCabecera="+rutaCabecera+"&imgPortada="+imgPortada;

    	}

  	})

})


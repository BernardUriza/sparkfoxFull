  var editor = new wysihtml5.Editor("wysihtml5-editor", {
  	toolbar: "wysihtml5-editor-toolbar",
  	stylesheets: ["http://yui.yahooapis.com/2.9.0/build/reset/reset-min.css", "css/editor.css"]/*,
  	parserRules: wysihtml5ParserRules*/
  });

  editor.on("load", function() {
  	var composer = editor.composer,
  		h1 = editor.composer.element.querySelector("h1");
  	if (h1) {
  		composer.selection.selectNode(h1);
  	}
  });
  /*=============================================
  CARGAR LA TABLA DINÁMICA DE PROYECTOS
  =============================================*/
  function CargarTabla() {
  	return $(".tablaProyectos").DataTable({
  		"ajax": "ajax/tablaProyectos.ajax.php",
  		"deferRender": true,
  		"retrieve": true,
  		"processing": true,
  		"order": [
  			[0, "desc"]
  		],
  		/* "language": {
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

  $(".fotoPrincipal").change(function() {
  	var Cual = $('#modalEditarProyecto').hasClass('in') ? "#modalEditarProyecto" : "#modalAgregarProyecto";
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
  			var Cual = $('#modalEditarProyecto').hasClass('in') ? "#modalEditarProyecto" : "#modalAgregarProyecto";
  			$(Cual + " .previsualizarPrincipal").attr("src", rutaImagen.replace('admin/', ''));
  			$(Cual + " .rutaImagenPortada").val(rutaImagen);
  			var IdArchivo = getNameFROM_FILE(rutaImagen);
  			$(Cual + " .idArchivoImagenPortada").val(IdArchivo);
  		});
  	}
  });
  $(".fotoBlog").change(function() {
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
  			console.log("rutaImagen", $("#rutaBlog").text() + rutaImagen);
  			$("#recuperarLinkFoto").val($("#rutaBlog").text() + rutaImagen);
  			$("#servirClickLinkFoto").click();
  			var textoCa = $(jQuery.parseHTML(editor.getValue().replace("<span>","").replace("</span>","")))

  			textoCa.each(function() {
  				if ($(this).is("img")) {
  					$(this).attr("width", 150)
  				}
  			});

  			setTimeout(function() {
  				console.log("textoCa", textoCa);
  				editor.setValue($('<div>').append(textoCa).html());
  			}, 100);
  		});
  	}
  });

  function DeshabilitarProyectoProyecto(ignorar, argument) {
  	$('.guardarCambiosProyecto, .guardarProyecto').prop('disabled', argument);
  	$('body').toggleClass('loading');
  }
  var TablaPrincipalProyecto = CargarTabla();
  /*=============================================
  GUARDAR CAMBIOS DE LA PROYECTO 
  =============================================*/
  $(".guardarCambiosProyecto").click(function() {
  	DeshabilitarProyectoProyecto('disabled', true);
  	setTimeout(function() {
  		var idProyecto = $("#modalEditarProyecto .editarIdProyecto").val();
  		var rutaImagenPortada = $("#modalEditarProyecto .rutaImagenPortada").val();
  		var idArchivoImagenPortada = $("#modalEditarProyecto .idArchivoImagenPortada").val();
  		var tituloProyecto = $("#modalEditarProyecto .tituloProyecto").val();
  		var datosProducto = new FormData();
  		datosProducto.append("editarIdProyecto", idProyecto);
  		datosProducto.append("descripcion", editor.getValue());
  		datosProducto.append("rutaImagenPortada", rutaImagenPortada); 
  		datosProducto.append("idArchivoImagenPortada", idArchivoImagenPortada);
  		datosProducto.append("editarTituloProyecto", tituloProyecto);
  		$.ajax({
  			url: "ajax/proyectos.ajax.php",
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
  AGREGAR PROYECTO 
  =============================================*/
  $(".guardarProyecto").click(function() {
  	DeshabilitarProyectoProyecto('disabled', true);
  	setTimeout(function() {
  		var tituloProyecto = $("#modalAgregarProyecto .tituloProyecto").val();
  		var datosProducto = new FormData();
  		datosProducto.append("tituloProyecto", tituloProyecto);
  		$.ajax({
  			url: "ajax/proyectos.ajax.php",
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
  ELIMINAR Proyecto
  =============================================*/
  $(".tablaProyectos tbody").on("click", ".btnEliminarProyecto", function() {
  	var idProyecto = $(this).attr("idproyecto");
  	swal({
  		title: 'Are you sure?',
  		text: "You will delete this page",
  		type: 'warning',
  		showCancelButton: true,
  		confirmButtonColor: '#3085d6',
  		cancelButtonColor: '#d33',
  		cancelButtonText: 'Cancel',
  		confirmButtonText: 'Delete!'
  	}).then(function(result) {
  		if (result.value) {
  			var datosProducto = new FormData();
  			datosProducto.append("idBorrar", idProyecto);
  			datosProducto.append("idProyecto", idProyecto);
  			$.ajax({
  				url: "ajax/proyectos.ajax.php",
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
  ACTIVAR PROYECTO
  =============================================*/
  $(".tablaProyectos tbody").on("click", ".btnActivar", function() {
  	var idProyecto = $(this).attr("idProyecto");
  	var estadoProyecto = $(this).attr("estadoProyecto");
  	var datos = new FormData();
  	datos.append("activarId", idProyecto);
  	datos.append("activarProyecto", estadoProyecto);
  	$.ajax({
  		url: "ajax/proyectos.ajax.php",
  		method: "POST",
  		data: datos,
  		cache: false,
  		contentType: false,
  		processData: false,
  		success: function(respuesta) {
  			// console.log("respuesta", respuesta);
  		}
  	});
  	if (estadoProyecto == 0) {
  		$(this).removeClass('btn-success');
  		$(this).addClass('btn-danger');
  		$(this).html('Desactivado');
  		$(this).attr('estadoProyecto', 1);
  	} else {
  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-danger');
  		$(this).html('Activado');
  		$(this).attr('estadoProyecto', 0);
  	}
  })
  /*=============================================
  EDITAR PROYECTO
  =============================================*/
  $(".tablaProyectos tbody").on("click", ".btnEditarProyecto", function() {
  	var idProyecto = $(this).attr("idProyecto");
  	var datos = new FormData();
  	datos.append("idProyecto", idProyecto);
  	$.ajax({
  		url: "ajax/proyectos.ajax.php",
  		method: "POST",
  		data: datos,
  		cache: false,
  		contentType: false,
  		processData: false,
  		dataType: "json",
  		success: function(respuesta) {
  			$("#modalEditarProyecto .editarIdProyecto").val(respuesta["id"]);

  				editor.setValue(respuesta["descripcion"]);
  			$("#modalEditarProyecto .tituloProyecto").val(respuesta["titulo"]);
  			$("#modalEditarProyecto .idArchivoImagenPortada").val(respuesta["idArchivoImagenPortada"]);
  			$("#modalEditarProyecto .rutaImagenPortada").val(respuesta["rutaImagenPortada"]);
  			var resRutaImagenPortada = respuesta["rutaImagenPortada"] == "" ? "admin/vistas/img/productos/default/default.jpg" : respuesta["rutaImagenPortada"];
  			$("#modalEditarProyecto .previsualizarPrincipal").attr("src", resRutaImagenPortada.replace('admin/', '') + "?" + parseInt(Math.random() * 10000));

  		}
  	})
  })
  var NeutroLenguaje = "MASC"; //"MASC"  "FEME"
  var ArticuloILSU = NeutroLenguaje == "MASC" ? "El" : "La";
  var ArticuloTerminacion = NeutroLenguaje == "MASC" ? "o" : "a";

  function ProyectoEditadaCorrectamente() {
  	$(".tablaProyectos").fadeOut("slow");
  	swal({
  		type: "success",
  		title: "Page changed",
  		showConfirmButton: true,
  		confirmButtonText: "Cerrar"
  	}).then(function(result) {
  		if (result.value) {
  			TablaPrincipalProyecto.ajax.reload(function() {
  				setTimeout(function() {
  					$(".tablaProyectos").fadeIn("slow", function() {
  						$('#modalEditarProyecto').modal('toggle');
  						document.getElementById("EditarFORM_ID").reset();
  						$('.previsualizarPortada').attr('src', 'vistas/img/cabeceras/default/default.jpg');
  						imagenEditar = "";
  						DeshabilitarProyectoProyecto('disabled', false);
  					});
  				}, 700);
  			});
  		}
  	});
  }

  function ProyectoNOEditadaCorrectamente() {
  	swal({
  		type: "error",
  		title: "Not empty, not special chars!",
  		showConfirmButton: true,
  		confirmButtonText: "Cerrar"
  	}).then(function(result) {
  		if (result.value) {
  			DeshabilitarProyectoProyecto('disabled', false);
  		}
  	});
  }

  function ProyectoCreadaCorrectamente() {
  	$(".tablaProyectos").fadeOut("slow");
  	swal({
  		type: "success",
  		title: "Created!",
  		showConfirmButton: true,
  		confirmButtonText: "Cerrar"
  	}).then(function(result) {
  		if (result.value) {
  			TablaPrincipalProyecto.ajax.reload(function() {
  				setTimeout(function() {
  					$(".tablaProyectos").fadeIn("slow", function() {
  						$('#modalAgregarProyecto').modal('toggle');
  						document.getElementById("AgregarFORM_ID").reset();
  						$('.previsualizarPortada').attr('src', 'vistas/img/cabeceras/default/default.jpg');
  						imagenEditar = "";
  						DeshabilitarProyectoProyecto('disabled', false);
  					});
  				}, 700);
  			});
  		}
  	});
  }

  function ProyectoNOCreadaCorrectamente() {
  	swal({
  		type: "error",
  		title: "Not empty, not special chars!",
  		showConfirmButton: true,
  		confirmButtonText: "Cerrar"
  	}).then(function(result) {
  		if (result.value) {
  			DeshabilitarProyectoProyecto('disabled', false);
  		}
  	});
  }

  function ProyectoBorradaCorrectamente() {
  	$(".tablaProyectos").fadeOut("slow");
  	swal({
  		type: "success",
  		title: "Erased success",
  		showConfirmButton: true,
  		confirmButtonText: "Cerrar"
  	}).then(function(result) {
  		if (result.value) {
  			TablaPrincipalProyecto.ajax.reload(function() {
  				setTimeout(function() {
  					$(".tablaProyectos").fadeIn("slow", function() {});
  				}, 70);
  			});
  		}
  	});
  }
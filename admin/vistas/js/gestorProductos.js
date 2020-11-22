function AgregarGrupoDesdeProductos() {
	var Cual = $('#modalEditarProducto').hasClass('in') ? "modalEditarProducto" : "modalAgregarProducto";
	var searchInput = $("#" + Cual + " .seleccionarGrupo").data('select2').$dropdown.find("input").val().toUpperCase();
	var datos = new FormData();
	datos.append("crearGrupo", searchInput);
	$.ajax({
		url: "ajax/grupos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success: function(respuesta) {
			console.log("respuesta", respuesta);
			var data = {
				id: respuesta,
				text: '' + searchInput
			};
			var newOption = new Option(data.text, data.id, false, false);
			$("#" + Cual + " .seleccionarGrupo").append(newOption);
			$("#" + Cual + " .seleccionarGrupo").select2("close");
			$("#" + Cual + " .seleccionarGrupo").val(data.id).trigger("change");
		}
	});
}

function AgregarCategoriaDesdeProductos() {
	var Cual = $('#modalEditarProducto').hasClass('in') ? "modalEditarProducto" : "modalAgregarProducto";
	var Cualeee = $('#modalEditarProducto').hasClass('in') ? "#EditarFORM_ID .select2-container--open > span.selection > span > ul > li > input" : "#AgregarFORM_ID .select2-container--open > span.selection > span > ul > li > input";
	if($(Cualeee).val() ==''){
		swal('Ingrese un texto');
		return;
	}
	var searchInput = $(Cualeee).val().toUpperCase();

	var datos = new FormData();
	datos.append("crearCategoria", searchInput);
	$.ajax({
		url: "ajax/categorias.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success: function(respuesta) {
			console.log("respuesta", respuesta);
			var data = {
				id: respuesta,
				text: '' + searchInput
			};
			var newOption = new Option(data.text, data.id, false, false);
			$("#" + Cual + " .seleccionarCategoria").append(newOption);
			$("#" + Cual + " .seleccionarCategoria").select2("close");
			var categos=$("#" + Cual + " .seleccionarCategoria").val();
			categos.push(data.id);
			$("#" + Cual + " .seleccionarCategoria").val(categos);
			$("#" + Cual + " .seleccionarCategoria").trigger('change');
		}
	});
}

function AgregarMarcaDesdeProductos() {
	var Cual = $('#modalEditarProducto').hasClass('in') ? "modalEditarProducto" : "modalAgregarProducto";
	var searchInput = $("#" + Cual + " .seleccionarMarca").data('select2').$dropdown.find("input").val().toUpperCase();
	var datos = new FormData();
	datos.append("crearMarca", searchInput);
	datos.append("DesdeProductos", "1");
	$.ajax({
		url: "ajax/marcas.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success: function(respuesta) {
			console.log("respuesta", respuesta);
			RecargarMarcasEnProductos(function() {
				$("#" + Cual + " .seleccionarMarca").select2("close");
				$("#" + Cual + " .seleccionarMarca").val(respuesta).trigger("change");
			});
		}
	});
}
/*=============================================
CARGAR LA TABLA DINÁMICA DE PRODUCTOS
=============================================*/
$(document).ready(function() {
	$(".agregar-color").colorpicker({format: 'hex',color: '#FFFFFF',});
	$(".multimediaFisica").show();
	$(".multimediaEjemplo").show();
	$(".multimediaVirtual").hide();
	$(".detallesFisicos").show();
	$(".detallesVirtual").hide();
	$('.VideoEditarSelect2').select2({
		placeholder: 'Select Video',
		escapeMarkup: function(markup) {
			return markup;
		},
		width: 'resolve'
	});
	$('.CategoriaEditarSelect2').select2({
		placeholder: 'Select Categories',
		escapeMarkup: function(markup) {
			return markup;
		},
		language: {
			noResults: function() {
				return "Not Exist: <button class='btn btn-xs btn-success' onclick='AgregarCategoriaDesdeProductos();'><i class='fa fa-plus' aria-hidden='true'></i> Create new </button>";
			}
		},
		width: 'resolve'
	});
	$('.CategoriaCrearSelect2').select2({
		placeholder: 'Select Categories',		
		escapeMarkup: function(markup) {
			return markup;
		},
		language: {
			noResults: function() {
				return "El grupo no existe: <button class='btn btn-xs btn-success' onclick='AgregarCategoriaDesdeProductos();'><i class='fa fa-plus' aria-hidden='true'></i> Create new </button>";
			}
		},
		width: 'resolve'
	});
	$('.ClaseEditarSelect2').select2({
		placeholder: 'Select Compatibilities',
		width: 'resolve'
	});
	$('.ClaseCrearSelect2').select2({
		placeholder: 'Select Compatibilities',
		width: 'resolve'
	});
	$('.seleccionarGrupo').select2({
		width: 'resolve',
		escapeMarkup: function(markup) {
			return markup;
		},
		language: {
			noResults: function() {
				return "Not Exist: <button class='btn btn-xs btn-success' onclick='AgregarGrupoDesdeProductos();'><i class='fa fa-plus' aria-hidden='true'></i> Create new </button>";
			}
		}
	});
	$(".seleccionarGrupo").html("");
	$("#modalEditarProducto .seleccionarGrupo").html("");
	RecargarGruposEnProductos();
	$("#modalAgregarProducto").on('show.bs.modal', function() {
		$("#FichaTecnicaCrear").append($("#FichaTecnicaHTML"));
		MostrarArchivo(DefaultCrearModalIdFicha, DefaultCrearModalRutaFicha);
	});
	$("#modalEditarProducto").on('show.bs.modal', function() {
		$("#FichaTecnicaEditar").append($("#FichaTecnicaHTML"));
		MostrarArchivo(-1, "");
	});
	$('.seleccionarMarca').select2({
		width: 'resolve',
		escapeMarkup: function(markup) {
			return markup;
		},
		language: {
			noResults: function() {
				return "La marca no existe: <button class='btn btn-xs btn-success' onclick='AgregarMarcaDesdeProductos();'><i class='fa fa-plus' aria-hidden='true'></i> Crear marca nueva </button>";
			}
		}
	});
	$(".seleccionarMarca").html("");
	$("#modalEditarProducto .seleccionarMarca").html("");
	RecargarMarcasEnProductos();
	$("#modalAgregarProducto").on('show.bs.modal', function() {
		$("#modalAgregarProducto .seleccionarMunicipio").val('').trigger('change');
		document.getElementById("AgregarFORM_ID").reset();
		localStorage.setItem("multimediaFisica", "[]");
		arrayFiles = [];
		arrayFilesRutas = [];
		subirArchivos = [];
		Subiendo = -1;
		for (var i = dropzoneMultimedia.length - 1; i >= 0; i--) {
			dropzoneMultimedia[i].removeAllFiles(true);
		}
	});
	$('#modalAgregarProducto .multimediaFisica').html('<div class="dz-message needsclick">Drag or click to add images.</div>');
	$(".form-control-file").change(function() { //this
		var input = this;
		if (input.files && input.files[0]) {
			SubirArchivo(input.id, function(data) {
				MostrarArchivo(getNameFROM_FILE(data), data);
			});
		}
	});
	setTimeout(function() {
		if($("#levantarProductoID").val()){
			$(".btnEditarProducto[idproducto='"+$("#levantarProductoID").val()+"']").click();
		}
	},900);
});
var DefaultCrearModalRutaFicha = "",
	DefaultCrearModalIdFicha = -1;

function MostrarArchivo(Id, URL) {
	if ($('#modalAgregarProducto').hasClass('in')) {
		DefaultCrearModalRutaFicha = URL;
		DefaultCrearModalIdFicha = Id;
	}
	document.getElementById('RutaFicha').value = (URL);
	Mostrar(location.href.split('/admin')[0] + '/' + document.getElementById('RutaFicha').value);
	document.getElementById('IdArchivoFicha').value = Id;
	setTimeout($('.PDF_VIEWER').css('display', (parseInt(Id) > 0) ? 'block' : 'none'), 2500);
}

function RecargarGruposEnProductos(callback = null) {
	$("#seleccionarGrupo_EDIT").empty().trigger("change");
	$("#seleccionarGrupo_ADD").empty().trigger("change");
	var datos = new FormData();
	datos.append("verGrupo", "1");
	$.ajax({
		url: "ajax/grupos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta) {
			$(".entradaGrupo").show();
			$(".seleccionarGrupo").append(
				'<option value="-1" disabled selected>Seleccionar Grupo</option>'
			);
			respuesta.forEach(function(item, index) {
				$(".seleccionarGrupo").append(
					'<option value="' + item["id"] + '">' + item["grupo"] + '</option>'
				);
			});
			setTimeout(callback, 500);
		}
	});
}

function RecargarMarcasEnProductos(callback = null) {
	$("#seleccionarMarca_EDIT").empty().trigger("change");
	$("#seleccionarMarca_ADD").empty().trigger("change");
	var datos = new FormData();
	datos.append("verMarca", "1");
	datos.append("DesdeProductos", "1");
	$.ajax({
		url: "ajax/marcas.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta) {
			$(".entradaMarca").show();
			$(".seleccionarMarca").append(
				'<option value="-1" disabled selected>Seleccionar Marca</option>'
			);
			respuesta.forEach(function(item, index) {
				$(".seleccionarMarca").append(
					'<option value="' + item["id"] + '">' + item["marca"] + '</option>'
				);
			});
			setTimeout(callback, 500);
		}
	});
}

function CargarTabla() {

	var variableDeLaTablaCuidadosa= $('.tablaProductos').DataTable({
		"ajax": "ajax/tablaProductos.ajax.php",
		"deferRender": true,
		"retrieve": true,
		"processing": true,
		"order": [
			[0, "desc"]
		]
	});
		$.fn.dataTable.ext.errMode = 'none';

    $('.tablaProductos').on( 'error.dt', function ( e, settings, techNote, message ) {
    console.log( 'An error has been reported by DataTables: ', message );
    	TablaPrincipalProducto.ajax.reload(function() {
			
			});
    } ) ;
	return variableDeLaTablaCuidadosa;
}

function DeshabilitarClienteProducto(ignorar, argument) {
	$('.BarraDeProgresoValor').css('width', "0%");
	//$('.guardarCambiosProducto, .guardarProducto').prop('disabled', argument);
	if (argument)
		$('body').addClass('loading');
	else
		$('body').removeClass('loading');
}
var TablaPrincipalProducto = CargarTabla();
/*=============================================
ABRIR LA FICHA DE PRODUCTO
=============================================*/
$('.tablaProductos tbody').on("click", ".btnLinkFichaTecnica", function() {
	var IdArchivoFicha = $(this).attr("IdArchivoFicha");
	var RutaFicha = $(this).attr("RutaFicha");
	window.open(RutaFicha, '_blank');
});
/*=============================================
ACTIVAR PRODUCTO
=============================================*/
$('.tablaProductos tbody').on("click", ".btnActivar", function() {
	var idProducto = $(this).attr("idProducto");
	var estadoProducto = $(this).attr("estadoProducto");
	var datos = new FormData();
	datos.append("activarId", idProducto);
	datos.append("activarProducto", estadoProducto);
	$.ajax({
		url: "ajax/productos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success: function(respuesta) {
			// console.log("respuesta", respuesta);
		}
	})
	if (estadoProducto == 0) {
		$(this).removeClass('btn-success');
		$(this).addClass('btn-danger');
		$(this).html('Disable');
		$(this).attr('estadoProducto', 1);
	} else {
		$(this).addClass('btn-success');
		$(this).removeClass('btn-danger');
		$(this).html('Enable');
		$(this).attr('estadoProducto', 0);
	}
})
/*=============================================
AGREGAR MULTIMEDIA CON DROPZONE
=============================================*/
var arrayFiles = [];
var arrayFilesRutas = [];
var subirArchivos = [];
var Subiendo = -1;
var dropzoneMultimedia = [];
$(".multimediaFisica").dropzone({
	url: "/",
	addRemoveLinks: true,
	acceptedFiles: "image/jpeg, image/png, image/gif",
	init: function() {
		dropzoneMultimedia.push(this);
		this.on("addedfile", function(file) {
			DeshabilitarClienteProducto('', true);
			arrayFiles.push(file);
			subirArchivos.push(file);
		});
		this.on("removedfile", function(file) {
			var index = arrayFiles.indexOf(file);
			arrayFiles.splice(index, 1);
			arrayFilesRutas.splice(index, 1);
		});
		this.on("queuecomplete", SubirArchivosMultimedia);
	}
});

function SubirArchivosMultimedia() {
	if (Subiendo < subirArchivos.length) {
		DeshabilitarClienteProducto('', true);
		SubirArchivo_FILE(subirArchivos[Subiendo + 1], function(rutaImagen) {
			var index = arrayFiles.indexOf(subirArchivos[Subiendo + 1]);
			arrayFilesRutas[index] = rutaImagen;
			Subiendo++;
			DeshabilitarClienteProducto('', false);
			SubirArchivosMultimedia();
		});
	} else {
		Subiendo = -1;
		subirArchivos = [];
	}
}
var arrayFilesEjemplo = [];
var arrayFilesRutasEjemplo = [];
var subirArchivosEjemplo = [];
var SubiendoEjemplo = -1;
var dropzoneEjemplo = [];
$(".multimediaEjemplo").dropzone({
	url: "/",
	addRemoveLinks: true,
	acceptedFiles: "image/jpeg, image/png, image/gif",
	init: function() {
		dropzoneEjemplo.push(this);
		this.on("addedfile", function(file) {
			DeshabilitarClienteProducto('', true);
			arrayFilesEjemplo.push(file);
			subirArchivosEjemplo.push(file);
		});
		this.on("removedfile", function(file) {
			var index = arrayFilesEjemplo.indexOf(file);
			arrayFilesEjemplo.splice(index, 1);
			arrayFilesRutasEjemplo.splice(index, 1);
		});
		this.on("queuecomplete", SubirArchivosMultimediaEjemplo);
	}
});

function SubirArchivosMultimediaEjemplo() {
	if (SubiendoEjemplo < subirArchivosEjemplo.length) {
		DeshabilitarClienteProducto('', true);
		SubirArchivo_FILE(subirArchivosEjemplo[SubiendoEjemplo + 1], function(rutaImagen) {
			var index = arrayFilesEjemplo.indexOf(subirArchivosEjemplo[SubiendoEjemplo + 1]);
			arrayFilesRutasEjemplo[index] = rutaImagen;
			SubiendoEjemplo++;
			DeshabilitarClienteProducto('', false);
			SubirArchivosMultimediaEjemplo();
		});
	} else {
		SubiendoEjemplo = -1;
		subirArchivosEjemplo = [];
	}
}
/*=============================================
SUBIENDO LA FOTO PRINCIPAL
=============================================*/
var imagenFotoPrincipal = null;
$(".fotoPrincipal").change(function() {
	var Cual = $('#modalEditarProducto').hasClass('in') ? "#modalEditarProducto" : "#modalAgregarProducto";
	var imagen = this.files[0];
	if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"&& imagen["type"] != "image/gif") {
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
					var Cual = $('#modalEditarProducto').hasClass('in') ? "#modalEditarProducto" : "#modalAgregarProducto";
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

var imagenFotoCover = null;
$(".fotoCover").change(function() {
	var Cual = $('#modalEditarProducto').hasClass('in') ? "#modalEditarProducto" : "#modalAgregarProducto";
	var imagen = this.files[0];
	if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
		$(Cual + " .previsualizarCover").attr('src', 'vistas/img/productos/default/default.jpg');
		$(Cual + " .fotoCover").val("");
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
					var Cual = $('#modalEditarProducto').hasClass('in') ? "#modalEditarProducto" : "#modalAgregarProducto";
					$(Cual + " .previsualizarCover").attr("src", rutaImagen.replace('admin/', ''));
					$(Cual + " .rutaImagenPaquete").val(rutaImagen);
					var IdArchivo = getNameFROM_FILE(rutaImagen);
					$(Cual + " .idArchivoImagenPaquete").val(IdArchivo);
				});
			};
		};
		fr.readAsDataURL(imagen);
	}
});

var imagenFotoHeader = null;
$(".fotoHeader").change(function() {
	var Cual = $('#modalEditarProducto').hasClass('in') ? "#modalEditarProducto" : "#modalAgregarProducto";
	var imagen = this.files[0];
	if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
		$(Cual + " .previsualizarHeader").attr('src', 'vistas/img/productos/default/default.jpg');
		$(Cual + " .fotoHeader").val("");
		swal({
			title: "Error al subir la imagen",
			text: "¡La imagen debe estar en formato JPG o PNG!",
			type: "error",
			confirmButtonText: "¡Close!"
		});
	} else {				
		SubirArchivo_FILE(imagen, function(rutaImagen) {
			var Cual = $('#modalEditarProducto').hasClass('in') ? "#modalEditarProducto" : "#modalAgregarProducto";
			$(Cual + " .previsualizarHeader").attr("src", rutaImagen.replace('admin/', ''));
			$(Cual + " .rutaImagenHeader").val(rutaImagen);
			var IdArchivo = getNameFROM_FILE(rutaImagen);
			$(Cual + " .idArchivoImagenHeader").val(IdArchivo);
		});
	}
});
/*=============================================
GUARDAR EL PRODUCTO
=============================================*/
$(".guardarProducto").click(function() {
	DeshabilitarClienteProducto('disabled', true);
	/*=============================================
	PREGUNTAMOS SI LOS CAMPOS OBLIGATORIOS ESTÁN LLENOS
	=============================================*/
	if ($(".tituloProducto").val() != "" && 
		$(".seleccionarCategoria").val() != "") {
		setTimeout(GuardarProductoDatos, 10);
	} else {
		DeshabilitarClienteProducto('disabled', false);
		swal({
			title: "Llenar todos los campos obligatorios  (Título y al menos una Categoría)",
			type: "error",
			confirmButtonText: "¡Close!"
		});
		return;
	}
});

function GuardarProductoDatos() {
	/*=============================================
	ALMACENAMOS TODOS LOS CAMPOS DE PRODUCTO
	=============================================*/
	var tituloProducto = $(".tituloProducto").val();
	var rutaProducto = $(".rutaProducto").val();
	var codigo = $(".codigoProducto").val();
	var seleccionarCategoria = $(".seleccionarCategoria").val();
	var seleccionarClase = $(".seleccionarClase").val();
	var seleccionarGrupo = $(".seleccionarGrupo").val();
	var seleccionarMarca = $(".seleccionarMarca").val();
	var descripcionProducto = $(".descripcionProducto").val();
	var caracteristicasProducto = $(".caracteristicasProducto").val();
	var pClavesProducto = $(".pClavesProducto").val();
	var precio = $(".precio").val();
	var peso = $(".peso").val();
	var entrega = $(".entrega").val();
	var IdArchivoFicha = $("#IdArchivoFicha").val();
	var RutaFicha = $("#RutaFicha").val();
	var detalles = {
		"Presentacion": $(".detallePresentacion").val()
	};
	var detallesString = JSON.stringify(detalles);
	var idArchivoImagenPortada = $("#modalAgregarProducto .idArchivoImagenPortada").val();
	var rutaImagenPortada = $("#modalAgregarProducto .rutaImagenPortada").val();
	var rutaImagenHeader = $("#modalAgregarProducto .rutaImagenHeader").val();
	var datosProducto = new FormData();
	datosProducto.append("idArchivoImagenPortada", idArchivoImagenPortada);
	//datosProducto.append("idArchivoImagenHeader", idArchivoImagenHeader);
	datosProducto.append("rutaImagenPortada", rutaImagenPortada);
	datosProducto.append("tituloProducto", tituloProducto);
	datosProducto.append("rutaProducto", rutaProducto);
	datosProducto.append("codigo", codigo);
	datosProducto.append("detalles", detallesString);
	datosProducto.append("seleccionarCategoria", seleccionarCategoria);
	datosProducto.append("seleccionarClase", seleccionarClase);
	datosProducto.append("seleccionarGrupo", seleccionarGrupo);
	datosProducto.append("seleccionarMarca", seleccionarMarca);
	datosProducto.append("descripcionProducto", descripcionProducto);
	datosProducto.append("caracteristicasProducto", caracteristicasProducto);
	datosProducto.append("pClavesProducto", pClavesProducto);
	datosProducto.append("precio", precio);
	datosProducto.append("peso", peso);
	datosProducto.append("entrega", entrega);
	datosProducto.append("multimedia", JSON.stringify(arrayFilesRutas));
	datosProducto.append("IdArchivoFicha", IdArchivoFicha);
	datosProducto.append("RutaFicha", RutaFicha);
	$.ajax({
		url: "ajax/productos.ajax.php",
		method: "POST",
		data: datosProducto,
		cache: false,
		contentType: false,
		processData: false,
		success: function(respuesta) {
			eval(respuesta.replace('<script>', '').replace('</script>', ''));
		}
	})
}
/*=============================================
GUARDAR CAMBIOS DEL PRODUCTO
=============================================*/
$(".guardarCambiosProducto").click(function() {
	DeshabilitarClienteProducto('disabled', true);
	/*=============================================
	PREGUNTAMOS SI LOS CAMPOS OBLIGATORIOS ESTÁN LLENOS
	=============================================*/
	if ($("#modalEditarProducto .tituloProducto").val() != "" &&
		$("#modalEditarProducto .seleccionarCategoria").val() != "") {
		setTimeout(GuardarDeEditar, 1000);
	} else {
		DeshabilitarClienteProducto('disabled', false);
		swal({
			title: "Llenar todos los campos obligatorios (Título y al menos una Categoría)",
			type: "error",
			confirmButtonText: "¡Close!"
		});
		return;
	}
});

function GuardarDeEditar() {
	var idProducto = $("#modalEditarProducto .idProducto").val();
	var tituloProducto = $("#modalEditarProducto .tituloProducto").val();
	var rutaProducto = $("#modalEditarProducto .rutaProducto").val();
	var codigo = $("#modalEditarProducto .codigoProducto").val();
	var seleccionarCategoria = $("#modalEditarProducto .seleccionarCategoria").val();
	var seleccionarClase = $("#modalEditarProducto .seleccionarClase").val();
	var seleccionarGrupo = $("#modalEditarProducto .seleccionarGrupo").val();
	var seleccionarMarca = $("#modalEditarProducto .seleccionarMarca").val();
	var descripcionProducto = $("#modalEditarProducto .descripcionProducto").val();
	var caracteristicasProducto = $("#modalEditarProducto .caracteristicasProducto").val();
	var pClavesProducto = $("#modalEditarProducto .pClavesProducto").val();
	var precio = $("#modalEditarProducto .precio").val();
	var peso = $("#modalEditarProducto .peso").val();
	var entrega = $("#modalEditarProducto .entrega").val();
	var IdArchivoFicha = $("#IdArchivoFicha").val();
	var RutaFicha = $("#RutaFicha").val();
	var empaque = $("#modalEditarProducto .empaqueProducto").val();
	var reviews = $("#modalEditarProducto .reviews").val();
	var videos = $("#modalEditarProducto .seleccionarVideo").val();
	var tiendas =  $("#modalEditarProducto .tiendas").val();
	var rutaImagenHeader = $("#modalEditarProducto .rutaImagenHeader").val();
	var idArchivoImagenHeader = $("#modalEditarProducto .idArchivoImagenHeader").val();
	var rutaImagenPaquete = $("#modalEditarProducto .rutaImagenPaquete").val();
	var idArchivoImagenPaquete = $("#modalEditarProducto .idArchivoImagenPaquete").val();
	var detalles = {
		"Presentacion": $("#modalEditarProducto .detallePresentacion").val(),
		"Color": $("#modalEditarProducto .detalleColor").tagsinput('items'),
		"Marca": $("#modalEditarProducto .detalleMarca").tagsinput('items')
	};
	var detallesString = JSON.stringify(detalles);
	var idArchivoImagenPortada = $("#modalEditarProducto .idArchivoImagenPortada").val();
	var rutaImagenPortada = $("#modalEditarProducto .rutaImagenPortada").val();
	var datosProducto = new FormData();
	datosProducto.append("id", idProducto);
	datosProducto.append("idArchivoImagenPortada", idArchivoImagenPortada);
	datosProducto.append("rutaImagenPortada", rutaImagenPortada);
	datosProducto.append("rutaImagenHeader", rutaImagenHeader);
	datosProducto.append("idArchivoImagenHeader", idArchivoImagenHeader);
	datosProducto.append("rutaImagenPaquete", rutaImagenPaquete);
	datosProducto.append("idArchivoImagenPaquete", idArchivoImagenPaquete);
	datosProducto.append("editarProducto", tituloProducto);
	datosProducto.append("rutaProducto", rutaProducto);
	datosProducto.append("codigo", codigo);
	datosProducto.append("detalles", detallesString);
	datosProducto.append("seleccionarCategoria", seleccionarCategoria);
	datosProducto.append("seleccionarClase", seleccionarClase);
	datosProducto.append("IdArchivoFicha", IdArchivoFicha);
	datosProducto.append("RutaFicha", RutaFicha);
	datosProducto.append("empaque", empaque);
	datosProducto.append("reviews", reviews);
	datosProducto.append("videos", videos);
	datosProducto.append("tiendas", tiendas);
	datosProducto.append("seleccionarGrupo", seleccionarGrupo);
	datosProducto.append("seleccionarMarca", seleccionarMarca);
	datosProducto.append("descripcionProducto", descripcionProducto);
	datosProducto.append("caracteristicasProducto", caracteristicasProducto);
	datosProducto.append("pClavesProducto", pClavesProducto);
	datosProducto.append("precio", precio);
	datosProducto.append("peso", peso);
	datosProducto.append("entrega", entrega);
	var multimediaFisicaQueSeEnviara = [];
	var multimediaFisicaLocal = localStorage.getItem("multimediaFisica");
	var multimediaFisicaLocalArray = JSON.parse(multimediaFisicaLocal) || [];
	for (var i = multimediaFisicaLocalArray.length - 1; i >= 0; i--) {
		multimediaFisicaQueSeEnviara.push(multimediaFisicaLocalArray[i].foto.includes('admin/') ? multimediaFisicaLocalArray[i].foto : 'admin/' + multimediaFisicaLocalArray[i].foto);
	}
	for (var i = arrayFilesRutas.length - 1; i >= 0; i--) {
		multimediaFisicaQueSeEnviara.push(arrayFilesRutas[i]);
	}
	datosProducto.append("multimedia", JSON.stringify(multimediaFisicaQueSeEnviara));

	var multimediaEjemploQueSeEnviara = [];
	var multimediaEjemploLocal = localStorage.getItem("multimediaEjemplo");
	var multimediaEjemploLocalArray = JSON.parse(multimediaEjemploLocal) || [];
	for (var i = multimediaEjemploLocalArray.length - 1; i >= 0; i--) {
		multimediaEjemploQueSeEnviara.push(multimediaEjemploLocalArray[i].foto.includes('admin/') ? multimediaEjemploLocalArray[i].foto : 'admin/' + multimediaEjemploLocalArray[i].foto);
	}
	for (var i = arrayFilesRutasEjemplo.length - 1; i >= 0; i--) {
		multimediaEjemploQueSeEnviara.push(arrayFilesRutasEjemplo[i]);
	}
	datosProducto.append("multimediaEjemplos", JSON.stringify(multimediaEjemploQueSeEnviara));
	
	ObtenerPresentaciones();
	datosProducto.append("IDS_PRESENTACIONES", JSON.stringify(IDS_PRESENTACIONES));
	datosProducto.append("NOMBRES_PRESENTACIONES", JSON.stringify(NOMBRES_PRESENTACIONES));
	datosProducto.append("SKU_PRESENTACIONES", JSON.stringify(SKU_PRESENTACIONES));
	datosProducto.append("COLORES_PRESENTACIONES", JSON.stringify(COLORES_PRESENTACIONES));
	$.ajax({
		url: "ajax/productos.ajax.php",
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
/*=============================================
MOSTRAR PRODUCTO
=============================================*/
$('.tablaProductos tbody').on("click", ".btnEditarProducto", function() {
	RecargarGruposEnProductos();
	RecargarMarcasEnProductos();
	$(".previsualizarImgFisico").html("");
	$(".previsualizarImgEjemplo").html("");
	var idProducto = $(this).attr("idProducto");
	var datos = new FormData();
	datos.append("idProducto", idProducto);
	$.ajax({
		url: "ajax/productos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta) {
			$("#modalEditarProducto .idProducto").val(respuesta[0]["id"]);
			$("#modalEditarProducto .idArchivoImagenPortada").val(respuesta[0]["idArchivoImagenPortada"]);
			$("#modalEditarProducto .rutaImagenPortada").val(respuesta[0]["rutaImagenPortada"]);

			$("#modalEditarProducto .idArchivoImagenHeader").val(respuesta[0]["idArchivoImagenHeader"]);
			$("#modalEditarProducto .rutaImagenHeader").val(respuesta[0]["rutaArchivoImagenHeader"]);

			$("#modalEditarProducto .rutaImagenPaquete").val(respuesta[0]["rutaImagenPaquete"]);
			$("#modalEditarProducto .idArchivoImagenPaquete").val(respuesta[0]["idArchivoImagenPaquete"]);

			var PRESENTACIONES_ID_TABLA=respuesta[0]["colores_id"]?respuesta[0]["colores_id"].split(','):[];
			var PRESENTACIONES_COLORES_TABLA=respuesta[0]["colores"]?respuesta[0]["colores"].split(','):[];
			var PRESENTACIONES_NOMBRES_TABLA=respuesta[0]["colores_nombres"]?respuesta[0]["colores_nombres"].split(','):[];
			var PRESENTACIONES_SKU_TABLA=respuesta[0]["colores_sku"]?respuesta[0]["colores_sku"].split(','):[];
			$('.contenido-presentaciones').nextAll().remove();
			for (var i = PRESENTACIONES_ID_TABLA.length - 1; i >= 0; i--) {
			$('#modalEditarProducto .contenido-presentaciones').after(`
						   <tr>
                              <td><div class="btn-group"><button class="btn btn-danger btnEliminarPresentacion"><i class="fa fa-times"></i></button></div></td>
                              <td>`+PRESENTACIONES_ID_TABLA[i]+`</td>
                              <td>`+PRESENTACIONES_NOMBRES_TABLA[i]+`</td>
                              <td>`+PRESENTACIONES_SKU_TABLA[i]+`</td>
                              <td><span class="badge" data-toggle="tooltip" title="`+PRESENTACIONES_COLORES_TABLA[i]+`" style='background: `+PRESENTACIONES_COLORES_TABLA[i]+`'>&nbsp;&nbsp;</span></td>
                           </tr>`);
				
			}
    		$('[data-toggle="tooltip"]').tooltip(); 
    		$('.btnEliminarPresentacion').click(function() {
				$(this).parent().parent().parent().remove();
			});
			/*=============================================
			CARGAMOS LA IMAGEN PRINCIPAL
			=============================================*/
			var resRutaImagenPortada = respuesta[0]["rutaImagenPortada"] == "" ? "admin/vistas/img/productos/default/default.jpg" : respuesta[0]["rutaImagenPortada"];
			$("#modalEditarProducto .previsualizarPrincipal").attr("src", resRutaImagenPortada.replace('admin/', '') + "?" + parseInt(Math.random() * 10000));
			
			var resRutaImagenHeader = respuesta[0]["rutaImagenHeader"] == "" ? "admin/vistas/img/productos/default/default.jpg" : respuesta[0]["rutaArchivoImagenHeader"];
			$("#modalEditarProducto .previsualizarHeader").attr("src", resRutaImagenHeader.replace('admin/', '') + "?" + parseInt(Math.random() * 10000));
			
			var resRutaImagenCover = respuesta[0]["rutaImagenPaquete"] == "" ? "admin/vistas/img/productos/default/default.jpg" : respuesta[0]["rutaImagenPaquete"];
			$("#modalEditarProducto .previsualizarCover").attr("src", resRutaImagenCover.replace('admin/', '') + "?" + parseInt(Math.random() * 10000));
			
			$("#modalEditarProducto .tituloProducto").val(respuesta[0]["titulo"]);
			$("#modalEditarProducto .rutaProducto").val(respuesta[0]["ruta"]);
			$("#modalEditarProducto .codigoProducto").val(respuesta[0]["codigo"]);
			$("#modalEditarProducto .caracteristicasProducto").val(respuesta[0]["caracteristicas_especiales"]);
			$(".multimediaVirtual").hide();
			$(".multimediaFisica").show();
			localStorage.setItem("multimediaFisica", "[]");
			console.log("respuesta", respuesta[0]["rutas_multimedia"]);
			if (respuesta[0]["rutas_multimedia"] && respuesta[0]["rutas_multimedia"] != "") {
				var imagenesMultimedia = (respuesta[0]["rutas_multimedia"]).split(',');
				var arrayImgRestantes = [];
				for (var i = 0; i < imagenesMultimedia.length; i++) {
					arrayImgRestantes.push({
						"foto": imagenesMultimedia[i].replace("admin/", "")
					});
					$(".previsualizarImgFisico").append(
						'<div class="col-md-3">' +
						'<div class="thumbnail text-center">' +
						'<img class="imagenesRestantes" src="' + imagenesMultimedia[i].replace("admin/", "") + '" style="width:100%">' +
						'<div class="removerImagen" style="cursor:pointer">Remove file</div>' +
						'</div>' +
						'</div>'
					);
					localStorage.setItem("multimediaFisica", JSON.stringify(arrayImgRestantes));
				}
				/*=============================================
				CUANDO ELIMINAMOS UNA IMAGEN DE LA LISTA
				=============================================*/
				$(".removerImagen").click(function() {
					$(this).parent().parent().remove();
					var imagenesRestantes = $(".imagenesRestantes");
					var arrayImgRestantes = [];
					for (var i = 0; i < imagenesRestantes.length; i++) {
						arrayImgRestantes.push({
							"foto": $(imagenesRestantes[i]).attr("src")
						})
					}
					localStorage.setItem("multimediaFisica", JSON.stringify(arrayImgRestantes));
				})
			}

			$(".multimediaEjemplo").show();
			localStorage.setItem("multimediaEjemplo", "[]");
			console.log("respuesta", respuesta[0]["rutas_ejemplos"]);
			if (respuesta[0]["rutas_ejemplos"] && respuesta[0]["rutas_ejemplos"] != "") {
				var imagenesMultimedia = (respuesta[0]["rutas_ejemplos"]).split(',');
				var arrayImgRestantes = [];
				for (var i = 0; i < imagenesMultimedia.length; i++) {
					arrayImgRestantes.push({
						"foto": imagenesMultimedia[i].replace("admin/", "")
					});
					$(".previsualizarImgEjemplo").append(
						'<div class="col-md-3">' +
						'<div class="thumbnail text-center">' +
						'<img class="imagenesRestantesEjemplo" src="' + imagenesMultimedia[i].replace("admin/", "") + '" style="width:100%">' +
						'<div class="removerImagenEjemplo" style="cursor:pointer">Remove file</div>' +
						'</div>' +
						'</div>'
					);
					localStorage.setItem("multimediaEjemplo", JSON.stringify(arrayImgRestantes));
				}
				/*=============================================
				CUANDO ELIMINAMOS UNA IMAGEN DE LA LISTA
				=============================================*/
				$(".removerImagenEjemplo").click(function() {
					$(this).parent().parent().remove();
					var imagenesRestantes = $(".imagenesRestantesEjemplo");
					var arrayImgRestantes = [];
					for (var i = 0; i < imagenesRestantes.length; i++) {
						arrayImgRestantes.push({
							"foto": $(imagenesRestantes[i]).attr("src")
						})
					}
					localStorage.setItem("multimediaEjemplo", JSON.stringify(arrayImgRestantes));
				})
			}

			$(".detallesVirtual").hide();
			$(".detallesFisicos").show();
			var detalles = JSON.parse(respuesta[0]["detalles"]);
			$(".editarPresentacion1").html(
				'<span class="input-group-addon"><i class="fa fa-info-circle"></i></span> <input class="form-control input-md detallePresentacion" value="' + detalles.Presentacion + '"  type="text" placeholder="Presentación del producto">'
			);
			/*============================================= 
			TRAEMOS LA CATEGORIA
			=============================================*/
			if (respuesta[0]["id_categorias_productos"] != null) {
				$('.CategoriaEditarSelect2').val(respuesta[0]["id_categorias_productos"].split(','));
			} else {
				$('.CategoriaEditarSelect2').val("");
			}
			$('.CategoriaEditarSelect2').trigger('change');


			if (respuesta[0]["id_videos"] != null) {
				$('.VideoEditarSelect2').val(respuesta[0]["id_videos"].split(','));
				console.log("respuesta[0][\"id_videos\"].split(',')", respuesta[0]["id_videos"].split(','));
			} else {
				$('.VideoEditarSelect2').val("");
			}
			$('.VideoEditarSelect2').trigger('change');
			/*=============================================
			TRAEMOS LA CLASE
			=============================================*/
			if (respuesta[0]["id_clases_productos"] != null) {
				$('.ClaseEditarSelect2').val(respuesta[0]["id_clases_productos"].split(','));
			} else {
				$('.ClaseEditarSelect2').val("");
			}
			$('.ClaseEditarSelect2').trigger('change');
			/*=============================================
			TRAEMOS EL GRUPO
			=============================================*/
			if (respuesta[0]["id_grupo"] != 0) {
				$("#modalEditarProducto .seleccionarGrupo").val(respuesta[0]["id_grupo"]).trigger("change");
			} else {
				$("#modalEditarProducto .seleccionarGrupo").val("-1").trigger("change");
			}
			$("#modalEditarProducto .seleccionarGrupo").change();
			/*=============================================
			TRAEMOS LA MARCA
			=============================================*/
			if (respuesta[0]["id_marca"] != 0) {
				$("#modalEditarProducto .seleccionarMarca").val(respuesta[0]["id_marca"]).trigger("change");
			} else {
				$("#modalEditarProducto .seleccionarMarca").val("-1").trigger("change");
			}
			$("#modalEditarProducto .seleccionarMarca").change();
			/*=============================================
			TRAEMOS LA FICHA
			=============================================*/
			$(".FichaTecnicaCrear").html("");
			$(".FichaTecnicaEditar").html(FichaTecnicaHTML);
			if (parseInt(respuesta[0]["IdArchivoFicha"]) > 0) {
				var IdArchivoFicha = parseInt(respuesta[0]["IdArchivoFicha"]);
				var RutaFicha = (respuesta[0]["RutaFicha"]);
				MostrarArchivo(IdArchivoFicha, RutaFicha);
			} else {
				MostrarArchivo(-1, "");
			}
			$("#modalEditarProducto .descripcionProducto").val(respuesta[0]["descripcion"]);
			/*=============================================
			CARGAMOS EL PRECIO, PESO Y DIAS DE ENTREGA
			=============================================*/
			$("#modalEditarProducto .precio").val(respuesta[0]["precio"]);
			$("#modalEditarProducto .peso").val(respuesta[0]["peso"]);
			$("#modalEditarProducto .entrega").val(respuesta[0]["entrega"]);
			$("#modalEditarProducto .tiendas").val(respuesta[0]["tiendas"]);
			$("#modalEditarProducto .empaqueProducto").val(respuesta[0]["empaque"]);
			$("#modalEditarProducto .reviews").val(respuesta[0]["reviews"]);
			$("#modalEditarProducto .videos").val(respuesta[0]["videos"]);
			/*=============================================
			PREGUNTAMOS SI EXITE OFERTA
			=============================================*/
			if (respuesta[0]["oferta"] != 0) {
				$("#modalEditarProducto .selActivarOferta").val("oferta");
				$("#modalEditarProducto .datosOferta").show();
				$("#modalEditarProducto .valorOferta").prop("required", true);
				$("#modalEditarProducto .precioOferta").val(respuesta[0]["precioOferta"]);
				$("#modalEditarProducto .descuentoOferta").val(respuesta[0]["descuentoOferta"]);
				if (respuesta[0]["precioOferta"] != 0) {
					$("#modalEditarProducto .precioOferta").prop("readonly", true);
					$("#modalEditarProducto .descuentoOferta").prop("readonly", false);
				}
				if (respuesta[0]["descuentoOferta"] != 0) {
					$("#modalEditarProducto .descuentoOferta").prop("readonly", true);
					$("#modalEditarProducto .precioOferta").prop("readonly", false);
				}
				$("#modalEditarProducto .previsualizarOferta").attr("src", respuesta[0]["imgOferta"]);
				$("#modalEditarProducto .antiguaFotoOferta").val(respuesta[0]["imgOferta"]);
				$("#modalEditarProducto .finOferta").val(respuesta[0]["finOferta"]);
			} else {
				$("#modalEditarProducto .selActivarOferta").val("");
				$("#modalEditarProducto .datosOferta").hide();
				$("#modalEditarProducto .valorOferta").prop("required", false);
				$("#modalEditarProducto .previsualizarOferta").attr("src", "vistas/img/ofertas/default/default.jpg");
				$("#modalEditarProducto .antiguaFotoOferta").val(respuesta[0]["imgOferta"]);
			}
			/*=============================================
			CREAR NUEVA OFERTA AL EDITAR
			=============================================*/
			$("#modalEditarProducto .selActivarOferta").change(function() {
				activarOferta($(this).val())
			})
			$("#modalEditarProducto .valorOferta").change(function() {
				if ($(this).attr("tipo") == "oferta") {
					var descuento = 100 - (Number($(this).val()) * 100 / Number($("#modalEditarProducto .precio").val()));
					$("#modalEditarProducto .precioOferta").prop("readonly", true);
					$("#modalEditarProducto .descuentoOferta").prop("readonly", false);
					$("#modalEditarProducto .descuentoOferta").val(Math.ceil(descuento));
				}
				if ($(this).attr("tipo") == "descuento") {
					var oferta = Number($("#modalEditarProducto .precio").val()) - (Number($(this).val()) * Number($("#modalEditarProducto .precio").val()) / 100);
					$("#modalEditarProducto .descuentoOferta").prop("readonly", true);
					$("#modalEditarProducto .precioOferta").prop("readonly", false);
					$("#modalEditarProducto .precioOferta").val(oferta);
				}
			});
		}
	});
});

var IDS_PRESENTACIONES=[];
var NOMBRES_PRESENTACIONES=[];
var SKU_PRESENTACIONES=[];
var COLORES_PRESENTACIONES=[];
function ObtenerPresentaciones() {
		var myRows = [];
	var headers = $(".table-condensed th");
	var rows = $(".table-condensed tr").each(function(index) {
	  var cells = $(this).find("td");
	  myRows[index] = {};
	  cells.each(function(cellIndex) {
	    myRows[index][$(headers[cellIndex]).html()] = $(this).html();
	  });    
	});
	console.log("myRows", myRows);
	IDS_PRESENTACIONES=[];
	NOMBRES_PRESENTACIONES=[];
	SKU_PRESENTACIONES=[];
	COLORES_PRESENTACIONES=[];
	for (var i = myRows.length - 1; i >= 0; i--) {
		for (var key in myRows[i]) {
		  	console.log(key, myRows[i][key]);
			if(key=='#'){
		  		IDS_PRESENTACIONES.push(myRows[i][key].trim());
			}
			if(key=='Presentation'){
		  		NOMBRES_PRESENTACIONES.push(myRows[i][key].trim());
			}
			if(key=='SKU'){
		  		SKU_PRESENTACIONES.push(myRows[i][key].trim());
			}
			if(key=='Color'){
		  		COLORES_PRESENTACIONES.push($(myRows[i][key]).attr('title').trim());
			}
		}
	}

	console.log("IDS_PRESENTACIONES", IDS_PRESENTACIONES);
	console.log("NOMBRES_PRESENTACIONES", NOMBRES_PRESENTACIONES);
	console.log("SKU_PRESENTACIONES", SKU_PRESENTACIONES);
	console.log("COLORES_PRESENTACIONES", COLORES_PRESENTACIONES);
}
$('.btnAgregarPresentacion').click(function() {

    var presentacion = $('.agregar-presentacion').val();
    console.log("presentacion", presentacion);
    var sku = $('.agregar-sku').val();
    console.log("sku", sku);
    var color = $('.agregar-color').colorpicker('getValue');
    console.log("color", color);
    if(isEmptyOrSpaces(presentacion)){
		swal('Indicar presentacion');
		return;
    }
     if(isEmptyOrSpaces(sku)){
		swal('Indicar sku');
		return;
    }
     if(isEmptyOrSpaces(color)){
		swal('Indicar color');
		return;
    }
	$('#modalEditarProducto .contenido-presentaciones').after(`
					   <tr>
                          <td><div class="btn-group"><button class="btn btn-danger btnEliminarPresentacion"><i class="fa fa-times"></i></button></div></td>
                          <td>NUEVA</td>
                          <td>`+presentacion+`</td>
                          <td>`+sku+`</td>
                          <td><span class="badge" data-toggle="tooltip" title="`+color+`" style='background: `+color+`'>&nbsp;&nbsp;</span></td>
                       </tr>`);
    $('.btnEliminarPresentacion').click(function() {
		$(this).parent().parent().parent().remove();
	});
	$('.agregar-presentacion').val('');
	$('.agregar-sku').val('');
});
/*=============================================
ELIMINAR PRODUCTO
=============================================*/
$(".tablaProductos tbody").on("click", ".btnEliminarProducto", function() {
	var idProducto = $(this).attr("idProducto");
	var imgOferta = $(this).attr("imgOferta");
	var rutaCabecera = $(this).attr("rutaCabecera");
	var imgPortada = $(this).attr("imgPortada");
	var imgPrincipal = $(this).attr("imgPrincipal");
	swal({
		title: 'Are you sure you delete the product?',
		text: "If it is not, you can cancel the action!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancel',
		confirmButtonText: 'Delete!'
	}).then(function(result) { 
		if (result.value) {
			var datosProducto = new FormData();
			datosProducto.append("ruta", "productos");
			datosProducto.append("idProducto", idProducto);
			datosProducto.append("EliminarIdProducto", idProducto);
			datosProducto.append("imgOferta", imgOferta);
			datosProducto.append("rutaCabecera", rutaCabecera);
			datosProducto.append("imgPortada", imgPortada); //
			datosProducto.append("imgPrincipal", imgPrincipal); //
			//window.location = "index.php?ruta=productos&idProducto=" + idProducto + "&imgOferta=" + imgOferta + "&rutaCabecera=" + rutaCabecera + "&imgPortada=" + imgPortada + "&imgPrincipal=" + imgPrincipal;
			$.ajax({
				url: "ajax/productos.ajax.php",
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
MENASAJES PRODUCTO
=============================================*/
var NeutroLenguaje = "MASC"; //"MASC"  "FEME"
var ArticuloILSU = NeutroLenguaje == "MASC" ? "El" : "La";
var ArticuloTerminacion = NeutroLenguaje == "MASC" ? "o" : "a";

function ProductoEditadaCorrectamente() {
	$(".tablaProductos").fadeOut("slow");
	swal({
		type: "success",
		title: "The product has  been saved",
		showConfirmButton: true,
		confirmButtonText: "Close"
	}).then(function(result) {
		location.reload();
		if (result.value) {
			TablaPrincipalProducto.ajax.reload(function() {
				setTimeout(function() {
					$(".tablaProductos").fadeIn("slow", function() {
						$('#modalEditarProducto').modal('toggle');
						imagenFotoPrincipal = null;
						arrayFiles = [];
						arrayFilesRutas = [];
						localStorage.setItem("multimediaFisica", "[]");
						localStorage.setItem("multimediaEjemplo", "[]");
						$('.CategoriaEditarSelect2').trigger('change');
						MostrarArchivo(-1, "");
						$('#modalEditarProducto .seleccionarGrupo').trigger('change');
						$('#modalEditarProducto .seleccionarMarca').trigger('change');
						$('#modalEditarProducto .multimediaFisica').html('<div class="dz-message needsclick">Arrastrar o dar click para subir imagenes.</div>');
						$('#modalEditarProducto .multimediaFisica').removeClass('dz-started');
						$('#modalEditarProducto .multimediaEjemplo').html('<div class="dz-message needsclick">Arrastrar o dar click para subir imagenes.</div>');
						$('#modalEditarProducto .multimediaEjemplo').removeClass('dz-started');
						document.getElementById("EditarFORM_ID").reset();
						$('.previsualizarPrincipal').attr('src', 'vistas/img/productos/default/default.jpg');
						imagenEditar = "";
						DeshabilitarClienteProducto('disabled', false);
					});
				}, 700);
			});
		}
	});
}

function ProductoNOEditadaCorrectamente() {
	swal({
		type: "error",
		title: "The product has not been saved, remove special chars",
		showConfirmButton: true,
		confirmButtonText: "Close"
	}).then(function(result) {
		if (result.value) {
			DeshabilitarClienteProducto('disabled', false);
		}
	});
}

function ProductoCreadaCorrectamente() {
	$(".tablaProductos").fadeOut("slow");
	swal({
		type: "success",
		title: "The product has  been saved",
		showConfirmButton: true,
		confirmButtonText: "Close"
	}).then(function(result) {
		
		if (result.value) {
			location.reload();
			TablaPrincipalProducto.ajax.reload(function() {
				// setTimeout(function() {
				// 	$(".tablaProductos").fadeIn("slow", function() {
				// 		$('#modalAgregarProducto').modal('toggle');
				// 		arrayFiles = [];
				// 		arrayFilesRutas = [];
				// 		localStorage.setItem("multimediaFisica", "[]");
				// 		localStorage.setItem("multimediaEjemplo", "[]");
				// 		$('.CategoriaCrearSelect2').val('');
				// 		$('.CategoriaCrearSelect2').trigger('change');
				// 		DefaultCrearModalRutaFicha = "";
				// 		DefaultCrearModalIdFicha = -1;
				// 		MostrarArchivo(-1, "");
				// 		$('#modalAgregarProducto .seleccionarGrupo').val('-1');
				// 		$('#modalAgregarProducto .seleccionarMarca').val('-1');
				// 		$('#modalAgregarProducto .seleccionarGrupo').trigger('change');
				// 		$('#modalAgregarProducto .seleccionarMarca').trigger('change');
				// 		$('#modalAgregarProducto .multimediaFisica').html('<div class="dz-message needsclick">Arrastrar o dar click para subir imagenes.</div>');
				// 		$('#modalAgregarProducto .multimediaFisica').removeClass('dz-started');
				// 		$('#modalAgregarProducto .multimediaEjemplo').html('<div class="dz-message needsclick">Arrastrar o dar click para subir imagenes.</div>');
				// 		$('#modalAgregarProducto .multimediaEjemplo').removeClass('dz-started');
						
				// 		document.getElementById("AgregarFORM_ID").reset();
				// 		$('.previsualizarPrincipal').attr('src', 'vistas/img/productos/default/default.jpg');
				// 		imagenEditar = "";
				// 		DeshabilitarClienteProducto('disabled', false);
				// 	});
				// }, 700);
			});
		}
	});
}

function ProductoNOCreadaCorrectamente() {
	swal({
		type: "error",
		title: "Not empty, not special chars!",
		showConfirmButton: true,
		confirmButtonText: "Close"
	}).then(function(result) {
		if (result.value) {
			DeshabilitarClienteProducto('disabled', false);
		}
	});
}

function ProductoBorradaCorrectamente() {
	$(".tablaProductos").fadeOut("slow");
	swal({
		type: "success",
		title: "Not empty, not special chars!",
		showConfirmButton: true,
		confirmButtonText: "Close"
	}).then(function(result) {
		if (result.value) {
			TablaPrincipalProducto.ajax.reload(function() {
				setTimeout(function() {
					$(".tablaProductos").fadeIn("slow", function() {});
				}, 70);
			});
		}
	});
}
/*
https://www.w3schools.com/html/tryit.asp?filename=tryhtml5_canvas_tut_img
<!DOCTYPE html>
<html>
<body>
<p>Image to use:</p>
<img id="scream" src="http://ar2design.com/devEcommerce/vistas/img/obraNegra.png">
<p>Canvas to fill:</p>
<canvas id="myCanvas"
style="border:1px solid #d3d3d3;">
Your browser does not support the HTML5 canvas tag.</canvas>
<p><button onclick="myCanvas()">Try it</button></p>
<script>
function myCanvas() {
    var c = document.getElementById("myCanvas");
    var ctx = c.getContext("2d");
    var img = document.getElementById("scream");
    var width = img.clientWidth;
	var height = img.clientHeight;
    var dim = Math.max(width, height);
    c.width=dim;
    c.height=dim;
    ctx.drawImage(img,0,0,width,height,(dim-width)/2,(dim-height)/2,width,height);
}
</script>
</body>
</html>*/
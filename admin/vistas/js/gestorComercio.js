$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
$("#guardarPaises").click(function() {
			var datos = new FormData();
			datos.append("campo", "paises");
			datos.append("dato", $('.js-example-basic-multiple').val().join());
			$.ajax({
				url: "ajax/comercio.ajax.php",
				method: "POST",
				data: datos,
				cache: false,
				contentType: false,
				processData: false,
				success: function(respuesta) {
					if (respuesta == "ok") {
						swal({
							title: "Success",
							text: "Cool!",
							type: "success",
							confirmButtonText: "Close"
						});
						location.reload();
					}
				}
			});
})
/*=============================================
SUBIR LOGOTIPO
=============================================*/
$("#subirLogo").change(function() {
	var imagenLogo = this.files[0];
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/
	if (imagenLogo["type"] != "image/jpeg" && imagenLogo["type"] != "image/png") {
		$("#subirLogo").val("");
		swal({
			title: "Error al subir la imagen",
			text: "¡La imagen debe estar en formato JPG o PNG!",
			type: "error",
			confirmButtonText: "¡Cerrar!"
		});
		/*=============================================
		VALIDAMOS EL TAMAÑO DE LA IMAGEN
		=============================================*/
	} else if (imagenLogo["size"] > 2000000) {
		$("#subirLogo").val("");
		swal({
			title: "Error al subir la imagen",
			text: "¡La imagen no debe pesar más de 2MB!",
			type: "error",
			confirmButtonText: "¡Cerrar!"
		});
		/*=============================================
		PREVISUALIZAMOS LA IMAGEN
		=============================================*/
	} else {
		var datosImagen = new FileReader;
		datosImagen.readAsDataURL(imagenLogo);
		$(datosImagen).on("load", function(event) {
			var rutaImagen = event.target.result;
			$(".previsualizarLogo").attr("src", rutaImagen);
		})
	}
	/*=============================================
	GUARDAR EL LOGOTIPO
	=============================================*/
	$("#guardarLogo").click(function() {
		var datos = new FormData();
		datos.append("imagenLogo", imagenLogo);
		$.ajax({
			url: "ajax/comercio.ajax.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			success: function(respuesta) {
				if (respuesta == "ok") {
					swal({
						title: "Cambios guardados",
						text: "¡La plantilla ha sido actualizada correctamente!",
						type: "success",
						confirmButtonText: "¡Cerrar!"
					}).then(function function_name(argument) {
						setTimeout(function function_name(argument) {
							window.open('https://developers.facebook.com/tools/debug/sharing/?q=http%3A%2F%2Far2design.com%2FdevEcommerce%2Fadmin%2F', '_blank');
						}, 3000);
					});;
				}
			}
		})
	})
})
/*=============================================
SUBIR CERTIFICADO
=============================================*/
$("#subirImagenExperiencia").change(function() {
	var subirImagenExperiencia = this.files[0];
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/
	if (subirImagenExperiencia["type"] != "image/jpeg" && subirImagenExperiencia["type"] != "image/png") {
		$("#subirImagenExperiencia").val("");
		swal({
			title: "Error al subir la imagen",
			text: "¡La imagen debe estar en formato JPG o PNG!",
			type: "error",
			confirmButtonText: "¡Cerrar!"
		});
		/*=============================================
		VALIDAMOS EL TAMAÑO DE LA IMAGEN
		=============================================*/
	} else if (subirImagenExperiencia["size"] > 2000000) {
		$("#subirImagenExperiencia").val("");
		swal({
			title: "Error al subir la imagen",
			text: "¡La imagen no debe pesar más de 2MB!",
			type: "error",
			confirmButtonText: "¡Cerrar!"
		});
		/*=============================================
		PREVISUALIZAMOS LA IMAGEN
		=============================================*/
	} else {
		SubirArchivo_FILE(subirImagenExperiencia, function(rutaImagen) {
			$(".previsualizarExperiencia").attr("src", rutaImagen.replace('admin/', ''));
			idArchivoImagenExperiencia = getNameFROM_FILE(rutaImagen);
			rutaImagenExperiencia = rutaImagen;
		});
	}
});
/*=============================================
GUARDAR EL LOGOTIPO
=============================================*/
$("#guardarExperiencia").click(function() {
	if (parseInt(idArchivoImagenExperiencia) < 1) {
		swal("Falta ingresar la nueva imagen");
		return;
	}
	var datos = new FormData();
	datos.append("rutaImagen", rutaImagenExperiencia);
	datos.append("idArchivoImagen", idArchivoImagenExperiencia);
	$.ajax({
		url: "ajax/comercio.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success: function(respuesta) {
			if (respuesta == "okok") {
				swal({
					title: "Cambios guardados",
					text: "¡La plantilla ha sido actualizada correctamente!",
					type: "success",
					confirmButtonText: "¡Cerrar!"
				});
			}
		}
	})
});
var rutaImagenExperiencia, idArchivoImagenExperiencia = 0;
/*=============================================
SUBIR ICONO
=============================================*/
$("#subirIcono").change(function() {
	var imagenIcono = this.files[0];
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/
	if (imagenIcono["type"] != "image/jpeg" && imagenIcono["type"] != "image/png") {
		$("#subirIcono").val("");
		swal({
			title: "Error al subir la imagen",
			text: "¡La imagen debe estar en formato JPG o PNG!",
			type: "error",
			confirmButtonText: "¡Cerrar!"
		});
		/*=============================================
		VALIDAMOS EL TAMAÑO DE LA IMAGEN
		=============================================*/
	} else if (imagenIcono["size"] > 2000000) {
		$("#subirIcono").val("");
		swal({
			title: "Error al subir la imagen",
			text: "¡La imagen no debe pesar más de 2MB!",
			type: "error",
			confirmButtonText: "¡Cerrar!"
		});
		/*=============================================
  	PREVISUALIZAMOS LA IMAGEN
  	=============================================*/
	} else {
		var datosImagen = new FileReader;
		datosImagen.readAsDataURL(imagenIcono);
		$(datosImagen).on("load", function(event) {
			var rutaImagen = event.target.result;
			$(".previsualizarIcono").attr("src", rutaImagen);
		})
	}
	/*=============================================
	GUARDAR EL ICONO
	=============================================*/
	$("#guardarIcono").click(function() {
		var datos = new FormData();
		datos.append("imagenIcono", imagenIcono);
		$.ajax({
			url: "ajax/comercio.ajax.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			success: function(respuesta) {
				if (respuesta == "ok") {
					swal({
						title: "Cambios guardados",
						text: "¡La plantilla ha sido actualizada correctamente!",
						type: "success",
						confirmButtonText: "¡Cerrar!"
					});
				}
			}
		});
	})
})
/*=============================================
CAMBIAR COLOR
=============================================*/
$(".cambioColor").change(function() {
	var barraSuperior = $("#barraSuperior").val();
	var textoSuperior = $("#textoSuperior").val();
	var colorFondo = $("#colorFondo").val();
	var colorTexto = $("#colorTexto").val();
	$("#guardarColores").click(function() {
		var datos = new FormData();
		datos.append("barraSuperior", barraSuperior);
		datos.append("textoSuperior", textoSuperior);
		datos.append("colorFondo", colorFondo);
		datos.append("colorTexto", colorTexto);
		$.ajax({
			url: "ajax/comercio.ajax.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			success: function(respuesta) {
				console.log("respuesta", respuesta);
				if (respuesta == "ok") {
					swal({
						title: "Cambios guardados",
						text: "¡La plantilla ha sido actualizada correctamente!",
						type: "success",
						confirmButtonText: "¡Cerrar!"
					});
				}
			}
		})
	})
})
/*=============================================
CAMBIAR COLOR REDES SOCIALES
=============================================*/
var checkBox = $(".seleccionarRed");
$("input[name='colorRedSocial']").on("ifChecked", function() {
	var color = $(this).val();
	var colorRed = null;
	var iconos = $(".redSocial");
	var redes = ["facebook", "youtube", "twitter", "google-plus", "instagram"];
	if (color == "color") {
		colorRed = "Color";
	} else if (color == "blanco") {
		colorRed = "Blanco";
	} else {
		colorRed = "Negro";
	}
	for (var i = 0; i < iconos.length; i++) {
		$(iconos[i]).attr("class", "fa fa-" + redes[i] + " " + redes[i] + colorRed + " redSocial");
		$(checkBox[i]).attr("estilo", redes[i] + colorRed);
	}
	crearDatosJsonRedes();
})
/*=============================================
CAMBIAR URL REDES SOCIALES
=============================================*/
$(".cambiarUrlRed").change(function() {
	var cambiarUrlRed = $(".cambiarUrlRed");
	for (var i = 0; i < cambiarUrlRed.length; i++) {
		$(checkBox[i]).attr("ruta", $(cambiarUrlRed[i]).val());
	}
	crearDatosJsonRedes();
})
/*=============================================
QUITAR RED SOCIAL
=============================================*/
$(".seleccionarRed").on("ifUnchecked", function() {
	$(this).attr("validarRed", "");
	//alert(0);
	crearDatosJsonRedes();
})
/*=============================================
AGREGAR RED SOCIAL
=============================================*/
$(".seleccionarRed").on("ifChecked", function() {
	$(this).attr("validarRed", $(this).attr("red"));
	//alert(1);
	crearDatosJsonRedes();
})
/*=============================================
CREAR DATOS JSON PARA ALMACENAR EN BD
=============================================*/
function crearDatosJsonRedes() {
	var redesSociales = [];
	for (var i = 0; i < checkBox.length; i++) {
		if ($(checkBox[i]).attr("validarRed") != "") {
			redesSociales.push({
				"red": $(checkBox[i]).attr("red"),
				"estilo": $(checkBox[i]).attr("estilo"),
				"url": $(checkBox[i]).attr("ruta"),
				"activo": 1
			})
		} else {
			redesSociales.push({
				"red": $(checkBox[i]).attr("red"),
				"estilo": $(checkBox[i]).attr("estilo"),
				"url": $(checkBox[i]).attr("ruta"),
				"activo": 0
			})
		}
		$("#valorRedesSociales").val(JSON.stringify(redesSociales));
	}
}
/*=============================================
GUARDAR REDES SOCIALES
=============================================*/
$("#guardarRedesSociales").click(function() {
	var valorRedesSociales = $("#valorRedesSociales").val();
	var datos = new FormData();
	datos.append("redesSociales", valorRedesSociales);
	$.ajax({
		url: "ajax/comercio.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success: function(respuesta) {
			if (respuesta == "ok") {
				swal({
					title: "Cambios guardados",
					text: "¡La plantilla ha sido actualizada correctamente!",
					type: "success",
					confirmButtonText: "¡Cerrar!"
				});
			}
		}
	})
})
/*=============================================
CAMBIAR CÓDIGOS
=============================================*/
$(".cambioScript").change(function() {
	var apiFacebook = $("#apiFacebook").val();
	var pixelFacebook = $("#pixelFacebook").val();
	var googleAnalytics = $("#googleAnalytics").val();
	$("#guardarScript").click(function() {
		var datos = new FormData();
		datos.append("apiFacebook", apiFacebook);
		datos.append("pixelFacebook", pixelFacebook);
		datos.append("googleAnalytics", googleAnalytics);
		$.ajax({
			url: "ajax/comercio.ajax.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			success: function(respuesta) {
				if (respuesta == "ok") {
					swal({
						title: "Cambios guardados",
						text: "¡La plantilla ha sido actualizada correctamente!",
						type: "success",
						confirmButtonText: "¡Cerrar!"
					});
				}
			}
		})
	})
})
/*=============================================
SELECCIONAR PAIS
=============================================*/
$.ajax({
	url: "vistas/js/countries.json",
	type: "GET",
	cache: false,
	contentType: false,
	processData: false,
	dataType: "json",
	success: function(respuesta) {
		respuesta.forEach(seleccionarPais);

		function seleccionarPais(item, index) {
			var pais = item.name;
			var codPais = item.code;
			if ($("#codigoPais").val() == codPais) {
				$("#paisSeleccionado").attr("value", codPais);
				$("#paisSeleccionado").html(pais);
			}
			$("#seleccionarPais").append('<option value="' + codPais + '">' + pais + '</option>');
		}
	}
})
/*=============================================
CAMBIAR INFORMACIÓN
=============================================*/
var impuesto = $("#impuesto").val();
var envioNacional = $("#envioNacional").val();
var envioInternacional = $("#envioInternacional").val();
var tasaMinimaNal = $("#tasaMinimaNal").val();
var tasaMinimaInt = $("#tasaMinimaInt").val();
var seleccionarPais = $("#codigoPais").val();
var clienteIdPaypal = $("#clienteIdPaypal").val();
var llaveSecretaPaypal = $("#llaveSecretaPaypal").val();
var merchantIdPayu = $("#merchantIdPayu").val();
var accountIdPayu = $("#accountIdPayu").val();
var apiKeyPayu = $("#apiKeyPayu").val();
/*=============================================
CAMBIAR MODO PAYPAL
=============================================*/
$("input[name='modoPaypal']").on("ifChecked", function() {
	var modoPaypal = $(this).val();
	var modoPayu = $("input[name='modoPayu']:checked").val();
	$("#guardarInformacion").click(function() {
		cambiarInformacion(modoPaypal, modoPayu);
	});
})
/*=============================================
CAMBIAR MODO PAYU
=============================================*/
$("input[name='modoPayu']").on("ifChecked", function() {
	var modoPayu = $(this).val();
	var modoPaypal = $("input[name='modoPaypal']:checked").val();
	$("#guardarInformacion").click(function() {
		cambiarInformacion(modoPaypal, modoPayu);
	});
})
/*=============================================
GUARDAR LA INFORMACION
=============================================*/
$(".cambioInformacion").change(function() {
	impuesto = $("#impuesto").val();
	envioNacional = $("#envioNacional").val();
	envioInternacional = $("#envioInternacional").val();
	tasaMinimaNal = $("#tasaMinimaNal").val();
	tasaMinimaInt = $("#tasaMinimaInt").val();
	seleccionarPais = $("#seleccionarPais").val();
	modoPaypal = $("input[name='modoPaypal']:checked").val();
	clienteIdPaypal = $("#clienteIdPaypal").val();
	llaveSecretaPaypal = $("#llaveSecretaPaypal").val();
	modoPayu = $("input[name='modoPayu']:checked").val();
	merchantIdPayu = $("#merchantIdPayu").val();
	accountIdPayu = $("#accountIdPayu").val();
	apiKeyPayu = $("#apiKeyPayu").val();
	$("#guardarInformacion").click(function() {
		cambiarInformacion(modoPaypal, modoPayu);
	})
})
/*=============================================
// FUNCIÓN PARA CAMBIAR LA INFORMACIÓN
=============================================*/
function cambiarInformacion(modoPaypal, modoPayu) {
	var datos = new FormData();
	datos.append("impuesto", impuesto);
	datos.append("envioNacional", envioNacional);
	datos.append("envioInternacional", envioInternacional);
	datos.append("tasaMinimaNal", tasaMinimaNal);
	datos.append("tasaMinimaInt", tasaMinimaInt);
	datos.append("seleccionarPais", seleccionarPais);
	datos.append("modoPaypal", modoPaypal);
	datos.append("clienteIdPaypal", clienteIdPaypal);
	datos.append("llaveSecretaPaypal", llaveSecretaPaypal);
	datos.append("modoPayu", modoPayu);
	datos.append("merchantIdPayu", merchantIdPayu);
	datos.append("accountIdPayu", accountIdPayu);
	datos.append("apiKeyPayu", apiKeyPayu);
	$.ajax({
		url: "ajax/comercio.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success: function(respuesta) {
			if (respuesta == "ok") {
				swal({
					title: "Cambios guardados",
					text: "¡El comercio ha sido actualizado correctamente!",
					type: "success",
					confirmButtonText: "¡Cerrar!"
				});
			}
		}
	})
}

$(document).ready(function() {
	setTimeout(function() {
		BarraCargando(1);
	}, 1000);
	CargarPDF();
	setTimeout(CargarPDF, 5000);
	setTimeout(function() {
		$(".ocultableDOCUMENTO").removeClass("ocultableDOCUMENTO");
		BarraCargando();
	}, 8000);
});
var i;

function CargarPDF() {
	canvas = document.getElementById('previsualizarPDF');
	setTimeout(function() {
		Mostrar($('#previsualizarTerminos').attr('pdflink').replace('admin/', ''));
	}, 1000);
	setTimeout(function() {
		$('#previsualizarTerminos').attr('src', canvasToImg());
	}, 2000);
	setTimeout(function() {
		Mostrar($('#previsualizarPrivacidad').attr('pdflink').replace('admin/', ''));
	}, 4000);
	setTimeout(function() {
		$('#previsualizarPrivacidad').attr('src', canvasToImg());
	}, 5000);
}

$(".canvasPDF").click(function() {
	window.open($(this).attr('pdflink').replace('admin/', ''), '_blank');
});
var CambiandofileDocumento;
$(".fileDocumento").change(function() {
	var input = this;
	if (input.files && input.files[0]) {
		CambiandofileDocumento = input.id;
		SubirArchivo(input.id, function(data) {
			var datos = new FormData();
			datos.append("CambiandofileDocumento", CambiandofileDocumento);
			datos.append("archivo", data);
			$.ajax({
				url: "ajax/comercio.ajax.php",
				method: "POST",
				data: datos,
				cache: false,
				contentType: false,
				processData: false,
				success: function(respuesta) {
					if (respuesta == "ok") {
						swal({
							title: "Success",
							text: "Cool!",
							type: "success",
							confirmButtonText: "Close"
						});
						location.reload();
					}
				}
			});
		});
	}
});

function canvasToImg() {
	var canvasTOIMG = document.getElementById("previsualizarPDF");
	var ctx = canvasTOIMG.getContext("2d");
	return canvasTOIMG.toDataURL();
}



  $("#subirHeader").change(function() {
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
  			$(" .previsualizarHeader").attr("src", rutaImagen.replace('admin/', ''));
  			$(" .rutaImagen").val(rutaImagen);
  			var IdArchivo = getNameFROM_FILE(rutaImagen);
  			$(" .idArchivoImagen").val(IdArchivo);
  		});
  	}
  });

  $("#guardarDefaults").click(function() {
			var datos = new FormData();
			datos.append("defaults", "1");
			datos.append("rutaImagen", $(".rutaImagen").val());
			datos.append("mensajeHeader", $(".mensajeHeader").val());
			$.ajax({
				url: "ajax/comercio.ajax.php",
				method: "POST",
				data: datos,
				cache: false,
				contentType: false,
				processData: false,
				success: function(respuesta) {
					if (respuesta == "ok") {
						swal({
							title: "Success",
							text: "Cool!",
							type: "success",
							confirmButtonText: "Close"
						});
						location.reload();
					}
				}
			});
});
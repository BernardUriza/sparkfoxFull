/*=============================================
AGREGAR SLIDE
=============================================*/
$(".agregarSlide").click(function(){
	var datos = new FormData();
	datos.append("crearSlide", "ok");
	$.ajax({
		url:"ajax/slide.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success: function(respuesta){
			if(respuesta == "ok"){
				swal({
				  type: "success",
				  title: "Slide added",
				  showConfirmButton: true,
				  confirmButtonText: "Close"
				  }).then((result) => {
					if (result.value) {
					window.location = "slide";
					}
				})
			}
		}
	})
})
/*=============================================
CAMBIAR EL ORDEN DEL SLIDE
=============================================*/
var itemSlide = $(".itemSlide");
$('.todo-list').sortable({
    placeholder         : 'sort-highlight',
    handle              : '.handle',
    forcePlaceholderSize: true,
    zIndex              : 999999,
    stop: function(event){
    	for(var i = 0; i < itemSlide.length; i++){
    		var datos = new FormData();
			datos.append("idSlide", event.target.children[i].id);
			datos.append("orden", (i+1));
			$.ajax({
				url:"ajax/slide.ajax.php",
				method: "POST",
				data: datos,
				cache: false,
				contentType: false,
				processData: false,
				success: function(respuesta){
				}
			})
    	}   
    }
});
/*=============================================
VARIABLES GLOBALES PARA CAMBIOS DEL SLIDE
=============================================*/
var guardarSlide = $(".guardarSlide");
var descripcion = $(".descripcion");
/*=============================================
ACTUALIZAR NOMBRE SLIDE
=============================================*/
$(".tituloSlide").change(function(){
	var titulo = $(this).val();
	var indiceSlide = $(this).attr("indice");
	$(guardarSlide[indiceSlide]).attr("tituloSlide", titulo);
})
/*=============================================
GUARDAR SLIDE
=============================================*/
$('.icheckvar').on('ifChanged', function(event) {
    $("#HID"+event.target.id).removeClass("checked")
	if(event.target.checked){
    	$("#HID"+event.target.id).addClass("checked")
	}
	else{
    	$("#HID"+event.target.id).removeClass("checked")
	}
});
$(".guardarSlide").click(function(){
	var id = $(this).attr("id");
	var indiceSlide = $(this).attr("indice");
	var titulo = $("#titulo"+id).val();
	var descripcion = $("#descripcion"+id).val();
	var uri = $("#uri"+id).val();
	var rutaImagenPortada = $("#rutaImagenPortada"+id).val();
	var tituloBool = $("#HIDtituloBool"+id).hasClass("checked");
	var descripcionBool = $("#HIDdescripcionBool"+id).hasClass("checked");
	console.log("descripcionBool", descripcionBool);
	console.log("id", id);
	var idArchivoImagenPortada = $("#idArchivoImagenPortada"+id).val();
	/*=============================================
	AJAX
	=============================================*/
	var datos = new FormData();
	datos.append("id", id);
	datos.append("titulo", titulo);
	datos.append("uri", uri);
	datos.append("descripcion", descripcion);
	datos.append("tituloBool", tituloBool);
	datos.append("descripcionBool", descripcionBool);
	datos.append("rutaImagenPortada", rutaImagenPortada);
	datos.append("idArchivoImagenPortada", idArchivoImagenPortada);
	$.ajax({
		url:"ajax/slide.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success: function(respuesta){
			if(respuesta == "ok"){
				swal({
				  type: "success",
				  title: "slide added",
				  showConfirmButton: true,
				  confirmButtonText: "Close"
				  }).then((result) => {
					if (result.value) {
					window.location = "slide";
					}
				})
			}
		}
	})
})
/*=============================================
ELIMINAR SLIDE
=============================================*/
$(".eliminarSlide").click(function(){
	var idSlide = $(this).attr("id");
	swal({
		title: '¿Está seguro de borrar el slide?',
		text: "¡Si no lo está puede cancelar la accíón!",
		type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar slide!'
        }).then((result) => {
        if (result.value) {
        	window.location = "index.php?ruta=slide&idSlide="+idSlide;
        }
	})
});
$(".imagen").change(function() {
	var imagen = this.files[0];
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/
	if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
		$(".imagenPortada").attr('src', 'vistas/img/slide-default.jpg');
		$(".imagen").val("");
		swal({
			title: "Error al subir la imagen",
			text: "¡La imagen debe estar en formato JPG o PNG!",
			type: "error",
			confirmButtonText: "¡Cerrar!"
		});
	} else {
		var IDE=this.id;
		SubirArchivo(IDE, function(rutaImagen) {
			$("#imagenPortada"+IDE.replace('imagen','')).attr("src", rutaImagen.replace('admin/', ''));
			$("#rutaImagenPortada"+IDE.replace('imagen','')).val(rutaImagen);
			var IdArchivo = getNameFROM_FILE(rutaImagen);
			$("#idArchivoImagenPortada"+IDE.replace('imagen','')).val(IdArchivo);
		});
	}
});
/*=============================================
CARGAR LA TABLA DINÁMICA DE VISITAS
=============================================*/

// $.ajax({

// 	url:"ajax/tablaVisitas.ajax.php",
// 	success:function(respuesta){
		
// 		console.log("respuesta", respuesta);

// 	}

// })

$(".tablaCotizaciones").DataTable({
	 "ajax": "ajax/tablaCotizaciones.ajax.php",
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
$(".tablaCotizaciones").on("click", ".btnVerProductos", function(){
	var idProductos = $(this).attr("idProductos").split(',');
  	var cantidades = $(this).attr("cantidades").split(',');
  	var nombres = $(this).attr("nombres").split(',');
  	var sku_colores = $(this).attr("sku_colores").split(',');
  	var sku_nombres = $(this).attr("sku_nombres").split(',');

  	var VISOR=$('.visor-productos').clone();
  	for (var i = idProductos.length - 1; i >= 0; i--) {
  		var stilo=(i% 2 == 0)?"#7575ce36;":"#f1969669";
	  	var newRowContent = `
	            <tr>  <th style="font-size: 21px; text-align: center; background-color: `+stilo+`;">`+cantidades[i]+`</th>
	            <th style="font-size: 21px; text-align: center;  background-color: `+stilo+`;">`+(sku_colores[i]?sku_colores[i]:'')+`</th>
	            <th style="font-size: 21px; text-align: center;  background-color: `+stilo+`;">`+(sku_nombres[i]?sku_nombres[i]:'')+`</th>
	              <th style="text-align: right;font-size: 21px; background-color: `+stilo+`;"><a href='productos--`+idProductos[i]+`'>`+nombres[i]+`</a></th></tr>`;
	  	VISOR.find( "tbody" ).append(newRowContent);
  	}
  	swal(VISOR.html());

});


/*=============================================
ELIMINAR PRODUCTO
========================================
$(".tablaCotizaciones").on("click", ".btnEliminar", function() {
	var idCotizacion = $(this).attr("idCotizacion");
	swal({
		title: '¿Está seguro de borrar el producto?',
		text: "¡Si no lo está puede cancelar la accíón!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, borrar producto!'
	}).then(function(result) {
		if (result.value) {
			var datosCotizacion = new FormData();
			datosCotizacion.append("idCotizacion", idCotizacion);
			datosCotizacion.append("cotizacion", 'borrar');
			$.ajax({
				url: "ajax/cotizaciones.ajax.php",
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
});=====*/
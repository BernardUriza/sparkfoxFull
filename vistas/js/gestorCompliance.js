$(document).ready(function() {
	Tabla = $('#table_id').DataTable();
});
var Tabla;
$(".btnBusqueda").click(function() {
	$('.esconderTabla').css("visibility", "hidden");
	Tabla.search($('.busquedaInput').val()).draw();
	if ($('.busquedaInput').val() == "") {
		swal({
  type: 'error',
  title: 'Oops...',
  text: 'Enter a data in the search field'
});
	} else {
		setTimeout(function() {
			$('.esconderTabla').css("visibility", "visible");
		}, 500);
	}
});
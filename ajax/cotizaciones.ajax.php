<?php
require_once "../controladores/cotizaciones.controlador.php";
require_once "../modelos/cotizaciones.modelo.php";
class AjaxCotizaciones{
	/*=============================================
	CREAR SUSCRIPTOR  
	=============================================*/	
	public function ajaxCrearCotizacion(){
		$respuesta = ControladorCotizaciones::ctrCrearCotizacion();
		echo json_encode($respuesta);
	}
 }
/*=============================================
CREAR SUSCRIPTOR   
=============================================*/
if(isset($_POST["cotizacion"])){
	$traerProducto = new AjaxCotizaciones();
	$traerProducto -> ajaxCrearCotizacion();
}
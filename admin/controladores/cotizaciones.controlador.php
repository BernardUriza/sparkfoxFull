<?php
class ControladorCotizaciones{
	/*=============================================
	MOSTRAR COTIZACIONES
	=============================================*/
	static public function ctrMostrarCotizaciones(){
		$tabla = "cotizaciones";
		$respuesta = ModeloCotizaciones::mdlMostrarCotizaciones($tabla);
		return $respuesta;
	}
}
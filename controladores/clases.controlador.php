<?php
class ControladorClases{
	/*=============================================
	MOSTRAR CLASES
	=============================================*/
	static public function ctrMostrarClases(){
		$tabla = "clases";
		$respuesta = ModeloClases::mdlMostrarClases($tabla, $item, $valor);
		return $respuesta;
	}
}
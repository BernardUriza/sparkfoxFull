<?php
class ControladorProductos{
	/*=============================================
	MOSTRAR PRODUCTOS
	=============================================*/
	static public function ctrMostrarProductos($id="-1"){
		//echo '<pre>'; print_r($id); echo '</pre>';
		$tabla = "productos";
		$respuesta = ModeloProductos::mdlMostrarProductos($tabla,$id);
		return $respuesta;
	}
	static public function ctrMostrarProductosL10($id="-1"){
		//echo '<pre>'; print_r($id); echo '</pre>';
		$tabla = "productos";
		$respuesta = ModeloProductos::mdlMostrarProductosL10($tabla,$id);
		return $respuesta;
	}
	static public function ctrMostrarProductosClases($clases){
		$tabla = "productos";
		$respuesta = ModeloProductos::mdlMostrarProductosClases($tabla,$clases);
		return $respuesta;
	}
}
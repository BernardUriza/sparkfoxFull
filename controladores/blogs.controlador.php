<?php
class ControladorBlogs{
	/*=============================================
	MOSTRAR PRODUCTOS
	=============================================*/
	static public function ctrMostrarBlogs($id="-1"){
		//echo '<pre>'; print_r($id); echo '</pre>';
		$tabla = "blog";
		$respuesta = ModeloBlogs::mdlMostrarBlogs($tabla,$id);
		return $respuesta;
	}
}
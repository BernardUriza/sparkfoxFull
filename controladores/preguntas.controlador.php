<?php
class ControladorPreguntas{
	/*=============================================
	MOSTRAR PREGUNTAS
	=============================================*/
	static public function ctrMostrarPreguntas(){
		$tabla = "preguntas";
		$respuesta = ModeloPreguntas::mdlMostrarPreguntas($tabla);
		return $respuesta;
	}
}
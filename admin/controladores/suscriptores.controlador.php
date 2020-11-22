<?php
class ControladorSuscriptores{

	/*=============================================
	MOSTRAR SUSCTRIPORES
	=============================================*/
	
	static public function ctrMostrarSuscriptores(){

		$tabla = "suscriptores";
	
		$respuesta = ModeloSuscriptores::mdlMostrarSuscriptores($tabla);
		
		return $respuesta;
	}


}
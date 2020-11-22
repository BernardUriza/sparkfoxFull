<?php
class ControladorSuscriptores{
	/*=============================================
	MOSTRAR SUSCTRIPORES
	=============================================*/
	static public function ctrCrearSuscriptor(){
		$tabla = "suscriptores";
		$ip=$_POST['ip'];
		$pais=$_POST['pais'];
		$codigo=$_POST['codigo'];
		$correo=$_POST['correo'];
		$respuesta = ModeloSuscriptores::mdlCrearSuscriptor($tabla,$ip,$pais,$codigo,$correo);
		return $respuesta;
	}
}
<?php
class ControladorCotizaciones{
	/*=============================================
	MOSTRAR SUSCTRIPORES
	=============================================*/
	static public function ctrCrearCotizacion(){
		$tabla = "cotizaciones";
		$ip=$_POST['ip'];
		$pais=$_POST['pais'];
		$codigo=$_POST['codigo'];
		$correo=$_POST['correo'];
		$nombre=$_POST['nombre'];
		$puesto=$_POST['puesto'];
		$empresa=$_POST['empresa'];
		$telefono=$_POST['telefono'];
		$mensaje=$_POST['mensaje'];
		$productos=$_POST['productos'];
		$respuesta = ModeloCotizaciones::mdlCrearCotizacion($tabla,$ip,$pais,$codigo,$correo,$nombre,$puesto,$empresa,$telefono,$mensaje,$productos);
		return $respuesta;
	}
}
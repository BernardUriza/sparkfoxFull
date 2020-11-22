<?php
require_once "../controladores/suscriptores.controlador.php";
require_once "../modelos/suscriptores.modelo.php";
class AjaxSuscriptores{
	/*=============================================
	CREAR SUSCRIPTOR  
	=============================================*/	
	public function ajaxCrearSuscriptor(){
		$respuesta = ControladorSuscriptores::ctrCrearSuscriptor();
		echo json_encode($respuesta);
	}
 }
/*=============================================
CREAR SUSCRIPTOR   
=============================================*/
if(isset($_POST["correo"])){
	$traerProducto = new AjaxSuscriptores();
	$traerProducto -> ajaxCrearSuscriptor();
}
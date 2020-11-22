<?php
require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";
class AjaxProductos{
	/*=============================================
	TRAER PRODUCTOS  
	=============================================*/	
	public $idProducto;
	public function ajaxTraerProducto(){
		$respuesta = ControladorProductos::ctrMostrarProductos($this->idProducto);
		echo json_encode($respuesta);
	}
 }

/*=============================================
TRAER PRODUCTO   
=============================================*/
if(isset($_POST["idProducto"])){
	$traerProducto = new AjaxProductos();
	$traerProducto -> idProducto = $_POST["idProducto"];
	$traerProducto -> ajaxTraerProducto();
}
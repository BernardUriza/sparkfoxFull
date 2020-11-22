<?php
require_once "../controladores/servicios.controlador.php";
require_once "../modelos/servicios.modelo.php";
require_once "../modelos/productos.modelo.php";
class AjaxServicios{
  /*=============================================
  EDITAR SERVICIO
  =============================================*/ 
  public $idServicio;
  public function ajaxEditarServicio(){
    $item = "id";
    $valor = $this->idServicio;
    $respuesta = ControladorServicios::ctrEditarServicio($item, $valor);
    echo ($respuesta);
  }
}
/*=============================================
EDITAR SERVICIO
=============================================*/
if(isset($_POST["idServicio"])){
  $editar = new AjaxServicios();
  $editar -> idServicio = $_POST["idServicio"];
  $editar -> ajaxEditarServicio();
}
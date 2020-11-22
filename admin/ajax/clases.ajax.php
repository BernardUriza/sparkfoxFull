<?php
require_once "../controladores/clases.controlador.php";
require_once "../modelos/clases.modelo.php";
require_once "../modelos/productos.modelo.php";
class AjaxClases{
  /*=============================================
  ACTIVAR CLASE
  =============================================*/ 
  public $activarClase;
  public $activarId;
  public function ajaxActivarClase(){
    $respuesta = ModeloClases::mdlActualizarClase("clases", "estado", $this->activarClase, "id", $this->activarId);
    echo $respuesta;
  }
  /*=============================================
  VALIDAR NO REPETIR CLASE
  =============================================*/ 
  public $validarClase;
  public function ajaxValidarClase(){
    $item = "clase";
    $valor = $this->validarClase;
    $respuesta = ControladorClases::ctrMostrarClases($item, $valor);
    echo json_encode($respuesta);
  }
  /*=============================================
  EDITAR CLASE
  =============================================*/ 
  public $idClase;
  public function ajaxEditarClase(){
    $item = "id";
    $valor = $this->idClase;
    $respuesta = ControladorClases::ctrMostrarClases($item, $valor);
    echo json_encode($respuesta);
  }
}
/*=============================================
ACTIVAR CLASE
=============================================*/
if(isset($_POST["activarClase"])){
  $activarClase = new AjaxClases();
  $activarClase -> activarClase = $_POST["activarClase"];
  $activarClase -> activarId = $_POST["activarId"];
  $activarClase -> ajaxActivarClase();
}
/*=============================================
VALIDAR NO REPETIR CLASE
=============================================*/
if(isset( $_POST["validarClase"])){
  $valClase = new AjaxClases();
  $valClase -> validarClase = $_POST["validarClase"];
  $valClase -> ajaxValidarClase();
}
/*=============================================
EDITAR CLASE
=============================================*/
if(isset($_POST["idClase"])){
  $editar = new AjaxClases();
  $editar -> idClase = $_POST["idClase"];
  $editar -> ajaxEditarClase();
}
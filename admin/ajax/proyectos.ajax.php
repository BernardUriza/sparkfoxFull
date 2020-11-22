<?php
require_once "../controladores/proyectos.controlador.php";
require_once "../modelos/proyectos.modelo.php";
require_once "../controladores/archivos.controlador.php";
require_once "../modelos/archivos.modelo.php";
class AjaxProyectos{
  /*=============================================
  ACTIVAR Proyecto
  =============================================*/	
  public $activarProyecto;
  public $activarId;
  public function ajaxActivarProyecto(){
  	$respuesta = ModeloProyectos::mdlActualizarProyecto("proyectos", "estado", $this->activarProyecto, "id", $this->activarId);
  	echo $respuesta;
  }
  /*=============================================
  VALIDAR NO REPETIR PROYECTO
  =============================================*/ 
  public $validarProyecto;
  public function ajaxValidarProyecto(){
    $item = "proyecto";
    $valor = $this->validarProyecto;
    $respuesta = ControladorProyectos::ctrMostrarProyectos($item, $valor);
    echo json_encode($respuesta);
  }
  /*=============================================
  VER PROYECTO
  =============================================*/ 
  public $idProyecto;
  public function ajaxEditarProyecto(){
    $item = "id";
    $valor = $this->idProyecto;
    $respuesta = ControladorProyectos::ctrMostrarProyectos($item, $valor);
    echo json_encode($respuesta);
  }
  /*=============================================
  EDITAR PROYECTO    
  =============================================*/ 
  public function ajaxEditarCambiarProyecto(){
    $respuesta = ControladorProyectos::ctrEditarProyecto();
    echo ($respuesta);
  }
  /*=============================================
  CREAR PROYECTO   
  =============================================*/ 
  public function ajaxCrearProyecto(){
    $respuesta = ControladorProyectos::ctrCrearProyecto();
    echo ($respuesta);
  }
  /*=============================================
  BORRAR PROYECTO   
  =============================================*/ 
  public function ajaxEliminarProyecto(){
    $respuesta = ControladorProyectos::ctrEliminarProyecto();
    echo ($respuesta);
  }
  /*=============================================
 TRAER PROYECTOS
  =============================================*/ 
  public $verProyectos;
  public function ajaxTraerProyecto(){
    $item = $this->verProyectos;
    $valor = $this->verProyectos;
    $respuesta = ControladorProyectos::ctrMostrarProyectos($item, $valor);
    echo json_encode($respuesta);
  }
}
/*=============================================
ACTIVAR PROYECTO
=============================================*/
if(isset($_POST["activarProyecto"])){
	$activarProyecto = new AjaxProyectos();
	$activarProyecto -> activarProyecto = $_POST["activarProyecto"];
	$activarProyecto -> activarId = $_POST["activarId"];
	$activarProyecto -> ajaxActivarProyecto();
}
/*=============================================
VALIDAR NO REPETIR PROYECTO
=============================================*/
if(isset( $_POST["validarProyecto"])){
  $valProyecto = new AjaxProyectos();
  $valProyecto -> validarProyecto = $_POST["validarProyecto"];
  $valProyecto -> ajaxValidarProyecto();
}
/*=============================================
VER PROYECTO
=============================================*/
if(isset($_POST["idProyecto"]) && !isset($_POST["idBorrar"])){
  $editar = new AjaxProyectos();
  $editar -> idProyecto = $_POST["idProyecto"];
  $editar -> ajaxEditarProyecto();
}
/*=============================================
EDITAR PROYECTO           
=============================================*/
if(isset($_POST["editarIdProyecto"]) && !isset($_POST["idBorrar"])){
  $editar = new AjaxProyectos();
  $editar -> ajaxEditarCambiarProyecto();
}
/*=============================================
CREAR PROYECTO          
=============================================*/
if(isset($_POST["tituloProyecto"])){
  $editar = new AjaxProyectos();
  $editar -> ajaxCrearProyecto();
}
/*=============================================
TRAER PROYECTOS
=============================================*/
if(isset($_POST["verProyecto"])){
  $editar = new AjaxProyectos();
  $editar -> verProyectos = null;//$_POST["verProyecto"];
  $editar -> ajaxTraerProyecto();
}
/*=============================================
TRAER PROYECTOS
=============================================*/
if(isset($_POST["idBorrar"])){
  $editar = new AjaxProyectos();
  $editar -> verProyectos = null;//$_POST["verProyecto"];
  $editar -> ajaxEliminarProyecto();
}
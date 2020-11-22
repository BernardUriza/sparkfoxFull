<?php
require_once "../controladores/preguntas.controlador.php";
require_once "../modelos/preguntas.modelo.php";
require_once "../controladores/archivos.controlador.php";
require_once "../modelos/archivos.modelo.php";
class AjaxPreguntas{
  /*=============================================
  ACTIVAR Pregunta
  =============================================*/	
  public $activarPregunta;
  public $activarId;
  public function ajaxActivarPregunta(){
  	$respuesta = ModeloPreguntas::mdlActualizarPregunta("preguntas", "estado", $this->activarPregunta, "id", $this->activarId);
  	echo $respuesta;
  }
  /*=============================================
  VALIDAR NO REPETIR PREGUNTA
  =============================================*/ 
  public $validarPregunta;
  public function ajaxValidarPregunta(){
    $item = "pregunta";
    $valor = $this->validarPregunta;
    $respuesta = ControladorPreguntas::ctrMostrarPreguntas($item, $valor);
    echo json_encode($respuesta);
  }
  /*=============================================
  VER PREGUNTA
  =============================================*/ 
  public $idPregunta;
  public function ajaxEditarPregunta(){
    $item = "id";
    $valor = $this->idPregunta;
    $respuesta = ControladorPreguntas::ctrMostrarPreguntas($item, $valor);
    echo json_encode($respuesta);
  }
  /*=============================================
  EDITAR PREGUNTA    
  =============================================*/ 
  public function ajaxEditarCambiarPregunta(){
    $respuesta = ControladorPreguntas::ctrEditarPregunta();
    echo ($respuesta);
  }
  /*=============================================
  CREAR PREGUNTA   
  =============================================*/ 
  public function ajaxCrearPregunta(){
    $respuesta = ControladorPreguntas::ctrCrearPregunta();
    echo ($respuesta);
  }
  /*=============================================
  BORRAR PREGUNTA   
  =============================================*/ 
  public function ajaxEliminarPregunta(){
    $respuesta = ControladorPreguntas::ctrEliminarPregunta();
    echo ($respuesta);
  }
  /*=============================================
 TRAER PREGUNTAS
  =============================================*/ 
  public $verPreguntas;
  public function ajaxTraerPregunta(){
    $item = $this->verPreguntas;
    $valor = $this->verPreguntas;
    $respuesta = ControladorPreguntas::ctrMostrarPreguntas($item, $valor);
    echo json_encode($respuesta);
  }
}
/*=============================================
ACTIVAR PREGUNTA
=============================================*/
if(isset($_POST["activarPregunta"])){
	$activarPregunta = new AjaxPreguntas();
	$activarPregunta -> activarPregunta = $_POST["activarPregunta"];
	$activarPregunta -> activarId = $_POST["activarId"];
	$activarPregunta -> ajaxActivarPregunta();
}
/*=============================================
VALIDAR NO REPETIR PREGUNTA
=============================================*/
if(isset( $_POST["validarPregunta"])){
  $valPregunta = new AjaxPreguntas();
  $valPregunta -> validarPregunta = $_POST["validarPregunta"];
  $valPregunta -> ajaxValidarPregunta();
}
/*=============================================
VER PREGUNTA
=============================================*/
if(isset($_POST["idPregunta"]) && !isset($_POST["idBorrar"])){
  $editar = new AjaxPreguntas();
  $editar -> idPregunta = $_POST["idPregunta"];
  $editar -> ajaxEditarPregunta();
}
/*=============================================
EDITAR PREGUNTA           
=============================================*/
if(isset($_POST["editarIdPregunta"]) && !isset($_POST["idBorrar"])){
  $editar = new AjaxPreguntas();
  $editar -> ajaxEditarCambiarPregunta();
}
/*=============================================
CREAR PREGUNTA          
=============================================*/
if(isset($_POST["tituloPregunta"])){
  $editar = new AjaxPreguntas();
  $editar -> ajaxCrearPregunta();
}
/*=============================================
TRAER PREGUNTAS
=============================================*/
if(isset($_POST["verPregunta"])){
  $editar = new AjaxPreguntas();
  $editar -> verPreguntas = null;//$_POST["verPregunta"];
  $editar -> ajaxTraerPregunta();
}
/*=============================================
TRAER PREGUNTAS
=============================================*/
if(isset($_POST["idBorrar"])){
  $editar = new AjaxPreguntas();
  $editar -> verPreguntas = null;//$_POST["verPregunta"];
  $editar -> ajaxEliminarPregunta();
}
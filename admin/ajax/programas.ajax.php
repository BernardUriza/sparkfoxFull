<?php
require_once "../controladores/programas.controlador.php";
require_once "../modelos/programas.modelo.php";
// require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";
class AjaxProgramas{
  /*=============================================
  ACTIVAR Programa
  =============================================*/	
  public $activarPrograma;
  public $activarId;
  public function ajaxActivarPrograma(){
  	$respuesta = ModeloProgramas::mdlActualizarPrograma("programas", "estado", $this->activarPrograma, "id", $this->activarId);
  	echo $respuesta;
  }
  /*=============================================
  VALIDAR NO REPETIR PROGRAMA
  =============================================*/ 
  public $validarPrograma;
  public function ajaxValidarPrograma(){
    $item = "programa";
    $valor = $this->validarPrograma;
    $respuesta = ControladorProgramas::ctrMostrarProgramas($item, $valor);
    echo json_encode($respuesta);
  }
  /*=============================================
  VER PROGRAMA
  =============================================*/ 
  public $idPrograma;
  public function ajaxEditarPrograma(){
    $item = "id";
    $valor = $this->idPrograma;
    $respuesta = ControladorProgramas::ctrMostrarProgramas($item, $valor);
    echo json_encode($respuesta);
  }
  /*=============================================
  EDITAR PROGRAMA    
  =============================================*/ 
  public function ajaxEditarCambiarPrograma(){
    $respuesta = ControladorProgramas::ctrEditarPrograma();
    echo ($respuesta);
  }
  /*=============================================
  CREAR PROGRAMA   
  =============================================*/ 
  public function ajaxCrearPrograma(){
    $respuesta = ControladorProgramas::ctrCrearPrograma();
    echo ($respuesta);
  }
  /*=============================================
  BORRAR PROGRAMA   
  =============================================*/ 
  public function ajaxEliminarPrograma(){
    $respuesta = ControladorProgramas::ctrEliminarPrograma();
    echo ($respuesta);
  }
  /*=============================================
 TRAER PROGRAMAS
  =============================================*/ 
  public $verProgramas;
  public function ajaxTraerPrograma(){
    $item = $this->verProgramas;
    $valor = $this->verProgramas;
    $respuesta = ControladorProgramas::ctrMostrarProgramas($item, $valor);
    echo json_encode($respuesta);
  }
}
/*=============================================
ACTIVAR PROGRAMA
=============================================*/
if(isset($_POST["activarPrograma"])){
	$activarPrograma = new AjaxProgramas();
	$activarPrograma -> activarPrograma = $_POST["activarPrograma"];
	$activarPrograma -> activarId = $_POST["activarId"];
	$activarPrograma -> ajaxActivarPrograma();
}
/*=============================================
VALIDAR NO REPETIR PROGRAMA
=============================================*/
if(isset( $_POST["validarPrograma"])){
  $valPrograma = new AjaxProgramas();
  $valPrograma -> validarPrograma = $_POST["validarPrograma"];
  $valPrograma -> ajaxValidarPrograma();
}
/*=============================================
VER PROGRAMA
=============================================*/
if(isset($_POST["idPrograma"]) && !isset($_POST["idBorrar"])){
  $editar = new AjaxProgramas();
  $editar -> idPrograma = $_POST["idPrograma"];
  $editar -> ajaxEditarPrograma();
}
/*=============================================
EDITAR PROGRAMA           
=============================================*/
if(isset($_POST["editarIdPrograma"]) && !isset($_POST["idBorrar"])){
  $editar = new AjaxProgramas();
  $editar -> ajaxEditarCambiarPrograma();
}
/*=============================================
CREAR PROGRAMA          
=============================================*/
if(isset($_POST["tituloPrograma"])){
  $editar = new AjaxProgramas();
  $editar -> ajaxCrearPrograma();
}
/*=============================================
TRAER PROGRAMAS
=============================================*/
if(isset($_POST["verPrograma"])){
  $editar = new AjaxProgramas();
  $editar -> verProgramas = null;//$_POST["verPrograma"];
  $editar -> ajaxTraerPrograma();
}
/*=============================================
TRAER PROGRAMAS
=============================================*/
if(isset($_POST["idBorrar"])){
  $editar = new AjaxProgramas();
  $editar -> verProgramas = null;//$_POST["verPrograma"];
  $editar -> ajaxEliminarPrograma();
}
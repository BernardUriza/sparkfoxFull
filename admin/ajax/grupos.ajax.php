<?php

require_once "../controladores/grupos.controlador.php";
require_once "../modelos/grupos.modelo.php";


// require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

class AjaxGrupos{

  /*=============================================
  ACTIVAR Grupo
  =============================================*/	

  public $activarGrupo;
  public $activarId;

  public function ajaxActivarGrupo(){


  	$respuesta = ModeloGrupos::mdlActualizarGrupo("grupos", "estado", $this->activarGrupo, "id", $this->activarId);

  	echo $respuesta;

  }

  /*=============================================
  VALIDAR NO REPETIR GRUPO
  =============================================*/ 

  public $validarGrupo;

  public function ajaxValidarGrupo(){

    $item = "grupo";
    $valor = $this->validarGrupo;

    $respuesta = ControladorGrupos::ctrMostrarGrupos($item, $valor);

    echo json_encode($respuesta);

  }

  /*=============================================
  EDITAR GRUPO
  =============================================*/ 

  public $idGrupo;

  public function ajaxEditarGrupo(){

    $item = "id";
    $valor = $this->idGrupo;

    $respuesta = ControladorGrupos::ctrMostrarGrupos($item, $valor);

    echo json_encode($respuesta);

  }

  /*=============================================
 TRAER GRUPOS
  =============================================*/ 

  public $verGrupos;

  public function ajaxTraerGrupo(){

    $item = $this->verGrupos;
    $valor = $this->verGrupos;

    $respuesta = ControladorGrupos::ctrMostrarGrupos($item, $valor);

    echo json_encode($respuesta);

  }

  /*=============================================
 CREAR GRUPO
  =============================================*/ 

  public $nombreGrupo;

  public function ajaxCrearGrupo(){
    $item = $this->nombreGrupo;
    $respuesta = ControladorGrupos::ctrCrearGrupoId($item);
    echo ($respuesta);
  }

}

/*=============================================
ACTIVAR GRUPO
=============================================*/

if(isset($_POST["activarGrupo"])){

	$activarGrupo = new AjaxGrupos();
	$activarGrupo -> activarGrupo = $_POST["activarGrupo"];
	$activarGrupo -> activarId = $_POST["activarId"];
	$activarGrupo -> ajaxActivarGrupo();

}

/*=============================================
VALIDAR NO REPETIR GRUPO
=============================================*/

if(isset( $_POST["validarGrupo"])){

  $valGrupo = new AjaxGrupos();
  $valGrupo -> validarGrupo = $_POST["validarGrupo"];
  $valGrupo -> ajaxValidarGrupo();

}

/*=============================================
EDITAR GRUPO
=============================================*/
if(isset($_POST["idGrupo"])){

  $editar = new AjaxGrupos();
  $editar -> idGrupo = $_POST["idGrupo"];
  $editar -> ajaxEditarGrupo();

}


/*=============================================
TRAER GRUPOS
=============================================*/
if(isset($_POST["verGrupo"])){

  $editar = new AjaxGrupos();
  $editar -> verGrupos = null;//$_POST["verGrupo"];
  $editar -> ajaxTraerGrupo();

}

/*=============================================
CREAR GRUPO
=============================================*/
if(isset($_POST["crearGrupo"])){

  $editar = new AjaxGrupos();
  $editar -> nombreGrupo = $_POST["crearGrupo"];
  $editar -> ajaxCrearGrupo();

}

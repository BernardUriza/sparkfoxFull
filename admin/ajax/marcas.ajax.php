<?php

require_once "../controladores/marcas.controlador.php";
require_once "../modelos/marcas.modelo.php";


// require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

class AjaxMarcas{

  /*=============================================
  ACTIVAR Marca
  =============================================*/	

  public $activarMarca;
  public $activarId;

  public $DesdeProductos;

  public function ajaxActivarMarca(){


  	$respuesta = ModeloMarcas::mdlActualizarMarca("marcas", "estado", $this->activarMarca, "id", $this->activarId);

  	echo $respuesta;

  }

  /*=============================================
  VALIDAR NO REPETIR MARCA
  =============================================*/ 

  public $validarMarca;

  public function ajaxValidarMarca(){

    $item = "marca";
    $valor = $this->validarMarca;

    $respuesta = ControladorMarcas::ctrMostrarMarcas($item, $valor);

    echo json_encode($respuesta);

  }

  /*=============================================
  VER MARCA
  =============================================*/ 

  public $idMarca;

  public function ajaxEditarMarca(){

    $item = "id";
    $valor = $this->idMarca;

    $respuesta = ControladorMarcas::ctrMostrarMarcas($item, $valor);

    echo json_encode($respuesta);

  }
  /*=============================================
  EDITAR MARCA    
  =============================================*/ 

  public function ajaxEditarCambiarMarca(){

    $respuesta = ControladorMarcas::ctrEditarMarca();

    echo ($respuesta);

  }
  /*=============================================
  CREAR MARCA   
  =============================================*/ 

  public function ajaxCrearMarca(){

    $respuesta = ControladorMarcas::ctrCrearMarca();
    echo ($respuesta);

  }
  /*=============================================
  BORRAR MARCA   
  =============================================*/ 

  public function ajaxEliminarMarca(){

    $respuesta = ControladorMarcas::ctrEliminarMarca();
    echo ($respuesta);
  }
  /*=============================================
 TRAER MARCAS
  =============================================*/ 

  public $verMarcas;

  public function ajaxTraerMarca(){

    $item = $this->verMarcas;
    $valor = $this->verMarcas;
    $DesdeProductos = $this->DesdeProductos;

    $respuesta = ControladorMarcas::ctrMostrarMarcas($item, $valor, $DesdeProductos);

    echo json_encode($respuesta);

  }

  /*=============================================
  CREAR MARCAS DESDE PRODUCTOS
  =============================================*/ 
  public $nombreMarca;

    public function ajaxCrearMarcaNueva(){

    $item = $this->nombreMarca;
    $DesdeProductos = $this->DesdeProductos;

    $respuesta = ControladorMarcas::ctrCrearMarcaNueva($item,$DesdeProductos);

    echo ($respuesta);

  }

}

/*=============================================
ACTIVAR MARCA
=============================================*/

if(isset($_POST["activarMarca"])){

	$activarMarca = new AjaxMarcas();
	$activarMarca -> activarMarca = $_POST["activarMarca"];
	$activarMarca -> activarId = $_POST["activarId"];
	$activarMarca -> ajaxActivarMarca();

}

/*=============================================
VALIDAR NO REPETIR MARCA
=============================================*/

if(isset( $_POST["validarMarca"])){

  $valMarca = new AjaxMarcas();
  $valMarca -> validarMarca = $_POST["validarMarca"];
  $valMarca -> ajaxValidarMarca();

}

/*=============================================
VER MARCA
=============================================*/
if(isset($_POST["idMarca"]) && !isset($_POST["idBorrar"])){

  $editar = new AjaxMarcas();
  $editar -> idMarca = $_POST["idMarca"];
  $editar -> ajaxEditarMarca();

}

/*=============================================
EDITAR MARCA           
=============================================*/
if(isset($_POST["editarIdMarca"]) && !isset($_POST["idBorrar"])){

  $editar = new AjaxMarcas();
  $editar -> ajaxEditarCambiarMarca();

}

/*=============================================
CREAR MARCA          
=============================================*/
if(isset($_POST["tituloMarca"])){
  $editar = new AjaxMarcas();
  $editar -> ajaxCrearMarca();
 
        
}


/*=============================================
TRAER MARCAS
=============================================*/
if(isset($_POST["verMarca"])){

  $editar = new AjaxMarcas();
  $editar -> verMarcas = null;//$_POST["verMarca"]; 
  $editar -> DesdeProductos = $_POST["DesdeProductos"];//$_POST["verMarca"]; 
  $editar -> ajaxTraerMarca();

}

/*=============================================
TRAER MARCAS
=============================================*/
if(isset($_POST["idBorrar"])){

  $editar = new AjaxMarcas();
  $editar -> verMarcas = null;//$_POST["verMarca"];
  $editar -> ajaxEliminarMarca();

}

/*=============================================
CREAR MARCA
=============================================*/
if(isset($_POST["crearMarca"])){

  $editar = new AjaxMarcas();
  $editar -> nombreMarca = $_POST["crearMarca"];
  $editar -> DesdeProductos = $_POST["DesdeProductos"];
  $editar -> ajaxCrearMarcaNueva();

}

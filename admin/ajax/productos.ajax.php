<?php
require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";
require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";
require_once "../controladores/clases.controlador.php";
require_once "../modelos/clases.modelo.php";
require_once "../controladores/archivos.controlador.php";
require_once "../modelos/archivos.modelo.php";
class AjaxProductos{
	/*=============================================
  	ACTIVAR PRODUCTOS
 	=============================================*/	
 	public $activarProducto;
	public $activarId;
	public function ajaxActivarProducto(){
		$tabla = "productos";
		$item1 = "estado";
		$valor1 = $this->activarProducto;
		$item2 = "id";
		$valor2 = $this->activarId;	
		$respuesta = ModeloProductos::mdlActualizarProductos($tabla, $item1, $valor1, $item2, $valor2);
		echo $respuesta;
	}
	/*=============================================
	VALIDAR NO REPETIR PRODUCTO
	=============================================*/	
	public $validarProducto;
	public function ajaxValidarProducto(){
		$item = "titulo";
		$valor = $this->validarProducto;
		$respuesta = ControladorProductos::ctrMostrarProductos($item, $valor);
		echo json_encode($respuesta);
	}
	/*=============================================
	GUARDAR PRODUCTO Y EDITAR PRODUCTO
	=============================================*/	
	public $tituloProducto;
	public $rutaProducto;
	public $codigo;
	public $detalles;			
	public $seleccionarCategoria;
	public $seleccionarClase;
	public $seleccionarGrupo;
	public $seleccionarMarca;
	public $descripcionProducto;
	public $caracteristicasProducto;
	public $pClavesProducto;
	public $precio;
	public $multimedia;
	public $multimediaEjemplo;
	public $RutaFicha;
	public $empaque;
	public $IdArchivoFicha;
	public $id;
	public $idArchivoImagenPortada;
	public $rutaImagenPortada;
	public $idArchivoImagenHeader;
	public $rutaImagenHeader;
	public $videos;
	public function  ajaxCrearProducto(){
		$datos = array(
			"tituloProducto"=>$this->tituloProducto,
			"rutaProducto"=>$this->rutaProducto,
			"codigo"=>$this->codigo,
			"detalles"=>$this->detalles,					
			"categoria"=>$this->seleccionarCategoria,
			"clase"=>$this->seleccionarClase,
			"grupo"=>$this->seleccionarGrupo,
			"marca"=>$this->seleccionarMarca,
			"descripcionProducto"=>$this->descripcionProducto,
			"caracteristicasProducto"=>$this->caracteristicasProducto,
			"pClavesProducto"=>$this->pClavesProducto,
			"multimedia"=>$this->multimedia,
			"RutaFicha"=>$this->RutaFicha,
			"empaque"=>$this->empaque,
			"IdArchivoFicha"=>$this->IdArchivoFicha,
			"idArchivoImagenPortada"=>$this->idArchivoImagenPortada,
			"rutaImagenPortada"=>$this->rutaImagenPortada,
			"idArchivoImagenHeader"=>$this->idArchivoImagenHeader,
			"rutaImagenHeader"=>$this->rutaImagenHeader,
			"multimediaEjemplo"=>$this->multimediaEjemplo
			);
		$respuesta = ControladorProductos::ctrCrearProducto($datos);
		echo $respuesta;
	}
	/*=============================================
	TRAER PRODUCTOS  
	=============================================*/	
	public $idProducto;
	public function ajaxTraerProducto(){
		$item = "id";
		$valor = $this->idProducto;
		$respuesta = ControladorProductos::ctrMostrarProductos($item, $valor);
		echo json_encode($respuesta);
	}
	/*=============================================
	BORRAR PRODUCTOS  
	=============================================*/	
	public function ajaxBorrarProducto(){
		$respuesta = ControladorProductos::ctrEliminarProducto();
		echo ($respuesta);
	}
	public function verVideos(){
		$respuesta = ControladorProductos::verVideos();
		echo json_encode($respuesta);
	}
	/*=============================================
	EDITAR PRODUCTOS
	=============================================*/	
	public function  ajaxEditarProducto(){
		$datos = array(
			"idProducto"=>$this->id,
			"tituloProducto"=>$this->tituloProducto,
			"rutaProducto"=>$this->rutaProducto,
			"codigo"=>$this->codigo,
			"detalles"=>$this->detalles,					
			"categoria"=>$this->seleccionarCategoria,	
			"clase"=>$this->seleccionarClase,
			"grupo"=>$this->seleccionarGrupo,
			"marca"=>$this->seleccionarMarca,
			"descripcionProducto"=>$this->descripcionProducto,
			"caracteristicasProducto"=>$this->caracteristicasProducto,
			"pClavesProducto"=>$this->pClavesProducto,
			"precio"=>$this->precio,
			"multimedia"=>$this->multimedia,
			"RutaFicha"=>$this->RutaFicha,
			"empaque"=>$this->empaque,
			"videos"=>$this->videos,
			"tiendas"=>$this->tiendas,
			"reviews"=>$this->reviews,
			"IdArchivoFicha"=>$this->IdArchivoFicha,
			"idArchivoImagenPortada"=>$this->idArchivoImagenPortada,
			"rutaImagenPortada"=>$this->rutaImagenPortada,
			"idArchivoImagenHeader"=>$this->idArchivoImagenHeader,
			"rutaImagenHeader"=>$this->rutaImagenHeader,
			"multimediaEjemplo"=>$this->multimediaEjemplo
			);
		$respuesta = ControladorProductos::ctrEditarProducto($datos);
		echo $respuesta;
	}
 }

 if(isset($_POST["verVideos"])){
	$activarProducto = new AjaxProductos();
	$activarProducto -> verVideos();
}
/*=============================================
ACTIVAR PRODUCTOS
=============================================*/	
if(isset($_POST["activarProducto"])){
	$activarProducto = new AjaxProductos();
	$activarProducto -> activarProducto = $_POST["activarProducto"];
	$activarProducto -> activarId = $_POST["activarId"];
	$activarProducto -> ajaxActivarProducto();
}
/*=============================================
VALIDAR NO REPETIR PRODUCTO
=============================================*/
if(isset($_POST["validarProducto"])){
	$valProducto = new AjaxProductos();
	$valProducto -> validarProducto = $_POST["validarProducto"];
	$valProducto -> ajaxValidarProducto();
}
#CREAR PRODUCTO
#-----------------------------------------------------------
if(isset($_POST["tituloProducto"])){
	$producto = new AjaxProductos();
	$producto -> tituloProducto = $_POST["tituloProducto"];
	$producto -> rutaProducto = $_POST["rutaProducto"];
	$producto -> codigo = $_POST["codigo"];
	$producto -> detalles = $_POST["detalles"];		
	$producto -> seleccionarCategoria = $_POST["seleccionarCategoria"];
	$producto -> seleccionarClase = $_POST["seleccionarClase"];
	$producto -> seleccionarGrupo = $_POST["seleccionarGrupo"];
	$producto -> seleccionarMarca = $_POST["seleccionarMarca"];
	$producto -> descripcionProducto = $_POST["descripcionProducto"];
	$producto -> caracteristicasProducto = $_POST["caracteristicasProducto"];
	$producto -> pClavesProducto = $_POST["pClavesProducto"];
	$producto -> precio = $_POST["precio"];
	$producto -> multimedia = $_POST["multimedia"];
	$producto -> IdArchivoFicha = $_POST["IdArchivoFicha"];
	$producto -> RutaFicha = $_POST["RutaFicha"];
	$producto -> empaque = $_POST["empaque"];
	$producto -> idArchivoImagenPortada = $_POST["idArchivoImagenPortada"];
	$producto -> rutaImagenPortada = $_POST["rutaImagenPortada"];
	$producto -> ajaxCrearProducto();
}
/*=============================================
ELIMINAR PRODUCTO   
=============================================*/
if(isset($_POST["EliminarIdProducto"])){
	$borrraProducto = new AjaxProductos();
	$borrraProducto -> ajaxBorrarProducto();
}
/*=============================================
TRAER PRODUCTO   
=============================================*/
if(isset($_POST["idProducto"]) && !isset($_POST["EliminarIdProducto"])){
	$traerProducto = new AjaxProductos();
	$traerProducto -> idProducto = $_POST["idProducto"];
	$traerProducto -> ajaxTraerProducto();
}
/*=============================================
EDITAR PRODUCTO
=============================================*/
if(isset($_POST["id"])){
	$editarProducto = new AjaxProductos();
	$editarProducto -> id = $_POST["id"];
	$editarProducto -> tituloProducto = $_POST["editarProducto"];
	$editarProducto -> rutaProducto = $_POST["rutaProducto"];
	$editarProducto -> codigo = $_POST["codigo"];
	$editarProducto -> detalles = $_POST["detalles"];		
	$editarProducto -> seleccionarCategoria = $_POST["seleccionarCategoria"];
	$editarProducto -> seleccionarClase = $_POST["seleccionarClase"];
	$editarProducto -> seleccionarGrupo = $_POST["seleccionarGrupo"];
	$editarProducto -> seleccionarMarca = $_POST["seleccionarMarca"];
	$editarProducto -> descripcionProducto = $_POST["descripcionProducto"];
	$editarProducto -> caracteristicasProducto = $_POST["caracteristicasProducto"];
	$editarProducto -> pClavesProducto = $_POST["pClavesProducto"];
	$editarProducto -> precio = $_POST["precio"];
	$editarProducto -> multimedia = $_POST["multimedia"];
	$editarProducto -> multimediaEjemplo = $_POST["multimediaEjemplos"];
	$editarProducto -> IdArchivoFicha = $_POST["IdArchivoFicha"];
	$editarProducto -> RutaFicha = $_POST["RutaFicha"];
	$editarProducto -> empaque = $_POST["empaque"];
	$editarProducto -> tiendas = $_POST["tiendas"];
	$editarProducto -> reviews = $_POST["reviews"];
	$editarProducto -> idArchivoImagenPortada = $_POST["idArchivoImagenPortada"];
	$editarProducto -> rutaImagenPortada = $_POST["rutaImagenPortada"];
	$editarProducto -> rutaImagenHeader = $_POST["rutaImagenHeader"];
	$editarProducto -> videos = $_POST["videos"];
	$editarProducto -> idArchivoImagenHeader = $_POST["idArchivoImagenHeader"];
	$editarProducto -> ajaxEditarProducto();
}
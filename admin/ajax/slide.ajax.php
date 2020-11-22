<?php
require_once "../controladores/slide.controlador.php";
require_once "../modelos/slide.modelo.php";
require_once "../controladores/archivos.controlador.php";
require_once "../modelos/archivos.modelo.php";
class AjaxSlide{
	public $id;
	public $titulo;
	public $descripcion;
	public $rutaImagenPortada;
	public $idArchivoImagenPortada;
	public $tituloBool;
	public $descripcionBool;
	/*=============================================
	CREAR SLIDE
	=============================================*/
	public function ajaxCrearSlide(){
		$respuesta = ControladorSlide::ctrCrearSlide();
		echo $respuesta;
	}
	/*=============================================
	ACTUALIZAR ORDEN SLIDE
	=============================================*/
	public function ajaxOrdenSlide(){
		$datos = array( "id"=> $this->id,
						"orden"=> $this->orden);
		$respuesta = ControladorSlide::ctrActualizarOrdenSlide($datos);
		echo $respuesta;
	}
	/*=============================================
	CAMBIAR SLIDE
	=============================================*/
	public function ajaxCambiarSlide(){
		$datos = array( "id"=>$this->id,
						"titulo"=>$this->titulo,
						"descripcion"=>$this->descripcion,
						"rutaImagenPortada"=>$this->rutaImagenPortada,
						"idArchivoImagenPortada"=>$this->idArchivoImagenPortada,
						"tituloBool"=>$this->tituloBool=="true"?1:0,
						"descripcionBool"=>$this->descripcionBool=="true"?1:0);
	//	echo '<pre>'; print_r($datos); echo '</pre>';
		$respuesta = ControladorSlide::ctrActualizarSlide($datos);
		echo $respuesta;
	}
}
/*=============================================
CREAR SLIDE
=============================================*/	
if(isset($_POST["crearSlide"])){
	$crearSlide = new AjaxSlide();
	$crearSlide -> ajaxCrearSlide();
}
/*=============================================
ACTUALIZAR ORDEN
=============================================*/	
if(isset($_POST["idSlide"])){
	$ordenSlide = new AjaxSlide();
	$ordenSlide -> id = $_POST["idSlide"];
	$ordenSlide -> orden = $_POST["orden"];
	$ordenSlide -> ajaxOrdenSlide();
}
/*=============================================
CAMBIAR SLIDE
=============================================*/	
if(isset($_POST["id"])){
	$slide = new AjaxSlide();
	$slide -> id = $_POST["id"];
	$slide -> titulo = $_POST["titulo"];
	$slide -> descripcion = $_POST["descripcion"];
	$slide -> rutaImagenPortada = $_POST["rutaImagenPortada"];
	$slide -> idArchivoImagenPortada = $_POST["idArchivoImagenPortada"];
	$slide -> tituloBool = $_POST["tituloBool"];
	$slide -> descripcionBool = $_POST["descripcionBool"];
	$slide -> ajaxCambiarSlide();
}
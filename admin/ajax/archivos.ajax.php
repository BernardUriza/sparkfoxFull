<?php
require_once "../controladores/archivos.controlador.php";
require_once "../modelos/rutas.php";
require_once "../modelos/archivos.modelo.php";
class AjaxArchivos{
/*=============================================
GUARDAR Archivo
  =============================================*/
public $Archivo;
public $NombreArchivo;
public function ajaxGuardarArchivo(){
  echo ControladorArchivos::ctrGuardarArchivo($this->Archivo,$this->NombreArchivo);
}
}
/*=============================================
GUARDAR Archivo
=============================================*/
if(isset($_FILES["Archivo"]) && isset($_POST["NombreArchivo"])){
  $activarPregunta = new AjaxArchivos();
  $activarPregunta -> Archivo = $_FILES["Archivo"];
  $activarPregunta -> NombreArchivo = $_POST["NombreArchivo"];
  $activarPregunta -> ajaxGuardarArchivo();
}
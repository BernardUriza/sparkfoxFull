<?php
require_once "conexion.php";
class ModeloSlider{
	static public function mdlObtenerSlider($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT *, rutaImagenPortada rutaImagen, descripcion subtitulo FROM slide ORDER BY orden DESC");
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	}
} 
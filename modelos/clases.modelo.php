<?php
require_once "conexion.php";
class ModeloClases{
	/*=============================================
	MOSTRAR CLASES
	=============================================*/
	static public function mdlMostrarClases($tabla, $item, $valor){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	}
}
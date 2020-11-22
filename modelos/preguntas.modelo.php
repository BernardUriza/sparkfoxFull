<?php
require_once "conexion.php";
class ModeloPreguntas{
	/*=============================================
	MOSTRAR PREGUNTAS
	=============================================*/
	static public function mdlMostrarPreguntas($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT p.*, a.codigo, a.titulo pais FROM $tabla p JOIN paises a ON a.id=p.idPais WHERE estado=1 ORDER BY id ASC");
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	}
}
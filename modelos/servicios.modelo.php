<?php
require_once "conexion.php";
class ModeloServicios{
	static public function mdlObtenerServicios($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	}
}
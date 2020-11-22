<?php

require_once "conexion.php";

class ModeloSuscriptores{


	/*=============================================
	MOSTRAR SUSCRIPTORES
	=============================================*/	

	static public function mdlMostrarSuscriptores($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}



}
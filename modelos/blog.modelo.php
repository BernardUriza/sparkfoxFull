<?php
require_once "conexion.php";
class ModeloBlogs{ 
	/*=============================================
	MOSTRAR PRODUCTOS
	=============================================*/
	static public function mdlMostrarBlogs($tabla,$id){
		$were=($id=="-1")?'':"AND titulo='".$id."'";
			$stmt = Conexion::conectar()->prepare("SELECT * FROM  $tabla 
				WHERE 1  $were ORDER BY id DESC"); 
			$stmt -> execute();
			return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	}
}
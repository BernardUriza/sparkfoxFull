<?php
require_once "conexion.php";
class ModeloClases{
	/*=============================================
	MOSTRAR CLASES
	=============================================*/
	static public function mdlMostrarClases($tabla, $item, $valor){
		if($item != null){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt -> fetch();
		}else{
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");
			$stmt -> execute();
			return $stmt -> fetchAll();
		}
		$stmt -> close();
		$stmt = null;
	}
	/*=============================================
	ACTIVAR CLASE
	=============================================*/
	static public function mdlActualizarClase($tabla, $item1, $valor1, $item2, $valor2){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");
		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);
		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";	
		}
		$stmt -> close();
		$stmt = null;
	}
	/*=============================================
	CREAR CLASE
	=============================================*/
	static public function mdlIngresarClase($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(clase, estado) VALUES (:clase, :estado)");
		$stmt->bindParam(":clase", $datos["clase"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt->close();
		$stmt = null;
	}
	/*=============================================
	EDITAR CLASE
	=============================================*/
	static public function mdlEditarClase($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET clase = :clase, rutaImagen = :rutaImagen, idArchivoImagen = :idArchivoImagen, estado = :estado WHERE id = :id");
		$stmt -> bindParam(":clase", $datos["clase"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
		$stmt->bindParam(":idArchivoImagen", $datos["idArchivoImagen"], PDO::PARAM_STR);
		$stmt->bindParam(":rutaImagen", $datos["rutaImagen"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);
		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt->close();
		$stmt = null;
	}
	/*=============================================
	ELIMINAR CLASE
	=============================================*/
	static public function mdlEliminarClase($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);
		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";	
		}
		$stmt -> close();
		$stmt = null;
	}
}
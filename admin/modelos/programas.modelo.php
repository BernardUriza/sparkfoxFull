<?php
require_once "conexion.php";
class ModeloProgramas{
	/*=============================================
	MOSTRAR PROGRAMAS
	=============================================*/
	static public function mdlMostrarProgramas($tabla, $item, $valor){
		if($item != null){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM videos WHERE $item = :$item");
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt -> fetch();
		}else{
			$stmt = Conexion::conectar()->prepare("SELECT * FROM videos ORDER BY id ASC");
			$stmt -> execute();
			return $stmt -> fetchAll();
		}
		$stmt -> close();
		$stmt = null;
	}
	/*=============================================
	ACTIVAR PROGRAMA
	=============================================*/
	static public function mdlActualizarPrograma($tabla, $item1, $valor1, $item2, $valor2){
		$stmt = Conexion::conectar()->prepare("UPDATE videos SET $item1 = :$item1 WHERE $item2 = :$item2");
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
	CREAR PROGRAMA
	=============================================*/
	static public function mdlIngresarPrograma($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("INSERT INTO videos(titulo, estado, rutaImagen, tituloDescriptivo, descripcion, listaProgramas) VALUES (:titulo, :estado, :rutaImagen, :tituloDescriptivo, :descripcion, :listaProgramas)");
		$stmt->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
		$stmt->bindParam(":rutaImagen", $datos["rutaImagen"], PDO::PARAM_STR);
		$stmt->bindParam(":tituloDescriptivo", $datos["tituloDescriptivo"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":listaProgramas", $datos["listaProgramas"], PDO::PARAM_STR);
		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt->close();
		$stmt = null;
	}
	/*=============================================
	EDITAR PROGRAMA
	=============================================*/
	static public function mdlEditarPrograma($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("UPDATE videos SET titulo = :titulo, rutaImagen = :rutaImagen, idYoutube = :tituloDescriptivo, descripcion = :descripcion, listaProgramas = :listaProgramas, estado = :estado WHERE id = :id");
		$stmt -> bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
		$stmt->bindParam(":rutaImagen", $datos["rutaImagen"], PDO::PARAM_STR);
		$stmt->bindParam(":tituloDescriptivo", $datos["tituloDescriptivo"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":listaProgramas", $datos["listaProgramas"], PDO::PARAM_STR);
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
	ELIMINAR PROGRAMA
	=============================================*/
	static public function mdlEliminarPrograma($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("DELETE FROM videos WHERE id = :id");
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
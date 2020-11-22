<?php
require_once "conexion.php";
class ModeloPreguntas{
	/*=============================================
	MOSTRAR PREGUNTAS
	=============================================*/
	static public function mdlMostrarPreguntas($tabla, $item, $valor){
		if($item != null){
			$stmt = Conexion::conectar()->prepare("SELECT r.*, p.titulo pais FROM $tabla r LEFT JOIN paises p ON p.id=r.idPais  WHERE r.$item = :$item");
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt -> fetch();
		}else{
			$stmt = Conexion::conectar()->prepare("SELECT r.*, p.titulo pais FROM $tabla r LEFT JOIN paises p ON p.id=r.idPais  ORDER BY id ASC");
			$stmt -> execute();
			return $stmt -> fetchAll();
		}
		$stmt -> close();
		$stmt = null;
	}
	/*=============================================
	ACTIVAR PREGUNTA
	=============================================*/
	static public function mdlActualizarPregunta($tabla, $item1, $valor1, $item2, $valor2){
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
	CREAR PREGUNTA
	=============================================*/
	static public function mdlIngresarPregunta($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(pregunta, respuesta, estado) VALUES (:pregunta, :respuesta, :estado)");
		$stmt->bindParam(":pregunta", $datos["pregunta"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
		$stmt->bindParam(":respuesta", $datos["respuesta"], PDO::PARAM_STR);
		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt->close();
		$stmt = null;
	}
	/*=============================================
	EDITAR PREGUNTA
	=============================================*/
	static public function mdlEditarPregunta($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET pregunta = :pregunta, idPais = :idPais, rutaImagenPortada = :rutaImagenPortada, respuesta = :respuesta, estado = :estado WHERE id = :id");
		$stmt -> bindParam(":pregunta", $datos["pregunta"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
		$stmt->bindParam(":respuesta", $datos["respuesta"], PDO::PARAM_STR);
		$stmt -> bindParam(":idPais", $datos["seleccionarCountry"], PDO::PARAM_INT);
		$stmt -> bindParam(":rutaImagenPortada", $_POST["rutaImagenPortada"], PDO::PARAM_STR);
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
	ELIMINAR PREGUNTA
	=============================================*/
	static public function mdlEliminarPregunta($tabla, $datos){
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
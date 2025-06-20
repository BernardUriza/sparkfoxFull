<?php
require_once "conexion.php";
class ModeloCategorias{
	/*=============================================
	MOSTRAR CATEGORIAS
	=============================================*/
	static public function mdlMostrarCategorias($tabla, $item, $valor){
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
	ACTIVAR CATEGORIA
	=============================================*/
	static public function mdlActualizarCategoria($tabla, $item1, $valor1, $item2, $valor2){
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
	CREAR CATEGORIA
	=============================================*/
	static public function mdlIngresarCategoria($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(categoria, estado, productosTexto, serviciosTexto, rutaImagenPortada, idArchivoImagenPortada) VALUES (:categoria, :estado, :productosTexto, :serviciosTexto, :rutaImagenPortada, :idArchivoImagenPortada)");
		$stmt->bindParam(":categoria", trim($datos["categoria"]), PDO::PARAM_STR);
		$stmt->bindParam(":productosTexto", $datos["productosTexto"], PDO::PARAM_STR);
		$stmt->bindParam(":serviciosTexto", $datos["serviciosTexto"], PDO::PARAM_STR);
		$stmt->bindParam(":rutaImagenPortada", $datos["rutaImagenPortada"], PDO::PARAM_STR);
		$stmt->bindParam(":idArchivoImagenPortada", $datos["idArchivoImagenPortada"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt->close();
		$stmt = null;
	}
	static public function mdlIngresarCategoriaID($tabla, $datos){
		$BD=Conexion::conectar();
		$stmt = $BD->prepare("INSERT INTO $tabla(categoria, estado, productosTexto, serviciosTexto, rutaImagenPortada, idArchivoImagenPortada) VALUES (:categoria, :estado, :productosTexto, :serviciosTexto, :rutaImagenPortada, :idArchivoImagenPortada)");
		$stmt->bindParam(":categoria", trim($datos["categoria"]), PDO::PARAM_STR);
		$stmt->bindParam(":productosTexto", $datos["productosTexto"], PDO::PARAM_STR);
		$stmt->bindParam(":serviciosTexto", $datos["serviciosTexto"], PDO::PARAM_STR);
		$stmt->bindParam(":rutaImagenPortada", $datos["rutaImagenPortada"], PDO::PARAM_STR);
		$stmt->bindParam(":idArchivoImagenPortada", $datos["idArchivoImagenPortada"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
		if($stmt->execute()){
			return $BD->lastInsertId();
		}else{
			return "error";
		}
		$stmt->close();
		$stmt = null;
	}
	/*=============================================
	EDITAR CATEGORIA
	=============================================*/
	static public function mdlEditarCategoria($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET categoria = :categoria, estado = :estado, serviciosTexto = :serviciosTexto, productosTexto = :productosTexto, rutaImagenPortada = :rutaImagenPortada, idArchivoImagenPortada = :idArchivoImagenPortada, rutaImagenFondo = :rutaImagenFondo, idArchivoImagenFondo = :idArchivoImagenFondo WHERE id = :id");
		$stmt -> bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
		$stmt->bindParam(":productosTexto", $datos["productosTexto"], PDO::PARAM_STR);
		$stmt->bindParam(":serviciosTexto", $datos["serviciosTexto"], PDO::PARAM_STR);
		$stmt->bindParam(":rutaImagenPortada", $datos["rutaImagenPortada"], PDO::PARAM_STR);
		$stmt->bindParam(":idArchivoImagenPortada", $datos["idArchivoImagenPortada"], PDO::PARAM_STR);
		$stmt->bindParam(":rutaImagenFondo", $datos["rutaImagenFondo"], PDO::PARAM_STR);
		$stmt->bindParam(":idArchivoImagenFondo", $datos["idArchivoImagenFondo"], PDO::PARAM_STR);
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
	ELIMINAR CATEGORIA
	=============================================*/
	static public function mdlEliminarCategoria($tabla, $datos){
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
<?php
require_once "conexion.php";
class ModeloSlide{	
	/*=============================================
	MOSTRAR SLIDE
	=============================================*/
	static public function mdlMostrarSlide($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY orden ASC");
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	}
	/*=============================================
	CREAR SLIDE
	=============================================*/
	static public function mdlCrearSlide($tabla,$orden){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(titulo, descripcion) VALUES ('', '')");
		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt->close();
		$stmt = null;
	}
	/*=============================================
	ACTUALIZAR ORDEN SLIDE
	=============================================*/
	static public function mdlActualizarOrdenSlide($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET orden = :orden WHERE id = :id");
		$stmt->bindParam(":orden", $datos["orden"], PDO::PARAM_INT);
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);	
		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt->close();
		$stmt = null;
	}
	/*=============================================
	ACTUALIZAR SLIDE
	=============================================*/
	static public function mdlActualizarSlide($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET titulo = :titulo, rutaImagenPortada = :rutaImagenPortada,  tituloBool = :tituloBool,  descripcionBool = :descripcionBool, idArchivoImagenPortada = :idArchivoImagenPortada, descripcion = :descripcion, uri = :uri WHERE id = :id");
		$stmt->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":uri", $_POST["uri"], PDO::PARAM_STR);
		$stmt->bindParam(":rutaImagenPortada", $datos["rutaImagenPortada"], PDO::PARAM_STR);
		$stmt->bindParam(":idArchivoImagenPortada", $datos["idArchivoImagenPortada"], PDO::PARAM_STR);
		$stmt->bindParam(":tituloBool", $datos["tituloBool"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcionBool", $datos["descripcionBool"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);	
		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt->close();
		$stmt = null;
	}
	/*=============================================
	ELIMINAR SLIDE
	=============================================*/
	static public function mdlEliminarSlide($tabla, $id){
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
		$stmt -> bindParam(":id", $id, PDO::PARAM_INT);
		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";	
		}
		$stmt -> close();
		$stmt = null;
	}
}
<?php
require_once "conexion.php";
require_once "rutas.php";
class ModeloProyectos{
	/*=============================================
	MOSTRAR PROYECTOS
	=============================================*/
	static public function mdlMostrarProyectos($tabla, $item, $valor){
		if($item != null){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM blog WHERE $item = :$item");
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt -> fetch();
		}else{
			$stmt = Conexion::conectar()->prepare("SELECT * FROM blog ORDER BY id ASC");
			$stmt -> execute();
			return $stmt -> fetchAll();
		}
		$stmt -> close();
		$stmt = null;
	}
	/*=============================================
	MOSTRAR PROYECTOS
	=============================================*/
	static public function mdlMostrarTotalProyectos($tabla, $orden){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM blog ORDER BY $orden DESC");
			$stmt -> execute();
			return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;
	}
	/*=============================================
	ACTIVAR PROYECTO
	=============================================*/
	static public function mdlActualizarProyecto($tabla, $item1, $valor1, $item2, $valor2){
		$stmt = Conexion::conectar()->prepare("UPDATE blog SET $item1 = :$item1 WHERE $item2 = :$item2");
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
	CREAR PROYECTO
	=============================================*/
	static public function mdlIngresarProyecto($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("INSERT INTO blog (titulo) VALUES (:proyecto)");
		$stmt->bindParam(":proyecto", $datos["proyecto"], PDO::PARAM_STR);
		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt->close();
		$stmt = null;
	}
	static public function mdlIngresarBlogsImagenes($id,$descripcion){
		ModeloProyectos::mdlEliminarImagenesBlog($id);
		$stmtQ=Conexion::conectar();
		$stmt="INSERT INTO blog_imagenes (idBlog, idArchivoImagenMultimedia, rutaImagenMultimedia) VALUES";
		foreach (($descripcion) as $value) {
			$stmt=$stmt." ('".$id."', '".explode(".",basename($value))[0]."', '". str_replace(Ruta::ctrRuta(), "", $value) ."'),";
		}
		$stmt = substr($stmt, 0, -1);
		$stmt = $stmtQ->prepare($stmt);
		if(count(($descripcion))>0){
			if($stmt->execute()){
				return "ok";
			}else{
				return "error";
			}
		}
		else{
		return "ok";
		}
		$stmt->close();
		$stmt = null;
	}
	/*=============================================
	EDITAR PROYECTO
	=============================================*/
	static public function mdlEditarProyecto($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("UPDATE blog SET titulo = :proyecto, descripcion = :descripcion, idArchivoImagenPortada = :idArchivoImagenPortada, rutaImagenPortada = :rutaImagenPortada  WHERE id = :id");
		$stmt -> bindParam(":proyecto", $datos["proyecto"], PDO::PARAM_STR);
		$stmt -> bindParam(":rutaImagenPortada", $_POST["rutaImagenPortada"], PDO::PARAM_STR);
		$stmt -> bindParam(":descripcion", $_POST["descripcion"], PDO::PARAM_STR);


		$stmt -> bindParam(":idArchivoImagenPortada", $_POST["idArchivoImagenPortada"], PDO::PARAM_INT);
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);
		if($stmt->execute()){
			$match = array();
		preg_match_all('#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', $_POST["descripcion"], $match);

		//print_r($match[0]); 
			return ModeloProyectos::mdlIngresarBlogsImagenes($datos["id"],$match[0]);
		}else{	
			return "error";
		}
		$stmt->close();
		$stmt = null;
	}
	/*=============================================
	ELIMINAR PROYECTO
	=============================================*/
	static public function mdlEliminarProyecto($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("DELETE FROM blog WHERE id = :id");
		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);
		if($stmt -> execute()){
			return "ok";
		}else{
				return "error";
		}
		$stmt -> close();
		$stmt = null;
	}
	static public function mdlEliminarImagenesBlog($dato){
		$stmt = Conexion::conectar()->prepare("DELETE FROM blog_imagenes WHERE idBlog = :id");
		$stmt -> bindParam(":id", $dato, PDO::PARAM_INT);
		if($stmt -> execute()){
			return "ok";
		}else{
				return "error";
		}
		$stmt -> close();
		$stmt = null;
	}
}
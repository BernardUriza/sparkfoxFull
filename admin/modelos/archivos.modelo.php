<?php
require_once "conexion.php";
require_once "rutas.php";
class ModeloArchivos{
	static public function mdlGuardarArchivo($tabla, $nombre,$extension){
		$BDBD=Conexion::conectar();
		$stmt = $BDBD->prepare("INSERT INTO $tabla(nombre,extension) VALUES (:nombre,:extension)");
		$stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
		$stmt->bindParam(":extension", $extension, PDO::PARAM_STR);
		if($stmt->execute()){
				return $BDBD->lastInsertId();
		}else{
			return "error";
		
		}
		$stmt->close();
		$stmt = null;
	}
	static public function mdlBorrarArchivo($id){
		$BDBD=Conexion::conectar();
		$stmt = $BDBD->prepare("UPDATE archivos SET estatusArchivo='BORRADA' WHERE id = $id");
		if($stmt->execute()){
				return "ok";
		}else{
			return "error";
		
		}
		$stmt->close();
		$stmt = null;
	}
	static public function mdlLimpiezaArchivos(){
		$BDBD=Conexion::conectar();
		$stmt = $BDBD->prepare("
UPDATE archivos SET estatusArchivo='DESCONECTAR' WHERE estatusArchivo!='BORRADA' AND id NOT IN (SELECT DISTINCT idArchivoImagenPortada FROM (
SELECT idArchivoImagenPortada
FROM productos
UNION SELECT IdArchivoFicha
FROM productos
UNION SELECT idArchivoImagenPaquete
FROM productos
UNION SELECT idArchivoImagenPortada
FROM blog
UNION SELECT idArchivoImagenHeader
FROM productos
UNION SELECT idArchivoImagenMultimedia
FROM productos_imagenes
UNION SELECT idArchivoImagenMultimedia
FROM blog_imagenes
UNION SELECT idArchivoImagenPortada
FROM categorias
UNION SELECT idArchivoImagenFondo
FROM categorias
UNION SELECT idArchivoImagenMultimedia
FROM productos_ejemplos
UNION SELECT idArchivoImagenPortada
FROM slide
UNION SELECT idArchivoImagen
FROM clases
UNION SELECT LEFT( RIGHT(  rutaAviso, POSITION(  '/'
IN REVERSE( rutaAviso ) ) -1 ) , POSITION(  '.'
IN RIGHT( rutaAviso, POSITION(  '/'
IN REVERSE( rutaAviso ) ) -1 ) ) -1 ) idArchivo 
FROM plantilla
UNION SELECT LEFT( RIGHT(  rutaHeader, POSITION(  '/'
IN REVERSE( rutaHeader ) ) -1 ) , POSITION(  '.'
IN RIGHT( rutaHeader, POSITION(  '/'
IN REVERSE( rutaHeader ) ) -1 ) ) -1 ) idArchivo 
FROM plantilla
UNION SELECT LEFT( RIGHT(  rutaImagenPortada, POSITION(  '/'
IN REVERSE( rutaImagenPortada ) ) -1 ) , POSITION(  '.'
IN RIGHT( rutaImagenPortada, POSITION(  '/'
IN REVERSE( rutaImagenPortada ) ) -1 ) ) -1 ) idArchivo 
FROM preguntas
UNION   SELECT LEFT( RIGHT( rutaTerminos, POSITION(  '/'
IN REVERSE( rutaTerminos ) ) -1 ) , POSITION(  '.'
IN RIGHT( rutaTerminos, POSITION(  '/'
IN REVERSE( rutaTerminos ) ) -1 ) ) -1 ) idArchivo
FROM plantilla
UNION SELECT LEFT( RIGHT( rutaImagen, POSITION(  '/'
IN REVERSE( rutaImagen ) ) -1 ) , POSITION(  '.'
IN RIGHT( rutaImagen, POSITION(  '/'
IN REVERSE( rutaImagen ) ) -1 ) ) -1 ) idArchivo
FROM videos WHERE rutaImagen !=  ''
) imagenes WHERE  idArchivoImagenPortada>0)
");
		if($stmt->execute()){
			ModeloArchivos::mdlObtenerArchivos();
				return "ok";
		}else{
			return "error";
		
		}
		$stmt->close();
		$stmt = null;
	}
	static public function mdlObtenerArchivos(){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM archivos WHERE estatusArchivo='DESCONECTAR'");
		$stmt -> execute();
		$Res = $stmt -> fetchAll();
		foreach ($Res as $key => $value) {
			$Imagen=Ruta::ctrRuta()."admin/vistas/img/archivos/".($value["id"].".".$value["extension"]);
			$Imagen=explode('admin',$_SERVER["SCRIPT_FILENAME"])[0];
			if(is_file($Imagen."admin/vistas/img/archivos/".($value["id"].".".$value["extension"])))
			if(unlink($Imagen."admin/vistas/img/archivos/".($value["id"].".".$value["extension"]))==1) 
				ModeloArchivos::mdlBorrarArchivo($value["id"]);
		}
	}
}
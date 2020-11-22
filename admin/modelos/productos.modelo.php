<?php

error_reporting(E_ERROR | E_PARSE);
require_once "conexion.php";
class ModeloProductos{
	/*=============================================
	MOSTRAR PRODUCTOS
	=============================================*/	
	static public function mdlMostrarTotalProductos($tabla, $orden){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY $orden DESC");
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt-> close();
		$stmt = null;
	}
	/*=============================================
	ACTUALIZAR PRODUCTOS
	=============================================*/
	static public function mdlActualizarProductos($tabla, $item1, $valor1, $item2, $valor2){
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
	MOSTRAR PRODUCTOS
	=============================================*/

	
	static public function verVideos(){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM videos"); 
			$stmt -> execute();
			return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	}

	static public function mdlMostrarProductos($tabla, $item, $valor){
		if($item != null){
			$stmt = Conexion::conectar()->prepare("SELECT GROUP_CONCAT(DISTINCT cp.id_categoria) id_categorias_productos,g.grupo grupo_nombre, GROUP_CONCAT(DISTINCT c.categoria SEPARATOR ', ') id_categorias_productos_nombres,GROUP_CONCAT(DISTINCT pi.rutaImagenMultimedia SEPARATOR ', ') rutas_multimedia,GROUP_CONCAT(DISTINCT pe.rutaImagenMultimedia SEPARATOR ', ') rutas_ejemplos,p.*, m.marca, GROUP_CONCAT(DISTINCT cl.id_clase) id_clases_productos, GROUP_CONCAT(DISTINCT cll.clase SEPARATOR ', ') id_clases_productos_nombres,GROUP_CONCAT(DISTINCT ppres.id SEPARATOR ', ') colores_id,GROUP_CONCAT(DISTINCT ppres.sku SEPARATOR ', ') colores_sku,GROUP_CONCAT(DISTINCT ppres.nombre SEPARATOR ', ') colores_nombres,GROUP_CONCAT(DISTINCT ppres.valor SEPARATOR ', ') colores, GROUP_CONCAT(DISTINCT vid.id) id_videos,  GROUP_CONCAT(DISTINCT vid.rutaImagen) rutas_videos FROM  $tabla  p LEFT JOIN marcas m ON m.id=p.id_marca LEFT JOIN categorias_productos cp ON cp.id_producto=p.id LEFT JOIN categorias c ON cp.id_categoria=c.id
				LEFT JOIN clases_productos cl ON cl.id_producto=p.id LEFT JOIN clases cll ON cl.id_clase=cll.id LEFT JOIN grupos g ON g.id=p.id_grupo LEFT JOIN productos_imagenes pi ON pi.idProducto=p.id 
				LEFT JOIN productos_presentaciones ppres ON ppres.idProducto=p.id
				LEFT JOIN productos_ejemplos pe ON pe.idProducto=p.id 
				LEFT JOIN productos_videos prvi ON prvi.idProducto=p.id  
				LEFT JOIN videos vid ON vid.id=prvi.idVideo 
				WHERE p.$item = :$item GROUP BY p.id");
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt -> fetchAll();
		}else{
			$stmt = Conexion::conectar()->prepare("SELECT GROUP_CONCAT(DISTINCT cp.id_categoria) id_categorias_productos,g.grupo grupo_nombre, GROUP_CONCAT(DISTINCT c.categoria SEPARATOR ', ') id_categorias_productos_nombres,GROUP_CONCAT(DISTINCT pi.rutaImagenMultimedia SEPARATOR ', ') rutas_multimedia,GROUP_CONCAT(DISTINCT pe.rutaImagenMultimedia SEPARATOR ', ') rutas_ejemplos,p.*, m.marca, GROUP_CONCAT(DISTINCT cl.id_clase) id_clases_productos, GROUP_CONCAT(DISTINCT cll.clase SEPARATOR ', ') id_clases_productos_nombres, GROUP_CONCAT(DISTINCT vid.idYoutube) id_videos,  GROUP_CONCAT(DISTINCT vid.rutaImagen) rutas_videos FROM  $tabla  p LEFT JOIN marcas m ON m.id=p.id_marca LEFT JOIN categorias_productos cp ON cp.id_producto=p.id LEFT JOIN categorias c ON cp.id_categoria=c.id
				LEFT JOIN clases_productos cl ON cl.id_producto=p.id LEFT JOIN clases cll ON cl.id_clase=cll.id LEFT JOIN grupos g ON g.id=p.id_grupo LEFT JOIN productos_imagenes pi ON pi.idProducto=p.id LEFT JOIN productos_ejemplos pe ON pe.idProducto=p.id 
				LEFT JOIN productos_videos prvi ON prvi.idProducto=p.id  
				LEFT JOIN videos vid ON vid.id=prvi.idVideo GROUP BY p.id"); 
			$stmt -> execute();
			return $stmt -> fetchAll();
		}
		$stmt -> close();
		$stmt = null;
	}
	/*=============================================
	CREAR PRODUCTO
	=============================================*/
	static public function mdlIngresarProducto($tabla, $datos){
		$stmtQ=Conexion::conectar();
		$stmt = $stmtQ->prepare("INSERT INTO $tabla(id_categoria, id_grupo, codigo, estado, titulo, titular, descripcion, detalles, precio, caracteristicas_especiales, id_marca, IdArchivoFicha, RutaFicha, rutaImagenPortada, idArchivoImagenPortada) VALUES (:id_categoria, :id_grupo, :codigo, :estado, :titulo, :titular, :descripcion, :detalles, 0, :caracteristicas_especiales, :id_marca, :IdArchivoFicha, :RutaFicha, :rutaImagenPortada, :idArchivoImagenPortada)");
		$stmt->bindParam(":id_categoria", $datos["idCategoria"], PDO::PARAM_STR);
		$stmt->bindParam(":id_grupo", $datos["idGrupo"], PDO::PARAM_STR);
		$stmt->bindParam(":id_marca", $datos["idMarca"], PDO::PARAM_STR);
		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
		$stmt->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
		$stmt->bindParam(":titular", $datos["titular"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":detalles", $datos["detalles"], PDO::PARAM_STR);
		$stmt->bindParam(":rutaImagenPortada", $datos["rutaImagenPortada"], PDO::PARAM_STR);
		$stmt->bindParam(":idArchivoImagenPortada", $datos["idArchivoImagenPortada"], PDO::PARAM_STR);
		$stmt->bindParam(":IdArchivoFicha", $datos["IdArchivoFicha"], PDO::PARAM_STR);
		$stmt->bindParam(":RutaFicha", $datos["RutaFicha"], PDO::PARAM_STR);
		$stmt->bindParam(":caracteristicas_especiales", $datos["caracteristicas_especiales"], PDO::PARAM_STR);
		if($stmt->execute()){
			$datos["id"]=$stmtQ->lastInsertId();
			return ModeloProductos::mdlEliminarProductoCategoria($datos)=="ok"?$datos["id"]:-1;
		}else{
			return "error";
		}
		$stmt->close();
		$stmt = null;
	}
	static public function mdlIngresarMultimedia($id, $datos){
		ModeloProductos::mdlEliminarProductoMultimedias($id);
		$stmtQ=Conexion::conectar();
		$stmt="INSERT INTO productos_imagenes (idProducto, idArchivoImagenMultimedia, rutaImagenMultimedia) VALUES";
		foreach (json_decode($datos) as $value) {
			$stmt=$stmt." ('".$id."', '".explode(".",basename($value))[0]."', '".$value."'),";
		}
		$stmt = substr($stmt, 0, -1);
		$stmt = $stmtQ->prepare($stmt);
		if(count(json_decode($datos))>0){
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
	static public function mdlEliminarProductoMultimedias($id){
		$stmt = Conexion::conectar()->prepare("DELETE FROM productos_imagenes WHERE idProducto = :id");
		$stmt -> bindParam(":id", $id, PDO::PARAM_INT);
		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";	
		}
		$stmt -> close();
		$stmt = null;
	}
	static public function mdlIngresarMultimediaEjemplo($id, $datos){
		ModeloProductos::mdlEliminarProductoMultimediasEjemplo($id);
		$stmtQ=Conexion::conectar();
		$stmt="INSERT INTO productos_ejemplos (idProducto, idArchivoImagenMultimedia, rutaImagenMultimedia) VALUES";
		foreach (json_decode($datos) as $value) {
			$stmt=$stmt." ('".$id."', '".explode(".",basename($value))[0]."', '".$value."'),";
		}
		$stmt = substr($stmt, 0, -1);
		$stmt = $stmtQ->prepare($stmt);
		if(count(json_decode($datos))>0){
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
	static public function mdlEliminarProductoMultimediasEjemplo($id){
		$stmt = Conexion::conectar()->prepare("DELETE FROM productos_ejemplos WHERE idProducto = :id");
		$stmt -> bindParam(":id", $id, PDO::PARAM_INT);
		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";	
		}
		$stmt -> close();
		$stmt = null;
	}
	/*=============================================
	EDITAR PRODUCTO
	=============================================*/
	static public function mdlEditarProducto($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_categoria = :id_categoria, id_marca = :id_marca, id_grupo = :id_grupo,  codigo = :codigo, estado = :estado, titulo = :titulo, titular = :titular, descripcion = :descripcion, detalles = :detalles, precio = :precio, rutaImagenPaquete = :rutaImagenPaquete, idArchivoImagenPaquete = :idArchivoImagenPaquete, caracteristicas_especiales = :caracteristicas_especiales,  empaque = :empaque,  tiendas = :tiendas, reviews = :reviews, RutaFicha = :RutaFicha, IdArchivoFicha = :IdArchivoFicha, rutaImagenPortada = :rutaImagenPortada, idArchivoImagenPortada = :idArchivoImagenPortada, rutaArchivoImagenHeader = :rutaImagenHeader, idArchivoImagenHeader = :idArchivoImagenHeader WHERE id = :id");
		$stmt->bindParam(":id_categoria", $datos["idCategoria"], PDO::PARAM_STR);
		$stmt->bindParam(":id_grupo", $datos["idGrupo"], PDO::PARAM_STR);
		$stmt->bindParam(":id_marca", $datos["idMarca"], PDO::PARAM_STR);
		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
		$stmt->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
		$stmt->bindParam(":titular", $datos["titular"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":detalles", $datos["detalles"], PDO::PARAM_STR);
		$stmt->bindParam(":rutaImagenPortada", $datos["rutaImagenPortada"], PDO::PARAM_STR);
		$stmt->bindParam(":idArchivoImagenPortada", $datos["idArchivoImagenPortada"], PDO::PARAM_STR);
		$stmt->bindParam(":rutaImagenPaquete", $_POST["rutaImagenPaquete"], PDO::PARAM_STR);
		$stmt->bindParam(":idArchivoImagenPaquete", $_POST["idArchivoImagenPaquete"], PDO::PARAM_STR);
		$stmt->bindParam(":rutaImagenHeader", $datos["rutaImagenHeader"], PDO::PARAM_STR);
		$stmt->bindParam(":idArchivoImagenHeader", $datos["idArchivoImagenHeader"], PDO::PARAM_STR);
		$stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_STR);
		$stmt->bindParam(":caracteristicas_especiales", $datos["caracteristicas_especiales"], PDO::PARAM_STR);
		$stmt->bindParam(":empaque", $datos["empaque"], PDO::PARAM_STR);
		$stmt->bindParam(":tiendas", $datos["tiendas"], PDO::PARAM_STR);
		$stmt->bindParam(":reviews", $datos["reviews"], PDO::PARAM_STR);
		$stmt->bindParam(":RutaFicha", $datos["RutaFicha"], PDO::PARAM_STR);
		$stmt->bindParam(":IdArchivoFicha", $datos["IdArchivoFicha"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);
		if($stmt->execute()){
			return ModeloProductos::mdlEliminarProductoCategoria($datos);
		}else{
			return "error";
		}
		$stmt->close();
		$stmt = null;
	}
	static public function mdlEditarProductoCategorias($datos){
		$stmt="INSERT INTO categorias_productos (id_producto, id_categoria) VALUES";
		foreach (explode(",",$datos["idCategoria"]) as $value) {
			$stmt=$stmt." ('".$datos["id"]."', '".$value."'),";
		}
		$stmt = substr($stmt, 0, -1);
		$stmt = Conexion::conectar()->prepare($stmt);
		if($stmt->execute()){
			return ModeloProductos::mdlEliminarProductoClase($datos);
		}else{
			return "error";
		}
		$stmt->close();
		$stmt = null;
	}
	static public function mdlEditarProductoClases($datos){
		$stmt="INSERT INTO clases_productos (id_producto, id_clase) VALUES";
		foreach (explode(",",$datos["idClase"]) as $value) {
			$stmt=$stmt." ('".$datos["id"]."', '".$value."'),";
		}
		$stmt = substr($stmt, 0, -1);
		$stmt = Conexion::conectar()->prepare($stmt);
		if($stmt->execute()){
			return ModeloProductos::mdlEliminarProductoPresentaciones($datos);
		}else{
			return "error";
		}
		$stmt->close();
		$stmt = null;
	}
	static public function mdlEditarProductoVideos($datos){
		$stmt="INSERT INTO productos_videos (idProducto, idVideo) VALUES";
		foreach (explode(",",$datos["videos"]) as $value) {
			$stmt=$stmt." ('".$datos["id"]."', '".$value."'),";
		}
		$stmt = substr($stmt, 0, -1);
		$stmt = Conexion::conectar()->prepare($stmt);
		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt->close();
		$stmt = null;
	}
	static public function mdlEditarProductoPresentaciones($datos){

		$stmt="INSERT INTO productos_presentaciones (idProducto, sku, valor, nombre) VALUES";
		$nuevos=0;
		for ($i=0; $i < count(json_decode($datos["IDS_PRESENTACIONES"],false)); $i++) { 
			if(json_decode($datos["IDS_PRESENTACIONES"],false)[$i]=="NUEVA"){
				$nuevos++;
				$stmt=$stmt." ('".$datos["id"]."', '".json_decode($datos["SKU_PRESENTACIONES"],false)[$i]."', '".json_decode($datos["COLORES_PRESENTACIONES"],false)[$i]."', '".json_decode($datos["NOMBRES_PRESENTACIONES"],false)[$i]."'),";
			}
		}
		if(count(json_decode($datos["IDS_PRESENTACIONES"],false))==0 || $nuevos==0) {
			return ModeloProductos::mdlEliminarProductoVideos($datos);
		}
		$stmt = substr($stmt, 0, -1);
		//echo '<pre>'; print_r($stmt); echo '</pre>';
		$stmt = Conexion::conectar()->prepare($stmt);
		if($stmt->execute()){
			return ModeloProductos::mdlEliminarProductoVideos($datos);
			$stmt->close();
			$stmt = null;
		}else{
			return "error";
			$stmt->close();
			$stmt = null;
		}
	}
	/*=============================================
	ELIMINAR PRODUCTO CATEGORIA
	=============================================*/
	static public function mdlEliminarProductoVideos($datos){
		$stmt = Conexion::conectar()->prepare("DELETE FROM productos_videos WHERE idProducto = :id");
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);
		if($stmt -> execute()){
			return ModeloProductos::mdlEditarProductoVideos($datos);
		}else{
			return "error";	
		}
		$stmt -> close();
		$stmt = null;
	}
	static public function mdlEliminarProductoCategoria($datos){
		$stmt = Conexion::conectar()->prepare("DELETE FROM categorias_productos WHERE id_producto = :id");
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);
		if($stmt -> execute()){
			return ModeloProductos::mdlEditarProductoCategorias($datos);
		}else{
			return "error";	
		}
		$stmt -> close();
		$stmt = null;
	}
	/*=============================================
	ELIMINAR PRODUCTO CLASE
	=============================================*/
	static public function mdlEliminarProductoClase($datos){
		$stmt = Conexion::conectar()->prepare("DELETE FROM clases_productos WHERE id_producto = :id");
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);
		if($stmt -> execute()){
			return ModeloProductos::mdlEditarProductoClases($datos);
		}else{
			return "error";	
		}
		$stmt -> close();
		$stmt = null;
	}
	/*=============================================
	ELIMINAR PRODUCTO PRESENTACION
	=============================================*/
	static public function mdlEliminarProductoPresentaciones($datos){
		$IDS_SALVAR="";
		for ($i=0; $i < count(json_decode($datos["IDS_PRESENTACIONES"],false)); $i++) { 
			$ID_A_SALVAR=json_decode($datos["IDS_PRESENTACIONES"],false)[$i];
			if($ID_A_SALVAR!='NUEVA')
				$IDS_SALVAR.=$ID_A_SALVAR.",";
		}
		$IDS_SALVAR = substr($IDS_SALVAR, 0, -1);
		$IDS_SALVAR = $IDS_SALVAR==''?'':"AND id NOT IN ($IDS_SALVAR)";
		$ID=$datos["id"];
		$SQL_PRINT="UPDATE productos_presentaciones SET idProducto=-1 WHERE idProducto = $ID $IDS_SALVAR";
		//echo '<pre>'; print_r($SQL_PRINT); echo '</pre>';
		$stmt = Conexion::conectar()->prepare($SQL_PRINT);
		if($stmt -> execute()){
			return ModeloProductos::mdlEditarProductoPresentaciones($datos);
		}else{
			return "error";	
		}
		$stmt -> close();
		$stmt = null;
	}
		/*=============================================
	ELIMINAR PRODUCTO
	=============================================*/
	static public function mdlEliminarProducto($tabla, $datos){
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
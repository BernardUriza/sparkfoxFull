<?php
require_once "conexion.php";
class ModeloProductos{
	/*=============================================
	MOSTRAR PRODUCTOS
	=============================================*/  
	static public function mdlMostrarProductos($tabla,$id){
		$were=($id=="-1")?'':"AND p.titulo='".$id."'";
			$stmt = Conexion::conectar()->prepare("SELECT GROUP_CONCAT(DISTINCT cp.id_categoria) id_categorias_productos,g.grupo grupo_nombre, GROUP_CONCAT(DISTINCT c.categoria SEPARATOR ', ') id_categorias_productos_nombres,GROUP_CONCAT(DISTINCT pi.rutaImagenMultimedia SEPARATOR ', ') rutas_multimedia,GROUP_CONCAT(DISTINCT pe.rutaImagenMultimedia SEPARATOR ', ') rutas_ejemplos,GROUP_CONCAT(DISTINCT ppres.id SEPARATOR ', ') colores_id,GROUP_CONCAT(DISTINCT ppres.sku SEPARATOR ', ') colores_sku,GROUP_CONCAT(DISTINCT ppres.nombre SEPARATOR ', ') colores_nombres,GROUP_CONCAT(DISTINCT ppres.valor SEPARATOR ', ') colores,p.*, m.marca, GROUP_CONCAT(DISTINCT cl.id_clase) id_clases_productos, GROUP_CONCAT(DISTINCT vid.idYoutube) id_videos,  GROUP_CONCAT(DISTINCT vid.rutaImagen) rutas_videos, GROUP_CONCAT(DISTINCT cll.clase SEPARATOR ', ') id_clases_productos_nombres FROM  $tabla  p 
				LEFT JOIN marcas m ON m.id=p.id_marca 
				LEFT JOIN categorias_productos cp ON cp.id_producto=p.id 
				LEFT JOIN categorias c ON cp.id_categoria=c.id
				LEFT JOIN clases_productos cl ON cl.id_producto=p.id 
				LEFT JOIN clases cll ON cl.id_clase=cll.id 
				LEFT JOIN grupos g ON g.id=p.id_grupo 
				LEFT JOIN productos_imagenes pi ON pi.idProducto=p.id 
				LEFT JOIN productos_ejemplos pe ON pe.idProducto=p.id 
				LEFT JOIN productos_presentaciones ppres ON ppres.idProducto=p.id 
				LEFT JOIN productos_videos prvi ON prvi.idProducto=p.id  
				LEFT JOIN videos vid ON vid.id=prvi.idVideo
				WHERE p.estado=1  $were 
				GROUP BY p.id ORDER BY p.fecha DESC"); 
			$stmt -> execute();
			return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	}

	static public function mdlMostrarProductosL10($tabla,$id){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM (SELECT GROUP_CONCAT(DISTINCT cp.id_categoria) id_categorias_productos,g.grupo grupo_nombre, GROUP_CONCAT(DISTINCT c.categoria SEPARATOR ', ') id_categorias_productos_nombres,GROUP_CONCAT(DISTINCT pi.rutaImagenMultimedia SEPARATOR ', ') rutas_multimedia,GROUP_CONCAT(DISTINCT pe.rutaImagenMultimedia SEPARATOR ', ') rutas_ejemplos,GROUP_CONCAT(DISTINCT ppres.id SEPARATOR ', ') colores_id,GROUP_CONCAT(DISTINCT ppres.sku SEPARATOR ', ') colores_sku,GROUP_CONCAT(DISTINCT ppres.nombre SEPARATOR ', ') colores_nombres,GROUP_CONCAT(DISTINCT ppres.valor SEPARATOR ', ') colores,p.*, m.marca, GROUP_CONCAT(DISTINCT cl.id_clase) id_clases_productos, GROUP_CONCAT(DISTINCT vid.idYoutube) id_videos,  GROUP_CONCAT(DISTINCT vid.rutaImagen) rutas_videos, GROUP_CONCAT(DISTINCT cll.clase SEPARATOR ', ') id_clases_productos_nombres FROM  $tabla  p 
				LEFT JOIN marcas m ON m.id=p.id_marca 
				LEFT JOIN categorias_productos cp ON cp.id_producto=p.id 
				LEFT JOIN categorias c ON cp.id_categoria=c.id
				LEFT JOIN clases_productos cl ON cl.id_producto=p.id 
				LEFT JOIN clases cll ON cl.id_clase=cll.id 
				LEFT JOIN grupos g ON g.id=p.id_grupo 
				LEFT JOIN productos_imagenes pi ON pi.idProducto=p.id 
				LEFT JOIN productos_ejemplos pe ON pe.idProducto=p.id 
				LEFT JOIN productos_presentaciones ppres ON ppres.idProducto=p.id 
				LEFT JOIN productos_videos prvi ON prvi.idProducto=p.id  
				LEFT JOIN videos vid ON vid.id=prvi.idVideo
				WHERE p.estado=1
				GROUP BY p.id ORDER BY p.id DESC LIMIT 10) a ORDER BY RAND()"); 
			$stmt -> execute();
			return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	}

		static public function mdlMostrarProductosClases($tabla,$clases){
		$were="AND p.id IN (SELECT id_producto FROM clases_productos WHERE id_clase IN(".$clases."))";
			$stmt = Conexion::conectar()->prepare("SELECT GROUP_CONCAT(DISTINCT cp.id_categoria) id_categorias_productos,g.grupo grupo_nombre, GROUP_CONCAT(DISTINCT c.categoria SEPARATOR ', ') id_categorias_productos_nombres,GROUP_CONCAT(DISTINCT pi.rutaImagenMultimedia SEPARATOR ', ') rutas_multimedia,GROUP_CONCAT(DISTINCT pe.rutaImagenMultimedia SEPARATOR ', ') rutas_ejemplos,GROUP_CONCAT(DISTINCT ppres.id SEPARATOR ', ') colores_id,GROUP_CONCAT(DISTINCT ppres.sku SEPARATOR ', ') colores_sku,GROUP_CONCAT(DISTINCT ppres.nombre SEPARATOR ', ') colores_nombres,GROUP_CONCAT(DISTINCT ppres.valor SEPARATOR ', ') colores,p.*, m.marca, GROUP_CONCAT(DISTINCT cl.id_clase) id_clases_productos, GROUP_CONCAT(DISTINCT vid.idYoutube) id_videos,  GROUP_CONCAT(DISTINCT vid.rutaImagen) rutas_videos, GROUP_CONCAT(DISTINCT cll.clase SEPARATOR ', ') id_clases_productos_nombres FROM  $tabla  p 
				LEFT JOIN marcas m ON m.id=p.id_marca 
				LEFT JOIN categorias_productos cp ON cp.id_producto=p.id 
				LEFT JOIN categorias c ON cp.id_categoria=c.id
				LEFT JOIN clases_productos cl ON cl.id_producto=p.id 
				LEFT JOIN clases cll ON cl.id_clase=cll.id 
				LEFT JOIN grupos g ON g.id=p.id_grupo 
				LEFT JOIN productos_imagenes pi ON pi.idProducto=p.id 
				LEFT JOIN productos_ejemplos pe ON pe.idProducto=p.id 
				LEFT JOIN productos_presentaciones ppres ON ppres.idProducto=p.id 
				LEFT JOIN productos_videos prvi ON prvi.idProducto=p.id  
				LEFT JOIN videos vid ON vid.id=prvi.idVideo
				WHERE p.estado=1  $were 
				GROUP BY p.id ORDER BY RAND()"); 
			$stmt -> execute();
			return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	}
}
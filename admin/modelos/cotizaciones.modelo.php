<?php
require_once "conexion.php";
class ModeloCotizaciones{
	/*=============================================
	MOSTRAR COTIZACIONES
	=============================================*/	
	static public function mdlMostrarCotizaciones($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT c.*, GROUP_CONCAT(p.idProducto) idProductos, GROUP_CONCAT(p.Cantidad) cantidades, GROUP_CONCAT(pp.titulo)  nombres, GROUP_CONCAT(IFNULL(ppres.sku,''))  sku_colores, GROUP_CONCAT(IFNULL(ppres.nombre,''))  sku_nombres, COUNT(p.id) modelos, SUM(p.Cantidad) articulos FROM cotizaciones c LEFT JOIN cotizacion_productos p ON p.idCotizacion=c.id LEFT JOIN productos pp ON pp.id=p.idProducto LEFT JOIN productos_presentaciones ppres ON ppres.id=p.idPresentacion GROUP BY c.id ORDER BY id DESC");
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	}
}
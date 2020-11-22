<?php
require_once "conexion.php";
class ModeloCotizaciones{
	/*=============================================
	CREAR COTIZACION
	=============================================*/	
	static public function mdlCrearCotizacion($tabla,$ip,$pais,$codigo,$correo,$nombre,$puesto,$empresa,$telefono,$mensaje,$productos){
		$BDBD=Conexion::conectar();
		$stmt = $BDBD->prepare("INSERT INTO $tabla(ip,pais,codigo,correo,nombre,puesto,empresa,telefono,mensaje) VALUES (:ip,:pais,:codigo,:correo,:nombre,:puesto,:empresa,:telefono,:mensaje)");
		$stmt->bindParam(":ip", $ip, PDO::PARAM_STR);
		$stmt->bindParam(":pais", $pais, PDO::PARAM_STR);
		$stmt->bindParam(":codigo", $codigo, PDO::PARAM_STR);
		$stmt->bindParam(":correo", $correo, PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
		$stmt->bindParam(":puesto", $puesto, PDO::PARAM_STR);
		$stmt->bindParam(":empresa", $empresa, PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $telefono, PDO::PARAM_STR);
		$stmt->bindParam(":mensaje", $mensaje, PDO::PARAM_STR);
		if($stmt->execute()){
				return ModeloCotizaciones::mdlCrearCotizacionProductos($BDBD->lastInsertId(),$productos);
		}else{
			return "error";
		
		}
		$stmt->close();
		$stmt = null;
	}
	static public function mdlCrearCotizacionProductos($id,$productos){

		$stmt="INSERT INTO cotizacion_productos(idCotizacion,idProducto,idPresentacion,Cantidad) VALUES ";
		$nuevos=0;
		for ($i=0; $i < count(json_decode($productos,false)); $i++) { 
				$nuevos++;
				$stmt=$stmt." ('".$id."', '".json_decode($productos,false)[$i]->id."', '".json_decode($productos,false)[$i]->idPresentacion."', '".json_decode($productos,false)[$i]->cantidad."'),";
		}
		$stmt = substr($stmt, 0, -1);
		//echo '<pre>'; print_r($stmt); echo '</pre>';
		
		if($nuevos==0) {
			return "ok";
		}

		$stmt = Conexion::conectar()->prepare($stmt);
		if($stmt->execute()){
				return $id;
		}else{
			return "error";
		
		}
		$stmt->close();
		$stmt = null;
	}
}
<?php
class ControladorServicios{
	public function ctrEstiloServicios(){
		$tabla = "servicios";
		$respuesta = ModeloServicios::mdlObtenerServicios($tabla);
		return $respuesta;
	}
}
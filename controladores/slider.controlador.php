<?php
class ControladorSlider{
	public function ctrEstiloSlider(){
		$tabla = "slider";
		$respuesta = ModeloSlider::mdlObtenerSlider($tabla);
		return $respuesta;
	}
}
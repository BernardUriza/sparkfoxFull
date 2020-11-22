<?php
$plantilla = ControladorComercio::ctrSeleccionarPlantilla();
?>
<div class="box box-primary">
	<!--=====================================
  	LOGOTIPO
	======================================-->
	<div class="box-header with-border">
		<h3 class="box-title"> Imagenes de la plantilla de inicio</h3>
		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fa fa-minus"></i>
			</button>
		</div>
	</div>
	<div class="box-body">
		<div class="row ImagenesPlantilla form-group">
			<label>Cambiar Imagen Principal para Oferta Inferior</label>
			<p class="pull-right">
				<img src="../<?php  echo $plantilla["rutaImagenPortada"].'?'.rand(80,900); ?>" class="img-thumbnail previsualizarRutaImagenPortada" width="200px">
			</p>
			<input type="hidden" class="hiddenRUTA_previsualizarRutaImagenPortada" value="<?php  echo $plantilla["rutaImagenPortada"] ?>">
			<input type="hidden" class="hidden_previsualizarRutaImagenPortada" value="<?php  echo $plantilla["idArchivoImagenPortada"] ?>">
			<input type="file" id="subirRutaImagenPortada" class="subirImagenPlantilla" connecting_BDD="previsualizarRutaImagenPortada">
		</div>	
		<div class="row ImagenesPlantilla form-group">
			<label>Cambiar Imagen Principal para Oferta Parallax Derecha</label>
			<p class="pull-right">
				<img src="../<?php  echo $plantilla["rutaImagenParallaxDerecho"].'?'.rand(80,900); ?>" class="img-thumbnail previsualizarRutaImagenParallaxDerecho" width="200px">
			</p>
			<input type="hidden" class="hiddenRUTA_previsualizarRutaImagenParallaxDerecho" value="<?php  echo $plantilla["rutaImagenParallaxDerecho"] ?>">
			<input type="hidden" class="hidden_previsualizarRutaImagenParallaxDerecho" value="<?php  echo $plantilla["idArchivoImagenParallaxDerecho"] ?>">
			<input type="file" id="subirRutaImagenParallaxDerecho" class="subirImagenPlantilla" connecting_BDD="previsualizarRutaImagenParallaxDerecho" >
		</div>	
		<div class="row ImagenesPlantilla form-group">
			<label>Cambiar Imagen Principal para  Oferta Parallax Izquierda</label>
			<p class="pull-right">
				<img src="../<?php  echo $plantilla["rutaImagenParallaxIzquierdo"].'?'.rand(80,900); ?>" class="img-thumbnail previsualizarRutaImagenParallaxIzquierdo" width="200px">
			</p>
			<input type="hidden" class="hiddenRUTA_previsualizarRutaImagenParallaxIzquierdo"  value="<?php  echo $plantilla["rutaImagenParallaxIzquierdo"] ?>">
			<input type="hidden" class="hidden_previsualizarRutaImagenParallaxIzquierdo"  value="<?php  echo $plantilla["idArchivoImagenParallaxIzquierdo"] ?>">
			<input type="file" id="subirRutaImagenParallaxIzquierdo" class="subirImagenPlantilla" connecting_BDD="previsualizarRutaImagenParallaxIzquierdo">
		</div>	
	</div>
	<div class="box-footer">
		<button type="button" id="guardarImagenes" class="btn btn-primary pull-right">Guardar Imagenes</button>
	</div>
</div>
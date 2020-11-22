<?php
$paises = ControladorComercio::ctrSeleccionarPaises();
?>
<div class="box box-success">
	<div class="box-header with-border">
		<h3 class="box-title">DEFAULTS</h3>
		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
			<i class="fa fa-minus"></i>
			</button>
		</div>
	</div>
	<div class="box-body">
		<div class="form-group">
			<label>Upload Header Default</label>
			<p class="pull-right">
				<img src="../<?php  echo $plantilla["rutaHeader"].'?'.rand(80,900); ?>" class="img-thumbnail previsualizarHeader" width="200px">
			</p>
			<input type="file" id="subirHeader">
			<input type="text" style="display: none" class="rutaImagen" name="rutaImagen" value="<?php  echo $plantilla["rutaHeader"]; ?>">
			<input type="text" style="display: none" class="idArchivoImagen" name="idArchivoImagen">
		</div>
		<div class="form-group">
			<label>Text default</label>
			<input type="text" class="form-control input-lg mensajeHeader" value="<?php  echo $plantilla["mensajeHeader"]; ?>">
		</div>
	</div>
	<div class="box-footer">
		<button type="button" id="guardarDefaults" class="btn btn-primary pull-right">Save</button>
	</div>
</div>
<?php
$plantilla = ControladorComercio::ctrSeleccionarPlantilla();
?>
<div class="box box-primary">
	<!--=====================================
  	LOGOTIPO
	======================================-->
	<div class="box-header with-border">
		<h3 class="box-title"> SHARE PICTURE</h3>
		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fa fa-minus"></i>
			</button>
		</div>
	</div>
	<div class="box-body">
		<div class="form-group">
			<label>Upload</label>
			<p class="pull-right">
				<img src="../<?php  echo $plantilla["imgShare"].'?'.rand(80,900); ?>" class="img-thumbnail previsualizarLogo" width="200px">
			</p>
			<input type="file" id="subirLogo">
		</div>	
	</div>
	<div class="box-footer">
		<button type="button" id="guardarLogo" class="btn btn-primary pull-right">Save</button>
	</div>
</div>
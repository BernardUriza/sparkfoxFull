<?php
$plantilla = ControladorComercio::ctrSeleccionarPlantilla();
?>
<style>
	.canvasPDF{    box-shadow: 0 0 3px black;
		    width: 200px;
		    cursor: pointer;
	}
	.ocultableDOCUMENTO{
		display: none;
	}
</style>
<div class="box box-dark ocultableDOCUMENTO">
	<!--=====================================
  	LOGOTIPO
	======================================-->
	<div class="box-header with-border">
		<h3 class="box-title"> TERMS AND CONDITIONS</h3>
		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fa fa-minus"></i>
			</button>
		</div>
	</div>
	<div class="box-body">
		<div class="form-group row col-xs-12">
			<label>Upload</label>
			<p class="pull-right">
				<img pdflink="<?php echo $plantilla["rutaTerminos"] ?>" class="canvasPDF" id="previsualizarTerminos" width="200px">
			</p>
			<input type="file" class="fileDocumento" id="subirTerminos">
		</div>	
	</div>
	<div class="box-header with-border">
		<h3 class="box-title"> PRIVACY DOC</h3>
		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fa fa-minus"></i>
			</button>
		</div>
	</div>
	<div class="box-body">
		<div class="form-group row col-xs-12">
			<label>Upload</label>
			<p class="pull-right">
				<img pdflink="<?php echo $plantilla["rutaAviso"] ?>" class="canvasPDF" id="previsualizarPrivacidad" width="200px">
			</p>
			<input type="file" class="fileDocumento" id="subirAviso">
		</div>	
	</div>
</div>
<div class="hidden">
	<div class="row">
                           <div class="col-sm-8"><span>Página: <span id="page_num">1</span> / <span id="page_count">1</span></span></div>
                           <div class="col-sm-2"><a id="prev"><i class="fa fa-arrow-left"></i></a></div>
                           <div class="col-sm-2"><a id="next"><i class="fa fa-arrow-right"></i></a></div>
                        </div>
</div>
				<canvas class="hidden" id="previsualizarPDF" width="200px">
<div class="box box-warning">
	<div class="box-header with-border">
		<h3 class="box-title">PLANTILLA</h3>
		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
			<i class="fa fa-minus"></i>
			</button>
		</div>
	</div>
	<div class="box-body">
	<?php /*echo '<pre>'; print_r($plantilla); echo '</pre>';*/ ?>
	<div class="form-group row">
		<div class="col-xs-12">
			<div class="input-group">
				<span class="input-group-addon">metaTitulo</span>
				<textarea type="text" class="form-control metaTitulo"><?php echo $plantilla["metaTitulo"]; ?></textarea>
			</div>
		</div>
	</div>
	<div class="form-group row">
		<div class="col-xs-12">
			<div class="input-group">
				<span class="input-group-addon">metaDescripcion</span>
				<textarea type="text" class="form-control metaDescripcion"><?php echo $plantilla["metaDescripcion"]; ?></textarea>
			</div>
		</div>
	</div>
	<div class="form-group row">
		<div class="col-xs-12">
			<div class="input-group">
				<span class="input-group-addon">titulo</span>
				<textarea type="text" class="form-control titulo"><?php echo $plantilla["titulo"]; ?></textarea>
			</div>
		</div>
	</div>
	<div class="form-group row">
		<div class="col-xs-12">
			<div class="input-group">
				<span class="input-group-addon">derechosCopia</span>
				<textarea type="text" class="form-control derechosCopia"><?php echo $plantilla["derechosCopia"]; ?></textarea>
			</div>
		</div>
	</div>
	<div class="form-group row">
		<div class="col-xs-12">
			<div class="input-group">
				<span class="input-group-addon">ofertaTitulo</span>
				<textarea type="text" class="form-control ofertaTitulo"><?php echo $plantilla["ofertaTitulo"]; ?></textarea>
			</div>
		</div>
	</div>
	<div class="form-group row">
		<div class="col-xs-12">
			<div class="input-group">
				<span class="input-group-addon">ofertaDescripcion</span>
				<textarea type="text" class="form-control ofertaDescripcion"><?php echo $plantilla["ofertaDescripcion"]; ?></textarea>
			</div>
		</div>
	</div>
	<div class="form-group row">
		<div class="col-xs-12">
			<div class="input-group">
				<span class="input-group-addon">ofertaSubtitulo</span>
				<textarea type="text" class="form-control ofertaSubtitulo"><?php echo $plantilla["ofertaSubtitulo"]; ?></textarea>
			</div>
		</div>
	</div>
	
	
</div>
<div class="box-footer">
	<button type="button" id="guardarPlantilla" class="btn btn-primary pull-right">Guardar</button>
</div>
</div>
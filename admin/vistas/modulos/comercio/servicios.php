<div class="box box-dark">
	<!--=====================================
  	LOGOTIPO
	======================================-->
	<div class="box-header with-border">
		<h3 class="box-title"> Servicios</h3>
		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fa fa-minus"></i>
			</button>
		</div>
	</div>
	<div class="box-body">
		<?php 
 	$item = null;
 	$valor = null;
 	$servicios = ControladorServicios::ctrMostrarServicios($item, $valor);	
 	//echo '<pre>'; print_r($servicios); echo '</pre>'; 
 	for ($IndexServicio=0; $IndexServicio < count($servicios); $IndexServicio++) { 
 		$value=$servicios[$IndexServicio];
 			echo '<div class="form-group row">
					<div class="col-xs-5">
						<input type="text" class="form-control input-lg" id_BDD="'.$value["id"].'" value="'.$value["titulo"].'">
					</div>
					<div class="col-xs-5">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa '.$value["ico"].' icoServicio"></i></span>
							<textarea type="text" class="form-control" id_BDD="'.$value["id"].'">'.$value["descripcion"].'</textarea>
						</div>
					</div>
					<div class="col-xs-1">';
						echo '<button type="button" id_BDD="'.$value["id"].'" class="btn btn-primary guardarServicio"><i class="fa fa-floppy-o" aria-hidden="true"></i></button>';
					echo '</div>
				</div>';
 	}
 	?>	
	</div>
</div>
<div class="container mw-100 w-100" style="border-bottom: 1px solid #D8D7D8;height: 50px;">
	<div class="container h-100">
		<div class="row h-100 align-items-center" style="height: 30px">
			<div class="col-12 d-flex justify-content-between">
				<div class="rutaPagina">HOME / WHERE TO BUY</div>
				<div>
					
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container mw-100 w-100" style="border-bottom: 1px solid #D8D7D8;">
	<div class="container h-100  pb-5 mb-5">
		<div class="row h-100 align-items-center mb-5" style="height: 300px">
			<div class="col-12 d-flex justify-content-between">
				<h2 class="rutaPaginaCompliance">Where to buy</h2>
			</div>
		</div>
		<?php
		$Preguntas=ControladorPreguntas::ctrMostrarPreguntas();
	//	echo '<pre>'; print_r($Preguntas); echo '</pre>';
		$a=array();
		$pais=array();
			for ($IndexPreguntas=0; $IndexPreguntas < count($Preguntas); $IndexPreguntas++) {
						$value=$Preguntas[$IndexPreguntas]["codigo"];
			if(!in_array($value, $a)){
					$a[]=$value;
					$pais[]=$Preguntas[$IndexPreguntas]["pais"];
			}
		}
		for ($IndexPais=0; $IndexPais < count($a); $IndexPais++) { ?>
		<div class="row h-100 align-items-center py-3" style="border-bottom: 1px solid #D8D7D8E0;">
			<div class="col-12" style="font-size: 20px">
				<img src="https://raw.githubusercontent.com/hjnilsson/country-flags/master/png100px/<?php echo strtolower( $a[$IndexPais]) ?>.png" class="banderaCss mr-3">	<?php 	echo $pais[$IndexPais] ?>
			</div>
		</div>
		<div class="row h-100 align-items-center py-3" >
			<div class="col-12">
				<?php
				for ($IndexTienda=0; $IndexTienda < count($Preguntas); $IndexTienda++) if($Preguntas[$IndexTienda]["codigo"]==$a[$IndexPais]) {  ?>
				<a href="<?php echo $Preguntas[$IndexTienda]["respuesta"] ?>" target="_blank"><img src="<?php echo $Preguntas[$IndexTienda]["rutaImagenPortada"] ?>" class="tiendaCss mr-3"></a>
				<?php 		}	 ?>
			</div>
		</div>
		<?php	}		?>
	</div>
</div>
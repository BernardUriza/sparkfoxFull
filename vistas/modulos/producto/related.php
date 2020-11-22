<div class="container mw-100 w-100 px-0">
	<div class="container">
	<div class="owl-carousel py-4 carousel-related ">
		<?php

		$Productos = ControladorProductos::ctrMostrarProductosClases($Producto['id_clases_productos']);
		for ($IndexProductos=0; $IndexProductos < count($Productos); $IndexProductos++) {  
			$Producto=$Productos[$IndexProductos];
			?>
		<div class="relatedSlides" onclick="window.location='product--<?php echo str_replace("+","-",urlencode($Producto["titulo"])); ?>'">
						<div class="p-relatedSlides row m-0 align-items-center">
							<div class="col px-0">
								<div class="producto-relatedSlides  py-2 my-2" style="background-image: url('<?php echo $Producto['rutaImagenPortada']==""?"vistas/img/default.jpg":$Producto['rutaImagenPortada'] ?>');"></div>
								<div class="doubles-tennis-pack"><?php echo $Producto["titulo"]; ?></div>
								<div class="doubles-tennis">For <?php echo GetFormatCatalog($Producto["id_clases_productos_nombres"]); ?></div>
							</div>
						</div>
					</div>
		<?php } ?>
	</div>
	</div>
</div>
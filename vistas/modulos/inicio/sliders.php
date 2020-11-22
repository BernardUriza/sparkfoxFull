<?php 
function truncate($text, $length) {
   $length = abs((int)$length);
   if(strlen($text) > $length) {
      $text = preg_replace("/^(.{1,$length})(\s.*|$)/s", '\\1...', $text);
   }
   return($text);
}
 ?>

<div class="container mw-100">
	<div class="row">
		<div class="col-12 col-md-6 columnaSliders p-0">
			<div class="promos-events">NEWS & EVENTS</div>
			<div class="owl-carousel carousel-events">
				<?php
				$Productos = ControladorBlogs::ctrMostrarBlogs();
				for ($IndexProductos=0; $IndexProductos < count($Productos); $IndexProductos++) {
			//echo '<pre>'; print_r($Productos); echo '</pre>';
			$Producto = $Productos[$IndexProductos];
			?>
			<div class="obtenerSlides" onclick="location='blog--<?php echo str_replace("+","-",urlencode($Producto["titulo"])) ?>'">
				<div class="imagen-obtenerSlides" style="background-image: url('<?php echo $Producto['rutaImagenPortada']; ?>');"></div>
				<div class="promgame-events"><?php echo $Producto['titulo']; ?></div>
				<div class="promgame-events-desc"><?php echo  truncate((strip_tags($Producto['descripcion'])), 110); ?></div>
			</div>
			<?php } ?>
		</div>
	</div>
	<div class="col-12 col-md-6 columnaSliders2 p-0">
		<div class="promos-events">LATEST PRODUCTS</div>
		<div class="owl-carousel carousel-products">
			<?php
			$Productos = ControladorProductos::ctrMostrarProductosL10();
		//echo '<pre>'; print_r($Productos); echo '</pre>';
			for ($IndexProductos=count($Productos)-1; $IndexProductos > -1; $IndexProductos--) {
		$Producto = $Productos[$IndexProductos];
		?>
		<div class="obtenerSlides" onclick="window.location='product--<?php echo str_replace("+","-",urlencode($Producto["titulo"])); ?>'">
			<div class="p-obtenerSlides row m-0 align-items-start">
				<div class="col px-0">
					<div class="producto-obtenerSlides  py-2 m-2" style="background-image: url('<?php echo $Producto['rutaImagenPortada']==""?"vistas/img/default.jpg":$Producto['rutaImagenPortada'] ?>');"></div>
					<div class="pCarContenedores"><div class="doubles-tennis-pack"><?php echo $Producto["titulo"]; ?></div></div>
					<div class="pCarContenedores"><div class="doubles-tennis">For <?php echo GetFormatCatalog($Producto["id_clases_productos_nombres"]); ?></div></div>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
</div>
</div>
</div>

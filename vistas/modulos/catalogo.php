<?php  
            $Categories=ControladorCategorias::ctrMostrarCategorias();
            echo '<pre class="d-none categoriasJSON">'; echo(json_encode($Categories)); echo '</pre>';
            echo '<pre class="d-none rutaHeader">'; echo $plantilla['rutaHeader'];  echo '</pre>';
            echo '<pre class="d-none mensajeHeader">'; echo $plantilla['mensajeHeader'];  echo '</pre>';

            echo '<pre class="d-none clasesJSON">'; echo(json_encode($Clases)); echo '</pre>';
?>
<div class="container mw-100 w-100 banner" style=" display: none;">
	<div class="container h-100">
		<div class="row h-100 align-items-center" style="height: 30px">
			<div class="controllers">
				CATEGORY 
			</div>
			<img class="mx-3 px-5 controllersIMG" style="height: 40px">
		</div>
	</div>
</div>
<div class="container mw-100 w-100" style="border-bottom: 1px solid #D8D7D8;height: 50px;">
	<div class="container h-100">
		<div class="row h-100 align-items-center" style="height: 30px">
			<div class="col-12 d-flex justify-content-between">
				<div class="rutaPagina"><a href="inicio">HOME</a> / <a class="rutaPaginaCa" href="">CATEGORY</a> / <a class="rutaPaginaCo" href="">COMPATIBILITY</a></div>
				<div>
					<div class="dropdown filtroCatalogo">
						<a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
							FILTER BY
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                     <li class="dropdown-header">COMPATIBILITIES</li>
                     <a class="dropdown-item" id="filtrandoClase0">SHOW ALL</a>
							   <?php
                    for ($IndexClases=count($Clases)-1; $IndexClases >= 0; $IndexClases--) if($Clases[$IndexClases]["estado"]==1) { //activo
                    	?>
							<a class="dropdown-item" id="filtrandoClase<?php echo $Clases[$IndexClases]["id"]  ?>"><?php echo $Clases[$IndexClases]["clase"]; ?></a>
                    <?php  } ?>
							 <li class="dropdown-header">CATEGORIES</li>
                     		<a class="dropdown-item" id="filtrandoCategoria0">SHOW ALL</a>
							   <?php

                    for ($IndexCategories=count($Categories)-1; $IndexCategories >= 0; $IndexCategories--) { //activo
                    	?>
							<a class="dropdown-item" id="filtrandoCategoria<?php echo $Categories[$IndexCategories]["id"]  ?>"><?php echo $Categories[$IndexCategories]["categoria"]; ?></a>
                    <?php  } ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container pb-4" style="min-height: 200px">
	<div class="row todosProductosFiltrados"><div class="w-100 my-5 py-5 d-flex justify-content-center"> <h3 class="my-5 py-5">There are no products with this filter</h3> </div></div>
	<div class="row d-none todosProductosFiltrables">
		<?php 

$Productos = ControladorProductos::ctrMostrarProductos();
//echo '<pre>'; print_r($Productos); echo '</pre>';
		for ($IndexProductos=0; $IndexProductos < count($Productos); $IndexProductos++) { 
			$Producto = $Productos[$IndexProductos];
			$BusquedaCSV=$Producto["id_clases_productos_nombres"].",".$Producto["titulo"].",".$Producto["id_categorias_productos_nombres"];
			?>
		<div class="col-lg-3 col-12 col-md-6  d-flex justify-content-center py-2" buscandores="<?php echo $BusquedaCSV; ?>" filtrandoCategoria="<?php echo $Producto["id_categorias_productos"]  ?>,0" filtrandoClase="<?php echo $Producto["id_clases_productos"]  ?>,0" onclick="location='product--<?php echo str_replace("+","-",urlencode($Producto["titulo"])); ?>'">
			<div class="cardProducto my-3">
				<div class="producto-obtenerSlides  my-3" style="background-image: url(' <?php echo $Producto['rutaImagenPortada']==""?"vistas/img/default.jpg":$Producto['rutaImagenPortada'] ?>');"></div>
				<div class="doubles-tennis-pack pb-1"><?php echo $Producto["titulo"]; ?></div>
				<div class="doubles-tennis pb-1">For <?php echo GetFormatCatalog($Producto["id_clases_productos_nombres"]); ?></div>
				<div class="doubles-tennis pb-1 d-none">sch <?php echo $BusquedaCSV; ?></div>
				<div class="doubles-detalles py-3"><a class="invisibilizar" href="product--<?php echo str_replace("+","-",urlencode($Producto["titulo"])); ?>">SEE DETAILS</a></div>
			</div>
		</div>
		<?php } ?>
	</div>
</div>
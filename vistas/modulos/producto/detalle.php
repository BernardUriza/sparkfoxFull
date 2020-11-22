<div class="container mw-100 w-100 bg-white contenedorProductoDetalle-padre" style="">
	<div class="container contenedorProductoDetalle">
		<div class="row h-100 pt-4">
			<div class="col-12 col-lg-7">
				<div class="row" style="height: 540px">
					<div class="col-12">
						<div class="imgCarruselProducto" style="
							background-size: contain;background-repeat: no-repeat;
							background-position: center; height: 100%;margin: auto;display: block;
							background-image: url('<?php echo ($Portada); ?>'); ">
						</div>
					</div>
				</div>
				<div class="row pt-4">
					<div class="col-1">
						<i class="fa fa-angle-left leftCopiandoCSS" onclick="$('.leftCopiando').click()" aria-hidden="true"></i>
					</div>
					<div class="col-10">
						<div class="owl-carousel carousel-products">
							<?php echo "<div class=\"obtenerSlides\"> <div class='producto-obtenerSlides' style=\"background-image: url('".($Producto['rutaImagenPortada']==""?"vistas/img/default.jpg":$Producto['rutaImagenPortada'])."')\";\"></div></div>";
							$multimedia = explode(",",  str_replace(' ', '', $Producto["rutas_ejemplos"]));
							if($multimedia[0]!="")
							for ($i=0; $i < count($multimedia); $i++) { ?>
							<div class="obtenerSlides">
								<div class="producto-obtenerSlides" style="height: 100px;
									background-repeat: no-repeat;background-size: contain; background-position: center;
									background-image: url('<?php echo $multimedia[$i]  ?>');">
									
								</div>
							</div>
							<?php } ?>
						</div>
					</div>
					<div class="col-1">
						<i class="fa fa-angle-right rightCopiandoCSS" onclick="$('.rightCopiando').click()" aria-hidden="true"></i>
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-5">
				
				<div class="row rowDetalle py-2">
					<div class="col-12 tituloProducto">
						<?php echo $Producto['titulo']; ?>
					</div>
					<div class="col-12 skuProducto">
						SKU: <?php echo $Producto['codigo']; ?>
					</div>
				</div>
				
				<div class="row rowDetalle py-2 d-none">
				</div>
				
				<div class="row rowDetalle py-2">
					<div class="col-12 descripcionProducto">
						<?php echo $Producto['descripcion']; ?>
					</div>
				</div>
				
				<div class="row rowDetalle py-2">
					<div class="col-12 compaProducto">
						Compatibility with: <span><?php echo GetFormatCatalog($Producto['id_clases_productos_nombres']); ?></span>
					</div>
					
				</div>
				<?php
					$colores=explode(",", $Producto['colores']);
					$skus=explode(",", $Producto['colores_sku']);
					$colores_nombres=explode(",", $Producto['colores_nombres']);
					if($colores[0]!=""){
				?>
				<div class="row rowDetalle py-2 coloresProducto m-0 ">
					<span class="align-self-center mr-3">Colors:</span>
					<?php
					for ($i=0; $i < count($colores); $i++) {
					?>
					<span class="mx-3 badge badge-secondary" data-toggle="tooltip" data-placement="left" title="Color: <?php echo $colores_nombres[$i]; ?> SKU: <?php echo $skus[$i]; ?>" style="    border: solid 1px gray;background-color: <?php echo $colores[$i]; ?>"> </span>
					<?php  } ?>
				</div>
				<?php
				}
					$tiendas= parse_csv($Producto['tiendas']);
					if($tiendas[0][0]!=""){
				?>
				<div class="row rowDetalle py-2 ">
					<div class="col-4" style="line-height: 30px;">
						Find a Retailer:
					</div>
					<div class="col-8">
						<div class="dropdown filtroCatalogo">
							<a href="#" class="btn btn-default dropdown-toggle d-flex justify-content-between" data-toggle="dropdown">
								<div>SELECT STORE</div>
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
								<?php for ($i=0; $i < count($tiendas); $i++) { ?>
								<a class="dropdown-item" target="_blank" href="<?php echo $tiendas[$i][1]; ?>"><?php echo $tiendas[$i][0]; ?></a>
								<?php } ?>
							</ul>
						</div>
					</div>
				</div>
				<?php 
				}
				 ?>
				<div class="row rowDetalle py-4" style=" border-bottom: 1px solid transparent;">
					<div class="" style="    line-height: 32px;">Share: </div>
					<div class=" d-flex" style="
    line-height: 37px;
    font-size: 30px;
    margin-left: 3px;">
						<a class="twitter-share-button mx-3"
  href="https://twitter.com/intent/tweet?url=<?php echo urlencode ($actual_link); ?>"
  data-size="large"><i class="fab fa-twitter-square"></i></a>

 <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode (str_replace("https","http",$actual_link)); ?>&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore mx-3"><i class="fab fa-facebook-square"></i> </a> 

					</div>
				</div>

			</div>
		</div>
	</div>
</div>
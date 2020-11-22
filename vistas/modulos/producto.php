<div class="container mw-100 w-100 banner" style="border-bottom: 1px solid #D8D7D8;height: 50px;">
<div class="container h-100">
	<div class="row h-100 align-items-center" style="height: 30px">
		<div class="col-12 d-flex justify-content-between">
			<div class="rutaPagina"><a href="inicio">HOME</a> / <a class="rutaPaginaCa" href="products" idCategoria="<?php
echo explode(",", (strtoupper($Producto['id_categorias_productos'])))[0];
?>">
				<?php
echo explode(",", (strtoupper($Producto['id_categorias_productos_nombres'])))[0];
?>
			</a> / <a class="rutaPaginaCo" href="products" idClase="<?php
echo explode(",", (strtoupper($Producto['id_clases_productos'])))[0];
?>">
				<?php
echo explode(",", (strtoupper($Producto['id_clases_productos_nombres'])))[0];
?>
			</a> / <a class="rutaPagina" href="product--<?php echo $Parametros[1] ?>"><?php echo strtoupper($Producto["titulo"]); ?></a></div>
			<div>
			</div>
		</div>
	</div>
</div>
</div>
<div class="container mw-100 w-100 bannerProducto" style="background-image: url('<?php echo $Producto['rutaArchivoImagenHeader']; ?>');height: 500px">
</div>
<?php require_once __DIR__ . '/producto/detalle.php';
$multimedia = explode(",", str_replace(' ', '', $Producto["rutas_multimedia"]));
$rutas_videos = explode(",", str_replace(' ', '', $Producto["rutas_videos"]));
$id_videos = explode(",", str_replace(' ', '', $Producto["id_videos"]));

?>
<div class="container mw-100 w-100  pt-5 contenedorMultimedias px-0">
<?php
if ($multimedia[0] != "") {
	?>
<div class="owl-carousel pt-5 carousel-multimedia ">
<?php
for ($i = 0; $i < count($multimedia); $i++) {?>
<div class="multimediaSlides" >
<div class="multimedia-obtenerSlides" style="height: 370px;
	background-repeat: no-repeat;background-size: cover; background-position: center;
	background-image: url('<?php echo $multimedia[$i] ?>');" onclick="onClick<?php echo $i ?>()">
	<script>
	function onClick<?php echo $i ?>(){
	swal({
	  html: "<img src='<?php echo $multimedia[$i] ?>' style='height: 85vh;'>",
  showCancelButton: false,
  showConfirmButton: false
	});
	}
	</script>
</div>
</div>
<?php }
	for ($i = 0; $i < count($rutas_videos); $i++) {
		if ($rutas_videos[$i] != "") {?>
<div class="multimediaSlides" >
<div class="multimedia-obtenerSlides js-video-btn" data-video-id='<?php echo $id_videos[$i] ?>' style="height: 370px;
	background-repeat: no-repeat;background-size: cover; background-position: center;
	background-image: url('<?php echo $rutas_videos[$i] ?>');">
	<span style="">
		<i class="far fa-play-circle" ></i>
	</span>
</div>
</div>
<?php }
	}?>
</div>
<script>
	window.addEventListener('DOMContentLoaded',function(){
	new ModalVideo(".js-video-btn");
});
</script>
<div class="container" style="height: 10px"></div>
<?php
}?>
</div>
<?php
require_once __DIR__ . '/producto/features.php';
require_once __DIR__ . '/producto/reviews.php';
require_once __DIR__ . '/producto/related.php';
?>
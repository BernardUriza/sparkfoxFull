<?php
//echo urldecode(str_replace("-","+",$Parametros[1]));
$LimpiarPalabra=urldecode(str_replace("-","+",$Parametros[1]));
$Producto = ControladorBlogs::ctrMostrarBlogs($LimpiarPalabra)[0];
								//echo '<pre>'; print_r($Producto); echo '</pre>';
?>
<div class="container mw-100 w-100" style="height: 50px;">
<div class="container h-100">
	<div class="row h-100 align-items-center" style="height: 30px">
		<div class="col-12 d-flex justify-content-between">
			<div class="rutaPagina">HOME / BLOG / <?php echo strtoupper($LimpiarPalabra) ?></div>
			<div>
			</div>
		</div>
	</div>
</div>
</div>
<div class=" page-header header-filter" data-parallax="true" style="background-image: url('<?php echo $Producto['rutaImagenPortada']; ?>');">
</div>
<div class="main main-raised">
<div class="container">
	<div class="section section-text">
		<div class="row renglonAgregable">
			<div class="col-md-8 ml-auto mr-auto">
				<h3 class="title"><?php echo $Producto['titulo']; ?></h3>
			</div>
			<div class="d-none descripcionCruda"><?php echo $Producto['descripcion']; ?></div>
			<div class="col-md-8 ml-auto mr-auto ejemploTexto d-none">
				<p></p>
			</div>
			<div class="section col-md-10 ml-auto mr-auto ejemploImagen ejemploImagenU d-none">
			</div>
			<div class="col-md-8 ml-auto mr-auto d-flex flex-md-row flex-column my-3 ejemploPicture justify-content-around" >
				</div><!-- 
	<div style="background-image: url('http://ar2design.com/devSparkfox/admin/vistas/img/archivos/233.jpg');" class="imagenRespaldoDiv"></div> -->
		</div>
	</div>
</div>
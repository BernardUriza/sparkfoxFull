<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
	<ol class="carousel-indicators">
		<?php
		$slider=ControladorSlider::ctrEstiloSlider();
	for ($IndexSlider=0; $IndexSlider < count($slider); $IndexSlider++) {
	$slide=$slider[$IndexSlider]; 
	?>
		<li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $IndexSlider ?>" class="<?php echo $IndexSlider==0?"active":""; ?>"></li>
<?php } ?>
	</ol>
	<div class="carousel-inner" role="listbox">
		<?php
	for ($IndexSlider=0; $IndexSlider < count($slider); $IndexSlider++) {
	$slide=$slider[$IndexSlider]; ?>
		<div class="carousel-item <?php echo $IndexSlider==0?"active":""; ?>" style=" background-image:  url('<?php echo $slide["rutaImagenPortada"] ?>')">
			<div class="carousel-caption">
				<div class="container">
					<div class="row">
						<div class="col-1  d-none d-md-block">
							<img src="vistas/img/green.png" alt="" class="imagenverde-vert ">
						</div>
						<div class="col-md-6 col-12">
							<div class="row">
								<div class="title-header-copy-2 col uri" uri="<?php echo $slide["uri"] ?>"><?php echo $slide["titulo"] ?></div>
							</div>
							<div class="row">
								<div class="col title-header-copy-3 pt-3 py-md-2"><?php echo $slide["descripcion"] ?></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
<?php } ?>
	</div>
</div>
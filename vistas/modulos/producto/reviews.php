
	<?php
$reviews = parse_csv($Producto["reviews"]);
//	echo '<pre>'; print_r($Producto["reviews"]); echo '</pre>';

?>
<div class="container mw-100 pt-2 pb-4 <?php echo count($reviews) == 1 ? "d-none" : ""; ?>"  style="
					border-bottom-color: #9B9B9B75;
					border-bottom-style: solid;
				border-bottom-width: .5px;">
	<div class="row">
		<div class="col-12 featuresCSS-specs pt-5">
			Reviews
		</div>
	</div>
	<div class="row">
		<div class="owl-carousel py-4 carousel-reviews ">
			<?php
//echo '<pre>'; print_r($reviews); echo '</pre>';
for ($i = 0; $i < count($reviews); $i++) {
	?>
			<div class="reviewsSlides" >
				<div class="reviews-obtenerSlides" >
					<div class="container">
						<div class="row">
							<div class="col-12 py-3">
								<div class="w-100 d-flex justify-content-center starsCSS">
									<?php
$limpiarMedia = "";
	$estrellas = roundUpToAny((floatVal($reviews[$i][0]) + 1) * 10);
	for ($IndexEstrella = 1; $IndexEstrella < 6; $IndexEstrella++) {
		if ($IndexEstrella * 10 < $estrellas) {
			echo '<i class="fas fa-star"></i>';
		} elseif (($IndexEstrella * 10) - 5 == $estrellas) {
			echo '<i class="fas fa-star-half-alt"></i>';
		} else {
			echo '<i class="far fa-star"></i>';
		}

	}
	?>
								</div>
							</div>
						</div>
						<div class="row py-3">

							<div class="col-2 d-none d-lg-block"></div>
							<div class="col-lg-8 col-12">
								<div class="w-100 d-flex justify-content-center ">
									<p class="reviewCSS">
										<?php echo $reviews[$i][1]; ?>
									</p>
								</div>
							</div>
							<div class="col-2 d-none d-lg-block"></div>
						</div>
					</div>

				</div>
			</div>
			<?php }?>
		</div>
	</div>
</div>
<div class="container py-2 mw-100 w-100"  style="
					border-bottom-color: #9B9B9B75;
					border-bottom-style: solid;
				border-bottom-width: .5px;">
				<div class="container">
	<div class="row">
		<div class="col-12 featuresCSS-specs py-5">
			Features & Specs
		</div>
	</div>
	<div class="row">
		<div class="col-12 col-lg-4">
				<div class="col-12 px-0 detaills">Details</div>
				<div class="col-12 mb-3" style="height: 12px;border-bottom: 1px solid #ECECEC;"></div>
				<?php
$caracteristicas_especiales = $Producto["caracteristicas_especiales"];
$caracteristicas_especiales = explode("\n", ($caracteristicas_especiales));
for ($IndexCaracteristicas = 0; $IndexCaracteristicas < count($caracteristicas_especiales); $IndexCaracteristicas++) {?>
				<div class="col-12 px-0 d-flex flex-row">
					<i class="fas fa-circle pr-3" style="color: #9B9B9B; font-size: 7px; position: relative;top: 7px"></i>
					<span class="caracteristicasProducto"><?php echo $caracteristicas_especiales[$IndexCaracteristicas]; ?></span>
				</div>
				<?php }?>
		</div>
		<div class="col-12 col-lg-4">
			<div class="col-12 px-0 detaills pt-lg-0 pt-3">Package contents</div>
			<div class="col-12 mb-3" style="border-bottom: 1px solid #ECECEC;height: 12px;"></div>
			<?php
$caracteristicas_especiales = $Producto["empaque"];
$caracteristicas_especiales = explode("\n", ($caracteristicas_especiales));
for ($IndexCaracteristicas = 0; $IndexCaracteristicas < count($caracteristicas_especiales); $IndexCaracteristicas++) {?>
			<div class="col-12 px-0 d-flex flex-row">
				<i class="fas fa-circle pr-3" style="color: #9B9B9B; font-size: 7px; position: relative;top: 7px"></i>
				<span class="caracteristicasProducto"><?php echo $caracteristicas_especiales[$IndexCaracteristicas]; ?></span>
			</div>
			<?php }?>

				<div class="row rowDetalle py-3 ">
					<div class="col-6 <?php echo ($Producto["RutaFicha"]) == "" ? "d-none" : ""; ?>">
						<h5><span class="badge badgePDF badge-light" onclick="window.open('<?php echo ($Producto["RutaFicha"]); ?>', '_blank');"><i class="far fa-file-pdf pr-2 "></i>USER MANUAL</span></h5>
					</div>
					<div class="col-6 <?php echo ($Producto["id"]) == "14" ? "" : "d-none"; ?>">
						<h5><span class="badge badgePDF badge-light" onclick="window.open('<?php echo "https://sparkfox.cn/faceplate-template.pdf"; ?>', '_blank');"><i class="far fa-file-pdf pr-2 "></i>DESIGN TEMPLATE</span></h5>
					</div>
				</div>
		</div>
		<div class="col-12 col-lg-4">
				<?php
$Portada = $Producto['rutaImagenPaquete'] == "" ? "vistas/img/default.jpg" : $Producto['rutaImagenPaquete'];
?>
						<div class="imgEmpaqueProducto" style="
							background-size: 100% auto;background-repeat: no-repeat;
							background-position: center; margin: auto;display: block;
							background-image: url('<?php echo ($Portada); ?>'); ">
						</div>
		</div>
	</div>
</div>
</div>
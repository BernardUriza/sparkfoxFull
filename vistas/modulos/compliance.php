
<div class="container mw-100 w-100" style="border-bottom: 1px solid #D8D7D8;height: 50px;">
	<div class="container h-100">
		<div class="row h-100 align-items-center" style="height: 30px">
			<div class="col-12 d-flex justify-content-between">
				<div class="rutaPagina">HOME / COMPLIANCE</div>
				<div>
					
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container mw-100 w-100" style="border-bottom: 1px solid #D8D7D8;">
	<div class="container h-100  pb-5 mb-5">
		<div class="row h-100 align-items-center" style="height: 300px">
			<div class="col-12 d-flex justify-content-between">
				<h2 class="rutaPaginaCompliance">Compliance</h2>
			</div>
		</div>
		<div class="row h-100 align-items-center py-3" style="height: 300px;border-bottom: 1px solid #D8D7D8E0;">
			<div class="col-12 d-flex justify-content-between">
				<div class="">Find Compliance documents for your product by searching on the product name.</div>
			</div>
		</div>
		<div class="row h-100 align-items-center py-3 mt-3" style="height: 300px">
			<div class="col-12 d-flex justify-content-start">
				<div class="textoBusqueda pr-3">Provide product name, model or keyword:</div>
				<div class="pr-3"><input type="text" class="form-control busquedaInput" placeholder=""></div>
				<div class=""><button type="button" class="btn btn-success btn-round btnBusqueda">SEARCH</button></div>
			</div>
		</div> 
		<div class="row h-100 py-5" >
			<div class="col-12 esconderTabla" style="visibility: hidden;">
				<table id="table_id" class="display" >
					<thead>
						<tr>
							<th>Nombre</th>
							<th>SKU</th>
							<th>DataSheet</th>
						</tr>
					</thead>
					<tbody>
								<?php 

$Productos = ControladorProductos::ctrMostrarProductos();
		for ($IndexProductos=0; $IndexProductos < count($Productos); $IndexProductos++) { 
			$Producto = $Productos[$IndexProductos]
			
			?> 
						<tr>
							<td><?php  echo ($Producto["titulo"]);  ?></td>
							<td><?php  echo ($Producto["codigo"]);  ?></td>
							<td>
								<a class=" badgePDF <?php  echo ($Producto["RutaFicha"])==""?"d-none":"";  ?>" onclick="window.open('<?php  echo ($Producto["RutaFicha"]);  ?>', '_blank');">
										<i class="fas fa-file-pdf"></i>
								</a>
							</td>
						</tr>

		<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
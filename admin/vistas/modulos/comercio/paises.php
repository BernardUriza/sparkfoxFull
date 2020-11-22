<?php
$paises = ControladorComercio::ctrSeleccionarPaises();
?>
<div class="box box-success">
	<div class="box-header with-border">
		<h3 class="box-title">COUNTRIES</h3>
	    <div class="box-tools pull-right">
     		<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
	        	<i class="fa fa-minus"></i>
	       	</button>
	    </div>
	</div>
 	<div class="box-body">
 		<select class="js-example-basic-multiple" name="countries[]" multiple="multiple">
 			<?php for ($IndexPaises=0; $IndexPaises < count($paises); $IndexPaises++) {  ?>
		  <option <?php echo in_array($paises[$IndexPaises]["id"],explode(",",$plantilla["paises"]))?"selected":"" ;?>  value="<?php echo $paises[$IndexPaises]["id"] ?>"><?php echo $paises[$IndexPaises]["titulo"] ?></option>
		<?php }	 ?>
		</select>
 	</div>
 	<div class="box-footer">
    	<button type="button" id="guardarPaises" class="btn btn-primary pull-right">Save</button>
	</div>
</div>
 <?php

$productos = ControladorProductos::ctrMostrarTotalProductos("id");

 ?>

<!--=====================================
PRODUCTOS RECIENTES
======================================-->

<!-- PRODUCT LIST -->
<div class="box box-primary">

	<!-- box-header -->
  	<div class="box-header with-border">
    
    	<h3 class="box-title">Productos agregados recientemente</h3>

    	<div class="box-tools pull-right">
      
      	<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      	</button>
    
    	</div>

  </div>
   <!-- box-header -->

   	<!-- box-body -->
  	<div class="box-body">

	    <!-- products-list -->
	    <ul class="products-list product-list-in-box">

	    <?php

	    	for($i = 0; $i < 5; $i++){

	    		echo '<li class="item">
				        <div class="product-img">
				          '.($productos[$i]["rutaImagenPortada"]!=""?('<img src="'.str_replace('admin/', '', $productos[$i]["rutaImagenPortada"]).'" alt="Product Image">'):"").'
				        </div>
				        <div class="product-info">
				          <a href="productos--'.$productos[$i]["id"].'" class="product-title">'.$productos[$i]["titulo"];
				  echo '<span class="label label-info pull-right">'.$productos[$i]["codigo"].'</span></a>';
				              
				     echo '</div>
				      </li>';

	    	}

	    ?> 

	    </ul>
	    <!-- products-list -->

  	</div>
  	<!-- box-body -->

  	<!-- box-footer -->
  	<div class="box-footer text-center">
    
    	<a href="productos" class="uppercase">Ver todos los productos</a>
  
  	</div>
  	<!-- box-footer -->

</div>
<!-- PRODUCT LIST -->
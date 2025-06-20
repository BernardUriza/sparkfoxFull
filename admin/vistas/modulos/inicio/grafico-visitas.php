<?php

$paises = ControladorVisitas::ctrMostrarPaises("cantidad");
$totalVisitas = ControladorVisitas::ctrMostrarTotalVisitas();

?>


<!--=====================================
GRÁFICO DE VISITAS
======================================-->
<!-- Map box -->
<div class="box box-solid bg-light-blue-gradient">

	<!-- box-header -->
	<div class="box-header">

		<div class="pull-right box-tools">

      		<button type="button" class="btn btn-primary btn-sm pull-right" data-widget="collapse" data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
      		<i class="fa fa-minus"></i></button>
  
    	</div>

    	<i class="fa fa-map-marker"></i>

    	<h3 class="box-title">
    	
    		Visits Graph
    	
    	</h3>
  
	</div>
	<!-- box-header -->

	<!-- box-body -->
  	<div class="box-body">

  		<div id="world-map" style="height: 250px; width: 100%;"></div>

  	</div>
  	<!-- box-body -->

  	<!--  box-footer -->
  	<div class="box-footer no-border">

  	<!-- row -->
    <div class="row">

    <?php

      for($i = 0; $i < count($paises); $i++){

        echo ' <div class="col-md-3 col-xs-6 text-center" style="border-right: 1px solid #f4f4f4">
        
              <input type="text" class="knob" data-readonly="true" value="'.round($paises[$i]["cantidad"]*100/$totalVisitas["total"]).'" data-width="60" data-height="60" data-fgColor="#3999CC">

              <div class="knob-label">'.$paises[$i]["pais"].'</div>
            
            </div>';


      }

    ?>
 

    </div>
     <!-- row -->

  	</div>
  	<!--  box-footer -->

</div>
<!-- Map box -->

<script>

// jvectormap data
  var visitorsData = {

    <?php

    foreach ($paises as $key => $value) {

      echo $value["codigo"].' : '.$value["cantidad"].',';

   
    }
      
     echo $value["codigo"].' : '.$value["cantidad"];

    ?>
  };
  // World map by jvectormap
  $('#world-map').vectorMap({
    map              : 'world_mill_en',
    backgroundColor  : 'transparent',
    regionStyle      : {
      initial: {
        fill            : '#e4e4e4',
        'fill-opacity'  : 1,
        stroke          : 'none',
        'stroke-width'  : 0,
        'stroke-opacity': 1
      }
    },
    series           : {
      regions: [
        {
          values           : visitorsData,
          scale            : ['#92c1dc', '#ebf4f9'],
          normalizeFunction: 'polynomial'
        }
      ]
    },
    onRegionLabelShow: function (e, el, code) {
      if (typeof visitorsData[code] != 'undefined')
        el.html(el.html() + ': ' + visitorsData[code] + ' visits');
    }
  });

</script>
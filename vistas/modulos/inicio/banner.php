<div class="container mw-100">
    <div class="row">
        <?php 
            $Cat=ControladorCategorias::ctrMostrarCategorias();
      //     echo '<pre>'; print_r($Cat); echo '</pre>';
        for ($i=0; $i < 3; $i++) { ?>
        <div class="col-12 col-md-4 bannerCelda" style="background-image: url('<?php echo $Cat[$i]["rutaImagenFondo"] ?>?7658')">
            <div class="row align-items-center h-100 dnoneHover-cat" idCategoria="<?php echo $Cat[$i]["id"] ?>">
                <div class="col-12">
                    <div class="d-flex flex-column bannerLiga">
                        <div><img src='<?php echo $Cat[$i]["rutaImagenPortada"] ?>?7658' alt=""></div>
                        <div class="chargers-banner"><?php echo $Cat[$i]["categoria"] ?></div>
                        <div><i class="fas fa-arrow-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
       <?php  } ?>
    </div>
    <div class="row">
        <div class="col-12 col-md-8 bannerCelda" style="background-image: url('<?php echo $Cat[3]["rutaImagenFondo"] ?>?7658')">
            <div class="row align-items-center h-100 dnoneHover-cat" idCategoria="<?php echo $Cat[3]["id"] ?>">
                <div class="col-12">
                    <div class="d-flex flex-column bannerLiga">
                        <div><img src='<?php echo $Cat[3]["rutaImagenPortada"] ?>?7658' alt=""></div>
                        <div class="chargers-banner"><?php echo $Cat[3]["categoria"] ?></div>
                        <div><i class="fas fa-arrow-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-12 bannerCelda" style="background-image: url('<?php echo $Cat[4]["rutaImagenFondo"] ?>?7658')">
            <div class="row align-items-center h-100 dnoneHover-cat" idCategoria="<?php echo $Cat[4]["id"] ?>">
                <div class="col-12">
                    <div class="d-flex flex-column bannerLiga">
                        <div><img src='<?php echo $Cat[4]["rutaImagenPortada"] ?>?7658' alt=""></div>
                        <div class="chargers-banner"><?php echo $Cat[4]["categoria"] ?></div>
                        <div><i class="fas fa-arrow-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
        </div>
</div>
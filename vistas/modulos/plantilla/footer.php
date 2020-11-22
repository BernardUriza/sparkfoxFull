<footer class="footer">
	<div class="container mw-100 w-100">
		<div class="row" style="height: 0px">
			<div class="d-flex justify-content-center w-100">
				<img src="vistas/img/flotanteIco.png" alt="" style="height: 75px; width: 75px; position: relative;top: -35px;z-index: 3">
			</div>
		</div>
		<div class="row align-items-center renglonLinkFooter pt-5 pt-lg-0">
			<div class="container">
				<div class="w-100 d-flex flex-md-row flex-column justify-content-center">
					<div class="menu-footer px-3 py-lg-0 py-3" onclick="location='start';" style="cursor: pointer;">HOME</div>
					<div class="menu-footer px-3 py-lg-0 py-3" onclick="AbrirArribaProductos()" style="cursor: pointer;">PRODUCTS</div>
					<div class="menu-footer px-3 py-lg-0 py-3" onclick="location='whereToBuy';" style="cursor: pointer;">WHERE TO BUY</div>
					<div class="menu-footer px-3 py-lg-0 py-3" onclick="location='contact';" style="cursor: pointer;">CONTACT</div>
				</div>
			</div>
		</div>
		<div class="row align-items-center renglonLinkFooter2">
			<div class="container">
				<div class="w-100 d-flex justify-content-between flex-lg-row flex-column">
					<div class="py-lg-0 order-lg-1 order-3 py-2" style="line-height: 32px; font-size: 12px;">
						<div class="w-100 d-flex justify-content-center">
							<div>© <?php echo date("Y"); ?> SparkFox, All Rights Reserved</div>
						</div>
					</div>
					<div class="py-lg-0 order-lg-2 order-2 py-2">
						<div class="w-100 d-flex justify-content-center recorrer25-lg" >
							<?php $REDES=(json_decode($plantilla["redesSociales"],true));
							foreach ($REDES as $key => $RED) {
							if($RED['activo']=="1")
							echo '<div class="logo-footer px-3"><a href="'.$RED['url'].'" target="_blank"><i class="fab '.$RED['red'].'"></i></a></div>';
							}
							?>
						</div>
					</div>
					<div class="py-lg-0 order-lg-3 order-1 py-2">
						<div class="w-100 d-flex justify-content-center">
							<a class="links-footer px-3" target="_blank" href="<?php echo $plantilla["rutaAviso"] ?>">Privacy Policy</a>
							<a class="links-footer pr-3" target="_blank" href="<?php echo $plantilla["rutaTerminos"] ?>">Terms & Conditions</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row align-items-center"  style="background-color: #222222;  height: 75px;">
			<div class="container">
				<div class="w-100 d-flex justify-content-center">
					<div style="line-height: 32px; font-size: 12px; cursor: pointer;" onclick="window.open('http://www.ar2design.com','_blank')">
						<img style="height: 15px;" class="px-2" src="vistas/img/ar2design.png" alt="">
					Design and Development</div>
				</div>
			</div>
		</div>
	</div>
</footer>
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = 'https://connect.facebook.net/es_ES/sdk/xfbml.customerchat.js#xfbml=1&version=v2.12&autoLogAppEvents=1';
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!-- Your customer chat code -->
<div class="fb-customerchat"
	attribution=setup_tool
	page_id="270037123644595"
	theme_color="#F5593D"
	logged_in_greeting="¡Hola! ¿Podemos ayudarte?"
	logged_out_greeting="¡Hola! ¿Podemos ayudarte?">
</div>
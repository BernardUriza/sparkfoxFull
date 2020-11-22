$(document).ready(Refrescar);
var categoriasJSON, categoriasID, clasesJSON, clasesID, filtrandoClase, filtrandoCategoria;

function RefrescarBusqueda(){
	var Busqueda=(localStorage.getItem('paraBuscarEnCatalogo'));
	if(Busqueda!=""){
		$('.searchCatalogo').val(Busqueda);
		$("#demo-2 > input").hover();$("#demo-2 > input").focus();
	}
	return Busqueda;
}

function Refrescar() {
	$("#main > div.container.mw-100.w-100.banner").css("display","none");
	var Busqueda=RefrescarBusqueda();
	if ($(window).width() > 400){
		localStorage.setItem('paraBuscarEnCatalogo',"");
	}
	categoriasJSON = JSON.parse($(".categoriasJSON").html());
	categoriasID = [];
	for (var i = 0; i < categoriasJSON.length; i++) {
		categoriasID.push(categoriasJSON[i]["id"]);
	}

	clasesJSON = JSON.parse($(".clasesJSON").html());
	clasesID = [];
	for (var i = 0; i < clasesJSON.length; i++) {
		clasesID.push(clasesJSON[i]["id"]);
	}


var recargar=localStorage.getItem("filtrandoClase") == null && localStorage.getItem("filtrandoCategoria") == null;
console.log("recargar", recargar); 

	if (localStorage.getItem("filtrandoClase") == null)
		localStorage.setItem("filtrandoClase", "0");

	if (localStorage.getItem("filtrandoCategoria") == null)
		localStorage.setItem("filtrandoCategoria", "0");

if(recargar){
	//alert(65);
	location.reload()
}

//	alert(localStorage.getItem("filtrandoClase")+" "+localStorage.getItem("filtrandoCategoria"));
if(Busqueda == null) Busqueda="";
	filtrandoClase = (Busqueda!="")?0:parseInt(localStorage.getItem("filtrandoClase"));
	filtrandoCategoria = (Busqueda!="")?0:parseInt(localStorage.getItem("filtrandoCategoria"));
//alert("1["+(Busqueda == null)+"]");
	//alert(filtrandoClase+" "+filtrandoCategoria);

				$(".controllers").html(($(".mensajeHeader").html()).toUpperCase());
			$(".controllersIMG").attr("src", "vistas/img/iconSparkfox.svg");
var aplicado=false;
	if (filtrandoClase > -1) {
		$("#filtrandoClase" + filtrandoClase).addClass("activo");
		$(".rutaPaginaCo").html($("#filtrandoClase" + filtrandoClase).text());
		if (!(filtrandoCategoria > 0)) {
			if (filtrandoClase > 0) {
			$(".banner").css("background-image", "url(" + clasesJSON[clasesID.indexOf(filtrandoClase + "")]["rutaImagen"] + ")");
			aplicado=true;
				$(".controllers").html($("#filtrandoClase" + filtrandoClase).text());
			}
		}
	} 

	if (filtrandoCategoria > -1) {
		$("#filtrandoCategoria" + filtrandoCategoria).addClass("activo");
		$(".rutaPaginaCa").html($("#filtrandoCategoria" + filtrandoCategoria).text());
		if (filtrandoCategoria > 0) {
			$(".controllers").html($("#filtrandoCategoria" + filtrandoCategoria).text() /*+" - "+$("#filtrandoClase"+filtrandoClase).text()*/ );
			$(".controllersIMG").attr("src", categoriasJSON[categoriasID.indexOf(filtrandoCategoria + "")]["rutaImagenPortada"]);
			$(".banner").css("background-image", "url(" + categoriasJSON[categoriasID.indexOf(filtrandoCategoria + "")]["rutaImagenFondo"] + ")");
			aplicado=true;
		}
	}
	if(!aplicado){
			$(".banner").css("background-image", "url(" +$(".rutaHeader").html()+ ")");

	}
	var Pintado = false;
	var Productos = $(".todosProductosFiltrables > div");
	for (var i = Productos.length - 1; i >= 0; i--) {
		var Producto = $(Productos[i]);
		var ProductofiltrandoCategoria = Producto.attr("filtrandoCategoria").split(',');
		var buscandores = Producto.attr("buscandores").toUpperCase();
		var ProductofiltrandoClase = Producto.attr("filtrandoClase").split(',');
		if (ProductofiltrandoCategoria.indexOf(filtrandoCategoria + "") > -1 && ProductofiltrandoClase.indexOf(filtrandoClase + "") > -1) {					
			if(Busqueda==""){
				if (!Pintado) {
					$(".todosProductosFiltrados").html("");
					Pintado = true
				}
				$(".todosProductosFiltrados").html($(".todosProductosFiltrados").html() + Producto.prop('outerHTML'));
			}
			else{
				var nnn = buscandores.search(Busqueda.toUpperCase());
				//alert(nnn+"---"+buscandores+"---"+Busqueda);
				if(nnn>=0){
					if (!Pintado) {
					$(".todosProductosFiltrados").html("");
					Pintado = true
				}
					$(".todosProductosFiltrados").html($(".todosProductosFiltrados").html() + Producto.prop('outerHTML'));
				}
			}
		}
	}
	setTimeout(function() {
	$("#main > div.container.mw-100.w-100.banner").css("display","block");
		
	},250);

}

$(".filtroCatalogo > ul > a").click(function() {
	var ID = ($(this).attr("id"));
	if (ID.includes("filtrandoClase")) {
		var filtrandoClase = ID.replace("filtrandoClase", "");
		localStorage.setItem("filtrandoClase", filtrandoClase);
		location.reload();
	}
	if (ID.includes("filtrandoCategoria")) {
		var filtrandoCategoria = ID.replace("filtrandoCategoria", "");
		localStorage.setItem("filtrandoCategoria", filtrandoCategoria);
		location.reload();
	}
})
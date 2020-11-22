$( document ).ready(function() {

//alert ($(".descripcionCruda").html().split( new RegExp( "<img", "gi" ) ).length-1);
var primerImg=($(".descripcionCruda").html().indexOf('<img'));
var primerStr=($(".descripcionCruda").html().substring(0, primerImg));	
var restanteStr=$(".descripcionCruda").html().substring(primerImg,$(".descripcionCruda").html().length);
var primeraImagen=restanteStr.substring(0,restanteStr.indexOf('>')+1);
for (var i = $(".descripcionCruda").html().split( new RegExp( "<img", "gi" ) ).length ; i >= 0; i--) {
	if(primerImg==0)
    {

		var nuevoTexto= $(".ejemploImagen").clone();
		nuevoTexto.html(primeraImagen);
		nuevoTexto.removeClass("ejemploImagen");
		nuevoTexto.addClass("imagenEnFlex");
		nuevoTexto.appendTo($('.renglonAgregable'));


		restanteStr=restanteStr.substring(restanteStr.indexOf('>')+1,restanteStr.length);
		primerImg=(restanteStr.indexOf('<img'));
		primerStr=(restanteStr.substring(0, primerImg));
		primeraImagen=restanteStr.substring(0,restanteStr.indexOf('>')+1);	
    }
    else{
		var nuevoTexto= $(".ejemploTexto").clone();
		nuevoTexto.html("<p>"+primerStr+"</p>");
		nuevoTexto.removeClass("ejemploTexto");
		nuevoTexto.removeClass("d-none");
		nuevoTexto.appendTo($('.renglonAgregable'));	

		restanteStr=restanteStr.substring(restanteStr.indexOf('<img'),restanteStr.length);
		primerImg=(restanteStr.indexOf('<img'));
		primeraImagen=restanteStr.substring(primerImg,restanteStr.indexOf('>')+1);   
	}

}
if(restanteStr.includes("<img")){
		var nuevoTexto= $(".ejemploTexto").clone();
		nuevoTexto.html(restanteStr.substring(restanteStr.indexOf('<img'), restanteStr.indexOf('>')+1));
		//console.log("restanteStr", restanteStr);
		nuevoTexto.removeClass("ejemploImagen");
		nuevoTexto.addClass("imagenEnFlex");
		nuevoTexto.appendTo($('.renglonAgregable'));

}else{
		var nuevoTexto= $(".ejemploTexto").clone();
		nuevoTexto.html("<p>"+restanteStr+"</p>");
		console.log("restanteStr", restanteStr);
		nuevoTexto.removeClass("ejemploTexto");
		nuevoTexto.removeClass("d-none");
		nuevoTexto.appendTo($('.renglonAgregable'));
}

var sube=false;
var arregloJunto=[];
var renglonAgregableArray = $(".renglonAgregable").children();
$(".renglonAgregable").children()
 for(var i=0;i<renglonAgregableArray.length;i++){
var antes=sube;
sube=($(renglonAgregableArray[i]).hasClass("imagenEnFlex"));
if(sube && !antes){
arregloJunto.push([$(renglonAgregableArray[i]).html()]);
}
if(sube && antes){
arregloJunto[arregloJunto.length-1].push($(renglonAgregableArray[i]).html());
}
if(!sube && antes){
//arregloJunto[arregloJunto.length-1].push($(renglonAgregableArray[i]).html());
}
}
console.log(arregloJunto);
sube=false; var indexadorArreglo=0;
 for(var i=0;i<renglonAgregableArray.length;i++){
 	var antes=sube;
	sube=($(renglonAgregableArray[i]).hasClass("imagenEnFlex"));
	if(sube && !antes){
		var ImagenesAgregandoURL="";
		//alert(arregloJunto[indexadorArreglo].length);
		for (var irt = 0; irt < arregloJunto[indexadorArreglo].length; irt++) {
			console.log("arregloJunto[indexadorArreglo][i]", $(arregloJunto[indexadorArreglo][irt]).attr("src"));
			ImagenesAgregandoURL=ImagenesAgregandoURL+'<div style="background-image: url('+"'"+$(arregloJunto[indexadorArreglo][irt]).attr("src")+"'"+');" class="imagenRespaldoDiv"></div> '
		}
		var nuevoTexto= $(".ejemploPicture").clone();
		nuevoTexto.html(ImagenesAgregandoURL);
		nuevoTexto.removeClass("ejemploPicture");
		nuevoTexto.removeClass("d-none");
		nuevoTexto.insertAfter($(renglonAgregableArray[i]));
		indexadorArreglo++;
	}
}


for(var i=0;i<$("p").length;i++){
	$($("p")[i]).html($($("p")[i]).html().replaceAll("<span>","").replaceAll("</span>","").replaceAll("<strong>","").replaceAll("</strong>","").replaceAll("<b>","<strong>").replaceAll("</b>","</strong>"))
}

});

String.prototype.replaceAll = function(search, replacement) {
    var target = this;
    return target.split(search).join(replacement);
};
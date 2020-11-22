/*UTILS**/
function getNameFROM_FILE(s) {
return s.replace(/^.*[\\\/]/, '').replace(s.replace(/^.*[\\\/]/, '').split('.').pop(),'').replace('.','');
}
function isEmptyOrSpaces(str){
    return str === null || str.match(/^ *$/) !== null;
}
/* iCheck */
$('input').iCheck({
	checkboxClass: 'icheckbox_square-blue',
	radioClass: 'iradio_square-blue',
	increaseArea: '20%' // optional
});

/* jQueryKnob */
$('.knob').knob();

/* SideBar Menu */
$('.sidebar-menu').tree();

//Colorpicker
$('.my-colorpicker').colorpicker();

//Tags Input
$(".tagsInput").tagsinput({
	maxTags: 10,
	confirmKeys: [44],
	cancelConfirmKeysOnEmpty: false,
 	trimValue: false
})

$(".bootstrap-tagsinput").css({"padding":"11px",
							   "width":"100%",
 							   "border-radius":"1px"})

//Datepicker	
$('.datepicker').datepicker({
	format: 'yyyy-mm-dd 23:59:59',
	startDate: '0d'
});
document.addEventListener('DOMContentLoaded', function() {
	setTimeout(function() {
		BarraCargando();
	},1000);
}, false)
function AlCargar() {
	setTimeout(function() {
		$("#sidebarToggleDarkMenu").click();
		setTimeout(function() {
			$("#sidebarToggleDarkMenu").click();
		},5);
	},1);
}
function BarraCargando(Valor=100) {
	if(Valor==0||Valor==100){
	/*	$('#BarraDeProgresoValor').slideUp();*/
		$('body').removeClass('loading');
		setTimeout(function(){$('.BarraDeProgresoValor').css('width',"0%")},800);
	}
	else{
		/*$('#BarraDeProgresoValor').slideDown();*/
		$('body').addClass('loading');
	}
	$('.BarraDeProgresoValor').html(Valor+"%");
	$('.BarraDeProgresoValor').css('width',Valor+"%");
}
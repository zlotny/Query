$(document).ready(function(){
	var estado = -1;
	if ($(window).width() <= 750) {
		estado = 0;
	}
	else {
		estado = 1;
	}
	if (estado == 0 && $(".bubble")[0] ) {
		$(".bubble").removeClass("bubble").addClass("bubble-mini");
		$("#main-body").removeClass("container");
		$(".setPopover").popover("disable");
	}
	else {
		if (estado == 1 && $(".bubble-mini")[0] ) {
			$(".bubble-mini").removeClass("bubble-mini").addClass("bubble");
			$("#main-body").addClass("container");
			$(".setPopover").popover("enable");

		}
	}

	$(window).on('resize', function(){
		if ($(window).width() <= 750) {
			estado = 0;
		}
		else {
			estado = 1;
		}

		if (estado == 0 && $(".bubble")[0] ) {
			$(".bubble").removeClass("bubble").addClass("bubble-mini");
			$("#main-body").removeClass("container");
			$(".setPopover").popover("disable");
		}
		else {
			if (estado == 1 && $(".bubble-mini")[0] ) {
     //cambiar a bubble
     $(".bubble-mini").removeClass("bubble-mini").addClass("bubble");
     $("#main-body").addClass("container");
     $(".setPopover").popover("enable");
 }
}
});
}); 
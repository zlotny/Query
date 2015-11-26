<script type="text/javascript">$("[data-toggle=popover]").popover();</script>
		<script type="text/javascript">
			$(document).ready(function(){


				var estado = -1;
				if ($(window).width() <= 750) {
					estado = 0;
					$("#main-body").removeClass("container");
					$("#question-body").removeClass("container-fluid");
					$(".setPopover").popover("disable");
				}
				else {
					estado = 1;
				}
				if (estado == 0 && $("#main-body").hasClass("container") ) {
					$("#main-body").removeClass("container");
					$("#question-body").removeClass("container-fluid");
					$(".setPopover").popover("disable");
				}
				else {
					if (estado == 1 && !$("#main-body").hasClass("container") ) {
     //cambiar a bubble
     $("#main-body").addClass("container");
     $("#question-body").addClass("container-fluid");
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
	if (estado == 0 && $("#main-body").hasClass("container") ) {
		$("#main-body").removeClass("container");
		$("#question-body").removeClass("container-fluid");
		$(".setPopover").popover("disable");
	}
	else {
		if (estado == 1 && !$("#main-body").hasClass("container") ) {
			$("#main-body").addClass("container");
			$("#question-body").addClass("container-fluid");
			$(".setPopover").popover("enable");
		}
	}
});
});

function closeWell(){
	$(".intro-text").addClass("hidden")
} 

</script>
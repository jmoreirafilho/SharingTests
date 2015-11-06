// angular
angular.module("view", []);

// jquery
$("#show-login").on('click', function(){
	$("#login").toggle(300);
});

$("input").attr('autocomplete','off');

$("#open-points").on('click', function(){
	$("#points").toggle(200);
});

var loop = 0;
$("#menu-button").click(function(){
	if(loop%2 == 0){
		$("#mobile-menu-options").show(300);
		$("#modal-back-window").removeClass("hide");
	} else {
		$("#mobile-menu-options").hide(300, function(){
			$("#modal-back-window").addClass("hide");
		});
	}
	loop++;
});

$("#modal-back-window").click(function(){
	$("#mobile-menu-options").hide(300, function(){
		$("#modal-back-window").addClass("hide");
	});
	loop++
});
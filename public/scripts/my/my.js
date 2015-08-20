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
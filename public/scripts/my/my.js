// angular
angular.module("view", []);

// jquery
$("#home").hover(function(){
	$("#menu_home").animate({top: "-40px"}, 200);
}).mouseout(function(){
	$("#menu_home").animate({top: "-155px"}, 100);
});

$("#search").hover(function(){
	$("#menu_search").animate({top: "-40px"}, 200);
}).mouseout(function(){
	$("#menu_search").animate({top: "-155px"}, 100);
});
$("#create").hover(function(){
	$("#menu_create").animate({top: "-40px"}, 200);
}).mouseout(function(){
	$("#menu_create").animate({top: "-155px"}, 100);
});
$("#donate").hover(function(){
	$("#menu_donate").animate({top: "-40px"}, 200);
}).mouseout(function(){
	$("#menu_donate").animate({top: "-155px"}, 100);
});
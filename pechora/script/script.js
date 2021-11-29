$(function() {
	$("img.inc_img").click(function(event) {
		$("div.increase_image img").attr("src", event.target.src);
		$('div.increase_image').css({top:'50%',left:'50%',margin:'-'+($('div.increase_image').height() / 2)+'px 0 0 -'+($('div.increase_image').width() / 2)+'px'});
		$("div.increase_image").fadeIn(500, function() {
			$("div.increase_image").css("display", "block");
		});
	});

	$("div.increase_image").click(function() {
		$("div.increase_image").fadeOut(500, function() {
			$("div.increase_image").css("display", "none");
		});
	});
});

function section_display(id) {
	var length = $(".section").length;
	for(var i = 0; i < length; i++) {
		$(".section").css("display", "none");
	}
	$("#" + id).css("display", "block");
}
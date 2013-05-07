/* Author:

*/
var side = false;
var leftcontent = 0;
jQuery(document).ready(
	function () {
		if (jQuery("#catlist").length == 1) {
			jQuery("#catlist").masonry({columnWidth: 100, itemSelector: 'li',gutterWidth:5,isFitWidth:true});
		}
		$(window).resize(resize);
		resize();
	}
);

var resize = function(){
	if($("#sidebar").length > 0) {
		var a = $("#sidebar").height();
		var b = $("#left-bar").height();
		if(a > b) {
			$("#sidebar").css('border-left-width',1);
			$("#left-bar").css('border-right-width',0);
		}
		else {
			$("#sidebar").css('border-left-width',0);
			$("#left-bar").css('border-right-width',1);
		}
	}
}





















